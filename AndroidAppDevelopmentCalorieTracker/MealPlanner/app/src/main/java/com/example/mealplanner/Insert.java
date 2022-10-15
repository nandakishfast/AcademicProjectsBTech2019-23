package com.example.mealplanner;

import androidx.appcompat.app.AppCompatActivity;

import android.app.DatePickerDialog;
import android.os.Bundle;
import android.view.View;
import android.widget.ArrayAdapter;
import android.widget.AutoCompleteTextView;
import android.widget.Button;
import android.widget.DatePicker;
import android.widget.EditText;
import android.widget.Toast;

import java.text.SimpleDateFormat;
import java.util.Calendar;
import java.util.List;
import java.util.Locale;

public class Insert extends AppCompatActivity implements DatePickerDialog.OnDateSetListener{

    AutoCompleteTextView food,meal;
    EditText choose_date,clicked,quantity;
    Button add;
    Calendar c = Calendar.getInstance();
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_insert);
        food = findViewById(R.id.food_insert);
        meal = findViewById(R.id.meal_time_insert);

        List<String> availableFoods = RoomDB.getInstance(getApplicationContext()).foodsDao()
                .getAvailableFoods();
        List<String> availableMeals = RoomDB.getInstance(getApplicationContext()).mealsDao()
                .getAvailableMeals();

        ArrayAdapter<String> adapterFood = new ArrayAdapter<String>
                (this,android.R.layout.select_dialog_item,availableFoods);

        ArrayAdapter<String> adapterMeal = new ArrayAdapter<String>
                (this,android.R.layout.select_dialog_item,availableMeals);

        food.setThreshold(1);
        food.setAdapter(adapterFood);

        meal.setThreshold(1);
        meal.setAdapter(adapterMeal);

        choose_date=findViewById(R.id.date_for_insert);

        choose_date.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                clicked=(EditText)view ;
                new DatePickerDialog(Insert.this,Insert.this,c
                        .get(Calendar.YEAR), c.get(Calendar.MONTH),
                        c.get(Calendar.DAY_OF_MONTH)).show();

            }
        });
        quantity = findViewById(R.id.quantity_insert);
        add = findViewById(R.id.insert_bt_in_class);
        add.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                String food_name=food.getText().toString();
                String date_entered=choose_date.getText().toString();
                String meal_name=meal.getText().toString();
                int flagHasError = 0;
                Double quant=0d;
                try{
                    quant = Double.parseDouble(quantity.getText().toString());
                }
                catch (Exception e){
                    flagHasError = 1;
                    Toast.makeText(getApplicationContext(),"Please enter a valid quantity",Toast.LENGTH_SHORT).show();
                }
                if(food_name.equals("")){
                    flagHasError = 1;
                    Toast.makeText(getApplicationContext(),"Please enter a food name",Toast.LENGTH_SHORT).show();
                }
                if(meal_name.equals("")){
                    flagHasError = 1;
                    Toast.makeText(getApplicationContext(),"Please enter a meal name",Toast.LENGTH_SHORT).show();
                }
                if(date_entered.equals("")){
                    flagHasError = 1;
                    Toast.makeText(getApplicationContext(),"Please select a date",Toast.LENGTH_SHORT).show();
                }
                if(quant<0){
                    flagHasError = 1;
                    Toast.makeText(getApplicationContext(),"Quantity can't be negative",Toast.LENGTH_SHORT).show();
                }
                if(flagHasError==0){
                    int meal_id = RoomDB.getInstance(getApplicationContext()).mealsDao().getMealIdWithName(meal_name);
                    int food_id = RoomDB.getInstance(getApplicationContext()).foodsDao().getFoodIdWithFoodName(food_name);

                    if(RoomDB.getInstance(getApplicationContext())
                            .plannedDao().checkMealsInDBPlanned(date_entered,food_id,meal_id)==1){

                        if(quant==0){
                            RoomDB.getInstance(getApplicationContext()).plannedDao()
                                    .deleteMealsInDBPlanned(date_entered,food_id,meal_id);
                            Toast.makeText(getApplicationContext(),"This item deleted",Toast.LENGTH_SHORT).show();
                        }
                        else{
                            RoomDB.getInstance(getApplicationContext()).plannedDao()
                                    .updateMealsInDBPlanned(date_entered,food_id,meal_id,quant);
                            Toast.makeText(getApplicationContext(),"This item updated",Toast.LENGTH_SHORT).show();
                        }
                    }
                    else {
                        if(quant==0){
                            Toast.makeText(getApplicationContext(),"Nothing eaten like that",Toast.LENGTH_SHORT).show();
                        }
                        else{
                            RoomDB.getInstance(getApplicationContext()).plannedDao()
                                    .insertMealsPlanned(date_entered,food_id,meal_id,quant);
                            Toast.makeText(getApplicationContext(),"This item inserted",Toast.LENGTH_SHORT).show();
                        }
                    }
                }
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