package com.example.mealplanner;

import androidx.room.Dao;
import androidx.room.Insert;
import androidx.room.Query;

import java.util.List;

@Dao
public interface MealTimeDao {
    @Insert
    void insert(MealTimeData mealTimeData);

    @Query("select meal_time_name from meal_time_table")
    List<String> getMealTimes();
}
