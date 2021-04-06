#!/bin/bash
echo -n "Password "
if [ ! -f "dbpassword" ]; then
	echo -n "Generating "
	password=`openssl rand -base64 32`
	echo -n $password > dbpassword
else
	echo -n "Exists "
	password=`cat dbpassword`
fi
echo "Done"

echo -n "User (kitcheninventory) "
userAccountExists=`sudo mysql --table --database="mysql" --execute="select COUNT(*) from user where User='kitcheninventory';" | head -n 4 | tail -n 1 | grep -Eo '[[0-9]]*'`
if [ $userAccountExists -lt 1 ]; then
	echo -n "Creating "
	sudo mysql --table --database="mysql" --execute="CREATE USER 'kitcheninventory'@'%' IDENTIFIED BY '$password';"
else
	echo -n "Already exists "
fi
echo "Done"

echo -n "Privileges "
privileges=`sudo mysql --table --database="mysql" --execute="show grants for 'kitcheninventory'@'%';" | grep "GRANT ALL PRIVILEGES" | wc -l`
if [ $privileges -lt 1 ]; then
	echo -n "Creating "
	sudo mysql --table --database="mysql" --execute="GRANT ALL PRIVILEGES ON kitcheninventory.* TO 'kitcheninventory'@'%';"
else
	echo -n "Exists "
fi
echo "Done"

echo -n "Database (kitcheninventory) "
databaseExists=`sudo mysql --table --database="mysql" --execute="SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = 'kitcheninventory';" | wc -l`
if [ $databaseExists -lt 1 ]; then
	echo -n "Creating "
	sudo mysql --table --database="mysql" --execute="CREATE DATABASE IF NOT EXISTS kitcheninventory;"
else
	echo -n "Exists "
fi
echo "Done"

echo -n "Table (products) "
tableExists=`mysql --table --user="kitcheninventory" --password="$password" --database="kitcheninventory" --execute="show tables" | grep products | wc -l`
if [ $tableExists -lt 1 ]; then
	echo -n "Creating "
	mysql --table --user="kitcheninventory" --password="$password" --database="kitcheninventory" < products.sql
else
	echo -n "Exists "
fi
echo "Done"