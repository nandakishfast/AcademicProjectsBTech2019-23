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

public class CustomAdapterDays extends RecyclerView.Adapter<CustomAdapterDays.Viewholder> {

    private Context context;
    private ArrayList<WeekDays> weekDaysArrayList=null;

    // Constructor
    public CustomAdapterDays(Context context, ArrayList<WeekDays> courseModelArrayList) {
        this.context = context;
        this.weekDaysArrayList = courseModelArrayList;
    }

    @NonNull
    @Override
    public CustomAdapterDays.Viewholder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        // to inflate the layout for each item of recycler view.
        View view = LayoutInflater.from(parent.getContext()).inflate(R.layout.card_layout, parent, false);
        return new Viewholder(view);
    }

    @Override
    public void onBindViewHolder(@NonNull CustomAdapterDays.Viewholder holder, int position) {
        // to set data to textview and imageview of each card layout
        WeekDays model = weekDaysArrayList.get(position);
        holder.day.setText(model.getDay_name());
        holder.add.setImageResource(model.getAdd_image());
        holder.edit.setImageResource(model.getEdit_image());
    }

    @Override
    public int getItemCount() {
        // this method is used for showing number
        // of card items in recycler view.
        return weekDaysArrayList.size();
    }



    // View holder class for initializing of
    // your views such as TextView and Imageview.
    public class Viewholder extends RecyclerView.ViewHolder {
        private ImageButton add,edit;
        private TextView day;

        public Viewholder(@NonNull View itemView) {
            super(itemView);
            add = itemView.findViewById(R.id.add_meal);
            day = itemView.findViewById(R.id.weekday);
            edit = itemView.findViewById(R.id.edit_meal);
        }
    }
}
