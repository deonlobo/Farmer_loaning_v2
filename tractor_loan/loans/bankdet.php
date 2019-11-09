<?php 
     
	include('../config/db_connect.php');
    session_start();
    $farmerid=$_SESSION["farmerid"];
    $fname=$_SESSION["fname"];
    $ltype=$_SESSION["ltype"];
	if(isset($_POST['submit'])){

		$Apply = mysqli_real_escape_string($conn, $_POST['Apply']);
		$_SESSION["LoanID"]=$Apply;
        header('Location: ../add.php');

		/*$sql = "UPDATE LOAN SET Lstatus='Paid' WHERE LoanNo = $id_to_Pay";

		if(mysqli_query($conn, $sql)){
			header('Location: croploan.php');
		} else {
			echo 'query error: '. mysqli_error($conn);
		}
*/
	}

	// check GET request id param
	if(isset($_GET['id'])){
		
		// escape sql chars
		$id = mysqli_real_escape_string($conn, $_GET['id']);

		// make sql
		$sql = "SELECT * FROM BORROW BR,BANK B WHERE BR.LoanType='$ltype' AND BR.BankID=B.BankID AND BR.BankID=$id;";

		// get the query result
		$result = mysqli_query($conn, $sql);

		// fetch result in array format
		$diffloans = mysqli_fetch_all($result, MYSQLI_ASSOC);

		mysqli_free_result($result);
		mysqli_close($conn);

	}

?>

<!DOCTYPE html>
<html>

	<?php include('../templates/header.php'); ?>
     
	<div class="container center lightgrey">
		<?php if($diffloans): ?>
			<?php foreach($diffloans as $loan): ?>
		    <h3>Equipment Detail</h3>
		    <img src="<?php echo $loan['img']; ?>" height="350" width="500">
		    <h5><?php echo $loan['Equipment']; ?></h5>
			<table id="customers" >
		  		<tr>
					<td><h6>Bank Name :</h6></td>
					<td><h6><?php echo $loan['BankName']; ?></h6></td>
				</tr>
				<tr>
				    <td><h6>Loan Type :</h6></td>
				    <td><h6><?php echo $loan['LoanType']; ?></h6></td>
				</tr>
				<tr>
					<td><h6>Repayment Period : </h6></td>
					<td><h6><?php echo $loan['RepayPeriod']; ?></h6></td>
			    </tr>
				<tr>
					<td><h6>Loan Interest : </h6></td>
					<td><h6><?php echo $loan['LoanInterest']; ?>%</h6></td>
				</tr>
				<tr>
					<td><h6>Maximum Amount : </h6</td>
					<td><h6>₹<?php echo date($loan['MaxAmount']); ?></h6></td>
				</tr>
				<tr>
					<td><h6>Margin : </h6></td>
					<td><h6><?php echo ($loan['Margin']); ?>%</h6></td>
				</tr>

	        </table>

			<!-- DELETE FORM -->
			<form action="bankdet.php" method="POST" style="margin-top: 0px ;padding-top: 0px;">
				<input type="hidden" name="Apply" value="<?php echo $loan['LoanID']; ?>">
				<input type="submit" name="submit" value="Apply" class="btn brand z-depth-0" style="font-size: 20px;">
			</form>
            <?php endforeach; ?>
		<?php else: ?>
			<h6>No such Loans exists.</h6>
		<?php endif ?>
	</div>

	<?php include('../templates/footer.php'); ?>

</html>