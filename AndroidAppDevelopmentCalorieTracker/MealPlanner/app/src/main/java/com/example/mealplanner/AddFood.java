package com.example.mealplanner;

import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

public class AddFood extends AppCompatActivity {

    EditText food_name,food_cal,food_name_del,food_name_ren_ori,food_name_ren_new;
    Button add,delete,rename;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_add_food);

        food_cal=findViewById(R.id.add_food_calories);
        food_name=findViewById(R.id.add_food_name);
        add=findViewById(R.id.add_food_bt_in_class);

        add.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                String name=food_name.getText().toString();
                Double cal=0d;
                try{
                    cal = Double.parseDouble(food_cal.getText().toString());
                }
                catch (Exception e){
                    Toast.makeText(getApplicationContext(),"Please enter a valid number",Toast.LENGTH_SHORT).show();
                }
                if(name.equals("")){
                    Toast.makeText(getApplicationContext(),"Please enter a food",Toast.LENGTH_SHORT).show();
                }
                if(RoomDB.getInstance(getApplicationContext())
                        .foodsDao().checkFoodInDB(name)==1){
                    RoomDB.getInstance(getApplicationContext()).foodsDao()
                            .updateFoodCalorieWithFoodName(name,cal);
                    Toast.makeText(getApplicationContext(),"Food calorie has been updated",Toast.LENGTH_SHORT).show();
                }
                else {
                    RoomDB.getInstance(getApplicationContext())
                            .foodsDao()
                            .insertFoodAndCal(name,cal);
                    Toast.makeText(getApplicationContext(),"Food has been added",Toast.LENGTH_SHORT).show();
                }
            }
        });

        food_name_del = findViewById(R.id.delete_food_name);
        delete = findViewById(R.id.delete_food_bt_in_class);
        delete.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                String name=food_name_del.getText().toString();
                if(name.equals("")){
                    Toast.makeText(getApplicationContext(),"Please enter a food",Toast.LENGTH_SHORT).show();
                }
                if(RoomDB.getInstance(getApplicationContext())
                        .foodsDao().checkFoodInDB(name)==1){
                    RoomDB.getInstance(getApplicationContext()).foodsDao()
                            .deleteFoodInDBWithFoodName(name);
                    Toast.makeText(getApplicationContext(),"Food has been deleted",Toast.LENGTH_SHORT).show();
                }
                else {
                    Toast.makeText(getApplicationContext(),"No such food exists",Toast.LENGTH_SHORT).show();
                }
            }
        });

        food_name_ren_ori = findViewById(R.id.rename_food_name_ori);
        food_name_ren_new = findViewById(R.id.rename_food_name_new);
        rename = findViewById(R.id.rename_food_bt_in_class);
        rename.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                String name_o=food_name_ren_ori.getText().toString();
                String name_n=food_name_ren_new.getText().toString();
                int flag_empty=0;
                if(name_o.equals("")){
                    flag_empty=1;
                    Toast.makeText(getApplicationContext(),"Please enter a original food name",Toast.LENGTH_SHORT).show();
                }
                if(name_n.equals("")){
                    flag_empty=1;
                    Toast.makeText(getApplicationContext(),"Please enter a new food name",Toast.LENGTH_SHORT).show();
                }
                if(flag_empty==0){
                    if(RoomDB.getInstance(getApplicationContext())
                            .foodsDao().checkFoodInDB(name_o)==1){
                        int already_there = RoomDB.getInstance(getApplicationContext()).foodsDao().checkFoodInDB(name_n);
                        if(already_there==1){
                            Toast.makeText(getApplicationContext(),"New food name already in use. Use some other name",Toast.LENGTH_SHORT).show();
                        }
                        else {
                            RoomDB.getInstance(getApplicationContext()).foodsDao()
                                    .updateFoodNameWithFoodName(name_o, name_n);
                            Toast.makeText(getApplicationContext(), "Food has been updated", Toast.LENGTH_SHORT).show();
                        }
                    }
                    else {
                        Toast.makeText(getApplicationContext(),"No such food exists",Toast.LENGTH_SHORT).show();
                    }
                }
            }
        });
    }
}