
$(document).on('change', "#documentType", function(e) {
    if($(this).val() == 'mbl' || $(this).val() == 'mawb') {
        $("#podSection").removeClass("hidden")
        $("#npwpSection").removeClass("hidden")
    } else {
        $("#podSection").addClass("hidden")
        $("#npwpSection").addClass("hidden")
    }
})
$(document).on('click','.add-file', function(e) {
    function ext(filename) {
        return filename.slice((filename.lastIndexOf(".") - 1 >>> 0) + 2);
    }

    let obj = {
        number : $("#documentNumber").val(),
        date : $("#documentDate").val(),
        path : $("#documentFile").prop('files')[0]
    }


    if(obj.number == "" || obj.date == "" || obj.path == undefined || $('#documentType').val() == "") {
        showAlertPopUp('Type, Number, Date , And File is Required');
    } else if (ext(obj.path.name) !== 'pdf' && ext(obj.path.name) !== 'docx' && ext(obj.path.name) !== 'doc' && ext(obj.path.name) !== 'docx' && ext(obj.path.name) !== 'jpg' && ext(obj.path.name) !== 'jpeg' && ext(obj.path.name) !== 'png') {
        showAlertPopUp('File format is not supported');
    } else if (obj.path.size > 5000000) {
        showAlertPopUp('File size is too large, maximum 5MB');
    } else {
        if($('#documentType').val() == 'invoices') {
            invoices.push(obj)
            appendListFile('invoices', invoices)
            $("#documentModal").find('input').val('')
            $("#documentModal").modal('hide')
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
        } else if($("#documentType").val() == 'packing lists') {
            packingList.push(obj)
            appendListFile('packing-list', packingList)
            $("#documentModal").find('input').val('')
            $("#documentModal").modal('hide')
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
        } else if($("#documentType").val() == 'msds') {
            msds.push(obj)
            appendListFile('msds', msds)
            $("#documentModal").find('input').val('')
            $("#documentModal").modal('hide')
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
        } else if($("#documentType").val() == 'surveyor') {
            surveyor.push(obj)
            appendListFile('surveyor', surveyor)
            $("#documentModal").find('input').val('')
            $("#documentModal").modal('hide')
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
        } else if($("#documentType").val() == 'other') {
            other.push(obj)
            appendListFile('other', other)
            $("#documentModal").find('input').val('')
            $("#documentModal").modal('hide')
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
        } else if($("#documentType").val() == 'mawb') {
            mawb = {
                number : $("#documentNumber").val(),
                date : $("#documentDate").val(),
                path : $("#documentFile").prop('files')[0],
                port_of_discharge : $('#pod').val(),
                npwp_number : $('#npwp').val()
            }
            if(mawb.port_of_discharge == "" && mawb.npwp_number == "") {
                showAlertPopUp('Port of discharge and npwp is required');
            } else if (ext(mawb.path.name) !== 'pdf' && ext(mawb.path.name) !== 'docx' && ext(mawb.path.name) !== 'doc' && ext(mawb.path.name) !== 'jpg' && ext(mawb.path.name) !== 'jpeg' && ext(mawb.path.name) !== 'png') {
                showAlertPopUp('File format is not supported');
            } else if (mawb.path.size > 5000000) {
                showAlertPopUp('File size is too large, maximum 5MB');
            } else {
                appendSingleFile('mawb', mawb)
                $("#documentModal").find('input').val('')
                $("#documentModal").modal('hide')
                $('body').removeClass('modal-open');
                $('.modal-backdrop').remove();
            }
        } else if($("#documentType").val() == 'coo') {
            coo.push(obj)
            appendListFile('coo', coo)
            $("#documentModal").find('input').val('')
            $("#documentModal").modal('hide')
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
        } else if($("#documentType").val() == 'do') {
            ddo.push(obj)
            appendListFile('do', ddo)
            $("#documentModal").find('input').val('')
            $("#documentModal").modal('hide')
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
        } else if($("#documentType").val() == 'mbl') {
            mbl_obj = {
                number : $("#documentNumber").val(),
                date : $("#documentDate").val(),
                path : $("#documentFile").prop('files')[0],
                port_of_discharge : $('#pod').val(),
                npwp_number : $('#npwp').val()
            }
            if(mbl_obj.port_of_discharge == "" && mbl_obj.npwp_number == "") {
                showAlertPopUp('Port of discharge and npwp is required');
            } else if (ext(mbl_obj.path.name) !== 'pdf' && ext(mbl_obj.path.name) !== 'docx' && ext(mbl_obj.path.name) !== 'doc' && ext(mbl_obj.path.name) !== 'jpg' && ext(mbl_obj.path.name) !== 'jpeg' && ext(mbl_obj.path.name) !== 'png') {
                showAlertPopUp('File format is not supported');
            } else if (mbl_obj.path.size > 5000000) {
                showAlertPopUp('File size is too large, maximum 5MB');
            } else {
                mbl.push(mbl_obj)
                appendListFile('mbl', mbl)
                $("#documentModal").find('input').val('')
                $('#documentModal #documentType').val('')
                $("#documentModal").modal('hide')
                $('body').removeClass('modal-open');
                $('.modal-backdrop').remove();
            }
        } else if($("#documentType").val() == 'npe') {
            npe.push(obj)
            appendListFile('npe', npe)
            $("#documentModal").find('input').val('')
            $("#documentModal").modal('hide')
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
        } else if($("#documentType").val() == 'kartu export') {
            kartu_export.push(obj)
            appendListFile('kartu-export', kartu_export)
            $("#documentModal").find('input').val('')
            $("#documentModal").modal('hide')
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
        } else if($("#documentType").val() == 'surat jalan') {
            surat_jalan.push(obj)
            appendListFile('surat-jalan', surat_jalan)
            $("#documentModal").find('input').val('')
            $("#documentModal").modal('hide')
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
        } else if($("#documentType").val() == 'sppb') {
            sppb.push(obj)
            appendListFile('sppb', sppb)
            $("#documentModal").find('input').val('')
            $("#documentModal").modal('hide')
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
        } else if($("#documentType").val() == 'sp2') {
            sp2.push(obj)
            appendListFile('sp2', sp2)
            $("#documentModal").find('input').val('')
            $("#documentModal").modal('hide')
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
        }
    }
})
// handle remove list upload
$(document).on('click', 'i.del', function(e) {
    e.preventDefault()
    let id = $(this).parent().parent().parent().attr('class');
        if(id == 'divinvoices') {
            invoices.splice($(this).parent().attr('data-index'), 1);
            appendListFile('invoices', invoices)
        } else if(id == 'divpacking-list') {
            packingList.splice($(this).parent().attr('data-index'), 1);
            appendListFile('packing-list', packingList)
        } else if(id == 'divmsds') {
            msds.splice($(this).parent().attr('data-index'), 1);
            appendListFile('msds', msds)
        } else if(id == 'divsurveyor') {
            surveyor.splice($(this).parent().attr('data-index'), 1);
            appendListFile('surveyor', surveyor)
        } else if(id == 'divother') {
            other.splice($(this).parent().attr('data-index'), 1);
            appendListFile('other', other)
        } else if(id == 'divmawb') {
            other.splice($(this).parent().attr('data-index'), 1);
            appendListFile('mawb', mawb)
        } else if(id == 'divcoo') {
            other.splice($(this).parent().attr('data-index'), 1);
            appendListFile('coo', coo)
        } else if(id == 'divdo') {
            ddo.splice($(this).parent().attr('data-index'), 1);
            appendListFile('do', ddo)
        } else if(id == 'divmbl') {
            other.splice($(this).parent().attr('data-index'), 1);
            appendListFile('mbl',mbl)
        } else if(id == 'divnpe') {
            npe.splice($(this).parent().attr('data-index'), 1);
            appendListFile('npe',npe)
        } else if(id == 'divkartu-export') {
            kartu_export.splice($(this).parent().attr('data-index'), 1);
            appendListFile('kartu-export',kartu_export)
        } else if(id == 'divsurat-jalan') {
            surat_jalan.splice($(this).parent().attr('data-index'), 1);
            appendListFile('surat-jalan',surat_jalan)
        } else if(id == 'divsppb') {
            sppb.splice($(this).parent().attr('data-index'), 1);
            appendListFile('sppb',sppb)
        } else if(id == 'divsp2') {
            sp2.splice($(this).parent().attr('data-index'), 1);
            appendListFile('sp2',sp2)
        }
    //set message alert success to handle user fast clicked
    showSuccessPopUp('Deleted Success!');
});


//handle remove single upload
$(document).on('click', 'i.del-single', function(e) {
    let check = $(this).data('index');
    $(`.btn-${check}`).removeClass('btn-disable').attr('data-toggle','modal');
    $(`#div${check}`).empty();
    showSuccessPopUp('Deleted Success!');
})

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
                    <button class="btn btn-custom-del pd-0" data-index="${index}" id="delListFile">
                        <i class="fa fa-times del"></i>
                    </button>
                </td>
            </tr>
        `);
    });
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

showSuccessPopUp = (msg) => {
    swal.fire({
        title: 'success',
        text: msg,
        type: 'success',
        timer: 1500,
        showConfirmButton: false,
    });
}
