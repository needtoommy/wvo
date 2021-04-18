/*
Template Name: Color Admin - Responsive Admin Dashboard Template build with Twitter Bootstrap 4
Version: 4.6.0
Author: Sean Ngu
Website: http://www.seantheme.com/color-admin/admin/
*/

var handleBootstrapWizardsValidation = function () {
  "use strict";
  $("#wizard").smartWizard({
    selected: 0,
    theme: "default",
    transitionEffect: "",
    transitionSpeed: 0,
    useURLhash: false,
    showStepURLhash: false,
    toolbarSettings: {
      toolbarPosition: "bottom",
    },
  });

  // $('#wizard').click(function(e, anchorObject, stepNumber, stepDirection){

  // });
  $("#wizard").on(
    "leaveStep",
    function (e, anchorObject, stepNumber, stepDirection) {
      if (stepNumber == 0) {
        $.ajax({
          type: "POST",
          url: "vtp_add_form_db.php",
          data: {
            VT_TITLE: $("#VT_TITLE").val(),
            VT_FNAME: $("#VT_FNAME").val(),
            VT_LNAME: $("#VT_LNAME").val(),
            VT_BRITH_DATE: $("#VT_BRITH_DATE").val(),
            VT_AGE: $("#VVT_AGE").val(),
            VT_SEX: $("#VT_SEX").val(),
            VT_HEIGHT: $("#VT_HEIGHT").val(),
            VT_WEIGHT: $("#VT_WEIGHT").val(),
            VT_PHONE: $("VT_PHONE").val(),
            VT_RACE: $("#VT_RACE").val(),
            VT_NATIONALITY: $("#VT_NATIONALITY").val(),
            VT_RELIGION: $("#VT_RELIGION").val(),
            VT_ADD_CONTACT: $("#VT_ADD_CONTACT").val(),
            VT_ADD_REG: $("#VT_ADD_REG").val(),
            VT_ID_NUM: $("#VT_ID_NUM").val(),
            VT_CARD_STEP: $("#VT_CARD_STEP").val(),
            VT_CARD_NO: $("#VT_CARD_NO").val(),
            VT_ARMY_ST: $("#VT_ARMY_ST").val(),
          },
          cache: false,
          success: function (data) {
            $("#VT_ID").val(data);
          },
        });
      }

      if (stepNumber == 2) {
        var form = $("form")[0]; // You need to use standard javascript object here
        var formData = new FormData(form);
        $.ajax({
          type: "POST",
          url: "vtp_add_form_db2.php",
          data: formData,
		  contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
		  processData: false, // NEEDED, DON'T OMIT THIS

          success: function (data) {
			// window.location = 'index.php'
		  },
        });
      }
      var res = $('form[name="form-wizard"]')
        .parsley()
        .validate("step-" + (stepNumber + 1));
      return res;
    }
  );

  $("#wizard").keypress(function (event) {
    if (event.which == 13) {
      $("#wizard").smartWizard("next");
    }
  });
};

var FormWizardValidation = (function () {
  "use strict";
  return {
    //main function
    init: function () {
      handleBootstrapWizardsValidation();
    },
  };
})();

$(document).ready(function () {
  FormWizardValidation.init();
});
