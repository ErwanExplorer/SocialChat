<?php
    $bdb = new PDO("mysql:host=localhost;dbname=messagerie;charset=utf8;", "root", "");
    $recupMessage = $bdb->query('SELECT * FROM messages');
    while ($message = $recupMessage->fetch()){
        ?>
        <div class="message">
            <h4> <?= $message['pseudo']; ?> </h4>
            <p> <?= $message['message']; ?> </p>
        </div>
        <?php
    }

?>
