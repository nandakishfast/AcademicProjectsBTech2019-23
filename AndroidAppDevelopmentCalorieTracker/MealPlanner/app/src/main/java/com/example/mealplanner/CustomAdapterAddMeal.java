package com.example.mealplanner;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageButton;
import android.widget.ImageView;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.recyclerview.widget.RecyclerView;

import java.util.ArrayList;

public class CustomAdapterAddMeal extends RecyclerView.Adapter<CustomAdapterAddMeal.Viewholder> {

    private Context context;
    private ArrayList<MealTime> mealTimes=null;

    // Constructor
    public CustomAdapterAddMeal(Context context, ArrayList<MealTime> mealTimeArrayList) {
        this.context = context;
        this.mealTimes = mealTimeArrayList;
    }

    @NonNull
    @Override
    public CustomAdapterAddMeal.Viewholder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        // to inflate the layout for each item of recycler view.
        View view = LayoutInflater.from(parent.getContext()).inflate(R.layout.card_layout_add_plan, parent, false);
        return new Viewholder(view);
    }

    @Override
    public void onBindViewHolder(@NonNull CustomAdapterAddMeal.Viewholder holder, int position) {
        // to set data to textview and imageview of each card layout
        MealTime model = mealTimes.get(position);
        holder.meal.setText(model.getMeal());
        holder.meal_name.setText(model.getMeal_name());
    }

    @Override
    public int getItemCount() {
        // this method is used for showing number
        // of card items in recycler view.
        return mealTimes.size();
    }



    // View holder class for initializing of
    // your views such as TextView and Imageview.
    public class Viewholder extends RecyclerView.ViewHolder {
        private TextView meal_name,meal;

        public Viewholder(@NonNull View itemView) {
            super(itemView);
            meal_name = itemView.findViewById(R.id.meal_time);
            meal = itemView.findViewById(R.id.meal_time_ed);
        }
    }
}
