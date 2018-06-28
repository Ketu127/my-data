<?php

class View{
    //init Db Variable
    
    private $db;
    
    /*Constructer*/
    
    public function __construct(){
        $this->db = new Database;
    }
    //get all member
    public function getAllProjects(){
        $this->db->query("SELECT * FROM tbl_project");
        
        //assign resultset
        
        $results = $this->db->resultset();
        return $results;
    }
     //Get Image name by id
    public function getImageNameById($project_id){
        $this->db->query("SELECT image_name FROM tbl_project where project_id = $project_id");
        $results = $this->db->resultset();
        return $results;
    }
    
}

?>