 <?php
 //$row= $data->result();
//var_dump ($data);
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
            <h1 class="m-0 text-dark">Generate SCL Files</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../admin/dashboard">Home</a></li>
              <li class="breadcrumb-item active">Generate SCL Files</li>
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
                    <a class="nav-link " id="tab-add" data-toggle="pill" href="#custom-tabs-one-profile" onClick="gotoConfig(<?php echo $id?>)" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="true">Update Device &nbsp <i class=" text-white fa fa-archive"></i></a>
                  </li>
                  <li class="nav-item iec" >
                    <a class="nav-link active" id="tab-SCL" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="true">Generate SCL files &nbsp <i class=" text-success fa fa-search"></i></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="list" data-toggle="pill" href="list" onClick="toactive(<?php echo $id?>,<?php echo $no?>)" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">SCL Activation &nbsp <i class=" text-white fa fa-check"></i></a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" >  
                  <div class="tab-pane fade active show" id="tab-upload" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                    <div class="">  
                      <?php echo $error;?>
                      <form action="do_upload" id="form_upload" method="POST" enctype="multipart/form-data">
                       <?php //echo form_open_multipart('scl/do_upload');?>
                       
                        <label for="userfile"> Upload SCL FIles</label>
                        <input  id="file" type="file" name="userfile" size="20" required />
                        <input hidden type="text" name="id" id="id" value="<?php echo $id; ?>">
                        <input hidden type="text" name="no" id="no" value="<?php echo $no; ?>">
                        <input class="btn btn-danger " type="submit" value="upload" />
                        </form>
                       <?php echo $this->session->flashdata('message');?>
                       <div id="msg"></div>
                       <hr>
                       <form action="#" id="form_scl">
                        <div  id="dataSCL">
                             
                        </div>
                        
                        <button type="submit" class="btn btn-success col-md-2 float-right">ADD SCL &nbsp<i class="fas fa-plus"></i></button>
                        </form>
                    </div>
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
    function gotoConfig(id){
      window.location.replace(`../device/load_device?id=${id}`);
    }
    function toactive(id,no){
      window.location.replace(`load_scl_active?id=${id}&no=${no}`);
    }
      //load_scl_active
    function clickBullet(x){
     
       
        cb =$(`#bullet_${x}`).attr('class')
        if(cb.indexOf("fa-plus-circle")>-1){
          $(`#bullet_${x}`).removeClass("fa-plus-circle")
          $(`#bullet_${x}`).addClass("fa-minus-circle")
          
        }
        else if(cb.indexOf("fa-minus-circle")>-1){
      
          $(`#bullet_${x}`).removeClass("fa-minus-circle")
          $(`#bullet_${x}`).addClass("fa-plus-circle")
        }
       
      
      //console.log(cb)
      dt=$("#"+x).children()
      for (let i=1 ;i<dt.length;i++){
        buf=dt[i].getAttribute('id')
        buf2=$("#"+buf).attr('class')
        
        if(buf2.indexOf("d-none")>-1){
          $("#"+buf).removeClass("d-none")

       //   $("#"+x).addClass("fa-plus-circle")
        //  $("#"+x).removeClass("fas-minus-circle")
        }
        else{
          $("#"+buf).addClass("d-none")
         //  $("#"+x).removeClass("fa-plus-circle")
         //  $("#"+x).addClass("fa-minus-circle")
        }
      }
      //console.log(dt)
     // console.log(dt.length)
      //console.log(data.indexOf("xy"))
      // if(data.indexOf("d-none")>-1){
      //   $("."+x).children().removeClass("d-none")
      // }
      // else{
      //   $("."+x).children().addClass("d-none")
      // }
      // //console.log($("."+x).find('.d-none'))
      // $("."+x).addClass("x")
     // cb =$("#"+x).children()
      //console.log(cb)
     // alert(cb)

    }
    function getData(x)
    {
      $.get('load_byid?id='+x,(data,status)=>{
        buf= JSON.parse(data)
          buf= JSON.parse(data)
          for(let i =0 ;  i<buf.length;i++){
            buf2=buf[i].item_id.split('$')
            //console.log(buf2)
            b=""
            c=""
            a=""
            e=""
            for(let j =0 ;  j<=buf2.length;j++){
              b+=buf2[j]
              a=b+buf2[j+1]
              let x=buf2[j]
              //console.log(('#dataSCL').children())
              if(j==0){
                if($(`#${b}`).length==0){
                  $('#dataSCL').append(`<ul id="${b}"><li    class="clearfix point no-bullets"><i id="bullet_${b}"onClick="clickBullet('${b}')" class="fas fa-plus-circle text-success" data-toggle="collapse" dsata-target="#${a}"></i> ${buf2[j]}</li></ul>`)
                }
              }
              else{
                c+=buf2[j-1]
                
                if($(`#${b}`).length==0){
                  if(j==(buf2.length)){
                   $(`#${c}`).append(`<ul ><li class=" no-bullets" >&nbsp<input id="${b}" type="checkbox"  name="${buf[i].domain_id}" value="${buf[i].item_id}"></i> ${buf[i].item_id}</li></ul>`)
                 //  $(`#${c}`).append(`<ul class=" point no-bullets" id="${b}" ><li ><i onClick="clickBullet('${b}')" class="fas fa-plus-circle text-success"  data-target=".${b}"></i> ${buf2[j]}</li></ul>`)
                  }
                   else if(j==(buf2.length)-1){
                    $(`#${c}`).append(`<ul class="${c} point no-bullets d-none" id="${b}" ><li ><i id="bullet_${b}" class="fas fa-circle text-success"  data-target=".${b}"></i> ${buf2[j]}</li></ul>`)
                  }
                  else{
                    $(`#${c}`).append(`<ul class="${c} point no-bullets d-none" id="${b}" ><li ><i id="bullet_${b}"  onClick="clickBullet('${b}')" class="fas fa-plus-circle text-success"  data-target=".${b}"></i> ${buf2[j]}</li></ul>`)
                  }

                }
              }
            }
          }
      })
    }
    function test(){
      console.log("test")
    }
    function getStatusScl(){
      let no=$('#no').val()
      $.get(`get_status_scl?no=${no}`,(res,status)=>{
          data= JSON.parse(res)
          //console.log(data.data.scl_flag)
          let kondisi =data.data[0].scl_flag
          if(kondisi ==1){
            console.log("read kondisi")
            if(flag==0){
              $('#msg').append(`</span>please Wait for Analyzing<span> <div class="spinner-grow text-primary" role="status"><span class="sr-only">Loading...`)
              flag=1
             }
          }
          else if(kondisi ==2){
            console.log("mati")
            $('#msg').empty()
            getData(no);
            clearInterval(readScl);
          }

          
        })

     }
     var flag=0
     var readScl=null
     window.addEventListener('load', function () {
      let no=$('#no').val()
      readScl= setInterval(getStatusScl, 1000);
      
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
