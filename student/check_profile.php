<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>aicsians</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css?h=e41da809b310378ce0a0544e56854498">
    <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css?h=1585abf9beaf49802b3a80bf813edceb">
    <link rel="stylesheet" href="../assets/fonts/ionicons.min.css?h=1585abf9beaf49802b3a80bf813edceb">
    <link rel="stylesheet" href="../assets/css/styles.min.css?h=4af178028fc3a48a2ed3b70ee58e614e">
<script src="../js/post.js" charset="utf-8"></script>
</head>

<body>
    <?php include('components/menu_nav.php');?>

    <div class="bg-light p-4">
      <div class="container" >
          <div class="row">
              <div class="col-md-7">
                  <div class="card-fluid">
                      <div class="card-body">
                          <div class="row justify-content-center">
                              <div class="col-lg-9">
                                  <div class="row align-items-center p-2">
                                      <div class="col-auto" id="profile_image">

                                      </div>
                                      <div class="col ml-n3 ml-md-n2 m-1">
                                          <h2 class="mb-0" id="name"></h2>
                                          <div class="">
                                              <span><button class="btn btn-link" id="username-label"></button></span>
                                          </div>
                                      </div>
                                  </div>

                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

          <div class="row justify-content-center ">
              <div class="col-md-10 p-3">
                  <div class="card-group">
                      <div class="card m-3 border-light shadow">
                          <div class="card-body ">
                              <h4 class="card-title">Profile</h4>
                              <p id="student-no-label"></p>
                              <hr>
                              <p id="track-label"></p>
                              <hr>
                              <p id="strand-label"></p>
                              <hr>
                              <p id="block-label"></p>
                              <hr>
                              <!-- Button trigger modal -->
                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#updateProfileModal">
                                Other Infomations
                              </button>

                              <!-- Modal -->
                              <div class="modal fade" id="updateProfileModal" tabindex="-1" role="dialog" aria-labelledby="updateProfileModalTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="updateProfileModalTitle">Other Infomations</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <div class="" id="update-form">
                                        <div class="form-group">
                                          <label for="email-address-inputs">Email Address</label>
                                          <input type="email" class="form-control" id="email-address-input" placeholder="Enter Email Address" disabled>
                                        </div>
                                        <div class="form-group">
                                          <label for="username-input">Username</label>
                                          <input type="email" class="form-control" id="username-input" placeholder="Enter Username" disabled>
                                        </div>
                                        <div class="form-group">
                                          <label for="track-input">Track</label>
                                          <select class="form-control" id="track-input" disabled>
                                            <option>Academic Track</option>
                                            <option>Technical Vocational</option>
                                          </select>
                                        </div>
                                        <div class="form-group">
                                          <label for="strand-input">Strand</label>
                                          <select class="form-control" id="strand-input" disabled>
                                            <option>Infomation And Communications Technology</option>
                                            <option>Industrial Arts</option>
                                          </select>
                                        </div>
                                        <div class="form-group">
                                          <label for="block-input">Block</label>
                                          <input type="email" class="form-control" id="block-input" placeholder="Enter Block" disabled>
                                        </div>
                                        <div class="form-group">
                                          <label for="contact-no-input">Contact Number</label>
                                          <input type="email" class="form-control" id="contact-no-input" placeholder="Enter Contact" disabled>
                                        </div>

                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newMessageModal">
                                Message
                              </button>

                              <!-- Modal -->
                              <div class="modal fade" id="newMessageModal" tabindex="-1" role="dialog" aria-labelledby="newMessageModalTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="newMessageModalTitle">New Message</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <form action="../api/messages/create-message.php" method="POST"class="" id="new-message-form">
                                        <div class="form-group">
                                          <?php $uid=$_GET['uid'];$fid=$_GET['fid'];?>
                                          <input type="text" name="user_id" value="<?=$uid?>" id="" readonly hidden>
                                          <input type="text" name="fid" value="<?=$fid?>" readonly hidden>
                                          <label for="username" class="text-secondary">Send To:</label>
                                          <input type="text" class="form-control" name="username" id="username-message-input" disabled>
                                        </div>
                                        <div class="form-group">
                                          <textarea name="message_content" class="form-control" rows="8" cols="80" placeholder="Type a message..."></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary float-right"name="button">Send </button>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                              </div>
                          </div>
                      </div>
                      <div class="card m-3 border-light shadow">
                          <div class="card-body">
                              <h4 class="card-title">Bio</h4>
                              <p class="card-text" id="bio-label"></p>

                              <!-- Modal -->
                              <div class="modal fade" id="bioModal" tabindex="-1" role="dialog" aria-labelledby="bioModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="bioModalLabel">Bio</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body" >
                                      <div class="form-group">
                                         <textarea class="form-control" id="bio-textarea" rows="3"></textarea>
                                       </div>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                      </div>
                  </div>
              </div>
          </div><br><br>
          <div class="col-md-7 col-lg-10" id="profile-post">
              <!--Fetch All Post-->
          </div>

      </div>
  </div>
  </div>
    <?php include('components/footer.php');?>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <?php $uid=$_GET['uid'];$fid=$_GET['fid'];?>
    <script type="text/javascript">
      document.addEventListener("DOMContentLoaded", function() {
          read_profile(<?=$fid?>);
          read_user_post(<?=$fid?>);
      });

    </script>

    <script src="../js/users.js" charset="utf-8"></script><script src="../js/post.js" charset="utf-8"></script>
</body>

</html>
