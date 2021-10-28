<!-- <link rel="stylesheet" href="dashboardTemplate/dist/assets/vendors/sweetalert2/sweetalert2.min.css"> -->
<?php
// include "./queries.php";
session_start();
?>
<section id="multiple-column-form">
    <h1>Add User</h1>
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <dusersiv class="card-content">
                    <div class="card-body">
                        <form class="form" method="post" action="#">
                            <div class="row">
                                <!-- fname -->
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="first-name-column">First Name</label>
                                        <input type="text" id="first-name-column" class="form-control" placeholder="First Name" name="fname">
                                    </div>
                                </div>
                                <!-- lname -->
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="last-name-column">Last Name</label>
                                        <input type="text" id="last-name-column" class="form-control" placeholder="Last Name" name="lname">
                                    </div>
                                </div>
                                <!-- d.o.b -->
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="city-column">Date Of Birth</label>
                                        <input type="date" id="city-column" class="form-control" name="date">
                                    </div>
                                </div>
                                <!-- role -->
                                <div class="col-md-6 col-12" id="role">
                                    <div class="form-group">
                                        <label for="country-floating">Role</label>
                                        <select class="form-select" id="RoleSelect" name="role">
                                            <option value="" disabled selected>Select Role</option>
                                            <option value="admin">Admin</option>
                                            <option value="teacher">Teacher</option>
                                            <option value="student">Student</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- subject -->
                                <div class="col-md-6 col-12 row_dim">
                                    <div class="form-group">
                                        <label for="country-floating">Subject</label>
                                        <select class="form-select" id="SubjectSelect" name="subject">
                                            <option value="" disabled selected>Select Subject</option>
                                            <option value="English">English</option>
                                            <option value="Math">Math</option>
                                            <option value="Arabic">Arabic</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- grade -->
                                <div class="col-md-6 col-12 row_dim">
                                    <div class="form-group">
                                        <label for="country-floating">Grade</label>
                                        <select class="form-select" id="GradeSelect" name="grade">
                                            <option value="" disabled selected>Select Grade</option>
                                            <option value="grade 1">Grade 1</option>
                                            <option value="grade 2">Grade 2</option>
                                            <option value="grade 3">Grade 3</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- email -->
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="email-id-column">Email</label>
                                        <input type="email" id="email-id-column" class="form-control" name="email" placeholder="Email">
                                    </div>
                                </div>
                                <!-- password -->
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="company-column">Password</label>
                                        <input type="password" id="company-column" class="form-control" name="password" placeholder="password">
                                    </div>
                                </div>
                                <!-- submit and reset -->
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1" name="addUser">Submit</button>
                                    <!-- <button id="success"
                                                class="btn btn-outline-success btn-lg btn-block">Success</button> -->
                                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                </div>
                            </div>
                        </form>
                        <?php
                        ?>
                    </div>
            </div>
        </div>
    </div>
    </div>
</section>
<script>
    $(function() {
        $('.row_dim').hide();
        $('#RoleSelect').change(function() {
            if ($('#RoleSelect').val() == 'student' || $('#RoleSelect').val() == 'teacher') {
                $('.row_dim').show();
            } else {
                $('.row_dim').hide();
            }
        });
    });
</script>
<!-- <script src="dashboardTemplate/dist/assets/js/extensions/sweetalert2.js"></script>
    <script src="dashboardTemplate/dist/assets/vendors/sweetalert2/sweetalert2.all.min.js"></script>
    <script src="dashboardTemplate/dist/assets/js/main.js" aria-hidden="true"></script>
    <script src="dashboardTemplate/dist/assets/js/bootstrap.bundle.min.js" aria-hidden="true"></script> -->
<!-- <script src="dashboardTemplate/dist/assets/js/extensions/toastify.js"></script> -->
<!-- <script src="dashboardTemplate/dist/assets/vendors/toastify/toastify.js"></script> -->
<!-- <script src="dashboardTemplate/dist/assets/js/main.js" aria-hidden="true"></script> -->
<!-- <script src="dashboardTemplate/dist/assets/js/bootstrap.bundle.min.js" aria-hidden="true"></script> -->