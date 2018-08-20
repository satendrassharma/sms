<?php
include "../config/config.php";
class database 
{
    private $dbhost=DB_HOST;
    private $username=USERNAME;
    private $password=PASSWORD;
    private $dbname=DB_NAME;
    private $link;
    private $error;
    public $msg;
     function __construct(){
        if(!$this->link){
            $this->link=new mysqli($this->dbhost,$this->username,$this->password,$this->dbname);
            if(!$this->link){
                $this->error='connection failed'.$this->link->connect_error;
            }
        }
        
    }
    public function select($query){
        $result=$this->link->query($query) or die($this->link->error.__LINE__);
        if($result->num_rows>0){
            return $result;
        }
        else{
            return false;
        }
    }
    public function update($query){
        $result=$this->link->query($query) or die($this->link->error.__LINE__);
       if($result){
           $msg="<div class='alert alert-success '>data updated succefully</div>";
           
       }
       else{
           $msg="<div class='alert alert-danger '>".$this->link->error."</div>";
       }
       return $msg;
    }
    public function delete($query){
        $result=$this->link->query($query) or die($this->link->error.__LINE__);
        if($result){
            $msg="<div class='alert alert-success '>data deleted succefully</div>";
            
        }
        else{
            $msg="<div class='alert alert-danger'>".$this->link->error."</div>";
        }
        return $msg;
    }
    public function insert($query){
        $result=$this->link->query($query) or die($this->link->error.__LINE__);
        if($result){
            $msg="<div class='alert alert-success spec'>data inserted succefully</div>";  
        }
        else{
            $msg="<div class='alert alert-danger spec'>".$this->link->error."</div>";
        }
        return $msg;
    }
}
