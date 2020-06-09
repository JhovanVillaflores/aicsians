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
          <div>
              <div class="container">
                  <div class="col-lg-12">
                      <div class="row justify-content-center mb-5">
                          <div class="col-lg-12">
                              <div class="card-fluid border-light ">
                                  <div class="row ml-2">
                                      <h4 class="text-secondary">Create Post</h4>
                                  </div>
                                  <form action="" method="post" id="post-form">
                                      <div class="form-group">
                                          <?php $uid=$_GET['uid'];?>
                                          <input type="text" name="user_id" value="<?=$uid?>" readonly hidden>
                                          <label for="exampleFormControlTextarea1"></label>
                                          <textarea class="form-control" id="exampleFormControlTextarea1" name="post_desc" rows="5" placeholder="What is on your Mind?"></textarea>
                                      </div>
                                      <button type="submit" class="btn btn-primary float-right">Post</button>
                                  </form>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="row justify-content-center ">
                      <!---post column-->
                      <div class="col-md-7 col-lg-11" id="home-post">
                          <!--Fetch All Post-->
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <?php include('components/footer.php');?>

    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../js/create-post.js" charset="utf-8"></script>
    <script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function() {
        readPost();
    });
    </script>

</body>

</html>
