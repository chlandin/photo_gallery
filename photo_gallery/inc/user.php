<?php

require_once(LIB_PATH.DS.'database.php');

class User extends DatabaseObject {

    protected static $table_name = "users";
    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;

    public function full_name() {
        if (isset($this->first_name) && isset($this->last_name)) {
            return $this->first_name . " " . $this->last_name;
        } else {
            return "";
        }
    }

    public static function authenticate($username = "", $password = "") {
        global $db;
        $username = $db->escape_value($username);
        $password = $db->escape_value($password);

        $sql = "SELECT * FROM users ";
        $sql .= "WHERE username = '{$username}' ";
        $sql .= "AND password = '{$password}' ";
        $sql .= "LIMIT 1";

        $result_array = self::find_by_sql($sql);
        return !empty($result_array) ? array_shift($result_array) : false;
    }

    public function save() {
        return isset($this->id) ? $this->update() : $this->create();
    }

    protected function create() {
        global $db;
        $sql = "INSERT INTO users (";
        $sql .= "username, password, first_name, last_name";
        $sql .= ") VALUES ('";
        $sql .= $db->escape_value($this->username) ."', '";
        $sql .= $db->escape_value($this->password) ."', '";
        $sql .= $db->escape_value($this->first_name) ."', '";
        $sql .= $db->escape_value($this->last_name) ."')";
        if($db->query($sql)) {
            $this->id = $db->insert_id();
            return true;
        } else {
            return false;
        }
    }

    protected function update() {
        global $db;
        $sql = "UPDATE users SET ";
        $sql .= "username='". $db->escape_value($this->username) ."', ";
        $sql .= "password='". $db->escape_value($this->password) ."', ";
        $sql .= "first_name='". $db->escape_value($this->first_name) ."', ";
        $sql .= "last_name='". $db->escape_value($this->last_name) ."' ";
        $sql .= "WHERE id=". $db->escape_value($this->id);
        $db->query($sql);
        return ($db->affected_rows() == 1) ? true : false;
    }

    public function delete() {
        global $db;
        $sql = "DELETE FROM users ";
        $sql .= "WHERE id=" . $db->escape_value($this->id);
        $sql .= " LIMIT 1";
        $db->query($sql);
        return ($db->affected_rows() == 1) ? true : false;
    }
}
?>
