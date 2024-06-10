function lerTexto() {
    var textoSelecionado = window.getSelection().toString();
    if (textoSelecionado !== '') {
        console.log("Texto selecionado: ", textoSelecionado);
    }

    // Verificar se o navegador suporta a API Web Speech
    if ('speechSynthesis' in window) {
        var synth = window.speechSynthesis;
        var utterance = new SpeechSynthesisUtterance(textoSelecionado);
        synth.speak(utterance);
    } else {
        alert("Seu navegador não suporta a API Web Speech.");
    }
}

