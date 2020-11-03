
function showAlertPopUp(msg) {
    swalWithBootstrapButtons.fire({
        title: 'Warning',
        text: msg,
        type: 'warning',
        confirmButtonText: 'Yes',
    });
}

function removeFromTransac(look) {
    let i = indexes.indexOf(look);
    indexes.splice(i, 1);
}

function checkTransaction() {
    start = $('input[name="transaction"]:checked').length;
    if(start > 0) {
        indexes.forEach(function(id, i) {
            $('#'+id).next().attr('data-index', i + 1);
        });
    }
}

function repeatContainerProduct() {
    $('#containerlist').empty();
    indexContainerChoosen.forEach(function(item, index) {
        $('#containerlist').append(`
            <tr data-index="${index}">
                <td>${ index + 1 }.</td>
                <td>${ item.name }</td>
                <td><input class="input-container-type wd-40" type="number" name="qty" value="${ item.quantity }"/></td>
                <td><button class="btn btn-danger delete-container-choosen"><i class="fa fa-times"></i></button></td>
            </tr>
        `);
    });
    // change quantity of container
    $(document).on('input', 'input.input-container-type', function(e) {
        let index = $(this).parent().parent().attr('data-index');
        indexContainerChoosen[index].quantity = parseInt($(this).val())
    });
}

function capitalized(data){
    return data.charAt(0).toUpperCase()+data.slice(1);
}