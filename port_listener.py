import mysql.connector
import serial
import datetime
import time

#Database connection information
mydb = mysql.connector.connect(
    host="truudeli18.net",
    user="truu18_monkey",
    password="foRy7GfA6YTUgRtE",
    database="truu18_smart-trash-project"

    #host="localhost",
    #user="root",
    #password="",
    #database="insert_database_name"
    )
print(mydb);

#Reads the port that is getting the information.
serialPort = serial.Serial(port = "COM5", baudrate=9600,
bytesize=8, timeout=2, stopbits=serial.STOPBITS_ONE)
print("listening to serial port COM5")
print("reading datetime")
                           
serialString = ""                           # Used to hold data coming over UART

while(1):

    # Wait until there is data waiting in the serial buffer
    if(serialPort.in_waiting > 0):

        # Read data out of the buffer until a carraige return / new line is found
        serialString = serialPort.readline()
        value = serialString.decode('Ascii')

        #Gets the current computer time
        x = datetime.datetime.now()
        #Turns the current computer time into a string
        y = x.strftime("%Y-%m-%d %H:%M:%S")

        #Creates the connection to the database
        mycursor = mydb.cursor()

        #SQL Syntax to get all data from the sensor database
        sql = "SELECT * FROM sensordata;"
        mycursor.execute(sql)
        hist_data = mycursor.fetchall()

        #Turns the received data into rows
        for row in hist_data:
                print(row[0],row[1],row[2],row[3],row[4],row[5])

                #SQL syntax to insert the received data into the sensor_hist database
                sql = "INSERT INTO sensordata_hist (sensorID, typeID, value, units, height, time) VALUES ('" + str(row[0]) + "', '" + str(row[1]) + "', '" + str(row[2]) + "', '" + str(row[3]) + "', '" + str(row[4]) + "', '" + str(row[5]) + "');"
                mycursor.execute(sql)
                print("Moved previous records")

        #SQL syntax to update the sensordata with the data received from the sensor
        sql = "UPDATE sensordata SET value='" + value + "', time='" + y + "' WHERE sensorID = 1;";
        mycursor.execute(sql)
        mydb.commit()

        #Confirms that the database has been affected
        print(mycursor.rowcount, "record(s) affected")
        
        #Print the contents of the serial data
        print(serialString.decode('Ascii'))

        #Time between the updates. Given value is in seconds
        time.sleep(5)
