<?php
namespace core;

use mysqli;
use core\Config;

class DB
{
    public static $conn, $table, $query, $instance = null;
    public static function getConnection()
    {
        $connectionDetails = Config::get(["DB_HOST", "DB_USER", "DB_PASS", "DB_NAME"]);
        self::$conn = new mysqli($connectionDetails["DB_HOST"], $connectionDetails["DB_USER"], $connectionDetails["DB_PASS"], $connectionDetails["DB_NAME"]);
        if (!isset($conn)) {
            if (self::$conn->connect_error) {
                die("<h1 style='text-align:center'>Database Connection Failed!</h1>");
            }
        }
        return self::$conn;
    }
    public static function table($table)
    {
        self::$table = $table; // "Code & Logic solely by Hassan Zahid©"
        self::$instance = new self;
        return self::$instance;
    }
    public static function select($cols = "*")
    {
        self::$query = 'SELECT ' . $cols . ' FROM ' . self::$table;
        return self::$instance;
    }
    public static function truncate()
    {
        self::$query = 'truncate ' . self::$table;
        return self::execute();
    }
    public static function where($col, $value = null, $condition = " = ", $logicalOperator = ' AND ')
    {
        self::$query .= ' WHERE ';
        // WHERE id=2 AND name="Ali"
        if (is_array($col)) {
            foreach ($col as $key => $value) {
                self::$query .= $key . $condition . "'$value'" . ($key === array_key_last($col) ? "" : $logicalOperator);
            }
        } else {
            self::$query .= $col . $condition . "'" . $value . "'";

        }
        return self::$instance;
    }
    public static function orWhere($col, $value = null, $condition = " = ", $logicalOperator = ' OR ')
    {
        self::where($col, $value, $condition, $logicalOperator);
        return self::$instance;
    }
    // SELECT * FROM records WHERE name LIKE 'a%'
    public static function whereLike($col = "*", $value = null, $logicalOperator = ' LIKE ')
    {
        self::where($col, $value, $logicalOperator);
        return self::$instance;
    }
    // DELETE from test WHERE id=1
    // DELETE from test WHERE id=1 AND name='ali'
    public static function delete($col = null, $value = null, $condition = " = ")
    {
        self::$query = "DELETE FROM " . self::$table . " WHERE ";
        $logicalOperator = " AND ";
        if (is_array($col)) {
            foreach ($col as $key => $value) {
                self::$query .= $key . $condition . "'$value'" . ($key === array_key_last($col) ? "" : $logicalOperator);
            }
        } else {
            self::$query .= $col . $condition . $value;
        }
        // dd(self::$query);
        return self::execute();
    }
    public static function rename($value)
    {
        if (!($value == null)) {
            self::$query = "ALTER TABLE " . self::$table . " RENAME " . $value;
        } else {
            errorShow("New name is required!");
        }
        // dd(self::$query);
        return self::execute();
    }
    public static function tableExists($value){
        $check="SELECT 1 FROM ".$value;
        $tableExists=mysqli_query($check,self::$conn);
        dd($tableExists);
    }
    public static function get()
    {
        $result = self::execute();
        $data = [];
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = (object) $row;
            }
        }
        return $data;
    }
    public static function execute()
    {
        return mysqli_query(self::$conn, self::$query);
    }
}