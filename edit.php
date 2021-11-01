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
        if ($_GET['sub'] == 'trans_event') {
            $trans = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `transportation_events` WHERE `id` = $_GET[id]"));
            $all_event = mysqli_query($conn, "SELECT DISTINCT `type` FROM `transportation_events`");
        ?>
            <?php
            if (isset($_POST['edit'])) {
                $trans_id = $_POST['trans_id'];
                $trans_type = $_POST['trans_type'];
                $route = $_POST['route'];
                if (empty($trans_type)) {

                    $err_type_trans = 'Please Insert transportation Type name';
                } else {
                    $err_type_trans = true;
                }

                if (empty($route)) {
                    $err_route = 'Please Select a Route';
                } else {
                    $err_route = true;
                }
                if ($err_type_trans == 1 && $err_route == 1) {
                    $query = mysqli_query($conn, "UPDATE `transportation_events` SET `type`='$trans_type',`delivery_route`='$route' WHERE `id`=$trans_id");
                }
                if ($query) {
                    echo "<script>window.location.href='http://localhost/ShippingProject/?sub=trans&title=list';</script>";
                    session_start();
                    $_SESSION['success'] = "Transportation Event Updated successfully";

                }
            }

            ?>
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Transportation Event Data</h4>
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
                                        <input type="hidden" value="<?php echo $trans['id'] ?>" name="trans_id">
                                        <select class="form-select control" id="TransSelect" name="trans_type">
                                            <?php
                                            while ($one_event = mysqli_fetch_array($all_event)) {
                                            ?>
                                                <option value="<?php echo $one_event['type']; ?>" <?php if ($one_event['type'] == $trans['type']) { ?>selected="selected" <?php } ?>><?php echo $one_event['type'] ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>

                                    </div>
                                </div>
                            </div>


                            <div class="col-md-4">
                                <label>Route:</label>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="text" class="form-control" name="route" value="<?php echo $trans['delivery_route'] ?>">
                                        <p class="err_msg">
                                            <?php
                                            
                                            if ($err_route != 1) {
                                                echo $err_route;
                                            } ?>
                                        </p>
                                        <div class="form-control-icon">
                                            <i class="bi bi-person"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1" name="edit">Edit</button>

                            </div>
                    </div>
                    </form>
                </div>
            </div>
    </div>


<?php
        }
        if ($_GET['sub'] == 'retail') {
            $retail = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `retail_center` WHERE `id` = $_GET[id]"));
            $all_retail = mysqli_query($conn, "SELECT DISTINCT `type` FROM `retail_center`");
?>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Edit Retail Center Data</h4>
        </div>
        <div class="card-content">
            <div class="card-body">
                <form class="form form-horizontal" method="post" action="">
                    <input type="hidden" value="<?php echo $retail['id'] ?>" name="retail_id">
                    <div class="col-md-4">
                        <label> Retail Center Name</label>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group has-icon-left">
                            <div class="position-relative">
                                <input type="text" class="form-control" name="retail_name" value="<?php echo $retail['name']; ?>">
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
                                    <?php
                                    while ($one_retail = mysqli_fetch_array($all_retail)) {
                                    ?>
                                        <option value="<?php echo $one_retail['type']; ?>" <?php if ($one_retail['type'] == $retail['type']) { ?>selected="selected" <?php } ?>><?php echo $one_retail['type'] ?>
                                        </option>
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
                                <input type="text" class="form-control" name="address" value="<?php echo $retail['address'] ?>">
                                <div class="form-control-icon">
                                    <i class="bi bi-person"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary me-1 mb-1" name="edit">Edit</button>

                    </div>
            </div>
            </form>
        </div>
    </div>
    </div>
<?php
            if (isset($_POST['edit'])) {
                $retail_id = $_POST['retail_id'];
                $retail_name = $_POST['retail_name'];
                $retail_type = $_POST['retail_type'];
                $address = $_POST['address'];
                $query = mysqli_query($conn, "UPDATE `retail_center` SET `name`='$retail_name',`type`='$retail_type',`address`='$address' WHERE `id`=$retail_id");
                if ($query) {
                    echo "kkk";
                    echo "<script>window.location.href='http://localhost/ShippingProject/?sub=retails&title=list';</script>";
                    // echo "<script>alert('message send succesfully')</script>";
                    // header("location://javascript:history.go(-1)()");
                    // header("Location: {$_SERVER["HTTP_REFERER"]}");
                    // header("location:javascript://history.go(-1)");
                }
            }
        }
?>

<?php

if ($_GET['sub'] == 'item') {
    $item = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `shipped_items` WHERE `id` = $_GET[id]"));
    $all_retail = mysqli_query($conn, "SELECT * FROM `retail_center`");
    $retail = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `retail_center` WHERE `id`= $item[retail_center_id]"));
?>
    <?php
    if (isset($_POST['edit'])) {
        $item_id = $_POST['item_id'];
        $item_name = $_POST['item_name'];
        $retail_id = $_POST['retail_id'];
        $weight = $_POST['weight'];
        $dimension = $_POST['dimension'];
        $destination = $_POST['destination'];
        $delivered_at = $_POST['delivered_at'];
        $insurance_amount = $_POST['insurance_amount'];
        // echo $delivered_at ;

        if (empty($item_name)) {

            $err_name = 'Please Insert Shipping Item name';

            // echo '<alert>hhhh</alert>';
        } else {
            $err_name = true;
        }

        if (empty($retail_id)) {
            $err_retail = 'Please Select a Retail center';
        } else {
            $err_retail = true;
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
            $err_destination = true;
        }
        if (empty($delivered_at)) {
            $err_delivered = 'Please insert Delivery Date';
        } else {
            $err_delivered = true;
        }
        if (empty($insurance_amount)) {
            $err_amount = 'Please insert insurance amount';
        } else {
            $err_amount = true;
        }


        if ($err_name == 1 && $err_retail == 1 && $err_weight == 1 && $err_dimension == 1 && $err_destination == 1 && $err_delivered == 1 && $err_amount == 1) {

            $query = mysqli_query($conn, "UPDATE `shipped_items` SET 
                    `retail_center_id`=$retail_id,`name`='$item_name',`weight`=$weight,`dimension`='$dimension',`final_delivery_date`='$delivered_at',
                    `destination`='$destination',`insurance_amount`=$insurance_amount WHERE `id`=$item_id
                    ");
            // echo $query ;
        }
        if ($query) {
            echo "<script>window.location.href='http://localhost/ShippingProject/?sub=items&title=list';</script>";
            // header("location://javascript:history.go(-1)()");
            // header("Location: {$_SERVER["HTTP_REFERER"]}");
        }
    }

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
                                        <input type="hidden" name="item_id" value="<?php echo $item['id'] ?>">
                                        <input type="text" class="form-control" name="item_name" value="<?php echo $item['name']; ?>">
                                        <p class="err_msg">
                                            <?php
                                            // echo (!$err_name == 1);
                                            if ($err_name != 1) {
                                                echo $err_name;
                                            } ?>
                                        </p>
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
                                            <?php
                                            while ($one_retail = mysqli_fetch_array($all_retail)) {
                                            ?>
                                                <option value="<?php echo $one_retail['id']; ?>" <?php if ($one_retail['id'] == $retail['id']) { ?>selected="selected" <?php } ?>><?php echo $one_retail['name'] ?></option>
                                                < <?php
                                                }
                                                    ?> </select>
                                                    <?php
                                                    // echo (!$err_name == 1);
                                                    if ($err_retail != 1) {
                                                        echo $err_retail;
                                                    } ?>

                                    </div>
                                </div>
                            </div>


                            <div class="col-md-4">
                                <label>Weight:</label>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="text" class="form-control" name="weight" value="<?php echo $item['weight'] ?>">
                                        <?php
                                        // echo (!$err_name == 1);
                                        if ($err_weight != 1) {
                                            echo $err_weight;
                                        } ?>
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
                                        <input type="text" class="form-control" name="dimension" value="<?php echo $item['dimension'] ?>">
                                        <?php
                                        // echo (!$err_name == 1);
                                        if ($err_dimension != 1) {
                                            echo $err_dimension;
                                        } ?>
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
                                        <input type="text" class="form-control" name="destination" value="<?php echo $item['destination'] ?>">
                                        <?php
                                        // echo (!$err_name == 1);
                                        if ($err_destination != 1) {
                                            echo $err_destination;
                                        } ?>

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
                                        <input type="date" class="form-control" name="delivered_at" value="<?php echo $item['final_delivery_date'] ?>">
                                        <?php
                                        // echo (!$err_name == 1);
                                        if ($err_delivered != 1) {
                                            echo $err_delivered;
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
                                        <input type="text" class="form-control" name="insurance_amount" value="<?php echo $item['insurance_amount'] ?>">
                                        <?php
                                        // echo (!$err_name == 1);
                                        if ($err_amount != 1) {
                                            echo $err_amount;
                                        } ?>
                                        <div class="form-control-icon">
                                            <i class="bi bi-person"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1" name="edit">Edit</button>

                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>

<?php
}
if ($_GET['sub'] == 'track') {
    $order_sql = "SELECT * FROM `item_transportation`";
    $order_sql .= " WHERE `id` = $_GET[id]";
    $order_result = mysqli_query($conn, $order_sql);
    $order_fetch = mysqli_fetch_array($order_result);
    // echo $order_sql;
    // echo $order_result['transportation_id'];


    if (isset($_POST['add'])) {
        $item = $_POST['item'];
        $trans = $_POST['trans'];
        $id = $_POST['id'];

        if (empty($item)) {
            $err_name = 'Please Select Shipping Item';
        } else {
            $err_name = true;
        }

        if (empty($trans)) {
            $err_trans = 'Please Select Transportation Type';
        } else {
            $err_trans = true;
        }
        if ($err_name == 1 && $err_trans == 1) {


            header("location:index.php?title=list&sub=track");
            $sql = "UPDATE `item_transportation` ";
            $sql .= "SET `item_id`=$item,`transportation_id`=$trans ";
            $sql .= "WHERE `id` = $_GET[id]";
            // echo $sql;
            $result = mysqli_query($conn, $sql);
        }
    }

    $item_query = "SELECT * FROM  shipped_items";
    $item_result = mysqli_query($conn, $item_query);
    $trans_query = "SELECT  * FROM transportation_events";
    $trans_result = mysqli_query($conn, $trans_query);

?>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Edit Track order </h4>
        </div>
        <div class="card-content">
            <div class="card-body">
                <form class="form form-horizontal" method="post" action="">
                    <div class="col-md-4">
                        <label> Shipping Order Number</label>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group has-icon-left">
                            <div class="position-relative">
                                <input type="text" class="form-control" name="id" value="<?php echo $_GET['id'] ?>" readonly>
                            </div>
                        </div>
                    </div>


                    <div class='row' id="row">
                        <div class="col-md-6">
                            <label>Item</label>

                            <div class="form-group has-icon-left">
                                <div class="position-relative">
                                    <select class="form-select control" id="RetailSelect" name="item">
                                        <option value="" disabled selected>Choose One</option>
                                        <?php
                                        foreach ($item_result as $item) {
                                        ?>
                                            <option value="<?php echo $item['id']; ?>" <?php

                                                                                        if ($item['id'] == $order_fetch['item_id']) {
                                                                                        ?> selected="selected" <?php
                                                                                                            }
                                                                                                                ?>><?php echo $item['name'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <p class="err_msg">
                                        <?php
                                        // echo (!$err_name == 1);
                                        if ($err_name != 1) {
                                            echo $err_name;
                                        } ?>
                                    </p>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Transportaion / Route</label>

                            <div class="form-group has-icon-left">
                                <div class="position-relative">
                                    <select class="form-select control" id="RetailSelect" name="trans">
                                        <option value="" disabled selected>Choose One</option>
                                        <?php
                                        foreach ($trans_result as $trans) {
                                        ?>
                                            <option value="<?php echo $trans['id']; ?>" <?php

                                                                                        if ($trans['id'] == $order_fetch['transportation_id']) {
                                                                                        ?> selected="selected" <?php
                                                                                                            }
                                                                                                                ?>>
                                                <?php echo $trans['type'] . "/" . $trans['delivery_route'] ?></option>
                                        <?php

                                        }
                                        ?>
                                    </select>
                                    <p class="err_msg">
                                        <?php
                                        // echo (!$err_name == 1);
                                        if ($err_trans != 1) {
                                            echo $err_trans;
                                        } ?>
                                    </p>

                                </div>
                            </div>
                        </div>
                    </div>

            </div>
            <hr>
            <?php
            //  }
            ?>

            <div class="col-12 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary me-1 mb-1" name="add">Update Shipping</button>

            </div>
        </div>
        </form>
    </div>
    </div>
    </div>
<?php

}
?>









</div>