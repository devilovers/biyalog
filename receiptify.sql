CREATE DATABASE receiptify;

USE receiptify;

CREATE TABLE tracks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    artist VARCHAR(255),
    duration VARCHAR(10)
);