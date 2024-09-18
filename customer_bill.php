<?php
    
    include "join/head.php";
    include "join/dbconnect.php";
    //include "join/core.php";
    
        if (isset($_REQUEST['submit'])) {
            $id=$_REQUEST['id'];
        $name = $_REQUEST['customer_name'];
        $product = $_REQUEST['product'];
        $price = $_REQUEST['price'];
        $gst = $_REQUEST['gst'];
        $total =$_REQUEST['txtAddition'];
        $date = $_REQUEST['datee'];
        $hsn ="2202";
        $qty = $_REQUEST['qty'];
        $ratetotal = $price*$qty;
        $gsttotal = $ratetotal * $gst /100;
        $query ="INSERT INTO customer_bill(id,customer_id,hsn_number,product,rate,gst,total,dateb,quantity,rate_total,gst_total)values('','$id','$hsn','$product','$price','$gst','$total','$date','$qty','$ratetotal','$gsttotal')";
            if (mysqli_query($conn, $query)) {                                      
            $last_id = mysqli_insert_id($conn);

           // header('Location: paid.php?id='$id);
            echo "<script>alert('<a href='paid_nongst1.php?customer_id=".$id."'>Complete</a>');</script>";
            //echo "successfully added. Would you like to complete the job and view the bill? <a href='paid_nongst1.php?customer_id=".$customer_id."'>Complete</a>
        
       
     ?>    
   <?php       
}else{
  echo "error";
}

       
}
   



?>
	<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Customer Bill</h2>
                    </div>
                </div>
                 <hr />
                 <?php
                  if (isset($_REQUEST['id'])) {
   $id = $_REQUEST['id'];
    $query ="SELECT * FROM customer_info WHERE id = '$id'";
      if($query_run = mysqli_query($conn, $query)){
        while($query_row = mysqli_fetch_assoc($query_run)){
            $id = $query_row['id'];
           $name = $query_row['name'];
            $product =$query_row['product'];
            $rate = $query_row['rate'];
            $mobile = $query_row['mobile'];
            $gst = $query_row['gst'];
         
        }
      }
                 ?>
                <form action="customer_bill.php" method="POST" name="c1">
                     <?php   if(isset($_REQUEST['id'])){ ?>   
                       <input type="hidden" name="id" value="<?php echo  $id ;?>">
                      <?php }  ?>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Customer Name</label>
                            <input class="form-control" name="customer_name" value="<?php echo $name;?>" />
                            <br/>
                            <label>Price</label>
                            <input class="form-control" name="price" onchange= " Calculate();" value="<?php echo $rate;?>" />
                            <br>
                            <label>Quantity</label>
                            <input class="form-control" name="qty" onchange= " Calculate();" required/>
                            <br>
                            <label>Date</label>
                            <input type="date" class="form-control" name="datee" required />
                            <br>
                            <input type="submit" class="btn btn-info" name="submit" value="Save" />
                        </div>
                    </div>
                            <div class="col-md-4">
                            <div class="table-responsive">
                            <label>Product</label>
                            <input class="form-control" name="product" value="<?php echo $product;?>" />
                            <br>
                            
                             <label>Gst</label>
                            <input class="form-control" name="gst" onchange= " Calculate();" value="<?php echo $gst;?>" />
                            <br>
                            
                             <label>Total</label>
                             <input class="form-control" name="txtAddition" />
                           
                            <br>
                            
                           
                            
                    
                        </div>
                    </div>
''
                    
                    
                </div>
                </form>
                <script type="text/javascript">
                    function Calculate() {
                        // body...
                        var num1=parseInt(c1.price.value);
                        var num2=parseInt(c1.gst.value);
                        var num3=parseInt(c1.qty.value);
                        var total=num1*num3;
                        var tgst=total*18/100;
                        var tt=total+tgst;
                        var ttt=Math . round(tt);
                        c1.txtAddition.value=ttt;

                    }
            
        </script>
        <hr>
                <?php
        //$query3 = "SELECT * FROM customer_bill WHERE customer_id= $id order by id desc limit 1";
		$query3 = "SELECT * FROM customer_bill WHERE customer_id= $id order by customer_id";
        if($query_run1 = mysqli_query($conn, $query3)){
          ?>
                <table id="example" class="table table-striped table-sm" style="width:100%">
                    <thead>
                  <tr>
                    
                    <th>DATE</th>
                    <th>CUSTOMER NAME</th>                   
                    <th>Total</th>
                    <!--th>price</th-->
                    <th>Edit</th>
           
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                while($query_row = mysqli_fetch_assoc($query_run1)){
              
                $id = $query_row['id'];
                $dateb = $query_row['dateb'];
                $dateb =date('d-m-y');
                $id1 = $query_row['customer_id'];
                $total = $query_row['total'];
                $edit = 'PRINT';
                
                            echo"<tr>";
                           // echo "<td><a href='customer_bill.php?id=".$query_row['id']."'>".$id."</a></td>";
                            echo "<td>".$dateb."</td>";
                            echo "<td>".$id1."</td>";
                            echo "<td>".$total."</td>";
                            //echo "<td>".$grand_total."</td>";
                            //echo "<td><a href='edit_customer.php?id=".$query_row['id']."'target ='_blank'>".$edit."</a></td>";
                            echo "<td><a href='reciept2.php?id=".$query_row['id']."'target ='_blank'>".$edit."</a></td>";
                              
                               

                              echo "</tr>";
             
                
                  }
              }
              
          
        


        ?>
      <div class="example">
      </div>
        </tbody>
                </table>

            </div> 
     </div>          
<?php
    include "join/footer.php";
    ?>
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


<!--script src="js/front.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script-->
  
<script>
 
 $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
        {
          extend:'excel',
          title: 'Pending-list_<?php echo date('m-d-y');?>',
          exportOptions:{
            columns:[0,1,2,3]
          }
        },
        {
          extend:'pdf',
          title: 'Pending-list_<?php echo date('m-d-y');?>',
          exportOptions:{
          columns:[0,1,2,3]
          }
        }
       
        ]
    } );

</script>        
            </div>
        </div>
        
        <?php
    }
?>