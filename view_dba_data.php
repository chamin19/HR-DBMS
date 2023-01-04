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
                height: 85vh;
                padding: 20px;
            }
            #tables {
                background-color: #dadfec;
                height: 85vh;
                overflow-y: scroll;
                padding: 20px;
            }
            .title div {
                display: inline-block;
            }
            .actions button {
                display: inline;
                text-align: center;
                padding: 6;
                border: none;
                background: none;
            }
            .buttons form {
                display: inline-block;
            }
            .edit, .delete {
                cursor: pointer;
            }
            .data_table table {
                font-family: 'Courier New', Courier, monospace;
                border: 2px solid black;
                font-size: 14px;
                border-collapse: separate;
                border-spacing: 0px;
                background-color: white;
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
            .data_table td {
                background-color: white;
            }
            .data_table tr:hover {background-color: #ddd;}
            .data_table td, th {
                border: 1px solid #ddd;
                padding: 5px;

            }
            .logo {
                position: absolute;
                left: 20px;
                top: 20px;
            }
            body {
                overflow: hidden;
            }
            h2 {
                color: #2A4895;
                text-transform: uppercase;
                font-size: 20px;
                font-weight: 700;
            }
            h4 {
                text-transform: uppercase;
                font-weight: bold;
                color: #2A4895;
            }
        </style>
    </head>
    <body>
        <a class="button logo" href="index.html" style="text-decoration: none;"><h2>HR Payroll DBMS</h2></a>
        <div class="container header">
            <div class="row">
                <div class="col-sm-3" style="text-align: left">  
                    <br><br><br><h3 style="font-size: 16px; padding-left: 27px;">HR Coordinator View</h3>
                </div>
                <div class="col-sm-9 buttons">
                    <br>
                    <form action = "" method = "post">
                        <input type = "submit" value = "Populate values" name="populate" class="button" id="light">
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
            </div>
        </div>
        <div class="container">
            <div class="row header">
                <div class="col-sm-2" id="table_info">    
                    <h4>Tables</h4>
                    <a href="#emp_table"><p>emp</p></a>
                    <a href="#emp_dept_table"><p>emp_dept</p></a>
                    <a href="#dept_table"><p>dept</p></a>
                    <a href="#emp_bank_account_table"><p>emp_bank_account</p></a>
                    <a href="#bank_account_table"><p>bank_account</p></a>
                    <a href="#account_payment_table"><p>account_payment</p></a>
                    <a href="#payment_table"><p>payment</p></a>
                    <a href="#emp_position_table"><p>emp_position</p></a>
                    <a href="#position_table"><p>position_table</p></a>
                    <a href="#emp_work_period_table"><p>emp_work_period</p></a>
                    <a href="#work_period_table"><p>work_period</p></a>
                </div>
                <div class="col-sm-10" id="tables">
                    <?php
                        $sql = "SELECT * FROM emp
                        ORDER BY emp_id ASC;";
                        $result = mysqli_query($connect, $sql);
                    ?>
                        <table class="data_table">
                            <div class="title">
                                <div class="name"><h4 id="emp_table">emp</h4></div>
                                <div style="margin-left: 830px;"><svg data-toggle="modal" data-target="#work_period_add" style="cursor:pointer" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/></svg>
                                </div>
                            </div>
                            <tr><th>Emp ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Street No.</th>
                            <th>Street Name</th>
                            <th>City</th>
                            <th>Province</th>
                            <th>Postal Code</th>
                            <th>Actions</th></tr>
                        <?php
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
                                echo '<td><div class="actions">
                                    <form method="post">
                                        <button type="submit" name="emp_edit" data-toggle="modal" data-target="#emp_modal" value="' . $row["emp_id"] . '">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square edit" viewBox="0 0 16 16"><path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/></svg>
                                        </button>

                                        <button type="submit" name="emp_delete" value="' . $row["emp_id"] . '">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill delete" viewBox="0 0 16 16">
                                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/></svg>
                                        </button>
                                    <form>
                                    </div></td></tr>';
                            }
                            echo '</table><br>';
                        } 
                        if (isset($_POST['emp_edit'])) { //if edit button is selected
                            $id_chosen = $_POST['emp_edit']; 
                            $sql_get_edit = "SELECT * from emp WHERE emp_id = $id_chosen";
                            $result_edit = mysqli_query($connect, $sql_get_edit);
                            $row = mysqli_fetch_assoc($result_edit);
                            ?>
                                <script>
                                $(function() {
                                    $('#emp_modal').modal('show');
                                });
                            </script>
                            <?php
                        } 
                        if (isset($_POST['emp_apply'])){ //if submit button in modal is selected
                            $emp_id = $_POST['emp_id_edit'];
                            $new_fn = $_POST['fn_edit'];
                            $new_ln = $_POST['ln_edit'];
                            $new_email = $_POST['email_edit'];
                            $new_phone = $_POST['phone_edit'];
                            $new_sno = $_POST['sno_edit'];
                            $new_sname = $_POST['sname_edit'];
                            $new_city = $_POST['city_edit'];
                            $new_province = $_POST['province_edit'];
                            $new_pc = $_POST['pc_edit'];
                            $edit_emp = 'UPDATE emp SET 
                                emp_first_name = "' . $new_fn . '",
                                emp_last_name = "' . $new_ln . '",
                                emp_email = "' . $new_email  . '",
                                emp_phone = "' . $new_phone . '",
                                emp_address_street_number = '. $new_sno . ',
                                emp_address_street_name = "' .$new_sname . '",
                                emp_address_city = "' .$new_city . '",
                                emp_address_province = "' .$new_province . '",
                                emp_address_postal_code = "' .$new_pc . '"
                                WHERE emp_id =' . $emp_id . '';
                            $result = mysqli_query($connect, $edit_emp);
                            if ($result) {
                                echo "<meta http-equiv='refresh' content='0'>";
                            } else {
                                ?>
                                    <script>alert("<?php echo 'Error updating record: ' . mysqli_error($connect)?> ")</script>
                                <?php 
                            }
                        }
                        if (isset($_POST['emp_delete'])) { // if delete button is selected
                            $id_chosen = $_POST['emp_delete']; 
                            $sql_delete = "DELETE FROM emp where emp_id =". $id_chosen;
                            $result = mysqli_query($connect, $sql_delete);
                            echo "<meta http-equiv='refresh' content='0'>";
                        }

                        $sql = "SELECT * FROM emp_dept
                        ORDER BY emp_id ASC;";
                        $result = mysqli_query($connect, $sql);
                        ?>
                        <table class='data_table'>
                            <div class="title">
                                <div class="name"><h4 id='emp_dept_table'>emp_dept</h4></div>
                                <div style="margin-left: 140px;"><svg data-toggle="modal" data-target="#emp_dept_add" style="cursor:pointer" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/></svg>
                                </div>
                            </div>
                            
                            <tr><th>Employee ID</th>
                            <th>Department ID</th>
                            <th>Actions</th></tr>
                        <?php
                        if ($result) {
                            while($row = mysqli_fetch_assoc($result)) {
                                echo "<tr><td>" . $row["emp_id"] . "</td>";
                                echo "<td>" . $row["dept_id"] . "</td>";
                                echo '<td><div class="actions">
                                    <form method="post">
                                        <button type="submit" name="emp_dept_edit" data-toggle="modal" data-target="#emp_dept_modal" value="' . $row["emp_id"] . '">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square edit" viewBox="0 0 16 16"><path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/></svg>
                                        </button>

                                        <button type="submit" name="emp_dept_delete" value="' . $row["emp_id"] . '">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill delete" viewBox="0 0 16 16">
                                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/></svg>
                                        </button>
                                    <form>
                                    </div></td></tr>';
                            }
                            echo '</table><br>';
                        } 
                        if (isset($_POST['emp_dept_edit'])) { //if edit button is selected
                            $id_chosen = $_POST['emp_dept_edit']; 
                            $sql_get_edit = "SELECT * from emp_dept WHERE emp_id = $id_chosen";
                            $result_edit = mysqli_query($connect, $sql_get_edit);
                            $row = mysqli_fetch_assoc($result_edit);
                        ?>
                                <script>
                                $(function() {
                                    $('#emp_dept_modal').modal('show');
                                });
                            </script>
                             <?php
                        }
                        if (isset($_POST['emp_dept_apply'])){ //if submit button in modal is selected
                            $emp_id = $_POST['emp_id_edit'];
                            $new_dept_id = $_POST['dept_id_edit'];
                            $edit_emp_dept = 'UPDATE emp_dept SET
                                            dept_id = ' . $new_dept_id .'
                                            WHERE emp_id = ' . $emp_id;
                            $result = mysqli_query($connect, $edit_emp_dept);
                            if ($result) {
                                echo "<meta http-equiv='refresh' content='0'>";
                            } else {
                                ?>
                                    <script>alert("<?php echo 'Error updating record: ' . mysqli_error($connect)?> ")</script>
                                <?php 
                            }
                        }
                        if (isset($_POST['emp_dept_delete'])) { // if delete button is selected
                            $id_chosen = $_POST['emp_dept_delete']; 
                            $sql_delete = "DELETE FROM emp_dept where emp_id =". $id_chosen;
                            $result = mysqli_query($connect, $sql_delete);
                            echo "<meta http-equiv='refresh' content='0'>";
                        }

                        $sql = "SELECT * FROM dept
                        ORDER BY dept_id ASC;";
                        $result = mysqli_query($connect, $sql);
                        ?>
                        
                        <table class='data_table'>
                            <div class="title">
                                <div class="name"><h4 id='dept_table'>dept</h4></div>
                                <div style="margin-left: 285px;"><svg data-toggle="modal" data-target="#dept_add" style="cursor:pointer" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/></svg>
                                </div>
                            </div>
                            <tr><th>Department ID</th>
                            <th>Department Name</th>
                            <th>Actions</th></tr>
                        <?php
                        if ($result) {
                            while($row = mysqli_fetch_assoc($result)) {
                                echo "<tr><td>" . $row["dept_id"] . "</td>";
                                echo "<td>" . $row["dept_name"] . "</td>";
                                echo '<td><div class="actions">
                                    <form method="post">
                                        <button type="submit" name="dept_edit" data-toggle="modal" data-target="#dept_modal" value="' . $row["dept_id"] . '">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square edit" viewBox="0 0 16 16"><path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/></svg>
                                        </button>

                                        <button type="submit" name="dept_delete" value="' . $row["dept_id"] . '">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill delete" viewBox="0 0 16 16">
                                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/></svg>
                                        </button>
                                    <form>
                                    </div></td></tr>';
                            }
                            echo '</table><br>';
                        } 
                        if (isset($_POST['dept_edit'])) {
                            $id_chosen = $_POST['dept_edit']; 
                            $sql_get_edit = "SELECT * from dept WHERE dept_id = $id_chosen";
                            $result_edit = mysqli_query($connect, $sql_get_edit);
                            $row = mysqli_fetch_assoc($result_edit);
                        ?>
                                <script>
                                $(function() {
                                    $('#dept_modal').modal('show');
                                });
                            </script>
                            <?php
                        }

                        if (isset($_POST['dept_apply'])){
                            $dept_id = $_POST['dept_id_edit'];
                            $new_dept_name = $_POST['dept_name_edit'];
                            $edit_dept = 'UPDATE dept SET dept_name = "' . $new_dept_name . '"
                                WHERE dept_id = ' . $dept_id;
                            $result = mysqli_query($connect, $edit_dept);
                            if ($result) {
                                echo "<meta http-equiv='refresh' content='0'>";
                            } else {
                                ?>
                                    <script>alert("<?php echo 'Error updating record: ' . mysqli_error($connect)?> ")</script>
                                <?php 
                            }
                        }
                        if (isset($_POST['dept_delete'])) { // if delete button is selected
                            $id_chosen = $_POST['dept_delete']; 
                            $sql_delete = "DELETE FROM dept where dept_id =". $id_chosen;
                            $result = mysqli_query($connect, $sql_delete);
                            $sql_delete = "DELETE FROM emp_dept WHERE dept_id =". $id_chosen;
                            $result = mysqli_query($connect, $sql_delete);
                            echo "<meta http-equiv='refresh' content='0'>";
                        }

                        $sql = "SELECT * FROM emp_bank_account
                        ORDER BY emp_id ASC;";
                        $result = mysqli_query($connect, $sql);
                        ?>
                        <table class='data_table'>
                            <div class="title">
                                <div class="name"> <h4 id='emp_bank_account_table'>emp_bank_account</h4></div>
                                <div><svg data-toggle="modal" data-target="#emp_bank_account_add" style="cursor:pointer" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/></svg>
                                </div>
                            </div>
                            <tr><th>Employee ID</th>
                            <th>Account ID</th>
                            <th>Actions</th></tr>

                        <?php
                        if ($result) {
                            while($row = mysqli_fetch_assoc($result)) {
                                echo "<tr><td>" . $row["emp_id"] . "</td>";
                                echo "<td>" . $row["account_id"] . "</td>";
                                echo '<td><div class="actions">
                                    <form method="post">
                                        <button type="submit" name="emp_bank_account_delete" value="' . $row["emp_id"] . '">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill delete" viewBox="0 0 16 16">
                                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/></svg>
                                        </button>
                                    <form>
                                    </div></td></tr>';
                            }
                            echo "</table><br>";
                        } 
                        if (isset($_POST['emp_bank_account_delete'])) { // if delete button is selected
                            $id_chosen = $_POST['emp_bank_account_delete']; 
                            $sql_delete = "DELETE FROM emp_bank_account where emp_id =". $id_chosen;
                            $result = mysqli_query($connect, $sql_delete);
                            echo "<meta http-equiv='refresh' content='0'>";
                        }


                        $sql = "SELECT * FROM bank_account
                        ORDER BY account_id ASC;";                           
                        $result = mysqli_query($connect, $sql);
                        ?>
                        <table class='data_table'>
                            <div class="title">
                                <div class="name"><h4 id='bank_account_table'>bank_account</h4></div>
                                <div style="margin-left: 240px;"><svg data-toggle="modal" data-target="#bank_account_add" style="cursor:pointer" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/></svg>
                                </div>
                            </div>
                            
                            <tr><th>Account ID</th>
                            <th>Transit No.</th>
                            <th>Institution No.</th>
                            <th>Account No.</th>
                            <th>Actions</th></tr>
                        <?php
                        if ($result) {
                            while($row = mysqli_fetch_assoc($result)) {
                                echo "<tr><td>" . $row["account_id"] . "</td>";
                                echo "<td>" . $row["transit_number"] . "</td>";
                                echo "<td>" . $row["institution_number"] . "</td>";
                                echo "<td>" . $row["account_number"] . "</td>";
                                echo '<td><div class="actions">
                                <form method="post">
                                    <button type="submit" name="bank_account_edit" data-toggle="modal" data-target="#bank_account_modal" value="' . $row["account_id"] . '">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square edit" viewBox="0 0 16 16"><path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/></svg>
                                    </button>

                                    <button type="submit" name="bank_account_delete" value="' . $row["account_id"] . '">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill delete" viewBox="0 0 16 16">
                                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/></svg>
                                    </button>
                                <form>
                                </div></td></tr>';
                            }
                            echo "</table><br>";
                        } 
                        if (isset($_POST['bank_account_edit'])) {
                            $id_chosen = $_POST['bank_account_edit']; 
                            $sql_get_edit = "SELECT * from bank_account WHERE account_id = $id_chosen";
                            $result_edit = mysqli_query($connect, $sql_get_edit);
                            $row = mysqli_fetch_assoc($result_edit);
                        ?>
                                <script>
                                $(function() {
                                    $('#bank_account_modal').modal('show');
                                });
                            </script>
                            <?php
                        }
                        if (isset($_POST['bank_apply'])){
                            $acc_id = $_POST['account_id_edit'];
                            $new_tran_number = $_POST['tran_number_edit'];
                            $new_inst_number = $_POST['inst_number_edit'];
                            $new_acc_number = $_POST['acc_number_edit'];
                            $edit_bank = 'UPDATE bank_account SET 
                                transit_number = ' . $new_tran_number .', 
                                institution_number = ' . $new_inst_number .', 
                                account_number = ' . $new_acc_number .'
                                WHERE account_id = ' . $acc_id;
                            $result = mysqli_query($connect, $edit_bank);
                            if ($result) {
                                echo "<meta http-equiv='refresh' content='0'>";
                            } else {
                                ?>
                                    <script>alert("<?php echo 'Error updating record: ' . mysqli_error($connect)?> ")</script>
                                <?php 
                            }
                        }
                        if (isset($_POST['bank_account_delete'])) { // if delete button is selected
                            $id_chosen = $_POST['bank_account_delete']; 
                            $sql_delete = "DELETE FROM bank_account where account_id =". $id_chosen;
                            $result = mysqli_query($connect, $sql_delete);
                            $sql_delete = "DELETE FROM emp_bank_account where account_id =". $id_chosen;
                            $result = mysqli_query($connect, $sql_delete);
                            echo "<meta http-equiv='refresh' content='0'>";
                        }


                        $sql = "SELECT * FROM account_payment
                        ORDER BY account_id ASC;";
                        $result = mysqli_query($connect, $sql);
                        ?>
                        <table class='data_table'>
                            <div class="title">
                                <div class="name"><h4 id='account_payment_table'>account_payment</h4></div>
                                <div style="margin-left: 10px;"><svg data-toggle="modal" data-target="#account_payment_add" style="cursor:pointer" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/></svg>
                                </div>
                            </div>
                            <tr><th>Account ID</th>
                            <th>Payment ID</th>
                            <th>Actions</th></tr>
                        <?php
                        if ($result) {
                            while($row = mysqli_fetch_assoc($result)) {
                                echo "<tr><td>" . $row["account_id"] . "</td>";
                                echo "<td>" . $row["payment_id"] . "</td>";
                                echo '<td><div class="actions">
                                <form method="post">
                                    <button type="submit" name="account_payment_delete" value="' . $row["account_id"] . '">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill delete" viewBox="0 0 16 16">
                                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/></svg>
                                    </button>
                                <form>
                                </div></td></tr>';
                            }
                            echo "</table><br>";
                        } 
                        if (isset($_POST['account_payment_delete'])) { // if delete button is selected
                            $id_chosen = $_POST['account_payment_delete']; 
                            $sql_delete = "DELETE FROM account_payment where account_id =". $id_chosen;
                            $result = mysqli_query($connect, $sql_delete);
                            echo "<meta http-equiv='refresh' content='0'>";
                        }

                        $sql = "SELECT * FROM payment
                        ORDER BY payment_id ASC;";
                        $result = mysqli_query($connect, $sql);
                        ?>
                        <table class='data_table'>
                            <div class="title">
                                <div class="name"><h4 id='payment_table'>payment</h4></div>
                                <div style="margin-left: 245px;"><svg data-toggle="modal" data-target="#payment_add" style="cursor:pointer" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/></svg>
                                </div>
                            </div>  
                            <tr><th>Payment ID</th>
                            <th>Paystub Amount</th>
                            <th>Payment Date</th>
                            <th>Actions</th></tr>
                        <?php
                        if ($result) {
                            while($row = mysqli_fetch_assoc($result)) {
                                echo "<tr><td>" . $row["payment_id"] . "</td>";
                                echo "<td>" . $row["pay_stub_amount"] . "</td>";
                                echo "<td>" . $row["payment_date"] . "</td>";
                                echo '<td><div class="actions">
                                <form method="post">
                                    <button type="submit" name="payment_delete" value="' . $row["payment_id"] . '">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill delete" viewBox="0 0 16 16">
                                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/></svg>
                                    </button>
                                <form>
                                </div></td></tr>';
                            }
                            echo "</table><br>";
                        } 
                        if (isset($_POST['payment_delete'])) { // if delete button is selected
                            $id_chosen = $_POST['payment_delete']; 
                            $sql_delete = "DELETE FROM payment where payment_id =". $id_chosen;
                            $result = mysqli_query($connect, $sql_delete);
                            $sql_delete = "DELETE FROM account_payment where payment_id =". $id_chosen;
                            $result = mysqli_query($connect, $sql_delete);
                            echo "<meta http-equiv='refresh' content='0'>";
                        }
                        
                        $sql = "SELECT * FROM emp_position
                        ORDER BY emp_id ASC;";
                        $result = mysqli_query($connect, $sql);
                        ?>
                        <table class='data_table'>
                            <div class="title">
                                <div class="name"><h4 id='emp_position_table'>emp_position</h4></div>
                                <div style="margin-left: 230px;"><svg data-toggle="modal" data-target="#emp_position_add" style="cursor:pointer" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/></svg>
                                </div>
                            </div> 
                            <tr><th>Employee ID</th>
                            <th>Position ID</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Actions</th></tr>
                        <?php
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
                                echo '<td><div class="actions">
                                <form method="post">
                                    <button type="submit" name="emp_position_edit" data-toggle="modal" data-target="#emp_position_modal" value="' . $row["emp_id"] . '">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square edit" viewBox="0 0 16 16"><path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/></svg>
                                    </button>

                                    <button type="submit" name="emp_position_delete" value="' . $row["emp_id"] . '">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill delete" viewBox="0 0 16 16">
                                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/></svg>
                                    </button>
                                <form>
                                </div></td></tr>';
                            }
                            echo "</table><br>";
                        } 
                        if (isset($_POST['emp_position_edit'])) {
                            $id_chosen = $_POST['emp_position_edit']; 
                            $sql_get_edit = "SELECT * from emp_position WHERE emp_id = $id_chosen";
                            $result_edit = mysqli_query($connect, $sql_get_edit);
                            $row = mysqli_fetch_assoc($result_edit);
                        ?>
                                <script>
                                $(function() {
                                    $('#emp_position_modal').modal('show');
                                });
                            </script>
                            <?php
                        }
                        if (isset($_POST['emp_position_apply'])){
                            $emp_id = $_POST['emp_id_edit'];
                            $emp_position_id = $_POST['position_id_edit'];
                            $new_start_date = $_POST['start_date_edit'];
                            $new_end_date = $_POST['end_date_edit'];
                            $edit_emp_position = 'UPDATE emp_position SET 
                                position_id = ' . $emp_position_id .', 
                                position_start_date = "' . $new_start_date .'",
                                position_end_date = "' . $new_end_date .'"
                                WHERE emp_id = ' . $emp_id;
                            $result = mysqli_query($connect, $edit_emp_position);
                            if ($result) {
                                echo "<meta http-equiv='refresh' content='0'>";
                            } else {
                                ?>
                                    <script>alert("<?php echo 'Error updating record: ' . mysqli_error($connect)?> ")</script>
                                <?php 
                            }
                        }
                        if (isset($_POST['emp_position_delete'])) { // if delete button is selected
                            $id_chosen = $_POST['emp_position_delete']; 
                            $sql_delete = "DELETE FROM emp_position where emp_id =". $id_chosen;
                            $result = mysqli_query($connect, $sql_delete);
                            echo "<meta http-equiv='refresh' content='0'>";
                        }


                        $sql = "SELECT * FROM position_table
                        ORDER BY position_id ASC;";
                        $result = mysqli_query($connect, $sql);
                        ?>
                        <table class='data_table'>
                            <div class="title">
                                <div class="name"><h4 id='position_table'>position_table</h4></div>
                                <div style="margin-left: 360px;"><svg data-toggle="modal" data-target="#position_add" style="cursor:pointer" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/></svg>
                                </div>
                            </div> 
                            <tr><th>Position ID</th>
                            <th>Position Title</th>
                            <th>Full/Part Time</th>
                            <th>Permanent/Contractor</th>
                            <th>Actions</th></tr>
                        <?php
                        if ($result) {
                            while($row = mysqli_fetch_assoc($result)) {
                                echo "<tr><td>" . $row["position_id"] . "</td>";
                                echo "<td>" . $row["position_title"] . "</td>";
                                echo "<td>" . $row["positiontype_a"] . "</td>";
                                echo "<td>" . $row["positiontype_b"] . "</td>";
                                echo '<td><div class="actions">
                                <form method="post">
                                    <button type="submit" name="position_table_edit" data-toggle="modal" data-target="#position_table_modal" value="' . $row["position_id"] . '">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square edit" viewBox="0 0 16 16"><path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/></svg>
                                    </button>

                                    <button type="submit" name="position_table_delete" value="' . $row["position_id"] . '">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill delete" viewBox="0 0 16 16">
                                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/></svg>
                                    </button>
                                <form>
                                </div></td></tr>';
                            }
                            echo "</table><br>";
                        } 
                        if (isset($_POST['position_table_edit'])) {
                            $id_chosen = $_POST['position_table_edit']; 
                            $sql_get_edit = "SELECT * from position_table WHERE emp_id = $id_chosen";
                            $result_edit = mysqli_query($connect, $sql_get_edit);
                            $row = mysqli_fetch_assoc($result_edit);
                        ?>
                                <script>
                                $(function() {
                                    $('#position_table_modal').modal('show');
                                });
                            </script>
                            <?php
                        }
                        if (isset($_POST['position_table_apply'])){
                            $position_id = $_POST['position_id_edit'];
                            $new_position_title = $_POST['position_title_edit'];
                            $new_positiontype_a = $_POST['positiontype_a_edit'];
                            $new_positiontype_b = $_POST['positiontype_b_edit'];
                            $edit_position_table = 'UPDATE position_table SET 
                                position_title = "' . $new_position_title .'",
                                positiontype_a = "' . $new_positiontype_a .'",
                                positiontype_b = "' . $new_positiontype_b .'"
                                WHERE position_id = $position_id';
                            $result = mysqli_query($connect, $edit_position_table);
                            if ($result) {
                                echo "<meta http-equiv='refresh' content='0'>";
                            } else {
                                ?>
                                    <script>alert("<?php echo 'Error updating record: ' . mysqli_error($connect)?> ")</script>
                                <?php 
                            }
                        }
                        if (isset($_POST['position_table_delete'])) { // if delete button is selected
                            $id_chosen = $_POST['position_table_delete']; 
                            $sql_delete = "DELETE FROM position_table where position_id =". $id_chosen;
                            $result = mysqli_query($connect, $sql_delete);
                            echo "<meta http-equiv='refresh' content='0'>";
                        }

                        $sql = "SELECT * FROM emp_work_period
                        ORDER BY emp_id ASC;";
                        $result = mysqli_query($connect, $sql);
                        ?>
                        <table class='data_table'>
                            <div class="title">
                                <div class="name"><h4 id='emp_work_period_table'>emp_work_period</h4></div>
                                <div><svg data-toggle="modal" data-target="#emp_work_period_add" style="cursor:pointer" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/></svg>
                                </div>
                            </div> 
                            <tr><th>Employee ID</th>
                            <th>Work Period ID</th></tr>
                        <?php
                        if ($result) {
                            while($row = mysqli_fetch_assoc($result)) {
                                echo "<tr><td>" . $row["emp_id"] . "</td>";
                                echo "<td>" . $row["work_period_id"] . "</td>";
                            }
                            echo "</table><br>";
                        } 


                        $sql = "SELECT * FROM work_period
                        ORDER BY work_period_id ASC;";
                        $result = mysqli_query($connect, $sql);
                        ?>
                        <table class='data_table'>
                            <div class="title">
                                <div class="name"><h4 id='work_period_table'>work_period</h4></div>
                                <div style="margin-left: 230px;"><svg data-toggle="modal" data-target="#work_period_add" style="cursor:pointer" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/></svg>
                                </div>
                            </div>
                            <tr><th>Work Period ID</th>
                            <th>Start Time</th>
                            <th>End Time</th></tr>
                        <?php
                        if ($result) {
                            while($row = mysqli_fetch_assoc($result)) {
                                echo "<tr><td>" . $row["work_period_id"] . "</td>";
                                echo "<td>" . $row["start_time"] . "</td>";
                                echo "<td>" . $row["end_time"] . "</td>";
                            }
                            echo "</table><br>";
                        } 
                    ?>


                    <!-- Edit Modals  -->
                    <div class="all_edit_modals">
                        <div class="modal fade" id="emp_modal" tabindex="-1" role="dialog" aria-labelledby="emp_modalTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-body p-4 py-5 p-md-5">
                                        <h3 class="text-center mb-3">Make changes to information ID for employee <?php echo $row["emp_id"]?></h3>
                                        <form action="" class="signup-form" method="post">
                                            <div class="form-group mb-2">
                                                <input type="hidden" name="emp_id_edit" class="form-control" value="<?php echo $row["emp_id"]?>">
                                            </div>
                                            <div class="form-group mb-2">
                                                <label for="fn">First Name</label>
                                                <input type="text" name="fn_edit" class="form-control" value="<?php echo $row["emp_first_name"]?>">
                                            </div>
                                            <div class="form-group mb-2">
                                                <label for="ln">Last Name</label>
                                                <input type="text" name="ln_edit" class="form-control" value="<?php echo $row['emp_last_name']?>">
                                            </div>
                                            <div class="form-group mb-2">
                                                <label for="email">Email</label>
                                                <input type="text" name="email_edit" class="form-control" value="<?php echo $row["emp_email"]?>">
                                            </div>
                                            <div class="form-group mb-2">
                                                <label for="phone">Phone</label>
                                                <input type="text" name="phone_edit" class="form-control" value="<?php echo $row["emp_phone"]?>">
                                            </div>
                                            <div class="form-group mb-2">
                                                <label for="sno">Street Number</label>
                                                <input type="text" name="sno_edit" class="form-control" value="<?php echo $row["emp_address_street_number"]?>">
                                            </div>
                                            <div class="form-group mb-2">
                                                <label for="sname">Street Name</label>
                                                <input type="text" name="sname_edit" class="form-control" value="<?php echo $row["emp_address_street_name"]?>">
                                            </div>
                                            <div class="form-group mb-2">
                                                <label for="city">City</label>
                                                <input type="text" name="city_edit" class="form-control" value="<?php echo $row["emp_address_city"]?>">
                                            </div>
                                            <div class="form-group mb-2">
                                                <label for="province">Province</label>
                                                <input type="text" name="province_edit" class="form-control" value="<?php echo $row["emp_address_province"]?>">
                                            </div>
                                            <div class="form-group mb-2">
                                                <label for="pc">Postal Code</label>
                                                <input type="text" name="pc_edit" class="form-control" value="<?php echo $row["emp_address_postal_code"]?>">
                                            </div>
                                            <div class="form-group mb-2">
                                                <br><input type="submit" name="emp_apply" value="Apply changes" class="form-control btn btn-primary rounded submit px-3">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="modal fade" id="emp_dept_modal" tabindex="-1" role="dialog" aria-labelledby="emp_dept_modalTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-body p-4 py-5 p-md-5">
                                        <h3 class="text-center mb-3">Make changes to Dept ID for employee <?php echo $row["emp_id"]?></h3>
                                        <form action="" class="signup-form" method="post">
                                            <div class="form-group mb-2">
                                                <input type="hidden" name="emp_id_edit" class="form-control" value="<?php echo $row["emp_id"]?>">
                                            </div>
                                            <div class="form-group mb-2">
                                                <label for="fn">Department ID</label>
                                                <input type="text" name="dept_id_edit" class="form-control" value="<?php echo $row["dept_id"]?>">
                                            </div>
                                            <div class="form-group mb-2">
                                                <br><input type="submit" name="emp_dept_apply" value="Apply changes" class="form-control btn btn-primary rounded submit px-3">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="dept_modal" tabindex="-1" role="dialog" aria-labelledby="dept_modalTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-body p-4 py-5 p-md-5">
                                        <h3 class="text-center mb-3">Make changes to department <?php echo $row["dept_id"]?></h3>
                                        <form action="" class="signup-form" method="post">
                                            <div class="form-group mb-2">
                                                <input type="hidden" name="dept_id_edit" class="form-control" value="<?php echo $row["dept_id"]?>">
                                            </div>
                                            <div class="form-group mb-2">
                                                <label for="fn">Department Name</label>
                                                <input type="text" name="dept_name_edit" class="form-control" value="<?php echo $row["dept_name"]?>">
                                            </div>
                                            <div class="form-group mb-2">
                                                <br><input type="submit" name="dept_apply" value="Apply changes" class="form-control btn btn-primary rounded submit px-3">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="bank_account_modal" tabindex="-1" role="dialog" aria-labelledby="bank_account_modalTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-body p-4 py-5 p-md-5">
                                        <h3 class="text-center mb-3">Make changes to account <?php echo $row["account_id"]?></h3>
                                        <form action="" class="signup-form" method="post">
                                            <div class="form-group mb-2">
                                                <input type="hidden" name="account_id_edit" class="form-control" value="<?php echo $row["account_id"]?>">
                                            </div>
                                            <div class="form-group mb-2">
                                                <label for="fn">Transit Number</label>
                                                <input type="text" name="tran_number_edit" class="form-control" value="<?php echo $row["transit_number"]?>">
                                            </div>
                                            <div class="form-group mb-2">
                                                <label for="fn">Institution Number</label>
                                                <input type="text" name="inst_number_edit" class="form-control" value="<?php echo $row["institution_number"]?>">
                                            </div>
                                            <div class="form-group mb-2">
                                                <label for="fn">Account Number</label>
                                                <input type="text" name="acc_number_edit" class="form-control" value="<?php echo $row["account_number"]?>">
                                            </div>
                                            <div class="form-group mb-2">
                                                <br><input type="submit" name="bank_apply" value="Apply changes" class="form-control btn btn-primary rounded submit px-3">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="emp_position_modal" tabindex="-1" role="dialog" aria-labelledby="emp_position_modalTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-body p-4 py-5 p-md-5">
                                        <h3 class="text-center mb-3">Make changes to position of employee <?php echo $row["emp_id"]?></h3>
                                        <form action="" class="signup-form" method="post">
                                            <div class="form-group mb-2">
                                                <input type="hidden" name="emp_id_edit" class="form-control" value="<?php echo $row["emp_id"]?>">
                                            </div>
                                            <div class="form-group mb-2">
                                                <label for="fn">Position ID</label>
                                                <input type="text" name="position_id_edit" class="form-control" value="<?php echo $row["position_id"]?>">
                                            </div>
                                            <div class="form-group mb-2">
                                                <label for="fn">Start Date</label>
                                                <input type="text" name="start_date_edit" class="form-control" value="<?php echo $row["position_start_date"]?>">
                                            </div>
                                            <div class="form-group mb-2">
                                                <label for="fn">End Date</label>
                                                <input type="text" name="end_date_edit" class="form-control" value="<?php echo $row["position_end_date"]?>">
                                            </div>
                                            <div class="form-group mb-2">
                                                <br><input type="submit" name="emp_position_apply" value="Apply changes" class="form-control btn btn-primary rounded submit px-3">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="position_table_modal" tabindex="-1" role="dialog" aria-labelledby="position_table_modalTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-body p-4 py-5 p-md-5">
                                        <h3 class="text-center mb-3">Make changes to position <?php echo $row["emp_id"]?></h3>
                                        <form action="" class="signup-form" method="post">
                                            <div class="form-group mb-2">
                                                <input type="hidden" name="position_id_edit" class="form-control" value="<?php echo $row["emp_id"]?>">
                                            </div>
                                            <div class="form-group mb-2">
                                                <label for="fn">Position Title</label>
                                                <input type="text" name="position_title_edit" class="form-control" value="<?php echo $row["position_id"]?>">
                                            </div>
                                            <div class="form-group mb-2">
                                                <label for="fn">Full/Part Time</label>
                                                <input type="text" name="positiontype_a_edit" class="form-control" value="<?php echo $row["position_start_date"]?>">
                                            </div>
                                            <div class="form-group mb-2">
                                                <label for="fn">Permanent/Contractor</label>
                                                <input type="text" name="positiontype_b_edit" class="form-control" value="<?php echo $row["position_end_date"]?>">
                                            </div>
                                            <div class="form-group mb-2">
                                                <br><input type="submit" name="position_table_apply" value="Apply changes" class="form-control btn btn-primary rounded submit px-3">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Add Modals -->
                    <div class="all_add_modals">

                    </div>
                </div>
            </div>
        </div>
        
    </body>
</html>
