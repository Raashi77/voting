<footer>
    <div class="footer-top-area pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="single-footer footer-one">
                        <h3>About Us</h3>
                        <p><?=$web_config['about']?></p>
                        <div class="footer-social-media-area">
                            <nav>
                                <ul>
                                    <li><a href="<?=$web_config['facebook']?>"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="<?=$web_config['twitter']?>"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="<?=$web_config['instagram']?>"><i class="fa fa-instagram"></i></a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="single-footer footer-four margin-0">
                        <h3>Contact Us</h3>
                        <nav>
                            <ul>
                                <li><i class="fa fa-paper-plane-o"></i><?=$web_config['address']?></li>
                                <li><i class="fa fa-phone"></i> <a href="tel:+<?=$web_config['phn']?>"><?=$web_config['phn']?></a></li>
                                <li><i class="fa fa-envelope-o"></i> <a href="mailto:<?=$web_config['email']?>"><?=$web_config['email']?></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="footer-bottom">
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>