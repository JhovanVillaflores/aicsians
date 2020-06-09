<!-- Start: Navigation with Search -->
<?php $uid=$_GET['uid'];?>
<nav class="navbar shadow-sm sticky-top navbar-light navbar-expand-md navigation-clean-search">
    <div class="container"><a class="navbar-brand" href="#">AICSIANS</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse"
            id="navcol-1">
            <ul class="nav navbar-nav">
                <li class="nav-item" role="presentation"><a class="nav-link " href='index?uid=<?=$uid?>'>Home</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href='profile?uid=<?=$uid?>'>Profile</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link " href='messages?uid=<?=$uid?>'>Messages</a></li>
                <!--<li class="nav-item" role="presentation"><a class="nav-link " href='groups?uid=<?=$uid?>'>Groups</a></li>-->
                <li class="nav-item" role="presentation"><a class="nav-link" href="#"></a></li>
            </ul>
            <form  class="form-inline mr-auto">
                <div class="form-group"><label for="search-field"><i class="fa fa-search"></i></label>
                  <input type="text" id ="uid" name="" value="<?=$uid?>" hidden>
                  <input class="form-control search-field" type="search" id="search-field" name="search">
                  <button type="button" id="search-button" class="btn btn-primary action-button">Search</button>
                </div>
            </form>
            <a class="btn btn-light action-button" role="button" href="../index.php">Logout</a></div>

    </div>
</nav>
<script src="../assets/js/jquery.min.js"></script>
<script src="../js/search.js" charset="utf-8"></script>

<!-- End: Navigation with Search -->
