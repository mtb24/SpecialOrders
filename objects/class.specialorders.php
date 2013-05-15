<?php

include_once('class.pog_base.php');
class specialOrders extends POG_Base
{
	public $specialordersId = '';

	/**
	 * @var DATE
	 */
	public $date_submitted;

	/**
	 * @var VARCHAR(255)
	 */
	public $cust_email;

	/**
	 * @var VARCHAR(255)
	 */
	public $cust_day_phone;

	/**
	 * @var VARCHAR(255)
	 */
	public $billing_street;

	/**
	 * @var VARCHAR(255)
	 */
	public $billing_city;

	/**
	 * @var VARCHAR(255)
	 */
	public $billing_state;

	/**
	 * @var VARCHAR(255)
	 */
	public $billing_zip;

	/**
	 * @var VARCHAR(255)
	 */
	public $shipping_street;

	/**
	 * @var VARCHAR(255)
	 */
	public $shipping_city;

	/**
	 * @var VARCHAR(255)
	 */
	public $shipping_state;

	/**
	 * @var VARCHAR(255)
	 */
	public $shipping_zip;

	/**
	 * @var VARCHAR(255)
	 */
	public $store;

	/**
	 * @var VARCHAR(255)
	 */
	public $employee_name;

	/**
	 * @var VARCHAR(255)
	 */
	public $item_1_rpro_num;

	/**
	 * @var VARCHAR(255)
	 */
	public $item_1_dept;

	/**
	 * @var VARCHAR(255)
	 */
	public $item_1_vend;

	/**
	 * @var VARCHAR(255)
	 */
	public $item_1_manu_part_num;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $item_1_desc;

	/**
	 * @var VARCHAR(255)
	 */
	public $item_1_size;

	/**
	 * @var VARCHAR(255)
	 */
	public $item_1_attr;

	/**
	 * @var VARCHAR(10)
	 */
	public $item_1_price;

	/**
	 * @var INT
	 */
	public $item_1_qty;

	/**
	 * @var VARCHAR(10)
	 */
	public $item_1_total;

	/**
	 * @var VARCHAR(255)
	 */
	public $item_2_rpro_num;

	/**
	 * @var VARCHAR(255)
	 */
	public $item_2_dept;

	/**
	 * @var VARCHAR(255)
	 */
	public $item_2_vend;

	/**
	 * @var VARCHAR(255)
	 */
	public $item_2_manu_part_num;
	/**
	 * @var VARCHAR(255)
	 */
	public $item_2_desc;

	/**
	 * @var VARCHAR(255)
	 */
	public $item_2_size;

	/**
	 * @var VARCHAR(255)
	 */
	public $item_2_attr;

	/**
	 * @var VARCHAR(10)
	 */
	public $item_2_price;

	/**
	 * @var INT
	 */
	public $item_2_qty;

	/**
	 * @var VARCHAR(10)
	 */
	public $item_2_total;

	/**
	 * @var VARCHAR(255)
	 */
	public $item_3_rpro_num;

	/**
	 * @var VARCHAR(255)
	 */
	public $item_3_dept;

	/**
	 * @var VARCHAR(255)
	 */
	public $item_3_vend;

	/**
	 * @var VARCHAR(255)
	 */
	public $item_3_manu_part_num;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $item_3_desc;

	/**
	 * @var VARCHAR(255)
	 */
	public $item_3_size;

	/**
	 * @var VARCHAR(255)
	 */
	public $item_3_attr;

	/**
	 * @var VARCHAR(10)
	 */
	public $item_3_price;

	/**
	 * @var INT
	 */
	public $item_3_qty;

	/**
	 * @var VARCHAR(10)
	 */
	public $item_3_total;

	/**
	 * @var VARCHAR(255)
	 */
	public $item_4_rpro_num;

	/**
	 * @var VARCHAR(255)
	 */
	public $item_4_dept;

	/**
	 * @var VARCHAR(255)
	 */
	public $item_4_vend;

	/**
	 * @var VARCHAR(255)
	 */
	public $item_4_manu_part_num;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $item_4_desc;

	/**
	 * @var VARCHAR(255)
	 */
	public $item_4_size;

	/**
	 * @var VARCHAR(255)
	 */
	public $item_4_attr;

	/**
	 * @var VARCHAR(10)
	 */
	public $item_4_price;

	/**
	 * @var INT
	 */
	public $item_4_qty;

	/**
	 * @var VARCHAR(10)
	 */
	public $item_4_total;
	/**
	 * @var VARCHAR(255)
	 */
	public $item_5_rpro_num;

	/**
	 * @var VARCHAR(255)
	 */
	public $item_5_dept;

	/**
	 * @var VARCHAR(255)
	 */
	public $item_5_vend;

	/**
	 * @var VARCHAR(255)
	 */
	public $item_5_manu_part_num;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $item_5_desc;

	/**
	 * @var VARCHAR(255)
	 */
	public $item_5_size;

	/**
	 * @var VARCHAR(255)
	 */
	public $item_5_attr;

	/**
	 * @var VARCHAR(10)
	 */
	public $item_5_price;

	/**
	 * @var INT
	 */
	public $item_5_qty;

	/**
	 * @var VARCHAR(10)
	 */
	public $item_5_total;

	/**
	 * @var VARCHAR(255)
	 */
	public $ship_type;

	/**
	 * @var DECIMAL(5,2)
	 */
	public $shipping_charge;

	/**
	 * @var DECIMAL(5,2)
	 */
	public $tax;

	/**
	 * @var VARCHAR(10)
	 */
	public $total;

	/**
	 * @var VARCHAR(255)
	 */
	public $cust_cc_num;

	/**
	 * @var VARCHAR(255)
	 */
	public $cust_cc_exp;

	/**
	 * @var INT
	 */
	public $cust_cc_cvc;

	/**
	 * @var VARCHAR(255)
	 */
	public $cust_cc_type;

	/**
	 * @var DATE
	 */
	public $date_ordered;

	/**
	 * @var VARCHAR(255)
	 */
	public $rpro_po_num;

	/**
	 * @var VARCHAR(255)
	 */
	public $notes;

	/**
	 * @var INT
	 */
	public $status;

	/**
	 * @var VARCHAR(255)
	 */
	public $cust_name_first;

	/**
	 * @var VARCHAR(255)
	 */
	public $cust_name_last;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $receipt_number;

	/**
	 * @var VARCHAR(255)
	 */
	public $RA_number;
	
	/**
	 * @var TEXT
	 */
	public $comments;

	public $pog_attribute_type = array(
		"specialordersId" => array('db_attributes' => array("NUMERIC", "INT")),
		"date_submitted" => array('db_attributes' => array("NUMERIC", "DATE")),
		"cust_email" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"cust_day_phone" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"billing_street" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"billing_city" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"billing_state" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"billing_zip" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"shipping_street" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"shipping_city" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"shipping_state" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"shipping_zip" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"store" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"employee_name" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"item_1_rpro_num" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"item_1_dept" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"item_1_vend" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"item_1_manu_part_num" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"item_1_desc" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"item_1_size" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"item_1_attr" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"item_1_price" => array('db_attributes' => array("NUMERIC", "VARCHAR", "10")),
		"item_1_qty" => array('db_attributes' => array("NUMERIC", "INT")),
		"item_1_total" => array('db_attributes' => array("NUMERIC", "VARCHAR", "10")),
		"item_2_rpro_num" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"item_2_dept" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"item_2_vend" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"item_2_manu_part_num" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"item_2_desc" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"item_2_size" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"item_2_attr" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"item_2_price" => array('db_attributes' => array("NUMERIC", "VARCHAR", "10")),
		"item_2_qty" => array('db_attributes' => array("NUMERIC", "INT")),
		"item_2_total" => array('db_attributes' => array("NUMERIC", "VARCHAR", "10")),
		"item_3_rpro_num" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"item_3_dept" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"item_3_vend" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"item_3_manu_part_num" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"item_3_desc" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"item_3_size" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"item_3_attr" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"item_3_price" => array('db_attributes' => array("NUMERIC", "VARCHAR", "10")),
		"item_3_qty" => array('db_attributes' => array("NUMERIC", "INT")),
		"item_3_total" => array('db_attributes' => array("NUMERIC", "VARCHAR", "10")),
		"item_4_rpro_num" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"item_4_dept" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"item_4_vend" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"item_4_manu_part_num" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"item_4_desc" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"item_4_size" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"item_4_attr" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"item_4_price" => array('db_attributes' => array("NUMERIC", "VARCHAR", "10")),
		"item_4_qty" => array('db_attributes' => array("NUMERIC", "INT")),
		"item_4_total" => array('db_attributes' => array("NUMERIC", "VARCHAR", "10")),
		"item_5_rpro_num" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"item_5_dept" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"item_5_vend" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"item_5_manu_part_num" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"item_5_desc" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"item_5_size" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"item_5_attr" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"item_5_price" => array('db_attributes' => array("NUMERIC", "VARCHAR", "10")),
		"item_5_qty" => array('db_attributes' => array("NUMERIC", "INT")),
		"item_5_total" => array('db_attributes' => array("NUMERIC", "VARCHAR", "10")),
		"ship_type" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"shipping_charge" => array('db_attributes' => array("NUMERIC", "DECIMAL", "5,2")),
		"tax" => array('db_attributes' => array("NUMERIC", "DECIMAL", "5,2")),
		"total" => array('db_attributes' => array("NUMERIC", "VARCHAR", "10")),
		"cust_cc_num" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"cust_cc_exp" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"cust_cc_cvc" => array('db_attributes' => array("NUMERIC", "INT")),
		"cust_cc_type" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"date_ordered" => array('db_attributes' => array("NUMERIC", "DATE")),
		"rpro_po_num" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"notes" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"status" => array('db_attributes' => array("NUMERIC", "INT")),
		"cust_name_first" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"cust_name_last" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"receipt_number" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"RA_number" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		"comments" => array('db_attributes' => array("TEXT", "TEXT", "255"))
		);
	public $pog_query;


	/**
	* Getter for some private attributes
	* @return mixed $attribute
	*/
	public function __get($attribute)
	{
		if (isset($this->{"_".$attribute}))
		{
			return $this->{"_".$attribute};
		}
		else
		{
			return false;
		}
	}

	function specialOrders($date_submitted='', $cust_email='', $cust_day_phone='', $billing_street='', $billing_city='', $billing_state='', $billing_zip='', $shipping_street='', $shipping_city='', $shipping_state='', $shipping_zip='', $store='', $employee_name='', $item_1_rpro_num='', $item_1_dept='', $item_1_vend='', $item_1_manu_part_num='', $item_1_desc='', $item_1_size='', $item_1_attr='', $item_1_price='', $item_1_qty='', $item_1_total='', $item_2_rpro_num='', $item_2_dept='', $item_2_vend='', $item_2_manu_part_num='', $item_2_desc='', $item_2_size='', $item_2_attr='', $item_2_price='', $item_2_qty='', $item_2_total='', $item_3_rpro_num='', $item_3_dept='', $item_3_vend='', $item_3_manu_part_num='', $item_3_desc='', $item_3_size='', $item_3_attr='', $item_3_price='', $item_3_qty='', $item_3_total='', $item_4_rpro_num='', $item_4_dept='', $item_4_vend='', $item_4_manu_part_num='', $item_4_desc='', $item_4_size='', $item_4_attr='', $item_4_price='', $item_4_qty='', $item_4_total='', $item_5_rpro_num='', $item_5_dept='', $item_5_vend='', $item_5_manu_part_num='', $item_5_desc='', $item_5_size='', $item_5_attr='', $item_5_price='', $item_5_qty='', $item_5_total='', $ship_type='', $shipping_charge='', $tax='', $total='', $cust_cc_num='', $cust_cc_exp='', $cust_cc_cvc='', $cust_cc_type='', $date_ordered='', $rpro_po_num='', $notes='', $status='', $cust_name_first='', $cust_name_last='', $receipt_number='', $RA_number='', $comments='')
	{
		$this->date_submitted = $date_submitted;
		$this->cust_email = $cust_email;
		$this->cust_day_phone = $cust_day_phone;
		$this->billing_street = $billing_street;
		$this->billing_city = $billing_city;
		$this->billing_state = $billing_state;
		$this->billing_zip = $billing_zip;
		$this->shipping_street = $shipping_street;
		$this->shipping_city = $shipping_city;
		$this->shipping_state = $shipping_state;
		$this->shipping_zip = $shipping_zip;
		$this->store = $store;
		$this->employee_name = $employee_name;
		$this->item_1_rpro_num = $item_1_rpro_num;
		$this->item_1_dept = $item_1_dept;
		$this->item_1_vend = $item_1_vend;
		$this->item_1_manu_part_num = $item_1_manu_part_num;
		$this->item_1_desc = $item_1_desc;
		$this->item_1_size = $item_1_size;
		$this->item_1_attr = $item_1_attr;
		$this->item_1_price = $item_1_price;
		$this->item_1_qty = $item_1_qty;
		$this->item_1_total = $item_1_total;
		$this->item_2_rpro_num = $item_2_rpro_num;
		$this->item_2_dept = $item_2_dept;
		$this->item_2_vend = $item_2_vend;
		$this->item_2_manu_part_num = $item_2_manu_part_num;
		$this->item_2_desc = $item_2_desc;
		$this->item_2_size = $item_2_size;
		$this->item_2_attr = $item_2_attr;
		$this->item_2_price = $item_2_price;
		$this->item_2_qty = $item_2_qty;
		$this->item_2_total = $item_2_total;
		$this->item_3_rpro_num = $item_3_rpro_num;
		$this->item_3_dept = $item_3_dept;
		$this->item_3_vend = $item_3_vend;
		$this->item_3_manu_part_num = $item_3_manu_part_num;
		$this->item_3_desc = $item_3_desc;
		$this->item_3_size = $item_3_size;
		$this->item_3_attr = $item_3_attr;
		$this->item_3_price = $item_3_price;
		$this->item_3_qty = $item_3_qty;
		$this->item_3_total = $item_3_total;
		$this->item_4_rpro_num = $item_4_rpro_num;
		$this->item_4_dept = $item_4_dept;
		$this->item_4_vend = $item_4_vend;
		$this->item_4_manu_part_num = $item_4_manu_part_num;
		$this->item_4_desc = $item_4_desc;
		$this->item_4_size = $item_4_size;
		$this->item_4_attr = $item_4_attr;
		$this->item_4_price = $item_4_price;
		$this->item_4_qty = $item_4_qty;
		$this->item_4_total = $item_4_total;
		$this->item_5_rpro_num = $item_5_rpro_num;
		$this->item_5_dept = $item_5_dept;
		$this->item_5_vend = $item_5_vend;
		$this->item_5_manu_part_num = $item_5_manu_part_num;
		$this->item_5_desc = $item_5_desc;
		$this->item_5_size = $item_5_size;
		$this->item_5_attr = $item_5_attr;
		$this->item_5_price = $item_5_price;
		$this->item_5_qty = $item_5_qty;
		$this->item_5_total = $item_5_total;
		$this->ship_type = $ship_type;
		$this->shipping_charge = $shipping_charge;
		$this->tax = $tax;
		$this->total = $total;
		$this->cust_cc_num = $cust_cc_num;
		$this->cust_cc_exp = $cust_cc_exp;
		$this->cust_cc_cvc = $cust_cc_cvc;
		$this->cust_cc_type = $cust_cc_type;
		$this->date_ordered = $date_ordered;
		$this->rpro_po_num = $rpro_po_num;
		$this->notes = $notes;
		$this->status = $status;
		$this->cust_name_first = $cust_name_first;
		$this->cust_name_last = $cust_name_last;
		$this->receipt_number = $receipt_number;
		$this->RA_number = $RA_number;
		$this->comments = $comments;
	}


	/**
	* Gets object from database
	* @param integer $specialordersId
	* @return object $specialOrders
	*/
	function Get($specialordersId)
	{
		$connection = Database::Connect();
		$this->pog_query = "select * from `specialorders` where `specialordersid`='".intval($specialordersId)."' LIMIT 1";
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$this->specialordersId = $row['specialordersid'];
			$this->date_submitted = $row['date_submitted'];
			$this->cust_email = $this->Unescape($row['cust_email']);
			$this->cust_day_phone = $this->Unescape($row['cust_day_phone']);
			$this->billing_street = $this->Unescape($row['billing_street']);
			$this->billing_city = $this->Unescape($row['billing_city']);
			$this->billing_state = $this->Unescape($row['billing_state']);
			$this->billing_zip = $this->Unescape($row['billing_zip']);
			$this->shipping_street = $this->Unescape($row['shipping_street']);
			$this->shipping_city = $this->Unescape($row['shipping_city']);
			$this->shipping_state = $this->Unescape($row['shipping_state']);
			$this->shipping_zip = $this->Unescape($row['shipping_zip']);
			$this->store = $this->Unescape($row['store']);
			$this->employee_name = $this->Unescape($row['employee_name']);
			$this->item_1_rpro_num = $this->Unescape($row['item_1_rpro_num']);
			$this->item_1_dept = $this->Unescape($row['item_1_dept']);
			$this->item_1_vend = $this->Unescape($row['item_1_vend']);
			$this->item_1_manu_part_num = $this->Unescape($row['item_1_manu_part_num']);
			$this->item_1_desc = $this->Unescape($row['item_1_desc']);
			$this->item_1_size = $this->Unescape($row['item_1_size']);
			$this->item_1_attr = $this->Unescape($row['item_1_attr']);
			$this->item_1_price = $this->Unescape($row['item_1_price']);
			$this->item_1_qty = $this->Unescape($row['item_1_qty']);
			$this->item_1_total = $this->Unescape($row['item_1_total']);
			$this->item_2_rpro_num = $this->Unescape($row['item_2_rpro_num']);
			$this->item_2_dept = $this->Unescape($row['item_2_dept']);
			$this->item_2_vend = $this->Unescape($row['item_2_vend']);
			$this->item_2_manu_part_num = $this->Unescape($row['item_2_manu_part_num']);
			$this->item_2_desc = $this->Unescape($row['item_2_desc']);
			$this->item_2_size = $this->Unescape($row['item_2_size']);
			$this->item_2_attr = $this->Unescape($row['item_2_attr']);
			$this->item_2_price = $this->Unescape($row['item_2_price']);
			$this->item_2_qty = $this->Unescape($row['item_2_qty']);
			$this->item_2_total = $this->Unescape($row['item_2_total']);
			$this->item_3_rpro_num = $this->Unescape($row['item_3_rpro_num']);
			$this->item_3_dept = $this->Unescape($row['item_3_dept']);
			$this->item_3_vend = $this->Unescape($row['item_3_vend']);
			$this->item_3_manu_part_num = $this->Unescape($row['item_3_manu_part_num']);
			$this->item_3_desc = $this->Unescape($row['item_3_desc']);
			$this->item_3_size = $this->Unescape($row['item_3_size']);
			$this->item_3_attr = $this->Unescape($row['item_3_attr']);
			$this->item_3_price = $this->Unescape($row['item_3_price']);
			$this->item_3_qty = $this->Unescape($row['item_3_qty']);
			$this->item_3_total = $this->Unescape($row['item_3_total']);
			$this->item_4_rpro_num = $this->Unescape($row['item_4_rpro_num']);
			$this->item_4_dept = $this->Unescape($row['item_4_dept']);
			$this->item_4_vend = $this->Unescape($row['item_4_vend']);
			$this->item_4_manu_part_num = $this->Unescape($row['item_4_manu_part_num']);
			$this->item_4_desc = $this->Unescape($row['item_4_desc']);
			$this->item_4_size = $this->Unescape($row['item_4_size']);
			$this->item_4_attr = $this->Unescape($row['item_4_attr']);
			$this->item_4_price = $this->Unescape($row['item_4_price']);
			$this->item_4_qty = $this->Unescape($row['item_4_qty']);
			$this->item_4_total = $this->Unescape($row['item_4_total']);
			$this->item_5_rpro_num = $this->Unescape($row['item_5_rpro_num']);
			$this->item_5_dept = $this->Unescape($row['item_5_dept']);
			$this->item_5_vend = $this->Unescape($row['item_5_vend']);
			$this->item_5_manu_part_num = $this->Unescape($row['item_5_manu_part_num']);
			$this->item_5_desc = $this->Unescape($row['item_5_desc']);
			$this->item_5_size = $this->Unescape($row['item_5_size']);
			$this->item_5_attr = $this->Unescape($row['item_5_attr']);
			$this->item_5_price = $this->Unescape($row['item_5_price']);
			$this->item_5_qty = $this->Unescape($row['item_5_qty']);
			$this->item_5_total = $this->Unescape($row['item_5_total']);
			$this->ship_type = $this->Unescape($row['ship_type']);
			$this->shipping_charge = $this->Unescape($row['shipping_charge']);
			$this->tax = $this->Unescape($row['tax']);
			$this->total = $this->Unescape($row['total']);
			$this->cust_cc_num = $this->Unescape($row['cust_cc_num']);
			$this->cust_cc_exp = $this->Unescape($row['cust_cc_exp']);
			$this->cust_cc_cvc = $this->Unescape($row['cust_cc_cvc']);
			$this->cust_cc_type = $this->Unescape($row['cust_cc_type']);
			$this->date_ordered = $row['date_ordered'];
			$this->rpro_po_num = $this->Unescape($row['rpro_po_num']);
			$this->notes = $this->Unescape($row['notes']);
			$this->status = $this->Unescape($row['status']);
			$this->cust_name_first = $this->Unescape($row['cust_name_first']);
			$this->cust_name_last = $this->Unescape($row['cust_name_last']);
			$this->receipt_number = $this->Unescape($row['receipt_number']);
			$this->RA_number = $this->Unescape($row['RA_number']);
			$this->comments = $this->Unescape($row['comments']);
		}
		return $this;
	}


	/**
	* Returns a sorted array of objects that match given conditions
	* @param multidimensional array {("field", "comparator", "value"), ("field", "comparator", "value"), ...}
	* @param string $sortBy
	* @param boolean $ascending
	* @param int limit
	* @return array $specialordersList
	*/
	function GetList($fcv_array = array(), $sortBy='', $ascending=true, $limit='')
	{
		$connection = Database::Connect();
		$sqlLimit = ($limit != '' ? "LIMIT $limit" : '');
		$this->pog_query = "select * from `specialorders` ";
		$specialordersList = Array();
		if (sizeof($fcv_array) > 0)
		{
			$this->pog_query .= " where ";
			for ($i=0, $c=sizeof($fcv_array); $i<$c; $i++)
			{
				if (sizeof($fcv_array[$i]) == 1)
				{
					$this->pog_query .= " ".$fcv_array[$i][0]." ";
					continue;
				}
				else
				{
					if ($i > 0 && sizeof($fcv_array[$i-1]) != 1)
					{
						$this->pog_query .= " AND ";
					}
					if (isset($this->pog_attribute_type[$fcv_array[$i][0]]['db_attributes']) && $this->pog_attribute_type[$fcv_array[$i][0]]['db_attributes'][0] != 'NUMERIC' && $this->pog_attribute_type[$fcv_array[$i][0]]['db_attributes'][0] != 'SET')
					{
						if ($GLOBALS['configuration']['db_encoding'] == 1)
						{
							$value = POG_Base::IsColumn($fcv_array[$i][2]) ? "BASE64_DECODE(".$fcv_array[$i][2].")" : "'".$fcv_array[$i][2]."'";
							$this->pog_query .= "BASE64_DECODE(`".$fcv_array[$i][0]."`) ".$fcv_array[$i][1]." ".$value;
						}
						else
						{
							$value =  POG_Base::IsColumn($fcv_array[$i][2]) ? $fcv_array[$i][2] : "'".$this->Escape($fcv_array[$i][2])."'";
							$this->pog_query .= "`".$fcv_array[$i][0]."` ".$fcv_array[$i][1]." ".$value;
						}
					}
					else
					{
						$value = POG_Base::IsColumn($fcv_array[$i][2]) ? $fcv_array[$i][2] : "'".$fcv_array[$i][2]."'";
						$this->pog_query .= "`".$fcv_array[$i][0]."` ".$fcv_array[$i][1]." ".$value;
					}
				}
			}
		}
		if ($sortBy != '')
		{
			if (isset($this->pog_attribute_type[$sortBy]['db_attributes']) && $this->pog_attribute_type[$sortBy]['db_attributes'][0] != 'NUMERIC' && $this->pog_attribute_type[$sortBy]['db_attributes'][0] != 'SET')
			{
				if ($GLOBALS['configuration']['db_encoding'] == 1)
				{
					$sortBy = "BASE64_DECODE($sortBy) ";
            }
				else
				{
					$sortBy = "$sortBy ";
				}
			}
			else
			{
				$sortBy = "$sortBy ";
			}
		}
		else
		{
			$sortBy = "specialordersid";
		}
		$this->pog_query .= " order by ".$sortBy." ".($ascending ? "asc" : "desc")." $sqlLimit";
                $thisObjectName = get_class($this);
		$cursor = Database::Reader($this->pog_query, $connection);
                while ($row = Database::Read($cursor))
		{
			$specialorders = new $thisObjectName();
			$specialorders->specialordersId = $row['specialordersid'];
			$specialorders->date_submitted = $row['date_submitted'];
			$specialorders->cust_email = $this->Unescape($row['cust_email']);
			$specialorders->cust_day_phone = $this->Unescape($row['cust_day_phone']);
			$specialorders->billing_street = $this->Unescape($row['billing_street']);
			$specialorders->billing_city = $this->Unescape($row['billing_city']);
			$specialorders->billing_state = $this->Unescape($row['billing_state']);
			$specialorders->billing_zip = $this->Unescape($row['billing_zip']);
			$specialorders->shipping_street = $this->Unescape($row['shipping_street']);
			$specialorders->shipping_city = $this->Unescape($row['shipping_city']);
			$specialorders->shipping_state = $this->Unescape($row['shipping_state']);
			$specialorders->shipping_zip = $this->Unescape($row['shipping_zip']);
			$specialorders->store = $this->Unescape($row['store']);
			$specialorders->employee_name = $this->Unescape($row['employee_name']);
			$specialorders->item_1_rpro_num = $this->Unescape($row['item_1_rpro_num']);
			$specialorders->item_1_dept = $this->Unescape($row['item_1_dept']);
			$specialorders->item_1_vend = $this->Unescape($row['item_1_vend']);
			$specialorders->item_1_manu_part_num = $this->Unescape($row['item_1_manu_part_num']);
			$specialorders->item_1_desc = $this->Unescape($row['item_1_desc']);
			$specialorders->item_1_size = $this->Unescape($row['item_1_size']);
			$specialorders->item_1_attr = $this->Unescape($row['item_1_attr']);
			$specialorders->item_1_price = $this->Unescape($row['item_1_price']);
			$specialorders->item_1_qty = $this->Unescape($row['item_1_qty']);
			$specialorders->item_1_total = $this->Unescape($row['item_1_total']);
			$specialorders->item_2_rpro_num = $this->Unescape($row['item_2_rpro_num']);
			$specialorders->item_2_dept = $this->Unescape($row['item_2_dept']);
			$specialorders->item_2_vend = $this->Unescape($row['item_2_vend']);
			$specialorders->item_2_manu_part_num = $this->Unescape($row['item_2_manu_part_num']);
			$specialorders->item_2_desc = $this->Unescape($row['item_2_desc']);
			$specialorders->item_2_size = $this->Unescape($row['item_2_size']);
			$specialorders->item_2_attr = $this->Unescape($row['item_2_attr']);
			$specialorders->item_2_price = $this->Unescape($row['item_2_price']);
			$specialorders->item_2_qty = $this->Unescape($row['item_2_qty']);
			$specialorders->item_2_total = $this->Unescape($row['item_2_total']);
			$specialorders->item_3_rpro_num = $this->Unescape($row['item_3_rpro_num']);
			$specialorders->item_3_dept = $this->Unescape($row['item_3_dept']);
			$specialorders->item_3_vend = $this->Unescape($row['item_3_vend']);
			$specialorders->item_3_manu_part_num = $this->Unescape($row['item_3_manu_part_num']);
			$specialorders->item_3_desc = $this->Unescape($row['item_3_desc']);
			$specialorders->item_3_size = $this->Unescape($row['item_3_size']);
			$specialorders->item_3_attr = $this->Unescape($row['item_3_attr']);
			$specialorders->item_3_price = $this->Unescape($row['item_3_price']);
			$specialorders->item_3_qty = $this->Unescape($row['item_3_qty']);
			$specialorders->item_3_total = $this->Unescape($row['item_3_total']);
			$specialorders->item_4_rpro_num = $this->Unescape($row['item_4_rpro_num']);
			$specialorders->item_4_dept = $this->Unescape($row['item_4_dept']);
			$specialorders->item_4_vend = $this->Unescape($row['item_4_vend']);
			$specialorders->item_4_manu_part_num = $this->Unescape($row['item_4_manu_part_num']);
			$specialorders->item_4_desc = $this->Unescape($row['item_4_desc']);
			$specialorders->item_4_size = $this->Unescape($row['item_4_size']);
			$specialorders->item_4_attr = $this->Unescape($row['item_4_attr']);
			$specialorders->item_4_price = $this->Unescape($row['item_4_price']);
			$specialorders->item_4_qty = $this->Unescape($row['item_4_qty']);
			$specialorders->item_4_total = $this->Unescape($row['item_4_total']);
			$specialorders->item_5_rpro_num = $this->Unescape($row['item_5_rpro_num']);
			$specialorders->item_5_dept = $this->Unescape($row['item_5_dept']);
			$specialorders->item_5_vend = $this->Unescape($row['item_5_vend']);
			$specialorders->item_5_manu_part_num = $this->Unescape($row['item_5_manu_part_num']);
			$specialorders->item_5_desc = $this->Unescape($row['item_5_desc']);
			$specialorders->item_5_size = $this->Unescape($row['item_5_size']);
			$specialorders->item_5_attr = $this->Unescape($row['item_5_attr']);
			$specialorders->item_5_price = $this->Unescape($row['item_5_price']);
			$specialorders->item_5_qty = $this->Unescape($row['item_5_qty']);
			$specialorders->item_5_total = $this->Unescape($row['item_5_total']);
			$specialorders->ship_type = $this->Unescape($row['ship_type']);
			$specialorders->shipping_charge = $this->Unescape($row['shipping_charge']);
			$specialorders->tax = $this->Unescape($row['tax']);
			$specialorders->total = $this->Unescape($row['total']);
			$specialorders->cust_cc_num = $this->Unescape($row['cust_cc_num']);
			$specialorders->cust_cc_exp = $this->Unescape($row['cust_cc_exp']);
			$specialorders->cust_cc_cvc = $this->Unescape($row['cust_cc_cvc']);
			$specialorders->cust_cc_type = $this->Unescape($row['cust_cc_type']);
			$specialorders->date_ordered = $row['date_ordered'];
			$specialorders->rpro_po_num = $this->Unescape($row['rpro_po_num']);
			$specialorders->notes = $this->Unescape($row['notes']);
			$specialorders->status = $this->Unescape($row['status']);
			$specialorders->cust_name_first = $this->Unescape($row['cust_name_first']);
			$specialorders->cust_name_last = $this->Unescape($row['cust_name_last']);
			$specialorders->receipt_number = $this->Unescape($row['receipt_number']);
			$specialorders->RA_number = $this->Unescape($row['RA_number']);
			$specialorders->comments = $this->Unescape($row['comments']);
			$specialordersList[] = $specialorders;
		}
		return $specialordersList;
	}


	/**
	* Saves the object to the database
	* @return integer $specialordersId
	*/
	function Save()
	{
		$connection = Database::Connect();
		$this->pog_query = "select `specialordersid` from `specialorders` where `specialordersid`='".$this->specialordersId."' LIMIT 1";
		$rows = Database::Query($this->pog_query, $connection);
		if ($rows > 0)
		{
			$this->pog_query = "update `specialorders` set
			`date_submitted`='".$this->date_submitted."',
			`cust_email`='".$this->Escape($this->cust_email)."',
			`cust_day_phone`='".$this->Escape($this->cust_day_phone)."',
			`billing_street`='".$this->Escape($this->billing_street)."',
			`billing_city`='".$this->Escape($this->billing_city)."',
			`billing_state`='".$this->Escape($this->billing_state)."',
			`billing_zip`='".$this->Escape($this->billing_zip)."',
			`shipping_street`='".$this->Escape($this->shipping_street)."',
			`shipping_city`='".$this->Escape($this->shipping_city)."',
			`shipping_state`='".$this->Escape($this->shipping_state)."',
			`shipping_zip`='".$this->Escape($this->shipping_zip)."',
			`store`='".$this->Escape($this->store)."',
			`employee_name`='".$this->Escape($this->employee_name)."',
			`item_1_rpro_num`='".$this->Escape($this->item_1_rpro_num)."',
			`item_1_dept`='".$this->Escape($this->item_1_dept)."',
			`item_1_vend`='".$this->Escape($this->item_1_vend)."',
			`item_1_manu_part_num`='".$this->Escape($this->item_1_manu_part_num)."',
			`item_1_desc`='".$this->Escape($this->item_1_desc)."',
			`item_1_size`='".$this->Escape($this->item_1_size)."',
			`item_1_attr`='".$this->Escape($this->item_1_attr)."',
			`item_1_price`='".$this->Escape($this->item_1_price)."',
			`item_1_qty`='".$this->Escape($this->item_1_qty)."',
			`item_1_total`='".$this->Escape($this->item_1_total)."',
			`item_2_rpro_num`='".$this->Escape($this->item_2_rpro_num)."',
			`item_2_dept`='".$this->Escape($this->item_2_dept)."',
			`item_2_vend`='".$this->Escape($this->item_2_vend)."',
			`item_2_manu_part_num`='".$this->Escape($this->item_2_manu_part_num)."',
			`item_2_desc`='".$this->Escape($this->item_2_desc)."',
			`item_2_size`='".$this->Escape($this->item_2_size)."',
			`item_2_attr`='".$this->Escape($this->item_2_attr)."',
			`item_2_price`='".$this->Escape($this->item_2_price)."',
			`item_2_qty`='".$this->Escape($this->item_2_qty)."',
			`item_2_total`='".$this->Escape($this->item_2_total)."',
			`item_3_rpro_num`='".$this->Escape($this->item_3_rpro_num)."',
			`item_3_dept`='".$this->Escape($this->item_3_dept)."',
			`item_3_vend`='".$this->Escape($this->item_3_vend)."',
			`item_3_manu_part_num`='".$this->Escape($this->item_3_manu_part_num)."',
			`item_3_desc`='".$this->Escape($this->item_3_desc)."',
			`item_3_size`='".$this->Escape($this->item_3_size)."',
			`item_3_attr`='".$this->Escape($this->item_3_attr)."',
			`item_3_price`='".$this->Escape($this->item_3_price)."',
			`item_3_qty`='".$this->Escape($this->item_3_qty)."',
			`item_3_total`='".$this->Escape($this->item_3_total)."',
			`item_4_rpro_num`='".$this->Escape($this->item_4_rpro_num)."',
			`item_4_dept`='".$this->Escape($this->item_4_dept)."',
			`item_4_vend`='".$this->Escape($this->item_4_vend)."',
			`item_4_manu_part_num`='".$this->Escape($this->item_4_manu_part_num)."',
			`item_4_desc`='".$this->Escape($this->item_4_desc)."',
			`item_4_size`='".$this->Escape($this->item_4_size)."',
			`item_4_attr`='".$this->Escape($this->item_4_attr)."',
			`item_4_price`='".$this->Escape($this->item_4_price)."',
			`item_4_qty`='".$this->Escape($this->item_4_qty)."',
			`item_4_total`='".$this->Escape($this->item_4_total)."',
			`item_5_rpro_num`='".$this->Escape($this->item_5_rpro_num)."',
			`item_5_dept`='".$this->Escape($this->item_5_dept)."',
			`item_5_vend`='".$this->Escape($this->item_5_vend)."',
			`item_5_manu_part_num`='".$this->Escape($this->item_5_manu_part_num)."',
			`item_5_desc`='".$this->Escape($this->item_5_desc)."',
			`item_5_size`='".$this->Escape($this->item_5_size)."',
			`item_5_attr`='".$this->Escape($this->item_5_attr)."',
			`item_5_price`='".$this->Escape($this->item_5_price)."',
			`item_5_qty`='".$this->Escape($this->item_5_qty)."',
			`item_5_total`='".$this->Escape($this->item_5_total)."',
			`ship_type`='".$this->Escape($this->ship_type)."',
			`shipping_charge`='".$this->Escape($this->shipping_charge)."',
			`tax`='".$this->Escape($this->tax)."',
			`total`='".$this->Escape($this->total)."',
			`cust_cc_num`='".$this->Escape($this->cust_cc_num)."',
			`cust_cc_exp`='".$this->Escape($this->cust_cc_exp)."',
			`cust_cc_cvc`='".$this->Escape($this->cust_cc_cvc)."',
			`cust_cc_type`='".$this->Escape($this->cust_cc_type)."',
			`date_ordered`='".$this->date_ordered."',
			`rpro_po_num`='".$this->Escape($this->rpro_po_num)."',
			`notes`='".$this->Escape($this->notes)."',
			`status`='".$this->Escape($this->status)."',
			`cust_name_first`='".$this->Escape($this->cust_name_first)."',
			`cust_name_last`='".$this->Escape($this->cust_name_last)."',
			`receipt_number`='".$this->Escape($this->receipt_number)."',
			`RA_number`='".$this->Escape($this->RA_number)."',
			`comments`='".$this->Escape($this->comments)."' where `specialordersid`='".$this->specialordersId."'";
		}
		else
		{
			$this->pog_query = "insert into `specialorders` (`date_submitted`, `cust_email`, `cust_day_phone`, `billing_street`, `billing_city`, `billing_state`, `billing_zip`, `shipping_street`, `shipping_city`, `shipping_state`, `shipping_zip`, `store`, `employee_name`, `item_1_rpro_num`, `item_1_dept`, `item_1_vend`, `item_1_manu_part_num`, `item_1_desc`, `item_1_size`, `item_1_attr`, `item_1_price`, `item_1_qty`, `item_1_total`, `item_2_rpro_num`, `item_2_dept`, `item_2_vend`, `item_2_manu_part_num`, `item_2_desc`, `item_2_size`, `item_2_attr`, `item_2_price`, `item_2_qty`, `item_2_total`, `item_3_rpro_num`, `item_3_dept`, `item_3_vend`, `item_3_manu_part_num`, `item_3_desc`, `item_3_size`, `item_3_attr`, `item_3_price`, `item_3_qty`, `item_3_total`, `item_4_rpro_num`, `item_4_dept`, `item_4_vend`, `item_4_manu_part_num`, `item_4_desc`, `item_4_size`, `item_4_attr`, `item_4_price`, `item_4_qty`, `item_4_total`, `item_5_rpro_num`, `item_5_dept`, `item_5_vend`, `item_5_manu_part_num`, `item_5_desc`, `item_5_size`, `item_5_attr`, `item_5_price`, `item_5_qty`, `item_5_total`, `ship_type`, `shipping_charge`, `tax`, `total`, `cust_cc_num`, `cust_cc_exp`, `cust_cc_cvc`, `cust_cc_type`, `date_ordered`, `rpro_po_num`, `notes`, `status`, `cust_name_first`, `cust_name_last`, `receipt_number`, `RA_number`, `comments` ) values (
			'".$this->date_submitted."',
			'".$this->Escape($this->cust_email)."',
			'".$this->Escape($this->cust_day_phone)."',
			'".$this->Escape($this->billing_street)."',
			'".$this->Escape($this->billing_city)."',
			'".$this->Escape($this->billing_state)."',
			'".$this->Escape($this->billing_zip)."',
			'".$this->Escape($this->shipping_street)."',
			'".$this->Escape($this->shipping_city)."',
			'".$this->Escape($this->shipping_state)."',
			'".$this->Escape($this->shipping_zip)."',
			'".$this->Escape($this->store)."',
			'".$this->Escape($this->employee_name)."',
			'".$this->Escape($this->item_1_rpro_num)."',
			'".$this->Escape($this->item_1_dept)."',
			'".$this->Escape($this->item_1_vend)."',
			'".$this->Escape($this->item_1_manu_part_num)."',
			'".$this->Escape($this->item_1_desc)."',
			'".$this->Escape($this->item_1_size)."',
			'".$this->Escape($this->item_1_attr)."',
			'".$this->Escape($this->item_1_price)."',
			'".$this->Escape($this->item_1_qty)."',
			'".$this->Escape($this->item_1_total)."',
			'".$this->Escape($this->item_2_rpro_num)."',
			'".$this->Escape($this->item_2_dept)."',
			'".$this->Escape($this->item_2_vend)."',
			'".$this->Escape($this->item_2_manu_part_num)."',
			'".$this->Escape($this->item_2_desc)."',
			'".$this->Escape($this->item_2_size)."',
			'".$this->Escape($this->item_2_attr)."',
			'".$this->Escape($this->item_2_price)."',
			'".$this->Escape($this->item_2_qty)."',
			'".$this->Escape($this->item_2_total)."',
			'".$this->Escape($this->item_3_rpro_num)."',
			'".$this->Escape($this->item_3_dept)."',
			'".$this->Escape($this->item_3_vend)."',
			'".$this->Escape($this->item_3_manu_part_num)."',
			'".$this->Escape($this->item_3_desc)."',
			'".$this->Escape($this->item_3_size)."',
			'".$this->Escape($this->item_3_attr)."',
			'".$this->Escape($this->item_3_price)."',
			'".$this->Escape($this->item_3_qty)."',
			'".$this->Escape($this->item_3_total)."',
			'".$this->Escape($this->item_4_rpro_num)."',
			'".$this->Escape($this->item_4_dept)."',
			'".$this->Escape($this->item_4_vend)."',
			'".$this->Escape($this->item_4_manu_part_num)."',
			'".$this->Escape($this->item_4_desc)."',
			'".$this->Escape($this->item_4_size)."',
			'".$this->Escape($this->item_4_attr)."',
			'".$this->Escape($this->item_4_price)."',
			'".$this->Escape($this->item_4_qty)."',
			'".$this->Escape($this->item_4_total)."',
			'".$this->Escape($this->item_5_rpro_num)."',
			'".$this->Escape($this->item_5_dept)."',
			'".$this->Escape($this->item_5_vend)."',
			'".$this->Escape($this->item_5_manu_part_num)."',
			'".$this->Escape($this->item_5_desc)."',
			'".$this->Escape($this->item_5_size)."',
			'".$this->Escape($this->item_5_attr)."',
			'".$this->Escape($this->item_5_price)."',
			'".$this->Escape($this->item_5_qty)."',
			'".$this->Escape($this->item_5_total)."',
			'".$this->Escape($this->ship_type)."',
			'".$this->Escape($this->shipping_charge)."',
			'".$this->Escape($this->tax)."',
			'".$this->Escape($this->total)."',
			'".$this->Escape($this->cust_cc_num)."',
			'".$this->Escape($this->cust_cc_exp)."',
			'".$this->Escape($this->cust_cc_cvc)."',
			'".$this->Escape($this->cust_cc_type)."',
			'".$this->date_ordered."',
			'".$this->Escape($this->rpro_po_num)."',
			'".$this->Escape($this->notes)."',
			'".$this->Escape($this->status)."',
			'".$this->Escape($this->cust_name_first)."',
			'".$this->Escape($this->cust_name_last)."',
			'".$this->Escape($this->receipt_number)."',
			'".$this->Escape($this->RA_number)."',
			'".$this->Escape($this->comments)."' )";
      }
		$insertId = Database::InsertOrUpdate($this->pog_query, $connection);
		if ($this->specialordersId == "")
		{
			$this->specialordersId = $insertId;
		}
		return $this->specialordersId;
	}


	/**
	* Clones the object and saves it to the database
	* @return integer $specialordersId
	*/
	function SaveNew()
	{
		$this->specialordersId = '';
		return $this->Save();
	}


	/**
	* Deletes the object from the database
	* @return boolean
	*/
	function Delete()
	{
		$connection = Database::Connect();
		$this->pog_query = "delete from `specialorders` where `specialordersid`='".$this->specialordersId."'";
		return Database::NonQuery($this->pog_query, $connection);
	}


	/**
	* Deletes a list of objects that match given conditions
	* @param multidimensional array {("field", "comparator", "value"), ("field", "comparator", "value"), ...}
	* @param bool $deep
	* @return
	*/
	function DeleteList($fcv_array)
	{
		if (sizeof($fcv_array) > 0)
		{
			$connection = Database::Connect();
			$pog_query = "delete from `specialorders` where ";
			for ($i=0, $c=sizeof($fcv_array); $i<$c; $i++)
			{
				if (sizeof($fcv_array[$i]) == 1)
				{
					$pog_query .= " ".$fcv_array[$i][0]." ";
					continue;
				}
				else
				{
					if ($i > 0 && sizeof($fcv_array[$i-1]) !== 1)
					{
						$pog_query .= " AND ";
					}
					if (isset($this->pog_attribute_type[$fcv_array[$i][0]]['db_attributes']) && $this->pog_attribute_type[$fcv_array[$i][0]]['db_attributes'][0] != 'NUMERIC' && $this->pog_attribute_type[$fcv_array[$i][0]]['db_attributes'][0] != 'SET')
					{
						$pog_query .= "`".$fcv_array[$i][0]."` ".$fcv_array[$i][1]." '".$this->Escape($fcv_array[$i][2])."'";
					}
					else
					{
						$pog_query .= "`".$fcv_array[$i][0]."` ".$fcv_array[$i][1]." '".$fcv_array[$i][2]."'";
					}
				}
			}
			return Database::NonQuery($pog_query, $connection);
		}
	}
}
?>
