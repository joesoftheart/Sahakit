
<div class="col-lg-12">
    <div class="panel panel-green">
        <div class="panel-heading">
            <h1 class=" text-center">แบบฟอร์มกรอกสมัครสมาชิก สำหรับนักศึกษา</h1>
        </div>
        <div class="panel-body">
<!-- แบบฟอร์มสำรับ นักศึกษา -->

<div class="col-md-6 col-md-4" >
        <label>ชื่อผู้ใช้</label>
        <input type="text" name="username" placeholder="กรอกไอดีของท่าน" class="form-control"  maxlength="10" required="required">
    </div>
    <div class="col-md-6 col-md-4">
        <label>รหัสผ่าน</label>
        <input type="password" name="passwd" class="form-control"  maxlength="18" required="required" >
    </div>
    <div class="col-md-6 col-lg-4">
        <label>ยืนยันรหัสผ่าน</label>
        <input type="password" name="conpasswd" class="form-control"  maxlength="18" required="required">
    </div>
    <br><br><br><br>

    <div class="col-md-4  form-group" >
        <label>รหัสนักศึกษา</label>
        <input type="text" name="idst" required="required" minlength="10" maxlength="10" class="form-control ">
    </div>
    <div class="col-md-4  form-group" >
        <label>ชื่อ</label>
        <input type="text" name="fname_st" placeholder="สมชาย" maxlength="25" class="form-control" required="required" >
    </div>
    <div class="col-md-4  form-group">
        <label>นามสกุล</label>
        <input type="text" name="lname_st" placeholder="ขยันยิ่ง" maxlength="25" class="form-control" required="required" >
    </div>
    <br><br><br><br>

    <div class="col-md-2 col-md-3">
        <label>บ้านเลขที่</label>
        <input type="text" name="at_home" class="form-control" required="required">
    </div>
    <div class="col-md-2">
        <label>หมู่ที่</label>
        <input type="text" name="moo" class="form-control" required="required">
    </div>
    <div class="col-md-2 col-md-3 ">
        <label>จังหวัด </label>
        <span id="province">
                   <select class="form-control" name="province" required="required">
                      <option value='' >- เลือกจังหวัด -</option>
                   </select>
                </span>
    </div>
    <div class="col-md-2 col-md-3" >
        <label>อำเภอ </label>
        <span id="amphur">
                    <select class="form-control" name="amphur" required="required">
                        <option value=''>- เลือกอำเภอ -</option>
                    </select>
                </span>
    </div>
    <div class="col-md-2 col-md-3">
        <label>ตำบล </label>
        <span id="district">
                    <select class="form-control" name="district" required="required">
                        <option value=''>- เลือกตำบล -</option>
                    </select>
                </span>
    </div>
    <div class="col-md-2 col-md-3">
        <label>รหัสไปรษณีย์</label>
        <input type="text" name="passcode" class="form-control">
    </div>
    <br><br><br><br>

    <div class="col-md-3 col-md-4">
        <label>เบอร์โทรติดต่อ</label>
        <input type="text" name="telaphone" placeholder="0909869999" class="form-control" minlength="10" maxlength="10" required="required" onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกเฉพาะตัวเลขเท่านั้น'); this.value='';}"/>
    </div>
    <div class="col-md-3 col-md-4 form-group">
        <label>อีเมลผู้ใช้</label>
        <input class="form-control" placeholder="Email" id="email" name="email" type="email" required="required"
               value="" onBlur="checkEmail()">
        <span id="email-availability-status"></span>
    </div>
    <div class="col-md-3 col-md-4">
        <label>อายุ</label>
        <select name="age" class="form-control">
            <option value="18" selected="selected">18 ปี</option>
            <option value="19">19 ปี</option>
            <option value="20">20 ปี</option>
            <option value="21">21 ปี</option>
            <option value="22">22 ปี</option>
            <option value="23">23 ปี</option>
            <option value="24">24 ปี</option>
            <option value="25">25 ปี</option>
        </select>
    </div>
    <div class="col-md-2 col-md-4">
        <label>เพศ</label><br>
        <input type="radio" name="gender" value="หญิง">  หญิง
        <input type="radio" name="gender" value="ชาย" >  ชาย
    </div>

    <div class="col-md-1 hidden">
        <input type="radio" name="status" value="นักศึกษา" checked="checked">
</div>


    <div class="col-md-12">
        <label for="exampleInputFile">รูปภาพประจำตัว</label>
        <input type="file" name="filetoload" id="fileimg" required="required" onblur="checkimg()">
        <span class="img-availability-status"></span>
        <br>
    </div>

    <br><br><br><br>


    <div class="col-md-6 col-lg-offset-4">
        <button type="submit" value="Upload Image"  class="btn btn-outline btn-primary" data-toggle="tooltip" data-placement="top" title="สมัครสมาชิก"> สมัครสมาชิก</button>
        <a href="index.php" class="btn btn-outline btn-danger "><i class="glyphicon glyphicon-home"></i> หน้าแรก</a>
    </div>

        </div>
        <!-- /.col-lg-4 -->
    </div>
<!-- แบบฟอร์มสำรับ นักศึกษา -->