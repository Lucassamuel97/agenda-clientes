<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
			<div class="modal-content">
			<form class="form-horizontal" method="POST" action="full-calender">
             @csrf
             @method('PUT')
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">X</button>
				<!-- <h4 class="modal-title" id="myModalLabel">Adicionar Evento</h4> -->
			  </div>
              <input type="hidden" name="id" id="id">
			  <div class="modal-body">
				  <div class="form-group">
					<label for="title" class="col-sm-2 control-label">Titulo</label>
					<div class="col-sm-10">
					  <input type="text" name="title" class="form-control" id="title" placeholder="Titulo" required>
					</div>
				  </div>

				  <!-- <div class="form-group">
					<label for="descricao" class="col-sm-2 control-label">Descrição</label>
					<div class="col-sm-10">
					  <textarea type="text" name="descricao" class="form-control" id="descricao" placeholder="Descrição"></textarea>
					</div>
				  </div> -->
				  
				  <div class="form-group">
					<label for="color" class="col-sm-2 control-label">Cor</label>
					<div class="col-sm-10">
					  <select name="color" class="form-control" id="color">
					  <option value="">Escolher</option>
						  <option style="color:#0071c5" value="#0071c5">&#9724; Azul Escuro</option>
						  <option style="color:#40E0D0" value="#40E0D0">&#9724; Turquesa</option>
						  <option style="color:#008000" value="#008000">&#9724; Verde</option>						  
						  <option style="color:#FFD700" value="#FFD700">&#9724; Amarelo</option>
						  <option style="color:#FF8C00" value="#FF8C00">&#9724; Laranja</option>
						  <option style="color:#FF0000" value="#FF0000">&#9724; Vermelho</option>
						  <option style="color:#000" value="#000">&#9724; Preto</option>
						  
						</select>
					</div>
				  </div>
				  
				  <div class="form-group">
					<label for="start" class="col-sm-2 control-label">Inicio</label>
					<div class="col-sm-10">
					  <input type="datetime-local" name="start" class="form-control" id="start" required>
					</div>
				  </div>
				  <div class="form-group">
					<label for="end" class="col-sm-2 control-label">Termino</label>
					<div class="col-sm-10">
					  <input type="datetime-local" name="end" class="form-control" id="end" required>
					</div>
				  </div>
				
			  </div>

			  <div class="modal-footer">
				  <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
				  <button type="submit" class="btn btn-primary">Salvar</button>
			  </div>
			</form>
			</div>
		</div>
</div>