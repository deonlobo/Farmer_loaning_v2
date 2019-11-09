<?php 

	include('config/db_connect.php');
    session_start();
    $farmerid=$_SESSION["farmerid"];
    $fname=$_SESSION["fname"];
	// write query for all pizzas
	$sql = "SELECT * FROM LOAN L,BORROW BR,BANK B 
	        WHERE L.LoanID=BR.LoanID AND BR.BankID=B.BankID AND Lstatus='Pending' AND Approve='Approved' AND BR.LoanType='Tractor Loan'
            AND L.AccNo IN (SELECT F.AccNo FROM FACCOUNT F WHERE FarmerID=$farmerid)
	        ORDER BY LoanDate ";

	// get the result set (set of rows)
	$result = mysqli_query($conn, $sql);

	// fetch the resulting rows as an array
	$loans = mysqli_fetch_all($result, MYSQLI_ASSOC);

	// free the $result from memory (good practise)
	mysqli_free_result($result);

	// close connection
	mysqli_close($conn);


?>

<!DOCTYPE html>
<html>
	
	<?php include('templates/header.php'); ?>
    <?php if($loans){ ?>
		<h4 class="center lightgrey" style="margin-top:50px;margin-bottom: 50px;">Sanctioned Loans </h4>
    <?php }?>
	<div class="container">
		<div class="row">
			<?php if($loans){ ?>
                <div class="card-content row zmargin white" >
							<h6 class="col s3 rborder pad">Loan No.</h6>
							<h6 class="col s3 rborder pad">Account:</h6>  
							<h6 class="col s3 rborder pad">Bank:</h6>
							<h6 class="col s3 pad">Loan Amount:</h6>
				 </div>
			<?php }else {?>
				      <h4 class="center lightgrey" style="margin-top:50px;margin-bottom: 50px;">No Tractor Loans Applied</h4>
		    <?php }?>
			<?php foreach($loans as $loan): ?>
				<!-- <div class="col s6 md3"> -->
					<div class="card z-depth-0" style="margin-bottom: 0px;">
						<!-- <img src="img/pizza.svg"class="pizza"> -->
						<div class="card-content row zmargin">
							<h6 class="col s3 rborder pad"><?php echo htmlspecialchars($loan['LoanNo']); ?></h6>
							<h6 class="col s3 rborder pad"><?php echo htmlspecialchars($loan['AccNo']); ?></h6>  
							<h6 class="col s3 rborder pad"><?php echo htmlspecialchars($loan['BankName']); ?></h6>
							<h6 class="col s3 pad"><?php echo htmlspecialchars($loan['Amount']); ?> .rs</h6>
						</div>
						<div class="card-action right-align " >
							<a class="brand-text" href="details.php?id=<?php echo $loan['LoanNo'] ?>">more info</a>
						</div>
					</div>
				<!-- </div> -->

			<?php endforeach; ?>

		</div>
	</div>

	<?php include('templates/footer.php'); ?>

</html>