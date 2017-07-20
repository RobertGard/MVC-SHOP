<?php require_once 'header.php';?>

    <div id="templatemo_main_top"></div>
    <div id="templatemo_main">
         
    <?php require_once 'sidebar.php';?>
        

        <!-- Главный контент /НАЧАЛО/ -->
        <div id="content">
            <?php foreach ($detailProduct as $itemDetProduct): ?>
            <img src="<?php echo PathTemplates;?>images/product/<?php echo $itemDetProduct['image']; ?>" alt="Product 01" />
            <ul class="productInfo">
                
                <li>
                    <h4 class="red underline">Название:</h4>
                    <pre><h3><?php echo $itemDetProduct['title']; ?></h3></pre>
                </li>
                <li>
                    <h4 class="red underline">Цена:</h4>
                    <pre><p class="product_price">$ <?php echo $itemDetProduct['price']; ?></p></pre>
                </li>
                <li>
                    <h4 class="red underline">Описание:</h4>
                    <p><?php echo $itemDetProduct['description']; ?></p>
                </li>
                <li>
                    <h4 class="red underline">Действие:</h4>
                    <pre><a href="#" onClick="addToCart(<?php echo $itemDetProduct['id']; ?>); return false;" class="addToCart_<?php echo $itemDetProduct['id']; ?> add_to_cart <?php echo $hide = ($key)? "hide" : NULL; ?>">Добавить в корзину</a></pre>
                    <pre><a href="#" onClick="removeCart(<?php echo $itemDetProduct['id']; ?>); return false;" class="removeCart_<?php echo $itemDetProduct['id']; ?> add_to_cart <?php echo $hide = (!$key)? "hide" : NULL; ?>">Убрать из корзины</a></pre>
                </li>
            </ul>
            <?php endforeach; ?>
        </div> <!-- END of content -->
        <div class="cleaner"></div>   
    </div> <!-- END of main -->
<?php require_once 'footer.php';?>
