<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="shortcut icon" type="image.png" href="images/ChatAnonymeLogo.png">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <title>SocialChat</title>
</head>
<body>

    <!--Haut de Page-->
    <header>
        <img src="images/ChatAnonymeLogo.png"
        width="100"
        height="100"
        >

        <div id="content">

            <div class="rightbox">
                <a class="debut">SocialChat</a>
            </div>

        <div class="leftbox">
        <nav class="menu">
            <ul>
                <li class="btn1">
                    <a href="Inscription.php">
                        Inscription
                    </a>
                </li>
                <li class="btn">
                    <a href="Connexion.php">
                        Connexion
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    
</div>
    </header>

    <!--Contenue de la Page-->
    <?php
        $bdb = new PDO("mysql:host=localhost;dbname=messagerie;charset=utf8;", "root", "");
        if(isset($_POST['valider'])) {
            if(!empty($_POST['pseudo']) AND !empty($_POST['message'])) {
                $pseudo = htmlspecialchars($_POST['pseudo']);
                $message = nl2br(htmlspecialchars($_POST["message"]));

                $insererMessage = $bdb->prepare('INSERT INTO messages(pseudo, message) VALUES (?, ?)');
                $insererMessage->execute(array($pseudo, $message));

            } else {
                echo "Veuillez compléter tous les champs";
            }
        }

    ?>

    <section>
        <div class="center">
        <p class="welcome">ChatAnonyme :</p>

            <br>
            <form method="POST" action="" align="center">
                <input type="text" name="pseudo">
                <br><br>
                <textarea name="message"> </textarea>
                <br>
                <input type="submit" name="valider">

            </form>
            <section id="messages">  </section>

            <script>
                setInterval('load_message()', 500);
                function load_message() {
                    $('#messages').load('loadMessage.php');
                }
            </script>

    </div>

    </section>


</body>

<!--Pied de Page-->
<footer><p>Copyright &copy 2022 - 2023 | SocialChat | All Rights Reserved</p></footer>



</html>