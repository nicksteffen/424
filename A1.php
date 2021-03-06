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
		<form method="post" action="processform.php">
			<p>
        <table border="0">
          <tr>
            <td> Customer Type: </td>
            <td>
				      <input type="radio" name="customertype"
                     value="premier" />  Premier
				      <input type="radio" name="customertype" value="elite"
                     checked="checked"/>  Elite
            </td>
          </tr>
          <tr>
            <td> Customer First Name:  </td>
            <td>
              <input type="text" name="fname:" size="20" maxlength="20" />
            </td>
          </tr>
          <tr>
            <td> Customer Last Name:  </td>
            <td>
              <input type="text" name="lname:" size="20" maxlength="20" />
            </td>
          </tr>
          <tr>
            <td> Street: </td>
            <td>
              <input type="text" name="stret" size="20" maxlength="20" />
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
          <td> $5.71 </td>
        </tr>
        <tr>
          <td>
            <input type="text" name="qty2" value="0" size="3" maxlength="10" />
          </td>
          <td> Widget #3422 - Super Slipery </td>
          <td> $4.21 </td>
        </tr>
        <tr>
          <td>
            <input type="text" name="qty3" value="0" size="3" maxlength="10" />
          </td>
          <td> Widget #2382 - Very Wobbly </td>
          <td> $2.51 </td>
        </tr>
        <tr>
          <td>
            <input type="text" name="qty4" value="0" size="3" maxlength="10" />
          </td>
          <td> Widget #4523 - Extremely Sticky </td>
          <td> $1.21 </td>
        </tr>
        <tr>
          <td>
            <input type="text" name="qty5" value="0" size="3" maxlength="10" />
          </td>
          <td> Widget #6851 - Wonderfully Wacky </td>
          <td> $8.51 </td>
        </tr>
      </table>
      <input type="submit" name="submit" />
			<input type="reset" name="reset" />

		</form>
		<hr />
		<h2>Order Summary </h2>
		<?php
			if($_POST) {
				echo "<p> Dear $_POST['customername'],<br />
              <br />
              Thank you for placing an order. You can expect your widgets in
              $_POST['city'] by the end of the week.<br /><p>";
       }
       else {
				      die("<p> No form data.  So, I'm done. </p>");
       }
			$input = $_POST['inputvalue'];
			 echo "<p>Order Statement</p>";
       echo "<table border="1">
        <tr>
          <th> QTY </th>
          <th> Item </th>
          <th> Item Price </th>
        </tr>
        <tr>
          <td>
            $_POST['qty1']
          </td>
          <td> Widget #8493 -  Extra Crunchy </td>
          <td> -- </td>
        </tr>
        <tr>
          <td>
            $_POST['qty2']
          </td>
          <td> Widget #3422 - Super Slipery </td>
          <td> $4.21 </td>
        </tr>
        <tr>
          <td>
            $_POST['qty3']
          </td>
          <td> Widget #2382 - Very Wobbly </td>
          <td> $2.51 </td>
        </tr>
        <tr>
          <td>
            $_POST['qty4']
          </td>
          <td> Widget #4523 - Extremely Sticky </td>
          <td> $1.21 </td>
        </tr>
        <tr>
          <td>
            $_POST['qty5']
          </td>
          <td> Widget #6851 - Wonderfully Wacky </td>
          <td> $8.51 </td>
        </tr>
        <tr>
          <td colspan="2" style="text-align:right"> Product Total </td>
          <td> $63.55 </td>
        </tr>
        <tr>
          <td colspan="2" style="text-align:right"> Final Cost</td>
          <td> $50.65" </td>
        </tr>
    </table>";
		?>
	</body>
</html>
