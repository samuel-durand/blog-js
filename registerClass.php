<?php 

class UsersPdo
{

    //ATTRIBUTS
    private $_id;
    public $email;
    public $username;
    public $database;
    public $data;


    //CONSTRUCTEUR
    public function __construct() {        

        try {
            $this->database = new PDO('mysql:host=localhost;dbname=blog_js;charset=utf8;port=3307', 'root', '');
        } catch(Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }

        
        $request = $this->database->prepare('SELECT * FROM users');
        $request->execute(array());
        $this->data = $request->fetchAll(PDO::FETCH_ASSOC);
        echo "<h1 style='color:red;font-family:monospace;font-size:30px;text-align:center'>
        la classe RegisterClass a été instancié, message depuis le contructeur</h1>";
        var_dump($this->data);
    }
    
    //MÉTHODES 
    public function register($email, $username, $password) {
        $this->email    =      $email;
        $this->username =      $username;
        $password;
    
        $loginOk = false;

        $requestRegist = $this->database->prepare('SELECT * FROM users');
        
        $rowCount = $requestRegist->fetchColumn();

        var_dump($rowCount);

        if ($rowCount == 0) {
             echo "c'est vide on envoie";
             $requestRegist = $this->database->prepare("INSERT INTO users(email ,username, password, register_date) VALUES (?, ?, ?, NOW())");
             $requestRegist->execute(array($this->email,$this->username, $password));
            //  $rowCount = $requestRegist->fetchColumn(1);
        }else if ($rowCount == 1) {
            echo "La table n'est pas vide";
        }
       var_dump($rowCount);

        foreach ( $this->data as $user ) { 
            
            

            
            
           
            //une condition dans le cas ou le login existe déjà 
            // if ( $this->login == $user[3] ) { 

            //     echo "le login est déja pris</br>";                
            //     $loginOk = false;
            //     break;
            // } else {
            //     $loginOk = true;
            // }

        }

                



        // if ( $loginOk ) {          
        //     $request = $this->database->prepare("INSERT INTO utilisateurs(login, password) VALUES (?, ?)");
        //     $request->execute(array($this->username, $password));
        //     echo "utilisateur crée avec succès!";
            
        // }     
        
    }

    public function connect($username, $password) {

        $this->username = $username;
        $password;
        $logged = false;

        foreach ($this->data as $user) { //je lis le contenu de la table $con de la BDD

            if ($username === $user[3] && $password === $user[2]) {                         
                $_SESSION['username'] = $username;
                $id = $user[0];  
                $_SESSION['id'] = $id;
                $logged = true;
                break;

            } else {
                $logged = false;
            }

        }

        if( $logged ) {
            echo "vous êtes connecté";
            header("Location:index.php");
        } else {
            echo "erreur dans le mdp ou username</br>";
        }

    }

    public function disconnect() {

        session_destroy();
        echo "vous êtes déconnecté";
        
    }

    public function delete() {

        if (!empty($_SESSION['username'])) {

            $this->username = $_SESSION['username'];
            $request = $this->database->prepare("DELETE FROM `utilisateurs` WHERE `username` = (?)");
            $request->execute(array($this->username));
            echo "votre compte a été supprimé";
            session_destroy();

        }
    
    }

    public function update($username, $password) {

        if (!empty($_SESSION['username'])) {

            $this->username =      $username;
            $password;
        
            $logged_user = $_SESSION['username'];

            $request = $this->database->prepare("UPDATE `utilisateurs` SET `username` = (?) , `password` = (?) WHERE `utilisateurs`.`username` = (?)");

            $request->execute(array($this->username, $password, $logged_user));
            $_SESSION['username'] = $this->username;

        } else {
            echo "Acces interdit";
        }


    }

    public function isConnected() {
         
        if (isset($_SESSION['username'])) {
            return true;
        } else {
            return false;
        }
    }

    public function getAllInfos() {

        $this->username = $_SESSION['username'];
        $request = $this->database->prepare("SELECT * FROM `utilisateurs` WHERE `username` = (?)");
        $request->execute(array($this->username));
        $this->data = $request->fetch();
        return $this->data;
        
    }

    public function displayAllUser() {
        $request = $this->database->prepare('SELECT * FROM users');
        $request->execute(array());
        $this->data = $request->fetchAll();

        foreach ($this->data as $userTable) {

            $id_userTable = $userTable[0];
            $email_userTable = $userTable[1];
            $password_userTable = $userTable[2];
            $username_userTable = $userTable[3];
            echo $id_userTable.' '.$email_userTable.' '.$password_userTable.' '.$username_userTable;
            
            //  echo $key['email'];
            //  echo $key['password'];
            //  echo $key['username'];
            //  echo $key['register_date'];
             //echo $key['username'];
        }

    }

    public function getusername() {

        $this->username = $_SESSION['username'];
        $request = $this->database->prepare("SELECT `username` FROM `utilisateurs` WHERE `username` = (?)");
        $request->execute(array($this->username));
        $this->data = $request->fetch();
        $this->username = $this->data['username'];
        return $this->username;
            
    }

    public function getEmail() {

        $this->username = $_SESSION['username'];
        $request = $this->database->prepare("SELECT `email` FROM `utilisateurs` WHERE `username` = (?)");
        $request->execute(array($this->username));
        $this->data = $request->fetch();
        $this->email = $this->data['email'];
        return $this->email;

    }

    public function getFirstname() {

        $this->username = $_SESSION['username'];
        $request = $this->database->prepare("SELECT `firstname` FROM `utilisateurs` WHERE `username` = (?)");
        $request->execute(array($this->username));
        $this->data = $request->fetch();
        $this->firstname = $this->data['firstname'];
        return $this->firstname;

    }

    public function getLastname() {

        $this->username = $_SESSION['username'];
        $sql = "SELECT `lastname` FROM `utilisateurs` WHERE `username` = '$this->username'";
        $request = $this->database->prepare("SELECT `lastname` FROM `utilisateurs` WHERE `username` = (?)");
        $request->execute(array($this->username));
        $this->data = $request->fetch();
        $this->lastname = $this->data['lastname'];
        return $this->lastname;
    }

}



//$utilisateur = new UsersPdo;
//$utilisateur->register('jin@varel.com','zaft', 'system',); //, 'gundam@rengou.com', 'Kira', 'Yamato');
//$utilisateur->connect('zaft','system');
//$utilisateur->disconnect();
//$utilisateur->delete();
//$utilisateur->update('rengou', 'system', 'gundam@faith.com', 'Kira', 'Yamato');
//$utilisateur->getAllInfos()['username'];
//$utilisateur->getLogin();
//$utilisateur->getEmail();
//$utilisateur->getFirstname();
//$utilisateur->getLastname();
//$utilisateur->isConnected();
//echo $_SESSION['login'];

?>