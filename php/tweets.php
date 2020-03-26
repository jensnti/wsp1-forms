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
        <header>
            <h1>Morgonbasunen!</h1>
        </header>
        <form action="tweets.php" method="POST">
            <textarea
                name="tweet-body"
                id="tweet-body"
                rows="4"
                maxlength="140"
                placeholder="Write something..."
                required><?php echo $_POST['tweet-body']; ?></textarea>
            <input type="submit" name="submit" value="Skicka">
        </form>
        <!-- 
            Här ska ni skapa ett formulär för att posta ett nytt tweet
            Utgå från vilka fält som tweetet har i databasen, vilka fält måste ni ha inputs för?
            Kolla sedan på post metoden i tweet klassen.
            Kom ihåg att ni måste filtrera och validera den input som kommer från användaren

            För att kontrollera om formuläret skickats så använder ni isset, se php kod nedan.
        -->
        <?php
        // testkod för att koppla till databasen och hämta alla tweets

use phpDocumentor\Reflection\Location;

include '../src/DbConnection.php';
        include '../src/Tweet.php';

        $dbInstance = DbConnection::getInstance();
        $dbh = $dbInstance->getConnection();

        $tweet = new Tweet($dbh);

        if (isset($_POST['submit']) && strlen($_POST['tweet-body']) > 10) {
            // hantera formulär

            // VALIDERA DATA $_POST['tweet-body']

            $filteredBody = filter_input(INPUT_POST, 'tweet-body', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $newId = $tweet->postTweet($filteredBody);

            // Om vi har ett id, ladda om sidan, annars visa error

            if (isset($newId['error'])) {
                // ERROR DOOOM!
            } else {
                header('Location: tweets.php');
            }

        } elseif (isset($_POST['submit'])) {
            echo "<p class=\"warning\">A tweet is required to be atleast 10 characters long.</p>";
        }

        /*
        * Hämta alla tweets och skriva ut dem
        */

        $tweets = $tweet->getAll();
        // $result = $tweet->getTweet(2);

        // dumpa resultatet
        // var_dump($result);

        foreach ($tweets as $tweet) {
            echo "<p>" . $tweet['body'] . "</p>";
        }

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