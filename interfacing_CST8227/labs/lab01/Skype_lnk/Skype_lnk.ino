unsigned int interval = 1000;
int ledState = LOW;
unsigned long previousMillis = 0;

void setup(){ 
  pinMode (11, OUTPUT);
}

void loop(void)
{
  ledFlash();
  ledFlash();
  delay(1000);  
}

void ledFlash()
{
  digitalWrite(11, HIGH);
  delay(200);
  digitalWrite(11, LOW);
  delay(200);
}
