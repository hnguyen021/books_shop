<?php
 require_once("C:/xampp/htdocs/MVC/config.php");
    class Admin{

        public $idadmin;
        public $tenadmin;
        public $tentaikhoan;
        public $password;       
        public function __construct($idadmin,$tenadmin,$tentaikhoan,$password){            
            $this->idadmin     =$idadmin;
            $this->tenadmin     =$tenadmin;
            $this->tentaikhoan  =$tentaikhoan ;
            $this->password   =$password;
            
        }
        public static function GetAll(){
            $sql ="select * from admin";
            $conn =DB::GetConnection();
           // $stms=$conn->query($sql);
           $stms = mysqli_query($conn,$sql);  
            $data = array();
            while($row = mysqli_fetch_assoc($stms)){
                array_push($data, new admin(       $row['idadmin']
                                                 ,$row['tenadmin']
                                                 ,$row['tentaikhoan']
                                                 ,$row['password'] ));
                                                      
                }
            return $data;

        }
        public static function login($adminname,$password){
            $sql ="select * from admin where tentaikhoan ='$adminname' and password ='$password'";
            $conn =DB::GetConnection();
            $stms = mysqli_query($conn,$sql);
           // $r =mysqli_num_rows($stms); 
             
            if ( mysqli_num_rows($stms) == 0) {
                return null;
            }
            else{
                $acount = array();
                while($row = mysqli_fetch_assoc($stms)){
                    array_push($acount, new admin(     $row['idadmin']
                                                     ,$row['tenadmin']
                                                     ,$row['tentaikhoan']
                                                     ,$row['password'] ));
                                                          
                    }
                    
                return $acount[0];
                
            }
        }
    }
        
  ?>  
