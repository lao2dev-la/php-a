<?php
// var_dump($_POST);
// exit();
if(isset($_POST['username'])){
    require_once("./condb.php");
    $username = $_POST["username"];
    $password = md5($_POST["password"]);
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $userlevel ="M";

    //ບັນທຶກລົງຖານຂໍ້ມູນ
    $sql = $conn->prepare("INSERT INTO users 
    (username,password,firstname,lastname,userlevel) 
    VALUES
    (:username,:password,:firstname,:lastname,:userlevel)
    ");
    $sql->bindParam(':username',$username,PDO::PARAM_STR);
    $sql->bindParam(':password',$password,PDO::PARAM_STR);
    $sql->bindParam(':firstname',$firstname,PDO::PARAM_STR);
    $sql->bindParam(':lastname',$lastname,PDO::PARAM_STR);
    $sql->bindParam(':userlevel',$userlevel,PDO::PARAM_STR);
    $result = $sql->execute();
if($result){
    echo "<script> 
    alert('ok');
    window.open('admin_page.php');
    </script>";
}else{
    echo "<script> 
    alert('error');
    window.open('formAdd.php');
    </script>";
}
}
?>