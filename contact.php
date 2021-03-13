<?php
     require_once 'header.php';
     require_once 'navbar.php';  


     if(isset($_POST['query']))
     {
         $name = $conn->real_escape_string($_POST['name']);
         $email = $conn->real_escape_string($_POST['email']);
         $phone = $conn->real_escape_string($_POST['phone']);
         $subject = $conn->real_escape_string($_POST['subject']);
         $message = $conn->real_escape_string($_POST['comment']);
         $sql = "insert into user_queries(name, email, phone, subject, message) values('$name', '$email', '$phone', '$subject','$message')";
         if($conn->query($sql))
         {
             $success=true;
         }else
         {
                    $error=true;
         }

     }
?>
<div class="inner-page-header">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="header-page-title">
                    <h2>Contact Page</h2>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="header-page-locator">
                    <ul>
                        <li><a href="index">Home /</a> Contact Page</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Inner Page Header serction end here -->

<!-- Contact Us page Start Here -->
<div class="contact-us-page-area pt-100 pb-100">
    <div class="container">
        <?php
            if(isset($success))
            {
        ?>
        <div class="alert alert-success">We got your Message! Will Reply back to you soon</div>
        <?php
                    
                }else if(isset($error))
                {
                    ?>
        <div class="alert alert-danger">Error occured while recording your message</div>
        <?php
                }
        ?>
        <div class="row">

            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="contact-us-page">
                    <h2>Contact Information</h2>
                </div>
            </div>
        </div>

        <div class="row contact-box">
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="single-contact-box">
                    <ul>
                        <li><span><i class="fa fa-map-marker"></i></span> <?=$web_config['address']?></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="single-contact-box">
                    <ul>
                        <li><span><i class="fa fa-phone"></i></span><a
                                href="tel:<?=$web_config['phn']?>"><?=$web_config['phn']?></a></li>

                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="single-contact-box">
                    <ul>
                        <li><span><i class="fa fa-envelope-o"></i></span><a
                                href="mailto:<?=$web_config['email']?>"><?=$web_config['email']?></a></li>

                    </ul>
                </div>
            </div>
        </div>

        <div class="contact-section">
            <div class="leave-comments-area">
                <h4>Contact Us</h4>
                <div id="form-messages"></div>
                <form id="contact-form" method="post">
                    <fieldset>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <input name="name" id="name" type="text" class="form-control" placeholder="Name*"
                                        required="">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <input name="email" id="email" type="email" class="form-control"
                                        placeholder="Email*" required="">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <input name="phone" id="phone" type="text" class="form-control" placeholder="Phone*"
                                        required="">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <input name="subject" id="subject" type="text" class="form-control"
                                        placeholder="Subject*" required="">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <textarea name="comment" id="comment" cols="40" rows="10"
                                        class="textarea form-control" placeholder="Your Message"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <button class="btn-send" name="query" form="contact-form" type="submit">Send Message <i
                                        class="fa fa-angle-right"></i> </button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Contact Us page end Here -->

<?php
      require_once "footer.php";
      require_once "js-links.php";
?>