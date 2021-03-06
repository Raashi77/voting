
    


var selected_sub = $("#selected_sub");
selected_sub.change(function(){
    if (selected_sub.val() != "default")
    {
//        var subject = $("#selected_sub").val();
//        $("#row1").text(subject);
        var d = $("#major_div");
         
        //+
        
        var inHtml  =`<div id="row`+$(this).val()+`" class="form-group">  
                    <div class="col-xs-2" id="row1">
                                    `+$("#selected_sub option:selected").text()+`
                        <input type="hidden" value="`+$(this).val()+`" name="subId[]"/>
                    </div>
                    <div class="row">

                            <div class="col-5" style="padding:0px;margin-left:13px">
                            <label>Pratical Marks</label>
                            <input type="number" class="form-control" name="obtPMarks[]" value="0" placeholder="Obtained marks" required  >
                        </div>
                        <div class="col-5" style="padding:0px;margin-left:13px">
                            <label>Total Pratical Marks</label>
                        <input type="number" class="form-control" name="maxPMarks[]"  value="0" placeholder="Total marks" required  >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-5" style="padding:0px;margin-left:13px">
                            <label>Theory Marks</label>
                            <input type="number" class="form-control" name="obtTMarks[]" placeholder="Obtained Theory marks" required  >
                        </div>
                        <div class="col-5" style="padding:0px;margin-left:3px">
                            <label>Total Theory Marks</label>
                            <input type="number" class="form-control" name="maxTMarks[]" placeholder="Total Theory marks" required  >
                        </div>
                        
                        <div class="col-1" style="padding:0px;margin-left:3px">
                            <label></label>
                            <button type="button" style="margin-top:10px" class="btn btn-danger" id="remove_but"   onclick='remove("row`+$(this).val()+`","`+$("#selected_sub option:selected").text()+`","`+$(this).val()+`")'><i class="fa fa-window-close" aria-hidden="true"></i> </button>
                        </div> 
                    </div>
                </div>`;
        $("#selected_sub option:selected").remove();
        d.append(inHtml);
        
         $('.selectpicker').selectpicker('refresh');
        
    }
});


function remove(id,value,uid)
{ 
    $("#"+id).remove();
    var inHtml = `<option value='`+uid+`'>`+value+`</option> `;
    $("#selected_sub").append(inHtml);
    $('.selectpicker').selectpicker('refresh');

}


