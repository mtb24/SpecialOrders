<?php
include_once('configuration.php');
include_once('stores.inc.php');
?>
<div id="vendors">
   <a href="http://ibd.specialized.com/" rel="external" target="_NEW"><img src="resources/images/vendors/spec-b2b-mast_241x64.png" width="240" height="64" alt="Go to Specialized B2B site" /></a>
   <a href="https://www.accessraleigh.com/eSuiteProd/Default.aspx" rel="external" target="_NEW"><img src="resources/images/vendors/raleigh_359x64.gif" width="350" height="64" alt="Go to Raleigh site" /></a>
   <a href="http://www.qbp.com/" rel="external" target="_NEW"><img src="resources/images/vendors/QBP_221x64.png" width="220" height="64" alt="Go to QBP site" /></a>
   <a href="http://dealer.electrabike.com" rel="external" target="_NEW"><img src="resources/images/vendors/Electra_Logo_230x64.jpg" width="225" height="64" alt="Go to Electra site" /></a>
</div>
<div class="form">
   <div class="fields">
      <div class="field">
	 <div class="input" style="margin: 0px 0px 0px 20px; float: left; white-space: nowrap;">
	    <input id="search_order_input_box" class="large" name="search_order" type="text" value="" size="45" placeholder="Search by Customer Last Name, or Order #" /><br /><br /><br />
	    <strong>For QBP special orders submitted through MB.com- status can be checked on the "My Account" page on <a href="https://securecart.net/account.cfm?domain=mikesbikes%2Ecom&CFID=135221584&CFTOKEN=d1267f681c1f4e4b-4FB48FF1-5056-9212-1A823FE97806EE49" target="_new">MB.com</a></strong>
	 </div>

	 <div class="input" style="margin: 3px 0px 0px 0px; float: right; white-space: nowrap;font-size:1.2em;">
	    <select id="openOrderSearch" class="small" name="openOrderSearch">
	       <option value="null">Search all open orders by Store -</option>
		  <?php
		      foreach($aStores as $store)
		      {
			  echo '<option value="'.$store["store_name"].'">'.$store["store_name"].'</option>';
		      }
		  ?>
	    </select>
	 </div>
      </div>
   </div>
</div>
<div id="search_results"></div>
