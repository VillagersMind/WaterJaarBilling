<?php
    include "join/dbconnect.php";
    //include "join/core.php";
    include "join/head.php";
    if (isset($_REQUEST['submit'])) {
        $id = $_REQUEST['id'];
    	$name = $_REQUEST['customer_name'];
    	$address = $_REQUEST['address'];
    	$gstno = $_REQUEST['gstno'];
    	$product = $_REQUEST['product'];
    	$price = $_REQUEST['price'];
        $gst = $_REQUEST['gst'];
    	$date = date('d-m-y');
    	$query = "UPDATE customer_info SET name = '$name',product = '$product',rate = '$price',gstno = '$gstno' WHERE id = '$id'";
    if(mysqli_query($conn, $query)) {    

header("Location: customer_list.php");
exit();
    
        ?>  
        
   <?php     


      } else{
  echo "error";
}

}



?>
	<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2> Edit And Update Customer Info</h2>
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
                            <label>Customer Name</label>
                            <input class="form-control" name="customer_name" value="<?php echo $name;?>" />
                            <br/>
                            <label>Mobile No.</label>
                            <input class="form-control" name="mobile" value="<?php echo $mobile;?>"/>
                            <br/>
                             <label>Address</label>
                            <textarea class="form-control" name="address" value=""><?php echo $address;?></textarea>
                            <br/>
                             <label>GSTIN No.</label>
                            <input class="form-control" name="gstno" value="<?php echo $gstno;?>" />
                            <br>
                            <label>Product</label>
                            <input class="form-control" name="product" value="<?php echo $product;?>" />
                            <br>
                            <label>Price</label>
                            <input class="form-control" name="price" value="<?php echo $rate;?>" />
                            <br>
                             <label>Gst</label>
                            <input class="form-control" name="gst" value="<?php echo $gst;?>" />
                            <br>
                            <input type="submit" class="btn btn-info" name="submit" value="Update" />
                        </div>
                    </div>

                    
                    
                </div>
                </form>
            </div>
        </div>
        <?php
    }
?>