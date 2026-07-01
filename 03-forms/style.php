<?php

header("Content-typetext/css; charset=UTF-8"); 

$first_color = "lightskyblue";
$second_color = "pink";

?>

body {
background-image: <?php echo "linear-gradient($first_color, $second_color);" ?>
}

form {

}
