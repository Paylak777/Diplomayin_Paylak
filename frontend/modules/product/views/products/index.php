<div class="new_arrivals">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <div class="section_title section_title2 new_arrivals_title">
                    <h2>Shop</h2>
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col text-center">
                <div class="new_arrivals_sorting">
                    <ul class="arrivals_grid_sorting clearfix button-group filters-button-group">
                        <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center active is-checked" data-filter="*">all</li>
                        <?php
                        foreach ($categories as $cat){
                            ?>
                            <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center"><?= $cat->title;?></a></li>

                            <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="product-grid" data-isotope='{ "itemSelector": ".product-item", "layoutMode": "fitRows" }'>

                    <!-- Product 1 -->

                    <?php
                    foreach ($products as $product){

                        ?>

                        <div class="product-item men">
                            <div class="product discount product_filter">
                                <div class="product_image">
                                    <?php
                                    if(empty($product['image'])){
                                        ?>
                                        <img src="images/download.png" alt="">
                                        <?php
                                    }
                                    else{
                                        ?>
                                        <img src="images/<?= $product['image']?>" alt="">
                                        <?php
                                    }
                                    ?>


                                </div>
                                <div class="favorite favorite_left"></div>
                                <?php
                                if(!empty($product['is_new'])){
                                    ?>
                                    <div class="product_bubble product_bubble_left product_bubble_green d-flex flex-column align-items-center"><span>new</span></div>
                                    <?php
                                }
                                ?>
                                <?php
                                if(!empty($product['sale_price'])){
                                    ?>
                                    <div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center">
                                        <span><?php echo 100-($product['sale_price']/($product['price']/100))?>%</span>
                                    </div>
                                    <?php
                                }
                                ?>


                                <div class="product_info">
                                    <h6 class="product_name"><a href="single.html"><?= $product['title']?></a></h6>
                                    <?php
                                    if(empty($product['sale_price'])){
                                        ?>
                                        <div class="product_price">$<?= $product['price']?></div>
                                        <?php
                                    }
                                    else{
                                        ?>
                                        <div class="product_price">$<?= $product['sale_price']?><span>$<?= $product['price']?></span></div>
                                        <?php
                                    }

                                    ?>

                                </div>
                            </div>
                            <div class="red_button add_to_cart_button"><a href="#">add to cart</a></div>
                        </div>

                        <?php
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>