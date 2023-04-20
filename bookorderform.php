<!DOCTYPE html>
<html>
  <head>
  
<!-- 1. Add your Name below -->
    <title>Order Form by Amos Johnson</title>

    <style type="text/css">
        table thead, tfoot{
            font-weight: bold;
            background-color: #eee;
        }
        table {
            border-collapse: collapse;            
        }
        table td, th {
            text-align: left;
            border: 1px solid #ddd;
            padding: 15px;
        }
        td:empty {
            border: 0;
            background-color: white;
        }
        
    </style>
  </head>
  <body>
  
<!-- 1b. Add your name below -->
    <h1>Order Form - by Amos Johnson</h1>
    
    <?php
    
/////////////////////////////////////////////////////////////////////////
//   2. Create a condition to test if the submit button has been clicked 
///////////////////////////////////////////////////////////////////////// 
//if (isset($_POST['submit'])) {

    ?>
    
<!-- 3. Set the appropriate method and action 
        HINT: EITHER OF THE TWO METHODS CAN BE USED 
        HINT: USE THE SELF REFERENCING SUPER GLOBAL FOR THE ACTION 
-->
    <form method="POST" action="bookorderform.php">
    
     <table> 1
       <thead>
           <tr>
    		 <td>Book</td>
    		 <td>Quantity</td>
    	   </tr>
       </thead>
       <tbody>
    	   <tr>
    		 <td>Head First PHP & MySQL</td>
    		 <td><input type="number" name="phpqty" value="0" min="0" max="99" /></td>
    	   </tr>
    	   <tr>
    		 <td>A Practical Guide to Fedora and Red Hat Enterprise Linux</td>
    		 <td><input type="number" name="linuxqty" value="0" min="0" max="99" /></td>
    	   </tr>
    	   <tr>
    		 <td>Intro to Java Programming, Comprehensive Version</td>
    		 <td><input type="number" name="javaqty" value="0" min="0" max="99"/></td>
    	   </tr>
    	   <tr>
                <td>
                <input type="submit" value="Submit Order" name="submit" />
                </td>
    	   </tr>
       </tbody>
	 </table>
    </form>
    
    <?php

if (isset($_POST['submit'])) {
        //} else {
/////////////////////////////////////////////////////////////////////////
//   4. Retrieve and store data from FORM submission 
/////////////////////////////////////////////////////////////////////////
$phpAmount = $_POST['phpqty'];
$linuxAmount = $_POST['linuxqty'];
$javaAmount = $_POST['javaqty'];
/////////////////////////////////////////////////////////////////////////
//   5. Define Constants (Tax, price for each book)
/////////////////////////////////////////////////////////////////////////
define("TAX",0.13);
define("phpPrice",30.99);
define("linuxPrice",50.99);
define("javaPrice",109.99);
/////////////////////////////////////////////////////////////////////////
//   6. Calculate and store quantity multiplied by price for each book 
/////////////////////////////////////////////////////////////////////////
$phpPrice = 30.99;
$linuxPrice = 50.99;
$javaPrice = 109.99;
//if (!empty($phpAmount)) {
	$qtyPricePHP = $phpAmount * $phpPrice;
//} elseif (!empty($linuxAmount)) {
	$qtyPriceLINUX = $linuxAmount * $linuxPrice;
//} elseif (!empty($javaAmount)) {
	$qtyPriceJAVA = $javaAmount * $javaPrice;
//} else {
	//echo "Buy something next time!";
//}

                
/////////////////////////////////////////////////////////////////////////
//   7. Calculate and store both the Subtotal as well as Tax
/////////////////////////////////////////////////////////////////////////
$subTotal = ($qtyPricePHP + $qtyPriceLINUX + $qtyPriceJAVA);
$TAX = $subTotal * 0.13;

/////////////////////////////////////////////////////////////////////////
//   8. Calculate and store Grand Total
/////////////////////////////////////////////////////////////////////////
$grandTotal = $subTotal + $TAX;
        
   ?>
    <h2>Invoice</h2>
    <hr/>
     <table> 
       <thead>
           <tr>
    		 <td>Book</td>
    		 <td>Quantity</td>
             <td>Total</td>
    	   </tr>
       </thead>
       <tbody>
    	   <tr>
    		 <td>Head First PHP & MySQL</td>

<!-- 9a. Output the Qty and Cost for Book 1 -->
    		 <td><?php echo $phpAmount; ?></td>
             <td>$<?php echo sprintf("%0.2f", $qtyPricePHP); ?></td>

    	   </tr>
    	   <tr>
    		 <td>A Practical Guide to Fedora and Red Hat Enterprise Linux</td>

<!-- 9b. Output the Qty and Cost for Book 2 -->    		 
             <td><?php echo $linuxAmount; ?></td>
             <td>$<?php echo sprintf("%0.2f", $qtyPriceLINUX); ?></td>

    	   </tr>
    	   <tr>
    		 <td>Intro to Java Programming, Comprehensive Version</td>

<!-- 9c. Output the Qty and Cost for Book 3 -->
    		 <td><?php echo $javaAmount; ?></td>
             <td>$<?php echo sprintf("%0.2f", $qtyPriceJAVA); ?></td>

    	   </tr>
       </tbody>
       <tfoot>
            <tr>
              <td></td> 
              <td>Subtotal:</td>

<!-- 9d. Output the Subtotal -->
              <td>$<?php echo sprintf("%0.2f", $subTotal); ?></td>

            </tr>
            <tr>
              <td></td>
              <td>Tax:</td>

<!-- 9e. Output the Tax -->
              <td>$<?php echo sprintf("%0.2f", $TAX); ?></td>

            </tr>
            <tr>
              <td></td>
              <td>Grand Total:</td>

<!-- 9f. Output the Grand Total -->
              <td>$<?php echo sprintf("%0.2f", $grandTotal); ?></td>

            </tr>
       </tfoot>
	 </table>
     
     <hr />
     
<!-- 10. Insert BOTH correct date functions below -->
	<?php
		$currentdate = date("<b>l F j, Y</b>");
		$expectdate = date("<b>l F j, Y</b>", strtotime('+5 day'));
	?>
    <p>Today is <?php echo $currentdate; ?>. Your expected delivery date is: <?php echo $expectdate; ?></p>


    <?php
	
        } else {
		}
    ?>
  </body>
</html>
