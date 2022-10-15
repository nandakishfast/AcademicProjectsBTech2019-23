package com.example.mealplanner;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import android.os.Bundle;
import android.view.MenuItem;
import android.view.View;
import android.widget.LinearLayout;

import com.google.android.material.bottomnavigation.BottomNavigationView;

import java.util.ArrayList;
import java.util.List;

public class Planner extends AppCompatActivity implements BottomNavigationView.OnNavigationItemSelectedListener {

    BottomNavigationView bottomNavigationView;
    private RecyclerView weekdayRV;
    private ArrayList<WeekDays> weekDaysArrayList;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_planner);

//        weekdayRV=findViewById(R.id.idRVweekdays);
//        weekDaysArrayList = new ArrayList<>();
//        List<String> days=RoomDB.getInstance(getApplicationContext())
//                .dayDao()
//                .getdays();
//        for (int i=0;i<days.size();i++){
//            weekDaysArrayList.add(new WeekDays(days.get(i),R.drawable.ic_baseline_add_24,R.drawable.ic_baseline_edit_24));
//        }
//
//        CustomAdapterDays customAdapterDays = new CustomAdapterDays(this,weekDaysArrayList);
//        LinearLayoutManager layout = new LinearLayoutManager(this,LinearLayoutManager.VERTICAL,false);
//        weekdayRV.setLayoutManager(layout);
//        weekdayRV.setAdapter(customAdapterDays);

        bottomNavigationView=findViewById(R.id.bottomNavigationView);
        bottomNavigationView.setOnNavigationItemSelectedListener(this);
        bottomNavigationView.setSelectedItemId(R.id.add_plan);

    }
    PlannerFragment plannerFragment = new PlannerFragment();
    ViewPlan viewPlan = new ViewPlan();
    @Override
    public boolean onNavigationItemSelected(@NonNull MenuItem item) {
        switch (item.getItemId()){
            case R.id.add_plan:
                getSupportFragmentManager().beginTransaction().replace(R.id.flFragment,plannerFragment).commit();
                return true;
            case R.id.view_plans:
                getSupportFragmentManager().beginTransaction().replace(R.id.flFragment,viewPlan).commit();
        }
        return false;
    }
}