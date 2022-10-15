package com.example.mealplanner;

import androidx.room.Dao;
import androidx.room.Insert;
import androidx.room.Query;
import androidx.room.Update;

import java.util.List;

@Dao
public interface FoodsDao {

    @Insert
    void insertAll(FoodsData... foodsData);

    @Query("select food_name from foods_table order by food_name")
    List <String> getAvailableFoods();

    @Query("select count(food_id) from foods_table where food_name = :food_name_given")
    int checkFoodInDB(String food_name_given);

    @Query("delete from foods_table where food_name = :food_name_given")
    void deleteFoodInDBWithFoodName(String food_name_given);

    @Query("update foods_table set food_calorie = :calorie_given where food_name = :food_name_given")
    void updateCalorie(String food_name_given, Double calorie_given);

    @Query("update foods_table set food_name = :food_name_change where food_name = :food_name_original")
    void updateFoodNameWithFoodName(String food_name_original, String food_name_change);

    @Query("insert into foods_table(food_name, food_calorie) values (:food_name_given,:calorie_given)")
    void insertFoodAndCal(String food_name_given, Double calorie_given);

    @Query("select count(meal_id) from meals_table")
    int numberOfRecordsInFoods();

    @Query("select food_name from foods_table where food_id = :id_given")
    String getFoodNameWithId(int id_given);

    @Query("select food_id from foods_table where food_name = :food_name_given")
    int getFoodIdWithFoodName(String food_name_given);

    @Query("select food_calorie from foods_table where food_id = :id_given")
    double getFoodCalorieWithId(int id_given);

    @Query("select food_calorie from foods_table where food_name = :food_name_given")
    double getFoodCalorieWithFoodName(String food_name_given);

    @Query("update foods_table set food_calorie = :calorie where food_id = :id_given")
    void updateFoodCalorieWithId(int id_given, double calorie);

    @Query("update foods_table set food_calorie = :calorie where food_name = :food_name_given")
    void updateFoodCalorieWithFoodName(String food_name_given, double calorie);

}
