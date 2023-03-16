<?php 

class usersGestion
{

    //attribut
    private $database;
    private $id;
    private $email;

    //Constructeur
    public function __construct(){

        try {
            $this->database = new PDO('mysql:host=localhost;dbname=blog_js;charset=utf8;port=3307', 'root', '');
        } catch(Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    //Méthodes 

    public function register($email, $username, $password) {

        $request = $this->database->prepare('SELECT * FROM users');
        $request->execute(array());
        $userDatabase = $request->fetchAll(PDO::FETCH_ASSOC);
        
        $this->email = $email;
        $password;
        $username;
        $emailOk = false;
        $right = "";
        $right_description = "";

        foreach ($userDatabase as $user) {
            
            if ( $this->email == $user['email']){
                echo "cette utilisateur existe déjà";
                $emailOk = false;
                break;
            } else {
                $emailOk = true;
                $right = "subscribed";
            }           
            echo $user['email']."<br>";
        }

        if ($right = "subscribed") {
            $right_description = "cette utilisateur peux écrire des commentaire sur les articles";
        }

        //var_dump($userDatabase);
        if ($emailOk == true){
        //on créer l'utilisateur.
          $request = $this->database->prepare("INSERT INTO users(email, username, password, register_date) VALUES (?, ?, ?,NOW())");
          $request->execute(array($this->email,$username, $password));
        //on lui attribue sont ses droits
          $request = $this->database->prepare("INSERT INTO roles(rights, description) VALUES (?, ?)");
          $request->execute(array($right,$right_description));
        //on lie les table la table role et users au niveau de l'id.
        //   $requestUserAndRole = $this->database->prepare('SELECT `email` , `username` , `register_date` , `rights`, `description` FROM users INNER JOIN roles ON roles.id = users.role_id ORDER BY `register_date` DESC ');
        //   $requestUserAndRole->execute();
        //   $displayUserAndRight = $request->fetchAll(PDO::FETCH_ASSOC);
          echo "tu est inscrit";
        }        
          
        
    }

    public function connection($email, $password) {

        $request = $this->database->prepare('SELECT * FROM users');
        $request->execute(array());
        $userDatabase = $request->fetchAll(PDO::FETCH_ASSOC);

        $this->email = $email;
        $password;
        $logged = false;
        session_start();                      

        foreach ($userDatabase as $user) { //je lis le contenu de la table de la BDD

            if ($email === $user['email'] && $password === $user['password']) {   
                $_SESSION['email'] = $email;
                $id = $user['id'];  
                $_SESSION['id'] = $id;
                $_SESSION["username"] = $user["username"];
                $logged = true;
                break;

            } else {
                $logged = false;
            }

        }

        //echo $_SESSION["username"];

        if( $logged ) {
            echo "vous êtes connecté";
            //header("Location:index.php");
        } else {
            echo "erreur dans l'email ou le password</br>";
        }

    }

    public function getData() {
        return $this->database;
    }
    public function getAllUsers() {

        $request = $this->database->prepare('SELECT * FROM users');
        $request->execute(array());
        $userDatabase = $request->fetchAll(PDO::FETCH_ASSOC);

        foreach ($userDatabase as $user) {
            
            
           
        }

        

    }


}

$user = new usersGestion;

// $user->register("toto@boritos.com","toto","momo");
// $user->register("jim@jojo.com","jim","stand");
// $user->connection("Boruto@boritos.com","momo");
// $user->connection("admin@wild.com","azeradmin");
// echo $user->getAllUsers()['email'];
// echo $user->getAllUsers()['email'];
// echo $user->getAllUsers()['email'];

?>
