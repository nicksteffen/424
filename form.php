<!DOCTYPE html>
<html>
	<head>
		<title>Lab #2 - Part #2</title>
		<style type="text/css">
			body {font-family:"Courier New";}
			table {border:2px solid black; border-collapse:collapse;}
			th, td {border:2px solid black;text-align:left; vertical-align:top;}
		</style>
	</head>
	<body>
		<h1> Lab #2 - Part #2:  form.php </h1>
		<p> Note:This labs assumes that the "company.sql" file has been properly imported into MySQL. </p>
		<hr />
		<h2> Section I </h2>
		<h3> Create an HTML Form that submits data to the "process.php" script, which is your repurposed code from Part I of the lab. </h3>
		<h4> The form should contain a single text box that allows the user to supply a department number that is used in your query.</h4>
		<form method="post" action="process.php">
			<p> Enter a department number: 

			<input type="text" name="deptnum" value="6" />
            <input type="submit" name="submit" />
			<input type="reset" name="reset" />
			
			</p>
		</form>
		<hr />
		<h2> Section II </h2>
		<h3> Create an HTML Form that submits data to the "process.php" script, which is your repurposed code from Part I of the lab. </h3>
		<h3> This form will dynamically create a pull-down menu (select list) that contains a list of all departments in the database. </h3>
		<form method="post" action="process.php">
			<p> Select a department: 
				<select name="deptnum">
					<?php
						//Create a connection to the MySQL server and store DB resource handle
						$handle=mysql_connect('localhost','root');
			
						//Check to see if connection established and exit on error
						if($handle==FALSE)
						die("No database connection available: ".mysql_error());
						
						//Select the database that you want to use
						$db=mysql_select_db('company');
						if($db == FALSE)
							die("Unable to select database: ".mysql_error());
									
						//Step #1 - Formulate your query
						$deptquery = "SELECT * FROM DEPARTMENT";	
						//Step #2 - Run query and store result
						$deptresult = mysql_query($deptquery, $handle);
						if ($deptresult ==FALSE)
						echo"<p> Query error: " . mysql_error() . "</p>";
			
						//Step #3 - Use results to create dynamic select menu
						while ($row=mysql_fetch_assoc($deptresult)){
							echo "<option value=\"". $row['Dnumber'] . "\">". $row['Dname'] ."</option>";
						}
							
						//Close DB Connection
						mysql_close($handle);
					
					?>
				</select>
				<input type="submit" name="submit" />
				<input type="reset" name="reset" />
			</p>
		</form>
	</body>
</html>