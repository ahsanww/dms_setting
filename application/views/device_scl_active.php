 <?php
// var_dump($_GET['no'])
 //$row= $data->result();

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
            <h1 class="m-0 text-dark">CID Activation</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../admin/dashboard">Home</a></li>
              <li class="breadcrumb-item active">CID Activation</li>
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
                    <a class="nav-link " id="tab-add" data-toggle="pill" href="#custom-tabs-one-profile" onClick="gotoConfig(<?php echo $_GET['id'].','.$_GET['no']?>)" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="true">Update Device &nbsp <i class=" text-white fa fa-archive"></i></a>
                  </li>
                  <li class="nav-item iec" >
                    <a class="nav-link " id="tab-SCL" data-toggle="pill" href="#custom-tabs-one-profile" onClick="toscl(<?php echo $_GET['id'].','.$_GET['no']?>)" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="true">Generate CID files &nbsp <i class=" text-white fa fa-search"></i></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" id="list" data-toggle="pill" href="list" onClick="toactive()" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">CID Activation &nbsp <i class=" text-success fa fa-check"></i></a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" >  
                  <div class="tab-pane fade active show" id="tab-upload" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                 <button class="btn btn-danger mb-3" onClick ="addsclconfig(<?php echo $_GET['id']?>,<?php echo $_GET['no']?>)">ADD CID <i class="fas fa-plus"></i></button>
                 
                  <table id="" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example2_info">
      
                  <thead>
                  <tr role="row">
                    <th style ="width:1%">No</th>
                    <th style ="width:10%"><center>Domain Id</center></th>
                    <th class="sorting">Item Id</th>
                    <th class="sorting">Name</th>
                    <th class="sorting">Data type</th>
                    <th class="sorting">active</th>
                    <th class="sorting">Action</th>

                  </thead>
                  <tbody>
                  <?php
                    $no=1;
                    foreach($data->result_array() as $i):?>
                          <tr>
                          <th><?php echo $no++;?></th>
                          <td><?php echo $i['domain_id']; ?></td>
                          <td><?php echo $i['item_id'];?></td>
                          <td><?php echo $i['name']; ?></td>
                          <td><?php echo $i['data_type']; ?></td>
                          <td><?php if($i['active']==1){echo 'Active';}else{echo 'Non Active';} ?></td>
                          <td><button class="btn btn-success " onClick="tosclconfig(<?php echo $_GET['id']?>,<?php echo $_GET['no']?>,<?php echo $i['id']; ?>)">Edit</button> <button class="btn btn-danger" onClick="delete_scl(<?php echo $i['id']; ?>)">Del</button></td>
                          </tr>
                    <?php endforeach;?>
                  </tbody>
                  </table>

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
   
    
    function tosclconfig(id,no,scl){
        window.location.replace(`../scl/load_scl_activeid?id=${id}&no=${no}&scl_id=${scl}&type=edit`);
    }
    function addsclconfig(id,no){
        window.location.replace(`../scl/add_scl_activeid?id=${id}&no=${no}&type=add`);
    }
    
    function action_del(id){ 
       $.get('delete_scl_active?no='+id,(res,status)=>{
          //buf= JSON.parse(data)
          console.log(res);
          if(res){
           Swal.fire({
            title: "Deleted!",
            text: "Your file has been deleted.",
            icon: "success"
          }).then(()=>{
            window.location.reload()
          })
            
          }
          else{
            alert(res)
          }
          
      })}

    function delete_scl(id){     
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
          action_del(id)
        }
      });

    }
     window.addEventListener('load', function () {
      let no=$('#no').val()
     
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
       
     
      $("form#form_update").submit(function() {
        let mydata = $("form#form_update").serialize();
        console.log(mydata)
        $.post('update_device',mydata,(data,status)=>{
              //buf= JSON.parse(data)
              if(data=="success"){
              alert(data)
              window.location.replace("../Admin/dashboard");
            }
             // alert(data)
          })
       return false
      })
    })
    
 
  </script>
  </body>
</html>
