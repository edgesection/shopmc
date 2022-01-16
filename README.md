# shopmc
В файлах:  
* articles.php 
* index.php 
* products.php  

надо вставить свой токен от лица пользователя и идентификатор группы в численном значении, где он является администратором  
Получить токен можно по ссылке: https://oauth.vk.com/authorize?client_id=2685278&scope=notify,photos,friends,audio,video,notes,pages,docs,status,questions,offers,wall,groups,messages,notifications,stats,ads,offline&redirect_uri=http://api.vk.com/blank.html&display=page&response_type=token&callback=callbackFunc

>Токен и идентификатор группы нужен для того, чтобы с помощью VK API выгружать новости и катологи с товарами
