function setHandlerForMenus() {
    function setElementStyle(elementDomParent, elementTarget) {
        var nav = document.getElementById(elementDomParent);
        if(nav != null)
			var menus = nav.getElementsByTagName(elementTarget);
        
        if(menus != null){
			for (var i = 0; i < menus.length; i++) {
				menus[i].className = "item";
				menus[i].onmouseover = (e) => {
					e.srcElement.className = "selected";
				};
				menus[i].onmouseout = (e) => {
					e.srcElement.className = "item";
				};
			}
		}
    }
    setElementStyle('nav', 'a');
    setElementStyle('news', 'a');
}
