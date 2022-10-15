package com.example.mealplanner;

import androidx.annotation.NonNull;
import androidx.room.ColumnInfo;
import androidx.room.Entity;
import androidx.room.PrimaryKey;

@Entity(tableName = "meals_table")
public class MealsData {

    @PrimaryKey(autoGenerate = true)
    @ColumnInfo(name = "meal_id")
    int meal_id;

    @NonNull
    @ColumnInfo(name = "meal_name")
    String meal_name;
}
