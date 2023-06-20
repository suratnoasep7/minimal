function eShowBlockUI() {
    $.blockUI({
        css: {
            border: 'none',
            padding: '15px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            zindex: '100',
            opacity: .5,
            color: '#fff'
        }
    });
}

function eHideBlockUI() {
    $.unblockUI();
}

function eAlert(text, reload, mtitle, mtheme, mtype) {
    mtitle = typeof mtitle !== 'undefined' ? mtitle : 'Konfirmasi.';
    mtheme = typeof mtheme !== 'undefined' ? mtheme : 'supervan'; // 'light', 'dark', 'material', 'bootstrap'
    mtype = typeof mtype !== 'undefined' ? mtype : 'default'; // 'default','blue, green, red, orange, purple & dark'

    $.confirm({
        type: mtype,
        theme: mtheme,
        title: '<i class="fa fa-info-circle" ></i> ' + mtitle,
        content: text,
        columnClass: 'col-md-offset-2 col-md-8 col-xs-offset-0 col-xs-12 text-left',
        buttons: {
            OK: {
                text: '<i class="fa fa-check"></i>&nbsp;&nbsp;OK',
                btnClass: 'btn-primary',
                action: function () {
                    if (reload.length > 1) {
                        window.location = reload;
                    }
                }
            }
        }
    });
}

function AlertData(text, icon = "fa-check", title = "Pemberitahuan.", type = "green", url = "") {
    $.confirm({
        theme: 'modern',
        animation: 'scale',
        icon: 'fa ' + icon,
        type: type,
        title: title,
        content: text,
        buttons: {
            close: function () {
                if (url != "") {
                    if (url == '1') {
                        location.reload();
                    } else {
                        location.href = url;
                    }
                }
            }
        }
    });
}

function AjaxLoadDiv(url, id_button, id_load) {
    $.ajax({
        async: true,
        cache: false,
        url: url,
        timeout: 30000, // sets timeout to 30 seconds
        beforeSend: function (xhr) {
            $("#" + id_button).attr("disabled", true);
            $("#" + id_button).html('<i class="fa fa-refresh fa-spin"></i> Sedang Proses...')
        },
        success: function (response, status) {
            $("#" + id_load).load(url);
        },
        error: function (response) {
            $("#" + id_button).attr("disabled", false);
            $("#" + id_button).html('<i class="fa fa-plus"></i> &nbsp; <b>Tambah Data</b>')
            AlertData("Terjadi kesalahan silakan coba beberapa saat lagi : error 500 ", "fa-check", "red", "");
        }
    });
}