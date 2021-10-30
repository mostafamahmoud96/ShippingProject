<!DOCTYPE html>
<html lang="en">

<head>

    <?php
    session_start();


    ?>
</head>

<body>
    <div id="app">
        <?php
        if ($_GET['sub'] == 'createItem') {
            $retail = mysqli_query($conn, "SELECT * FROM `retail_center`");
        ?>
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Item Data</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form form-horizontal" method="post" action="<?php //header("Location: index.php?title=list&sub=items"); 
                                                                                    ?>">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label> Item Name</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="text" class="form-control" name="item_name" value="">
                                                <div class="form-control-icon">

                                                    <i class="bi bi-person"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="col-md-4"> -->


                                    <div class="col-md-4">
                                        <label>Retail Center</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <select class="form-select control" id="RetailSelect" name="retail_id">
                                                <option value="" selected disabled>Select One</option>

                                                    <?php
                                                    while ($one_retail = mysqli_fetch_array($retail)) {
                                                    ?>
                                                        <option value="<?php echo $one_retail['id']; ?>" ><?php echo $one_retail['name'] ?></option>
                                                        < <?php
                                                        }
                                                            ?> </select>

                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <label>Weight:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="text" class="form-control" name="weight" value="">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-person"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label>Dimension:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="text" class="form-control" name="dimension" value="">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-person"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Destination:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="text" class="form-control" name="destination" value="">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-person"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Delivered At:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="text" class="form-control" name="delivered_at" value="">
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
                $item_name = $_POST['item_name'];
                $retail_id = $_POST['retail_id'];
                $weight = $_POST['weight'];
                $dimension = $_POST['dimension'];
                $destination = $_POST['destination'];
                $delivered_at = $_POST['delivered_at'];
                $insurance_amount = $_POST['insurance_amount'];

                $query = mysqli_query($conn, "INSERT INTO `shipped_items` (`retail_center_id`, `name`, `weight`, `dimension`, `final_delivery_date`, `destination`, `insurance_amount`) 
                VALUES ( 
                   $retail_id,'$item_name',$weight,'$dimension','$delivered_at',
                    '$destination',$insurance_amount 
                   ) ");
                   echo "INSERT INTO `shipped_items` VALUES ( 
                    '',$retail_id,'$item_name',$weight,'$dimension','$delivered_at',
                    '$destination',$insurance_amount 
                   ) ";
                if ($query) {

                    echo "<script>alert('Added succesfully')</script>";
                    // header("location://javascript:history.go(-1)()");
                    // header("Location: {$_SERVER["HTTP_REFERER"]}");
                    // header("location:javascript://history.go(-1)");
                }
            }
        }
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

                                                <!-- <select class="form-select control" id="TransSelect" name="trans_type">
                                                    <?php
                                                   // while ($one_event = mysqli_fetch_array($all_event)) {
                                                    ?>
                                                        <option value="<?php //echo $one_event['type']; ?>" <?php //if ($one_event['type'] == $trans['type']) { ?>selected="selected" <?php } ?>><?php //echo $one_event['type'] ?></option>
                                                        < <?php
                                                        // }
                                                            ?> </select> -->

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

                    echo "<script>alert('message send succesfully')</script>";
                    // header("location://javascript:history.go(-1)()");
                    // header("Location: {$_SERVER["HTTP_REFERER"]}");
                    // header("location:javascript://history.go(-1)");
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
                                                <option value="" disabled selected >Choose One</option>
                                                    <?php
                                                    while ($one_retail = mysqli_fetch_array($all_retail)) {
                                                    ?>
                                                        <option value="<?php echo $one_retail['type']; ?>" ><?php echo $one_retail['type'] ?></option>
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

                    echo "<script>alert('message send succesfully')</script>";
                    // header("location://javascript:history.go(-1)()");
                    // header("Location: {$_SERVER["HTTP_REFERER"]}");
                    // header("location:javascript://history.go(-1)");
                }
            }
        }
        ?>
    </div>