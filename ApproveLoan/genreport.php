<?php 

	include('crop_loan/config/db_connect.php');
    $total=$total1=0;
	// write query for all pizzas
	$sql = "SELECT * FROM LOAN WHERE Lstatus='Paid' ";

	// get the result set (set of rows)
	$result = mysqli_query($conn, $sql);

	// fetch the resulting rows as an array
	$diffloans = mysqli_fetch_all($result, MYSQLI_ASSOC);

	// free the $result from memory (good practise)
	mysqli_free_result($result);
	//Not Paid---------------------------------------------------
    $sql = "SELECT * FROM LOAN WHERE Lstatus='Pending' AND Approve ='Approved'";

	// get the result set (set of rows)
	$result = mysqli_query($conn, $sql);

	// fetch the resulting rows as an array
	$diffloans1 = mysqli_fetch_all($result, MYSQLI_ASSOC);

	// free the $result from memory (good practise)
	mysqli_free_result($result);


	// close connection
	mysqli_close($conn);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Report</title>
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
<body>
	  <h1 class="center white-text">Paid</h1>
	  <table id="customers" >
		  <tr>
		    <th>LoanNo</th>
		    <th>AccNo</th>
		    <th>LoanID</th>
		    <th>Amount</th>
		    <th>LoanDate</th>
		    <th>Lstatus</th>
		    <th>Approve</th>
		  </tr>
		  <?php foreach($diffloans as $loan): ?>
			  <tr>
			  	<?php $total=$total+$loan['Amount']; ?>
			    <td><?php echo htmlspecialchars($loan['LoanNo']); ?></td>
			    <td><?php echo htmlspecialchars($loan['AccNo']); ?></td>
			    <td><?php echo htmlspecialchars($loan['LoanID']); ?></td>
			    <td><?php echo htmlspecialchars($loan['Amount']); ?>.rs</td>
			    <td><?php echo htmlspecialchars($loan['LoanDate']); ?></td>
			    <td><?php echo htmlspecialchars($loan['Lstatus']); ?></td>
			    <td><?php echo htmlspecialchars($loan['Approve']); ?></td>
			  </tr>
		  <?php endforeach; ?>
		  
	</table>
	<h5 class="center white-text">Total Loan Paid =<?php echo $total ?></h5>
	<h1 class="center white-text">Not Paid</h1>
	<table id="customers" >
		  <tr>
		    <th>LoanNo</th>
		    <th>AccNo</th>
		    <th>LoanID</th>
		    <th>Amount</th>
		    <th>LoanDate</th>
		    <th>Lstatus</th>
		    <th>Approve</th>
		  </tr>
		  <?php foreach($diffloans1 as $loan): ?>
			  <tr>
			  	<?php $total1=$total1+$loan['Amount']; ?>
			    <td><?php echo htmlspecialchars($loan['LoanNo']); ?></td>
			    <td><?php echo htmlspecialchars($loan['AccNo']); ?></td>
			    <td><?php echo htmlspecialchars($loan['LoanID']); ?></td>
			    <td><?php echo htmlspecialchars($loan['Amount']); ?>.rs</td>
			    <td><?php echo htmlspecialchars($loan['LoanDate']); ?></td>
			    <td><?php echo htmlspecialchars($loan['Lstatus']); ?></td>
			    <td><?php echo htmlspecialchars($loan['Approve']); ?></td>
			  </tr>
		  <?php endforeach; ?>
	</table>
	<h5 class="center white-text">Amount Loaned =<?php echo $total1 ?></h5>
		  

		 
</body>
</html>