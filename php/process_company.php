<?php
include"database.class_company.php";

//create object
$process = new Database();

//Add_user
if(isset($_POST['c_name'])){
    //รับข้อมูลจาก FORM ส่งไปที่ Method add_user
    $process->add_user($_POST);
}

//show edit data form
if(isset($_POST['show_user_id'])){

    $edit_user = $process->get_user($_POST['show_user_id']);

    echo'<form id="edit_user_form">
                    <div class="form-group">
                        <label >ไอดี</label>
                        <input type="text" class="form-control" name="edit_c_user"   value="'.$edit_user['c_user'].'">
                    </div>
                    <div class="form-group">
                        <label >รหัสผ่าน</label>
                        <input type="text" class="form-control" name="edit_c_pw"   value="'.$edit_user['c_pw'].'">
                    </div>
                    <div class="form-group">
                        <label >ชื่อ</label>
                        <input type="text" class="form-control" name="edit_c_name"   value="'.$edit_user['c_name'].'">
                    </div>
                    <div class="form-group">
                        <label >เบอร์โทรศัพท์</label>
                        <input type="text" class="form-control" name="edit_c_tela"  value="'.$edit_user['c_tela'].'">
                    </div>
                     <div class="form-group">
                        <label >ที่อยู่</label>
                        <input type="text" class="form-control" name="edit_c_address"  value="'.$edit_user['c_address'].'">
                    </div>
                    <div class="form-group">
                        <label >อีเมล์</label>
                        <input type="text" class="form-control" name="edit_c_email" value="'.$edit_user['c_email'].'">
                    </div>
                    <input type="hidden" name="edit_user_id" value="'.$edit_user['cid'].'" >
			
			  
			</form>';
}

//edit user
if(isset($_POST['edit_user_id'])){

    $process->edit_user($_POST);

}

//delete user
if(isset($_POST['delete_user_id'])){

    $process->delete_user($_POST['delete_user_id']);
}


?>