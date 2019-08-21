var sidebar__dropdown = document.getElementsByClassName("sidebar__dropdown"),
    dropdown__arrow = document.getElementsByClassName("dropdown__arrow"),
    dropdown__link = document.getElementsByClassName("dropdown__link");



window.onload = function() {
    sidebar__dropdown[0].classList.add("invisible"), sidebar__dropdown[1].classList.add("invisible")
};

function dropdownShow() {
    dropdown__link[0].onclick = function() {
        dropdown__link[0], sidebar__dropdown[0].classList.toggle("invisible"), dropdown__arrow[0].classList.toggle("dropdown__arrow-rotate")
    }, dropdown__link[1].onclick = function() {
        sidebar__dropdown[1].classList.toggle("invisible"), dropdown__arrow[1].classList.toggle("dropdown__arrow-rotate")
    }
}