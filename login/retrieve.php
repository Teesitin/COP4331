<!DOCTYPE html>
<html>
<head>
    <title>User Data Table</title>
</head>
<body>
    <h1>User Data contacs</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>UserName</th>
            <th>Last Name</th>
            <th>Last Name</th>
            <th>profilelmg</th>
            <!-- Add more table headers for other data if needed -->
        </tr>
        <?php
        // include 'retreiveC.php';
        // Loop through the decoded data and generate table rows
        foreach ($data as $user) {
            echo "<tr>";
            echo "<td>" . $user['id'] . "</td>";
            echo "<td>" . $user['username'] . "</td>";
            echo "<td>" . $user['firstName'] . "</td>";
            echo "<td>" . $user['lastName'] . "</td>";
            echo "<td>" . $user['profilelmg'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>