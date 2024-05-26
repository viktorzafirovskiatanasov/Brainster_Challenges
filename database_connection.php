<?php 

try {
    $conn = new PDO("mysql:host=localhost;", 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    

    $conn->exec("CREATE DATABASE IF NOT EXISTS challenge");
    

    $conn->exec("USE challenge");
    

    $conn->exec("CREATE TABLE IF NOT EXISTS images (
        image_id INT AUTO_INCREMENT PRIMARY KEY,
        user_id INT NOT NULL,
        img_url VARCHAR(255) NOT NULL,
        description TEXT NOT NULL
    )");

    $conn->exec("CREATE TABLE IF NOT EXISTS social_media (
        social_id INT AUTO_INCREMENT PRIMARY KEY,
        user_id INT NOT NULL,
        platform VARCHAR(20) NOT NULL,
        profile_url VARCHAR(255) NOT NULL
    )");

    $conn->exec("CREATE TABLE IF NOT EXISTS users (
        user_id INT AUTO_INCREMENT PRIMARY KEY,
        main_title VARCHAR(128) NOT NULL,
        subtitle VARCHAR(128) NOT NULL,
        about_customer VARCHAR(128) NOT NULL,
        phone VARCHAR(16) NOT NULL,
        address VARCHAR(32) NOT NULL,
        category ENUM('services','products') NOT NULL,
        about_company TEXT NOT NULL
    )");

    
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}



?>

