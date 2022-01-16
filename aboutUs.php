
<!DOCTYPE html>
<html>

<!-- Data create - 21.12.2020 in 12:35-->

<head>
	<title>MagicClothes - О нас</title>
	<link rel="stylesheet" href="header.css">
	<link rel="stylesheet" href="aboutUs.css">
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
		<a href="articles.php"><span id="products">Статьи</span></a>
	</div>

</header>

<main>

	<div class="info">
		<span id="title">О нас: </span>

		<div class="text">Мы работаем в сфере продаж уникальной и лимитированной одежды.</div>
		<span id="contacts">Контакты:</span>
		<div class="contacts">
			<hr>
			<div><span id="name">Телефон:</span><a href="tel:+79723472389"><span id="sel">+7 972 347 2389</span></a></div>
			<div><span id="name">Почта:</span><a href="mailto:advert@mail.ru"><span id="sel">advert@mail.ru</span></a></div>
			<div><span id="name">Адрес:</span><span id="sel">Москва Стройковская ул. дом 7</span></div>
			<hr>
			<div><span id="name">Телефон:</span><a href="tel:+74874307563"><span id="sel">+7 487 430 7563</span></a></div>
			<div><span id="name">Почта:</span><a href="mailto:magiclothes@gmail.com"><span id="sel">magiclothes@gmail.com</span></a></div>
			<div><span id="name">Адрес:</span><span id="sel">Москва Комсомольская ул. дом 1</span></div>
			<hr>
			<div><span id="name">Телефон:</span><a href="tel:+79836290983"><span id="sel">+7 983 629 0983</span></a></div>
			<div><span id="name">Почта:</span><a href="mailto:productsmc@gmail.com"><span id="sel">productsmc@gmail.com</span></a></div>
			<div><span id="name">Адрес:</span><span id="sel">Москва Тверская ул. дом 5</span></div>
			<hr>
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2246.494424758605!2d37.67083741548792!3d55.73253790102275!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46b54adaf2b6787b%3A0xe8ca022e9c491b7c!2z0KHRgtGA0L7QudC60L7QstGB0LrQsNGPINGD0LsuLCDQnNC-0YHQutCy0LAsIDEwOTMxNg!5e0!3m2!1sru!2sru!4v1614240497360!5m2!1sru!2sru" allowfullscreen="" loading="lazy"></iframe>
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