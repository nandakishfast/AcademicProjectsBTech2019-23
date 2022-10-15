package com.example.mealplanner;

import androidx.room.Dao;
import androidx.room.Insert;
import androidx.room.Query;

import java.util.List;

@Dao
public interface ActualDao {
    @Insert
    void insertAll(ActualData... actualData);

    @Query("select date_actual from actual_table order by date_actual")
    List<String> getFilledDates();
}
