function wykonane(btn) {
    btn.parentElement.style.textDecoration = "line-through";
}
function dodaj(){
    let tekst = document.getElementById("zadanie").value;
    let li = document.createElement("li");

    li.innerHTML = tekst + '<button onclick="wykonane(this)">Wykonane</button>';
    document.getElementById("lista").appendChild(li);
}