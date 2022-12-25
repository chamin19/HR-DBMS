<html>
<?php include ('dbconnect.php'); ?>

<body>
<?php
    /* empID, FirstName, LastName, Email, Phone, Street#, StreetName, City, Province, PostalCode, Manager emp ID */
    $sql = "INSERT INTO emp VALUES (999,'Ada','Lovelace','alovelace@sql.com','6475678901',330, 'Front St. W','Toronto','ON','M5V 0G5',NULL);
            INSERT INTO emp VALUES (1000,'Charles','Babage','cbabbage@sql.com','6475678901',330, 'Front St. W','Toronto','ON','M5V 0G5',999);
            INSERT INTO emp VALUES (1001,'Poojitha', 'Bejugama','pbejugama@sql.com','6475555559',330, 'Front St. W','Toronto','ON','M5V 0G5',1000);
            INSERT INTO emp VALUES (1002,'Camillia', 'Amin','camin@sql.com','6479081234',330, 'Front St. W','Toronto','ON','M5V 6G5',1000);
            INSERT INTO emp VALUES (1003,'Annabel', 'Chao', 'achao@sql.com','6475840394',330, 'Front St. W','Toronto','ON','M5V 4G5',1000);
            INSERT INTO emp VALUES (1004,'Harry','Potter','hpotter@sql.com','9059483748',330, 'Front St. W','Toronto','ON','M5V 8G5',1001);
            INSERT INTO emp VALUES (1005,'Charlie','Chaplin','cchaplin@sql.com','9054719190',330, 'Front St. W','Toronto','ON','M5V 0G5',1001);
            INSERT INTO emp VALUES (1006,'Penny','Wise','pwise@sql.com','9054786190',330, 'Front St. W','Toronto','ON','M5V 7G5',1003);
            INSERT INTO emp VALUES (1007,'Rup','Halder','RupsH@sql.com','5556667454',336, 'Front St. W','Toronto','ON','M5V 5G5',999);
            INSERT INTO emp VALUES (1008,'Harry','Granger','harryGranger@sql.com','3458906190',330, 'Alley St. W','Toronto','ON','M5V 1G5',1003);
            INSERT INTO emp VALUES (1009,'Hermione','Granger','HGranger@sql.com','4674786190',450, 'London St. W','Toronto','ON','M5V 567',1002);
            INSERT INTO emp VALUES (1010,'Ron','Weasley','WRsmartypants@sql.com','456989090',456, 'Flying car St. W','Toronto','ON','FLY 587',1007);
            INSERT INTO emp VALUES (1011,'Ginny','Weasley','GinW@sql.com','456676789',330, 'Flying St. W','Toronto','ON','M5V 8H5',1007);    
            ";

    if (mysqli_query($connect, $sql)) {
        echo "<br><br>Table employee populated successfully.<br>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connect);
    }

    $sql = "INSERT INTO emp_dept VALUES (999, 00);
            INSERT INTO emp_dept VALUES (1000, 01);
            INSERT INTO emp_dept VALUES (1001, 02);
            INSERT INTO emp_dept VALUES (1004, 02);
            INSERT INTO emp_dept VALUES (1002, 03);
            INSERT INTO emp_dept VALUES (1005, 02);
            INSERT INTO emp_dept VALUES (1003, 04);
            INSERT INTO emp_dept VALUES (1006, 04);
            INSERT INTO emp_dept VALUES (1007, 05);
            INSERT INTO emp_dept VALUES (1008, 04);
            INSERT INTO emp_dept VALUES (1009, 03);
            INSERT INTO emp_dept VALUES (1010, 05);
            INSERT INTO emp_dept VALUES (1011, 05);
            ";
    if (mysqli_query($connect, $sql)) {
        echo "<br><br>Table emp_dept populated successfully.<br>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connect);
    }

    $sql = "INSERT INTO dept VALUES (00,'Head');
            INSERT INTO dept VALUES (01,'Technology and Operations');
            INSERT INTO dept VALUES (02,'Cyber Security');
            INSERT INTO dept VALUES (03,'Server-Based Computing');
            INSERT INTO dept VALUES (04,'Data and Analytics');
            INSERT INTO dept VALUES (05,'Human Resources');
            ";

    if (mysqli_query($connect, $sql)) {
        echo "<br><br>Table dept populated successfully.<br>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connect);
    }

    $sql = "INSERT INTO emp_bank_account VALUES (999,109);
            INSERT INTO emp_bank_account VALUES (1000,123);
            INSERT INTO emp_bank_account VALUES (1001,126);
            INSERT INTO emp_bank_account VALUES (1002,130);
            INSERT INTO emp_bank_account VALUES (1003,209);
            INSERT INTO emp_bank_account VALUES (1004,139);
            INSERT INTO emp_bank_account VALUES (1005,149);
            INSERT INTO emp_bank_account VALUES (1006,156);
            INSERT INTO emp_bank_account VALUES (1007,158);
            INSERT INTO emp_bank_account VALUES (1008,309);
            INSERT INTO emp_bank_account VALUES (1009,210);
            INSERT INTO emp_bank_account VALUES (1010,219);
            INSERT INTO emp_bank_account VALUES (1011,289);
            ";

    if (mysqli_query($connect, $sql)) {
        echo "<br><br>Table emp_bank_account populated successfully.<br>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connect);
    }

    $sql = "INSERT INTO bank_account VALUES (109,23456,003,1425347,8000);
            INSERT INTO bank_account VALUES (123,98099,003,1578475,7000);
            INSERT INTO bank_account VALUES (126,08980,003,0897654,2300);
            INSERT INTO bank_account VALUES (130,12031,003,0918273,2300);
            INSERT INTO bank_account VALUES (209,23456,003,9938475,2300);
            INSERT INTO bank_account VALUES (139,08980,003,0908076,2000);
            INSERT INTO bank_account VALUES (149,23456,003,1829374,2000);
            INSERT INTO bank_account VALUES (156,08980,003,9384710,2000);
            INSERT INTO bank_account VALUES (158,08960,003,9389710,2000);
            INSERT INTO bank_account VALUES (309,67456,003,5558475,2302);
            INSERT INTO bank_account VALUES (210,23789,003,9938478,2222);
            INSERT INTO bank_account VALUES (219,23896,003,9938895,2370);
            INSERT INTO bank_account VALUES (289,23896,003,9935555,2305);
            ";
    if (mysqli_query($connect, $sql)) {
        echo "<br><br>Table bank_account populated successfully.<br>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connect);
    }

    $sql = "INSERT INTO account_payment VALUES (109,120);
            INSERT INTO account_payment VALUES (123,121);
            INSERT INTO account_payment VALUES (126,130);
            INSERT INTO account_payment VALUES (130,131);
            INSERT INTO account_payment VALUES (209,140);
            INSERT INTO account_payment VALUES (139,141);
            INSERT INTO account_payment VALUES (149,150);
            INSERT INTO account_payment VALUES (156,160);
            INSERT INTO account_payment VALUES (158,161);
            INSERT INTO account_payment VALUES (309,162);
            INSERT INTO account_payment VALUES (210,163);
            INSERT INTO account_payment VALUES (219,164);
            INSERT INTO account_payment VALUES (289,165);
            ";

    if (mysqli_query($connect, $sql)) {
        echo "<br><br>Table account_payment populated successfully.<br>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connect);
    }

    $sql = "INSERT INTO payment VALUES (120,2000,'2022-09-29');
            INSERT INTO payment VALUES (121,2000,'2022-09-29');
            INSERT INTO payment VALUES (130,1500,'2022-09-29');
            INSERT INTO payment VALUES (131,2000,'2022-09-29');
            INSERT INTO payment VALUES (140,2000,'2022-09-29');
            INSERT INTO payment VALUES (141,2000,'2022-09-29');
            INSERT INTO payment VALUES (150,5000,'2022-09-29');
            INSERT INTO payment VALUES (160,3500,'2022-09-29');
            INSERT INTO payment VALUES (161,3550,'2022-09-29');
            INSERT INTO payment VALUES (162,3400,'2022-09-29');
            INSERT INTO payment VALUES (163,3500,'2022-09-29');
            INSERT INTO payment VALUES (164,5500,'2022-09-29');
            INSERT INTO payment VALUES (165,3580,'2022-09-29');
            INSERT INTO payment VALUES (167,2000,'2022-10-13');
            INSERT INTO payment VALUES (168,2000,'2022-10-13');
            INSERT INTO payment VALUES (172,1500,'2022-10-13');
            INSERT INTO payment VALUES (175,2000,'2022-10-13');
            INSERT INTO payment VALUES (176,2000,'2022-10-13');
            INSERT INTO payment VALUES (179,2000,'2022-10-13');
            INSERT INTO payment VALUES (181,5000,'2022-10-13');
            INSERT INTO payment VALUES (182,3500,'2022-10-13');
            INSERT INTO payment VALUES (183,3550,'2022-10-13');
            INSERT INTO payment VALUES (186,3400,'2022-10-13');
            ";

    if (mysqli_query($connect, $sql)) {
        echo "<br><br>Table payment populated successfully.<br>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connect);
    }

        $sql = "INSERT INTO emp_position VALUES (999,21,'2011-05-09',NULL);
                INSERT INTO emp_position VALUES (1000,22,'2011-01-10',NULL);
                INSERT INTO emp_position VALUES (1001,23,'2013-05-11',NULL);
                INSERT INTO emp_position VALUES (1002,24,'2014-07-12',NULL);
                INSERT INTO emp_position VALUES (1003,25,'2015-02-24',NULL);
                INSERT INTO emp_position VALUES (1004,26,'2015-09-28',NULL);
                INSERT INTO emp_position VALUES (1005,27,'2016-11-28',NULL);
                INSERT INTO emp_position VALUES (1006,28,'2016-05-30',NULL);
                INSERT INTO emp_position VALUES (1007,29,'2019-10-30',NULL);
                INSERT INTO emp_position VALUES (1008,30,'2021-05-30',NULL);
                INSERT INTO emp_position VALUES (1009,31,'2022-05-30',NULL);
                INSERT INTO emp_position VALUES (1010,32,'2022-06-11',NULL);
                INSERT INTO emp_position VALUES (1011,33,'2016-09-20',NULL);
                ";

    if (mysqli_query($connect, $sql)) {
        echo "<br><br>Table emp_position populated successfully.<br>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connect);
    }

    $sql = "INSERT INTO position_table VALUES (21,'CEO','full-time','permanent');
            INSERT INTO position_table VALUES (22,'Manager','full-time','permanent');
            INSERT INTO position_table VALUES (23,'Project Manager','full-time','contractor');
            INSERT INTO position_table VALUES (24,'Senior Engineer','full-time','permanent');
            INSERT INTO position_table VALUES (25,'Quality Assurance','part-time','contractor');
            INSERT INTO position_table VALUES (26,'Intern','full-time','contractor');
            INSERT INTO position_table VALUES (27,'Intern','full-time','contractor');
            INSERT INTO position_table VALUES (28,'Automator','part-time','permanent');
            INSERT INTO position_table VALUES (29,'Junior Administrator','full-time','permanent');
            INSERT INTO position_table VALUES (30,'Junior Analyst','full-time','permanent');
            INSERT INTO position_table VALUES (31,'Front-end developer','full-time','contractor');
            INSERT INTO position_table VALUES (32,'HR Coordinator','full-time','permanent');
            INSERT INTO position_table VALUES (33,'HR Coordinator','full-time','permanent');
            ";
    if (mysqli_query($connect, $sql)) {
        echo "<br><br>Table position_table populated successfully.<br>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connect);
    }

    $sql = "INSERT INTO emp_work_period VALUES(999,1);
            INSERT INTO emp_work_period VALUES(999,14);
            INSERT INTO emp_work_period VALUES(999,27);
            
            INSERT INTO emp_work_period VALUES(1000,2);
            INSERT INTO emp_work_period VALUES(1000,15);
            INSERT INTO emp_work_period VALUES(1000,28);
            
            INSERT INTO emp_work_period VALUES(1001,3);
            INSERT INTO emp_work_period VALUES(1001,16);
            INSERT INTO emp_work_period VALUES(1001,29);
            
            INSERT INTO emp_work_period VALUES(1002,4);
            INSERT INTO emp_work_period VALUES(1002,17);
            INSERT INTO emp_work_period VALUES(1002,30);
            
            INSERT INTO emp_work_period VALUES(1003,5);
            INSERT INTO emp_work_period VALUES(1003,18);
            INSERT INTO emp_work_period VALUES(1003,31);
            
            INSERT INTO emp_work_period VALUES(1004,6);
            INSERT INTO emp_work_period VALUES(1004,19);
            INSERT INTO emp_work_period VALUES(1004,32);
            
            INSERT INTO emp_work_period VALUES(1005,7);
            INSERT INTO emp_work_period VALUES(1005,20);
            INSERT INTO emp_work_period VALUES(1005,33);
            
            INSERT INTO emp_work_period VALUES(1006,8);
            INSERT INTO emp_work_period VALUES(1006,21);
            INSERT INTO emp_work_period VALUES(1006,34);
            
            INSERT INTO emp_work_period VALUES(1007,9);
            INSERT INTO emp_work_period VALUES(1007,22);
            INSERT INTO emp_work_period VALUES(1007,35);
            
            INSERT INTO emp_work_period VALUES(1008,10);
            INSERT INTO emp_work_period VALUES(1008,23);
            INSERT INTO emp_work_period VALUES(1008,36);
            
            INSERT INTO emp_work_period VALUES(1009,11);
            INSERT INTO emp_work_period VALUES(1009,24);
            INSERT INTO emp_work_period VALUES(1009,37);
            
            INSERT INTO emp_work_period VALUES(1010,12);
            INSERT INTO emp_work_period VALUES(1010,25);
            ";
    if (mysqli_query($connect, $sql)) {
        echo "<br><br>Table emp_work_period populated successfully.<br>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connect);
    }

    $sql = "INSERT INTO work_period VALUES(1,  '2022-06-03 08:29:55.89', '2022-06-03 16:39:36.16');
            INSERT INTO work_period VALUES(14, '2022-06-04 08:30:45.79', '2022-06-04 16:45:36.67');
            INSERT INTO work_period VALUES(27, '2022-06-05 08:00:10.39', '2022-06-05 16:00:26.46');
            
            INSERT INTO work_period VALUES(2,  '2022-06-03 09:30:20.70', '2022-06-03 17:32:36.16');
            INSERT INTO work_period VALUES(15, '2022-06-04 09:15:10.30', '2022-06-04 17:20:26.43');
            INSERT INTO work_period VALUES(28, '2022-06-05 09:00:20.70', '2022-06-05 17:11:26.76');
            
            INSERT INTO work_period VALUES(3,  '2022-06-03 08:00:55.81', '2022-06-03 16:02:34.17');
            INSERT INTO work_period VALUES(16, '2022-06-04 08:03:15.81', '2022-06-04 16:04:39.27');
            INSERT INTO work_period VALUES(29, '2022-06-05 08:00:12.31', '2022-06-05 16:02:34.67');
            
            INSERT INTO work_period VALUES(4,  '2022-06-03 08:30:00.00', '2022-06-03 16:30:00.00');
            INSERT INTO work_period VALUES(17, '2022-06-04 08:00:55.81', '2022-06-04 16:02:34.17');
            INSERT INTO work_period VALUES(30, '2022-06-05 08:30:00.00', '2022-06-05 16:30:00.00');
            
            INSERT INTO work_period VALUES(5,  '2022-06-03 08:00:00.00', '2022-06-03 16:00:00.00');
            INSERT INTO work_period VALUES(18, '2022-06-04 08:00:00.00', '2022-06-04 16:00:00.00');
            INSERT INTO work_period VALUES(31, '2022-06-05 08:00:00.00', '2022-06-05 16:00:00.00');
            
            INSERT INTO work_period VALUES(6,  '2022-06-03 08:30:45.79', '2022-06-03 16:45:36.67');
            INSERT INTO work_period VALUES(19, '2022-06-04 09:00:55.89', '2022-06-04 17:30:36.00');
            INSERT INTO work_period VALUES(32, '2022-06-05 08:30:00.00', '2022-06-05 16:30:00.00');
            
            INSERT INTO work_period VALUES(7,  '2022-06-03 08:30:00.00', '2022-06-03 16:30:00.00');
            INSERT INTO work_period VALUES(20, '2022-06-04 08:30:45.79', '2022-06-04 16:45:36.67');
            INSERT INTO work_period VALUES(33, '2022-06-05 09:05:55.89', '2022-06-05 17:04:28.16');
            
            INSERT INTO work_period VALUES(8,  '2022-06-03 09:05:55.89', '2022-06-03 13:04:28.16');
            INSERT INTO work_period VALUES(21, '2022-06-04 09:02:55.89', '2022-06-04 13:10:03.99');
            INSERT INTO work_period VALUES(34, '2022-06-05 08:30:45.79', '2022-06-05 14:45:36.67');
            
            INSERT INTO work_period VALUES(9,  '2022-06-03 09:15:10.30', '2022-06-03 17:20:26.43');
            INSERT INTO work_period VALUES(22, '2022-06-04 08:30:00.00', '2022-06-04 16:30:00.00');
            INSERT INTO work_period VALUES(35, '2022-06-05 09:02:55.89', '2022-06-05 17:10:03.99');
            
            INSERT INTO work_period VALUES(10, '2022-06-03 09:02:55.89', '2022-06-03 17:10:03.99');
            INSERT INTO work_period VALUES(23, '2022-06-04 08:30:45.79', '2022-06-04 16:45:36.67');
            INSERT INTO work_period VALUES(36, '2022-06-05 09:15:10.30', '2022-06-05 17:20:26.43');
            
            INSERT INTO work_period VALUES(11, '2022-06-03 09:02:55.89', '2022-06-03 17:10:03.99');
            INSERT INTO work_period VALUES(24, '2022-06-04 09:02:55.89', '2022-06-04 17:10:03.99');
            INSERT INTO work_period VALUES(37, '2022-06-05 09:02:55.89', '2022-06-05 17:10:03.99');
            
            INSERT INTO work_period VALUES(12, '2022-06-03 09:02:55.89', '2022-06-03 17:10:03.99');
            INSERT INTO work_period VALUES(25, '2022-06-04 09:15:10.30', '2022-06-04 17:20:26.43');
            ";
        if (mysqli_query($connect, $sql)) {
        echo "<br><br>Table work_period populated successfully.<br>";
        } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connect);
        }

        mysqli_close($connect);
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