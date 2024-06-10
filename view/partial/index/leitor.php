<footer>
  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <div class="dropdown position-fixed bottom-50 end-0 acessibilidade ">
          <button class="btn btn-danger" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://cdn-icons-png.flaticon.com/512/7118/7118029.png" style="width: 15px;" alt="">
          </button>
          <ul class="dropdown-menu controles">
            <li><a class="dropdown-item" href="#" onclick="lerTexto()">Leitor de Texto</a></li>
            <li><a class="dropdown-item" href="#" onclick="alterarContraste('alto')">Tema Dark</a></li>
            <li><a class="dropdown-item" href="#" onclick="alterarContraste('baixo')">Tema Light</a></li>

            <li><a class="dropdown-item" href="#" onclick="aumentarTexto()">
                <!-- <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSVjhINO7amZ1uy9x61XcLipDST2zaEV-GPkCL5nqW4ppdu6bAIBHpUDlvAhm68ozh4DRs&usqp=CAU" alt="Ler texto" onclick="aumentarTexto()" style="width: 15%;"> -->
                Aumentar Texto
              </a></li>
            <li><a class="dropdown-item" href="#" onclick="diminuirTexto()"> Diminuir Texto
                <!-- <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQG8yGP2XQjuRqa_aJno3jlnYyxDyOgU1dZzTxrTFcbLQ&s" alt="Ler texto" onclick="diminuirTexto()" style="width: 15%;"> -->
              </a></li>
          </ul>
        </div>
      </div>
      <!-- NÃO FUNCIONA POR HORA -->

      <!-- <div class="col">
            <a class="dropdown-item" href="#" onclick="aumentarTexto()">
              <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSVjhINO7amZ1uy9x61XcLipDST2zaEV-GPkCL5nqW4ppdu6bAIBHpUDlvAhm68ozh4DRs&usqp=CAU" alt="Ler texto" onclick="aumentarTexto()" style="width: 15%;">
            </a>
            <a class="dropdown-item" href="#" onclick="diminuirTexto()">
              <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQG8yGP2XQjuRqa_aJno3jlnYyxDyOgU1dZzTxrTFcbLQ&s" alt="Ler texto" onclick="diminuirTexto()" style="width: 15%;">
            </a>
          </div> -->
    </div>
  </div>
</footer>

<!-- <div class="controles">
  <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSVjhINO7amZ1uy9x61XcLipDST2zaEV-GPkCL5nqW4ppdu6bAIBHpUDlvAhm68ozh4DRs&usqp=CAU" alt="Ler texto" onclick="aumentarTexto()">
  <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQG8yGP2XQjuRqa_aJno3jlnYyxDyOgU1dZzTxrTFcbLQ&s" alt="Ler texto" onclick="diminuirTexto()">
</div> -->

<script>
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
</script>