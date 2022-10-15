package com.example.mealplanner;

import androidx.annotation.NonNull;
import androidx.room.ColumnInfo;
import androidx.room.Entity;
import androidx.room.ForeignKey;
import androidx.room.PrimaryKey;

@Entity(tableName = "planned_table",foreignKeys = {
        @ForeignKey(
                entity = FoodsData.class,
                parentColumns = "food_id",
                childColumns = "food_id_plan"
        ),
        @ForeignKey(
                entity = MealsData.class,
                parentColumns = "meal_id",
                childColumns = "meal_id_plan"
        )
},primaryKeys = {"date_plan","food_id_plan","meal_id_plan"})
public class PlannedData {

    @NonNull
    @ColumnInfo(name = "date_plan")
    String date_plan;

    @NonNull
    @ColumnInfo(name = "food_id_plan")
    int food_id_plan;

    @NonNull
    @ColumnInfo(name = "meal_id_plan")
    int food_name_plan;

    @NonNull
    @ColumnInfo(name = "quantity_plan")
    double quantity_plan;
}
