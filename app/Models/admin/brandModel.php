<?php

include 'app/libaray/DB.php';


class brandModel{
    private $db;
    private $table = "brands";
public function __construct(){

    $this->db = new Database();

}
public function add($data){
    // $this->db->query("INSERT INTO brands(
    //             title, notes,image)
    //      values
    //             (:title, :note,:image)");
                
    // $this->db->bind(':title', $data['title']);
    // $this->db->bind(':note', $data['notes']);
    // $this->db->bind(':image', $data['image']);
    // if ($this->db->execute()){
    //     return true;
    // }else {
    //     return false;
    // }
    $this->db->addfeild($this->table, $data);
}



public function getAll(){
   $this->db->query("SELECT * FROM brands order by id DESC");
   $result =  $this->db->All();
    return $result; 

}
public function deleteModel($id){
    $this->db->query("DELETE FROM brands WHERE id = :id");
    $this->db->bind(':id', $id);
          if ($this->db->execute()){
        return true;
    }else {
        return false;
    }


}

public function getById($id){
    $this->db->query("SELECT * FROM brands WHERE id = :id");
    $this->db->bind(':id', $id);
    $rows = $this->db->ById();
    return $rows;
}

public function edit($id,$data){
    if(!empty($data['image'])){
    $this->db->query("UPDATE brands SET 
                                        title = :title,
                                       notes = :notes,
                                       image = :image
                                        WHERE id = :id" );
                    
      $this->db->bind(':title', $data['title']);
      $this->db->bind(':notes', $data['notes']);
      $this->db->bind(':image', $data['image']);
      $this->db->bind(':id', $id);
    if ($this->db->execute()){
        return true;
    }else {
        return false;
    }

}else{
    $this->db->query("UPDATE brands SET 
    title = :title,
    notes = :notes
    WHERE id = :id" );
    
$this->db->bind(':title', $data['title']);
$this->db->bind(':notes', $data['notes']);
$this->db->bind(':id',$id);
if ($this->db->execute()){
return true;
}else {
return false;
}


}

}}
