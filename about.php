<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>About</title>

   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<section class="about">

   <div class="row">

      <div class="image">
         <img src="images/op.png" alt="">
      </div>

      <div class="content">
         <h3>Something About Us:</h3>
         <p>
Welcome to our One Piece treasure trove! Dive into a sea of merchandise inspired by the legendary manga and anime. From straw hats to Devil Fruit replicas, we've got it all. Set sail with us and discover the treasures of your favorite characters. 🏴‍☠️⚓</p>

         
         <a href="contact.php" class="btn">Contact Us</a>
      </div>

   </div>

</section>

<section class="reviews">
   
   <h1 class="heading">Client's Reviews.</h1>

   <div class="swiper reviews-slider">

   <div class="swiper-wrapper">

      <div class="swiper-slide slide">
         <img src="images/r1.jpg" alt="">
         <p>Been using their services for quite a bit and have never had an issue with the quality of their products. Online e-products working great as well. Only issue I have is they usually deliver when I'm a little caught up,</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3> <a href="https://www.facebook.com/login/" target="_blank">Haiqaloku</a></h3>
      </div>

      <div class="swiper-slide slide">
         <img src="images/r2.jpg" alt="">
         <p>"I'm a huge anime fan, so I'm always on the lookout for unique collectibles. This site had exactly what I was searching for, and the prices were very reasonable. My order arrived in perfect condition, and I couldn't be happier!"</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3><a href="https://www.facebook.com/login/" target="_blank">papar</a></h3>
      </div>

      <div class="swiper-slide slide">
         <img src="images/r3.jpg" alt="">
         <p>"I've ordered from many anime merchandise sites before, but this one stands out for its excellent customer service. They were quick to respond to my inquiries and went above and beyond to ensure my satisfaction. Highly recommend!"</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3><a href="https://www.facebook.com/login/" target="_blank">Manden</a></h3>
      </div>

      <div class="swiper-slide slide">
         <img src="images/r4.png" alt="">
         <p>"The selection on this site is incredible! As a collector, I appreciate being able to find both popular and niche items all in one place. Plus, the checkout process was smooth, and my order arrived well-packaged and on time. 10/10!"</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3><a href="https://www.facebook.com/login/" target="_blank">Syuku</a></h3>
      </div>

      <div class="swiper-slide slide">
         <img src="images/r5.png" alt="">
         <p>"I stumbled upon this site while searching for a gift for my anime-loving friend, and I'm so glad I did! They had the perfect item, and the gift wrapping option made it extra special. My friend was thrilled with their present,</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3><a href="https://www.facebook.com/login/" target="_blank">Acapan</a></h3>
      </div>


   </div>

   <div class="swiper-pagination"></div>

   </div>

</section>









<?php include 'components/footer.php'; ?>

<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<script src="js/script.js"></script>

<script>

var swiper = new Swiper(".reviews-slider", {
   loop:true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
   breakpoints: {
      0: {
        slidesPerView:1,
      },
      768: {
        slidesPerView: 2,
      },
      991: {
        slidesPerView: 3,
      },
   },
});

</script>

</body>
</html>