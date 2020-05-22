<?php
require_once("controllers/base_controller.php");
require_once("models/User.php");
class BookController extends BaseController{
    function __construct(){
        $this->name ="book";
    }
    public function index(){
        $page = filter_input(INPUT_GET,'page',FILTER_SANITIZE_STRING);
        if(empty($page)|| !is_numeric($page)){
           // echo "id k hop le";
            $page = 1;
        }
        $item_per_page = 8;
        $from = $item_per_page *($page-1);
        $item_count = Book::getBookCount();
        $book = Book::getBook($from,$item_per_page);
        BaseController::render("index",array('page'=>ceil($item_count/$item_per_page),'bookss'=>$book),"template");

    }
    public function category(){
        $id = filter_input(INPUT_GET,'id',FILTER_SANITIZE_STRING);
        if(empty($id)|| !is_numeric($id)){
           // echo "id k hop le";
            exit();
        }

            $books = Book::GetByCategory($id,'8');
            BaseController::render("category",array('books'=>$books),"template");
        
         
            
    }
    public function preview(){
        $id = filter_input(INPUT_GET,'id',FILTER_SANITIZE_STRING);
        if(empty($id)|| !is_numeric($id)){
           // echo "id k hop le";
            exit();
        }

            $bookbyid = Book::GetById($id);
           // print_r($bookbyid);
            BaseController::render("preview",array('booklol'=>$bookbyid),"template_3");
        
         
            
    }
   

}   

?>