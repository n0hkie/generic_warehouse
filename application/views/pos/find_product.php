<form class="form-horizontal" role="form">
  <div class="form-group">
    <label class="control-label col-sm-2" for="bin_location">Product/Bin:</label>
    <div class="col-sm-10">
      <input type="text" name="bin_location" class="form-control fix-width-40p" id="bin_location" placeholder="Enter Location Product/Bin" value="">
    </div>
  </div>    
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="button" id="find_location" class="btn btn-default">Find</button>
    </div>
  </div>  
  
  <div class="form-group">
    <label class="control-label col-sm-2" for="retproduct_name">Product Name:</label>
    <div class="col-sm-10">
      <input type="text" name="retproduct_name" class="form-control fix-width-40p" id="retproduct_name" value="" readonly>
      <input type="hidden" name="retproduct_id" class="form-control fix-width-40p" id="retproduct_id" value="" readonly>
    </div>
  </div>   
  <div class="form-group">
    <label class="control-label col-sm-2" for="retbin_location">Bin Location:</label>
    <div class="col-sm-10">
      <input type="text" name="retbin_location" class="form-control fix-width-40p" id="retbin_location" value="" readonly>
    </div>
  </div>   
  <div class="form-group">
    <label class="control-label col-sm-2" for="retprod_quantity">Stock Level:</label>
    <div class="col-sm-10">
      <input type="text" name="retprod_quantity" class="form-control fix-width-40p" id="retprod_quantity" value="" readonly>
    </div>
  </div>     
</form>
<script type="application/javascript">
    $( document ).ready(function() {
        $("#find_location").on('click',function(e){
			find_by_location();
        });
    });
	function find_by_location(){
		$.ajax({
			url: "<?php echo base_url();?>find-product-by-location",
			headers: { 'csrf': "<?php echo $csrf;?>" },
			data: {
				bin_name: $('#bin_location').val()
			},
			type: "POST",
			success: function( json ) {
				var obj = $.parseJSON( json );
				
				if(obj.success==1){
					$("#retproduct_id").val(obj.data[0].prod_id);
					$("#retproduct_name").val(obj.data[0].prod_name);
					$("#retbin_location").val(obj.data[0].bin_name);
					$("#retprod_quantity").val(obj.data[0].prod_quantity);
				} else {
					$("#retproduct_id").val('');
					$("#retproduct_name").val('');
					$("#retbin_location").val('');
					$("#retprod_quantity").val('');
				}			
			},
			error: function( xhr, status, errorThrown ) {
				console.log( "Error: " + errorThrown );
				console.log( "Status: " + status );
				console.dir( xhr );
			},
			complete: function( xhr, status ) {
				
			}
		});	
	}
</script>