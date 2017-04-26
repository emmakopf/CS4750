<?php
    class DbUtil{
<<<<<<< Updated upstream
        public static $user = "cs4750s17kjt9wr";
        public static $pass = "database";
        public static $host = "stardock.cs.virginia.edu";
        public static $schema = "cs4750s17kjt9wr";
=======
        public static $user = "cs4750s17aaa4aa";
        public static $pass = "spring2017";
        public static $host = "stardock.cs.virginia.edu";
        public static $schema = "cs4750s17aaa4aa";
>>>>>>> Stashed changes
        
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


