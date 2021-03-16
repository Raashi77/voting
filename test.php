<?php

    require_once "header.php";
    require_once "navbar.php";


    require_once "footer.php";
    require_once "jslinks.php";
?>

<script type="text/javascript">
        $.ajax({
            url: "https://developer-api.media.io/task/video /upload",
            ContentType: "application/json",
            beforeSend: function(xhr){
                xhr.setRequestHeader('accessKey', 'test-value');
                xhr.setRequestHeader('signature', 'test-value');
                xhr.setRequestHeader('time', time());
            },
            data:{

                file:""
            }

        })
</script>