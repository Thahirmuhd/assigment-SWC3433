<?php
include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
   exit(); // Ensure no further code execution after redirect
}

// Check if the name parameter is set in the URL and contains only alphabetic characters
if(isset($_GET['name']) && preg_match("/^[a-zA-Z ]*$/", $_GET['name'])){
    $name = $_GET['name'];

    // Query to fetch orders based on name
    $select_orders = $conn->prepare("SELECT * FROM `orders` WHERE name LIKE ?");
    $select_orders->execute(["%$name%"]);
} else {
    // If name parameter is not set or contains non-alphabetic characters, redirect back to dashboard
    header('Location: dashboard.php');
    exit(); // Ensure no further code execution after redirect
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Search Results</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<?php include '../components/admin_header.php'; ?>

<section class="dashboard">

   <h1 class="heading">Search Results</h1>

   <div class="box-container">

<?php
   if($select_orders->rowCount() > 0){
      while($fetch_orders = $select_orders->fetch(PDO::FETCH_ASSOC)){
?>
<div class="box">
   <p> Order ID : <span><?= generateOrderID(); ?></span> </p> <!-- Display the generated order ID -->
   <p> Placed On : <span><?= $fetch_orders['placed_on']; ?></span> </p>
   <p> Name : <span><?= $fetch_orders['name']; ?></span> </p>
   <p> Number : <span><?= $fetch_orders['number']; ?></span> </p>
   <p> Address : <span><?= $fetch_orders['address']; ?></span> </p>
   <p> Total products : <span><?= $fetch_orders['total_products']; ?></span> </p>
   <p> Total price : <span>RM <?= $fetch_orders['total_price']; ?></span> </p>
   <p> Payment method : <span><?= $fetch_orders['method']; ?></span> </p>
   <form action="" method="post">
      <input type="hidden" name="order_id" value="<?= $fetch_orders['id']; ?>">
      <select name="payment_status" class="select">
         <option selected disabled><?= $fetch_orders['payment_status']; ?></option>
         <option value="pending">Pending</option>
         <option value="completed">Completed</option>
      </select>
     <div class="flex-btn">
      <input type="submit" value="update" class="option-btn" name="update_payment">
      <a href="placed_orders.php?delete=<?= $fetch_orders['id']; ?>" class="delete-btn" onclick="return confirm('delete this order?');">delete</a>
     </div>
   </form>
</div>
<?php
      }
   }else{
      echo '<p class="empty">No orders found for the searched name!</p>';
   }
?>

</div>

</section>

<script src="../js/admin_script.js"></script>
   
</body>
</html>
