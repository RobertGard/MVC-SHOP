<!-- Слайдер-карусель товаров /НАЧАЛО/ -->
    	<div id="product_slider">
    		<div id="SlideItMoo_outer">	
                <div id="SlideItMoo_inner">			
                    <div id="SlideItMoo_items">
                        <?php foreach ($allProduct as $itemAllProduct): ?>
                            <div class="SlideItMoo_element">
                                    <a href="/?controller=product&id=<?php echo $itemAllProduct['id']; ?>" target="_parent">
                                    <img src="<?php echo PathTemplates;?>images/gallery/<?php echo $itemAllProduct['image']; ?>" alt="product 1" /></a>
                                    
                            </div>
                        <?php endforeach; ?>
                    </div>			
                </div>
            </div>
            <div class="cleaner"></div>
        </div>
        <!-- Слайдер-карусель товаров /КОНЕЦ/ -->