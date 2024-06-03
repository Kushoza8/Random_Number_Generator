<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>RANDOM NUMBER GENERATOR USING A DICE</h2>
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
        <br>
        <label><b>How many times to roll dice:</b> </label>
        <input type="text" name="numtimes" value="<?php echo isset($_POST['numtimes']) ? htmlspecialchars($_POST['numtimes']) : ''; ?>">
        <br><br>
        <label><b>Choose A Dice-Type:</b></label>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <select name="dicetype" id="dice">
            <option value="4">4</option>
            <option value="6">6</option>
            <option value="8">8</option>
            <option value="10">10</option>
            <option value="12">12</option>
            <option value="20">20</option>
        </select>
        <br><br>
        <input type="submit" name="show" value="SHOW">
        &nbsp;
        <input type="submit" name="showall" value="SHOW ALL">
        <br>
    </form>

    <?php
    session_start();
    //as our array is storing values across multiple http request,so we use session as it saves values
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["numtimes"]) && isset($_POST["dicetype"])) {
            $num_times = intval($_POST["numtimes"]);
            $dice_type = intval($_POST["dicetype"]);

            if (isset($_POST["show"])) {
                $_SESSION['final_array'] = array(); // Reset array
                for ($i = 0; $i < $num_times; $i++) {
                    $num = rand(1, $dice_type);
                    $_SESSION['final_array'][] = $num;
                    echo "The number you got is {$num}<br>";
                }
            }

            if (isset($_POST["showall"])) {
                if (isset($_SESSION['final_array']) && count($_SESSION['final_array']) == $num_times) {
                    echo "Final result: [ " . implode(", ", $_SESSION['final_array']) . " ]<br>";
                }
            }
        }
    }
    ?>
</body>

</html>

<style>
    #dice {
        width: 100px;
        height: 20px;
    }

    form {
        border: solid;
        height: 200px;
        width: 300px;
        text-align: center;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    h2 {
        text-align: center;
        position: relative;
        top: 180px;
    }

    body {
        background-image: url("https://img.freepik.com/free-photo/lucky-dice-game-background_23-2150971735.jpg");
        background-size: cover;
    }
</style>
