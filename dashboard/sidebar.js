
const cloud = document.getElementById("cloud");
const barralateral = document.querySelector(".barra-lateral");
const spans = document.querySelectorAll("span");
const palanca = document.querySelector(".switch");
const circulo =document.querySelector(".circulo");
const base = document.querySelector(".base");

palanca.addEventListener("click",()=>{
    let body = document.body;
    body.classList.toggle("modo-oscuro");
    circulo.classList.toggle("prendido");
    base.classList.toggle("apagado");
})

cloud.addEventListener("click",()=>{
    barralateral.classList.toggle("mini-barra-lateral");

    spans.forEach((span)=>{
        span.classList.toggle("oculto");
    });
});


