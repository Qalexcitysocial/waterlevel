import RPi.GPIO as GPIO
import time
import MySQLdb

GPIO.setmode(GPIO.BCM)

TRIG = 26
ECHO = 20

#print "Distance Measurement In Progress"

GPIO.setup(TRIG,GPIO.OUT)
GPIO.setup(ECHO,GPIO.IN)

GPIO.output(TRIG, False)
#print "Waiting For Sensor To Settle"
time.sleep(2)

GPIO.output(TRIG, True)
time.sleep(0.00001)
GPIO.output(TRIG, False)

while GPIO.input(ECHO)==0:
  pulse_start = time.time()

while GPIO.input(ECHO)==1:
  pulse_end = time.time()

pulse_duration = pulse_end - pulse_start

distance = pulse_duration * 17150

distance = round(distance, 2)

#print "Distance:",distance,"cm"
print distance
GPIO.cleanup()

#Open database connection
db = MySQLdb.connect("localhost", "datalogger","datalogger","datalogger")

curs = db.cursor()
try:
   sqlline = "insert into distance values (NOW(), {0:0.1f});".format(distance)
   curs.execute(sqlline)
   curs.execute ("DELETE FROM distance WHERE ttime < NOW() -INTERVAL 1 DAY;")
   db.commit()
   print "Data committed"

except MySQLdb.Error as e:
   print ("Error: the database is being rolled back" + str(e))
   db.rollback()
   print ("Failed to get reading. Try again!")
    db.close()