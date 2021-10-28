<?php
session_start();
?>
<div class="row">
    <div class="col-12">
        <div class="card ">
            <div class="card-header ">
                
            </div>

            
                <div class="card-content " style="margin-left: 5%;">
               
                    <div class="card-body">
                        <h5 class="card-title">
                            <?php
                            echo $UserData['FName'] ." " .$UserData['LName']
                            ?>
                        </h5>

                    </div>
                </div>
                <ul class="list-group list-group-flush">
                    
                        <li class="list-group-item">First Name: 
                            <span style="color: black;"> <?php
                            echo $UserData['FName'] 
                            ?>
                            </span>    
                        </li>

                        <li class="list-group-item">Last Name: 
                            <span style="color: black;"> <?php
                            echo $UserData['LName']
                            ?>
                            </span>    
                        </li>
                        <li class="list-group-item">Date Of Birth: 
                        <span style="color: black;">
                        <?php
                            echo $UserData['DateOfBirth'] 
                            ?>
                        </span>
                        </li>
                        <li class="list-group-item">Email: 
                        <span style="color: black;">
                        <?php
                            echo $UserData['Email'] 
                            ?>
                        </span>
                        </li>
                   
                </ul>
           
        </div>
    </div>
</div>