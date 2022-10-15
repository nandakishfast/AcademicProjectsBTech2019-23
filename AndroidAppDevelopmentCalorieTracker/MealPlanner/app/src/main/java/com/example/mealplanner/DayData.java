package com.example.mealplanner;

import androidx.room.ColumnInfo;
import androidx.room.Entity;
import androidx.room.PrimaryKey;

@Entity(tableName = "day_table")
public class DayData {
    @PrimaryKey(autoGenerate = false)
    @ColumnInfo(name = "day_id")
    int day_id;

    @ColumnInfo(name = "day_name")
    String day;

    public DayData(int day_id, String day) {
        this.day_id = day_id;
        this.day = day;
    }

    public int getDay_id() {
        return day_id;
    }

    public void setDay_id(int day_id) {
        this.day_id = day_id;
    }

    public String getDay() {
        return day;
    }

    public void setDay(String day) {
        this.day = day;
    }

    public static DayData[] populateData() {

        return new DayData[] {
                new DayData(1,"Monday"),
                new DayData(2,"Tuesday"),
                new DayData(3,"Wednesday"),
                new DayData(4,"Thursday"),
                new DayData(5,"Friday"),
                new DayData(6,"Saturday"),
                new DayData(7,"Sunday")
        };
    }
}
