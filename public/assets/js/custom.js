$(window).on("scroll", function () {
  var scrollPos = $(window).scrollTop();
  var winHeight = $(window).height();
  var docHeight = $(document).height();
  var perc = (100 * scrollPos) / (docHeight - winHeight);
  $("#indicator").width(perc + "%");
});

jQuery(function () {
    jQuery("[data-check-pattern]").checkAll();
  });
  
  (function ($) {
    "use strict";
  
    $.fn.checkAll = function (options) {
      return this.each(function () {
        var mainCheckbox = $(this);
        var selector = mainCheckbox.attr("data-check-pattern");
        var onChangeHandler = function (e) {
          var $currentCheckbox = $(e.currentTarget);
          var $subCheckboxes;
  
          if ($currentCheckbox.is(mainCheckbox)) {
            $subCheckboxes = $(selector);
            $subCheckboxes.prop("checked", mainCheckbox.prop("checked"));
          } else if ($currentCheckbox.is(selector)) {
            $subCheckboxes = $(selector);
            mainCheckbox.prop(
              "checked",
              $subCheckboxes.filter(":checked").length === $subCheckboxes.length
            );
          }
        };
  
        $(document).on("change", 'input[type="checkbox"]', onChangeHandler);
      });
    };
  })(jQuery);

  $("#iAgree").on("click",function () {
    $("#request").attr("disabled", !this.checked);
  });
  
$("#send-email").on("submit", function (e) {
  $(document).ajaxSend(function() {
		$("#overlay").fadeIn(300);　
	});
  e.preventDefault();
  var data = $(this).serialize();
  var url = $(this).attr("action");
  var post = $(this).attr("method");
  $.ajax({
    type: post,
    url: url,
    data: data,
    dataTy: "json",
    success: function (data) {
      swal({
        title: "Success",
        text: data.success,
        icon: "success",
        button: "Okay",
      })
    $("#send-email")[0].reset()
    }
  }).done(function() {
    setTimeout(function(){
      $("#overlay").fadeOut(300);
    },500);
  });
});

// setTimeout(sendEmail, 1000); //300000 MS == 5 minutes
// function sendEmail() {
//   $.ajax({
//     url: "http://localhost/enut/public/sendemail",
//   }).done(function (msg) {});
// }


function readMore() {
  var dots = document.getElementById("dots");
  var moreText = document.getElementById("more");
  var btnText = document.getElementById("moreBtn");

  if (dots.style.display === "none") {
      dots.style.display = "inline";
      btnText.innerHTML = "Read more";
      moreText.style.display = "none";
  } else {
      dots.style.display = "none";
      btnText.innerHTML = "Read less";
      moreText.style.display = "inline";
  }
}