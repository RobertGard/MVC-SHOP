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
            <h3 class="<?php echo $hide = isset($_SESSION['user'])? "hide" : NULL; ?>"> 
                <a href="#" onClick="ShowAndHide('#signIn'); return false;" >Sign In</a>
                OR
                <a href="#" onClick="ShowAndHide('#signUp'); return false;" >Sign Up</a>
            </h3>
                
            <!-- Блок логинезации /НАЧАЛО/ -->
            <div id="newsletter" class="<?php echo $hide = isset($_SESSION['user'])? "hide" : NULL; ?>">
                <div id="signIn" class="hide">
                <p>Email:</p>
                <input type="text" value="" name="emailSI" class="txt_field">
                <p>Password :</p>
                <input type="password" value="" name="passwordSI" class="txt_field">
                <input type="button" value="Ввойти" onclick="signIn('#signIn'); return false;" class="subscribebtn"  />
                </div>
            </div>
            <!-- Блок логинезации /КОНЕЦ/ -->
            
            
            <!-- Блок регистрации /НАЧАЛО/ -->
            <div id="newsletter" class="<?php echo $hide = isset($_SESSION['user'])? "hide" : NULL; ?>"> 
                <div id="signUp" class="hide">
                    <p>Email:</p>
                    <input type="text" value="" name="emailSU" class="txt_field" />
                    <p>Password 1:</p>
                    <input type="password" value="" name="passwordSU1" class="txt_field" />
                    <p>Password 2:</p>
                    <input type="password" value="" name="passwordSU2" class="txt_field" />
                    <input type="button" value="Регистрация" onclick="signUp('#signUp'); return false;" class="subscribebtn"  />
                </div>
                <div class="cleaner"></div>
            </div>
            <!-- Блок регистрации /КОНЕЦ/ -->
            
            <!-- Блок пользователя /НАЧАЛО/ -->
            <div id="userBox" style="text-align: center;" class="<?php echo $hide = (!isset($_SESSION['user']))? "hide" : NULL; ?>" >
                <h3>Личный кабинет</h3> 
                <a href="/?controller=user" >Personal </a> | <a href="/?controller=user&action=exit" > Exit</a>
            </div>
</div> <!-- END of sidebar -->