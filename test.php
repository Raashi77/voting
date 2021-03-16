<?php

    require_once "header.php";
    require_once "navbar.php";
    $t = time();
    $access = "AKEQGXWI-170C0WHIL6EQJNUZ1Q1DHP3P-VZJZK9G0";
    $secret = "asb546ysumvysahslnli5d1oejlrtaxv";
      $signatureData = 'POST/upload{"file":"user/uploads/screen_recorder_video_2020_12_11_11_57_40.1615860198.mp4"}'.$t.$access.$secret;
    $signature = md5($signatureData);
?>

    <h1>Hello</h1>
<?php

    require_once "footer.php";
    require_once "js-links.php";
?>

<script type="text/javascript">
        $.ajax({
            url: "https://developer-api.media.io/upload",
            headers: { 'Content-Type': 'application/json','accessKey':'<?=$access?>','signature':'<?=$signature?>','timestamp': parseInt(<?=$t?>)},
            type:"POST",
            data:{
                file:"user/uploads/screen_recorder_video_2020_12_11_11_57_40.1615860198.mp4"
            },
            success: function(data){
                console.log(data);
            },
            error: function(data)
            {
                console.error(data);
            } 
        })
</script>
 