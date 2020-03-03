  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="card card-default">
        <div class="card-header">
          <div class="d-inline-block">
              <h3 class="card-title"> <i class="fa fa-plus"></i>
              Add New Tipo </h3>
          </div>
          <div class="d-inline-block float-right">
            <a href="<?= base_url('admin/tipos'); ?>" class="btn btn-success"><i class="fa fa-list"></i>  tipos List</a>
          </div>
        </div>
        <div class="card-body">

           <!-- For Messages -->

            <?php $this->load->view('admin/includes/_messages.php') ?>

            <?php echo form_open(base_url('admin/tipos/add'), 'class="form-horizontal"');  ?> 
            <?php "<br />"; ?>
			
              <div class="form-group">
                <label for="tipo" class="col-md-6 control-label">Nome do tipo</label>
                <div class="col-md-12">
                  <input type="text" name="tipo" class="form-control" id="tipo" placeholder="">
                </div>
              </div>

              <div class="form-group">

                <div class="col-md-12">

                  <input type="submit" name="submit" value="Adicionar Tipo" class="btn btn-primary pull-right">

                </div>

              </div>

            <?php echo form_close( ); ?>

        </div>
          <!-- /.box-body -->
      </div>
    </section> 
  </div>