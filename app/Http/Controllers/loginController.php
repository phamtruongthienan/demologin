<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
session_start();
class loginController extends Controller
{
    public function xulyLogin(Request $request){
        if(isset($_POST['username']) && isset($_POST['password'])){
            $username =$request->username;
            $password = $request->password; 
            if($username=='admin' && $password=='123456'){
                $_SESSION['user'] = $_POST['username'];
                if(isset($_POST['remember']) && $_POST['remember']==1){
                    setcookie('user',$_POST['username'],time()+180);
                }
                // header('Location:home.php');
                echo 'đăng nhập thành công';
            }
            else{
                $_SESSION['error'] = "Sai thông tin đăng nhập";
                // header('Location:login.php');
                echo "Sai thông tin đăng nhập";
            }
        }
        else{
            $_SESSION['error'] = "Vui lòng nhập đầy đủ thông tin";
            // header('Location:login.php');
            echo "Vui lòng nhập đầy đủ thông tin";
        }
    }
}
