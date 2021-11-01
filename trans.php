<?php
session_start();
?>


<!-- <h1>users page</h1> -->

<div class="card">
    <div class="card-header">
        Transportaion Events
        <span style="float: right;">
            <a href="<?php echo '?title=admin/add_user'?>" class="btn-sm icon icon-left btn-success"><i
                    data-feather="alert-circle" style="float: right;"></i>
                Add Transportaion Events</a>
        </span>
    </div>
    <div class="card-body">
        <table class="table table-striped" id="table1">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Role</th>

                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div class="avatar me-3">
                        </div><?php echo $x['FName'] ." " .$x['LName'] ?>
                    </td>
                    <td><?php echo $x['role']. $x['UserID'] ?></td>

                    <td colspan="3">
                        <a href="<?php echo '?email='. $x['Email'].'&title=profile'?>"
                            class="btn-sm icon icon-left btn-primary" style="margin-right: 2%;"><i
                                data-feather="edit"></i>
                            View</a>

                        <a href="<?php echo '?email='. $x['Email'].'&'.'title=admin/user_edit';?> "
                            class="btn-sm icon icon-left btn-warning" style="margin-right: 2%;"><i
                                data-feather="alert-triangle"></i>
                            Edit</a>

                        <a href="<?php echo '?email='. $x['Email'].'&'.'title=admin/delete_user';?> "
                            class="btn-sm icon icon-left btn-danger" style="margin-right: 2%;"><i
                                data-feather="alert-circle"></i>
                            Delete</a>
                    </td>
                </tr>
                <?php
               
            //    $row++;
                    // }
                    
                ?>

            </tbody>
        </table>
    </div>
</div>