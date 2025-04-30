<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<style>
    body {
        background-color: black;
        font-family:Arial, Helvetica, sans-serif;
    }
    .texts {
        color: white;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 85vh;
    }
    .texts h3 {
        font-size: 53px;
    }
    .texts h1 {
        font-size: 55px;
    }
    .texts p {
        margin-top: -15px;

    }
    .btn {
        background-color: purple;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 50%;
    }
</style>
<body>
<div class="texts">
<h3 style="font-style:;text-align:center; ">Welcome to</h3>
<h1 style="font-style:;white; text-align: center">Admin Simulator</h1>
<p>Simple crud operation system</p>
<button class="btn" onclick="window.location.href='/adminsim/htmls/read.php'">START</button>
</div>
<footer style="color: white; text-align: center; margin-top: -15;"> 
<p>Made By LeftoverRice</p> 
</footer>  
</body>
</html>
