<?php
    define('DB_DSN','pgsql:host=ec2-23-21-238-246.compute-1.amazonaws.com;port=5432;dbname=dbbqfb77qi7mpv');
    define('DB_USER','mopareauqspvoi');
    define('DB_PASS','1f326f36dbce42c9668300aac1d5927d9669d1ae60084d6a38bfad5968b4c083');

    // Create a PDO object called $db.
    $db = new PDO(DB_DSN, DB_USER, DB_PASS);

    try
    {
        $db = new PDO(DB_DSN, DB_USER, DB_PASS);
    }
    catch (PDOException $e)
    {
        print "Error: " . $e->getMessage();
        die(); // Force execution to stop on errors.
    }
?>