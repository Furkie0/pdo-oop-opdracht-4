    <?php 
    
    class Database { 
           public $pdo;
           
           public function __construct($db="user", $user="root", $pwd="", $host="localhost:3307") {
                try {
                        $this->pdo = new PDO("mysql:host=$host;dbname=$db",$user,$pwd);
                        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        
                } catch(PDOException $e) {
                        echo "Connection failed: " . $e->getMessage();

                }
               
        
    }
    

    public function insertuser($id, $voornaam, $achternaam, $geboortedatum, $email, $telefoonnummer) {
        $sql = "INSERT INTO contacts (id, voornaam, achternaam, geboortedatum, email, telefoonnummer) VALUES (:id, :voornaam, :achternaam, :geboortedatum, :email, :telefoonnummer)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'id' => $id,
            'voornaam' => $voornaam,
            'achternaam' => $achternaam,
            'geboortedatum' => $geboortedatum,
            'email' => $email,
            'telefoonnummer' => $telefoonnummer
        ]);
    }

    public function selectUser() {
        $stmt = $this->pdo->query("SELECT * FROM contacts");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function selectoneUser($id) {
        $stmt = $this->pdo->query("SELECT * FROM contacts WHERE id = ?");
        $stmt->execute(['id']);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateUser(int $id, string $voornaam, string $achternaam, string $geboortedatum, string $email, string $telefoonnummer) {
        $stmt = $this->pdo->prepare("UPDATE contacts SET voornaam = ?, achternaam = ?, geboortedatum = ?, email = ?, telefoonnummer = ? WHERE id = ?");
        $stmt->execute([$voornaam, $achternaam, $geboortedatum, $email, $telefoonnummer, $id]);
     }

    public function deleteUser(int $id) {
        $stmt = $this->pdo->prepare("DELETE FROM contacts WHERE id = ?");
        $stmt->execute([$id]);
    }
}
    
    ?>