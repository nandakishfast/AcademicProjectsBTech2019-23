package com.example.mealplanner;

import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.room.ColumnInfo;
import androidx.room.Entity;
import androidx.room.PrimaryKey;

@Entity(tableName = "calorie_table")
public class MainData {
    @NonNull
    @PrimaryKey(autoGenerate = false)
    @ColumnInfo(name = "date")
    String date;

    @ColumnInfo(name = "calories")
    int calorie;

    public MainData(String date, int calorie) {
        this.date = date;
        this.calorie = calorie;
    }

    public String getDate() {
        return date;
    }

    public void setDate(String date) {
        this.date = date;
    }

    public int getCalorie() {
        return calorie;
    }

    public void setCalorie(int calorie) {
        this.calorie = calorie;
    }
}
