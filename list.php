<?php
session_start();
include("connection.php");
?>
<!-- shipped_items -->
<?php
if ($_GET['sub'] == 'items') {
    if(isset($_SESSION['success'])){
        echo '<div class="alert alert-light-success color-success"><i class="bi bi-check-circle"></i>'.$_SESSION['success'].'</div>';
        unset($_SESSION['success']);
    }

    $sql = "SELECT * FROM `shipped_items` ";
    $result = mysqli_query($conn, $sql);
?>
<div class="card">
    <div class="card-header">
        Shipping Items
        <span style="float: right;">
            <a href="<?php echo '?title=create&sub=item' ?>" class="btn-sm icon icon-left btn-success"><i
                    data-feather="alert-circle" style="float: right;"></i>
                Add Item</a>
        </span>
    </div>
    <div class="card-body">
        <table class="table table-striped" id="table1">
            <thead>
                <tr>
                    <th>Item Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    // get all shipped items
                    while ($shipped_item = mysqli_fetch_array($result)) {
                    ?>
                <tr>
                    <!-- shipped item name -->
                    <td>
                        <div class="avatar me-3">
                        </div><?php echo $shipped_item['name'] ?>
                    </td>
                    <!-- crud buttons -->
                    <td colspan="3">
                        <a href="<?php echo '?id=' . $shipped_item['id'] . '&title=show&sub=item' ?>"
                            class="btn-sm icon icon-left btn-primary" style="margin-right: 2%;"><i
                                data-feather="edit"></i>
                            View</a>
                        <a href="<?php echo '?id=' . $shipped_item['id'] . '&title=edit&sub=item'; ?> "
                            class="btn-sm icon icon-left btn-warning" style="margin-right: 2%;"><i
                                data-feather="alert-triangle"></i>
                            Edit</a>
                        <a href="<?php echo '?id=' . $shipped_item['id'] . '&title=delete&sub=item'; ?> "
                            class="btn-sm icon icon-left btn-danger" style="margin-right: 2%;"><i
                                data-feather="alert-circle"></i>
                            Delete</a>
                    </td>
                </tr>
                <?php
                    }
                    ?>

            </tbody>
        </table>
    </div>
</div>
<?php
}
?>
<!-- ___________________________________________________________________________________________________________________________ -->
<!-- transportation events -->
<?php
if ($_GET['sub'] == 'trans') {
    if(isset($_SESSION['success'])){
        echo '<div class="alert alert-light-success color-success"><i class="bi bi-check-circle"></i>'.$_SESSION['success'].'</div>';
        unset($_SESSION['success']);
    }
    $sql = "SELECT * FROM `transportation_events`";
    $result = mysqli_query($conn, $sql);
?>
<div class="card">
    <div class="card-header">
        Transportation Events
        <span style="float: right;">
            <a href="<?php echo '?title=create&sub=trans_event' ?>" class="btn-sm icon icon-left btn-success"><i
                    data-feather="alert-circle" style="float: right;"></i>
                Add Transportation Event</a>
        </span>
    </div>
    <div class="card-body">
        <table class="table table-striped" id="table1">
            <thead>
                <tr>
                    <th>Transportaion Type</th>
                    <th>Route</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    // get all transportation events
                    while ($trans_event = mysqli_fetch_array($result)) {
                    ?>
                <tr>
                    <!-- transportaion event name/type -->
                    <td>
                        <div class="avatar me-3">
                        </div><?php echo $trans_event['type'] ?>
                    </td>
                    <!-- transportaion event route -->
                    <td>
                        <div class="avatar me-3">
                        </div><?php echo $trans_event['delivery_route'] ?>
                    </td>
                    <!-- CRUD Buttons  -->
                    <td colspan="3">
                        <a href="<?php echo '?id=' . $trans_event['id'] . '&title=edit&sub=trans_event'; ?> "
                            class="btn-sm icon icon-left btn-warning" style="margin-right: 2%;"><i
                                data-feather="alert-triangle"></i>
                            Edit</a>
                        <a href="<?php echo '?id=' . $trans_event['id'] . '&title=delete&sub=trans'; ?> "
                            class="btn-sm icon icon-left btn-danger" style="margin-right: 2%;"><i
                                data-feather="alert-circle"></i>
                            Delete</a>
                    </td>
                </tr>
                <?php
                    }
                    ?>

            </tbody>
        </table>
    </div>
</div>
<?php
}
?>
<!-- ___________________________________________________________________________________________________________________________ -->
<!-- retails centers -->
<?php
if ($_GET['sub'] == 'retails') {
    if(isset($_SESSION['success'])){
        echo '<div class="alert alert-light-success color-success"><i class="bi bi-check-circle"></i>'.$_SESSION['success'].'</div>';
        unset($_SESSION['success']);
    }

    $sql = "SELECT * FROM `retail_center` ";
    $result = mysqli_query($conn, $sql);
?>
<div class="card">
    <div class="card-header">
        Retail Centers
        <span style="float: right;">
            <a href="<?php echo '?title=create&sub=retail' ?>" class="btn-sm icon icon-left btn-success"><i
                    data-feather="alert-circle" style="float: right;"></i>
                Add Retail Center</a>
        </span>
    </div>
    <div class="card-body">
        <table class="table table-striped" id="table1">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    // get all retail centers
                    while ($retail_center = mysqli_fetch_array($result)) {
                    ?>
                <tr>
                    <!-- retail center name -->
                    <td>
                        <div class="avatar me-3">
                        </div><?php echo $retail_center['name'] ?>
                    </td>
                    <!-- CRUD Buttons  -->
                    <td colspan="3">
                        <a href="<?php echo '?id=' . $retail_center['id'] . '&title=show&sub=retail' ?>"
                            class="btn-sm icon icon-left btn-primary" style="margin-right: 2%;"><i
                                data-feather="edit"></i>
                            View</a>

                        <a href="<?php echo '?id=' . $retail_center['id'] . '&title=edit&sub=retail'; ?> "
                            class="btn-sm icon icon-left btn-warning" style="margin-right: 2%;"><i
                                data-feather="alert-triangle"></i>
                            Edit</a>

                        <a href="<?php echo '?id=' . $retail_center['id'] . '&title=delete&sub=retails'; ?> "
                            class="btn-sm icon icon-left btn-danger" style="margin-right: 2%;"><i
                                data-feather="alert-circle"></i>
                            Delete</a>
                    </td>
                </tr>
                <?php
                    }
                    ?>
            </tbody>
        </table>
    </div>
</div>
<?php
}
?>
<!-- ___________________________________________________________________________________________________________________________ -->
<!-- track shipping -->
<?php
if ($_GET['sub'] == 'track') {
    if(isset($_SESSION['success'])){
        echo '<div class="alert alert-light-success color-success"><i class="bi bi-check-circle"></i>'.$_SESSION['success'].'</div>';
        unset($_SESSION['success']);
    }

    $sql = "SELECT * FROM `item_transportation` ";
    $result = mysqli_query($conn, $sql);
?>
<div class="card">
    <div class="card-header">
        Track Shipping
        <span style="float: right;">
            <a href="<?php echo '?title=create&sub=track' ?>" class="btn-sm icon icon-left btn-success"><i
                    data-feather="alert-circle" style="float: right;"></i>
                Add Shipping Track</a>
        </span>
    </div>
    <div class="card-body">
        <table class="table table-striped" id="table1">
            <thead>
                <tr>
                    <th>Shipping Id</th>
                    <th>Item Name</th>
                    <th>Type/Route</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    // get all shipping orders
                    while ($track = mysqli_fetch_array($result)) {
                        // to get shipping item data
                        $query = "SELECT * FROM `shipped_items` ";
                        $query .= "where `id` = $track[item_id]";
                        // echo $query ;
                        $query_result = mysqli_query($conn, $query);
                        $query_fetch = mysqli_fetch_array($query_result);

                        // to get type/route data
                        $query_trans = "SELECT * FROM `transportation_events`";
                        $query_trans .= "WHERE `id` = $track[transportation_id]";
                        $query_trans_result = mysqli_query($conn, $query_trans);
                        $query_trans_fetch = mysqli_fetch_array($query_trans_result);
                    ?>
                <tr>
                    <!-- shipping order id -->
                    <td>
                        <div class="avatar me-3">
                        </div><?php echo $track['id'] ?>
                    </td>
                    <!-- shipping item name -->
                    <td>
                        <div class="avatar me-3">
                        </div><?php echo $query_fetch['name'] ?>
                    </td>
                    <!-- shipping type/route -->
                    <td>
                        <div class="avatar me-3">
                        </div><?php echo $query_trans_fetch['type'] . " / " . $query_trans_fetch['delivery_route'] ?>
                    </td>
                    <!-- shipping status -->
                    <td>
                    <div class="avatar me-3">
                        </div><?php echo $track['status']; ?>
                       
                          
                   
                    </td>
                    <!-- CRUD Buttons  -->
                    <td colspan="3">
                        <a href="<?php echo '?id=' . $track['id'] . '&title=edit&sub=track'; ?> "
                            class="btn-sm icon icon-left btn-warning" style="margin-right: 2%;"><i
                                data-feather="alert-triangle"></i>
                            Edit</a>
                        <a href="<?php echo '?id=' . $track['id'] . '&title=delete&sub=track'; ?> "
                            class="btn-sm icon icon-left btn-danger" style="margin-right: 2%;"><i
                                data-feather="alert-circle"></i>
                            Delete</a>
                    </td>
                </tr>
                <?php
                    }
                    ?>
                <script>
                $(document).ready(function() {

                    $('#show').on('click', function() {
                        $('.center').show();
                        $(this).hide();
                    })

                    $('#close').on('click', function() {
                        $('.center').hide();
                        $('#show').show();
                    })
                })
                </script>
            </tbody>
        </table>
    </div>
</div>
<?php
}
?>