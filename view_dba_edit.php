<html>
<?php 

include ('dbconnect.php'); 
    if (isset($_POST['emp_apply'])){
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
                    emp_first_name = $new_fn,
                    emp_last_name = $new_ln,
                    emp_email = $new_email,
                    emp_phone = $new_phone,
                    emp_address_street_number = $new_sno,
                    emp_address_street_name = $new_sname,
                    emp_address_city = $new_city,
                    emp_address_province = $new_province,
                    emp_address_postal_code = $new_pc
                    WHERE emp_id = $emp_id';

        if (mysqli_query($connect, $edit_emp)) { ?>
            <script>
                alert("worked");
            </script>
        <?php
            echo "Record updated successfully";
            // echo "<meta http-equiv='refresh' content='0'>";
          } else {
            echo "Error updating record: " . mysqli_error($connect);
          }
    }

    if (isset($_POST['emp_dept_apply'])){
        $emp_id = $_POST['emp_id_edit'];
        $new_dept_id = $_POST['dept_id_edit'];
        $edit_emp_dept = 'UPDATE emp_dept SET
                        dept_id = $new_dept_id
                        WHERE emp_id = $emp_id';

        if (mysqli_query($connect, $edit_emp_dept)) { ?>
            <script>
                alert("worked");
            </script>
        <?php
            echo "Record updated successfully";
            // echo "<meta http-equiv='refresh' content='0'>";
        } else {
            echo "Error updating record: " . mysqli_error($connect);
        }
    }

    if (isset($_POST['dept_apply'])){
        $dept_id = $_POST['dept_id_edit'];
        $new_dept_name = $_POST['dept_name_edit'];
        $edit_dept = 'UPDATE dept SET dept_name = $new_dept_name WHERE dept_id = $dept_id';

        if (mysqli_query($connect, $edit_dept)) { ?>
            <script>
                alert("worked");
            </script>
        <?php
            echo "Record updated successfully";
            // echo "<meta http-equiv='refresh' content='0'>";
        } else {
            echo "Error updating record: " . mysqli_error($connect);
        }
    }

    if (isset($_POST['bank_apply'])){
        $acc_id = $_POST['account_id_edit'];
        $new_tran_number = $_POST['tran_number_edit'];
        $new_inst_number = $_POST['inst_number_edit'];
        $new_acc_number = $_POST['acc_number_edit'];
        $edit_bank = 'UPDATE bank_account SET 
            transit_number = $new_tran_number, 
            institution_number = $new_inst_number, 
            account_number = $new_acc_number
            WHERE account_id = $acc_id';

        if (mysqli_query($connect, $edit_bank)) { ?>
            <script>
                alert("worked");
            </script>
        <?php
            echo "Record updated successfully";
            // echo "<meta http-equiv='refresh' content='0'>";
        } else {
            echo "Error updating record: " . mysqli_error($connect);
        }
    }

    if (isset($_POST['emp_position'])){
        $emp_position_id = $_POST['payment_id_edit'];
        $new_tran_number = $_POST['tran_number_edit'];
        $new_inst_number = $_POST['inst_number_edit'];
        $new_acc_number = $_POST['acc_number_edit'];
        $edit_payment = 'UPDATE payment SET 
            
            WHERE payment_id = $payment_id';

        if (mysqli_query($connect, $edit_account_payment)) { ?>
            <script>
                alert("worked");
            </script>
        <?php
            echo "Record updated successfully";
            // echo "<meta http-equiv='refresh' content='0'>";
        } else {
            echo "Error updating record: " . mysqli_error($connect);
        }
    }

?>

</html>