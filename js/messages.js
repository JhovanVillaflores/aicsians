$(document).ready( function(){
  $("#create-message-form").submit(function (e){

      e.preventDefault();
      //var post = $("form").serialize();
      var sender_user_id = $("#senderUserId").val();
      var receiver_user_id = $("#receiverUserId").val();
      var message_content = $("#messageContent").val();
      var post = {
        sender_user_id:sender_user_id,
        receiver_user_id:receiver_user_id,
        message_content:message_content
      };
      console.log(post);
      //$.ajax({
        ///     url: "../api/messages/send-messages.php",
          //   method: "POST",
            //  data: post,
              //dataType: "text",
              //success: function(response){
              //var data = $.parseJSON(response);
          //         console.log(response);
          //         window.location.href=`convesation?sender_user_id=${data.sender_user_id}&&receiver_user_id=${data.receiver_user_id}`;
          //    },
        //      error: function(error){
        //        console.log(error);
    //         }
        //  });
  });//$("#message-form").submit
  $("#message-submit").click(function (){
    var fid = $("#fid").val();
    var uid = $("#uid").val();
    var message_content = $("#message_content").val();
    var cid = $("#cid").val();
    var messageData = {
      fid:fid,uid:uid,cid:cid,message_content:message_content
    }
    $.ajax({
      url: "../api/messages/send-messages.php",
      method: "POST",
      data: messageData,
      dataType: "text",
      success: function(response){
        console.log(response);

     },
       error: function(error){
        console.log(error);
     }
    });
    console.log(messageData);
  window.location.href=`conversation?uid=${uid}&&cid=${cid}&&fid=${fid}#bottom`;
  $('#message_content').val('');
    readSingleConversation(uid,cid);
  });
});


function readMessagesList(user_id){
  fetch("../api/messages/read-messages-list.php?uid="+user_id).then( function(response){
    return response.json();
  }).then( function (data){
    console.log(data);
    //message-list
    let msg = '';
    let friend_name = '';
    let last_message = '';
    let fid = '';
    for (var i = 0; i < data.data.length; i++) {
      if(data.data[i].user_1['id']==user_id){
        friend_name=data.data[i].user_2['first_name']+" "+data.data[i].user_2['last_name'];

      }else{
          friend_name=data.data[i].user_1['first_name']+" "+data.data[i].user_1['last_name'];
      }

      if(data.data[i].last_message['sender_user_id']==user_id){
        last_message = "You : "+data.data[i].last_message['message_content'];

      }else if(data.data[i].last_message['receiver_user_id']==user_id){
        last_message= data.data[i].last_message['message_content'];
      }
      if(data.data[i].user_1['id']==user_id){
        fid = data.data[i].user_2['id'];
      }else {
        fid = data.data[i].user_1['id'];
      }

        msg += `<a href='conversation?uid=${user_id}&&cid=${data.data[i].id}&&fid=${fid}#bottom' class='list-group-item list-group-item-action list-group-item-light rounded-0'>
        <div class='media'><img src='https://res.cloudinary.com/mhmd/image/upload/v1564960395/avatar_usae7z.svg' alt='user' width='50' class='rounded-circle'>
          <div class='media-body ml-4'>
            <div class='d-flex align-items-center justify-content-between mb-1'>
              <h6 class='mb-0'>${friend_name}</h6><small class='small font-weight-bold'>${data.data[i].last_message['date']}</small>
            </div>
            <p class='font-italic text-muted mb-0 text-small'>${last_message}</p>
          </div>
        </div>
      </a>`
    }
    document.getElementById('message-list').innerHTML = msg;
  });
}

function readSingleConversation(user_id,conversation_id){
  fetch(`../api/messages/read-single-conversation.php?uid=${user_id}&&cid=${conversation_id}`).then( function(response){
    return response.json();
  }).then( function(data){
    console.log(data);
    let msg = '';
    let friend_name = '';
    for (var i = 0; i < data.data.length; i++) {
      if( data.data[i].sender_user['id']==user_id){
        msg += `<div class='media w-50 ml-auto mb-3'>
          <div class='media-body'>
            <div class='bg-primary rounded py-2 px-3 mb-2'>
              <p class='text-small mb-0 text-white'>${data.data[i].message_content}</p>
            </div>
            <p class='small text-muted'>${data.data[i].date}</p>
          </div>
        </div>`;

      }else{
        friend_name = data.data[i].sender_user['first_name'] +" "+ data.data[i].sender_user['last_name'];
        msg += `<div class='media w-50 mb-3'><img src='https://res.cloudinary.com/mhmd/image/upload/v1564960395/avatar_usae7z.svg' alt='user' width='50' class='rounded-circle'>
          <div class='media-body ml-3'>
            <div class='bg-light rounded py-2 px-3 mb-2'>
              <p class='text-small mb-0 text-muted'>${data.data[i].message_content}</p>
            </div>
            <p class='small text-muted'>${data.data[i].date}</p>
          </div>
        </div>`;
      }
    }
    document.getElementById("friend_name").innerHTML  = friend_name;
    document.getElementById("message-list").innerHTML = msg;
  });
}
