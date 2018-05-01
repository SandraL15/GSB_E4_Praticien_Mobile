<html>
    <head>
        <meta charset ="UTF-8">
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.0a3/jquery.mobile-1.0a3.min.css" />
<!--    <script src="http://code.jquery.com/jquery-1.5.min.js"></script>   
    <script src="http://code.jquery.com/mobile/1.0a3/jquery.mobile-1.0a3.min.js"></script>-->
<!--    <script src="./js/utils.js"></script> -->
    </head>
    <body>
        <div id="container">
            <form action="index.php" method="POST">
                <h1>Connexion</h1>
                <label>Nom d'utilisateur</label>
                <input type="hidden" name='action' value='verifConnexion'>
                <input type="text" placeholder="nom d'utilisateur" name="login">
               
                <label>Mot de passe</label>
                <input type="password" placeholder="mot de passe" name="mdp">
               
                <input type="submit" value="login" id='submit'>
            </form>
        </div>
    </body>
</html>