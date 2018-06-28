<?php
class Add{
    //init DB Variable
    private $db;
    
    //Construct
    public function __construct(){
        $this->db = new Database;
    }
    //add project
    public function addProject($data){
        //insert query
        $this->db->query('INSERT INTO tbl_project (project_name,image_name) VALUES (:project_name,:image_name)');
        $this->db->bind(':project_name',$data['project_name']);
        $this->db->bind(':image_name',$data['image_name']);
        
        //execution
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
}
?>