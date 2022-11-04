<?php
include_once ("connect_data.php");  // klase honetan gordetzen dira datu basearen datuak. erabiltzailea...
include_once ("users4bikes_class.php");

class users4bikes_model extends users4bikes_class {

    public function OpenConnect() {
        $konDat=new connect_data();
        try {
            $this->link=new mysqli($konDat->host,$konDat->userbbdd,$konDat->passbbdd,$konDat->ddbbname);
            // se crea un nuevo objeto llamado link de la clase mysqli con los datos de conexión. 
        } catch(Exception $e) {
        echo $e->getMessage();
        }
        $this->link->set_charset("utf8"); // honek behartu egiten du aplikazio eta 
                    //databasearen artean UTF -8 erabiltzera datuak trukatzeko
    }                   
        
    public function CloseConnect() {
        mysqli_close ($this->link);
    }
    
    public function getUsers(){
        $this->OpenConnect();  // konexio zabaldu  - abrir conexión
        
        $sql="SELECT * FROM users4rbikes WHERE level=0";
        $result = $this->link->query($sql); // result-en ddbb-ari eskatutako informazio dena gordetzen da
                    // se guarda en result toda la informacion solicitada a la bbdd
        $list = array();
        
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            
            $new=new users4bikes_model();
            
            $new->setUser($row['user']);
            $new->setPass($row['pass']);
            $new->setEmail($row['email']);
            $new->setLevel($row['level']);
            $new->setId_user($row['id_user']);

            array_push($list, $new);   
        }
       mysqli_free_result($result); 
       $this->CloseConnect();
       return $list;
    }

    public function delUser(){
        $this->OpenConnect();
        
        $id=$this->id;
        
        $sql = "CALL DelUser($id)";
           
        $this->link->query($sql);
        
        if ($this->link->affected_rows == 1){
             return " Usuario eliminado: ".$this->link->affected_rows;
        } else {
             return "Fallo al eliminar: (" . $this->link->errno . ") " . $this->link->error;
        }
        $this->CloseConnect();
   }

    public function getAdmins(){
        $this->OpenConnect();  // konexio zabaldu  - abrir conexión
        
        $sql="SELECT * FROM users4rbikes WHERE level=1";
        $result = $this->link->query($sql); // result-en ddbb-ari eskatutako informazio dena gordetzen da
                    // se guarda en result toda la informacion solicitada a la bbdd
        $list = array();
        
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            
            $new=new users4bikes_model();
            
            $new->setUser($row['user']);
            $new->setPass($row['pass']);
            $new->setEmail($row['email']);
            $new->setLevel($row['level']);
            $new->setId_user($row['id_user']);

            array_push($list, $new);   
        }
       mysqli_free_result($result); 
       $this->CloseConnect();
       return $list;
    }


    public function insertUser() {
        $this->OpenConnect();
             
        if (!empty($this)) {

            $username= $this->usuario;
            $password = $this->password;
            $email= $this->email;
            $level = 0;

            $checkUserSql = "CALL checkSignUp('$username', '$email')";
            $sql = "CALL insertLogin('$username', '$password', '$email', $level)";
            $filas= mysqli_num_rows($this->link->query($checkUserSql));
            $error ="";

            if($filas){
                $error="Email o usuario multiplicado en la base de datos";
                return $error;
            } else {
                $this->link->next_result();
                $this->link->query($sql);
            }

        }
        $this->CloseConnect();
    }

    public function checkVal() {

        $username= $this->usuario;
        $password = $this->password;
        session_start();
        $this->OpenConnect(); 
            
        $sql = "CALL checkLogin('$username', '$password')";
        $result = $this->link->query($sql);
        $filas= mysqli_num_rows($result);
        $datos = $result->fetch_assoc();

        if ($filas) {
            $_SESSION['user'] = $username;
            $_SESSION['level'] = $datos["level"];
        }

        $this->CloseConnect();
    }
}
