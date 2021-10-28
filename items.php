<?php
session_start();
?>


<!-- <h1>users page</h1> -->

<div class="card">
    <div class="card-header">
        Items
        <span style="float: right;">
            <a href="<?php echo '?title=create'?>" class="btn-sm icon icon-left btn-success"><i data-feather="alert-circle" style="float: right;"></i>
                Add Item</a>
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
                <?php
                    
                    //    while(($x=mysqli_fetch_array($TeacherData)) || ($x= mysqli_fetch_array($StudentData)) || ($x=mysqli_fetch_array($AdminData)))
                    //    { 
                    ?> 
                <tr>
                    <td>
                        <div class="avatar me-3">
                            <!-- <img src="dashboardTemplate/dist/assets/images/faces/1.jpg" alt="" srcset=""> -->
                        </div><?php echo $x['FName'] ." " .$x['LName'] ?>
                    </td>
                    <td><?php echo $x['role']. $x['UserID'] ?></td>

                    <td colspan="3">
                        <a href="<?php echo '?email='. $x['Email'].'&title=show'?>"class="btn-sm icon icon-left btn-primary" style="margin-right: 2%;"><i data-feather="edit"></i>
                            View</a>
                            
                        <a href="<?php echo '?email='. $x['Email'].'&'.'title=edit';?> "class="btn-sm icon icon-left btn-warning" style="margin-right: 2%;"><i data-feather="alert-triangle"></i>
                            Edit</a>

                        <a href="<?php echo '?email='. $x['Email'].'&'.'title=admin/delete_user';?> " class="btn-sm icon icon-left btn-danger" style="margin-right: 2%;"><i data-feather="alert-circle"></i>
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