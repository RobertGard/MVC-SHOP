<?php require_once 'header.php';?>

    <div id="templatemo_main_top"></div>
    <div id="templatemo_main">
         
    <?php require_once 'sidebar.php';?>
        
        
        <div id="content">
            <id id="detailUser" >
            <?php foreach ($detailsUser as $itemUser): ?>
                <p>Email</p>
                <h3><?php echo $itemUser['email']; ?></h3>
                <p>Имя</p>
                <input type="text" name="userName" value="<?php echo $itemUser['name']; ?>">
                <p>Номер телефона</p>
                <input type="text" name="userPhone" value="<?php echo $itemUser['phone']; ?>">
                <p>Новый пароль 1</p>
                <input type="password" name="userNewPass1" value="">
                <p>Новый пароль 2</p>
                <input type="password" name="userNewPass2" value="">
                <p>Старый пароль</p>
                <input type="password" name="userOldPass" value=""><br>
                
                <input type="button" value="Обновить" onClick="updateDetailsUser('#detailUser'); return false;" class="subscribebtn" >
            <?php endforeach; ?>
            </id>
        </div> <!-- END of content -->
        <div class="cleaner"></div>   
    </div> <!-- END of main -->
<?php require_once 'footer.php';?>