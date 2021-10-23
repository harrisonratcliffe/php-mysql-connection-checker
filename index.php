<?php

if (isset($_POST['mysql'])) {
    $mysql_server = ($_POST['mysql_server']);
    $mysql_port = ($_POST['mysql_port']);
    $mysql_user = ($_POST['mysql_user']);
    $mysql_password = ($_POST['mysql_password']);
    $mysql_database = ($_POST['mysql_database']);

    try {
        $dbcon = new PDO("mysql:host=$mysql_server;port=$mysql_port;dbname=$mysql_database", "$mysql_user", "$mysql_password",
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $message = '<div class="alert alert-success" role="alert">Connection to MySQL server was successful!</div>';
    }
    catch(PDOException $error){
        $message = '<div class="alert alert-danger" role="alert">Connection to MySQL server has failed!<br>Error: ' . $error->getMessage() . '</div>';
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Harrison Ratcliffe">
    <meta name="description" content="A simple tool to check your SMTP is working, built in PHP.">
    <title>PHP MySQL Connection Checker</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://unpkg.com/purecss@2.0.6/build/pure-min.css" integrity="sha384-Uu6IeWbM+gzNVXJcM9XV3SohHtmWE+3VGi496jvgX1jyvDTXfdK+rfZc8C1Aehk5" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
<main class="form-signin">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="pure-form pure-form-stacked">
        <fieldset>
            <legend>PHP MySQL Connection Checker</legend>
            <?php if(!empty($message)) { echo $message; } ?>
            <div class="pure-g">
                <div class="pure-u-1 pure-u-md-1-3">
                    <label for="multi-first-name">MySQL Server:</label>
                    <input type="text" name="mysql_server" required placeholder="smtp.server.com" class="pure-u-23-24" />
                </div>
                <div class="pure-u-1 pure-u-md-1-3">
                    <label for="multi-last-name">MySQL Port:</label>
                    <input type="number" name="mysql_port" required placeholder="3306" class="pure-u-23-24" />
                </div>
                <div class="pure-u-1 pure-u-md-1-3">
                    <label for="multi-email">MySQL User:</label>
                    <input type="text" name="mysql_user" required class="pure-u-23-24" required="" />
                </div>
                <div class="pure-u-1 pure-u-md-1-3">
                    <label for="multi-city">MySQL Password:</label>
                    <input type="password" name="mysql_password" required class="pure-u-23-24" />
                </div>
                <div class="pure-u-1 pure-u-md-1-3">
                    <label for="multi-city">MySQL Database:</label>
                    <input type="text" name="mysql_database" required class="pure-u-23-24" />
                </div>
            </div>
            <button type="submit" name="mysql" class="pure-button pure-button-primary">Submit</button>
        </fieldset>
    </form>
</main>
</body>
</html>