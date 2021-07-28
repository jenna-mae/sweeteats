<?php

function connect() {
    return mysqli_connect("localhost", "jennamae_ecomphp", "dbpass123", "jennamae_ecomphp");
    // return mysqli_connect("localhost", "root", "root", "ecom");
}

function getSingleRecord($sql) {
    $results = mysqli_query(connect(), $sql);
    return mysqli_fetch_assoc($results);
}

function getAllRecords($sql) {
    $results = mysqli_query(connect(), $sql);

    $data = array();
    
    while ($row = mysqli_fetch_assoc($results)) {
        $data[] = $row;
    }
    return $data;
}

function doQuery($sql) {
    $results = mysqli_query(connect(), $sql);
}

function confirmLogin() {
    if(!isset($_SESSION["id"])) {
        header("location: index.php");
    }
}

function makeDropDown($sql, $selectedId, $name ) {
    $records = getAllRecords($sql);

    echo "<select name='".$name."'>
    <option>Select One</option>";
    
    foreach($records as $record) {
        $isSelected = ($record["id"] == $selectedId) ? "selected" : "";
        echo "<option value='".$record["id"]."' ".$isSelected.">".$record["name"]."</option>";
    }
    echo "</select>";
}

?>