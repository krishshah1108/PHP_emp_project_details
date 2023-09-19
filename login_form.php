<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form |K11</title>
    <link rel="stylesheet" href="form.css">
</head>
<body>
    <form action="dashboard.php" method="post">
        <table border="2">
            <tr id="heading">
                <th colspan="2" align="center">Login Form</th>
            </tr>
            <tr>
                <td><label for="email">Email</label></td>
                <td><input type="text" name="email" id="email" placeholder="Enter Email ID"  required></td>
            </tr>
            <tr>
                <td><label for="pwd">Password</label></td>
                <td><input type="password" name="pwd" id="pwd" placeholder="Enter Password" required></td>
            </tr>
            <tr id="bottom">
                <td colspan="2" align="center"><button type="submit" name="login">Login</button></td>
            </tr>
        </table>
    </form>
    <div class="content">
    <h2>New employee?</h2>
    <a href="Emp_Details.php">👉Register Here</a>
    </div>
</body>
</html>

<?php
if(isset($_GET['logFai']))
{
    echo '
    <div class="msgFai">
        <h2>
        Incorrect username and password.<br>Login failed.
        </h2>
    </div>
    ';
}
if(isset($_GET['msgRegSuc']))
{
    echo '
    <br><hr>
    <div class="msgSucc">
    <h3>New record registered successfully!<br></h3>
    <button class="return"><h3><a href="registration_form.php">Home </a></h3></button>
    </div>
    ';
}
?>