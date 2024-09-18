<?php
    include "join/dbconnect.php";
    //include "join/core.php";
    include "join/head.php";
    if (isset($_REQUEST['submit'])) {
    	$name = $_REQUEST['customer_name'];
    	$address = $_REQUEST['address'];
    	$gstno = $_REQUEST['gstno'];
    	$product = 'Water';
    	$price = $_REQUEST['price'];
        $gst = '18';
        $mobile = $_REQUEST['mobile'];
    	$date = date('d-m-y');
    	$query ="INSERT INTO customer_info(id,name,address,gstno,product,rate,mobile,gst )values('','$name','$address','$gstno','$product','$price','$mobile','$gst')";
			if (mysqli_query($conn, $query)) {                                      
    		$last_id = mysqli_insert_id($conn);
            echo "<script>alert('Customer Successfully Added')</script>";
           // header('Location: index.php');
        ?>
        <br/>
        <br/> 
         
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
                        <h2>Customer Info</h2>
                    </div>
                </div>
                 <hr />
                <form action="customer_info.php" method="POST">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Customer Name</label>
                            <input class="form-control" name="customer_name" required />
                            <br/>
                            <label>Address</label>
                            <textarea class="form-control" name="address"></textarea>
                            <br/>
                            <label>Price</label>
                            <input class="form-control" name="price" required/>
                            <br/>
                            <input type="submit" class="btn btn-info" name="submit" value="Submit" />
                        </div>
                    </div>
                            <div class="col-md-4">
                            <div class="table-responsive">
                            <label>Mobile No.</label>
                            <input class="form-control" name="mobile" required />
                            <br/>
                            <label>GSTIN No.</label>
                            <input class="form-control" name="gstno" required/>
                            <br/>
                        </div>
                    </div>
                             
                             
                             <!--label>Product</label-->               <!--?php echo 'Water' ?-->
                            <!--input class="form-control" name="product" /-->
                            
                             
                            <!--label>GST</label-->               <!--?php echo '18%' ?-->
                            <!--input class="form-control" name="gst" /-->
                            <br/><br/>
                            
                        </div>
                   

                    
                    
          
                </form>
                <hr>
                <?php
        $query3 = "SELECT * FROM customer_info";
        if($query_run1 = mysqli_query($conn, $query3)){
          ?>
                <table id="example" class="table table-striped table-sm" style="width:100%">
                	<thead>
                  <tr>
                    <th>ID</th>
                    <th>CUSTOMER NAME</th>                   
                    <th>MOBILE NO.</th>
                    <!--th>price</th-->
                    <th>Edit</th>
           
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                while($query_row = mysqli_fetch_assoc($query_run1)){
              
                $id = $query_row['id'];
                $id1 = $query_row['name'];
                $mobile = $query_row['mobile'];
                $grand_total = $query_row['rate'];
                $edit = 'edit';
                
                            echo"<tr>";
                            echo "<td><a href='customer_bill.php?id=".$query_row['id']."'>".$id."</a></td>";
                            echo "<td>".$id1."</td>";
                            echo "<td>".$mobile."</td>";
                            //echo "<td>".$grand_total."</td>";
                            //echo "<td><a href='edit_customer.php?id=".$query_row['id']."'target ='_blank'>".$edit."</a></td>";
                            echo "<td><a href='edit_customer.php?id=".$query_row['id']."'>".$edit."</a></td>";
                              
                               

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