<?php
function redirect($page = FALSE, $message = NULL, $message_type = NULL){
	/* redirect to page */
	if(is_string ($page)){
		$location = $page;
	}else{
		$location = $_SERVER['SCRIPT_NAME'];
	}
	//Check For Message
	if($message != NULL){
		//set message
		$_SESSION['message'] = $message;
	}
	//Check For Type 
	if($message_type != NULL){
		//Set message type
		$_SESSION['message_type'] = $message_type;
	}
	//Redirect
	header('Location:'.$location);
	exit;
}
function displayMessage(){
    if(!empty($_SESSION['message'])){
        //Assign Message var
        
        $message = $_SESSION['message'];
        echo '<div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                            </button>'. $message . '</div>';
        
        //unset message
        unset($_SESSION['message']);
        unset($_SESSION['message_type']);
    }else{
        echo "";
    }
    }
function displayMessage2(){
    if(!empty($_SESSION['message'])){
        //Assign Message var
        
        $message = $_SESSION['message'];
       if(!empty($_SESSION['message_type'])){
            //Assign Message type
            $message_type = $_SESSION['message_type'];
            //Create Output
            if($message_type == 'error'){
                echo '<div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                            </button>'. $message . '</div>';
            }elseif($message_type == 'success'){
                echo '<div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                            </button>'. $message . '</div>';
            }
        }
        //unset message
        unset($_SESSION['message']);
        unset($_SESSION['message_type']);
    }else{
        echo "";
    }
    }
function displayMessage3(){
    if(!empty($_SESSION['message'])){
        //Assign Message var
        
        $message = $_SESSION['message'];
        echo '<script type="text/javascript">';
        echo "$('.bd-example-modal-sm').modal('show')";
        echo '</script>';
        
        
        //unset message
        unset($_SESSION['message']);
        unset($_SESSION['message_type']);
    }else{
        echo "";
    }
    }
function isLoggedIn(){
    if(isset($_SESSION['is_logged_in'])){
        return true;
    }else{
        return false;
    }
    
}
function getUser(){
    $userArray = array();
    $userArray['user_id'] = $_SESSION['user_id'];
    $userArray['username'] = $_SESSION['user_name'];
    return $userArray;
}
function login($username,$password){
    if($username == "virtues.epc@gmail.com" && $password == "virtues_admin@77477"){
        $_SESSION['is_logged_in']=true;
        $_SESSION['user_name']= $username;
        return true;
    }else{
        return false;
    }
}
function logout(){
    /*User logout*/
        unset($_SESSION['is_logged_in']);
        unset($_SESSION['user_name']);
        return true;
    }
function resizeImage($file_tmp,$file_ext,$file_name_new){
    $thumbnail_path='../images/thumbnail/'.$file_name_new;
    list($width,$height) = getimagesize($file_tmp);
    if($file_ext=='png'){
        $new_image = imagecreatefrompng($file_tmp);
    }elseif($file_ext=='jpg'|| $file_ext=='jpeg'){
        $new_image=imagecreatefromjpeg($file_tmp);
    }
    $new_width = 200;
    $new_height = ($height/$width)*200;
    $tmp_image = imagecreatetruecolor($new_width,$new_height);
    imagecopyresampled($file_tmp,$new_image,0,0,0,0,$new_width,$new_height.$width,$height);
    imagejpeg($file_tmp,$thumbnail_path,100);
    imagedestroy($new_image);
    imagedestroy($file_tmp);
}
?>
