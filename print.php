<meta charset="utf-8"/>
<link rel="shortcut icon" href="../img/favicon.ico">
<style>
    @font-face {
        font-family: 'THSarabun';
        src: url('vendor/font-thsarabun/THSarabun.eot');
        src: url('vendor/font-thsarabun/THSarabun.eot?#iefix') format('embedded-opentype'),
        url('vendor/font-thsarabun/THSarabun.woff2') format('woff2');
        font-weight: normal;
        font-style: normal;
    }

    @font-face {
        font-family: 'THSarabunPSK';
        src: url('vendor/font-thsarabun/THSarabunPSK.woff') format('woff'),
        url('vendor/font-thsarabun/THSarabunPSK.ttf') format('truetype'),
        url('vendor/font-thsarabun/THSarabunPSK.svg#THSarabunPSK') format('svg');
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
<link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.css">
<script type="text/javascript" src="vendor/jquery/jquery.js"></script>
<div class="book">
    <div class="page">
        <div class="subpage">

            <br>

            <div>
                สัปดาห์ที่ <input type="text" data-onload="set_size($(this),70)" style="margin-top: 5px;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <font size="5"><b>บันทึกการปฎิบัติประจำวัน</b></font> <br>
                <div style="border: solid 1px">
                    วันที่<input type="text" data-onload="set_size($(this),25)" style="margin-top: 5px;">/
                    <input type="text" data-onload="set_size($(this),35)" style="margin-top: 5px;">/
                    <input type="text" data-onload="set_size($(this),35)" style="margin-top: 5px;">
                    &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เวลาเริ่มปฎิบัติงาน
                    <input type="text" data-onload="set_size($(this),35)" style="margin-top: 5px;">เวลาเลิกปฎิบัติงาน
                    <input type="text" data-onload="set_size($(this),35)" style="margin-top: 5px;"> <br>
                    ลักษณะงานที่ปฎิบัติ<input type="text" data-onload="set_size($(this),500)" style="margin-top: 5px;">


                </div>

            </div>
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


        <div class="btn" align="center" style="margin-bottom: 50px;">
            <span class="fa fa-print" onclick="window.print();" style="font-size: 50px;cursor: pointer;"></span>
        </div>
