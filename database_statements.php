<?php 
include_once './database_connection.php';
$insert_images = $conn->prepare("INSERT INTO images (user_id, img_url, description) VALUES (?, ?, ?)");
$insert_images->bindParam(1, $user_id);
$insert_images->bindParam(2, $img_url);
$insert_images->bindParam(3, $img_description);


$insert_social = $conn->prepare("INSERT INTO social_media(user_id, platform , profile_url) VALUES (?, ?, ?)");
$insert_social->bindParam(1, $user_id);
$insert_social->bindParam(2, $platform);
$insert_social->bindParam(3, $profile_url);

$insert_user = $conn->prepare("INSERT INTO users (main_title, subtitle, about_customer, phone, address, category, about_company) VALUES (?, ?, ?, ?, ?, ?, ?)");
$insert_user->bindParam(1, $main_title);
$insert_user->bindParam(2, $subtitle);
$insert_user->bindParam(3, $about_customer);
$insert_user->bindParam(4, $phone);
$insert_user->bindParam(5, $address);
$insert_user->bindParam(6, $category);
$insert_user->bindParam(7, $about_company);