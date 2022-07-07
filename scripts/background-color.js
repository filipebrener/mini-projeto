window.onload = function(){
    var colorThief = new ColorThief();
    var sourceImage = document.getElementById("image");
    var color = colorThief.getColor(sourceImage);
    color.push(0.6) // diminuindo a opacidade da cor pra suavizar a tela
    document.body.style.backgroundColor = "rgb(" + color + ")"
}