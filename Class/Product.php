<?php

/** The Product Class **/

class Product extends Object {
    public function addData($key, $value){
        $key = strtolower($key);
        if($key == 'tags'){
            $value = explode(',',$value);
            $value = array_map('trim',$value);
            foreach($value as $k => $v){
                if(empty($v)){
                    unset($value[$k]);
                }
            }
        }
        return parent::addData($key,$value);
    }
    
    public function getData($key=null){
        $key = strtolower($key);
        
        return parent::getData($key);
    }
}
