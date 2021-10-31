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
        if ($_GET['sub'] == 'item') {
            $item = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `shipped_items` WHERE `id` = $_GET[id]"));
            $all_retail = mysqli_query($conn, "SELECT * FROM `retail_center`");
            $retail = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `retail_center` WHERE `id`= $item[retail_center_id]"));
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
                                                <input type="text" class="form-control" name="delivered_at" value="<?php echo $item['final_delivery_date'] ?>">
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
                $item_id = $_POST['item_id'];
                $item_name = $_POST['item_name'];
                $retail_id = $_POST['retail_id'];
                $weight = $_POST['weight'];
                $dimension = $_POST['dimension'];
                $destination = $_POST['destination'];
                $delivered_at = $_POST['delivered_at'];
                $insurance_amount = $_POST['insurance_amount'];

                $query = mysqli_query($conn, "UPDATE `shipped_items` SET 
                    `retail_center_id`=$retail_id,`name`='$item_name',`weight`=$weight,`dimension`='$dimension',`final_delivery_date`='$delivered_at',
                    `destination`='$destination',`insurance_amount`=$insurance_amount WHERE `id`=$item_id
                    ");
                if ($query) {

                    echo "<script>alert('message send succesfully')</script>";
                    // header("location://javascript:history.go(-1)()");
                    // header("Location: {$_SERVER["HTTP_REFERER"]}");
                    // header("location:javascript://history.go(-1)");
                }
            }
        }
        ?>
        <?php
        if ($_GET['sub'] == 'trans') {
            $trans = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `transportation_events` WHERE `id` = $_GET[id]"));
            $all_event = mysqli_query($conn, "SELECT DISTINCT `type` FROM `transportation_events`");
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
                                                < <?php
                                                }
                                                    ?> </select>

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
                $trans_id = $_POST['trans_id'];
                $trans_type = $_POST['trans_type'];
                $route = $_POST['route'];

                $query = mysqli_query($conn, "UPDATE `transportation_events` SET `type`='$trans_type',`delivery_route`='$route' WHERE `id`=$trans_id");


                if ($query) {

                    echo "<script>alert('message send succesfully')</script>";
                    // header("location://javascript:history.go(-1)()");
                    // header("Location: {$_SERVER["HTTP_REFERER"]}");
                    // header("location:javascript://history.go(-1)");
                }
            }
        }
?>

<?php
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
                                        <option value="<?php echo $one_retail['type']; ?>" <?php if ($one_retail['type'] == $retail['type']) { ?>selected="selected" <?php } ?>><?php echo $one_retail['type'] ?></option>
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

            echo "<script>alert('message send succesfully')</script>";
            // header("location://javascript:history.go(-1)()");
            // header("Location: {$_SERVER["HTTP_REFERER"]}");
            // header("location:javascript://history.go(-1)");
        }
    }
}
?>

<?php
if ($_GET['sub'] == 'track') {
    $shipped_item = mysqli_query($conn, "SELECT * FROM  shipped_items");
    // $shipped = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM  shipped_items"));

    $event = mysqli_query($conn, "SELECT  * FROM transportation_events ");
    $pivot = mysqli_query($conn, "SELECT  * FROM item_transportations where id=$_GET[id]");
    // echo  "SELECT  * FROM item_transportations where  item_id=$_GET[id]"
    // echo (mysqli_num_rows($pivot));
?>



    <div class="card">
        <div class="card-header">
            Track Shipping number <?php echo $_GET['id'] ?>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>Item Name</th>
                        <th>Type</th>
                    </tr>
                </thead>
                <tbody>
                    <form class="form form-horizontal" method="post" action="">
                        <?php

                        while ($track = mysqli_fetch_array($pivot)) {
                        ?>
                            <tr>
                                <td>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <!-- <input type="text" class="text" value="<?php echo $track['id'] ?>"> -->
                                                <select class="form-select control" id="item" name="item">
                                                    <?php
                                                    while ($item = mysqli_fetch_array($shipped_item)) {
                                                    ?>
                                                        <option value="<?php echo $item['id']; ?>" <?php if ($item['id'] == $track['item_id']) {
                                                                                                    ?>selected="selected" <?php }
                                                                                                                            ?>><?php echo $item['name'] ?></option>
                                                        < <?php
                                                        }
                                                            ?> </select>

                                            </div>
                                        </div>
                                    </div>

                                </td>


                                <td>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <!-- <input type="text" class="text" value="<?php echo $track['id'] ?>"> -->
                                                <select class="form-select control" id="RetailSelect" name="trans">
                                                    <?php
                                                    while ($trans_event = mysqli_fetch_array($event)) {
                                                    ?>
                                                        <option value="<?php echo $trans_event['id']; ?>" <?php if($item['id'] == $shipped_['id']) { 
                                                                                                            ?>selected="selected" <?php } 
                                                                                                                                    ?>><?php echo $trans_event['type'] ?></option>
                                                        < <?php
                                                        }
                                                            ?> </select>

                                            </div>
                                        </div>
                                    </div>

                                </td>

                            </tr>
                        <?php
                        }
                        ?>
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-1 mb-1" name="edit">Edit</button>

                        </div>
                    </form>
                </tbody>
            </table>
        </div>
    </div>
    <!-- **************************************************************** -->








<?php
    if (isset($_POST['edit'])) {
        $id = $_GET['id'];
        $item = $_POST['item'];
        $trans = $_POST['trans'];
        

        $query = mysqli_query($conn, "UPDATE `item_transportations` SET `item_id`=$item,`transportation_id`=$trans WHERE `id`= $id");

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