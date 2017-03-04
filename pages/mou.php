<meta charset="utf-8"/>
<?php
session_start();
include '../php/config.php';
date_default_timezone_set('Asia/Bangkok');
include_once('../vendor/Thaidate/Thaidate.php');
include_once('../vendor/Thaidate/thaidate-functions.php');

?>
<style>
    @font-face {
        font-family: 'THSarabun';
        src: url('../vendor/font-thsarabun/THSarabun.eot');
        src: url('../vendor/font-thsarabun/THSarabun.eot?#iefix') format('embedded-opentype'),
        url('../vendor/font-thsarabun/THSarabun.woff2') format('woff2');
        font-weight: normal;
        font-style: normal;
    }

    @font-face {
        font-family: 'THSarabunPSK';
        src: url('../vendor/font-thsarabun/THSarabunPSK.woff') format('woff'),
        url('../vendor/font-thsarabun/THSarabunPSK.ttf') format('truetype'),
        url('../vendor/font-thsarabun/THSarabunPSK.svg#THSarabunPSK') format('svg');
        font-weight: normal;
        font-style: normal;
    }

    body {
        margin: 0;
        padding: 0;
        background-color: #FAFAFA;
        font: 12pt "Tahoma";
        font-family: 'THSarabunPSK';
    }

    * {
        box-sizing: border-box;
        -moz-box-sizing: border-box;
    }

    input[type="text"] {
        border: none;
        border-bottom: dotted #0f0f0f 1px;
        font-family: 'THSarabunPSK';
        display: inline;
        position: relative;
        text-align: center;
        top: -6px;
        font-size: 20px;
        padding-bottom: -5px;
        background: none;
    }

    input[] {
        position: relative;
    }

    .page {
        width: 21cm;
        font-size: 20px;
        min-height: 29.7cm;
        padding: 2cm;
        margin: 1cm auto;
        border: 1px #D3D3D3 solid;
        border-radius: 5px;
        background: white;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }

    .subpage {
        padding: 1cm;
        border: 5px white solid;
        height: 256mm;
        outline: 2cm white solid;
    }

    .page_rotate {
        width: 29.7cm;
        font-size: 18px;
        height: 21cm;
        padding: 2cm;
        margin: 1cm auto;
        border: 1px #D3D3D3 solid;
        border-radius: 5px;
        background: white;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }

    .subpage_rotate {
        padding: 0cm;
        padding-top: 20px;;
        border: 5px white solid;
        width: 257mm;
        outline: 2cm white solid;
        height: 170mm;
    }

    @page {
        font-family: 'THSarabun';
        size: A4;
        font-size: 20px;
        margin: 0;
    }

    @media print {
        .page {
            font-family: 'THSarabun';
            font-size: 20px;
            margin: 0;
            border: initial;
            border-radius: initial;
            width: initial;
            min-height: initial;
            box-shadow: initial;
            background: initial;
            page-break-after: always;
        }

        .btn {
            display: none;
        }

        .page_rotate {
            position: relative;
            bottom: -320px;
            font-family: 'THSarabun';
            font-size: 20px;
            margin: 0;
            border: initial;
            border-radius: initial;
            width: initial;
            min-height: initial;
            box-shadow: initial;
            background: initial;
            page-break-after: always;
            -webkit-transform: rotate(-90deg);
            -moz-transform: rotate(-90deg);
        }

        input[type="text"] {
            border: none;
            border-bottom: dotted #0f0f0f 1px;
            font-family: 'THSarabunPSK';
            display: inline;
            position: relative;
            text-align: center;
            top: -6px;
            font-size: 20px;
            padding-bottom: -5px;
            background: none;
        }

        input[] {
            position: relative;
        }

        .note {
            background: none;
            resize: none;
        }

        .note textarea {
            font-family: 'THSarabun';
            /*background: transparent url(image/underline.png) repeat;*/
            border: none;
            height: 70px;
            width: 500px;
            overflow: hidden;
            line-height: 30px;
            resize: none;
            position: relative;
            top: -0px;
            font-size: 20px;
            overflow: hidden;
        }
    }

    .note {
        background: none;
        resize: none;
    }

    .note textarea {
        font-family: 'THSarabun';
        border: none;
        background: none;
        height: 70px;
        width: 500px;
        overflow: hidden;
        line-height: 30px;
        resize: none;
        position: relative;
        top: -0px;
        font-size: 20px;
        overflow: hidden;
    }
</style>
<?php
$username = $_SESSION['username'];
$sql = "SELECT * FROM company WHERE username = '$username'";
$query = mysqli_query($link,$sql) or die(mysqli_error($sql));
$result = mysqli_fetch_array($query);



?>
<link rel="stylesheet" href="../vendor/font-awesome/css/font-awesome.css">
<script type="text/javascript" src="../vendor/jquery/jquery.js"></script>
<div class="book">
    <div class="page">
        <div class="subpage">
            <div align="center">
                <div style="margin-top: 5px">บันทึกความตกลงความร่วมมือทางวิชาการ</div>
                ระหว่าง<br>
                มหาวิทยาลัยธรุกิจบัณฑิต และ <input type="text" value="<?= $result['c_name'] ?>" data-onload="set_size($(this),200)"
                                                         style="margin-top: 5px;"><br>
                เรื่อง<br>
                ความร่วมมือทางวิชาการและการปฏิบัติบัติงานสหกิจศึกษา
            </div>


            <br>
            <input type="text" data-onload="set_size($(this),500)" style="margin-top: 5px; margin-right: 10px" readonly>

            <br>

            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            เอกสารฉบับนี้เป็นบันทึกข้อตกลงความร่วมมือทางวาการระหวาง มหาวิทยาลัยธุรกิจบัณฑิ และ<br> <input type="text" value="<?= $result['c_name'] ?>" data-onload="set_size($(this),200)" style="margin-top: 5px;">
            ที่ตระหนักความสำคัญของการจัดการศึกษาระดับอุดมศึกษาในการผลิตบัณฑิตให้มีความรู้คู่คุณธรรมมีความสามารถทักษะ
            และความชำนาญทางวิชาชีพ &nbsp;&nbsp; ตรงตามความต้องการของตลาดแรงงาน &nbsp;&nbsp;
            จึงประสานความร่วมมือทางวิชาการร่วมกันเพื่อพัฒนา
            คุณภาพนักศึกษา &nbsp;&nbsp; ให้เป็นทรัพยากรที่มีคุณค่าสูงสุดต่อการพัฒนาประเทศ &nbsp;&nbsp;
            อีกทั้งเป็นการสนองนโยบายของรัฐบาลที่ต้องการ
            ให้มีการสนับสนุนและการประสานงานระหว่างหน่วยงานที่เกี่ยวข้องกัน &nbsp;บันทึกข้อตกลงฉบับนี้
            ได้กำหนดขอบเขตความ
            ร่วมมือทางวิชาการและปฏิบัติงานสหกิจศึกษาในการจัดโครงการหรือกิจกรรมต่าง &nbsp;&nbsp; ๆ <br> ตลอดจนส่งเสริมงานด้านวิชาการที่
            สามารถดำเนินการร่วมกันได้ดังนี้ <br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ๑.
            การจัดโครงการความร่วมมือการปฏิบัติงานสหกิจศึกษา <br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ๑.๑
            มหาวิทยาลัยธุรกิจบัณฑิต และ  <input type="text" value="<?= $result['c_name'] ?>" data-onload="set_size($(this),200)"
                                                      style="margin-top: 5px;">
            วางแผนร่วม &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;กันในการคัดเลือกนักศึกษาไป
            ปฏิบัติงานกับหน่วยงานในระบบสหกิจศึกษาอย่างต่อเนื่อง &nbsp; <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;โดยมีการดำเนินดังนี้
            <br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;๑.๑.๑
            การกำหนดให้มีการประชุมร่วมกันเพื่อการพัฒนาคุณภาพนักศึกษาให้เป็น <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;บัณฑิตที่มีคุณภาพตรงตามความต้องการของตลาดแรงงาน<br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            ๑.๑.๒ การกำหนดลักษณะงานที่นักศึกษาต้องปฏิบัติอย่างชัดเจนกับตรงกับสาขาวิชา <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;และกำหนดให้มี
            พนักงานที่ปรึกษาในการดูแลการปฏิบัติงานสหกิจศึกษาของ <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;นักศึกษา
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            ๑.๑.๓ การจัดสวัสดิการและหรือค่าตอบแทนที่เหมาะสมกับความรู้ความสามารถของ <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; นักศึกษา ตามที่
             <input type="text" value="<?= $result['c_name'] ?>" data-onload="set_size($(this),200)"
                          style="margin-top: 5px;"> พิจารณาเห็นสมควร
            <br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            ๑.๒ มหาวิทยาลัยธุรกิจบัณฑิตและ<input type="text" value="<?= $result['c_name'] ?>" data-onload="set_size($(this),200)"
                                                        style="margin-top: 5px;">
            กำหนดแผนงานร่วมกันในการเพิ่มประสิทธิภาพ
            และผลของการปฏิบัติงานสหกิจศึกษา
            <br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            ๒.การจัดกิจกรรมด้านวิชาการอื่นร่วมกัน <br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            ๒.๑ จัดกิจกรรมทางวิชาการ การวิจัยหรือการใช้เครื่องมือปฏิบัติกรร่วมกัน <br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            ๒.๒ จัดกิจกรรมการพัฒนาบุคลากรของหน่วยงานร่วมกัน <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            ในการดำเนินการ มหาวิทยาลัยธุรกิจบัณฑิตและ<input type="text" value="<?= $result['c_name'] ?>" data-onload="set_size($(this),200)"
                                                                  style="margin-top: 5px;">
            จึงลงนามร่วมกันในข้อตกลงความร่วมมือ
            ทางวิชาการและการปฏิบัติงานสหกิจศึกษาทางวิชาการและการปฏิบัติงานสหกิจศึกา
            บันทึกข้อตกลงนี้มีผลบังคับใช้ตั้งแต่วัน
            ลงนาม และจะยกเลิกเมื่อฝ่ายใดฝ่ายหนึ่งได้แจ้งขอยกเลิกให้ทราบล่วงหน้า
            ทั้งนี้ขึ้นอยู่กับความเห็นชอบของทั้งสองฝ่าย โดยมี
            รายละเอียดการบันทึกความร่วมมือดังเอกสารแนบท้าย

        </div>
    </div>

<form action="../php/update_form_mou.php" method="post" enctype="multipart/form-data">
    <div class="page">
        <div class="subpage">
            <br><br><br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ชื่อผู้มีอำนาจในการลงนาม	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ชื่อผู้มีอำนาจในการลงนาม <br><br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="text" value="ดร.ดาริกา ลัทธพิพัฒน์" data-onload="set_size($(this),150)" style="margin-top: 5px;">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	<input type="text" name="leader" required="required" data-onload="set_size($(this),150)" style="margin-top: 5px;"> <br><br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;( ดร.ดาริกา ลัทธพิพัฒน์ )	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(<input type="text" required="required" data-onload="set_size($(this),150)" style="margin-top: 5px;">) <br><br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ตำแหน่ง อธิการบดีมหาวิทยาลัยธุรกิจบัณฑิต&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ตำแหน่ง <input type="text" name="rank_leader" required="required" data-onload="set_size($(this),150)" style="margin-top: 5px;"> <br><br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เมื่อวันที่<input type="text" value="<?= thaidate('j') ?>" data-onload="set_size($(this),25)" style="margin-top: 5px;"> เดือน <input type="text" value="<?= thaidate('F') ?>" data-onload="set_size($(this),65)" style="margin-top: 5px;"> พ.ศ.<input type="text" value="<?= thaidate('Y') ?>" data-onload="set_size($(this),50)" style="margin-top: 5px;">		<br><br><br><br><br><br>




            <u>บันทึกแนบท้าย</u> <br>
            &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;ภายใต้ข้อตกลงในข้อ ๑. การจัดโครงการความร่วมมือการปฏิบัติงานสหกิจศึกษา <br>
            หัวข้อย่อย ๑.๑   “มหาวิทยาลัยธุรกิจบัณฑิตคัดเลือกนักศึกษา ร่วมกับ <input type="text" value="<?= $result['c_name'] ?>" data-onload="set_size($(this),200)" style="margin-top: 5px;"> ก่อนจัด ส่งไปปฏิบัติงานทุกปี  ในช่วงเวลาที่กำหนดร่วมกันอย่างชัดเจน ”  โดย <br>
            ๑.&nbsp;&nbsp;	หากมหาวิทยาลัยธุรกิจบัณฑิตสามารถจัดส่งนักศึกษาไปปฏิบัติงานสหกิจศึกษาได้ในภาคการศึกษาใดจะ  <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ต้องแจ้งให้<input type="text" value="<?= $result['c_name'] ?>" data-onload="set_size($(this),200)" style="margin-top: 5px;"> ทราบล่วงหน้า  ไม่น้อยกว่า ๑ ภาคการศึกษา เพื่อไม่ให้ เกิดความเสียหารกรณีที่หน่วยงานได้เตรียมงานหรือโครงการ (Project) สำหรับนักศึกษาไว้แล้ว<br>
            ๒.&nbsp;&nbsp;	<input type="text" value="<?= $result['c_name'] ?>" data-onload="set_size($(this),200)" style="margin-top: 5px;"> จะต้องแจ้งให้มหาวิทยาลัยธุรกิจบัณฑิตทราบ  ไม่น้อยกว่า ๑ เดือน ก่อนที่นักศึกษาจะไปปฏิบัติงานสหกิจศึกษา  กรณีที่นักศึกษาสหกิจศึกษาไม่ผ่านการพิจารณคุณสมบัติ <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; เข้าปฏิบัติงาน <br>
            ๓.&nbsp;&nbsp;<input type="text"  value="<?= $result['c_name'] ?>" data-onload="set_size($(this),200)" style="margin-top: 5px;"> อาจจัดให้มีกรสัมภาษณ์นักศึกษาล่วงหน้าไม่น้อยกว่า ๑ ภาคการศึกษา หรือตามความเหมาะสมเพื่อการได้นักศึกษาที่มีคุณสมบัติตรงกับความต้องการและสามารถปฏิบัติงานที่ เป็นประโยชน์ต่อหน่วยงานได้จริงและนักศึกษาจะได้มีการเตรียมความพร้อมของตนเองก่อนออก <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ปฏิบัติงานจริง <br>

            <br><br><br>
            <input type="hidden" name="cid" value="<?= $result['cid'] ?>">
            <input type="hidden" name="date_mou" value="<?php echo thaidate('วันที่ j เดือน F  Y '); ?> ">
            <input type="hidden" name="time_mou" value="<?php echo thaidate('เวลา H:i:s'); ?> ">
            <input type="submit" value="ยอมรับเงื่อนไข" class="btn">
</form>

        </div>
    <script>
        function set_size(input, width) {
            input.css("width", width + "px");
            //alert(width);
        }

        $('[data-onload]').each(function () {
            eval($(this).data('onload'));
        });
    </script>
