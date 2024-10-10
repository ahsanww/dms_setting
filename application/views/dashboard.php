
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
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <p hidden id="page">dashboard</p>
    <!-- Main content -->
    <input hidden type="text" id ="page" value="overview">
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
       
          <?php foreach($data->result_array() as $i):?>  
                  <?php $port_type = $i['port_type'];
                        if($port_type=='0'){
                          $port_type="Modbus Port ".$i['port_number'];
                        }
                        else if($port_type=='1'){
                          $port_type="TCP/IP :".$i['ip_address'] ;
                        }
                        else if($port_type=='2'){
                          $port_type="IEC61850 IP:".$i['ip_address'] ;
                        }
                        else{
                          $port_type="other";
                        }
                  ?>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h4><?php echo $i['type']?></h4>
                <h6> <?php echo $port_type;?></h6>
              </div>
              <div class="icon">
                <i class="ion ion-android-desktop"></i>
              </div>
              <a href="#" class="small-box-footer" onClick="gotoMonitor(<?php echo $i['id_device']?>)">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <?php endforeach;?> 
          <!-- ./col -->
          <div class="col-md-12" id="overview">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"><b>OVERVIEW</b></h4>
              </div>
                <img class="col-md-12" src="<?php echo base_url()?>assets/dist/img/overview.png" alt="">
              </div>
            </div>
          </div>
        </div>


        <div class="col-md-12 d-none d-flex flex-wrap" id="monitor">
           
        
           
        </div>


      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  </body>
</html>
<script>
 function gotoMonitor(id){
  window.location.replace("../relay/detail?id="+id);
  //  $('#overview').addClass('d-none')
   // $('#monitor').removeClass('d-none')
    //alert($('#page').val())
    //$('#page').val("monitor")

    }
</script>
