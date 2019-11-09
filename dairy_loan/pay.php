<?php 
    include('config/db_connect.php');
    session_start();
    $farmerid=$_SESSION["farmerid"];
    $fname=$_SESSION["fname"];
    $totalamt=$_SESSION["totamt"];
    $AccNo = $Passwd = '';
    $error = '';
    $id_to_Pay=$_SESSION["id"];
    $monthlyamt=$_SESSION["monthlyamt"];
    $paidamt=$_SESSION["paidamt"];

        $sql = "SELECT * FROM LOAN L,BORROW BR,BANK B WHERE LoanNo = $id_to_Pay AND L.LoanID=BR.LoanID AND BR.BankID=B.BankID";

        // get the query result
        $result = mysqli_query($conn, $sql);

        // fetch result in array format
        $loan = mysqli_fetch_assoc($result);

        mysqli_free_result($result);

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
        	if($account['Balance']>$monthlyamt)    
        	{      
        		 $bal=$account['Balance']-$monthlyamt;
        		 $upacc="UPDATE FACCOUNT SET Balance = $bal WHERE AccNo = $AccNo";
                 $p=$paidamt+$monthlyamt;
                 echo $p;
                 $pamt = "UPDATE LOAN SET PaidAmount = $p WHERE LoanNo = $id_to_Pay";
                 mysqli_query($conn, $pamt);
                 if(($totalamt-$monthlyamt)<=0){ 
                   $dat = "UPDATE LOAN SET PayDate = now() WHERE LoanNo = $id_to_Pay";
                   mysqli_query($conn, $dat);
	        	   $sql = "UPDATE LOAN SET Lstatus='Paid' WHERE LoanNo = $id_to_Pay";
                   mysqli_query($conn, $sql);
                 }
					if(mysqli_query($conn, $upacc)){
						header('Location: dairyloan.php');
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
    <h5 class="white-text center">Monthly Installment= ₹<?php $monthlyamt=($loan['Amount']+$loan['RepayPeriod']*($loan['Amount']*$loan['LoanInterest'])/100)/(12*$loan['RepayPeriod']);
        $_SESSION["paidamt"]=$loan['PaidAmount'];
        $_SESSION["monthlyamt"]=$monthlyamt;
        echo $monthlyamt;
        ?></h5>
    <form class="white" action="pay.php" method="POST">
			<label>Account No :</label>
			<input type="text" name="AccNo" value="<?php echo htmlspecialchars($AccNo) ?>">
			<label>Transaction Password :</label>
			<input type="Password" name="Passwd" value="<?php echo htmlspecialchars($Passwd) ?>">
			<input type="submit" name="Pay" value="Pay" class="btn brand z-depth-0">
			<div class="red-text"><?php echo $error; ?></div>
    </form>
    <h4 class="white-text" style="margin-left: 2rem;margin-top: 10rem;">If u want to make the full payment click here<a href="payment.php"  class="btn white-text" style="margin-left: 2rem; " > Pay full Amount</a></h4>
	<?php include('templates/footer.php'); ?>

</html>