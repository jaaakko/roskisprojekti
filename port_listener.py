import mysql.connector
import serial
import datetime

mydb = mysql.connector.connect(
    host="truudeli18.net",
    user="truu18_monkey",
    password="foRy7GfA6YTUgRtE",
    database="truu18_smart-trash-project"
    )

print(mydb);
print("listening to serial port COM5")
print("reading datetime")
serialPort = serial.Serial(port = "COM5", baudrate=9600,
                           bytesize=8, timeout=2, stopbits=serial.STOPBITS_ONE)
                           
serialString = ""                           # Used to hold data coming over UART

while(1):

    # Wait until there is data waiting in the serial buffer
    if(serialPort.in_waiting > 0):

        # Read data out of the buffer until a carraige return / new line is found
        serialString = serialPort.readline()
        value = serialString.decode('Ascii')
        x = datetime.datetime.now()
        y = x.strftime("%Y-%m-%d %H:%M:%S")

        mycursor = mydb.cursor()
        
        sql = "UPDATE sensordata SET value='" + value + "', time='" + y + "' WHERE sensorID = 1;";
        
        mycursor.execute(sql)
        mydb.commit()

        print(mycursor.rowcount, "record(s) affected")
        
        #Print the contents of the serial data
        print(serialString.decode('Ascii'))
        print(y)
