function przelicz() {
    let L = parseInt(document.getElementById("liczba").value)
    if(isNaN(L)){
        document.getElementById("wynik").innerHTML = "Podaj liczbe";
        return
    }
    let B = "";
    while (L > 0) {
        B += (L % 2);
        L = Math.floor(L / 2);
    }
    B = B.split("").reverse().join("");

    let wynikPodzielony = "";
    let licznik = 0;

    for(let i = B.length - 1; i >=0; i--) {
        wynikPodzielony = B[i] + wynikPodzielony;
        licznik++;

        if (licznik % 4 === 0 && i !==0){
            wynikPodzielony = " " + wynikPodzielony;
        }
    }
    document.getElementById("wynik").innerHTML = wynikPodzielony + "<sub>(2)</sub>";
}