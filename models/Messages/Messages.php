<?php
class Messages{
    private $conn;
    private $table = 'message_tb';
    private $conversation_table = 'conversation_tb';

    public $sender_user_id;
    public $receiver_user_id;
    public $message_content;
    public $cid;
    public $conversation_id;
    public $status;
    public $date;
    //Constructor with Database
    public function __construct($db) {
        $this->conn = $db;
    }

    public function read_messages_list(){
      $query = 'SELECT * FROM ' .$this->conversation_table. ' WHERE fld_user_id_1 = :user_id OR fld_user_id_2=:user_id  ORDER by id DESC';
      $stmt = $this->conn->prepare($query);
      $stmt->bindParam(':user_id', $this->sender_user_id);
      $stmt->execute();
      $num = $stmt->rowCount();
      if($num > 0){
          //Post Array
          $msg_arr = array();
          $msg_arr['data'] = array();
          $cid = 0;
          while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
              extract($row);
              $msg_list = array(
                  'id' => $id ,
                  'user_1' => $this->read_user_data($fld_user_id_1)  ,
                  'user_2' => $this->read_user_data($fld_user_id_2),
                  'last_message' => $this->read_last_message($id),
                  'status' => $fld_status
              );
              array_push($msg_arr['data'], $msg_list);
          }
          echo json_encode($msg_arr);
      }else{
          echo json_encode(
              array(
                  'return' => '0',
                  'message'=>'No Message Found'
              )
          );
      }
    }

    public function read_single_conversation(){
      $query = 'SELECT * FROM ' .$this->table. ' WHERE fld_conversation_id = :cid ORDER by id ASC';
      $stmt = $this->conn->prepare($query);
      $stmt->bindParam(':cid', $this->cid);
      $stmt->execute();
      $num = $stmt->rowCount();
      if($num > 0){
          //Post Array
          $msg_arr = array();
          $msg_arr['data'] = array();

          while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
              extract($row);
              $msg_list = array(
                  'id' => $id,
                  'sender_user' => $this->read_user_data($fld_sender_user_id),
                  'receiver_user' =>  $this->read_user_data($fld_receiver_user_id),
                  'message_content' => $fld_message_content,
                  'date' => $fld_date,
                  'status' => $fld_status,
                  );
              array_push($msg_arr['data'], $msg_list);
          }
          echo json_encode($msg_arr);
      }else{
          echo json_encode(
              array(
                  'return' => '0',
                  'message'=>'No Message'
              )
          );
      }
    }

    public function send_message(){
      $query ='INSERT INTO '.$this->table . ' (fld_conversation_id ,fld_sender_user_id,	fld_receiver_user_id,	fld_message_content,	fld_date,	fld_status)
      VALUES(:conversation_id,:sender_user_id,:receiver_user_id,:message_content,:date,:status)';
      $stmt = $this->conn->prepare($query);

      $this->message_content = htmlspecialchars(strip_tags($this->message_content));
      $this->date = date("F j, Y, g:i a");
      $this->status = "Unread";

      $stmt->bindParam(':conversation_id', $this->conversation_id);
      $stmt->bindParam(':sender_user_id', $this->sender_user_id);
      $stmt->bindParam(':receiver_user_id', $this->receiver_user_id);
      $stmt->bindParam(':message_content', $this->message_content);
      $stmt->bindParam(':date', $this->date);
      $stmt->bindParam(':status', $this->status);
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

    public function read_last_message($cid){
      $query = 'SELECT * FROM message_tb WHERE fld_conversation_id = :cid ORDER by id DESC LIMIT 1';
      $stmt = $this->conn->prepare($query);
      $stmt->bindParam(':cid', $cid);
      $stmt->execute();
      $num = $stmt->rowCount();
      if($num > 0){
          while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
              extract($row);
              $msg_list = array(
                  'id' => $id,
                  'sender_user_id' => $fld_sender_user_id,
                  'receiver_user' => $fld_receiver_user_id,
                  'message_content' => $fld_message_content,
                  'date' => $fld_date,
                  'status' => $fld_status
                  );
          }
          return $msg_list;
      }
    }

    public function create_new_message(){
        $is_exist = $this->conversation($this->sender_user_id,$this->receiver_user_id);
        if($is_exist){
          $query ='INSERT INTO '.$this->table . ' (fld_conversation_id ,fld_sender_user_id,	fld_receiver_user_id,	fld_message_content,	fld_date,	fld_status)
          VALUES(:conversation_id,:sender_user_id,:receiver_user_id,:message_content,:date,:status)';
          $stmt = $this->conn->prepare($query);
          $this->message_content = htmlspecialchars(strip_tags($this->message_content));
          $this->date = date("F j, Y, g:i a");
          $this->status = "Unread";
          $this->cid = $this->get_conversation_id($this->sender_user_id,$this->receiver_user_id);
          $stmt->bindParam(':conversation_id', $this->cid);
          $stmt->bindParam(':sender_user_id',$this->sender_user_id );
          $stmt->bindParam(':receiver_user_id', $this->receiver_user_id);
          $stmt->bindParam(':message_content', $this->message_content);
          $stmt->bindParam(':date', $this->date);
          $stmt->bindParam(':status', $this->status);
          $stmt->execute();
        }else{
          $this->create_conversation($this->sender_user_id,$this->receiver_user_id,$this->message_content);

        }
        echo "<script>window.location.href='../../student/check_profile?uid=$this->sender_user_id&&fid=$this->receiver_user_id';</script>";
    }


    public function create_conversation($sender_user_id,$receiver_user_id,$message_content){
      $query = 'INSERT INTO conversation_tb (fld_user_id_1,fld_user_id_2,fld_status) VALUES (:sender_user_id, :receiver_user_id, :status)';
      $stmt = $this->conn->prepare($query);
      $this->status = "Unread";
      $stmt->bindParam(':sender_user_id', $sender_user_id);
      $stmt->bindParam(':receiver_user_id',$receiver_user_id);
      $stmt->bindParam(':status', $this->status);
      $stmt->execute();
      $this->create_message($sender_user_id,$receiver_user_id,$message_content);
    }

    public function create_message($sender_user_id,$receiver_user_id,$message_content){
      $query = 'INSERT INTO message_tb (fld_conversation_id,fld_sender_user_id,fld_receiver_user_id,fld_message_content,fld_date,fld_status)
      VALUES (:cid,:user_id,:fid,:message_content,:date,:status)';
      $stmt = $this->conn->prepare($query);
      $this->message_content = htmlspecialchars(strip_tags($message_content));
      $this->cid = $this->get_conversation_id($sender_user_id,$receiver_user_id);

      $stmt->bindParam(':cid', $this->cid);
      $stmt->bindParam(':user_id', $sender_user_id);
      $stmt->bindParam(':fid', $receiver_user_id);
      $stmt->bindParam(':message_content', $message_content);
      $this->date = date("F j, Y, g:i a");
      $stmt->bindParam(':date', $this->date);
      $stmt->bindParam(':status', $this->status);
        $stmt->execute();

    }

    public function get_conversation_id($sender_user_id,$receiver_user_id){
      $query="SELECT id FROM conversation_tb WHERE fld_user_id_1 = :user_id AND fld_user_id_2 = :fid
      OR fld_user_id_1 = :fid AND fld_user_id_2 = :user_id LIMIT 1";
      $stmt = $this->conn->prepare($query);
      $stmt->bindParam(':user_id', $sender_user_id);
      $stmt->bindParam(':fid', $receiver_user_id);
      $stmt->execute();
      $num = $stmt->rowCount();
      if($num > 0){
          $cid = 0;
          while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
              extract($row);
              $cid = $id;
          }
          return $cid;
      }
    }

    public function conversation($sender_user_id,$receiver_user_id){
      $query='SELECT id FROM conversation_tb WHERE fld_user_id_1 = :user_id AND fld_user_id_2 = :fid
      OR fld_user_id_1 = :fid AND fld_user_id_2 = :user_id LIMIT 1';
      $stmt = $this->conn->prepare($query);
      $stmt->bindParam(':user_id', $sender_user_id);
      $stmt->bindParam(':fid', $receiver_user_id);
      $stmt->execute();
      $num = $stmt->rowCount();
      if($num == 1){
        return true;
      }else{
        return false;
      }
    }
}

?>
