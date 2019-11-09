<?php
	include('config/db_connect.php');
    session_start();
    $farmerid=$_SESSION["farmerid"];
    $fname=$_SESSION["fname"];
    $LoanID=$_SESSION["LoanID"];
	$AccNo = $Amount = $email = $Aadhar='';
	$errors = array('AccNo' => '', 'LoanID' => '', 'Amount' => '','email'=>'','Aadhar'=>'');

	if(isset($_POST['submit'])){
		if(empty($_POST['Aadhar'])){
			$errors['Aadhar'] = 'Aadhar No is required';
		} else{
			$Aadhar = $_POST['Aadhar'];
			if(!preg_match('/^[0-9\s]+$/', $Aadhar)){
				$errors['Aadhar'] = 'Not valid Aadhar Number';
			}
		}
		// check title
		if(empty($_POST['AccNo'])){
			$errors['AccNo'] = 'A account number is required';
		} else{
			$AccNo = $_POST['AccNo'];
			if(!preg_match('/^[0-9\s]+$/', $AccNo)){
				$errors['AccNo'] = 'Not valid Account Number';
			}
		}
        if(empty($_POST['Amount'])){
			$errors['Amount'] = 'A account number is required';
		} else{
			$Amount = $_POST['Amount'];
			if(!preg_match('/^[0-9\s]+$/', $Amount)){
				$errors['Amount'] = 'Not valid Amount';
			}
		}
				// check email
		if(empty($_POST['email'])){
			$errors['email'] = 'An email is required';
		} else{
			$email = $_POST['email'];
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				$errors['email'] = 'Email must be a valid email address';
			}
		}
/*		$LoanID = mysqli_real_escape_string($conn, $_POST['Bank']);
		$bex="SELECT * FROM LOAN L WHERE L.LoanID = $LoanID AND Lstatus='Pending' AND L.AccNo IN (SELECT F.AccNo FROM FACCOUNT F WHERE FarmerID=$farmerid)";
	    $result = mysqli_query($conn, $bex);
	    $bnk = mysqli_fetch_assoc($result);
	    mysqli_free_result($result);
	    if($bnk['LoanID']==$LoanID)
	    {
	    	$errors['email']='Already Applied for Loan In This Bank';
	    }*/
	    /*____________________Amount Error_____________________*/
	    $Amount = mysqli_real_escape_string($conn, $_POST['Amount']);
		$amt="SELECT * FROM BORROW WHERE LoanID = $LoanID";
	    $result = mysqli_query($conn, $amt);
	    $amount = mysqli_fetch_assoc($result);
	    mysqli_free_result($result);
	    if($Amount>$amount['MaxAmount'])
	    {
	    	$errors['Amount']='Amount Exceeds Max Amount';
	    }
		/*// check ingredients
		if(empty($_POST['ingredients'])){
			$errors['ingredients'] = 'At least one ingredient is required';
		} else{
			$ingredients = $_POST['ingredients'];
			if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)){
				$errors['ingredients'] = 'Ingredients must be a comma separated list';
			}
		}*/

		if(array_filter($errors)){
			//echo 'errors in form';
		} else {
			// escape sql chars
			$Aadhar = mysqli_real_escape_string($conn, $_POST['Aadhar']);
			$Amount = mysqli_real_escape_string($conn, $_POST['Amount']);
			$AccNo = mysqli_real_escape_string($conn, $_POST['AccNo']);
			$email = mysqli_real_escape_string($conn, $_POST['email']);

            $facc="SELECT * FROM FACCOUNT WHERE AccNo = $AccNo AND FarmerID =$farmerid";
	        $result = mysqli_query($conn, $facc);
	        $account = mysqli_fetch_assoc($result);
	        mysqli_free_result($result);
	        if(!($account['AccNo']==$AccNo))
	        {
	        	$errors['AccNo']='Enter Your Valid Account No';
	        }else{ 
				// create sql
				$sql = "INSERT INTO LOAN(Aadhar,email,AccNo,LoanID,Amount,Lstatus,Approve) VALUES('$Aadhar','$email','$AccNo','$LoanID','$Amount','Pending','Not Approved')";

				// save to db and check
				if(mysqli_query($conn, $sql)){
					// success
					header('Location: addcon.php');
				} else {
					echo 'query error: '. mysqli_error($conn);
				}
			}
			
		}

	} // end POST check

?>

<!DOCTYPE html>
<html>
	
	<?php include('templates/header.php'); ?>
   
	<section class="container grey-text">
		<h4 class="center">Enter your details</h4>
		<form class="white" action="add.php" method="POST">
			<label>Aadhar card:</label>
			<input type="text" name="Aadhar" value="<?php echo htmlspecialchars($Aadhar) ?>">
			<div class="red-text"><?php echo $errors['Aadhar']; ?></div>
			<label>Amount :</label>
			<input type="text" name="Amount" value="<?php echo htmlspecialchars($Amount) ?>">
			<div class="red-text"><?php echo $errors['Amount']; ?></div>
			<label>Your Account No :</label>
			<input type="text" name="AccNo" value="<?php echo htmlspecialchars($AccNo) ?>">
			<div class="red-text"><?php echo $errors['AccNo']; ?></div>
			<label>Email</label>
			<input type="text" name="email" value="<?php echo htmlspecialchars($email) ?>">
			<div class="red-text"><?php echo $errors['email']; ?></div>
			<div class="center">
				<input type="submit" name="submit" value="Apply" class="btn brand z-depth-0">
			</div>
		</form>
	</section>

	<?php include('templates/footer.php'); ?>

</html>