<?php

include 'app/libaray/DB.php';
include 'app/libaray/connection.php';

class productModel{
    private $db;
public function __construct(){

    $this->db = new Database();
    $this->dbh  = connection::getInstance();

}
public function getAll(){
   $this->db->query("SELECT * FROM products order by id DESC");
   $result =  $this->db->All();
    return $result; 

}
public function deleteModel($id){
    $this->db->query("DELETE FROM products WHERE id = :id");
    $this->db->bind(':id', $id);
          if ($this->db->execute()){
        return true;
    }else {
        return false;
    }
    
}

public function getById($id)
{
 $this->db->query("SELECT * FROM products WHERE id = :id");
 $this->db->bind(':id',$id);
 $result = $this->db->ById();
 return $result;

}
public function edit($id,$data)
    {

  return   $this->dbh->updateCustom('products',$data,$id);
   
    
}


public function add($data){
    
		
    $this->db->query("INSERT INTO products(
                title, price_before, price_after, description,notes,status,attrubites,quantity,small_description,category_id,image,latest,image_group)
         values
                (:title, :price_before, :price_after, :description,:notes,:status,:attributes,:quantity,:small_description,:category,:image,:latest,:image_group)");
                
    $this->db->bind(':title', $data['title']);
    $this->db->bind(':price_before', $data['price_before']);
    $this->db->bind(':price_after', $data['price_after']);
    $this->db->bind(':description', $data['description'] );
    $this->db->bind(':notes', $data['notes'] );
    $this->db->bind(':status', $data['status'] );
    $this->db->bind(':attributes', $data['attributes'] );
    $this->db->bind(':quantity', $data['quantity'] );
    $this->db->bind(':small_description', $data['smalldescription']);
    $this->db->bind(':category', $data['category']);
    $this->db->bind(':image', $data['img']);
    $this->db->bind(':latest', $data['order']);
    $this->db->bind(':image_group', $data['images']);
  
    if ($this->db->execute()){
    return true;
    }else {
        return false;
    }



}

public function getCat(){
     $this->db->query("SELECT * FROM categories");
     $cat = $this->db->All();
     return $cat;
}


public function getCount(){

    $this->db->query("SELECT COUNT(*) as prod FROM products  ");
    $result =  $this->db->All();
     return $result; 
}


}
