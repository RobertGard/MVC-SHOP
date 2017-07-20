<!-- Навигация с левой стороны /НАЧАЛО/ -->
<div id="sidebar">
        	<h3>Categories</h3>
            <ul class="sidebar_menu">
                <?php foreach ($rsAllCat as $itemCat): ?>
                <li><a href="/?controller=category&id=<?php echo $itemCat['id'];?>" class="red">(<?php echo $itemCat['title']; ?>)</a></li>
                        <?php foreach ($itemCat['children'] as $itemChildrenCat): ?>
                <li><a href="/?controller=category&id=<?php echo $itemChildrenCat['id'];?>" class="gray"><?php echo $itemChildrenCat['title']; ?></a></li>
                        <?php endforeach; ?>
                <?php endforeach; ?>
            </ul>
            <h3>Newsletter</h3>
            <p>Praesent aliquam mi id tellus pretium pulvinar in vel ligula.</p>
            <div id="newsletter">
                <form action="#" method="get">
                  <input type="text" value="Subscribe" name="email_newsletter" id="email_newsletter" title="email_newsletter" onfocus="clearText(this)" onblur="clearText(this)" class="txt_field" />
                  <input type="submit" name="subscribe" value="Subscribe" alt="Subscribe" id="subscribebtn" title="Subscribe" class="subscribebtn"  />
                </form>
                <div class="cleaner"></div>
            </div>
</div> <!-- END of sidebar -->