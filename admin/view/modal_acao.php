<?php
$query = "SELECT * FROM `tb_cartao` LEFT JOIN tb_cliente on tb_cartao.tb_cartao_id_user = tb_cliente.id_user  WHERE card_novo = 1 and tb_cartao.situacao = 0 GROUP BY tb_cliente.id_user";
$sql = mysqli_query($con, $query);
$row = mysqli_num_rows($sql);
if ($row > 0) {
  while ($value = mysqli_fetch_assoc($sql)) { 

    echo '<div class="modal fade" id="exampleModal-'.$value["id_cartao"].'" tabindex="-2" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">';
?>

    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
         <div class="modal-body">
          <div class="modal-title">
            <h4>Aprovar Cartão</h4><br>
            <strong ><h4>Número Cartao</strong> <?php echo "00".$value["num_cartao"];?></h4>
          </div>
          <form method="post" action="../aprovar.php">
            <div class="modal-header row">
              <div class="col-md-4 col-sm-12">
              </div>
            </div>

            <div class="modal-body row">
              
             <div class="col-md-7 mb-3">
              <label for="message-text" class="col-form-label">Justificativa:</label>
              <textarea class="form-control" name="justificativa" style="height: 20vh;" id="message-text" placeholder="Escreva aqui... " required></textarea>
            </div>
            <div class="col-md-5"> 
              <div class="col-md-12 mt-3 text-center">
                <h5 class="text-center ">Aprovação</h5>
                <div class="btn-group btn-group-toggle " data-toggle="buttons">
                  <label class="btn btn-outline-success font-weight-bold ">
                    <input type="radio" name="options" id="option2" value="1" autocomplete="off" > Aprovado
                  </label>
                  <label class="btn btn-outline-danger font-weight-bold ">
                    <input type="radio" name="options" id="option3" value="2" autocomplete="off"> Não Aprovado
                  </label> 
                </div>
              </div> 
            </div>
            <input type="hidden" name="id_cartao" value="<?php echo $value['id_cartao'];?>">
            <div class="modal-footer col-md-12"> 
             <button type="submit" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter"> Enviar</button>
             <button type="button" class="btn btn-danger w-25" data-dismiss="modal">Fechar</button>
           </div>
         </div>
       </form>  
     </div>
   </div>
 </div>
</div>
</div>
<?php
  }
    }
$query = "SELECT * FROM `tb_cartao` LEFT JOIN tb_cliente on tb_cartao.tb_cartao_id_user = tb_cliente.id_user  WHERE card_novo = 0 and tb_cartao.situacao = 0 GROUP BY tb_cliente.id_user";
$sql = mysqli_query($con, $query);
$row = mysqli_num_rows($sql);
if ($row > 0) {
  while ($value = mysqli_fetch_assoc($sql)) { 

    echo '<div class="modal fade" id="exampleModal_novo-'.$value["id_cartao"].'" tabindex="-2" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">';
?>

    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
         <div class="modal-body">
          <div class="modal-title">
            <h4>Aprovar Cartão</h4><br>
            <strong ><h4>Número Cartao</strong> <?php echo "00".$value["num_cartao"];?></h4>
          </div>
          <form method="post" action="../aprovar.php">
            <div class="modal-header row">
              <div class="col-md-4 col-sm-12">
              </div>
            </div>

            <div class="modal-body row">
              
             <div class="col-md-7 mb-3">
              <label for="message-text" class="col-form-label">Justificativa:</label>
              <textarea class="form-control" name="justificativa" style="height: 20vh;" id="message-text" placeholder="Escreva aqui... " required></textarea>
            </div>
            <div class="col-md-5"> 
              <div class="col-md-12 mt-3 text-center">
                <h5 class="text-center ">Aprovação</h5>
                <div class="btn-group btn-group-toggle " data-toggle="buttons">
                  <label class="btn btn-outline-success font-weight-bold ">
                    <input type="radio" name="options" id="option2" value="1" autocomplete="off" > Aprovado
                  </label>
                  <label class="btn btn-outline-danger font-weight-bold ">
                    <input type="radio" name="options" id="option3" value="2" autocomplete="off"> Não Aprovado
                  </label> 
                </div>
              </div> 
            </div>
            <input type="hidden" name="id_cartao" value="<?php echo $value['id_cartao'];?>">
            <div class="modal-footer col-md-12"> 
             <button type="submit" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter"> Enviar</button>
             <button type="button" class="btn btn-danger w-25" data-dismiss="modal">Fechar</button>
           </div>
         </div>
       </form>  
     </div>
   </div>
 </div>
</div>
</div>
<?php
}}
?>