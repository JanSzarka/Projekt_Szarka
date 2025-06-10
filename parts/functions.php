<?php
namespace Projekt_Szarka;

class DataLoader
{
    private string $filepath;
    private array $data = [];

    public function __construct(string $filepath)
    {
        $this->filepath = $filepath;
        $this->loadData();
    }

    private function loadData(): void
    {
        if (!file_exists($this->filepath)) {
            throw new \Exception("JSON {$this->filepath} not found");
        }

        $json = file_get_contents($this->filepath);
        $decoded = json_decode($json, true);

        $this->data = $decoded;
    }

    public function getSection(string $key): array
    {
        return $this->data[$key] ?? [];
    }
}

?>



<?php
    //DATABASE
    namespace Projekt_Szarka;

    use mysql_xdevapi\Exception;
    use PDO;
    use PDOException;

    class Database
    {
        private $host = "localhost";
        private $db_name = 'users';
        private $username = "root";
        private $password = "";
        private $port = "3306";
        private $options = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        );
        private $conn;
        public function __construct()
        {
            $this->connect();
        }

        protected function connect(){
            try {
                $this->conn = new PDO(
                    "mysql:host={$this->host};dbname=" . $this->db_name . ";port={$this->port}",
                    $this->username,
                    $this->password,
                    $this->options
                );
            } catch (PDOException $e) {
                die("Connection failed: " . $e->getMessage());
            }
        }

        public function getConnection(): ?PDO
        {
            return $this->conn;

        }
    }

    class User extends Database{

        protected $connection;

        public function __construct(){
            parent::__construct();
            $this->connection = $this->getConnection();
        }

        public function saveUser($username, $password){

            $sqlCheck = "SELECT COUNT(*) FROM accounts WHERE username = :username";
            $stmtCheck = $this->connection->prepare($sqlCheck);
            $stmtCheck->execute([':username' => $username]);
            $userExists = $stmtCheck->fetchColumn();

            if ($userExists > 0) {
                return "User with this name already exists.";
            }

            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
            $sql = "INSERT INTO accounts (username, password) VALUES (:username, :password)";
            $statement = $this->connection->prepare($sql);
            try{
                $insert = $statement->execute(array(':username' => $username, ':password' => $hashedPassword));
                return "Account created successfully.";
            }catch(Exception $e){
                http_response_code(500);
                return false;
            }


        }

        public function login($username, $password){
            $sql = "SELECT * FROM accounts WHERE username = :username";
            $stmtCheck = $this->connection->prepare($sql);
            $stmtCheck->bindParam(':username', $username);
            $stmtCheck->execute();
            $user = $stmtCheck->fetch();

            if (!$user) {
                return false;
            }

            $storedPassword = $user["password"];

            if  (!password_verify($password, $storedPassword)) {
                return false;
            }

            session_start();
            $_SESSION["username"] = $user["username"];
            $_SESSION["role"] = $user["type"];
            return true;

        }

    }
?>