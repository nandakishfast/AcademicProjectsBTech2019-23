package com.example.mealplanner;


import androidx.room.ColumnInfo;
import androidx.room.Entity;
import androidx.room.PrimaryKey;

@Entity(tableName = "date_table")
public class DateData {
    @PrimaryKey(autoGenerate = true)
    @ColumnInfo(name = "date_id")
    int date_id;

    @ColumnInfo(name = "date_string")
    String date_string;

    public DateData(int date_id, String date_string) {
        this.date_id = date_id;
        this.date_string = date_string;
    }

    public int getDate_id() {
        return date_id;
    }

    public void setDate_id(int date_id) {
        this.date_id = date_id;
    }

    public String getDate_string() {
        return date_string;
    }

    public void setDate_string(String date_string) {
        this.date_string = date_string;
    }
}
