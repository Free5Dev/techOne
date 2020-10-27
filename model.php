<?php 

class Model{
    // les attributes pour la connexion à la bdd
    private $server="localhost";
    private $username="root";
    private $password="";
    private $db="crud";
    private $conn;
    // definir la connexion à la bdd ds le contructure comme ça à chaque fois que la class est instancié la connexion est appeler automatiquement
    public function __construct(){
        //Si tout vas bien on appel la connexion à la bdd
        try{ 
            $this->conn = new mysqli($this->server, $this->username, $this->password, $this->db);
        }catch(Exception $e){
            echo"Connexion Failed :".$e->getMessage();
            die();
        }
    }
    // method insert in bdd
    public function insert(){
        // si soumisssion du formulaire
        if(isset($_POST['submit'])){
            // verification de l'existance des champs 
            if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['mobile']) && !empty($_POST['address'])){
                // les valeurs des champs formulaire
                $name= $_POST['name'];
                $email= $_POST['email'];
                $mobile= $_POST['mobile'];
                $address= $_POST['address'];
                // query insert
                $query = "INSERT INTO recordings(name, email, mobile, address) VALUES('$name', '$email', '$mobile', '$address')";
                if($sql = $this->conn->query($query)){
                    echo"<script>alert('add records successfulling');</script>";
                }else{
                    echo"<script>alert('It's not possible to add in bdd');</script>";
                }
            }else{  
                echo"<script>alert('Empty');</script>";
            }
            
        }
    }
    // method fetch all recordings in bdd
    public function fetch(){
        $data = null;
        // query
        $query = "SELECT * FROM recordings";
        if($sql = $this->conn->query($query)){
            while($row = $sql->fetch_assoc()){
                $data[] = $row;
            }
        }
        return $data;
    }
    // method fetch_single pour afficher juste une seule donnée
    public function fetch_single($id){
        $data = null;
        // query
        $query = "SELECT * FROM recordings WHERE id='$id'";
        // si la connexion  à la select c bien fait
        if($sql = $this->conn->query($query)){
            if($row = $sql->fetch_assoc()){
                $data = $row;
            }
        }else{
            echo"<script>alert('Connexion Failed');</script>";
        }
        return $data;
    }
    // method delete 
    public function delete($id){
        // query
        $query = "DELETE FROM recordings WHERE id = '$id'";
        if($sql = $this->conn->query($query)){
            return true;
        }else{
            return false;
        }
    }
    // method edit
    public function edit($id){
        $data = null;
        // query 
        $query = "SELECT * FROM recordings WHERE id='$id'";
        if($sql= $this->conn->query($query)){
            while($row = $sql->fetch_assoc()){
                $data = $row;
            }
        }
        return $data;
    }
    // method update
    public function update($data){
        // query
        $query = "UPDATE recordings SET name='$data[name]', email='$data[email]', mobile='$data[mobile]', address='$data[address]' WHERE id='$data[id] '";
        if($sql = $this->conn->query($query)){
            return true;
        }else{
            return false;
        }
    }
}