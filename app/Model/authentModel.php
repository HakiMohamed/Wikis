<?php

namespace App\Model;

use App\Database\Database;
use PDO ;

class AuthentModel {
    private $db;

    protected $first_name;
    protected $last_name;
    protected $email;
    protected $password;
    protected $id_role;

    public function __construct() {
        $this->db = new Database();
    }

    public function getfirstName() {
        return $this->first_name;
    }
    public function getlastName() {
        return $this->last_name;
    }
    public function getEmail() {
        return $this->email;
    }
    public function getPassword() {
        return $this->password;
    }
    public function getIdRole(){
        return $this->id_role;
    }

    public function setfirstName($first_name) {
        $this->first_name = $first_name;
    }
    public function setlastName($last_name) {
        $this->last_name = $last_name;
    }
    public function setEmail($email) {
        $this->email = $email;
    } 
    public function setPassword($password) {
        $this->password = $password;
    }
    public function setIdRole($id_role){
        $this->id_role=$id_role;
    }


    public function register(){
        $query= "INSERT INTO utilisateurs(name,email,password,id_role) VALUES (?,?,?,?,?)";
        $stmt = $this->db->getConnection()->prepare($query);
        $stmt->execute([$this->first_name,$this->last_name,$this->email,$this->password,$this->id_role]);
        return $stmt;
     
    }



    // public function register($nom, $prenom, $email, $password, $id_role) {
    //     $query = 'INSERT INTO utilisateurs (nom, prenom, email, password, id_role) VALUES (?, ?, ?, ?, ?)';
    //     $stmt = $this->connection->prepare($query);
    //     $stmt->execute([$nom, $prenom, $email, password_hash($password, PASSWORD_DEFAULT), $id_role]);
    //     return $stmt;
    // }
   


 


}