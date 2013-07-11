<?php

/** The Product Class **/

class Product extends Object {
    public function addData($key, $value){
        $key = strtolower($key);
        if($key == 'tags'){
            $value = explode(',',$value);
            array_map('trim',$value);
        }
        return parent::addData($key.$value);
    }
    
    public function getData($key){
        $key = strtolower($key);
        
        return parent::getData($key);
    }
}
