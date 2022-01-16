# Magic Clothes Shop

## Установка
Для работы требуется сервер, который поддерживает *PHP*  
Также необходимо установить все файлы в необходимую директорию  

В файлах:  
* articles.php 
* index.php 
* products.php  

надо вставить свой токен от лица пользователя и идентификатор группы в численном значении, где он является администратором  
Получить токен можно по ссылке: [Получение токена пользователя](https://oauth.vk.com/authorize?client_id=2685278&scope=notify,photos,friends,audio,video,notes,pages,docs,status,questions,offers,wall,groups,messages,notifications,stats,ads,offline&redirect_uri=http://api.vk.com/blank.html&display=page&response_type=token&callback=callbackFunc "Получение токена")  
Идентификатор группы можно найти в основных настройках группы:
![Настройки группы](/readme/mc1.PNG "Настройки группы")

Теперь в указанных файлах PHP и JS, нужно в переменные `token` и `idGroup` вставить значения  

![README1](readme1.png "PHP файл")
![README2](readme2.png "JS файл")

>Токен и идентификатор группы нужен для того, чтобы с помощью VK API выгружать новости и катологи с товарами

## Проект в действии
Ссылка на рабочий проект: [click](https://edgesection.000webhostapp.com/ "рабочий проект")
