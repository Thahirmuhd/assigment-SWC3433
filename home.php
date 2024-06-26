<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

include 'components/wishlist_cart.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>NakamaTreasure</title>

   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<div class="home-bg">

<div class="home-bg">

    <section class="home">

        <div class="swiper home-slider">

            <div class="swiper-wrapper">

                <div class="swiper-slide slide">
                    <div class="image">
                        <img src="images/slideshow1.1.jpg" alt="">
                    </div>
                    <div class="content">
                        <span>New Items</span>
                        <h3>Available Now</h3>
                        <a href="category.php?category=smartphone" class="btn">Shop Now</a>
                    </div>
                </div>

                <div class="swiper-slide slide">
                    <div class="image">
                        <img src="images/slideshow2.jpg" alt="">
                    </div>
                    <div class="content">
                        <span>New Items</span>
                        <h3>Available Now</h3>
                        <a href="category.php?category=watch" class="btn">Shop Now.</a>
                    </div>
                </div>

                <div class="swiper-slide slide">
                    <div class="image">
                        <img src="images/slideshow1.jpg" alt="">
                    </div>
                    <div class="content">
                        <span>New Items</span>
                        <h3>Available Now</h3>
                        <a href="shop.php" class="btn">Shop Now.</a>
                    </div>
                </div>

                <div class="swiper-slide slide">
                    <div class="image">
                        <img src="images/slide2.jpg" alt="">
                    </div>
                    <div class="content">
                        <span>New Items</span>
                        <h3>Available Now</h3>
                        <a href="category.php?category=smartphone" class="btn">Shop Now</a>
                    </div>
                </div>

            </div>

        </div>
         <!-- Include Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper('.home-slider', {
        loop: true,
        autoplay: {
            delay: 2000, // 5 seconds delay between slides
        },
    });
</script>

        <!-- Video background -->
        <div class="video-background">
            <video autoplay muted loop id="bg-video">
                <source src="images/video.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>

    </section>

</div>


</div>

<section class="bottom" style="background-image: url('images/bg3.png'); background-size: cover; background-position: center; padding: 0; max-width: 100%;">
<section class="category" style="position:center">



<h1 class="heading">Shop by Category</h1>

<div class="swiper category-slider">

<div class="swiper-wrapper">

<a href="category.php?category=cap" class="swiper-slide slide">
   <img src="images/icon1.png" alt="">
   <h3>Cap</h3>
</a>

<a href="category.php?category=lanyard" class="swiper-slide slide">
   <img src="images/icon2.png" alt="">
   <h3>Lanyard</h3>
</a>

<a href="category.php?category=t-shirt" class="swiper-slide slide">
   <img src="images/icon3.png" alt="">
   <h3>T-Shirt</h3>
</a>

<a href="category.php?category=Shoes" class="swiper-slide slide">
   <img src="images/icon4.png" alt="">
   <h3>Shoes</h3>
</a>

<a href="category.php?category=keychain" class="swiper-slide slide">
   <img src="images/icon5.png" alt="">
   <h3>Keychain</h3>
</a>



</div>

<div class="swiper-pagination"></div>

</div>

</section>

<section class="home-products" style="color:#fff">


<h1 class="heading">Latest products</h1>

<div class="swiper products-slider">

<div class="swiper-wrapper">

<?php
  $select_products = $conn->prepare("SELECT * FROM `products`ORDER BY RAND() LIMIT 15"); 
  $select_products->execute();
  if($select_products->rowCount() > 0){
   while($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)){
?>
<form action="" method="post" class="swiper-slide slide">
   <input type="hidden" name="pid" value="<?= $fetch_product['id']; ?>">
   <input type="hidden" name="name" value="<?= $fetch_product['name']; ?>">
   <input type="hidden" name="price" value="<?= $fetch_product['price']; ?>">
   <input type="hidden" name="image" value="<?= $fetch_product['image_01']; ?>">
   <button class="fas fa-heart" type="submit" name="add_to_wishlist"></button>
   <a href="quick_view.php?pid=<?= $fetch_product['id']; ?>" class="fas fa-eye"></a>
   <img src="uploaded_img/<?= $fetch_product['image_01']; ?>" alt="">
   <div class="name"><?= $fetch_product['name']; ?></div>
   <div class="flex">
      <div class="price"><span>RM </span><?= $fetch_product['price']; ?><span></span></div>
      <input type="number" name="qty" class="qty" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="1">
   </div>
   <input type="submit" value="add to cart" class="btn" name="add_to_cart">
</form>
<?php
   }
}else{
   echo '<p class="empty">no products added yet!</p>';
}
?>

</div>

<div class="swiper-pagination"></div>

</div>

</section>
</section>









<?php include 'components/footer.php'; ?>

<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<script src="js/script.js"></script>

<script>

var swiper = new Swiper(".home-slider", {
   loop:true,
   autoplay: {
            delay: 2000, // 5 seconds delay between slides
        },
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
    },
});

 var swiper = new Swiper(".category-slider", {
   loop:true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
   breakpoints: {
      0: {
         slidesPerView: 2,
       },
      650: {
        slidesPerView: 3,
      },
      768: {
        slidesPerView: 4,
      },
      1024: {
        slidesPerView: 5,
      },
   },
});

var swiper = new Swiper(".products-slider", {
   loop:true,
   autoplay: {
            delay: 2000, // 5 seconds delay between slides
        },
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
   breakpoints: {
      550: {
        slidesPerView: 2,
      },
      768: {
        slidesPerView: 2,
      },
      1024: {
        slidesPerView: 3,
      },
   },
});

</script>

</body>
</html>