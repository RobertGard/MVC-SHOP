<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Web Store Template</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="<?php echo PathTemplates;?>css/templatemo_style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?php echo PathTemplates;?>css/ddsmoothmenu.css" />
<script type="text/javascript" src="<?php echo PathTemplates;?>js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="<?php echo PathTemplates;?>js/mainfunction.js"></script>
<script type="text/javascript" src="<?php echo PathTemplates;?>js/ddsmoothmenu.js">
</script>

<script type="text/javascript">

ddsmoothmenu.init({
	mainmenuid: "templatemo_menu", //menu DIV id
	orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
	classname: 'ddsmoothmenu', //class added to menu's outer DIV
	//customtheme: ["#1c5a80", "#18374a"],
	contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
})

</script>

<link rel="stylesheet" type="text/css" href="<?php echo PathTemplates;?>css/styles.css" />
</head>
    
<body id="home">
<div id="templatemo_wrapper">
    <!-- Заголовок сайта /НАЧАЛО/ -->
	<div id="templatemo_header">
    	<div id="site_title">
        	<h1><a href="/"></a></h1>
        </div>
    <!-- Заголовок сайта /НАЧАЛО/ -->
        
        <div id="header_right">
            <a href="/?controller=cart" class="add_to_cart" style="float: right;">Корзина</a>
            <p id="cartBox">
                <?php echo $cntInCart = !empty($cartCntItems)?$cartCntItems : "Нет"; ?>
                <?php if($cartCntItems==1): ?>
                    Товар
                <?php elseif($cartCntItems<=4): ?>
                    Товарa
                <?php else: ?>
                    Товаров
                <?php endif; ?>
            </p>
            <div class="cleaner"></div>
            <div id="templatemo_search">
                <form action="#" method="get">
                  <input type="text" value="Search" name="keyword" id="keyword" title="keyword" onfocus="clearText(this)" onblur="clearText(this)" class="txt_field" />
                  <input type="submit" name="Search" value="" alt="Search" id="searchbutton" title="Search" class="sub_btn"  />
                </form>
            </div>
         </div> <!-- END -->
    </div> <!-- END of header -->
    
    <!-- Горизонтальное меню /НАЧАЛО/ -->
    <div id="templatemo_menu" class="ddsmoothmenu">
        <ul>
            <?php foreach ($rsAllCat as $itemCat): ?>
                <li><a href="/?controller=category&id=<?php echo $itemCat['id'];?>"><?php echo $itemCat['title']; ?></a>
                    <?php if(isset($itemCat['children'])): ?>
                        <ul>
                            <?php foreach ($itemCat['children'] as $itemChildrenCat): ?>
                            <li><a href="/?controller=category&id=<?php echo $itemChildrenCat['id'];?>"><?php echo $itemChildrenCat['title']; ?></a>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
            <?php endforeach; ?>
        </ul>
        <br style="clear: left" />
    </div> 
    <!-- Горизонтальное меню /КОНЕЦ/ -->