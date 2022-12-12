<?php
include('includes/header.php');
?>

<script src="script/gallery.js" async></script>
 <!-- Searching for Food  -->
    <section class="search-box">
            <form action="search.php" method="POST" >
                <input type="search" name="search" placeholder="Search for your Food" required>
                <input type="submit" name="submit" value="search" class="search-btn">
            </form>
    </section>
    <!-- Food catagories-->
<div class="checkout-text">Check out our food menu!</div>
<div class="menu-top">
<span><a class="menu-icon" href="side_appetizers.php">Appetizers<img class="small-icon" src="img/A-firedchicken.jpg"></a></span>
<span><a class="menu-icon" href="side_ramen.php">Ramen<img class="small-icon" src="img/ramen1.jpg"></a></span>
<span><a class="menu-icon" href="side_sushi.php">Sushi<img class="small-icon" src="img/S-sashimi.jpg"></a></span>
<span><a class="menu-icon" href="side_drinks.php">Drinks<img class="small-icon" src="img/D-greentea.jpg"></a></span>
</div>
 
    <!-- photo gallery -->

    <div class="gallery_container">

<div class="slides">
  <div class="number">1 / 4</div>
  <img class="gallery" src="img/photo2.jpg">
  <div class="text">Our restaurants</div>
</div>

<div class="slides">
  <div class="number">2 / 4</div>
  <img class="gallery" src="img/photo1.jpg">
  <div class="text">Dinning Room</div>
</div>

<div class="slides">
  <div class="number">3 / 4</div>
  <img class="gallery" src="img/photo3.jpg">
  <div class="text">Outside view</div>
</div>

<div class="slides">
  <div class="number">4 / 4</div>
  <img class="gallery" src="img/photo4.jpg">
  <div class="text">Our chef</div>
</div>

<a class="prev" onclick="addSlides(-1)"><</a>
<a class="next" onclick="addSlides(1)">></a>

</div>
<br>

<div style="text-align:center">
  <span class="point" onclick="screenSlides(1)"></span> 
  <span class="point" onclick="screenSlides(2)"></span> 
  <span class="point" onclick="screenSlides(3)"></span> 
  <span class="point" onclick="screenSlides(4)"></span> 
</div>

<h3>Join Our Event</h3>
<!--overlay event-->
<div class="event">
  <div class="eventphoto">
    <div class="box">
        <img src="img/event3.jpg" class="eventimage">
        <div class="desciption_overlay">
          <div class="textinside">Join our festival on the May2-3</div>
        </div>
      </div>
  </div>

  <div class="eventphoto">
    <div class="box">
        <img src="img/event1.jpg" class="eventimage">
        <div class="desciption_overlay">
          <div class="textinside">Special sale for you. Enjoy!</div>
        </div>
      </div>
  </div>

  <div class="eventphoto">
    <div class="box">
        <img src="img/event2.jpg" class="eventimage">
        <div class="desciption_overlay">
          <div class="textinside">Livestream 2021</div>
        </div>
      </div>
  </div>

</div>
<br><br>

<div class="scene" style = "text-align:center;">
<canvas id="myCanvas" width="1200" height="350" style="border:1px solid #000000; margin: 30px 0px 10px 0px;"></canvas>
</div>
<script src="script/animation.js"></script>
    

    <?php include('includes/footer.php'); ?>

    
