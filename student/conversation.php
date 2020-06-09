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

    <div class="bg-light">

          <div class="container px-4 bg-light" >
            <div class="col-12">
              <div class="row mb-2">
                <a type="button" class="btn btn-primary ml-5 mt-4" name="button" href="messages?uid=<?=$uid?>">Back</a>
                <h4 class="text-secondary ml-4 mt-4 mb-4" id="friend_name"></h4>
              </div>
            </div>

            <div class=" px-0">
              <div class="px-4 py-5 chat-box bg-white overflow-auto" id="message-list" style="height:400px;
        overflow-y: scroll">

                <div id="bottom"></div>
              </div>

              <!-- Typing area -->
              <div id="message-form" class="bg-light " >
                <div class="input-group ">
                  <input type="text" id="fid" value="<?php echo $_GET['fid']?>" hidden>
                  <input type="text" id="cid" value="<?php echo $_GET['cid']?>" hidden>
                  <input type="text" id="uid" value="<?php echo $_GET['uid']?>" hidden>
                  <input type="text" id="message_content" placeholder="Type a message" aria-describedby="button-addon2" class="border border-secondary form-control rounded-0  py-4 bg-light">
                  <div id="message-submit" class="input-group-append">
                    <button id="button-addon2" type="submit" id="btn" class="btn btn-link"> <i class="fa fa-paper-plane" ></i></button>
                  </div>
                </div>
              </div>

            </div>
        </div>
        </div>
    </div>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <?php $uid=$_GET['uid']; $cid=$_GET['cid'];?>
    <script src="../js/messages.js" charset="utf-8"></script>
    <script type="text/javascript">
      document.addEventListener("DOMContentLoaded", function() {
      readSingleConversation(<?=$uid?>,<?=$cid?>);
      });

    </script>

</body>

</html>
