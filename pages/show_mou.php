<?php ob_start();
session_start();
include '../php/config.php';
require_once('../mpdf/mpdf.php');

$sql = "SELECT * FROM resume";
$query = mysqli_query($link, $sql);
$result = mysqli_fetch_array($query);
?>


<html>
<head>

    <meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8">
    <link rel="stylesheet" href="../vendor/font-awesome/css/font-awesome.css">
    <script type="text/javascript" src="../vendor/jquery/jquery.js"></script>
</head>
<body>
<table width="100%" border="0" style="font-size: 0.8em;font-weight: 100;">
    <tr>
        <td width="100%" align="center">
            <table border="0">
                <tr>
                    <td>
                        ที่อยู่ตามทะเบียนบ้าน บ้านเลขที่ 46
                    </td>
                    <td width="10">
                        หมู่
                    </td>
                    <td width="5">
                        1
                    </td>
                    <td>
                        ตำบล/แขวง ลาดกระทิง
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td  width="100%" align="center">
            <table border="0" >
                <tr>
                    <td >ตรอก/ซอย มะขามยาว</td>
                    <td > ถนน มะขามป้อม</td>
                    <td> อำเภอ/เขต สนามชัยเขต</td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td width="100%" align="center">
            <table border="0">
                <tr>
                    <td > จังหวัด ฉะเชิงเทรา</td>
                    <td > รหัสไปรษณีย์ 24160</td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td width="100%" align="center">
            <table border="0">
                <tr>
                    <td>
                        อีเมล์ : pond_pond15@hotmai.com
                    </td>
                </tr>
                <tr>
                    <td >
                        โทรศัพท์มือถือ : 0909869992
                    </td>
                </tr>
            </table>
        </td>
    </tr>

<tr>
    <td>
        <table border="0" width="60%">
            <tr>
                <th style="padding-left: -10px;padding-top: 40px">
                    <b> ข้อมูลส่วนตัว </b>
                </th>
            </tr>
            <tr>
                <td style="padding-left: 110px"><b>- วัน/เดือน/ปีเกิด </b></td>
                <td style="padding-left: 20px"><b>:</b> 15 เมษายน พ.ศ. 2537</td>
            </tr>
            <tr>
                <td style="padding-left: 110px"><b>- อายุ </b></td>
                <td style="padding-left: 20px"><b>:</b> 15  ปีบริบูรณ์</td>
            </tr>
            <tr>
                <td style="padding-left: 110px"><b>- สถานภาพทางการสมรส </b></td>
                <td style="padding-left: 20px"><b>: </b>โสต</td>
            </tr>
            <tr>
                <td style="padding-left: 110px"><b>- สถานะทางทหาร </b></td>
                <td style="padding-left: 20px"><b>: </b>ผ่านการเกณฑ์ทหารแล้ว</td>
            </tr>
            <tr>
                <td style="padding-left: 110px"><b>- น้ำหนัก </b></td>
                <td style="padding-left: 20px"><b>: </b>128 <b>กก.</b></td>
            </tr>
            <tr>
                <td style="padding-left: 110px"><b> - ส่วนสูง </b></td>
                <td style="padding-left: 20px"><b>: </b>168 <b>ซม.</b></td>
            </tr>
        </table>
    </td>
</tr>
<tr>
    <td>
        <table>
            <tr>
                <td style="padding-left: 80px"><b>จุดมุ่งหมายในการทำงาน</b></td>
            </tr>
            <tr>
                <td style="padding-left: 80px">มีความประสงค์จะใช้ความสามารถทางด้านการเขียนโปรแกรม
                    ในการพัฒนาซอฟต์แวร์ให้มีประสิทธิภาพด้วย ความกระตือรืนร้น และรับผิดชอบงานเป็นอย่างดี
                    เพื่อสร้างผลงานของบริษัทให้มีคุณภาพงานมากที่สุด
                </td>
            </tr>

            <tr>
                <td style="padding-left: 80px"><b>ประวัติการศึกษา</b></td>
            </tr>
            <tr>
                <td style="padding-left: 100px"><b> จบระดับชั้นประถามศึกษา จากโรงเรียนบ้านสุ่งเจริญ </b></td>
            </tr>
            <tr>
                <td style="padding-left: 80px"> อ.สนามชัยเขต จ.ฉะเชิงเทรา ด้วยเกรดเฉลี่ย 2.89</td>
            </tr>
            <tr>
                <td style="padding-left: 100px"><b> จบระดับชั้นมัธยมศึกษา จากโรงเรียนสนามชัยเขต </b></td>
            </tr>
            <tr>
                <td style="padding-left: 80px"> อ.สนามชัยเขต จ.ฉะเชิงเทรา มัธยามศึกษา สายศิลป์ – คำนวน ด้วยเกรดเฉลี่ย
                    3.37
                </td>
            </tr>
            <tr>
                <td style="padding-left: 100px"><b> กำลังศึกษาอยู่ระดับปริญญาตรี มหาวิทยาลัยราชภัฎสวนสุนันทา</b></td>
            </tr>
            <tr>
                <td style="padding-left: 80px"> คณะวิทยาศาตร์และเทคโนโลยี สาขาวิทยาการคอมพิวเตอร์ <br>
                    แขวงดุสิต เขตดุสิต กรุงเทพมหานคร ด้วยเกรดเฉลี่ย 3.45
                </td>
            </tr>
            <tr>
                <td style="padding-left: 100px"><b> ประสบการณ์ทางด้านการศึกษา </b></td>
            </tr>
            <tr>
                <td style="padding-left: 120px"> 2555 - ปัจจุบัน</td>
            </tr>

            <tr>
                <td style="padding-left: 100px"><b> นักศึกษาสาขาวิทยาการคอมพิวเตอร์</b></td>
            </tr>
            <tr>
                <td style="padding-left: 80px">รายละเอียดการศึกษา :ศึกษาเกี่ยวกับการเขียนโปรแกรม
                    ทั้งแอพลิเคชันและเว็บไซต์รวมถึงการจัดการ <br>
                    ออกแบบฐานข้อมูล <br>
                    - เว็บ E-Commerce <br>
                    - แอพพลิเคชั่นนำทางและแนะนำพื้นที่อาคารภายในมหาวิทยลัยราชภัฏสวนสุนันทา <br>
                    - แอพพลิเคชั่นเช็คชื่อนักศึกษาเข้าห้องเรียน Face recognition <br>
                    - เว็บ Decision Support system(ระบบเลือกพันธุ์ข้าวที่เหมาะสม) <br>
                    - เว็บ Data mining (ระบบวิเคราะห์ราคาข้าว)<br>
                    แข่งขันการแข่งขันพัฒนาโปรแกรมคอมพิวเตอร์แห่งประเทศไทย ครั้งที่ 18 : NSC 2016 <br>
                    - แอพพลิเคชั่นมาเรียนป่าว(เข้ารอบชิงชนะเลิศ) <br>
                    ฝึกงาน ศูนย์พันธุวิศวกรรมและเทคโนโลยีชีวภาพแห่งชาติ <br>
                    - แอพพลิเคชั่นวิเคราะห์ผลเลือดของผู้ป่วยโรคธาลัซซีเมีย <br>
                </td>
            </tr>

            <tr>
                <td style="padding-left: 80px">
                    <b> ทักษะและความสามารถพิเศษอื่น ๆ </b>
                </td>
            </tr>
            <tr>
                <td style="padding-left: 110px">
                    • มีสามารถใช้โปรแกรมคอมพิวเตอร์ต่างๆ Microsoft Office (Word , PowerPoint), <br> Adobe Dreamweaver ,
                    Adobe Photoshop, FileZilla, Android Studio, NetBeans , SQLyog<br>
                    • มีความสามารถในการเขียนโปรแกรมคอมพิวเตอร์ภาษา java, php, sql, html, xml<br>
                    • มีประสบการณ์ในการเขียน Application, Website<br>
                    • มีความรับผิดชอบ และมีมนุษยสัมพันธ์ดี มีความรับผิดชอบในงานที่ได้รับมอบหมาย <br>
                </td>
            </tr>

        </table>
    </td>
</tr>
</table>
<?php
$html = ob_get_contents();
ob_end_clean();
$pdf = new mPDF('th', 'A4', '0', 'THSarabunPSK');
$pdf->SetAutoFont();
$pdf->SetDisplayMode('fullpage');
$stylesheet = file_get_contents('print.css');
$pdf->WriteHTML($stylesheet, 1);    // The parameter 1 tells that this is css/style only and no body/html/text
$pdf->WriteHTML($html, 2);
$pdf->Output();
?>
</body>
</html>
