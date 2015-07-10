package com.neyder.comedor;



import java.io.BufferedReader;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.util.ArrayList;
import java.util.List;

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

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.ActionBarActivity;
import android.util.Log;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.CheckBox;
import android.widget.EditText;
import android.widget.ListView;
import android.widget.TextView;
import android.widget.Toast;

public class MainActivity extends Activity {
    InputStream is=null;
    EditText username;
    EditText password;
    private Button btnIngresar;
    int logstatus=-1;
    int loginId=-1;
    String result="";
    variables_publicas variables=new variables_publicas();

    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        username = (EditText) findViewById(R.id.user);
        password = (EditText) findViewById(R.id.pass);
        btnIngresar = (Button) findViewById(R.id.btnIngresar);

        btnIngresar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Thread tr = new Thread(){
                    @Override
                    public void run(){
                        JSONArray jdata =enviarPost(username.getText().toString(), password.getText().toString());
                        if (jdata!=null && jdata.length()>0){
                            JSONObject json_data;
                            JSONObject json_id;
                            try{
                                json_data = jdata.getJSONObject(0);
                                logstatus=json_data.getInt("logstatus");
                                json_id = jdata.getJSONObject(0);
                                loginId=json_id.getInt("id");
                                Log.e("loginstatus","logstatus= "+logstatus);
                            }catch (JSONException e){
                                e.printStackTrace();
                            }
                            if (logstatus==0){
                                Log.e("loginstatus ","invalido");
                                runOnUiThread(new Runnable() {
                                    @Override
                                    public void run() {
                                        Toast.makeText(MainActivity.this, "Datos Incorrectos",
                                                Toast.LENGTH_LONG).show();
                                    }
                                });
                            }else{
                                Log.e("loginstatus ","valido");
                                runOnUiThread(new Runnable() {
                                    @Override
                                    public void run() {
                                        /*Toast.makeText(MainActivity.this, "LOGIN VALIDO "+loginId,
                                                Toast.LENGTH_LONG).show();*/
                                        Toast.makeText(MainActivity.this, "BIENVENIDO AL SISTEMA",
                                                Toast.LENGTH_LONG).show();
                                    }
                                });
                                if (loginId==1){
<<<<<<< HEAD
                                    Intent intent = new Intent(MainActivity.this, ListadoClientes.class);
=======
                                    Intent intent = new Intent(MainActivity.this, OpcionAdmin.class);
>>>>>>> 04883d5a1020b7f25fea68bd2a543e9dd270b8b3
                                    intent.putExtra("idUsuario", loginId);
                                    intent.setFlags(Intent.FLAG_ACTIVITY_NEW_TASK);
                                    getApplicationContext().startActivity(intent);
                                }else{
                                    Intent intent = new Intent(MainActivity.this, ListarAsistencias.class);
                                    intent.putExtra("idUsuario", loginId);
                                    intent.setFlags(Intent.FLAG_ACTIVITY_NEW_TASK);
                                    getApplicationContext().startActivity(intent);
                                }
                            }
                        }else{
                            Log.e("JSON ","ERROR");
                            runOnUiThread(new Runnable() {
                                @Override
                                public void run() {
                                    Toast.makeText(MainActivity.this, "JSON ERROR",
                                            Toast.LENGTH_LONG).show();
                                }
                            });
                        }
                    }
                };
                tr.start();
            }
        });
    }

    public JSONArray enviarPost(String user, String pass) {
        HttpClient httpClient = new DefaultHttpClient();
        HttpContext localContext = new BasicHttpContext();
        HttpPost httpPost = new HttpPost(variables.direccionIp +"/Comedor/android/acceso.php");
        HttpResponse response = null;
        try {
            List<NameValuePair> params = new ArrayList<NameValuePair>(1);
            params.add(new BasicNameValuePair("usuario", user));
            params.add(new BasicNameValuePair("pass", pass));
            httpPost.setEntity(new UrlEncodedFormEntity(params));
            response = httpClient.execute(httpPost,localContext);
            HttpEntity entity = response.getEntity();
            is=entity.getContent();
        } catch (Exception e) {
            // TODO: handle exception
        }
        if (is!=null){
            getpostresponse();
            return getjsonarray();
        }else{
            return null;
        }
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
}
