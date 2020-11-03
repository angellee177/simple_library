// $(document).on('click', 'a.agreed', function(e) {
//     let check = $('#agreement').prop('checked');
//     if(!check) {
//         showAlertPopUp('Please read and accept the Terms, Conditions, and Cancelations');
//     } else {
//         let size = 0; //5Mb max => 5120 Kb, 5242880 B
//         let keys1 = Object.keys(choices);

//         invoices.forEach(function(item) {
//             size += item.size;
//         });
//         packingList.forEach(function(item) {
//             size += item.size;
//         });
//         msds.forEach(function(item) {
//             size += item.size;
//         });
//         assortedFileKeys.forEach(function(item) {
//             size += assortedFiles[item].size;
//         });

//         if(size > 5242880) {
//             showAlertPopUp('Your uploaded file exceeds our limit (5Mb)');
//         } else {
//             //looping semua choosen data dari tab sebelumnya
//             forms.set('choices', JSON.stringify(choices));
//             // keys1.forEach(function(item) {
//             // });
//             //set all upload file
//             let docs = [];
//             invoices.forEach(function(item) {
//                 docs.push(item);
//             });
//             packingList.forEach(function(item) {
//                 docs.push(item);
//             });
//             msds.forEach(function(item) {
//                 docs.push(item);
//             });
//             assortedFileKeys.forEach(function(item) {
//                 docs.push(assortedFiles[item]);
//             });
//             forms.set('documents', docs);
//             //set the container isi
//             let conts  = [];
//             indexContainerChoosen.forEach(function(item) {
//                 containerChoosen[item].name = item;
//                 conts.push(containerChoosen[item]);
//             });
//             forms.set('containers', JSON.stringify(conts));
//             $.ajax({
//                 url: "{{ route('shipment.book.api_shipping.save') }}",
//                 type: 'POST',
//                 contentType: false,
//                 data: forms,
//                 processData: false,
//                 success: function(response) {
//                     console.log(response);
//                     // window.location = nextRoute;
//                 },
//                 error: function(err) {
//                     // forms = new FormData();
//                     console.log(err);
//                 }
//             });
//         }
//     }
// });

