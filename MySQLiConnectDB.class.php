<?php
class ConnectDB {
    private $connect;
    // initialize connection
    function __construct() { 
        // 先寫死連線帳密，之後再看看要怎麼改
        $this->connect = mysqli_connect("nope","nope","nope","nope");
        If(!$this->connect) {
            throw new Exception("Filed to connect DB.");
        }
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
        // sql injection warning
    }
    public function escape_string($str) {
        return mysqli_real_escape_string ( $this->connect , $str );
    }
    public function executePreparedStatement($prepared, $paramString = ''){
        $stmt = $this->connect->prepare($prepared);
        if (func_num_args() > 2){
            $parameters = func_get_args();
            array_shift($parameters); // remove the prepared from the list
            // Array needs to be bound by reference
            foreach ($parameters as $key=>&$value) {
                $parameters[$key] = &$value;
            }
            call_user_func_array(array($stmt, "bind_param"), $parameters);
        }
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result;
    }
};
// 2017-07-31 18:59 --
//   PHP5 -> PHP7 的部分差不多完成了
?>
