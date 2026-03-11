<?php

    if(isset($_GET['name']) && $_GET['name'] != ""){
        $name = urlencode($_GET['name']);
        $response = file_get_contents("https://api.genderize.io/?name=$name");
        $data = json_decode($response , true);

        $gender = $data["gender"];
        $certainty = $data["probability"] * 100 .'%'; 
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Guess Gender from Name </title>
        <style>
            p span{
                font-weight: bold;
            }
        </style>
    </head>
    <body>

        <h1>
            Check the Gender of a Name
        </h1>
        <form>
            <label for="name"> Enter your name: </label>
            <input type="text" name="name" id="name">
            <input type="submit" value="Guess Gender"> 
        </form>

        <?php if(isset($gender) && isset($certainty)){ ?>
        <p>
            <span><?php echo $_GET['name']; ?></span> is <span><?php echo $gender; ?></span> with <span><?php echo $certainty; ?></span> certainty.
        </p>
        <?php
        } ?>
    </body>
</html>

