package com.example.mealplanner;

public class MealTime {
    private String meal_name;
    private String meal;

    public MealTime(String meal_name, String meal) {
        this.meal_name = meal_name;
        this.meal = meal;
    }

    public String getMeal_name() {
        return meal_name;
    }

    public void setMeal_name(String meal_name) {
        this.meal_name = meal_name;
    }

    public String getMeal() {
        return meal;
    }

    public void setMeal(String meal) {
        this.meal = meal;
    }
}
