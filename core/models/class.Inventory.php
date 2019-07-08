<?php

/*
CREATE TABLE IF NOT EXISTS inventory (
  `id_inventory` INT AUTO_INCREMENT,
    `descrip_product` VARCHAR(255) NOT NULL,
    `marc_product`  VARCHAR(70) NOT NULL,
    `model_product` VARCHAR(70) NOT NULL,
    `serial_product` VARCHAR(70) NOT NULL,
    `select_category` VARCHAR(70) NOT NULL,
    `date_purchase` DATE,
    `bill_num` VARCHAR(70) NOT NULL,
    `quantity` INT(10) NOT NULL,
    `select_department` VARCHAR(50) NOT NULL,
    `cost_center` VARCHAR(50) NOT NULL,
    `warranty_date` DATE,
    `amount` DOUBLE NOT NULL,
    `id_user_img` INT(10) NOT NULL,
    `register_date` DATE,
    PRIMARY KEY (id_inventory)
)  ENGINE=INNODB; 
*/

require_once '../core.php';

class inventory
{
  public $codeQr;

  public function getAllArticles(){
    $db = new ConexionDB();
    $sql = $db->query('SELECT * FROM inventory');

    if ($sql->num_rows > 0) {

        while ($res = $sql->fetch_assoc()){
          $data[] = $res;          
        }  
        echo json_encode($data);
        
    }
  }

  public function getArticle($code){
    $this->codeQr = $code;
    $db = new ConexionDB();
    $sql = $db->query("SELECT * FROM inventory WHERE code_qr ='$this->codeQr'");

    if ($sql->num_rows > 0) {

        while ($res = $sql->fetch_assoc()){
          $data = $res;          
        }  
        echo json_encode($data);        
    }else{
      echo json_encode(false);  
    }
  }

  public function updateArticle($code){
    $this->codeQr = $code;
    $db = new ConexionDB();
    $sql = $db->query("SELECT * FROM inventory WHERE id_inventory ='$this->codeQr'");

    if ($sql->num_rows > 0) {

        while ($res = $sql->fetch_assoc()){
          $data = $res;          
        }  
        echo json_encode($data);
        
    }
  }


  public function getFilterArticle($data){
    $this->data = $data;
    $db = new ConexionDB();
    $sql = $db->query("SELECT A.* FROM inventory A WHERE A.descrip_product LIKE '%$this->data%' OR A.marc_product LIKE '%$this->data%' OR A.model_product LIKE '%$this->data%' OR A.serial_product LIKE '%$this->data%' OR A.bill_num LIKE '%$this->data%' OR A.cost_center LIKE '%$this->data%'");
    if ($sql->num_rows > 0) {
      while ($res = $sql->fetch_assoc()){        
        $data = $res;          
      }  
      echo json_encode($data);

    } else {
      $arrayName = array('success' => 'no encontrado');
      echo json_encode($arrayName);
    }
  }
}




?>