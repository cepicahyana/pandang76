<div>
<center>
<input type="text" name="barcode" id="barcode" class='form-control' placeholder="Scand..." style="width:50%" onchange="setValidasi()">
</center>
</div>
<script>
$("[name='barcode']").focus();

function setValidasi()
{	$("#hasil").html("");
	var barcode=$("[name='barcode']").val();
	var  url = "<?php echo base_url()?>myevent/setValidasi/"+barcode; 
          $.ajax({
            url : url,
            type: "POST",
             success: function(data)
            {
				if(data=="true")
				{
					$("#hasil").html(barcode+ " Tersimpan");
				}else{
					$("#hasil").html(barcode+ " Sudah pernah divalidasi");
				} 
				$("[name='barcode']").val("");
            }
        });
}


</script>
<div>
<center>
<h1 id="hasil"></h1>
</center>
</div>