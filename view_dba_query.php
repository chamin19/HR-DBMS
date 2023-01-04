<!DOCTYPE html> 
    <?php include ('dbconnect.php'); ?>
    <head>
        <meta charset="UTF-8">
        <meta name = "description" content = "main page">
        <meta name = "keywords" content = "PHP">
        <meta name = "author" content = "Camillia Amin">
        <meta name = "viewport" content= "width = device-width, initial-scale = 1.0">
        <link rel="stylesheet" href="css\style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <style> 
            body {
                overflow-x: hidden;
            }
            input {
                cursor: pointer;
            }
            .container {
                width: 100%;
            }
            textarea {
                background-color: #2A4895;
                color: white;
                font-family: 'Courier New', Courier, monospace;
                font-size: 14px;
            }
            #editor {
                height: 230px;
                width: 100%;
            }
            #table_info {
                background-color: #f3f5f6;
                height: 85vh;
                padding: 20px;
            }
            table {
                font-family: 'Courier New', Courier, monospace;
                border: 2px solid black;
                font-size: 14px;
                border-collapse: separate;
                border-spacing: 0px;
                background-color: white;
            }
            th {
                background-color: #2A4895;
                color: white;
                padding: 12px;
                text-align: left;
                font-size: 14px;
                padding: 2px;
                font-weight: bold;
            }
            td {
                background-color: white;
            }
            tr:hover {background-color: #ddd;}
            td, th {
                border: 1px solid #ddd;
                padding: 5px;

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
            .logo {
                position: absolute;
                left: 20px;
                top: 20px;
            }
            .view_tables {
                position: absolute;
                right: 20px;
                top: 40px;
            }
        </style>
    </head>
    <body>
        <main>
            <a class="button logo" href="index.html" style="text-decoration: none;"><h2>HR Payroll DBMS</h2></a><br><br>
            <br><h3 style="font-size: 16px; padding-left: 42px;">HR Coordinator View</h3>
            <form action = "view_dba_data.php" method = "">
                <input type = "submit" value = "View tables" class="button view_tables" id="light">
            </form>
            <div class="container">
                <div class="row">
                    <div class="col-sm-2" id="table_info">    
                        <h4>Tables</h4>
                        <p>emp</p>
                        <p>emp_dept</p>
                        <p>dept</p>
                        <p>emp_bank_account</p>
                        <p>bank_account</p>
                        <p>account_payment</p>
                        <p>payment</p>
                        <p>emp_position</p>
                        <p>position_table</p>
                        <p>emp_work_period</p>
                        <p>work_period</p>
                    </div>
                    <div class="col-md-10">
                        <div class="row">
                            <div class="col-sm-12" id="editor">
                                <form method = "post" action="">
                                    <textarea rows = "9" cols = "100" name = "query" id="query" spellcheck="false" autocorrect="off" autocapitalize="off"><?php 
                                        if(isset($_POST['query'])) {
                                            echo htmlentities ($_POST['query']); 
                                        } else {
                                            echo "SELECT dept_id, COUNT(*) \r\nFROM emp_position, emp_dept, position_table \r\nWHERE emp_position.emp_id = emp_dept.emp_id \r\nAND position_table.position_id = emp_position.position_id \r\nAND position_table.position_title != 'Intern' \r\nGROUP BY dept_id;";
                                        }
                                        ?>
                                    </textarea><br>
                                    <input type="submit" name="submit_query" value="Run query">
                                </form>
                            </div> 
                            <div class="col-sm-12" id="output">
                                <?php
                                if(isset($_POST['submit_query'])) {
                                    $query = $_POST['query'];
                                    $arr = explode(" ", $query);
                                    $fstword = array_shift($arr);
                                    if ($fstword == 'SELECT' || $fstword == 'select') {
                                        $query = preg_replace('/\s+/', ' ', $query);
                                        $result = mysqli_query($connect, $query);
                                        
                                        if ($result) {
                                            $x = 0; $columns = []; 
                                            echo "<table>";
                                            if (strcmp(trim($arr[1]),'*') !== 0) {
                                                foreach ($arr as $word) {
                                                    if (strcmp(trim($word),'FROM') == 0 || strcmp(trim($word),'from') == 0){
                                                        break;
                                                    } else {
                                                        $word = preg_replace('/[,|;]?/', '', $word);
                                                        $columns[] = trim($word);
                                                    }
                                                }  
                                                echo "<tr>";
                                                foreach ($columns as $col) {
                                                    echo "<th style='text-transform:uppercase'>" . $col . "</th>";
                                                }
                                                echo "</tr>";
                                            } 
                                            $count = 0; 
                                            while($row = mysqli_fetch_array($result)) {
                                                echo "<tr>";
                                                foreach ($row as $item) {
                                                    if ($count % 2 == 0 ) {echo "<td>" . $item . "</td>";}
                                                    $count++;
                                                }
                                                echo "</tr>";
                                            }
                                            echo "</table>";
                                            mysqli_free_result($result);
                                        } else {
                                            echo "Query could not be executed<br>" . mysqli_error($connect);
                                        }
                                    } else if ($fstword == 'UPDATE' || $fstword == 'update'){
                                        $query = preg_replace('/\s+/', ' ', $query);
                                        $result = mysqli_query($connect, $query);
                                        if ($result) {
                                            echo "Successfully updated"; 
                                        } else {
                                            echo "Query could not be executed<br>" . mysqli_error($connect);
                                        }
                                    } else {
                                        echo "<p>Must be a query</p>";
                                    }
                                }
                                ?>
                            </div>  
                       </div>
                    </div>
                </div>
            </div>
        </main>
    </body>
</html>
<!-- UPDATE emp_dept SET dept_id = 6 WHERE emp_id = 1011;          -->