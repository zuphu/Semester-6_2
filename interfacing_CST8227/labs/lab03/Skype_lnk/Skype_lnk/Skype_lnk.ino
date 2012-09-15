/* RGB LED Blink, Teensyduino Tutorial #2
   http://www.pjrc.com/teensy/tutorial2.html

   This example code is in the public domain.
*/

#define RED   0
#define BLUE  1
#define GREEN 2
#define TRI   3

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

  show_pcm();
  //green_blue_red_cycle();
  
}

void green_blue_red_cycle()
{
  int state = digitalRead(butt);
  int rand;
  
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
  static int colour_intensity = 0;
  static int current_colour = RED;
  static int state = LOW;
  

  if (firstPress == LOW)
  {
    if ((state = digitalRead(butt)) == HIGH)
    {
      firstPress = HIGH;
      while ((state = digitalRead(butt)) == HIGH)
        ;
    }
    
    switch (current_colour)
    {
      case RED:
        analogWrite(pwmRedPin, colour_intensity);
        break;
      case BLUE:
        analogWrite(pwmBluePin, colour_intensity);    
        break;
      case GREEN:
        analogWrite(pwmGreenPin, colour_intensity); 
        break;
      default:
         analogWrite(pwmRedPin, colour_intensity);
         analogWrite(pwmBluePin, colour_intensity); 
         analogWrite(pwmGreenPin, colour_intensity); 
    }
    
    if (colour_intensity == 255)
    {
      current_colour = (current_colour < 3) ? ++current_colour: 0;
      reset_colours();
    }
    colour_intensity = (colour_intensity < 255) ? ++colour_intensity : 0;
  }
  else
  {
    if ((state = digitalRead(butt)) == HIGH)
    {
      randomize();
      while ((state = digitalRead(butt)) == HIGH)
        ;
    }
  }
  delay(5);
}

void randomize()
{
   analogWrite(pwmRedPin, random(0, 256));
   analogWrite(pwmBluePin, random(0, 256)); 
   analogWrite(pwmGreenPin, random(0, 256)); 
}

void reset_colours()
{
  analogWrite(pwmRedPin, 0);
  analogWrite(pwmBluePin, 0);
  analogWrite(pwmGreenPin, 0);
}

