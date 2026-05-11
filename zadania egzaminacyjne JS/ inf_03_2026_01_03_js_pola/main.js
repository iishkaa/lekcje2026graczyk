let f1 = document.getElementById("f1")
let f2 = document.getElementById("f2")
let figura = document.getElementById("figura")
let wynik = document.getElementById("wynik")
let btn = document.getElementById("btn")
let bokpodstawa = document.getElementById("bokpodstawa").value
let bokwysokosc = document.getElementById("bokwysokosc").value
let pole = "";
f1.addEventListener("click", function () {
    document.getElementById("figura").style.backgroundImage = "1d.bmp"
})
f2.addEventListener("click", function (){
    document.getElementById("figura").style.backgroundImage = "2d.bmp"
})
btn.addEventListener("click", function (){
    if (f1.onclick()) {
        pole = 0.5 * bokpodstawa * bokwysokosc
    }
    else if (f2.onclick()){
        pole = bokwysokosc * bokpodstawa
    }
})
wynik.innerHTML = pole