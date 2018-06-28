<?php require('core/init.php');?>
<?php
$view = new View;
//Get template Assign Var
$template = new Template('templates/index.php');

//Assign Variable 
$template->projects = $view->getAllProjects();

if(isset($_POST['sendMessage'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $message = $_POST['message'];
        
        $header = "From:" .$email. "and" .$phone. "\r\n";
        $header .= "X-Mailer: PHP /" .phpversion(). "\r\n";
        $header .= "Mime Version: 1.0 \r\n";
        
        $comment = "This message has been sent by " .$name. "\r\n";
        $comment .= "Email: " .$email. "\r\n";
        $comment .= "Phone Number: " .$phone. "\r\n";
        $comment .= "Message: " .$message. "\r\n";
        
        $for = "virtues.epc@gmail.com";
        $subject = "Contact from website";
        
        mail($for,$subject, utf8_decode($comment));
        
        redirect('index.php','Thank you for your Message, We will reply soon!.');
}
//Display the template
echo $template;
?>