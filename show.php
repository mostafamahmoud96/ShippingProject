<?php
session_start();
?>
<div class="row">
    <div class="col-12">
        <?php
        if ($_GET['sub'] == 'showItem') {
            $item = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `shipped_items` WHERE `id` = $_GET[id]"));
            $retail = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `retail_center` WHERE `id`= $item[retail_center_id]"));
        ?>
            <div class="card ">
                <div class="card-header ">
                </div>
                <div class="card-content " style="margin-left: 5%;">
                    <div class="card-body">
                        <h5 class="card-title">
                            SHOW DATA
                            <?php
                            // echo $item['name'] ;
                            ?>
                        </h5>

                    </div>
                </div>
                <ul class="list-group list-group-flush">

                    <li class="list-group-item">Item Name:
                        <span style="color: black;"> <?php
                                                        echo $item['name']
                                                        ?>
                        </span>
                    </li>

                    <li class="list-group-item">Retail Center:
                        <span style="color: black;"> <?php
                                                        echo $retail['name']
                                                        ?>
                        </span>
                    </li>
                    <li class="list-group-item">Weight:
                        <span style="color: black;">
                            <?php
                            echo $item['weight'] . "gram"
                            ?>
                        </span>
                    </li>
                    <li class="list-group-item">Dimension:
                        <span style="color: black;">
                            <?php
                            echo $item['dimension']
                            ?>
                        </span>
                    </li>
                    <li class="list-group-item">Destination:
                        <span style="color: black;">
                            <?php
                            echo $item['destination']
                            ?>
                        </span>
                    </li>
                    <li class="list-group-item">Delivered At:
                        <span style="color: black;">
                            <?php
                            echo $item['final_delivery_date']
                            ?>
                        </span>
                    </li>
                    <li class="list-group-item">Insurance Amount:
                        <span style="color: black;">
                            <?php
                            echo $item['insurance_amount']
                            ?>
                        </span>
                    </li>

                </ul>

            </div>
        <?php
        } elseif ($_GET['sub'] == 'showTrans') {
            $trans = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `transportation_events` WHERE `id` = $_GET[id]"));

        ?>
            <div class="card ">
                <div class="card-header ">
                </div>
                <div class="card-content " style="margin-left: 5%;">
                    <div class="card-body">
                        <h5 class="card-title">
                            SHOW DATA
                            <?php
                            // echo $item['name'] ;
                            ?>
                        </h5>

                    </div>
                </div>
                <ul class="list-group list-group-flush">

                    <li class="list-group-item">Type:
                        <span style="color: black;"> <?php
                                                        echo $trans['type']
                                                        ?>
                        </span>
                    </li>

                    <li class="list-group-item">Router:
                        <span style="color: black;"> <?php
                                                        echo $trans['delivery_route']
                                                        ?>
                        </span>
                    </li>

                </ul>

            </div>
        <?php
        } elseif ($_GET['sub'] == 'showRetail') {
            $retail = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `retail_center` WHERE `id` = $_GET[id]"));

        ?>
            <div class="card ">
                <div class="card-header ">
                </div>
                <div class="card-content " style="margin-left: 5%;">
                    <div class="card-body">
                        <h5 class="card-title">
                            SHOW DATA
                            <?php
                            // echo $item['name'] ;
                            ?>
                        </h5>

                    </div>
                </div>
                <ul class="list-group list-group-flush">

                    <li class="list-group-item">Name:
                        <span style="color: black;"> <?php
                                                        echo $retail['name']
                                                        ?>
                        </span>
                    </li>

                    <li class="list-group-item">Type:
                        <span style="color: black;"> <?php
                                                        echo $retail['type']
                                                        ?>
                        </span>
                    </li>
                    <li class="list-group-item">Address:
                        <span style="color: black;"> <?php
                                                        echo $retail['address']
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