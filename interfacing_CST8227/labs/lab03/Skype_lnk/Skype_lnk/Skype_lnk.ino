/* RGB LED Blink, Teensyduino Tutorial #2
   http://www.pjrc.com/teensy/tutorial2.html

   This example code is in the public domain.
*/

const int redPin   =  0;
const int bluePin  =  1;
const int greenPin =  2;

const int pwmRedPin = 12;   //D7
const int pwmBluePin = 14;  //B5
const int pwmGreenPin = 15; //B4

static int firstPress = LOW;
int colour;

const int butt = 21; //F0
// The setup() method runs once, when the sketch starts

void setup()   {
  // initialize the digitals pin as an outputs
  pinMode(redPin, OUTPUT);
  pinMode(bluePin, OUTPUT);
  pinMode(greenPin, OUTPUT);
  pinMode(pwmRedPin, OUTPUT);
  pinMode(pwmBluePin, OUTPUT);
  pinMode(pwmGreenPin, OUTPUT);
  pinMode(butt, INPUT);
}

// the loop() method runs over and over again,

void loop()                     
{
  int state = digitalRead(butt);
  int rand;
  //show_pcm();
  digitalWrite(redPin, LOW);
  digitalWrite(bluePin, LOW);
  digitalWrite(greenPin, LOW);
  
  if (state == HIGH)
  {
   while ((state = digitalRead(butt)) == HIGH)
        ;
    if (firstPress == HIGH)
       colour = random (1, 4);
    firstPress = HIGH;
  }  

  if (firstPress == LOW)
  {
    if (firstPress == LOW)
      digitalWrite(redPin, HIGH);
    delay(500);
    if ((state = digitalRead(butt)) == HIGH)
    {
      colour = 1;
      firstPress = HIGH;
      while ((state = digitalRead(butt)) == HIGH)
        ;
    }

    if (firstPress == LOW)
    {
      digitalWrite(redPin, LOW);
      digitalWrite(bluePin, HIGH);
    }
    
    delay(500);
    
    if ((state = digitalRead(butt)) == HIGH)
    {
      colour = 2;
      firstPress = HIGH;
      while ((state = digitalRead(butt)) == HIGH)
        ;
    }
    
    if (firstPress == LOW)
    {
      digitalWrite(bluePin, LOW);
      digitalWrite(greenPin, HIGH);
    }
    delay(500);
    if ((state = digitalRead(butt)) == HIGH)
    {
      colour = 3;
      firstPress = HIGH;
      while ((state = digitalRead(butt)) == HIGH)
        ;
    }
    
    if (firstPress == LOW)
    {
      digitalWrite(greenPin, LOW);
    }
  }
  else
  {
    switch(colour)
    {
      case 1:
        digitalWrite(redPin, HIGH);
        break;
      case 2:
        digitalWrite(bluePin, HIGH);   
        break;
      case 3:
        digitalWrite(greenPin, HIGH);      
        break;
    }
  }
}

void show_pcm()
{
  int i;
  
  for (i = 0; i < 255; ++i)
  {
    analogWrite(pwmRedPin, i);
    delay(5);
  }
  digitalWrite(pwmRedPin, LOW);
  for (i = 0; i < 255; ++i)
  {
    analogWrite(pwmBluePin, i);
    delay(5);
  }
  digitalWrite(pwmBluePin, LOW);
  for (i = 0; i < 255; ++i)
  {
    analogWrite(pwmGreenPin, i);
    delay(5);
  }
  digitalWrite(pwmGreenPin, LOW);
  
  for (i = 0; i < 255; ++i)
  {
    analogWrite(pwmRedPin,   i);
    analogWrite(pwmBluePin,  i);
    analogWrite(pwmGreenPin, i);
    delay(5);
  }
}

