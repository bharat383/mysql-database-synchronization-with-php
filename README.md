#mysql-database-synchronization-with-php

Synchronize MySQL Database from One Server to Another Server or from One Database to Another Database on the same server using Simple PHP Script.

The source code is available at [github](https://github.com/bharat383/mysql-database-synchronization-with-php.git). You can either clone the repository or download a zip file of the latest release.

## Requirement
	
	1. cURL should be enabled

## How To Use

	1. copy & paste `server1` directory files on your first server.

	2. set database details for the database which you want to synchronize to another database in `includes/config.php` file.

	3. copy & paste `server2` directory files on your second server. 

	4. set Synchronization URL in `includes/config.php` which should have `server2` directory files. 

	5. set database details for the database where you want to synchronize first database data.

	6. execute `server1/example.php`

## Example 
	
	`server1/example.php` (Send Data to server2/example.php)

	To make it automatic synchronization on particular interval, you can run the server1/example.php as cronjob on specific time.

## Output


``` php
Array
(
    [data] => Array
        (
            [bh_user_master] => Table Created. 8 Rows Inserted.
            [bh_user_message] => Table Created.
        )

    [status] => success
    [message] => Database synchronization initiated.
)


Array
(
    [data] => []
    [status] => fail
    [message] => No Table Found./Table Structure Not Found./
)

```

## Limitation :

	1. This is just for the Development mode only demo. When the script synchronize the database, first it will drop the table on second server and create new table and after that insert all data. During the synchronization time, f the server stopped to respond, the second server database will be truncated. 


	2. Synchronization time, table structure and all rows will be synchronization to avoid the collumn/data updation after last synchronization.


## Author

Bharat Parmar
Ahmedabad, India.

Mobile : +91 9687766553
Email : bharatparmar383@gmail.com

