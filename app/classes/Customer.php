<?php

class Customer
{
    private $db;
    public function __construct(PDO $db)
    {
        $this->db = $db;
    }
    public function getComments(){
        $sql = "SELECT * FROM testimonials";
        $stmt = $this->db->query($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addComment($comment,$customerName){
        $sql = "INSERT INTO testimonials(customer_name,comment) VALUES(:comment,:customer_name)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':comment',$comment);
        $stmt->bindParam(':customer_name',$customerName);
        $stmt->execute();
        return $this->db->lastInsertId();
    }

    public function addMessage($message,$customerName,$subject,$email,$phone){
        $sql = "INSERT INTO contact_messages(name,email,subject,message,phone) VALUES(:name,:email,:subject,:message,:phone)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':name',$customerName);
        $stmt->bindParam(':email',$email);
        $stmt->bindParam(':subject',$subject);
        $stmt->bindParam(':message',$message);
        $stmt->bindParam(':phone',$phone);
        $stmt->execute();
        return $this->db->lastInsertId();

    }

    public function deleteComment($id){
        $sql = "DELETE FROM testimonials WHERE id=:id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id',$id);
        return $stmt->execute();

    }

    public function getMessage($id){
        $sql = "SELECT * FROM contact_messages WHERE id=:id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id',$id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);

    }

    public function deleteMessage($id){
        $sql = "DELETE FROM contact_messages WHERE id=:id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id',$id);
        return $stmt->execute();
    }
    public function getComment($id){
        $sql = "SELECT * FROM testimonials WHERE id=:id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id',$id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function count(){
        $sql = "SELECT COUNT(id) FROM testimonials";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchColumn();

    }
    public function updateComment($id,$customerName,$comment){
        $sql = "UPDATE testimonials SET customer_name=:customer_name,comment=:comment WHERE id=:id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id',$id);
        $stmt->bindParam(':customer_name',$customerName);
        $stmt->bindParam(':comment',$comment);
        return $stmt->execute();
    }
    public function countMessages(){
        $sql = "SELECT COUNT(id) FROM contact_messages";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchColumn();
    }
    public function getMessages(){
        $sql = "SELECT * FROM contact_messages";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}