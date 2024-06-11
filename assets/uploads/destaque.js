function destacarEContarOcorrenciasPalavra() {
    let palavra = document.getElementById("busca").value;

    if (typeof palavra !== 'string' || palavra.trim() === '') {
        console.error('Por favor, forneça uma palavra válida para busca.');
        return 0;
    }

    palavra = palavra.trim().toLowerCase();

    // Esta função irá envolver as ocorrências da palavra com um span e aplicar um estilo
    const destacarPalavraNoTexto = (texto, palavra) => {
        const span = document.createElement('span');
        span.className = 'destacada';
        span.style.backgroundColor = 'yellow'; // Cor do destaque
        span.textContent = texto;
        return span.outerHTML;
    };

    // Capturamos todos os elementos que contêm texto na página
    let contador = 0;
    const bodyTextNodes = document.querySelectorAll('body *:not(script):not(style):not(noscript)');
    bodyTextNodes.forEach(element => {
        if (element.childNodes.length) {
            element.childNodes.forEach(child => {
                if (child.nodeType === Node.TEXT_NODE) {
                    const textContent = child.textContent.toLowerCase();
                    if (textContent.includes(palavra)) {
                        const regex = new RegExp(`(\\b${palavra}\\b)`, 'gi'); // Regex para garantir palavras inteiras
                        const highlightedText = child.textContent.replace(regex, (match) => {
                            contador++;
                            return destacarPalavraNoTexto(match, palavra);
                        });
                        const tempElement = document.createElement('div');
                        tempElement.innerHTML = highlightedText;
                        while (tempElement.firstChild) {
                            element.insertBefore(tempElement.firstChild, child);
                        }
                        element.removeChild(child);
                    }
                }
            });
        }
    });

    return contador;
}

function removerDestaques() {
    const destaques = document.querySelectorAll('.destacada');
    destaques.forEach(destaque => {
        const parent = destaque.parentNode;
        // Substitui o span pelo seu texto original
        if (parent) {
            parent.replaceChild(document.createTextNode(destaque.textContent), destaque);
        }
    });
}