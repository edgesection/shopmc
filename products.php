<?php

	$token = '';
	$idGroup = '';

?>

<!DOCTYPE html>
<html>

<!-- Data create - 21.12.2020 in 12:35-->

<head>
	<title>MagicClothes - Интернет-магазин</title>
	<link rel="stylesheet" href="header.css">
	<link rel="stylesheet" href="products.css">
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
		<a href="articles.php"><span id="products">Статьи</span></a>
		<a href="aboutUs.php"><span id="aboutMe">Контакты</span></a>
	</div>

</header>

<main>

	<div class="categories">
		<span id="title">Каталог</span>

		<?php
		
			$dataAnswer = json_decode(file_get_contents('https://api.vk.com/method/market.getAlbums?owner_id=-'.$idGroup.'&count=100&access_token='.$token.'&v=5.126'));
			
			$countProducts = json_decode(file_get_contents('https://api.vk.com/method/market.get?owner_id=-'.$idGroup.'&count=200&access_token='.$token.'&v=5.126'));
			
			$idActiveCategories = $dataAnswer->response->items[$dataAnswer->response->items[$_GET['did']]->id]->title;
			
			echo '<div did="0" class="catProd0"><span id="name">Всё</span><span id="count">'.$countProducts->response->count.'</span></div>';
			
			for($i = 0; $i < $dataAnswer->response->count; $i++){
				
				echo '<div did="'.$dataAnswer->response->items[$i]->id.'" class="catProd'.$dataAnswer->response->items[$i]->id.'"><span id="name">'.$dataAnswer->response->items[$i]->title.'</span><span id="count">'.$dataAnswer->response->items[$i]->count.'</span></div>';
				
				if($dataAnswer->response->items[$i]->id == $_GET['did']){
					$idActiveCategories = $dataAnswer->response->items[$i]->title;
				}
				
			}
		
		?>
		
	</div>
	
	<?php
	
		if(strlen($_GET['did']) >= 1){
			echo '<span id="nameSection">'.$idActiveCategories.':</span>';
		}else{
			echo '<span id="nameSection">Всё:</span>';
		}
	
	?>
	
	<div class="products">
	
		<?php
		
			if(strlen($_GET['did']) >= 1){
				
				//https://api.vk.com/method/market.get?owner_id=-'+idGroup+'&album_id='+did+'&count=200&extended=1&access_token='+token+'&v=5.126
				
				$productsList = json_decode(file_get_contents('https://api.vk.com/method/market.get?owner_id=-'.$idGroup.'&album_id='.$_GET['did'].'&count=200&extended=1&access_token='.$token.'&v=5.126'));
				
				for($i = 0; $i < $productsList->response->count; $i++){
					
					echo '<div class="product product'.$productsList->response->items[$i]->id.'"><img src="'.$productsList->response->items[$i]->thumb_photo.'"><span id="name">'.$productsList->response->items[$i]->title.'</span><span id="price">'.(((integer) $productsList->response->items[$i]->price->amount)/100).' '.$productsList->response->items[$i]->price->currency->name.'</span><a href="https://vk.com/market-201275424?w=product-201275424_'.$productsList->response->items[$i]->id.'" target="_blank"><div class="buy">Купить</div></a></div>';
					
				}
				
			}else{
		
				$productsList = json_decode(file_get_contents('https://api.vk.com/method/market.get?owner_id=-'.$idGroup.'&count=200&extended=1&access_token='.$token.'&v=5.126'));
				
				for($i = 0; $i < $productsList->response->count; $i++){
					
					echo '<div class="product product'.$productsList->response->items[$i]->id.'"><img src="'.$productsList->response->items[$i]->thumb_photo.'"><span id="name">'.$productsList->response->items[$i]->title.'</span><span id="price">'.(((integer) $productsList->response->items[$i]->price->amount)/100).' '.$productsList->response->items[$i]->price->currency->name.'</span><a href="https://vk.com/market-201275424?w=product-201275424_'.$productsList->response->items[$i]->id.'" target="_blank"><div class="buy">Купить</div></a></div>';
					
				}
			
			}
		
		?>
		
	</div>
	
	<div class="lastNews">
		
		<span id="name">Статьи:</span>
	
		<div class="news">
		<?php
		
			$getListWallFromGroup = json_decode(file_get_contents("https://api.vk.com/method/wall.get?owner_id=-{$idGroup}&count=10&filter=all&extended=1&access_token={$token}&v=5.130"));
		
			for($i = 0; $i < count($getListWallFromGroup->response->items); $i++){
				
				$text = $getListWallFromGroup->response->items[$i]->text;
				if(strlen($text) <= 0 AND count($getListWallFromGroup->response->items[$i]->attachments) <= 0){
					continue;
				}
				
				echo '
					<div class="post post'.$i.'">
						<span id="author">'.($i+1).") ".$getListWallFromGroup->response->groups[0]->name.'</span>
						<span id="text">'.$text.'</span>';
						
				if(count($getListWallFromGroup->response->items[$i]->attachments) >= 1){
					echo '<img src="'.$getListWallFromGroup->response->items[$i]->attachments[0]->photo->sizes[(count($getListWallFromGroup->response->items[$i]->attachments[0]->photo->sizes) - 1)]->url.'" id="attachment">';
				}
		
				echo '<span id="time">'.date("d.m.Y",$getListWallFromGroup->response->items[$i]->date).'</span>
					</div>
				';
			}
		
			//echo json_encode($getListWallFromGroup);
		
		?>
		</div>
		
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
		
		let openCatalog = 0;
		
		$("main div.categories").click(function(){
			
			if(openCatalog == 0){
				$("main div.categories div").css({"display": "block"});
				$("main div.categories span#title").text("Каталог:");
				
				openCatalog = 1;
			}else{
				$("main div.categories div").css({"display": "none"});
				$("main div.categories span#title").text("Каталог");
				
				openCatalog = 0;
			}
			
		});
		
		let acitveCatBlock = 0;
		
		$("main div.categories div").hover(function(){
			
			let mouseActiveBlock = Number($(this).attr("did"));;
			
			if(mouseActiveBlock !== acitveCatBlock){
				$('main div.categories div.catProd'+mouseActiveBlock).css({"background": "#e6e6e6"});
			}
			
		}, function(){
			
			let mouseActiveBlock = Number($(this).attr("did"));;
			
			if(mouseActiveBlock !== acitveCatBlock){
				$('main div.categories div.catProd'+mouseActiveBlock).css({"background": "initial"});
			}
			
		});
		
		$("main div.categories div").click(function(){
			
			let did = Number($(this).attr("did"));
			
			$("main span#nameSection").text($('main div.categories div.catProd'+did+' span#name').text()+':');
			
			$('main div.categories div.catProd'+acitveCatBlock).css({"background": "initial"});
			
			if(did == 0){
				
				acitveCatBlock = 0;
				
				$.ajax({
					url: 'https://api.vk.com/method/market.get?owner_id=-'+idGroup+'&count=200&extended=1&access_token='+token+'&v=5.126',
					method: "GET",
					dataType: 'jsonp',
					success: function(data){
						
						if(data.error !== undefined){
							
							console.log("Err:");
							console.log(data);
							return false;
							
						}
						
						$("main div.products").text("");
						
						if(Number(data.response.count) <= 0){
							$("main div.products").html("<div class='notProducts'>Нет товаров</div>");
							return false;
						}
						
						for(let i = 0; i < Number(data.response.count); i++){
							
							$("main div.products").append('<div class="product product'+data.response.items[i].id+'"><img src="'+data.response.items[i].thumb_photo+'"><span id="name">'+data.response.items[i].title+'</span><span id="price">'+(Number(data.response.items[i].price.amount)/100)+' '+data.response.items[i].price.currency.name+'</span><a href="https://vk.com/market-201275424?w=product-201275424_'+data.response.items[i].id+'"><div class="buy">Купить</div></a></div>');
							
						}
						
					}
				});
				
				return false;
				
			}else{
				
				acitveCatBlock = did;
				
				$.ajax({
					url: 'https://api.vk.com/method/market.get?owner_id=-'+idGroup+'&album_id='+did+'&count=200&extended=1&access_token='+token+'&v=5.126',
					method: "GET",
					dataType: 'jsonp',
					success: function(data){
						
						if(data.error !== undefined){
							
							console.log("Err:");
							console.log(data);
							return false;
							
						}
						
						$("main div.products").text("");
						
						if(Number(data.response.count) <= 0){
							$("main div.products").html("<div class='notProducts'>Нет товаров</div>");
							return false;
						}
						
						for(let i = 0; i < Number(data.response.count); i++){
							
							$("main div.products").append('<div class="product product'+data.response.items[i].id+'"><img src="'+data.response.items[i].thumb_photo+'"><span id="name">'+data.response.items[i].title+'</span><span id="price">'+(Number(data.response.items[i].price.amount)/100)+' '+data.response.items[i].price.currency.name+'</span><a href="https://vk.com/market-201275424?w=product-201275424_'+data.response.items[i].id+'"><div class="buy">Купить</div></a></div>');
							
						}
						
					}
				});
				
				return false;
				
			}
			
		});
		
		$("main div.lastNews div.news div.post").click(function(){
			let idPost = $(this).attr("class").split(" ")[1];
			location.href = "articles.php#"+idPost;
		});
		
		document.querySelector("main div.categories").dispatchEvent(new Event("click"));
		
		let getDid = Number(location.search.replace("?did=", ""));
		console.log(getDid);
		
		if(getDid >= 0){
			acitveCatBlock = getDid;
			$('main div.categories div.catProd'+acitveCatBlock).css({"background": "#e6e6e6"});
		}else{
			acitveCatBlock = 0;
			$('main div.categories div.catProd'+acitveCatBlock).css({"background": "#e6e6e6"});
		}
		
	};

</script>

</body>

</html>