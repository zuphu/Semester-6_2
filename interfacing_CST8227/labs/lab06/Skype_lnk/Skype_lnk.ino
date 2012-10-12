byte seven_seg_digits[10][8] = { { 0,0,0,0,0,0,1,1 },   // = 0
                                 { 1,0,0,1,1,1,1,1 },  // = 1
                                 { 0,0,1,0,0,1,0,1 },  // = 2
                                 { 0,0,0,0,1,1,0,1 },  // = 3
                                 { 1,0,0,1,1,0,0,1 },  // = 4
                                 { 0,1,0,0,1,0,0,1 },  // = 5
                                 { 0,1,0,0,0,0,0,1 },  // = 6
                                 { 0,0,0,1,1,1,1,1 },  // = 7
                                 { 0,0,0,0,0,0,0,1 },  // = 8
                                 { 0,0,0,0,1,0,0,1 }};  // = 9

int pwmPins[] = {4, 5, 9, 10, 12, 14, 15};

#define DISPLAY2 21
#define DISPLAY1 20
#define READPIN  2    //(Analog)
#define LEDPIN   11
#define DECIMALPIN 6

long previousMillis = 0;

int latchPin = 1; //Pin connected to Pin 12 of 74HC595 (Latch)
int clockPin = 2; //Pin connected to Pin 11 of 74HC595 (Clock)
int dataPin = 0; //Pin connected to Pin 14 of 74HC595 (Data)

unsigned int elapsedTime = 0;
  
static int counter = 0;
static int iii = 0;
  
boolean shiftup = true;
boolean countup = true;

void setup() {
  pinMode(DISPLAY1, OUTPUT);
  digitalWrite(DISPLAY1, HIGH );
  pinMode(DISPLAY2, OUTPUT);
  digitalWrite(DISPLAY2, HIGH );
  
  //set pins to output
  pinMode(latchPin, OUTPUT);
  pinMode(clockPin, OUTPUT);
  pinMode(dataPin, OUTPUT);
  
  pinMode(8, OUTPUT);
  digitalWrite(8, HIGH);
  
  pinMode(3, INPUT_PULLUP);
  digitalWrite(3, HIGH);
  
  pinMode(pwmPins[0], OUTPUT);
  pinMode(pwmPins[1], OUTPUT);
  pinMode(pwmPins[2], OUTPUT);
  pinMode(pwmPins[3], OUTPUT);
  pinMode(pwmPins[4], OUTPUT);
  pinMode(pwmPins[5], OUTPUT);
  pinMode(pwmPins[6], OUTPUT);
  pinMode(DECIMALPIN, OUTPUT);
  pinMode(LEDPIN, OUTPUT);
  
  Serial.begin(9600);
}

void loop() {
  int readme;
  int readresult;
  int digit1 = 0, digit2 = 0;
  boolean decimal = false;
  
  static int iiii = 0;
  
  unsigned int timer = millis();

  static int i = 0;
  

  
  readme = analogRead(READPIN);
  
  readresult = 500L * (long)analogRead(READPIN) / 1023L;
  
  digit1 = readresult / 100;
  digit2 = (readresult - digit1 * 100);
  Serial.println(readresult);
  Serial.print(digit1);
  Serial.print(".");
  Serial.println(digit2);
  
  if (digit1 > 0)
  {
    decimal = true;
    digitalWrite(LEDPIN, LOW);
    digit2 /= 10;
  }
  else
  {
    decimal = false;  
    digitalWrite(LEDPIN, HIGH);
    digit1 = digit2 / 10;
    digit2 = digit2 - (digit1 * 10);
  }
    
  if (i == 15)
  {
    shiftup = !shiftup;
    i = 0;
    if (countup)
    {
      iii = 9;
      counter = 9;
    }
    else
    {
      iii = 0;
      counter = 0;
    }
  }
    
  if (timer - elapsedTime > 500) { //count from 0 to 255
    digitalWrite(latchPin, LOW); //set latchPin low to allow data flow
    if (shiftup)
    {
      shiftUp(i);
    }
    else
    {
      shiftDown(i);
    }
    //set latchPin to high to lock and send data
    digitalWrite(latchPin, HIGH);
    elapsedTime = millis();
    ++i;
  }

    for (int i = 0; i < 7; ++i)
      digitalWrite(pwmPins[i], HIGH);
  
    digitalWrite(DISPLAY1, HIGH);
    for (int pin = 0; pin < 7; ++pin)
    {
      if (seven_seg_digits[digit1][pin] == 0)
        analogWrite(pwmPins[pin], 31.875);
    }
    
    if (decimal)
        digitalWrite(DECIMALPIN, LOW);
    else
        digitalWrite(DECIMALPIN, HIGH);
      
    delay(10);
    digitalWrite(DISPLAY1, LOW);
    clear();
    digitalWrite(DECIMALPIN, HIGH);
    digitalWrite(DISPLAY2, HIGH);
    for (int pin = 0; pin < 8; ++pin)
    {
      if (seven_seg_digits[digit2][pin] == 0)
        analogWrite(pwmPins[pin], 31.875);
    }
    delay(10);
    digitalWrite(DISPLAY2, LOW);
  
    if (timer - previousMillis > 44)
    {
      previousMillis = millis();
      if (counter == 9 && iii == 9)
        countup = false;
      else if (counter == 0 && iii == 0)
        countup = true;
        
        if (countup)
        {
          if (iii < 9)
            ++iii;
          else
          {
            iii = 0;
            counter++;
          }
        }
        else
        {
          if (iii > 0)
            --iii;
          else
          {
            iii = 9;
            counter--;
          }          
        }
    }
    
    
}

void shiftDown(byte dataOut) {
  int displayPin = -1;
  int delta = 1;
  
  boolean pinState; // Shift out 8 bits LSB first, on rising edge of clock
  digitalWrite(dataPin, LOW); //clear shift register ready for sending data
  digitalWrite(clockPin, LOW);
  for (int i=0; i<14; i++) { // for each bit in dataOut send out a bit
      
    digitalWrite(clockPin, LOW); //set clockPin to LOW prior to sending bit
    // if value of DataOut and (logical AND) a bitmask are true, set pinState to 1 (HIGH)
    if ( displayPin == dataOut ) {
    pinState = HIGH;
    }
    else {
    pinState = LOW;
    }
    //sets dataPin to HIGH or LOW depending on pinState
    digitalWrite(dataPin, pinState);
    digitalWrite(clockPin, HIGH); //send bit out on rising edge of clock
    digitalWrite(dataPin, LOW);
    displayPin++;
  }
  
  digitalWrite(clockPin, LOW); //stop shifting
}


void shiftUp(byte dataOut) {
  int displayPin = 14;
  int delta = 1;
  
  boolean pinState; // Shift out 8 bits LSB first, on rising edge of clock
  digitalWrite(dataPin, LOW); //clear shift register ready for sending data
  digitalWrite(clockPin, LOW);
  for (int i=0; i<14; i++) { // for each bit in dataOut send out a bit
      
    digitalWrite(clockPin, LOW); //set clockPin to LOW prior to sending bit
    // if value of DataOut and (logical AND) a bitmask are true, set pinState to 1 (HIGH)
    if ( displayPin == dataOut ) {
    pinState = HIGH;
    }
    else {
    pinState = LOW;
    }
    //sets dataPin to HIGH or LOW depending on pinState
    digitalWrite(dataPin, pinState);
    digitalWrite(clockPin, HIGH); //send bit out on rising edge of clock
    digitalWrite(dataPin, LOW);
    displayPin--;
  }
  
  digitalWrite(clockPin, LOW); //stop shifting
}

void clear()
{  
  for (int i = 0; i < 8; ++i)
    digitalWrite(pwmPins[i], HIGH);
}

