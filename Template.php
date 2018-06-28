<?php
//Template class 

class Template{
    //Path to template
    protected $template;
    //variable passed in
    protected $vars = array();
    
    //class cunstruct
    
    public function __construct($template){
        $this->template = $template;
        
    }
    //Get Template
    public function __get($key){
        return $this->vars[$key];
    }
    //set template
    public function __set($key,$value){
        $this->vars[$key]=$value;
    }
    //Convert Object to string
    public function __toString(){
        extract($this->vars);
        chdir(dirname($this->template));
        ob_start();
        include basename($this->template);
        return ob_get_clean();
        
    }
}
?>