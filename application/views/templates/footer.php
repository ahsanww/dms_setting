<footer class="main-footer">
    <strong>Copyright &copy;  2023 <a href="">Micronet Gigatech Indoglobal</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->




<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="<?php echo base_url()?>assets/dist/js/pages/dashboard.js"></script> -->
<!-- AdminLTE for demo purposes -->
<!-- <script src="<?php echo base_url()?>assets/dist/js/demo.js"></script> -->
<script>
  function syncServer(){
  
   $.get("../scl/get_scl_machine",(res)=>{
      dt=JSON.parse(res)
      console.log(dt)
      dataReq=dt.mon
      dataReq2=dt.device
      ipserver = dt.mon[0].ipserver
      machine_code= dt.mon[0].machine_code
      url =`http://${ipserver}/mel/dms/mon/add_mon`
      url_server = `http://${ipserver}/mel/dms/bay/getBayCode?code=${machine_code}`
      try {
       getCodeBay(url_server).then(data => {
        dt= JSON.parse(data)
        for (let i =0 ;i<dataReq.length;i++){
          //dataReq[i].bay_code=" "
          for (let j =0 ; j<dt.length;j++){
            if(dt[j].alias==dataReq[i].alias){
              dataReq[i].bay_code=dt[j].bay_code
            }
          }
        }
      })}
      catch (error) {
        console.log("code bay not found")
      }
      postServerDMS(url,dataReq,dataReq2)
        
    })
  }
  function syncGipat(){
    $.get("../scl/get_scl_machine",(res)=>{
      dt=JSON.parse(res)
      ipgipat = dt.mon[0].ipgipat
      dataReq=(dt.mon)
      dataReq2=(dt.device)
      url =  url=`http://${ipgipat}/configure/DMS`
  
      $.ajax({
        url:url,
        type: 'POST',
         crossDomain: true,
        dataType: "json",
        data:{"machine_data":dataReq2,"machine_params":dataReq},
        success: function (res2){
           Swal.fire({
                  title: "Status  ",
                  text: res2.msg,
                  icon: "success",
                   showConfirmButton: false,
                  timer: 1500
                })
        },
        error:function (res2,error){
          alert("fail")
          console.log(error,res2)
        }
      })
    })
  }
async function getCodeBay(urlgipat){
  console.log(urlgipat)
  let data = await $.ajax({
      url: urlgipat,
      method: 'GET',
       crossDomain: true,
    });
   return data;
}
async function postServerDMS(url,dataReq,dataReq2){
  console.log(url)
  console.log(dataReq)
  console.log(dataReq2)
  $.ajax({
    
        url:url,
        type: 'POST',
        CORS: true ,
        data:{"dt":JSON.stringify(dataReq),"device":JSON.stringify(dataReq2)},
        success: function (res2){
            console.log(res2)
          if(res2.success==true){
             //$('.loader').addClass('d-none')
          Swal.fire({
                    title: "SUCCESS  ",
                    text: res2.message.success,
                    icon: "success",
                    showConfirmButton: false,
                    timer: 1500
                  })
          }
        }
          ,
        error:function (res2,error){
          //alert("fail")
          console.log(error)
        }
      })
}
</script>