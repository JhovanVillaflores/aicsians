function delete_post(post_id,user_id){
  console.log(post_id,user_id);
                  $.ajax({
                      url: "../api/Post/delete-post.php",
                      method: "GET",
                      data: {post_id:post_id},
                      dataType: "text",
                      success: function(response){
                           //console.log(response.json());
                           console.log(response);

                          read_user_post(user_id)
                      }

                  });
 window.location.href=`profile?uid=${user_id}`;

}
function read_user_post(user_id){
  fetch(`../api/Post/read-user-post.php?uid=`+user_id).then( function(response){
      return response.json();
  }).then(function (data){
    console.log(data);
    if(data.no_post==0){
      document.getElementById('profile-post').innerHTML = `<div class='row justify-content-center'><span><strong>${data.message}</strong></span></div>`
    }else{
        let post= '';
        let image_path = '';
        for (var i = 0; i < data.data.length; i++) {
          if(data.data[i].user_data['image_path'] == "" && data.data[i].user_data['sex'] == "Female"){
            image_path = "../assets/img/default_female.png";
          }else if (data.data[i].user_data['image_path'] == "" && data.data[i].user_data['sex'] == "Male") {
           image_path = "../assets/img/default_male.png";
          }else{
          image_path = data.data[i].user_data['image_path'];
          }
          post += `
          <div class='card p-1 mb-3 list-group-item list-group-item-light'>
          <!--<img src='../assets/img/meeting.jpg' height='200px' alt=''>-->
          <div class='card-body'>
            <div class='row align-items-center p-2'>
                <div class='col-auto'>
                    <img alt='Image placeholder' src='${image_path}' width='50' class='avatar avatar-xl rounded-circle'>
                </div>
                <div class='col ml-n3 ml-md-n2'>
                    <h5 class='mb-0'>${data.data[i].user_data['first_name']} ${data.data[i].user_data['last_name']}</h5>
                    <span class='text-muted d-block'><small class='text-muted'>${data.data[i].post_date} </small><small> <a id='delete_post' onclick='delete_post(${data.data[i].id},${data.data[i].user_data['id']})' class='text-danger'>Delete</a></small></span>
                      <span class='text-muted d-block'></span>
                </div>
            </div>
            <div class='row justify-content-center p-2'>
                <div class="col ml-n3 ml-md-n2">
                    <div class='ml-n3 ml-md-n2 p-2'>
                        <p class='ml-5'>${data.data[i].post_desc}</p>
                    </div>
                </div>
                <hr>
            </div>
          </div>
          </div>
            `;
        }
        document.getElementById('profile-post').innerHTML = post;
      }
  });
}

function readPost(){
  fetch(`../api/Post/read-post.php`).then( function(response){
      return response.json();
  }).then(function (data){
    console.log(data);

    if(data.no_post==0){
      document.getElementById('post').innerHTML = `<div class='row justify-content-center'><span><strong>${data.message}</strong></span></div>`
    }else{
        let post= '';
        for (var i = 0; i < data.data.length; i++) {
          if(data.data[i].image_path == "" && data.data[i].sex == "Female"){
            var image_path = "../assets/img/default_female.png";
          }else if (data.data[i].image_path == "" && data.data[i].sex == "Male") {
            var image_path = "../assets/img/default_male.png";
          }else{
            var image_path = data.data[i].image_path
          }
          
          post += `
            <div class='card p-1 mb-3 list-group-item list-group-item-light'>
            <!--<img src='../assets/img/meeting.jpg' height='200px' alt=''>-->
            <div class='card-body'>
              <div class='row align-items-center p-2'>
                  <div class='col-auto'>
                      <img alt='Image placeholder' src='${image_path}' width='50' class='avatar avatar-xl rounded-circle'>
                  </div>
                  <div class='col ml-n3 ml-md-n2'>
                      <a class='mb-0' href=''><strong>${data.data[i].first_name} ${data.data[i].last_name}</strong></a>
                      <span class='text-muted d-block'><small class='text-muted'>${data.data[i].post_date}</small></span>
                  </div>
              </div>
              <div class='row justify-content-center p-2'>
                  <div class="col ml-n3 ml-md-n2">
                      <div class='ml-n3 ml-md-n2 p-2'>
                          <p class='ml-5'>${data.data[i].fld_post_desc}</p>
                      </div>
                  </div>
                  <hr>
              </div>
            </div>
            </div>`;
        }
        document.getElementById('home-post').innerHTML = post;
    }
  });
}
