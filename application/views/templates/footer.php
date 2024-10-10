<footer class="main-footer">
    <strong>Copyright &copy;  2023 <a href="">Micronet Gigatech Indoglobal</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.5
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url()?>assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url()?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url()?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url()?>assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url()?>assets/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?php echo base_url()?>assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url()?>assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url()?>assets/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url()?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?php echo base_url()?>assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url()?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url()?>assets/dist/js/adminlte.js"></script>
<!-- Sweer Alert -->
<script src="<?php echo base_url()?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>

<script src="<?php echo base_url()?>assets/dist/js/justgage.js"></script>
<script src="<?php echo base_url()?>assets/dist/js/raphael-2.1.4.min.js"></script>

<script src="<?php echo base_url()?>assets/dist/js/mqttws31.js"></script>
<script src="<?php echo base_url()?>assets/dist/js/config.js"></script>


<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="<?php echo base_url()?>assets/dist/js/pages/dashboard.js"></script> -->
<!-- AdminLTE for demo purposes -->
<!-- <script src="<?php echo base_url()?>assets/dist/js/demo.js"></script> -->
<script>
 // url=`http://${ipserver}/mel/dms/mon/add_mon`
  function syncServer(){
   // http://localhost/dms_setting/index.php/scl/get_scl_machine
   $.get("../scl/get_scl_machine",(res)=>{
     $('.loader').removeClass('d-none')
      dt=JSON.parse(res)
      ipserver=dt.mon[0].ipserver
      ipgipat = dt.mon[0].ipgipat
      console.log(ipgipat)
      dataReq=(dt.mon)
      dataReq2=(dt.device)
      url =`http://${ipserver}/mel/dms/mon/add_mon`
      
      let url_server=`http://${ipgipat}/getByCode/${dataReq[0].machine_code}`
      //console.log(url_server)
      getCodeBay(url_server).then(data => {
     // console.log(data)
      let dt=data
      for (let i =0 ;i<dataReq.length;i++){
          //dataReq[i].bay_code=" "
          for (let j =0 ; j<dt.length;j++){
            if(dt[j].alias==dataReq[i].alias){
              
              dataReq[i].bay_code=dt[j].bay_code
            }

          }
          
        }
      console.log(dataReq)
      postServerDMS(url,dataReq,dataReq2)

        
      });
    })
  }


  
  function syncGipat(){
    $('.loader').removeClass('d-none')
    $.get("../scl/get_scl_machine",(res)=>{
      dt=JSON.parse(res)
      ipserver=dt.mon[0].ipserver
      ipgipat = dt.mon[0].ipgipat
      console.log(ipgipat)
      dataReq=(dt.mon)
      dataReq2=(dt.device)
      url =  url=`http://${ipgipat}/configure/DMS`
      
      let url_server=`http://${ipgipat}/getByCode/${dataReq[0].machine_code}`
      //console.log(url_server)
      getCodeBay(url_server).then(data => {
      console.log(data)
      let dt=data
      for (let i =0 ;i<dataReq.length;i++){
          //dataReq[i].bay_code=" "
          for (let j =0 ; j<dt.length;j++){
            if(dt[j].alias==dataReq[i].alias){
              
              dataReq[i].bay_code=dt[j].bay_code
            }

          }
          
        }
      //console.log(dataReq)
      postServer()

        
      });
    })
  }

async function getCodeBay(urlgipat){
  let data = await $.ajax({
      url: urlgipat,
      method: 'GET',
    });
   return data;
}
async function postServerDMS(url,dataReq,dataReq2){
  $.ajax({
    
        url:url,
        type: 'POST',
        CORS: true ,
        data:{"dt":JSON.stringify(dataReq),"device":JSON.stringify(dataReq2)},
        success: function (res2){
            console.log(res2)
          if(res2.success==true){
          //console.log(res2)
             $('.loader').addClass('d-none')
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
          console.log(res2.message,error)
        }
      })
}
async function postServer(){
  let data = await $.ajax({
        url:url,
        type: 'POST',
         crossDomain: true,
          CORS: true ,
         dataType: "json",
        timeout: 10000 ,
        data:{"machine_data":dataReq2,"machine_params":dataReq},
        success: function (res2){
          
          $('.loader').addClass('d-none')
           Swal.fire({
                  title: "Status  ",
                  text: res2.msg,
                  icon: "success",
                   showConfirmButton: false,
                  timer: 6000
                })
        },
        
        error:function (res2,error){
          alert("fail")
           $('.loader').addClass('d-none')
          console.log(error,res2)
        }
         
      })
}
</script>