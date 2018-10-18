<?php
    function custom_echo($text, $length)
    {
        if(strlen($text) <= $length)
        {
            echo $text;
        }
        else
        {
            $limited_text = substr($text,0,$length) . ' ...';
            echo $limited_text;
        }
    }
    function redirect($url){
        header("Location: " .  $url);
        exit;
    }
?>