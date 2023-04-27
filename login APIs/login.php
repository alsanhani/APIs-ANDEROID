<?php
include("conn.php");
// check for POST data
if (isset($_POST['email']) && isset($_POST['password']) ) {

   $Uemail=$_POST['email'];
	$Upassword=$_POST['password'];

$statement =$pdo->prepare("SELECT * FROM user WHERE email ='$Uemail' and password='$Upassword'");
  $statement->execute(); 
     $row=$statement->fetch(PDO::FETCH_ASSOC); 
	 $response["user"]=array();
    if (!empty($row)) {
            $arr = array();
            $arr["email"] = $row["email"];
			$arr["password"]  = $row["password"];
                    // success
            $response["success"] = "yes";
            $response["message"] = "login success ";
            array_push($response["user"], $arr);

            // echoing JSON response
            echo json_encode($response);
        } 
		
		else {
        // no user found
        $response["success"] = "no";
        $response["message"] = "No user found";

        // echo no users JSON
        echo json_encode($response);
    }
}


 else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";

    // echoing JSON response
    echo json_encode($response);
}
?>

<form method="POST">
<input type="text" name="email">
<input type="password" name="password">
<input type="submit">
</form>