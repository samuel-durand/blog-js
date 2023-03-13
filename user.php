<?php
class Register {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function addUser($email, $password, $username) {
        // Vérifier si l'utilisateur existe déjà dans la base de données
        $query = "SELECT * FROM users WHERE email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            return false;
        }

        // Ajouter l'utilisateur à la base de données avec un rôle par défaut
        $query = "INSERT INTO users (email, password, username, register_date, role_id) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$email, password_hash($password, PASSWORD_DEFAULT), $username, date('Y-m-d H:i:s'), 1]);

        return true;
        var_dump($query)

    }
}


// Connexion à la base de données
$db = new PDO('mysql:host=localhost;dbname=blog', 'root', '');

// Instanciation de la classe Register
$register = new Register($db);

// Ajout d'un nouvel utilisateur
if ($register->addUser('john.doe@example.com', 'password123', 'johndoe')) {
    echo 'Utilisateur ajouté avec succès !';
} else {
    echo 'Cet email est déjà utilisé.';
}



?>