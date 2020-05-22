<?php
require_once("controllers/base_controller.php");
require_once("models/Admin.php");
require_once("models/Bill.php");
class AdminController extends BaseController{
    function __construct(){
        $this->name ="admin";
    }
    public function index(){
        if(isset($_SESSION['admin'])){
            redirect('?controller=admin&action=view');
            // session_destroy();
            
        }else{
            BaseController::render("login",array(),"template_2");
        }
        
     }
     public function logout(){
        unset($_SESSION['admin']);
        redirect('?controller=admin&action=index');
    }
     public function login(){
        $adminname = filter_input(INPUT_POST,'AdminName',FILTER_SANITIZE_STRING);
        $pass = filter_input(INPUT_POST,'Password',FILTER_SANITIZE_STRING);
        
        $acount=Admin::login($adminname,$pass);
        
        
            if($acount != null){
               
                $_SESSION['admin'] = serialize($acount);
              //  $_SESSION['user']= unserialize($_SESSION['user']);

               //exit();
                redirect('?controller=admin&action=view');
                
            }
            else{
                redirect('?controller=admin&action=index',"Your PassWord or UserName is not Valid");
            }
     
    }
    public function view(){
        if(isset($_SESSION['admin'])){
            $bill = Bill::GetAll();
            BaseController::render("view",array('billss'=>$bill),"template_2");
        }
        

    } 
    public function handle(){
        $id = filter_input(INPUT_GET,'id',FILTER_SANITIZE_STRING);
        if(empty($id)|| !is_numeric($id)){
           // echo "id k hop le";
            exit();
        }
        Bill::handleCart($id);
        redirect('?controller=admin&action=view');
        
    }
    public function managebook(){
        if(isset($_SESSION['admin'])){
            $books = Book::GetAll();
            BaseController::render("manage",array('books'=>$books),"template_4");
        }
       
        
    }
    public function delete(){
        if(isset($_SESSION['admin'])){
            $id = filter_input(INPUT_GET,'id',FILTER_SANITIZE_STRING);
            if(empty($id)|| !is_numeric($id)){
               // echo "id k hop le";
                exit();
            }
            $books = Book::DeleteById($id);
            redirect('?controller=admin&action=managebook');
        }
       
        
    }
    public function upload(){
        if(isset($_SESSION['admin'])){
            BaseController::render("upload",array(),"template_4");
            }
            //$books = Book::DeleteById($id);
           // redirect('?controller=admin&action=managebook');
        
       
        
    }
    public function uploaded(){
        $tensach    = filter_input(INPUT_POST,'namebook',FILTER_SANITIZE_STRING);
        $hinhsach   = filter_input(INPUT_POST,'fileUploadImage',FILTER_SANITIZE_STRING);
        $motasach   = filter_input(INPUT_POST,'motasach',FILTER_SANITIZE_STRING);
        $tacgiasach = filter_input(INPUT_POST,'tacgiasach',FILTER_SANITIZE_STRING);
        $idtheloai  = filter_input(INPUT_POST,'idtheloai',FILTER_SANITIZE_STRING);
        $namxuatban = filter_input(INPUT_POST,'namxb',FILTER_SANITIZE_STRING);
        $idquocgia  = filter_input(INPUT_POST,'idquocgia',FILTER_SANITIZE_STRING);
        $giasach    = filter_input(INPUT_POST,'giasach',FILTER_SANITIZE_STRING);
        $banner     = filter_input(INPUT_POST,'fileUploadBanner',FILTER_SANITIZE_STRING);
        $targetimage = "upload1/".$_FILES['fileUploadImage']['namebook'];// lay duong dan 
        move_uploaded_file($_FILES['fileUploadImage']['namebook'], $targetimage);
        $targetimage = "upload1/".$_FILES['fileUploadBanner']['tmp_name'];// lay duong dan 
        move_uploaded_file($_FILES['fileUploadBanner']['tmp_name'], $targetimage);
        

        
       
        
    }
}
?>