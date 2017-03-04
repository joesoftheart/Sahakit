<div class="col-lg-12">
    <div class="panel panel-yellow">
        <div class="panel-heading">
            <h1 class=" text-center">แบบฟอร์มกรอกสมัครสมาชิก สำหรับนักศึกษา</h1>
        </div>
        <div class="panel-body">
            <!-- แบบฟอร์มสำรับ อาจารย์ -->
            <form id="form3" style="display: none;">
                <div class="row">
                    <div class="col-md-6 col-md-4">
                        <label>ชื่อผู้ใช้</label>
                        <input type="text" name="username" placeholder="กรอกไอดีของท่าน" class="form-control"
                               maxlength="10" required="required">
                    </div>
                    <div class="col-md-6 col-md-4">
                        <label>รหัสผ่าน</label>
                        <input type="password" name="passwd" class="form-control" minlength="8" maxlength="18"
                               required="required">
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <label>ยืนยันรหัสผ่าน</label>
                        <input type="password" name="conpasswd" class="form-control" minlength="8" maxlength="18"
                               required="required">
                    </div>
                </div>
                <br>

                <div class="row">
                    <div class="col-md-4 col-md-4 form-group">
                        <label>ชื่อ</label>
                        <input type="text" name="fname" placeholder="สมชาย" maxlength="25" class="form-control"
                               required="required"
                               onKeyUp="if(!(isNaN(this.value))) { alert('กรุณากรอกชื่อเท่านั้น ห้ามมีตัวเลขมาผสม'); this.value='';}"/>
                    </div>
                    <div class="col-md-4 col-md-4 form-group">
                        <label>นามสกุล</label>
                        <input type="text" name="lname" placeholder="ขยันยิ่ง" maxlength="25" class="form-control"
                               required="required"
                               onKeyUp="if(!(isNaN(this.value))) { alert('กรุณากรอกชื่อเท่านั้น ห้ามมีตัวเลขมาผสม'); this.value='';}"/>
                    </div>
                    <div class="col-md-4 col-md-4 form-group">
                        <label>อีเมลผู้ใช้</label>
                        <input class="form-control" placeholder="Email" id="email" name="email" type="email"
                               required="required"
                               value="" onBlur="checkEmail()">
                        <span id="email-availability-status"></span>
                    </div>

                </div>


                <br>
                <div class="row">
                    <div class="col-md-4 col-md-4 form-group">
                        <label>ที่อยู่</label>
                        <textarea name="address" class="form-control" rows="3"></textarea>
                    </div>
                    <div class="col-md-4 col-md-4 form-group">
                        <label>เบอร์โทรติดต่อ</label>
                        <input type="text" name="telaphone" placeholder="0909869999" class="form-control" minlength="10"
                               maxlength="10" required="required"
                               onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกเฉพาะตัวเลขเท่านั้น'); this.value='';}"/>
                    </div>


                    <div class="col-md-4 col-md-4 form-group">
                        <label for="exampleInputFile">รูปภาพประจำตัว</label>
                        <input type="file" name="filetoload" id="fileimg" onblur="checkimg()">
                        <span class="img-availability-status"></span>
                        <br>
                    </div>
                </div>
                <div class="hidden">
                    <input type="radio" name="status" value="อาจารย์" checked="checked">
                </div>

                <br><br><br><br>


                <div class="col-md-6 col-lg-offset-4">
                    <button type="submit" value="Upload Image" class="btn btn-outline btn-primary" data-toggle="tooltip"
                            data-placement="top" title="สมัครสมาชิก"> สมัครสมาชิก
                    </button>
                    <a href="index.php" class="btn btn-outline btn-danger "><i class="glyphicon glyphicon-home"></i>
                        หน้าแรก</a>
                </div>

            </form>
        </div>

    </div>
    <!-- /.col-lg-4 -->
</div>

<!-- แบบฟอร์มสำรับ อาจารย์ -->