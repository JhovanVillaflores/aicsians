


$(document).ready(function(){
        $("#login_form").submit(function (e){
            event.preventDefault();
            var contact = $("form").serialize();
            console.log(contact);
                $.ajax({
                    url: "api/auth/login.php",
                    method: "POST",
                    data: contact,
                    dataType: "text",
                    success: function(response){
                      var data = $.parseJSON(response);
                         window.location.href=`student/index?uid=${data.data[0].id}`;
                    }

                });
        });
});
