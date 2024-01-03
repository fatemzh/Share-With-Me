<?php
/**
 * ETML
 * Auteur: Salma Abdulkadir
 * Date: 21.11.2023
 * Description: Programme de la calsse Database permettant de gérer les interactions entre l'application et la BD.
 */

 class Database {
    // Variable de classe
    private $connector;

    /**
     * Constructeur
     * Initialise la connexion à la base de données en utilisant les paramètres définis dans le fichier de configuration config.php.
     */
    public function __construct() {
        // Configuration de la base de donnée
        $configs = include("../config/config.php");

        // Connexion via PDO et utilise la variable de classe $connector
        try
        {
            $this->connector = new PDO('mysql:host='. $configs['host'] . ':' . $configs['port'] . ';dbname=' . $configs['dbname'] . ';charset=utf8' , $configs['username'], $configs['password']);
        }
        catch (PDOException $e)
        {
            die('Erreur : ' . $e->getMessage());
        }
        
    }

    /**
     * Exécute une requête de type simple (sans clause WHERE).
     * @param string $query La requête SQL à exécuter.
     * @return mixed Renvoie le résultat de la requête.
     */
    private function querySimpleExecute($query) {
        // Utilisation de query pour effectuer une requête
        return $this->connector->query($query);
    }

    /**
     * Prépare, lie les valeurs et exécute une requête avec des paramètres (SELECT avec WHERE ou INSERT, UPDATE ou DELETE).
     * @param string $query La requête SQL à exécuter.
     * @param array $binds Les valeurs à lier à la requête.
     * @return mixed Renvoie le résultat de la requête.
     */
    private function queryPrepareExecute($query, $binds) {       
        // Utilisation de prepare pour effectuer une requête
        $req = $this->connector->prepare($query);
        foreach($binds as $bind => $value){
            $req->bindValue($bind, $value);
        }
        $req->execute();
        
        // Retourne l'objet de requête
        return $req;
    }

    /**
     * Formate les données résultantes d'une requête en tableau associatif.
     * @param mixed $req Le résultat de la requête.
     * @return array Le tableau associatif contenant les données.
     */
    private function formatData($req) {
        // Transforme le résultat d'une requête en tableau associatif
        return $req->fetchALL(PDO::FETCH_ASSOC);
    }

    /**
     * Récupère tous les utilisateurs de la table t_user.
     * @return array Le tableau associatif contenant les données des utilisateurs.
     */
    public function getAllUsers() {
        // Requête SQL pour récupérer tous les utilisateurs
        $query = 'SELECT * FROM t_user';

        // Effectue la requête
        $req = $this->querySimpleExecute($query);

        // Formate le résultat sous forme de tableau associatif
        $allUsers = $this->formatData($req); 

        // Retourne le tableau associatif
        return $allUsers;
    }

    /**
     * Récupère les données d'un utilisateur spécifique.
     * @param int $idTeacher L'identifiant de l'utilisateur.
     * @return array Le tableau associatif contenant les données de l'utilisateur.
     */
    public function getOneUser($idUser) {    
        // Requête SQL pour récupérer un utilisateur
        $query = "SELECT * FROM t_user  WHERE idUser = :idUser;";

        // Prépare et exécute la requête avec le paramètre lié
        $binds = array("idUser" => $idUser);
        $req = $this->queryPrepareExecute($query, $binds);

        // Formate le résultat sous forme de tableau associatif
        $users = $this->formatData($req);

        // Retourne le tableau associatif
        return $users[0];
    }

    /**
     * Récupère tous les auteurs de la table t_user.
     * @return array Le tableau associatif contenant les données des auteurs.
     */
    public function getAllAuthors() {
        // Requête SQL pour récupérer tous les auteurs
        $query = 'SELECT * FROM t_author';

        // Exécute la requête
        $req = $this->querySimpleExecute($query);

        // Formate le résultat sous forme de tableau associatif
        $allAuthors = $this->formatData($req); 

        // Retourne le tableau associatif
        return $allAuthors;
    }

     /**
      * Récupère les données d'un auteur spécifique.
      * @param int $idTeacher L'identifiant de l'auteur.
      * @return array Le tableau associatif contenant les données de l'auteur.
      */
     public function getOneAuthor($idAuthor) {
         // Requête SQL pour récupérer un auteur
         $query = "SELECT * FROM t_author  WHERE idAuthor = :idAuthor;";

         // Prépare et exécute la requête avec le paramètre lié
         $binds = array("idAuthor" => $idAuthor);
         $req = $this->queryPrepareExecute($query, $binds);

         // Formate le résultat sous forme de tableau associatif
         $authors = $this->formatData($req);

         // Retourne le tableau associatif
         return $authors[0];
     }

    /**
     * Récupère tous les ouvrages de la table t_book.
     * @return array Le tableau associatif contenant les données des ouvrages.
     */
    public function getAllBooks() {
        // Requête SQL pour récupérer tous les ouvrages
        $query = 'SELECT * FROM t_book';

        // Exécute la requête
        $req = $this->querySimpleExecute($query);

        // Formate le résultat sous forme de tableau associatif
        $allBooks = $this->formatData($req); 

        // Retourne le tableau associatif
        return $allBooks;

    }

    /**
     * Récupère tous les ouvrages d'un utilisateur spécifique.
     * @param int $idUser L'identifiant de l'utilisateur.
     * @return array Le tableau associatif contenant les données des ouvrages de l'utilisateur.
     */
    public function getUserBooks($idUser) {
        // Requête SQL pour récupérer tous les ouvrages de l'utilisateur
        $query = 'SELECT * 
        FROM t_book 
        JOIN t_author ON fkAuthor = idAuthor
        WHERE fkUser=:idUser';

        // Prépare et exécute la requête avec le paramètre lié
        $binds = array("idUser" => $idUser);
        $req = $this->queryPrepareExecute($query, $binds);

        // Formate le résultat sous forme de tableau associatif
        $usersBooks = $this->formatData($req);

        // Retourne le tableau associatif
        return $usersBooks;
    }

    /**
     * Récupère les données d'un ouvrage spécifique.
     * @param int $idBook L'identifiant de l'ouvrage.
     * @return array Le tableau associatif contenant les données de l'ouvrage.
     */
    public function getOneBook($idBook) {
        // Requête SQL pour récupérer un ouvrage
        $query = "SELECT * FROM t_book  WHERE idBook = :idBook;";

        // Prépare et exécute la requête avec le paramètre lié
        $binds = array("idBook" => $idBook);
        $req = $this->queryPrepareExecute($query, $binds);

        // Formate le résultat sous forme de tableau associatif
        $books = $this->formatData($req);

        // Retourne le tableau associatif
        return $books[0];
    }

    /**
     * Récupère les données des 5 derniers ouvrages ajoutés.
     * @return array Le tableau associatif contenant les données des 5 ouvrages.
     */
    public function getNewBooks() {
        // Requête SQL pour récupérer les 5 derniers ouvrages ajoutés
        $query = "SELECT * FROM t_book ORDER BY idBook DESC LIMIT 5";

        // Exécute la requête SQL
        $req = $this->querySimpleExecute($query);
    
        // Formate le résultat sous forme de tableau associatif
        $newBooks = $this->formatData($req); 
    
        // Retourne le tableau associatif 
        return $newBooks;
    }

    /**
     * Récupère la moyenne des évaluations pour un ouvrage donné.
     * @param int $idBook L'identifiant de l'ouvrage.
     * @return array La moyenne des évaluations de l'ouvrage ou null s'il n'y en a pas.
     */
    public function getEvaluation($idBook) {
        // Vérifie si $idBook est non nul et numérique
        if ($idBook === null || !is_numeric($idBook)) {
            // Gére l'erreur ou retourne une valeur par défaut
            return null;
        }

        // Requête SQL pour récupérer la moyenne des évaluations pour un ouvrage donné
        $query = "SELECT AVG(evaluation) as average FROM t_evaluation WHERE fkBook = :idBook";

        // Prépare et exécute la requête avec le paramètre lié
        $binds = array("idBook" => $idBook);
        $req = $this->queryPrepareExecute($query, $binds);

        // Formate le résultat sous forme de tableau associatif
        $evaluation = $this->formatData($req);

        // Retourne le premier élément (la moyenne) du résultat, ou null s'il n'y a pas de résultat
        return $evaluation ? $evaluation[0]['average'] : null;
    }

    /**
     * Récupère le pseudo et la date d'inscription d'un utilisateur.
     * @param int $idUser L'identifiant de l'utilisateur.
     * @return array Le tableau associatif contenant le pseudo et la date d'inscription de l'utilisateur.
     */
    public function getPersonalInfos($idUser) {
        // Vérifie si $idUser est non nul et numérique
        if ($idUser === null || !is_numeric($idUser)) {
            // Gére l'erreur ou retourne une valeur par défaut
            return null;
        }
        
        // Requête SQL pour récupérer le pseudo et la date d'inscription de l'utilisateur
        $query = "SELECT useLogin AS pseudo, useRegisterDate AS inscription FROM t_user WHERE idUser = :idUser";
    
        // Prépare et exécute la requête avec le paramètre lié
        $binds = array("idUser" => $idUser);
        $req = $this->queryPrepareExecute($query, $binds);
    
        // Formate le résultat sous forme de tableau associatif
        $userInformation = $this->formatData($req);
    
        // Retourne le tableau associatif
        return $userInformation;
    }
    
    /**
     * Récupère le nombre d'appréciations faites par un utilisateur.
     * @param int $idUser L'identifiant de l'utilisateur.
     * @return array Le nombre d'appréciations faites par l'utilisateur ou null s'il n'y en a pas.
     */
    public function getUserNumberOfReviews($idUser) {
        // Vérifie si $idUser est non nul et numérique
        if ($idUser === null || !is_numeric($idUser)) {
            // Gérez l'erreur ou retourne une valeur par défaut
            return null;
        }
        
        // Requête SQL pour récupérer le nombre d'appréciations faites par l'utilisateur
        $query = "SELECT COUNT(evaGrade) FROM t_evaluation WHERE fkUser=:idUser";

        // Préparez et exécute la requête avec le paramètre lié
        $binds = array("idUser" => $idUser);
        $req = $this->queryPrepareExecute($query, $binds);

        // Formate le résultat sous forme de tableau associatif
        $result = $this->formatData($req);

        // Retourne le nombre d'appréciations faites par l'utilisateur ou null s'il n'y a pas de résultat
        return $result[0]['COUNT(evaGrade)'] ?? 0;
    }

    /**
     * Récupère le nombre d'ouvrages publiés par un utilisateur.
     * @param int $idUser L'identifiant de l'utilisateur.
     * @return array Le nombre nombre d'ouvrages publiés par l'utilisateur ou null s'il n'y en a pas.
     */
    public function getUserNumberOfPosts($idUser) {
        // Vérifie si $idUser est non nul et numérique
        if ($idUser === null || !is_numeric($idUser))  {
            // Gére l'erreur ou retourne une valeur par défaut
            return null;
        }
        
        // Requête SQL pour récupérer le nombre d'ouvrages publiés par l'utilisateur
        $query = "SELECT COUNT(idBook) FROM t_book WHERE fkUser=:idUser";

        // Prépare et exécute la requête avec le paramètre lié
        $binds = array("idUser" => $idUser);
        $req = $this->queryPrepareExecute($query, $binds);

        // Formate le résultat sous forme de tableau associatif
        $nbPosts = $this->formatData($req);

        // Retourne le premier élément (le total) du résultat, ou null s'il n'y a pas de résultat
        return $nbPosts[0]['COUNT(idBook)'] ?? 0;
    }

    /**
     * Récupère les données correspondant à un pseudo d'utilisateur
     * @param string $useLogin pseudo de l'utilisateur
     * @return array Tableau associatif contenant les données d'un pseudo d'utilisateur
     */
    public function login($useLogin) {
        // Requête SQL pour récupérer les données corespondant à un pseudo d'utilisateur
        $query = "SELECT * FROM t_user WHERE useLogin = :useLogin";
        
        // Appelle la méthode privée pour exécuter la requête et retourner un tableau
        /* $req = $this->connector->prepare($query);
        $req->bindValue('useLogin', $useLogin, PDO::PARAM_STR);
        $req->execute();
        $user = $req->fetch(PDO::FETCH_ASSOC); */

        // Prépare et exécute la requête avec le paramètre lié
        $binds = array("useLogin" => $useLogin);
        $req = $this->queryPrepareExecute($query, $binds);

        // Formate le résultat sous forme de tableau associatif
        $user = $this->formatData($req);

        // Retourne le tableau associatif
        return $user;
    }

    /**
     * Récupère les données d'une catégorie spécifique.
     * @param int $idCategory L'identifiant de la catégorie.
     * @return array Le tableau associatif contenant les données de la catégorie.
     */
    public function getCategory($idCategory) {
        // Requête SQL pour récupérer un ouvrage
        $query = "SELECT * FROM t_category  WHERE idCategory = :idCategory;";

        // Prépare et exécute la requête avec le paramètre lié
        $binds = array("idCategory" => $idCategory);
        $req = $this->queryPrepareExecute($query, $binds);

        // Formate le résultat sous forme de tableau associatif
        $categories = $this->formatData($req);

        // Retourne le tableau associatif
        return $categories[0];
    }

    /**
     * Récupère la moyenne des avis d'un ouvrage.
     * @param int $idBook L'identifiant de l'ouvrage.
     * @return array La moyenne des avis de l'ouvrage.
     */
    public function getBookRating($idBook) {
        // Requête SQL pour récupérer la moyenne des avis de l'ouvrage
        $query = "SELECT AVG(evaGrade) AS average FROM t_evaluation JOIN t_book ON t_book.idBook = t_evaluation.fkBook WHERE idBook = :idBook;";
        
        // Prépare et exécute la requête avec le paramètre lié
        $binds = array("idBook" => $idBook);
        $req = $this->queryPrepareExecute($query, $binds);
        
        // Formate le résultat sous forme de tableau associatif
        $rating = $this->formatData($req);
        
        // Retourne le tableau associatif
        return $rating[0];
    }

    /**
     * Met à jour la note attribuée par un utilisateur à un ouvrage.
     * @param int $idBook L'identifiant de l'ouvrage.
     * @param int $idUser L'identifiant de l'utilisateur.
     * @param int $rating La note attribuée.
     */
    public function updateBookRating($idBook, $idUser, $rating) {
        // Requête SQL pour mettre à jour la note attribuée par un utilisateur à un ouvrage
        $query = "UPDATE t_evaluation SET evaGrade = :evaGrade WHERE fkBook = :fkBook AND fkUser = :fkUser;";
        
        // Prépare et exécute la requête avec les paramètres liés
        $binds = array("fkBook" => $idBook,
                    "fkUser" => $idUser,
                    "evaGrade" => $rating);
        $req = $this->queryPrepareExecute($query, $binds);
    }

    /**
     * Ajoute une nouvelle note attribuée par un utilisateur à un ouvrage.
     * @param int $idBook L'identifiant de l'ouvrage.
     * @param int $idUser L'identifiant de l'utilisateur.
     * @param int $rating La note attribuée.
     */
    public function addBookRating($idBook, $idUser, $rating) {
        // Requête SQL pour ajouter une nouvelle note attribuée par un utilisateur à un ouvrage
        $query = "INSERT INTO t_evaluation (fkBook, fkUser, evaGrade) VALUES (:fkBook, :fkUser, :evaGrade);";
        
        // Prépare et exécute la requête avec les paramètres liés
        $binds = array("fkBook" => $idBook,
                    "fkUser" => $idUser,
                    "evaGrade" => $rating);
        $req = $this->queryPrepareExecute($query, $binds);
    }

    /**
     * Vérifie si un utilisateur a déjà attribué une note à un ouvrage.
     * @param int $idBook L'identifiant de l'ouvrage.
     * @param int $idUser L'identifiant de l'utilisateur.
     * @return array Le tableau associatif contenant les données de la note attribuée par l'utilisateur à l'ouvrage.
     */
    public function checkUserRating($idBook, $idUser) {
        // Requête SQL pour vérifier si un utilisateur a déjà attribué une note à un ouvrage
        $query = "SELECT * FROM t_evaluation WHERE fkUser = :fkUser AND fkBook = :fkBook;";
        
        // Prépare et exécute la requête avec les paramètres liés
        $binds = array("fkBook" => $idBook,
                    "fkUser" => $idUser);
        $req = $this->queryPrepareExecute($query, $binds);
        
        // Formate le résultat sous forme de tableau associatif
        $ratings = $this->formatData($req);
        
        // Retourne un tableau associatif
        return $ratings;
    }

    /**
     * Supprime un ouvrage de la BD ainsi que toutes les évalutions qui lui sont liées.
     * @param int $idBook L'identifiant de l'ouvrage.
     */
    public function deleteBook($idBook) {
        // Requête SQL pour supprimer toutes les évalutions d'un ouvrage de la BD
        $query = "DELETE FROM t_evaluation WHERE fkBook = :idBook";

        // Prépare et exécute la requête avec les paramètres liés
        $binds = array("idBook" => $idBook);
        $this->queryPrepareExecute($query, $binds);
    
        // Requête SQL pour supprimer un ouvrage de la BD
        $query = "DELETE FROM t_book WHERE idBook = :idBook";

        // Prépare et exécute la requête avec les paramètres liés
        $this->queryPrepareExecute($query, $binds);
    }
 }

?>