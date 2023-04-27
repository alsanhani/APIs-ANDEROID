<?php
//include("conn.php");
$dsn = 'mysql:host=localhost;dbname=register_from_android';
$username = 'root';
$password = '';
$options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
); 
$pdo = new PDO($dsn, $username, $password, $options);
//------------------------------------------
if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) ){


    $Uname = $_POST['name'];
	$Uemail = $_POST['email'];
    $Upassword =$_POST['password'];
	
    
    $statement =$pdo->prepare("insert into user values('','$Uname','$Uemail','$Upassword')");
    $statement->execute(); 
	$response = array();
	
	
	 if ($statement) {
            $arr = array();
                    // success
            $response["success"] = "yes";
            $response["message"] = "register success ";

            // echoing JSON response
            echo json_encode($response);
        }
else {
        // no user found
        $response["success"] = "no";
        $response["message"] = "Not register";

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