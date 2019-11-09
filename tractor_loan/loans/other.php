<?php 

	include('../config/db_connect.php');
    session_start();
    $farmerid=$_SESSION["farmerid"];
    $fname=$_SESSION["fname"];
    $_SESSION["ltype"]='Other Loan';

?>

<!DOCTYPE html>
<html>
	<?php include('../templates/header.php'); ?>
    <h3 class="white-text center" style="margin-top: 3rem;">Other Loan</h3>
    <div style="margin-left: 5rem;">
    	<h4 class="white-text center">Select the bank where you want to apply loan for </h4>
    	<ol style="margin-left: 25rem;color: white;">
    		<li><a href="bankdet.php?id=80006"><h3 class="btn brand z-depth-0" style="font-size: 17px !important;">Canara Bank</h3></a></li>
    		<li><a href="bankdet.php?id=80008"><h3 class="btn brand z-depth-0"  style="font-size: 17px !important;">Corporation Bank</h3></a></li>
    		<li><a href="bankdet.php?id=80018"><h3 class="btn brand z-depth-0"  style="font-size: 17px !important;">Union Bank Of India</h3></a></li>
    	</ol>
    </div>

	<?php include('../templates/footer.php'); ?>

</html>
