void setup()
{
  pinMode(0, INPUT);
  pinMode(9, OUTPUT);
  Serial.begin(9600);
}

void loop()
{
  int value = analogRead(0);
  int touch_sensor = analogRead(1);
  
  value-=300 ;
  
  if (value < 0)
    value = 0;
    
  Serial.println(touch_sensor);
  
  tone(9, value, 600);
  delay(10);
}


