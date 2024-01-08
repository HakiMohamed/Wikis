<?php




namespace App\Controller;
use App\Database\Database;
use App\Model\UserModel;




class DashboardController {
    public function index(){
        $database = new Database();

        
        $userModel = new UserModel($database);

        $users = $userModel->getUsersWithRoles();

        include_once '../app/View/dashboard.php';
    }


    public function supprimerUtilisateur($userId) {

        $database = new Database();
        
        
        
        $userModel = new UserModel($database);
        $userModel->supprimerUtilisateur($userId);
    
        
        header("location:http://localhost/You-event/public/Dashboard");
        exit();
    }


    public function updateUser() {
        if(!empty($_POST['user_id']) && !empty($_POST['new_role_id'])){
            $userId =$_POST['user_id'];
            $newRoleId =$_POST['new_role_id'];
            
            $database = new Database();
            $userModel = new UserModel($database);
            
             $userModel->modifierUtilisateur($userId, $newRoleId);
        }
        header("Location: http://localhost/You-event/public/Dashboard");

        
}


public function SearchUser(){
    if(!empty($_POST['keySearch'])){
        $keySearch =$_POST['keySearch'];
        $database = new Database();
        $userModelsearch = new UserModel($database);
        
         $userfound = $userModelsearch->SearchUtilisateur($keySearch);
         include_once '../app/View/search.php';
    }

}

}

