<?php
// display.php

require 'database.php';

try {
    echo "<h1>Displaying Data from All Tables</h1>";

    // Display Users Table
    echo "<h2>Users</h2>";
    $users = $pdo->query("SELECT * FROM Users");
    echo "<table border='1'><tr><th>ID</th><th>Username</th><th>Email</th><th>Avatar</th><th>Created At</th></tr>";
    foreach ($users as $row) {
        echo "<tr><td>{$row['id']}</td><td>{$row['username']}</td><td>{$row['email']}</td><td>{$row['avatar']}</td><td>{$row['createdAt']}</td></tr>";
    }
    echo "</table><br>";

    // Display Posts Table
    echo "<h2>Posts</h2>";
    $posts = $pdo->query("SELECT * FROM Posts");
    echo "<table border='1'><tr><th>ID</th><th>Title</th><th>Price</th><th>Address</th><th>City</th><th>Bedroom</th><th>Bathroom</th><th>Latitude</th><th>Longitude</th><th>Type</th><th>Property</th><th>User ID</th><th>Created At</th></tr>";
    foreach ($posts as $row) {
        echo "<tr><td>{$row['id']}</td><td>{$row['title']}</td><td>{$row['price']}</td><td>{$row['address']}</td><td>{$row['city']}</td><td>{$row['bedroom']}</td><td>{$row['bathroom']}</td><td>{$row['latitude']}</td><td>{$row['longitude']}</td><td>{$row['type']}</td><td>{$row['property']}</td><td>{$row['userId']}</td><td>{$row['createdAt']}</td></tr>";
    }
    echo "</table><br>";

    // Display PostDetails Table
    echo "<h2>Post Details</h2>";
    $postDetails = $pdo->query("SELECT * FROM PostDetails");
    echo "<table border='1'><tr><th>ID</th><th>Description</th><th>Utilities</th><th>Pet</th><th>Income</th><th>Size</th><th>School</th><th>Bus</th><th>Restaurant</th><th>Post ID</th></tr>";
    foreach ($postDetails as $row) {
        echo "<tr><td>{$row['id']}</td><td>{$row['desc']}</td><td>{$row['utilities']}</td><td>{$row['pet']}</td><td>{$row['income']}</td><td>{$row['size']}</td><td>{$row['school']}</td><td>{$row['bus']}</td><td>{$row['restaurant']}</td><td>{$row['postId']}</td></tr>";
    }
    echo "</table><br>";

    // Display SavedPosts Table
    echo "<h2>Saved Posts</h2>";
    $savedPosts = $pdo->query("SELECT * FROM SavedPosts");
    echo "<table border='1'><tr><th>ID</th><th>User ID</th><th>Post ID</th><th>Created At</th></tr>";
    foreach ($savedPosts as $row) {
        echo "<tr><td>{$row['id']}</td><td>{$row['userId']}</td><td>{$row['postId']}</td><td>{$row['createdAt']}</td></tr>";
    }
    echo "</table><br>";

    // Display Reviews Table
    echo "<h2>Reviews</h2>";
    $reviews = $pdo->query("SELECT * FROM Reviews");
    echo "<table border='1'><tr><th>ID</th><th>Rating</th><th>Comment</th><th>User ID</th><th>Post ID</th><th>Created At</th></tr>";
    foreach ($reviews as $row) {
        echo "<tr><td>{$row['id']}</td><td>{$row['rating']}</td><td>{$row['comment']}</td><td>{$row['userId']}</td><td>{$row['postId']}</td><td>{$row['createdAt']}</td></tr>";
    }
    echo "</table><br>";

    // Display Messages Table
    echo "<h2>Messages</h2>";
    $messages = $pdo->query("SELECT * FROM Messages");
    echo "<table border='1'><tr><th>ID</th><th>Sender ID</th><th>Receiver ID</th><th>Content</th><th>Sent At</th></tr>";
    foreach ($messages as $row) {
        echo "<tr><td>{$row['id']}</td><td>{$row['senderId']}</td><td>{$row['receiverId']}</td><td>{$row['content']}</td><td>{$row['sentAt']}</td></tr>";
    }
    echo "</table><br>";

    // Display Categories Table
    echo "<h2>Categories</h2>";
    $categories = $pdo->query("SELECT * FROM Categories");
    echo "<table border='1'><tr><th>ID</th><th>Name</th><th>Description</th></tr>";
    foreach ($categories as $row) {
        echo "<tr><td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['description']}</td></tr>";
    }
    echo "</table><br>";

    // Display PostCategories Table
    echo "<h2>Post Categories</h2>";
    $postCategories = $pdo->query("SELECT * FROM PostCategories");
    echo "<table border='1'><tr><th>ID</th><th>Post ID</th><th>Category ID</th></tr>";
    foreach ($postCategories as $row) {
        echo "<tr><td>{$row['id']}</td><td>{$row['postId']}</td><td>{$row['categoryId']}</td></tr>";
    }
    echo "</table><br>";

    // Display Notifications Table
    echo "<h2>Notifications</h2>";
    $notifications = $pdo->query("SELECT * FROM Notifications");
    echo "<table border='1'><tr><th>ID</th><th>Message</th><th>User ID</th><th>Is Read</th><th>Created At</th></tr>";
    foreach ($notifications as $row) {
        echo "<tr><td>{$row['id']}</td><td>{$row['message']}</td><td>{$row['userId']}</td><td>" . ($row['isRead'] ? 'Yes' : 'No') . "</td><td>{$row['createdAt']}</td></tr>";
    }
    echo "</table><br>";

    // Display Views Table
    echo "<h2>Views</h2>";
    $views = $pdo->query("SELECT * FROM Views");
    echo "<table border='1'><tr><th>ID</th><th>Post ID</th><th>User ID</th><th>Viewed At</th></tr>";
    foreach ($views as $row) {
        echo "<tr><td>{$row['id']}</td><td>{$row['postId']}</td><td>{$row['userId']}</td><td>{$row['viewedAt']}</td></tr>";
    }
    echo "</table><br>";

    echo "<p>All data displayed successfully!</p>";
} catch (PDOException $e) {
    echo "Error displaying data: " . $e->getMessage();
}
?>
