<?php
$userid = "";
$fname = "";
$lname = "";
$email = "";
$pass = "";

$errorMessage = "";
$successMessage = "";

$connection = new mysqli("localhost", "root", "", "crud1");
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (!isset($_GET["userid"])) {
        header("Location: /adminsim/htmls/read.php");
        exit;
    }

    $userid = $_GET["userid"];
    $sql = "SELECT * FROM users WHERE userid = $userid";
    $result = $connection->query($sql);

    if (!$result || $result->num_rows == 0) {
        header("Location: /adminsim/htmls/read.php");
        exit;
    }

    $row = $result->fetch_assoc();

    $fname = $row["fname"];
    $lname = $row["lname"];
    $email = $row["email"];
    $pass = $row["pass"];

} else {
    $userid = $_POST["userid"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $pass = $_POST["pass"];

    do {
        if (empty($fname) || empty($lname) || empty($email) || empty($pass)) {
            $errorMessage = "All fields are required.";
            break;
        }

        $sql = "UPDATE users SET fname = '$fname', lname = '$lname', email = '$email', pass = '$pass' WHERE userid = $userid";
        $result = $connection->query($sql);

        if (!$result) {
            $errorMessage = "Invalid query: " . $connection->error;
            break;
        }

        $successMessage = "Account updated successfully.";
        header("Location: /adminsim/htmls/read.php");
        exit;

    } while (false);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Account</title>
    <style>
        body {
            text-align: center;
            background-color: black;
            font-family: Arial, Helvetica, sans-serif;
            color: white;
        }
        form {
            display: inline-block;
            margin-top: 50px;
            background-color: #333;
            padding: 20px;
            border-radius: 10px;
        }
        input {
            width: 300px;
            height: 30px;
            margin: 5px;
            border-radius: 5px;
            padding: 5px;
        }
        button {
            color: white;
            cursor: pointer;
            width: 300px;
            height: 45px;
            border-radius: 10px;
            font-size: small;
            background-color: #4b53f6a0;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <h1>EDIT ACCOUNT</h1>
    <?php if (!empty($errorMessage)) echo "<p style='color: red;'>$errorMessage</p>"; ?>
    <form method="POST">
        <input type="hidden" name="userid" value="<?php echo htmlspecialchars($userid); ?>">
        <input type="text" name="fname" placeholder="First Name" value="<?php echo htmlspecialchars($fname); ?>" required><br>
        <input type="text" name="lname" placeholder="Last Name" value="<?php echo htmlspecialchars($lname); ?>" required><br>
        <input type="email" name="email" placeholder="Email" value="<?php echo htmlspecialchars($email); ?>" required><br>
        <input type="text" name="pass" placeholder="Password" value="<?php echo htmlspecialchars($pass); ?>" required><br>
        <button type="submit">Update Account</button>
    </form>
</body>
</html>