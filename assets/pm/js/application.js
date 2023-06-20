$.ajaxSetup({cache:!1});
NProgress.configure({showSpinner:!1});
$('[data-toggle="commonmodal"]').bind("click", function(a) {
  NProgress.start();
  a.preventDefault();
  var b = $(this).attr("data-url");
  0 === b.indexOf("#") ? $("#common-modal").modal("open") : $.get(b, function(a, c, e) {
    (c = e.getResponseHeader("requestURL")) && "" != c && c != b ? window.location = c + "?ref=" + $.base64.encode(window.location.href) : a.trim() ? ($("#common-modal").modal(), $("#common-modal").html(a)) : window.location.reload();
  }).done(function() {
    NProgress.done();
  }).fail(function() {
    alert("Page not found.");
    NProgress.done();
  });
});
$(".notify").animate({opacity:1, right:"10px"}, 800, function() {
  $(".notify").delay(3E3).fadeOut();
});
function m_format_error(a) {
  return '<div class="alert alert-danger">' + a + "</div>";
}
function serialize_ajax_call(a, b, d) {
  $("#" + d).button("loading");
  $.ajax({url:a, type:"POST", data:b, dataType:"json", success:function() {
    $("#" + d).button("reset");
  }}).done(function(a) {
    if (a.success) {
      window.location.reload();
    } else {
      var c = "";
      if ("string" === typeof a.message) {
        c += a.message;
      } else {
        for (var b in a.message) {
          c += a.message[b] + "<br>";
        }
      }
      $("#responseModel").html(m_format_error(c));
    }
  }).fail(function(a) {
    //alert(a.responseText);
    $("#responseModel").html(m_format_error("Sorry, this operation could not be completed."));
    $("#" + d).button("reset");
  });
}
function formdata_ajax_call(a, b, d ,e) {
  $("#" + d).button("loading");
  $.ajax({url:a, type:"POST", data:b, processData:!1, contentType:!1, dataType:"json", success:function() {
    $("#" + d).button("reset");
  }}).done(function(a) {
    if (a.success) {
      window.location.reload();
    } else {
      var b = "";
      if ("string" === typeof a.message) {
        b += a.message;
      } else {
        for (var c in a.message) {
          b += a.message[c] + "<br>";
        }
      }
      $("#" + e).html(m_format_error(b));
    }
  }).fail(function(a) {
    //alert(a.responseText);
    $("#" + e).html(m_format_error("Sorry, this operation could not be completed."));
    $("#" + d).button("reset");
  });
}
$(document).ready(function() {
  $(".more").each(function() {
    var a = $(this).html();
    if (200 < a.length) {
      var b = a.substr(0, 200), a = a.substr(200, a.length - 200), b = b + '<span class="moreellipses">...&nbsp;</span><span class="morecontent"><span>' + a + '</span>&nbsp;&nbsp;<a href="" class="morelink">Read more</a></span>';
      $(this).html(b);
    }
  });
  $(".morelink").click(function() {
    $(this).hasClass("less") ? ($(this).removeClass("less"), $(this).html("Read more")) : ($(this).addClass("less"), $(this).html("Close"));
    $(this).parent().prev().toggle();
    $(this).prev().toggle();
    return !1;
  });
  $(".add-message-file").click(function() {
    var a = $(".attach-message-file").length + 1;
    if (5 < a) {
      return alert("You can not add more file attachments. Limit is 5"), !1;
    }
    a = $('<table class="attach-message-file"><tr><td><input name="attachFiles[]" id="message_file' + a + '" type="file"></td><td><a type="button" class="remove-message-file btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></a></td></tr></table>');
    $(".attach-message-file:last").after(a);
    a.fadeIn("slow");
  });
  $(".form-group").on("click", ".remove-message-file", function() {
    $(this).closest(".attach-message-file").remove();
    return !1;
  });  
  $(".add-alone-file").click(function() {
    var a = $(".attach-alone-file").length + 1;
    if (5 < a) {
      return alert("You can not add more files. Limit is 5"), !1;
    }
    a = $('<table class="attach-alone-file"><tr><td><input name="attachFiles[]" id="alone_file' + a + '" type="file"></td><td><a type="button" class="remove-alone-file btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></a></td></tr></table>');
    $(".attach-alone-file:last").after(a);
    a.fadeIn("slow");
  });
  $(".form-group").on("click", ".remove-alone-file", function() {
    $(this).closest(".attach-alone-file").remove();
    return !1;
  });  
});
function ToggleAll(a, b) {
  checkboxes = document.getElementsByName(b + "[]");
  for (var d = 0, c = checkboxes.length;d < c;d++) {
    checkboxes[d].checked = a ? 'checked="checked"' : "";
  }
}
$(document).ready(function() {
  $(document).on("submit", "#i_company_form", function(a) {
    a.preventDefault();
    serialize_ajax_call($(this).attr("action"), $(this).serialize(), "i_company_submit");
  });
  $(document).on("submit", "#i_user_form", function(a) {
    a.preventDefault();
    serialize_ajax_call($(this).attr("action"), $(this).serialize(), "i_user_submit");
  });
  $(document).on("submit", "#i_edit_profile_form", function(a) {
    a.preventDefault();
    formdata_ajax_call($(this).attr("action"), new FormData(this), "i_edit_profile_submit", "responseModel");
  });
  $(document).on("submit", "#i_move_to_trash_form", function(a) {
    a.preventDefault();
    serialize_ajax_call($(this).attr("action"), $(this).serialize(), "i_move_to_trash_submit");
  });
  $(document).on("submit", "#i_move_to_archive_form", function(a) {
    a.preventDefault();
    serialize_ajax_call($(this).attr("action"), $(this).serialize(), "i_move_to_archive_submit");
  });
  $(document).on("submit", "#i_empty_trash_form", function(a) {
    a.preventDefault();
    serialize_ajax_call($(this).attr("action"), $(this).serialize(), "i_empty_trash_submit");
  });
  $(document).on("submit", "#i_project_form", function(a) {
    a.preventDefault();
    serialize_ajax_call($(this).attr("action"), $(this).serialize(), "i_project_submit");
  });
  $(document).on("submit", "#i_complete_project_form", function(a) {
    a.preventDefault();
    serialize_ajax_call($(this).attr("action"), $(this).serialize(), "i_complete_project_submit");
  });
  $(document).on("submit", "#i_close_ticket_form", function(a) {
    a.preventDefault();
    serialize_ajax_call($(this).attr("action"), $(this).serialize(), "i_close_ticket_submit");
  });
  $(document).on("submit", "#i_add_to_project_form", function(a) {
    a.preventDefault();
    serialize_ajax_call($(this).attr("action"), $(this).serialize(), "i_add_to_project_submit");
  });
  $(document).on("submit", "#i_topic_form", function(a) {
    a.preventDefault();
    serialize_ajax_call($(this).attr("action"), $(this).serialize(), "i_topic_submit");
  });
  $(document).on("submit", "#i_task_list_form", function(a) {
    a.preventDefault();
    serialize_ajax_call($(this).attr("action"), $(this).serialize(), "i_task_list_submit");
  });
  $(document).on("submit", "#i_option_form", function(a) {
    a.preventDefault();
    serialize_ajax_call($(this).attr("action"), $(this).serialize(), "i_option_submit");
  });
  $(document).on("submit", "#i_event_form", function(a) {
    a.preventDefault();
    serialize_ajax_call($(this).attr("action"), $(this).serialize(), "i_event_submit");
  });
  $(document).on("submit", "#i_task_form", function(a) {
    a.preventDefault();
    serialize_ajax_call($(this).attr("action"), $(this).serialize(), "i_task_submit");
  });
  $(document).on("submit", "#i_timelog_form", function(a) {
    a.preventDefault();
    serialize_ajax_call($(this).attr("action"), $(this).serialize(), "i_timelog_submit");
  });
  $(document).on("submit", "#i_comment_form", function(a) {
    a.preventDefault();
    formdata_ajax_call($(this).attr("action"), new FormData(this), "i_comment_submit", "responseForm");
  });
  $(document).on("submit", "#i_upload_form", function(a) {
    a.preventDefault();
    formdata_ajax_call($(this).attr("action"), new FormData(this), "i_upload_submit", "responseForm");
  });
  $(document).on("submit", "#i_project_users_form", function(a) {
    a.preventDefault();
    serialize_ajax_call($(this).attr("action"), "submited=submited&project_user_ids=" + JSON.stringify(Object.keys($("#projectUsersList").data())), "i_project_users_submit");
  });
  $(document).on("submit", "#i_invoice_form", function(a) {
    a.preventDefault();
    serialize_ajax_call($(this).attr("action"), $(this).serialize(), "i_invoice_submit");
  });
  $(document).on("submit", "#i_department_form", function(a) {
    a.preventDefault();
    serialize_ajax_call($(this).attr("action"), $(this).serialize(), "i_department_submit");
  });
  $(document).on("submit", "#i_announcement_form", function(a) {
    a.preventDefault();
    serialize_ajax_call($(this).attr("action"), $(this).serialize(), "i_announcement_submit");
  });
  $(document).on("submit", "#i_estimate_form", function(a) {
    a.preventDefault();
    serialize_ajax_call($(this).attr("action"), $(this).serialize(), "i_estimate_submit");
  });
  $(document).on("submit", "#i_ticket_form", function(a) {
    a.preventDefault();
    serialize_ajax_call($(this).attr("action"), $(this).serialize(), "i_ticket_submit");
  });
  $(document).on("submit", "#i_source_form", function(a) {
    a.preventDefault();
    serialize_ajax_call($(this).attr("action"), $(this).serialize(), "i_source_submit");
  });
  $(document).on("submit", "#i_status_form", function(a) {
    a.preventDefault();
    serialize_ajax_call($(this).attr("action"), $(this).serialize(), "i_status_submit");
  });
  $(document).on("submit", "#i_payment_form", function(a) {
    a.preventDefault();
    serialize_ajax_call($(this).attr("action"), $(this).serialize(), "i_payment_submit");
  });
  $(document).on("submit", "#i_leadnotes_form", function(a) {
    a.preventDefault();
    serialize_ajax_call($(this).attr("action"), $(this).serialize(), "i_leadnotes_submit");
  });
  $(document).on("submit", "#i_lead_form", function(a) {
    a.preventDefault();
    serialize_ajax_call($(this).attr("action"), $(this).serialize(), "i_lead_submit");
  });
  $(document).on("submit", "#i_base_form", function(a) {
    a.preventDefault();
    serialize_ajax_call($(this).attr("action"), $(this).serialize(), "i_base_submit");
  });
  $(document).on("submit", "#i_expense_form", function(a) {
    a.preventDefault();
    serialize_ajax_call($(this).attr("action"), $(this).serialize(), "i_expense_submit");
  });
});
$(document).ready(function() {
  $(document).on("change", ".item_amount", function() {
    var a = $(this).attr("name"), a = a.replace("amount", ""), a = a.replace("_", ""), a = parseInt(a), b = parseFloat($(this).val()), b = convert_number(b);
    $("#amount_" + a).val(b);
    var c = parseFloat($("#quantity_" + a).val()), c = convert_number(c);
    $("#quantity_" + a).val(c);
    b = parseFloat(b * c);
    b = b.toFixed(2);
    $("#total_" + a).html("" + b);
    sum_sub_total();
  });
  $(document).on("change", ".item_quantity", function() {
    var a = $(this).attr("name"), a = a.replace("quantity", ""), a = a.replace("_", ""), a = parseInt(a), b = parseFloat($("#amount_" + a).val()), b = convert_number(b);
    $("#amount_" + a).val(b);
    var c = parseFloat($(this).val()), c = convert_number(c);
    $("#quantity_" + a).val(c);
    b = parseFloat(b * c);
    b = b.toFixed(2);
    $("#total_" + a).html("" + b);
    sum_sub_total();
  });
  $(document).on("change", "#tax", function() {
    $("#tax_name").text($("#tax").val());
  });
  $(document).on("change", "#tax_rate", function() {
    $("#tax_amount").text($("#tax_rate").val() + "%");
    $("#tax_name").text($("#tax").val());
    update_tax();
    sum_sub_total();
  });
});
function update_tax() {
  var a = get_sub_total(), b = parseFloat($("#tax_rate").val());
  $("#tax_amount").text($("#tax_rate").val() + "%");
  $("#tax_name").text($("#tax").val());
  return 0 < a && 0 < b ? (a = parseFloat(a / 100 * b), a = a.toFixed(2), $("#tax_total_amount").text("" + a), a) : ($("#tax_total_amount").text(0.00), 0);
}
function get_sub_total() {
  var a = 0.00;
  $(".item_quantity").each(function() {
    var b = $(this).attr("name"), b = b.replace("quantity", ""), b = b.replace("_", ""), b = parseInt(b), b = parseFloat($("#amount_" + b).val()), c = parseFloat($(this).val()), b = parseFloat(b * c);
    a += b;
  });
  return a;
}
function sum_sub_total() {
  var a;
  a = get_sub_total();
  var b = update_tax();
  a = a.toFixed(2);
  $("#sub_total").html("" + a);
  total_sum_amount(b, a);
  return a;
}
function total_sum_amount(a, b) {
  b = parseFloat(b);
  var c = parseFloat(a);
  b = parseFloat(b + c);
  b = b.toFixed(2);
  $("#total_payment").text("" + b);
}
function convert_number(a) {
  return Number(a.toString().match(/^\d+(?:\.\d{0,2})?/)).toFixed(2);
}
function add_new_item() {
  var a = parseInt($("#items").val()) + 1;
  $("#item-table tr:last").after('<tr><td><input name="delete_' + a + '" value="1" id="delete_' + a + '" type="checkbox"></td><td><input type="text" name="name_' + a + '" class="form-control" /></td><td><input type="text" name="quantity_' + a + '" id="quantity_' + a + '" class="form-control item_quantity" value="0"></td><td><input type="text" name="amount_' + a + '" id="amount_' + a + '" class="form-control item_amount" value="0"></td><td><div id="total_' + a + '">0.00</div></td>');
  $("#items").val(a);
};
function ganttChart(a) {
  $(function() {
    $(".gantt").gantt({source:a, minScale:"years", maxScale:"years", navigate:"scroll", itemsPerPage:30, onItemClick:function(b) {
      console.log(b.id);
    }, onAddClick:function(b, a) {
    }, onRender:function() {
    }});
  });
};