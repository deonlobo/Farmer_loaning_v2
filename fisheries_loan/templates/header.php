
<head>
	<title>fisheries Loan</title>
	<!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <link rel="stylesheet" type="text/css" href="/Farmer_loaning_v2/index.css">
  <style type="text/css">
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
    .zmargin{
         margin:0px;
         padding: 0px !important;
    }
    .rborder{
        border-style: solid;
        border-width: 0px 1px 0px 0px;
    }
    .pad{
      padding:24px !important;
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
     .main-nav{
      display:flex;
      list-style: none;
      font-size:1.6em;
      margin: 0;
      }
      .push{
          margin-left: auto;
      }
      @media only screen and (max-width: 1000px){
          .main-nav {
              font-size:0px;
              padding: 0;
          }
      }

      nav a{
          color: #f5f5f6;
          text-decoration: none;
      }

  </style>
</head>
<body class="blue">
	<nav class="white z-depth-0">
    <div class="main-nav">
      <a href="/Farmer_loaning_v2/fisheies_loan/fisheriesloan.php" class="brand-text " style="margin-left:100px;">Fisheries Loan </a>
      <ul class="push" >
        <li><a href="/Farmer_loaning_v2/fisheries_loan/loans/fisheries.php" class="btn brand z-depth-0">Apply for a Loan</a></li>
        <li><a class="brand-text " style="margin-right: 100px ;margin-left: 50px;font-size:1.1em;" href="/Farmer_loaning_v2/index.php"> User : <?php echo $fname ?></a></li>
      </ul>
    </div>
  </nav>
