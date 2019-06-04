<?php
function autoLoad($class_name) {
    spl_autoload_register(function($class_name){
        include '/classes'. '/' . $class_name . 'php';
    }); 
}


?>