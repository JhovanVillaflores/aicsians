<?php
class Auth{
    private $conn;
    private $table = 'user_tb';

    public $username;
    public $password;

    //Constructor with Database
    public function __construct($db) {
        $this->conn = $db;
    }

    public function login_auth(){
        $query = 'SELECT * FROM ' .$this->table.
        ' WHERE fld_username = :username AND fld_password = :password';

        $this->username = htmlspecialchars(strip_tags($this->username));
        $this->password = htmlspecialchars(strip_tags($this->password));

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':password', $this->password);

        $stmt->execute();


        $num = $stmt->rowCount();

        if($num > 0){
            //Post Array
            $user_arr = array();
            $user_arr['data'] = array();

            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                extract($row);

                $user_data= array(
                    'Status' => 'Success',
                    'id' => $id
                );

                //push to data
                array_push($user_arr['data'], $user_data);
            }

            echo json_encode($user_arr);
        }else{
            echo json_encode(
                array(
                    'Status' => 'Failed',
                )
            );
        }
    }

}

?>
