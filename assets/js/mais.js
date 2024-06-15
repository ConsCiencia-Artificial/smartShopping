// Script para mostrar/ocultar a descrição completa ao clicar no botão "Leia mais"
document.addEventListener('DOMContentLoaded', function () {
    var btnSaibaMais = document.querySelector('.btn-saiba-mais');
    var descricaoResumida = document.querySelector('.descricao-resumida');
    var descricaoCompleta = document.querySelector('.descricao-completa');

    if (btnSaibaMais && descricaoCompleta && descricaoResumida) {
        btnSaibaMais.addEventListener('click', function () {
            if (descricaoCompleta.style.display === 'none') {
                descricaoResumida.style.display = 'none';
                descricaoCompleta.style.display = 'block';
                btnSaibaMais.textContent = 'Mostrar menos';
            } else {
                descricaoResumida.style.display = 'block';
                descricaoCompleta.style.display = 'none';
                btnSaibaMais.textContent = 'Leia mais';
            }
        });
    }
});