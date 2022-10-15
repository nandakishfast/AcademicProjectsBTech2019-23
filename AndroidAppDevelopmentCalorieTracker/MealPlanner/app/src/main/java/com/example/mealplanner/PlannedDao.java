package com.example.mealplanner;

import androidx.room.Dao;
import androidx.room.Insert;
import androidx.room.Query;

import java.util.List;

@Dao
public interface PlannedDao {
    @Insert
    void insertAll(PlannedData... plannedData);

    @Query("select date_plan from planned_table order by date_plan,meal_id_plan,food_id_plan")
    List<String> getPlannedDays();

    /*@Query("select p.date_plan,f.food_name,m.meal_name,p.quantity_plan from planned_table p, foods_table f, meals_table m where p.food_id_plan=f.food_id and m.meal_id=p.meal_id_plan " +
            "order by p.date_plan,m.meal_name,f.food_name")
    List<String> getAllEvents();

    @Query("select p.date_plan,f.food_name,m.meal_name,p.quantity_plan from planned_table p, foods_table f, meals_table m where p.food_id_plan=f.food_id and m.meal_id=p.meal_id_plan and p.date_plan=:date +
            "order by p.date_plan,m.meal_name,f.food_name")
    List<String> getAllEvents(String date);
    */

    @Query("select p.date_plan from planned_table p, foods_table f, meals_table m where p.food_id_plan=f.food_id and m.meal_id=p.meal_id_plan " +
            "order by p.date_plan,m.meal_name,f.food_name")
    List<String> getAllEventsDate();

    @Query("select f.food_name from planned_table p, foods_table f, meals_table m where p.food_id_plan=f.food_id and m.meal_id=p.meal_id_plan " +
            "order by p.date_plan,m.meal_name,f.food_name")
    List<String> getAllEventsFood();

    @Query("select m.meal_name from planned_table p, foods_table f, meals_table m where p.food_id_plan=f.food_id and m.meal_id=p.meal_id_plan " +
            "order by p.date_plan,m.meal_name,f.food_name")
    List<String> getAllEventsMeal();

    @Query("select p.quantity_plan from planned_table p, foods_table f, meals_table m where p.food_id_plan=f.food_id and m.meal_id=p.meal_id_plan " +
            "order by p.date_plan,m.meal_name,f.food_name")
    List<Double> getAllEventsQuantity();

    @Query("select p.date_plan from planned_table p, foods_table f, meals_table m where p.food_id_plan=f.food_id and p.date_plan = :date_given and m.meal_id=p.meal_id_plan " +
            "order by p.date_plan,m.meal_name,f.food_name")
    List<String> getAllEventsDateOn(String date_given);

    @Query("select f.food_name from planned_table p, foods_table f, meals_table m where p.food_id_plan=f.food_id and p.date_plan = :date_given and m.meal_id=p.meal_id_plan " +
            "order by p.date_plan,m.meal_name,f.food_name")
    List<String> getAllEventsFoodOn(String date_given);

    @Query("select m.meal_name from planned_table p, foods_table f, meals_table m where p.food_id_plan=f.food_id and p.date_plan = :date_given and m.meal_id=p.meal_id_plan " +
            "order by p.date_plan,m.meal_name,f.food_name")
    List<String> getAllEventsMealOn(String date_given);

    @Query("select p.quantity_plan from planned_table p, foods_table f, meals_table m where p.food_id_plan=f.food_id and p.date_plan = :date_given and m.meal_id=p.meal_id_plan " +
            "order by p.date_plan,m.meal_name,f.food_name")
    List<Double> getAllEventsQuantityOn(String date_given);

    @Query("select (f.food_calorie * p.quantity_plan) from planned_table p, foods_table f, meals_table m where p.food_id_plan=f.food_id and p.date_plan = :date_given and m.meal_id=p.meal_id_plan " +
            "order by p.date_plan,m.meal_name,f.food_name")
    List<Double> getAllEventsCalorieOn(String date_given);

    @Query("select sum (cal) from (select (f.food_calorie * p.quantity_plan) as cal from planned_table p, foods_table f, meals_table m where p.food_id_plan=f.food_id and p.date_plan = :date_given and m.meal_id=p.meal_id_plan " +
            "order by p.date_plan,m.meal_name,f.food_name)")
    Double getAllEventsTotalCalorieOn(String date_given);

    @Query("select count(date_plan) from planned_table")
    int numberOfRecordsInPlanned();

    @Query("insert into planned_table(date_plan,food_id_plan,meal_id_plan,quantity_plan) " +
            "values (:date,:food,:meal,:quantity)")
    void insertMealsPlanned(String date, int food, int meal, double quantity);

    @Query("select count(date_plan) from planned_table where date_plan = :date and " +
            "food_id_plan = :food and meal_id_plan = :meal")
    int checkMealsInDBPlanned(String date, int food, int meal);

    @Query("update planned_table set quantity_plan = :quantity where date_plan = :date and " +
            "food_id_plan = :food and meal_id_plan = :meal")
    void updateMealsInDBPlanned(String date, int food, int meal, double quantity);

    @Query("delete from planned_table where date_plan = :date and " +
            "food_id_plan = :food and meal_id_plan = :meal")
    void deleteMealsInDBPlanned(String date, int food, int meal);

    //With date and meal_id
    @Query("select * from planned_table where date_plan = :date and meal_id_plan = :meal")
    List<PlannedData> getAllWithSpDateAndMealPlanned(String date, int meal);

    @Query("select date_plan from planned_table where date_plan = :date and meal_id_plan = :meal")
    List<String> getDateWithSpDateAndMealPlanned(String date, int meal);

    @Query("select food_id_plan from planned_table where date_plan = :date and meal_id_plan = :meal")
    List<Integer> getFoodWithSpDateAndMealPlanned(String date, int meal);

    @Query("select meal_id_plan from planned_table where date_plan = :date and meal_id_plan = :meal")
    List<Integer> getMealWithSpDateAndMealPlanned(String date, int meal);

    @Query("select quantity_plan from planned_table where date_plan = :date and meal_id_plan = :meal")
    List<Double> getQuantityWithSpDateAndMealPlanned(String date, int meal);

    // With only date
    @Query("select * from planned_table where date_plan = :date order by meal_id_plan")
    List<PlannedData> getAllWithSpDatePlanned(String date);

    @Query("select date_plan from planned_table where date_plan = :date order by meal_id_plan")
    List<String> getDateWithSpDatePlanned(String date);

    @Query("select food_id_plan from planned_table where date_plan = :date order by meal_id_plan")
    List<Integer> getFoodWithSpDatePlanned(String date);

    @Query("select meal_id_plan from planned_table where date_plan = :date order by meal_id_plan")
    List<Integer> getMealWithSpDatePlanned(String date);

    @Query("select quantity_plan from planned_table where date_plan = :date order by meal_id_plan")
    List<Double> getQuantityWithSpDatePlanned(String date);

    //calorie consumed

}
