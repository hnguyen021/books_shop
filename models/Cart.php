<?php
    require_once('models/Book.php');
    class Cart{
        public $books;
        
        public function __construct(){
            $this->books = array(); 
        }
        public static function  product_count(){
            return count($this->books);
        }
        public function totalPrice(){
            $sum = 0;
            foreach($this->books as $idsach =>$b){
                $sum += $b->getTotalPrice();
            }
            return $sum;
        }
        /*
        public   function getLastBill(){
            $sql="SELECT MAX(idgiohang) FROM giohang";
            $conn =DB::GetConnection();
            // $stms=$conn->query($sql);
            $stms = mysqli_query($conn,$sql);  
            $i =mysqli_fetch_row($stms);
            return $i[0];
             
             
            
        } 
        */
        public function create_Bill($idUser,$cart){
            $cart = get_Cart();
            $sosanpham = count($cart->books);
            $totalPrice = 0;
            foreach($cart->books as $idsach =>$b){
                $totalPrice += $b->getTotalPrice();
            }
            $date =date("Y/m/d H:i:s");
            $conn =DB::GetConnection();
            
            $stmt = $conn->prepare("INSERT INTO giohang(iduser, sosanpham ,ngaylap ,tongtien)  VALUES (?, ?, ?,?)");
            $stmt->bind_param("iisi", $idUser, $sosanpham,$date,$totalPrice);
            $isOK = $stmt->execute();
           // echo $isOK();
            //exit();
            if($isOK) {
                $bill_id = mysqli_insert_id($conn);               
               foreach($cart->books as $b){
                   self::create_Bill_Detail($b,$bill_id);
               }
            }
        }
        public static function create_Bill_Detail($book,$id){         
            $conn =DB::GetConnection();
            $stmt = $conn->prepare("INSERT INTO chitietgiohang(idgiohang, idsach ,soluong) VALUES(?,?,?)");
            $stmt->bind_param("iii", $id, $book->idsach,$book->soluong);
            $stmt->execute();  
                
        } 
        public function  addBook($book){
            $key = $book->idsach;
            if(array_key_exists($key,$this->books)){
                $b = $this->books[$key];
                $b->increase();
            }else{
               $this->books[$key] = $book;
              // array_push($this->books[$key],$book); 
                print_r($this->books);
            }
        }
        
        public function removeBook($key)
        {
            unset($this->books[$key]);
        }
    }
?>