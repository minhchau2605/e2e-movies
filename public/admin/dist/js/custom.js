$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});

/**
 * Setting mall function
 * @param id
 */
function settingMallFunction(mallFunctionId, mallId){
    var elementId = 'function-' + mallFunctionId;
    var element = document.getElementById(elementId);
    var currentValue = document.getElementById(elementId).value;
    if(currentValue == "Off"){
        var status = 1;
    }else{
        var status = 0;
    }

    $.ajax({
        type: 'POST',
        url: 'mall-function-status',
        data:
            {
                'mall_id': mallId,
                'mall_function_id': mallFunctionId,
                'status': status
            },
        success : function(data) {
            if(currentValue == "Off"){
                element.classList.remove('btn-danger');
                element.classList.add('btn-info');
                document.getElementById(elementId).value="On";
            }else{
                element.classList.remove('btn-info');
                element.classList.add('btn-danger');
                document.getElementById(elementId).value="Off";
            }
            alert('Update successful');
        },
        error : function(jqXhr)
        {

        }
    })
}

function addMallFunctionToMall(mallFunctionId, mallId){
    console.log(mallId);
    console.log(mallFunctionId);
    var rowId = 'list-function-' + mallFunctionId;
    console.log(rowId);
    $.ajax({
        type: 'POST',
        url: 'add-mall-function',
        data:
            {
                'mall_id': mallId,
                'mall_function_id': mallFunctionId,
            },
        success : function(data) {
            var row = document.getElementById(rowId);
            row.parentNode.removeChild(row);
            alert('Add successful');
            location.reload();
        },
        error : function(jqXhr)
        {

        }
    })
}
