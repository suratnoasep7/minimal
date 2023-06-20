

$(document).ready(function() {

function postContentAjaxLuma(url, loadIdDiv) {
    $.ajax({
        type: 'POST',
        url: url,
        data: $('form').serialize(),
        timeout: 3000,
        // dataType: 'html',
        beforeSend: function() {
            $(".preloader").show();
        },
        success: function(response) {
            $("#" + loadIdDiv).html(response);
            $('#tBrowse').DataTable();
        },
        error: function(xhr) { // if error occured
            alert("Error occured.please try again");
            $(".preloader").hide();
        },
        complete: function() {
            $(".preloader").hide();
        },
    });
}
});
