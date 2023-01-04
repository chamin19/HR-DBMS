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
                background-color: #E8ECF4; 
            }
            main {
                position: absolute; 
                top: 50%; 
                left: 50%; 
                transform: translateX(-50%) translateY(-50%);
            }
            .logo {
                position: absolute;
                left: 20px;
                top: 20px;
            }
            form {
                padding: 30px ;
                background-color: white;
                border-radius: 3px;
                font-size: 16px;
            }
            p {
                font-weight: bold;
                text-align: left;
                padding: 2px;
            }
            label, input {
                display: block;
            }
            .button {
                text-align: center;
            }
            h2 {
                color: #2A4895;
                text-transform: uppercase;
                font-size: 20px;
                font-weight: 700;
            }
        </style>
    </head>
    <body>
        <a class="button logo" href="index.html" style="text-decoration: none;"><h2>HR Payroll DBMS</h2></a><br><br><br>
        <h3 style="font-size: 16px; padding-left: 43px;">Employee Sign-in</h3>

        <main>
            <form action="view_employee.php" method="post">
                <label for="id"><p>Employee ID</p></label>
                <input type="text" name="id" placeholder="value between 1000 and 1011" size=30><br><br>

                <label for='pass'><p>Password</p></label>
                <input type="text" name="pass" placeholder="anything" size=30><br><br>

                <input class="button" id="dark" type="submit" value="Sign in"><br><br>
            </form>
        </main>
    </body>

</html>