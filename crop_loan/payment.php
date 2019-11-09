<?php 
    include('config/db_connect.php');
    session_start();
    $farmerid=$_SESSION["farmerid"];
    $fname=$_SESSION["fname"];

    $AccNo = $Passwd = '';
    $error = '';
    $id_to_Pay=$_SESSION["id"];
    $totalamt=$_SESSION["totamt"];
	if(isset($_POST['Pay'])){
        $AccNo=$_POST['AccNo'];
        $Passwd=$_POST['Passwd'];
        $facc="SELECT * FROM FACCOUNT WHERE AccNo = $AccNo";
        $result = mysqli_query($conn, $facc);
        $account = mysqli_fetch_assoc($result);
        mysqli_free_result($result);

        if(!($account['AccNo']==$AccNo && $account['Password']==$Passwd))
        {    
        	 $error='Account No Or Password Invalid';
        }else{
        	if($account['Balance']>$totalamt)    
        	{      
        		 $bal=$account['Balance']-$totalamt+0.05*totalamt;
        		 $upacc="UPDATE FACCOUNT SET Balance = $bal WHERE AccNo = $AccNo";
        		 mysqli_query($conn, $upacc);
                 $dat = "UPDATE LOAN SET PayDate = now() WHERE LoanNo = $id_to_Pay";
                 mysqli_query($conn, $dat);
	        	 $sql = "UPDATE LOAN SET Lstatus='Paid' WHERE LoanNo = $id_to_Pay";
					if(mysqli_query($conn, $sql)){
						header('Location: croploan.php');
					} else {
						echo 'query error: '. mysqli_error($conn);
					}
					mysqli_close($conn);
			}else{
				 $error='Balance is less';
			}

        }
       
	}

?>

<!DOCTYPE html>
<html>

	<?php include('templates/header.php'); ?>
    <h5 class="white-text center">Pay ₹<?php echo $totalamt+0.05*$totalamt; ?></h5>
    <form class="white" action="payment.php" method="POST">
			<label>Account No :</label>
			<input type="text" name="AccNo" value="<?php echo htmlspecialchars($AccNo) ?>">
			<label>Transaction Password :</label>
			<input type="Password" name="Passwd" value="<?php echo htmlspecialchars($Passwd) ?>">
			<input type="submit" name="Pay" value="Pay" class="btn brand z-depth-0">
			<div class="red-text"><?php echo $error; ?></div>
    </form>
	<?php include('templates/footer.php'); ?>

</html>