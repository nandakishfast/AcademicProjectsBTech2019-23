package com.example.mealplanner;

import androidx.annotation.NonNull;
import androidx.room.ColumnInfo;
import androidx.room.Entity;
import androidx.room.ForeignKey;

@Entity(tableName = "actual_table",foreignKeys = {
        @ForeignKey(
                entity = FoodsData.class,
                parentColumns = "food_id",
                childColumns = "food_id_actual"
        ),
        @ForeignKey(
                entity = MealsData.class,
                parentColumns = "meal_id",
                childColumns = "meal_id_actual"
        )
},primaryKeys = {"date_actual","food_id_actual","meal_id_actual"})
public class ActualData {

    @NonNull
    @ColumnInfo(name = "date_actual")
    String date_actual;

    @NonNull
    @ColumnInfo(name = "food_id_actual")
    int food_id_actual;

    @NonNull
    @ColumnInfo(name = "meal_id_actual")
    int food_name_actual;

    @NonNull
    @ColumnInfo(name = "quantity_actual")
    double quantity_actual;
}
