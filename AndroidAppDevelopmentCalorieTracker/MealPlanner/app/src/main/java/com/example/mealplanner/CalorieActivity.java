package com.example.mealplanner;

import androidx.appcompat.app.AppCompatActivity;
import androidx.fragment.app.DialogFragment;
import androidx.room.Database;

import android.app.DatePickerDialog;
import android.content.Context;
import android.database.sqlite.SQLiteConstraintException;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.DatePicker;
import android.widget.EditText;
import android.widget.LinearLayout;
import android.widget.TextView;
import android.widget.Toast;

import java.text.SimpleDateFormat;
import java.util.Calendar;
import java.util.Date;
import java.util.Locale;

public class CalorieActivity extends AppCompatActivity implements DatePickerDialog.OnDateSetListener {
    EditText input,clicked,from,to,datebt;
    Button add,viewcal;
    TextView total;
    Calendar c = Calendar.getInstance();
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_calorie);


        total=findViewById(R.id.total_calorie);
        from=findViewById(R.id.from);
        to=findViewById(R.id.to);
        viewcal=findViewById(R.id.view_calorie);
        datebt=findViewById(R.id.choose_date);
        input=findViewById(R.id.calorie_input);
        add=findViewById(R.id.add_calorie);
        add.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                int button_id=view.getId();
                String date_selected = datebt.getText().toString();
                String calorie = input.getText().toString();
                int calorie_entered=0;
                if(date_selected.equals("Pick Date")){
                    Toast.makeText(getApplicationContext(),"Please choose the date",Toast.LENGTH_LONG).show();
                    return;
                }
                if(calorie.equals("")){
                    Toast.makeText(getApplicationContext(),"Please enter the calories",Toast.LENGTH_LONG).show();
                    return;
                }
                try {
                    calorie_entered=Integer.parseInt(calorie);
                }
                catch (Exception e){
                    Toast.makeText(getApplicationContext(),"Please enter a valid calorie",Toast.LENGTH_LONG).show();
                    return;
                }

                try {
                    MainData mainData = new MainData(date_selected,calorie_entered);
                    RoomDB.getInstance(getApplicationContext())
                            .mainDao()
                            .insert(mainData);
                    Toast.makeText(getApplicationContext(),"Calories have been added",Toast.LENGTH_LONG).show();
                }
                catch (SQLiteConstraintException e){
                    Toast.makeText(getApplicationContext(),"You have already entered calories for that date",Toast.LENGTH_LONG).show();
                }

            }
        });

        viewcal.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                int total_cal = RoomDB.getInstance(getApplicationContext())
                        .mainDao()
                        .getWeeklyCalorie(from.getText().toString(),to.getText().toString());
                String test="Your total calorie intake: ";
                test+=String.valueOf(total_cal);
                total.setText(test);
            }
        });

        datebt.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                clicked=(EditText)view ;
                new DatePickerDialog(CalorieActivity.this,CalorieActivity.this,c
                        .get(Calendar.YEAR), c.get(Calendar.MONTH),
                        c.get(Calendar.DAY_OF_MONTH)).show();

            }
        });

        from.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                clicked=(EditText)view ;
                new DatePickerDialog(CalorieActivity.this,CalorieActivity.this,c
                        .get(Calendar.YEAR), c.get(Calendar.MONTH),
                        c.get(Calendar.DAY_OF_MONTH)).show();

            }
        });

        to.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                clicked=(EditText)view ;
                new DatePickerDialog(CalorieActivity.this,CalorieActivity.this,c
                        .get(Calendar.YEAR), c.get(Calendar.MONTH),
                        c.get(Calendar.DAY_OF_MONTH)).show();
            }
        });



    }

    @Override
    public void onDateSet(DatePicker datePicker, int year, int month, int day) {
        c.set(Calendar.YEAR, year);
        c.set(Calendar.MONTH, month);
        c.set(Calendar.DAY_OF_MONTH, day);
        update();
    }

    private void update(){
        String myFormat = "yyyy-MM-dd";
        SimpleDateFormat sdf = new SimpleDateFormat(myFormat, Locale.US);
        clicked.setText(sdf.format(c.getTime()));
    }

}