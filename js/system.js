$(document).ready(function(){
    $("#new_user").on("click", function() {
  $("#form_new_user").toggle();
  $("#new_user").blur();
});

$("#new_redirect").on("click", function() {
    console.log('dqw');
    $("#form_new_redirect").toggle();
    $("#form_new_project").hide();
  	$("#form_name_project").hide();
  	$("#new_redirect").blur();
});

$("#close").on("click", function() {
  $("#form_name_project").hide();
  $("#form_new_redirect").hide();
});

$("#notice").fadeOut(3000);

$("#new_project").on("click", function() {
    console.log('dqw');
    $("#form_new_project").toggle();
    $("#form_new_redirect").hide();
    $("#new_project").blur();
});

$("#edit_name_project").on("click", function() {
  $("#form_name_project").toggle();
  $("#edit_name_project").blur();
  $("#form_new_redirect").hide();
  $("#project_name").focus();
});

//$('#add-project-s').click(function(){
//    alert($('[name="project_name"]').val());
//});
$('#update-sett').click(function(){
    
    $.ajax({
            method: "POST",
            data: {head_footer_color: $('[name="head_footer_color"]').val(),
                   domain_redirect: $('[name="domain_redirect"]').val(),
                   sidebar_color: $('[name="sidebar_color"]').val(),
                   update: '1'},
            cache: false,
            success: function () {
                
              window.location.href = "/admin/settings";
            }

    });
});
$('#default-sett').click(function(){
    $.ajax({
            method: "POST",
            data: {default: '1'},
            cache: false,
            success: function () {
              window.location.href = "/admin/settings";
        }
    });
});
$('#del_proj').on('click', function(){
    if(confirm("Ця дія призведе до повного видалення даних, пов'язаних із цією категорією. Ви хочете продовжити?")){
        
        $.ajax({
            method: "POST",
            data: {delete_project_id : $('#id_delete_project').val()},
            cache: false,
            success: function () {
              alert("Дані успішно видалено");
              window.location.href = "/admin/";
            }

        });
    }
});

$(".delete_user").on('click', function(){
    $(".deleteSuccess").show(300);
    $(".deleteSuccess").fadeOut(3000);
});

$(".delete_link").on('click', function(){
    $(".deleteSuccess").show(300);
    $(".deleteSuccess").fadeOut(3000);
});

// delete redirect
    $("body").on("click", ".delete_link", function () {
        var delete_link_id = $(this).attr('id');

        $.ajax({
            method: "POST",
            data: {delete_link_id: delete_link_id},
            cache: false,
            success: function (data) {
                // вешаем свой обработчик события success
                $("div#" + delete_link_id).remove();
            }

        });

    });

// delete user
$("body").on("click", ".delete_user", function(){
  var delete_user = $(this).attr('id');

  $.ajax({
    method: "POST",
    data: {delete_user : delete_user},
    cache: false,
    success: function (data) {
      // вешаем свой обработчик события success
      $("div#"+delete_user).remove();
    }

  });

});

// claan statistics
$("#reset_link").on("click", function(){

  $.ajax({
    method: "POST",
    data: {reset_link : "reset_link"},
    cache: false,
    success: function (data) {
      // вешаем свой обработчик события success
    }

  });

  $("#reset_link").blur();
  alert("Статистику переходів очищено");

});
});
