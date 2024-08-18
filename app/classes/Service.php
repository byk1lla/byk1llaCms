<?php

class Service
{



    private $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }
    public function getPortbytitle($title){
        $sql = "SELECT title FROM services WHERE title = :title";
        $result = $this->db->prepare($sql);
        $result->bindParam(':title', $title);
        $result->execute();
        return $result->fetch(PDO::FETCH_ASSOC)['title'];

    }
    public function getAll()
    {
        $sql = "SELECT * FROM services";
        $result = $this->db->query($sql);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get($id)
    {
        $sql = "SELECT * FROM services WHERE id = :id";
        $result = $this->db->prepare($sql);
        $result->execute(array('id' => $id));
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function count()
    {
        $sql = "SELECT COUNT(id) FROM services";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchColumn();

    }

    public function add($title, $description )
    {
        $check = $this->getPortbytitle($title);
        if ($check == $title) {
            return "already";
        } else {

            $sql = "INSERT INTO services";
            $sql .= "(title,description) ";
            $sql .= "VALUES (:title,:description)";
            $result = $this->db->prepare($sql);
            $result->execute(array(
                'title' => $title,
                'description' => $description,
            ));
            return
                $this->db->lastInsertId()
//                $check
                ;
        }


    }


    public function update($id, $title, $description)
    {
        $sql = "UPDATE services
        SET title = :title";
        $sql .= " ,description = :description";
        $sql .= " WHERE id = :id";
        $result = $this->db->prepare($sql);
        return $result->execute(array(
            'id' => $id,
            'title' => $title,
            'description' => $description,
        ));
        
    }

    public function delete($id)
    {
        $sql = "DELETE FROM services";
        $sql .= " WHERE id = :id";
        $result = $this->db->prepare($sql);
        return $result->execute(array('id' => $id));

    }


}