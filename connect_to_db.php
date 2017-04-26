<?php
    class DbUtil{
        public static $user = "cs4750s17ek4wy";
        public static $pass = "spring2017";
        public static $host = "stardock.cs.virginia.edu";
        public static $schema = "cs4750s17ek4wy";
        
        public static function loginConnection() {
            $db = new mysqli(DbUtil::$host, DbUtil::$user,
                             DbUtil::$pass, DbUtil::$schema);
            if($db->connect_errno) {
                echo "fail";
                $db->close();
                exit();
            }
            return $db;
        }
    }
    ?>


