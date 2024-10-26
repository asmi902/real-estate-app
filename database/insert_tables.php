<?php
// insert_data.php

require 'database.php';

try {
    // Clear existing data
    $pdo->exec("SET FOREIGN_KEY_CHECKS = 0;"); // Disable foreign key checks temporarily
    $pdo->exec("TRUNCATE TABLE Views;");
    $pdo->exec("TRUNCATE TABLE Notifications;");
    $pdo->exec("TRUNCATE TABLE PostCategories;");
    $pdo->exec("TRUNCATE TABLE Categories;");
    $pdo->exec("TRUNCATE TABLE Messages;");
    $pdo->exec("TRUNCATE TABLE Reviews;");
    $pdo->exec("TRUNCATE TABLE SavedPosts;");
    $pdo->exec("TRUNCATE TABLE PostDetails;");
    $pdo->exec("TRUNCATE TABLE Posts;");
    $pdo->exec("TRUNCATE TABLE Users;");
    $pdo->exec("SET FOREIGN_KEY_CHECKS = 1;"); // Re-enable foreign key checks

    // Insert data into Users
    $pdo->exec("INSERT INTO Users (username, email, password, avatar) VALUES
        ('jane_doe', 'jane@example.com', 'password123', 'avatar1.jpg'),
        ('asmi_smith', 'asmi@example.com', 'password123', 'avatar2.jpg'),
        ('alice_wonder', 'alice@example.com', 'password123', 'avatar3.jpg'),
        ('bob_builder', 'bob@example.com', 'password123', 'avatar4.jpg'),
        ('charlie_brown', 'charlie@example.com', 'password123', 'avatar5.jpg')
    ");

    // Insert data into Posts
    $pdo->exec("INSERT INTO Posts (title, price, address, city, bedroom, bathroom, latitude, longitude, type, property, userId) VALUES
        ('Luxury Apartment', 500000, '123 Main St', 'Metropolis', 3, 2, '40.7128', '-74.0060', 'buy', 'apartment', 1),
        ('Cozy Condo', 300000, '456 Oak St', 'Gotham', 2, 1, '34.0522', '-118.2437', 'buy', 'condo', 2),
        ('Family House', 700000, '789 Pine St', 'Star City', 4, 3, '37.7749', '-122.4194', 'buy', 'house', 3),
        ('Studio Apartment', 150000, '101 Maple Ave', 'Smallville', 1, 1, '51.5074', '-0.1278', 'rent', 'apartment', 4),
        ('Spacious Land', 250000, '202 Elm Rd', 'Central City', 0, 0, '48.8566', '2.3522', 'buy', 'land', 5)
    ");

    // Insert data into PostDetails
    $pdo->exec("INSERT INTO PostDetails (description, utilities, pet, income, size, school, bus, restaurant, postId) VALUES
        ('A beautiful luxury apartment in the heart of the city', 'Water, Electricity', 'Allowed', '50000', 1200, 1, 1, 1, 1),
        ('Condo with a great view', 'Water, Gas', 'Not Allowed', '40000', 800, 1, 1, 1, 2),
        ('Spacious family house with backyard', 'Electricity, Gas', 'Allowed', '70000', 2000, 2, 2, 1, 3),
        ('Affordable studio in a prime location', 'Water', 'Not Allowed', '20000', 400, 1, 1, 1, 4),
        ('Open land ready for construction', 'None', 'Allowed', '30000', 5000, 0, 0, 1, 5)
    ");

    // Insert data into SavedPosts
    $pdo->exec("INSERT INTO SavedPosts (userId, postId) VALUES
        (1, 1),
        (2, 2),
        (3, 3),
        (4, 4),
        (5, 5)
    ");

    // Insert data into Reviews
    $pdo->exec("INSERT INTO Reviews (rating, comment, userId, postId) VALUES
        (5, 'Excellent property!', 1, 1),
        (4, 'Great view and location.', 2, 2),
        (3, 'Good value for money.', 3, 3),
        (5, 'Perfect for a small family.', 4, 4),
        (4, 'Ideal for investment.', 5, 5)
    ");

    // Insert data into Messages
    $pdo->exec("INSERT INTO Messages (senderId, receiverId, content) VALUES
        (1, 2, 'Is this apartment still available?'),
        (2, 3, 'Can I schedule a viewing?'),
        (3, 4, 'What are the neighborhood facilities?'),
        (4, 5, 'Is the price negotiable?'),
        (5, 1, 'Any additional fees?')
    ");

    // Insert data into Categories
    $pdo->exec("INSERT INTO Categories (name, description) VALUES
        ('Luxury', 'Properties with premium features'),
        ('Affordable', 'Budget-friendly options'),
        ('Family', 'Suitable for families'),
        ('Investment', 'Great for investment'),
        ('Vacation', 'Ideal for vacation stays')
    ");

    // Insert data into PostCategories
    $pdo->exec("INSERT INTO PostCategories (postId, categoryId) VALUES
        (1, 1),
        (2, 2),
        (3, 3),
        (4, 4),
        (5, 5)
    ");

    // Insert data into Notifications
    $pdo->exec("INSERT INTO Notifications (message, userId, isRead) VALUES
        ('Your property has been saved by another user.', 1, FALSE),
        ('You have a new message.', 2, FALSE),
        ('Your listing has received a review.', 3, TRUE),
        ('Property price update.', 4, FALSE),
        ('Congratulations! Your post is featured.', 5, TRUE)
    ");

    // Insert data into Views
    $pdo->exec("INSERT INTO Views (postId, userId) VALUES
        (1, 2),
        (2, 3),
        (3, 4),
        (4, 5),
        (5, 1)
    ");

    echo "Data inserted successfully!";
} catch (PDOException $e) {
    echo "Error inserting data: " . $e->getMessage();
}
