$('#wizard1').steps({
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
    onStepChanged: function(event, currentIndex, nextIndex) {
        if(currentIndex == 2) {
            if(choices.freight_mode == 'air') {
                $('#fcl').hide();
                $('input[name="shipment_type"]').each(function(index, item) {
                    ($(this).val() == 'less container loaded' && choices.freight_mode == 'air') ? $(this).prop('checked', true) : $(this).prop('checked', false);
                });
            } else {
                $('#fcl').show();
            }
        }

        if(currentIndex == 4) {
            if(choices.shipment_type == 'less container loaded') {
                $('#label_container').text('Choose container type');
                $('#wizard1').steps('next');
            } else {
                $('div.content-body').css('overflow-x', 'hidden');
            }
        }

    },
    onStepChanging: function(event, currentIndex, nextIndex) {
        if(nextIndex == 1) {
            let freight_mode = $('input[name="freight_mode"]:checked').val(),
                label = $('#label_freight');
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
            let checks = $('input[name="transaction"]:checked'),
                label = $('#label_transaction'),
                labelArray = new Array();
            checks.each(function(index, item){
                choices.transaction.push($(this).val());
                labelArray.push($(this).val().charAt(0).toUpperCase()+$(this).val().slice(1));
            });
            choices.action_type = "export";

            if(choices.transaction.length < 1) {
                showAlertPopUp('You need to choose the transaction type');
                return false;
            }
            else
            {
                label.text(labelArray.join());
            }
        }

        if(nextIndex == 3) {
            let shipment_type = $('input[name="shipment_type"]:checked').val(),
                label = $('#label_shipment');
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

        if(nextIndex == 4) {
            let product_type = $('input[name="product_type"]:checked').val(),
                label = $('#label_product');
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

        if(nextIndex == 5) {
            let label = $('#label_container');
            if(indexContainerChoosen.length == 0 && choices.shipment_type != 'less container loaded') {
                showAlertPopUp('You need to add the container type');
                return false;
            }
            else
            {
                if(choices.shipment_type != 'less container loaded')
                    label.text('Chosen');
            }
        }

        // if(nextIndex == 6) {
        //     let schedule = $("#datepicker").val();

        //     if(typeof(choices.schedule) == 'undefined') {
        //         showAlertPopUp('You need to choose shipment schedule');
        //         return false;
        //     }
        //     choices.schedule = schedule;
        // }

        return true;
    }
});
