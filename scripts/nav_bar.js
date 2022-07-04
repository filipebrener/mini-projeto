window.onload = function () {
    let screen = document.getElementById("screen");
    if(screen){
        let nav_btn = document.getElementById(screen.value);
        nav_btn.classList.add("active");
    }
}