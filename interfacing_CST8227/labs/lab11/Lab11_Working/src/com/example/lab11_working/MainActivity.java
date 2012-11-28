/***
 * Student: Anthony Guevara
 * #:       040576821
 * Date:	Nov 28, 2012
 * Due:     Nov 28, 2012
 * Prof:    Michael Anderson
 * Class:   Interfacing
 */
//PACKAGE
package com.example.lab11_working;

//IMPORTS
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

//MAIN CLASS
public class MainActivity extends Activity {
	//Range 
	private enum range {
		oneTo9,
		oneTo99,
		oneTo999,
		oneTo9999,
		oneTo99999,
		oneTo999999,
		}
	//range values
	int[] rangeValue = {9, 99, 999, 9999, 99999, 999999};
	//start at 1 to 9
	range currentRange = range.oneTo9;
	//the random number to guess
	Integer randomNumber;
	//the random number generator
	Random rand = new Random();

	//init
	@Override
	public void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_main);
		randomNumber = rand.nextInt(9) + 1; //set the random number 
	}

	//options
	@Override
	public boolean onCreateOptionsMenu(Menu menu) {
		getMenuInflater().inflate(R.menu.activity_main, menu);
		return true;
	}

	//selected options
	public boolean onOptionsItemSelected(MenuItem item) {
		//get handles to views
		TextView cr = (TextView) (findViewById(R.id.currentRange));
		TextView tv = (TextView) findViewById(R.id.txt_view);
		
		switch (item.getItemId()) {

		//number menus
		case R.id.oneTo9:
			randomNumber = rand.nextInt(9) + 1;
			Toast.makeText(this, "Guess the number from 1-9.",
					Toast.LENGTH_SHORT).show();
			cr.setText("1-9");
			currentRange = range.oneTo9;
			break;
		case R.id.oneTo99:
			randomNumber = rand.nextInt(99) + 1;
			Toast.makeText(this, "Guess the number from 1-99.",
					Toast.LENGTH_SHORT).show();
			cr.setText("1-99");
			currentRange = range.oneTo99;
			break;
		case R.id.oneTo999:
			randomNumber = rand.nextInt(999) + 1;
			Toast.makeText(this, "Guess the number from 1-999.",
					Toast.LENGTH_SHORT).show();
			cr.setText("1-999");
			currentRange = range.oneTo999;
			break;
		case R.id.oneTo9999:
			randomNumber = rand.nextInt(9999) + 1;
			Toast.makeText(this, "Guess the number from 1-9,999.",
					Toast.LENGTH_SHORT).show();
			cr.setText("1-9,999");
			currentRange = range.oneTo9999;
			break;
		case R.id.oneTo99999:
			randomNumber = rand.nextInt(99999) + 1;
			Toast.makeText(this, "Guess the number from 1-99,999.",
					Toast.LENGTH_SHORT).show();
			cr.setText("1-99,999");
			currentRange = range.oneTo99999;
			break;
		case R.id.oneTo999999:
			randomNumber = rand.nextInt(999999) + 1;
			Toast.makeText(this, "Guess the number from 1-999,999",
					Toast.LENGTH_SHORT).show();
			cr.setText("1-999,999");
			currentRange = range.oneTo999999;
			break;

			//hints
		case R.id.bigHint:
			int rangeLow = randomNumber - rand.nextInt(3) * (currentRange.ordinal() + 1);
			int rangeHigh = randomNumber + rand.nextInt(3) * (currentRange.ordinal() + 1);
			Toast.makeText(this, "The number is between " + rangeLow + " and " + rangeHigh ,
					Toast.LENGTH_SHORT).show();
			tv.setText("The number is between " + rangeLow + " and " + rangeHigh);
			break;

		case R.id.mediumHint:
			int medRange = (rangeValue[currentRange.ordinal()] / 2) + 1;
			
			if (randomNumber > medRange)
			{
				Toast.makeText(this, "The number is greater than " + medRange,
						Toast.LENGTH_SHORT).show();
				tv.setText("The number is greater than " + medRange);
			}
			else
			{
				Toast.makeText(this, "The number is less than or equal to " + medRange,
						Toast.LENGTH_SHORT).show();
				tv.setText("The number is less than or equal to " + medRange);
			}
				
			break;

		case R.id.smallHint:
			int result = (randomNumber % 2);
			
			if (result == 0)
			{
				tv.setText("Small Hint: the number is even");
				Toast.makeText(this, "Hint: the number is even", Toast.LENGTH_SHORT).show();
			}
			else
			{
				tv.setText("Small Hint: the number is odd");
				Toast.makeText(this, "Hint: The number is odd", Toast.LENGTH_SHORT).show();
			}
			
			break;

		default:
			return true;
		}
		return false;
	}

	//reset all variables
	public void Reset(View view) {
		TextView em = (EditText) findViewById(R.id.edit_message);
		TextView tv = (TextView) findViewById(R.id.txt_view);
		TextView nog = (TextView) findViewById(R.id.numberOfGuesses);
		TextView hol = (TextView) findViewById(R.id.highOrLow);
		TextView pg = (TextView) findViewById(R.id.previousGuess);

		em.setText("");
		tv.setText("[Update Information]");
		nog.setText("0");
		hol.setText("None");
		pg.setText("None");
		
		switch (currentRange) {
		case oneTo9:
			randomNumber = rand.nextInt(9) + 1;
			break;
		case oneTo99:
			randomNumber = rand.nextInt(99) + 1;
			break;
		case oneTo999:
			randomNumber = rand.nextInt(999) + 1;
			break;
		case oneTo9999:
			randomNumber = rand.nextInt(9999) + 1;
			break;
		case oneTo99999:
			randomNumber = rand.nextInt(99999) + 1;
			break;
		case oneTo999999:
			randomNumber = rand.nextInt(999999) + 1;
			break;
		default:
			break;
		}
	}

	//exit
	public void Exit(View view) {
		finish();
		System.exit(0);
	}

	/** Called when the user clicks the Send button */
	public void sendMessage(View view) {
		//get values from views
		String getGuess = ((EditText) findViewById(R.id.edit_message))
				.getText().toString();
		int numberOfGuess = Integer
				.parseInt(((TextView) findViewById(R.id.numberOfGuesses))
						.getText().toString());

		//get handles to views
		TextView em = (EditText) findViewById(R.id.edit_message);
		TextView tv = (TextView) findViewById(R.id.txt_view);
		TextView nog = (TextView) findViewById(R.id.numberOfGuesses);
		TextView hol = (TextView) findViewById(R.id.highOrLow);
		TextView pg = (TextView) findViewById(R.id.previousGuess);

		int guess; //current guess from view

		try {
			guess = Integer.parseInt(getGuess);
		}

		catch (Exception e) {
			tv.setText("Please enter a valid number to guess!");
			return;
		}

		Context context = getApplicationContext();
		int duration = Toast.LENGTH_SHORT;

		//results of guess
		if (guess == randomNumber) {
			hol.setText("Perfect!");
			tv.setText("Press reset to play again.");
			Toast.makeText(context, "That's correct!", duration).show();
		} else if (guess < randomNumber) {
			Toast.makeText(context, "Number is higher!", duration).show();
			hol.setText("Too Low");
		} else {
			Toast.makeText(context, "Number is lower!", duration).show();
			hol.setText("Too High");
		}

		// increment and set number of guesses
		numberOfGuess++;
		nog.setText(Integer.toString(numberOfGuess));

		// set the previous guess
		pg.setText(getGuess);

		// clear the guess area
		em.setText("");
	}
}
