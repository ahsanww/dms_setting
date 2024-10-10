 <?php
 //$row= $data->result();
//var_dump ($row[0]["no"]);
//echo $row->tanggal;
//foreach($data->result_array() as $i):
?> 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Update Device</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Update Device</li>
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
                    <a class="nav-link " id="list" data-toggle="pill" href="list" onClick="tolist()" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">List of Device &nbsp <i class=" text-white fa fa-server"></i></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" id="tab-add" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="true">Update Device &nbsp <i class=" text-success fa fa-archive"></i></a>
                  </li>
                  <li class="nav-item d-none iec" >
                    <a class="nav-link" id="tab-SCL" data-toggle="pill" onClick="toscl(<?php echo $no.','.$id_device;?>)" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="true">Generate CID files &nbsp <i class=" text-white fa fa-search"></i></a>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link" id="list" data-toggle="pill" href="list" onClick="toactive(<?php echo $no.','.$id_device;?>)" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">CID Activation &nbsp <i class=" text-white fa fa-check"></i></a>
                  </li>
                  <!-- <li class="nav-item">
                    <a class="nav-link" id="list" data-toggle="pill" href="list" onClick="tolist()" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">List of Device &nbsp <i class=" text-white fa fa-server"></i></a>
                  </li> -->
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" >  
                  <div class="tab-pane fade active show" id="tab-add" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                    
                  <form role="form" id ="form_update" method="post">
                  
                    <!-- <div hidden class="form-group  ">
                      <label  for="protocol">Protocol:</label>
                        <select name="protocol" id="protocol" name="protocol" data-native-menu="false" class="form-control form-control form-control-sm"> 
                          <option value="0">Modbus</option>
                          <option value="1">IEC61850</option>
                      </select>
                    </div> -->
                 
                    <!-- <input type="text" name="type" id="type" value="" placeholder="Ex: Micom P123" data-clear-btn="true"> -->
                    <div class="form-group ">
                      <label for="location">RACK Location</label>
                        <input type="text" required name="location" id="location" data-native-menu="false" class="form-control form-control-sm" value="<?php echo $rack_location;?>">
                        </input>
                    </div>
                     <div hidden class="form-group ">
                      <label for="location">Bay Name</label>
                        <input type="text" name="bay_name" id="bay_name" data-native-menu="false" class="form-control form-control-sm" value="<?php echo $bay_name;?>">
                        </input>
                    </div>
                     <div class="form-group ">
                      <label for="bay_code">Bay Code</label>
                        <input type="text"  name="bay_code" id="bay_code" data-native-menu="false" class="form-control form-control-sm" value="<?php echo $bay_code;?>">
                        </input>
                    </div>
                    <div class="form-group ">
                      <label for="device_type">Device Type</label>
                        <input type="text" required name="device_type" id="device_type" data-native-menu="false" class="form-control form-control-sm" value="<?php echo $type;?>">
                        </input>
                    </div>
                   
                    <div class="form-group">
                      <label for="mode">Mode:</label>
              
                        <select name="mode" id="mode" data-native-menu="false" class="form-control form-control-sm">
                          <option value="0" <?php if($mode=="0") echo 'selected="selected"'; ?> >Pooling Data</option>
                          <option value="1" <?php if($mode=="1") echo 'selected="selected"'; ?> >Manual Remote</option>
                        </select>
                    </div>    
                     <div class="form-group">
                      <label for="disturbance_type">Disturbance Type:</label>
                        <select name="disturbance_type" id="disturbance_type" name="disturbance_type" data-native-menu="false" class="form-control form-control-sm">
                          <option value=""  >Select Mode</option>
                          <option value="1" <?php if($disturbance_type=="0") echo 'selected="selected"'; ?> >No Disturbance</option>
                          <option value="1" <?php if($disturbance_type=="1") echo 'selected="selected"'; ?> >Disturbance Via IEC61850</option>
                          <option value="3" <?php if($disturbance_type=="3") echo 'selected="selected"'; ?> >Disturbance Via Modbus</option>
                        </select>
                    </div>  
                 
                    <div class="form-group ">
                      <label for="location">Disturbance Folder</label>
                        <input type="text" required name="iec_file" id="iec_file" data-native-menu="false" class="form-control form-control-sm" value="<?php echo $iec_file;?>">
                        </input>
                    </div>


                    <div class="form-group ">
                      <label for="location">Device id</label>
                        <!-- <input  type="text" required name="device_id" id="device_id" data-native-menu="false" class="form-control form-control-sm" value="<?php //echo $id_device;?>">
                        </input> -->
                        <select name="device_id" id="device_id" name="device_id" data-native-menu="false" class="form-control form-control-sm">
                          <option value="<?php echo $id_device;?>"><?php echo $id_device;?></option>
                        </select>
                    </div>

                    <div hidden class="form-group ">
                      <label for="location">no</label>
                        <input type="text" required name="no" id="no" data-native-menu="false" class="form-control form-control-sm" value="<?php echo $no;?>">
                        </input>
                    </div>
                    
                    <div hidden class="form-group ">
                      <label for="location">port type</label>
                        <input type="text" required name="port_type" id="port_type" data-native-menu="false" class="form-control form-control-sm" value="<?php echo $port_type;?>">
                        </input>
                    </div>
      
                    <div class="form-group tcp d-none">
                      <label for="ip_addess" name ="ip_addess">IP ADDRESS</label>
                        <input type="text" name="ip_addess" id="ip_addess" data-native-menu="false" class="form-control form-control-sm" value="<?php echo $ip_address?>">
                        </input>
                    </div>    
                    <div class="form-group tcp d-none ">
                      <label for="port_address" >PORT ADDRESS</label>
                        <input type="number" name="port_address" id="port_address" data-native-menu="false" class="form-control form-control-sm" value="<?php echo $port_address?>">
                        </input>
                    </div>  
                    <div class="form-group tcp d-none">
                      <label for="dns">DNS</label>
                        <input type="text" name="dns" id="dns" data-native-menu="false" class="form-control form-control-sm" value="<?php echo $dns?>">
                        </input>
                    </div>   
                    <div class="form-group tcp d-none">
                      <label for="netmask">Netmask</label>
                        <input type="text" name="netmask" id="netmask" data-native-menu="false" class="form-control form-control-sm" value ="<?php echo $netmask?>">
                        </input>
                    </div>   
                    <div class="form-group tcp d-none">
                      <label for="gateway">Gateway</label>
                        <input type="text" name="gateway" id="gateway" data-native-menu="false" class="form-control form-control-sm" value ="<?php echo $gateway?>">
                        </input>
                    </div>    
                    <div class="form-group  serial d-none">
                      <label for="port_number">Port Number:</label>
                        <select name="port_number" id="port_number" name ="port_number" data-native-menu="false" class="form-control form-control-sm" value ="<?php //echo $port_number?>">
                          <option value="<?php echo $port_number?>"><?php echo $port_number?></option>
                        </select>
                    </div> 
                    <div class="form-group serial d-none">
                      <label for="parity">Parity:</label>
                        <select required name="parity" id="parity" name = "parity"  data-native-menu="false" class="form-control form-control-sm">
                          <option value="E" <?php if($parity=="E") echo 'selected="selected"'; ?>>Even</option>
                          <option value="O" <?php if($parity=="0") echo 'selected="selected"'; ?>>Odd</option>
                          <option value="N" <?php if($parity=="N") echo 'selected="selected"'; ?>>None</option>
                          <option value="M" <?php if($parity=="M") echo 'selected="selected"'; ?>>Mark</option>
                          <option value="S" <?php if($parity=="S") echo 'selected="selected"'; ?>>Space</option>
                        </select>
                    </div>  
                    <div class="form-group serial d-none">
                      <label for="stop_bits">Stop bits:</label>
                        <select required  id="stop_bits" name="stop_bits" data-native-menu="false" class="form-control form-control-sm">
                          <option value="1"  <?php if($stop_bits=="1") echo 'selected="selected"'; ?>>1</option>
                          <option value="1.5"<?php if($stop_bits=="1.5") echo 'selected="selected"'; ?>>1.5</option>
                          <option value="2"  <?php if($stop_bits=="2") echo 'selected="selected"'; ?>>2</option>
                        </select>
                    </div>  
                    <div class="form-group serial ">
                      <label for="byte_size">byte size</label>
                        <select required name="byte_size" id="byte_size"  data-native-menu="false" class="form-control form-control-sm">
                          <option value="4" <?php if($byte_size=="4") echo 'selected="selected"'; ?>>4</option>
                          <option value="5" <?php if($byte_size=="5") echo 'selected="selected"'; ?>>5</option>
                          <option value="6" <?php if($byte_size=="6") echo 'selected="selected"'; ?>>6</option>
                          <option value="7" <?php if($byte_size=="7") echo 'selected="selected"'; ?>>7</option>
                          <option value="8" <?php if($byte_size=="8") echo 'selected="selected"'; ?>>8</option>
                        </select>
                    </div>
                    <div class="form-group serial ">
                      <label for="baudrate">baudrate</label>
                        <select required id="baudrate"  name="baudrate" data-native-menu="false" class="form-control form-control-sm">
                          <option value="300" <?php if($baudrate=="300") echo 'selected="selected"'; ?>>300</option>
                          <option value="600" <?php if($baudrate=="600") echo 'selected="selected"'; ?>>600</option>
                          <option value="1200"<?php if($baudrate=="1200") echo 'selected="selected"'; ?>>1200</option>
                          <option value="2400"<?php if($baudrate=="2400") echo 'selected="selected"'; ?>>2400</option>
                          <option value="4800"<?php if($baudrate=="4800") echo 'selected="selected"'; ?>>4800</option>
                          <option value="9600"<?php if($baudrate=="9600") echo 'selected="selected"'; ?>>9600</option>
                          <option value="19200"<?php if($baudrate=="19200") echo 'selected="selected"'; ?>>19200</option>
                          <option value="38400"<?php if($baudrate=="38400") echo 'selected="selected"'; ?>>38400</option>
                          <option value="115200"<?php if($baudrate=="115200") echo 'selected="selected"'; ?>>115200</option>
                        </select>
                    </div>  
                </div>
                <div class="float-right">

                  <button type="submit" class="btn btn-success float-left">UPDATE DEVICE &nbsp<i class="fa fa-envelope"></i></button>
                  </form>
                  <button onClick ="delete_device(<?php echo $no;?>)"class="btn btn-danger ">DELETE DEVICE <i class="fa fa-trash"></i></button>
                </div>     
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
    function tolist(){
        window.location.replace("device_list");
    }
    function toscl(id,no){
        window.location.replace(`../scl/load?id=${id}&no=${no}`);
    }
    function toactive(id,no){
      window.location.replace(`../scl/load_scl_active?id=${id}&no=${no}`);
    }
    function action_dell(x){
      $.get('delete_device/'+x,(data,status)=>{
          Swal.fire({
          title: "Deleted!",
          text: "Your file has been deleted.",
          icon: "success"
        }).then(()=>{
           window.location.replace("device_list");
        })
            
      })
    }
    function delete_device(x){
      Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
      }).then((result) => {
       console.log(result)
        if (result.value==true) {
          action_dell(x)
        }
      });

    }
     window.addEventListener('load', function () {
      //alert($('#port_type').val())
      if($('#port_type').val()=="0"){
          $('.tcp').addClass('d-none')
          $('.serial').removeClass('d-none')
        
      }
      else if($('#port_type').val()=="1"){
        $('.tcp').removeClass('d-none')
        $('.serial').addClass('d-none')
      }
      else if($('#port_type').val()=="2"){
        $('.tcp').removeClass('d-none')
        $('.iec').removeClass('d-none')
        $('.serial').addClass('d-none')
      }

    

      $("form#form_update").submit(function() {
        let mydata = $("form#form_update").serialize();
        console.log(mydata)
        $.post('update_device',mydata,(data,status)=>{
              //buf= JSON.parse(data)
              if(data=="success"){
                  Swal.fire({
                  title: "Status  ",
                  text: "Data Saved",
                  icon: "success",
                   showConfirmButton: false,
                  timer: 1500
                })

             // alert(data)
              //window.location.replace("../Admin/dashboard");
            }
             // alert(data)
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
