package com.example.mealplanner;

import androidx.room.Dao;
import androidx.room.Insert;
import androidx.room.Query;

import java.util.List;

@Dao
public interface MealsDao {
    @Insert
    void insertAll(MealsData... mealsData);

    @Query("select meal_name from meals_table order by meal_id")
    List<String> getAvailableMeals();

    @Query("select count(meal_id) from meals_table where meal_name = :meal_name_given")
    int checkMealInDB(String meal_name_given);

    @Query("update meals_table set meal_name = :meal_name_given_update where meal_name = :food_name_given_original")
    void updateMealName(String food_name_given_original, String meal_name_given_update);

    @Query("delete from meals_table where meal_name = :meal_name_given")
    void deleteMealWithMealName(String meal_name_given);

    @Query("insert into meals_table(meal_name) values (:meal_name_given)")
    void insertMeals(String meal_name_given);

    @Query("select count(meal_id) from meals_table")
    int numberOfRecordsInMeals();

    @Query("select meal_name from meals_table where meal_id = :id_given")
    String getMealNameWithId(int id_given);

    @Query("select meal_id from meals_table where meal_name = :meal_name_given")
    int getMealIdWithName(String meal_name_given);

}
