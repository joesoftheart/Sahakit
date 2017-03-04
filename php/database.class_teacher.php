<?php
class Database {

    public $host = 'localhost'; //ชื่อ Host
    public $user = 'root'; //ชื่อผู้ใช้งาน ฐานข้อมูล
    public $password = ''; // password สำหรับเข้าจัดการฐานข้อมูล
    public $database = 'sahakit'; //ชื่อ ฐานข้อมูล

    //function เชื่อมต่อฐานข้อมูล
    public function connect(){

        $mysqli = new mysqli($this->host,$this->user,$this->password,$this->database);

        $mysqli->set_charset("utf8");

        if ($mysqli->connect_error) {

            die('Connect Error: ' . $mysqli->connect_error);
        }

        return $mysqli;
    }

    //function เรื่ยกดูข้อมูล all user
    public function get_all_user(){

        $db = $this->connect();
        $get_user = $db->query("SELECT * FROM teacher");

        while($user = $get_user->fetch_assoc()){
            $result[] = $user;
        }

        if(!empty($result)){

            return $result;
        }
    }

    public function search_user($post = null){

        $db = $this->connect();
        $get_user = $db->query("SELECT * FROM teacher WHERE fn_te LIKE '%".$post."%' ");

        while($user = $get_user->fetch_assoc()){
            $result[] = $user;
        }

        if(!empty($result)){

            return $result;
        }

    }

    public function get_user($user_id){

        $db = $this->connect();
        $get_user = $db->prepare("SELECT tid,username,passwd,fn_te,ln_te,address,telaphone,email FROM teacher WHERE tid = ?");
        $get_user->bind_param('i',$user_id);
        $get_user->execute();
        $get_user->bind_result($tid,$username,$passwd,$fn_te,$ln_te,$address,$telaphone,$email);
        $get_user->fetch();

        $result = array(
            'tid'=>$tid,
            'username'=>$username,
            'passwd'=>$passwd,
            'fn_te'=>$fn_te,
            'ln_te'=>$ln_te,
            'address'=>$address,
            'telaphone'=>$telaphone,
            'email'=>$email,

        );

        return $result;
    }

    //function เพื่ม user
    public function add_user($data){

        $db = $this->connect();

        $add_user = $db->prepare("INSERT INTO teacher (tid,username,passwd,fn_te,ln_te,address,telaphone,email) VALUES(NULL,?,?,?,?,?,?,?,?) ");

        $add_user->bind_param("sssssss",$data['username'],$data['passwd'],$data['fn_te'],$data['ln_te'],$data['address'],$data['telaphone'],$data['email']);

        if(!$add_user->execute()){

            echo $db->error;

        }else{

            echo "บันทึกข้อมูลเรียบร้อย";
        }
    }

    //function edit user
    public function edit_user($data){

        $db = $this->connect();

        $add_user = $db->prepare("UPDATE teacher SET username = ? , passwd = ? , fn_te = ? , ln_te = ? , address = ? ,  telaphone = ? , email = ?  WHERE tid = ?");

        $add_user->bind_param("sssssssi",$data['edit_username'],$data['edit_passwd'],$data['edit_fn_te'],$data['edit_ln_te'],$data['edit_address'],$data['edit_telaphone'],$data['edit_email'],$data['edit_user_id']);

        if(!$add_user->execute()){

            echo $db->error;

        }else{

            echo "บันทึกข้อมูลเรียบร้อย";
        }
    }

    //function delete user
    public function delete_user($id){

        $db = $this->connect();

        $del_user = $db->prepare("DELETE FROM teacher WHERE tid = ?");

        $del_user->bind_param("i",$id);

        if(!$del_user->execute()){

            echo $db->error;

        }else{

            echo "ลบข้อมูลเรียบร้อย";
        }
    }




}
?>