<?php
session_start();
include("connection.php");
?>
<!-- shipped_items -->
<?php
if ($_GET['title'] == 'items') {
    $get_item = mysqli_query($conn, 'SELECT * FROM `shipped_items`');
?>
    <div class="card">
        <div class="card-header">
            Items
            <span style="float: right;">
                <a href="<?php echo '?title=create_item' ?>" class="btn-sm icon icon-left btn-success"><i data-feather="alert-circle" style="float: right;"></i>
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
                                <a href="<?php echo '?id=' . $item['id'] . '&title=showItem' ?>" class="btn-sm icon icon-left btn-primary" style="margin-right: 2%;"><i data-feather="edit"></i>
                                    View</a>

                                <a href="<?php echo '?id=' . $item['id'] . '&' . 'title=editItem'; ?> " class="btn-sm icon icon-left btn-warning" style="margin-right: 2%;"><i data-feather="alert-triangle"></i>
                                    Edit</a>

                                <a href="<?php echo '?id=' . $item['id'] . '&' . 'title=adeleteItem'; ?> " class="btn-sm icon icon-left btn-danger" style="margin-right: 2%;"><i data-feather="alert-circle"></i>
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
} elseif ($_GET['title'] == 'trans') {
    $get_trans = mysqli_query($conn, 'SELECT * FROM `transportation_events`');
?>
  <div class="card">
        <div class="card-header">
            Transportation Events
            <span style="float: right;">
                <a href="<?php echo '?title=create_trans' ?>" class="btn-sm icon icon-left btn-success"><i data-feather="alert-circle" style="float: right;"></i>
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
                                <a href="<?php echo '?id=' . $trans['id'] . '&title=showTrans' ?>" class="btn-sm icon icon-left btn-primary" style="margin-right: 2%;"><i data-feather="edit"></i>
                                    View</a>

                                <a href="<?php echo '?id=' . $trans['id'] . '&' . 'title=editTrans'; ?> " class="btn-sm icon icon-left btn-warning" style="margin-right: 2%;"><i data-feather="alert-triangle"></i>
                                    Edit</a>

                                <a href="<?php echo '?id=' . $trans['id'] . '&' . 'title=deleteTrans'; ?> " class="btn-sm icon icon-left btn-danger" style="margin-right: 2%;"><i data-feather="alert-circle"></i>
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
} elseif ($_GET['title'] == 'retails') {
    $get_retails= mysqli_query($conn, 'SELECT * FROM `retail_center`');
?>
  <div class="card">
        <div class="card-header">
            Retail Centers
            <span style="float: right;">
                <a href="<?php echo '?title=create_retail' ?>" class="btn-sm icon icon-left btn-success"><i data-feather="alert-circle" style="float: right;"></i>
                    Add Retail Center</a>
            </span>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>NAme</th>
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
                                <a href="<?php echo '?id=' . $retail['id'] . '&title=showRetail' ?>" class="btn-sm icon icon-left btn-primary" style="margin-right: 2%;"><i data-feather="edit"></i>
                                    View</a>

                                <a href="<?php echo '?id=' . $retail['id'] . '&' . 'title=editRetail'; ?> " class="btn-sm icon icon-left btn-warning" style="margin-right: 2%;"><i data-feather="alert-triangle"></i>
                                    Edit</a>

                                <a href="<?php echo '?id=' . $retail['id'] . '&' . 'title=deleteRetail'; ?> " class="btn-sm icon icon-left btn-danger" style="margin-right: 2%;"><i data-feather="alert-circle"></i>
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