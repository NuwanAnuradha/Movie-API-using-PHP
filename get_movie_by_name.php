<?php
    header('Content-Type: application/json');
    require_once 'connection.php';

    $response = array();

    if(isset($_GET['title'])){
        
        //Clear and Go to Get the Movie
        
        $title = $_GET['title']; //Get Request Parameter, which has the Title
        $stmt = $con->prepare("SELECT id,title,storyline,lang,genre,release_date,box_office,run_time,stars 
                FROM movies WHERE title = ?");
        $stmt->bind_param("s",$title);
        
        if($stmt->execute()){
            //Success then
            $stmt->bind_result($id,$title,$storyline,$lang,$genre,$release_date,$box_office,$run_time,$stars);
            $stmt->fetch();
            
            $movie = array(
                'id'=>$id,
                'title'=>$title,
                'storyline'=>$storyline,
                '$lang'=>$lang,
                'genre'=>$genre,
                'release_date'=>$release_date,
                '$box_office'=>$box_office,
                'run_time'=>$run_time,
                'stars'=>$stars
            );
            
            $response['error'] = false;
            $response['movie'] = $movie;
            $response['message'] = "Movie Returned Successfully !";
            
        }else{
            //Failure then
            $response['error'] = true;
            $response['message'] = " Couldn't Get the Movie !";
        }
    }else{
        
        //No Movie Title Was Provided or Found
        $response['error'] = true;
        $response['message'] = "Please Provide Movie title !";
        
    }
    
    //Displaying the Results
    echo json_encode($response);

?>








