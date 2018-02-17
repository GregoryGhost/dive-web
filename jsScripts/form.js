function autofillForm(form) {
	function filter(elem) {
        var result = true;
        // console.log(typeof(elem));
        switch (elem) {
            case "button":
                result = false;
                break;
            case "submit":
                result = false;
                break;
            case "reset":
                result = false;
                break;
            case "select":
                result = false;
                break;
            case "hidden":
				result = false;
				break;
            default:
                result = true;
        }
        return result;
    };
    for (var i = 0; i < form.elements.length; i++) {

        var el = form.elements[i];
        if (filter(el.type) && el.placeholder != undefined) {
            el.value = el.placeholder;
            console.log(`${el.name} - ${el.placeholder} - ${el.value}`);
        }
    }
}


/*$(document).ready(
    function() {
        $("#validOnServer").click(() => {
            //var form = document.querySelector("#formEditProfile");
            var form = $('#formEditProfile')[0];
            if (form.checkValidity()) {
                var dataForValid = $("#firstName").val();
                $.ajax({
                    type: $(form).attr('method'),
                    url: $(form).attr('action'),
                    data: "name=" + dataForValid,
                    success: function(data) {
                        location.href = data;
                    }
                });
            } else {
                document.querySelector('input[type="submit"]').click();
            }
        });
    }
);
*/
