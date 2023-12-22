function barraLateralResponsive() {
    var sidebar = document.getElementById("sidebar");
    var main = document.getElementById("main-conteudo-total");
    if (sidebar.classList.contains("mostrar")) {
        sidebar.classList.remove("mostrar");
        main.classList.remove("com-margem");
    } else {
        sidebar.classList.add("mostrar");
        main.classList.add("com-margem");
    }

    if (window.innerWidth >= 768) {
        sidebar.classList.remove("com-margem");
        main.classList.remove("mostrar");
    }
}
