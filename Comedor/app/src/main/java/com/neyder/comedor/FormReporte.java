package com.neyder.comedor;

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.Spinner;

/**
 * Created by NEYDER on 10/07/2015.
 */
public class FormReporte extends Activity{
    Spinner spinnerYears;
    Spinner spinnerMeses;
    Spinner spinnerTurnos;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.form_reportes);

        spinnerYears = (Spinner) findViewById(R.id.spinnerYear);
        ArrayAdapter<CharSequence> adapterY = ArrayAdapter.createFromResource(
                this, R.array.year_array, android.R.layout.simple_spinner_item);
        adapterY.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        spinnerYears.setAdapter(adapterY);

        spinnerMeses = (Spinner) findViewById(R.id.spinnerMes);
        ArrayAdapter<CharSequence> adapterM = ArrayAdapter.createFromResource(
                this, R.array.mes_array, android.R.layout.simple_spinner_item);
        adapterM.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        spinnerMeses.setAdapter(adapterM);

        spinnerTurnos = (Spinner) findViewById(R.id.spinnerTurno);
        ArrayAdapter<CharSequence> adapterT = ArrayAdapter.createFromResource(
                this, R.array.turno_array, android.R.layout.simple_spinner_item);
        adapterT.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        spinnerTurnos.setAdapter(adapterT);

        Button myButton =(Button)findViewById(R.id.btnGrafica);
        myButton.setOnClickListener(new Button.OnClickListener() {
            public void onClick(View v) {
                String sprTurnoString = null;
                sprTurnoString = spinnerTurnos.getSelectedItem().toString();
                int idTurno = spinnerTurnos.getSelectedItemPosition();
                String sprYear = null;
                sprYear = spinnerYears.getSelectedItem().toString();
                String sprMes = null;
                sprMes = spinnerMeses.getSelectedItem().toString();

                Intent intent = new Intent(FormReporte.this, GraficaAsistProgram.class);
                intent.putExtra("idTurno", idTurno);
                intent.putExtra("Turno", sprTurnoString);
                intent.putExtra("year", sprYear);
                intent.putExtra("mes", sprMes);
                intent.setFlags(Intent.FLAG_ACTIVITY_NEW_TASK);
                getApplicationContext().startActivity(intent);
            }
        });
    }
}
