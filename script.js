$(document).ready(function(){
    getFont()
    getFontGroup()
})

function settingsIdAfterCopy($clonedEl){
    var uniqueKey = Math.floor(Math.random() * 1000)
    $clonedEl.prop('id', '')
    $clonedEl.prop('id', 'lineBranch' + uniqueKey)
}

function settingsIdAfterCopy2($clonedEl){
    var uniqueKey = Math.floor(Math.random() * 1000)
    $clonedEl.prop('id', '')
    $clonedEl.prop('id', 'lineBranchEdit' + uniqueKey)
}

function setFontTo(fontName) {
    const styleId = fontName;
  
    var fontStyleSheet = document.getElementById(styleId);
  
    var newFontStyleSheet = document.createElement("style");
    newFontStyleSheet.id = styleId;
    newFontStyleSheet.textContent = `
      @font-face {
        font-family: ${fontName};
        src: url(fonts/${fontName}.ttf);
      }
    `;
  
    document.head.appendChild(newFontStyleSheet);
  
    // if (fontStyleSheet) {
    //   fontStyleSheet.parent.removeChild(fontStyleSheet);
    // }
}

function openFontGroupEditModal(id){
    // console.log(id)
    // let $el = $("#fontGroupEditTable").find('tr').last();
    // let $clonedEl = $el.clone(true)
    // let prevLineItemId = $el.prop('id')
    // $($clonedEl).insertAfter('#'+prevLineItemId)
    // settingsIdAfterCopy($clonedEl)

    $.ajax({
        type:'GET',
        url:'get_font_group_detail.php?id='+id,
        contentType:false,
        processData:false,
        success:function(response){
            var res = $.parseJSON(response)
            // console.log(res[0].group_title)
            $('#group_title_edit').val(res[0].group_title)
            $('#group_id').val(res[0].id)
            var i = 1
            $('#fontGroupEditTable').html("")
              $.each(res[0].group_details, function(key, value){
                // console.log(value['font_name'])
                var selectFont = '<option value="">Select a font</option>'
			
                $.each(res[0].fonts, function(key2, value2){
                    if(value2['id'] == value['font_id']){
                        selectFont += '<option value="'+value2['id']+'" selected>'+value2['font_name']+'</option>'
                    }else{
                        selectFont += '<option value="'+value2['id']+'">'+value2['font_name']+'</option>'
                    }
                })


                $('#fontGroupEditTable').append('<tr class="line-row-edit" id="lineBranchEdit'+i+'">'+
                    '<td class="form-group">'+
                    '<input type="text" class="form-control" name="font_name_edit[]" id="font_name_edit-1" value="'+value['font_name']+'" placeholder="Font Name">'+
                    '</td>'+
                    '<td class="form-group">'+
                      '<select class="form-select form-control select-font" aria-label="Default select example" name="font_id_edit[]" id="font_id_edit-'+i+'">'+
                      selectFont+
                      '</select>'+
                    '</td>'+
                    '<td class="form-group">'+
                      '<input type="text" readonly class="form-control" name="specific_size_edit[]" placeholder="Specific Size">'+
                    '</td>'+
                    '<td class="form-group">'+
                      '<input type="text" readonly class="form-control" name="price_change_edit[]" placeholder="Price Chage">'+
                    '</td>'+
                  '</tr>')
                //   getFont()
                  i++
              })
        }
    })
    $('#fontGroupEditModal').modal("show")
}

function getFontGroup(){
    $.ajax({
        type:'GET',
        url:'get_font_group.php',
        contentType:false,
        processData:false,
        success:function(response){
            var res = $.parseJSON(response)
            console.log(res)
            if(res != '422'){
                $('.font-group-data').html("")
                $.each(res, function(key, value){
                    $('.font-group-data').append('<tr>'+
                        '<td>'+value['group_title']+'</td>\
                        <td>'+value['fonts']+'</td>\
                        <td>'+value['count']+'</td>\
                        <td>'+
                        '<a type="button" class="btn" style="color:blue" onclick="openFontGroupEditModal('+value['id']+',event.preventDefault())">Edit</a>'+
                        '<a type="button" class="btn" style="color:red" onclick="deleteFontGroup('+value['id']+',event.preventDefault())">Delete</a>'+
                        '</td>\
                        </tr>'
                    )
                })
            }
            // console.log(selectFont)
        }
    })
}

function getFont(){
    $.ajax({
        type:'GET',
        url:'get_font.php',
        contentType:false,
        processData:false,
        success:function(response){
            var res = $.parseJSON(response)
            var selectFont = '<option value="">Select a font</option>'
            // console.log(res)
            if(res != '422'){
                $.each(res, function(key, value){
                    setFontTo(value['font_name'])
                    $('.fontdata').append('<tr>'+
                        '<td>'+value['font_name']+'</td>\
                        <td>'+'<p class="custom_font" style="font-family:'+value['font_name']+'">Example Style</p>'+'</td>\
                        <td>'+'Delete'+'</td>\
                        </tr>'
                    )
                    selectFont += '<option value="'+value['id']+'">'+value['font_name']+'</option>'
                })
            }
            // console.log(selectFont)
            $('.select-font').html(selectFont)
        }
    })
}


function addFont(){
    // var data = $('#addFont').serialize()
    var form = $('#addFont')[0]
    var data = new FormData(form)
    // console.log(data)
    $.ajax({
        type:'POST',
        url:'add_font.php',
        data:data,
        contentType:false,
        processData:false,
        success:function(response){
            var res = $.parseJSON(response)
            // console.log(res)
            if(res.status == 422){
                $('#errorMessage').removeClass('d-none')
                $('#errorMessage').text(res.message)
            }else if(res.status == 200){
                $('#errorMessage').addClass('d-none')
                // $('#fontAddModal').modal('hide')
                form.reset()
                $('.fontdata').html("")
                getFont()
                // $('#fontTable').load(location.href + " #fontTable")
            }
        }
    })
}

function createFontGroup(){
    var form = $('#createFontGroup')[0]
    var data = new FormData(form)
    // console.log(data.font_id)
    $.ajax({
        type:'POST',
        url:'create_font_group.php',
        data:data,
        contentType:false,
        processData:false,
        success:function(response){
            var res = $.parseJSON(response)
            console.log(res)
            if(res.status == 'count_err'){
                var msg = "Please select at least two rows!"
                $('.error').removeClass('d-none')
                $('.error').html(msg)
            }else{
                form.reset()
                $('#createFontGroup').load(location.href + " #createFontGroup")
                alert("Group created successfully!")
                getFontGroup()
            }
        }
    })

}

function updateFontGroup(){
    var form = $('#editFontGroup')[0]
    var data = new FormData(form)
    $.ajax({
        type:'POST',
        url:'update_font_group.php',
        data:data,
        contentType:false,
        processData:false,
        success:function(response){
            var res = $.parseJSON(response)
            console.log(res)
            getFontGroup()
        }
    })
    // console.log(data)

}
function deleteFontGroup(id){
    $.ajax({
        type:'GET',
        url:'delete_font_group.php?id='+id,
        contentType:false,
        processData:false,
        success:function(response){
            var res = $.parseJSON(response)
            console.log(res)
            getFontGroup()
        }
    })
}

function add_row(){
    let $el = $("#fontGroupTable").find('tr').last();
    let $clonedEl = $el.clone(true)
    let prevLineItemId = $el.prop('id')
    $($clonedEl).insertAfter('#'+prevLineItemId)
    settingsIdAfterCopy($clonedEl)
    // console.log(fontGroup)
}

function add_row_edit(){
    let $el = $("#fontGroupEditTable").find('tr').last();
    let $clonedEl = $el.clone(true)
    let prevLineItemId = $el.prop('id')
    $($clonedEl).insertAfter('#'+prevLineItemId)
    settingsIdAfterCopy2($clonedEl)
    // console.log(fontGroup)
}

function hideFontGroupEditModal(){
    // console.log("xxxxx")
    $("#fontGroupEditModal").modal('hide');
}

var dvE = $('#font').dropify({

});
dvE = dvE.data('dropify')