<?php
include("conn.php");

//------------------------------------------
if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) ){


    $Uname = $_POST['name'];
	$Uemail = $_POST['email'];
    $Upassword =$_POST['password'];
	
    
    $statement =$pdo->prepare("UPDATE user SET  email='$Uphone',password='$Upassword'WHERE name='$Uname'  ");
    $statement->execute(); 
	$response = array();
	
	
	 if ($statement) {
            $arr = array();
                    // success
            $response["success"] = "yes";
            $response["message"] = "update success ";

            // echoing JSON response
            echo json_encode($response);
        }
else {
        // no user found
        $response["success"] = "no";
        $response["message"] = "Not update";

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