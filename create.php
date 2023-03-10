<html>
<?php include ('dbconnect.php'); ?>

<body>

<?php
    $sql = "CREATE TABLE emp( 
        emp_id INTEGER NOT NULL PRIMARY KEY, 
        emp_first_name VARCHAR(100) NOT NULL, 
        emp_last_name VARCHAR(100) NOT NULL, 
        emp_email VARCHAR(100) NOT NULL, 
        emp_phone VARCHAR(15) NOT NULL, 
        emp_address_street_number INTEGER NOT NULL,
        emp_address_street_name VARCHAR(100) NOT NULL, 
        emp_address_city VARCHAR(100) NOT NULL, 
        emp_address_province VARCHAR(2) NOT NULL, 
        emp_address_postal_code VARCHAR(7) NOT NULL,
        manager_id INTEGER,
        /* recursive manager to worker 1:N relationship */
        CONSTRAINT fk_manager_id
            FOREIGN KEY (manager_id)
            REFERENCES emp(emp_id)
            ON DELETE SET NULL
        -- manager_id INTEGER REFERENCES emp(emp_id)
        );";
    
    $created = mysqli_query($connect, $sql);  

    if($created){
        echo "<br>emp table created successfully.";
    } else {
        echo "<br>emp table not created due to Error: " . $sql . "<br>" . mysqli_error($connect);
    }

    $sql = "CREATE TABLE emp_dept(
        emp_id INTEGER NOT NULL,
        dept_id INTEGER NOT NULL, 
        PRIMARY KEY(emp_id, dept_id),
        CONSTRAINT fk_emp_id_ed
            FOREIGN KEY(emp_id)
            REFERENCES emp(emp_id)
            ON DELETE CASCADE
        );";

    $created = mysqli_query($connect, $sql);  

    if($created){
        echo "<br>emp-dept table created successfully.";
    } else {
        echo "<br>emp-dept table not created due to Error: " . $sql . "<br>" . mysqli_error($connect);
    }

    $sql = "CREATE TABLE dept(
        dept_id INTEGER NOT NULL,
        dept_name VARCHAR(100) NOT NULL,
        PRIMARY KEY(dept_id)
        );";

    $created = mysqli_query($connect, $sql);  

    if($created){
        echo "<br>dept table created successfully.";
    } else {
        echo "<br>dept table not created due to Error: " . $sql . "<br>" . mysqli_error($connect);
    }

    $sql = "CREATE TABLE emp_bank_account ( 
        emp_id INTEGER NOT NULL,
        account_id INTEGER NOT NULL, 
        PRIMARY KEY(emp_id,account_id),
        CONSTRAINT fk_emp_id_eba
            FOREIGN KEY(emp_id)
            REFERENCES emp(emp_id)
            ON DELETE CASCADE
        );";

    $created = mysqli_query($connect, $sql);  

    if($created){
        echo "<br>emp_bank_account table created successfully.";
    } else {
        echo "<br>emp_bank_account table not created due to Error: " . $sql . "<br>" . mysqli_error($connect);
    }

    $sql = "CREATE TABLE bank_account(
        account_id INTEGER NOT NULL, 
        transit_number INTEGER NOT NULL, /*5 digits*/
        institution_number INTEGER NOT NULL, /*3 digits*/
        account_number INTEGER NOT NULL, /*7 digits*/
        PRIMARY KEY(account_id)
        );";

    $created = mysqli_query($connect, $sql);  

    if($created){
        echo "<br>bank_account table created successfully.";
    } else {
        echo "<br>bank_account table not created due to Error: " . $sql . "<br>" . mysqli_error($connect);
    }

    $sql = "CREATE TABLE account_payment (
        account_id INTEGER NOT NULL, 
        payment_id INTEGER NOT NULL UNIQUE,
        PRIMARY KEY(account_id, payment_id)
        );";

    $created = mysqli_query($connect, $sql);  

    if($created){
        echo "<br>account_payment table created successfully.";
    } else {
        echo "<br>account_payment table not created due to Error: " . $sql . "<br>" . mysqli_error($connect);
    }

    $sql = "CREATE TABLE payment (
        payment_id INTEGER NOT NULL,
        pay_stub_amount INTEGER NOT NULL,
        payment_date DATE NOT NULL,
        PRIMARY KEY(payment_id)
        );";

    $created = mysqli_query($connect, $sql);  

    if($created){
        echo "<br>payment table created successfully.";
    } else {
        echo "<br>payment table not created due to Error: " . $sql . "<br>" . mysqli_error($connect);
    }    

    $sql = "CREATE TABLE emp_position (
        emp_id INTEGER NOT NULL,
        position_id INTEGER NOT NULL, 
        position_start_date DATE NOT NULL,
        position_end_date DATE, 
        PRIMARY KEY(emp_id, position_id),
        CONSTRAINT fk_emp_id_ep
            FOREIGN KEY(emp_id)
            REFERENCES emp(emp_id)
            ON DELETE CASCADE
        );";

    $created = mysqli_query($connect, $sql);  

    if($created){
        echo "<br>emp_position table created successfully.";
    } else {
        echo "<br>emp_position table not created due to Error: " . $sql . "<br>" . mysqli_error($connect);
    }    

    $sql = "CREATE TABLE position_table (
        position_id INTEGER NOT NULL,
        position_title VARCHAR(200) NOT NULL, 
        positiontype_a VARCHAR(10) NOT NULL, /*full_time or part_time*/
        positiontype_b VARCHAR(10) NOT NULL, /*permanent or contractor*/
        PRIMARY KEY(position_id)
        );";

    $created = mysqli_query($connect, $sql);  

    if($created){
        echo "<br>position table created successfully.";
    } else {
        echo "<br>position table not created due to Error: " . $sql . "<br>" . mysqli_error($connect);
    } 

    
    $sql = "CREATE TABLE emp_work_period (
        emp_id INTEGER NOT NULL,
        work_period_id INTEGER NOT NULL,
        PRIMARY KEY(emp_id,work_period_id),
        CONSTRAINT fk_emp_id_ewp
            FOREIGN KEY(emp_id)
            REFERENCES emp(emp_id)
            ON DELETE CASCADE
        );";

    $created = mysqli_query($connect, $sql);

    if($created){
        echo "<br>emp_work_period table created successfully.";
    } else {
        echo "<br>emp_work_period table not created due to Error: " . $sql . "<br>" . mysqli_error($connect);
    } 

    $sql = "CREATE TABLE work_period (
        work_period_id INTEGER NOT NULL,
        start_time TIMESTAMP NULL DEFAULT NULL,
        end_time TIMESTAMP NULL DEFAULT NULL,
        PRIMARY KEY(work_period_id)
        );";

    $created = mysqli_query($connect, $sql);  

    if($created){
        echo "<br>work_period table created successfully.";
    } else {
        echo "<br>work_period table not created due to error: " . $sql . "<br>" . mysqli_error($connect);
    } 

    // mysqli_close($connect);
?>
</body>
<style>
    * {
        background-color: #EEEEEE;
    }
    body {
        font-family:Verdana, Geneva, Tahoma, sans-serif;
        position: absolute;
        margin: 50px;
        font-size: 15px;
    }
</style>

</html>