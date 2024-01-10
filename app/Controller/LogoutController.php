<?php
namespace App\Controller;

class LogoutController {
    public function index() {
        
        
        $_SESSION = [];
        
        session_destroy();
        
        header("Location: ?uri=/login");
        exit();
    }
}
?>
