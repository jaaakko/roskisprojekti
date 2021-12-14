/*
This code reads the Analog Voltage output from the
LV-MaxSonar sensors
If you wish for code with averaging, please see
playground.arduino.cc/Main/MaxSonar
Please note that we do not recommend using averaging with our sensors.
Mode and Median filters are recommended.

smoothing  created 22 Apr 2007
  by David A. Mellis  <dam@mellis.org>
  modified 18 Nov 2021
  by Jaakko Huotari
  
  https://www.arduino.cc/en/Tutorial/BuiltInExamples/Smoothing

*/
#include <SoftwareSerial.h>
SoftwareSerial bt(2,3);         // RX, TX
const int numReadings = 20;     // the amount of readings wanted to average

int readings[numReadings];      // the readings from the analog input
int readIndex = 0;              // the index of current reading
int total = 0;                  // the running total
int average = 0;                // the average

int inputPin = A0;
void setup() {
  bt.begin(9600);
  // initialize serial communication with computer: 
  Serial.begin(9600);  // sets the serial port to 9600
  // initialize all the readings to 0;
  bt.println("testi");
  for (int thisReading = 0; thisReading < numReadings; thisReading++) {
    readings[thisReading] = 0;
  }
}


void loop() {
  // substract the last reading:
  total = total - readings[readIndex];
  // read from the sensor:
  // divided by 2 to get the correct length in inches
  // multiplied by 2.54 to get the correct length in cm
  readings[readIndex] = analogRead(inputPin) / 2 * 2.54;
  // add the reading to the total:
  total = total + readings[readIndex];
  // advance to the next position in the array:
  readIndex = readIndex + 1;

  // if we are at the end of the array...
  if(readIndex >= numReadings) {
      // calculate the average:
      average = total / numReadings;
      // send it to the computer as ASCII digits
      Serial.print(average);
      bt.print(average);
      Serial.print(" cm");
      bt.print(" cm");
      bt.println();
      Serial.println();
      delay(1000);       // delay in between reads for stability
    // ...wrap around to the beginning:
    
    readIndex = 0;
    }

}
