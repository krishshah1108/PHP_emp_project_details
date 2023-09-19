<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Details |K11</title>
    <link rel="stylesheet" href="form.css">
</head>
<body>
    <form action="projDet_insert.php" method="post">
        <table align="center" border="2">
            <tr>
                <th colspan="2">Project Details</th>
            </tr>
            <tr>
                <td><label for="p_type">Project type</label></td>
                <td>
                    <select name="p_type" id="">
                        <option value="-1">Select Project Type</option>
                        <option value="Web App">Web App</option>
                        <option value="Mobile App">Mobile App</option>
                        <option value="Desktop App">Desktop App</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="p_title">Project title</label></td>
                <td><input type="text" name="p_title" id="p_title" placeholder="Enter Project Title" required></td>
            </tr>
            <tr>
                <td><label for="p_budget">Project budget</label></td>
                <td><input type="number" name="p_budget" id="p_budget" placeholder="Enter Project Budget" required></td>
            </tr>
            <tr>
                <td><label for="p_lastdate">Project last date</label></td>
                <td><input type="date" name="p_lastdate" id="p_lastdate" required></td>
            </tr>
            <tr align="center">
                <td colspan="2">
                    <button type="submit" name="submit">Submit</button>
                </td>
            </tr>
        </table>
    </form>
    <button class="return"><a href="projDet_display.php">Records Available</a></button><br><br>
    <button class="return"><a href="dashboard.php?redirect=1">Home</a></button>
</body>
</html>