package com.example.mealplanner;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.Toast;

import java.util.List;

public class MainActivity extends AppCompatActivity implements View.OnClickListener {
    Button planner,calorie,add_food_bt,view_food_bt,add_meal_bt,view_meal_bt,insert_bt,view_all_bt,view_all_on_bt;
    List<String> days;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        view_food_bt=findViewById(R.id.view_food_bt);
        planner=findViewById(R.id.planner);
        calorie=findViewById(R.id.calorie);
        planner.setOnClickListener(this);
        calorie.setOnClickListener(this);

        view_food_bt.setOnClickListener(this);
        add_food_bt=findViewById(R.id.add_food_bt);
        add_food_bt.setOnClickListener(this);

        view_meal_bt=findViewById(R.id.view_meal_bt);
        view_meal_bt.setOnClickListener(this);
        add_meal_bt=findViewById(R.id.add_meal_bt);
        add_meal_bt.setOnClickListener(this);
        insert_bt=findViewById(R.id.insert_bt);
        insert_bt.setOnClickListener(this);

        view_all_bt=findViewById(R.id.view_all_ui);
        view_all_bt.setOnClickListener(this);

        view_all_on_bt=findViewById(R.id.view_all_ui_on);
        view_all_on_bt.setOnClickListener(this);

    }

    public void onClick(View view){
        if(view.getId()==R.id.planner){
            startActivity(new Intent(MainActivity.this,Planner.class));
        }
        else if(view.getId()==R.id.calorie){
            startActivity(new Intent(MainActivity.this,CalorieActivity.class));
        }
        else if(view.getId()==R.id.add_food_bt){
            startActivity(new Intent(MainActivity.this,AddFood.class));
        }
        else if(view.getId()==R.id.view_food_bt){
            startActivity(new Intent(MainActivity.this,ViewFood.class));
        }
        else if(view.getId()==R.id.add_meal_bt){
            startActivity(new Intent(MainActivity.this,AddMeal.class));
        }
        else if(view.getId()==R.id.view_meal_bt){
            startActivity(new Intent(MainActivity.this,ViewMeal.class));
        }
        else if(view.getId()==R.id.insert_bt){
            startActivity(new Intent(MainActivity.this,Insert.class));
        }
        else if(view.getId()==R.id.view_all_ui){
            startActivity(new Intent(MainActivity.this,ViewEat.class));
        }
        else if(view.getId()==R.id.view_all_ui_on){
            startActivity(new Intent(MainActivity.this,ViewEatOn.class));
        }
    }
}