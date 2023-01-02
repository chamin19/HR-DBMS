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
                    $row = mysqli_fetch_assoc($result);
                    $first = $row["emp_first_name"];
                    $last = $row["emp_last_name"];
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
                        echo '<h5>Personal information</h5>';
                        echo '<table>';
                        echo '<tr>';
                        echo '<td class="left">Name</td>';
                        echo '<td class="right">' . $first . '$last</td>';
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