function goToFundamentoTeorico() {
    // Obtiene la sección "Fundamento Teorico" por su id
    const section = document.getElementById("fundamento-teorico");
    if (section) {
        // Desplazarse suavemente a la sección "Fundamento Teorico"
        section.scrollIntoView({ behavior: "smooth" });
    }
}
