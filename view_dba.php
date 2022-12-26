<!DOCTYPE html> 
    <head>
        <meta charset="UTF-8">
        <meta name = "description" content = "main page">
        <meta name = "keywords" content = "PHP">
        <meta name = "author" content = "Camillia Amin">
        <meta name = "viewport" content= "width = device-width, initial-scale = 1.0">
        <link rel="stylesheet" href="style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>

    <body>
        <header>
            <div class="logo">
                <a class="button" href="main.html" style="text-decoration: none;"><h2>HR Payroll DBMS</h2></a>
            </div>
            <div class="profile">
                <h4>Database Administrator</h4>
            </div>
        </header>
        <main>
            <br>
            <div class="container">
                <div class="row">
                    <div class="col-sm-8" id="tables">
                       tables
                    </div>
                    <div class="col-md-4">
                       <div class="row">
                          <div class="col-sm-12" id="output">
                            output
                          </div>
                          <div class="col-sm-12" id="editor">
                            editor
                          </div>
                       </div>
                    </div>
                </div>
            </div>
        </main>
    </body>
    <style>
        input {
            cursor: pointer;
        }
        .container {
            width: 95%;
        }
        #tables {
            background-color: blanchedalmond;
            height: 500px;
            overflow-y: scroll;
        }
        #output {
            background-color: blue;
            height: 300px;
            overflow-y: scroll;
        }
        #editor {
            background-color: blueviolet;
            height: 200px;
            overflow-y: scroll;
        }
    </style>
</html>

                            