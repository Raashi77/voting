<?php 

require_once 'lib/core.php';
if(isset($_GET['fetch']))
{
    $response = [];
    $results_per_page = 6;
    if(!isset($_GET['page']))
    {
        $page=1;
    }else
    {
        $page = $_GET['page'];
    }
    $page_first_result = ($page-1) * $results_per_page;
    $response['from'] = $page_first_result;
    $sql="select * from videos  order by time_stamp desc LIMIT $page_first_result, $results_per_page ";
        $videos = "";
        if($result =  $conn->query($sql))
        {
            $response['rows'] = $result->num_rows;
            $response['to']=$page_first_result + $result->num_rows;
            if($result->num_rows)
            {
                while($row = $result->fetch_assoc())
                {
                    $vidSrc = $row['video'];
                    $id = $row['id'];
                    $play = "playVideo(`$vidSrc`,$id)";
                    $pause = "";
                    $videos .="<div class='col-lg-4'>
                                <div class='p-4'>

                                    <div class='card' style='background-color: #1c1d31; min-height: 500px; color: white;'>
                                    <video  class=''  id='video$id' style='max-height:58vh !important'>
                                            <source src = '$vidSrc' type = 'video/mp4'>
                                            This browser doesn't support video tag.
                                    </video>
                                    <script type='text/javascript'>
                                        setTime($id,'$vidSrc');
                                        function setTime(id,aud)
                                        {
                                            var audd = document.getElementById('video'+id);
                                            audd.preload='predata';
                                            audd.onloadedmetadata = function() {
                                                
                                                var time = Math.round(audd.duration);
                                                // console.log(time)
                                                var minutes = Math.floor(time / 60);
                                                var seconds = time - minutes * 60;
                                                if(seconds < 10)
                                                {
                                                    seconds = '0'+ seconds
                                                }
                                                document.getElementById('time'+id).innerHTML=(minutes+':'+seconds);
                                            };
                                        }
                                    </script>
                                    <div class='card-body'>
                                        <div class='row'>
                                            <div class='col-3'>
                                                <i class='fas fa-plus'></i>
                                                <p id='currentTime$id'>0:00</p>
                                            </div>
                                            <div class='col-6'>
                                                <center>
                                                    <i class='far fa-play-circle play_button' style='color:white;font-size:55px;cursor:pointer' id='playButton$id'; onclick='$play'></i>
                                                    <i class='far fa-pause-circle pause_button' style='color:white;font-size:55px;cursor:pointer;display:none' id='pauseButton$id' onclick='pauseVideo($id)'></i>	
                                                </center>
                                            </div>
                                            <div class='col-3 text-right'>
                                                <i class='fas fa-ellipsis-h'></i>
                                                <p id='time$id'>0:00</p>
                                            </div>
                                        </div>

                                    <div class='text-center'>
                                        <input id='dura$id' disabled class='form-control' type='range' name='rng' min='0' step='0.25' value='0'   max='100'>
                                    </div>



                                    </div>
                                    </div> 

                                </div>
                            </div>
                                    ";
                    $vidSlider[] = $row;
                }
                $response['videos'] = $videos;
               
            }
            else
            {
                $response['rows'] = "notFound";
            }
        }    
        else
        {
            echo $conn->error;
        }
        echo json_encode($response);
    }
?>
