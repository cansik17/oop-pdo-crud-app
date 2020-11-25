<?php

require_once ('db.php');

class Controller
{

    protected $db;
    

    function __construct()
    {
        $this->db = DB();
    }

    function __destruct()
    {
        $this->db = null;
    }

    public function Create($name, $email, $phone, $info)
    {
        $query = $this->db->prepare("INSERT INTO customers(name, email, phone, info) VALUES (?,?,?,?)");
        $query->execute([$name, $email, $phone, $info]);
        return $this->db->lastInsertId();
    }


    public function fetchAll($paginationStartPoint, $recordsPerPage)
    {
        $query = $this->db->prepare("SELECT * FROM customers ORDER BY id DESC LIMIT $paginationStartPoint, $recordsPerPage");
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function fetch($id)
    {
        $query = $this->db->prepare("SELECT * FROM customers WHERE id = ?");
        $query->execute([$id]);
        $data = $query->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    public function search($q)
    {
        $query            =   $this->db->prepare("
        SELECT * FROM customers 
        WHERE name LIKE '%" . $q ."%'
        OR email LIKE '%" . $q . "%' 
        OR phone LIKE '%" . $q . "%' 
        OR info LIKE '%" . $q . "%' 
  ");
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data;
        
    }



    public function Delete($id)
    {
        $query = $this->db->prepare("DELETE FROM customers WHERE id = ?");
        $query->execute([$id]);
    }


    public function Update($name, $email, $phone, $info,$id)
    {
        $query = $this->db->prepare("UPDATE customers SET name = ?, email = ?, phone = ?, info=?  WHERE id = ?");

        $query->execute([$name, $email, $phone, $info, $id]);
    }


    public function Details($id)
    {
        $query = $this->db->prepare("SELECT * FROM customers WHERE id = ?");
        $query->execute([$id]);
        return json_encode($query->fetch(PDO::FETCH_ASSOC));
    }
}
