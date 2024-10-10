 <?php
   $type= $_GET['type'];
  
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
    <input type="text" id="tp" hidden value="<?php echo $type ?>">
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
                    <a class="nav-link " id="tab-add" data-toggle="pill" href="#custom-tabs-one-profile" onClick="gotoConfig(<?php echo $_GET['id'].','.$_GET['no']?>)" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="true">Update Device &nbsp <i class=" text-white fa fa-archive"></i></a>
                  </li>
                  <li class="nav-item iec" >
                    <a class="nav-link " id="tab-SCL" data-toggle="pill" href="#custom-tabs-one-profile" onClick="toscl(<?php echo $_GET['id'].','.$_GET['no']?>)"role="tab" aria-controls="custom-tabs-one-profile" aria-selected="true">Generate CID files &nbsp <i class=" text-white fa fa-search"></i></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="list" data-toggle="pill" href="list" onClick="toactive(<?php echo $_GET['id'].','.$_GET['no'];?>)" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">CID Activation &nbsp <i class=" text-white fa fa-check"></i></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" id="list" data-toggle="pill" href="list"  role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">CID Config &nbsp <i class=" text-success fa fa-cog"></i></a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" >  
                  <div class="tab-pane fade active show" id="tab-upload" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                  <p hidden id="device_id"><?php echo $_GET["id"];?></p>  
                  <form role="form" id ="update_scl_active" action= "update_scl_active" method="post">
               
                  <div class="card-body">
                      <div hidden class="form-group">
                        <label for="id">id</label>
                        <input  type="text" class="form-control" id="id" name="id" placeholder="id" value="<?php if($type=='edit'){echo $scl_id;}else{echo $_GET['no'];} ?>">
                      </div>
                     
                      <div class="form-group">
                        <label for="input_domain_id">Domain id</label>
                        <input required type="text" class="form-control" id="input_domain_id" name="input_domain_id" placeholder="domain id" value="<?php if($type=='edit'){echo $domain_id;}?>">
                      </div>
                      <div class="form-group">
                        <label for="input_item_id">Item id</label>
                        <input required type="text" class="form-control" id="input_item_id" name="input_item_id" placeholder="item id" value="<?php if($type=='edit'){ echo $item_id;}?>">
                      </div>
                      <div class="form-group">
                        <label for="input_name">Name </label>
                        <input required type="text" class="form-control" id="input_name" name="input_name" placeholder="Name" value="<?php if($type=='edit'){echo $name;}?>">
                      </div>
                      <div>
                      <?php if($type=='add'){$data_type="";}?>
                        <label  for="data_type">Data Type</label>
                        <select name="data_type" id="data_type" name="data_type" data-native-menu="false" class="form-control form-control form-control-sm"> 
                          <option value="0" <?php if($data_type=="Not Specified") echo 'selected="selected"'; ?>>Not Specified</option> 
                          <option value="integer" <?php if($data_type=="integer") echo 'selected="selected"'; ?>>integer</option> 
                          <option value="float" <?php if($data_type=="float") echo 'selected="selected"'; ?>>float</option>
                          <option value="boolean" <?php if($data_type=="boolean") echo 'selected="selected"'; ?>>boolean</option>
                          <option value="visible-string" <?php if($data_type=="visible-string") echo 'selected="selected"'; ?>>visible-string</option>
                          <option value="utc-time" <?php if($data_type=="utc-time") echo 'selected="selected"'; ?>>utc-time</option>
                        </select>  
                      </div>
                   <br>
                      <div id="high" class="bit form-group <?php if($data_type=="float" || $data_type=="integer"){echo "d-none";}else{echo "";}?>" >
                        <label for="input_unit">HIGH Condition</label>
                        <input type="text" class="form-control"  name="high" placeholder="High Condition" value="<?php if($type=='edit'){echo $high;}?>">
                      </div>

                       <div id="low" class="bit form-group <?php if($data_type=="float" || $data_type=="integer"){echo "d-none";}else{echo "";}?>" >
                        <label for="low">LOW Condition </label>
                        <input type="text" class="form-control"  name="low" placeholder="Low Condition" value="<?php if($type=='edit'){echo $low;}?>">
                      </div>
                    
                      <div hidden id="intermediette" class="bit form-group <?php if($data_type=="float" || $data_type=="integer"){echo "d-none";}else{echo "";}?>" >
                        <label for="input_inter">Intermediette Condition</label>
                        <input type="text" class="form-control"  name="input_inter" placeholder="intermediette Condition" value="<?php if($type=='edit'){echo $inter;}?>">
                      </div>
                
                      <div hidden id="bad" class="bit form-group <?php if($data_type=="float" || $data_type=="integer"){echo "d-none";}else{echo "";}?>" >
                        <label for="input_bad">Bad-state Condition</label>
                        <input type="text" class="form-control"  name="input_bad" placeholder="bad-state Condition" value="<?php if($type=='edit'){echo $bad_state;}?>">
                      </div>
                      <div hidden class="form-group">
                        <label for="input_name">Alias </label>
                        <input  type="text" class="form-control" id="alias" name="alias" placeholder="alias" value="<?php if($type=='edit'){echo $alias;}?>">
                      </div>
                             
                      <div id="max_value" class="number form-group <?php if($data_type=="float" || $data_type=="integer"){print "";}else{echo "d-none";}?>" >
                       
                        <label for="input_max">Max Value </label>
                        <input type="number" step="0.01" class="form-control"  name="max_value" placeholder="max_value" value="<?php if($type=='edit'){echo $max_value;}?>">
                      </div>
                    
                   

                      <div id="unit" class="number form-group <?php if($data_type=="float" || $data_type=="integer"){print "";}else{echo "d-none";}?>" >
                        <label for="input_unit">Unit </label>
                        <input type="text" class="form-control"  name="unit" placeholder="unit" value="<?php if($type=='edit'){echo $unit;}?>">
                      </div>
                     
                        <div id="divider" class="number form-group <?php if($data_type=="float" || $data_type=="integer"){print "";}else{echo "d-none";}?>" >
                       
                        <label for="divider">Divider </label>
                        <input type="number" step="0.1" class="form-control"  name="divider" placeholder="divider" value="<?php if($type=='edit'){echo $divider;}?>">
                      </div>

                      <?php if($type=='add'){
                        $active="";
                        $group="";
                      }?>
                      <label  for="group">Group</label>
                        <select name="group" id="active" name="active" data-native-menu="false" class="form-control form-control form-control-sm"> 
                        <option value="other" <?php if($group=="other") echo 'selected="selected"'; ?>>other</option>
                        <option value="freq" <?php if($group=="freq") echo 'selected="selected"'; ?>>freq</option>
                          <option value="current" <?php if($group=="current") echo 'selected="selected"'; ?>>current</option>
                          <option value="voltage" <?php if($group=="voltage") echo 'selected="selected"'; ?>>voltage</option>
                        
                        </select>
                     
                      <label  for="protocol">Active</label>
                        <select name="active" id="active" name="active" data-native-menu="false" class="form-control form-control form-control-sm"> 
                          <option value="1" <?php if($active=="1") echo 'selected="selected"'; ?>>Active</option>
                          <option value="0" <?php if($active=="0") echo 'selected="selected"'; ?>>Non Active</option>
                        </select>
                      <br>
                      <button type="submit" class="btn btn-success col-md-2 float-right">Save &nbsp<i class="fas fa-envelope "></i></button>
                    
                  </form>
                  <input hidden type="text" class="form-control" id="id" name="" placeholder="id" value="<?php echo $_GET['id']; ?>">
                  <input hidden type="text" class="form-control" id="no" name="" placeholder="id" value="<?php echo $_GET['no']; ?>">
                    
                  </div>
                </div>
              </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script>
    function toadd(){
      window.location.replace("../device/type");
    }
    function tolist(){
        window.location.replace("../device/device_list");
      }
      function gotoConfig(id,no){
      window.location.replace(`../device/load_device?id=${id}&no=${no}`);
    }
    function toscl(id,no){
        window.location.replace(`../scl/load?id=${id}&no=${no}`);
    }
    function toactive(id,no){
      window.location.replace(`load_scl_active?id=${id}&no=${no}`);
    }
   
    
     window.addEventListener('load', function () {
      let no=$('#no').val()
      //getData(no);
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
      $("form#form_scl").submit(function() {
        let scl = $("form#form_scl").serialize();
        let id=$('#id').val()
        let no=$('#no').val()

        mydata={"scl":scl,
                "id":id,
                "no":no,}
        
        $.post('save_scl',mydata,(res,status)=>{
              //buf= JSON.parse(data)
              console.log(res);
              if(res=="success"){
              alert(res)}
              else{
                alert(res)
              }
             
          })
        
        return false;
        })
      
       
     $('#data_type').on('change',()=>{
      let val=$( "#data_type option:selected" ).val();
      if(val=="integer" || val=="float"){
        $(`.bit`).addClass("d-none")
         $(`.number`).removeClass("d-none")
        // $('#max_value').removeClass("d-none")
        // $('#unit').removeClass("d-none")
        // $('#divider').removeClass("d-none")
      }
      else{
         $(`.bit`).removeClass("d-none")
         $(`.number`).addClass("d-none")
        // $('#max_value').addClass("d-none")
        // $('#unit').addClass("d-none")
        // $('#divider').addClass("d-none")
      
      }
    })
      $("form#update_scl_active").submit(function() {
        let mydata = $("form#update_scl_active").serialize();
        console.log(mydata)
        let url=""
        let type =$('#tp').val()
          if(type=='edit')
              {url ="update_scl_active"}
          else {url ="insert_scl_active"}
        
          $.post(url,mydata,(data,status)=>{
                //buf= JSON.parse(data)
                //console.log(data)
                if(data=="success"){
                  let id= $('#device_id').text();
                  let no= $('#no').val();
               
                Swal.fire({
                  title: "Status  ",
                  text: "Data Saved",
                  icon: "success",
                   showConfirmButton: false,
                  timer: 1500
                }).then(()=>{
                  window.location.replace(`load_scl_active?id=${id}&no=${no}`);
                })
             //   window.location.replace(`load_scl_active?id=${id}&no=${no}`);
              }
              else{alert(data)}
             // alert("data failed")
              // alert(data)
            })
          
         
        return false
        })
    })
    
 
  </script>
  </body>
</html>
