package com.example.mealplanner;

import android.content.Context;

import androidx.annotation.NonNull;
import androidx.room.Dao;
import androidx.room.Database;
import androidx.room.Room;
import androidx.room.RoomDatabase;
import androidx.sqlite.db.SupportSQLiteDatabase;

import java.util.concurrent.Executors;

@Database(entities = {MainData.class,DayData.class,MealsData.class,PlannedData.class,FoodsData.class,ActualData.class},version = 1,exportSchema = false)
public abstract class RoomDB extends RoomDatabase {
    private String[] days = {"Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday"};
    private static RoomDB INSTANCE;

    public abstract DayDao dayDao();
    public abstract MainDao mainDao();
    public abstract MealsDao mealsDao();
    public abstract PlannedDao plannedDao();
    public abstract FoodsDao foodsDao();
    public abstract ActualDao actualDao();


    public synchronized static RoomDB getInstance(Context context) {
        if (INSTANCE == null) {
            INSTANCE = buildDatabase(context);
        }
        return INSTANCE;
    }

    private static RoomDB buildDatabase(final Context context) {
        return Room.databaseBuilder(context,
                RoomDB.class,
                "my-database")
                .allowMainThreadQueries()
                .addCallback(new Callback() {
                    @Override
                    public void onCreate(@NonNull SupportSQLiteDatabase db) {
                        super.onCreate(db);

                        Executors.newSingleThreadScheduledExecutor().execute(new Runnable() {
                            @Override
                            public void run() {
                                getInstance(context).dayDao().insertAll(DayData.populateData());
                            }
                        });
                    }
                })
                .build();
    }

}
