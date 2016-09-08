<!DOCTYPE html>
<html>
	<head>
		<title>Blank</title>
		<style type="text/css">
			h1 {text-align:center;}
		</style>
	</head>
	<body>
    <?php
       $valid = FALSE;
		   if($_POST){
		    $valid = TRUE;
       }
			 else
			 die("<p> No form data.  So, I'm done. </p>");
       $handle=mysql_connect('localhost','root');
       if($handle==FALSE)
		     die("No database connection available: ".mysql_error());
		   $db=mysql_select_db('store');
		   if($db == FALSE)
		   die("Unable to select database: ".mysql_error());
       $fname = $_POST['fname'];
       $lname = $_POST['lname'];
       $zip = $_POST['zip'];
       $custquery = "SELECT cfname, clname, czip FROM customers
                     WHERE cfname = $fname AND clname = $lname AND czip = $zip;";
       $custresut = mysql_query($custquery, $handle);
       if ($custresult && mysql_num_rows($custresult) > 0){
           echo 'Exists';
        }
    else{
    echo 'Not exists';




  ?>
	</body>
</html>
