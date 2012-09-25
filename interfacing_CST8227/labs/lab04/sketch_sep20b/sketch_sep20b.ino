byte seven_seg_digits[10][8] = { { 0,0,0,1,0,0,0,1},  // = 0
                                 { 1,0,0,1,1,1,1,1 },  // = 1
                                 { 0,0,1,1,0,0,1,0 },  // = 2
                                 { 0,0,0,1,0,1,1,0 },  // = 3
                                 { 1,0,0,1,1,1,0,0 },  // = 4
                                 { 0,1,0,1,0,1,0,0 },  // = 5
                                 { 0,1,0,1,0,0,0,0 },  // = 6
                                 { 0,0,0,1,1,1,1,1 },  // = 7
                                 { 0,0,0,1,0,0,0,0 },  // = 8
                                 { 0,0,0,1,1,1,0,0 }   // = 9
                                 };

void
setup()
{   
  pinMode(0, OUTPUT);
  pinMode(1, OUTPUT);
  pinMode(2, OUTPUT);
  pinMode(3, OUTPUT);
  pinMode(4, OUTPUT);
  pinMode(5, OUTPUT);
  pinMode(6, OUTPUT);
  pinMode(7, OUTPUT);
}

void
loop()
{
  static int iii = -1;
  
  for (int i = 0; i < 8; ++i)
    digitalWrite(i, HIGH);
    
  if (iii < 9)
    ++iii;
  else
    iii = 0;
  
  for (int i = 0; i < 8; ++i)
    digitalWrite(i, HIGH);
    f
  for (byte pin = 0; pin < 8; ++pin)
  {
    digitalWrite(pin, seven_seg_digits[iii][pin]);
  }
      delay(500);
}

