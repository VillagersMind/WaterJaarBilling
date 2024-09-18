<?php
    include "join/dbconnect.php";
    //include "join/core.php";
    include "join/head.php";
   
?>
	<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Customer Information</h2>
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
            $address = $query_row['address'];
            $product =$query_row['product'];
            $rate = $query_row['rate'];
            $gstno = $query_row['gstno'];
            $mobile = $query_row['mobile'];
            $gst = $query_row['gst'];
         
        }
      }
                 ?>
                <form action="edit_customer.php" method="POST">
                     <?php   if(isset($_REQUEST['id'])){ ?>   
                       <input type="hidden" name="id" value="<?php echo  $id ;?>">
                      <?php }  ?>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Customer Name</label>:<h2>  <?php echo $name;?></h2><br>
                            <label>Mobile Number</label>:  <h4>  <?php echo $mobile;?></h4><br>
                            <label>GstNo</label>:    <?php echo $gstno;?><br>
                            <label>Address</label>:    <?php echo $address;?>
                            
                            <br/>
                           
                        </div>
                    </div>

                    
                    
                </div>
                </form>
                <hr>
               <?php
        $query3 = "SELECT * FROM customer_bill WHERE customer_id= $id";
        if($query_run1 = mysqli_query($conn, $query3)){
          ?>
                <table id="example" class="table table-striped table-sm" style="width:100%">
                    <thead>
                  <tr>
                    
                    <th>DATE</th>
                    <th>CUSTOMER NAME</th>                   
                    <th>Total</th>
                    <th>Pending</th>
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
                $pending = $query_row['pending_amount'];
                $edit = 'PRINT';
                
                            echo"<tr>";
                           // echo "<td><a href='customer_bill.php?id=".$query_row['id']."'>".$id."</a></td>";
                            echo "<td>".$dateb."</td>";
                            echo "<td>".$id1."</td>";
                            echo "<td>".$total."</td>";
                            echo "<td><a href='paid.php?id=".$query_row['id']."'>".$pending."</a></td>";
                            //echo "<td><a href='edit_customer.php?id=".$query_row['id']."'target ='_blank'>".$edit."</a></td>";
                            echo "<td><a href='reciept2php?id=".$query_row['id']."'>".$edit."</a></td>";
                              
                               

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