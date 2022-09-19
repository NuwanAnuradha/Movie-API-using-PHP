<?php
    header('Content-Type: application/json');
    require_once 'connection.php';

    $response = array();

    if(isset($_POST['title']) && isset($_POST['storyline']) && isset($_POST['lang']) && isset($_POST['genre'])
        && isset($_POST['release_date']) && isset($_POST['box_office']) && isset($_POST['run_time']) && isset($_POST['stars'])){
        
        //Store Parameters in Variables
        $title = $_POST['title'];
        $storyline = $_POST['storyline'];
        $lang = $_POST['lang'];
        $genre = $_POST['genre'];
        $release_date = $_POST['release_date'];
        $box_office = $_POST['box_office'];
        $run_time = $_POST['run_time'];
        $stars = $_POST['stars'];
        
        //Getting All Parameters
        $stmt = $con->prepare("INSERT INTO movies (title,storyline,lang,genre,release_date,box_office,run_time,stars)
                        VALUES (?,?,?,?,?,?,?,?)");
        $stmt->bind_param('sssssdsd',$title,$storyline,$lang,$genre,$release_date,$box_office,$run_time,$stars);
        
        //Executing the Query
        if($stmt->execute()){
            //Success
            $response['error'] = false;
            $response['message'] = "Movie Inserted Successfully !";
            
            $stmt->close();
        }else{
            //IF Failed
            $response['error'] = true;
            $response['message'] = "Unable to Insert the Movie !";
        }
        
    }else{
        
        //Got an issue with tal=king parameters
            $response['error'] = true;
            $response['message'] = "Provide Sufficient Details !";
    }
    //Displaying the Results
    echo json_encode($response);
?>










