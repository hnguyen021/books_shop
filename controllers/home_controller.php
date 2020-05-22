<?php
require_once("controllers/base_controller.php");
require_once("models/User.php");
require_once("models/Book.php");
class HomeController extends BaseController{
    function __construct(){
        $this->name ="home";
    }
    public function index(){
       // ob_start();       
       // require_once("views/".$this->name."/slider.php");
      //  $content_slider =  ob_get_clean();
      //  $categories = Categories::getAll();  
      //  $book = Book::getAll();
        BaseController::render("content",array());
        //ob_start();
      //  require_once("views/".$this->name."/content.php");
       // $content_main = ob_get_clean(); 
        //require_once("views/layout/template.php"); 
    }
    public function login(){
        if(isLoggedIn()){
            redirect('?controller=home&action=index');
        }
        else{
            BaseController::render("login",array(),"template_2");
        }
         
            
    }
    public function logout(){
        unset($_SESSION['user']);
        redirect('?controller=home&action=login');
    }
    public function logined(){
       
            $user = filter_input(INPUT_POST,'username',FILTER_SANITIZE_STRING); 
            $pass = filter_input(INPUT_POST,'password',FILTER_SANITIZE_STRING);
            if(empty($user)||empty($pass)){
                redirect('?controller=home&action=login',"Your PassWord or UserName is not Valid");
            }else{
                $acount=User::login($user,$pass);
                
                if($acount != null){
                   
                    $_SESSION['user'] = serialize($acount);
                  //  $_SESSION['user']= unserialize($_SESSION['user']);

                   //exit();
                    redirect('?controller=home&action=index');
                }
                else{
                    redirect('?controller=home&action=login',"Your PassWord or UserName is not Valid");
                }
            
        } 
        
        

    }
    public function search(){
       $keyword = filter_input(INPUT_POST,'keyword',FILTER_SANITIZE_STRING);
       $books= Book::getByKeyWord($keyword);
       $page = filter_input(INPUT_GET,'page',FILTER_SANITIZE_STRING);
       if(empty($page)|| !is_numeric($page)){
           $page = 1;
       }
       $item_per_page = 8;
       $from = $item_per_page *($page-1);
       $item_count = count($books);
       $book = Book::getBook($from,$item_per_page);
       $books = array_slice($books, $from,  $item_per_page);
       BaseController::render("search",array('page'=>ceil($item_count/$item_per_page),'bookss'=>$books),"template");

    }
    public function error(){
        ob_start();
        require_once("views/layout/error.php");

        $content_main =ob_get_clean();

        require_once("views/layout/template.php");
    }

    
}
?>