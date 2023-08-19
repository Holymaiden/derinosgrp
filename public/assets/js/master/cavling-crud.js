$(document).ready(function () {
    //get tag polygon 
    var polygon = document.querySelectorAll("polygon");
    //get data-d ketika d clik 
    polygon.forEach(function (element) {
        element.addEventListener("click", function () {
            var id = element.getAttribute("data-id");
            alert(id);
        });
    });

});