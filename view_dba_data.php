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
    </head>

    <body>
        <header>
            <div class="logo">
                <a class="button" href="https://www.cs.ryerson.ca/~chamin/hr_payroll/main.html" style="text-decoration: none;"><h2>HR Payroll DBMS</h2></a>
            </div>
            <div class="profile">
                <h4>HR Coordinator</h4>
            </div>
        </header>
        <main>
            <br>
            <div class="buttons">
                <form action = "https://webdev.scs.ryerson.ca/~chamin/hr_payroll/view_dba_query.php" method = "">
                    <input type = "submit" value = "Query tables" class="button" id="light">
                </form>
                <form action = "" method = "post">
                    <input type = "submit" value = "Delete values" name="delete" class="button" id="light">
                </form>
                <form action = "" method = "post">
                    <input type = "submit" value = "Populate values" name="populate" class="button" id="light">
                </form>
                <?php
                    $sql = "SELECT * FROM emp;";
                    $result = mysqli_query($connect,$sql);
                    if(isset($_POST['delete'])){
                        mysqli_query($connect, $sql);
                        if (mysqli_num_rows($result) > 0) { //if tables are populated
                            include ('delete_values.php');
                        }
                    }
                    if(isset($_POST['populate'])){
                        if (mysqli_num_rows($result) == 0) { //if tables are empty
                            include ('populate.php');
                        }
                    }
                ?>
                <style>
                .buttons form {
                    display: inline-block;
                }
                </style>
            <div class="container">
                <div class="row">
                    <div class="col-sm-8" id="tables">
                        <?php
                            $sql = "SELECT * FROM emp
                            ORDER BY emp_id ASC;";
                            $result = mysqli_query($connect, $sql);
                            
                            if (mysqli_num_rows($result) > 0) {
                                echo "<table>";
                                echo "<tr><th>Emp ID</th>";
                                echo "<th>First Name</th>";
                                echo "<th>Last Name</th>";
                                echo "<th>Email</th>";
                                echo "<th>Phone</th>";
                                echo "<th>Street No.</th>";
                                echo "<th>Street Name</th>";
                                echo "<th>City</th>";
                                echo "<th>Province</th>";
                                echo "<th>Postal Code</th></tr>";
                                while($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr> <td>" . $row["emp_id"] . "</td>";
                                    echo "<td>" . $row["emp_first_name"] . "</td>";
                                    echo "<td>" . $row["emp_last_name"] . "</td>";
                                    echo "<td>" . $row["emp_email"] . "</td>";
                                    echo "<td>" . $row["emp_phone"] . "</td>";
                                    echo "<td>" . $row["emp_address_street_number"] . "</td>";
                                    echo "<td>" . $row["emp_address_street_name"] . "</td>";
                                    echo "<td>" . $row["emp_address_city"] . "</td>";
                                    echo "<td>" . $row["emp_address_province"] . "</td>";
                                    echo "<td>" . $row["emp_address_postal_code"] ."</td><tr>";
                                }
                                echo "</table><br>";
                            } 

                            $sql = "SELECT * FROM emp_dept
                            ORDER BY emp_id ASC;";
                            $result = mysqli_query($connect, $sql);
                            echo "<table>";
                            echo "<tr><th>Employee ID</th>";
                            echo "<th>Department ID</th></tr>";
                            if ($result) {
                                while($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr> <td>" . $row["emp_id"] . "</td>";
                                    echo "<td>" . $row["dept_id"] . "</td><tr>";
                                }
                                echo "</table><br>";
                            } 

                            $sql = "SELECT * FROM dept
                            ORDER BY dept_id ASC;";
                            $result = mysqli_query($connect, $sql);
                            
                            if ($result) {
                                echo "<table>";
                                echo "<tr><th>Department ID</th>";
                                echo "<th>Department Name</th></tr>";
                                while($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr> <td>" . $row["dept_id"] . "</td>";
                                    echo "<td>" . $row["dept_name"] . "</td><tr>";
                                }
                                echo "</table><br>";
                            } 

                            $sql = "SELECT * FROM emp_bank_account
                            ORDER BY emp_id ASC;";
                            $result = mysqli_query($connect, $sql);
                            echo "<table>";
                            echo "<tr><th>Employee ID</th>";
                            echo "<th>Account ID</th></tr>";
                            if ($result) {
                                while($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr> <td>" . $row["emp_id"] . "</td>";
                                    echo "<td>" . $row["account_id"] . "</td><tr>";
                                }
                                echo "</table><br>";
                            } 

                            $sql = "SELECT * FROM bank_account
                            ORDER BY account_id ASC;";
                            $result = mysqli_query($connect, $sql);
                            echo "<table>";
                            echo "<tr><th>Account ID</th>";
                            echo "<th>Transit No.</th>";
                            echo "<th>Institution No.</th>";
                            echo "<th>Account No.</th></tr>";
                            if ($result) {
                                while($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr> <td>" . $row["account_id"] . "</td>";
                                    echo "<td>" . $row["transit_number"] . "</td>";
                                    echo "<td>" . $row["institution_number"] . "</td>";
                                    echo "<td>" . $row["account_number"] . "</td>";
                                    echo "<td>" . $row["account_balance"] . "</td><tr>";
                                }
                                echo "</table><br>";
                            } 

                            $sql = "SELECT * FROM account_payment
                            ORDER BY account_id ASC;";
                            $result = mysqli_query($connect, $sql);
                            echo "<table>";
                            echo "<tr><th>Account ID</th>";
                            echo "<th>Payment ID</th></tr>";
                            if ($result) {
                                while($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr> <td>" . $row["account_id"] . "</td>";
                                    echo "<td>" . $row["payment_id"] . "</td><tr>";
                                }
                                echo "</table><br>";
                            } 

                            $sql = "SELECT * FROM payment
                            ORDER BY payment_id ASC;";
                            $result = mysqli_query($connect, $sql);
                            echo "<table>";
                            echo "<tr><th>Payment ID</th>";
                            echo "<th>Paystub Amount ($CAD)</th>";
                            echo "<th>Payment Date</th></tr>";
                            if ($result) {
                                while($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr> <td>" . $row["payment_id"] . "</td>";
                                    echo "<td>" . $row["pay_stub_amount"] . "</td>";
                                    echo "<td>" . $row["payment_date"] . "</td><tr>";
                                }
                                echo "</table><br>";
                            } 
                            

                            $sql = "SELECT * FROM emp_position
                            ORDER BY emp_id ASC;";
                            $result = mysqli_query($connect, $sql);
                            echo "<table>";
                            echo "<tr><th>Employee ID</th>";
                            echo "<th>Position ID</th>";
                            echo "<th>Start Date</th>";
                            echo "<th>End Date</th></tr>";
                            if ($result) {
                                while($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr> <td>" . $row["emp_id"] . "</td>";
                                    echo "<td>" . $row["position_id"] . "</td>";
                                    echo "<td>" . $row["position_start_date"] . "</td>";
                                    if ($row["position_end_date"] == "NULL") {
                                        echo "<td>None";
                                    } else {
                                        echo "<td>" . $row["position_end_date"];
                                    }
                                    echo "</td><tr>";
                                }
                                echo "</table><br>";
                            } 

                            $sql = "SELECT * FROM position_table
                            ORDER BY position_id ASC;";
                            $result = mysqli_query($connect, $sql);
                            
                            if ($result) {
                                echo "<table>";
                                echo "<tr><th>Position ID</th>";
                                echo "<th>Position Title</th>";
                                echo "<th>Full/Part Time</th>";
                                echo "<th>Permanent/Contractor</th></tr>";
                                while($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr> <td>" . $row["position_id"] . "</td>";
                                    echo "<td>" . $row["position_title"] . "</td>";
                                    echo "<td>" . $row["positiontype_a"] . "</td>";
                                    echo "<td>" . $row["positiontype_b"] . "</td><tr>";
                                }
                                echo "</table><br>";
                            } 

                            $sql = "SELECT * FROM emp_work_period
                            ORDER BY emp_id ASC;";
                            $result = mysqli_query($connect, $sql);
                            
                            if ($result) {
                                echo "<table>";
                                echo "<tr><th>Employee ID</th>";
                                echo "<th>Work Period Title</th></tr>";
                                while($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr> <td>" . $row["emp_id"] . "</td>";
                                    echo "<td>" . $row["work_period_id"] . "</td><tr>";
                                }
                                echo "</table><br>";
                            } 

                            $sql = "SELECT * FROM work_period
                            ORDER BY work_period_id ASC;";
                            $result = mysqli_query($connect, $sql);
                            
                            if ($result) {
                                echo "<table>";
                                echo "<tr><th>Work Period ID</th>";
                                echo "<th>Start Time</th>";
                                echo "<th>End Time</th></tr>";
                                while($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr> <td>" . $row["work_period_id"] . "</td>";
                                    echo "<td>" . $row["start_time"] . "</td>";
                                    echo "<td>" . $row["end_time"] . "</td><tr>";
                                }
                                echo "</table><br>";
                            } 
                        ?>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-sm-12" id="editor">
                                <form method = "post" action="">
                                    <textarea rows = "7" cols = "60" name = "query" id="query" spellcheck="false" autocorrect="off" autocapitalize="off">SELECT dept_id, COUNT(*) &#10;FROM emp_position, emp_dept, position_table &#10;WHERE emp_position.emp_id = emp_dept.emp_id &#10;AND position_table.position_id = emp_position.position_id &#10;AND position_table.position_title != 'Intern' &#10;GROUP BY dept_id;
                                    </textarea><br>
                                    <input type="submit" name="submit_query" value="Run query">
                                </form>
                            </div>     
                            <div class="col-sm-12" id="output">
                                <div>
                                <?php
                                if(isset($_POST['submit_query'])) {
                                    $query = $_POST['query'];
                                    $arr = explode(" ", $query);
                                    $fstword = array_shift($arr);
                                    if ($fstword == 'SELECT' || $fstword == 'select') {
                                        $query = preg_replace('/\s+/', ' ', $query);
                                        $result = mysqli_query($connect, $query);
                                        
                                        if ($result) {
                                            $x = 0; $columns = []; 
                                            echo "<table>";
                                            if (strcmp(trim($arr[1]),'*') !== 0) {
                                                foreach ($arr as $word) {
                                                    if (strcmp(trim($word),'FROM') == 0 || strcmp(trim($word),'from') == 0){
                                                        break;
                                                    } else {
                                                        preg_replace('/[,|;]?/', '', $word);
                                                        $columns[] = trim($word);
                                                    }
                                                }  
                                                echo "<tr>";
                                                foreach ($columns as $col) {
                                                    echo "<th>" . $col . "</th>";
                                                }
                                                echo "</tr>";
                                            } 
                                            $count = 0; 
                                            while($row = mysqli_fetch_array($result)) {
                                                echo "<tr>";
                                                foreach ($row as $item) {
                                                    if ($count % 2 == 0 ) {echo "<td>" . $item . "</td>";}
                                                    $count++;
                                                } 
                                                echo "</tr>";
                                            }
                                            echo "</table>";
                                            mysqli_free_result($result);
                                        } else {
                                            echo "Query could not be executed<br>" . mysqli_error($connect);
                                        }
                                        
                                    } else {
                                        echo "<p>Must be a query</p>";
                                    }
                                }
                                ?>
                                </div>
                            </div>
                            
                       </div>
                    </div>
                </div>
            </div>
        </main>
    </body>
    <style>
        input {
            cursor: pointer;
        }
        .container {
            width: 100%;
        }
        #tables {
            background-color: #d3eaf2;
            height: 500px;
            overflow-y: scroll;
            padding: 10px;
        }
        #output {
            background-color: #f3f5f6;
            height: 300px;
            overflow-y: scroll;
            padding: 10px;
        }
        /* form {
            width: 100%;
            padding: 0px;
            margin: 0px;
        } */
        textarea {
            background-color: #2A4895;
            color: white;
            width: 100%;
            height: 100%;
            font-family: 'Courier New', Courier, monospace;
            font-size: 14px;
        }
        #editor {
            height: 200px;
            width: 100%;
        }
        table {
            font-family: 'Courier New', Courier, monospace;
            border: 2px solid black;
            font-size: 14px;
            border-collapse: separate;
            border-spacing: 3px;
            background-color: white;
        }
        th {
            background: #2A4895;
            color: white;
            font-size: 14px;
            text-transform: uppercase;
        }
        tr{
            background: white;
        }
    </style>
</html>
