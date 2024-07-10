function animacion(){
    let textoAnimacion = [
        ["i","n","o","v","a","d","o","r","a","s"],
        ["p","e","r","s","o","n","a","l","i","z","a","d","a","s"]
    ];
    let letrascontador = -1;
    let nivelarray = 0;

    const contenedoranimacion = document.querySelector(".content-text-animacion");

    function pintartexto(){
        letrascontador++;
        contenedoranimacion.textContent += textoAnimacion[nivelarray][letrascontador];

        if(letrascontador === textoAnimacion[nivelarray].length -1){
            clearInterval(intervalo);

            setTimeout(() =>{
                
                intervalo =setInterval(() =>{
                    contenedoranimacion.textContent = "";
                    letrascontador--;
                    textoAnimacion[nivelarray].pop();

                    textoAnimacion[nivelarray].forEach((Elemento) =>{
                        contenedoranimacion.textContent += Elemento;
                    });

                    if(letrascontador <0){
                        clearInterval(intervalo);
                        nivelarray++;
                        intervalo = setInterval(pintartexto, 150);

                        if(nivelarray > textoAnimacion.length -1){
                            clearInterval(intervalo);
                            nivelarray = 0;
                            animacion();
                        }
                    }

                }, 150)
            }, 1000)
        }
    }
    let intervalo = setInterval(pintartexto, 150);
}
window.addEventListener("load", animacion);