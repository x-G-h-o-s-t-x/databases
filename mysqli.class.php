<?php
// Prevent direct access from url to this file
if(stristr(htmlentities($_SERVER['SCRIPT_NAME']), 'mysqli.class.php')): // input your class file name here
    echo '<meta http-equiv="Refresh" content="0; url=index.php">'; // input your index location here
    die();
endif;

/** ****************************************************
  *                  @author: Ghost                    *
  *                  @copyright: 2016                  *
  **************************************************** **/

class db {

    private $host = 'localhost'; // input your host details here
    private $username = ''; // input your username details here
    private $password = ''; // input your password details here
    private $database = ''; // input your database details here
    protected function __clone() { /** Me not like clones! Me smash clones! */ }
    public function __wakeup() { throw new Exception('Cannot unserialize singleton'); }
    private static $instance = array(); // stores the connection results in an array
    private $mysqli; // stores the mysqli database details
    private $query; // stores the mysqli queries
    private $results = array(); // stores the mysqli results in an array
    private $count = 0; // stores the number of rows (count) from a mysqli query

    // call to start the database connection
    public static function mysqli() {
        $class = get_called_class(); // late-static-bound class name
            if(!isset(self::$instance[$class])):
                self::$instance[$class] = new static;
            endif;
        return self::$instance[$class];
    }

    // builds the database connection to work with
    public function __construct() {
        if(!isset($this->mysqli)):
            $this->mysqli = new mysqli($this->host, $this->username, $this->password, $this->database);
                if($this->mysqli->connect_errno):
                    printf('<br/><u>Information:</u><br/><b>Connecting To Mysqli Failed:</b><br/>%s', $this->mysqli->connect_error, '<br/>');
                    exit();
                endif;
        endif;
    }

    // runs the mysqli queries
    public function query($sql) {
        $this->query = $this->mysqli->query($sql);
            if(!$this->query):
                echo 'mysqli query failed. check your query.<br/>Error Returned: ', $this->mysqli->error, '<br/>';
                return false;
            else:
                if(is_object($this->query)):
                    $this->results = array();
                        while($row = $this->query->fetch_object()):
                            $this->results[] = $row;
                        endwhile;
                    $this->count = $this->query->num_rows;
                endif;
            endif;
        return $this;
    }

    // returns the mysqli object results in an array
    public function result() {
        return $this->results;
    }

    // returns the number of rows (count) from a mysqli query
    public function count() {
        return $this->count;
    }

    // returns the mysqli inserted id number
    public function insert_id() {
        return $this->mysqli->insert_id;
    }

    // returns the raw connection incase needed for something
    public function connection() {
        return $this->mysqli;
    }

    // returns the data after escaping it
    public function sanitize($data) {
        return $this->mysqli->real_escape_string($data);
    }

    // returns the mysqli error message
    public function error() {
        return $this->mysqli->error;
    }

    // close the mysqli connection to database
    public function close() {
        $this->mysqli->close();
    }
}
?>