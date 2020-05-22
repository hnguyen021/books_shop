<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<link href="http://localhost:8888/MVC/assets/css/style1.css" rel="stylesheet" type="text/css" media="all"/>
<script src="https://use.fontawesome.com/c560c025cf.js"></script>
<?php
    $cart = get_Cart();
  
?>
<div class="container">
   <div class="card shopping-cart">
            <div class="card-header bg-dark text-light">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                Shipping cart
                <a href="" class="btn btn-outline-info btn-sm pull-right">Continiu shopping</a>
                <div class="clearfix"></div>
            </div>
            <div class="card-body">
                    <!-- PRODUCT -->
                    <?php
                        $i=0;
                        foreach($cart->books as $b){
                           
                    ?>
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-2 text-center">
                                <img class="img-responsive" src="<?=$b->hinhsach?>" alt="prewiew" width="120" height="80">
                        </div>
                        <div class="col-12 text-sm-center col-sm-12 text-md-left col-md-6">
                            <h4 class="product-name"><strong><?=$b->tensach?></strong></h4>
                            
                        </div>
                        <div class="col-12 col-sm-12 text-sm-center col-md-4 text-md-right row">
                            <div class="col-3 col-sm-3 col-md-6 text-md-right" style="padding-top: 5px">
                                <h6><strong><?=($b->giasach)*$b->soluong?> <span class="text-muted"></span></strong></h6>
                            </div>
                            <div>
                                <div>
                                
                                    <form action="?controller=cart&action=update" method="POST">
                                    
                                    <input type="text" value="<?= number_format($b->soluong)  ?>" name="Book_<?= $b->idsach ?>"id="Book_<?= $b->idsach ?>" style="width:25px;" >                                            
                                    
                                </div>
                            </div>
                            <div class="col-2 col-sm-2 col-md-2 text-right">
                                <a href="?controller=cart&action=delete&id=<?=$b->idsach?>"><button type="button" class="btn btn-outline-info">Delete</button></a>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <?php
                         $i++;
                        }
                    ?>        
                <div class="pull-right">
                 <button type="submit" class="btn btn-info">Update Your Cart</button>
                    
                </div>
                </form>
            </div>
            <div class="card-footer">
                <div class="coupon col-md-5 col-sm-5 no-padding-left pull-left">
                    <div class="row">
                        <div class="col-6">
                            <input type="text" class="form-control" placeholder="cupone code">
                        </div>
                        <div class="col-6">
                            <input type="submit" class="btn btn-default" value="Use cupone">
                        </div>
                    </div>
                </div>
                <div class="pull-right" style="margin: 10px">
                    <a href="?controller=cart&action=finish" class="btn btn-success pull-right">Checkout</a>
                    <div class="pull-right" style="margin: 5px">
                        Total price: <b><?=$cart->totalPrice()?></b>
                    </div>
                </div>
            </div>
        </div>
</div>