<?php
class Post{
    private $conn;
    private $table = 'post_tb';
    private $user_table = 'user_tb';

    public $id;
    public $user_id;
    public $image_path;
    public $title_path;
    public $post_desc;
    public $post_date;

    //Constructor with Database
    public function __construct($db) {
        $this->conn = $db;
    }

    public function read_post(){
        $query = "SELECT * FROM ". $this->table ." as p INNER JOIN ".$this->user_table." as u ON p.fld_user_id = u.id ORDER BY p.id DESC";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function read_user_post(){
            $query = "SELECT * FROM ". $this->table ." WHERE fld_user_id = :user_id ORDER BY id DESC";

        $stmt = $this->conn->prepare($query);
        $this->id = htmlspecialchars(strip_tags($this->user_id));
        $stmt->bindParam(':user_id', $this->user_id);
        $stmt->execute();

        $num = $stmt->rowCount();


        if($num > 0){
            //Post Array
            $post_arr = array();
            $post_arr['data'] = array();

            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                extract($row);

                $post_list = array(
                    'id' => $id,
                    'user_data' => $this->read_user_data($fld_user_id),
                    'post_desc' => $fld_post_desc,
                    'post_date' => $fld_post_date
                    );

               array_push($post_arr['data'], $post_list);
            }

            echo json_encode($post_arr);
        }else{
            echo json_encode(
                array(
                  'message'=>'No Post Found',
                  'no_post'=>0
                )
            );
        }

    }

    public function update_post(){

    }

    public function delete_post(){
        $query = 'DELETE FROM '
                    . $this->table .
                    ' WHERE id = :id';

        $stmt = $this->conn->prepare($query);

        $this->id = htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(':id', $this->id);

        if($stmt->execute()){
            return true;
        }

        printf("Error : %s.\n", $stmt->error);

        return false;
    }

    public function insert_post(){
      $query = 'INSERT INTO '.$this->table .
        ' (fld_user_id, fld_post_desc, fld_post_date)
        VALUES (:user_id, :post_desc, :post_date)';

        $this->user_id = htmlspecialchars(strip_tags($this->user_id));
        $this->post_desc = htmlspecialchars(strip_tags($this->post_desc));
        $this->post_date = htmlspecialchars(strip_tags($this->post_date));

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':user_id', $this->user_id);
        $stmt->bindParam(':post_desc', $this->post_desc);

        $date = date("m d,Y");
        $time  = date("h:i a");

        $datetime = $date ." ". $time;

        $stmt->bindParam(':post_date', $datetime);

        $stmt->execute();
    }

    public function read_user_data($user_id){
      $query = 'SELECT * FROM user_tb WHERE id = :uid';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':uid', $user_id);
        $stmt->execute();

        $num = $stmt->rowCount();


        if($num > 0){
            //Post Array
            $user_arr = array();
            $user_arr['data'] = array();

            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                extract($row);

                $user_list = array(
                    'id' => $id,
                    'student_no' => $fld_Student_No,
                    'first_name' => $fld_first_name,
                    'middle_name' => $fld_middle_name,
                    'last_name' => $fld_last_name,
                    'email' => $fld_email,
                    'username' =>$fld_username,
                    'image_path' =>$fld_image_path,
                );
            }
            return $user_list;
        }
    }
}

?>
