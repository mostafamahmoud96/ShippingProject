<!DOCTYPE html>
<html lang="en">

<head>

    <?php
    session_start();
 
    
    ?>
</head>

<body>
    <div id="app">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Item Data</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form class="form form-horizontal"  method="post">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <label> First Name</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="text" class="form-control" name="fname" value="<?php echo $UserData['FName']; ?>">
                                            <div class="form-control-icon">

                                                <i class="bi bi-person"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Last Name</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="text" class="form-control" name="lname" value="<?php echo $UserData['LName'] ?>">
                                            <div class="form-control-icon">
                                                <i class="bi bi-person"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <!-- role -->

                                <div class="col-md-4">
                                    <label>Role</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <select class="form-select" id="RoleSelect" name="role">
                                               
                                                <?php if ($role1['role'] == 'admin') { ?> <option  value="admin" selected="selected"  >Admin</option><?php } ?>

                                                <?php if ($role1['role'] == 'teacher') { ?><option  selected="selected" value="teacher">Teacher</option><?php } ?>

                                                <?php if ($role1['role'] == 'student') { ?>  <option  selected="selected" value="student" >Student</option><?php } ?>
                                                }

                                                }
                                            </select>

                                        </div>
                                    </div>
                                </div>


                                <?php if ($role['role'] == 'student' || $role['role'] == 'teacher'){?>
                                <div class="col-md-4">
                                    <label>Subject</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <select class="form-select" id="SubjectSelect" name="subject">
                                                <option value="" disabled selected>Select Subject</option>
                                                <option value="English" <?php if ($UserData['Subject']) { ?>selected="selected" <?php } ?>>English</option>
                                                <option value="Math" <?php if ($UserData['Subject']) { ?>selected="selected" <?php } ?>>Math</option>
                                                <option value="Arabic" <?php if ($UserData['Subject']) { ?>selected="selected" <?php } ?>>Arabic</option>
                                            </select>

                                        </div>
                                    </div>
                                </div>


                                <!-- grade -->


                                <div class="col-md-4">
                                    <label>Grade</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <select class="form-select" id="GradeSelect" name="grade">
                                                <option value="" disabled selected>Select Grade</option>
                                                <option value="g1" <?php if ($UserData['grade']) { ?>selected="selected" <?php } ?>>Grade 1</option>
                                                <option value="g2" <?php if ($UserData['grade']) { ?>selected="selected" <?php } ?>>Grade 2</option>
                                                <option value="g3" <?php if ($UserData['grade']) { ?>selected="selected" <?php } ?>>Grade 3</option>
                                            </select>

                                        </div>
                                    </div>
                                </div>
                                <?php
                                }
                                ?>

                                <div class="col-md-4">
                                    <label>Email</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="email" class="form-control" value="<?php echo $UserData['Email'] ?>" id="first-name-icon" name="email">
                                            <div class="form-control-icon">
                                                <i class="bi bi-envelope"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Password</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="text" class="form-control" name="password" value="<?php echo $role1['Password'] ?>">
                                            <div class="form-control-icon">
                                                <i class="bi bi-lock"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1"  name="edit_user">Edit</button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
  