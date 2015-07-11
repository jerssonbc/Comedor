package com.neyder.comedor;

import java.io.InputStream;
import java.util.ArrayList;

import org.apache.http.HttpEntity;
import org.apache.http.HttpResponse;
import org.apache.http.client.HttpClient;
import org.apache.http.client.methods.HttpGet;
import org.apache.http.impl.client.DefaultHttpClient;
import org.apache.http.protocol.BasicHttpContext;
import org.apache.http.protocol.HttpContext;
import org.apache.http.util.EntityUtils;
import org.json.JSONArray;

import android.app.Activity;
import android.graphics.Bitmap;
import android.graphics.BitmapFactory;
import android.os.AsyncTask;
import android.os.Bundle;
import android.support.v7.app.ActionBarActivity;
import android.support.v7.widget.Toolbar;
import android.util.Log;
import android.view.Menu;
import android.view.MenuItem;
import android.widget.ArrayAdapter;
import android.widget.ImageView;
import android.widget.ListView;

public class ListadoActivity extends ActionBarActivity{
    variables_publicas variables=new variables_publicas();
    //private Toolbar toolbar;
    
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.listar_comensales);

        Thread tr = new Thread(){
            @Override
            public void run(){
                final String Resultado = leer();
                runOnUiThread(
                        new Runnable() {
                            @Override
                            public void run() {
                                cargaListado(obtDatosJSON(Resultado));
                            }
                        });
            }
        };
        tr.start();
    }

    public void cargaListado(ArrayList<String> datos){
        ArrayAdapter<String> adaptador =
                new ArrayAdapter<String>(this,android.R.layout.simple_list_item_1,datos);
        ListView listado = (ListView) findViewById(R.id.lstComensales);
        listado.setAdapter(adaptador);
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
                texto = json.getJSONObject(i).getString("num_matricula") +" - "+
                        json.getJSONObject(i).getString("ape_paterno") +" "+
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
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.menu_main, menu);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        int id = item.getItemId();

        //noinspection SimplifiableIfStatement
        if (id == R.id.action_settings) {
            return true;
        }

        return super.onOptionsItemSelected(item);
    }
}