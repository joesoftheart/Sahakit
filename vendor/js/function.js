function datepicker (classinput,classinput2){
    var class_input = "."+classinput;
    var class_input2 = "."+classinput2;
    var d = new Date();
    var toDay = d.getDate() + '-'
        + (d.getMonth() +1) + '-'
        + (d.getFullYear()+543);
    $(class_input).datepicker({
        dateFormat: 'dd-M-yy',
        showOn: 'button',
        yearRange: "-100:+0",
        buttonImage: '../img/calendar.png',
        buttonImageOnly: false,
        dayNamesMin: ['อา', 'จ', 'อ', 'พ', 'พฤ', 'ศ', 'ส'],
        monthNamesShort: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
        changeMonth: true,
        changeYear: true,
        beforeShow:function(){
            if($(this).val()!=""){
                var arrayDate=$(this).val().split("-");
                arrayDate[2]=parseInt(arrayDate[2])-543;
                $(this).val(arrayDate[0]+"-"+arrayDate[1]+"-"+arrayDate[2]);
            }
            setTimeout(function(){
                $.each($(".ui-datepicker-year option"),function(j,k){
                    var textYear=parseInt($(".ui-datepicker-year option").eq(j).val())+543;
                    $(".ui-datepicker-year option").eq(j).text(textYear);
                });
            },50);
        },
        onChangeMonthYear: function(){
            setTimeout(function(){
                $.each($(".ui-datepicker-year option"),function(j,k){
                    var textYear=parseInt($(".ui-datepicker-year option").eq(j).val())+543;
                    $(".ui-datepicker-year option").eq(j).text(textYear);
                });
            },50);
        },
        onClose:function(){
            if($(this).val()!="" && $(this).val()==dateBefore){
                var arrayDate=dateBefore.split("-");
                arrayDate[2]=parseInt(arrayDate[2])+543;
                $(this).val(arrayDate[0]+"-"+arrayDate[1]+"-"+arrayDate[2]);
            }
        },
        onSelect: function(dateText, inst){
            dateBefore=$(this).val();
            var arrayDate=dateText.split("-");
            arrayDate[2]=parseInt(arrayDate[2])+543;
            $(this).val(arrayDate[0]+"-"+arrayDate[1]+"-"+arrayDate[2]);
        }
    });




}
