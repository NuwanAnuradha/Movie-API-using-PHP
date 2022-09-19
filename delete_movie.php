<?php
    header('Content-Type: application/json');
    require_once 'connection.php';

    $response = array();

    //Provide Movvie ID
    if(isset($_POST['id'])){
        
        //Proceed to Delete the Movie
        $id = $_POST['id'];
        
        $stmt = $con->prepare("DELETE FROM movies WHERE id = ? LIMIT 1");
        $stmt->bind_param('i',$id);
        
        if($stmt->execute()){
            //Success
            $response['error'] = false;
            $response['message'] = "Movie Deleted Successfully !";
            
        }else{
            //IF Failed
            $response['error'] = true;
            $response['message'] = "Unable to Delete the Movie !";
        }
        
        
    }else{
        
        //Unable to Delete Movie because of Movie is not Specified
        $response['error'] = true;
        $response['message'] = "Please Provide the Movie ID !";
    }
    
    //Displaying the Results
    echo json_encode($response);

?>




