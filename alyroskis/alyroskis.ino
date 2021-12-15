#include <SoftwareSerial.h>
SoftwareSerial bt(2,3);         // RX, TX

int inputPin = A0;
const int numReadings = 80;
int readings [numReadings];
int readIndex = 0;
long total = 0;
int inputVal = 0;

void setup() {
  bt.begin(9600);
  // initialize serial communication with bluetooth device: 
  Serial.begin(9600);  // sets the serial port to 9600
  pinMode (inputPin, INPUT);
  }


void loop() {
      readAnalogSmooth();
      // send it to the computer as ASCII digits
      Serial.print(smooth());
      bt.print(smooth());
      Serial.print(" cm, average");
      bt.print(" cm");
      bt.println();
      Serial.println();
      delay(200);       // delay in between reads for stability
    // ...wrap around to the beginning:
        }

void readAnalogSmooth( ) { /* function readAnalogSmooth */
  ////Test routine for AnalogSmooth
  inputVal = analogRead(inputPin)/2*2.54;
  Serial.print(inputVal);
  Serial.print("test");
  Serial.println();
}
    
long smooth() { /* function smooth */
  ////Perform average on sensor readings
  long average;
  // subtract the last reading:
  total = total - readings[readIndex];
  // read the sensor:
  readings[readIndex] = analogRead(inputPin)/2*2.54;
  // add value to total:
  total = total + readings[readIndex];
  // handle index
  readIndex = readIndex + 1;
  if (readIndex >= numReadings) {
    readIndex = 0;
  }
  // calculate the average:
  average = total / numReadings;

  return average;
}
