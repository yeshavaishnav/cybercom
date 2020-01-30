<?php
function connection_open()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $databaseName = "cybercom";
    $conn = mysqli_connect($servername, $username, $password, $databaseName);

    if (!$conn) {
        die("connection failed");
    }
    return $conn;
}

function insertData($tableName, $values)
{
    $conn = connection_open();
    $query = "INSERT INTO " . $tableName . "(" . $values[0] . ") VALUES (" . $values[1] . ")";
    if (mysqli_query($conn, $query)) {
        return mysqli_insert_id($conn);
    } else {
        return mysqli_error($conn);
    }
}
function fetchData($tableName, $value, $args = "")
{
    $conn = connection_open();
    $sql = "select " . $value . " from " . $tableName . " " . $args;
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo $row['cust_id'] . " ";
            echo $row['prefix'] . " ";
            echo $row['fname'] . " ";
            echo $row['lname'] . " ";
            echo $row['dob'] . " ";
            echo $row['phone'] . " ";
            echo $row['email'] . " ";
            echo $row['password'] . " ";
            echo "<br>";
        }
    } else {
        echo "no results found";
    }
}
