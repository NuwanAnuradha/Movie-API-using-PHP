<?php
    header('Content-Type: application/json');
    require_once 'connection.php';

    $response = array();


    $stmt = $con->prepare("SELECT * FROM movies"); //mysql Statement/Query
    //$stmt->execute();

    if($stmt->execute()){
        //Checking if statement was executed successfully
        $movies = array(); //Array to Store all the results
        $result = $stmt->get_result(); //Taking all the results from DB
        
        //loop and get each single row
        while($row = $result->fetch_array(MYSQLI_ASSOC)){
            $movies[] = $row;
        }
        
        $response['error'] = false;
        $response['movies'] = $movies;
        $response['message'] = "Movies Returned Successfully !";
        $stmt->close();
        
    }else{
        
        $response['error'] = true;
        $reesponse['message'] = "Could Not Execute the Query !";
    }
    //Displaying the Results
    echo json_encode($response);

?>