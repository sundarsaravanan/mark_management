<?php
session_start();
if (isset($_SESSION['id'])) {
  
  include_once("dbconnect.php");

    $id=$_SESSION['id'];
$qid=$_SESSION['qid'];

    $sql = "SELECT * FROM questions where question_paper_id=$qid";
  $query = mysqli_query($dbcon, $sql);
    $rowcount=mysqli_num_rows($query);
  
  
  mysqli_close($dbcon);
        
}



else{
   header("Location: index.php"); 
}
?>





<!DOCTYPE html>
<html>
<head>
  <title>Kcet-Login</title>
  <link rel="stylesheet" type="text/css" href="css/custom.css">
  <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
  <script src="js/jquery-3.0.0.min.js"></script>
          <script type="text/javascript" src="js/list.js"></script>


</head>
<body  onload="before();">
<div class="container-fluid">
  <div class="row" style="height:40px;"></div>
    <div class="row">
      <div class="col-lg-2">
        <button type="button" class="btn btn-danger " style="float:left;" onclick="window.location='logout.php'">  <span class="glyphicon glyphicon-log-out" aria-hidden="true" 
            style="font-size: 20px;"></span>Logout
        </button>
      </div>
      <div class="col-lg-8"><center><h2>Review</h2></center></div>
      <div class="col-lg-2"> 
        <button type="button" class="btn btn-info " style="float:right;" onclick="window.location='home.php'"> Home
        </button>
      </div>
    </div>
    <hr>
    
    <div class="row" >
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
                  	<div class="form-horizontal col-md-12 ">
                		
                		<table class="table table-striped ">
                		<thead>
						     <tr>
						        <th>Question</th>
						        <th>Marks</th>
						        <th>Course Output</th>
						        <th>Program Output</th>
							</tr>
						    </thead>
						    
						    <tbody>

						    <?php



  
	
	while($row = mysqli_fetch_array($query))
	{ 
	    echo '<tr><td>'.$row['question'].'</td><td>'.$row["marks"].'</td><td>'.$row["course"].'</td><td>'.$row["program"].'</td></tr>';
	}

	
				

?>
						     
						     
						    </tbody>
						  </table>

              <button type="button" class="btn btn-warning " style="float:left;" onclick="window.location='list.php'">Back
        </button>
               
                	</div>
            	</div>
          	</div>
        </div>
    </div>
    

</div>
  <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/in_body.js"></script>


</body>
</html>


