  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="card card-default">
        <div class="card-header">
          <div class="d-inline-block">
              <h3 class="card-title"> <i class="fa fa-plus"></i>
              Add New Ponto </h3>
          </div>
          <div class="d-inline-block float-right">
            <a href="<?= base_url('admin/pontos'); ?>" class="btn btn-success"><i class="fa fa-list"></i>  Pontos List</a>
          </div>
        </div>
        <div class="card-body">

           <!-- For Messages -->

            <?php $this->load->view('admin/includes/_messages.php') ?>

            <?php echo form_open(base_url('admin/pontos/add'), 'class="form-horizontal"');  ?> 
            <?php "<br />"; ?>
			
              <div class="form-group">
                <label for="ponto" class="col-md-6 control-label">Nome do Ponto</label>
                <div class="col-md-12">
                  <input type="text" name="ponto" class="form-control" id="ponto" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <label for="nomefan" class="col-md-6 control-label">Nome Fantasia</label>
                <div class="col-md-12">
                  <input type="text" name="nomefan" class="form-control" id="nomefan" placeholder="">
                </div>
              </div>
			
						<div class="form-group">
                <label for="email" class="col-md-6 control-label">Email</label>
                <div class="col-md-12">
                  <input type="email" name="email" class="form-control" id="email" placeholder="">
                </div>
              </div>						
     
			     <div class="card-body">
                <div class="row">
                  <div class="col-6">
					<label for="responsavel" class="col-md-6 control-label">Responsável</label>
                    <input type="text" name="responsavel" class="form-control" id="responsavel" placeholder="">
                  </div>
					
                  <div class="col-6">
					  <label for="telefone" class="col-md-6 control-label">Telefone</label>
                    <input type="text" name="telefone" class="form-control" id="telefone" placeholder="">
                  </div>
                </div>
              </div>

      		        <div class="card-body">
                <div class="row">
                  <div class="col-6">
					<label for="endereco" class="col-md-6 control-label">Endereço</label>
                    <input type="text" name="endereco" class="form-control" id="endereco" placeholder="">
                  </div>
					
                  <div class="col-6">
					  <label for="numero" class="col-md-6 control-label">Número</label>
                    <input type="text" name="numero" class="form-control" id="numero" placeholder="">
                  </div>
                </div>
              </div>
			   
              <div class="card-body">
                <div class="row">
                  <div class="col-6">
					<label for="cidade" class="col-md-6 control-label">Cidade</label>
                    <input type="text" name="cidade" class="form-control" id="cidade" placeholder="">
                  </div>
					
                  <div class="col-6">
					  <label for="estado" class="col-md-6 control-label">Estado</label>
                    <input type="text" name="estado" class="form-control" id="estado" placeholder="">
                  </div>
                </div>
              </div>

	

              <div class="form-group">

                <div class="col-md-12">

                  <input type="submit" name="submit" value="Adicionar Ponto" class="btn btn-primary pull-right">

                </div>

              </div>

            <?php echo form_close( ); ?>

        </div>
          <!-- /.box-body -->
      </div>
    </section> 
  </div>