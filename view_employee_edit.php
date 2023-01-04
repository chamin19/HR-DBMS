<?php 

include ('dbconnect.php'); 
if (isset($_POST['work_period_apply'])){
    $work_period_id = $_POST['work_period_id_edit'];
    $new_start_time = $_POST['start_edit'];
    $new_end_time = $_POST['end_edit'];
    
    $edit_emp_dept = 'UPDATE emp_dept SET
                    dept_id = $new_dept_id
                    WHERE emp_id = $emp_id';

    if (mysqli_query($connect, $edit_emp_dept)) { ?>
        <script>
            alert("worked");
        </script>
    <?php
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . mysqli_error($connect);
    }
}

if (isset($_POST['work_period_add_log'])){
    $emp_id = $_POST['emp_id'];
    $new_start_time = $_POST['start_add'];
    $new_end_time = $_POST['end_add'];

    $last_id = 'SELECT MAX(work_period_id) from work_period ORDER BY work_period_id DESC;';
    $result_last_id = mysqli_query($connect,$last_id);
    $row = mysqli_fetch_assoc($result_last_id);
    $new_work_id = $row['MAX(work_period_id)'] + 1;

    $add_work = 'INSERT INTO work_period VALUES ($new_work_id,$new_start_time,$new_end_time);';
    $add_emp_word = 'INSERT INTO emp_work_period VALUES ($emp_id,$new_work_id);';

    if (mysqli_query($connect, $add_work)) { ?>
        <script>
            alert("worked");
        </script>
    <?php
        echo "Added to work_period successfully";
    } if (mysqli_query($connect, $add_emp_word)) { ?>
        <script>
            alert("worked");
        </script>
    <?php
        echo "Added to emp_work_period successfully";
    } else {
        echo "Error updating record: " . mysqli_error($connect);
    }
}
?>