

$(document).ready(function(){
        $("#post-form").submit(function (e){
            event.preventDefault();
            var post = $("form").serialize();
            console.log(post);
                $.ajax({
                    url: "../api/Post/insert-post.php",
                    method: "POST",
                    data: post,
                    dataType: "text",
                    success: function(response){
                      var data = $.parseJSON(response);
                         //console.log(response.json());
                         console.log(response);

                         window.location.href=`index.php?uid=${data.uid}`
                    }

                });

        });
});
