<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/styles/read.css">
    <title>CREATE</title>
</head>
<style>
    body {
        text-align: center;
        background-color: black;
        font-family: Arial, Helvetica, sans-serif;
    }
    table {
        background-color: white;
        margin: auto;
    }
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        padding: 10px;
        text-align: left;
    }
    th {
        background-color: purple;
        color: white;
    }
    button {
        color: white;
        cursor: pointer;
        width: 300px;
        height: 45px;
        border-radius: 10px;
        font-size: small;
        background-color: #4b53f6a0;
    }
    a {
        margin-right: 10px;
        text-decoration: none;
        color: white;
        background-color: #4b53f6a0;
        padding: 5px 10px;
        border-radius: 5px;
    }
</style>
<body>
    <h1 style="color:white;">USER ACCOUNTS</h1>
    <br><br>

    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "crud1";

        $connection = new mysqli($servername, $username, $password, $database);

        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        }

        $sql = "SELECT * FROM users";
        $result = $connection->query($sql);

        if ($result->num_rows > 0) {
            echo "<table style='width:90%; border-collapse: collapse;' border='1'>";
            echo "<tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Actions</th>
                  </tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['userid']}</td>
                        <td>{$row['fname']}</td>
                        <td>{$row['lname']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['pass']}</td>
                        <td>
                            <a class='btn btn-primary' href='/adminsim/htmls/edit.php?userid=" . $row['userid'] . "'>Edit</a>
                            <a class='btn btn-danger btn-sm' href='/adminsim/htmls/delete.php?userid=" . $row['userid'] . "'>DELETE</a>
                        </td>
                      </tr>";
            }

            echo "</table>";
        } else {
            echo "<p style='color:white;'>No users found.</p>";
        }

        $connection->close();
    ?>

    <div style="position:absolute; bottom:5px; right:10px;">
        <button type="button" onclick="location.href='/adminsim/htmls/create.php'">CREATE NEW ACCOUNT</button>
    </div>
</body>
</html>
