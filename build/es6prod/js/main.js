(function($){"use strict";/*==================================================================
    [ Validate ]*/var input=$(".validate-input .input100");$(".validate-form").on("submit",function(){for(var check=!0,i=0;i<input.length;i++){if(!1==validate(input[i])){showValidate(input[i]);check=!1}}return check});$(".validate-form .input100").each(function(){$(this).focus(function(){hideValidate(this)})});function validate(input){if("email"==$(input).attr("type")||"email"==$(input).attr("name")){if(null==$(input).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/)){return!1}}else{if(""==$(input).val().trim()){return!1}}}function showValidate(input){var thisAlert=$(input).parent();$(thisAlert).addClass("alert-validate")}function hideValidate(input){var thisAlert=$(input).parent();$(thisAlert).removeClass("alert-validate")}})(jQuery);