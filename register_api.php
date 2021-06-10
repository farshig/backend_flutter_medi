<?php 

require "config.php";

if($_SERVER['REQUEST_METHOD'] == "POST"){

    $response = array();
    $full_name = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $password = md5($_POST['password']);

    $query_cek_user = mysqli_query($connection,"SELECT * FROM user WHERE email = '$email' || phone = '$phone'");
    $query_cek_result = mysqli_fetch_array($query_cek_user);
     
    if($query_cek_result){

        $response['value'] = 0 ;
        $response['massage'] = "Oops, Sory data has been register !";
        echo json_encode($response);
    }
    else{
     $query_insert_user = mysqli_query($connection," INSERT INTO user VALUE('','$full_name','$email','$phone','$address','$password',NOW(),1)");
      if($query_insert_user){
        $response['value'] = 1 ;
        $response['massage'] = "Yeay, Register is successfull,Please log in with your account";

        echo json_encode($response);

      }else{

        $response['value'] = 2;
        $response['massage'] = "Oops,Register faild";
        echo json_encode($response);

      }
   
    }


}



?>