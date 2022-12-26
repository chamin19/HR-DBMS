<html>
<?php include ('dbconnect.php'); ?>

<body>
<?php
    /* empID, FirstName, LastName, Email, Phone, Street#, StreetName, City, Province, PostalCode, Manager emp ID */
    $sql = "INSERT INTO emp VALUES 
            (999,'Ada','Lovelace','alovelace@sql.com','6475678901',330, 'Front St. W','Toronto','ON','M5V 0G5',NULL),
            (1000,'Charles','Babage','cbabbage@sql.com','6475678901',330, 'Front St. W','Toronto','ON','M5V 0G5',999),
            (1001,'Alan', 'Turing','aturing@sql.com','6475555559',330, 'Front St. W','Toronto','ON','M5V 0G5',1000),
            (1002,'Steve', 'Wozniak','swozniak@sql.com','6479081234',330, 'Front St. W','Toronto','ON','M5V 6G5',1000),
            (1003,'Linus', 'Torvalds', 'ltorvalds@sql.com','6475840394',330, 'Front St. W','Toronto','ON','M5V 4G5',1000),
            (1004,'Stephen','Hawking','shawking@sql.com','9059483748',330, 'Front St. W','Toronto','ON','M5V 8G5',1001),
            (1005,'Jeff','Bezos','jbezos@sql.com','9054719190',330, 'Front St. W','Toronto','ON','M5V 0G5',1001),
            (1006,'Evan','Spiegel','espiegel@sql.com','9054786190',330, 'Front St. W','Toronto','ON','M5V 7G5',1003),
            (1007,'Robert','Scoble','rscoble@sql.com','5556667454',336, 'Front St. W','Toronto','ON','M5V 5G5',999),
            (1008,'Tim','Cook','tcook@sql.com','3458906190',330, 'Alley St. W','Toronto','ON','M5V 1G5',1003),
            (1009,'Sundar','Pichai','spichai@sql.com','4674786190',450, 'London St. W','Toronto','ON','M5V 567',1002),
            (1010,'Mary','Barra','mbarra@sql.com','456989090',456, 'Flying car St. W','Toronto','ON','FLY 587',1007),
            (1011,'Satya','Nadella','snadella@sql.com','456676789',330, 'Flying St. W','Toronto','ON','M5V 8H5',1007);";

    if (mysqli_query($connect, $sql)) {
        echo "<br><br>Table employee populated successfully.<br>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connect);
    }

    $sql = "INSERT INTO emp_dept VALUES 
            (999, 00),
            (1000, 01),
            (1001, 02),
            (1004, 02),
            (1002, 03),
            (1005, 02),
            (1003, 04),
            (1006, 04),
            (1007, 05),
            (1008, 04),
            (1009, 03),
            (1010, 05),
            (1011, 05);";
    if (mysqli_query($connect, $sql)) {
        echo "<br><br>Table emp_dept populated successfully.<br>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connect);
    }

    $sql = "INSERT INTO dept VALUES 
            (00,'Head'),
            (01,'Technology and Operations'),
            (02,'Cyber Security'),
            (03,'Server-Based Computing'),
            (04,'Data and Analytics'),
            (05,'Human Resources');";

    if (mysqli_query($connect, $sql)) {
        echo "<br><br>Table dept populated successfully.<br>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connect);
    }

    $sql = "INSERT INTO emp_bank_account VALUES 
            (999,109),
            (1000,123),
            (1001,126),
            (1002,130),
            (1003,209),
            (1004,139),
            (1005,149),
            (1006,156),
            (1007,158),
            (1008,309),
            (1009,210),
            (1010,219),
            (1011,289);";

    if (mysqli_query($connect, $sql)) {
        echo "<br><br>Table emp_bank_account populated successfully.<br>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connect);
    }

    $sql = "INSERT INTO bank_account VALUES 
            (109,23456,003,1425347,8000),
            (123,98099,003,1578475,7000),
            (126,08980,003,0897654,2300),
            (130,12031,003,0918273,2300),
            (209,23456,003,9938475,2300),
            (139,08980,003,0908076,2000),
            (149,23456,003,1829374,2000),
            (156,08980,003,9384710,2000),
            (158,08960,003,9389710,2000),
            (309,67456,003,5558475,2302),
            (210,23789,003,9938478,2222),
            (219,23896,003,9938895,2370),
            (289,23896,003,9935555,2305);";
    if (mysqli_query($connect, $sql)) {
        echo "<br><br>Table bank_account populated successfully.<br>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connect);
    }

    $sql = "INSERT INTO account_payment VALUES
            (109,120),
            (123,121),
            (126,130),
            (130,131),
            (209,140),
            (139,141),
            (149,150),
            (156,160),
            (158,161),
            (309,162),
            (210,163),
            (219,164),
            (289,165);";

    if (mysqli_query($connect, $sql)) {
        echo "<br><br>Table account_payment populated successfully.<br>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connect);
    }

    $sql = "INSERT INTO payment VALUES
            (120,2000,'2022-09-29'),
            (121,2000,'2022-09-29'),
            (130,1500,'2022-09-29'),
            (131,2000,'2022-09-29'),
            (140,2000,'2022-09-29'),
            (141,2000,'2022-09-29'),
            (150,5000,'2022-09-29'),
            (160,3500,'2022-09-29'),
            (161,3550,'2022-09-29'),
            (162,3400,'2022-09-29'),
            (163,3500,'2022-09-29'),
            (164,5500,'2022-09-29'),
            (165,3580,'2022-09-29'),
            (167,2000,'2022-10-13'),
            (168,2000,'2022-10-13'),
            (172,1500,'2022-10-13'),
            (175,2000,'2022-10-13'),
            (176,2000,'2022-10-13'),
            (179,2000,'2022-10-13'),
            (181,5000,'2022-10-13'),
            (182,3500,'2022-10-13'),
            (183,3550,'2022-10-13'),
            (186,3400,'2022-10-13');";

    if (mysqli_query($connect, $sql)) {
        echo "<br><br>Table payment populated successfully.<br>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connect);
    }

    $sql = "INSERT INTO emp_position VALUES 
            (999,21,'2011-05-09',NULL),
            (1000,22,'2011-01-10',NULL),
            (1001,23,'2013-05-11',NULL),
            (1002,24,'2014-07-12',NULL),
            (1003,25,'2015-02-24',NULL),
            (1004,26,'2015-09-28',NULL),
            (1005,27,'2016-11-28',NULL),
            (1006,28,'2016-05-30',NULL),
            (1007,29,'2019-10-30',NULL),
            (1008,30,'2021-05-30',NULL),
            (1009,31,'2022-05-30',NULL),
            (1010,32,'2022-06-11',NULL),
            (1011,33,'2016-09-20',NULL);";

    if (mysqli_query($connect, $sql)) {
        echo "<br><br>Table emp_position populated successfully.<br>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connect);
    }

    $sql = "INSERT INTO position_table VALUES 
            (21,'CEO','full-time','permanent'),
            (22,'Manager','full-time','permanent'),
            (23,'Project Manager','full-time','contractor'),
            (24,'Senior Engineer','full-time','permanent'),
            (25,'Quality Assurance','part-time','contractor'),
            (26,'Intern','full-time','contractor'),
            (27,'Intern','full-time','contractor'),
            (28,'Automator','part-time','permanent'),
            (29,'Junior Administrator','full-time','permanent'),
            (30,'Junior Analyst','full-time','permanent'),
            (31,'Front-end developer','full-time','contractor'),
            (32,'HR Coordinator','full-time','permanent'),
            (33,'HR Coordinator','full-time','permanent');";
    
    if (mysqli_query($connect, $sql)) {
        echo "<br><br>Table position_table populated successfully.<br>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connect);
    }

    $sql = "INSERT INTO emp_work_period VALUES
            (999,1), 
            (999,14),
            (999,27),
            
            (1000,2),
            (1000,15),
            (1000,28),
            
            (1001,3),
            (1001,16),
            (1001,29),
            
            (1002,4),
            (1002,17),
            (1002,30),
            
            (1003,5),
            (1003,18),
            (1003,31),
            
            (1004,6),
            (1004,19),
            (1004,32),
            
            (1005,7),
            (1005,20),
            (1005,33),
            
            (1006,8),
            (1006,21),
            (1006,34),
            
            (1007,9),
            (1007,22),
            (1007,35),
            
            (1008,10),
            (1008,23),
            (1008,36),
            
            (1009,11),
            (1009,24),
            (1009,37),
            
            (1010,12),
            (1010,25);";

    if (mysqli_query($connect, $sql)) {
        echo "<br><br>Table emp_work_period populated successfully.<br>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connect);
    }

    $sql = "INSERT INTO work_period VALUES
            (1,  '2022-06-03 08:29:55.89', '2022-06-03 16:39:36.16'),
            (14, '2022-06-04 08:30:45.79', '2022-06-04 16:45:36.67'),
            (27, '2022-06-05 08:00:10.39', '2022-06-05 16:00:26.46'),
            
            (2,  '2022-06-03 09:30:20.70', '2022-06-03 17:32:36.16'),
            (15, '2022-06-04 09:15:10.30', '2022-06-04 17:20:26.43'),
            (28, '2022-06-05 09:00:20.70', '2022-06-05 17:11:26.76'),
            
            (3,  '2022-06-03 08:00:55.81', '2022-06-03 16:02:34.17'),
            (16, '2022-06-04 08:03:15.81', '2022-06-04 16:04:39.27'),
            (29, '2022-06-05 08:00:12.31', '2022-06-05 16:02:34.67'),
            
            (4,  '2022-06-03 08:30:00.00', '2022-06-03 16:30:00.00'),
            (17, '2022-06-04 08:00:55.81', '2022-06-04 16:02:34.17'),
            (30, '2022-06-05 08:30:00.00', '2022-06-05 16:30:00.00'),
            
            (5,  '2022-06-03 08:00:00.00', '2022-06-03 16:00:00.00'),
            (18, '2022-06-04 08:00:00.00', '2022-06-04 16:00:00.00'),
            (31, '2022-06-05 08:00:00.00', '2022-06-05 16:00:00.00'),
            
            (6,  '2022-06-03 08:30:45.79', '2022-06-03 16:45:36.67'),
            (19, '2022-06-04 09:00:55.89', '2022-06-04 17:30:36.00'),
            (32, '2022-06-05 08:30:00.00', '2022-06-05 16:30:00.00'),
            
            (7,  '2022-06-03 08:30:00.00', '2022-06-03 16:30:00.00'),
            (20, '2022-06-04 08:30:45.79', '2022-06-04 16:45:36.67'),
            (33, '2022-06-05 09:05:55.89', '2022-06-05 17:04:28.16'),
            
            (8,  '2022-06-03 09:05:55.89', '2022-06-03 13:04:28.16'),
            (21, '2022-06-04 09:02:55.89', '2022-06-04 13:10:03.99'),
            (34, '2022-06-05 08:30:45.79', '2022-06-05 14:45:36.67'),
            
            (9,  '2022-06-03 09:15:10.30', '2022-06-03 17:20:26.43'),
            (22, '2022-06-04 08:30:00.00', '2022-06-04 16:30:00.00'),
            (35, '2022-06-05 09:02:55.89', '2022-06-05 17:10:03.99'),
            
            (10, '2022-06-03 09:02:55.89', '2022-06-03 17:10:03.99'),
            (23, '2022-06-04 08:30:45.79', '2022-06-04 16:45:36.67'),
            (36, '2022-06-05 09:15:10.30', '2022-06-05 17:20:26.43'),
            
            (11, '2022-06-03 09:02:55.89', '2022-06-03 17:10:03.99'),
            (24, '2022-06-04 09:02:55.89', '2022-06-04 17:10:03.99'),
            (37, '2022-06-05 09:02:55.89', '2022-06-05 17:10:03.99'),
            
            (12, '2022-06-03 09:02:55.89', '2022-06-03 17:10:03.99'),
            (25, '2022-06-04 09:15:10.30', '2022-06-04 17:20:26.43');";

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