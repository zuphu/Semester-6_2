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

/* Name: Anthony Guevara
 * Number: 040576821
 * Submitted: Nov 14, 2012
 * Lab #: 10
 * Lab: Guess A Number
 * 
 * Main activity class
 */
public class MainActivity extends Activity {
	Integer randomNumber;
	
	//setup
    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
    	Random rand = new Random();
    	randomNumber = rand.nextInt(10) + 1;
    }

    //options menu
    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        getMenuInflater().inflate(R.menu.activity_main, menu);
        return true;
    }
    
    /** Called when the user clicks the Send button */
    public void sendMessage(View view) {
    	//handle to getGuessText
    	EditText getGuessText = ((EditText)findViewById(R.id.edit_message));
    	
    	//text that was entered in getGuess
    	String getGuess = ((EditText)findViewById(R.id.edit_message)).getText().toString();
    	
    	//handle to update messages txt_view
    	TextView tv = (TextView)findViewById(R.id.txt_view);
    	int guess;
    	
    	//parse input
    	try
    	{
    		guess = Integer.parseInt(getGuess);
    	}
    	//input is not a number
    	catch(Exception e)
    	{
    		tv.setText("Please enter a valid number to guess!");
    		return;
    	}
    	
    	
    	//toast message setup
    	Context context = getApplicationContext();
    	int duration = Toast.LENGTH_SHORT;

    	//Check if number guessed is correct or not
    	if (guess == randomNumber)
    	{
        	Toast.makeText(context, "That's correct!", duration).show();
        	finish();
    	}
    	else if (guess < 0)
    	{
        	Toast.makeText(context, "Number must be positive!", duration).show();
        	tv.setText("Number must be positive");
    	}
    	else if (guess > 10)
    	{
        	Toast.makeText(context, "Number must be less than 10!", duration).show();
        	tv.setText("Number is too high!");
    	}
    	else if (guess < randomNumber)
    	{
        	Toast.makeText(context, "Number is higher!", duration).show();
        	tv.setText("Number is higher");
    	}
    	else
    	{
    		Toast.makeText(context, "Number is lower!", duration).show();
        	tv.setText("Number must is lower");
    	}
    	
    	//reset EditText field after a guess
    	getGuessText.setText("");
    }
}
