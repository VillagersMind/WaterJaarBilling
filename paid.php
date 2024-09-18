<?php
    include "join/dbconnect.php";
    include "join/core.php";
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
    $query ="SELECT * FROM customer_bill WHERE id = '$id'";
      if($query_run = mysqli_query($conn, $query)){
        while($query_row = mysqli_fetch_assoc($query_run)){
            $bill_id = $query_row['id'];
            $name_id = $query_row['customer_id'];
            $total = $query_row['total'];
            $pending =$query_row['pending_amount'];
              $query ="SELECT * FROM customer_info WHERE id = '$name_id'";
      if($query_run = mysqli_query($conn, $query)){
        while($query_row = mysqli_fetch_assoc($query_run)){
           
            $name1 = $query_row['name'];
            
         
        }
      }
            
         
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
                            <label>Customer Bill No</label>: <?php echo $bill_id;?><br>
                          
                            
                             <h4>  <?php echo $name1;?></h4><br>
                            <label>Total</label>:    <?php echo $total;?><br>
                            <label>Pending</label>:    <?php echo $pending;?>
                            
                            <br/>
                           
                        </div>
                    </div>

                    
                    
                </div>
                </form>
                <hr>
              
            </div> 
     </div>          
<?php
    include "join/footer.php";
    ?>
    
            </div>
        </div>
        
        <?php
    }
?>