<?php
    // Extract the data POSTed sanitizing user input
    $newTweet = filter_input(INPUT_POST, 'newTweet', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    // Get the size of the tweet
    $tweetSize = strlen($newTweet);

    if ($tweetSize >= 1 && $tweetSize <= 140)
    {
        // Connect to database
        require 'connect.php';

        // Insert tweet in the tweets table
        $query = "INSERT INTO tweets (status) values (:newTweet)";
        $statement = $db->prepare($query);
        $statement->bindValue(':newTweet', $newTweet);
        $statement->execute();

        // Redirect user to index.php
        header('Location: index.php');

        // Exit the script normally
        exit(0);
    }
?>

<!DOCTYPE html>
<!-- Denis Nishida - Section 2 - WEBD-2006 -->
<!-- Challenge 5 -->
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Challenge 5 - Twitter</title>
    </head>
    <!-- For test   -->
    <!--    <pre>--><?php //print_r($_POST) ?><!--</pre>-->
    <body>
        <?php if($tweetSize < 1 || $tweetSize > 140): ?>
            <p>The tweet must have between 1 and 140 characters.</p>
        <?php endif; ?>
    </body>
</html>
