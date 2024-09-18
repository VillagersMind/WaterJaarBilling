<?php
include "join/dbconnect.php";
  $id = $_GET['id'];
  function AmountInWords(float $amount)
{
   $amount_after_decimal = round($amount - ($num = floor($amount)), 2) * 100;
   // Check if there is any number after decimal
   $amt_hundred = null;
   $count_length = strlen($num);
   $x = 0;
   $string = array();
   $change_words = array(0 => '', 1 => 'One', 2 => 'Two',
     3 => 'Three', 4 => 'Four', 5 => 'Five', 6 => 'Six',
     7 => 'Seven', 8 => 'Eight', 9 => 'Nine',
     10 => 'Ten', 11 => 'Eleven', 12 => 'Twelve',
     13 => 'Thirteen', 14 => 'Fourteen', 15 => 'Fifteen',
     16 => 'Sixteen', 17 => 'Seventeen', 18 => 'Eighteen',
     19 => 'Nineteen', 20 => 'Twenty', 30 => 'Thirty',
     40 => 'Forty', 50 => 'Fifty', 60 => 'Sixty',
     70 => 'Seventy', 80 => 'Eighty', 90 => 'Ninety');
    $here_digits = array('', 'Hundred','Thousand','Lakh', 'Crore');
    while( $x < $count_length ) {
      $get_divider = ($x == 2) ? 10 : 100;
      $amount = floor($num % $get_divider);
      $num = floor($num / $get_divider);
      $x += $get_divider == 10 ? 1 : 2;
      if ($amount) {
       $add_plural = (($counter = count($string)) && $amount > 9) ? 's' : null;
       $amt_hundred = ($counter == 1 && $string[0]) ? ' and ' : null;
       $string [] = ($amount < 21) ? $change_words[$amount].' '. $here_digits[$counter]. $add_plural.' 
       '.$amt_hundred:$change_words[floor($amount / 10) * 10].' '.$change_words[$amount % 10]. ' 
       '.$here_digits[$counter].$add_plural.' '.$amt_hundred;
        }
   else $string[] = null;
   }
   $implode_to_Rupees = implode('', array_reverse($string));
   $get_paise = ($amount_after_decimal > 0) ? "And " . ($change_words[$amount_after_decimal / 10] . " 
   " . $change_words[$amount_after_decimal % 10]) . ' Paise' : '';
   return ($implode_to_Rupees ? $implode_to_Rupees . 'Rupees ' : '') . $get_paise;
}
  $query = "SELECT customer_bill.id,customer_info.name,customer_info.address,customer_bill.dateb,customer_bill.product,customer_bill.hsn_number,customer_bill.rate,customer_bill.quantity,customer_info.gstno,customer_bill.rate_total,customer_bill.gst,customer_bill.gst_total,customer_bill.total from customer_bill INNER JOIN customer_info ON customer_bill.customer_id=customer_info.id WHERE customer_bill.id=  '$id'";
  if($query_run = mysqli_query($conn, $query)){
                     while ($query_row = mysqli_fetch_assoc($query_run)){
                                $dateb = $query_row['dateb'];
                                $dateb =date('d-m-y');
                             $invoice_no = $query_row['id']; 
                              //$customer_id = $query_row['customer_id'];
                               $name = $query_row['name'];
                               $address = $query_row['address'];
                                $gstno = $query_row['gstno'];
                               $product = $query_row['product'];
                                $hsn = $query_row['hsn_number'];
                                 $rate = $query_row['rate']; 
                                 $qty = $query_row['quantity'];
                                 $rate_t = $query_row['rate_total'];
                                 $gst = $query_row['gst'];
                                 $gst_total = $query_row['gst_total']; 
                                 $total = $query_row['total'];
                                 $gst_div=$gst_total/2;
                                 $amt_words=$total;
  // nummeric value in variable
 
 $get_amount= AmountInWords($amt_words);
                               }
                             }

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
</head>
<body>
  <table border="2" cellspacing="0">
    <tr>
      <td rowspan="4" style="border: none;"><img src="assets/img/logo.jpg" class="img-responsive" /></td>
      <td colspan="100" style="color: red; border: none;"><center><u>Tax Invoice</u></center></td>
      <td rowspan="2" align="right" style="color: red; border: none;">Mob: 8446565417<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;9225788003<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;7719858003</td>
    </tr>
    <tr>
      <td colspan="100" valig="top" style="color: red; font-size: 20px; border: none;"><center><h2>SUJIT ENTERPRISES</h2></center></td>
      
      
    </tr>
    <tr>
      <td colspan="100" valig="top" style="border: none;">At.pundhe, post. Atgaon, tal. Shahapur Dist. Thane 421601</td>  
    </tr>
    <tr>
      <td colspan="100"style="border: none;"><center><b>GSTIN NO.: 27ACCPE8786G1ZB</center></td>  
    </tr>
    <tr>
      <td colspan="100">Invoice No.:<?php echo $id;?></td>
      <td colspan="100">Invoice Date:  <?php echo $dateb;?></td>
    </tr>
    <tr>
      <td colspan="100">Customer Name:<b> <?php echo $name;?></td>
      <td colspan="50"></td>
    </tr>
    <tr>
      <td colspan="100">Address:<?php echo $address;?></td>
      <td colspan="50">Bank Details:-</td>
    </tr>
    <tr>
      <td colspan="100"></td>
      <td colspan="50">Bank Name: Bank of Baroda</td>
    </tr><tr>
      <td colspan="100">GSTIN No.:<?php echo $gstno;?></td>
      <td colspan="50">A/C No.: 36880200000462</td>
    </tr>
    <tr>
      <td colspan="100">State: Maharashtra</td>
      <td colspan="50">IFSC Code: BARB0VASHIND</td>
    </tr>
    <tr>
      <td colspan="100">State Code: 27</td>
      <td colspan="50"></td>
    </tr>
    <tr>
      <th colspan="10"><center>Sr.No.</center></th>
      <th colspan="20"><center>Product</center></th>
      <th colspan="20"><center>HSN/SAC Code</center></th>
      <th colspan="20"><center>Qty.</center></th>
      <th colspan="20"><center>Rate</center></th>
      
      <th colspan="20"><center>Total</center></th>
    </tr>
    <tr>
      <td colspan="10"><center>1</center></td>
      <td colspan="20"><center><?php echo $product;?></center></td>
      <td colspan="20"><center><?php echo $hsn;?></center></td>
      <td colspan="20"><center><?php echo $qty;?></center></td>
      <td colspan="20"><center><?php echo $rate;?></center></td>
      
      <td colspan="20"><center><?php echo $rate_t;?></center></td>
    </tr>
    <tr>
      <td colspan="10" style="border: none;"><center>  </center></td>
      <td colspan="20" style="border: none;"><center>  </center></td>
      <td colspan="20" style="border: none;"><center>  </center></td>
      <td colspan="20" style="border: none;"><center>  </center></td>
      <td colspan="20" style="border: none;"><center>  </center></td> 
      <td colspan="20" style="border: none;"><center>  </center></td>
    </tr>
    <tr>
      <td colspan="10" style="border: none;"><center>  </center></td>
      <td colspan="20" style="border: none;"><center>  </center></td>
      <td colspan="20" style="border: none;"><center>  </center></td>
      <td colspan="20" style="border: none;"><center>  </center></td>
      <td colspan="20" ><center>Gross Value</center></td> 
      <td colspan="20"><center></center></td>
    </tr>
    <tr>
      <td colspan="10" style="border: none;"><center>  </center></td>
      <td colspan="20" style="border: none;"><center>  </center></td>
      <td colspan="20" style="border: none;"><center>  </center></td>
      <td colspan="20" style="border: none;"><center>  </center></td>
      <td colspan="20"><center>CGST  9 %</center></td>  
      <td colspan="20"><center><?php echo $gst_div;?></center></td>
    </tr>
    <tr>
      <td colspan="10" style="border: none;"><center>  </center></td>
      <td colspan="20" style="border: none;"><center>  </center></td>
      <td colspan="20" style="border: none;"><center>  </center></td>
      <td colspan="20" style="border: none;"><center>  </center></td>
      <td colspan="20"><center>SGST  9 %</center></td>  
      <td colspan="20"><center><?php echo $gst_div;?></center></td>
    </tr>
    
    <tr>
      <td colspan="10" style="border: none;"><center>Rupees in words:&nbsp;&nbsp;&nbsp;<?php echo $get_amount;?>Only</center></td>
      <td colspan="20" style="border: none;"><center>  </center></td>
      <td colspan="20" style="border: none;"><center>  </center></td>
      <td colspan="20" style="border: none;"><center>  </center></td>
      <td colspan="20"><center>Invoice Value</center></td>  
      <td colspan="20"><center></center></td>
    </tr>
    <tr>
      <td colspan="10" style="border: none;"><center>  </center></td>
      <td colspan="20" style="border: none;"><center>  </center></td>
      <td colspan="20" style="border: none;"><center>  </center></td>
      <td colspan="20" style="border: none;"><center>  </center></td>
      <td colspan="20"><center>Total</center></td>  
      <td colspan="20"><center><?php echo $total;?></center></td>
    </tr>
    <tr>
      <td colspan="100">Term and Codition:-<br><h6>1)Certified that the particulars given above are true and corret<br>2)Subject to Shahapur Jurisdiction<br>"
"I/We hereby certify that my/our registration certificate under the<br>
Maharashtra Value Added Tax Act, 2002 is in force on the date on which<br>
the sales of goods specified in this tax invoice is made by me/us and that<br>
specified in this tax invoice is made by me/us and that the transaction of sale<br>
covered by this tax invoice has been effected by me/us and it shall be<br>
accounted for in the turnover of sales while filling of return and the due tax, if<br>
any, payable on the sale has been paid or shall be paid”</h6></td>
      <td colspan="100"><center>SUJIT ENTERPRISES</center>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br><center>Authorised Signatory</center></td>
    </tr>

    

    
    
  </table>
  <?php

  ?> 

</body>
</html>