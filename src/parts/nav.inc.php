<?php
    $isUserConnected = isset($_SESSION["user"]);
?>
<div id="nav-bar">
    <nav>
        <ul>
            <li><a href="./index.php">LOGO</a></li>
            <div id="nav-menu">
                <li><a href="./index.php">Accueil</a></li>
                <li><a href="./catalog.php">Catalogue</a></li>
                <?php if ($isUserConnected === true) :?>                     
                    <li><a href="addBook.php">Ajouter un livre</a></li>
                <?php endif; ?>
            </div>
        </ul>
    </nav>
    <div class="login-container">
        <?php if ($isUserConnected === true && $_SESSION["user"]["useAdmin"] === 0) : ?>                     
            <form action="./logout.php" method="post">
                <p><?php echo $_SESSION["user"]['useLogin']; ?> (user)</p> 
                <a href="./profile.php">Mon profil</a> 
                <button type="submit" name="logout" class="btn btn-login">Se déconnecter</button>
            </form>
        <?php endif; ?>
        <?php if ($isUserConnected === true && $_SESSION["user"]["useAdmin"]===1) :?>                     
            <form action="./logout.php" method="post">
                <p><?php echo $_SESSION["user"]['useLogin']; ?> (admin)</p>  
                <a href="./profile.php">Mon profil</a> 
                <button type="submit" name="logout" class="btn btn-login">Se déconnecter</button>
            </form>
        <?php endif; ?>
        <?php if ($isUserConnected === false): ?>
            <form action="login.php" method="post">
                <div>
                    <label for="username"> </label>
                    <input type="text" name="useLogin" id="username" placeholder="Pseudo">
                </div>
                <div>
                    <label for="password"> </label>
                    <input type="password" name="usePassword" id="password" placeholder="Mot de passe">
                </div>
                <button type="submit" class="btn btn-login">Se connecter</button>
            </form>
        <?php endif; ?>
    </div>
</div>