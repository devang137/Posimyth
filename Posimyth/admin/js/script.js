(function($) {

$(document).ready(function(){
    $("#addrow").click(function () {
        if ($("#fname").val() == ""){
            alert("Enter FirstName");
            return false;
        }else if($("#lname").val() == ""){
            alert("Enter LastName");
            return false;
        }else if($("#email").val() == ""){
            alert("Enter Email");
            return false;
        }else if($("#num").val() == ""){
            alert("Enter Phone Number");
            return false;
        }

        var fname = $("#fname").val();
        var lname = $("#lname").val();
        var email = $("#email").val().toLowerCase();
        var number = $("#num").val();

        jQuery.ajax({
            type : "post",
            dataType : "json",
            url : MyAjax.ajaxurl,
            data : {action: "data_submit", firstname : fname, lastname: lname,em: email,numb: number},
            async:false,
            success: function(response) {
                alert("Data saved successfully");
                setTimeout(function(){ 
                    location.reload();
                }, 1000);
            }
         });
    });

// Delete Record
    $("#delete").click(function () {
        if(confirm("Are you sure you want to delete this")){
            var id = [];
            $(':checkbox:checked').each(function(i){
                id[i]=$(this).val();
            });
            debugger
            jQuery.ajax({
                type : "post",
                dataType : "json",
                url : MyAjax.ajaxurl,
                data : {action: "delete_row", idd:id},
                async:false,
                success: function(data) {
                        alert("Record Delete successfully");
                        location.reload();
                }
             });
        }else{
            return false;
        }      
    });

// Update record
    var buttons = $(".Edit_button");
    for(var i=0; i<buttons.length; i++){
        buttons[i].addEventListener("click", function(){ 
            debugger;
            $('.tr'+ $(this).val()).show();

                var bs = $(".save");
                for(var i=0; i<bs.length; i++){
                    bs[i].addEventListener("click", function(){ 
                        
                        var update_id = $(this).val();
                        var update_fname = $("#fname"+ update_id).val();
                        var update_lname = $("#last"+ update_id).val();
                        var update_email = $("#email"+ update_id).val();
                        var update_number= $("#number"+ update_id).val();

                           jQuery.ajax({
                            type : "post",
                            dataType : "json",
                            url : MyAjax.ajaxurl,
                            data : {action: "update_data", up_fname : update_fname, up_lname: update_lname,up_email: update_email,up_number: update_number,up_id:update_id},
                            async:false,
                            success: function(response) {
                                alert("Data update successfully");
                                setTimeout(function(){ 
                                    location.reload();
                                }, 1000);
                            }
                            });

                    });
                }

        });
    }











});

})(jQuery);
