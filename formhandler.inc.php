<?php
#formhandler.inc.php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $userid = $_POST["userid"];
    $passcode = $_POST["passcode"];
    try{
        require_once "dbh.inc.php";
        $query = "INSERT INTO users (userid,passcode) VALUES (:userid,:passcode);";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":userid",$userid);
        $stmt->bindParam(":passcode",$passcode);
        $stmt->execute();
        $pdo = null;
        $stmt = null;
        header("Location: ../index.php")
        die();
    } catch (PDOException $e){
        die("Query failed: " . $e->getMessage());
    }
}else{
    header("Location: ../index.php");
} 