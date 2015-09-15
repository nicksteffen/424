<!DOCTYPE html>
<html>
	<head>
		<title>WebWidget</title>
		<style type="text/css">
			h1 {text-align:center;}
      body {font-family:"Verdana";}
      td, th {padding:5px;}
		</style>
	</head>
	<body>
		<h1>Widget Ordering System </h1>
		<h2>Customer Information</h2>
		<form method="post" action="A1.php">
			<p>
        <table border="0">
          <tr>
            <td> Customer Type: </td>
            <td>
				<input type="radio" name="customertype" value="premier" />  Premier
				 <input type="radio" name="customertype" value="elite" checked="checked"/>  Elite
            </td>
          </tr>
          <tr>
            <td> Customer First Name:  </td>
            <td>
              <input type="text" name="fname" size="20" maxlength="20" />
            </td>
          </tr>
          <tr>
            <td> Customer Last Name:  </td>
            <td>
              <input type="text" name="lname" size="20" maxlength="20" />
            </td>
          </tr>
          <tr>
            <td> Street: </td>
            <td>
              <input type="text" name="street" size="20" maxlength="20" />
            </td>
          </tr>
          <tr>
            <td> City: </td>
            <td>
              <input type="text" name="city" size="20" maxlength="20" />
            </td>
          </tr>
          <tr>
            <td> State: </td>
            <td>
              <select name="selectmenu" >
                <option value="MA"> MA </option>
                <option value="ME"> ME </option>
                <option value="NH"> NH </option>
                <option selected="selected" value="RI"> RI </option>
                <option value="VT"> VT </option>
              </select>
            </td>
          </tr>
          <tr>
            <td> Zip: </td>
            <td>
              <input type="text" name="zip" size="5" maxlength="5" />
            </td>
          </tr>
          </table>
      <p>Order Information: </p>
      <table border="1">
        <tr>
          <th> QTY </th>
          <th> Item </th>
          <th> Item Price </th>
        </tr>
        <tr>
          <td>
            <input type="text" name="qty1" value="0" size="3" maxlength="10" />
          </td>
          <td> Widget #8493 -  Extra Crunchy </td>
          <td> $5.71 <input type="hidden" name="price1" value="5.71" /> </td>
        </tr>
        <tr>
          <td>
            <input type="text" name="qty2" value="0" size="3" maxlength="10" />
          </td>
          <td> Widget #3422 - Super Slipery </td>
          <td> $4.21 <input type="hidden" name="price2" value="4.21" /></td>
        </tr>
        <tr>
          <td>
            <input type="text" name="qty3" value="0" size="3" maxlength="10" />
          </td>
          <td> Widget #2382 - Very Wobbly </td>
          <td> $2.51 <input type="hidden" name="price3" value="2.51" /></td>
        </tr>
        <tr>
          <td>
            <input type="text" name="qty4" value="0" size="3" maxlength="10" />
          </td>
          <td> Widget #4523 - Extremely Sticky </td>
          <td> $1.21 <input type="hidden" name="price4" value="1.21" /> </td>
        </tr>
        <tr>
          <td>
            <input type="text" name="qty5" value="0" size="3" maxlength="10" />
          </td>
          <td> Widget #6851 - Wonderfully Wacky </td>
          <td> $8.51 <input type="hidden" name="price5" value="8.51" /></td>
        </tr>
      </table>
      <input type="submit" name="submit" />
			<input type="reset" name="reset" />

		</form>
		<hr />
		<h2>Order Summary </h2>
		<?php ;
			if($_POST) {
				$name = $_POST['fname'];
				$city = $_POST['city'];
				
				echo "<p> Dear $name,<br />
				<br />
				Thank you for placing an order. You can expect to receive your widgets in $city by the end of the week.<br /><p>";
       }
       else {
				      die("<p> No form data.  So, I'm done. </p>");
       }
			 echo "<p>Order Statement</p>";
			 $sum = 0;
			 $qty1 = floatval($_POST['qty1']);
			 $tot1 = $qty1 * $_POST['price1'];
			 $sum += $tot1;
			 $qty2 = floatval($_POST['qty2']);
			 $tot2 = $qty2 * $_POST['price2'];
			 $sum += $tot2;
			 $qty3 = floatval($_POST['qty3']);
			 $tot3 = $qty3 * $_POST['price3'];
             $sum += $tot3;
			 $qty4 = floatval($_POST['qty4']);
			 $tot4 = $qty4 * $_POST['price4'];
			 $sum += $tot4;
			 $qty5 = floatval($_POST['qty5']);
			 $tot5 = $qty5 * $_POST['price5'];
			 $sum += $tot5;			 
			 $final_sum = 0.0;
			 if ($_POST['customertype'] == 'elite'){
				 $final_sum = number_format($sum - (.2 * $sum), 2); //only need to format this variable because multiplying by a decimal
			 }
			 else {
				 $final_sum = $sum;
			 }
			 	 		 
       echo "<table border=\"2\">
        <tr>
          <th> QTY </th>
          <th> Item </th>
          <th> Item Price </th>
        </tr>
        <tr>
          <td>
            $qty1
          </td>
          <td> Widget #8493 -  Extra Crunchy </td>
          <td> $tot1  </td>
        </tr>
        <tr>
          <td>
            $qty2
          </td>
          <td> Widget #3422 - Super Slipery </td>
          <td> $tot2 </td>
        </tr>
        <tr>
          <td>
            $qty3
          </td>
          <td> Widget #2382 - Very Wobbly </td>
          <td> $tot3 </td>
        </tr>
        <tr>
          <td>
            $qty4
          </td>
          <td> Widget #4523 - Extremely Sticky </td>
          <td> $tot4 </td>
        </tr>
        <tr>
          <td>
            $qty5
          </td>
          <td> Widget #6851 - Wonderfully Wacky </td>
          <td> $tot5 </td>
        </tr>
        <tr>
          <td colspan=\"2\" style=\"text-align:right\"> Product Total </td>
          <td> $sum </td>
        </tr>
        <tr>
          <td colspan=\"2\" style=\"text-align:right\"> Final Cost</td>
          <td> $final_sum </td>
        </tr>
    </table>";
		?>
	</body>
</html>
