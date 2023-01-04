<?php session_start(); include ('dbconnect.php'); ?>
<!DOCTYPE html> 
    <head>
        <meta charset="UTF-8">
        <meta name = "description" content = "main page">
        <meta name = "keywords" content = "PHP">
        <meta name = "author" content = "Camillia Amin">
        <meta name = "viewport" content= "width = device-width, initial-scale = 1.0">
        <!-- <link rel="stylesheet" href="style.css"> -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <style>
            .left {
                color: black;
                font-weight: bold;
            }
            .right {
                color: dark grey;
            }   
            .emp_info {
                background-color: #2A4895;
                color: white;
                margin-left: 0;
                height: 85vh;
            }
            .data_table table {
                font-family: 'Courier New', Courier, monospace;
                border: 2px solid black;
                font-size: 14px;
                border-collapse: separate;
                border-spacing: 0px;
                background-color: white;
                margin-bottom: 20px;
            }
            .data_table th {
                background-color: #2A4895;
                color: white;
                padding: 12px;
                text-align: left;
                font-size: 14px;
                padding: 2px;
                font-weight: bold;
            }
            .data_table tr{
                background: white;
            }
            .data_table tr:hover {background-color: #ddd;}
            .data_table td, th {
                border: 1px solid #ddd;
                padding: 5px;

            }
            .actions button {
                display: inline;
                text-align: center;
                padding: 6;
                border: none;
                background: none;
            }
            .right_main {
                padding: 30px;
                overflow-y: auto;
                overflow-x: hidden;
            }

        </style>
    </head>
    <body>
        <?php
            if (!isset($_POST['id'])) {
                $id = $_SESSION['last_id'];
            } else {
                $id = $_POST['id'];
                $_SESSION['last_id'] = $_POST['id'];
            }

            $sql = "SELECT emp_first_name, emp_last_name FROM emp WHERE emp_id=$id;";
            $result = mysqli_query($connect,$sql);
            if ($result) {
                $row = mysqli_fetch_assoc($result);
                $first = $row["emp_first_name"];
                $last = $row["emp_last_name"];
            }

            $sql1 = "SELECT * FROM emp WHERE emp_id = $id";
            $result1 = mysqli_query($connect,$sql1);
            if ($result1) {
                $row = mysqli_fetch_assoc($result1);
                $email = $row["emp_email"];
                $phone = $row["emp_phone"];
                $sno = $row["emp_address_street_number"];
                $sname = $row["emp_address_street_name"];
                $city = $row["emp_address_city"];
                $province = $row["emp_address_province"];
                $pc = $row["emp_address_postal_code"];
            }

            $sql2 = "SELECT * FROM position_table pt, emp_position ep
            WHERE pt.position_id = ep.position_id
            AND emp_id = 1000 ORDER BY pt.position_id DESC;";
            $result2 = mysqli_query($connect,$sql2);
            if ($result2) {
                $row = mysqli_fetch_assoc($result2);
                $cur_pos = $row["position_title"];
            }

            $sql3 = "SELECT dept_name FROM dept d, emp_dept ep 
                    WHERE ep.emp_id = $id AND ep.dept_id = d.dept_id;";
            $result3 = mysqli_query($connect,$sql3);
            if ($result3) {
                $row = mysqli_fetch_assoc($result3);
                $dept = $row["dept_name"];
            }

            $sql4 = "SELECT * FROM work_period w, emp_work_period ew 
            WHERE ew.emp_id = $id AND ew.work_period_id = w.work_period_id;";
            $result4 = mysqli_query($connect,$sql4);

        ?>
        <a class="button logo" href="index.html" style="text-decoration: none;"><h2 style="color: white">HR Payroll DBMS</h2></a><br><br>
        <div class="container">
            <div class="row">
                <div class="col-sm-3 emp_info" >
                    <?php
                        echo '<h3>' . $first . ' ' . $last . '</h3>';
                        echo '<h4>' . $cur_pos . '</h4>';
                        echo '<h4>' . $dept . '</h4>';
                    ?>
                </div> 
                <div class="col-sm-9 right_main" >
                    <div class="pi">
                        <h4>Personal information</h4>
                        <table>
                            <tr>
                                <td class="left">Name</td>
                                <td class="right"><?php echo $first . ' ' . $last ?></td>
                            </tr>
                            <tr>
                                <td class="left">Email</td>
                                <td class="right"><?php echo $email ?></td>
                            </tr>

                            <tr>
                                <td class="left">Phone</td>
                                <td class="right"><?php echo $phone ?></td>
                            </tr>

                            <tr>
                                <td class="left">Work Address</td>
                                <td class="right"><?php echo $sno . ' ' . $sname . '<br>' . $city . ', ' . $province . '<br>' . $pc ?></td>
                            </tr>
                        </table>
                        <button type="button" class="btn btn-primary py-3 px-4" data-toggle="modal" data-target="#changePI">Edit
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square edit" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg>
                        </button>
                        <div class="modal fade" id="changePI" tabindex="-1" role="dialog" aria-labelledby="changePITitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-body p-4 py-5 p-md-5">
                                        <h3 class="text-center mb-3">Edit Your Personal Information</h3>
                                        <form action="" class="signup-form" method="post">
                                            <div class="form-group mb-2">
                                                <label for="phone">Phone</label>
                                                <input type="text" name="phone" class="form-control" value="<?php echo $phone?>">
                                            </div>
                                            <div class="form-group mb-2">
                                                <label for="sno">Street Number</label>
                                                <input type="text" name="sno" class="form-control" value="<?php echo $sno ?>">
                                            </div>
                                            <div class="form-group mb-2">
                                                <label for="sname">Street Name</label>
                                                <input type="text" name="sname" class="form-control" value="<?php echo $sname ?>">
                                            </div>
                                            <div class="form-group mb-2">
                                                <label for="city">City</label>
                                                <input type="text" name="city" class="form-control" value="<?php echo $city ?>">
                                            </div>
                                            <div class="form-group mb-2">
                                                <label for="province">Province</label>
                                                <input type="text" name="province" class="form-control" value="<?php echo $province ?>">
                                            </div>
                                            <div class="form-group mb-2">
                                                <label for="pc">Postal Code</label>
                                                <input type="text" name="pc" class="form-control" value="<?php echo $pc ?>"">
                                            </div>
                                            <div class="form-group mb-2">
                                                <br><button type="submit" class="form-control btn btn-primary rounded submit px-3">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="work_log_table">
                        <div><h4>Work Log</h4></div>
                        <div>
                            <button class="btn btn-primary py-3 px-4" data-toggle="modal" data-target="#work_period_add">Add
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                                <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                </svg>
                            </button>
                        </div>
                    
                        <table class="data_table">
                            <tr><th>Work Period ID</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Actions</th></tr>
                        <?php
                        if ($result4) {
                            while ($row = mysqli_fetch_assoc($result4)) {
                                echo "<tr><td>" . $row["work_period_id"] . "</td>";
                                echo "<td>" . $row["start_time"] . "</td>";
                                echo "<td>" . $row["end_time"] . "</td>";
                                echo '<td><div class="actions">
                                    <form method="post">
                                        <button type="submit" name="work_period_edit" data-toggle="modal" data-target="#work_period_modal" value="' . $row["work_period_id"] . '">
                                            <svg style="cursor:pointer" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square edit" viewBox="0 0 16 16"><path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/></svg>
                                        </button>

                                        <button type="submit" name="work_period_delete" value="' . $row["work_period_id"] . '">
                                            <svg style="cursor:pointer" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill delete" viewBox="0 0 16 16">
                                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/></svg>
                                        </button>
                                    <form>
                                    </div></td></tr>';
                            }
                            echo '</table>';
                        }
                        if (isset($_POST['work_period_edit'])) {
                            $id_chosen = $_POST['work_period_edit']; 
                            $sql_get_edit = "SELECT * from work_period WHERE work_period_id = $id_chosen";
                            $result_edit = mysqli_query($connect, $sql_get_edit);
                            $row = mysqli_fetch_assoc($result_edit);
                        ?>
                        <script>
                            $(function() {
                                $('#work_period_modal').modal('show');
                            });
                        </script>
                        <div class="modal fade" id="work_period_modal" tabindex="-1" role="dialog" aria-labelledby="work_period_modalTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-body p-4 py-5 p-md-5">
                                        <h3 class="text-center mb-3">Make changes to log <?php echo $row["work_period_id"]?></h3>
                                        <form action="" class="signup-form" method="post">
                                            <div class="form-group mb-2">
                                                <input type="hidden" name="work_period_id_edit" class="form-control" value="<?php echo $row["work_period_id"]?>">
                                            </div>
                                            <div class="form-group mb-2">
                                                <label for="fn">Start Time</label>
                                                <input type="text" name="start_edit" class="form-control" value="<?php echo $row["start_time"]?>">
                                            </div>
                                            <div class="form-group mb-2">
                                                <label for="ln">End Time</label>
                                                <input type="text" name="end_edit" class="form-control" value="<?php echo $row['end_time']?>">
                                            </div>
                                            <div class="form-group mb-2">
                                                <br><input type="submit" name="work_period_apply" value="Apply changes" class="form-control btn btn-primary rounded submit px-3">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                            if (isset($_POST['work_period_apply'])){
                                // echo '<script>alert("worked");</script>';
                                include ('view_employee_edit.php'); 
                            }
                        }
                        if (isset($_POST['work_period_add'])) {
                            ?>
                            <script>
                                $(function() {
                                    $('#work_period_modal_add').modal('show');
                                });
                            </script>
                            <div class="modal fade" id="work_period_modal_add" tabindex="-1" role="dialog" aria-labelledby="work_period_modal_addTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body p-4 py-5 p-md-5">
                                            <h3 class="text-center mb-3">Add to work log</h3>
                                            <form action="" class="signup-form" method="post">
                                                <input type="hidden" name="emp_id" class="form-control" value="<?php echo $id?>">
                                                <div class="form-group mb-2">
                                                    <label for="fn">Start Time</label>
                                                    <input type="text" name="start_add" class="form-control" value="2022-06-05 09:00:00">
                                                </div>
                                                <div class="form-group mb-2">
                                                    <label for="ln">End Time</label>
                                                    <input type="text" name="end_add" class="form-control" value="2022-06-05 05:00:00">
                                                </div>
                                                <div class="form-group mb-2">
                                                    <br><input type="submit" name="work_period_add_log" value="Add" class="form-control btn btn-primary rounded submit px-3">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                                if (isset($_POST['work_period_add_log'])){
                                    // echo '<script>alert("worked");</script>';
                                    include ('view_employee_edit.php'); 
                                }
                            }
                        ?>
                    </div>
                </div>          
            </div>
        </div>
    </body>
</html>