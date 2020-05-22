<?php
 require_once("C:/xampp/htdocs/MVC/config.php");
    class Book{

        public $idsach;
        public $tensach;
        public $hinhsach;
        public $motasach;
        public $tacgiasach;
        public $idtheloai;
        public $namxuatban;
        public $idquocgia;
        public $luotmua;
        public $giasach;
        public $banner;
        public $soluong;
        public function __construct($idsach,$tensach,$hinhsach,$motasach,$tacgiasach,$idtheloai,$namxuatban,$idquocgia,$luotmua,$giasach,$banner){            
            $this->idsach     =$idsach;
            $this->tensach    =$tensach ;
            $this->hinhsach   =$hinhsach;
            $this->motasach   =$motasach;
            $this->tacgiasach =$tacgiasach;
            $this->idtheloai  =$idtheloai;
            $this->namxuatban =$namxuatban;
            $this->idquocgia  =$idquocgia;
            $this->luotmua    =$luotmua;
            $this->giasach    =$giasach;
            $this->banner     =$banner;
            $this->soluong    =1;
        }
        public function increase($value = 1){
            $this->soluong += $value;
         }
        public function getTotalPrice(){
            return $this->soluong * $this->giasach;
        } 
        
        public static function GetAll(){
            $sql ="select * from book";
            $conn =DB::GetConnection();
           // $stms=$conn->query($sql);
           $stms = mysqli_query($conn,$sql);  
            $data = array();
           // $row = mysqli_fetch_assoc($data)
            
            while($row = mysqli_fetch_assoc($stms)){
                array_push($data, new Book(       $row['idsach']
                                                 ,$row['tensach']
                                                 ,$row['hinhsach']
                                                 ,$row['motasach']
                                                 ,$row['tacgiasach']
                                                 ,$row['idtheloai']
                                                 ,$row['namxuatban']
                                                 ,$row['idquocgia']
                                                 ,$row['luotmua']
                                                 ,$row['giasach']
                                                 ,$row['banner']));
                                                      
                }
            return $data;

        }
        public static function GetLatest($num){
            $sql ="SELECT * FROM book ORDER BY idsach DESC LIMIT $num";
            $conn =DB::GetConnection();
           // $stms=$conn->query($sql);
           $stms = mysqli_query($conn,$sql);  
            $data = array();
           // $row = mysqli_fetch_assoc($data)
            
            while($row = mysqli_fetch_assoc($stms)){
                array_push($data, new Book(       $row['idsach']
                                                 ,$row['tensach']
                                                 ,$row['hinhsach']
                                                 ,$row['motasach']
                                                 ,$row['tacgiasach']
                                                 ,$row['idtheloai']
                                                 ,$row['namxuatban']
                                                 ,$row['idquocgia']
                                                 ,$row['luotmua']
                                                 ,$row['giasach']
                                                 ,$row['banner']));
                                                      
                }
            return $data;

        }
        public static function GetHottest($num){
            $sql ="SELECT * FROM book ORDER BY luotmua DESC LIMIT $num";
            $conn =DB::GetConnection();
           // $stms=$conn->query($sql);
           $stms = mysqli_query($conn,$sql);  
            $data = array();
           // $row = mysqli_fetch_assoc($data)
            
            while($row = mysqli_fetch_assoc($stms)){
                array_push($data, new Book(       $row['idsach']
                                                 ,$row['tensach']
                                                 ,$row['hinhsach']
                                                 ,$row['motasach']
                                                 ,$row['tacgiasach']
                                                 ,$row['idtheloai']
                                                 ,$row['namxuatban']
                                                 ,$row['idquocgia']
                                                 ,$row['luotmua']
                                                 ,$row['giasach']
                                                 ,$row['banner']));
                                                      
                }
            return $data;

        }
        public static function GetByCategory($id,$limit=''){
            $sql ="SELECT * FROM book where idtheloai = $id LIMIT $limit";
            $conn =DB::GetConnection();
           // $stms=$conn->query($sql);
           $stms = mysqli_query($conn,$sql);  
            $data = array();
           // $row = mysqli_fetch_assoc($data)
            
            while($row = mysqli_fetch_assoc($stms)){
                array_push($data, new Book(       $row['idsach']
                                                 ,$row['tensach']
                                                 ,$row['hinhsach']
                                                 ,$row['motasach']
                                                 ,$row['tacgiasach']
                                                 ,$row['idtheloai']
                                                 ,$row['namxuatban']
                                                 ,$row['idquocgia']
                                                 ,$row['luotmua']
                                                 ,$row['giasach']
                                                 ,$row['banner']));
                                                      
                }
            return $data;

        }
        public static function GetById($id){
            $sql ="SELECT * FROM book where idsach = $id";
            $conn =DB::GetConnection();
           // $stms=$conn->query($sql);
           $stms = mysqli_query($conn,$sql);  
            $data = array();
           // $row = mysqli_fetch_assoc($data)
            
            while($row = mysqli_fetch_assoc($stms)){
                array_push($data, new Book(       $row['idsach']
                                                 ,$row['tensach']
                                                 ,$row['hinhsach']
                                                 ,$row['motasach']
                                                 ,$row['tacgiasach']
                                                 ,$row['idtheloai']
                                                 ,$row['namxuatban']
                                                 ,$row['idquocgia']
                                                 ,$row['luotmua']
                                                 ,$row['giasach']
                                                 ,$row['banner']));
                                                      
                }
                
            return $data[0];

        }
        public static function DeleteById($id){
        $sql ="DELETE FROM book where idsach = $id";
        $conn =DB::GetConnection();
        if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        } else {
        echo "Error updating record: " . $conn->error;
        }  

        }
        public static function getBookCount(){
            
            $sql ="SELECT COUNT(*) FROM book";
            $conn =DB::GetConnection();
           // $stms=$conn->query($sql);
           $stms= mysqli_query($conn,$sql);  
            $i =mysqli_fetch_row($stms);
            return $i[0];
           // $row = mysqli_fetch_assoc($data)
            
           
            
        }
        public function setQuantity($q){
            $this->soluong =$q;
        }
        public static function getBook($from,$count){
            $sql ="SELECT * FROM book LIMIT $from,$count";
            $conn =DB::GetConnection();
           // $stms=$conn->query($sql);
           $stms = mysqli_query($conn,$sql);  
            $data = array();
           // $row = mysqli_fetch_assoc($data)
            
            while($row = mysqli_fetch_assoc($stms)){
                array_push($data, new Book(       $row['idsach']
                                                 ,$row['tensach']
                                                 ,$row['hinhsach']
                                                 ,$row['motasach']
                                                 ,$row['tacgiasach']
                                                 ,$row['idtheloai']
                                                 ,$row['namxuatban']
                                                 ,$row['idquocgia']
                                                 ,$row['luotmua']
                                                 ,$row['giasach']
                                                 ,$row['banner']));
                                                      
                }
            return $data;
        }
        public static function getByKeyWord($keyword){
            $sql ="SELECT * from book where tensach like '%$keyword%'";
            $conn =DB::GetConnection();
           // $stms=$conn->query($sql);
           $stms = mysqli_query($conn,$sql);  
            $data = array();
           // $row = mysqli_fetch_assoc($data)
            
            while($row = mysqli_fetch_assoc($stms)){
                array_push($data, new Book(       $row['idsach']
                                                 ,$row['tensach']
                                                 ,$row['hinhsach']
                                                 ,$row['motasach']
                                                 ,$row['tacgiasach']
                                                 ,$row['idtheloai']
                                                 ,$row['namxuatban']
                                                 ,$row['idquocgia']
                                                 ,$row['luotmua']
                                                 ,$row['giasach']
                                                 ,$row['banner']));
                                                      
                }
            return $data;

        }
        public function upload($tensach,$hinhsach,$motasach,$tacgiasach,$idtheloai,$namxuatban,$idquocgia,$giasach,$banner){
            $conn =DB::GetConnection();
            
            $stmt = $conn->prepare("INSERT INTO book(tensach,hinhsach,motasach,tacgiasach,idtheloai,namxuatban,idquocgia,giasach,banner)  VALUES (?, ?, ?,?,?,?,?,?,?)");
            $stmt->bind_param("ssssisiis",$tensach,$hinhsach,$motasach,$tacgiasach,$idtheloai,$namxuatban,$idquocgia,$giasach,$banner);
            $result=$stmt->execute();
            if($result == false){
                return false;
            }
            return true;
            
        }
        
    }
?>
