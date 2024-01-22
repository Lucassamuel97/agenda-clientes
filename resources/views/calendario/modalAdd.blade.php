<div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
			<form class="form-horizontal" method="POST" action="full-calender">
            @csrf
			  <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Adicionar Agendamento</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">X</button>
			  </div>
			  <div class="modal-body">
				  <div class="form-group">
					<label for="title" class="col-sm-2 control-label">Titulo</label>
					<div class="col-sm-12">
					  <input type="text" name="title" class="form-control" id="title" placeholder="Titulo" required>
					</div>
				  </div>

				  <div class="form-group">
					<label for="description" class="col-sm-2 control-label">Descrição</label>
					<div class="col-sm-12">
					  <textarea type="text" name="description" class="form-control" id="description" placeholder="Descrição"></textarea>
					</div>
				  </div>

                  <div class="form-group">
					<label for="description" class="col-sm-12 control-label">Selecionar usuário</label>
					<div class="col-sm-12">
                        <select class="form-control" id="client" name="client" >
                            @foreach($clientes as $cliente)
                                <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                            @endforeach
                        </select>
                    </div>
				  </div>
				  
				  <div class="form-group">
					<label for="color" class="col-sm-2 control-label">Cor</label>
					<div class="col-sm-12">
					  <select name="color" class="form-control" id="color">
					  <option value="">Escolher</option>
						  <option style="background-color:#0000FF;color:white" value="#0000FF"> Azul (Tarefa opcional)</option>
						  <option style="background-color:#008000;color:white" value="#008000"> Verde (Tarefa concluida)</option>						  
						  <option style="background-color:#FFD700;color:white" value="#FFD700"> Amarelo (baixa prioridade)</option>
						  <option style="background-color:#FF8C00;color:white" value="#FF8C00"> Laranja (média prioridade)</option>
						  <option style="background-color:#FF0000;color:white" value="#FF0000"> Vermelho (alta prioridade)</option>						  
						</select>
					</div>
				  </div>
				  
				  <div class="form-group">
					<label for="start" class="col-sm-2 control-label">Inicio</label>
					<div class="col-sm-12">
					  <input type="datetime-local" name="start" class="form-control" id="start" required>
					</div>
				  </div>
				  <div class="form-group">
					<label for="end" class="col-sm-2 control-label">Termino</label>
					<div class="col-sm-12">
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