//add new data
function add_user_form(){
    console.log('add_user');
    $.ajax({
        type:"POST",
        url:"../php/process_student.php",
        data:$("#add_user_form").serialize(),
        success:function(data){

            //close modal
            $(".close").trigger("click");

            //show result
            alert(data);

            //reload page
            location.reload();
        }
    });
    return false;
}

//show data for edit
function show_edit_user(sid){
    $.ajax({
        type:"POST",
        url:"../php/process_student.php",
        data:{show_user_id:sid},
        success:function(data){
            $("#edit_form").html(data);
        }
    });
    return false;
}

//edit data
function edit_user_form(){
    $.ajax({
        type:"POST",
        url:"../php/process_student.php",
        data:$("#edit_user_form").serialize(),
        success:function(data){

            //close modal
            $(".close").trigger("click");

            //show result
            alert(data);

            //reload page
            location.reload();
        }
    });
    return false;
}

//delete user
function delete_user(id){
    if(confirm("คุณต้องการลบข้อมูลหรือไม่")){
        $.ajax({
            type:"POST",
            url:"../php/process_student.php",
            data:{delete_user_id:id},
            success:function(data){
                alert(data);
                location.reload();
            }
        });
    }
    return false;
}