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
  int i;
  
  for (i = 0; i < 20; ++i)
    pinMode(i, OUTPUT);

  for (i = 2; i < 20; ++i)
    analogWrite(i, HIGH);
}

// the loop() method runs over and over again,

void loop()                     
{
  //green_blue_red_cycle();
  
}
