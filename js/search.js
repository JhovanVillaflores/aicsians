$(document).ready( function(){
  $("#search-button").click( function(){
    var uid = $("#uid").val();
    var keyword = $("#search-field").val();
    window.location.href=`search?uid=${uid}&&search_query=${keyword}`;
    read_search(keyword,uid);
  });
});

function read_search(keyword,uid){
  fetch(`../api/search/search-data.php?keyword=${keyword}&&uid=${uid}`).then( function(response){
    return response.json();
  }).then( function(data){
    console.log(data);

    let userlist = '';
    let postlist = '';
      if(data.data['users'].result=='0'){
      }else{
        for (var i = 0; i < data.data['users'].data.length; i++) {
          if(data.data['users'].data[i].id==uid){
            userlist +=`<a href='profile?uid=${uid}' class='border-0 list-group-item list-group-item-action list-group-item-light rounded-0'>
            <div class='media'><img src='https://res.cloudinary.com/mhmd/image/upload/v1564960395/avatar_usae7z.svg' alt='user' width='50' class='rounded-circle'>
              <div class='media-body ml-4'>
                <div class='d-flex align-items-center justify-content-between mb-1'>
                  <h6 class='mb-0'>${data.data['users'].data[i].first_name} ${data.data['users'].data[i].middle_name} ${data.data['users'].data[i].last_name}</h6><strong class='small font-weight-bold'>My Profile</strong>
                </div>
                <p class='font-italic text-muted mb-0 text-small'>@${data.data['users'].data[i].username}</p>
              </div>
            </div>
          </a>`
          }else{
            userlist +=`<a href='check_profile?uid=${uid}&&fid=${data.data['users'].data[i].id}' class='border-0 list-group-item list-group-item-action list-group-item-light rounded-0'>
            <div class='media'><img src='https://res.cloudinary.com/mhmd/image/upload/v1564960395/avatar_usae7z.svg' alt='user' width='50' class='rounded-circle'>
              <div class='media-body ml-4'>
                <div class='d-flex align-items-center justify-content-between mb-1'>
                  <h6 class='mb-0'>${data.data['users'].data[i].first_name} ${data.data['users'].data[i].middle_name} ${data.data['users'].data[i].last_name}</h6>
                </div>
                <p class='font-italic text-muted mb-0 text-small'>@${data.data['users'].data[i].username}</p>
              </div>
            </div>
          </a>`;
          }

          console.log(data.data['users'].data[i].username);
        }
          document.getElementById('searched_users').innerHTML = userlist;
          document.getElementById('users_list_label').innerHTML = 'Users';
      }

      if(data.data['posts'].result=='0'){
      }else{
        for (var i = 0; i < data.data['posts'].data.length; i++) {
          let name = data.data['posts'].data[i].user_data['first_name'] +" "+data.data['posts'].data[i].user_data['last_name'];
          let post =  data.data['posts'].data[i].post_desc;
          console.log(name+" "+post);
          postlist +=`<a href='' class='border-0 list-group-item list-group-item-action list-group-item-light rounded-0'>
          <div class='media'><img src='https://res.cloudinary.com/mhmd/image/upload/v1564960395/avatar_usae7z.svg' alt='user' width='50' class='rounded-circle'>
            <div class='media-body ml-4'>
              <div class='d-flex align-items-center justify-content-between mb-1'>
                <h6 class='mb-0'>${name}</h6>
              </div>
              <p class='font-italic text-muted mb-0 text-small'>${post}</p>
            </div>
          </div>
        </a>`
        }
      document.getElementById('searched_posts').innerHTML = postlist;
       document.getElementById('posts_list_label').innerHTML = 'Posts';
      }
  });

  document.getElementById('searched-keyword').innerHTML = "<br><br>Search For: "+`<i>${keyword}</i>`;
}
