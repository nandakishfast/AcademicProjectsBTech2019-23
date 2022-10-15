package com.example.mealplanner;

import android.app.DatePickerDialog;
import android.os.Bundle;

import androidx.fragment.app.DialogFragment;
import androidx.fragment.app.Fragment;
import androidx.fragment.app.FragmentManager;
import androidx.recyclerview.widget.GridLayoutManager;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.EditText;
import android.widget.TextView;

import com.google.android.material.floatingactionbutton.FloatingActionButton;

import java.util.ArrayList;
import java.util.Calendar;
import java.util.List;

public class PlannerFragment extends Fragment {

    ArrayList<MealTime> mealTimes;
    private String user_input_mealtime;
    FloatingActionButton add_parent,add_meal_time;
    EditText choose_date;
    TextView add_meal_text;
    Boolean isAllvisible;
    Calendar c = Calendar.getInstance();

    public PlannerFragment() {
        // Required empty public constructor
    }


    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        mealTimes = new ArrayList<>();
        mealTimes.add(new MealTime("Breakfast",""));
        mealTimes.add(new MealTime("Lunch",""));
        mealTimes.add(new MealTime("Dinner",""));
    }

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        // Inflate the layout for this fragment

        View view = inflater.inflate(R.layout.fragment_planner, container, false);
        RecyclerView myrv = (RecyclerView) view.findViewById(R.id.mealtimes);
        CustomAdapterAddMeal myAdapter = new CustomAdapterAddMeal(getContext(),mealTimes);
        LinearLayoutManager layout = new LinearLayoutManager(getContext(),LinearLayoutManager.VERTICAL,false);

        myrv.setLayoutManager(layout);
        myrv.setAdapter(myAdapter);

        add_parent=view.findViewById(R.id.add_fab);
        add_meal_time=view.findViewById(R.id.add_fab_sub);
        add_meal_text=view.findViewById(R.id.add_meal_text);
        choose_date=view.findViewById(R.id.add_date_plan);

        choose_date.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                new DatePickerDialog(getContext(),(DatePickerDialog.OnDateSetListener)getTargetFragment(),c
                        .get(Calendar.YEAR), c.get(Calendar.MONTH),
                        c.get(Calendar.DAY_OF_MONTH)).show();
            }
        });


        add_meal_time.setVisibility(View.GONE);
        add_meal_text.setVisibility(View.GONE);

        isAllvisible=false;

        add_parent.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                if(!isAllvisible){
                    add_meal_time.show();
                    add_meal_text.setVisibility(View.VISIBLE);
                    isAllvisible=true;
                }
                else {
                    add_meal_time.hide();
                    add_meal_text.setVisibility(View.GONE);
                    isAllvisible=false;
                }
            }
        });

        add_meal_time.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                FragmentManager fm = getActivity().getSupportFragmentManager();
                CustomDialogFragment customDialogFragment = CustomDialogFragment.newInstance("New Meal Time");
                customDialogFragment.show(fm,"cool");
                add_meal_time.hide();
                add_meal_text.setVisibility(View.GONE);
                isAllvisible=false;
            }
        });

        return view;
    }
}