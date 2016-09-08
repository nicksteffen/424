<!DOCTYPE html>
<html>
	<head>
		<title>Lab #2 - Part #1</title>
		<style type="text/css">
			body {font-family:"Courier New";}
			table {border:2px solid black; border-collapse:collapse;}
			th, td {border:2px solid black;text-align:left; vertical-align:top;}
		</style>
	</head>
	<body>
		<h1> Lab #2 - Part #1 </h1>
		<p> Note:This labs assumes that the "company.sql" file has been properly imported into MySQL. </p>
		<hr />
		<h2> Section I </h2>
		<h3> Establish database connection and open "company" database. </h3>
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
			
		?>
		<hr />
		<h2> Section II </h2>
		<h3> Formulate basic query and display output in HTML tables. </h3>
		<h4> Query: List all of the projects for department number "6". <br />
			Output columns: Project Name, Project Number, Project Location. <br />
			Output display: Utilize a TABLE to display your output, similar to the following.
		</h4>
		<table border="1">
			<tr>
				<th>Project Name</th>
				<th>Project Number</th>
				<th>Project Location</th>
			</tr>
			<tr>
				<td>Example Project</td>
				<td>123</td>
				<td>Providence</td>
			</tr>
		</table>
		<?php
			//Step #1 - Formulate your query
			$query1 = "SELECT * FROM PROJECT WHERE Dnum=6";	
			//Step #2 - Run query and store result
			$result1 = mysql_query($query1, $handle);
			if ($result1 ==FALSE)
				echo"<p> Query error: " . mysql_error() . "</p>";
			
			//Step #3 - Working with the results
			echo "<table border=\"1\">
			<tr>
				<th>Project Name</th>
				<th>Project Number</th>
				<th>Project Location</th>
			</tr>";
			while ($row=mysql_fetch_assoc($result1)){
				echo "<tr>";
					echo "<td>" . $row['Pname'] . "</td>";
					echo "<td>" . $row['Pnumber'] . "</td>";
					echo "<td>" . $row['Plocation'] . "</td>";
				echo "</tr>";
			}
			echo "</table>";
			
			
		?>
		<hr />
		
		   
		<h2> Section III </h2>
		<h3> Formulate sub-query that runs for each result row and add output to the HTML table. </h3>
		<h4> Query: List all of the projects for department number "6" and the employees associated to the project. <br />
			Output columns: Project Name, Project Number, Project Location, Employees(SSN). <br />
			Output display: Utilize a TABLE to display your output, similar to the following.
		</h4>
		<table border="1">
			<tr>
				<th>Project Name</th>
				<th>Project Number</th>
				<th>Project Location</th>
				<th>Employees (SSN)</th>
			</tr>
			<tr>
				<td>Example Project</td>
				<td>123</td>
				<td>Providence</td>
				<td>
					123456789 <br />
					234567890 <br />
				</td>
			</tr>
		</table>
		<?php
			//Step #1 - Formulate your query  (Same as Section II)
			if(!$_POST)
				die("No data");
			$deptno = $_POST['deptnum'];
			$query2 = "SELECT * FROM PROJECT WHERE Dnum=$deptno";
						
			//Step #2 - Run query and store result  (Same as Section II)
			$result2 = mysql_query($query2, $handle);
			if ($result2 ==FALSE)
				echo"<p> Query error: " . mysql_error() . "</p>";
			
			//Step #3 - Working with the results  (Some will be the same as Section II)
			echo "<table border=\"1\">
			<tr>
				<th>Project Name</th>
				<th>Project Number</th>
				<th>Project Location</th>
				<th> Employees (Ssn) </th>
			</tr>";
			while ($row=mysql_fetch_assoc($result2)){
				echo "<tr>";
					echo "<td>" . $row['Pname'] . "</td>";
					echo "<td>" . $row['Pnumber'] . "</td>";
					echo "<td>" . $row['Plocation'] . "</td>";
					$subquery = "SELECT Essn FROM WORKS_ON WHERE Pno=" . $row['Pnumber'];
					//echo "<p> $subquery </p>";
					$subresult = mysql_query($subquery, $handle);
					echo "<td>" ;
					while($subrow=mysql_fetch_assoc($subresult)){
						echo $subrow['Essn'] ."<br />";
					}
					echo "</td>";
				echo "</tr>";
			}
			echo "</table>";
			// When you get to the last column of a row, run a new subquery.
			// Remember to use different names for your subquery and its result
			// Try using the prefix "sub" for the variables: $subquery, $subresult, $subrow
			
			
		?>
		<hr />
		
		<h2> End </h2>
		<h3> Close connection to database. </h3>
		<?php
			mysql_close($handle);
		?>
		
	</body>
</html>