<div class="modal fade" id="image-pc-library">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" id="closemodal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> 
                <button id="image_plus" class="btn btn-success" style="visibility:visible"
                    onclick="$('#image-pc-lib-imageInput').click()"><i class="fa fa-plus"></i>
                </button>
                <input type="file" style="visibility:hidden" id="image-pc-lib-imageInput"> 
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <h4 class="modal-title">Gallery</h4>
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-6 pull-right">
                        
                        
                    </div>
                </div>
            </div>
            <form method="post">
                <div class="modal-body" style="margin-bottom: 10px;" id="image-pc-lib-body">
                    <?php
                    if(isset($user_image_gallery))
                    {
                        ?>
                    <div class="row">
                        <?php
                        $i=1;
                        foreach($user_image_gallery as $uig)
                        { 
                            ?>
                        <div class="col-md-4 col-sm-4 col-xs-6">
                            <div class="row">
                                <div class="col-md-11 col-sm-11 col-xs-11" id="libImageDiv<?=$i?>">
                                    <a onclick="window.libFunction('<?=$uig['image']?>')">
                                        <img src="<?=$uig['image']?>" width="100%" />
                                    </a>
                                </div>
                                <div class="col-md-1 col-sm-1 col-xs-1">
                                    <button type="button" class="btn btn-danger"
                                        onclick="deleteLibImage('<?=$uig['id']?>','libImageDiv<?=$i?>','<?=$uig['image']?>')"><i
                                            class="fas fa-trash"></i></button>
                                </div>
                            </div>
                        </div>
                        <?php
                            if($i%3===0)
                            { 
                                ?>
                    </div>
                    <div class="row" style="margin-top:10px;">
                        <?php
                            }
                            $i++;
                        }
                        ?>
                    </div>
                    <?php
                    }
                ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <!-- <button type="submit" name="redistribute" class="btn btn-primary" value="">Insert</button> -->
                </div>
            </form>
        </div>
    </div>
</div>