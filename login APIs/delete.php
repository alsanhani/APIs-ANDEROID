<?php
include("conn.php");

//------------------------------------------
if(isset($_POST['name'])){


    $Uname = $_POST['name'];
	
	
    
    $statement =$pdo->prepare("DELETE FROM `user` WHERE name='$Uname'");
    $statement->execute(); 
	$response = array();
	
	
	 if ($statement) {
            $arr = array();
                    // success
            $response["success"] = "yes";
            $response["message"] = "delete success ";

            // echoing JSON response
            echo json_encode($response);
        }
else {
        // no user found
        $response["success"] = "no";
        $response["message"] = "Not delete";

        // echo no users JSON
        echo json_encode($response);
    }		
}

 else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) empty";

    // echoing JSON response
    echo json_encode($response);
}
?>

<form method="POST">
<input type="text" name="name"/>
<input type="text" name="email"/>
<input type="password" name="password"/>
<input type="submit">
</form>