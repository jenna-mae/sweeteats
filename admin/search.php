<?php
$search = $_POST["search"];

if(is_numeric($search)) {
    echo "number";
} else {
    echo "string";
}

?>