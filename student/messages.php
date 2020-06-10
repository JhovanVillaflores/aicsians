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
</head>

<body>
    <?php include('components/menu_nav.php');?>

    <div class="bg-light p-4">
        <div class="container" >
            <div class="row justify-content-left">
              <div class="col-md-6">
                <h4 class="text-secondary ml-4">Messages</h4>
              </div>
            </div>
        </div>

        <div class="container py-2 px-3">
          <div class="row pl-4  " id="send-message">
          
          </div>
        <div class="mt-5 row justify-content-center rounded-lg overflow-hidden ">
          <!-- Users box-->

          <div class="col-12 px-0">
            <div class="bg-white">
              <div class="messages-box">
                <div class="list-group rounded-0 text-secondary" id="message-list">
                  <!--messages list-->
                  <!--
                  <a href="#" class="list-group-item list-group-item-action list-group-item-light rounded-0">
                    <div class="media"><img src="https://res.cloudinary.com/mhmd/image/upload/v1564960395/avatar_usae7z.svg" alt="user" width="50" class="rounded-circle">
                      <div class="media-body ml-4">
                        <div class="d-flex align-items-center justify-content-between mb-1">
                          <h6 class="mb-0">Jason Doe</h6><small class="small font-weight-bold">14 Dec</small>
                        </div>
                        <p class="font-italic text-muted mb-0 text-small">Lorem ipsum dolor sit amet, consectetur. incididunt ut labore.</p>
                      </div>
                    </div>
                  </a>
                -->
                </div>
              </div><!--<div class="messages-box">-->
            </div>
          </div>

        </div>
      </div>
        <div class="row justify-content-center m-2">

        </div>
    </div>

    <?php include('components/footer.php');?>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <?php $uid=$_GET['uid'];?>
    <script src="../js/messages.js" charset="utf-8"></script>
    <script type="text/javascript">
      document.addEventListener("DOMContentLoaded", function() {
         readMessagesList(<?=$uid?>);
      });

    </script>

</body>

</html>
