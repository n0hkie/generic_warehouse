select 
tbl_product.intID as prod_id,
tbl_product.strName as prod_name,
tbl_product.intQuantity as prod_quantity,
tbl_bin.intID as bin_id,
tbl_bin.strName as bin_name,
tbl_bin.intLocation as bin_location,
tbl_rack.intID as rack_id,
tbl_rack.strName as rack_name,
tbl_rack.intLocation as rack_location,
tbl_rack.strOpen as rack_front,
IFNULL(tbl_picker.intID,0) as picker_id,
IFNULL(tbl_picker.strName,0) as picker_name
from tbl_product
left join tbl_bin on tbl_bin.intID = tbl_product.intBinID
left join tbl_rack on tbl_rack.intID = tbl_bin.intRackID
left join tbl_picker on tbl_picker.intRackID = tbl_rack.intID
order by tbl_bin.intID asc
