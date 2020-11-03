var transactionCheck;

var wizSteps = $('#wizard1').steps({
    headerTag: '.title-tab',
    bodyTag: 'section',
    autoFocus: true,
    titleTemplate: '<div class="title">#title#</div>',
    showBackButton: false,
    showFooterButtons: false,
    labels: {
        cancel: "Cancel",
        current: "current step:",
        pagination: "Pagination",
        finish: "Finish",
        next: "Next",
        previous: "Back",
        loading: "Loading ..."
    },
    onStepChanged: function(event, currentIndex, priorIndex) {
        if(currentIndex == 1) { //choose import type
            $('input[value="port to door"]').prop('checked', true);
        }

        if(currentIndex == 3) { //choose freight
            if(choices.transaction.includes("do") && choices.transaction.length == 1) {
                $('#wizard1').steps('next');
            } else {
                if(choices.freight_mode == 'air') {
                    $('#fcl').hide();
                    $('input[name="shipment_type"]').each(function(index, item) {
                        ($(this).val() == 'less container loaded' && choices.freight_mode == 'air') ? $(this).prop('checked', true) : $(this).prop('checked', false);
                    });
                } else {
                    $('#fcl').show();
                }
            }
        }

        if(currentIndex == 4) {
            if(choices.transaction.includes("do") && choices.transaction.length == 1) {
                $("#wizard1").steps('next')
            } else {
                return false
            }
        }

        if(currentIndex == 5) {
            if(choices.transaction.includes("do") && choices.transaction.length == 1) {
                $("#wizard1").steps('next')
            } else {
                if(choices.shipment_type == 'less container loaded') {
                    $('#wizard1').steps('next');
                } else {
                    $('div.content-body').css('overflow-x', 'hidden');
                }
            }
        }

        if(currentIndex == 6) {
            if(choices.transaction.includes("do") && choices.transaction.length == 1) {
                $("#freightSingleDocument").hide()
                $("#freightMultiDocument").hide()
                $(".special-sign").hide()
                $('#rightSideTable').hide()
                $("#doDocument").show()
            } else if (choices.transaction.includes("do") && choices.transaction.includes("freight")) {
                $("#freightSingleDocument").show()
                $("#freightMultiDocument").show()
                $("#doDocument").show()
                $(".special-sign").show()
                $('#rightSideTable').show()
            } else if(choices.transaction.includes("freight") && choices.transaction.length == 1) {
                $("#freightSingleDocument").show()
                $("#freightMultiDocument").show()
                $("#doDocument").hide()
                $(".special-sign").show()
                $('#rightSideTable').show()
            } else if(choices.transaction.includes("do") && !choices.transaction.includes("freight")) {
                $('#rightSideTable').hide()
            }
            if(choices.shipment_type == 'less container loaded') {
                $('li[role="tab"]').each(function() {
                    if($(this).hasClass('disabled')) {
                        $(this).children().eq(0).css('background-color', '#1f53b3').css('color', '#fff');
                        $(this).children().eq(0).children().eq(0).children().eq(0).css('color', '#fff');
                    }
                });
            }
        }

    },
    onStepChanging: function(event, currIndex, nextIndex) {
        if(nextIndex == 1) { //choose freight mode, air or ocean
            let freight_mode = $('input[name="freight_mode"]:checked').val(),
                label = $('#label-freight');
            if(typeof freight_mode == 'undefined') {
                showAlertPopUp('You need to choose the freight type');
                return false;
            }
            else
            {
                label.text(freight_mode.charAt(0).toUpperCase()+freight_mode.slice(1));
            }
            choices.freight_mode = freight_mode;
        }

        if(nextIndex == 2) {
            let import_type = $('input[name="import_type"]:checked').val(),
                label = $('#label-import');
            if(typeof import_type == 'undefined') {
                showAlertPopUp('You need to choose import type');
                return false;
            }
            else
            {
                label.text(import_type.charAt(0).toUpperCase()+import_type.slice(1));
            }
            choices.type = import_type;
        }

        if(nextIndex == 3) { //page select transaction
            let checks = $('input[name="transaction"]:checked'),
                label = $('#label-transaction'),
                labelArray = new Array();
            checks.each(function(index, item) {
                if(item.value == 'do')
                    labelArray.push('DO Online');
                else
                    labelArray.push($(this).val().charAt(0).toUpperCase()+$(this).val().slice(1));

            });
            choices.action_type = "import";
            if(choices.transaction.length <= 0) {
                showAlertPopUp('You need to choose the transaction type');
                return false;
            }
            else
            {
                label.text(labelArray.join());
            }
        }

        if(nextIndex == 4) { //choose shipment type
            if(choices.transaction.includes("do") && choices.transaction.length == 1) {
                $('#label-shipment').text('DO Online');
            } else {
                let shipment_type = $('input[name="shipment_type"]:checked').val(),
                    label = $('#label-shipment');
                if(typeof shipment_type == 'undefined') {
                    showAlertPopUp('You need to choose the shipment type');
                    return false;
                }
                else
                {
                    label.text(shipment_type.charAt(0).toUpperCase()+shipment_type.slice(1));
                }
                choices.shipment_type = shipment_type;
            }
        }

        if(nextIndex == 5) {
            if(choices.transaction.includes("do") && choices.transaction.length == 1) {
                $('#label-product').text('DO Online');
            } else {
                let product_type = $('input[name="product_type"]:checked').val(),
                    label = $('#label-product');
                if(typeof product_type == 'undefined') {
                    showAlertPopUp('You need to choose the product type');
                    return false;
                }
                else
                {
                    label.text(product_type.charAt(0).toUpperCase()+product_type.slice(1));
                }
                choices.product_type = product_type;
            }
        }

        if(nextIndex == 6) {
            if(choices.transaction.includes("do") && choices.transaction.length == 1) {
                $('#label-container').text('DO Online');
            } else {
                let label = $('#label-container');
                if(indexContainerChoosen.length == 0 && choices.shipment_type != 'less container loaded') {
                    showAlertPopUp('You need to add the container type');
                    return false;
                }
                else
                {
                    label.text('Chosen');
                }
            }
        }

        return true;
    }
});

// $('.select2').select2();
$(document).on('click','.btn-next', function(e) {
    e.preventDefault()
    $('#wizard1').steps('next')
})

$(document).on('click','.btn-back', function(e) {
    e.preventDefault()
    $('#wizard1').steps('previous')
})

$(document).on('click','.btn-finish', function(e) {
    e.preventDefault()
    checkUploaded();
})

$(document).on('click', '#lastPageBack', function(e) {
    if(choices.transaction.includes("do") && choices.transaction.length == 1) {
        $("#wizard1-t-2").trigger('click');
    } else {
        if(choices.shipment_type == 'less container loaded') {
            $('#wizard1').steps('backward');
        }
    }
});