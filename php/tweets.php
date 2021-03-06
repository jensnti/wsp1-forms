<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tweets</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <main>

    <!-- Här ska ni skapa ett formulär för att posta ett nytt tweet
        Utgå från vilka fält som tweetet har i databasen, vilka fält måste ni ha inputs för?
        Kolla sedan på post metoden i tweet klassen.
        Kom ihåg att ni måste filtrera och validera den input som kommer från användaren

        För att kontrollera om formuläret skickats så använder ni isset, se php kod nedan

    -->
    <?php
    // testkod för att koppla till databasen och hämta alla tweets
    include '../src/DbConnection.php';
    include '../src/Tweet.php';
    
    $dbInstance = DbConnection::getInstance();
    $dbh = $dbInstance->getConnection();
    
    $tweet = new Tweet($dbh);
    
    if (isset($_POST['submit'])) {
        // hantera formulär
    }



    /*
     * Hämta alla tweets
     */

    $result = $tweet->getAll();
    
    // dumpa resultatet
    var_dump($result);

    /*
     * Din / er uppgift är att ta bort resulatdumpen
     * och ersätta den med kod för att snyggt formattera varje tweet
     * Vill ni utöka detta så får ni gå tillbaka till tidigare tweet uppgift
     * och använda templaten för utskriften.
     * https://github.com/jensnti/wsp1-tweet/tree/post44
     */

    ?>
    </main>
</body>
</html>