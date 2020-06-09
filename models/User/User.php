<?php
class User{
    private $conn;
    private $table = 'user_tb';

    public $user_id;
    public $first_name;
    public $middle_name;
    public $last_name;
    public $email;
    public $username;
    public $student_no;
    public $password;
    public $gender;
    public $bio;

    //Constructor with Database
    public function __construct($db) {
        $this->conn = $db;
    }

    public function read_user(){
      $name = "nice";
      return $name;
    }

    public function read_single_user(){
      $query = 'SELECT * FROM '. $this->table .
        ' WHERE id = :uid';
        $stmt = $this->conn->prepare($query);
        $this->user_id = htmlspecialchars(strip_tags($this->user_id));
        $stmt->bindParam(':uid', $this->user_id);
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
                    'bio'=>$fld_bio,
                    'sex' => $fld_sex,
                    'birth_date' => $fld_birth_date,
                    'track_id' => $fld_track_id,
                    'strand_id' => $fld_strand_id,
                    'contact_no' => $fld_contact_no,
                    'email' => $fld_email,
                    'block' => $fld_block,
                    'username' =>$fld_username,
                    'image_path' =>$fld_image_path,
                );

                //push to data
               // array_push($items_arr['data'], $items_list);
            }

            echo json_encode($user_list);
        }else{
            echo json_encode(
                array(
                    'message'=>'No User Found'
                )
            );
        }
    }

    public function update_bio(){
      $query = 'UPDATE '.$this->table.' SET fld_bio = :bio WHERE id = :id';
      $stmt = $this->conn->prepare($query);
      $this->bio = htmlspecialchars(strip_tags($this->bio));
      $stmt->bindParam(':id', $this->user_id);
      $stmt->bindParam(':bio', $this->bio);
      $stmt->execute();
    }

    public function update_profile(){
      $query = 'UPDATE '.$this->table.' SET
      fld_username=:username,
      fld_email=:email,
      fld_contact_no=:contact_no,
      fld_track_id=:track,
      fld_strand_id=:strand,
      fld_block=:block WHERE id=:user_id';

      $stmt = $this->conn->prepare($query);
      $this->username = htmlspecialchars(strip_tags($this->username));
      $this->email = htmlspecialchars(strip_tags($this->email));
      $this->contact_no = htmlspecialchars(strip_tags($this->contact_no));
      $this->track = htmlspecialchars(strip_tags($this->track));
      $this->strand = htmlspecialchars(strip_tags($this->strand));
      $this->block = htmlspecialchars(strip_tags($this->block));

      $stmt->bindParam(':user_id', $this->user_id);
      $stmt->bindParam(':username', $this->username);
      $stmt->bindParam(':email', $this->email);
      $stmt->bindParam(':contact_no', $this->contact_no);
      $stmt->bindParam(':track', $this->track);
      $stmt->bindParam(':strand', $this->strand);
      $stmt->bindParam(':block', $this->block);
      $stmt->execute();
    }

    public function register_user(){
      $query = 'INSERT INTO '. $this->table .
                '(fld_access_type
                ,fld_Student_No
                ,fld_first_name
                ,fld_middle_name
                ,fld_last_name
                ,fld_sex
                ,fld_username
                ,fld_email
                ,fld_password
                ,fld_image_path)
                VALUES (:access_type,:student_no, :first_name, :middle_name, :last_name, :gender,  :username, :email, :password, :image_path)';

      //Prepare Statement
      $stmt = $this->conn->prepare($query);
      $image_path = '';
      if($this->gender=="Male"){
        $image_path = '../assets/img/default_male.png';
      }else if($this->gender=="Female"){
        $image_path = '../assets/img/default_female.png';
      }
      //Bind data+
      $access_type = 'Student';
      $stmt->bindParam(':access_type', $access_type);
      $stmt->bindParam(':student_no', $this->student_no);
      $stmt->bindParam(':first_name', $this->first_name);
      $stmt->bindParam(':middle_name', $this->middle_name);
      $stmt->bindParam(':last_name', $this->last_name);
      $stmt->bindParam(':email', $this->email);
      $stmt->bindParam(':gender', $this->gender);
      $stmt->bindParam(':username', $this->username);
      $stmt->bindParam(':password', $this->password);
      $stmt->bindParam(':image_path', $image_path);
      $stmt->execute();
    }

}

?>
