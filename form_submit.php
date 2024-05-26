<?php
include_once './database_connection.php';
include_once './database_statements.php';
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $cover_url = $_POST['cover_url'];
    $main_title = $_POST['main_title'];
    $subtitle = $_POST['subtitle'];
    $about_customer = $_POST['about_customer'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $category= $_POST['category'];
    $img_url1 = $_POST['img_url1'];
    $img_url2 = $_POST['img_url2'];
    $img_url3 = $_POST['img_url3'];
    $description1 = $_POST['description1'];
    $description2 = $_POST['description2'];
    $description3 = $_POST['description3'];
    $about_company = $_POST['about_company'];
    $facebook_url = $_POST['facebook_url'];
    $twitter_url = $_POST['twitter_url'];
    $linkedin_url = $_POST['linkedin_url'];
    $googleplus_url = $_POST['googleplus_url'];
    


    if (
        empty($cover_url) ||
        empty($main_title) ||
        empty($subtitle) ||
        empty($about_customer) ||
        empty($phone) ||
        empty($address) ||
        empty($category) ||
        empty($img_url1) ||
        empty($img_url2) ||
        empty($img_url3) ||
        empty($description1) ||
        empty($description2) ||
        empty($description3) ||
        empty($about_company) ||
        empty($facebook_url) ||
        empty($twitter_url) ||
        empty($linkedin_url) ||
        empty($googleplus_url)
    )  header('Location: form.html');
    else {
       try{$conn->begintransaction();
        

       $insert_user->execute([$main_title, $subtitle, $about_customer, $phone, $address, $category, $about_company]);
       $user_id = $conn->lastInsertId();

       $insert_images->execute([$user_id, $cover_url, 'cover image']);
       $insert_images->execute([$user_id, $img_url1, $description1]);
        $insert_images->execute([$user_id, $img_url2, $description2]);
        $insert_images->execute([$user_id, $img_url3, $description3]);


        $insert_social->execute([$user_id, 'Facebook', $facebook_url]);
        $insert_social->execute([$user_id, 'Twitter', $twitter_url]);
        $insert_social->execute([$user_id, 'LinkedIn', $linkedin_url]);
        $insert_social->execute([$user_id, 'Google+', $googleplus_url]);


        $conn->commit();

        header("Location: generated.php?id=$user_id");
        exit();
    } catch (PDOException $e) {
        $conn->rollBack();
        
        echo "Error: " . $e->getMessage();
    }
}
}
else header('Location: form.html');