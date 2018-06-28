<?php 
function urlFormat($str){
    
    //stripout the whitespace
    $str = preg_replace('/\s*/','',$str);
    
    // Convert the string to all lowercase
    
    $str = strtolower($str);
    
    //URL encode
    
    $str = urlencode($str);
    
    return $str;
}

function dateFormat($date){
    $date = date("F j, Y, g:i a", strtotime($date));
    return $date;
}
function dateFormat1($date){
    $date = date("F j, Y", strtotime($date));
    return $date;
}
function timeFormat($time){
    $time = date("g:i a", strtotime($time));
    return $time;
}
/*shorten text*/
function shortenText($text,$chars=350){
    $text=$text." ";
    $text=substr($text,0,$chars);
    $text=substr($text,0,strrpos($text,' '));
    $text=$text."...";
    return $text;
}
/*Getting youtube id*/
function youtubeID($url){
     $res = explode("?",$url);
     if(isset($res[0])) {
        $res1 = explode('/',$res[0]);
        if(isset($res1[4])){
            return $res1[4];
        }
     }
 }
?>