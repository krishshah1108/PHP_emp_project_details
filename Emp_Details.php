<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Details |K11</title>
    <link rel="stylesheet" href="form.css">
</head>
<body>
<form action="empDet_insert.php" method="post">
        <table align="center" border="2">
            <tr>
                <th colspan="2">Employee Details</th>
            </tr>
            <tr>
                <td><label for="e_email">Employee email</label></td>
                <td><input type="email" name="e_email" id="e_email" placeholder="Enter Employee Email" size="40" required></td>
            </tr>
            <tr>
                <td><label for="e_type">Employee type</label></td>
                <td>
                    <input type="radio" name="e_type" group="e_type" value="Project_Manager">&nbsp;Project Manager&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="e_type" group="e_type" value="Regular_Employee">&nbsp;Regular Employee
                </td>
            </tr>
            <tr>
                <td><label for="e_name">Employee name</label></td>
                <td><input type="text" name="e_name" id="e_name" placeholder="Enter Employee Name" size="40" pattern="[A-Za-z]{1,}" title="Only characters allowed" required></td>
            </tr>
            <tr>
                <td><label for="e_cn">Employee contact number</label></td>
                <td><input type="text" name="e_cn" id="e_cn" placeholder="Enter Employee Contact No" size="40" required></td>
            </tr>
            <tr>
                <td><label for="e_joinDate">Employee join date</label></td>
                <td><input type="date" name="e_joinDate" id="e_joinDate" required></td>
            </tr>
            <tr>
                <td><label for="e_workPlace">Employee work place</label></td>
                <td>
                    <input type="checkbox" name="e_workPlace[]" value="remote_area">&nbsp;Remote Area&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="e_workPlace[]" value="in_company">&nbsp;In Company
                </td>
            </tr>
            <tr>
                <td><label for="pwd">Employee Password </label></td>
                <td><input type="password" name="pwd" id="pwd" placeholder="Enter Password" size="40" minlength="8" maxlength="15" required></td>
            </tr>
            <tr align="center">
                <td colspan="2">
                    <button type="submit" name="submit">Submit</button>
                </td>
            </tr>
        </table>
    </form>
        <div class="content">
        <h2>Already registered?</h2>
        <a href="login_form.php">👉Login Here</a>
        </div>
</body>
</html>
<?php
if(isset($_GET['recDel']))
{
    echo '<h3 class="\msgFai\">Record deleted successfully!</h3>';
}
?>