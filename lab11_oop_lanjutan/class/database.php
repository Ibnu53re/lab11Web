<?php
class Database {
    protected $host;
    protected $user;
    protected $password;
    protected $db_name;
    public $conn;

    public function __construct() {
        // Panggil file config.php di folder atas (../)
        include(__DIR__ . '/../config.php');
        if (!isset($config)) {
            die("Config tidak terbaca!");
        }

        // Ambil data dari file config
        $this->host = $config['host'];
        $this->user = $config['username'];
        $this->password = $config['password'];
        $this->db_name = $config['db_name'];

        // Buat koneksi
        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->db_name);

        if ($this->conn->connect_error) {
            die("Koneksi gagal: " . $this->conn->connect_error);
        }
    }

    // Fungsi tampil data
    public function tampil($table) {
        $sql = "SELECT * FROM $table";
        return $this->conn->query($sql);
    }
}
?>
