<h1>This is a simple water level base in ultrasonic sensor in 
Python, PHP and GoogleCharts for RPi</h1> 

Go to your www folder and clone the project. if you prefer download
just copy and paste on www folder. 

Create a cron job on crontab 

crontab -e 

//this script is executed every minute
* * * * * python /var/www/html/waterlevel/python/sensor.py

you can create a data base with tables or follow this steps, 

1.go to into waterlevel folder

2.mysql -u root -p < datalogger.sql

3.execute this command to create a user to access your database datalogger.
CREATE USER 'datalogger'@'localhost' IDENTIFIED BY  'datalogger';

GRANT ALL PRIVILEGES ON * . * TO  'datalogger'@'localhost' IDENTIFIED BY  'datalogger' WITH GRANT OPTION MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0 ;

GRANT ALL PRIVILEGES ON  `datalogger` . * TO  'datalogger'@'localhost';

4.check your localhost/waterlevel/ ( should be appear your new level mesurement system)

I hope you like the mini project and is useful for you. 

License Information

This program is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.
This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
You should have received a copy of the GNU General Public License along with this program. If not, see http://www.gnu.org/licenses/.

Credits

SPI module based on code from the Gertboard test suite: Copyright (C) Alex gomez 2016