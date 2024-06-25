<footer>
    <div id="footer-container">
        <h2>Share With Me</h2>
        <a href="mailto:info@sharewithme.ch">info@sharewithme.ch</a>
        <nav>
            <ul>
                <li><a href="../../index.php">Accueil</a></li>
                <li><a href="../../src/pages/catalog.php">Catalogue</a></li>
                <?php if ($isUserConnected === true) :?>                     
                    <li><a href="../../src/pages/addBook.php">Ajouter un livre</a></li>
                <?php endif; ?>            
            </ul>
        </nav>
        <hr>
        <div id="footer-end">
            <p>&copy; 2023 Share With Me. All rights reserved</p>
            <a href="#top">Back to top</a>
        </div>
    </div>
</footer>