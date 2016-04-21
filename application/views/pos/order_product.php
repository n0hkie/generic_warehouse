<?php
    $str_option = '<option value="0">Choose Product</option>';
    if($data!=null){
        foreach ($data->result() as $row){
            
            $str_option .= '<option value="'.$row->prod_id.'">'.$row->prod_name.'</option>';
        }
    }
?>
<form class="form-horizontal" role="form">
    <div class="form-group">
        <label class="control-label col-sm-2" for="bin_location">Product #1:</label>
        <div class="col-sm-10">
            <select name="products_name_1" class="col-md-6 products_name" id="products_name_1">
                <?php echo $str_option;?>
            </select>
            Quantity: <input type="number" id="products_qty_1" placeholder="Enter Quantity" />
        </div>
    </div>   
    <div class="form-group">
        <label class="control-label col-sm-2" for="bin_location">Product #2:</label>
        <div class="col-sm-10">
            <select name="products_name_2" class="col-md-6 products_name" id="products_name_2">
                <?php echo $str_option;?>
            </select>
            Quantity: <input type="number" id="products_qty_2" placeholder="Enter Quantity" />
        </div>
    </div> 
    <div class="form-group">
        <label class="control-label col-sm-2" for="bin_location">Product #3:</label>
        <div class="col-sm-10">
            <select name="products_name_3" class="col-md-6 products_name" id="products_name_3">
                <?php echo $str_option;?>
            </select>
            Quantity: <input type="number" id="products_qty_3" placeholder="Enter Quantity" />
        </div>
    </div> 
    <div class="form-group">
        <label class="control-label col-sm-2" for="bin_location">Product #4:</label>
        <div class="col-sm-10">
            <select name="products_name_4" class="col-md-6 products_name" id="products_name_4">
                <?php echo $str_option;?>
            </select>
            Quantity: <input type="number" id="products_qty_4" placeholder="Enter Quantity" />
        </div>
    </div>     
    <div class="form-group">
        <label class="control-label col-sm-2" for="bin_location">Product #5:</label>
        <div class="col-sm-10">
            <select name="products_name_5" class="col-md-6 products_name" id="products_name_5">
                <?php echo $str_option;?>
            </select>
            Quantity: <input type="number" id="products_qty_5" placeholder="Enter Quantity" />
        </div>
    </div>     
    <div class="form-group"> 
        <div class="col-sm-offset-2 col-sm-10">
            <button type="button" id="find_location" class="btn btn-default">Order</button>
        </div>
    </div>      
</form>
<script type="application/javascript">
    $( document ).ready(function() {
        $(".products_name").select2();       
    });
    function check_data(){
        for(i<=1;i<=5;i++){
            products_name = $('#products_name_'+i).val();
            console.log(products_name);
        }
    }
</script>