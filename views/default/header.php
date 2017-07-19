<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Web Store Template</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="<?php echo PathTemplates;?>css/templatemo_style.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" type="text/css" href="<?php echo PathTemplates;?>css/ddsmoothmenu.css" />

<script type="text/javascript" src="<?php echo PathTemplates;?>js/jquery.min.js"></script>
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
<script language="javascript" type="text/javascript" src="<?php echo PathTemplates;?>scripts/mootools-1.2.1-core.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo PathTemplates;?>scripts/mootools-1.2-more.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo PathTemplates;?>scripts/slideitmoo-1.1.js"></script>
<script language="javascript" type="text/javascript">
window.addEvents({
	'domready': function(){
            /* thumbnails example , div containers */
            new SlideItMoo({
                overallContainer: 'SlideItMoo_outer',
		elementScrolled: 'SlideItMoo_inner',
		thumbsContainer: 'SlideItMoo_items',		
		itemsVisible: 5,
		elemsSlide: 2,
		duration: 200,
		itemsSelector: '.SlideItMoo_element',
		itemWidth: 171,
		showControls:1});
		},
		
	});

	function clearText(field)
	{
		if (field.defaultValue == field.value) field.value = '';
		else if (field.value == '') field.value = field.defaultValue;
	}
</script>

</head>
    
<body id="home">