<?php
class ConnectDB {
    private $connect;
    // initialize connection
    function __construct() { 
        // 先寫死連線帳密，之後再看看要怎麼改
        $this->connect = mysqli_connect("host","account","password","database");
        If(!$this->connect) throw new Exception("Filed to connect DB.");
        // Set connection encoding
        mysqli_query($this->connect,"SET NAMES 'utf8'");
    }
    // close connection to MySQL server
    function __destruct() {
        mysqli_close($this->connect);
        $this->connect = NULL;
    }
    // this returns queried result from MySQL server
    public function query($str) { 
        return mysqli_query($this->connect, $str);
        // not catch exception here
    }
};
?>
