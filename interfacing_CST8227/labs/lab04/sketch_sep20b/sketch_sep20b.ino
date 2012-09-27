byte seven_seg_digits[28][8] = { { 0,0,0,0,0,0,1,1},   // = 0
                                 { 1,0,0,1,1,1,1,1 },  // = 1
                                 { 0,0,1,0,0,1,0,1 },  // = 2
                                 { 0,0,0,0,1,1,0,1 },  // = 3
                                 { 1,0,0,1,1,0,0,1 },  // = 4
                                 { 0,1,0,0,1,0,0,1 },  // = 5
                                 { 0,1,0,0,0,0,0,1 },  // = 6
                                 { 0,0,0,1,1,1,1,1 },  // = 7
                                 { 0,0,0,0,0,0,0,1 },  // = 8
                                 { 0,0,0,0,1,0,0,1 },  // = 9
                                 { 0,0,0,1,0,0,0,1 },  // A
                                 { 1,1,0,0,0,0,0,1 },  // B
                                 { 1,1,1,0,0,1,0,1 },  // C
                                 { 1,0,0,0,0,1,0,1 },  // D
                                 { 0,1,1,0,0,0,0,1 },  // E
                                 { 0,1,1,1,0,0,0,1 },  // F
                                 { 0,0,0,0,1,0,0,1 },  // G
                                 { 1,1,0,1,0,0,0,1 },  // H
                                 { 1,1,1,1,0,1,1,0 },   // i
                                 { 1,1,1,0,0,0,1,1 },   // L 
                                 { 1,1,0,1,0,1,0,1 },   // n 
                                 { 1,1,0,0,0,1,0,1 },   // o 
                                 { 0,0,1,1,0,0,0,1 },   // p
                                 { 1,1,1,1,0,0,0,1 },   // r 
                                 { 0,1,0,0,1,0,0,1 },   // s 
                                 { 1,1,1,0,0,0,0,1 },   // t
                                 { 1,1,0,0,0,1,1,1 },   // u 
                                 { 1,0,0,0,1,0,0,1 }   // y                      
                                };

int pwmPins[] = {4, 5, 9, 10, 12, 14, 15, 6};

#define DISPLAY2 21
#define DISPLAY1 20

boolean alpha = true;
long previousMillis = 0;

void
setup()
{
  pinMode(DISPLAY1, OUTPUT);
  digitalWrite(DISPLAY1, HIGH );
  pinMode(DISPLAY2, OUTPUT);
  digitalWrite(DISPLAY2, HIGH );
  
  pinMode(0, INPUT);
  pinMode(1, OUTPUT);
  pinMode(2, OUTPUT);
  pinMode(3, OUTPUT);
  pinMode(4, OUTPUT);
  pinMode(5, OUTPUT);
  pinMode(6, OUTPUT);
  pinMode(7, OUTPUT);
  
  pinMode(pwmPins[0], OUTPUT);
  pinMode(pwmPins[1], OUTPUT);
  pinMode(pwmPins[2], OUTPUT);
  pinMode(pwmPins[3], OUTPUT);
  pinMode(pwmPins[4], OUTPUT);
  pinMode(pwmPins[5], OUTPUT);
  pinMode(pwmPins[6], OUTPUT);
}

void
loop()
{
  int state = digitalRead(0);
  unsigned long currentMillis = millis();
  static int counter = 0;
  static int iii = 0;
  static int iiii = 10;
  
  if (state == HIGH)
  {
    while ((state = digitalRead(0)) == HIGH)
      ;
     alpha = !alpha;
     clear();
  }
  
  if (!alpha)
  {
    if (counter > 15)
    {
      counter = 0;
    }
    for (int i = 0; i < 8; ++i)
      digitalWrite(pwmPins[i], HIGH);
  
    digitalWrite(DISPLAY1, HIGH);
    for (int pin = 0; pin < 8; ++pin)
    {
      if (seven_seg_digits[counter][pin] == 0)
        analogWrite(pwmPins[pin], 31.875);
    }  
    delay(10);
    digitalWrite(DISPLAY1, LOW);
    clear();
    digitalWrite(DISPLAY2, HIGH);
    for (int pin = 0; pin < 8; ++pin)
    {
      if (seven_seg_digits[iii][pin] == 0)
        analogWrite(pwmPins[pin], 31.875);
    }
    delay(10);
    digitalWrite(DISPLAY2, LOW);
  
    if (currentMillis - previousMillis > 100)
    {
      previousMillis = millis();
      if ( iii < 15 )
      {
        ++iii;
      }
      else
      {
        iii = 0;
        ++counter;
      }
    }
  }
  else
  {
    digitalWrite(DISPLAY1, LOW);
    digitalWrite(DISPLAY2, HIGH);
    clear();
    for (int pin = 0; pin < 8; ++pin)
    {
      if (seven_seg_digits[iiii][pin] == 0)
        analogWrite(pwmPins[pin], 31.875);
    }
    if (currentMillis - previousMillis > 500)
    {
      previousMillis = millis();
      if ( iiii < 27 )
      {
        ++iiii;
      }
      else
      {
        iiii = 10;
      }
    }
   
  }
}

void clear()
{  
  for (int i = 0; i < 8; ++i)
    digitalWrite(pwmPins[i], HIGH);
}

