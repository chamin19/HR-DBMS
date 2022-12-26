<?php include ('dbconnect.php'); ?>

<?php
    $sql = "DROP TABLE work_period, emp_work_period, position_table, emp_position, payment, account_payment, bank_account, emp_bank_account, dept, emp_dept, emp;";

    $drop = mysqli_query($connect, $sql);  

    if($drop){
        echo "<br>Tables dropped successfully.";
    } else {
        echo "<br>Tables not dropped due to error: " . $sql . "<br>" . mysqli_error($connect);
    }
    
    mysqli_close($connect);
?>
