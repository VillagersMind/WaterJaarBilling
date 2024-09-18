<?php
    include "join/dbconnect.php";
    include "join/head.php";
    include "join/functions.php";
   

?>
<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>GST Report</h2>
                    </div>
                </div>
                 <hr />
<form>
    Start Date:
    <input type="date" name="s_date"><br /><br />
    End Date:
    <input type="date" name="edate"><br /><br />
    <input type="submit" name="submit" class="btn btn-primary addbotton">  <br><br>



<?php
if(isset($_GET['submit'])){
        $s_date = $_GET['s_date'];
        if(!isset($_GET['edate'])||empty($_GET['edate'])){
            // $query = "SELECT * FROM selling_product WHERE added_date = '$sdate'";
              $query = "SELECT * FROM customer_bill WHERE dateb = '$s_date'";
              //$query1 = "SELECT selling_product.*, custoinfo.grand_total FROM selling_product left join custoinfo on selling_product.customer_id = custoinfo.id";
            // $link = "excel-datewise-purchase.php?sdate=".$sdate."&submit=yes";
             $count1 = $count++; 
        
        }else{
            $edate = $_GET['edate'];
         //$query = "SELECT * FROM customer_bill WHERE dateb  BETWEEN '$s_date' AND '$edate'";
          $query = "SELECT customer_bill.id,customer_info.name,customer_bill.dateb,customer_bill.product,customer_bill.hsn_number,customer_bill.rate,customer_bill.quantity,customer_info.gstno,customer_bill.rate_total,customer_bill.gst,customer_bill.gst_total,customer_bill.total from customer_bill INNER JOIN customer_info ON customer_bill.customer_id=customer_info.id WHERE customer_bill.dateb BETWEEN '$s_date' AND '$edate'";
            // $link = "excel-datewise-purchase.php?edate=".$edate."&sdate=".$sdate."&submit=yes"; 
            // $count1 = $count++; 
        
        }
        ?>

       <table id="example" class="table table-striped table-sm" style="width:100%">
        
        <thead>
                        <tr>
                              <th>Date</th>
                        <th>Invoice No</th>
                        <th>Party Name</th>
                        <th>Party Gst No</th>
                        <th>Product Name</th>
                        <th>HSN No</th>
                        <th>Rate</th>
                        <th>Quantity</th>
                        <th>Cost</th>
                        <th>Gst</th>
                        <th>Gst Total</th>
                        <th>GrandTotal</th>

                        </tr>
                    </thead>
                    <tbody>
            <?php
                     if($query_run = mysqli_query($conn, $query)){
                     while ($query_row = mysqli_fetch_assoc($query_run)){
                                $dateb = $query_row['dateb'];
                             $invoice_no = $query_row['id']; 
                              //$customer_id = $query_row['customer_id'];
                               $name = $query_row['name'];
                                $gstno = $query_row['gstno'];
                               $product = $query_row['product'];
                                $hsn = $query_row['hsn_number'];
                                 $rate = $query_row['rate']; 
                                 $qty = $query_row['quantity'];
                                 $rate_t = $query_row['rate_total'];
                                 $gst = $query_row['gst'];
                                 $gst_total = $query_row['gst_total']; 
                                 $total = $query_row['total'];
                                
          
                    echo "<tr>";
                               
                              echo "<td>".$dateb."</td>";
                                
                                  echo "<td>".$invoice_no."</td>";
                                  echo "<td>".$name."</td>";
                                  echo "<td>".$gstno."</td>";
                                  echo "<td>".$product."</td>";
                                  echo "<td>".$hsn."</td>";
                                  echo "<td>".$rate."</td>";
                                  echo "<td>".$qty."</td>";
                                  echo "<td>".$rate_t."</td>";
                                  echo "<td>".$gst."</td>";
                                  echo "<td>".$gst_total."</td>";
                                  echo "<td>".$total."</td>";
                                 
                                  echo "</tr>";     
                
        }
    }
    }
    ?>

       </tbody>

     
       <div class="example">
                </div> 
                 
                
                </table>
                </form>

</div>
</div>


      <?php
 
include "join/footer.php";
?> 
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
 <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js "></script>
  <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>



  <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css " rel="stylesheet">
 <link href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css " rel="stylesheet">

  

 <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
 <script>
 
  $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
        {
          extend:'excel',
          title: 'Gst-Report-list_<?php echo date('m-d-y');?>',
          exportOptions:{
            columns:[0,1,2,3,4,5,6,7,8,9,10]
          }
        },
        {
          extend:'pdf',
          title: 'Gst-Report-list_<?php echo date('m-d-y');?>',
          exportOptions:{
            columns:[0,1,2,3,4,5,6,7,8,9,10]
          }
        }
       
        ]
    } );

</script>

 