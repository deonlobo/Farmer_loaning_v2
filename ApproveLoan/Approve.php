<?php 

	include('crop_loan/config/db_connect.php');

	// write query for all pizzas
	$sql = "SELECT * FROM LOAN L, BORROW BR ,FARMER F WHERE Approve='Not Approved'  AND L.LoanID=BR.LoanID AND L.Aadhar=F.Aadhar";

	// get the result set (set of rows)
	$result = mysqli_query($conn, $sql);

	// fetch the resulting rows as an array
	$diffloans = mysqli_fetch_all($result, MYSQLI_ASSOC);

	// free the $result from memory (good practise)
	mysqli_free_result($result);

	if(isset($_POST['submit'])){
        $LoanNo=$_POST['LoanNo'];
		$sql="UPDATE LOAN SET Approve ='Approved' WHERE LoanNo=$LoanNo";
        mysqli_query($conn, $sql);

        $AccNo=$_POST['AccNo'];
        $Amount=$_POST['Amount'];
        $facc="SELECT * FROM FACCOUNT WHERE AccNo = $AccNo";
        $result = mysqli_query($conn, $facc);
        $account = mysqli_fetch_assoc($result);
        mysqli_free_result($result);

        $bal=$account['Balance']+$Amount;
        $upacc="UPDATE FACCOUNT SET Balance = $bal WHERE AccNo = $AccNo";
        mysqli_query($conn, $upacc);
        header('Location: Approve.php');
	}
    if(isset($_POST['Mail'])){
/*        $email=$_POST['email'];
        $to      = '$email';
    	$subject = 'the subject';
   		$message = 'hello';
   		$headers = 'From: deonvictorlobo@gmail.com' . "\r\n" .
        'Reply-To: webmaster@example.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

	    mail($to, $subject, $message, $headers);

	    echo 'Email Sent.';*/
	    header('Location: https://mail.google.com/mail/u/0/#inbox');

	}
	// close connection
	mysqli_close($conn);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Approval</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	<style type="text/css">
	body{
		background: linear-gradient(to left,rgba(7,27,82,1)0%, rgba(0,128,128,1)100%);
	}
	.brand{
	  	background: #cbb09c !important;
	}
    .lightgrey{
       color:#B9B3A8;
    }
  	.brand-text{
  		color: #cbb09c !important;
  	}
  	form{
  		max-width: 600px;
  		margin: 20px auto;
  		padding: 20px;
  	}
    .blue{
    background: linear-gradient(to left,rgba(7,27,82,1)0%, rgba(0,128,128,1)100%);
    }
    /*----------------------------For diffLoanInfo.php--------------------------------*/

    #customers {
      font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 80%;
    }

    #customers td, #customers th {
      border: 1px solid #ddd;
      padding: 8px;
    }

    #customers tr{
              background-color: white;

    }

    #customers tr:hover {background-color: #ddd;}

    #customers th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: grey;
      color: white;
     }
     table{
       margin: 60px auto;
     }
  </style>

</head>
<body class="center">
         <?php if($diffloans): ?>
		  <?php foreach($diffloans as $loan): ?>
              <h3 class="white-text">Loan Type:<?php echo $loan['LoanType']; ?></h3>
              <h3 class="white-text">Equipment Detail</h3>
              <h5 class="white-text"><?php echo $loan['Equipment']; ?></h5>
		      <table id="customers" >
		  		<tr>
					<td><h6>LoanNo:</h6></td>
					<td><h6><?php echo $loan['LoanNo']; ?></h6></td>
				</tr>
				<tr>
					<td><h6>Aadhar : </h6></td>
					<td><h6><?php echo $loan['Aadhar']; ?></h6></td>
			    </tr>
			    <tr>
					<td><h6>Farmer Name : </h6></td>
					<td><h6><?php echo $loan['Fname']; ?></h6></td>
			    </tr>
			    <tr>
					<td><h6>Address : </h6></td>
					<td><h6><?php echo $loan['Faddress']; ?></h6></td>
			    </tr>
				<tr>
				    <td><h6>Account No :</h6></td>
				    <td><h6><?php echo $loan['AccNo']; ?></h6></td>
				</tr>
				<tr>
					<td><h6>Loan Interest : </h6></td>
					<td><h6><?php echo $loan['LoanInterest']; ?>%</h6></td>
				</tr>
				<tr>
					<td><h6>Loan Amount : </h6</td>
					<td><h6><?php echo date($loan['Amount']); ?></h6></td>
				</tr>
				<tr>
					<td><h6>Maximum Amount : </h6</td>
					<td><h6><?php echo date($loan['MaxAmount']); ?></h6></td>
				</tr>
				<tr>
					<td><h6>Margin : </h6></td>
					<td><h6><?php echo ($loan['Margin']); ?>%</h6></td>
				</tr>

	        </table>
	        <form action="Approve.php" method="POST" style="background-color: white;max-width: 280px;">
	        	<input type="hidden" name="LoanNo" value="<?php echo $loan['LoanNo']; ?>">
	        	<input type="hidden" name="AccNo" value="<?php echo $loan['AccNo']; ?>">	
	        	<input type="hidden" name="Amount" value="<?php echo $loan['Amount']; ?>">   
	        	<input type="hidden" name="email" value="<?php echo $loan['email']; ?>">
	        	<input type="submit" name="Mail" value="Send Mail" class="btn brand z-depth-0">
			    <input type="submit" name="submit" value="Sanction" class="btn brand z-depth-0">
	        </form>
	        <hr>

		  <?php endforeach; ?>
        <?php else: ?>
			<h1 class="white-text">No Loans to sanction</h1>
		<?php endif ?>
		 
</body>
</html>