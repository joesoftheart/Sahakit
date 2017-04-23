<?php
class Database
{

    public $host = 'localhost'; //ชื่อ Host
    public $user = 'root'; //ชื่อผู้ใช้งาน ฐานข้อมูล
    public $password = ''; // password สำหรับเข้าจัดการฐานข้อมูล
    public $database = 'sahakit'; //ชื่อ ฐานข้อมูล

    //function เชื่อมต่อฐานข้อมูล
    public function connect()
    {

        $mysqli = new mysqli($this->host, $this->user, $this->password, $this->database);

        $mysqli->set_charset("utf8");

        if ($mysqli->connect_error) {

            die('Connect Error: ' . $mysqli->connect_error);
        }

        return $mysqli;
    }

    //function เรื่ยกดูข้อมูล all user
    public function get_all_user()
    {

        $db = $this->connect();
        $get_user = $db->query("SELECT * FROM student");

        while ($user = $get_user->fetch_assoc()) {
            $result[] = $user;
        }

        if (!empty($result)) {

            return $result;
        }
    }

    public function search_user($post = null)
    {

        $db = $this->connect();
        $get_user = $db->query("SELECT * FROM student WHERE fn_st LIKE '%" . $post . "%' ");

        while ($user = $get_user->fetch_assoc()) {
            $result[] = $user;
        }

        if (!empty($result)) {

            return $result;
        }

    }

    public function get_user($user_id)
    {

        $db = $this->connect();
        $get_user = $db->prepare("SELECT sid,username,passwd,fn_st,ln_st,number_id,age,telaphone,email FROM student WHERE sid = ?");
        $get_user->bind_param('i', $user_id);
        $get_user->execute();
        $get_user->bind_result($sid, $username, $passwd, $fn_st, $ln_st, $number_id, $age, $telaphone, $email);
        $get_user->fetch();

        $result = array(
            'sid' => $sid,
            'username' => $username,
            'passwd' => $passwd,
            'fn_st' => $fn_st,
            'ln_st' => $ln_st,
            'number_id' => $number_id,
            'age' => $age,
            'telaphone' => $telaphone,
            'email' => $email,

        );

        return $result;
    }

    //function เพื่ม user
    public function add_user($data)
    {

        $db = $this->connect();

        $add_user = $db->prepare("INSERT INTO student (sid,username,passwd,fn_st,ln_st,number_id,age,telaphone,email) VALUES(NULL,?,?,?,?,?,?,?,?) ");

        $add_user->bind_param("ssssssss", $data['username'], $data['passwd'], $data['fn_st'], $data['ln_st'], $data['number_id'], $data['age'],  $data['telaphone'], $data['email']);

        if (!$add_user->execute()) {

            echo $db->error;

        } else {

        }
    }

    //function edit user
    public function edit_user($data)
    {

        $db = $this->connect();

        $add_user = $db->prepare("UPDATE student SET username = ? , passwd = ? , fn_st = ? , ln_st = ? , number_id = ? , age = ? ,  telaphone = ? , email = ?  WHERE sid = ?");

        $add_user->bind_param("ssssssssi", $data['edit_username'], $data['edit_passwd'], $data['edit_fn_st'], $data['edit_ln_st'], $data['edit_number_id'], $data['edit_age'],  $data['edit_telaphone'], $data['edit_email'], $data['edit_user_id']);

        if (!$add_user->execute()) {

            echo $db->error;

        } else {

        }
    }

    //function delete user
    public function delete_user($id)
    {

        $db = $this->connect();

        $del_user = $db->prepare("DELETE FROM student WHERE sid = ?");

        $del_user->bind_param("i", $id);

        if (!$del_user->execute()) {

            echo $db->error;

        } else {

        }
    }




}
?>