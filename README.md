# Forms

Detta är ett grupparbete vi kommer att köra i ALC.
Det finns utrymme för individuellt arbete och detta kommer utgå från commits.
Så var noga med att commita som dig(git push -> dina uppgifter).
Vill du individuellt arbeta med utökade uppgifter, skapa då en branch NAMN som du arbetar och commitar i.

    branch DITTNAMN
    checkout BRANCHNAMN

Klona detta repo, till code eller public_html, se till att ni har en symlink om det är i code (ln -s).
Viktigt då detta repo är kopplat till ert team på GIT.

    git clone URL

Starta webbserver och navigera till index, arbeta med uppgifterna.

Kolla sedan index.html för fortsatta uppgifter för hur ni ska skapa era formulär.
Formulär i tweets.php är kärnan i detta.

Det finns ett par grundläggande uppgifter med testerna

* Få testerna att fungera.
* Skriv klart testHasFields från TweetTest
* Skriv den metod som failar från TweetTest i Tweet klassen

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

## Jag har panik och minns inte vad PHP och mysql var/är!!111!

* https://github.com/jensnti/wsp1-grunder
* https://github.com/jensnti/wsp1-mysql
* https://github.com/jensnti/wsp1-tweet

Repo om tester, https://github.com/jensnti/wsp1-test