  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Device Setting</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Device Setting</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Device Setting</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action= "update_mesin" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="input_machine">Machine Code</label>
                    <input disabled type="text" class="form-control" id="input_machine" name="kode_mesin" placeholder="Machine Code" value="<?php echo $kode;?>">
                  </div>
                  <!-- $nama_gi=$i['nama_gi'];
    $nama=$i['nama'];
    $kode=$i['kode_mesin']; -->
                  <div class="form-group">
                    <label for="input_gi">GI Name</label>
                    <input type="text" class="form-control" id="input_gi" name="input_gi" placeholder="GI Name" value="<?php echo $nama_gi?>">
                  </div>
                  <div class="form-group">
                    <label for="input_device">Device Name</label>
                    <input type="text" class="form-control" id="input_device" name="input_device" placeholder="Device Name" value="<?php echo $nama;?>">
                  </div>           
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-success float-right col-md-2 " onclick="save()">Save <i class="fas fa-envelope"></i></button>
                </div>
              </form>
            </div>
            <!-- /.card -->

           
            <!-- /.card -->

          </div>
      
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  </body>
  <script>
    function save(){
      alert("Data Updated")
    }
  </script>
</html>
