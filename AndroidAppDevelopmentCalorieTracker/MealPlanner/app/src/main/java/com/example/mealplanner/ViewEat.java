package com.example.mealplanner;



import androidx.appcompat.app.ActionBar;
import androidx.appcompat.app.AppCompatActivity;


import android.graphics.Color;
import android.os.Bundle;
import android.view.Gravity;
import android.view.View;
import android.view.ViewGroup;
import android.widget.LinearLayout;
import android.widget.TableLayout;
import android.widget.TableRow;
import android.widget.TextView;

import java.util.List;


public class ViewEat extends AppCompatActivity {



    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_view_eat);

        TableLayout tl = (TableLayout) findViewById(R.id.view_all_plan);

        TableRow trow0 = new TableRow(this);

        TextView tv0 = new TextView(this);
        tv0.setLayoutParams(new TableRow.LayoutParams(0, ViewGroup.LayoutParams.WRAP_CONTENT, 1.5f));
        tv0.setText("Date");
        tv0.setTextSize(19);
        tv0.setTextColor(Color.parseColor("#0000FF"));
        tv0.setGravity(Gravity.CENTER_VERTICAL | Gravity.CENTER_HORIZONTAL);
        trow0.addView(tv0);

        TextView tv1 = new TextView(this);
        tv1.setLayoutParams(new TableRow.LayoutParams(0, ViewGroup.LayoutParams.WRAP_CONTENT, 1.5f));
        tv1.setText("Meal Time");
        tv1.setTextColor(Color.parseColor("#0000FF"));
        tv1.setTextSize(19);
        tv1.setGravity(Gravity.CENTER_VERTICAL | Gravity.CENTER_HORIZONTAL);
        trow0.addView(tv1);

        TextView tv2 = new TextView(this);
        tv2.setLayoutParams(new TableRow.LayoutParams(0, ViewGroup.LayoutParams.WRAP_CONTENT, 1.5f));
        tv2.setText("Food");
        tv2.setTextColor(Color.parseColor("#0000FF"));
        tv2.setTextSize(19);
        tv2.setGravity(Gravity.CENTER_VERTICAL | Gravity.CENTER_HORIZONTAL);
        trow0.addView(tv2);

        TextView tv3 = new TextView(this);
        tv3.setLayoutParams(new TableRow.LayoutParams(0, ViewGroup.LayoutParams.WRAP_CONTENT, 1.0f));
        tv3.setText("Quantity");
        tv3.setTextColor(Color.parseColor("#0000FF"));
        tv3.setTextSize(19);
        tv3.setGravity(Gravity.CENTER_VERTICAL | Gravity.CENTER_HORIZONTAL);
        trow0.addView(tv3);

        tl.addView(trow0, new TableLayout.LayoutParams(
                TableLayout.LayoutParams.MATCH_PARENT, ActionBar.LayoutParams.WRAP_CONTENT));
        //tl.addView(trow0);

        List <String> dates = RoomDB.getInstance(getApplicationContext()).plannedDao().getAllEventsDate();
        List <String> meals = RoomDB.getInstance(getApplicationContext()).plannedDao().getAllEventsMeal();
        List <String> foods = RoomDB.getInstance(getApplicationContext()).plannedDao().getAllEventsFood();
        List <Double> quantity = RoomDB.getInstance(getApplicationContext()).plannedDao().getAllEventsQuantity();

        int n = dates.size();
        for(int i=0;i<n;++i) {
            TableRow trow = new TableRow(this);
            TextView tv00 = new TextView(this);
            TextView tv01 = new TextView(this);
            TextView tv02 = new TextView(this);
            TextView tv03 = new TextView(this);


            tv00.setLayoutParams(new TableRow.LayoutParams(0, ViewGroup.LayoutParams.WRAP_CONTENT, 1.5f));
            tv00.setText(dates.get(i));
            tv00.setTextSize(18);
            tv00.setTextColor(Color.parseColor("#fc2c03"));
            tv00.setGravity(Gravity.CENTER_VERTICAL | Gravity.CENTER_HORIZONTAL);
            trow.addView(tv00);

            tv01.setLayoutParams(new TableRow.LayoutParams(0, ViewGroup.LayoutParams.WRAP_CONTENT, 1.5f));
            tv01.setText(meals.get(i));
            tv01.setTextSize(18);
            tv01.setTextColor(Color.parseColor("#a102bd"));
            tv01.setGravity(Gravity.CENTER_VERTICAL | Gravity.CENTER_HORIZONTAL);
            trow.addView(tv01);

            tv02.setLayoutParams(new TableRow.LayoutParams(0, ViewGroup.LayoutParams.WRAP_CONTENT, 1.5f));
            tv02.setText(foods.get(i));
            tv02.setTextSize(18);
            tv02.setTextColor(Color.parseColor("#d10049"));
            tv02.setGravity(Gravity.CENTER_VERTICAL | Gravity.CENTER_HORIZONTAL);
            trow.addView(tv02);

            tv03.setLayoutParams(new TableRow.LayoutParams(0, ViewGroup.LayoutParams.WRAP_CONTENT, 1.0f));
            tv03.setText(String.valueOf(quantity.get(i)));
            tv03.setTextSize(18);
            tv03.setTextColor(Color.parseColor("#FFFFFF"));
            tv03.setGravity(Gravity.CENTER_VERTICAL | Gravity.CENTER_HORIZONTAL);
            trow.addView(tv03);

            tl.addView(trow, new TableLayout.LayoutParams(
                    TableLayout.LayoutParams.MATCH_PARENT, ActionBar.LayoutParams.WRAP_CONTENT));
        }


    }
}
