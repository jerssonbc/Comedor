package com.neyder.comedor;

import android.app.Activity;
import android.database.Cursor;
import android.os.Bundle;
import android.os.Handler;
import android.util.Log;
import android.view.View;
import android.widget.*;

import org.apache.http.HttpEntity;
import org.apache.http.HttpResponse;
import org.apache.http.client.HttpClient;
import org.apache.http.client.methods.HttpGet;
import org.apache.http.impl.client.DefaultHttpClient;
import org.apache.http.protocol.BasicHttpContext;
import org.apache.http.protocol.HttpContext;
import org.apache.http.util.EntityUtils;
import org.json.JSONArray;

import java.util.ArrayList;

public class ListadoClientes extends Activity implements SearchView.OnQueryTextListener,
        SearchView.OnCloseListener {
    variables_publicas variables=new variables_publicas();
    private ListView myList;
    private SearchView searchView;
    private SearchHelper mDbHelper;
    private MyCustomAdapter defaultAdapter;
    private ArrayList<String> nameList;

    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);

        setContentView(R.layout.listar_comensales);

        nameList = new ArrayList<String>();

        Thread tr = new Thread(){
            @Override
            public void run(){
                final String Resultado = leer();
                runOnUiThread(
                        new Runnable() {
                            @Override
                            public void run() {
                                cargaListado(obtDatosJSON(Resultado));
                                //Toast.makeText(getApplicationContext(),Resultado,Toast.LENGTH_SHORT).show();
                            }
                        });
            }
        };
        tr.start();

        //relate the listView from java to the one created in xml
        myList = (ListView) findViewById(R.id.lstComensales);

        //show the ListView on the screen
        // The adapter MyCustomAdapter is responsible for maintaining the data backing this nameList and for producing
        // a view to represent an item in that data set.


        //prepare the SearchView
        searchView = (SearchView) findViewById(R.id.search);

        //Sets the default or resting state of the search field. If true, a single search icon is shown by default and
        // expands to show the text field and other buttons when pressed. Also, if the default state is iconified, then it
        // collapses to that state when the close button is pressed. Changes to this property will take effect immediately.
        //The default value is true.
        searchView.setIconifiedByDefault(false);
        searchView.setOnQueryTextListener(this);
        searchView.setOnCloseListener(this);
        mDbHelper = new SearchHelper(this);
        mDbHelper.open();

        //Clear all names
        mDbHelper.deleteAllNames();


    }

    public void cargaListado(ArrayList<String> datos){
        defaultAdapter = new MyCustomAdapter(ListadoClientes.this, datos);
        myList.setAdapter(defaultAdapter);
        /*ArrayAdapter<String> adaptador =
                new ArrayAdapter<String>(this,android.R.layout.simple_list_item_1,datos);
        ListView listado = (ListView) findViewById(R.id.lstComensales);
        listado.setAdapter(adaptador);*/
        // Create the list of names which will be displayed on search
        for (String name : datos) {
            mDbHelper.createList(name);
        }
    }

    /**
     * Method used for performing the search and displaying the results. This method is called every time a letter
     * is introduced in the search field.
     *
     * @param query Query used for performing the search
     */
    private void displayResults(String query) {

        Cursor cursor = mDbHelper.searchByInputText((query != null ? query : "@@@@"));

        if (cursor != null) {

            String[] from = new String[] {SearchHelper.COLUMN_NAME};

            // Specify the view where we want the results to go
            int[] to = new int[] {R.id.search_result_text_view};

            // Create a simple cursor adapter to keep the search data
            SimpleCursorAdapter cursorAdapter = new SimpleCursorAdapter(this, R.layout.result_search_item, cursor, from, to);
            myList.setAdapter(cursorAdapter);

            // Click listener for the searched item that was selected
            myList.setOnItemClickListener(new AdapterView.OnItemClickListener() {
                public void onItemClick(AdapterView<?> parent, View view, int position, long id) {

                    // Get the cursor, positioned to the corresponding row in the result set
                    Cursor cursor = (Cursor) myList.getItemAtPosition(position);

                    // Get the state's capital from this row in the database.
                    String selectedName = cursor.getString(cursor.getColumnIndexOrThrow("name"));
                    Toast.makeText(ListadoClientes.this, selectedName, Toast.LENGTH_SHORT).show();

                    // Set the default adapter
                    myList.setAdapter(defaultAdapter);

                    // Find the position for the original list by the selected name from search
                    for (int pos = 0; pos < nameList.size(); pos++) {
                        if (nameList.get(pos).equals(selectedName)){
                            position = pos;
                            break;
                        }
                    }

                    // Create a handler. This is necessary because the adapter has just been set on the list again and
                    // the list might not be finished setting the adapter by the time we perform setSelection.
                    Handler handler = new Handler();
                    final int finalPosition = position;
                    handler.post(new Runnable() {
                        @Override
                            public void run() {
                                    myList.setSelection(finalPosition);
                            }
                    });

                    searchView.setQuery("",true);
                }
            });

        }
    }

    public String leer(){
        HttpClient cliente =new DefaultHttpClient();
        HttpContext contexto = new BasicHttpContext();
        HttpGet httpget = new HttpGet(variables.direccionIp+"/comedor/android/GetData.php");
        String resultado=null;
        try {
            HttpResponse response = cliente.execute(httpget,contexto);
            HttpEntity entity = response.getEntity();
            resultado = EntityUtils.toString(entity, "UTF-8");
            Log.e("getpostresponde", "result=" + resultado);
        } catch (Exception e) {
            Log.e("getpostresponde ex", "result=" + e.toString());
        }
        return resultado;
    }

    public ArrayList<String> obtDatosJSON(String response){
        ArrayList<String> listado= new ArrayList<String>();
        try {
            JSONArray json= new JSONArray(response);
            String texto="";
            for (int i=0; i<json.length();i++){
                //texto = json.getJSONObject(i).getString("num_matricula") +" - "+
                texto = json.getJSONObject(i).getString("ape_paterno") +" "+
                        json.getJSONObject(i).getString("ape_maerno") +", "+
                        json.getJSONObject(i).getString("nombre") +" \n "+
                        json.getJSONObject(i).getString("facultad") +" - "+
                        json.getJSONObject(i).getString("escuela");
                listado.add(texto);
            }
        } catch (Exception e) {
            // TODO: handle exception
        }
        return listado;
    }

    @Override
    protected void onDestroy() {
        super.onDestroy();
        if (mDbHelper  != null) {
            mDbHelper.close();
        }
    }

    @Override
    public boolean onClose() {
        myList.setAdapter(defaultAdapter);
        return false;
    }

    @Override
    public boolean onQueryTextSubmit(String query) {
        displayResults(query + "*");
        return false;
    }

    @Override
    public boolean onQueryTextChange(String newText) {
        if (!newText.isEmpty()){
            displayResults(newText + "*");
        } else {
            myList.setAdapter(defaultAdapter);
        }
        return false;
    }
}