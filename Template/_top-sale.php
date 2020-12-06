<?php

shuffle($product_shuffle);
if($_SERVER['REQUEST_METHOD']=="POST"){
    if(isset($_POST['top_sale_submit'])){
    $Cart->addToCart($_POST['user_id'],$_POST['item_id']);
}
}
?>
<section id="top-sale">
            <div class="container py-5">
                <h4>Top Sale</h4>
                <hr>
                <div class="owl-carousel owl-theme">
                    <?php
                        foreach($product_shuffle as $item){?>

                    <div class="item py-2">
                        <div class="product">
                            <a href="<?php printf('%s?item_id=%s','product.php',$item['item_id'])?>"><img src="<?php echo $item['item_image'] ??"./assets/oppo1.jpg";?>" alt="" class="img-fluid" style="height: 10rem; width: 10rem;"></a>
                            <div class=" title pl-5">
                                <h6><?php echo $item['item_name']??"Unknown";?></h6>
                            </div>
                            <div class="rating text-warning font-size-12 pl-5">
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                            </div>
                            <div class="price py-2 text-center">
                                <span>$<?php echo $item['item_price']??'0'; ?></span>
                            </div>
                           <form method="post">
                            <input type="hidden" name="item_id" value="<?php echo $item['item_id']?? '1';?>">
                            <input type="hidden" name="user_id" value="<?php echo 1;?>">
                            <?php
                                if(in_array($item['item_id'],$Cart->getCartId($product->getData('cart'))??[])){
                                    echo '<button type="submit" name="top_sale_submit" disabled class="btn btn-success pl-5 text-center"> In the Cart</button>';
                                }
                                else{
                                    echo '<button type="submit" name="top_sale_submit" class="btn btn-warning pl-5 text-center">Add to Cart</button>';
                                }
                            ?>

                            
                           </form>
                        </div>
                    </div>
                    <?php } ?>  
                </div>
                
            </div>
        </section>