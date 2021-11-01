<?php
session_start();
?>
<!-- ___________________________________________________________________________________________________________________________ -->
<!-- Create New Shipped Item -->
<?php

if ($_GET['sub'] == 'item') {
    $retail_sql = "SELECT * FROM `retail_center`";
    $retail_result = mysqli_query($conn, $retail_sql);
?>
<?php
    if (isset($_POST['add'])) {
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
            $sql = "INSERT INTO `shipped_items`";
            $sql .= "(`retail_center_id`, `name`, `weight`, `dimension`, `final_delivery_date`, `destination`, `insurance_amount`) VALUES";
            $sql .=  "('$retail_id','$item_name','$weight','$dimension','$delivered_at','$destination','$insurance_amount')";
            $result = mysqli_query($conn, $sql);
            // echo $sql ;
        }
        if ($result) {
            
            header("Location:index.php?sub=items&title=list");
        }
    }

    ?>
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Add Shipped Item</h4>
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

                                    <input type="text" class="form-control" name="item_name"
                                        value="<?php echo $item['name']; ?>">
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
                        <!-- <div class="col-md-4"> -->


                        <div class="col-md-4">
                            <label>Retail Center</label>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group has-icon-left">
                                <div class="position-relative">
                                    <select class="form-select control" id="RetailSelect" name="retail_id">
                                        <?php
                                            while ($one_retail = mysqli_fetch_array($retail_result)) {
                                            ?>
                                        <option value="<?php echo $one_retail['id']; ?>"
                                            <?php if ($one_retail['id'] == $retail['id']) { ?>selected="selected"
                                            <?php } ?>><?php echo $one_retail['name'] ?></option>
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
                                    <input type="text" class="form-control" name="weight"
                                        value="<?php echo $item['weight'] ?>">
                                    <?php
                                        // echo (!$err_name == 1);
                                        if ($err_weight != 1) {
                                            echo $err_weight;
                                        } ?>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label>Dimension:</label>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group has-icon-left">
                                <div class="position-relative">
                                    <input type="text" class="form-control" name="dimension"
                                        value="<?php echo $item['dimension'] ?>">
                                    <?php
                                        // echo (!$err_name == 1);
                                        if ($err_dimension != 1) {
                                            echo $err_dimension;
                                        } ?>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label>Destination:</label>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group has-icon-left">
                                <div class="position-relative">
                                    <input type="text" class="form-control" name="destination"
                                        value="<?php echo $item['destination'] ?>">
                                    <?php
                                        // echo (!$err_name == 1);
                                        if ($err_destination != 1) {
                                            echo $err_destination;
                                        } ?>


                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label>Delivered At:</label>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group has-icon-left">
                                <div class="position-relative">
                                    <input type="date" class="form-control" name="delivered_at"
                                        value="<?php echo $item['final_delivery_date'] ?>">
                                    <?php
                                        // echo (!$err_name == 1);
                                        if ($err_delivered != 1) {
                                            echo $err_delivered;
                                        } ?>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label>Insurance Amount:</label>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group has-icon-left">
                                <div class="position-relative">
                                    <input type="text" class="form-control" name="insurance_amount"
                                        value="<?php echo $item['insurance_amount'] ?>">
                                    <?php
                                        // echo (!$err_name == 1);
                                        if ($err_amount != 1) {
                                            echo $err_amount;
                                        } ?>

                                </div>
                            </div>
                        </div>

                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-1 mb-1" name="add">Add Item</button>

                        </div>
                    </div>
            </form>
        </div>
    </div>
</div>

<?php
}
?>

<!-- ___________________________________________________________________________________________________________________________ -->
<!-- Create New Transportation Event -->
<?php
if ($_GET['sub'] == 'trans_event') {
    if (isset($_POST['add'])) {
        $trans_type = $_POST['trans_type'];
        $route = $_POST['route'];

        if (empty($trans_type)) {
            $err_type = 'Please Select Transportation Type';
        } else {
            $err_type = true;
        }

        if (empty($route)) {
            $err_route = 'Please Insert a Route';
        } else {
            $err_route = true;
        }


        if ($err_type == 1 && $err_route == 1) {
            $sql = "INSERT INTO `transportation_events`";
            $sql .= "(`type`,`delivery_route`) VALUES ";
            $sql .=  "('$trans_type','$route')";
            $result = mysqli_query($conn, $sql);
            // echo $sql ;
        }
        if ($result) {

            header("location:index.php?sub=items&title=list");
        }
    }

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
                            <p class="err_msg">
                                <?php
                                    // echo (!$err_name == 1);
                                    if ($err_type != 1) {
                                        echo $err_type;
                                    } ?>
                            </p>
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
                            <p class="err_msg">
                                <?php
                                    if ($err_route != 1) {
                                        echo $err_route;
                                    } ?>
                            </p>
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
}
?>
<!-- ___________________________________________________________________________________________________________________________ -->
<!-- Create New Retail Center -->
<?php
if ($_GET['sub'] == 'retail') {
    $retail_sql = "SELECT * FROM `retail_center`";
    $retail_result = mysqli_query($conn, $retail_sql);
    if (isset($_POST['add'])) {
        $retail_name = $_POST['retail_name'];
        $retail_type = $_POST['retail_type'];
        $retail_address = $_POST['retail_address'];

        if (empty($retail_name)) {
            $err_name = 'Please Insert Retail Center Name';
        } else {
            $err_name = true;
        }

        if (empty($retail_type)) {
            $err_type = 'Please Select Retail Center Type';
        } else {
            $err_type = true;
        }

        if (empty($retail_address)) {
            $err_address = 'Please Insert Retail Center Address';
        } else {
            $err_address = true;
        }


        if ($err_name == 1 && $err_type == 1 && $err_address == 1) {
            $sql = "INSERT INTO `retail_center`";
            $sql .= "(`name`,`type`,`address`) VALUES ";
            $sql .=  "('$retail_name','$retail_type','$address' )";
            $result = mysqli_query($conn, $sql);
            // echo $sql ;
        }
        if ($result) {

            header("location:index.php?sub=items&title=list");
          
        }
    }
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
                            <p class="err_msg">
                                <?php
                                    // echo (!$err_name == 1);
                                    if ($retail_name != 1) {
                                        echo $retail_name;
                                    } ?>
                            </p>
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
                                    while ($one_retail = mysqli_fetch_array($retail_result)) {
                                    ?>
                                <option value="<?php echo $one_retail['type']; ?>"><?php echo $one_retail['type'] ?>
                                </option>
                                < <?php
                                        }
                                            ?> </select>
                                    <p class="err_msg">
                                        <?php
                                                // echo (!$err_name == 1);
                                                if ($err_type != 1) {
                                                    echo $err_type;
                                                } ?>
                                    </p>
                        </div>
                    </div>
                </div>


                <div class="col-md-4">
                    <label>Address:</label>
                </div>
                <div class="col-md-8">
                    <div class="form-group has-icon-left">
                        <div class="position-relative">
                            <input type="text" class="form-control" name="retail_address" value="">
                            <p class="err_msg">
                                <?php
                                    // echo (!$err_name == 1);
                                    if ($err_address != 1) {
                                        echo $err_address;
                                    } ?>
                            </p>
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

}
?>
<!-- ___________________________________________________________________________________________________________________________ -->
<!-- Create New track shipping order Item -->
<?php
if ($_GET['sub'] == 'track') {
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

            $count = count($item);
            for ($i = 0; $i < $count; $i++) {
                $sql = "INSERT INTO `item_transportation`(`id`,`item_id`, `transportation_id`) VALUES ";
                $sql .= "($id,$item[$i],$trans[$i])";
                $result = mysqli_query($conn, $sql);
                // header("location:index.php?title=list&sub=track");   
            }
        }
    }

    $item_query = "SELECT * FROM  shipped_items";
    $item_result = mysqli_query($conn, $item_query);
    $trans_query = "SELECT  * FROM transportation_events";
    $trans_result = mysqli_query($conn, $trans_query);
    $order_id_query = "SELECT id FROM item_transportation";
    $order_id_query .= " ORDER BY id DESC LIMIT 1";
    $get_id = mysqli_query($conn, $order_id_query);
    if (mysqli_num_rows($get_id) < 1) {
        $id = 0;
    } else {
        $id_generate = mysqli_fetch_array($get_id);
        $id = $id_generate['id'] + 1;
    }
?>
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Add Track order </h4>
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
                            <input type="text" class="form-control" name="id" value="<?php echo $id ?>" readonly>
                        </div>
                    </div>
                </div>
                <div class="col-12 d-flex justify-content-end">
                    <button type="button" class="btn btn-success me-1 mb-1" id="addBtn" name="add">Add Shipping
                        Item</button>

                </div>

                <div class='row' id="row">
                    <div class="col-md-6">
                        <label>Item</label>

                        <div class="form-group has-icon-left">
                            <div class="position-relative">
                                <select class="form-select control" id="RetailSelect" name="item[0]">
                                    <option value="" disabled selected>Choose One</option>
                                    <?php
                                        foreach ($item_result as $item) {
                                        ?>
                                    <option value="<?php echo $item['id']; ?>"><?php echo $item['name'] ?></option>
                                    < <?php
                                            }
                                                ?> </select>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label>Transportaion / Route</label>

                        <div class="form-group has-icon-left">
                            <div class="position-relative">
                                <select class="form-select control" id="RetailSelect" name="trans[0]">
                                    <option value="" disabled selected>Choose One</option>
                                    <?php
                                        foreach ($trans_result as $trans) {

                                        ?>
                                    <option value="<?php echo $trans['id']; ?>">
                                        <?php echo $trans['type'] . "/" . $trans['delivery_route'] ?></option>
                                    <?php
                                            // var_dump($trans);
                                        }
                                        ?>
                                </select>

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
            <button type="submit" class="btn btn-primary me-1 mb-1" name="add">Create Shipping</button>

        </div>
    </div>
    </form>
</div>
</div>
</div>
<?php

}
?>
<script>
$(document).ready(function() {

    // Denotes total number of rows
    var rowIdx = 1;

    // jQuery button click event to add a row
    $('#addBtn').on('click', function() {

        // Adding a row inside the tbody.
        $('#row').append(`
        <hr>
        <div class="col-md-6">
                            <label>Item</label>
                       
                            <div class="form-group has-icon-left">
                                <div class="position-relative">
                                    <select class="form-select control" id="RetailSelect" name="item[${rowIdx}]">
                                        <option value="" disabled selected>Choose One</option>
                                        <?php
                                        foreach ($item_result as $item) {
                                        ?>
                                            <option value="<?php echo $item['id']; ?>"><?php echo $item['name'] ?></option>
                                            < <?php
                                            }
                                                ?> </select>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Transportaion / Route</label>
                        
                            <div class="form-group has-icon-left">
                                <div class="position-relative">
                                    <select class="form-select control" id="RetailSelect" name="trans[${rowIdx}]">
                                        <option value="" disabled selected>Choose One</option>
                                        <?php
                                        foreach ($trans_result as $trans) {

                                        ?>
                                            <option value="<?php echo $trans['id']; ?>"><?php echo $trans['type'] . "/" . $trans['delivery_route'] ?></option>
                                            <?php
                                            // var_dump($trans);
                                        }
                                            ?> </select>

                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    `)
        rowIdx++;
    });

    // jQuery button click event to remove a row.
    $('#tbody').on('click', '.remove', function() {

        // Getting all the rows next to the row
        // containing the clicked button
        var child = $(this).closest('tr').nextAll();

        // Iterating across all the rows 
        // obtained to change the index
        child.each(function() {

            // Getting <tr> id.
            var id = $(this).attr('id');

            // Getting the <p> inside the .row-index class.
            var idx = $(this).children('.row-index').children('p');

            // Gets the row number from <tr> id.
            var dig = parseInt(id.substring(1));

            // Modifying row index.
            idx.html(`Row ${dig - 1}`);

            // Modifying row id.
            $(this).attr('id', `R${dig - 1}`);
        });

        // Removing the current row.
        $(this).closest('tr').remove();

        // Decreasing total number of rows by 1.
        rowIdx--;
    });
});
</script>
</div>