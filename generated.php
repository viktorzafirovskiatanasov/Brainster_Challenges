<?php
include_once './database_statements.php';

if (isset($_GET['id'])) {
    $user_id = $_GET['id'];
}

$select_user = $conn->prepare("SELECT * FROM users WHERE user_id = ?");
$select_user->execute([$user_id]);
$user = $select_user->fetch(PDO::FETCH_ASSOC);


$select_images = $conn->prepare("SELECT img_url, description FROM images WHERE user_id = ?");
$select_images->execute([$user_id]);
$images = $select_images->fetchAll(PDO::FETCH_ASSOC);

$select_social = $conn->prepare("SELECT platform, profile_url FROM social_media WHERE user_id = ?");
$select_social->execute([$user_id]);
$social_media = $select_social->fetchAll(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html>

<head>
    <title>Document</title>
    <meta charset="utf-8" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />

    <!-- Latest compiled and minified Bootstrap 4.6 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!-- CSS script -->
    <link rel="stylesheet" href="style.css">
    <!-- Latest Font-Awesome CDN -->
    <script src="https://kit.fontawesome.com/0e37b883f4.js" crossorigin="anonymous"></script>
    <style>
        html {
    scroll-behavior: smooth;
}
        header {
            height: 100vh;
        }

        nav {
            height: 7vh;
        }

        .navbar-nav .nav-item:hover {
            background-color: #007bff;
            transition: background-color 0.3s ease-in-out;
        }

        header .hero_banner {
            background-image: url('<?php echo $images[0]['img_url'] ?>');
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
            height: 93vh;
            color: white;
        }
        
    </style>
</head>

<body>
    <header id="home">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="./form.html">Webster</a>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#services"><?php echo ucfirst($user['category']); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                </ul>


            </div>
        </nav>
        <div class="hero_banner py-5">
            <h1><?php echo $user['main_title']; ?></h1>
            <h2><?php echo $user['subtitle']; ?></h2>
        </div>
    </header>
    <main>
        <div class="container">

            <div class="about_us text-center mt-5" id="about">
                <h2>About us</h2>
                <p><?php echo $user['about_customer']; ?></p>
                <hr>
                <p>tel:<?php echo $user['phone']; ?></p>
                <p>Location:<?php echo $user['address']; ?></p>
            </div>
            <div class="services my-5" id="services">
                <div class="container px-0">
                    <div class="row">
                        <?php
                        for ($i = 1; $i < count($images); $i++) {
                            $imgUrl = $images[$i]['img_url'];
                            $description = $images[$i]['description'];
                        ?>
                            <div class="col-md-4">
                                <div class="card border border-dark rounded">
                                    <img src="<?php echo $imgUrl; ?>" class="card-img-top" alt="<?php echo $description; ?>" style=" max-height: 250px;">
                                    <div class="card-body text-white bg-dark ">
                                        <p class="card-text"><?php echo $description; ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>

            </div>
            <hr>
            <div class="contact" id="contact">
                <div class="row">
                    <div class="col-6">
                        <h2>Contact</h2>
                        <p><?php echo $user['about_company'] ?></p>
                    </div>
                    <div class="col-6">
                        <form action="" method="post">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control">
                            <label for="message">Message</label>
                            <textarea name="message" rows="8" id="message" class="form-control mb-3"></textarea>
                            <div class="text-center">
                                <button type="submit" class="btn btn-info">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </main>
    <footer class=" bg-dark py-3 mt-5">
        <div class="container text-center">
            <p class="text-white">Copyrights Viktor @ Webster</p>
            <div class="row justify-content-center">
                <a href="<?php echo $socialMediaUrls['facebook']; ?>" class="mr-3" target="_blank"><i class="fa-brands fa-facebook fa-2x"></i></a>
                <a href="<?php echo $socialMediaUrls['twitter']; ?>" class="mr-3" target="_blank"><i class="fa-brands fa-twitter fa-2x"></i></a>
                <a href="<?php echo $socialMediaUrls['linkedin']; ?>" class="mr-3" target="_blank"><i class="fa-brands fa-linkedin fa-2x"></i></a>
                <a href="<?php echo $socialMediaUrls['googleplus']; ?>" target="_blank"><i class="fa-brands fa-square-google-plus fa-2x"></i></a>

            </div>
        </div>
    </footer>
    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="ha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

    <!-- Latest Compiled Bootstrap 4.6 JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>

</html>