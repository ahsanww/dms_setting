 <?php
  //var_dump($data);

?> 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">LIST DEVICE</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Device Type</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="col-12 col-md-12">
            <div class="card card-success card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link" id="tab-add" data-toggle="pill" href="#custom-tabs-one-profile" onClick="toadd()" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="true">Add New Device &nbsp <i class=" text-white fa fa-plus-circle"></i></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" id="list" data-toggle="pill" href="list" onClick="tolist()" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">List of Device &nbsp <i class=" text-success fa fa-server"></i></a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" >  
                <div class="d-flex flex-wrap tab-pane fade active show" id="tab-add" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
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
                    <div class="small-box bg-success">
                      <div class="inner">
                        <h4><?php echo $i['type'];?></h4>
                        <h6><?php echo $port_type;?></h6>
                        <h6><?php echo $i['rack_location'];?></h6>
                      </div>
                      <div class="icon">
                        <i class="ion ion-android-desktop"></i>
                      </div>
                      <a href="#" onClick="gotoConfig(<?php echo $i['no'];?>)" class="small-box-footer">Configuration &nbsp<i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <?php endforeach;?> 
              </div>
             
            
              <!-- /.card -->
          
          </div>
          
          
          <!-- ./col -->
          
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script>
    function toadd(){
      window.location.replace("type");
    }
    function gotoConfig(id){
      window.location.replace(`load_device?id=${id}`);
    }
     window.addEventListener('load', function () {
      
      $("form#form_add").submit(function() {
        let mydata = $("form#form_add").serialize();
        $.post('add_device',mydata,(data,status)=>{
              //buf= JSON.parse(data)
              if(data=="success"){
              alert(data)
              window.location.replace("../Admin/dashboard");
            }
              
          })
       return false
      })
      $('#port_type').on('change', function() {
        if(this.value == "0"){
          $('.tcp').addClass('d-none')
          $('.serial').removeClass('d-none')
          $('#port_number').empty();
          $.get('get_port',(data,status)=>{
              buf= JSON.parse(data)
              for(let i =0 ;  i<buf.data.length;i++){
                  $('#port_number').append(`<option>${buf.data[i].id_device}</option>`)
              }
          })
          // $('.serial').show()
        }     
      else{
        $('.tcp').removeClass('d-none')
        $('.serial').addClass('d-none')
         // $('.tcp').show()
          // $('.serial').hide()
        }       
        
      })
    })
  </script>
  </body>
</html>
