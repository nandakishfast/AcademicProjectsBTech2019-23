package com.example.mealplanner;

import androidx.appcompat.app.ActionBar;
import androidx.appcompat.app.AppCompatActivity;

import android.app.DatePickerDialog;
import android.database.sqlite.SQLiteConstraintException;
import android.graphics.Color;
import android.os.Bundle;
import android.view.Gravity;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.DatePicker;
import android.widget.EditText;
import android.widget.TableLayout;
import android.widget.TableRow;
import android.widget.TextView;
import android.widget.Toast;

import java.text.SimpleDateFormat;
import java.util.Calendar;
import java.util.List;
import java.util.Locale;

public class ViewEatOn extends AppCompatActivity implements DatePickerDialog.OnDateSetListener{


    EditText date,clicked;
    Button view;
    Calendar c = Calendar.getInstance();

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_view_eat_on);

        date = findViewById(R.id.choose_date_view_on);
        view = findViewById(R.id.bt_view_on);

        view.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                String date_selected = date.getText().toString();
                //Toast.makeText(getApplicationContext(),date.getText().toString(),Toast.LENGTH_SHORT).show();
                if(date_selected.equals("Choose DATE")){
                    Toast.makeText(getApplicationContext(),"Please choose the date",Toast.LENGTH_LONG).show();
                    return;
                }
                else{
                    load();
                }
            }
        });


        date.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                clicked=(EditText)view ;
                new DatePickerDialog(ViewEatOn.this,ViewEatOn.this,c
                        .get(Calendar.YEAR), c.get(Calendar.MONTH),
                        c.get(Calendar.DAY_OF_MONTH)).show();

            }
        });
    }

    public void load(){
        TableLayout tl = (TableLayout) findViewById(R.id.view_all_plan_on);

        TableRow trow0 = new TableRow(this);

        TextView tv0 = new TextView(this);
        tv0.setLayoutParams(new TableRow.LayoutParams(0, ViewGroup.LayoutParams.WRAP_CONTENT, 1.7f));
        tv0.setText("Date");
        tv0.setTextColor(Color.parseColor("#0000FF"));
        tv0.setTextSize(19);
        tv0.setGravity(Gravity.CENTER_VERTICAL | Gravity.CENTER_HORIZONTAL);
        trow0.addView(tv0);

        TextView tv1 = new TextView(this);
        tv1.setLayoutParams(new TableRow.LayoutParams(0, ViewGroup.LayoutParams.WRAP_CONTENT, 1.7f));
        tv1.setText("Meal Time");
        tv1.setTextColor(Color.parseColor("#0000FF"));
        tv1.setTextSize(19);
        tv1.setGravity(Gravity.CENTER_VERTICAL | Gravity.CENTER_HORIZONTAL);
        trow0.addView(tv1);

        TextView tv2 = new TextView(this);
        tv2.setLayoutParams(new TableRow.LayoutParams(0, ViewGroup.LayoutParams.WRAP_CONTENT, 1.7f));
        tv2.setText("Food");
        tv2.setTextColor(Color.parseColor("#0000FF"));
        tv2.setTextSize(19);
        tv2.setGravity(Gravity.CENTER_VERTICAL | Gravity.CENTER_HORIZONTAL);
        trow0.addView(tv2);

        TextView tv3 = new TextView(this);
        tv3.setLayoutParams(new TableRow.LayoutParams(0, ViewGroup.LayoutParams.WRAP_CONTENT, 0.8f));
        tv3.setText("Qty");
        tv3.setTextColor(Color.parseColor("#0000FF"));
        tv3.setTextSize(19);
        tv3.setGravity(Gravity.CENTER_VERTICAL | Gravity.CENTER_HORIZONTAL);
        trow0.addView(tv3);

        TextView tv4 = new TextView(this);
        tv4.setLayoutParams(new TableRow.LayoutParams(0, ViewGroup.LayoutParams.WRAP_CONTENT, 0.8f));
        tv4.setText("Cal");
        tv4.setTextColor(Color.parseColor("#0000FF"));
        tv4.setTextSize(19);
        tv4.setGravity(Gravity.CENTER_VERTICAL | Gravity.CENTER_HORIZONTAL);
        trow0.addView(tv4);

        tl.addView(trow0, new TableLayout.LayoutParams(
                TableLayout.LayoutParams.MATCH_PARENT, ActionBar.LayoutParams.WRAP_CONTENT));
        //tl.addView(trow0);

        String date_selected = date.getText().toString();

        List<String> dates = RoomDB.getInstance(getApplicationContext()).plannedDao().getAllEventsDateOn(date_selected);
        List <String> meals = RoomDB.getInstance(getApplicationContext()).plannedDao().getAllEventsMealOn(date_selected);
        List <String> foods = RoomDB.getInstance(getApplicationContext()).plannedDao().getAllEventsFoodOn(date_selected);
        List <Double> quantity = RoomDB.getInstance(getApplicationContext()).plannedDao().getAllEventsQuantityOn(date_selected);
        List <Double> calorie = RoomDB.getInstance(getApplicationContext()).plannedDao().getAllEventsCalorieOn(date_selected);

        int n = dates.size();
        for(int i=0;i<n;++i) {
            TableRow trow = new TableRow(this);
            TextView tv00 = new TextView(this);
            TextView tv01 = new TextView(this);
            TextView tv02 = new TextView(this);
            TextView tv03 = new TextView(this);
            TextView tv04 = new TextView(this);

            tv00.setLayoutParams(new TableRow.LayoutParams(0, ViewGroup.LayoutParams.WRAP_CONTENT, 1.7f));
            tv00.setText(dates.get(i));
            tv00.setTextColor(Color.parseColor("#fc2c03"));
            tv00.setTextSize(18);
            tv00.setGravity(Gravity.CENTER_VERTICAL | Gravity.CENTER_HORIZONTAL);
            trow.addView(tv00);

            tv01.setLayoutParams(new TableRow.LayoutParams(0, ViewGroup.LayoutParams.WRAP_CONTENT, 1.7f));
            tv01.setText(meals.get(i));
            tv01.setTextSize(18);
            tv01.setTextColor(Color.parseColor("#a102bd"));
            tv01.setGravity(Gravity.CENTER_VERTICAL | Gravity.CENTER_HORIZONTAL);
            trow.addView(tv01);

            tv02.setLayoutParams(new TableRow.LayoutParams(0, ViewGroup.LayoutParams.WRAP_CONTENT, 1.7f));
            tv02.setText(foods.get(i));
            tv02.setTextSize(18);
            tv02.setTextColor(Color.parseColor("#d10049"));
            tv02.setGravity(Gravity.CENTER_VERTICAL | Gravity.CENTER_HORIZONTAL);
            trow.addView(tv02);

            int quantityInt = (int)Math.round(quantity.get(i));

            tv03.setLayoutParams(new TableRow.LayoutParams(0, ViewGroup.LayoutParams.WRAP_CONTENT, 0.8f));
            tv03.setText(String.valueOf(quantityInt));
            tv03.setTextSize(18);
            tv03.setTextColor(Color.parseColor("#00FF00"));
            tv03.setGravity(Gravity.CENTER_VERTICAL | Gravity.CENTER_HORIZONTAL);
            trow.addView(tv03);

            int calInt = (int)Math.round(calorie.get(i));

            tv04.setLayoutParams(new TableRow.LayoutParams(0, ViewGroup.LayoutParams.WRAP_CONTENT, 0.8f));
            tv04.setText(String.valueOf(calInt));
            tv04.setTextSize(18);
            tv04.setTextColor(Color.parseColor("#00FFF0"));
            tv04.setGravity(Gravity.CENTER_VERTICAL | Gravity.CENTER_HORIZONTAL);
            trow.addView(tv04);

            tl.addView(trow, new TableLayout.LayoutParams(
                    TableLayout.LayoutParams.MATCH_PARENT, ActionBar.LayoutParams.WRAP_CONTENT));
        }
        TableRow trow = new TableRow(this);
        TableRow trowup = new TableRow(this);
        TableRow trowdown = new TableRow(this);
        TextView tv01 = new TextView(this);
        TextView tv02 = new TextView(this);
        TextView tv03 = new TextView(this);
        TextView tv04 = new TextView(this);

        tv01.setLayoutParams(new TableRow.LayoutParams(0, ViewGroup.LayoutParams.WRAP_CONTENT, 1.7f));
        tv01.setText("");
        tv01.setTextSize(18);
        tv01.setGravity(Gravity.CENTER_VERTICAL | Gravity.CENTER_HORIZONTAL);
        trowup.addView(tv01);

        tl.addView(trowup, new TableLayout.LayoutParams(
                TableLayout.LayoutParams.MATCH_PARENT, ActionBar.LayoutParams.WRAP_CONTENT));

        tv03.setLayoutParams(new TableRow.LayoutParams(0, ViewGroup.LayoutParams.WRAP_CONTENT, 1.3f));
        tv03.setText(String.valueOf("Total Calorie intake: "));
        tv03.setTextSize(19);
        tv03.setTextColor(Color.parseColor("#FF0000"));
        tv03.setGravity(Gravity.RIGHT | Gravity.CENTER_HORIZONTAL);
        trow.addView(tv03);

        Double calorieTotal = RoomDB.getInstance(getApplicationContext()).plannedDao().getAllEventsTotalCalorieOn(date_selected);

        int calInt = (int)Math.round(calorieTotal);

        tv04.setLayoutParams(new TableRow.LayoutParams(0, ViewGroup.LayoutParams.WRAP_CONTENT, 0.8f));
        tv04.setText(String.valueOf(calInt));
        tv04.setTextSize(19);
        tv04.setTextColor(Color.parseColor("#a102bd"));
        tv04.setGravity(Gravity.LEFT | Gravity.CENTER_HORIZONTAL);
        trow.addView(tv04);

        tl.addView(trow, new TableLayout.LayoutParams(
                TableLayout.LayoutParams.MATCH_PARENT, ActionBar.LayoutParams.WRAP_CONTENT));

        tv02.setLayoutParams(new TableRow.LayoutParams(0, ViewGroup.LayoutParams.WRAP_CONTENT, 1.7f));
        tv02.setText("");
        tv02.setTextSize(18);
        tv02.setGravity(Gravity.CENTER_VERTICAL | Gravity.CENTER_HORIZONTAL);
        trowdown.addView(tv02);

        tl.addView(trowdown, new TableLayout.LayoutParams(
                TableLayout.LayoutParams.MATCH_PARENT, ActionBar.LayoutParams.WRAP_CONTENT));
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