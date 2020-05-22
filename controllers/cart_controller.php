<?php
require_once("controllers/base_controller.php");
require_once("models/Cart.php");
require_once("models/User.php");
require_once("models/Bill.php");
class CartController extends BaseController{
    function __construct(){
        $this->name ="cart";
    }
    public function index(){
        if(isLoggedIn()){
            BaseController::render("cart",array(),"template_2");
        }
        
    }
    public function buy(){
        $id = filter_input(INPUT_GET,'id',FILTER_SANITIZE_STRING);
        if(empty($id)|| !is_numeric($id)){
           // echo "id k hop le";
            exit();
        }
            $blol= array();
            $book = Book::GetById($id);
            $cart = get_Cart();
            $cart->addBook($book);
            
            //$cart=array_push($blol["a"],$book); 
               // $cart=Cart::books[$this->books[$book->idsach]] = $book;
           // print_r($cart);
            //exit();
            save_Cart($cart);
            
            redirect('?controller=cart&action=index');
            exit();
        
    }
    public function delete(){
        $id = filter_input(INPUT_GET,'id',FILTER_SANITIZE_STRING);
        if(empty($id)|| !is_numeric($id)){
           // echo "id k hop le";
            exit();
        }

           // $book = Book::GetById($id);
            $cart = get_Cart();
            $cart->removeBook($id);
            save_Cart($cart);
            redirect('?controller=cart&action=index');
        
    }
    public function update(){
        $cart = get_Cart();
        foreach($cart->books as $b){
            $id = $b->idsach;
            
            $key = "Book_$id";
            
            $quantity = filter_input(INPUT_POST,$key, FILTER_SANITIZE_STRING);
           if(!empty($quantity)|| is_numeric($quantity)){
                
                $b->setQuantity($quantity);
            }

            
        }
        save_Cart($cart);
            redirect('?controller=cart&action=index');
            
    }
    public function finish(){
        $cart = get_Cart();
        $user = unserialize($_SESSION['user']);
        
        Cart::create_Bill($user[0]->iduser,$cart);
        unset($_SESSION['cart']);
        redirect('?controller=cart&action=bill');
    }
    public function bill(){
        $user = unserialize($_SESSION['user']);
        $id=$user[0]->iduser;
        $bill = Bill::getByUser($id);
        BaseController::render("bill",array('billss'=>$bill),"template_2");

    }
    public function remove(){
      echo" This function for remove";

    }
    public function cancel(){
        $id = filter_input(INPUT_GET,'id',FILTER_SANITIZE_STRING);
        if(empty($id)|| !is_numeric($id)){
           // echo "id k hop le";
            exit();
        }
        Bill::cancelCart($id);
        redirect('?controller=cart&action=bill');

    }
    
}
?>