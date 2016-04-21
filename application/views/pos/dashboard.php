<!--<img id="dashboard_img" src="<?php echo base_url(); ?>assets/images/dashboard.png" />-->

<?php
	$str = '';
	if(count($rack)>0){
		if(count($bin)>0){
			$left='';
			$right='';	
			
			foreach($rack as $key=>$val){
				$picker = '';
				$str .= '<div class="rack">';
				$str .= '<ul>';
				if($rack_fron[$key][1]=='L'){
					if($right==''){
						$left='<div class="space-left">&nbsp;&nbsp;</div>';
					}
					$right='';					
				}			
				if($rack_fron[$key][1]=='R'){
					$left='';
					$right='<div class="space-right">&nbsp;&nbsp;</div>';
				}

				foreach($bin as $k=>$v){
					$bgcolor='qty-high';

					if($val==$v['rack_location']){
						if($v['prod_quantity']<=0){
							$bgcolor='qty-low';
						}
						$str .= '<li>';
							$str.=$left;
							$str .= '<div onclick="showDescription('.$v['bin_id'].')" class="bin-desc bin-'.$v['bin_id'].' '.$bgcolor.'">'.$v['bin_name'].'</div>';
							$str.=$right;
							$str .= '<div id="bin-'.$v['bin_id'].'" class="product-desc">';
								$str .= '<div class="product-name">';
								$str .= 'Product Name: '.$v['prod_name'];
								$str .= '</div>';
								$str .= '<div class="product-qty">';
								$str .= 'Quantity: '.$v['prod_quantity'];
								$str .= '</div>';	
								$str .= '<div class="location">';
								$str .= 'Rack: '.$v['rack_location'].' Bin:'.$v['bin_location'];
								$str .= '</div>';								
							$str .= '</div>';
						$str .= '</li>';
					}
				}
				$str .= '</ul>';
				
				$str .= '</div>';
			}
		}
	}
	echo $str;
?>

<script type="application/javascript">
    $( document ).ready(function() {

    });
	function showDescription(id){
		$('.product-desc').hide();
		$('#bin-'+id).show();
	}
</script>