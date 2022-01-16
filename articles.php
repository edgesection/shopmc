<?php

	//https://oauth.vk.com/authorize?client_id=2685278&scope=notify,photos,friends,audio,video,notes,pages,docs,status,questions,offers,wall,groups,messages,notifications,stats,ads,offline&redirect_uri=http://api.vk.com/blank.html&display=page&response_type=token&callback=callbackFunc
	
	$token = '';
	$idGroup = '';

?>

<!DOCTYPE html>
<html>

<!-- Data create - 21.12.2020 in 12:35-->

<head>
	<title>MagicClothes - Интернет-магазин</title>
	<link rel="stylesheet" href="header.css">
	<link rel="stylesheet" href="articles.css">
	<link rel="stylesheet" href="footer.css">
	<link rel="shortcut icon" href="favicon.png">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<script src="jq.js"></script>
</head>

<body>

<header>

	<a href="index.php"><div class="logo">
		<img src="load.gif">
		<span>MagicClothes</span>
	</div></a>
	
	<img src="menu.png" id="menu">
	<div class="otherPage">
		<a href="index.php"><span id="products">Главная</span></a>
		<a href="products.php"><span id="products">Каталог</span></a>
		<a href="aboutUs.php"><span id="aboutMe">Контакты</span></a>
	</div>

</header>

<span id="name">Статьи:</span>

<main>
	
	<div class="news">
	<?php
		
		$getListWallFromGroup = json_decode(file_get_contents("https://api.vk.com/method/wall.get?owner_id=-{$idGroup}&count=100&filter=all&extended=1&access_token={$token}&v=5.130"));
		
		for($i = 0; $i < count($getListWallFromGroup->response->items); $i++){
			echo '
				<div class="post post'.$i.'" id="post'.$getListWallFromGroup->response->items[$i]->id.'">
					<a href="https://vk.com/club'.$getListWallFromGroup->response->groups[0]->id.'" target="_blank"><img src="'.$getListWallFromGroup->response->groups[0]->photo_50.'" id="photoGroup"></a>
					<div class="rightBlock"><a href="https://vk.com/club'.$getListWallFromGroup->response->groups[0]->id.'" target="_blank"><span id="author">'.$getListWallFromGroup->response->groups[0]->name.'</span></a>
					<span id="time">'.date("d.m.Y",$getListWallFromGroup->response->items[$i]->date).'</span>
					<span id="text">'.$getListWallFromGroup->response->items[$i]->text.'</span></div>';
					
			if(strlen($getListWallFromGroup->response->items[$i]->attachments[0]->photo->id) >= 1){
				
				echo '<img src="'.$getListWallFromGroup->response->items[$i]->attachments[0]->photo->sizes[(count($getListWallFromGroup->response->items[$i]->attachments[0]->photo->sizes) - 1)]->url.'" id="attachment">';
				
			}
					
			echo '</div>
			';
			
		}
		
		echo '<script> console.log('.json_encode($getListWallFromGroup).'); </script>';
		
		//echo json_encode($getListWallFromGroup);
		
	?>
	</div>

</main>

<div class="footer">
	<div class="leftBlock">
		<span id="nameCompany">MagicClothes</span>
		<span id="copyright">Copytight 2020-2021</span>
		<a href="mailto:productsmc@gmail.com"><span id="email">productsmc@gmail.com</span></a>
	</div>
	<div class="rightBlock">
		<a href="https://www.facebook.com/groups/1037106043469504" target="_blank"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d5/Facebook_F_icon.svg/1200px-Facebook_F_icon.svg.png"></a>
		<a href="https://www.instagram.com/igor.eremenko_shop" target="_blank"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/e7/Instagram_logo_2016.svg/768px-Instagram_logo_2016.svg.png"></a>
		<a href="https://vk.com/magiclothes" target="_blank"><img src="https://cdn.worldvectorlogo.com/logos/vk-1.svg"></a>
	</div>
</div>

<script>

	const token = '';
	const idGroup = '';

	window.onload = function(){
		
		$("header div.logo img").attr("src", "favicon.png");
		$("main").css({"display": "block"});
		
		let openMenu = 0;
		
		$("header img#menu").click(function(){
		
			if(openMenu == 0){
		
				$("header div.otherPage").css({"position": "absolute", "top": "50px", "text-align": "center", "width": "100%", "background": "white", "padding": "10px 0px", "z-index": "1", "display": "block"});
				$("header div.otherPage span").css({"margin": "10px 0px 0px 20px", "display": "block"});
				
				openMenu = 1;
			
			}else{
			
				$("header div.otherPage").css({"position": "relative", "top": "10px", "text-align": "left", "width": "initial", "background": "white", "padding": "0px", "z-index": "1", "display": "none"});
				$("header div.otherPage span").css({"margin": "00px 0px 0px 20px", "display": "inline-block"});
				
				openMenu = 0;
			
			}
		
		});
		
		
	};

</script>

</body>

</html>