package com.example.mealplanner;

import androidx.room.ColumnInfo;
import androidx.room.Entity;
import androidx.room.PrimaryKey;

@Entity(tableName = "meal_time_table")
public class MealTimeData {
    @PrimaryKey(autoGenerate = true)
    @ColumnInfo(name = "meal_time_id")
    int meal_time_id;

    @ColumnInfo(name = "meal_time_name")
    String meal_time_name;

    public MealTimeData(int meal_time_id, String meal_time_name) {
        this.meal_time_id = meal_time_id;
        this.meal_time_name = meal_time_name;
    }

    public int getMeal_time_id() {
        return meal_time_id;
    }

    public void setMeal_time_id(int meal_time_id) {
        this.meal_time_id = meal_time_id;
    }

    public String getMeal_time_name() {
        return meal_time_name;
    }

    public void setMeal_time_name(String meal_time_name) {
        this.meal_time_name = meal_time_name;
    }
}
