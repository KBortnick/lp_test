<?php

/** Convert CSV into array of product data arrays **/
function parseCSV(){
  $csv = file_get_contents('product_list_import.csv');
  
  $rows = explode("\n");
  
  $name_fields = array_shift($rows);
  $name_fields = str_getcsv($name_fields);
  
  $products = array();
  $i = 0;
  foreach($rows as $row){
    $fields = str_getcsv($row);
    foreach($fields as $k => $v){
      $products[$i][$name_fields[$k]] = $v;
    }
    $i++;
  }
  return $products
}

/** Get collection of Products **/
function getProducts(){
  $product_arrays = parseCSV();
  
  $product_collection = array();
  foraech($product_arrays as $details){
    $product_collection[] = new Product($details);
  }
  return $product_collection;
}


/** Product class **/
class Product {
  private $data = array();
  
  
  public function __construct($data){
    if(is_array($data)){
      foreach($data as $key => $value){
        $this->addData($key,$value);
      }
    }
  }
  
  public function addData($key,$value){
    $this->data[$key] = $value;
  }
  
  public function getData($key=null){
    if($key){
      return $this->data[$key];
    }
    else{
      return $this->data;
    }
  }
  
}


?>