<?php

    require_once "header.php";
    require_once "navbar.php";
    $t = time();
    $access = "AKEQGXWI-170C0WHIL6EQJNUZ1Q1DHP3P-VZJZK9G0";
    $secret = "asb546ysumvysahslnli5d1oejlrtaxv";
      $signatureData = 'POST/upload{"file":"user/uploads/screen_recorder_video_2020_12_11_11_57_40.1615860198.mp4"}'.$t.$access.$secret;
    $signature = md5($signatureData);
?>

      
        <iframe width="560" height="315" src="https://video.online-convert.com/convert-to-mp4" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              
<?php


    require_once "footer.php";
    require_once "js-links.php";
?>

<script type="text/javascript">
      
</script>
 