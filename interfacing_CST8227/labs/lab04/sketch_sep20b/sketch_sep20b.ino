byte seven_seg_digits[10][8] = { { 0,0,0,0,0,0,1,1},  // = 0
                                 { 1,0,0,1,1,1,1,1 },  // = 1
                                 { 0,0,1,0,0,1,0,1 },  // = 2
                                 { 0,0,0,0,1,1,0,1 },  // = 3
                                 { 1,0,0,1,1,0,0,1 },  // = 4
                                 { 0,1,0,0,1,0,0,1 },  // = 5
                                 { 0,1,0,0,0,0,0,1 },  // = 6
                                 { 0,0,0,1,1,1,1,1 },  // = 7
                                 { 0,0,0,0,0,0,0,1 },  // = 8
                                 { 0,0,0,0,1,0,0,1 }   // = 9
                                 };
int pwmPins[] = {4, 5, 9, 10, 12, 14, 15};

void
setup()
{
  pinMode(21, OUTPUT);
  digitalWrite(21, HIGH );
    pinMode(20, OUTPUT);
  digitalWrite(20, LOW );
  
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
  static int iii = -1;
  
  for (int i = 0; i < 8; ++i)
    digitalWrite(pwmPins[i], HIGH);
  
  if (iii < 9)
    ++iii;
  else
    iii = 0;
  
  for (int i = 0; i < 8; ++i)
    digitalWrite(i, HIGH);

  for (int pin = 0; pin < 8; ++pin)
  {
    if (seven_seg_digits[iii][pin] == 0)
      analogWrite(pwmPins[pin], 31.875);
  }
      delay(500);
}

