# Forms

Klona detta repo, till code eller public_html, se till att ni har en symlink om det är i code (ln -s).
Starta webbserver och navigera till index, arbeta med uppgifterna.

Det finns ett par grundläggande uppgifter

* Få testerna att fungera.
* Skriv klart testHasFields från TweetTest
* Skriv den metod som failar från TweetTest i Tweet klassen

Kolla sedan index.html för fortsatta uppgifter för hur ni ska skapa era formulär.

Utökade uppgifter

* Skriv klart metoden för att hämta en user, dvs. test ska vara grönt
* Skriv klart testet för att hämta alla users, dvs. det ska vara rött
* Skriv klart metoden för att göra testet grönt
* Koda users.php

# Tester

I detta repo finns ett antal tester för er att köra med phpunit. För att installera

    sudo apt install composer
    cd THISREPO
    composer install
    cd include
    cp dbinfo_example.php dbinfo.php
    nano dbinfo.php
    mysql -u USER -p
    >create database forms;
    exit
    mysql -u USER -p forms < sql/forms.sql

Förhoppningsvis är allt igång, var vaksam på fel.
För att köra tester skriv

    ./vendor/bin/phpunit --bootstrap vendor/autoload.php --colors --testdox tests

Om du får eventuella fel kring att den inte hittar klasser så testa

    composer dump-autoload


