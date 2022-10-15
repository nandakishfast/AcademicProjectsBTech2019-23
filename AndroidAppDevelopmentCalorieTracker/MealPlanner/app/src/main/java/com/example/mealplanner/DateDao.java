package com.example.mealplanner;

import androidx.room.Dao;
import androidx.room.Insert;

@Dao
public interface DateDao {
    @Insert
    void insert(DateData dateData);
}
