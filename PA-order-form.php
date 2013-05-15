<?php
include_once('configuration.php');
include_once("stores.inc.php");
?>
<form id="PA_order_form">
    <input name="orderType" type="hidden" value="PA" />
<div class="top_row">
    <div><span class="QBPnotification">If you are ordering a QBP Part use <a href="http://mikesbikes.com/special-orders-qc129/" target="_NEW">MB.com</a> instead!!!</span></div>
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
    <div class="float_left">
	<table>
	    <thead><tr><th colspan="2"><span style="font-size:1.2em;">Billing</span></th></tr></thead>
	    <tbody>
		<tr>
		    <td><div class="label"><label for="billing_street">Street:</label></div></td><td><div class="input"><input id="billing_street" name="billing_street" type="text" class="small"  data-invalid="Please enter Customer's Billing Street!" tabindex="1" /></div></td>
		</tr>
		<tr>
		    <td><div class="label"><label for="billing_city">City:</label></div></td><td><div class="input"><input id="billing_city" name="billing_city" type="text" class="small"  data-invalid="Please enter Customer's Billing City!" tabindex="1" /></div></td>
		</tr>
		<tr>
		    <td><div class="label"><label for="billing_state">State:</label></div></td><td><div class="input"><input id="billing_state" name="billing_state" type="text" class="small"  data-invalid="Please enter Customer's Billing State!" tabindex="1" /></div></td>
		</tr>
		<tr>
		    <td><div class="label"><label for="billing_zip">Zip:</label></div></td><td><div class="input"><input id="billing_zip" name="billing_zip" type="text" class="small"  tabindex="1" /></div></td>
		</tr>
	    </tbody>
	</table>
    </div>
    <div class="float_left last">
	<table>
	    <thead><tr><th colspan="2"><span style="font-size:1.2em;">Shipping</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="same_as_billing" name="same_as_billing" type="checkbox" tabindex="1" />&nbsp;Same as billing</th></tr></thead>
	    <tbody>
		<tr>
		    <td><div class="label"><label for="shipping_street">Street:</label></div></td><td><div class="input"><input id="shipping_street" name="shipping_street" type="text" class="small" tabindex=0 /></div></td>
		</tr>
		<tr>
		    <td><div class="label"><label for="shipping_city">City:</label></div></td><td><div class="input"><input id="shipping_city" name="shipping_city" type="text" class="small" tabindex=0 /></div></td>
		</tr>
		<tr>
		    <td><div class="label"><label for="shipping_state">State:</label></div></td><td><div class="input"><input id="shipping_state" name="shipping_state" type="text" class="small" tabindex=0 /></div></td>
		</tr>
		<tr>
		    <td><div class="label"><label for="shipping_zip">Zip:</label></div></td><td><div class="input"><input id="shipping_zip" name="shipping_zip" type="text" class="small" tabindex=0 /></div></td>
		</tr>
	    </tbody>
	</table>
    </div>
</div>
<br clear="all" />
<div id="stores" class="">
    <span style="font-size:1.2em;">Store</span>&nbsp;&nbsp;&nbsp;
    <select id="store" name="store" tabindex="1" onChange="taxRate();">
	<option id="" value="" title="0.00"></option>
	<?php
	    foreach($aStores as $store)
	    {
	        echo '<option id="'.$store["id"].'" value="'.$store["store_name"].'" title="'.$store["taxRate"].'">'.$store["store_name"].'</option>';
	    }
	?>
    </select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <span style="font-size:1.2em;">Employee: </span> <input id="employee" name="employee_name" type="text" class="small" tabindex="1" />
</div>
<br clear="all" />
<br />
    <div class="table">
	<table>
	    <thead>
		<tr>
		    <th class="">Rpro #</th>
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
		    <td><input id="item_1_rpro_num" name="item_1_rpro_num" class="alphanumeric_plus" type="text" size="10"  tabindex="1" /></td>
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
		    <td><input id="item_2_rpro_num" name="item_2_rpro_num" class="alphanumeric_plus" type="text" size="10" tabindex="1" /></td>
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
		    <td><input id="item_3_rpro_num" name="item_3_rpro_num" class="alphanumeric_plus" type="text" size="10" tabindex="1" /></td>
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
		    <td><input id="item_4_rpro_num" name="item_4_rpro_num" class="alphanumeric_plus" type="text" size="10" tabindex="1" /></td>
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
		    <td><input id="item_5_rpro_num" name="item_5_rpro_num" class="alphanumeric_plus" type="text" size="10" tabindex="1" /></td>
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
    <div class="left" style="margin-top:25px;padding:5px;">
	<select name="ship_method" id="ship_method" tabindex="1" onchange="shipType(this.options[this.selectedIndex].text);">
	    <option id="" value="">--Select Ship Method--</option>
	    <option id="repair" value="0.00"> Repair Bike</option>
	    <option id="store_pickup" value="0.00"> Pickup at Store</option>
	    <option id="orderlessthan100"  value="6.00"> $0-99 Order</option>
	    <option id="order100to200"  value="12.00"> $100-199 Order</option>
	    <option id="orderover200"  value="18.00"> $200+ Order</option>
	</select>&nbsp;&nbsp;&nbsp;
	<span style="font-size:1.2em;">Shipping </span>$<input id="shipping_charge" name="shipping_charge" type="text" size="10" />&nbsp;&nbsp;
	<span style="font-size:1.2em;">Tax (<span id="taxRateLabel">0.00</span>%) </span>$<input id="tax" name="tax" type="text" size="10" value="" READONLY />&nbsp;&nbsp;
	<span style="font-size:1.2em;margin-left:20px;">Grand Total </span>$<input id="total_charge" name="total" type="text" size="10" value="" READONLY />&nbsp;&nbsp;
	<input type="hidden" name="ship_type" id="ship_type" value="" />
    </div>
    <div class="left" style="margin-top:25px;padding:5px;">
	<input id="visa" name="cust_cc_type" type="radio" value="visa" class="" tabindex="1" /><img src="resources/images/visa_60x38.png" width="60" height="38" alt="Visa" style="margin:0 10px 0 10px;" />&nbsp;&nbsp;&nbsp;&nbsp;
	<input id="mastercard" name="cust_cc_type" type="radio" value="mastercard" class="" tabindex="1" /><img src="resources/images/master-card_60x38.png" width="60" height="38" alt="Master Card" style="margin:0 10px 0 10px;" />&nbsp;&nbsp;&nbsp;&nbsp;
	<input id="amex" name="cust_cc_type" type="radio" value="amex" class="" tabindex="1" /><img src="resources/images/amex-card_60x38.png" width="60" height="38" alt="American Express" style="margin:0 10px 0 10px;" />&nbsp;&nbsp;&nbsp;&nbsp;
	<input id="discover" name="cust_cc_type" type="radio" value="discover" class="" tabindex="1" /><img src="resources/images/discover_card_50x34.png" width="60" height="38" alt="Discover" style="margin:0 10px 0 10px;" />&nbsp;&nbsp;&nbsp;&nbsp;
	<input id="giftcard" name="cust_cc_type" type="radio" value="Gift Card" class="" tabindex="1" /><img src="resources/images/MB_giftcard_60x38.png" width="60" height="38" alt="Mikes Bikes Gift Card" style="margin:0 10px 0 10px;" />&nbsp;&nbsp;&nbsp;&nbsp;
    <div>
	<div id="card_details">
	    Credit Card #&nbsp;<input id="cust_cc_num1" name="cust_cc_num1" type="text" size="4" maxlength="4" class="cc_numeric" onkeyup="doNext(this);" />&nbsp;&nbsp;&nbsp;
	                       <input id="cust_cc_num2" name="cust_cc_num2" type="text" size="4" maxlength="4" class="cc_numeric" onkeyup="doNext(this);"/>&nbsp;&nbsp;&nbsp;
			       <input id="cust_cc_num3" name="cust_cc_num3" type="text" size="4" maxlength="4" class="cc_numeric" onkeyup="doNext(this);"/>&nbsp;&nbsp;&nbsp;
			       <input id="cust_cc_num4" name="cust_cc_num4" type="text" size="4" maxlength="4" class="cc_numeric" onkeyup="doNext(this);"/>&nbsp;&nbsp;&nbsp;
	    Expiration (MM/YY)&nbsp;<input id="cust_cc_exp" name="cust_cc_exp" type="text" size="5" value="" maxlength="5" class="date_numeric" onkeyup="doNext(this);" />&nbsp;&nbsp;&nbsp;
	    CVC #&nbsp;<input id="cust_cc_cvc" name="cust_cc_cvc" type="text" size="4" maxlength="4" class="numeric" />

	</div>
	<div id="receipt"><span style="font-size:1.2em;">Receipt #</span>&nbsp;&nbsp;&nbsp;<input id="receipt_number" name="receipt_number" class="alphanumeric_plus" type="text" size="20" tabindex="1" /></div>
    </div>
	<br />
    </div>
    <div class="left" style="margin-top:15px;padding:5px;">
	<span style="font-size:1.2em;margin:10px;">Comments</span><br /><br />
	<textarea name="comments" id="comments" class="" rows="3" cols="110" tabindex="1"></textarea>
    </div>
<div id="results_lower" class="" style="clear: both;">
    <input id="PA_order_submit_button" type="button" name="order" class="submit" value="Submit P&A Order" tabindex="1" />
</div>
</form>