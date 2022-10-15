package com.example.mealplanner;

import androidx.room.ColumnInfo;
import androidx.room.Entity;
import androidx.room.ForeignKey;
import androidx.room.PrimaryKey;

@Entity(tableName = "meal_planner_table",foreignKeys = {
        @ForeignKey(entity = DateData.class,parentColumns = "date_id",childColumns = "DateID"),
        @ForeignKey(entity = MealTimeData.class,parentColumns = "meal_time_id",childColumns = "mealTimeID")
})
public class MealPlannerData {
    @PrimaryKey(autoGenerate = true)
    @ColumnInfo(name = "ID")
    int id;

    @ColumnInfo(name = "mealTimeID")
    int mealTimeID;

    @ColumnInfo(name = "DateID")
    int DateID;

    @ColumnInfo(name = "food")
    String food;

    public MealPlannerData(int id, int mealTimeID, int dateID, String food) {
        this.id = id;
        this.mealTimeID = mealTimeID;
        DateID = dateID;
        this.food = food;
    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public int getMealTimeID() {
        return mealTimeID;
    }

    public void setMealTimeID(int mealTimeID) {
        this.mealTimeID = mealTimeID;
    }

    public int getDateID() {
        return DateID;
    }

    public void setDateID(int dateID) {
        DateID = dateID;
    }

    public String getFood() {
        return food;
    }

    public void setFood(String food) {
        this.food = food;
    }
}
