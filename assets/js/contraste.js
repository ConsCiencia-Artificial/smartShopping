function alterarContraste(contraste) {
  document.body.classList.remove('alto-contraste', 'baixo-contraste');
  document.body.classList.add(contraste + '-contraste');
}