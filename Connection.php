<?php

class Connection
{

    // static var con ( connection var ) is default null
    public static $con = null;

    public function DB()
    {
        // check if connection var null
        if (self::$con == null) {
            // self for the function name
            // give con a mysqli connection
            self::$con = new MySQLi('localhost', 'root', '', 'db');
        }
        // whatever return the function and the con var
        // you can get the value from DB with Connection::DB() ( CLASS::FUNCTION )
        return self::$con;
    }

}