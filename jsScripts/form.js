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
