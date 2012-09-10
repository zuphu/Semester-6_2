static int has_run = 0;

void setup()
{
  
}

void loop ()
{
  if (has_run)
    return;
    
  //launch_notepad();
  launch_mspaint();
  
  has_run = 1;
}



void launch_notepad()
{   
  launch_run("notepad");
  notepad_text();

}

void notepad_text()
{
  Keyboard.print("TEENSY: Let's draw a happy face.\n");
  release();
  delay(1000);
  Keyboard.print("TEENSY: ");
  delay(500);
  Keyboard.print(":");
  delay(500);
  Keyboard.print("-");
  delay(500);
  Keyboard.print(")\n");
  delay(1000);
  Keyboard.print("TEENSY: launching mspaint\n");
  release();
  delay(1000);
}
void launch_run(char *text)
{
  delay(2000);
  Keyboard.set_modifier(MODIFIERKEY_GUI);
  Keyboard.set_key1(KEY_R);
  Keyboard.send_now();
  release();
  delay(100);
  Keyboard.set_key1(KEY_BACKSPACE);
  delay(100);
  Keyboard.print(text);
  Keyboard.send_now();
  release();
  Keyboard.set_key1(KEY_ENTER);
  Keyboard.send_now();
  release();
  delay(100);
}
void launch_mspaint()
{
  launch_run("mspaint");
  delay(1000);
  Keyboard.set_modifier(MODIFIERKEY_ALT);
  Keyboard.set_key1(KEY_SPACE);
  Keyboard.send_now();
  delay(100);
  Keyboard.set_key1(KEY_X);
  Keyboard.send_now();
  release();
  
  Keyboard.set_modifier(MODIFIERKEY_ALT);
  Keyboard.set_key1(KEY_F);
  Keyboard.send_now();
  delay(200);
  release();
  Keyboard.set_key1(KEY_E);
  Keyboard.send_now();
  release();
  Keyboard.print("1500");
  Keyboard.set_key1(KEY_TAB);
  Keyboard.send_now();
  Keyboard.print("1700");
  Keyboard.send_now();
  Keyboard.set_key1(KEY_ENTER);
  Keyboard.send_now();
  release();
  moveMouse();
}

void release()
{
  // release all the keys at the same
  Keyboard.set_modifier(0);
  Keyboard.set_key1(0);
  Keyboard.send_now();
}

void moveMouse()
{
  int i;
  
  for (i = 0; i < 500; i++)
    Mouse.move(-10,-10);
    
  Mouse.move(-900, -900);
  delay(500);
  Mouse.set_buttons(1, 0, 0);
  Mouse.move(0, 60);
  Mouse.set_buttons(0, 0, 0);
    delay(200);
  Mouse.move(60, -60);
  delay(200);
  Mouse.set_buttons(1, 0, 0);
    delay(200);
  Mouse.move(0, 80);
   Mouse.set_buttons(0, 0, 0);
     Mouse.move(-100, 20);
       delay(200);
        Mouse.set_buttons(1, 0, 0);
          delay(200);
             Mouse.move(100, 0);
                        Mouse.move(100, 0);
                                Mouse.set_buttons(0, 0, 0);
  //Mouse.move(-600, 0);
  //delay(300);
  //Mouse.move(100, 500);
//  Mouse.set_buttons(0, 0, 0);
//  Mouse.move(900, -400);
}
void moveMose()
{
    int i;
  for (i=0; i<40; i++) {
    Mouse.move(2, -1);
    delay(25);
  }
  for (i=0; i<40; i++) {
    Mouse.move(2, 2);
    delay(25);
  }
  for (i=0; i<40; i++) {
    Mouse.move(-4, -1);
    delay(25);
  }
}
