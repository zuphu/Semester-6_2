package com.example.myfirstapp;

import java.util.Random;

import android.app.Activity;
import android.content.Context;
import android.hardware.Camera.PreviewCallback;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

public class MainActivity extends Activity {
	public final static String EXTRA_MESSAGE = "SEXY TIME++";
	public final static String EXTRA_MESSAGE2 = "GOOP";
	Integer randomNumber;
	Random rand = new Random();
	
    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

    	randomNumber = rand.nextInt(10) + 1;
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        getMenuInflater().inflate(R.menu.activity_main, menu);
        return true;
    }
    
	public boolean onOptionsItemSelected(MenuItem item) {
      switch (item.getItemId()) {
      case R.id.oneTo9:
      	randomNumber = rand.nextInt(9) + 1;
            Toast.makeText(this, "You have chosen the 1-9 menu option",
                        Toast.LENGTH_SHORT).show();
            break;
      case R.id.oneTo99:
      	randomNumber = rand.nextInt(99) + 1;
          Toast.makeText(this, "You have chosen the 1-99 menu option",
                  Toast.LENGTH_SHORT).show();
    	  break;
      case R.id.oneTo999:
      	randomNumber = rand.nextInt(999) + 1;
          Toast.makeText(this, "You have chosen the 1-999 menu option",
                  Toast.LENGTH_SHORT).show();
    	  break;
      case R.id.oneTo9999:
      	randomNumber = rand.nextInt(9999) + 1;
          Toast.makeText(this, "You have chosen the 1-9999 menu option",
                  Toast.LENGTH_SHORT).show();
    	  break;
      case R.id.oneTo99999:
      	randomNumber = rand.nextInt(99999) + 1;
          Toast.makeText(this, "You have chosen the 1-99999 menu option",
                  Toast.LENGTH_SHORT).show();
    	  break;
      case R.id.oneTo999999:
      	randomNumber = rand.nextInt(999999) + 1;
          Toast.makeText(this, "You have chosen the 1-999999 menu option",
                  Toast.LENGTH_SHORT).show();
    	  break;
    	  
      case R.id.bigHint:
        	randomNumber = rand.nextInt(999999) + 1;
            Toast.makeText(this, "You have chosen the Big Hint menu option",
                    Toast.LENGTH_SHORT).show();
      	  break;
      	  
      case R.id.mediumHint:
          Toast.makeText(this, "You have chosen the Med Hint menu option",
                  Toast.LENGTH_SHORT).show();
    	  break;
    	  
      case R.id.smallHint:
          Toast.makeText(this, "You have chosen the small Hint menu option",
                  Toast.LENGTH_SHORT).show();
    	  break;
    	  
      default:
            return true;
      }
	return false;
	}
    
    public void Reset(View view) {
    	TextView em = (EditText)findViewById(R.id.edit_message);
    	TextView tv = (TextView)findViewById(R.id.txt_view);
    	TextView nog = (TextView) findViewById(R.id.numberOfGuesses);
    	TextView hol = (TextView) findViewById(R.id.highOrLow);
    	TextView pg = (TextView) findViewById(R.id.previousGuess);
    	
    	em.setText("");
    	tv.setText("[Stats]");
    	nog.setText("0");
    	hol.setText("None");
    	pg.setText("None");
    
    }
    
    public void Exit(View view) {
    	finish();
    	System.exit(0);
    }
    
    /** Called when the user clicks the Send button */
    public void sendMessage(View view) {
    	
    	String getGuess   = ((EditText)findViewById(R.id.edit_message)).getText().toString();
    	int numberOfGuess = Integer.parseInt(((TextView)findViewById(R.id.numberOfGuesses)).getText().toString());
    	
    	TextView em = (EditText)findViewById(R.id.edit_message);
    	TextView tv = (TextView)findViewById(R.id.txt_view);
    	TextView nog = (TextView) findViewById(R.id.numberOfGuesses);
    	TextView hol = (TextView) findViewById(R.id.highOrLow);
    	TextView pg = (TextView) findViewById(R.id.previousGuess);
    	
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
        	hol.setText("Perfect!");
        	Toast.makeText(context, "That's correct!", duration).show();
    	}
    	else if (guess < randomNumber)
    	{
        	Toast.makeText(context, "Number is higher!", duration).show();
        	hol.setText("Too Low");
    	}
    	else
    	{
    		Toast.makeText(context, "Number is lower!", duration).show();
        	hol.setText("Too High");
    	}
    	
    	//increment and set number of guesses
    	numberOfGuess++;
    	nog.setText(Integer.toString(numberOfGuess));
    	
    	//set the previous guess
    	pg.setText(getGuess);
    	
    	//clear the guess area
    	em.setText("");
    }
}
