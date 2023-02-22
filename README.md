# Praca zaliczeniowa - Pomoc Drogowa
Praca zaliczeniowa oparta o interfejs bazodanowy wraz z systemem logowania, rejestracji, weryfikacji użytkowników.

## Cele
- Stworzenie interfejsu prostego w opsłudzę dla użytkownika gdzie dodawanie wpisów będzie intuicyjne.
- Hasła użytkowników muszą być odpowiednio zabezpieczone i zaszyfrowane.
- Zachowanie sesji użytkownika z wykożystaniem plików cookie

## Uwagi co do korzystania 
- Serwer udostępniający aplikacje musi obsługiwać PHP oraz mySQL(Mariadb).
- Aplikacja została zaprojektowana z myśla pracy pod nastepujacym forkiem serwera MySQL: *[MariaDB](https://mariadb.com/)*.

## Uruchamianie
- Utworzyć baze danych i wpisać jej nazwę w pliku **php/connecttodatabase.php** do zmiennej **$dbname**.
- Wpisać adres serwera na którym zainstalowana jest baza w pliku **sendaction/dbconnect.php** do zmiennej **$host**.
- W wybranej bazie należy utworzyć odpowiednie tabele używajac następujących komend:
    - `create table wyjazdy(ID int auto_increment primary key, Data date, Miejsce_wyjazdu varchar(50), Auto_zabrane varchar(50), Nazwisko varchar(50));`
    - `create table users(ID int primary key auto_increment, user varchar(50), user_secret varchar(60));`
