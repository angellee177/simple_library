function checkTransaction() {
    start = $('input[name="transaction"]:checked').length;
    if(start > 0) {
        indexes.forEach(function(id, i) {
            choices.transaction[i] = $('#'+id).val()
            $('#'+id).next().attr('data-index', i + 1);
        });
    }
}

function samaVal(id, findId) {
    return findId == id;
}

function removeFromTransac(look) {
    let i = indexes.indexOf(look);
    indexes.splice(i, 1);
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

function showAlertPopUp(msg) {
    swalWithBootstrapButtons.fire({
        title: 'Warning',
        text: msg,
        type: 'warning',
        confirmButtonText: 'Yes',
    });
}

function appendListFile(div, items)
{
    $(`.div${div}`).remove()
    items.forEach((item, index) => {
        $(`#divdatalist`).append(`
            <tr class=div${div}>
                <td>${item.number}</td>
                <td>${item.date}</td>
                <td>${item.path.name}</td>
                <td>${div}</td>
                <td class="text-right">
                    <button class="btn btn-custom-del pd-0" data-index="${index}">
                        <i class="fa fa-times del"></i>
                    </button>
                </td>
            </tr>
        `);
    });
}

function isEmpty(obj) {
    for(var key in obj) {
        if(obj.hasOwnProperty(key))
            return false;
    }
    return true;
}

function appendSingleFile(div, item)
{
    $(`#div${div}`).empty()
    $(`#div${div}`).append(`
        <td>${item.number}</td>
        <td>${item.date}</td>
        <td>${item.path.name}</td>
        <td>${div}</td>
        <td class="text-right">
            <button class="btn btn-custom-del pd-0">
                <i class="fa fa-times del-single" data-index="${div}"></i>
            </button>
        </td>
    `)
}

function checkUploaded() {
    if(choices.transaction.includes("do") && choices.transaction.length == 1) {
        if(bl.path == undefined) {
            showAlertPopUp('You need to upload BL Document')
        } else {
            $("#modal1").modal('show');
        }
    } else if (choices.transaction.includes("do") && choices.transaction.includes("freight")) {
        if(invoices.length == 0 || packingList.length == 0 || bl.path == undefined) {
            showAlertPopUp('You need to add upload invoice ,bl document and packing list document');
        } else if((choices.product_type == 'special' || choices.product_type == 'dangerous') && msds.length == 0) {
            showAlertPopUp('You need to add upload invoice , packing list document and msds if your product type dangerous or special cargo')
        }
        else {
            $("#modal1").modal('show');
        }
    } else if(choices.transaction.includes("freight") && choices.transaction.length == 1) {
        if(invoices.length == 0 || packingList.length == 0) {
            showAlertPopUp('You need to add upload invoice and packing list document');
        } else if((choices.product_type == 'special' || choices.product_type == 'dangerous') && msds.length == 0) {
            showAlertPopUp('You need to add upload invoice , packing list document and msds if your product type dangerous or special cargo')
        }
        else {
            $("#modal1").modal('show');
        }
    } else {
        if(invoices.length == 0 || packingList.length == 0) {
            showAlertPopUp('You need to add upload invoice and packing list document');
        } else if((choices.product_type == 'special' || choices.product_type == 'dangerous') && msds.length == 0) {
            showAlertPopUp('You need to add upload invoice , packing list document and msds if your product type dangerous or special cargo')
        }
        else {
            $("#modal1").modal('show');
        }
    }
}