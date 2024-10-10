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
            <h1 class="m-0 text-dark">Dashboard</h1>
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
                <h3 class="card-title">Disturbance Record</h3>
              </div>
              <div class="card-body">
                <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"></div><div class="col-sm-12 col-md-6"></div></div><div class="row"><div class="col-sm-12">
                <table id="dr_table" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example2_info">      
                  <thead>
                    <tr role="row">
                      <th style ="width:1%">No</th>
                      <th style ="width:15%">Date</th>
                      <th>ID</th>
                      <th class="sorting">Device Name</th>
                      <th class="sorting">File Name</th>
                      <th class="sorting"> IP/Port</th>
                      <th class="sorting"> Rack Location</th>
                       <th class="sorting">Status</th>
                      <th class="sorting">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    $no=1;
                    foreach($data->result_array() as $i):?>
                          <tr>
                          <th><?php echo $no++;?></th>
                          <td><?=$i['time_stamp']?></td>
                          <TD><?=$i['id_device']?></TD>
                          <td><?php echo $i['type']; ?></a></td>
                          <td><?php echo $i['nama']; ?></a></td>
                          <td><?php if($i['port_type']==0){echo "Port:".($i['port_number']+1);} else{echo "IP ".$i['ip_address'];} ?></td>
                          
                          <td><?php echo $i['rack_location']; ?></a></td>
                          <?php 
                            $sts=""; 
                            $clas_sts=""; 
                            
                            if($i['flag']==0){$sts= "Failed";$clas_sts="btn-warning";}
                              else if($i['flag']==1){$sts= "Success";$clas_sts="btn-success";}
                              else if($i['flag']==2){$sts= 'Failed';$clas_sts="btn-danger";}?>
                         <td class="<?=$clas_sts?>" ><?=$sts?></td> 
                          <td ><center><a href="<?php echo base_url();?>assets/api/file_dr/<?php echo $i['nama'];?>.zip" class="fas fa-download text-danger"></a></center></td>  
                        </tr>
                    <?php endforeach;?>
                  </tbody>
                
                </table>
              </div>
            </div>
          </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  </body>
  <script>
    $( document ).ready(function() {
          $("#dr_table").DataTable({
           searching: false,
          })
         
      })

  </script>
</html>
