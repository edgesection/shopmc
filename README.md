# shopmc
В файлах:  
* articles.php 
* index.php 
* products.php  

надо вставить свой токен от лица пользователя и идентификатор группы в численном значении, где он является администратором  
Получить токен можно по ссылке: [Получение токена пользователя](https://oauth.vk.com/authorize?client_id=2685278&scope=notify,photos,friends,audio,video,notes,pages,docs,status,questions,offers,wall,groups,messages,notifications,stats,ads,offline&redirect_uri=http://api.vk.com/blank.html&display=page&response_type=token&callback=callbackFunc "Получение токена")

Теперь в указанных файлах PHP и JS, нужно в переменные `token` и `idGroup` вставить значения
Пример:
  <?php

	  $token = 'y3g98fuy83974uyf8j3y4f783984ufik934uf8u438rfku43f';
	  $idGroup = '1';

  ?>

>Токен и идентификатор группы нужен для того, чтобы с помощью VK API выгружать новости и катологи с товарами
