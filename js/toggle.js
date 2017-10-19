// get the array with all the links and traverse it binding the click event
var allHasChildren = document.querySelectorAll(".menu-item-has-children a > svg");

for (var x = 0; x < allHasChildren.length; x++) {
    allHasChildren[x].onclick = function(event) {
        event.preventDefault()
        // get the first submenu and toggle using classes
        var subMenu = this.parentNode.parentNode;
        if (subMenu.classList.contains('active')) {
            subMenu.classList.remove("active");
        } else {
            subMenu.classList.add("active");
        }
    }
}
