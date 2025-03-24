XAMPP / PHP 8.2.12
<a href="https://www.apachefriends.org/download.html">Link Xampp</a>

Instalujemy XAMPP

Pobieramy projekt z respozytorium do folderu "htdocs" w lokalizacji zainstalowanego XAMPP<br>
<a href="https://github.com/lipa71/to_do_list">Link</a>

Konfiguracja .env jest zawarta w pliku .env.example

Włączamy aplikację XAMPP Control Panel i uruchamiamy moduły Apache oraz MySQL

Za pomocą tego linku wchodzimy do panelu phpmyadmin i tworzymy bazę danych o nazwie "to_do_app_database"
http://localhost/to_do_list/phpmyadmin

Włączamy terminal CMD przechodzimy do lokalizacji projektu i wpisujemy poniższe komendy

<li>npm install</li>
<li>php artisan migrate</li>
<li>npm run dev</li>
