
<?php

	$access_token = "";
	$idGroup = "";
	
	$getLastProduct = json_decode(file_get_contents("https://api.vk.com/method/market.get?owner_id=-".$idGroup."&count=200&extended=1&access_token=".$access_token."&v=5.126"));

?>

<!DOCTYPE html>
<html>

<!-- Data create - 21.12.2020 in 12:35-->

<head>
	<title>MagicClothes - Интернет-магазин</title>
	<link rel="stylesheet" href="header.css">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="footer.css">
	<link rel="shortcut icon" href="favicon.png">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<script src="jq.js"></script>
	<script src="jqui.js"></script>
</head>

<body>

<header>

	<a href="index.php"><div class="logo">
		<img src="load.gif">
		<span>MagicClothes</span>
	</div></a>
	
	<img src="menu.png" id="menu">
	<div class="otherPage">
		<a href="products.php"><span id="products">Каталог</span></a>
		<a href="articles.php"><span id="products">Статьи</span></a>
		<a href="aboutUs.php"><span id="aboutMe">Контакты</span></a>
	</div>

</header>

<main>

	<div class="bannerSlide">
		<a href="" id="linkImg1Slide"><img src="" id="bannerSlide"></a>
		<a href="" id="linkImg2Slide"><img src="" id="banner2Slide"></a>
	</div>
	
	<div class="title">Новые товары:</div>
	
	<div class="lastProduct">
		<div class="leftBlock">
			<img src="<?php echo $getLastProduct->response->items[0]->photos[0]->sizes[(count($getLastProduct->response->items[0]->photos[0]->sizes) - 1)]->url; ?>" id="photoProduct">
		</div>
		<div class="rightBlock">
			<span id="name"><?php echo $getLastProduct->response->items[0]->title; ?></span>
			<span id="price">Цена: <?php echo $getLastProduct->response->items[0]->price->text; ?></span>
			<span id="desc"><?php echo $getLastProduct->response->items[0]->description; ?></span>
			<a href="<?php echo "https://vk.com/market-201275424?w=product-201275424_".$getLastProduct->response->items[0]->id; ?>" target="_blank"><div class="buy">Купить</div></a>
		</div>
	</div>
	
	<script>
		console.log(<?php echo json_encode($getLastProduct); ?>);
	</script>

	<div class="title">Что мы делаем?</div>
	
	<div class="post">
		<div class="elementPost elementPost1">
			<div class="image"><img src="clothes/1.jpg"></div>
			<div class="text"><span>Мы создаём уникальный стиль одежды, который редко где встречается. Все товары состоят из качественных материалов и до продажи проверяются несколько раз</span></div>
		</div>
		<div class="elementPost elementPost2">
			<div class="text"><span>Мы быстро доставляем товар до клиента. Весь заказываемый товар храниться в герметичных упаковках. Так же мы предоставляем весь размещаемый товар оптом для её перепродажи.</span></div>
			<div class="image"><img src="clothes/2.jpg"></div>
		</div>
		<div class="elementPost elementPost3">
			<div class="image"><img src="clothes/3.jpg"></div>
			<div class="text"><span>Если наш товар вам не понравился, либо он пришёл не таким, как был указан вами, то наш бренд предоставляет гарантию в 14 дней, после принятия заказа. В указанные сроки вы можете вернуть деньги или обменять товар на другой.</span></div>
		</div>
	</div>

	<div class="title">Статьи:</div>

	<div class="banner">
		<a href="" id="linkImg1"><img src="" id="banner"></a>
		<a href="" id="linkImg2"><img src="" id="banner2"></a>
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

	const token = "";
	const idGroup = "";

	window.onload = function(){
		
		$("header div.logo img").attr("src", "favicon.png");
		$("main").css({"display": "block"});
		
		$("main div.post div.elementPost1 div.image img").animate({"right": "0px"}, 500);
		$("main div.post div.elementPost1 div.text span").animate({"left": "0px"}, 500);
		
		setTimeout(function(){
		
			$("main div.post div.elementPost2 div.image img").animate({"left": "0px"}, 500);
			$("main div.post div.elementPost2 div.text span").animate({"right": "0px"}, 500);
		
		}, 500);
		
		setTimeout(function(){
		
			$("main div.post div.elementPost3 div.image img").animate({"right": "0px"}, 500);
			$("main div.post div.elementPost3 div.text span").animate({"left": "0px"}, 500);
		
		}, 1000);
		
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
		
		let photoArray = {};
		let idPhoto = 1;
		let slide = 0;
		let workSI = true;
		
		let tempCh = 0;
		
		$.ajax({
			url: 'https://api.vk.com/method/wall.get?owner_id=-'+idGroup+'&count=100&filter=all&extended=1&access_token='+token+'&v=5.130',
			method: 'POST',
			dataType: 'jsonp',
			success: function(data){
				
				if(data.response.items !== undefined){
					for(let i = 0; i < data.response.items.length; i++){
					
						if(data.response.items[i] !== undefined && data.response.items[i].attachments !== undefined && data.response.items[i].attachments[0].photo.id !== undefined){
							//photoArray.push(data.response.items[i].attachments[0].photo.sizes[(data.response.items[i].attachments[0].photo.sizes.length - 1)].url);
							photoArray[tempCh] = [data.response.items[i].attachments[0].photo.sizes[(data.response.items[i].attachments[0].photo.sizes.length - 1)].url,"articles.php#post"+data.response.items[i].id];
							tempCh++;
						}
					
					}
					
					console.log(photoArray);
					$("main img#banner").attr("src", photoArray[0][0]);
					$("main img#banner2").attr("src", photoArray[1][0]);
					
					$("main a#linkImg1").attr("href", photoArray[0][1]);
					$("main a#linkImg2").attr("href", photoArray[1][1]);
					
					$("main img#banner, main img#banner2").css({"display": "block"});
				}
				
			}
		});
		
		setInterval(function(){
		
			if(workSI == false){
				return false;
			}
			
			if(Object.keys(photoArray).length <= (idPhoto + 1)){
				idPhoto = 0;
			}else{
				idPhoto++;
			}
			
			console.log(idPhoto);
			
			if(slide == 0){
				$("main img#banner").animate({"left": "-100%"}, 2000);
				setTimeout(function(){
					$("main img#banner").css({"left": "100%"});
					$("main img#banner").attr("src", photoArray[idPhoto][0]);
					$("main a#linkImg1").attr("href", photoArray[idPhoto][1]);
				}, 2000);
				$("main img#banner2").css({"left": "100%"});
				$("main img#banner2").animate({"left": "0%"}, 2000);
				slide = 1;
			}else{
				$("main img#banner2").animate({"left": "-100%"}, 2000);
				setTimeout(function(){
					$("main img#banner2").css({"left": "100%"});
					$("main img#banner2").attr("src", photoArray[idPhoto][0]);
					$("main a#linkImg2").attr("href", photoArray[idPhoto][1]);
				}, 2000);
				$("main img#banner").css({"left": "100%"});
				$("main img#banner").animate({"left": "0%"}, 2000);
				slide = 0;
			}
			
			
		}, 5000);
		
		let photoArraySlide = {0:["1.png","products.php?did=14"],1:["2.png","products.php?did=14"],2:["3.png","aboutUs.php"],3:["4.png","articles.php"]};
		let idPhotoSlide = 1;
		let slideS = 0;
		
		$("main img#bannerSlide").attr("src", "slide/"+photoArraySlide[0][0]);
		$("main img#banner2Slide").attr("src", "slide/"+photoArraySlide[1][0]);
		
		$("main a#linkImg1Slide").attr("href", photoArraySlide[0][1]);
		$("main a#linkImg2Slide").attr("href", photoArraySlide[1][1]);
		
		setInterval(function(){
		
			if(workSI == false){
				return false;
			}
			
			if(Object.keys(photoArraySlide).length <= (idPhotoSlide + 1)){
				idPhotoSlide = 0;
			}else{
				idPhotoSlide++;
			}
			
			console.log(idPhotoSlide);
			
			if(slideS == 0){
				$("main img#bannerSlide").animate({"left": "-100%"}, 2000);
				setTimeout(function(){
					$("main img#bannerSlide").css({"left": "100%"});
					$("main img#bannerSlide").attr("src", "slide/"+photoArraySlide[idPhotoSlide][0]);
					$("main a#linkImg1Slide").attr("href", photoArraySlide[idPhotoSlide][1]);
				}, 2000);
				$("main img#banner2Slide").css({"left": "100%"});
				$("main img#banner2Slide").animate({"left": "0%"}, 2000);
				slideS = 1;
			}else{
				$("main img#banner2Slide").animate({"left": "-100%"}, 2000);
				setTimeout(function(){
					$("main img#banner2Slide").css({"left": "100%"});
					$("main img#banner2Slide").attr("src", "slide/"+photoArraySlide[idPhotoSlide][0]);
					$("main a#linkImg2Slide").attr("href", photoArraySlide[idPhotoSlide][1]);
				}, 2000);
				$("main img#bannerSlide").css({"left": "100%"});
				$("main img#bannerSlide").animate({"left": "0%"}, 2000);
				slideS = 0;
			}
			
			
		}, 5000);
		
		$(window).bind('focus', function() {
            console.log("focus!");
			workSI = true;
        });

        $(window).bind('blur', function() {
            console.log("blur!");
			workSI = false;
        });
		
	};

</script>

</body>

</html>