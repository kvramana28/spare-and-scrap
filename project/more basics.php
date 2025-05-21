<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php tutorial</title>
</head>
<style>
.container{
    max-width: 80%;
    background-color: rgb(213, 186, 186);
    margin: auto;
    padding: 23px;
}
</style>
<body>
    <div class="container">
    <h1> Lets learn about PHP </h1>
    <p>your party status is here:</p>
    <?php
    $age = 34;
    if($age>18){
        echo "you can go to the party";
    }
    else{
        echo "you can not go the party";
    }
    $languages = array("python", "c++", "java", "c");
    //loops in php
    $a = 0;
    while ($a <= 10) {
        echo "<br> the  value of a is";
        echo $a;
        $a++;
    }
    ?>
    </div>
</body>
</html>