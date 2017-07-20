<?php require_once 'header.php';?>

    <div id="templatemo_main_top"></div>
    <div id="templatemo_main">
         
    <?php require_once 'sidebar.php';?>
        
        <?php if(!empty($rsProduct)): ?>
        <!-- Главный контент /НАЧАЛО/ -->
        <div id="content">
            <?php foreach ($rsProduct as $itemProduct): ?>
                <div class="col col_14 product_gallery">
                    <a href="/?controller=product&id=<?php echo $itemProduct['id']; ?>"><img src="<?php echo PathTemplates;?>images/product/<?php echo $itemProduct['image']; ?>" alt="Product 01" /></a>
                    <h3><?php echo $itemProduct['title']; ?></h3>
                    <p class="product_price">$ <?php echo $itemProduct['price']; ?></p>
                    <a href="/?controller=product&id=<?php echo $itemProduct['id']; ?>" class="add_to_cart">Add to Cart</a>
                </div> 
            <?php endforeach; ?>
        </div> <!-- END of content -->
        <?php else :?>
            <?php echo 'Нет товаров для данной категории';?>
        <?php endif; ?>
        <div class="cleaner"></div>   
    </div> <!-- END of main -->
<?php require_once 'footer.php';?>
