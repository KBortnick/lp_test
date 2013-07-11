<?php

/** The Object Class * */
class Object {

    private $data = array();

    public function __construct($data) {
        if (is_array($data)) {
            foreach ($data as $key => $value) {
                $this->addData($key, $value);
            }
        }
    }
    
    public function cleanKey($key){
        return preg_replace('/[^a-z0-9_]/i', '', strtr(trim($key),' ','_'));
    }

    public function addData($key, $value) {
        $key = $this->cleanKey($key);
        $this->data[$key] = $value;
    }

    public function getData($key = null) {
        if ($key) {
            $key = $this->cleanKey($key);
            if(isset($this->data[$key])){
                return $this->data[$key];
            }
            return null;
        } else {
            return $this->data;
        }
    }

}
