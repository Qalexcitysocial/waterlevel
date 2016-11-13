<h1>This is a simple water level base in ultrasonic sensor in 
Python, PHP and GoogleCharts for RPi</h1> 

Go to your www folder and clone the project. if you prefer download
just copy and paste on www folder. 

Create a cron job on crontab 

crontab -e 

//this script is executed every minute
* * * * * python /var/www/html/waterlevel/python/sensor.py 

(execute manually python sensor.py to check it is working)

you can create a data base with tables or follow this steps, 

1.Go to into waterlevel folder

2.mysql -u root -p < datalogger.sql

3.execute this command to create a user to access your database datalogger <h2>becarefull with the quotes</h2>

CREATE USER 'datalogger'@'localhost' IDENTIFIED BY  'datalogger';

GRANT ALL PRIVILEGES ON * . * TO  'datalogger'@'localhost' IDENTIFIED BY  'datalogger' WITH GRANT OPTION MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0 ;

GRANT ALL PRIVILEGES ON  `datalogger` . * TO  'datalogger'@'localhost';


(execute manually python sensor.py to check it is working and the database dont give you any error)

4.check your localhost/waterlevel/ ( should be appear your new level mesurement system)


I hope you like the mini project and is useful for you. 

