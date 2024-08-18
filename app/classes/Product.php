<?php

class Product
{
    private $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getAll()
    {
        $sql = "SELECT * FROM products";
        $result = $this->db->query($sql);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    function uploadImage($file, $destination, $izinVerilenUzantilar = ['jpg', 'jpeg', 'png', 'gif', 'pdf','mp4','m4a']) {
        $geciciIsim = $file['tmp_name'];
        $dosyaIsmi = basename($file['name']);

        $dosyaUzantisi = strtolower(pathinfo($dosyaIsmi, PATHINFO_EXTENSION));

        if ($file['size'] > 5000000) {
            $_SESSION["alert_message"] = "Dosya boyutu çok büyük.";
            $_SESSION["alert_type"] = "error";
            return false;
        }

        if (!in_array($dosyaUzantisi, $izinVerilenUzantilar)) {
            $_SESSION["alert_message"] = "Bu dosya türüne izin verilmiyor.";
            $_SESSION["alert_type"] = "error";

            return false;
        }


        $hedefDosya = $destination . uniqid() . "_" . $dosyaIsmi;
        $move = move_uploaded_file($geciciIsim, $hedefDosya);

        if ($move) {
            return $hedefDosya;
        }  else {
            $hata = $file['error'];
            switch ($hata) {
                case UPLOAD_ERR_INI_SIZE:
                    $_SESSION["alert_message"] =  'Dosya boyutu php.ini dosyasında belirtilen upload_max_filesize değerini aşıyor.';

                    break;
                case UPLOAD_ERR_FORM_SIZE:
                    $_SESSION["alert_message"] = 'Dosya boyutu HTML formunda belirtilen MAX_FILE_SIZE değerini aşıyor.';

                    break;
                case UPLOAD_ERR_PARTIAL:
                    $_SESSION["alert_message"] = 'Dosya sadece kısmen yüklendi.';
                    break;
                case UPLOAD_ERR_NO_FILE:
                    $_SESSION["alert_message"] = 'Hiçbir dosya yüklenmedi.';
                    break;
                case UPLOAD_ERR_NO_TMP_DIR:
                    $_SESSION["alert_message"] =  'Geçici dizin eksik.';
                    break;
                case UPLOAD_ERR_CANT_WRITE:
                    $_SESSION["alert_message"] = 'Dosya diske yazılamadı.';
                    break;
                case UPLOAD_ERR_EXTENSION:
                    $_SESSION["alert_message"] = 'PHP uzantısı dosya yüklemesini durdurdu.';
                    break;

            }
            $_SESSION["alert_type"] = "error";
            return false;

        }
    }





    public function getPortbytitle($title){
        $sql = "SELECT name FROM products WHERE name = :name";
        $result = $this->db->prepare($sql);
        $result->execute(array('name' => $title));
        return $result->fetch(PDO::FETCH_ASSOC)['name'];

    }

    public function get($id)
    {
        $sql = "SELECT * FROM products WHERE id = :id";
        $result = $this->db->prepare($sql);
        $result->execute(array('id' => $id));
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function count()
    {
        $sql = "SELECT COUNT(id) FROM products";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchColumn();

    }

    public function countByCategory($id){

            $sql = "SELECT count(*) FROM products WHERE category_id = :category_id";
            $result = $this->db->prepare($sql);
            $result->execute(array('category_id' => $id));
             return $result->fetchColumn();
    }
    public function add($title, $description, $image,$price,$category_id)
    {
        $check = $this->getPortbytitle($title);
        if($check){
            return "already";
        }else{

            $sql = "INSERT INTO products";
            $sql .= "(name,category_id,description,image,price) ";

            $sql .= "VALUES (:name,:category_id,:description,:image,:price)";
            $result = $this->db->prepare($sql);
            $result->execute(array(
                'name' => $title,
                'category_id' => $category_id,
                'description' => $description,
                'image' => URL.  $image,
                'price' => $price
            ));
            return $this->db->lastInsertId();
        }
    }

    public function filterByCategory($category_id){
        $sql = "SELECT * FROM products WHERE category_id = :category_id";
        $result = $this->db->prepare($sql);
        $result->execute(array('category_id' => $category_id));
        return $result->fetchAll(PDO::FETCH_ASSOC);

    }

    public function update($id, $title, $image, $description, $price,$category_id)
    {
        $sql = "UPDATE products
        SET name = :name";
        $sql .= " ,image = :image";
        $sql .= " ,description = :description";
        $sql .= " ,price = :price";
        $sql .= " ,category_id= :category_id";
        $sql .= " WHERE id = :id";
        $result = $this->db->prepare($sql);
        return $result->execute(array(
            'id' => $id,
            'name' => $title,
            'image' => $image,
            'price' => $price,
            'description' => $description,
            'category_id' => $category_id
        ));

    }

    public function delete($id)
    {
        $sql = "DELETE FROM products";
        $sql .= " WHERE id = :id";
        $result = $this->db->prepare($sql);
        return $result->execute(array('id' => $id));

    }

}