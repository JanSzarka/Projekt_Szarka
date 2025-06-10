<?php
    namespace Projekt_Szarka;

    // Loading JSON
    class DataLoader {
        private string $filepath;
        private array $data = [];
        public function __construct($filepath) {
            $this->filepath = $filepath;
            $this->loadData();
        }

        private function loadData(): void {
            if (!file_exists($this->filepath)) {
                throw new \Exception("JSON {$this->filepath} not found");
            }

            $json = file_get_contents($this->filepath);
            $decoded = json_decode($json, true);
            $this->data = $decoded;
        }

        public function getSection($key): array {
            return $this->data[$key] ?? [];
        }
    }

    //Database

    use mysql_xdevapi\Exception;
    use PDO;
    use PDOException;

    class Database {
        private $host = "localhost";
        private $db_name;
        private $username = "root";
        private $password = "";
        private $port = "3306";
        private $options = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        );
        private $conn;

        public function __construct($db_name = "data"){
            $this->db_name = $db_name;
            $this->connect();
        }

        protected function connect() {
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

        public function getConnection(): ?PDO {
            return $this->conn;
        }
    }

    // User

    class User extends Database{
        protected $connection;

        public function __construct(){
            parent::__construct();
            $this->connection = $this->getConnection();
        }

        public function saveUser($username, $password) {
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
                $statement->execute(array(':username' => $username, ':password' => $hashedPassword));
                return "Account created successfully.";
            }catch(Exception $e){
                http_response_code(500);
                return false;
            }


        }

        public function login($username, $password) {
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

    //Movies

    class Movie extends Database {
        protected $connection;

        public function __construct(){
            parent::__construct();
            $this->connection = $this->getConnection();
        }

        public function newMovie($name, $rating, $date, $category, $imagePath) {
            $sqlCheck = "SELECT COUNT(*) FROM movies WHERE name = :name";
            $stmtCheck = $this->connection->prepare($sqlCheck);
            $stmtCheck->execute([':name' => $name]);
            $count = $stmtCheck->fetchColumn();

            if ($count > 0) {
                return "<p> Review already exists. </p>";
            }

            $sql = "INSERT INTO movies (name, rating, date, category, image) VALUES (:name, :rating, :date, :category, :image)";
            $stmt = $this->connection->prepare($sql);

            try {
                $stmt->execute([
                    ':name' => $name,
                    ':rating' => $rating,
                    ':date' => $date,
                    ':category' => $category,
                    ':image' => $imagePath
                ]);

                return "<p> Movie review added successfully! <p>";
            } catch (PDOException $e) {
                return "<p> Error: " . $e->getMessage() . "<p>";
            }
        }

        public function updateMovie($id, $name, $rating, $date, $category, $imagePath) {
            $sqlCheck = "SELECT COUNT(*) FROM movies WHERE id = :id";
            $stmtCheck = $this->connection->prepare($sqlCheck);
            $stmtCheck->execute([':id' => $id]);
            $count = $stmtCheck->fetchColumn();

            if ($count === 0) {
                return "<p> Review doesnt exists. </p>";
            }

            if ($imagePath === null){
                $sqlGetImage = "SELECT image FROM movies WHERE id = :id";
                $stmtGetImage = $this->connection->prepare($sqlGetImage);
                $stmtGetImage->execute([':id' => $id]);
                $currentImage = $stmtGetImage->fetchColumn();
                $imagePath = $currentImage;
            }

            $sql = "UPDATE movies SET name = :name, rating = :rating, date = :date, category = :category, image = :image WHERE id = :id";
            $stmt = $this->connection->prepare($sql);

            try {
                $stmt->execute([
                    ':name' => $name,
                    ':rating' => $rating,
                    ':date' => $date,
                    ':category' => $category,
                    ':image' => $imagePath,
                    ':id' => $id
                ]);
                return "<p> Movie review updated successfully! </p>";
            } catch (PDOException $e) {
                return "<p>" . $e->getMessage() . "</p>" ;
            }
        }

        //Movie id
        public function getID($name) {
            $sql = "SELECT id FROM movies WHERE name = :name";
            $stmt = $this->connection->prepare($sql);

            try {
                $stmt->execute([':name' => $name]);
                return $stmt->fetchColumn();
            } catch (PDOException $e) {
                return "<p> Error: " . $e->getMessage() . "</p>";
            }
        }

        public function deleteMovieByName($name){
            $sql = "DELETE FROM movies WHERE name = :name";
            $stmt = $this->connection->prepare($sql);

            try {
                $stmt->execute([':name' => $name]);
                if ($stmt->rowCount() > 0) {
                    return "<p> Movie deleted successfully! </p>";
                } else {
                    return "<p> Movie not found. </p>";
                }
            } catch (PDOException $e) {
                return "<p>" . $e->getMessage() . "</p>" ;
            }

        }

        public function getMovieByName($name) {
            $sql = "SELECT * FROM movies WHERE name = :name";
            $stmt = $this->connection->prepare($sql);

            try {
                $stmt->execute([':name' => $name]);
                return $stmt->fetch(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                return false;
            }
        }

        //Movie reviews
        public function getAllReviewsHtml(): string {
            $output = '';
            $sql = "SELECT * FROM movies ORDER BY id DESC";

            try {
                $stmt = $this->connection->query($sql);
                $reviews = $stmt->fetchAll();

                foreach ($reviews as $review) {
                    $output .= '<div class="movie" style="display: flex; gap: 20px; margin-bottom: 40px;">';
                    $output .= '<figure class="movie-poster"><img src="' . htmlspecialchars($review["image"]) . '" alt="' . htmlspecialchars($review["name"]) . '" style="width:200px;"></figure>';
                    $output .= '<div>';
                    $output .= '<h2 class="movie-title">' . htmlspecialchars($review["name"]) . '</h2>';
                    $output .= '<p><strong>Premiere:</strong> ' . htmlspecialchars($review["date"]) . '</p>';
                    $output .= '<p><strong>Rating:</strong> ' . htmlspecialchars($review["rating"]) . '</p>';
                    $output .= '<p><strong>Category:</strong> ' . htmlspecialchars($review["category"]) . '</p>';
                    $output .= '</div>';
                    $output .= '</div>';
                }
            } catch (PDOException $e) {
                $output = '<p>Error fetching reviews: ' . htmlspecialchars($e->getMessage()) . '</p>';
            }

            return $output;
        }

    }


    //Messages
    class Message extends Database {
        protected $connection;

        public function __construct() {
            parent::__construct();
            $this->connection = $this->getConnection();
        }

        public function saveMessage($name, $email, $message): null {
            $sql = "INSERT INTO messages (name, email, message) VALUES (:name, :email, :message)";
            $stmt = $this->connection->prepare($sql);

            try {
                $stmt->execute([
                    ':name' => $name,
                    ':email' => $email,
                    ':message' => $message
                ]);
                echo "<p>Message sent successfully!</p>";
                return null;
            } catch (PDOException $e) {
                echo "<p>Error: " . htmlspecialchars($e->getMessage()) . "</p>";
                return null;
            }
        }

        public function getAllMessages() {
            $sql = "SELECT name, email, message FROM messages ORDER BY id DESC";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>