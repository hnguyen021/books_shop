<?php


class Bill
{
    public $idgiohang;
    public $iduser;
    public $sosanpham;
    public $ngaylap;
    public $tongtien;
    public $xuly;


    public function __construct($idgiohang, $iduser, $sosanpham, $ngaylap, $tongtien,$xuly)
    {
        $this->idgiohang = $idgiohang;
        $this->iduser = $idgiohang;
        $this->sosanpham = $sosanpham;
        $this->ngaylap = $ngaylap;
        $this->tongtien = $tongtien;
        $this->xuly = $xuly;
    }

    public static function getByUser($iduser) {
        $sql ="SELECT * FROM giohang where iduser = $iduser";
            $conn =DB::GetConnection();
           // $stms=$conn->query($sql);
           $stms = mysqli_query($conn,$sql);  
            $data = array();
           // $row = mysqli_fetch_assoc($data)
            
            while($row = mysqli_fetch_assoc($stms)){
                array_push($data, new Bill(       $row['idgiohang']
                                                 ,$row['iduser']
                                                 ,$row['sosanpham']
                                                 ,$row['ngaylap']
                                                 ,$row['tongtien'] 
                                                 ,$row['xuly']));
                                                      
                }
                
            return $data;
    }
    public static function GetAll() {
        $sql ="SELECT * FROM giohang";
            $conn =DB::GetConnection();
           // $stms=$conn->query($sql);
           $stms = mysqli_query($conn,$sql);  
            $data = array();
           // $row = mysqli_fetch_assoc($data)
            
            while($row = mysqli_fetch_assoc($stms)){
                array_push($data, new Bill(       $row['idgiohang']
                                                 ,$row['iduser']
                                                 ,$row['sosanpham']
                                                 ,$row['ngaylap']
                                                 ,$row['tongtien'] 
                                                 ,$row['xuly']));
                                                      
                }
                
            return $data;
    }
    public function handleCart($idCart){
        $sql = "UPDATE giohang SET xuly = 1 WHERE idgiohang = $idCart";
        $conn =DB::GetConnection();
        if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        } else {
        echo "Error updating record: " . $conn->error;
        }   

    }
    
    public function cancelCart($idCart){
        $cart =self::GetAll();
        if($cart[$idCart]->xuly ==  0){
            $sql = "DELETE FROM giohang WHERE idgiohang=$idCart";
        $conn =DB::GetConnection();
        if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        } else {
        echo "Error updating record: " . $conn->error;
        }   
        }    
       
        

    }

}