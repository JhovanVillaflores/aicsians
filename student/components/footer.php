<!-- Start: Footer Clean -->
<script src="../js/search.js" charset="utf-8"></script>
<div class="footer-clean">
    <footer>
        <div class="container">
            <div class="row justify-content-center">
                <!-- Start: Services -->
                <div class="col-sm-4 col-md-3 item">
                  <?php $uid=$_GET['uid'];?>
                    <h3 id="name"><a href='profile.php?uid=<?=$uid?>'>My Profile</a></h3>
                    <ul>
                        <li><a href='index.php?uid=<?=$uid?>'>Home</a></li>
                        <li><a href='messages.php?uid=<?=$uid?>'>Messages</a></li>

                    </ul>
                </div>
                <!-- End: Careers -->
                <!-- Start: Social Icons -->
                <div class="col-lg-3 item social"><a href="#"><i class="icon ion-social-facebook"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-instagram"></i></a>
                    <p class="copyright">AICSIANS © 2020</p>
                </div>
                <!-- End: Social Icons -->
            </div>
        </div>
    </footer>
</div>
<!-- End: Footer Clean -->
