package com.example.mealplanner;

import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

public class AddMeal extends AppCompatActivity {

    EditText meal_name,meal_name_del,meal_name_ren_ori,meal_name_ren_new;
    Button add_m,delete_m,rename_m;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_add_meal);

        meal_name=findViewById(R.id.add_meal_name);
        add_m=findViewById(R.id.add_meal_bt_in_class);

        add_m.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                String name=meal_name.getText().toString();
                if(name.equals("")){
                    Toast.makeText(getApplicationContext(),"Please enter a meal",Toast.LENGTH_SHORT).show();
                }
                if(RoomDB.getInstance(getApplicationContext()).mealsDao()
                        .checkMealInDB(name)==1){

                    Toast.makeText(getApplicationContext(),"Meal already exists",Toast.LENGTH_SHORT).show();
                }
                else {
                    RoomDB.getInstance(getApplicationContext())
                            .mealsDao()
                            .insertMeals(name);
                    Toast.makeText(getApplicationContext(),"Meal has been added",Toast.LENGTH_SHORT).show();
                }
            }
        });

        meal_name_del = findViewById(R.id.delete_meal_name);
        delete_m = findViewById(R.id.delete_meal_bt_in_class);
        delete_m.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                String name=meal_name_del.getText().toString();
                if(name.equals("")){
                    Toast.makeText(getApplicationContext(),"Please enter a meal",Toast.LENGTH_SHORT).show();
                }
                if(RoomDB.getInstance(getApplicationContext())
                        .mealsDao().checkMealInDB(name)==1){
                    RoomDB.getInstance(getApplicationContext()).mealsDao()
                            .deleteMealWithMealName(name);
                    Toast.makeText(getApplicationContext(),"Meal has been deleted",Toast.LENGTH_SHORT).show();
                }
                else {
                    Toast.makeText(getApplicationContext(),"No such meal exists",Toast.LENGTH_SHORT).show();
                }
            }
        });

        meal_name_ren_ori = findViewById(R.id.rename_meal_name_ori);
        meal_name_ren_new = findViewById(R.id.rename_meal_name_new);
        rename_m = findViewById(R.id.rename_meal_bt_in_class);
        rename_m.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                String name_o=meal_name_ren_ori.getText().toString();
                String name_n=meal_name_ren_new.getText().toString();
                int flag_empty=0;
                if(name_o.equals("")){
                    flag_empty=1;
                    Toast.makeText(getApplicationContext(),"Please enter a original meal name",Toast.LENGTH_SHORT).show();
                }
                if(name_n.equals("")){
                    flag_empty=1;
                    Toast.makeText(getApplicationContext(),"Please enter a new meal name",Toast.LENGTH_SHORT).show();
                }
                if(flag_empty==0){
                    if(RoomDB.getInstance(getApplicationContext())
                            .mealsDao().checkMealInDB(name_o)==1){
                        int already_there = RoomDB.getInstance(getApplicationContext()).mealsDao().checkMealInDB(name_n);
                        if(already_there==1){
                            Toast.makeText(getApplicationContext(),"New meal name already in use. Use some other name",Toast.LENGTH_SHORT).show();
                        }
                        else {
                            RoomDB.getInstance(getApplicationContext()).mealsDao()
                                    .updateMealName(name_o, name_n);
                            Toast.makeText(getApplicationContext(), "Meal has been updated", Toast.LENGTH_SHORT).show();
                        }
                    }
                    else {
                        Toast.makeText(getApplicationContext(),"No such meal exists",Toast.LENGTH_SHORT).show();
                    }
                }
            }
        });
    }
}