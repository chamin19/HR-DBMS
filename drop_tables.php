<?php include ('dbconnect.php'); ?>

<?php
    $sql = "DROP TABLE emp;
            DROP TABLE emp_dept;
            DROP TABLE dept;
            DROP TABLE emp_bank_account;
            DROP TABLE bank_account;
            DROP TABLE account_payment;
            DROP TABLE payment;
            DROP TABLE emp_position;
            DROP TABLE position_table;
            DROP TABLE emp_work_period;
            DROP TABLE work_period;";

    $drop = mysqli_query($connect, $sql);  

    if($drop){
        echo "<br>Tables dropped successfully.";
    } else {
        echo "<br>Tables not dropped due to Error: " . $sql . "<br>" . mysqli_error($connect);
    }
    
    mysqli_close($connect);
?>
