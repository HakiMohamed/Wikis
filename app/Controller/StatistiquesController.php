<?php




namespace App\Controller;
use App\Database\Database;
use App\Model\StatistiquesModel;




class StatistiquesController {
    public function index(){
       
        $database = new Database();

        
        
        $Statistiquesuser = new StatistiquesModel($database);
       $user="users";
        $Countusers = $Statistiquesuser->getCount($user);


        $StatistiquesEvent = new StatistiquesModel($database);
       $events="events";
        $Countevents = $StatistiquesEvent->getCount($events);

        $StatistiquesTickets = new StatistiquesModel($database);
        $tickets="tickets";
         $Counttickets = $StatistiquesTickets->getCount($tickets);


         $StatistiquesReservations = new StatistiquesModel($database);
         $reservations="reservations";
          $Countreservations = $StatistiquesReservations->getCount($reservations);
 
        
        include_once '../app/View/statistiques.php';
    }


  

}











