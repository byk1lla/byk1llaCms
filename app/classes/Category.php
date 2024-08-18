<?php

class Category
{
    private $db;
    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getAll(){
        $sql = "SELECT * FROM categories";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function getPortbytitle($title){
        $sql = "SELECT name FROM categories WHERE name = :name";
        $result = $this->db->prepare($sql);
        $result->bindParam(":name", $title);
        $result->execute();
        return $result->fetch(PDO::FETCH_ASSOC)['name'];

    }
    public function getCategory($id){
        $sql = "SELECT * FROM categories WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function getChildsCount($id){
        $sql = "SELECT COUNT(*) FROM categories WHERE parent_id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetchColumn();
    }
    public function add($name){
        $check= $this->getPortbytitle($name);
        if($name == ""){
            return "empty";
        }
        if($check == $name){
            return "already";
        }
        $sql = "INSERT INTO categories (name) VALUES (:name);";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":name", $name);
        return $stmt->execute();
    }

    public function delete($id){
        $sql = "DELETE FROM categories WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();

    }
    public function update($name, $id){
        $sql = "UPDATE categories SET name = :name WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }

    public function getCategoryName($id){
        $sql = "SELECT name FROM categories WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetchColumn();
    }




    public function count(){
        $sql = "SELECT COUNT(id) FROM categories";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchColumn();

    }
    public function addSubCategory($pid,$name){
        $sql = "INSERT INTO categories (parent_id,name) VALUES(:pid,:name)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":pid", $pid);
        $stmt->bindParam(":name", $name);
        return $stmt->execute();
    }
    public function updateSubCategory($pid,$name){
        $sql = "UPDATE categories SET parent_id = :pid, name = :name WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":pid", $pid);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }


}