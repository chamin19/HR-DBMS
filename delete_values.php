<html>
<?php include ('dbconnect.php'); ?>

<body>

<?php
    $sql = "DELETE FROM work_period;";
    $drop = mysqli_query($connect, $sql);  
    // if($drop){
    //     echo "<br>Values deleted successfully from table work_period.";
    // } else {
    //     echo "<br>Values not deleted from table work_period due to error: " . $sql . "<br>" . mysqli_error($connect);
    // }

    $sql = "DELETE FROM emp_work_period;";
    $drop = mysqli_query($connect, $sql);  
    // if($drop){
    //     echo "<br>Values deleted successfully from table emp_work_period.";
    // } else {
    //     echo "<br>Values not deleted from table emp_work_period due to error: " . $sql . "<br>" . mysqli_error($connect);
    // }

    $sql = "DELETE FROM position_table;";
    $drop = mysqli_query($connect, $sql);  
    // if($drop){
    //     echo "<br>Values deleted successfully from table position_table.";
    // } else {
    //     echo "<br>Values not deleted from table position_table due to error: " . $sql . "<br>" . mysqli_error($connect);
    // }

    $sql = "DELETE FROM emp_position;";
    $drop = mysqli_query($connect, $sql);  
    // if($drop){
    //     echo "<br>Values deleted successfully from table emp_position.";
    // } else {
    //     echo "<br>Values not deleted from table emp_position due to error: " . $sql . "<br>" . mysqli_error($connect);
    // }
    
    $sql = "DELETE FROM payment;";
    $drop = mysqli_query($connect, $sql);  
    // if($drop){
    //     echo "<br>Values deleted successfully from table payment.";
    // } else {
    //     echo "<br>Values not deleted from table payment due to error: " . $sql . "<br>" . mysqli_error($connect);
    // }
    
    $sql = "DELETE FROM account_payment;";
    $drop = mysqli_query($connect, $sql);  
    // if($drop){
    //     echo "<br>Values deleted successfully from table account_payment.";
    // } else {
    //     echo "<br>Values not deleted due to error: " . $sql . "<br>" . mysqli_error($connect);
    // }
    
    $sql = "DELETE FROM bank_account;";
    $drop = mysqli_query($connect, $sql);  
    // if($drop){
    //     echo "<br>Values deleted successfully from table account_payment.";
    // } else {
    //     echo "<br>Values not deleted from table account_payment due to error: " . $sql . "<br>" . mysqli_error($connect);
    // }
    
    $sql = "DELETE FROM emp_bank_account;";
    $drop = mysqli_query($connect, $sql);  
    // if($drop){
    //     echo "<br>Values deleted successfully from table emp_bank_account.";
    // } else {
    //     echo "<br>Values not deleted from table emp_bank_account due to error: " . $sql . "<br>" . mysqli_error($connect);
    // }
    
    $sql = "DELETE FROM dept;";
    $drop = mysqli_query($connect, $sql);  
    // if($drop){
    //     echo "<br>Values deleted successfully from table dept.";
    // } else {
    //     echo "<br>Values not deleted from table dept due to error: " . $sql . "<br>" . mysqli_error($connect);
    // }
    
    $sql = "DELETE FROM emp_dept;";
    $drop = mysqli_query($connect, $sql);  
    // if($drop){
    //     echo "<br>Values deleted successfully from table emp_dept.";
    // } else {
    //     echo "<br>Values not deleted from table emp_dept due to error: " . $sql . "<br>" . mysqli_error($connect);
    // }
    
    $sql = "DELETE FROM emp;";
    $drop = mysqli_query($connect, $sql);  
    // if($drop){
    //     echo "<br>Values deleted successfully from table emp.";
    // } else {
    //     echo "<br>Values not deleted from table emp due to error: " . $sql . "<br>" . mysqli_error($connect);
    // }

    // mysqli_close($connect);
?>
</body>
<!-- <style>
    * {
        background-color: #EEEEEE;
    }
    body {
        font-family:Verdana, Geneva, Tahoma, sans-serif;
        position: absolute;
        margin: 50px;
        font-size: 15px;
    }
</style> -->

</html>