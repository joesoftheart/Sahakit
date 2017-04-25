<?php session_start();
include '../php/config.php';
date_default_timezone_set('Asia/Bangkok');
include_once('../vendor/Thaidate/Thaidate.php');
include_once('../vendor/Thaidate/thaidate-functions.php');
?>

<!DOCTYPE html>
<html>
<head>

    <link rel="shortcut icon" href="../img/favicon.ico">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>สหกิจศึกษา</title>
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="../pages/css_evaluation.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>

    <script>
        $(document).ready(function(){

            // hide #back-top first
            $("#back-top").hide();

            // fade in #back-top
            $(function () {
                $(window).scroll(function () {
                    if ($(this).scrollTop() > 100) {
                        $('#back-top').fadeIn();
                    } else {
                        $('#back-top').fadeOut();
                    }
                });

                // scroll body to 0px on click
                $('#back-top a').click(function () {
                    $('body,html').animate({
                        scrollTop: 0
                    }, 800);
                    return false;
                });
            });

        });
    </script>




    <script language="javascript">
        function IsNumeric(sText,obj)
        {
            var ValidChars = "12345.";
            var IsNumber=true;
            var Char;
            for (i = 0; i < sText.length && IsNumber == true; i++)
            {
                Char = sText.charAt(i);
                if (ValidChars.indexOf(Char) == -1)
                {
                    IsNumber = false;
                }
            }
            if(IsNumber==false){

                obj.value=sText.substr(0,sText.length-1);
            }
        }
    </script>






    <?php
    $status = null;


    if (isset($_SESSION['status'])) {
        $status = $_SESSION['status'];
        $c_name = $_SESSION['c_name'];
        $cid = $_SESSION['cid'];
        $sid = $_REQUEST['sid'];


        $sql3 = "SELECT * FROM company WHERE cid= $cid AND c_status_join = 1";
        $qquery = mysqli_query($link,$sql3);
        $result = mysqli_fetch_array($qquery);


        $sql = "SELECT * FROM register_work , company , student 
                    WHERE register_work.cid = company.cid 
                    AND register_work.sid = student.sid 
                    AND register_work.sid = $sid AND  register_work.cid = $cid";

        $query_work = mysqli_query($link, $sql);
        $row_work = mysqli_fetch_array($query_work);


    }
    ?>
</head>
<body id="top">
<?php include 'menu_company.php'?>
<div id="page-wrapper">
    <div id="crop">
        <div class="book">
            <div class="page">
                <div class="subpage">
                    <br>

                    <div align="center">
                        <div style="margin-top: 5px"><font
                                size="5"><u><b>แบบประเมินผลการปฏิบัติงานสหกิจศึกษา</b></u></font></div>
                        <br>
                    </div>
                    <font size="4"><b>(ผู้ให้ข้อมูล : <u>สถานประกอบการ</u>)</b></font> <br> <br>
                    <font size="3"><b><u>คำชี้แจง</u></b></font> <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1.
                    ผู้ให้ข้อมูลในแบบประเมินนี้ต้องเป็นพนักงานที่ปรึกษา (Job supervisor)
                    ของนักศึกษาสหกิจศึกษาหรือบุคคลที่ได้รับมอบหมายให้ทำหน้าที่แทน <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 2. เมื่อประเมินผลเรียบร้อยแล้ว
                    โปรดปิดผนึกและลงลายมือชื่อกำกับเอกสารสำคัญฉบับนี้ด้วย และให้นักศึกษานำส่งที่งานสหกิจศึกษา <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 3. โปรดให้คะแนนในช่อง <img src="../img/table.PNG"
                                                                                          height="20px">
                    ในแต่ละหัวข้อการประเมิน (5 = มากที่สุด 4 = มาก 3 = ปานกลาง
                    2 = น้อย 1 = น้อยที่สุด) หากไม่มีข้อมูลให้ใส่เครื่องหมาย - และโปรดให้ความคิดเห็นเพิ่มเติม (ถ้ามี)
                    <br><br> <br>
                    <form action="../php/update_evaluation_for_company.php" method="post" enctype="multipart/form-data">
                        <font size="4"> <b>ข้อมูลทั่วไป / Work Term Information</b> </font> <br>
                        <input type="hidden" name="sid" value="<?= $sid ?>">
                        <input type="hidden" name="cid" value="<?= $cid ?>">
                        ชื่อ - สกุล (นักศึกษา) <input type="text" name="fn_st" data-onload="set_size($(this),150)"
                                                      value="<?= $row_work['fn_st'] ?>" readonly="readonly"
                                                      style="margin-top: 5px;"><input type="text" name="ln_st"
                                                                                      data-onload="set_size($(this),150)"
                                                                                      value="<?= $row_work['ln_st'] ?>"
                                                                                      readonly="readonly"
                                                                                      style="margin-top: 5px;">
                        รหัสนักศึกษา <input type="text" name="number_id" value="<?= $row_work['number_id'] ?>"
                                            readonly="readonly" data-onload="set_size($(this),200)"
                                            style="margin-top: 5px;">
                        <br>
                        สาขาวิชา <input type="text" value="วิทยาการคอมพิวเตอร์" data-onload="set_size($(this),300)"
                                        readonly="readonly" style="margin-top: 5px;"> คณะ
                        <input type="text" value="วิทยาศาสตร์และเทคโนโลยี" data-onload="set_size($(this),305)"
                               readonly="readonly" style="margin-top: 5px;"> <br>
                        ชื่อสถานประกอบการ <input type="text" name="c_name" value="<?= $row_work['c_name'] ?>"
                                                 readonly="readonly" data-onload="set_size($(this),574)"
                                                 style="margin-top: 5px;"> <br>
                        ชื่อ - นามสกุลผู้ประเมิน <input type="text" name="name_leader" required="required"
                                                        data-onload="set_size($(this),300)"
                                                        style="margin-top: 5px;">
                        ตำแหน่ง <input type="text" name="rank_leader" required="required"
                                       data-onload="set_size($(this),210)"
                                       style="margin-top: 5px;">
                        <br><br>


                        <font size="4"><b>ผลสำเร็จของงาน / Work Achievement</b></font>
                        <table border="1" width="100%">
                            <thead>
                            <tr>
                                <th colspan="2" class="text-center">หัวข้อประเมิน / Items</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><b> &nbsp;1.ปริมาณงาน (Quantity of Work) </b><br>
                                    &nbsp; &nbsp;
                                    ปริมาณงานที่ปฏิบัติสำเร็จตามหน้าที่หรือตามที่ได้รับมอบหมายภายในระยะเวลาที่ <br>
                                    &nbsp; &nbsp;&nbsp; &nbsp; กำหนดและเทียบกับนักศึกษาทั่ว ๆ ไป
                                </td>
                                <td class="text-center"><textarea name="no1" data-onload="set_size($(this),100)"
                                                                  style="margin-top: 5px;"
                                                                  rows="1" required="required"  minlength="1" maxlength="1" id="mynumber"
                                                                  onKeyUp="IsNumeric(this.value,this)"></textarea></td>
                            </tr>
                            <tr>
                                <td><b> &nbsp;2. คุณภาพงาน (Quantity of Work) </b><br>
                                    &nbsp; &nbsp; ทำงานได้ถูกต้องครบถ้วนสมบูรณ์ มีความปราณีตเรียบร้อย มีความรอบคอบ
                                    ไม่เกิด <br>
                                    &nbsp; &nbsp;&nbsp; &nbsp; ปัญหา ติดตามมา งานไม่ค้างคา
                                    ทำงานเสร็จทันเวลาหรือก่อนเวลาที่กำหนด
                                </td>
                                <td class="text-center"><textarea name="no2" data-onload="set_size($(this),100)"
                                                                  style="margin-top: 5px;"
                                                                  rows="1" required="required"  minlength="1" maxlength="1" id="mynumber"
                                                                  onKeyUp="IsNumeric(this.value,this)"></textarea></td>
                            </tr>
                            </tbody>
                        </table>
                </div>
            </div>

            <div class="page">
                <div class="subpage">
                    <p align="center"> -2- </p>
                    <font size="4"><b>ความรู้ความสามารถ / Knowledge and Ability </b></font>
                    <table border="1" width="100%">
                        <thead>
                        <tr>
                            <th colspan="2" class="text-center">หัวข้อประเมิน / Items</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><b> &nbsp;3. ความรู้ความสามารถทางวิชาการ (Academic Ability) </b><br>
                                &nbsp; &nbsp;
                                นักศึกษามีความรู้ทางวิชาการเพียงพอที่จะทำงานตามที่ได้รับมอบหมาย <br>
                                &nbsp; &nbsp;&nbsp; &nbsp; (ในระดับที่นักศึกษาจะปฏิบัติได้)
                            </td>
                            <td class="text-center"><textarea name="no3" data-onload="set_size($(this),100)"
                                                              style="margin-top: 5px;"
                                                              rows="1" required="required"  minlength="1" maxlength="1" id="mynumber"
                                                              onKeyUp="IsNumeric(this.value,this)"></textarea></td>
                        </tr>
                        <tr>
                            <td><b> &nbsp;4. ความสามารถในการเรียนรู้และประยุกต์วิชาการ (Ability to Learn and Apply
                                    Knowledge)</b><br>
                                &nbsp; &nbsp; ความรวดเร็วในการเรียนรู้ เข้าใจข้อมูล ข่าวสาร และวิธีการทำงาน
                                ตลอดจนการนำ <br>
                                &nbsp;&nbsp;&nbsp; ความรู้ไปประยุกต์ใช้งาน
                            </td>
                            <td class="text-center"><textarea name="no4" data-onload="set_size($(this),100)"
                                                              style="margin-top: 5px;"
                                                              rows="1" required="required" minlength="1" maxlength="1" id="mynumber"
                                                              onKeyUp="IsNumeric(this.value,this)"></textarea></td>
                        </tr>
                        <tr>
                            <td><b> &nbsp;5. ความรู้ความชำนาญในการปฏิบัติงาน (Practical Ability)</b><br>
                                &nbsp; &nbsp; เช่น การปฏิบัติงานในภาคสนาม ในห้องปฏิบัติการ
                            </td>
                            <td class="text-center"><textarea name="no5" data-onload="set_size($(this),100)"
                                                              style="margin-top: 5px;"
                                                              rows="1" required="required"  minlength="1" maxlength="1" id="mynumber"
                                                              onKeyUp="IsNumeric(this.value,this)"></textarea></td>
                        </tr>
                        <tr>
                            <td><b> &nbsp;6. วิจารญาณและการตัดสินใจ (Judgement and Decision Making)</b><br>
                                &nbsp; &nbsp; ตัดสินใจได้ดี ถูกต้อง รวดเร็ว มีการวิเคราะห์ข้อมูลและปัญหาต่าง ๆ
                                อย่างรอบคอบ ก่อนการ <br>
                                &nbsp;&nbsp;&nbsp; ตัดสินใจ สามารถแก้ปัญหาเฉพาะหน้า
                                สามารถไว้วางใจให้ตัดสินใจได้ด้วยตนเอง

                            </td>
                            <td class="text-center"><textarea name="no6" data-onload="set_size($(this),100)"
                                                              style="margin-top: 5px;"
                                                              rows="1" required="required"  minlength="1" maxlength="1" id="mynumber"
                                                              onKeyUp="IsNumeric(this.value,this)"></textarea></td>
                        </tr>
                        <tr>
                            <td><b>&nbsp;7. การจัดการและวางแผน (Organization and Planning)</b><br>
                                &nbsp; &nbsp; สามารถจัดการและวางแผนการทำงานให้เสร็จตามเป้าหมาย

                            </td>
                            <td class="text-center"><textarea name="no7" data-onload="set_size($(this),100)"
                                                              style="margin-top: 5px;"
                                                              rows="1" required="required"  minlength="1" maxlength="1" id="mynumber"
                                                              onKeyUp="IsNumeric(this.value,this)"></textarea></td>
                        </tr>
                        <tr>
                            <td><b>&nbsp;8. ทักษะการสื่อสาร (Communication Skills)</b><br>
                                &nbsp; ความสามารถในการติดต่อสื่อสาร การพูด การเขียน การนำเสนอ (Presentation) <br>
                                &nbsp; &nbsp;สามารถสื่อให้เข้าใจได้ง่าย เรียบร้อย ชัดเจน ถูกต้อง รัดกุม
                                มีลำดับขั้นตอนที่ดี ไม่ก่อให้เกิด <br>
                                &nbsp; &nbsp;ความสับสนต่อการทำงาน รู้จักสอบถาม
                                รู้จักชี้แจงผลการปฏิบัติงานและข้อขัดข้องให้ทราบ

                            </td>
                            <td class="text-center"><textarea name="no8" data-onload="set_size($(this),100)"
                                                              style="margin-top: 5px;"
                                                              rows="1" required="required" minlength="1" maxlength="1" id="mynumber"
                                                                  onKeyUp="IsNumeric(this.value,this)"></textarea></td>
                        </tr>
                        <tr>
                            <td><b>&nbsp;9. การพัฒนาด้านภาษาและวัฒนธรรมต่างประเทศ (Foreign Language and Cultural
                                    Development)</b><br>
                                &nbsp; &nbsp; เช่น ภาษาอังกฤษ การทำงานกับชาวต่างชาติ (ประเมินเฉพาะสถานประกอบการที่มี
                                <br>
                                &nbsp;&nbsp;&nbsp;ชาวต่างชาติหรือที่ใช้ภาษาต่างประเทศในการติดต่อสื่อสาร)

                            </td>
                            <td class="text-center"><textarea name="no9" data-onload="set_size($(this),100)"
                                                              style="margin-top: 5px;"
                                                              rows="1" required="required" minlength="1" maxlength="1" id="mynumber"
                                                                  onKeyUp="IsNumeric(this.value,this)"></textarea></td>
                        </tr>
                        <tr>
                            <td><b>&nbsp;10. ความเหมาะสมต่อตำแหน่งงานที่ได้รับมอบหมาย (Suitability for
                                    JobPosition)</b><br>
                                &nbsp; &nbsp; สามารถพัฒนาตนเองให้ปฏิบัติงานตาม Job position และ Job description
                                ที่มอบหมายได้อย่าง <br>
                                &nbsp; &nbsp; เหมาะสมหรือตำแหน่งงานนี้เหมาะสมกับนักศึกษาคนนี้หรือไม่เพียงใด
                            </td>
                            <td class="text-center"><textarea name="no10" data-onload="set_size($(this),100)"
                                                              style="margin-top: 5px;"
                                                              rows="1" required="required" minlength="1" maxlength="1" id="mynumber"
                                                                  onKeyUp="IsNumeric(this.value,this)"></textarea></td>
                        </tr>
                        </tbody>
                    </table>
                    <br>
                    <font size="4"><b>ความรู้ความสามารถ / Knowledge and Ability </b></font>
                    <table border="1" width="100%">
                        <thead>
                        <tr>
                            <th colspan="2" class="text-center">หัวข้อประเมิน / Items</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><b>&nbsp;11. ความรับผิดชอบและเป็นผู้ที่ไว้วางใจได้ (Responsibility and
                                    Dependability)</b><br>
                                &nbsp; &nbsp; ดำเนินงานให้สำเร็จลุล่วงโดยคำนึงถึงเป้าหมายและความสำเร็จของงานเป็นหลัก
                                ยอมรับผล <br>
                                &nbsp; &nbsp; ที่เกิดจากการทำงานอย่างมีเหตุผล สามารถปล่อยให้ทำงาน (กรณีงานประจำ)
                                ได้โดยไม่ต้อง <br>
                                &nbsp; &nbsp; ควบคุมขั้นตอนในการทำงานตลอดเวลา
                                สามารถไว้วางใจได้และรับผิดชอบงานที่มากกว่างาน <br>
                                &nbsp; &nbsp; ประจำ สามารถไว้วางใจได้แทบทุกสถานการณ์หรือในสถานการณ์ปกติเท่านั้น
                            </td>
                            <td class="text-center"><textarea name="no11" data-onload="set_size($(this),100)"
                                                              style="margin-top: 5px;"
                                                              rows="1" required="required" minlength="1" maxlength="1" id="mynumber"
                                                                  onKeyUp="IsNumeric(this.value,this)"></textarea></td>
                        </tr>
                        </tbody>
                    </table>

                </div>
            </div>
            <div class="page">
                <div class="subpage">
                    <p align="center"> -3- </p>
                    <table border="1" width="100%">
                        <tbody>
                        <tr>
                            <td><b>&nbsp;12. ความสนใจ อุตสาหะในการทำงาน (Interest in Work)</b><br>
                                &nbsp; &nbsp; ความสนใจและความกระตือรือร้นในการทำงาน มีความอุตสาหะ ความพยายาม
                                ความตั้งใจที่<br>
                                &nbsp; &nbsp; จะทำงานได้สำเร็จ ความมานะบากบั่น ไม่ย่อท้อต่ออุปสรรคและปัญหา <br>

                            </td>
                            <td class="text-center"><textarea name="no12" data-onload="set_size($(this),100)"
                                                              style="margin-top: 5px;"
                                                              rows="1" required="required" minlength="1" maxlength="1" id="mynumber"
                                                                  onKeyUp="IsNumeric(this.value,this)"></textarea></td>
                        </tr>
                        <tr>
                            <td><b>&nbsp;13. ความสามารถเริ่มต้นทำงานได้ด้วยตนเอง (Initiative or Self
                                    Starter)</b><br>
                                &nbsp; &nbsp; เมื่อได้รับคำชี้แนะ สามารถเริ่มทำงานได้เอง โดยไม่ต้องรอคำสั่ง
                                (กรณีงานประจำ) <br>
                                &nbsp; &nbsp; เสนอตัวเข้าช่วยงานแทบทุกอย่างมาขอรับงานใหม่ ๆ ไปทำ
                                ไม่ปล่อยเวลาว่างให้ล่วงเลยไป <br>
                                &nbsp; &nbsp; โดยเปล่าประโยชน์
                            </td>
                            <td class="text-center"><textarea name="no13" data-onload="set_size($(this),100)"
                                                              style="margin-top: 5px;"
                                                              rows="1" required="required" minlength="1" maxlength="1" id="mynumber"
                                                                  onKeyUp="IsNumeric(this.value,this)"></textarea></td>
                        </tr>
                        <tr>
                            <td><b>&nbsp;14. การตอบสนองต่อการสั่งการ (Response to Supervision)</b><br>
                                &nbsp; &nbsp; ยินดีรับคำสั่ง คำแนะนำ คำวิจารณ์ ไม่แสดงความอึดอัดใจ
                                เมื่อได้รับคำติเตือนและวิจารณ์ <br>
                                &nbsp; &nbsp; ความรวดเร็วในการปฏิบัติตามคำสั่ง การปรับตัวปฏิบัติตามคำแนะนำ
                                ข้อเสนอแนะและวิจารณ์

                            </td>
                            <td class="text-center"><textarea name="no14" data-onload="set_size($(this),100)"
                                                              style="margin-top: 5px;"
                                                              rows="1" required="required" minlength="1" maxlength="1" id="mynumber"
                                                                  onKeyUp="IsNumeric(this.value,this)"></textarea></td>
                        </tr>
                        </tbody>
                    </table>
                    <br>
                    <font size="4"><b>ลักษณะส่วนบุคคล / Personality</b></font>
                    <table border="1" width="100%">
                        <thead>
                        <tr>
                            <th colspan="2" class="text-center">หัวข้อประเมิน / Items</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><b>&nbsp;15. บุคลิกภาพและการวางตัว (Personality)</b><br>
                                &nbsp; &nbsp; มีบุคลิกภาพและวางตัวได้เหมาะสม เช่น ทัศนคติ วุฒิภาวะ
                                ความอ่อนน้อมถ่อมตน<br>
                                &nbsp; &nbsp; การแต่งกาย กิริยาวาจา การตรงต่อเวลา และอื่น ๆ
                            </td>
                            <td class="text-center"><textarea name="no15" data-onload="set_size($(this),100)"
                                                              style="margin-top: 5px;"
                                                              rows="1" required="required" minlength="1" maxlength="1" id="mynumber"
                                                                  onKeyUp="IsNumeric(this.value,this)"></textarea></td>
                        </tr>
                        <tr>
                            <td><b>&nbsp;16. มนุษยสัมพันธ์ (Interpersonal Skills)</b><br>
                                &nbsp; &nbsp; สามารถร่วมงานกับผู้อื่น การทำงานเป็นทีม สร้างมนุษยสัมพันธ์ได้ดี
                                เป็นที่รักใคร่ <br>
                                &nbsp; &nbsp; ชอบพอของเพื่อนร่วมงาน เป็นผู้ที่ช่วยก่อให้เกิดความร่วมมือประสานงาน
                            </td>
                            <td class="text-center"><textarea name="no16" data-onload="set_size($(this),100)"
                                                              style="margin-top: 5px;"
                                                              rows="1" required="required" minlength="1" maxlength="1" id="mynumber"
                                                                  onKeyUp="IsNumeric(this.value,this)"></textarea></td>
                        </tr>

                        <tr>
                            <td><b>&nbsp;17. ความมีระเบียบวินัย ปฏิบัติตามวัฒนธรรมขององค์กร <br>
                                    &nbsp; &nbsp;&nbsp;  (Discipline and Adaptability to Formal Organization)
                                </b><br>
                                &nbsp; &nbsp; ความสนใจเรียนรู้ ศึกษา กฏระเบียบ นโยบายต่าง ๆ และปฏิบัติตามโดยเต็มใจ
                                การปฏิบัติตาม <br>
                                &nbsp; &nbsp; ระเบียบบริหารงานบุคคล (การเข้างาน ลางาน
                                ปฏิบัติตามกฎการรักษาความปลอดภัยใน <br>
                                &nbsp; &nbsp; โรงงาน การควบคุมคุณภาพ 5 ส และอื่น ๆ)
                            </td>
                            <td class="text-center"><textarea name="no17" data-onload="set_size($(this),100)"
                                                              style="margin-top: 5px;"
                                                              rows="1" required="required" minlength="1" maxlength="1" id="mynumber"
                                                                  onKeyUp="IsNumeric(this.value,this)"></textarea></td>
                        </tr>
                        <tr>
                            <td><b>&nbsp;18. คุณธรรมและจริยธรรม (Ethics and Morality)</b><br>
                                &nbsp; &nbsp; มีความซื่อสัตย์ สุจริต มีจิตใจสะอาด รู้จักเสียสละ ไม่เห็นแก่ตัว
                                เอื้อเฟื้อช่วยเหลือผู้อื่น <br>

                            </td>
                            <td class="text-center"><textarea name="no18" data-onload="set_size($(this),100)"
                                                              style="margin-top: 5px;"
                                                              rows="1" required="required" minlength="1" maxlength="1" id="mynumber"
                                                                  onKeyUp="IsNumeric(this.value,this)"></textarea></td>
                        </tr>
                        <tr>
                            <td><b>&nbsp;19. ความมั่นใจในตนเอง (self confidence) </b><br>
                                &nbsp; &nbsp;มีความสามารถแก้ปัญหา รับมือกับปัญหาต่าง ๆ เผชิญหน้ากับความท้าทาย หรืออุปสรรคต่างๆ <br>
                                &nbsp; &nbsp;ในชีวิตได้ เชื่อมั่นในความคิด และความสามารถของตัวเอง สามารถเลือกวิธีการตัดสินใจที่ถูกต้อง มีความรู้สึกที่ดี <br>
                                &nbsp; &nbsp;ให้กับตนเอง ไว้วางใจตนเองว่ามีความสามารถ มีพลัง มีประสิทธิภาพ และพึ่งพาตนเองได้ เป็นต้น
                            </td>
                            <td class="text-center"><textarea name="no19" data-onload="set_size($(this),100)"
                                                              style="margin-top: 5px;"
                                                              rows="1" required="required" minlength="1" maxlength="1" id="mynumber"
                                                                  onKeyUp="IsNumeric(this.value,this)"></textarea></td>
                        </tr>
                        <tr>
                            <td><b>&nbsp;20. ความเป็นผู้นํา (Leadership) </b><br>
                                &nbsp; &nbsp;มีความสามารถทําให้คนอื่นให้ความร่วมมือ สามารถชักจูง โน้มน้าว ชี้แนะ แนะนํา ให้บุคคลอื่น <br>
                                &nbsp; &nbsp;ร่วมทํางานจนบรรลุวัตถุประสงค์เป็นศูนย์กลางหรือศูนย์รวม สามารถสอดแทรกแนวความคิดให้เป็น <br>
                                &nbsp; &nbsp;ที่ยอมรับ เป็นต้น
                            </td>
                            <td class="text-center"><textarea name="no20" data-onload="set_size($(this),100)"
                                                              style="margin-top: 5px;"
                                                              rows="1" required="required" minlength="1" maxlength="1" id="mynumber"
                                                                  onKeyUp="IsNumeric(this.value,this)"></textarea></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="page">
                <div class="subpage">
                    <p align="center"> -4- </p>
                    <b>21.โปรดให้ข้อคิดเห็นที่เป็นประโยชน์แก่นักศึกษา / Please give comments on the student</b>
                    <table border="1" width="100%">
                        <thead>
                        <tr>
                            <th width="25%" height="10%" class="text-center">จุดเด่นของนักศึกษา / Strengh</th>
                            <th width="25%" height=" 10%" class="text-center">ข้อควรปรับปรุงของนักศึกษา / Needed
                                Improvement
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="text-center">  <textarea name="no21_1" data-onload="set_size($(this),350)"
                                                                style="margin-top: 5px;"
                                                                rows="3" required="required" ></textarea></td>
                            <td class="text-center"> <textarea name="no21_2" data-onload="set_size($(this),350)"
                                                               style="margin-top: 5px;"
                                                               rows="3" required="required" ></textarea></td>
                        </tr>

                        </tbody>
                    </table>
                    <br>
                    <b>
                        หากนักศึกษาผู้นี้สำเร็จการศึกษาแล้ว ท่านจะรับเข้าทำงานในสถานประกอบการนี้หรือไม่
                        (หากมีโอกาสเลือก)
                        Once this student graduates, will you be interested to offer him/her a job?</b> <br>
                    (&nbsp; <input type="radio" name="get_work" value="yes"> &nbsp;) รับ / yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    (&nbsp; <input type="radio" name="get_work" value="notsure"> &nbsp;)ไม่แน่ใจ / Not sure &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    (&nbsp;<input type="radio" name="get_work" value="no"> &nbsp;)ไม่รับ / No

                    <br><br>
                    <b> 22. ข้อคิดเห็นเพิ่มเติม / Other comments</b> <br>
                    <textarea name="comment" data-onload="set_size($(this),600)" style="margin-top: 5px;"
                              rows="5"></textarea>
                    <br><br><br>
                    <p align="right">
                        ลงชื่อ / Evaluator ‘s Signature <input type="text" name="evaluator"
                                                               data-onload="set_size($(this),150)"
                                                               style="margin-top: 5px;" required="required" >
                        พนักงานที่ปรึกษา <br></p>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    (<input type="text" data-onload="set_size($(this),150)" style="margin-top: 5px;"
                            required="required" >)
                    <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;


                    <input type="text" name="d" value="<?php echo thaidate('j'); ?>" readonly="readonly"
                           data-onload="set_size($(this),25)" style="margin-top: 5px;">/
                    <input type="text" name="m" value="<?php echo thaidate('F'); ?>" readonly="readonly"
                           data-onload="set_size($(this),60)" style="margin-top: 5px;">/
                    <input type="text" name="y" value="<?php echo thaidate('Y'); ?>" readonly="readonly"
                           data-onload="set_size($(this),40)" style="margin-top: 5px;">
                    <br><br><br><br><br><br><br><br>

                    <div class="text-right">
                        <button type="submit" class="btn btn-success"><font size="4">ประเมิน</font></button>
                    </div>
                    </form>
                    <p id="back-top">
                        <a href="#top" style="margin-left: 800%"><span></span>Back to Top</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>



<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="../vendor/metisMenu/metisMenu.min.js"></script>
<script src="../vendor/raphael/raphael.min.js"></script>
<script src="../vendor/morrisjs/morris.min.js"></script>
<script src="../data/morris-data.js"></script>
<script src="../dist/js/sb-admin-2.js"></script>
<script>
    function set_size(input, width) {
        input.css("width", width + "px");
        //alert(width);
    }

    $('[data-onload]').each(function () {
        eval($(this).data('onload'));
    });
</script>


</body>
</html>