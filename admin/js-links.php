
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="dist/js/jquery.form.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap  -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

<!--CKEditor-->
<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

<!-- index -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 
<script>
  $(function () {
           if(window.location.href.substring(window.location.href.lastIndexOf('/') + 1).includes('?'))
      {
          
 
          $("a[href$='"+window.location.href.substring(window.location.href.lastIndexOf('/') + 1)+"']").parent().parent().parent().addClass("active");
 
      }else
      {
           $("a[href$='"+window.location.href.substring(window.location.href.lastIndexOf('/') + 1)+"']").parent().addClass("active");

      }
           
    // $('#example1').DataTable()
    // $('#example2').DataTable({
    //   'paging'      : true,
    //   'lengthChange': true,
    //   'searching'   : true,
    //   'ordering'    : true,
    //   'info'        : true,
    //   'autoWidth'   : true
    // })
    $("#image-pc-lib-imageInput").change(insertImage)
  })
</script>

<script>
  $("input:checkbox").on("change", function () {
     
    var val = $(this).is(':checked') ? 1 : 0;
    $.ajax({type: "POST",
        url: "indexAjax.php",
        data: {val: val}
    });
});

    //file type validation
   
$(document).on('change', '#image_upload_file', function () {
var progressBar = $('.progressBar'), bar = $('.progressBar .bar'), percent = $('.progressBar .percent');

$('#image_upload_form').ajaxForm({
    beforeSend: function() {
		progressBar.fadeIn();
        var percentVal = '0%';
        bar.width(percentVal)
        percent.html(percentVal);
    },
    uploadProgress: function(event, position, total, percentComplete) {
        var percentVal = percentComplete + '%';
        bar.width(percentVal)
        percent.html(percentVal);
    },
    success: function(html, statusText, xhr, $form) {		
		obj = $.parseJSON(html);	
		if(obj.status){		
			var percentVal = '100%';
			bar.width(percentVal)
			percent.html(percentVal);
			$("#imgArea>img").prop('src',obj.image_medium);			
		}else{
			alert(obj.error);
		}
    },
	complete: function(xhr) {
		progressBar.fadeOut();			
	}	
}).submit();		

});


function categoryAdd() {
    $('#btn_add_img').style.visibility = 'hidden';
    $('#image_plus').style.visibility = 'visible';
    $('#category').style.visibility = 'visible';
}

function insertImage() {
    var fd = new FormData();
    var files = $('#image-pc-lib-imageInput')[0].files[0];
    var category ='<?=image_category()?>'
    fd.append('images', files);
    fd.append('u_id', '<?=$MASTER_ID?>')
    fd.append('category', category);

    $.ajax({
        type: "POST",
        url: "upload_blog_imageAjax.php",
        data: fd,
        contentType: false,
        processData: false,
        success: function(data) {
            if (data != "error") {
                if ($("#ajax-added-lib-row").length > 0) {
                    var inhtml = `<div class="col-md-4 col-sm-4 col-xs-6">
                                  <a onclick="embbedImage('` + data.trim() + `')">
                                      <img src="` + data.trim() + `" width="100%"/>
                                  </a> 
                              </div>`
                    $("#ajax-added-lib-row").prepend(inhtml);
                    console.log(inhtml);
                } else {
                    var inhtml = `<div class="row" id="ajax-added-lib-row" style="margin-bottom:20px">
                                  <div class="col-md-4 col-sm-4 col-xs-6">
                                      <a onclick="embbedImage('` + data.trim() + `')">
                                          <img src="` + data.trim() + `" width="100%"/>
                                      </a> 
                                  </div>
                                </div>`
                    $("#image-pc-lib-body").prepend(inhtml);
                    console.log(inhtml);
                }
            }
        }
    });
}

function deleteLibImage(imageId, divId, imagePath) {
    $.ajax({
        type: "POST",
        url: "upload_blog_imageAjax.php",
        data: {
            deleteImage: true,
            imageId: imageId,
            imagePath: imagePath
        },
        success: function(data) {
            if (data.trim() == "ok") {
                if ($("#" + divId).parent().parent().parent().children().length == 1) {
                    $("#" + divId).parent().parent().parent().remove();
                } else {
                    $("#" + divId).parent().remove();
                }
            }
        }
    });
}
    
</script>
</body>
</html>