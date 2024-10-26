<?php
// create_tables.php

require 'database.php';

try {
    // Create User Table
    $pdo->exec("CREATE TABLE IF NOT EXISTS Users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(255) UNIQUE,
        email VARCHAR(255) UNIQUE,
        password VARCHAR(255),
        avatar VARCHAR(255),
        createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )");

    // Create Post Table
    $pdo->exec("CREATE TABLE IF NOT EXISTS Posts (
        id INT AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(255),
        price INT,
        address VARCHAR(255),
        city VARCHAR(255),
        bedroom INT,
        bathroom INT,
        latitude VARCHAR(255),
        longitude VARCHAR(255),
        type ENUM('buy', 'rent'),
        property ENUM('apartment', 'house', 'condo', 'land'),
        createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        userId INT,
        FOREIGN KEY (userId) REFERENCES Users(id)
    )");

    // Create PostDetail Table
    $pdo->exec("CREATE TABLE IF NOT EXISTS PostDetails (
        id INT AUTO_INCREMENT PRIMARY KEY,
        description TEXT,
        utilities VARCHAR(255),
        pet VARCHAR(255),
        income VARCHAR(255),
        size INT,
        school INT,
        bus INT,
        restaurant INT,
        postId INT,
        FOREIGN KEY (postId) REFERENCES Posts(id) ON DELETE CASCADE
    )");

    // Create SavedPost Table
    $pdo->exec("CREATE TABLE IF NOT EXISTS SavedPosts (
        id INT AUTO_INCREMENT PRIMARY KEY,
        userId INT,
        postId INT,
        createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (userId) REFERENCES Users(id) ON DELETE CASCADE,
        FOREIGN KEY (postId) REFERENCES Posts(id) ON DELETE CASCADE
    )");

    // Additional Tables

    // Create Review Table
    $pdo->exec("CREATE TABLE IF NOT EXISTS Reviews (
        id INT AUTO_INCREMENT PRIMARY KEY,
        rating INT,
        comment TEXT,
        userId INT,
        postId INT,
        createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (userId) REFERENCES Users(id) ON DELETE CASCADE,
        FOREIGN KEY (postId) REFERENCES Posts(id) ON DELETE CASCADE
    )");

    // Create Messages Table
    $pdo->exec("CREATE TABLE IF NOT EXISTS Messages (
        id INT AUTO_INCREMENT PRIMARY KEY,
        senderId INT,
        receiverId INT,
        content TEXT,
        sentAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (senderId) REFERENCES Users(id) ON DELETE CASCADE,
        FOREIGN KEY (receiverId) REFERENCES Users(id) ON DELETE CASCADE
    )");

    // Create Categories Table
    $pdo->exec("CREATE TABLE IF NOT EXISTS Categories (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) UNIQUE,
        description TEXT
    )");

    // Create PostCategories Table (many-to-many relationship between Posts and Categories)
    $pdo->exec("CREATE TABLE IF NOT EXISTS PostCategories (
        id INT AUTO_INCREMENT PRIMARY KEY,
        postId INT,
        categoryId INT,
        FOREIGN KEY (postId) REFERENCES Posts(id) ON DELETE CASCADE,
        FOREIGN KEY (categoryId) REFERENCES Categories(id) ON DELETE CASCADE
    )");

    // Create Notifications Table
    $pdo->exec("CREATE TABLE IF NOT EXISTS Notifications (
        id INT AUTO_INCREMENT PRIMARY KEY,
        message TEXT,
        userId INT,
        isRead BOOLEAN DEFAULT FALSE,
        createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (userId) REFERENCES Users(id) ON DELETE CASCADE
    )");

    // Create Views Table
    $pdo->exec("CREATE TABLE IF NOT EXISTS Views (
        id INT AUTO_INCREMENT PRIMARY KEY,
        postId INT,
        userId INT,
        viewedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (postId) REFERENCES Posts(id) ON DELETE CASCADE,
        FOREIGN KEY (userId) REFERENCES Users(id) ON DELETE CASCADE
    )");

    echo "Tables created successfully!";
} catch (PDOException $e) {
    echo "Error creating tables: " . $e->getMessage();
}
