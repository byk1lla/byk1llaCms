<?php

Class User{
    private $db;
    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function login($username, $password){
        if($username && $password){
            $user = $this->getUserByUsername($username);
            if($user){
                if(password_verify($password, $user["password"])){
                    $_SESSION["id"] = $user["id"];
                    $_SESSION["username"] = $user["username"];
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }else{
            return "empty";
        }
    }
    public function count(){
        $sql = "SELECT COUNT(id) FROM users";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchColumn();

    }
    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM users WHERE id = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function update($username, $email, $password = null) {
        if ($password) {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $stmt = $this->db->prepare("UPDATE users SET username = :username, email = :email, password = :password");

            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $hashedPassword);

        } else {
            $stmt = $this->db->prepare("UPDATE users SET username = :username, email = :email");

            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
        }

        return $stmt->execute();
    }


    public function getAllUsers()
    {
        $sql = "SELECT * FROM users";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getUserById($id){
        $sql = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function getUserByUsername($username){
        $sql = "SELECT * FROM users WHERE username = :username;";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":username", $username);
        $stmt->execute();
        return $stmt->fetch();
    }
    public function check_user($name,$email){

        $sql = "SELECT * FROM users WHERE username = :name OR email = :email;";

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        return $stmt->fetch();
    }


    public function add($username,$email,$passwrod){
        if($username && $email && $passwrod){
            $user = $this->check_user($username,$email);
            if(!$user){

            $decrypt = password_hash($passwrod, PASSWORD_DEFAULT);

            $sql = "INSERT INTO users (username, email, password) VALUES (:username, :email, :passwrod)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":username", $username);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":passwrod", $decrypt);
            return $stmt->execute();
            }else{
//                return $email == $user["email"] ? "Email tutuyor" : 'yarramı ye';
                return "already";
            }
        }else{
            return "empty";
        }
    }
}