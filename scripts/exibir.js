window.onload = function(){
    var colorThief = new ColorThief();
    var sourceImage = document.getElementById("image");
    var color = colorThief.getColor(sourceImage);
    document.body.style.backgroundColor = "rgb(" + color + ")"
}