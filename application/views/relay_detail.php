
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
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    
    <!-- Main content -->
   <p  id="monitor"></p>
   <p hidden id="page">monitor<?php //echo json_encode($data->result_array());?></p>
    <section  class="content">
      <div class="container-fluid">
      <div  class="row">
  
        </div>
       
      </div>
     
   
    <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 style="margin:-1px"> RELAY Detail</h3>
               </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>                      
                      <th>No</th>
                      <th>ID</th>
                      <th>DEVICE NAME</th>
                      <th>IP/PORT</th>
                      <th>Domain Id</th>
                      <th>Item Id</th>
                      <th>Name</th>
                      <th>Data Type</th>
                      <th>Value</th>
                  </thead>
                  <tbody>
                    <?php
                    $no =1;
                   foreach ($data->result_array() as $x) {
                    ?>
                     <tr>
                        <td ><?=$no?></td>
                        <td ><?=$x['id_device']?></td>
                        <td ><?=$x['type']?></td>
                        <td ><?php if($x["port_type"]=="0"){echo "PORT:".($x['port_number']+1);}else{echo "IP:".$x['ip'];}?></td>
                        <td ><?=$x['domain_id']?></td>
                        <td ><?=$x['item_id']?></td>
                        <td ><?=$x['name']?></td></td>
                        <td><?=$x['data_type']?></td></td>
                        <td  class="dt_<?=$x['alias']?> btn-primary" ><span class="val_<?=$x['alias']?>">0</span><span> <?=$x['unit']?></span></td>
                      <tr>
                      <?php $no++;}
                    ?>
                  
                      
                   
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  </body>
  <script>
    window.addEventListener('load', function () {
    let monitor = JSON.parse($('#monitor').text());
    //console.log(monitor)
    
// update the value randomly
  //setInterval(() => {
  //  gauge[1].refresh(Math.random() * 100);
  //}, 5000)
})
   
  </script>
</html>
