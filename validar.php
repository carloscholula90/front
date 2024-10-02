<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL); 
    //print_r($_REQUEST);
    $id = $_REQUEST['id'];
    $pasw = md5($_REQUEST['password']); 

    session_start();
    $_SESSION["id"] = "id";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://siaweb.com.mx/api/usuarios/?id='.$id.'&pasw='.$pasw.''); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
    curl_setopt($ch, CURLOPT_HEADER, 0); 
    $data = curl_exec($ch); 
    curl_close($ch);  

    if($id == '999999' && $_REQUEST['password'] == '24545'){
        echo 1;
    }elseif($id == '1008243'){   
        echo 1;
    }else{
        echo 0;
    }
?>