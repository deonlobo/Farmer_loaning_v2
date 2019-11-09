<?php 

	include('config/db_connect.php');
    session_start();
    $farmerid=$_SESSION["farmerid"];
    $fname=$_SESSION["fname"];



?>

<!DOCTYPE html>
<html>
	<?php include('templates/header.php'); ?>
	<h2 class="white-text " style="margin-left: 4rem">Select your Loan</h2>
    <div class="grid-wrapper" style="margin-left: 3rem">
  	      <a href="./loans/tractor.php"><div class="box zone "><img src="./img/tractor.jpg"><h4>Tractor Loan</h4>
                                                         <p>The Loan amount will cover the cost of tractor, insurance and registration expenses.</p>
                                                         </div></a>
  	      <a href="./loans/tiller.php"><div class="box zone"><img src="./img/tiller.jpg">
                                           <h4>Tiller Loan</h4>
                                           <p>The Loan amount will cover the cost of Sowing and tillage equipment,implements, insurance and registration expenses.</p>
                     </div></a>
  	      <a href="./loans/other.php"><div class="box zone"><img src="./img/harvest.jpg">
                                           <h4>Other Machines</h4>
                                           <p>Farmers engaged in agricultural activities and own the land under cultivation are provided with loans.</p> 
                                           </div></a>
  	     
    </div>



	<?php include('templates/footer.php'); ?>

</html>

