<div class="barra-lateral">
    <div class="nombre-pagina">
        <ion-icon id="cloud" name="menu-outline"></ion-icon>
       <span onclick="window.location.href='../'">flexia</span>
    </div>
    <nav class="navegacion">
        <ul><li>
        <a href="./">
            <ion-icon name="home-outline"></ion-icon>
            <span>inicio</span>
        </a>
        <li>
        <a href="./rutinas/">
            <ion-icon name="barbell-outline"></ion-icon>
            <span>rutinas</span>
        </a>
        <li>
        <a href="#" onclick="mostrarAlerta()">
            <ion-icon name="ribbon-outline"></ion-icon>
            <span>Desafíos</span>
        </a>
        <li>
        <a href="#" onclick="mostrarAlerta()">
            <ion-icon name="megaphone-outline"></ion-icon>
            <span>novedades</span>
        </a>
        <li>
        <a href="./usuario_info">
            <ion-icon name="person-outline"></ion-icon>
            <span>usuario</span>
        </a>
        </ul>
    </nav>
    <div class="linea"></div>
    
   </div>
   <script>
    function mostrarAlerta() {
    alert("¡Trabajaremos fuerte para habilitarlo  !");
}
   </script>
   <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
   <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
   <script src="./sidebar.js"></script>
   <link rel="stylesheet" href="sidebar.css">