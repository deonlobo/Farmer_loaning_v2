
<!DOCTYPE html>
<html>
<head>

  <title>Layout Master</title>
  <link rel="stylesheet" type="text/css" href="./index.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<style>

</style>
</head>
<body>
  <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
 
<div class="">
    <div class="mySlides fade slideshow-container">
      <img src="./img/one.jpg">
      
    </div>

    <div class="mySlides fade slideshow-container">
      <img src="./img/two.jpg">
     
    </div>

    <div class="mySlides fade slideshow-container">

      <img src="./img/three.jpg" >
      
    </div>

</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>
 

   

  <div class="container2 blue ">
           <p class="fwhite"><marquee direction = "left">Our services cover the whole range of agriculture and allied activities with some of the unique features like</marquee></p>

           <ul class="fwhite">
             <li>Low interest rates</li>
             <li>No intermediaries</li>
             <li>No hidden cost</li>
             <li>Quick loan sanction and disbursement</li>
           </ul>
           <h2 class="fwhite"><marquee  width = "50%" direction = "right">Types of Loans</marquee></h2>

  </div>

  <div class="blue grid-wrapper">
  	      <a href="/Farmer_loaning_v2/crop_loan/croploan.php"><div class="box zone "><img src="./img/crop.jpg"><h2>Crop Loan</h2>
                                                         <p>The loan covers the crop production expenses, post-harvest expenses, contingencies, etc.</p>
                                                         </div></a>
  	      <a href="/Farmer_loaning_v2/tractor_loan/tractorloan.php"><div class="box zone"><img src="./img/tractor.jpg">
                                           <h2>Machinary Loan</h2>
                                           <p>The Loan amount will cover the cost of tractor, accessories, implements, insurance and registration expenses.</p>
                     </div></a>
  	      <a href="/Farmer_loaning_v2/dairy_loan/dairyloan.php"><div class="box zone"><img src="./img/diary.jpg">
                                           <h2>Dairy Loan</h2>
                                           <p>The loan is provided to dairy societies for modernization and creating infrastructures .  etc.</p> 
                                           </div></a>
  	      <a href="/Farmer_loaning_v2/fisheries_loan/fisheriesloan.php"><div class="box zone"><img src="./img/fisheries.jpg">
                                           <h2>Fisheries Loan</h2>
                                           <p>The loan is provided for buying fish seeds, fish net, and other equipment’s needed in the field</p> 
                                           </div></a>
  </div>
  <nav class="zone blue sticky">
        <ul class=main-nav>
          <li><a href="https://www.india.gov.in/topics/agriculture">Agriculture | National Portal of India</a></li>
          <li><a href="https://data.gov.in/keywords/farm-machinery">Products</a></li>
          <li><a href="/Farmer_loaning_v2/team1/team.html">Our Team</a></li>
          <li class="push">User : <?php 
                  session_start();
                  $_SESSION["farmerid"]=10000;

                  $farmerid=$_SESSION["farmerid"];
                  
                  // connect to the database
                  $conn = mysqli_connect('localhost', 'shaun', 'test1234', 'bankdb');

                  // check connection
                  if(!$conn){
                    echo 'Connection error: '. mysqli_connect_error();
                  }
                  $sql = "SELECT * FROM FARMER WHERE FarmerID=$farmerid";
                  $result = mysqli_query($conn, $sql);
                  $farmer = mysqli_fetch_assoc($result);
                  mysqli_free_result($result);
                  mysqli_close($conn);
                  $_SESSION["fname"]=$farmer['Fname'];
                  echo $farmer['Fname'];
               ?></li>
        </ul>
  </nav>
  
<script>
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}
</script>

<script type="text/javascript" src="./indexscript.js"></script>
</body>
</html>