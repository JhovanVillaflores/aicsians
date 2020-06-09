
$(document).ready(function(){
        $("#signup-form").submit(function (e){
            var pass = $("#pass").val();
            var pass1 = $("#pass1").val();

            var username = $("#username".val();
            var email =$("#email").val();
            var student_no = $("#student_no").val();
            var gender = $("#gender");
            var first_name = $("#first_name").val();
            var middle_name = $("#middle_name").val();
            var last_name = $("#last_name").val();

            if(pass!=pass1){
              document.getElementById('verify').innerHTML = `<span><p class='text-danger'>Password Doesn't Match</p></span>`;
            }else{
              //var contact = $("form").serialize();
              var contact = {
                first_name:first_name,
                middle_name:middle_name,
                last_name:last_name,
                username:username,
                email:email,
                gender:gender,
                student_no:student_no,
                password:pass
              }
              console.log(contact);
                  $.ajax({
                      url: "api/User/register.php",
                      method: "GET",
                      data: contact,
                      dataType: "text",
                      success: function(response){
                        var data = $.parseJSON(response);
                           window.location.href=`index.php`
                      }

                  });
            }



        });
});
