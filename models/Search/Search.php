
<?php
class Search{
  private $conn;
  public function __construct($db) {
      $this->conn = $db;
  }

  public $keyword;
  public $uid;
  public function search_data(){
    $search_arr['data'] = array();
    $result = array(
      'users' => $this->search_user($this->keyword),
      'posts'=> $this->search_post($this->keyword)
    );
    echo json_encode(['data'=>$result]);
  }

  public function search_user($keyword){
    $query = 'SELECT * FROM user_tb WHERE
    fld_Student_No LIKE :keyword
    OR fld_Student_No LIKE :keyword
    OR fld_first_name LIKE :keyword
    OR fld_middle_name LIKE :keyword
    OR fld_last_name LIKE :keyword
    OR fld_username LIKE :keyword';

    $stmt = $this->conn->prepare($query);
    $keyword = htmlspecialchars(strip_tags($keyword));
    $stmt->bindParam(':keyword', $keyword);
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
                'access_type' => $fld_access_type,
                'student_no' => $fld_Student_No,
                'first_name' => $fld_first_name,
                'middle_name' => $fld_middle_name,
                'last_name' => $fld_last_name,
                'sex' => $fld_sex,
                'birth_date' => $fld_birth_date,
                'track_id' => $fld_track_id,
                'strand_id' => $fld_strand_id,
                'contact_no' => $fld_contact_no,
                'email' => $fld_email,
                'block' => $fld_block,
                'username' =>$fld_username,
                'image_path' =>$fld_image_path
            );
            array_push($user_arr['data'], $user_list);
        }

        return $user_arr;
    }else{
        return
            array(
                'result'=> '0',
                'message'=>'No User Found'
            );
    }
  }

  public function search_post($keyword){
    $query = 'SELECT * FROM post_tb WHERE fld_post_desc LIKE :keyword';
    $stmt = $this->conn->prepare($query);
    $keyword = htmlspecialchars(strip_tags($keyword));
    $stmt->bindParam(':keyword', $keyword);
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
                'user_data'=> $this->read_user_data($fld_user_id),
                'post_desc'=> $fld_post_desc,
                'post_data'=> $fld_post_date
            );
            array_push($post_arr['data'], $post_list);
        }

        return $post_arr;
    }else{
        return array(
                'result'=> '0',
                'message'=>'No Post Found'
            );
    }
  }

  public function read_user_data($uid){
    $query = 'SELECT * FROM user_tb WHERE id = :uid';
      $stmt = $this->conn->prepare($query);
      $stmt->bindParam(':uid', $uid);
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
