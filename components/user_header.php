<?php
   if(isset($message)){
      foreach($message as $message){
         echo '
         <div class="message">
            <span>'.$message.'</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
         </div>
         ';
      }
   }
?>

<header class="header">

   <section class="flex">

      <a href="home.php" class="logo">Ecommerce<span></span></a>

      <nav class="navbar">
         <a href="home.php"> HOME</a>
         <a href="about.php">ABOUT</a>
         <a href="orders.php">ORDERS</a>
         <a href="shop.php">SHOP</a>
         <a href="contact.php">CONTACT</a>
      </nav>

      <div class="icons">
         <?php
           

            $count_cart_items = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
            $count_cart_items->execute([$user_id]);
            $total_cart_counts = $count_cart_items->rowCount();
         ?>
         <div id="menu-btn" class="fas fa-bars"></div>
         <a href="search_page.php"><i class="fas fa-search"></i></a>
        &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;<a class="text-primary" href="cart.php" style="position: relative;"><i class="fas fa-shopping-cart"></i><span>&nbsp;<span class="bg-primary text-white text-small" style="font-size: 13px; margin-top: -3px; position: absolute;top: 8px;padding:2px 3px 0; border-radius: 5px;" ><?= $total_cart_counts; ?></span></span></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         <div id="user-btn" class="fas fa-user "></div>
      </div>

      <div class="profile">
         <?php          
            $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
            $select_profile->execute([$user_id]);
            if($select_profile->rowCount() > 0){
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
         <p><?= $fetch_profile["name"]; ?></p>
         <a href="update_user.php" class="btn">update profile</a>
         <!-- <div class="flex-btn">
            <a href="user_register.php" class="option-btn">register</a>
            <a href="user_login.php" class="option-btn">login</a>
         </div> -->
         <a href="components/user_logout.php" class="delete-btn" onclick="return confirm('logout from the website?');">logout</a> 
         <?php
            }else{
         ?>
         <p>please login or register first!</p>
         <div class="flex-btn">
            <a href="user_register.php" class="option-btn">register</a>
            <a href="user_login.php" class="option-btn">login</a>
         </div>
         <?php
            }
         ?>      
         
         
      </div>

   </section>

</header>