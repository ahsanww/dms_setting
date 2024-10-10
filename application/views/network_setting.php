<?php

//   foreach($data->result_array() as $i){
//     $nama_gi=$i['nama_gi'];
//     $nama=$i['nama'];
//     $kode=$i['kode_mesin'];
// }
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Network Setting</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Network Setting</li>
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
                <h3 class="card-title">Network Setting</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form"action= "update" method="post">
                <div class="card-body">
                  <input hidden type="text" id="kode_mesin" name="kode_mesin" value="<?php echo $kode_mesin;?>">
                  <div class="form-group">
                    <label for="input_ipserver">IP Server</label>
                    <input type="text" class="form-control" id="input_ipserver" name="input_ipserver" placeholder="IP SERVER DMS" value="<?php echo $ipserver;?>">
                  </div>
                    <div class="form-group">
                      <label for="input_ipserver">IP GIPAT</label>
                      <input type="text" class="form-control" id="input_ipserver" name="input_ipgipat" placeholder="IP SERVER GI Patrol" value="<?php echo $ipgipat;?>">
                    </div>
                  <div class="form-group">
                    <label for="input_iplocal">IP Address</label>
                    <input type="text" class="form-control" id="input_iplocal" name="input_iplocal" placeholder="IP Address" value="<?php echo $iplocal?>">
                  </div>
                  <div class="form-group">
                    <label for="input_netmask">Netmask</label>
                    <input type="text" class="form-control" id="input_netmask" name="input_netmask" placeholder="Netmask" value="<?php echo $netmask;?>">
                  </div>
                  <div class="form-group">
                    <label for="input_dns">DNS</label>
                    <input type="text" class="form-control" id="input_dns" name="input_dns" placeholder="DNS" value="<?php echo $dns;?>">
                  </div>
                  <div class="form-group">
                    <label for="input_gateway">Gateway</label>
                    <input type="text" class="form-control" id="input_gateway" name="input_gateway" placeholder="Gateway" value="<?php echo $gateway;?>">
                  </div>
                  <div class="form-group">
                    <label for="input_gateway">MQTT SERVER</label>
                    <input type="text" class="form-control" id="input_mqtt_server" name="mqtt_server" placeholder="MQTT" value="<?php echo $mqtt_server;?>">
                  </div>
                  <div class="form-group">
                    <label for="input_gateway">MQTT Port</label>
                    <input type="text" class="form-control" id="input_mqtt_port" name="mqtt_port" placeholder="Port" value="<?php echo $mqtt_port;?>">
                  </div>
                  <div class="form-group">
                    <label for="input_gateway">MQTT Username</label>
                    <input type="text" class="form-control" id="input_mqtt_username" name="mqtt_username" placeholder="Username" value="<?php echo $mqtt_username;?>">
                  </div>
                  <div class="form-group">
                    <label for="input_gateway">MQTT Password</label>
                    <input type="password" class="form-control" id="input_mqtt_password" name="mqtt_pass" placeholder="Password" value="<?php echo $mqtt_pass;?>">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" onClick = "save()" class="btn btn-success col-md-2 float-right">Save &nbsp<i class="fas fa-envelope"></i></button>
                </div>
              </form>
            </div>

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
