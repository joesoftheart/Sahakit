<?php
require_once('mpdf/mpdf.php');
ob_start();

?>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8">


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html>
<head>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8">
</head>
<body>


                <table width="100%" border="0" style="font-size: 0.8em;font-weight: 100;" >
                    <tr>
                        <td width="40%" height="200" align="right" ><img src="image/logo.jpg" style="width: 100px;" /></td>16
                        <td width="60%" height="200" align="left" style="padding-left: 50px;padding-top:20px;line-height: 50px;"  >
                            <table border="0" cellpadding="5">
                                <tr>
                                    <td>เขียนที่ วิทยาลัยเทคโนโลยีวิบูลย์บริหารธุรกิจ</td>
                                </tr>
                                <tr>
                                    <td>เลขที่ 2 ถนนเพชรเกษม ซอยเพชรเกษม 18</td>
                                </tr>
                                <tr>
                                    <td>แขวงวัดท่าพระ เขตบางกอกใหญ่ กทม.10600</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" width="100%" align="right" style="padding-right: 100px;" >
                            <table border="0" >
                                <tr>
                                    <td>วันที่</td>
                                    <td align="center" style="border-bottom: 1px dotted #000;"  width="100" ><?PHP echo $date[0] ?></td>
                                    <td>เดือน</td>
                                    <td align="center" style="border-bottom: 1px dotted #000;"  width="120" ><?PHP echo $date[1] ?></td>
                                    <td>. พ.ศ.</td>
                                    <td align="center" style="border-bottom: 1px dotted #000;"  width="70" ><?PHP echo $date[2] ?></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" width="100%" >
                            <table border="0" cellpadding="3" width="100%;" >
                                <tr>
                                    <td colspan="2" style="padding-left: 50px;" >สัญญาฉบับนี้ทำขึ้นระหว่างวิทยาลัยเทคโนโลยีวิบูลย์บริหารธุรกิจ ท่าพระ (ต่อไปนี้จะเรียกว่า “วิทยาลัยฯ”)</td>
                                </tr>
                                <tr>
                                    <td colspan="2" >เจ้าของสถานที่ตั้งอยู่เลขที่ 202 ถนนเพชรเกษมซอย 18 แขวงวัดท่าพระ เขตบางกอกใหญ่ จังหวัดกรุงเทพฯ 10600</td>
                                </tr>
                                <tr>
                                    <td>กับ (ต่อไปนี้เรียกว่า “ผู้ใช้สถานที่”) ชื่อ-นามสกุล</td>
                                    <td style="border-bottom: 1px dotted #000;width:350px;" align="center"  ><?PHP echo $result["bill_name"]; ?></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr><td colspan="2" width="100%" >
                        <table border="0" cellpadding="3" width="100%" >
                            <tr>
                                <td style="width:50px" >อยู่บ้านเลขที่</td>
                                <td style="width:250px;border-bottom: 1px dotted #000;" align="center" ><?PHP echo $result["bill_address"]; ?></td>
                                <td style="width:50px"  >เบอร์โทรศัพท์</td>
                                <td  style="border-bottom: 1px dotted #000;width:210px" align="center" ><?PHP echo $result["bill_tel"]; ?></td>
                            </tr>
                        </table>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="width:500px;" >
                            <table border="0" cellpadding="10" width="100%;" >
                                <tr>
                                    <td  style="width:700px;" > &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1.   ผู้ใช้สถานที่ต้องประกอบอาหารในสถานที่ ที่ทางวิทยาลัยฯ กำหนด หรือประกอบอาหารมาเสร็จแล้วนอก<br><br>บริเวณวิทยาลัยฯ</td>
                                </tr>
                                <tr>
                                    <td  style="width:700px;" > &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 2.   ผู้ใช้สถานที่ จำจัดพนักงานบริการเพื่อดำเนินการจำหน่าย อาหารทุกวันที่ วิทยาลัยฯ เปิดทำการเรียนการ<br><br>สอน พร้อมทั้งจัดทำความสะอาดสถานประกอบการทุกพื้นที่ของโรงอาหาร เมื่อเสร็จการจำหน่ายอาหารทุกวัน</td>
                                </tr>
                                <tr>
                                    <td  style="width:700px;" > &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 3.   ผู้ใช้สถานที่จะต้องจัดหาอุปกรณ์ ภาชนะต่างๆ สำหรับวางอาหารที่เหมาะสม และถูกหลักโภชนาการ</td>
                                </tr>
                                <tr>
                                    <td  style="width:700px;" > &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 4.   ผู้ใช้สถานที่จะต้องถือเป็นนโยบายหลักในการจำหน่ายอาหาร และเครื่องดื่มทุกชนิด จะต้องมีคุณภาพ ที่ดี<br><br>และเน้นที่ความสะอาดในการประกอบอาหารตามหลักสุขาภิบาล และอนามัยทุกครั้ง โดยเฉพาะนักเรียน นักศึกษา รวม<br><br> ถึงบุคลากรภายในวิทยาลัยฯ</td>
                                </tr>
                                <tr>
                                    <td  style="width:700px;" > &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 5.   ผู้ใช้สถานที่ต้องให้ความร่วมมือในการปฏิบัติตามนโยบายการควบคุมการใช้ และการบริการโรงอาหารซึ่งจะมี<br><br>คณะกรรมการครู ฝ่ายกิจการนักเรียน-นักศึกษา และผู้ดูแล เป็นผู้กำหนดนโยบายการควบคุมการใช้ และบริการเกี่ยวกับ<br><br>โรงอาหาร เพื่อส่งเสริม และรักษาวินัย และความประพฤติของนักเรียนนักศึกษาอย่างเคร่งครัด</td>
                                </tr>
                                <tr>
                                    <td  style="width:700px;" > &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 6.  ผู้ใช้สถานที่จะต้องให้พนักงานขาย แต่งกายเรียบร้อย สุภาพ ต้องแต่งกายที่โรงเรียนกำหนดในการจำหน่าย<br><br>อาหาร เช่น ใส่ผ้ากันเปื้อน สวมหมวก เป็นต้น</td>
                                </tr>
                                <tr>
                                    <td  style="width:700px;" > &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 7.   ผู้ใช้สถานที่ ไม่สามารถต่อเติม หรือขายอาหารเกินพื้นที่ ที่ได้จัดเตรียมไว้ให้ ก่อนได้รับอนุญาต</td>
                                </tr>
                                <tr>
                                    <td  style="width:700px;" > &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 8.  กรุณาระบุ รายการอาหารที่ผู้ใช้สถานที่ต้องการจำหน่าย</td>
                                </tr>
                                <tr>
                                    <td   >
                                        <table>
                                            <tr>
                                                <td style="width:600px;border-bottom: 1px dotted #000;" align="center" ><?PHP echo $result["bill_list_food"]; ?></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td  style="width:700px;" >และ ห้ามเปลี่ยนแปลงรายการอาหาร และเครื่องดื่ม หรือเพิ่มเติมรายการอาหารก่อนได้รับอนุญาต</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <table border="0"  style="margin-top: 500px;font-size: 0.8em;width: 700px;"  >
                    <tr>
                        <td colspan="5" style="width:100%;" >ผู้ใช้สถานที่มีความประสงค์ขอทำสัญญาเพื่อใช้สถานที่จำหน่ายอาหารเป็นระยะเวลา 1 ปี โดยจ่ายค่าบำรุงวิทยาลัยฯ </td>
                    </tr>
                </table>
                    <table border="0"  style="font-size: 0.8em;width: 600px;margin-top: 5px;"  >
                    <tr>
                        <td style="width:5px;" >ปีละ</td>
                        <td style="width:130px;border-bottom: 1px dotted #000;" align="center" ><?PHP echo $result["bill_money"]; ?></td>
                        <td style="width:200px;">บาท และค่าใช้สถานที่รายเดือน เดือนละ</td>
                        <td style="width:130px;border-bottom: 1px dotted #000;" align="center" ><?PHP echo $result["bill_moneymonth"]; ?></td>
                        <td style="width:10px;">บาทโดยใน</td>
                    </tr>
                    </table>
                <table border="0"  style="font-size: 0.8em;width: 600px;margin-top: 5px;"   >
                    <tr>
                        <td style="width:100%;" colspan="5" >วันทำสัญญาผู้ใช้สถานที่จะต้องชำระ ค่าใช้สถานที่รายเดือนล่วงหน้า ให้ทางวิทยาลัยฯ เป็นจำนวน 1 เดือน เป็นเงิน</td>
                    </tr>
                    <tr>
                </table>
                <table border="0"  style="font-size: 0.8em;width: 600px;margin-top: 5px;" >
                    <tr>
                        <td style="width:30%;border-bottom: 1px dotted #000;" align="center" ><?PHP echo $result["bill_moneyall"]; ?></td>
                        <td colspan="4" style="width:80%" >บาท การทำสัญญานี้จะทำปีต่อปี โดยสัญญาจะเริ่มต้นเมื่อ วันที่ </td>
                    </tr>
                </table>
                <table border="0"  style="font-size: 0.8em;width: 600px;margin-top: 5px;" >
                    <tr>
                        <td style="width:30%;border-bottom: 1px dotted #000;" align="center" ><?PHP echo $result["bill_date_start"]; ?></td>
                        <td style="width:25%;" >และสัญญาจะสิ้นสุดเมื่อวันที่</td>
                        <td style="width:20%;border-bottom: 1px dotted #000;" align="center" ><?PHP echo $result["bill_date_end"]; ?></td>
                        <td  style="width:25%;"  > เป็นต้นไป หากผู้ใช้สถานที่</td>
                    </tr>
                </table>
                <table border="0"  style="font-size: 0.8em;width: 700px;" cellpadding="10" >
                    <tr>
                        <td style="width:100%;"  >ยังไม่ได้มีการชำระค่าใช้สถานที่ หรือยังชำระไม่ครบถ้วนจะไม่สามารถจำหน่ายอาหารภายในเดือนนั้นๆ ได้ จนกว่าจะมี</td>
                    </tr>
                    <tr>
                        <td style="width:100%;"  >การติดต่อขอชำระจนครบ กำหนดชำระค่าใช้สถานที่ ในวันที่ 1-3 ของทุกเดือน หากเกินกำหนดวันชำระค่าใช้สถานที่ ผู้</td>
                    </tr>
                    <tr>
                        <td style="width:100%;"  >ใช้สถานที่จะต้องถูกปรับเป็นจำนวนเงินวันละ 100 บาท</td>
                    </tr>
                    <tr>
                        <td style="width:100%;"  >10.  ในระหว่างปีที่ทำสัญญา ถ้าผู้ใช้สถานที่ปฏิบัติผิดระเบียบ และเงื่อนไขของทางวิทยาลัยฯ ทางวิทยาลัยฯ</td>
                    </tr>
                    <tr>
                        <td style="width:100%;"  >สามารถบอกเลิกสัญญาได้ทันที และผู้ใช้สถานที่จะต้องเก็บทรัพย์สินออกภายใน 7 วัน</td>
                    </tr>
                    <tr>
                        <td style="width:100%;"  >11. ในกรณีที่ผู้ใช้สถานที่ ไม่สามารถเปิดร้านจำหน่ายอาหารได้ตามปกติ หรือหยุดติดต่อกันตั้งแต่ 2 วันผู้ใช้สถานที่จะ</td>
                    </tr>
                    <tr>
                        <td style="width:100%;"  >ต้องแจ้งให้ทางวิทยาลัยฯ ทราบล่วงหน้า</td>
                    </tr>
                    <tr>
                        <td style="width:100%;"  >12. ผู้ใช้สถานที่ห้ามนำสิทธิการใช้สถานที่ไปให้ผู้อื่นเช่าช่วงต่อ เพื่อทำการจำหน่ายอาหาร หากทางวิทยาลัยฯ พบว่าผู้ใช้</td>
                    </tr>
                    <tr>
                        <td style="width:100%;"  >สถานที่ได้นำสิทธิไปให้ผู้อื่นผู้ใดเช่าช่วงต่อ ทางวิทยาลัยฯ จะยึดเงินประกัน เงินมัดจำ หรือเงินที่ผู้ใช้สถานที่ได้ชำระล่วง</td>
                    </tr>
                    <tr>
                        <td style="width:100%;"  >หน้าทั้งหมด และทางวิทยาลัยฯ จะทำการยกเลิกสัญญาการจำหน่ายอาหารทันที</td>
                    </tr>
                    <tr>
                        <td style="width:100%;"  >13. ในกรณีที่วิทยาลัยฯ เปิด มีการเรียนการสอนตามปกติ หากร้านค้าไม่มาจำหน่ายอาหารในเดือนนั้น ร้านค้าจะต้อง</td>
                    </tr>
                    <tr>
                        <td style="width:100%;"  >ชำระค่าใช้สถานที่ในเดือนนั้น เป็นเงินจำนวนครึ่งนึงของค่าใช้สถานที่รายเดือน สัญญาฉบับนี้ถูกทำขึ้น 2 ฉบับ และในวัน</td>
                    </tr>
                    <tr>
                        <td style="width:100%;"  >ที่ทำสัญญามีข้อตกลงครบถ้วน ตรงกัน ทั้งสองฝ่ายได้อ่าน และเข้าใจข้อความตรงกันโดยตลอด และสามารถปฏิบัติได้ จึง</td>
                    </tr>
                    <tr>
                        <td style="width:100%;"  >ลงลายมือชื่อไว้เพื่อเป็นหลักฐานทั้งสองฝ่าย</td>
                    </tr>
                    <tr>
                </table>
                <table style="width: 600px;font-size: 0.8em" border="0" >
                    <tr>
                        <td style="width:10px;">ลงชื่อ</td>
                        <td style="border-bottom: 1px dotted #000;" ></td>
                        <td style="width:200px;" ></td>
                        <td style="width:10px;" >ลงชื่อ</td>
                        <td style="border-bottom: 1px dotted #000;" ></td>
                    </tr>
                </table>
                    <table style="width: 600px;font-size: 0.8em" border="0" >
                    <tr>
                        <td colspan="2" align="right" style="width:1px;">(</td>
                        <td colspan="2" style="width:150px;border-bottom: 1px dotted #000;" align="center" ><?PHP echo $result["bill_approve_name"]; ?></td>
                        <td align="left" colspan="2" style="width:1px;">)</td>
                        <td style="width:200px;" ></td>
                        <td colspan="2" align="right" style="width:1px;">(</td>
                        <td colspan="2" style="width:150px;border-bottom: 1px dotted #000;" align="center" ><?PHP echo $result["bill_request_name"]; ?></td>
                        <td align="left" colspan="2" style="width:1px;">)</td>
                    </tr>
                    </table>
                        <table style="width: 600px;font-size: 0.8em" border="0" >
                    <tr>
                        <td align="center" colspan="2" style="width:10px;">ผู้อนุญาตให้ใช้สถานที่</td>
                        <td style="width:200px;" ></td>
                        <td align="center" colspan="2" style="width:10px;" >ผู้ขอใช้สถานที่</td>
                    </tr>
                </table>


</body>
</html>

<?Php
$html = ob_get_contents();
ob_end_clean();
$pdf = new mPDF('th', 'A4', '0', 'THSarabunPSK');
$pdf->SetAutoFont();
$pdf->SetDisplayMode('fullpage');
$stylesheet = file_get_contents('print.css');
$pdf->WriteHTML($stylesheet,1);	// The parameter 1 tells that this is css/style only and no body/html/text
$pdf->WriteHTML($html, 2);
$pdf->Output();
?>     
