<?php

function db_connect() {                                                                                                

	echo "test1";

    // Define connection as a static variable, to avoid connecting more than once 
    static $connection;

    // Try and connect to the database, if a connection has not been established yet
    if(!isset($connection)) {
         // Load configuration as an array. Use the actual location of your configuration file
        $config = parse_ini_file($_SERVER['DOCUMENT_ROOT'].'/Config/creativebar.ini'); 
        $connection = mysqli_connect('localhost',$config['username'],$config['password'],$config['dbname']);  
    }

    // If connection was not successful, handle the error
    if($connection === false) {
        // Handle error - notify administrator, log to a file, show an error screen, etc.
        echo "connection failed";
        return mysqli_connect_error(); 
    }
    return $connection;
}


	echo "test2";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// Connect to the database
    $connection = db_connect();

    //Submitting entry to database
    $entry = $_POST["entry"];
    $currentTime = time();

    $stmt = mysqli_prepare($connection, "INSERT INTO Entries (Entry, Time) VALUES (?,?);");
            mysqli_stmt_bind_param($stmt, 'ss', $entry, $currentTime);
            mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);
    mysqli_close($connection);

    header("Location: /creativebar/");

    echo "test3";
}


?>