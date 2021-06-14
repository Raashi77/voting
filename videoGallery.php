<?php 

require_once "header_new.php";
require_once "navbar_new.php";


?>




        <!-- video gallery -->
        <section class="">
            <section class="wrapperforvideo">
                <!-- <div class='box1 box2'>
                    <img src='assets/image/triangle.png' height='100%' width='110%' alt='Image'>
                </div>
                <div class='box1 box3'>
                    <center><h2 class='text-light'>Video Gallery</h2></center>
                </div> -->
                <div class="box1">
                    <div class="row mb-4"  id="videosPlace">
                    </div>
                    <div id="alert"></div>
                </div>
            </section>
           
        </section>
            <!-- video gallery end -->

<?php 
    require_once "javascript.php";
?>

<script>
    var page = 1;
    var noRows = "do";
    $(document).ready(function (event) {
        //alert("hi there");
        $.get('Video.php?fetch=true&page='+page, function(response) {
            console.log(response);
            $("#videosPlace").html(response.videos) ;
            page = 2;
        }, "JSON");
        $(window).scroll(function(){
            
            var position = $(window).scrollTop();
            var bottom = $(document).height() - $(window).height();

            if( position == bottom){
               
                // var row = Number($('#row').val());
                // var allcount = Number($('#all').val());
                // var rowperpage = 3;
                // row = row + rowperpage;

                if(noRows == "do"){
                    $("#alert").append(`<center>
                                            <div class="spinner-border text-light"  role="status">
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                        </center>`)
                    $.ajax({
                        url: 'Video.php?fetch=true&page='+page,       
                        type: 'get',
                        success: function(response){
                            page++;
                            var obj = JSON.parse(response);
                            if(obj.rows != "notFound")
                            {
                                console.log(obj);
                                console.log(noRows);
                                $(".spinner-border").remove();
                                $("#videosPlace").append(obj.videos); 
                            }
                            else
                            {
                                $(".spinner-border").remove();
                                noRows = "noRows";
                                $("#alert").append(`<center>
                                                            <div class="alert alert-primary" role="alert">
                                                                This is the end of the page!
                                                            </div>
                                                        </center>`); 
                            }
                        }
                    });
                }
            }

        });

    });
    var video = null;
    function pauseVideo(id)
    {
        video[0].pause();
        $(".play_button").show();
        $(".pause_button").hide();
        $("#dura"+id).attr("value",'0');
    }
    function mChange(id)
    {
        video[0].pause();
        var current = $("#dura"+id).val();
        video.currentTime = current/2;
        video.play();
    }
    function playVideo(path,id)
    {
        if(video != null)
        {
            video[0].pause();
        }
        video = $("#video"+id);
        video.preload = "metadata";
        // console.log(video);
        video[0].play();
        // console.log(video,videoTime[0].duration,videoTime);
        $(".play_button").show();
        $(".pause_button").hide();
        $("#playButton"+id).hide();
        $("#pauseButton"+id).show();
        // video.currentTime=0;
        // mChange(id);
        video[0].preload="predata";
        video[0].onloadedmetadata = function() {
            
            var time = Math.round(video[0].duration);
            // console.log(time)
            var minutes = Math.floor(time / 60);
            var seconds = time - minutes * 60;
            if(seconds < 10)
            {
                seconds = "0"+ seconds
            }
            $("#time"+id).html(minutes+":"+seconds);
        };
        video[0].addEventListener("timeupdate", function () {
        var position = (100 / video[0].duration) * video[0].currentTime;
        var current = video[0].currentTime;
        var duration = video[0].duration;
        var durationMinute = Math.floor(duration / 60);
        var durationSecond = Math.floor(duration - durationMinute * 60);
        var durationLabel = durationMinute + ":" + durationSecond;
        currentSecond = Math.floor(current);
        currentMinute = Math.floor(currentSecond / 60);
        currentSecond = currentSecond - currentMinute * 60;
        // currentSecond = (String(currentSecond).lenght > 1) ? currentSecond : ( String("0") + currentSecond );
        if (currentSecond < 10) {
            currentSecond = "0" + currentSecond;
        }
        var currentLabel = currentMinute + ":" + currentSecond;
        var indicatorLabel = currentLabel ;
        // $("#time"+id).html(durationLabel)
        $("#dura"+id).attr("value", position-2 );
        // console.log(indicatorLabel);
        $("#currentTime"+id).html(indicatorLabel);
        video[0].addEventListener('ended',function(){
            $(".play_button").show();
            $(".pause_button").hide();
            $("#dura"+id).attr("value",'0');
        });
    });


    }

</script>
