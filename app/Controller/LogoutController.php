<?php
namespace App\Controller;

class LogoutController {
    public function index() {
        
        
        
        
        session_destroy();
        
        header("Location:http://localhost/wikis/Home");
        exit();
    }
}
?>
