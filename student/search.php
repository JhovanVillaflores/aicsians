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

    <div class="bg-light p-4 " >
        <div class="container" >
          <div class="row justify-content-left">
            <div class="col-md-6">
              <h4 class="text-secondary ml-4">Search Results</h4>
              <h5 class="text-primary ml-4" id="searched-keyword"></h5>
            </div>
          </div>
          <div class="row justify-content-left">
            <div class="col-md-6 text-secondary p-2" id="users_list_label">
            </div>
            <div class="col-md-11 list-group " id="searched_users">

            </div>
          </div>
          <div class="row justify-content-left">
            <div class="col-md-6 text-secondary p-2" id="posts_list_label">
            </div>
            <div class="col-md-11 list-group " id="searched_posts">

            </div>
          </div>
        </div>
    </div>

    <?php include('components/footer.php');?>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>

    <?php $uid=$_GET['uid'];$keyword=$_GET['search_query'];?>

    <script type="text/javascript">
      document.addEventListener("DOMContentLoaded", function() {
          read_search("<?=$keyword?>",<?=$uid?>);
      });

    </script>
<script src="../js/search.js" charset="utf-8"></script>

</body>

</html>
