<!DOCTYPE html> 
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
            input {
                cursor: pointer;
            }
            .container {
                width: 100%;
            }
            #table_info {
                background-color: #f3f5f6;
                height: 75vh;
                padding: 10px;
                overflow-y: scroll;
            }
            #tables {
                background-color: #dadfec;
                height: 75vh;
                overflow-y: scroll;
                padding: 10px;
            }
            .title {
                display: inline-block;
            }
            .actions {
                display: inline-block;
                text-align: center;
            }
            .actions svg {
                margin: 4px;
            }
            table {
                font-family: 'Courier New', Courier, monospace;
                border: 2px solid black;
                font-size: 14px;
                border-collapse: separate;
                border-spacing: 3px;
                background-color: white;
                margin-bottom: 20px;
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
            h4 {
                text-transform: uppercase;
                font-weight: bold;
                color: #2A4895;
            }
            .buttons form {
                display: inline-block;
            }
            .edit {
                cursor: pointer;
            }
            .delete {
                cursor: pointer;
            }
        </style>
    </head>

    <body>
        <header>
            <div class="logo">
                <a class="button" href="index.html" style="text-decoration: none;"><h2>HR Payroll DBMS</h2></a>
            </div>
            <div class="profile">
                <h3>HR Coordinator</h3>
            </div>
        </header>
        <main>
            <br>
            <div class="buttons">
                <form action = "" method = "post">
                    <input type = "submit" value = "Populate values" name="populate" class="button" id="light">
                </form>
                <form action = "" method = "post">
                    <input type = "submit" value = "Delete values" name="delete" class="button" id="light">
                </form>
                <form action = "view_dba_query.php" method = "">
                    <input type = "submit" value = "Query tables" class="button" id="dark">
                </form>
                
                <?php
                    include ('dbconnect.php'); 
                    $sql = "SELECT * FROM emp;";
                    $result = mysqli_query($connect,$sql);
                    $numrows = mysqli_num_rows($result);
                    if(isset($_POST['delete'])){
                        if ($numrows > 0) { //if tables are populated
                            include ('delete_values.php');
                            echo "<meta http-equiv='refresh' content='0'>";
                        }
                    }
                    if(isset($_POST['populate'])){
                        if ($numrows == 0) { //if tables are empty
                            include ('populate.php');
                            echo "<meta http-equiv='refresh' content='0'>";
                        }
                    }
                ?>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-2" id="table_info">    
                        <h4>Tables</h4>
                        <?php
                            $sql = "SHOW TABLES;";
                            $result1 = mysqli_query($connect,$sql);
                            while($row = mysqli_fetch_array($result1)) {
                                echo '<h5>' . $row[0] . "</h5>";
                            }

                        ?>
                    </div>
                    <div class="col-sm-10" id="tables">
                        <?php
                            $sql = "SELECT * FROM emp
                            ORDER BY emp_id ASC;";
                            $result = mysqli_query($connect, $sql);
                            echo "<table>";
                            echo "<div class='title'>";
                            echo "<h4>emp</h4>";
                            echo '<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
                                <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z"/>
                                </svg></div>';
                            echo "<tr><th>Emp ID</th>";
                            echo "<th>First Name</th>";
                            echo "<th>Last Name</th>";
                            echo "<th>Email</th>";
                            echo "<th>Phone</th>";
                            echo "<th>Street No.</th>";
                            echo "<th>Street Name</th>";
                            echo "<th>City</th>";
                            echo "<th>Province</th>";
                            echo "<th>Postal Code</th>";
                            echo "<th>Actions</th></tr>";
                            if ($result) {
                                while($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr><td>" . $row["emp_id"] . "</td>";
                                    echo "<td>" . $row["emp_first_name"] . "</td>";
                                    echo "<td>" . $row["emp_last_name"] . "</td>";
                                    echo "<td>" . $row["emp_email"] . "</td>";
                                    echo "<td>" . $row["emp_phone"] . "</td>";
                                    echo "<td>" . $row["emp_address_street_number"] . "</td>";
                                    echo "<td>" . $row["emp_address_street_name"] . "</td>";
                                    echo "<td>" . $row["emp_address_city"] . "</td>";
                                    echo "<td>" . $row["emp_address_province"] . "</td>";
                                    echo "<td>" . $row["emp_address_postal_code"] ."</td>";
                                    echo '<td><div class="actions"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square edit" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                        </svg><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill delete" viewBox="0 0 16 16">
                                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                        </svg></div></td></tr>';
                                }
                                echo "</table>";
                            } 

                            $sql = "SELECT * FROM emp_dept
                            ORDER BY emp_id ASC;";
                            $result = mysqli_query($connect, $sql);
                            echo "<table>";
                            echo "<h4>emp_dept</h4>";
                            echo "<tr><th>Employee ID</th>";
                            echo "<th>Department ID</th>";
                            echo "<th>Actions</th></tr>";
                            if ($result) {
                                while($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr><td>" . $row["emp_id"] . "</td>";
                                    echo "<td>" . $row["dept_id"] . "</td>";
                                    echo '<td><div class="actions"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square edit" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                    </svg><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill delete" viewBox="0 0 16 16">
                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                    </svg></div></td></tr>';
                                }
                                echo "</table>";
                            } 

                            $sql = "SELECT * FROM dept
                            ORDER BY dept_id ASC;";
                            $result = mysqli_query($connect, $sql);
                            echo "<table>";
                            echo "<h4>dept</h4>";
                            echo "<tr><th>Department ID</th>";
                            echo "<th>Department Name</th>";
                            echo "<th>Actions</th></tr>";
                            if ($result) {
                                while($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr><td>" . $row["dept_id"] . "</td>";
                                    echo "<td>" . $row["dept_name"] . "</td>";
                                    echo '<td><div class="actions"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square edit" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                    </svg><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill delete" viewBox="0 0 16 16">
                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                    </svg></div></td></tr>';
                                }
                                echo "</table>";
                            } 

                            $sql = "SELECT * FROM emp_bank_account
                            ORDER BY emp_id ASC;";
                            $result = mysqli_query($connect, $sql);
                            echo "<table>";
                            echo "<h4>emp_bank_account</h4>";
                            echo "<tr><th>Employee ID</th>";
                            echo "<th>Account ID</th>";
                            echo "<th>Actions</th></tr>";
                            if ($result) {
                                while($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr><td>" . $row["emp_id"] . "</td>";
                                    echo "<td>" . $row["account_id"] . "</td>";
                                    echo '<td><div class="actions"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square edit" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                    </svg><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill delete" viewBox="0 0 16 16">
                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                    </svg></div></td></tr>';
                                }
                                echo "</table>";
                            } 

                            $sql = "SELECT * FROM bank_account
                            ORDER BY account_id ASC;";
                            $result = mysqli_query($connect, $sql);
                            echo "<table>";
                            echo "<h4>bank_account</h4>";
                            echo "<tr><th>Account ID</th>";
                            echo "<th>Transit No.</th>";
                            echo "<th>Institution No.</th>";
                            echo "<th>Account No.</th>";
                            echo "<th>Actions</th></tr>";
                            if ($result) {
                                while($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr><td>" . $row["account_id"] . "</td>";
                                    echo "<td>" . $row["transit_number"] . "</td>";
                                    echo "<td>" . $row["institution_number"] . "</td>";
                                    echo "<td>" . $row["account_number"] . "</td>";
                                    echo '<td><div class="actions"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square edit" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                    </svg><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill delete" viewBox="0 0 16 16">
                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                    </svg></div></td></tr>';
                                }
                                echo "</table>";
                            } 

                            $sql = "SELECT * FROM account_payment
                            ORDER BY account_id ASC;";
                            $result = mysqli_query($connect, $sql);
                            echo "<table>";
                            echo "<h4>account_payment</h4>";
                            echo "<tr><th>Account ID</th>";
                            echo "<th>Payment ID</th>";
                            echo "<th>Actions</th></tr>";
                            if ($result) {
                                while($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr><td>" . $row["account_id"] . "</td>";
                                    echo "<td>" . $row["payment_id"] . "</td>";
                                    echo '<td><div class="actions"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square edit" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                    </svg><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill delete" viewBox="0 0 16 16">
                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                    </svg></div></td></tr>';
                                }
                                echo "</table>";
                            } 

                            $sql = "SELECT * FROM payment
                            ORDER BY payment_id ASC;";
                            $result = mysqli_query($connect, $sql);
                            echo "<table>";
                            echo "<h4>payment</h4>";
                            echo "<tr><th>Payment ID</th>";
                            echo "<th>Paystub Amount</th>";
                            echo "<th>Payment Date</th>";
                            echo "<th>Actions</th></tr>";
                            if ($result) {
                                while($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr><td>" . $row["payment_id"] . "</td>";
                                    echo "<td>" . $row["pay_stub_amount"] . "</td>";
                                    echo "<td>" . $row["payment_date"] . "</td>";
                                    echo '<td><div class="actions"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square edit" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                    </svg><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill delete" viewBox="0 0 16 16">
                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                    </svg></div></td></tr>';
                                }
                                echo "</table>";
                            } 
                            
                            $sql = "SELECT * FROM emp_position
                            ORDER BY emp_id ASC;";
                            $result = mysqli_query($connect, $sql);
                            echo "<table>";
                            echo "<h4>emp_position</h4>";
                            echo "<tr><th>Employee ID</th>";
                            echo "<th>Position ID</th>";
                            echo "<th>Start Date</th>";
                            echo "<th>End Date</th>";
                            echo "<th>Actions</th></tr>";
                            if ($result) {
                                while($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr><td>" . $row["emp_id"] . "</td>";
                                    echo "<td>" . $row["position_id"] . "</td>";
                                    echo "<td>" . $row["position_start_date"] . "</td>";
                                    if ($row["position_end_date"] == "NULL") {
                                        echo "<td>None";
                                    } else {
                                        echo "<td>" . $row["position_end_date"];
                                    }
                                    echo "</td>";
                                    echo '<td><div class="actions"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square edit" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                    </svg><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill delete" viewBox="0 0 16 16">
                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                    </svg></div></td></tr>';
                                }
                                echo "</table>";
                            } 

                            $sql = "SELECT * FROM position_table
                            ORDER BY position_id ASC;";
                            $result = mysqli_query($connect, $sql);
                            echo "<table>";
                            echo "<h4>position_table</h4>";
                            echo "<tr><th>Position ID</th>";
                            echo "<th>Position Title</th>";
                            echo "<th>Full/Part Time</th>";
                            echo "<th>Permanent/Contractor</th>";
                            echo "<th>Actions</th></tr>";
                            if ($result) {
                                while($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr><td>" . $row["position_id"] . "</td>";
                                    echo "<td>" . $row["position_title"] . "</td>";
                                    echo "<td>" . $row["positiontype_a"] . "</td>";
                                    echo "<td>" . $row["positiontype_b"] . "</td>";
                                    echo '<td><div class="actions"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square edit" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                    </svg><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill delete" viewBox="0 0 16 16">
                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                    </svg></div></td></tr>';
                                }
                                echo "</table>";
                            } 

                            $sql = "SELECT * FROM emp_work_period
                            ORDER BY emp_id ASC;";
                            $result = mysqli_query($connect, $sql);
                            echo "<table>";
                            echo "<h4>emp_work_period</h4>";
                            echo "<tr><th>Employee ID</th>";
                            echo "<th>Work Period Title</th>";
                            echo "<th>Actions</th></tr>";
                            if ($result) {
                                while($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr><td>" . $row["emp_id"] . "</td>";
                                    echo "<td>" . $row["work_period_id"] . "</td>";
                                    echo '<td><div class="actions"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square edit" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                    </svg><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill delete" viewBox="0 0 16 16">
                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                    </svg></div></td></tr>';
                                }
                                echo "</table>";
                            } 

                            $sql = "SELECT * FROM work_period
                            ORDER BY work_period_id ASC;";
                            $result = mysqli_query($connect, $sql);
                            echo "<table>";
                            echo "<h4>work_period</h4>";
                            echo "<tr><th>Work Period ID</th>";
                            echo "<th>Start Time</th>";
                            echo "<th>End Time</th>";
                            echo "<th>Actions</th></tr>";
                            if ($result) {
                                while($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr><td>" . $row["work_period_id"] . "</td>";
                                    echo "<td>" . $row["start_time"] . "</td>";
                                    echo "<td>" . $row["end_time"] . "</td>";
                                    echo '<td><div class="actions"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square edit" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                    </svg><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill delete" viewBox="0 0 16 16">
                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                    </svg></div></td></tr>';
                                }
                                echo "</table>";
                            } 
                        ?>
                    </div>
                </div>
            </div>
        </main>
    </body>
</html>
