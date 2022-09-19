<?php
    header('Content-Type: application/json');
    require_once 'connection.php';

    $response = array();

    //Updateble Parameters-> box_office,stars,
    if(isset($_POST['id']) && isset($_POST['storyline']) && isset($_POST['stars']) && isset($_POST['box_office'])){
    
        //Proceed to update Movie
        $id = $_POST['id'];
        $storyline = $_POST['storyline'];
        $stars = $_POST['stars'];
        $box_office = $_POST['box_office'];
        
        $stmt = $con->prepare("UPDATE movies SET storyline = '$storyline' , stars = '$stars' , box_office = '$box_office'
                                WHERE id = '$id'");
        
        if($stmt->execute()){
            
            //IF successful
            $response['error'] = false;
            $response['message'] = "Movie Updated Successfully !";
            
        }else{
            
            //IF not
            $response['error'] = true;
            $response['message'] = "Unable to Update the Movie !";
            
        }
}else{
    
        //No enough Data to Update Movie
        $response['error'] = true;
        $response['message'] = "Please Provide All the Details !";
    
}

    //Displaying the Results
    echo json_encode($response);

?>
















