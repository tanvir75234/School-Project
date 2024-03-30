setTimeout(function() {
    $('.alertsuccess').slideUp(1000);
 },5000);

setTimeout(function() {
    $('.alerterror').slideUp(1000);
 },10000);


 //Delete Modal

 $(document).ready(function () {
    $(document).on("click", "#softDelete", function () {
        var deleteID = $(this).data('id');
        $(".modal_card #modal_id").val(deleteID);
    })
 })