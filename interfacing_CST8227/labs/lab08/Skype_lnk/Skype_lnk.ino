#include <stdio.h>

#define ROW1     0
#define ROW2     1
#define ROW3     2
#define ROW4     3
#define NUM_ROWS 4

#define COL1     21
#define COL2     20
#define COL3     19
#define COL4     18
#define NUM_COLS 4 

const int rows[] = {ROW1, ROW2, ROW3, ROW4};
const int cols[] = {COL1, COL2, COL3, COL4};

//Patterns to draw
#define CIRCLE_SIZE 8
const int draw_circle[CIRCLE_SIZE][2] = { {COL2, ROW1}, {COL3, ROW1}, {COL1, ROW2}, {COL4, ROW2}, {COL1, ROW3}, {COL4, ROW3},  {COL2, ROW4}, {COL3, ROW4} };
#define SQUARE_SIZE 12
const int draw_square[SQUARE_SIZE][2] = { {COL1, ROW1}, {COL2, ROW1}, {COL3, ROW1}, {COL4, ROW1}, {COL1, ROW2}, {COL4, ROW2}, {COL1, ROW3}, {COL4, ROW3}, {COL1, ROW4}, {COL2, ROW4},
                                    {COL3, ROW4}, {COL4, ROW4} };
#define X_SIZE 8
const int draw_x[X_SIZE][8] = { {COL1, ROW1}, {COL4, ROW1}, {COL2, ROW2},  {COL3, ROW2}, {COL2, ROW3}, {COL3, ROW3}, {COL1, ROW4},{COL4, ROW4} };

#define Z_SIZE 10
const int draw_z[Z_SIZE][2] = { {COL1, ROW1}, {COL2, ROW1}, {COL3, ROW1}, {COL4, ROW1}, {COL3, ROW2}, {COL2, ROW3}, {COL1, ROW4}, {COL2, ROW4}, {COL3, ROW4}, {COL4, ROW4} };

void setup()
{
  Serial.begin(9600);
  Serial.flush();
  
  for (int i = 0; i < NUM_ROWS; ++i)
  {
    pinMode(rows[i], OUTPUT);
        digitalWrite(rows[i], HIGH);
  }
    
  for (int i = 0; i < NUM_COLS; ++i)
  {
    pinMode(cols[i], OUTPUT);
    digitalWrite(cols[i], LOW);
  }
}

void loop()
{
  int i = 0;
  boolean isNumber = false;
  char *tmpValue;
  static int value;
  int resetAll = 0;
  char commandbuffer[100];
  
    //Following serial code is from:
    //http://techie.wordpress.com/2010/02/12/arduino-setting-delay-time-via-serial-input/
    // Check to see if serial data is available.
    if (Serial.available() > 0)
    {   
      // (Re)set the value to zero.
      value = 0;
      // Append each byte to the delay value integer.
//      while(Serial.available() > 0)
//      {
//        value *= 10;
//        value += (Serial.read() - '0');
//        delay(1);
//      }    
//      Serial.println(value);

        if(Serial.available()){
           delay(100);
           while( Serial.available() && i< 99) {
              commandbuffer[i++] = Serial.read();
           }
           commandbuffer[i++]='\0';
        }
        
        if (value = atoi(commandbuffer))
        {
          isNumber = true;
        }
        else
        {
          isNumber = false;
        }
        
        resetAll = 1;
        
          if(i>0)
           Serial.println((char*)commandbuffer);    
          
          Serial.println(value);
          Serial.print("Is number?:");
          Serial.println(isNumber);     
    }
    
    if (resetAll)
    {
      setup(); 
    }
    
    if (isNumber)
    {
      switch(value)
      {
      case 0:
        digitalWrite(COL1, HIGH); digitalWrite(ROW1, LOW);
        break;
      case 1:
        digitalWrite(COL2, HIGH); digitalWrite(ROW1, LOW);
        break;
      case 2:
            digitalWrite(COL3, HIGH); digitalWrite(ROW1, LOW);
        break;
      case 3:
            digitalWrite(COL4, HIGH); digitalWrite(ROW1, LOW);
        break;
      case 4:
            digitalWrite(COL1, HIGH); digitalWrite(ROW2, LOW);
        break;
      case 5:
            digitalWrite(COL2, HIGH); digitalWrite(ROW2, LOW);
        break;
      case 6:
            digitalWrite(COL3, HIGH); digitalWrite(ROW2, LOW);
        break;
      case 7:
            digitalWrite(COL4, HIGH); digitalWrite(ROW2, LOW);
        break;
      case 8:
            digitalWrite(COL1, HIGH); digitalWrite(ROW3, LOW);
        break;
      case 9:
            digitalWrite(COL2, HIGH); digitalWrite(ROW3, LOW);
        break;
      }
    }
    else
    {
       if (strcmp(commandbuffer, "a,A") == 0)
       {
         digitalWrite(COL3, HIGH); digitalWrite(ROW3, LOW);
       }
       else if (strcmp(commandbuffer, "b,B") == 0)
       {
         digitalWrite(COL4, HIGH); digitalWrite(ROW3, LOW);        
       }
       else if (strcmp(commandbuffer, "c,C") == 0)
       {
         digitalWrite(COL1, HIGH); digitalWrite(ROW4, LOW);  
       }
       else if (strcmp(commandbuffer, "d,D") == 0)
       {
         digitalWrite(COL2, HIGH); digitalWrite(ROW4, LOW);  
       }
       else if (strcmp(commandbuffer, "e,E") == 0)
       {
         digitalWrite(COL3, HIGH); digitalWrite(ROW4, LOW);  
       }
       else if (strcmp(commandbuffer, "f,F") == 0)
       {
         digitalWrite(COL4, HIGH); digitalWrite(ROW4, LOW);  
       }
       else if (strcmp(commandbuffer, "m,M") == 0)
       {         
          for (int ii = 0; ii < NUM_ROWS; ++ii)
          {
            digitalWrite(cols[ii], HIGH);
            for (int iii = 0; iii < NUM_COLS; ++iii)
            {
              digitalWrite(rows[iii], LOW);
              delay(1);
              digitalWrite(rows[iii], HIGH);
            }
            digitalWrite(cols[ii], LOW);
            delay(1);
          }
      }
      else if (strcmp(commandbuffer, "o,O") == 0)
      {         
          for (int ii = 0; ii < CIRCLE_SIZE; ++ii)
          {
            digitalWrite(draw_circle[ii][0], HIGH);
            digitalWrite(draw_circle[ii][1], LOW);
            delay(1);
            digitalWrite(draw_circle[ii][0], LOW);
            digitalWrite(draw_circle[ii][1], HIGH);
          }
     }
     else if (strcmp(commandbuffer, "q,Q") == 0)
     {
       for (int ii = 0; ii < SQUARE_SIZE; ++ii)
          {
            digitalWrite(draw_square[ii][0], HIGH);
            digitalWrite(draw_square[ii][1], LOW);
            delay(1);
            digitalWrite(draw_square[ii][0], LOW);
            digitalWrite(draw_square[ii][1], HIGH);
          }
     }
     else if (strcmp(commandbuffer, "x,X") == 0)
     {
       for (int ii = 0; ii < X_SIZE; ++ii)
          {
            digitalWrite(draw_x[ii][0], HIGH);
            digitalWrite(draw_x[ii][1], LOW);
            delay(1);
            digitalWrite(draw_x[ii][0], LOW);
            digitalWrite(draw_x[ii][1], HIGH);
          }
     }
     else if (strcmp(commandbuffer, "z,Z") == 0)
     {
       for (int ii = 0; ii < Z_SIZE; ++ii)
          {
            digitalWrite(draw_z[ii][0], HIGH);
            digitalWrite(draw_z[ii][1], LOW);
            delay(1);
            digitalWrite(draw_z[ii][0], LOW);
            digitalWrite(draw_z[ii][1], HIGH);
          }
     }
     else if (strcmp(commandbuffer, "s,S") == 0)
     {
       Serial.println("ssslower");
     }
     else if (strcmp(commandbuffer, "f,F") == 0)
     {
       Serial.println("fffastr");
     }
   }
    
    if (value == 50)
    {
      Serial.println("Sexy");
    }

    delay(5);
} 
