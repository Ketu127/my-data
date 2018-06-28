<?php
class Delete{
    //init Db Variable
    
    private $db;
    
    /*Constructer*/
    
    public function __construct(){
        $this->db = new Database;
    }
    public function deleteProjectById($project_id){
        $this->db->query("DELETE FROM tbl_project WHERE project_id = $project_id");
        //execution 
		if($this->db->execute()){
			return true;
		}else{
			return false;
		}
    }
}