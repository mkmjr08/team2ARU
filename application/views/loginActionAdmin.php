<?php
include("config.php");
session_start();
if($_SESSION["email"]!=null)
    {   
        try{
            $email=$_SESSION["email"];
            $password=$_SESSION["password"];
            $sqlQuery="SELECT * FROM tbl_admincredentionals";
            $result = $dbo->query($sqlQuery);
            $row = $result->fetch(PDO::FETCH_ASSOC);
            if($row['admin_UserName']==$email){
                if(password_verify($password,$row['admin_Password'])){
                    $_SESSION["password"]="Nahhhhh";
                    $password="reset";
                    $_SESSION["statusAdmin"]="active";
                    echo "<script>window.location='index.php';</script>";
                }
                else{
                    echo "<script>alert('Incorrect Password');</script>";
                    echo "<script>window.location='../signin.php';</script>";
                }
            }
            else{
                echo "<script>alert('Incorrect Username');</script>";
                echo "<script>window.location='../signin.php';</script>";
            }
        }
        catch (PDOException $e)
        {
            echo 'Query error.';
            die();
        }
    }
?>