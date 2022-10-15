package com.example.mealplanner;

public class WeekDays {
    private String day_name;
    private int add_image;
    private int edit_image;

    public WeekDays(String day_name, int add_image, int edit_image) {
        this.day_name = day_name;
        this.add_image = add_image;
        this.edit_image = edit_image;
    }

    public String getDay_name() {
        return day_name;
    }

    public void setDay_name(String day_name) {
        this.day_name = day_name;
    }

    public int getAdd_image() {
        return add_image;
    }

    public void setAdd_image(int add_image) {
        this.add_image = add_image;
    }

    public int getEdit_image() {
        return edit_image;
    }

    public void setEdit_image(int edit_image) {
        this.edit_image = edit_image;
    }
}
