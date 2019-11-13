<h1>{{modeDsc}}</h1>
<section class="row">
  <form action="index.php?page=dinosauriosform" method="post" class="col-8 col-offset-2">
    {{if hasErrors}}
      <section class="row">
        <ul class="error">
          {{foreach errores}}
            <li>{{this}}</li>
          {{endfor errores}}
        </ul>
      </section>
    {{endif hasErrors}}

    <input type="hidden" name="mode" value="{{mode}}"/>
    <input type="hidden" name="xcfrt" value="{{xcfrt}}"/>
    <input type="hidden" name="btnConfirmar" value="Confirmar"/>

    {{if showIdDinosaurios}}
    <fieldset class="row">
      <label class="col-5" for="iddinosaurios">Código de Dinosaurio: </label>
      <input type="text" name="iddinosaurios" id="iddinosaurios" readonly value="{{iddinosaurios}}" class="col-7" />
    </fieldset>
    {{endif showIdDinosaurios}}

    <fieldset class="row">
      <label class="col-5" for="dsc">Nombre: </label>
      <input type="text" name="dsc" id="dsc" {{readonly}} value="{{dinosauriosNombre}}" class="col-7" />
    </fieldset>

    <fieldset class="row">
      <label class="col-5" for="pesodinosaurios">Peso (ton): </label>
      <input type="text" name="pesodinosaurios" id="pesodinosaurios" {{readonly}} value="{{dinosauriosPeso}}" class="col-7" />
    </fieldset>

    <fieldset class="row">
      <label class="col-5" for="clasedinosaurios">Clase: </label>
      <input type="text" name="clasedinosaurios" id="clasedinosaurios" {{readonly}} value="{{dinosauriosClase}}" class="col-7" />
    </fieldset>

    <fieldset class="row">
      <label class="col-5" for="epodinosaurios">Epoca: </label>
      <select name="epodinosaurios" id="epodinosaurios" class="col-7" {{selectDisable}} {{readonly}} >
        {{foreach epocaDinosaurios}}
          <option value="{{cod}}" {{selected}}>{{dsc}}</option>
        {{endfor epocaDinosaurios}}
      </select>
    </fieldset>

    <fieldset class="row">
      <div class="right">
        {{if showBtnConfirmar}}
        <button type="button" id="btnConfirmar" >Confirmar</button>
        &nbsp;
        {{endif showBtnConfirmar}}
        <button type="button" id="btnCancelar">Cancelar</button>
      </div>
    </fieldset>
  </form>
</section>

<script>
  $().ready(function(){
    $("#btnCancelar").click(function(e){
      e.preventDefault();
      e.stopPropagation();
      location.assign("index.php?page=dinosaurioslist");
    });
    $("#btnConfirmar").click(function(e){
      e.preventDefault();
      e.stopPropagation();
      /*Aqui deberia hacer validación de datos*/
      document.forms[0].submit();
    });
  });
</script>
