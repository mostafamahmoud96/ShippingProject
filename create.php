<?php
session_start();
?>
<!-- ___________________________________________________________________________________________________________________________ -->
<!-- Create New Shipped Item -->
<?php
if ($_GET['sub'] == 'item') {
?>

<?php
    // $error_name= '';
    if (isset($_POST['add'])) {
// echo "hhhhhhh";
        $item_name = $_POST['item_name'];
        $retail_id = $_POST['retail_id'];
        $weight = $_POST['weight'];
        $dimension = $_POST['dimension'];
        $destination = $_POST['destination'];
        $delivered_at = $_POST['delivered_at'];
        $insurance_amount = $_POST['insurance_amount'];
        // var_dump($item_name);
// echo empty($item_name);
        if (empty($item_name)) {
            
            $err_name = 'Please Insert Shipping Item name';
            
            // echo '<alert>hhhh</alert>';
        } else{
            $err_name= true;
        }

        if (empty($retail_id)) {
            $err_retail = 'Please Select a Retail center';
        } else {
            $err_retail =true;
        }
        if (empty($weight)) {
            $err_weight = 'Please insert shipping item weight';
        } else {
            $err_weight = true;
        }
        if (empty($dimension)) {
            $err_dimension = 'Please insert shipping item Dimensions';
        } else {
            $err_dimension  = true;
        }
        if (empty($destination)) {
            $err_destination = 'Please insert shipping item Destination';
        } else {
            $err_destination=true;
        }
        if (empty($delivered_at)) {
            $err_delivered = 'Please insert Delivery Date';
        } else {
            $delivered_at =true;
        }
        if (empty($insurance_amount)) {
            $err_amount = 'Please insert insurance amount';
        } else {
            $insurance_amount = true;
        }
        if ($err_name == 1 && $err_retail == 1 && $err_weight == 1 && $err_dimension == 1 && $err_destination == 1 && $err_delivered == 1 && $err_amount == 1) {
          
            echo "INSERT INTO `shipped_items` (`retail_center_id`, `name`, `weight`, `dimension`, `final_delivery_date`, `destination`, `insurance_amount`) 
            VALUES ( 
               $retail_id,'$item_name',$weight,'$dimension','$delivered_at',
                '$destination','$insurance_amount' 
               ) ";
    
    
            $query = mysqli_query($conn, "INSERT INTO `shipped_items` (`retail_center_id`, `name`, `weight`, `dimension`, `final_delivery_date`, `destination`, `insurance_amount`) 
                    VALUES ( 
                       $retail_id,'$item_name',$weight,'$dimension','$delivered_at',
                        '$destination','$insurance_amount' 
                       ) ");
        }
       


        if ($query) {

            echo "<script>alert('Added succesfully')</script>";
            // header("location://javascript:history.go(-1)()");
            // header("Location: {$_SERVER["HTTP_REFERER"]}");
            // header("location:javascript://history.go(-1)");
        }
    }?>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Add Shipped Item</h4>
        </div>
        <div class="card-content">
            <div class="card-body">
                <form method="post" id="form" action="<?php //echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-4">
                                <label> Item Name</label>
                            </div>
                            <!-- shipped item name -->
                            <div class="col-md-8">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="text" class="form-control" name="item_name" value="">
                                        <p class="err_msg">
                                                <?php 
                                                // echo (!$err_name == 1);
                                            if ($err_name != 1) {
                                                echo $err_name ;
                                            } ?>
                                        </p>
                                        <div class="form-control-icon">
                                            <i class="bi bi-person"></i>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- Select Retail Center -->
                            <div class="col-md-4">
                                <label>Retail Center</label>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <select class="form-select control" id="RetailSelect" name="retail_id">
                                            <option value="" selected disabled>Select One</option>
                                            <?php
                                            // get all retail centers in a dropdown
                                            $sql = "SELECT * FROM `retail_center` ";
                                            $query = mysqli_query($conn, $sql);
                                            while ($result = mysqli_fetch_array($query)) {
                                            ?>
                                                <option value="<?php echo $result['id']; ?>"><?php echo $result['name'] ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                        <?php 
                                                // echo (!$err_name == 1);
                                            if ($err_retail != 1) {
                                                echo $err_retail ;
                                            } ?>
                                    </div>
                                </div>
                            </div>
                            <!-- type address -->
                            <div class="col-md-4">
                                <label>Destination:</label>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="text" class="form-control" name="destination" value="">
                                        <?php 
                                                // echo (!$err_name == 1);
                                            if ($err_destination != 1) {
                                                echo $err_destination ;
                                            } ?>
                                        
                                        <div class="form-control-icon">
                                            <i class="bi bi-person"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- type weight -->
                            <div class="col-md-4">
                                <label>Weight:</label>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="text" class="form-control" name="weight" value="">
                                        <?php 
                                                // echo (!$err_name == 1);
                                            if ($err_weight != 1) {
                                                echo $err_weight ;
                                            } ?>
                                        <div class="form-control-icon">
                                            <i class="bi bi-person"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- type Dimensions -->
                            <div class="col-md-4">
                                <label>Dimension:</label>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative ">
                                        <input type="text" class="form-control d-inline" name="dimension" value="" placeholder="Width"> X

                                        <?php 
                                                // echo (!$err_name == 1);
                                            if ($err_dimension != 1) {
                                                echo $err_dimension ;
                                            } ?>
                                        <!-- <input type="text" class="form-control d-inline " style="width:5%" name="height" value="" placeholder="height"> X
                                        <input type="text" class="form-control d-inline " style="width:5%" name="depth" value="" placeholder="depth"> -->

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label>Delivered At:</label>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="date" class="form-control" name="delivered_at" value="">
                                        <?php 
                                                // echo (!$err_name == 1);
                                            if ($err_delivered != 1) {
                                                echo $err_delivered ;
                                            } ?>
                                        <div class="form-control-icon">
                                            <i class="bi bi-person"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label>Insurance Amount:</label>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="text" class="form-control" name="insurance_amount" value="">
                                        <?php 
                                                // echo (!$err_name == 1);
                                            if ($err_amount != 1) {
                                                echo $err_amount ;
                                            } ?>
                                        <div class="form-control-icon">
                                            <i class="bi bi-person"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1" name="add">Add</button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
    
<script>
// $("#form").submit(function(e) {
//     e.preventDefault();
// });
</script>
    <?php
}

// }
?>

<?php
if ($_GET['sub'] == 'createTrans') {
?>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Add Transportation Event</h4>
        </div>
        <div class="card-content">
            <div class="card-body">
                <form class="form form-horizontal" method="post" action="">

                    <div class="col-md-4">
                        <label>Type</label>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group has-icon-left">
                            <div class="position-relative">
                                <input type="text" class="form-control" name="trans_type" value="">


                            </div>
                        </div>
                    </div>


                    <div class="col-md-4">
                        <label>Route:</label>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group has-icon-left">
                            <div class="position-relative">
                                <input type="text" class="form-control" name="route" value="">
                                <div class="form-control-icon">
                                    <i class="bi bi-person"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary me-1 mb-1" name="add">Add</button>

                    </div>
            </div>
            </form>
        </div>
    </div>
    </div>
<?php
    if (isset($_POST['add'])) {

        $trans_type = $_POST['trans_type'];
        $route = $_POST['route'];

        $query = mysqli_query($conn, "INSERT INTO `transportation_events` (`type`,`delivery_route`) VALUES ('$trans_type','$route')");


        if ($query) {

            // echo "<script>alert('message send succesfully')</script>";
            // header("location://javascript:history.go(-1)()");
            // header("Location: {$_SERVER["HTTP_REFERER"]}");
            // header("location:javascript://history.go(-1)");
        }
    }
}
?>

<?php
if ($_GET['sub'] == 'createRetail') {
    $all_retail = mysqli_query($conn, "SELECT DISTINCT `type` FROM `retail_center`");
?>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Add Retail Center </h4>
        </div>
        <div class="card-content">
            <div class="card-body">
                <form class="form form-horizontal" method="post" action="">
                    <div class="col-md-4">
                        <label> Retail Center Name</label>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group has-icon-left">
                            <div class="position-relative">
                                <input type="text" class="form-control" name="retail_name" value="">
                                <div class="form-control-icon">

                                    <i class="bi bi-person"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label>Type</label>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group has-icon-left">
                            <div class="position-relative">
                                <select class="form-select control" id="RetailSelect" name="retail_type">
                                    <option value="" disabled selected>Choose One</option>
                                    <?php
                                    while ($one_retail = mysqli_fetch_array($all_retail)) {
                                    ?>
                                        <option value="<?php echo $one_retail['type']; ?>"><?php echo $one_retail['type'] ?></option>
                                        < <?php
                                        }
                                            ?> </select>

                            </div>
                        </div>
                    </div>


                    <div class="col-md-4">
                        <label>Address:</label>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group has-icon-left">
                            <div class="position-relative">
                                <input type="text" class="form-control" name="address" value="">
                                <div class="form-control-icon">
                                    <i class="bi bi-person"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary me-1 mb-1" name="add">Add</button>

                    </div>
            </div>
            </form>
        </div>
    </div>
    </div>
<?php
    if (isset($_POST['add'])) {
        $retail_name = $_POST['retail_name'];
        $retail_type = $_POST['retail_type'];
        $address = $_POST['address'];

        $query = mysqli_query($conn, "INSERT INTO `retail_center` (`name`,`type`,`address`) VALUES ('$retail_name','$retail_type','$address' )");


        if ($query) {

            // echo "<script>alert('message send succesfully')</script>";
            // header("location://javascript:history.go(-1)()");
            // header("Location: {$_SERVER["HTTP_REFERER"]}");
            // header("location:javascript://history.go(-1)");
        }
    }
}
?>
</div>