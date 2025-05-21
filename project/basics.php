<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Tutorial </title>
</head>
<body>
    <div class="container">
    This is my first php website 
    </div>
    <?php
    echo "Hello world This is printed using php";
    
    $var1 = 5;
    $var2 = 2;
    echo $var1;
    echo $var2;
    echo $var1 + $var2;
    // Arthematic operations
    echo "<br>";
    echo "The value of var1 + var2 is";
    echo $var1 + $var2;
    echo "<br>";
    echo "The value of var1 - var2 is";
    echo $var1 - $var2;
    echo "<br>"; 
    echo "The value of var1 * var2 is";
    echo $var1 * $var2;
    echo "<br>";
    echo "The value of var1 / var2 is";
    echo $var1 / $var2;
    echo "<br>";
    // Assinment operator
    $newvar = $var1;
    $newvar += 1;
    echo "The value of newvar is ";
    echo $newvar;
    echo "<br>";
    // Comparision operators
    echo "The value 1==4 ";
    echo var_dump(1==4);
    
    echo "<br>";
    echo "The value 1!=4 ";
    echo var_dump(1!=4);
    echo "<br>";
    echo "The value 1>=4 ";
    echo var_dump(1>=4);
    echo "<br>";
    echo "The value 1<=4 ";
    echo var_dump(1<=4);
    //inc/dec operations
    echo "<br>";
    echo $var1++ ;
    echo "<br>";
    echo $var1--;
    echo "<br>";
    echo ++$var1;
    echo "<br>";
    echo --$var1;
    
    
    ?>
    <?php
    //echo "Hello world Again";
    ?>
</body>
</html>