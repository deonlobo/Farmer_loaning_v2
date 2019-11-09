<?php 
     
	include('config/db_connect.php');
    session_start();
    $farmerid=$_SESSION["farmerid"];
    $fname=$_SESSION["fname"];
	if(isset($_POST['PayLoan'])){

		$id_to_Pay = mysqli_real_escape_string($conn, $_POST['id_to_Pay']);
		$_SESSION["id"]=$id_to_Pay;
        header('Location: pay.php');

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
		$sql = "SELECT * FROM LOAN L,BORROW BR,BANK B WHERE LoanNo = $id AND L.LoanID=BR.LoanID AND BR.BankID=B.BankID";

		// get the query result
		$result = mysqli_query($conn, $sql);

		// fetch result in array format
		$loan = mysqli_fetch_assoc($result);

		mysqli_free_result($result);
		mysqli_close($conn);

	}

?>

<!DOCTYPE html>
<html>

	<?php include('templates/header.php'); ?>
     
	<div class="container center lightgrey">
		<?php if($loan): ?>
			<table id="customers" >
		  		<tr>
					<td><h6>Loan No :</h6></td>
					<td><h6><?php echo $loan['LoanNo']; ?></h6></td>
				</tr>
				<tr>
				    <td><h6>Aadhar No :</h6></td>
				    <td><h6><?php echo $loan['Aadhar']; ?></h6></td>
				</tr>
				<tr>
					<td><h6>Bank Name: </h6></td>
					<td><h6><?php echo $loan['BankName']; ?></h6></td>
			    </tr>
				<tr>
					<td><h6>Loan Amount : </h6></td>
					<td><h6>₹<?php echo $loan['Amount']; ?></h6></td>
				</tr>
				<tr>
					<td><h6>Loan date : </h6</td>
					<td><h6><?php echo date($loan['LoanDate']); ?></h6></td>
				</tr>
				<tr>
					<td><h6>Repayment Period : </h6></td>
					<td><h6><?php echo ($loan['RepayPeriod']); ?> years</h6></td>
				</tr>
				<tr>
					<td><h6>Loan Interest : </h6></td>
					<td><h6><?php echo ($loan['LoanInterest']); ?>%</h6></td>
				</tr>
				<tr>
					<td><h6>Margin : </h6></td>
					<td><h6>₹<?php $margin=($loan['Amount']*$loan['Margin'])/100;
				                   echo $margin?></h6></td>
				</tr>
	            <tr>
	            	<td><h6>Loan Remaining: </h6></td>
	            	<td><h6>₹<?php $totalamt=$loan['Amount']+
	                                              $loan['RepayPeriod']*($loan['Amount']*$loan['LoanInterest'])/100-$loan['PaidAmount'];
	                                     $_SESSION["totamt"]=$totalamt;
	                                     echo $totalamt;
	             ?></h6></td>
	            </tr>
	        </table>
			<!-- DELETE FORM -->
			<form action="details.php" method="POST" style="margin-top: 0px ;padding-top: 0px;">
				<input type="hidden" name="id_to_Pay" value="<?php echo $loan['LoanNo']; ?>">
				<input type="submit" name="PayLoan" value="Pay Loan" class="btn brand z-depth-0" style="font-size: 20px;">
			</form>

		<?php else: ?>
			<h6>No such Loans exists.</h6>
		<?php endif ?>
	</div>

	<?php include('templates/footer.php'); ?>

</html>