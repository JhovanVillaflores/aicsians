$(document).ready( function(){
    $("#update-bio").click( function(e){
      e.preventDefault();
      var bio = $("#bio-textarea").val();
      var user_id = $('#user-id-bio').val();
      $.ajax({
        url: "../api/User/update-bio.php",
        method: "POST",
        data: {bio:bio,user_id:user_id},
        dataType: "text",
        success: function(response){
          console.log(response);

          window.location.href='profile?uid='+user_id;
       },
         error: function(error){
          console.log(error);
       }
      });
    });

    $("#update-profile").click( function(e){
      e.preventDefault();
      var username =$('#username-input').val();
      var email = $('#email-address-input').val();
      var track = $('#track-input').val();
      var strand = $('#strand-input').val();
      var block = $('#block-input').val();
      var contact_no = $('#contact-no-input').val();
      var user_id = $('#user_id').val();
      var userData = {
        username:username,
        email:email,
        track:track,
        strand:strand,
        block:block,
        contact_no:contact_no,
        user_id:user_id
      }
      console.log(userData);
      $.ajax({
        url: "../api/User/update-user.php",
        method: "POST",
        data: userData,
        dataType: "text",
        success: function(response){
          console.log(response);
          window.location.href='profile?uid='+user_id;
       },
         error: function(error){
          console.log(error);
       }
      });
    });
});

function read_profile(user_id){
  fetch(`../api/User/read-single-user.php?uid=${user_id}`).then( function(response){
    return response.json();
  }).then( function(data){
    console.log(data);
    if(data.image_path == "" && data.sex == "Female"){
      var image_path = "../assets/img/default_female.png";
    }else if (data.image_path == "" && data.sex == "Male") {
      var image_path = "../assets/img/default_male.png";
    }else{
      var image_path = data.image_path
    }

    document.getElementById('profile_image').innerHTML = `<span>  <img alt='Image placeholder' src='${image_path}' width='120' class='avatar avatar-xl rounded-circle'></span>`;
    document.getElementById('name').innerHTML = `<span>${data.first_name} ${data.middle_name} ${data.last_name}</span>`
    document.getElementById('username-label').innerHTML = `<span>  @${data.username}</span>`;
    document.getElementById('track-label').innerHTML = `<span><strong>Track :</strong> ${data.track_id}</span>`;
    document.getElementById('strand-label').innerHTML = `<span><strong>Strand :</strong> ${data.strand_id}</span>`;
    document.getElementById('block-label').innerHTML = `<span><strong>Block :</strong> ${data.block}</span>`;
    document.getElementById('bio-textarea').value = data.bio;
    document.getElementById('bio-label').innerHTML = `<span>${data.bio}</span>`;
    document.getElementById('student-no-label').innerHTML = `<span><strong>Student Number :</strong> ${data.student_no}</span>`;

    //username
    document.getElementById('username-message-input').value = '@'+data.username;

    document.getElementById('username-input').value = data.username;
    document.getElementById('email-address-input').value = data.email;
    document.getElementById('track-input').value = data.track_id;
    document.getElementById('strand-input').value = data.strand_id;
    document.getElementById('block-input').value = data.block;
    document.getElementById('contact-no-input').value = data.contact_no;
    document.getElementById('user_id').value = data.id;
    //
//
  });
}

function getTrack(track_id){
  var track= "";
  if(track_id=="1"){
    track == "Academic Track";
  }else if(track_id=="2"){
    track == "Technical Vocational Track";
  }
  return track;
}

function getStrand(strand_id){
  var strand= "";
  if(strand_id=="1"){
    strand == "Accountancy and Business Management";
  }else if(strand_id=="2"){
    strand == "General Academic Strand";
  }else if(strand_id=="4"){
    strand == "HUMMS";
  }else if(strand_id=="5"){
    strand == "Informations and Communications Technology";
  }else if(strand_id=="4"){
    strand == "Industrial Arts";
  }

  return strand;
}
