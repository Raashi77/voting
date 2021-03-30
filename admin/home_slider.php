<?php
    require_once 'header.php';
    require_once 'navbar.php';
    require_once 'left-navbar.php';
    if(isset($_POST['delete']))
    {
        $id=$conn->real_escape_string   ($_POST['delete']);
        
            $sql="delete from home_slider where id=$id";
            if($conn->query($sql))
            {
                $resMember=true;   
            }
            else
            {
                $errorMember=$conn->error;
            }

        
    }
    
    if(isset($_POST['edit']))
    {
        $id=$_POST['eid'];
        $heading= $conn->real_escape_string($_POST['eheading']);
        $sub_heading=$conn->real_escape_string($_POST['esub_heading']); 
        $link=$_POST['elink'];
        $color=$_POST['ecolor'];
        $sort_order = $_POST['esort_order']; 
        $sql="update home_slider set heading='$heading',sub_heading='$sub_heading',link='$link',sort_order='$sort_order', color='$color' where id='$id'"; 
        if($conn->query($sql))
        {
            $resMember=true;   

            if(upload_videos($_FILES,$conn,"home_slider","id","image",$id,"projectFile",""))
            {
                $resMember = "all_true";
            }else
            {
                $resMember = "files_left";
            } 
        }
        else
        {
            $errorMember=$conn->error;
        }
    }
    $sql="select * from home_slider";
    $res= $conn->query($sql);
    if($res->num_rows)
    {
        while($row=$res->fetch_assoc())
        {
            $home_slider[]=$row;
        }
    }
?>
 
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Slider Element</h1>
        <ol class="breadcrumb">
            <li>
                <div class="pull-right">
                    <a href="" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="Rebuild"><i class="fa fa-refresh"></i></a>
                </div>
            </li>
        </ol>
    </section>
<!-- Main content -->
<br>
    <section class="content">
        <?php
            if(isset($resMember))
            {
        ?>
                <div class="alert alert-success"><strong>Success! </strong> your request successfully updated. </div> 
        <?php
            }
            else if(isset($errorMember))
            {
        ?>
                <div class="alert alert-danger"><strong>Error! </strong><?=$errorMember?></div> 
        <?php
                
            }
        ?>
        
            <div class="box">
                
              <div class="box-body">                   
                <table id="example2" class="table table-bordered table-hover">
                    <thead style="background-color: #212529; color: white;">
                        <tr>
                             
                             
                             <th style="  text-align: center;">S.No</th>
                             <th style="  text-align: center;">Heading</th>
                             <th style="  text-align: center;">Video</th>
                             <th style="  text-align: center;">Link</th>
                             <th style="  text-align: center;">Sort Order</th>
                             <th style="  text-align: center;">Text Color</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                     <tbody> 
 
                    
                     <?php 
                            if (isset($home_slider)) 
                            {
                                $i = 1;
                                foreach ($home_slider as $d) 
                                {     
                     ?> 
                                     <tr> 
                                         
                                         
                                         <td style="  text-align: center; " id="sno<?=$i?>"><?=$i?></td> 
                                         <td style="  text-align: center; " id="heading<?=$i?>"><?=$d['heading']?></td> 
                                         <td style="  text-align: center; " id="image<?=$i?>"> <iframe width="100" height="100" src="<?=$d['image']?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></td>
                                         <td style="  text-align: center; " id="link<?=$i?>"><?=$d['link']?></td>   
                                         <td style="  text-align: center; " id="sort_order<?=$i?>"><?=$d['sort_order']?></td>   
                                         <td style="  text-align: center; " id="color<?=$i?>"><?=$d['color']?></td>   
                                        <td>
                                            <input type="hidden" id="short_des<?=$i?>" value="<?=$d['sub_heading']?>"/>
                                             <form method="post">
                                                <button href="" name="" type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModaledit" onclick="editSetValues('<?=$d['id'] ?>',<?=$i?>)" value="">
                                                            <i class="fa fa-edit">Edit</i>
                                                </button>
                                                <button  class="btn btn-danger" type="submit" name="delete" value="<?=$d['id']?>">
                                                            <i class="fa fa-trash-o"></i> Delete
                                                </button>
                                                
                                               

                                            </form>
                                        </td>
                                    </tr>
                                 
                            <?php
                                $i++;
                                    
                                            
                                }
                            }
                            else
                            {
                                ?>
                                <p>NO VALUES INSERTED</p>
                                <?php
                            }
                         ?>
          
                        </tbody>
                                </table>
                                
                     </div>
                     
            <!-- /.box-footer-->
                 </div>  
                
      <!-- /.box -->
    </section>
    <!-- /.content -->
</div>



  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->       
  <div class="control-sidebar-bg"></div>
<!-- Modal -->

<div class="modal fade" id="exampleModaledit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Edit Slider Element</h3>
         
      </div>
      <div class="modal-body">
      <form method="post" enctype="multipart/form-data" action>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                         <label >Heading :</label>
                        <input type="text" class="form-control" id="eheading" name="eheading" value="" required>
    
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                         <label >Short Description :</label>
                         <textarea class="form-control" name="esub_heading" id="esub_heading" style="resize:none;height:100px" required></textarea> 
                    </div> 
                </div><br>
                <div class="row">
                    <div class="col-sm-8">
                        <label >Link :</label>
                        <input type="text" class="form-control" id="elink" name="elink" value="">
                        
                    </div>
                    <div class="col-sm-4">
                        <label >Sort Order :</label>
                        <input type="number" class="form-control" id="esort_order" name="esort_order" value="">
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-sm-6">
                        <label >Video :</label>
                        <input type="file" class="form-control"  name="projectFile[]" value="">
                        <input type="hidden" id="eid" name="eid">
                    </div>       
                    <div class="col-sm-6">
                        <label >Text Color</label>
                        <input type="color" class="form-control" id="ecolor"  name="ecolor" value="">
                    </div>       
                    
                </div><br><br>
             </div>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="edit">EDIT</button>
      </div>
      </form>
    </div>
  </div>
</div>
  


 
<?php
    require_once 'js-links.php';
?>
</html>
<script>
function editSetValues(id,count)
{
    $("#eid").val(id);
    $("#eheading").val($("#heading"+count).html());
    $("#esub_heading").html($("#short_des"+count).val());
    $("#elink").val($("#link"+count).html());
    $("#esort_order").val($("#sort_order"+count).html());
    $("#ecolor").val($("#color"+count).html());
   
}

setTimeout(function()
{
    $(".alert").hide();
},3000);

    
</script> 