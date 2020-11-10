<?php
session_start();
if(!isset($_SESSION['user']))
{
    $_SESSION['user']=0;
}

require_once "head.php";
?>

    <section style="padding: 93px;">
        <div class="row text-center align-items-center">
            <div class="col">
                <h1 style="padding: 27px;">Welcome to VitFam Events</h1><button class="btn btn-primary" type="button">Checkout our ongoing event</button></div>
        </div>
    </section><footer id="footerpad">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-8 mx-auto">
                <ul class="list-inline text-center">
                    <li class="list-inline-item"><a href="https://www.facebook.com/vitfam.vitc/"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-facebook fa-stack-1x fa-inverse"></i></span></a></li>
                    <li class="list-inline-item"><a href="https://www.linkedin.com/company/vitfam"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-linkedin fa-stack-1x fa-inverse"></i></span></a></li>
                    <li class="list-inline-item"><a href="https://instagram.com/vitfam_?igshid=11fqxlnvlnwyh"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-instagram fa-stack-1x fa-inverse"></i></span></a></li>
                    <li class="list-inline-item"><a href="#"></a></li>
                </ul>
                <p class="copyright text-muted text-center"><b>Copyright © VitFam | Web Design by Aritra,developed by Dhritiman</b></p>
            </div>
        </div>
    </div>
</footer>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>