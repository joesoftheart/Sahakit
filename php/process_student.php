<?php
include"../php/database.class_student.php";

//create object
$process = new Database();

//Add_user
if(isset($_POST['fn_st'])){
    //รับข้อมูลจาก FORM ส่งไปที่ Method add_user
    $process->add_user($_POST);
}

//show edit data form
if(isset($_POST['show_user_id'])){

    $edit_user = $process->get_user($_POST['show_user_id']);

    echo'<form id="edit_user_form">
                    <div class="form-group">
                        <label >ไอดี</label>
                        <input type="text" class="form-control" name="edit_username"   value="'.$edit_user['username'].'">
                    </div>
                    <div class="form-group">
                        <label >รหัสผ่าน</label>
                        <input type="text" class="form-control" name="edit_passwd"   value="'.$edit_user['passwd'].'">
                    </div>
                    <div class="form-group">
                        <label >ชื่อ</label>
                        <input type="text" class="form-control" name="edit_fn_st"   value="'.$edit_user['fn_st'].'">
                    </div>
                    <div class="form-group">
                        <label >สกุล</label>
                        <input type="text" class="form-control" name="edit_ln_st"  value="'.$edit_user['ln_st'].'">
                    </div>
                    <div class="form-group">
                        <label >รหัสนักศึกษา</label>
                        <input type="text" class="form-control" name="edit_number_id" value="'.$edit_user['number_id'].'">
                    </div>
                    <div class="form-group">
                        <label >อายุ</label>
                        <input type="text" class="form-control" name="edit_age"  value="'.$edit_user['age'].'">
                    </div>
                    
                    <div class="form-group">
                        <label >เบอร์โทรศัพท์</label>
                        <input type="text" class="form-control" name="edit_telaphone"  value="'.$edit_user['telaphone'].'">
                    </div>
                    <div class="form-group">
                        <label >อีเมล์</label>
                        <input type="text" class="form-control" name="edit_email" value="'.$edit_user['email'].'">
                    </div>
                    <input type="hidden" name="edit_user_id" value="'.$edit_user['sid'].'" >
			
			  
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