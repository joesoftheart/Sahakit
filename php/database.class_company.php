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
        $get_user = $db->query("SELECT * FROM company");

        while($user = $get_user->fetch_assoc()){
            $result[] = $user;
        }

        if(!empty($result)){

            return $result;
        }
    }

    public function search_user($post = null){

        $db = $this->connect();
        $get_user = $db->query("SELECT * FROM company WHERE c_name LIKE '%".$post."%' ");

        while($user = $get_user->fetch_assoc()){
            $result[] = $user;
        }

        if(!empty($result)){

            return $result;
        }

    }

    public function get_user($user_id){

        $db = $this->connect();
        $get_user = $db->prepare("SELECT cid,username,passwd,c_name,c_tela,c_address,c_email FROM company WHERE cid = ?");
        $get_user->bind_param('i',$user_id);
        $get_user->execute();
        $get_user->bind_result($cid,$username,$passwd,$c_name,$c_tela,$c_address,$c_email);
        $get_user->fetch();

        $result = array(
            'cid'=>$cid,
            'username'=>$username,
            'passwd'=>$passwd,
            'c_name'=>$c_name,
            'c_tela'=>$c_tela,
            'c_address'=>$c_address,
            'c_email'=>$c_email,

        );

        return $result;
    }

    //function เพื่ม user
    public function add_user($data){

        $db = $this->connect();

        $add_user = $db->prepare("INSERT INTO company (cid,username,passwd,c_name,c_tela,c_c_address,c_c_email) VALUES(NULL,?,?,?,?,?,?) ");

        $add_user->bind_param("ssssss",$data['username'],$data['passwd'],$data['c_name'],$data['c_tela'],$data['c_c_address'],$data['c_c_email']);

        if(!$add_user->execute()){

            echo $db->error;

        }else{

            echo "บันทึกข้อมูลเรียบร้อย";
        }
    }

    //function edit user
    public function edit_user($data){

        $db = $this->connect();

        $add_user = $db->prepare("UPDATE company SET username = ? , passwd = ? , c_name = ? ,  c_tela = ? , c_address = ?  , c_email = ?  WHERE cid = ?");

        $add_user->bind_param("ssssssi",$data['edit_username'],$data['edit_passwd'],$data['edit_c_name'],$data['edit_c_tela'],$data['edit_c_address'],$data['edit_c_email'],$data['edit_user_id']);

        if(!$add_user->execute()){

            echo $db->error;

        }else{

            echo "บันทึกข้อมูลเรียบร้อย";
        }
    }

    //function delete user
    public function delete_user($id){

        $db = $this->connect();

        $del_user = $db->prepare("DELETE FROM company WHERE cid = ?");

        $del_user->bind_param("i",$id);

        if(!$del_user->execute()){

            echo $db->error;

        }else{

            echo "ลบข้อมูลเรียบร้อย";
        }
    }




}
?>