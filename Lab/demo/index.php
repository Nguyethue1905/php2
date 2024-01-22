<?php
    include './interface.php';

    include './abstract.php';

    $name = new Dog();

    $name->getName();
    

//vidu

    // Abstract Class
abstract class Database {
    protected $connection;
    abstract public function connect($host, $user, $pass, $dbname);
    abstract public function select($table, $conditions);
    abstract public function insert($table, $data);
    abstract public function update($table, $data, $conditions);
    abstract public function delete($table, $conditions);
}

// Interface
interface Crud {
    public function select($table, $conditions);
    public function insert($table, $data);
    public function update($table, $data, $conditions);
    public function delete($table, $conditions);
}

// Class that implements the interface and extends the abstract class
class MysqlDatabase extends Database implements Crud {
    // Kết nối tới cơ sở dữ liệu
    public function connect($host, $user, $pass, $dbname) {
        $this->connection = new mysqli($host, $user, $pass, $dbname);
        if ($this->connection->connect_error) {
            die("Kết nối thất bại: " . $this->connection->connect_error);
        }
    }

    // Thực hiện truy vấn SELECT
    public function select($table, $conditions) {
        $sql = "SELECT * FROM $table WHERE $conditions";
        $result = $this->connection->query($sql);
        return $result;
    }

    // Thực hiện truy vấn INSERT
    public function insert($table, $data) {
        $columns = implode(", ", array_keys($data));
        $values  = implode(", ", array_values($data));
        $sql = "INSERT INTO $table ($columns) VALUES ($values)";
        $result = $this->connection->query($sql);
        return $result;
    }

    // Thực hiện truy vấn UPDATE
    public function update($table, $data, $conditions) {
        $updateColumns = "";
        foreach ($data as $key => $value) {
            $updateColumns .= "$key = $value, ";
        }
        $updateColumns = rtrim($updateColumns, ', ');
        $sql = "UPDATE $table SET $updateColumns WHERE $conditions";
        $result = $this->connection->query($sql);
        return $result;
    }

    // Thực hiện truy vấn DELETE
    public function delete($table, $conditions) {
        $sql = "DELETE FROM $table WHERE $conditions";
        $result = $this->connection->query($sql);
        return $result;
    }
}

?>