 <?php

?> 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Device Type</h1>
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
                    <a class="nav-link active" id="tab-add" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="true">Add New Device &nbsp <i class=" text-success fa fa-plus-circle"></i></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="list" data-toggle="pill" href="list" onClick="tolist()" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">List of Device &nbsp <i class=" text-white fa fa-server"></i></a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" >  
                  <div class="tab-pane fade active show" id="tab-add" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                    
                  <form role="form" id="form_add" name ="form_add" method="post">
                  <div hidden class="form-group  ">
                      <label  for="protocol">Protocol:</label>
                        <select name="protocol" id="protocol" name="protocol" data-native-menu="false" class="form-control form-control form-control-sm"> 
                          <option value="0">Modbus</option>
                          <option value="1">IEC61850</option>
                      </select>
                    </div>
                 
                    <!-- <input type="text" name="type" id="type" value="" placeholder="Ex: Micom P123" data-clear-btn="true"> -->
                    <div class="form-group">
                    <label for="device_type">Device Type:</label>
                      <select name="device_typex"  onchange="getval(this);" id="device_typex" name="device_typex" data-native-menu="false" class="form-control form-control-sm" required>
                        <option value="">Select Device Name</option>
                        <option value="MICOM P122">Micom P122</option>
                        <option value="MICOM P123">Micom P123</option>
                        <option value="MICOM P141">Micom P141</option>
                        <option value="MICOM P442">Micom P442</option>
                        <option value="MICOM P443">Micom P443</option>
                        <option value="SEL 489">SEL-489	</option>
                        <option value="custom">Custom	</option>
                      </select>
                    </div>
                    <div class="form-group device_type d-none ">
                      <label for="device_type">Device </label>
                        <input  type="text" id="device_type" name="device_type" data-native-menu="false" class="form-control form-control-sm">
                        </input>
                    </div>
                   
                    <div class="form-group">
                      <label for="mode">Mode:</label>
                        <select name="mode" id="mode" name="mode" data-native-menu="false" class="form-control form-control-sm">
                          <option value="">Select Mode</option>
                          <option value="0">Pooling Data</option>
                          <option value="1">Manual Remote</option>
                        </select>
                    </div>  
                      
                    <div class="form-group ">
                      <label for="device_id">Device Id:</label>
                        <select name="device_id" id="device_id" name="device_id" data-native-menu="false" class="form-control form-control-sm">
                          <option value="">Select Device Id</option>
                          <?php
                           $idUse= array(); 
                           foreach($data->result_array() as $i):
                            $idUse[] = $i['id_device'] ; 
                            endforeach;
                            $defaultId=array();
                            for($i=1; $i<=255; $i++){ 
                              array_push($defaultId,$i);}
                            $IdMenu =  array_diff($defaultId,$idUse);
                            foreach($IdMenu as $id_Item){
                              echo "<option value='$id_Item'>$id_Item</option>";
                            }
                           ?>
                        </select>
                    </div>
                    <div class="form-group ">
                      <label for="location">RACK Location</label>
                        <input type="text" required name="location" id="location" data-native-menu="false" class="form-control form-control-sm">
                        </input>
                    </div>
                    
                  
                     
                    <div class="form-group">
                      <label  for="port_type">Port Type:</label>
                        <select name="port_type" required id="port_type" name ="port_type" data-native-menu="false" class="form-control form-control-sm"> 
                        <option value="">Select Communication</option>
                          <option value="0">RS485</option>
                          <option value="1">TCP/IP</option>
                          <option value="2">IEC61850</option>
                      </select>
                    </div>
                     <div class="form-group tcp d-none">
                      <label for="disturbance_type">Disturbance Type:</label>
                        <select name="disturbance_type" id="disturbance_type" name="disturbance_type" data-native-menu="false" class="form-control form-control-sm">
                          <option value="">Select Mode</option>
                          <option value="0">No Disturbance</option>
                          <option value="1">Disturbance Via IEC61850</option>
                          <option value="3">Disturbance Via Modbus</option>
                        </select>
                    </div>    
                    
                    <div class="form-group tcp d-none">
                      <label for="iec_file" name ="ip_addess">Disturbance Folder</label>
                        <input type="text" name="iec_file" id="iec_file" data-native-menu="false" class="form-control form-control-sm">
                        </input>
                    </div> 
                    <div class="form-group tcp d-none">
                      <label for="ip_addess" name ="ip_addess">IP ADDRESS</label>
                        <input type="text" name="ip_addess" id="ip_addess" data-native-menu="false" class="form-control form-control-sm">
                        </input>
                    </div>    
                    <div class="form-group tcp d-none ">
                      <label for="port_address" >PORT ADDRESS</label>
                        <input type="number" name="port_address" id="port_address" data-native-menu="false" class="form-control form-control-sm">
                        </input>
                    </div>  
                    <div hidden class="form-group ">
                      <label for="dns">DNS</label>
                        <input type="text" name="dns" id="dns" data-native-menu="false" class="form-control form-control-sm">
                        </input>
                    </div>   
                    <div hiddenclass="form-group ">
                      <label for="netmask">Netmask</label>
                        <input type="text" name="netmask" id="netmask" data-native-menu="false" class="form-control form-control-sm">
                        </input>
                    </div>   
                    <div hidden class="form-group ">
                      <label for="gateway">Gateway</label>
                        <input type="text" name="gateway" id="gateway" data-native-menu="false" class="form-control form-control-sm">
                        </input>
                    </div>    
                    <div class="form-group  serial d-none">
                      <label for="port_number">Port Number:</label>
                        <select  id="port_number" name ="port_number" data-native-menu="false" class="form-control form-control-sm">
                         
                           <?php
                           $idPort= array(); 
                            
                           foreach($data->result_array() as $i):
                            $idPortUse[] = ($i['port_number']+1) ; 
                            endforeach;
                            $defaultPortId=array();
                            for($i=1; $i<=8; $i++){ 
                              array_push($defaultPortId,$i);}
                            $IdMenu =  array_diff($defaultPortId,$idPortUse);
                            foreach($IdMenu as $id_Item){
                              echo "<option value='$id_Item'>$id_Item</option>";
                            }
                            if(count($data->result_array())==0){
                              for($i=1;$i<=8;$i++){
                                  echo "<option value='$i'>$i</option>";
                              }

                            }
                           ?>
                        </select>
                        
                      
                    </div> 
                   
                    <div class="form-group serial d-none">
                      <label for="ipserver">Parity:</label>
                        <select required name="parity" id="parity" name = "parity"  data-native-menu="false" class="form-control form-control-sm">
                          <option value="E">Even</option>
                          <option value="O">Odd</option>
                          <option value="N">None</option>
                          <option value="M">Mark</option>
                          <option value="S">Space</option>
                        </select>
                    </div>  
                    <div class="form-group serial d-none">
                      <label for="stop_bits">Stop bits:</label>
                        <select required  id="stop_bits" name="stop_bits" data-native-menu="false" class="form-control form-control-sm">
                          <option value="1">1</option>
                          <option value="1.5">1.5</option>
                          <option value="2">2</option>
                        </select>
                    </div>  
                    <div class="form-group serial d-none">
                      <label for="byte_size">byte size</label>
                        <select required  id="byte_size" name="byte_size" data-native-menu="false" class="form-control form-control-sm">
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                          <option value="7">7</option>
                          <option value="8" selected>8</option>
                        </select>
                    </div>
                    <div class="form-group serial d-none">
                      <label for="baudrate">baudrate</label>
                        <select required  id="baudrate"  name="baudrate" data-native-menu="false" class="form-control form-control-sm">
                          <option value="300">300</option>
                          <option value="600">600</option>
                          <option value="1200">1200</option>
                          <option value="2400">2400</option>
                          <option value="4800">4800</option>
                          <option value="9600">9600</option>
                          <option value="19200">19200</option>
                          <option value="38400">38400</option>
                        </select>
                    </div>  
                     
                  
                </div>
                <div >
                  <button type="submit" class="btn btn-success col-md-2 float-right">ADD Device <i class="fas fa-plus"></i></button>
                </div>
                </form>
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
    function tolist(){
        window.location.replace("device_list");
      }
      function getval(val){

        if(val.value=="custom"){
          $('.device_type').removeClass("d-none")
          $('#device_type').val("")
        }
        else{
          $('.device_type').removeClass("d-none")
          $('.device_type').addClass("d-none")
          $('#device_type').val(val.value)
        }
      
      console.log(val.value)
     }
     window.addEventListener('load', function () {
     

      $("form#form_add").submit(function() {
        let mydata = $("form#form_add").serialize();
        console.log(mydata)
        $.post('add_device',mydata,(data,status)=>{
          console.log(data)
              //buf= JSON.parse(data)
              if(data=="success"){
              Swal.fire({
                  title: "Status  ",
                  text: "Data Saved",
                  icon: "success",
                   showConfirmButton: false,
                  timer: 1500
                }).then(()=>{
                  window.location.replace("device_list");
                })
              
            }
              
          })
       return false
      })
      $('#port_type').on('change', function() {
        if(this.value == "0"){
          $('.tcp').addClass('d-none')
          $('.serial').removeClass('d-none')
       
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
