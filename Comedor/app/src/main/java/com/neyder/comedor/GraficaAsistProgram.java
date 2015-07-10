package com.neyder.comedor;

import android.graphics.Color;
import android.graphics.Typeface;
import android.os.Bundle;
import android.support.v7.app.ActionBarActivity;
import android.util.Log;
import android.widget.ArrayAdapter;
import android.widget.ListView;

import com.github.mikephil.charting.charts.PieChart;
import com.github.mikephil.charting.data.Entry;
import com.github.mikephil.charting.data.PieData;
import com.github.mikephil.charting.data.PieDataSet;

import org.apache.http.HttpEntity;
import org.apache.http.HttpResponse;
import org.apache.http.NameValuePair;
import org.apache.http.client.HttpClient;
import org.apache.http.client.entity.UrlEncodedFormEntity;
import org.apache.http.client.methods.HttpPost;
import org.apache.http.impl.client.DefaultHttpClient;
import org.apache.http.message.BasicNameValuePair;
import org.apache.http.protocol.BasicHttpContext;
import org.apache.http.protocol.HttpContext;
import org.apache.http.util.EntityUtils;
import org.json.JSONArray;
import org.json.JSONException;

import java.io.BufferedReader;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.util.ArrayList;
import java.util.List;

public class GraficaAsistProgram extends ActionBarActivity {
    private PieChart pieChart;
    private Typeface tf;
    InputStream is=null;
    String result="";
    int idTurno=0;
    String mes="";
    String nmes="";
    String year="";

    variables_publicas variables=new variables_publicas();

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.asistencias_programa);

        Bundle extras = getIntent().getExtras();
        //Obtenemos datos enviados en el intent.
        if (extras != null) {
            idTurno  = extras.getInt("idTurno");
            mes  = extras.getString("mes");
            year  = extras.getString("year");
            Log.e("mes", "=" + mes.toString());
            if(mes.equals("Enero")){
                nmes="01";
            }
            if(mes.equals("Febrero")){
                nmes="02";
            }
            if(mes.equals("Marzo")){
                mes="03";
            }
            if(mes.equals("Abril")){
                mes="04";
            }
            if(mes.equals("Mayo")){
                mes="05";
            }
            if(mes.equals("Junio")){
                mes="06";
            }
            if(mes.equals("Julio")){
                nmes="07";
            }
            if(mes.equals("Agosto")){
                mes="08";
            }
            if(mes.equals("Septiembre")){
                mes="09";
            }
            if(mes.equals("Octubre")){
                mes="10";
            }
            if(mes.equals("Noviembre")){
                mes="11";
            }
            if(mes.equals("Diciembre")){
                nmes="12";
            }
        }else{
            idTurno=0;
            mes ="";
            year="";
        }
        Thread tr = new Thread(){
            @Override
            public void run(){
                final String Resultado = enviarPost(Integer.toString(idTurno),nmes,year);
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
        /*int size=datos.size();
        ArrayList<Entry> valsY = new ArrayList<Entry>();
        int total=0,a=0,b=0,c=0;
        for(int x=0;x<size;x++) {
            total=total+Integer.parseInt(datos.get(x));
        }
        int valores[]={0,0,0};

        for(int x=0;x<size;x++) {
            valores[x]=Integer.parseInt(datos.get(x));
            valsY.add(new Entry(valores[x] / total * 100, x));
            Log.e("Cantidad ", "indicador: " + valores[x]);
        }*/

        pieChart = (PieChart) findViewById(R.id.pieChart);

        /*definimos algunos atributos*/
        pieChart.setHoleRadius(40f);
        pieChart.setRotationEnabled(true);
        pieChart.animateXY(1500, 1500);

		/*creamos una lista para los valores Y*/
        ArrayList<Entry> valsY = new ArrayList<Entry>();
        valsY.add(new Entry(5* 100 / 25,0));
        valsY.add(new Entry(20 * 100 / 25, 1));
        valsY.add(new Entry(15 * 100 / 25, 2));

 		/*creamos una lista para los valores X*/
        ArrayList<String> valsX = new ArrayList<String>();
        valsX.add("Beca");
        valsX.add("Media Beca");
        valsX.add("Programa A");

 		/*creamos una lista de colores*/
        ArrayList<Integer> colors = new ArrayList<Integer>();
        colors.add(getResources().getColor(R.color.green_flat));
        colors.add(getResources().getColor(R.color.celeste));
        colors.add(getResources().getColor(R.color.red_flat));

 		/*seteamos los valores de Y y los colores*/
        PieDataSet set1 = new PieDataSet(valsY, "");
        set1.setSliceSpace(3f);
        set1.setColors(colors);

		/*seteamos los valores de X*/
        PieData data = new PieData(valsX, set1);
        pieChart.setData(data);
        pieChart.highlightValues(null);
        pieChart.invalidate();

        pieChart.setUsePercentValues(true);
        pieChart.setDrawHoleEnabled(true);
        pieChart.setHoleColorTransparent(true);
        pieChart.setTransparentCircleColor(Color.WHITE);
        pieChart.setHoleRadius(43f);
        pieChart.setTransparentCircleRadius(61f);
        pieChart.setDrawCenterText(true);
        pieChart.setRotationAngle(10);
        // enable rotation of the chart by touch
        pieChart.setRotationEnabled(true);
    }

    public ArrayList<String> obtDatosJSON(String response){
        ArrayList<String> listado= new ArrayList<String>();
        try {
            String texto="";
            JSONArray json= new JSONArray(response);
            for (int i=0; i<json.length();i++){
                /*texto = json.getJSONObject(i).getString("descripcion") +"-"+
                        json.getJSONObject(i).getString("cantidad") +"-"+
                        json.getJSONObject(i).getString("total");*/
                texto = json.getJSONObject(i).getString("cantidad");
                listado.add(texto);
            }
            Log.e("Resultado ", "OBT DATOS JSON" + listado.toString());
        } catch (Exception e) {
            // TODO: handle exception
            Log.e("Error ","OBT DATOS JSON"+e.toString());
        }
        return listado;
    }

    public String enviarPost(String idTurno,String mes,String year) {
        Log.e("envio datos", "idTurno: " + idTurno + " mes: " + mes+ " year: " + year  );
        HttpClient httpClient = new DefaultHttpClient();
        HttpContext localContext = new BasicHttpContext();
        HttpPost httpPost = new HttpPost(variables.direccionIp +"/Comedor/android/asistenciasPrograma.php");
        HttpResponse response = null;
        String resultado=null;
        try {
            List<NameValuePair> params = new ArrayList<NameValuePair>(2);
            params.add(new BasicNameValuePair("idTurno", idTurno+1));
            params.add(new BasicNameValuePair("mes", mes));
            params.add(new BasicNameValuePair("year", year));
            httpPost.setEntity(new UrlEncodedFormEntity(params));
            response = httpClient.execute(httpPost,localContext);
            HttpEntity entity = response.getEntity();
            resultado = EntityUtils.toString(entity, "UTF-8");
            Log.e("getpostresponde", "result=" + resultado);
        } catch (Exception e) {
            Log.e("getpostresponde ex", "result=" + e.toString());
        }
        return resultado;
    }

}
