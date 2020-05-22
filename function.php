<?php
        require_once("models/Cart.php");
    function redirect($url,$message=""){
        if($message){
            set_message($message);
        }
        header("Location:$url");

    }
    function set_message($message){
        $_SESSION['one-time-message'] = $message;
    }
    function get_message(){
       if($_SESSION['one-time-message']){
           $value = $_SESSION['one-time-message'];
           unset($_SESSION['one-time-message']);
           return $value;
       }
       else{
           return null;
       }
    }
     function isLoggedIn(){
       return isset($_SESSION['user']);
    }
    function get_Cart(){
        if(isset($_SESSION['cart'])){
            $cart = unserialize($_SESSION['cart']);
            return $cart;
        }
        else{
            $cart = new Cart();
          //  $cart = $_SESSION['cart'] =$cart;
           //session_start();
            return $cart;
        }
    }
    function save_Cart($cart){
        $_SESSION['cart'] = serialize($cart);
    }
      function getLastBill(){
        $sql="SELECT MAX(idgiohang) FROM giohang";
        $conn =DB::GetConnection();
        // $stms=$conn->query($sql);
        $stms = mysqli_query($conn,$sql);  
        $i =mysqli_fetch_row($stms);
        return $i[0];
         
         
        
    }

?>