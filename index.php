<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>principal</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="JS/main.js"></script>
  <link rel="stylesheet" href="CSS/estilo.css">


</head>

<body>
  <form id="cadastro" method="get" action="">

    <div class="form-group row">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Codigo Produto</label>
      <div class="col-sm-10">
        <input type="number" class="form-control" id="inputEmail3" name="codProd"
          placeholder="Insira o codigo do produto">
      </div>
    </div>

    <div class="form-group row">
      <label for="inputPassword3" class="col-sm-2 col-form-label">Descrição do produto</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="descricao" placeholder="Descrição do item adicionado">
      </div>
    </div>

    <div class="form-group row">
      <label for="inputPassword3" class="col-sm-2 col-form-label">Valor do produto</label>
      <div class="col-sm-10">
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text">R$</span>
          </div>
          <input type="text" class="form-control" aria-label="Quantia" name="valor" id="valor">
          <div class="input-group-append">
            <span class="input-group-text">.00</span>
          </div>
        </div>
      </div>
    </div>

    <div class="form-group row">
      <label for="inputPassword3" class="col-sm-2 col-form-label">Quantidade</label>
      <div class="col-sm-10">
        <input type="number" class="form-control" placeholder="quantidade" name="quant" id="quant">
      </div>
    </div>

    <fieldset class="form-group">
      <div class="row">
        <legend class="col-form-label col-sm-2 pt-0">Radios</legend>
        <div class="col-sm-10">
          <div class="form-check">
            <input class="form-check-input" type="radio" name="formaPagto" id="prazo" value="prazo">
            <label class="form-check-label" for="gridRadios1">
              A prazo
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="formaPagto" id="vista" value="vista">
            <label class="form-check-label" for="gridRadios2">
              A vista
            </label>
          </div>
          <div class="form-check disabled">
            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="opcao3" disabled>
            <label class="form-check-label" for="gridRadios3">
              Fiado
            </label>
          </div>
        </div>
      </div>
    </fieldset>

    <div class="form-group row">
      <div class="col-sm-10">
        <button type="submit" class="btn btn-primary" id="Enviar" name="botao" value="Enviar">Enviar</button>
        <button type="submit" class="btn btn-primary" id="Deletar" name="botao" value="Deletar">Deletar</button>



      </div>
    </div>
  </form>
  <h3 id="fim"></h3>
  <h2>RETORNO JSON</h2>
  <div id="resposta"></div>
  <script>
    $(document).ready(function () {
      $('#Enviar').click(function () {
        let dados = $('#cadastro').serialize()
        $.ajax({
          method: 'GET',
          url: 'Alunos.php',
          data: dados,

          beforeSend: function () {
            $("h2").html("em andamento...")

          }
        })
          .done(function (msg) {
            $("h2").html("retorno da inclusão")
            $("#resposta").html(msg)
            alert("deu tudo certo")
          })
          .fail(function () {
            alert("falha")

          })

        return false
      })
    })

    $(document).ready(function () {
      $('#Deletar').click(function () {
        let dados = $('#cadastro').serialize()
        $.ajax({
          method: 'GET',
          url: 'Excluir.php',
          data: dados,

          beforeSend: function () {
            $("h2").html("em andamento...")

          }
        })
          .done(function (msg) {
            $("h2").html("retorno da inclusão")
            $("#resposta").html(msg)
            alert("deu tudo certo")
          })
          .fail(function () {
            alert("falha")

          })

        return false
      })
    })
  </script>
</body>

</html>