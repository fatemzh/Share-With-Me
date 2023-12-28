<?php
/**
 * ETML
 * Auteur: Salma Abdulkadir
 * Date: 21.11.2023
 * Description: Programme de la calsse Database. Contient les méthodes privées et publiques utilisées tout au long de l'application.
 */

 class Database {


    // Variable de classe
    private $connector;

    /**
     * Constructeur de la classe Database.
     * Initialise la connexion à la base de données en utilisant les paramètres définis dans le fichier de configuration.
     */
    public function __construct(){
        //Configuration de la base de donnée
        $configs = include("../config/config.php");

        //Connexion via PDO et utilise la variable de classe $connector
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
    private function querySimpleExecute($query){

        // TODO: permet de préparer et d’exécuter une requête de type simple (sans where)
        //Utilisation de query pour effectuer une requête
        return $this->connector->query($query);;
    }

    /**
     * Prépare, lie les valeurs et exécute une requête avec des paramètres (SELECT avec WHERE, INSERT, UPDATE ou DELETE).
     * @param string $query La requête SQL à exécuter.
     * @param array $binds Les valeurs à lier à la requête.
     * @return mixed Renvoie le résultat de la requête.
     */
    private function queryPrepareExecute($query, $binds){
        
        // TODO: permet de préparer, de binder et d’exécuter une requête (select avec where ou insert, update et delete)
        // A UTILISER PLUS TARD 

        $req = $this->connector->prepare($query);
        foreach($binds as $bind => $value){
            $req->bindValue($bind, $value);
        }
        $req->execute();
        return $req;
    }

    /**
     * Formate les données résultantes d'une requête en tableau associatif.
     * @param mixed $req Le résultat de la requête.
     * @return array Le tableau associatif contenant les données.
     */
    private function formatData($req){

        //Traite les données pour les retourner, par exemple, en tableau associatif
        return $req->fetchALL(PDO::FETCH_ASSOC);
    }

    /**
     * Vide le jeu d'enregistrement.
     * @param mixed $req Le résultat de la requête.
     */
    private function unsetData($req){

        //Vide le jeu d'enregistrement
    }

    /**
     * Récupère tous les utilisaeurs de la table t_user.
     * @return array Le tableau associatif contenant les données des utilisaeurs.
     */
    public function getAllUsers(){

        //Exécute la requête pour récupérer tous les utilisaeurs
        $query = 'SELECT * FROM t_user';
        //Appeler la méthode privéer pour avoir le résultat sous forme de tableau
        $req = $this->querySimpleExecute($query);
        //Retourne un tableau associatif
        return $this->formatData($req);

    }

    /**
     * Récupère les informations d'un utilisateur spécifique.
     * @param int $idTeacher L'identifiant de l'utilisateur.
     * @return array Le tableau associatif contenant les informations de l'utilisateur.
     */
    public function getOneUser($idUser){
        
        //Requête SQL pour récupérer un utilisateur
        $query = "SELECT * FROM t_user  WHERE idUser = :idUser;";
        //Appèle la méthode privée pour executer la requête
        $binds = array("idUser" => $idUser);
        $req = $this->queryPrepareExecute($query, $binds);
        //Appèle la méthode privéer pour avoir le résultat sous forme de tableau
        $users = $this->formatData($req);
        //Retorune un tableau associatif
        return $users[0];
    }

    /**
     * Récupère tous les auteurs de la table t_user.
     * @return array Le tableau associatif contenant les données des auteurs.
     */
    public function getAllAuthors(){

        //Exécute la requête pour récupérer tous les auteurs
        $query = 'SELECT * FROM t_author';
        //Appeler la méthode privéer pour avoir le résultat sous forme de tableau
        $req = $this->querySimpleExecute($query);
        //Retourne un tableau associatif
        return $this->formatData($req);

    }

     /**
      * Récupère les informations d'un auteur spécifique.
      * @param int $idTeacher L'identifiant de l'auteur.
      * @return array Le tableau associatif contenant les informations de l'auteur.
      */
     public function getOneAuthor($idAuthor){
        
         //Requête SQL pour récupérer un auteur
         $query = "SELECT * FROM t_author  WHERE idAuthor = :idAuthor;";
         //Appèle la méthode privée pour executer la requête
         $binds = array("idAuthor" => $idAuthor);
         $req = $this->queryPrepareExecute($query, $binds);
         //Appèle la méthode privéer pour avoir le résultat sous forme de tableau
         $authors = $this->formatData($req);
         //Retorune un tableau associatif
         return $authors[0];
     }

    /**
     * Récupère tous les ouvrages de la table t_book.
     * @return array Le tableau associatif contenant les données des ouvrages.
     */
    public function getAllBooks(){
        //Exécute la requête pour récupérer tous les ouvrages
        $query = 'SELECT * FROM t_book';
        //Appeler la méthode privéer pour avoir le résultat sous forme de tableau
        $req = $this->querySimpleExecute($query);
        //Retourne un tableau associatif
        return $this->formatData($req);

    }

    /**
     * Récupère tous les ouvrages de la table t_book.
     * @return array Le tableau associatif contenant les données des ouvrages.
     */
    public function getUserBooks($idUser){
        //Exécute la requête pour récupérer tous les ouvrages
        $query = 'SELECT * 
        FROM t_book 
        JOIN t_author ON fkAuthor = idAuthor
        WHERE fkUser=:idUser';
        //Appeler la méthode privéer pour avoir le résultat sous forme de tableau
        $req = $this->queryPrepareExecute($query, array(':idUser' => $idUser));
        // Récupérez le résultat sous forme de tableau
        $usersBooks = $this->formatData($req);
        //Retourne un tableau associatif
        return $usersBooks;
    }

    /**
     * Récupère les informations d'un ouvrage spécifique.
     * @param int $idTeacher L'identifiant de l'ouvrage.
     * @return array Le tableau associatif contenant les informations de l'ouvrage.
     */
    public function getOneBook($idBook){
        
        //Requête SQL pour récupérer un ouvrage
        $query = "SELECT * FROM t_book  WHERE idBook = :idBook;";
        //Appelle la méthode privée pour executer la requête
        $binds = array("idBook" => $idBook);
        $req = $this->queryPrepareExecute($query, $binds);
        //Appelle la méthode privée pour avoir le résultat sous forme de tableau
        $books = $this->formatData($req);
        //Retourne un tableau associatif
        return $books[0];
    }

    public function getNewBooks(){
        // Requête SQL pour récupérer les 5 derniers livres ajoutés
        $query = "SELECT * FROM t_book ORDER BY idBook DESC LIMIT 5";
        
        // Exécuter la requête SQL
        $result = $this->querySimpleExecute($query);
    
        // Formater les données
        $newBooks = $this->formatData($result); 
    
        // Renvoie le tableau associatif 
        return $newBooks;
    }

    public function getEvaluation($idBook){
        // Vérifiez si $idBook est non nul et numérique
        if ($idBook === null || !is_numeric($idBook)) {
        // Gérez l'erreur ou retournez une valeur par défaut
        return null;
        }

        // Requête SQL pour récupérer la moyenne des évaluations pour un livre donné
        $query = "SELECT AVG(evaluation) as average FROM t_evaluation WHERE fkBook = :idBook";

        // Préparez et exécutez la requête avec le paramètre lié
        $req = $this->queryPrepareExecute($query, array(':idBook' => $idBook));

        // Récupérez le résultat sous forme de tableau
        $evaluation = $this->formatData($req);

        // Retournez le premier élément (la moyenne) du résultat, ou null s'il n'y a pas de résultat
        return $evaluation ? $evaluation[0]['average'] : null;
    }

    public function getPersonalInfos($idUser){

        if ($idUser === null || !is_numeric($idUser)) {
            return null;
        }
        
        // Requête SQL pour récupérer le pseudo et la date d'inscription de l'utilisateur
        $query = "SELECT useLogin AS pseudo, useRegisterDate AS inscription FROM t_user WHERE idUser = :idUser";
    
        // Exécute la requête SQL avec binds
        $req = $this->queryPrepareExecute($query, array(':idUser' => $idUser));
    
        // Formater les données
        $userInformation = $this->formatData($req);
    
        // Renvoie le tableau associatif
        return $userInformation;
    }
    
    public function getUserNumberOfReviews($idUser)
    {
        // Vérifiez si $idUser est non nul et numérique
        if ($idUser === null || !is_numeric($idUser)) 
        // Gérez l'erreur ou retournez une valeur par défaut
        return null;
        
        // Requête SQL pour renvoyer le nombre d'appréciations faites par l'utilisateur
        $query = "SELECT COUNT(evaGrade)
        FROM t_evaluation
        WHERE fkUser=:idUser";

        // Préparez et exécutez la requête avec le paramètre lié
        $req = $this->queryPrepareExecute($query, array(':idUser' => $idUser));

        // Récupérez le résultat sous forme de tableau
        $result = $this->formatData($req);

        // Retournez le nombre de reviews de l'utilisateur ou null s'il n'y a pas de résultat
        return $result[0]['COUNT(evaGrade)'] ?? 0;
    }

    public function getUserNumberOfPosts($idUser)
    {
        // Vérifiez si $idUser est non nul et numérique
        if ($idUser === null || !is_numeric($idUser)) 
        // Gérez l'erreur ou retournez une valeur par défaut
        return null;
        
        // Requête SQL pour renvoyer le nombre d'appréciations faites par l'utilisateur
        $query = "SELECT COUNT(idBook)
        FROM t_book
        WHERE fkUser=:idUser";

        // Préparez et exécutez la requête avec le paramètre lié
        $req = $this->queryPrepareExecute($query, array(':idUser' => $idUser));

        // Récupérez le résultat sous forme de tableau
        $nbPosts = $this->formatData($req);

        // Retournez le premier élément (la moyenne) du résultat, ou null s'il n'y a pas de résultat
        return $nbPosts[0]['COUNT(idBook)'] ?? 0;

    }

    public function login($useLogin) {

        $query = "SELECT * FROM t_user WHERE useLogin = :useLogin";

        $req = $this->connector->prepare($query);
        $req->bindValue('useLogin', $useLogin, PDO::PARAM_STR);
        $req->execute();

        $user = $req->fetch(PDO::FETCH_ASSOC);

        return $user;

     }

    /**
     * Récupère les informations d'une catégorie.
     * @param int $idCategory L'identifiant de la catégorie.
     * @return array Le tableau associatif contenant les informations de la catégorie.
     */
    public function getCategory($idCategory){
        
        //Requête SQL pour récupérer un ouvrage
        $query = "SELECT * FROM t_category  WHERE idCategory = :idCategory;";
        //Appelle la méthode privée pour executer la requête
        $binds = array("idCategory" => $idCategory);
        $req = $this->queryPrepareExecute($query, $binds);
        //Appelle la méthode privée pour avoir le résultat sous forme de tableau
        $categories = $this->formatData($req);
        //Retourne un tableau associatif
        return $categories[0];
    }

/**
 * Récupère la moyenne des avis de l'ouvrage.
 * @param int $idBook L'identifiant de l'ouvrage.
 * @return array Le tableau associatif contenant les informations de l'ouvrage.
 */
public function getBookRating($idBook){
    
    // Requête SQL pour récupérer la moyenne des avis de l'ouvrage
    $query = "SELECT AVG(evaGrade) AS average FROM t_evaluation JOIN t_book ON t_book.idBook = t_evaluation.fkBook WHERE idBook = :idBook;";
    
    // Appelle la méthode privée pour exécuter la requête
    $binds = array("idBook" => $idBook);
    $req = $this->queryPrepareExecute($query, $binds);
    
    // Appelle la méthode privée pour avoir le résultat sous forme de tableau
    $rating = $this->formatData($req);
    
    // Retourne un tableau associatif
    return $rating[0];
}

/**
 * Met à jour la note attribuée par un utilisateur à un ouvrage.
 * @param int $idBook L'identifiant de l'ouvrage.
 * @param int $idUser L'identifiant de l'utilisateur.
 * @param int $rating La note attribuée.
 */
public function updateBookRating($idBook, $idUser, $rating){
    
    // Requête SQL pour mettre à jour la note attribuée par un utilisateur à un ouvrage
    $query = "UPDATE t_evaluation SET evaGrade = :evaGrade WHERE fkBook = :fkBook AND fkUser = :fkUser;";
    
    // Associe les valeurs aux paramètres de la requête
    $binds = array("fkBook" => $idBook,
                   "fkUser" => $idUser,
                   "evaGrade" => $rating);
    
    // Appelle la méthode privée pour exécuter la requête
    $req = $this->queryPrepareExecute($query, $binds);
}

/**
 * Ajoute une nouvelle note attribuée par un utilisateur à un ouvrage.
 * @param int $idBook L'identifiant de l'ouvrage.
 * @param int $idUser L'identifiant de l'utilisateur.
 * @param int $rating La note attribuée.
 */
public function addBookRating($idBook, $idUser, $rating){
    
    // Requête SQL pour ajouter une nouvelle note attribuée par un utilisateur à un ouvrage
    $query = "INSERT INTO t_evaluation (fkBook, fkUser, evaGrade) VALUES (:fkBook, :fkUser, :evaGrade);";
    
    // Associe les valeurs aux paramètres de la requête
    $binds = array("fkBook" => $idBook,
                   "fkUser" => $idUser,
                   "evaGrade" => $rating);
    
    // Appelle la méthode privée pour exécuter la requête
    $req = $this->queryPrepareExecute($query, $binds);
}

/**
 * Vérifie si un utilisateur a déjà attribué une note à un ouvrage.
 * @param int $idBook L'identifiant de l'ouvrage.
 * @param int $idUser L'identifiant de l'utilisateur.
 * @return array Le tableau associatif contenant les informations de la note attribuée par l'utilisateur à l'ouvrage.
 */
public function checkUserRating($idBook, $idUser){
    
    // Requête SQL pour vérifier si un utilisateur a déjà attribué une note à un ouvrage
    $query = "SELECT * FROM t_evaluation WHERE fkUser = :fkUser AND fkBook = :fkBook;";
    
    // Associe les valeurs aux paramètres de la requête
    $binds = array("fkBook" => $idBook,
                   "fkUser" => $idUser);
    
    // Appelle la méthode privée pour exécuter la requête
    $req = $this->queryPrepareExecute($query, $binds);
    
    // Appelle la méthode privée pour avoir le résultat sous forme de tableau
    $ratings = $this->formatData($req);
    
    // Retourne un tableau associatif
    return $ratings;
}


    public function deleteBook($idBook) {
        $query = "DELETE FROM t_evaluation WHERE fkBook = :idBook";
        $binds = array(':idBook' => $idBook);
        $this->queryPrepareExecute($query, $binds);
    
        $query = "DELETE FROM t_book WHERE idBook = :idBook";
        $this->queryPrepareExecute($query, $binds);
    }
 }

?>