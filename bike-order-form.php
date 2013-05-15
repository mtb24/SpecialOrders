<?php
include_once('configuration.php');
include_once("stores.inc.php");
?>
<form id="Bike_order_form">
<div class="top_row">
    <div class="float_left">
	<table>
	    <thead><tr><th colspan="2"><span style="font-size:1.2em;">Customer</span></th></tr></thead>
	    <tbody>
		<tr>
		    <td><label for="cust_name_first">First Name:</label></td><td><input id="name_first" name="cust_name_first" type="text" class="small" tabindex="1" /></td>
		</tr>
		<tr>
		    <td><label for="cust_name_last">Last Name:</label></td><td><input id="name_last" name="cust_name_last" type="text" class="small" tabindex="1" /></td>
		</tr>
		<tr>
		    <td><label for="cust_email">eMail:</label></td><td><input id="email" name="cust_email" type="email" class="small email" tabindex="1" /></td>
		</tr>
		<tr>
		    <td><label for="cust_day_phone">Day Phone:</label></td><td><input id="day_phone" name="cust_day_phone" type="text" class="small"  data-invalid="Please enter Customer's Phone Number!" tabindex="1" /></td>
		</tr>
	    </tbody>
	</table>
    </div>
    <div id="stores" class="float_left">
        <span style="font-size:1.2em;margin-left:30px;">Store</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <select id="store" name="store" tabindex="1">
	    <option id="" value="" title="0.00"></option>
	    <?php
	        foreach($aStores as $store)
	        {
	            echo '<option id="'.$store["id"].'" value="'.$store["store_name"].'" title="'.$store["taxRate"].'">'.$store["store_name"].'</option>';
	        }
	    ?>
        </select><br /><br />
        <span style="font-size:1.2em;margin-left:30px;">Employee: </span> <input id="employee" name="employee_name" type="text" class="small" tabindex="1" /><br /><br />
	<span style="font-size:1.2em;margin-left:30px;">Receipt #</span>&nbsp;&nbsp;&nbsp;<input id="receipt_number" name="receipt_number" class="alphanumeric_plus" type="text" size="20" tabindex="1" />
    </div>
    <div class="float_left last">
	<img style="float:left;margin-right:15px;" height="80" width="76" src="resources/images/monkey_pointing_80x76.jpeg" />
	<span id="orderType">Is this a new bike/frame order? <input name="orderType" type="radio" value="bike" class="radio" checked="checked" /><br /><br />
	          Crash replacement? &nbsp;&nbsp;&nbsp;&nbsp;<input name="orderType" type="radio" value="crash" class="radio" /></span><br />
	<div id="RAnumber">RA# <input name="RA_number" class="small" type="text" title="RA Number" /><br /><span id="RA-text">RA# only necessary if provided by manufacturer</span></div>
    </div>
</div>
<br clear="all" />
    <div class="table">
	<table>
	    <thead>
		<tr>
		    <th class="part6num">Rpro #</th>
		    <th>Dept</th>
		    <th>Vend</th>
		    <th>Vendor Part #</th>
		    <th>Description</th>
		    <th>Size</th>
		    <th>Attr</th>
		    <th>Price</th>
		    <th>Qty</th>
		    <th class="last">Total</th>
		</tr>
	    </thead>
	    <tbody>
		<tr>
		    <td><input id="item_1_rpro_num" name="item_1_rpro_num" class="alphanumeric_plus part6num" type="text" size="10"  tabindex="1" /></td>
		    <td><input id="item_1_dept" name="item_1_dept" type="text" size="5" class="alphanumeric_plus" tabindex="1" /></td>
		    <td><input id="item_1_vend" name="item_1_vend" type="text" size="10" class="alphanumeric_plus" tabindex="1" /></td>
		    <td><input id="item_1_manu_part_num" name="item_1_manu_part_num" type="text" size="10" class="alphanumeric_plus" tabindex="1" /></td>
		    <td><input id="item_1_desc" name="item_1_desc" type="text" size="15" class="alphanumeric_plus" tabindex="1" /></td>
		    <td><input id="item_1_size" name="item_1_size" type="text" size="5" class="" tabindex="1" /></td>
		    <td><input id="item_1_attr" name="item_1_attr" type="text" size="10" class="alphanumeric_plus" tabindex="1" /></td>
		    <td><input id="item_1_price" name="item_1_price" size="6" class="item1 numeric_plus" tabindex="1" /></td>
		    <td><input id="item_1_qty" name="item_1_qty" size="2" class="item1 numeric" tabindex="1" /></td>
		    <td><input id="item_1_total" name="item_1_total" type="text" size="6" class="item1" READONLY tabindex=0 /></td>
		</tr>
		<tr>
		    <td><input id="item_2_rpro_num" name="item_2_rpro_num" class="alphanumeric_plus part6num" type="text" size="10" tabindex="1" /></td>
		    <td><input id="item_2_dept" name="item_2_dept" type="text" size="5" class="alphanumeric_plus" tabindex="1" /></td>
		    <td><input id="item_2_vend" name="item_2_vend" type="text" size="10" class="alphanumeric_plus" tabindex="1" /></td>
		    <td><input id="item_2_manu_part_num" name="item_2_manu_part_num" type="text" size="10" class="alphanumeric_plus" tabindex="1" /></td>
		    <td><input id="item_2_desc" name="item_2_desc" type="text" size="15" class="alphanumeric_plus" tabindex="1" /></td>
		    <td><input id="item_2_size" name="item_2_size" type="text" size="5" class="" tabindex="1" /></td>
		    <td><input id="item_2_attr" name="item_2_attr" type="text" size="10" class="alphanumeric_plus" tabindex="1" /></td>
		    <td><input id="item_2_price" name="item_2_price" type="text" size="6" class="item2 numeric_plus" tabindex="1" /></td>
		    <td><input id="item_2_qty" name="item_2_qty" type="text" size="2" class="item2 numeric" tabindex="1" /></td>
		    <td><input id="item_2_total" name="item_2_total" type="text" size="6" class="item2" READONLY tabindex=0 /></td>
		</tr>
		<tr>
		    <td><input id="item_3_rpro_num" name="item_3_rpro_num" class="alphanumeric_plus part6num" type="text" size="10" tabindex="1" /></td>
		    <td><input id="item_3_dept" name="item_3_dept" type="text" size="5" class="alphanumeric_plus" tabindex="1" /></td>
		    <td><input id="item_3_vend" name="item_3_vend" type="text" size="10" class="alphanumeric_plus" tabindex="1" /></td>
		    <td><input id="item_3_manu_part_num" name="item_3_manu_part_num" type="text" size="10" class="alphanumeric_plus" tabindex="1" /></td>
		    <td><input id="item_3_desc" name="item_3_desc" type="text" size="15" class="alphanumeric_plus" tabindex="1" /></td>
		    <td><input id="item_3_size" name="item_3_size" type="text" size="5" class="" tabindex="1" /></td>
		    <td><input id="item_3_attr" name="item_3_attr" type="text" size="10" class="alphanumeric_plus" tabindex="1" /></td>
		    <td><input id="item_3_price" name="item_3_price" type="text" size="6" class="item3 numeric_plus" tabindex="1" /></td>
		    <td><input id="item_3_qty" name="item_3_qty" type="text" size="2" class="item3 numeric" tabindex="1" /></td>
		    <td><input id="item_3_total" name="item_3_total" type="text" size="6" class="item3" READONLY tabindex=0 /></td>
		</tr>
		<tr>
		    <td><input id="item_4_rpro_num" name="item_4_rpro_num" class="alphanumeric_plus part6num" type="text" size="10" tabindex="1" /></td>
		    <td><input id="item_4_dept" name="item_4_dept" type="text" size="5" class="alphanumeric_plus" tabindex="1" /></td>
		    <td><input id="item_4_vend" name="item_4_vend" type="text" size="10" class="alphanumeric_plus" tabindex="1" /></td>
		    <td><input id="item_4_manu_part_num" name="item_4_manu_part_num" type="text" size="10" class="alphanumeric_plus" tabindex="1" /></td>
		    <td><input id="item_4_desc" name="item_4_desc" type="text" size="15" class="alphanumeric_plus" tabindex="1" /></td>
		    <td><input id="item_4_size" name="item_4_size" type="text" size="5" class="" tabindex="1" /></td>
		    <td><input id="item_4_attr" name="item_4_attr" type="text" size="10" class="alphanumeric_plus" tabindex="1" /></td>
		    <td><input id="item_4_price" name="item_4_price" type="text" size="6" class="item4 numeric_plus" tabindex="1" /></td>
		    <td><input id="item_4_qty" name="item_4_qty" type="text" size="2" class="item4 numeric" tabindex="1" /></td>
		    <td><input id="item_4_total" name="item_4_total" type="text" size="6" class="item4" READONLY tabindex=0 /></td>
		</tr>
		<tr>
		    <td><input id="item_5_rpro_num" name="item_5_rpro_num" class="alphanumeric_plus part6num" type="text" size="10" tabindex="1" /></td>
		    <td><input id="item_5_dept" name="item_5_dept" type="text" size="5" class="alphanumeric_plus" tabindex="1" /></td>
		    <td><input id="item_5_vend" name="item_5_vend" type="text" size="10" class="alphanumeric_plus" tabindex="1" /></td>
		    <td><input id="item_5_manu_part_num" name="item_5_manu_part_num" type="text" size="10" class="alphanumeric_plus" tabindex="1" /></td>
		    <td><input id="item_5_desc" name="item_5_desc" type="text" size="15" class="alphanumeric_plus" tabindex="1" /></td>
		    <td><input id="item_5_size" name="item_5_size" type="text" size="5" class="" tabindex="1" /></td>
		    <td><input id="item_5_attr" name="item_5_attr" type="text" size="10" class="alphanumeric_plus" tabindex="1" /></td>
		    <td><input id="item_5_price" name="item_5_price" type="text" size="6" class="item5 numeric_plus" tabindex="1" /></td>
		    <td><input id="item_5_qty" name="item_5_qty" type="text" size="2" class="item5 numeric" tabindex="1" /></td>
		    <td><input id="item_5_total" name="item_5_total" type="text" size="6" class="item5" READONLY tabindex=0 /></td>
		</tr>
	    </tbody>
	</table>
    </div>
    <div class="left" style="margin-top:15px;padding:5px;">
	<span style="font-size:1.2em;margin:10px;">Comments</span><br /><br />
	<textarea name="comments" id="comments" class="" rows="3" cols="110" tabindex="1"></textarea>
    </div>
    <div id="results_lower" class="">
	<input id="Bike_order_submit_button" type="button" name="order" class="submit" value="Submit Bike Order" />
    </div>
</form>