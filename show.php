<?php
session_start();
?>
<div class="row">
    <div class="col-12">
        <?php
        if ($_GET['sub'] == 'item') {
            $item_query = "SELECT * FROM `shipped_items` WHERE";
            $item_query .= " `id` = $_GET[id]";
            $item_result = mysqli_query($conn, $item_query);
            $item_fetch =  mysqli_fetch_array($item_result);
            $retail_query = "SELECT * FROM `retail_center` WHERE";
            $retail_query .= " `id`= $item_fetch[retail_center_id]";
            $retail_result = mysqli_query($conn, $retail_query);
            $retail_fetch = mysqli_fetch_array($retail_result);
        ?>
            <div class="card ">
                <div class="card-header ">
                </div>
                <div class="card-content " style="margin-left: 5%;">
                    <div class="card-body">
                        <h5 class="card-title">
                            SHOW DATA
                        </h5>
                    </div>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Item Name:
                        <span style="color: black;"> <?php
                                                        echo $item_fetch['name']
                                                        ?>
                        </span>
                    </li>

                    <li class="list-group-item">Retail Center:
                        <span style="color: black;"> <?php
                                                        echo $retail_fetch['name']
                                                        ?>
                        </span>
                    </li>
                    <li class="list-group-item">Weight:
                        <span style="color: black;">
                            <?php
                            echo $item_fetch['weight'] . "gram"
                            ?>
                        </span>
                    </li>
                    <li class="list-group-item">Dimension:
                        <span style="color: black;">
                            <?php
                            echo $item_fetch['dimension']
                            ?>
                        </span>
                    </li>
                    <li class="list-group-item">Destination:
                        <span style="color: black;">
                            <?php
                            echo $item_fetch['destination']
                            ?>
                        </span>
                    </li>
                    <li class="list-group-item">Delivered At:
                        <span style="color: black;">
                            <?php
                            echo $item_fetch['final_delivery_date']
                            ?>
                        </span>
                    </li>
                    <li class="list-group-item">Insurance Amount:
                        <span style="color: black;">
                            <?php
                            echo $item_fetch['insurance_amount']
                            ?>
                        </span>
                    </li>

                </ul>

            </div>
<!-- ___________________________________________________________________________________________________________________________ -->
<!-- show retail-->
        <?php
        } elseif ($_GET['sub'] == 'retail') {
            $retail_query = "SELECT * FROM `retail_center` WHERE";
            $retail_query .= " `id` = $_GET[id]";
            $retail_result = mysqli_query($conn, $retail_query);
            $retail_fetch = mysqli_fetch_array($retail_result);

        ?>
            <div class="card ">
                <div class="card-header ">
                </div>
                <div class="card-content " style="margin-left: 5%;">
                    <div class="card-body">
                        <h5 class="card-title">
                            SHOW DATA
                        </h5>

                    </div>
                </div>
                <ul class="list-group list-group-flush">

                    <li class="list-group-item">Name:
                        <span style="color: black;"> <?php
                                                        echo $retail_fetch['name']
                                                        ?>
                        </span>
                    </li>

                    <li class="list-group-item">Type:
                        <span style="color: black;"> <?php
                                                        echo $retail_fetch['type']
                                                        ?>
                        </span>
                    </li>
                    <li class="list-group-item">Address:
                        <span style="color: black;"> <?php
                                                        echo $retail_fetch['address']
                                                        ?>
                        </span>
                    </li>

                </ul>

            </div>
        <?php
        }
        ?>
    </div>
</div>