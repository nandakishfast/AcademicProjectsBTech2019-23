package com.example.mealplanner;

import androidx.room.Dao;
import androidx.room.Insert;
import androidx.room.Query;

import java.util.List;

@Dao
public interface DayDao {

    @Insert
    void insertAll(DayData... dayData);

    @Query("select day_name from day_table")
    List<String> getdays();
}
