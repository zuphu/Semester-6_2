byte seven_seg_digits[16][8] = { { 0,0,0,0,0,0,1,1},   // = 0
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
                                 { 0,1,1,1,0,0,0,1 }   // F
                                 };
int pwmPins[] = {4, 5, 9, 10, 12, 14, 15};

#define DISPLAY2 21
#define DISPLAY1 20

void
setup()
{
  pinMode(DISPLAY1, OUTPUT);
  digitalWrite(DISPLAY1, HIGH );
  pinMode(DISPLAY2, OUTPUT);
  digitalWrite(DISPLAY2, HIGH );
  
  pinMode(0, OUTPUT);
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
  static int first_digit = 0;
  static int iii = -1;
  
  for (int i = 0; i < 8; ++i)
    digitalWrite(pwmPins[i], HIGH);
  
  if (iii < 15)
    ++iii;
  else
    iii = 0;

  for (int pin = 0; pin < 9; ++pin)
  {
    if (seven_seg_digits[iii][pin] == 0)
      analogWrite(pwmPins[pin], 31.875);
  }
  
  delay(500);

}

void clear()
{  
  for (int i = 0; i < 9; ++i)
    digitalWrite(i, HIGH);
}

