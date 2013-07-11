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

    public function addData($key, $value) {
        $key = strtolower($key);
        $this->data[$key] = $value;
    }

    public function getData($key = null) {
        if ($key) {
            $key = strtolower($key);
            if(isset($this->data[$key])){
                return $this->data[$key];
            }
            return null;
        } else {
            return $this->data;
        }
    }

}
