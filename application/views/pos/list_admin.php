<a href="<?php echo base_url(); ?>pos-admin-create"><i class="glyphicon glyphicon-user"></i> Create Admin</a>
<hr>

<table id="myTable" class="table table-striped table-bordered display compact stripe hover" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>
                Last Name
            </th>
            <th>
                First Name
            </th>
            <th>
                Action
            </th>
        </tr>
    </thead>
    <tbody>
        <?php
            $tr = '';
            foreach ($data->result() as $row){
                $admin_id = $this->encrypt->encode($row->intID);
                $tr.='<tr>';
                    $tr.='<td>';
                        $tr.=$row->strLastName;
                    $tr.='</td>';                
                    $tr.='<td>';
                        $tr.=$row->strFirstName;
                    $tr.='</td>';                  
                    $tr.='<td>';
                        $tr.='<a href="'.base_url().'pos-admin-edit/'.$admin_id.'?r='.$row->intID.'"><i class="glyphicon glyphicon-edit"></i> Edit</a>&nbsp;';
                        $tr.=' <a href="javascript:delete_admin(\''.$admin_id.'\')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
                    $tr.='</td>'; 
                $tr.='</tr>';
            }        
            echo $tr;
        ?>    
    </tbody>
</table>
<script type="text/javascript">
    $(document).ready(function(){
        $('#myTable').DataTable();
    });
    
    function delete_admin(admin_id){
        $.ajax({
            url: "<?php echo base_url();?>pos-admin-delete",
            headers: { 'csrf': "<?php echo $csrf;?>" },
            data: {
                admin_id: admin_id
            },
            type: "POST",
            success: function( json ) {
                var obj = $.parseJSON( json );

                if(obj.success==1){
                    location.href = "<?php echo base_url();?>pos-admin";
                } else {
                    $("#myModalContent").html(obj.message);
                    $("#myModal").modal();
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