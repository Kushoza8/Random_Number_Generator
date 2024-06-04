<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="<?php $_SERVER["PHP_SELF"] ?>" method="post" id="center">
    <br>
        <label><b>ENTER NUMBER:</b></label>
        <input type="text" name="num">
        <br><br>
        <label><b>ENTER NAME:  </b></label>&nbsp;&nbsp;&nbsp;
        <input type="text" name="name">
        <br><br>
        <div id="center1">
            <input type="submit" name="btn1" value="submit">
        </div>
        <br>
    </form>
</body>

</html>
<style>
    #center{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%);
        border: solid;
        background-color: orange;
    }
    #center1{
        display: flex;
        justify-content: center;
    }
    body{
        background-color: yellowgreen;
    }
</style>
<?php
error_reporting(0);
$num1 = $_POST["num"];
$_SESSION["number"] = $num1;

$names = $_POST["name"];
$_SESSION["name"] = $names;

if (isset($_POST["btn1"])) {
    header("Location:http://localhost/demo/SAMPLE%20PROJECTS/sessions1_demo.php");
}
