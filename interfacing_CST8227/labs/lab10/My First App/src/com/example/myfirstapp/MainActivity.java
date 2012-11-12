package com.example.myfirstapp;

import java.util.Random;

import android.app.Activity;
import android.content.Context;
import android.os.Bundle;
import android.view.Menu;
import android.view.View;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

public class MainActivity extends Activity {
	public final static String EXTRA_MESSAGE = "SEXY TIME++";
	public final static String EXTRA_MESSAGE2 = "GOOP";
	Integer randomNumber;
	
    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
    	Random rand = new Random();
    	randomNumber = rand.nextInt(10) + 1;
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        getMenuInflater().inflate(R.menu.activity_main, menu);
        return true;
    }
    
    /** Called when the user clicks the Send button */
    public void sendMessage(View view) {
    	
    	String getGuess = ((EditText)findViewById(R.id.edit_message)).getText().toString();
    	
    	TextView tv = (TextView)findViewById(R.id.txt_view);
    	int guess;
    	
    	try
    	{
    		guess = Integer.parseInt(getGuess);
    	}
    	
    	catch(Exception e)
    	{
    		tv.setText("Please enter a valid number to guess!");
    		return;
    	}
    	

    	Context context = getApplicationContext();
    	int duration = Toast.LENGTH_SHORT;

    	if (guess == randomNumber)
    	{
        	Toast.makeText(context, "That's correct!", duration).show();
    	}
    	else if (guess < randomNumber)
    	{
        	Toast.makeText(context, "Number is higher!", duration).show();
    	}
    	else
    	{
    		Toast.makeText(context, "Number is lower!", duration).show();
    	}

    	
    	
//        Intent intent = new Intent(this, DisplayMessageActivity.class);
//        EditText editText = (EditText) findViewById(R.id.edit_message);
//        String message = editText.getText().toString();
//        intent.putExtra(EXTRA_MESSAGE, message);
//        startActivity(intent);
    }
}
