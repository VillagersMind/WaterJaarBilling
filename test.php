<?php
    
    include "join/head.php";
    include "join/dbconnect.php";
   // include "join/core.php";
?> 
<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Admin Dashboard</h2>
                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <div class="row">
                    <div class="col-md-3 col-sm-3 col-xs-6">
                       
                        <div class="panel panel-primary text-center no-boder bg-color-blue">
                            <div class="panel-body">
                                <i class="fa fa-bar-chart-o fa-5x"></i>
                                <a href="customer_list.php" style="color:white;"><h3>Customer List </h3></a>
                            </div>
                            <div class="panel-footer back-footer-blue">
                               <a href="customer_list.php" style="color:white;"> Customer List</a>
                            
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-6">
                       
                        <div class="panel panel-primary text-center no-boder bg-color-blue">
                            <div class="panel-body">
                                <i class="fa fa-bar-chart-o fa-5x"></i>
                                <a href="report.php" style="color:white;"><h3>Report </h3></a>
                            </div>
                            <div class="panel-footer back-footer-blue">
                               <a href="report.php" style="color:white;">Report</a>
                            
                            </div>
                        </div>
                    </div>
                    

                </div>
                <!-- /. ROW  -->
                <hr />
               
                <hr />
                <div class="row">
                    <div class="col-md-6">
                        <h5>Table  Sample One</h5>
                        <label>Customer Name</label>
                            <input class="form-control" name="customer_name"  />
                            <br/>

                    </div>
                    <div class="col-md-6">
                        <h5>Table  Sample Two</h5>
                        <div class="table-responsive">
                            <label>Mobile No.</label>
                            <input class="form-control" name="mobile" required />
                            <br/>
                            
                        </div>
                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />


               
                <!-- /. ROW  -->

            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>

<?php
    include "join/footer.php";
    ?>