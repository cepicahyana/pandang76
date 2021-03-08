<div class="row">

<div class="col-lg-4 col-sm-6 col-xs-12">
<div class="main-box infographic-box colored blue-bg">
<i class="fa fa-envelope"></i>
<span class="headline">UNDANGAN PAGI</span>
<span class="value"><?php echo number_format($this->db->query("select * from data_peserta where jenis='1'")->num_rows(),0,",",".")?></span>
</div>
</div>
<div class="col-lg-4 col-sm-6 col-xs-12">
<div class="main-box infographic-box colored purple-bg">
<i class="fa fa-user"></i>
<span class="headline">TAMU HADIR </span>
<span class="value"><?php echo number_format($this->db->query("select * from data_peserta where jenis='1' and status='2' ")->num_rows(),0,",",".")?></span>
</div>
</div>
<div class="col-lg-4 col-sm-6 col-xs-12">
<div class="main-box infographic-box colored red-bg">
<i class="fa fa-user"></i>
<span class="headline"> TIDAK HADIR</span>
<span class="value"><?php echo number_format($this->db->query("select * from data_peserta where jenis='1' and status='1' ")->num_rows(),0,",",".")?></span>
</div>
</div>


<div class="col-lg-4 col-sm-6 col-xs-12">
<div class="main-box infographic-box colored blue-bg">
<i class="fa fa-envelope"></i>
<span class="headline">UNDANGAN SORE</span>
<span class="value"><?php echo number_format($this->db->query("select * from data_peserta where jenis='2'")->num_rows(),0,",",".")?></span>
</div>
</div>

<div class="col-lg-4 col-sm-6 col-xs-12">
<div class="main-box infographic-box colored purple-bg">
<i class="fa fa-user"></i>
<span class="headline">TAMU HADIR</span>
<span class="value"><?php echo number_format($this->db->query("select * from data_peserta where jenis='2' and status='1' ")->num_rows(),0,",",".")?></span>
</div>
</div>
<div class="col-lg-4 col-sm-6 col-xs-12">
<div class="main-box infographic-box colored red-bg">
<i class="fa fa-user"></i>
<span class="headline">TIDAK HADIR</span>
<span class="value"><?php echo number_format($this->db->query("select * from data_peserta where jenis='2' and status='2' ")->num_rows(),0,",",".")?></span>
</div>
</div>
</div>

<a target="new" href="<?php echo base_url();?>myevent/register/13" class="btn col-md-6 btn-danger"><i class="fa fa-user"></i> DATA TAMU</a>
<a target="new" href="<?php echo base_url();?>myevent/in/13" class="btn col-md-6 btn-info"><i class="fa fa-user"></i> CEKIN REGISTRASI</a>



<style>
.size{ font-size:16px; }
#table img{  width:220px;
			  height:220px;
			  border-radius:20px;
			  margin:auto;
			  -moz-box-shadow:5px 5px 10px #000;
			  -webkit-box-shadow:5px 5px 10px #000;}
</style>
<div class="row hide" id="user-profile">
<div class="col-lg-12 col-md-12 col-sm-12" >
<div class="main-box clearfix">
<header class="main-box-header clearfix"><center>
<h2><b>DATA EVENT</b></h2></center>
</header>
<div class="main-box-body clearfix">
<div class="profile-status">
</div>

<span id="dataTable">
<b><center>
</center></b>
<table id='table' class="tabel black table-striped table-bordered table-hover dataTable">
		  	<thead>			
				
				<th class='thead' axis="string" width='155px'>&nbsp;</th>
				
		
			</thead>
</table>
</span>

</div>
</div>
</div>


 <!-- <link href="<?php echo base_url();?>/plug/datatables/css/dataTables.bootstrap.css" rel="stylesheet">
  <script src="<?php echo base_url()?>plug/datatables/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url()?>plug/datatables/js/dataTables.bootstrap.js"></script>	-->
  <script>
  $(".tabel-inputan").hide();
  $(".pratampil").hide();
  function addForm(){
  $(".tabel-inputan").fadeIn(1000);
  $("#dataTable").fadeOut(1000);
  $(".crt").hide();
  }
  </script>

  <script type="text/javascript">
      var save_method; //for save method string
    var table;
    $(document).ready(function() {
      table = $('#table').DataTable({ 
        
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('myevent/ajax_open/')?>",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
          "targets": [  ], //last column
          "orderable": false, //set not orderable
        },
        ],

      });
    });

    function reload_table()
    {
      table.ajax.reload(null,false); //reload datatable ajax 
    }
	
	
	
	
	 function cekinclass(id)
    {
	var tanya=prompt("Entry Class name?");
	if(tanya==false){ return false;};
           window.open(
			'<?php echo base_url();?>myevent/kelas/'+id+'/'+tanya,
			'_blank' // <- This is what makes it open in a new window.
					);
      
      
    }	
	 function deleted(id)
    {
      if(confirm('Are you sure delete this event?'))
      {
        // ajax delete data to database
          $.ajax({
            url : "<?php echo base_url();?>myevent/delete/"+id,
            type: "POST",
            data: "JSON",
            success: function(data)
            {
               //if success reload ajax table
               reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
         
      }
    }

</script>

<script>
function widget(id)
{

  // ajax delete data to database
          $.ajax({
            url : "<?php echo base_url();?>on/getWidget/"+id,
            type: "POST",
            data: "JSON",
            success: function(data)
            {
              $("#widget").modal("show");
              $(".loadWidget").html(data);
              $(".modal-title").html("<b>"+nama+"</b>");
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
}
</script>

	
<!-- Bootstrap modal -->
  <div class="modal fade" id="widget" role="dialog" >
		<div class="modal-dialog">
               <div class="md-content">
				<div class="modal-header">
				<button data-dismiss="modal" class="md-close close">&times;</button>
				<h4 class="modal-title"><b>WIDGET FORM</b></h4>
				</div>
				<div class="modal-body loadWidget">
			
				</div>
				</div>
		</div>
   </div><!-- /.modal-dialog -->
<!-- End Bootstrap modal -->

<script>
function tampil(id,nama)
{

  // ajax delete data to database
          $.ajax({
            url : "<?php echo base_url();?>form/tampil/"+id,
            type: "POST",
            data: "JSON",
            success: function(data)
            {
              $("#tampil").modal("show");
              $("#dataload").html(data);
              $(".modal-title").html("<b>"+nama+"</b>");
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
}
</script>
<!-- Bootstrap modal -->
  <div class="modal fade" id="tampil" role="dialog" >
		<div class="modal-dialog">
               <div class="md-content">
				<div class="modal-header">
				<button data-dismiss="modal" class="md-close close">&times;</button>
				<h4 class="modal-title"><b>Formulir</b></h4>
				</div>
				<div class="modal-body">
				<span id="dataload"></span>
				</div>
				</div>
		</div>
   </div><!-- /.modal-dialog -->
<!-- End Bootstrap modal -->

