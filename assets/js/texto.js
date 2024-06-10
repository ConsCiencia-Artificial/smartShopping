function aumentarTexto() {
    var tamanhoAtual = window.getComputedStyle(document.getElementById("texto")).fontSize;
    var novoTamanho = parseFloat(tamanhoAtual) * 1.2; // Aumenta 20%
    document.getElementById("texto").style.fontSize = novoTamanho + "px";
}

function diminuirTexto() {
    var tamanhoAtual = window.getComputedStyle(document.getElementById("texto")).fontSize;
    var novoTamanho = parseFloat(tamanhoAtual) * 0.8; // Diminui 20%
    document.getElementById("texto").style.fontSize = novoTamanho + "px";
}