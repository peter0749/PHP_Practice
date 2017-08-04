<?php
class ConnectDB {
    private $connect;
    // initialize connection
    function __construct() { 
        // 先寫死連線帳密，之後再看看要怎麼改
        $this->connect = mysqli_connect("不告訴你","nope","Не сказать","あなたを教えてくれません!");
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
            $args=array(); // if PHP5
            foreach ($parameters as $key=>&$value) {
                $args[$key] = &$value; // in PHP5 ref is required.
            }
            call_user_func_array(array($stmt, "bind_param"), $args);
        }
        // debug
        //$ret = 
        $stmt->execute();
        /** debug
        if ($ret) {
            echo "<H1>OK</H1>";
        }
         */
        $result = $stmt->get_result();
        /** debug
        if (!$result) {
            echo "<H1>".$stmt->error."</H1>";
            exit();
        }
         */
        $stmt->close();
        return $result;
    }
};
// 2017-07-31 18:59 --
//   PHP5 -> PHP7 的部分差不多完成了
?>
