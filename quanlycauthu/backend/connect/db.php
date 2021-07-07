<?php
    require_once("config.php");

    function execute($sql){
        $con = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);

        mysqli_query($con, $sql);

        mysqli_close($con);
    }

    function executeResult($sql){
        $con = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);

        $result = mysqli_query($con, $sql);

        $data = [];
        while ($row = mysqli_fetch_array($result, 1)){
            $data[] = $row;
        }

        mysqli_close($con);
        return $data;
    }
    function executeSingleResult($sql) {
        //save data into table
        // open connection to database
        $con = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
        //insert, update, delete
        $result = mysqli_query($con, $sql);
        $row    = mysqli_fetch_array($result, 1);
    
        //close connection
        mysqli_close($con);
    
        return $row;
    }
// require_once('config.php');

// function execute($sql) {
// 	//save data into table
// 	// open connection to database
// 	$con = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
// 	//insert, update, delete
// 	mysqli_query($con, $sql);

// 	//close connection
// 	mysqli_close($con);
// }

// function executeResult($sql) {
// 	//save data into table
// 	// open connection to database
// 	$con = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
// 	//insert, update, delete
// 	$result = mysqli_query($con, $sql);
// 	$data   = [];
// 	while ($row = mysqli_fetch_array($result, 1)) {
// 		$data[] = $row;
// 	}

// 	// //close connection
// 	mysqli_close($con);

// 	return $data;
// }
// function executeSingleResult($sql) {
// 	//save data into table
// 	// open connection to database
// 	$con = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
// 	//insert, update, delete
// 	$result = mysqli_query($con, $sql);
// 	$row    = mysqli_fetch_array($result, 1);

// 	//close connection
// 	mysqli_close($con);

// 	return $row;
// }
?>