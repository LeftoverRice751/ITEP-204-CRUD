<?php
// Connect to database
$conn = new mysqli("localhost", "root", "", "crud1");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$fname = "";
$lname = "";
$email = "";
$pass = "";
$confirmpass = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $pass = $_POST["password"];
    $confirmpass = $_POST["confirmpass"];

    if (empty($fname) || empty($lname) || empty($email) || empty($pass) || empty($confirmpass)) {
        $errorMessage = "All fields are required.";
    } elseif ($pass !== $confirmpass) {
        $errorMessage = "Passwords do not match.";
    } else {
        $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO users (fname, lname, email, pass) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $fname, $lname, $email, $hashed_pass);

        if ($stmt->execute()) {
            $successMessage = "Account added correctly.";
            $fname = $lname = $email = $pass = $confirmpass = "";
        } else {
            $errorMessage = "Error: " . $stmt->error;
        }

        $stmt->close();
    }
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>CREATE</title>
</head>
<style>
    body{
    text-align: center;
    background-color: black;
    font-family: Arial, Helvetica, sans-serif;
}
h1{
    color: white;
    font-size: 50px;
    margin-top: 20px;
}
.signup{
    margin-top: 50px;
}
    input{
    width: 400px;
    height: 40px;
    text-align: center;
    font-size: 20px;
    border-radius: 10px;
    outline: none;
    border: 2px solid #4b53f6a0;
}
input[type="submit"]{
    color: black;
    cursor: pointer;
    width: 300px;
    height: 45px;
    border-radius: 10px;
    font-size: small;
    background-color: #4b53f6a0;
}
</style>
<body>
    <h1>CREATE ACCOUNT</h1>
    <br>

    <?php if (!empty($errorMessage)): ?>
        <div class='alert alert-warning alert-dismissible fade show' role='alert'">
            <strong style="color: white;"><?php echo $errorMessage; ?></strong>
            <button type="button" class="btn-close" data-bs-dismiss='alert' aria-label='Close'></button>
        </div>
    <?php endif; ?>

    <div class="signup">
        <form action="create.php" method="post">
            <input type="text" name="fname" placeholder="First Name" value="<?php echo $fname; ?>"><br><br>
            <input type="text" name="lname" placeholder="Last Name" value="<?php echo $lname; ?>"><br><br>
            <input type="email" name="email" placeholder="Email" value="<?php echo $email; ?>"><br><br>
            <input type="password" name="password" placeholder="Password"><br><br>
            <input type="password" name="confirmpass" placeholder="Confirm Password"><br><br>

            <?php if (!empty($successMessage)): ?>
                <div class='alert alert-success alert-dismissible fade show' role='alert'>
                    <strong><?php echo $successMessage; ?></strong>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
            <?php endif; ?>

            <input type="submit" value="CREATE ACCOUNT" onclick="window.location.href='/adminsim/htmls/read.php'"><br><br>
            <a href="/adminsim/htmls/read.php">Go back to user accounts</a>
        </form>
    </div>
</body>
</html>
