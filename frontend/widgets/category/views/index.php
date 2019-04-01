<!-- Banner -->


        <div class="banner">
            <div class="container">
                <div class="row">
                    <?php
                         foreach ($categories as $category){
                    ?>
                    <div class="col-md-4">
                        <div class="banner_item align-items-center" style="background-image:url(images/<?= $category['image'] ?>)">
                            <div class="banner_category">
                                <a href="<?= \yii\helpers\Url::to(['/category/'.$category['id']])?>"><?= $category['title'] ?></a>
                            </div>
                        </div>
                    </div>
                             <?php
                                }
                                ?>
                </div>
            </div>
        </div>




