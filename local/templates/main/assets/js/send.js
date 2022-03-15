function validate(form) {
    let errors = false;
    let inputs = $(form).find("input");
    for (let input of inputs) if (input.hasAttribute('required')) {
        if (input.val == "")
        {
            setTextErrors(input.attr("id"), "Заполните это поле")
            errors = true;
        }
    }

    let patternPhone = /^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/;

    if ($("#phone").val().search(patternPhone) !== 0) {
        setTextErrors("phone", "Неверный формат")
        errors = true;
    }

    return !errors;
};

function setTextErrors(input, text) {
    $("#"+input).next(".error").text(text);
    console.error(input, text);
}

$(document).ready(function() {
$("#feedback_form").on("submit", function(event) {
    event.preventDefault();
    if (validate(this)) {
        $.ajax({
            url: '/local/ajax/form.php',
            method: 'post',
            dataType: 'json',
            data: $(this).serialize(),
            success: function(data) {
                if (data?.errors)
                {
                    console.log(data.errors);
                    data.errors.forEach(error => {
                        setTextErrors(error, data.message)
                    });
                }
                else SuccessfulExecution();
            }
        });
    }
});
});

function SuccessfulExecution() {
    $("input").val('');
    $("#feedback_form").children(".box-boxs-input").addClass("invisible");
    $("#feedback_form").children("button").addClass("invisible");
    $("#feedback_form").children("span:first").addClass("nameform");
    $("#feedback_form").children(".index-form-complete-text-complete").removeClass("invisible");
};

