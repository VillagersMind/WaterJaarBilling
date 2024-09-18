<?php
    include "join/head.php";
    include "join/dbconnect.php";
    //include "join/core.php";
   


?>
	<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Customer List</h2>
                    </div>
                </div>
                
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
                    <th>MobileNo.</th>
                    <th>Address</th>
                    <th>GstNo</th>
                    <th>Edit</th>
           
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                while($query_row = mysqli_fetch_assoc($query_run1)){
              
                $id = $query_row['id'];
                $id1 = $query_row['name'];
                $mobile = $query_row['mobile'];
                $address = $query_row['address'];
                $gstno = $query_row['gstno'];
                $grand_total = $query_row['rate'];
                $edit = 'edit';
                
                            echo"<tr>";
                            echo "<td><a href='customer_bill.php?id=".$query_row['id']."'>".$id."</a></td>";
                            echo "<td><a href='customer_detail.php?id=".$query_row['id']."'>".$id1."</a></td>";
                            //echo "<td>".$id1."</td>";
                            echo "<td>".$mobile."</td>";
                            echo "<td>".$address."</td>";
                            echo "<td>".$gstno."</td>";
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