package com.example.mealplanner;

import androidx.room.Dao;
import androidx.room.Insert;
import androidx.room.Query;

@Dao
public interface MainDao {

    @Insert
    void insert(MainData mainData);

    @Query("select sum(calories) from calorie_table where date between :date1 and :date2")
    int getWeeklyCalorie(String date1,String date2);

}
