<!DOCTYPE html> 
    <?php include ('dbconnect.php'); ?>
    <head>
        <meta charset="UTF-8">
        <meta name = "description" content = "main page">
        <meta name = "keywords" content = "PHP">
        <meta name = "author" content = "Camillia Amin">
        <meta name = "viewport" content= "width = device-width, initial-scale = 1.0">
        <link rel="stylesheet" href="style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <style>
            .body {
                margin: 30px;
            }
            .left {
                color: black;
            }
            .right {
                color: dark grey;
            }   
        </style>
    </head>
    <body>
        <header>
            <div class="logo">
                <a class="button" href="index.html" style="text-decoration: none;"><h2>HR Payroll DBMS</h2></a>
            </div>
            <?php
                $id = $_POST['id'];
                $sql = "SELECT emp_first_name, emp_last_name FROM emp WHERE emp_id=$id;";
                $result = mysqli_query($connect,$sql);
                if ($result) {
                    $row = mysqli_fetch_assoc($result);
                    $first = $row["emp_first_name"];
                    $last = $row["emp_last_name"];
                }
            ?>
            <div class="profile">
                <?php echo "<h4>Welcome, " . $first . " " . $last . "</h4>"?>
            </div>
        </header>
        <main>
            <?php
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

                // $sql3 = "SELECT dept_name FROM dept_";

            ?>
            <div class="emp_info">
                <br><br>
                <?php
                    echo '<h3>' . $first . ' ' . $last . '</h3>';
                    echo '<h4>' . $cur_pos . '</h4>';
                ?>
                <div class="pi" >
                    <h5>Personal information</h5>
                    <button type="button" class="btn btn-primary py-3 px-4" data-toggle="modal" data-target="#changePI">Edit
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square edit" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                        </svg>
                    </button>
                    <div class="modal fade" id="changePI" tabindex="-1" role="dialog" aria-labelledby="changePITitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close d-flex align-items-center justify-content-center" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" class="ion-ios-close"></span>
                                    </button>
                                </div>
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
                                    <?php
                                        if (isset($_POST['phone']))
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    echo '<table>';
                    echo '<tr>';
                    echo '<td class="left">Name</td>';
                    echo '<td class="right">' . $first . ' ' . $last . '</td>';
                    echo '</tr>';

                    echo '<tr>';
                    echo '<td class="left">Email</td>';
                    echo '<td class="right">' . $email . '</td>';
                    echo '</tr>';

                    echo '<tr>';
                    echo '<td class="left">Phone</td>';
                    echo '<td class="right">' . $phone . '</td>';
                    echo '</tr>';

                    echo '<tr>';
                    echo '<td class="left">Work Address</td>';
                    echo '<td class="right">' . $sno . ' ' . $sname . '<br>' . $city . ', ' . $province . '<br>' . $pc . '</td>';
                    echo '</tr>';
                    echo '</table';
                ?>
                
            </div>
        </main>
    </body>

</html>