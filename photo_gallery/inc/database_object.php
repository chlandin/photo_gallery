<?php

require_once(LIB_PATH.DS.'database.php');

class DatabaseObject {

    protected static $table_name;
    
    // common database methods
    public static function find_all() {
        return static::find_by_sql("SELECT * FROM " . static::$table_name);
    }

    public static function find_by_id($id=0) {
        global $db;
        $result_array = static::find_by_sql("SELECT * FROM " . static::$table_name . " WHERE id={$id} LIMIT 1");
        return !empty($result_array) ? array_shift($result_array) : false;
    }

    public static function find_by_sql($sql="") {
        global $db;
        $result = $db->query($sql);
        $object_array = array();
        while ($row = $db->fetch_array($result)) {
            $object_array[] = static::instantiate($row);
        }
        return $object_array;
    }

    private static function instantiate($record) {
        $class_name = get_called_class();
        $object = new $class_name;
        foreach ($record as $attribute => $value) {
            if ($object->has_attribute($attribute)) {
                $object->$attribute = $value;
            }
        }
        return $object;
    }

    private function has_attribute($attribute) {
        $object_vars = get_object_vars($this);
        return array_key_exists($attribute, $object_vars);
    }
}

?>
