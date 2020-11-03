$("#form_document").parsley()
$(document).on('click','.add-file', function(e) {
    $('#documentType').parsley().validate()
    $('#documentNumber').parsley().validate()
    $('#documentDate').parsley().validate()
    $('#documentFile').parsley().validate()

    containerElement = $('#documentContainer').length
    if(containerElement !== 0)
        $('#documentContainer').parsley().validate()
    
    function ext(filename) {
        return filename.slice((filename.lastIndexOf(".") - 1 >>> 0) + 2);
    }

    let obj = {
        number : $("#documentNumber").val(),
        date : $("#documentDate").val(),
        path : $("#documentFile").prop('files')[0]
    }

    if($("#form_document").parsley().isValid()) {
        if($("#documentType").val() == 'bl') {
            bl = {
                number : $("#documentNumber").val(),
                date : $("#documentDate").val(),
                path : $("#documentFile").prop('files')[0]
            }
            if (ext(bl.path.name) !== 'pdf' && ext(bl.path.name) !== 'docx' && ext(bl.path.name) !== 'doc' 
                && ext(bl.path.name) !== 'docx' && ext(bl.path.name) !== 'jpg' && ext(bl.path.name) !== 'jpeg' 
                && ext(bl.path.name) !== 'png') {
                showAlertPopUp('File format is not supported');
            } else if (bl.path.size > 5000000) {
                showAlertPopUp('File size is too large, maximum 5MB');
            } else {
                appendSingleFile('bl', bl)
                $("#documentModal").find('input').val('')
                $("#documentModal").modal('hide')
                $('body').removeClass('modal-open');
                $('.modal-backdrop').remove();
            }
        } else if($("#documentType").val() == 'sp2') {
            sp2 = {
                number : $("#documentNumber").val(),
                date : $("#documentDate").val(),
                path : $("#documentFile").prop('files')[0],
                container : $("#documentContainer").val()
            }
            if (ext(sp2.path.name) !== 'pdf' && ext(sp2.path.name) !== 'docx' && ext(sp2.path.name) !== 'doc' 
                && ext(sp2.path.name) !== 'docx' && ext(sp2.path.name) !== 'jpg' && ext(sp2.path.name) !== 'jpeg' 
                && ext(sp2.path.name) !== 'png') {
                showAlertPopUp('File format is not supported');
            } else if (sp2.path.size > 5000000) {
                showAlertPopUp('File size is too large, maximum 5MB');
            } else {
                appendSingleFile('sp2', sp2)
                $("#documentModal").find('input').val('')
                $("#documentModal").modal('hide')
                $('body').removeClass('modal-open');
                $('.modal-backdrop').remove();
            }
        } else if($("#documentType").val() == 'do') {
            ddo = {
                number : $("#documentNumber").val(),
                date : $("#documentDate").val(),
                path : $("#documentFile").prop('files')[0]
            }
            if (ext(ddo.path.name) !== 'pdf' && ext(ddo.path.name) !== 'docx' && ext(ddo.path.name) !== 'doc' 
                && ext(ddo.path.name) !== 'docx' && ext(ddo.path.name) !== 'jpg' && ext(ddo.path.name) !== 'jpeg' 
                && ext(ddo.path.name) !== 'png') {
                showAlertPopUp('File format is not supported');
            } else if (ddo.path.size > 5000000) {
                showAlertPopUp('File size is too large, maximum 5MB');
            } else {
                appendSingleFile('do', ddo)
                $("#documentModal").find('input').val('')
                $("#documentModal").modal('hide')
                $('body').removeClass('modal-open');
                $('.modal-backdrop').remove();
            }
        } else if($("#documentType").val() == 'other') {
            other = {
                number : $("#documentNumber").val(),
                date : $("#documentDate").val(),
                path : $("#documentFile").prop('files')[0]
            }
            if (ext(other.path.name) !== 'pdf' && ext(other.path.name) !== 'docx' && ext(other.path.name) !== 'doc' 
                && ext(other.path.name) !== 'docx' && ext(other.path.name) !== 'jpg' && ext(other.path.name) !== 'jpeg' 
                && ext(other.path.name) !== 'png') {
                showAlertPopUp('File format is not supported');
            } else if (other.path.size > 5000000) {
                showAlertPopUp('File size is too large, maximum 5MB');
            } else {
                appendSingleFile('other', other)
                $("#documentModal").find('input').val('')
                $("#documentModal").modal('hide')
                $('body').removeClass('modal-open');
                $('.modal-backdrop').remove();
            }
        } else if($("#documentType").val() == 'sp3b') {
            sp3b = {
                number : $("#documentNumber").val(),
                date : $("#documentDate").val(),
                path : $("#documentFile").prop('files')[0]
            }
            if (ext(sp3b.path.name) !== 'pdf' && ext(sp3b.path.name) !== 'docx' && ext(sp3b.path.name) !== 'doc' 
                && ext(sp3b.path.name) !== 'docx' && ext(sp3b.path.name) !== 'jpg' && ext(sp3b.path.name) !== 'jpeg' 
                && ext(sp3b.path.name) !== 'png') {
                showAlertPopUp('File format is not supported');
            } else if (sp3b.path.size > 5000000) {
                showAlertPopUp('File size is too large, maximum 5MB');
            } else {
                appendSingleFile('sp3b', sp3b)
                $("#documentModal").find('input').val('')
                $("#documentModal").modal('hide')
                $('body').removeClass('modal-open');
                $('.modal-backdrop').remove();
            }
        } else if($("#documentType").val() == 'bc16') {
            bc16 = {
                number : $("#documentNumber").val(),
                date : $("#documentDate").val(),
                path : $("#documentFile").prop('files')[0]
            }
            if (ext(bc16.path.name) !== 'pdf' && ext(bc16.path.name) !== 'docx' && ext(bc16.path.name) !== 'doc' 
                && ext(bc16.path.name) !== 'docx' && ext(bc16.path.name) !== 'jpg' && ext(bc16.path.name) !== 'jpeg' 
                && ext(bc16.path.name) !== 'png') {
                showAlertPopUp('File format is not supported');
            } else if (bc16.path.size > 5000000) {
                showAlertPopUp('File size is too large, maximum 5MB');
            } else {
                appendSingleFile('bc16', bc16)
                $("#documentModal").find('input').val('')
                $("#documentModal").modal('hide')
                $('body').removeClass('modal-open');
                $('.modal-backdrop').remove();
            }
        } else if($("#documentType").val() == 'bc20') {
            bc20 = {
                number : $("#documentNumber").val(),
                date : $("#documentDate").val(),
                path : $("#documentFile").prop('files')[0]
            }
            if (ext(bc20.path.name) !== 'pdf' && ext(bc20.path.name) !== 'docx' && ext(bc20.path.name) !== 'doc' 
                && ext(bc20.path.name) !== 'docx' && ext(bc20.path.name) !== 'jpg' && ext(bc20.path.name) !== 'jpeg' 
                && ext(bc20.path.name) !== 'png') {
                showAlertPopUp('File format is not supported');
            } else if (bc20.path.size > 5000000) {
                showAlertPopUp('File size is too large, maximum 5MB');
            } else {
                appendSingleFile('bc20', bc20)
                $("#documentModal").find('input').val('')
                $("#documentModal").modal('hide')
                $('body').removeClass('modal-open');
                $('.modal-backdrop').remove();
            }
        } else if($("#documentType").val() == 'bc23') {
            bc23 = {
                number : $("#documentNumber").val(),
                date : $("#documentDate").val(),
                path : $("#documentFile").prop('files')[0]
            }
            if (ext(bc23.path.name) !== 'pdf' && ext(bc23.path.name) !== 'docx' && ext(bc23.path.name) !== 'doc' 
                && ext(bc23.path.name) !== 'docx' && ext(bc23.path.name) !== 'jpg' && ext(bc23.path.name) !== 'jpeg' 
                && ext(bc23.path.name) !== 'png') {
                showAlertPopUp('File format is not supported');
            } else if (bc23.path.size > 5000000) {
                showAlertPopUp('File size is too large, maximum 5MB');
            } else {
                appendSingleFile('bc23', bc23)
                $("#documentModal").find('input').val('')
                $("#documentModal").modal('hide')
                $('body').removeClass('modal-open');
                $('.modal-backdrop').remove();
            }
        } else if($("#documentType").val() == 'bc27') {
            bc27 = {
                number : $("#documentNumber").val(),
                date : $("#documentDate").val(),
                path : $("#documentFile").prop('files')[0]
            }
            if (ext(bc27.path.name) !== 'pdf' && ext(bc27.path.name) !== 'docx' && ext(bc27.path.name) !== 'doc' 
                && ext(bc27.path.name) !== 'docx' && ext(bc27.path.name) !== 'jpg' && ext(bc27.path.name) !== 'jpeg' 
                && ext(bc27.path.name) !== 'png') {
                showAlertPopUp('File format is not supported');
            } else if (bc27.path.size > 5000000) {
                showAlertPopUp('File size is too large, maximum 5MB');
            } else {
                appendSingleFile('bc27', bc27)
                $("#documentModal").find('input').val('')
                $("#documentModal").modal('hide')
                $('body').removeClass('modal-open');
                $('.modal-backdrop').remove();
            }
        } else if($("#documentType").val() == 'bc30') {
            bc30 = {
                number : $("#documentNumber").val(),
                date : $("#documentDate").val(),
                path : $("#documentFile").prop('files')[0]
            }
            if (ext(bc30.path.name) !== 'pdf' && ext(bc30.path.name) !== 'docx' && ext(bc30.path.name) !== 'doc' 
                && ext(bc30.path.name) !== 'docx' && ext(bc30.path.name) !== 'jpg' && ext(bc30.path.name) !== 'jpeg' 
                && ext(bc30.path.name) !== 'png') {
                showAlertPopUp('File format is not supported');
            } else if (bc30.path.size > 5000000) {
                showAlertPopUp('File size is too large, maximum 5MB');
            } else {
                appendSingleFile('bc30', bc30)
                $("#documentModal").find('input').val('')
                $("#documentModal").modal('hide')
                $('body').removeClass('modal-open');
                $('.modal-backdrop').remove();
            }
        }
    }

    // if(obj.number == "" || obj.date == "" || obj.path == undefined || $('#documentType').val() == "") {
    //     showAlertPopUp('Type, Number, Date , And File is Required');
    // } else if (ext(obj.path.name) !== 'pdf' && ext(obj.path.name) !== 'docx' && ext(obj.path.name) !== 'doc' && ext(obj.path.name) !== 'docx' && ext(obj.path.name) !== 'jpg' && ext(obj.path.name) !== 'jpeg' && ext(obj.path.name) !== 'png') {
    //     showAlertPopUp('File format is not supported');
    // } else if (obj.path.size > 5000000) {
    //     showAlertPopUp('File size is too large, maximum 5MB');
    // } else {
    //     if($('#documentType').val() == 'invoices') {
    //         invoices.push(obj)
    //         appendListFile('invoices', invoices)
    //         $("#documentModal").find('input').val('')
    //         $("#documentModal").modal('hide')
    //         $('body').removeClass('modal-open');
    //         $('.modal-backdrop').remove();
    //     } else if($("#documentType").val() == 'packing lists') {
    //         packingList.push(obj)
    //         appendListFile('packing-list', packingList)
    //         $("#documentModal").find('input').val('')
    //         $("#documentModal").modal('hide')
    //         $('body').removeClass('modal-open');
    //         $('.modal-backdrop').remove();
    //     } else if($("#documentType").val() == 'msds') {
    //         msds.push(obj)
    //         appendListFile('msds', msds)
    //         $("#documentModal").find('input').val('')
    //         $("#documentModal").modal('hide')
    //         $('body').removeClass('modal-open');
    //         $('.modal-backdrop').remove();
    //     } else if($("#documentType").val() == 'surveyor') {
    //         surveyor.push(obj)
    //         appendListFile('surveyor', surveyor)
    //         $("#documentModal").find('input').val('')
    //         $("#documentModal").modal('hide')
    //         $('body').removeClass('modal-open');
    //         $('.modal-backdrop').remove();
    //     } else if($("#documentType").val() == 'mawb') {
    //         mawb = {
    //             number : $("#documentNumber").val(),
    //             date : $("#documentDate").val(),
    //             path : $("#documentFile").prop('files')[0],
    //             port_of_discharge : $('#pod').val(),
    //             npwp_number : $('#npwp').val()
    //         }
    //         if(mawb.port_of_discharge == "" && mawb.npwp_number == "") {
    //             showAlertPopUp('Port of discharge and npwp is required');
    //         } else if (ext(mawb.path.name) !== 'pdf' && ext(mawb.path.name) !== 'docx' && ext(mawb.path.name) !== 'doc' && ext(mawb.path.name) !== 'docx' && ext(mawb.path.name) !== 'jpg' && ext(mawb.path.name) !== 'jpeg' && ext(mawb.path.name) !== 'png') {
    //             showAlertPopUp('File format is not supported');
    //         } else if (mawb.path.size > 5000000) {
    //             showAlertPopUp('File size is too large, maximum 5MB');
    //         } else {
    //             appendSingleFile('mawb', mawb)
    //             $("#documentModal").find('input').val('')
    //             $("#documentModal").modal('hide')
    //             $('body').removeClass('modal-open');
    //             $('.modal-backdrop').remove();
    //         }
    //     } else if($("#documentType").val() == 'coo') {
    //         coo.push(obj)
    //         appendListFile('coo', coo)
    //         $("#documentModal").find('input').val('')
    //         $("#documentModal").modal('hide')
    //         $('body').removeClass('modal-open');
    //         $('.modal-backdrop').remove();
    //     } else if($("#documentType").val() == 'do') {
    //         ddo.push(obj)
    //         appendListFile('do', ddo)
    //         $("#documentModal").find('input').val('')
    //         $("#documentModal").modal('hide')
    //         $('body').removeClass('modal-open');
    //         $('.modal-backdrop').remove();
    //     } else if($("#documentType").val() == 'mbl') {
    //         mbl_obj = {
    //             number : $("#documentNumber").val(),
    //             date : $("#documentDate").val(),
    //             path : $("#documentFile").prop('files')[0],
    //             port_of_discharge : $('#pod').val(),
    //             npwp_number : $('#npwp').val()
    //         }
    //         if(mbl_obj.port_of_discharge == "" && mbl_obj.npwp_number == "") {
    //             showAlertPopUp('Port of discharge and npwp is required');
    //         } else if (ext(mbl_obj.path.name) !== 'pdf' && ext(mbl_obj.path.name) !== 'docx' && ext(mbl_obj.path.name) !== 'doc' && ext(mbl_obj.path.name) !== 'jpg' && ext(mbl_obj.path.name) !== 'jpeg' && ext(mbl_obj.path.name) !== 'png') {
    //             showAlertPopUp('File format is not supported');
    //         } else if (mbl_obj.path.size > 5000000) {
    //             showAlertPopUp('File size is too large, maximum 5MB');
    //         } else {
    //             mbl.push(mbl_obj)
    //             appendListFile('mbl', mbl)
    //             $("#documentModal").find('input').val('')
    //             $('#documentModal #documentType').val('')
    //             $("#documentModal").modal('hide')
    //             $('body').removeClass('modal-open');
    //             $('.modal-backdrop').remove();
    //         }
    //     } else if($("#documentType").val() == 'npe') {
    //         npe.push(obj)
    //         appendListFile('npe', npe)
    //         $("#documentModal").find('input').val('')
    //         $("#documentModal").modal('hide')
    //         $('body').removeClass('modal-open');
    //         $('.modal-backdrop').remove();
    //     } else if($("#documentType").val() == 'kartu_export') {
    //         kartu_export.push(obj)
    //         appendListFile('kartu_export', kartu_export)
    //         $("#documentModal").find('input').val('')
    //         $("#documentModal").modal('hide')
    //         $('body').removeClass('modal-open');
    //         $('.modal-backdrop').remove();
    //     } else if($("#documentType").val() == 'surat_jalan') {
    //         surat_jalan.push(obj)
    //         appendListFile('surat_jalan', surat_jalan)
    //         $("#documentModal").find('input').val('')
    //         $("#documentModal").modal('hide')
    //         $('body').removeClass('modal-open');
    //         $('.modal-backdrop').remove();
    //     }
        
    // }
})
// // handle remove list upload
$(document).on('click', 'i.del', function(e) {
    let id = $(this).parent().parent().parent().attr('class');
    if(id == 'divinvoices') {
        let vary = 'invoices';
        invoices.splice($(this).parent().attr('data-index'), 1);
        appendListFile('invoices', invoices)
    } else if(id == 'divpacking-list') {
        let vary = 'packing-list';
        packingList.splice($(this).parent().attr('data-index'), 1);
        appendListFile('packing-list', packingList)
    } else if(id == 'divmsds') {
        let vary = 'msds';
        msds.splice($(this).parent().attr('data-index'), 1);
        appendListFile('msds', msds)
    } else if(id == 'divsurveyor') {
        let vary = 'surveyor';
        surveyor.splice($(this).parent().attr('data-index'), 1);
        appendListFile('surveyor', msds)
    } else if(id == 'divother') {
        let vary = 'other';
        other.splice($(this).parent().attr('data-index'), 1);
        appendListFile('other', other)
    } else if(id == 'divmawb') {
        let vary = 'mawb';
        other.splice($(this).parent().attr('data-index'), 1);
        appendListFile('mawb', mawb)
    } else if(id == 'divcoo') {
        let vary = 'coo';
        other.splice($(this).parent().attr('data-index'), 1);
        appendListFile('coo', coo)
    } else if(id == 'divdo') {
        let vary = 'do';
        other.splice($(this).parent().attr('data-index'), 1);
        appendListFile('do', ddo)
    } else if(id == 'divmbl') {
        let vary = 'mbl';
        other.splice($(this).parent().attr('data-index'), 1);
        appendListFile('mbl',mbl)
    } else if(id == 'divsp3b') {
        let vary = 'sp3b';
        other.splice($(this).parent().attr('data-index'), 1);
        appendListFile('sp3b',sp3b)
    } else if(id == 'divbc16') {
        let vary = 'bc16';
        other.splice($(this).parent().attr('data-index'), 1);
        appendListFile('bc16',bc16)
    } else if(id == 'divbc20') {
        let vary = 'bc20';
        other.splice($(this).parent().attr('data-index'), 1);
        appendListFile('bc20',bc20)
    } else if(id == 'divbc23') {
        let vary = 'bc23';
        other.splice($(this).parent().attr('data-index'), 1);
        appendListFile('bc23',bc23)
    } else if(id == 'divbc27') {
        let vary = 'bc27';
        other.splice($(this).parent().attr('data-index'), 1);
        appendListFile('bc27',bc27)
    } else if(id == 'divbc30') {
        let vary = 'bc30';
        other.splice($(this).parent().attr('data-index'), 1);
        appendListFile('bc30',bc30)
    } 
});

//handle remove single upload
$(document).on('click', 'i.del-single', function(e) {
    let div = $(this).data('index')
    $(`.btn-${div}`).removeClass('btn-disable').attr('data-toggle','modal')
    $(`#div${div}`).empty()
})

function appendListFile(div, items)
{
    // checkCondition()
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

function appendSingleFile(div, item)
{
    // checkCondition()
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

function checkCondition() {
    if(transaction.includes("do") && transaction.length == 1) {
        if(mbl.path != undefined || mawb.path != undefined) {
            $(".btn-export-save").removeClass('hidden');
        } else {
            $(".btn-export-save").addClass('hidden');
        }
    } else if (transaction.includes("do") && transaction.includes("freight")) {
        if(invoices.length != 0 || packingList.length != 0 || mbl.path != undefined || mawb.path != undefined) {
            $(".btn-export-save").removeClass('hidden');
        } else if((product_type == 'special' || product_type == 'dangerous') && msds.length != 0) {
            $(".btn-export-save").removeClass('hidden')
        } else {
            $(".btn-export-save").addClass('hidden');
        }
    } else if(transaction.includes("freight") && transaction.length == 1) {
        if(invoices.length != 0 || packingList.length != 0) {
            $(".btn-export-save").removeClass('hidden')
        } else if((product_type == 'special' || product_type == 'dangerous') && msds.length != 0) {
            $(".btn-export-save").removeClass('hidden')
        } else {
            $(".btn-export-save").addClass('hidden');
        }
    } else {
        if(invoices.length != 0 || packingList.length != 0) {
            $(".btn-export-save").removeClass('hidden')
        } else if((product_type == 'special' || product_type == 'dangerous') && msds.length != 0) {
            $(".btn-export-save").removeClass('hidden')
        } else {
            $(".btn-export-save").addClass('hidden');
        }
    }
}