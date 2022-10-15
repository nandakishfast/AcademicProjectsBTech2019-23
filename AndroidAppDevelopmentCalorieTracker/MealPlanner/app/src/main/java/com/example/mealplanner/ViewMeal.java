package com.example.mealplanner;

import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;
import android.widget.ArrayAdapter;
import android.widget.ListView;
import android.widget.Toast;

import java.util.List;

public class ViewMeal extends AppCompatActivity {

    ListView listView;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_view_meal);

        listView=findViewById(R.id.food_list_meal);
        List<String> meal_list = RoomDB.getInstance(getApplicationContext()).mealsDao()
                .getAvailableMeals();
        String dummy = String.valueOf(RoomDB.getInstance(getApplicationContext()).foodsDao().numberOfRecordsInFoods());
        ArrayAdapter<String> arr = new ArrayAdapter<>(this, R.layout.support_simple_spinner_dropdown_item,meal_list);
        //Toast.makeText(getApplicationContext(),dummy,Toast.LENGTH_SHORT).show();
        listView.setAdapter(arr);

    }
}