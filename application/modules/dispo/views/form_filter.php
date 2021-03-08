											<div class="form-group">
												<label for="exampleFormControlSelect1">Filter Provinsi</label>
													<div class="select2-input">
														 
														<?php
														 
														$this->db->order_by("nama","asc");
														$data=$this->db->get("wil_provinsi")->result();
														$db[null]="---- filter provinsi ----";
														foreach($data as $data)
														{
															$db[$data->id_prov]=$data->nama;
														}
														echo form_dropdown("fprov",$db,"","id='fprov' class='form-control' onchange='onGroup(this.value)' ");
														?>
													</div>
											</div>


				<div class="form-group">
												<label for="exampleFormControlSelect1">Filter Kabupaten</label>
												<div id="form_kab">
												<select class="form-control" id="fkab">
													 <option value=''>---- filter kabupaten ----</option>
												</div>
												</select>
				 </div>
						<br>		
					 	
<center><button class='btn btn-primary' onclick="reload_table_filter()">Filter</button></center>






 



								
					  <script type="text/javascript"> 
	 	$(document).ready(function() {
       $('#').select2({
		      closeOnSelect: false,
		   theme: "bootstrap",
           minimumInputLength: 0,
           allowClear: true,
		    dropdownParent: $('#mdl_modal'),
             placeholder: 'pilih dari group...',
           ajax: {
              dataType: 'json',
              url: '<?php echo base_url()?>permohonan/dataProvinsi',
              delay: 100,
              data: function(params) {
                return {
                  search: params.term
                }
              },
              processResults: function (data, page) {
              return {
                results: data
              };
            },
          }
      });
      
		});
		
	function onGroup(val)
	{
		 
		     $("#form_kab").html("Loading...");
			 $.post("<?php echo site_url("permohonan/form_kab"); ?>",{val:val},function(data){
		 	   $("#form_kab").html(data);  
			}); 
	}		
		 
	function reload_table_filter()
	{
		$("#mdl_modal").modal("hide");
		reload_table();
	}
 
</script>

