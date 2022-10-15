package com.example.mealplanner;

import androidx.annotation.NonNull;
import androidx.room.ColumnInfo;
import androidx.room.Entity;
import androidx.room.PrimaryKey;

@Entity(tableName = "foods_table")
public class FoodsData {

    @PrimaryKey(autoGenerate = true)
    @ColumnInfo(name = "food_id")
    int food_id;
    
    @NonNull
    @ColumnInfo(name = "food_name")
    String food_name;

    @NonNull
    @ColumnInfo(name = "food_calorie")
    double food_calorie;
}
