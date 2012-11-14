package com.example.myfirstapp;

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.widget.TextView;


public class DisplayMessageActivity extends Activity {
    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);

        // Get the message from the intent
        Intent intent = getIntent();

        // Create the text view
        TextView textView = new TextView(this);
        textView.setTextSize(40);

        // Set the text view as the activity layout
        setContentView(textView);
    }
}
