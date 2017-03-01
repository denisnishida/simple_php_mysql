<?php
    // Connect to database
    require 'connect.php';

    // run a SELECT query
    $query = "SELECT * FROM tweets ORDER BY saved_date DESC";

    // prepare a PDOStatement object
    $statement = $db->prepare($query); // Returns a PDOStatement object.
    $success = $statement->execute(); // The query is now executed.
    $tweets = $statement->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Challenge 5 - Twitter</title>
    </head>
    <body>
        <form action="insert.php" method="post">
            <fieldset>
                <ul>
                    <li>
                        <label for="newTweet">Tweet here:</label>
                        <input name="newTweet" id="newTweet" type="text" placeholder="What's going on?">
                        <input type="submit" value="tweet!">
                    </li>
                    <?php if($statement->rowCount() > 0): ?>
                        <?php foreach ($tweets as $t): ?>
                            <li>
                                <input name="oldTweet" type="text" disabled="disabled" value="<?=$t['status']?>">
                            </li>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <li>
                            <p>Sorry, no tweets here.</p>
                        </li>
                    <?php endif; ?>
                </ul>
            </fieldset>
        </form>
    </body>
</html>
