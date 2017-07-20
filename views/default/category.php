<?php require_once 'header.php';?>

    <div id="templatemo_main_top"></div>
    <div id="templatemo_main">
           
    <?php require_once 'sidebar.php';?>
        
        <!-- Главный контент /НАЧАЛО/ -->
        <div id="content">
            <?php foreach ($rsChildrenByParentCat as $itemChildrenByParentCat): ?>
            <p><a href="/?controller=category&id=<?php echo $itemChildrenByParentCat['id'];?>"><?php echo $itemChildrenByParentCat['title']; ?></a></p>
            <?php endforeach;?>
        </div> <!-- END of content -->
        <div class="cleaner"></div>
        
        
    </div> <!-- END of main -->
<?php require_once 'footer.php';?>