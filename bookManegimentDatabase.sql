CREATE DATABASE IF NOT EXISTS book_management;

CREATE USER 'book_managementuser'@'localhost' IDENTIFIED BY 'pass1234';
GRANT ALL PRIVILEGES ON book_management.* TO 'book_managementuser'@'localhost';
FLUSH PRIVILEGES;

CREATE USER 'book_managementuser'@'172.16.61.%' IDENTIFIED BY 'pass1234';
GRANT ALL PRIVILEGES ON book_management.* TO 'book_managementuser'@'172.16.61.%';
FLUSH PRIVILEGES;