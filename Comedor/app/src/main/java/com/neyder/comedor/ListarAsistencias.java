package com.neyder.comedor;

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.view.KeyEvent;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ListView;
import android.widget.Toast;

import org.apache.http.HttpEntity;
import org.apache.http.HttpResponse;
import org.apache.http.NameValuePair;
import org.apache.http.client.HttpClient;
import org.apache.http.client.entity.UrlEncodedFormEntity;
import org.apache.http.client.methods.HttpGet;
import org.apache.http.client.methods.HttpPost;
import org.apache.http.impl.client.DefaultHttpClient;
import org.apache.http.message.BasicNameValuePair;
import org.apache.http.protocol.BasicHttpContext;
import org.apache.http.protocol.HttpContext;
import org.apache.http.util.EntityUtils;
import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.io.BufferedReader;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.util.ArrayList;
import java.util.List;

/**
 * Created by NEYDER on 08/06/2015.
 */
public class ListarAsistencias extends Activity{
    InputStream is=null;
<<<<<<< HEAD
    EditText username;
    EditText password;
    private Button btnIngresar;
=======
>>>>>>> 04883d5a1020b7f25fea68bd2a543e9dd270b8b3
    String result="";
    int idUser=0;

    variables_publicas variables=new variables_publicas();
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.listar_asistencias);

        Bundle extras = getIntent().getExtras();
        //Obtenemos datos enviados en el intent.
        if (extras != null) {
            idUser  = extras.getInt("idUsuario");//idUsuario
        }else{
            idUser=0;
        }
        Thread tr = new Thread(){
            @Override
            public void run(){
                final String Resultado = enviarPost(Integer.toString(idUser));
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
        ListView listado = (ListView) findViewById(R.id.lstAsistencias);
        listado.setAdapter(adaptador);
    }

    public ArrayList<String> obtDatosJSON(String response){
        ArrayList<String> listado= new ArrayList<String>();
        try {
            String texto="";
            JSONArray json= new JSONArray(response);
            for (int i=0; i<json.length();i++){
                texto = json.getJSONObject(i).getString("fecha") +" - "+
                        json.getJSONObject(i).getString("ape_paterno") +" "+
                        json.getJSONObject(i).getString("ape_maerno") +", "+
                        json.getJSONObject(i).getString("nombre") +" - "+
                        json.getJSONObject(i).getString("descripcion");
                listado.add(texto);
            }
            Log.e("Resultado ", "OBT DATOS JSON" + listado.toString());
        } catch (Exception e) {
            // TODO: handle exception
            Log.e("Error ","OBT DATOS JSON"+e.toString());
        }
        return listado;
    }

    //public JSONArray enviarPost(String idUser) {
    public String enviarPost(String idUser) {
        HttpClient httpClient = new DefaultHttpClient();
        HttpContext localContext = new BasicHttpContext();
        HttpPost httpPost = new HttpPost(variables.direccionIp +"/Comedor/android/asistencias.php");
        HttpResponse response = null;
        String resultado=null;
        try {
            List<NameValuePair> params = new ArrayList<NameValuePair>(0);
            params.add(new BasicNameValuePair("idUsuario", idUser));
            httpPost.setEntity(new UrlEncodedFormEntity(params));
            response = httpClient.execute(httpPost,localContext);
            HttpEntity entity = response.getEntity();
            resultado = EntityUtils.toString(entity, "UTF-8");
            Log.e("getpostresponde", "result=" + resultado);
        } catch (Exception e) {
            Log.e("getpostresponde ex", "result=" + e.toString());
        }
        return resultado;
        /*
        if (is!=null){
            getpostresponse();
            return getjsonarray();
        }else{
            Log.e("ENVIARPOST ","ERROR");
            return null;
        }*/
    }

    public void getpostresponse(){
        try{
            BufferedReader reader = new BufferedReader(new InputStreamReader(is,"iso-8859-1"),8);
            StringBuilder sb = new StringBuilder();
            String line = null;
            while ((line = reader.readLine())!=null){
                sb.append(line+"\n");
            }
            is.close();
            result=sb.toString();
            Log.e("getpostresponde", "result=" + sb.toString());
        }catch(Exception e){
            Log.e("log_tag","Error converting result"+e.toString());
        }
    }

    public JSONArray getjsonarray(){
        try{
            JSONArray jArray = new JSONArray(result);
            return jArray;
        }catch (JSONException e){
            Log.e("log_tag","Error parsing data "+e.toString());
            return null;
        }
    }
/*
    @Override
    public boolean onKeyDown(int keyCode, KeyEvent event)  {
        if (keyCode == KeyEvent.KEYCODE_BACK && event.getRepeatCount() == 0) {
            // no hacemos nada.
            return true;
        }

        return super.onKeyDown(keyCode, event);
    }*/
}
