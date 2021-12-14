import mysql.connector
import serial
import datetime

mydb = mysql.connector.connect(
    #host="truudeli18.net",
    #user="truu18_monkey",
    #password="foRy7GfA6YTUgRtE",
    #database="truu18_smart-trash-project"

    host="localhost",
    user="root",
    password="",
    database="roskis_projekti"
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
        sql = "SELECT * FROM sensordata;"
        mycursor.execute(sql)
        hist_data = mycursor.fetchall()
        for row in hist_data:
                print(row[0],row[1],row[2],row[3],row[4])
                sql = "INSERT INTO sensordata_hist (sensorID, type, value, units, time) VALUES ('" + str(row[0]) + "', '" + str(row[1]) + "', '" + str(row[2]) + "', '" + str(row[3]) + "', '" + str(row[4]) + "');"
                mycursor.execute(sql)
                print("Moved previous records")
        
        sql = "UPDATE sensordata SET value='" + value + "', time='" + y + "' WHERE sensorID = 1;";
        mycursor.execute(sql)
        mydb.commit()

        print(mycursor.rowcount, "record(s) affected")
        
        #Print the contents of the serial data
        print(serialString.decode('Ascii'))
        print(y)
