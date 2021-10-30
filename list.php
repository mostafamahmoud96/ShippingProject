<?php
session_start();
include("connection.php");
?>
<!-- shipped_items -->
<?php
if ($_GET['sub'] == 'items') {
    // echo "55";
    $get_item = mysqli_query($conn, 'SELECT * FROM `shipped_items`');
?>
<div class="card">
    <div class="card-header">
        Items
        <span style="float: right;">
            <a href="<?php echo '?title=create&sub=createItem' ?>" class="btn-sm icon icon-left btn-success"><i
                    data-feather="alert-circle" style="float: right;"></i>
                Add Item</a>
        </span>
    </div>
    <div class="card-body">
        <table class="table table-striped" id="table1">
            <thead>
                <tr>
                    <th>Item Name</th>
                    <!-- <th>Role</th> -->

                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while ($item = mysqli_fetch_array($get_item)) {
                    ?>
                <tr>
                    <td>
                        <div class="avatar me-3">
                        </div><?php echo $item['name'] ?>
                    </td>
                    <!--  -->

                    <td colspan="3">
                        <a href="<?php echo '?id=' . $item['id'] . '&title=show&sub=showItem' ?>"
                            class="btn-sm icon icon-left btn-primary" style="margin-right: 2%;"><i
                                data-feather="edit"></i>
                            View</a>

                        <a href="<?php echo '?id=' . $item['id'] . '&title=edit&sub=editItem'; ?> "
                            class="btn-sm icon icon-left btn-warning" style="margin-right: 2%;"><i
                                data-feather="alert-triangle"></i>
                            Edit</a>

                        <a href="<?php echo '?id=' . $item['id'] . '&title=show&sub=deleteItem'; ?> "
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
} elseif ($_GET['sub'] == 'trans') {
    $get_trans = mysqli_query($conn, 'SELECT * FROM `transportation_events`');
?>
<div class="card">
    <div class="card-header">
        Transportation Events
        <span style="float: right;">
            <a href="<?php echo '?title=create&sub=createTrans' ?>" class="btn-sm icon icon-left btn-success"><i
                    data-feather="alert-circle" style="float: right;"></i>
                Add Transportation Events</a>
        </span>
    </div>
    <div class="card-body">
        <table class="table table-striped" id="table1">
            <thead>
                <tr>
                    <th>Type</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while ($trans = mysqli_fetch_array($get_trans)) {
                    ?>
                <tr>
                    <td>
                        <div class="avatar me-3">
                        </div><?php echo $trans['type'] ?>
                    </td>
                    <!--  -->

                    <td colspan="3">
                        <a href="<?php echo '?id=' . $trans['id'] . '&title=show&sub=showTrans' ?>"
                            class="btn-sm icon icon-left btn-primary" style="margin-right: 2%;"><i
                                data-feather="edit"></i>
                            View</a>

                        <a href="<?php echo '?id=' . $trans['id'] . '&title=edit&sub=editTrans'; ?> "
                            class="btn-sm icon icon-left btn-warning" style="margin-right: 2%;"><i
                                data-feather="alert-triangle"></i>
                            Edit</a>

                        <a href="<?php echo '?id=' . $trans['id'] . '&title=edit&sub=deleteTrans'; ?> "
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
} elseif ($_GET['sub'] == 'retails') {
    $get_retails = mysqli_query($conn, 'SELECT * FROM `retail_center`');
?>
<div class="card">
    <div class="card-header">
        Retail Centers
        <span style="float: right;">
            <a href="<?php echo '?title=create&sub=createRetail' ?>" class="btn-sm icon icon-left btn-success"><i
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
                    while ($retail = mysqli_fetch_array($get_retails)) {
                    ?>
                <tr>
                    <td>
                        <div class="avatar me-3">
                        </div><?php echo $retail['name'] ?>
                    </td>
                    <!--  -->

                    <td colspan="3">
                        <a href="<?php echo '?id=' . $retail['id'] . '&title=show&sub=showRetail' ?>"
                            class="btn-sm icon icon-left btn-primary" style="margin-right: 2%;"><i
                                data-feather="edit"></i>
                            View</a>

                        <a href="<?php echo '?id=' . $retail['id'] . '&title=edit&sub=editRetail'; ?> "
                            class="btn-sm icon icon-left btn-warning" style="margin-right: 2%;"><i
                                data-feather="alert-triangle"></i>
                            Edit</a>

                        <a href="<?php echo '?id=' . $retail['id'] . '&title=show&sub=deleteRetail'; ?> "
                            class="btn-sm icon icon-left btn-danger" style="margin-right: 2%;"><i
                                data-feather="alert-circle"></i>
                            Delete</a>
                    </td>
                </tr>
                <?php
                    }
                    ?>

                <?php
            } elseif ($_GET['sub'] == 'track') {
              $track_id = mysqli_query($conn, 'SELECT * FROM `item_transportations`');
                // echo "SELECT * FROM `transportation_events` where `id` = $track_id[id]";
                ?>
                <div class="card">
                    <div class="card-header">
                        Item Transportations

                    </div>
                    <div class="card-body">
                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th>Item Name</th>
                                    <th>Transport Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                    while ($track = mysqli_fetch_array($track_id)) {
                                        $transportation_data = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `transportation_events` where `id` = $track[transportation_id]"));
                                        $item_data = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `shipped_items` where `id` = $track[item_id]"));

                                    ?>
                                <tr>

                                    <td>
                                        <div class="avatar me-3">
                                        </div><?php echo $item_data['name'] ?>
                                    </td>
                                    <td>
                                        <div class="avatar me-3">
                                        </div><?php echo $transportation_data['delivery_route'] ?>
                                    </td>


                                    <!--  -->

                                    <td colspan="3">

                                        <a href="<?php echo '?id=' . $item_data['id'] . '&title=edit&sub=track'; ?> "
                                            class="btn-sm icon icon-left btn-warning" style="margin-right: 2%;"><i
                                                data-feather="alert-triangle"></i>
                                            Edit</a>

                                        <a href="<?php echo '?id=' . $retail['id'] . '&title=show&sub=deleteRetail'; ?> "
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