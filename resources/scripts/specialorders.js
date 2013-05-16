$(document).ready(function ()
{

    var getNewOrderNum_ID;
    loadPAOrderFormEventHandler();
    loadBikeOrderFormEventHandler();
    loadWarrantyFormEventHandler();

    loadAdminSettings();

    /* Parts & Accessories order page */
    $("a#PAOrder").click(function ()
    {
        $("DIV.title > H5").text("Parts & Accessories Order");
        $("DIV.title").css("background", "url('resources/images/colors/blue/title.png') repeat-x scroll 0 0 #336699");
        $(".search").html("");
        $(".table").load("PA-order-form.php");
        return false;
    });
    /* New Bike order page */
    $("a.bikeOrder").click(function ()
    {
        $("DIV.title > H5").text("New Bike Order");
        $("DIV.title").css("background", "url('resources/images/colors/blue/title.png') repeat-x scroll 0 0 #336699");
        $(".search").html("");
        $(".table").load("bike-order-form.php");
        return false;
    });

    /* Warranty order page */
    $("a#warranty").click(function ()
    {
        $("DIV.title > H5").text("Warranty Order");
        $("DIV.title").css("background", "url('resources/images/colors/blue/title.png') repeat-x scroll 0 0 #336699");
        $(".search").html("");
        $(".table").load("warranty-order-form.php");
        return false;
    });

    /* show search form when Search Orders link is clicked */
    $("a#checkStatus").click(function ()
    {
        $("div.error").hide(); /* hide validation errors if coming from form page */
        $("DIV.title > H5").text("Search Orders");
        $("DIV.title").css("background", "url('resources/images/colors/blue/title.png') repeat-x scroll 0 0 #336699");
        $(".search").html("");
        $(".table").load("orderStatusSearch.php", loadOrderStatusSearchForm);
        return false;
    });

    /* show Admin Panel when Admin link is clicked */
    $("a#admin, a#showNewOrders").click(function ()
    {
        $("div.error").hide(); /* hide validation errors if coming from form page */
        $("DIV.title > H5").text("Special Orders Admin");
        $("DIV.title").css("background", "url('../images/colors/red/title.png') repeat-x scroll 0 0 rgb(155,1,1)");
        $(".table").html(""); /* Here, needs to empty the page before loading the new one to avoid some misbehaviour of the datatable plugin */
        $(".table").load("orderAdmin_hiddenRow.php", loadOrderAdmin);
        $(".search").load("statusCodes.php?getFilteringSelectTag", loadStatusCodeSelectTag);
        return false;
    });

    /* Show only new bike orders */
    $("a#new_bike_order").click(function ()
    {
        $("div.error").hide(); /* hide validation errors if coming from form page */
        $(".table").html(""); /* Here, needs to empty the page before loading the new one to avoid some misbehaviour of the datatable plugin */
        $(".table").load("orderAdmin_hiddenRow.php?sort_status=new_bike_order", loadOrderAdmin);
        $(".search").load("statusCodes.php?getFilteringSelectTag", loadStatusCodeSelectTag);
        return false;
    });

    /************  Settings Menu  ***************/
    $("a.adminSettings").click(function ()
    {
        $("div.error").hide(); /* hide validation errors if coming from form page */
        $(".table").html("");
        $(".table").load("adminSettings.php?action=" + $(this).attr("id"));
        return false;
    });

    /* show the login dialog when Login is clicked */
    $("a#admin-login").click(function ()
    {
        $("#dialog-login").dialog("open");
        return false;
    });

    /* show the change password dialog when Change Password is clicked */
    $("#admin-change-password").click(function ()
    {
        $("#dialog-change-password").dialog("open");
        return false;
    });

    /* Configure the dialog boxes */
    $("#dialog-login").dialog(
    {
        autoOpen: false,
        height: 270,
        width: 350,
        modal: true,
        buttons: {
            Login: function ()
            {
                var dataForm = $("#dialog-login-form").serialize();
                $.ajax(
                {
                    type: "POST",
                    url: "login.php?login",
                    data: dataForm,
                    success: function (response)
                    {
                        window.location = "index.php";
                    }
                });
                $(this).dialog("close");
            },
            Cancel: function ()
            {
                $(this).dialog("close");
            }
        },
        close: function ()
        {
            $("#user-name").val("");
            $("#user-password").val("");
        }
    });


    $("#dialog-change-password").dialog(
    {
        autoOpen: false,
        height: 200,
        width: 350,
        modal: true,
        buttons: {
            Save: function ()
            {
                var dataForm = $("#dialog-change-password-form").serialize();
                $.ajax(
                {
                    type: "POST",
                    url: "login.php?change_pwd",
                    data: dataForm,
                    success: function (response)
                    {
                        window.location = "index.php";
                    }
                });
                $(this).dialog("close");
            },
            Cancel: function ()
            {
                $(this).dialog("close");
            }
        },
        close: function ()
        {
            $("#new-password").val("");
        }
    });

    $("#confirmModal").dialog(
    {
        autoOpen: false,
        height: 175,
        width: 350,
        resizable: false,
        draggable: false,
        modal: true,
        buttons: {
            Yes: function ()
            {
                $(this).dialog("close");
                callback(true);
            },
            No: function ()
            {
                $(this).dialog("close");
                callback(false);
            }
        }
    });

    /* alert user to new changes */
    $("#popUpModal").css(
    {
        border: "10px solid red"
    });
    $("#popUpModal").overlay(
    {
        top: 150,
        mask: {
            color: "#99FF99",
            loadSpeed: 100,
            opacity: 0.95
        },
        // disable this for modal dialog-type of overlays
        closeOnClick: true,
        // load it immediately after the construction
        load: true
    });
});
/**************** End of Document Ready function *******************************/
/*******************************************************************************/


/*********************************************************
 *      Special Order forms
 *
 ********************************************************/
function loadBikeOrderFormEventHandler()
{

    $.validity.start();
    
    /* Toggle RA number field visibility
     * highlight Rpro number field and show required "Part Number 6" */
    $("input[name='orderType']").change(function ()
    {
        if ($("input[name='orderType']:checked").val() == "crash")
        {
            $("#RAnumber").slideDown("fast").css("display", "block");
            //$("input.part6num").css("background-color", "#F08080");
            //$("th.part6num").html("Rpro #<br /><br /><span class="part6num">Part # 6 required</span>");
        }
        else
        {
	    $("#RAnumber").slideUp("slow").css("display", "none");
            //$("input.part6num").css("background-color", "");
            //$("th.part6num").html("Rpro #");
        }
    });

    /* Submit button (Validates data before continuing submission) */
    $(document).on("click", "#Bike_order_submit_button", function (e)
    {
        e.preventDefault();
    	/* Validate form */
    	$("#name_first, #name_last, #day_phone, #store, #employee").require();
            var result = $.validity.end();
            if ( result.valid ) {
                /* data valid, so continue */
                $.ajax(
                {
                    type: "POST",
                    url: "specialOrders.php",
                    data: $("form#Bike_order_form").serialize()
                })
                .done(function (response)
                    {
                        $("#Bike_order_submit_button").css("background-color", "#33FF00").attr("value", "Success!");
                        $("#status").fadeIn("slow").html(response);
                    }
                    )
                .fail(function(){alert("Fail");});
            } else {
            alert ("Make sure required fields are completed!");
            }
    });
} // end loadBikeOrderFormEventHandler()

/*********************************************************/

function loadPAOrderFormEventHandler()
{

    /* Allow only certain caracters in text fields */
    /*  $(".alpha").alpha(); */
    $(".alphanumeric_plus").alphanumeric(
    {
        allow: "-.# "
    });
    $("#comments").alphanumeric(
    {
        allow: "#.-!$%_ "
    });
    $(".numeric").numeric();
    $(".numeric_plus").numeric(
    {
        allow: "-."
    });
    $(".cc_numeric").numeric(
    {
        allow: "-"
    });
    $(".date_numeric").numeric(
    {
        allow: "-/"
    });
    $(".email").alphanumeric(
    {
        allow: ".-_@"
    });


    /* Shipping Address same as Billing?  */
    $(document).on("click", "#same_as_billing", function()
    {
        $("#shipping_street").val($("#billing_street").val());
        $("#shipping_city").val($("#billing_city").val());
        $("#shipping_state").val($("#billing_state").val());
        $("#shipping_zip").val($("#billing_zip").val());
    });

    /* Toggle "in store payment" method radio button */
    /*
    $("input[name="new_bike_order"]").change(function ()
    {
        if ($("input[name="new_bike_order"]:checked"))
        {
            $("#in_store_purchase").attr("disabled", false);
            $("div#card_details").css("display", "none");
            $("div#receipt > span").text("Receipt #");
            $("div#receipt").slideDown("fast").css("display", "block");
        }
        else
        {
            $("#in_store_purchase").prop("disabled", true).attr("checked", false);
            $("div#receipt").slideUp("slow").css("display", "none");
        }

    });
    */

    /*  Calculate item totals when item fields or store changes */
    $(document).on("change", "#store, .item1, .item2, .item3, .item4, .item5", function()
    {
        var subTotal1 = isNanMe(parseFloat($("#item_1_price").val())) * isNanMe(parseFloat($("#item_1_qty").val()));
        $("#item_1_total").val(roundMe(subTotal1, 2));
	
        var subTotal2 = isNanMe(parseFloat($("#item_2_price").val())) * isNanMe(parseFloat($("#item_2_qty").val()));
        $("#item_2_total").val(roundMe(subTotal2, 2));
	
        var subTotal3 = isNanMe(parseFloat($("#item_3_price").val())) * isNanMe(parseFloat($("#item_3_qty").val()));
        $("#item_3_total").val(roundMe(subTotal3, 2));
	
        var subTotal4 = isNanMe(parseFloat($("#item_4_price").val())) * isNanMe(parseFloat($("#item_4_qty").val()));
        $("#item_4_total").val(roundMe(subTotal4, 2));
	
        var subTotal5 = isNanMe(parseFloat($("#item_5_price").val())) * isNanMe(parseFloat($("#item_5_qty").val()));
        $("#item_5_total").val(roundMe(subTotal5, 2));
	
	// change tax amount and recalculate
        recalculateTotalAmount();
    });
    
    /* Shipping Method */
    $(document).on("change", "select[name='ship_method']", function (){
	
        var method = $("select[name=\"ship_method\"] option:selected").attr("id");
	$("#shipping_charge").val( $(this).val() );
        recalculateTotalAmount();
	
	if( method === "repair" )
	{
	    /* show Work Order field if "Repair Bike" selected */
	    $("div#card_details").slideUp("fast").css("display", "none");
	    $("input[name='cust_cc_type']").prop("disabled", true).attr("checked", false);
	    $("div#receipt > span").text("Work Order #");
	    $("div#receipt").slideDown("fast").css("display", "block");
	}
	else if ( method === "store_pickup" || "orderlessthan100" || "order100to200" || "orderover200" ) {
	    /* Re-enable CC fields if something other than "Repair Bike" selected */
	    $("input[name='cust_cc_type']").prop("disabled", false).attr("checked", false);
	    $("div#receipt").slideUp("fast").css("display", "none");
	}
    });

    /* Avoid direct changes from users */
    $("#shipping_charge").change(function()
    {
        /* $("#shipping_charge").val( $("input[name=ship_method]:checked").val() ); */
        recalculateTotalAmount();
    });

    /* show/hide credit card details */
    $(document).on("click", "#visa, #mastercard, #amex, #discover", function()
    {
        // change field lengths per card type
	var cc = $(this).attr("id");
        switch (cc) {
	    case "amex":
		$("#cust_cc_num").attr( {"size":"15","maxlength":"15"} );
		break;
	    case "visa":
	    case "mastercard":
	    case "discover":
		$("#cust_cc_num").attr( {"size":"16","maxlength":"16"} );
		break;
	    default:
		$("#cust_cc_num1, #cust_cc_num2, #cust_cc_num3, #cust_cc_num4").css( "display","none" );
	}

        $("div#receipt").slideUp("fast").css("display", "none");
        $("div#card_details").slideDown("fast").css("display", "block");
    });

    /* show receipt field when giftcard is selected */
    $(document).on("click", "#giftcard", function()
    {
        $("div#card_details").slideUp("fast").css("display", "none");
        $("div#receipt > span").text("Gift Card #");
        $("div#receipt").css("left", "400px");
        $("div#receipt").slideDown("fast").css("display", "block");
    });

    /* Form Validations */
    function FormInputsValid()
    {
        $.validity.start();
        $("#name_first, #name_last, #store, #employee").require();
        $("#day_phone").require().match("phone");
        $("#billing_street,#billing_city,#billing_state,#billing_zip").require();
        var cardType = $("input[name=cust_cc_type]:checked").val();
        if (cardType === ("visa" || "mastercard" || "amex" || "discover"))
        {
            $("#cust_cc_num1,#cust_cc_num2,#cust_cc_num3,#cust_cc_num1").require().match("integer");
            $("#cust_cc_exp").require().match(/^\d{2}[\/]\d{2}$/, "Expiration Date must be in the form xx/xx").maxLength(5);
            $("#cust_cc_cvc").require().match("integer").maxLength(4);
        }
        else if (cardType == ("Gift Card" || "In store purchase"))
        {
            $("#receipt_number").require();
        }

        var result = $.validity.end();
        return result.valid;
    }

    /* Submit button (Validates data before continuing submission) */
    $(document).on("click", "#PA_order_submit_button", function (e)
    {
        e.preventDefault();
    	/* Validate form */
        if (FormInputsValid())
        {
            /* disable submit button */
            $("#PA_order_submit_button").prop("disabled", true);

            $.ajax(
            {
                type: "POST",
                url: "specialOrders.php",
                data: $("#PA_order_form").serialize()
            })
            .done(function (response)
            {
                $("#PA_order_submit_button").css("background-color", "#33FF00").attr("value", "Success!");
                $("#status").fadeIn("slow").html(response);
            })
            .fail(function(){alert("fail");});
        }
        else
        {
            alert("Make sure required fields are completed!");
        }
    });
} // end loadPAOrderFormEventHandler()

/*********************************************************
 *      Warranty Order form
 *
 ********************************************************/
function loadWarrantyFormEventHandler()
{

    $("a.newbikeOrder").click(function ()
    {
        $("DIV.title > H5").text("New Bike Order");
        $("DIV.title").css("background", "url('resources/images/colors/blue/title.png') repeat-x scroll 0 0 #336699");
        $(".search").html("");
        $(".table").load("bike-order-form.php");
        return false;
    });

    /* Form Validations */
    function WarrantyFormInputsValid()
    {
        $.validity.start();
        $("#name_first, #name_last, #store, #employee").require();
        $("#day_phone").require().match("phone");
        var result = $.validity.end();
        return result.valid;
    }

    /* Submit button (Validates data before continuing submission) */
    $(document).on("click", "#warranty_order_submit_button", function (e)
    {
        e.preventDefault();
    	/* Validate form */
        if (WarrantyFormInputsValid())
        {
            /* disable submit button */
            $("#warranty_order_submit_button").prop({disabled: true});
            $.ajax(
            {
                type: "POST",
                url: "specialOrders.php",
                data: $("#warranty_order_form").serialize()
            })
            .done(function (response)
            {
                $("#warranty_order_submit_button").css("background-color","#33FF00").attr("value", "Success!");
                $("#status").fadeIn("slow").html(response);
            })
            .fail(function(){alert("fail");});
        }
        else
        {
            alert("Make sure required fields are completed!");
        }
    });
} // end loadWarrantyFormEventHandler()


/*********************************************************
 *      Order Status search
 *
 ********************************************************/
function loadOrderStatusSearchForm()
{
    $("#search_order_input_box").autocomplete(
    {
        minLength: 1,
        delay: 0,
        source: function (request, response)
        {
            if ($("#search_order_store").val() != "null")
            {
                request.store = $("#search_order_store").val();
            }

            $.getJSON(
		      "orderStatus.php",
		      request,
		      function (data)
		      {
			response(data);
		      }
	    );
        },
        select: function (event, ui)
        {
            if (ui.item)
            {
                var numOfOrders = (1 + ui.item.others.length);
                var suffix = (numOfOrders > 1) ? "s" : "";
                var dateOrdered = (ui.item.date_ordered == "0000-00-00") ? "Not yet ordered" : ui.item.date_ordered;
                sOut = "<center><div id=\"numOrdersFound\" class=\"message-success\"><span>" + numOfOrders + "</span> Order" + suffix + " Found</div></center>";
                sOut += "<table class=\"statusResultTable success\" border=\"1\" cellpadding=\"5\">";
                sOut += "<tr class=\"searchTableHeader\"><th>&nbsp;</th><th>OrderID</th><th>Status</th><th>Submitted</th><th>Notes</th><th>Ordered</th></tr>";
                sOut += "<tr id=\"" + ui.item.order_id + "\"><td class=\"row_icon\"><img id=\"" + ui.item.order_id + "\" class=\"row_icon\" src=\"resources/images/details_open.png\" /></td><td width=\"4%\">" + ui.item.order_id + "</td><td width=\"4%\">" + ui.item.status + "</td>";
                sOut += "<td width=\"13%\">" + ui.item.date_submitted + "</td><td width=\"66%\">" + ui.item.notes + "</td>";
                sOut += "<td width=\"13%\">" + dateOrdered + "</td></tr>";
                sOut += "<tr class=\"details\" id=\"details_" + ui.item.order_id + "\"><td colspan=\"5\"></td></tr>";
                fetchDetails(ui.item.order_id);

                for (var x = 0; x < ui.item.others.length; x++)
                {
                    dateOrdered = (ui.item.others[x].date_ordered == "0000-00-00") ? "Not yet ordered" : ui.item.others[x].date_ordered;
                    sOut += "<tr id=\"" + ui.item.others[x].order_id + "\"><td class=\"row_icon\"><img id=\"" + ui.item.others[x].order_id + "\" class=\"row_icon\" src=\"resources/images/details_open.png\" /></td><td width=\"4%\">" + ui.item.others[x].order_id + "</td><td width=\"4%\">" + ui.item.others[x].status + "</td>";
                    sOut += "<td width=\"13%\">" + ui.item.others[x].date_submitted + "</td><td width=\"66%\">" + ui.item.others[x].notes + "</td>";
                    sOut += "<td width=\"13%\">" + dateOrdered + "</td></tr>";
                    sOut += "<tr class=\"details\" id=\"details_" + ui.item.others[x].order_id + "\"><td colspan=\"5\"></td></tr>";
                    fetchDetails(ui.item.others[x].order_id);
                }
                sOut += "</table>";
                $("#search_results").html(sOut);

                $("img.row_icon").click(function ()
                {
                    var id = $(this).attr("id");
                    if (this.src.match("details_close"))
                    {
                        /* This row is already open - close it */
                        this.src = "resources/images/details_open.png";
                        $("tr#details_" + id).css("display", "none");
                    }
                    else
                    {
                        /* Open this row */
                        this.src = "resources/images/details_close.png";
                        $("tr#details_" + id).css("display", "table-row");
                    }
                });
            }
        }
    });
    $("#openOrderSearch").change(function ()
    {
        $("#search_results").html("");
        $.getJSON("orderSearchbyStore.php",
        {
            store: $("#openOrderSearch").val()
        },

        function (data)
        {
            var numOfOrders = (1 + data.length);
            var suffix = (numOfOrders > 1) ? "s" : "";
            sOut = "<center><div id=\"numOrdersFound\" class=\"message-success\"><span>" + numOfOrders + "</span> Open Order" + suffix + " Found for " + $("#openOrderSearch").val() + "</div></center>";
            sOut += "<table class=\"statusResultTable success\" border=\"1\" cellpadding=\"5\">";
            sOut += "<tr class=\"searchTableHeader\"><th>&nbsp;</th><th>OrderID</th><th>Status</th><th>Submitted</th><th>Notes</th><th>Ordered</th></tr>";
            for (var x = 0; x < data.length; x++)
            {
                var dateOrdered = (data[x].date_ordered == "0000-00-00") ? "Not yet ordered" : data[x].date_ordered;
                sOut += "<tr id=\"" + data[x].order_id + "\"><td class=\"row_icon\"><img id=\"" + data[x].order_id + "\" class=\"row_icon\" src=\"resources/images/details_open.png\" /></td><td width=\"4%\">" + data[x].order_id + "</td><td width=\"4%\">" + data[x].status + "</td>";
                sOut += "<td width=\"13%\">" + data[x].date_submitted + "</td><td width=\"66%\">" + data[x].notes + "</td>";
                sOut += "<td width=\"13%\">" + dateOrdered + "</td></tr>";
                sOut += "<tr class=\"details\" id=\"details_" + data[x].order_id + "\"><td colspan=\"5\"></td></tr>";
                fetchDetails(data[x].order_id);
            }
            sOut += "</table>";
            $("#search_results").html(sOut);

            $("img.row_icon").click(function ()
            {
                var id = $(this).attr("id");
                if (this.src.match("details_close"))
                {
                    /* This row is already open - close it */
                    this.src = "resources/images/details_open.png";
                    $("tr#details_" + id).css("display", "none");
                }
                else
                {
                    /* Open this row */
                    this.src = "resources/images/details_close.png";
                    $("tr#details_" + id).css("display", "table-row");
                }
            });
        });
    });

    /* open vendor links in new window
  $("A[rel="external"]").click(function(){
    window.open($(this).attr("href"));
    return false;
  });
  */
}



/*********************************************************
 *      Order Details on search page
 *     @return string
 ********************************************************/
function formatDetails(data)
{
    var details = '';
    details += '<div class="top_row">';
    details += '    <div class="float_left">';
    details += '  <table>';
    details += '      <thead><tr><th colspan="2"><span style="font-size:1.2em;">Customer</span></th></tr></thead>';
    details += '      <tbody>';
    details += '    <tr>';
    details += '        <td><label for="cust_name_first">First Name:</label></td><td><input id="name_first" name="cust_name_first" type="text" class="small" value="' + unescape(data.cust_name_first) + '" readonly="readonly" /></td>';
    details += '    </tr>';
    details += '    <tr>';
    details += '        <td><label for="cust_name_last">Last Name:</label></td><td><input id="name_last" name="cust_name_last" type="text" class="small" value="' + unescape(data.cust_name_last) + '" readonly="readonly" /></td>';
    details += '    </tr>';
    details += '    <tr>';
    details += '        <td><label for="cust_email">eMail:</label></td><td><input id="email" name="cust_email" type="email" class="small" value="' + unescape(data.email) + '" readonly="readonly" /></td>';
    details += '    </tr>';
    details += '    <tr>';
    details += '        <td><label for="cust_day_phone">Day Phone:</label></td><td><input id="day_phone" name="cust_day_phone" type="text" class="small" value="' + unescape(data.phone) + '" readonly="readonly" /></td>';
    details += '    </tr>';
    details += '      </tbody>';
    details += '  </table>';
    details += '    </div>';
    details += '    <div class="float_left">';
    details += '  <table>';
    details += '      <thead><tr><th colspan="2"><span style="font-size:1.2em;">Billing</span></th></tr></thead>';
    details += '      <tbody>';
    details += '    <tr>';
    details += '        <td><div class="label"><label for="billing_street">Street:</label></div></td><td><div class="input"><input id="billing_street" name="billing_street" type="text" class="small" value="' + unescape(data.billing_street) + '" readonly="readonly" /></div></td>';
    details += '    </tr>';
    details += '    <tr>';
    details += '        <td><div class="label"><label for="billing_city">City:</label></div></td><td><div class="input"><input id="billing_city" name="billing_city" type="text" class="small" value="' + unescape(data.billing_city) + '" readonly="readonly" /></div></td>';
    details += '    </tr>';
    details += '    <tr>';
    details += '        <td><div class="label"><label for="billing_state">State:</label></div></td><td><div class="input"><input id="billing_state" name="billing_state" type="text" class="small" value="' + unescape(data.billing_state) + '" readonly="readonly" /></div></td>';
    details += '    </tr>';
    details += '    <tr>';
    details += '        <td><div class="label"><label for="billing_zip">Zip:</label></div></td><td><div class="input"><input id="billing_zip" name="billing_zip" type="text" class="small" value="' + unescape(data.billing_zip) + '" readonly="readonly" /></div></td>';
    details += '    </tr>';
    details += '      </tbody>';
    details += '  </table>';
    details += '    </div>';
    details += '    <div class="float_left last">';
    details += '  <table>';
    details += '      <thead><tr><th colspan="2"><span style="font-size:1.2em;">Shipping</span></th></tr></thead>';
    details += '      <tbody>';
    details += '    <tr>';
    details += '        <td><div class="label"><label for="shipping_street">Street:</label></div></td><td><div class="input"><input id="shipping_street" name="shipping_street" type="text" class="small" value="' + unescape(data.shipping_street) + '" readonly="readonly" /></div></td>';
    details += '    </tr>';
    details += '    <tr>';
    details += '        <td><div class="label"><label for="shipping_city">City:</label></div></td><td><div class="input"><input id="shipping_city" name="shipping_city" type="text" class="small" value="' + unescape(data.shipping_city) + '" readonly="readonly" /></div></td>';
    details += '    </tr>';
    details += '    <tr>';
    details += '        <td><div class="label"><label for="shipping_state">State:</label></div></td><td><div class="input"><input id="shipping_state" name="shipping_state" type="text" class="small" value="' + unescape(data.shipping_state) + '" readonly="readonly" /></div></td>';
    details += '    </tr>';
    details += '    <tr>';
    details += '        <td><div class="label"><label for="shipping_zip">Zip:</label></div></td><td><div class="input"><input id="shipping_zip" name="shipping_zip" type="text" class="small" value="' + unescape(data.shipping_zip) + '" readonly="readonly" /></div></td>';
    details += '    </tr>';
    details += '      </tbody>';
    details += '  </table>';
    details += '    </div>';
    details += '</div>';
    details += '<br clear="all" />';
    details += '<div id="stores" class="centered">';
    details += '    <span style="font-size:1.2em;">Store</span>&nbsp;&nbsp;&nbsp;<input type="text" name="store" class="small" value="' + unescape(data.store) + '" readonly="readonly" />';
    details += '    <span style="font-size:1.2em;">Employee: </span> <input id="employee" name="employee_name" type="text" class="small" value="' + unescape(data.employee) + '" readonly="readonly" />';
    details += '</div>';
    details += '<div class="centered">';
    details += '    <span style="font-size:1.2em;">Receipt #</span>&nbsp;<input id="receipt_number" name="receipt_number" class="" value="' + unescape(data.receipt_number) + '" type="text" size="10" readonly="readonly" />&nbsp;&nbsp;&nbsp;&nbsp;';
    details += '    <span style="font-size:1.2em;">RA #</span>&nbsp;<input id="RA_number" name="RA_number" class="" value="' + unescape(data.RA_number) + '" type="text" size="10" readonly="readonly" />&nbsp;&nbsp;&nbsp;&nbsp;';
    details += '    <span style="font-size:1.2em;">Order #</span>&nbsp;<input id="order_number" name="order_number" class="" value="' + data.id + '" type="text" size="10" readonly="readonly" />';
    details += '</div>';
    details += '<br clear="all" />';
    details += '    <div class="table">';
    details += '  <table>';
    details += '      <thead>';
    details += '    <tr>';
    details += '        <th class="left">Rpro #</th>';
    details += '        <th>Dept</th>';
    details += '        <th>Vend</th>';
    details += '        <th>Vendor Part #</th>';
    details += '        <th>Description</th>';
    details += '        <th>Size</th>';
    details += '        <th>Attr</th>';
    details += '        <th>Price</th>';
    details += '        <th>Qty</th>';
    details += '        <th class="last">Total</th>';
    details += '    </tr>';
    details += '      </thead>';
    details += '      <tbody>';
    details += '    <tr>';
    details += '        <td><input id="item_1_rpro_num" name="item_1_rpro_num" type="text" size="10" class="" value="' + unescape(data.item_1_rpro_num) + '" readonly="readonly" /></td>';
    details += '        <td><input id="item_1_dept" name="item_1_dept" type="text" size="5" class="" value="' + unescape(data.item_1_dept) + '" readonly="readonly" /></td>';
    details += '        <td><input id="item_1_vend" name="item_1_vend" type="text" size="10" class="" value="' + unescape(data.item_1_vend) + '" readonly="readonly" /></td>';
    details += '        <td><input id="item_1_manu_part_num" name="item_1_manu_part_num" type="text" size="10" class="" value="' + unescape(data.item_1_manu_part_num) + '" readonly="readonly" /></td>';
    details += '        <td><input id="item_1_desc" name="item_1_desc" type="text" size="15" class="" value="' + unescape(data.item_1_desc) + '" readonly="readonly" /></td>';
    details += '        <td><input id="item_1_size" name="item_1_size" type="text" size="5" class="" value="' + unescape(data.item_1_size) + '" readonly="readonly" /></td>';
    details += '        <td><input id="item_1_attr" name="item_1_attr" type="text" size="10" class="" value="' + unescape(data.item_1_attr) + '" readonly="readonly" /></td>';
    details += '        <td><input id="item_1_price" name="item_1_price" type="text" size="6" class="" value="' + data.item_1_price + '" readonly="readonly" /></td>';
    details += '        <td><input id="item_1_qty" name="item_1_qty" type="text" size="2" class="" value="' + data.item_1_qty + '" readonly="readonly" /></td>';
    details += '        <td><input id="item_1_total" name="item_1_total" type="text" size="6" class="" value="' + data.item_1_total + '" readonly="readonly" /></td>';
    details += '    </tr>';
    details += '    <tr>';
    details += '        <td><input id="item_2_rpro_num" name="item_2_rpro_num" type="text" size="10" class="" value="' + unescape(data.item_2_rpro_num) + '" readonly="readonly" /></td>';
    details += '        <td><input id="item_2_dept" name="item_2_dept" type="text" size="5" class="" value="' + unescape(data.item_2_dept) + '" readonly="readonly" /></td>';
    details += '        <td><input id="item_2_vend" name="item_2_vend" type="text" size="10" class="" value="' + unescape(data.item_2_vend) + '" readonly="readonly" /></td>';
    details += '        <td><input id="item_2_manu_part_num" name="item_2_manu_part_num" type="text" size="10" class="" value="' + unescape(data.item_2_manu_part_num) + '" readonly="readonly" /></td>';
    details += '        <td><input id="item_2_desc" name="item_2_desc" type="text" size="15" class="" value="' + unescape(data.item_2_desc) + '" readonly="readonly" /></td>';
    details += '        <td><input id="item_2_size" name="item_2_size" type="text" size="5" class="" value="' + unescape(data.item_2_size) + '" readonly="readonly" /></td>';
    details += '        <td><input id="item_2_attr" name="item_2_attr" type="text" size="10" class="" value="' + unescape(data.item_2_attr) + '" readonly="readonly" /></td>';
    details += '        <td><input id="item_2_price" name="item_2_price" type="text" size="6" class="" value="' + data.item_2_price + '" readonly="readonly" /></td>';
    details += '        <td><input id="item_2_qty" name="item_2_qty" type="text" size="2" class="" value="' + data.item_2_qty + '" readonly="readonly" /></td>';
    details += '        <td><input id="item_2_total" name="item_2_total" type="text" size="6" class="" value="' + data.item_2_total + '" readonly="readonly" /></td>';
    details += '    </tr>';
    details += '    <tr>';
    details += '        <td><input id="item_3_rpro_num" name="item_3_rpro_num" type="text" size="10" class="" value="' + unescape(data.item_3_rpro_num) + '" readonly="readonly" /></td>';
    details += '        <td><input id="item_3_dept" name="item_3_dept" type="text" size="5" class="" value="' + unescape(data.item_3_dept) + '" readonly="readonly" /></td>';
    details += '        <td><input id="item_3_vend" name="item_3_vend" type="text" size="10" class="" value="' + unescape(data.item_3_vend) + '" readonly="readonly" /></td>';
    details += '        <td><input id="item_3_manu_part_num" name="item_3_manu_part_num" type="text" size="10" class="" value="' + unescape(data.item_3_manu_part_num) + '" readonly="readonly" /></td>';
    details += '        <td><input id="item_3_desc" name="item_3_desc" type="text" size="15" class="" value="' + unescape(data.item_3_desc) + '" readonly="readonly" /></td>';
    details += '        <td><input id="item_3_size" name="item_3_size" type="text" size="5" class="" value="' + unescape(data.item_3_size) + '" readonly="readonly" /></td>';
    details += '        <td><input id="item_3_attr" name="item_3_attr" type="text" size="10" class="" value="' + unescape(data.item_3_attr) + '" readonly="readonly" /></td>';
    details += '        <td><input id="item_3_price" name="item_3_price" type="text" size="6" class="" value="' + data.item_3_price + '" readonly="readonly" /></td>';
    details += '        <td><input id="item_3_qty" name="item_3_qty" type="text" size="2" class="" value="' + data.item_3_qty + '" readonly="readonly" /></td>';
    details += '        <td><input id="item_3_total" name="item_3_total" type="text" size="6" class="" value="' + data.item_3_total + '" readonly="readonly" /></td>';
    details += '    </tr>';
    details += '    <tr>';
    details += '        <td><input id="item_4_rpro_num" name="item_4_rpro_num" type="text" size="10" class="" value="' + unescape(data.item_4_rpro_num) + '" readonly="readonly" /></td>';
    details += '        <td><input id="item_4_dept" name="item_4_dept" type="text" size="5" class="" value="' + unescape(data.item_4_dept) + '" readonly="readonly" /></td>';
    details += '        <td><input id="item_4_vend" name="item_4_vend" type="text" size="10" class="" value="' + unescape(data.item_4_vend) + '" readonly="readonly" /></td>';
    details += '        <td><input id="item_4_manu_part_num" name="item_4_manu_part_num" type="text" size="10" class="" value="' + unescape(data.item_4_manu_part_num) + '" readonly="readonly" /></td>';
    details += '        <td><input id="item_4_desc" name="item_4_desc" type="text" size="15" class="" value="' + unescape(data.item_4_desc) + '" readonly="readonly" /></td>';
    details += '        <td><input id="item_4_size" name="item_4_size" type="text" size="5" class="" value="' + unescape(data.item_4_size) + '" readonly="readonly" /></td>';
    details += '        <td><input id="item_4_attr" name="item_4_attr" type="text" size="10" class="" value="' + unescape(data.item_4_attr) + '" readonly="readonly" /></td>';
    details += '        <td><input id="item_4_price" name="item_4_price" type="text" size="6" class="" value="' + data.item_4_price + '" readonly="readonly" /></td>';
    details += '        <td><input id="item_4_qty" name="item_4_qty" type="text" size="2" class="" value="' + data.item_4_qty + '" readonly="readonly" /></td>';
    details += '        <td><input id="item_4_total" name="item_4_total" type="text" size="6" class="" value="' + data.item_4_total + '" readonly="readonly" /></td>';
    details += '    </tr>';
    details += '    <tr>';
    details += '        <td><input id="item_5_rpro_num" name="item_5_rpro_num" type="text" size="10" class="" value="' + unescape(data.item_5_rpro_num) + '" readonly="readonly" /></td>';
    details += '        <td><input id="item_5_dept" name="item_5_dept" type="text" size="5" class="" value="' + unescape(data.item_5_dept) + '" readonly="readonly" /></td>';
    details += '        <td><input id="item_5_vend" name="item_5_vend" type="text" size="10" class="" value="' + unescape(data.item_5_vend) + '" readonly="readonly" /></td>';
    details += '        <td><input id="item_5_manu_part_num" name="item_5_manu_part_num" type="text" size="10" class="" value="' + unescape(data.item_5_manu_part_num) + '" readonly="readonly" /></td>';
    details += '        <td><input id="item_5_desc" name="item_5_desc" type="text" size="15" class="" value="' + unescape(data.item_5_desc) + '" readonly="readonly" /></td>';
    details += '        <td><input id="item_5_size" name="item_5_size" type="text" size="5" class="" value="' + unescape(data.item_5_size) + '" readonly="readonly" /></td>';
    details += '        <td><input id="item_5_attr" name="item_5_attr" type="text" size="10" class="" value="' + unescape(data.item_5_attr) + '" readonly="readonly" /></td>';
    details += '        <td><input id="item_5_price" name="item_5_price" type="text" size="6" class="" value="' + data.item_5_price + '" readonly="readonly" /></td>';
    details += '        <td><input id="item_5_qty" name="item_5_qty" type="text" size="2" class="" value="' + data.item_5_qty + '" readonly="readonly" /></td>';
    details += '        <td><input id="item_5_total" name="item_5_total" type="text" size="6" class="" value="' + data.item_5_total + '" readonly="readonly" /></td>';
    details += '    </tr>';
    details += '      </tbody>';
    details += '  </table>';
    details += '    </div>';
    details += '    <div class="centered">';
    details += '  <span style="font-size:1.2em;">Shipping Method</span>&nbsp;&nbsp;&nbsp;';
    details += '  <input name="ship_method" class="" value="' + data.ship_type + '" readonly="readonly" />';
    details += '  <span style="font-size:1.2em;">Shipping</span>$<input id="shipping_charge" name="shipping_charge" type="text" size="6" class="" value="' + unescape(data.shipping_charge) + '" readonly="readonly" />&nbsp;&nbsp;';
    details += '  <span style="font-size:1.2em;">Tax</span>$<input id="tax" name="tax" type="text" size="4" class="" value="' + data.tax + '" readonly="readonly" />&nbsp;&nbsp;';
    details += '  <span style="font-size:1.2em;">Order Total</span>$<input id="total_charge" name="total" type="text" size="6" class="" value="' + data.total + '" readonly="readonly" />&nbsp;&nbsp;';
    details += '    </div>';
    details += '  </div></tr>';
    return details;
}


/*********************************************************
 *      Order Admin page
 *
 ********************************************************/
function loadOrderAdmin()
{
    /* orderAdmin_hiddenRow.php hasn"t returned the table with raw data (no data? errors?) */
    if ($("#orderAdmin").length == 0) return;

    /*
     * Initialse DataTables, with sorting on the "status" column ascending
     */
    var oTable = $("#orderAdmin").dataTable(
    {
        bAutoWidth: false,
        bDestroy: true
        //       "aaSorting": [[ 1, "asc" ]]
    });

    /* Add event listener for opening and closing details
     * Note that the indicator for showing which row is open is not controlled by DataTables,
     * rather it is done here
     */
    $("td img", oTable.fnGetNodes()).each(function ()
    {
        $(this).click(function ()
        {
            var nTr = this.parentNode.parentNode;
            var id = $(nTr).attr("id");
            if (this.src.match("details_close"))
            {
                /* This row is already open - close it */
                this.src = "resources/images/details_open.png";
                oTable.fnClose(nTr);
            }
            else
            {
                /* Open this row */
                this.src = "resources/images/details_close.png";

                /* Load data */
                $.getJSON("orderDetail.php?id=" + id,

                function (data)
                {
                    oTable.fnOpen(nTr, fnFormatDetails(data), "details");
                    $("input.editMyDetails", oTable.fnGetNodes()).editable("orderAdminUpdate.php", /* added oTable.fnGetNodes() */
                    {
                        callback: function (value, settings)
                        {
                            var aPos = oTable.fnGetPosition(this);
                            oTable.fnUpdate(value, aPos[0], aPos[1]);
                        },
                        submitdata: function (value, settings)
                        {
                            return {
                                "id": $("input.editMyDetails").attr("item")
                            };
                        },

                        placeholder: "",
                        type: "text",
                        indicator: "Saving...",
                        tooltip: "Click to edit...",
                        cssclass: "editMeForm",
                        onblur: "submit"
                    });
                });
            }
        });
    });

    /* Apply jEditable handlers to the table */
    $("td.editMe", oTable.fnGetNodes()).editable("orderAdminUpdate.php",
    {
        callback: function (value, settings)
        {
            var aPos = oTable.fnGetPosition(this);
            oTable.fnUpdate(value, aPos[0], aPos[1]);
        },
        submitdata: function (value, settings)
        {
            return {
                "row_id": this.parentNode.getAttribute("id")
            };
        },

        placeholder: "",
        type: "text",
        indicator: "Saving...",
        tooltip: "Click to edit...",
        cssclass: "editMeForm",
        onblur: "submit"
    });

    /* Apply jEditable handlers to Status fields using select dropdowns */
    $("td.editMeSelect", oTable.fnGetNodes()).editable("orderAdminUpdate.php",
    {
        loadurl: "statusCodes.php",
        loaddata: function (value, settings)
        {
            return {
                "row_id": this.parentNode.getAttribute("id")
            };
        },
        submitdata: function (value, settings)
        {
            /* TODO:
             *  open confim dialog with callback
             */
            return {
                "row_id": this.parentNode.getAttribute("id")
            };
        },

        placeholder: "",
        type: "select",
        indicator: "Saving...",
        tooltip: "Click to edit...",
        cssclass: "editMeForm",
        submit: "Ok"
        //onblur  : "submit"
    });

    /* Apply jEditable handlers to the table */
    $("td.editMeDate", oTable.fnGetNodes()).editable("orderAdminUpdate.php",
    {
        callback: function (value, settings)
        {
            var aPos = oTable.fnGetPosition(this);
            oTable.fnUpdate(value, aPos[0], aPos[1]);
        },
        submitdata: function (value, settings)
        {
            return {
                "row_id": this.parentNode.getAttribute("id")
            };
        },

        placeholder: "",
        type: "datepicker",
        indicator: "Saving...",
        tooltip: "Click to edit...",
        cssclass: "editMeForm",
        onblur: "submit"
    });

}


/*********************************************************
 *      Admin Settings
 *
 ********************************************************/
function loadAdminSettings()
{

    /* Apply jEditable handlers to the table */
    $(".editMe").editable("AdminSettingsUpdate.php",
    {

        submitdata: function (value, settings)
        {
            return {
                "table": this.parentNode.getAttribute("class"),
                "id": this.parentNode.getAttribute("id"),
                "field": this.getAttribute("data-field")
            };
        },

        placeholder: "",
        type: "text",
        indicator: "Saving...",
        tooltip: "Click to edit...",
        cssclass: "editMeForm",
        onblur: "submit"
    });

    /* show/hide add form div */
    $("a.add").click(function ()
    {
        $("tr.add").slideToggle();
        return false;
    });

    /* submit add status code form */
    $("form#add_status_code").find("input[name=submit]").click(function ()
    {
        $.ajax(
        {
            type: "POST",
            url: "AdminSettingsUpdate.php",
            data: $("#add_status_code").serialize(),
            dataType: "json"
        })
        .done(function (response)
        {
            $("div.add").slideToggle();
            var backgroundColor = $("tr.status_codes > td").css("backgroundColor");
            $("<tr class=\"status_codes\" id=\"" + response.id + "\"><td class=\"editMe\" data-field=\"status_text\" title=\"Click to edit...\">" + response.status_text + "</td><td><a href=\"#\" id=\"" + response.id + "\" class=\"delete_status_code\"><img src=\"resources/images/icons/delete.png\" alt=\"Delete this item\" title=\"Delete this item\" /></a></td></tr>").prependTo("table.adminSettings > tbody");
            $("tr#" + response.id + " > td").css("background-color", "#33FF00").animate(
            {
                backgroundColor: backgroundColor
            }, 2500);
        })
        .fail(function(){alert("fail");});
        return false;
    });
    /* delete status code */
    $("a.delete_status_code").click(function ()
    {
        $.ajax(
        {
            type: "POST",
            url: "AdminSettingsUpdate.php",
            data: {
                action: "delete_status_code",
                id: $(this).attr("id")
            },
            dataType: "json"
        })
        .done(function (response)
        {
            $("tr#" + response.id).css("background-color", "#FBE3E4").hide("slow");
        })
        .fail(function(){alert("Fail");});
        return false;
    });
    /* Add store */
    $("form#add_store").find("input[name=submit]").click(function ()
    {
        var dataForm = $("#add_store").serialize();
        $.ajax(
        {
            type: "POST",
            url: "AdminSettingsUpdate.php",
            data: dataForm,
            dataType: "json"
        })
        .done(function (response)
        {
            $("div.add").slideToggle();
            var backgroundColor = $("tr.stores > td").css("backgroundColor");
            $("<tr class=\"stores\" id=\"" + response.id + "\"><td class=\"editMe\" data-field=\"add_store\" title=\"Click to edit...\">" + response.store_name + "</td><td><a href=\"#\" id=\"" + response.id + "\" class=\"delete_store\"><img src=\"resources/images/icons/delete.png\" alt=\"Delete this item\" title=\"Delete this item\" /></a></td></tr>").prependTo("table.adminSettings > tbody");
            $("tr#" + response.id + " > td").css("background-color", "#33FF00").animate(
            {
                backgroundColor: backgroundColor
            }, 2500);
        })
        .fail(function(){alert("Fail");});
        return false;
    });
    /* Delete store */
    $("a.delete_store").click(function ()
    {
        $.ajax(
        {
            type: "POST",
            url: "AdminSettingsUpdate.php",
            data: {
                action: "delete_store",
                id: $(this).attr("id")
            },
            dataType: "json"
        })
        .done(function (response)
        {
            $("tr#" + response.id).css("background-color", "#FBE3E4").hide("slow");
        })
        .fail(function(){alert("Fail");});
        return false;
    });
    /* Add email recipient */
    $("form#add_email_recipient").find("input[name=submit]").click(function ()
    {
        var dataForm = $("#add_email_recipient").serialize();
        $.ajax(
        {
            type: "POST",
            url: "AdminSettingsUpdate.php",
            data: dataForm,
            dataType: "json"
        })
        .done(function (response)
        {
            $("tr.add").slideToggle();
            var backgroundColor = $("tr.email_recipients > td").css("backgroundColor");
            $("<tr class=\"email_recipients\" id=\"" + response.id + "\"><td class=\"editMe\" data-field=\"store_code\" title=\"Click to edit...\">" + response.store_code + "</td><td class=\"editMe\" data-field=\"name\" title=\"Click to edit...\">" + response.name + "</td><td class=\"editMe\" data-field=\"email_address\" title=\"Click to edit...\">" + response.email_address + "</td><td class=\"editMe\" data-field=\"notice_type\" title=\"Click to edit...\">" + response.notice_type + "</td><td class=\"editMe\" data-field=\"template\" title=\"Click to edit...\">" + response.template + "</td><td><a href=\"#\" id=\"" + response.id + "\" class=\"delete_email_recipient\"><img src=\"resources/images/icons/delete.png\" alt=\"Delete this item\" title=\"Delete this item\" /></a></td></tr>").prependTo("table.adminSettings > tbody");
            $("tr#" + response.id + " > td").css("background-color", "#33FF00").animate(
            {
                backgroundColor: backgroundColor
            }, 2500);
        })
        .fail(function(){alert("Fail");});
        return false;
    });
    /* Delete email recipient */
    $("a.delete_email_recipient").click(function ()
    {
        $.ajax(
        {
            type: "POST",
            url: "AdminSettingsUpdate.php",
            data: {
                action: "delete_email_recipient",
                id: $(this).attr("id")
            },
            dataType: "json"
        })
        .done(function (response)
        {
            $("tr#" + response.id).css("background-color", "#FBE3E4").hide("slow");
        })
        .fail(function(){alert("Fail");});
        return false;
    });
}


/*********************************************************
 *      Status Code dropdown on Admin page
 *
 ********************************************************/
function loadStatusCodeSelectTag()
{
    $("#filtering_status_codes").change(function ()
    {
        $(".table").html(""); /* needs to empty the page before loading the new one to avoid some misbehaviour of the datatable plugin */
        $(".table").load("orderAdmin_hiddenRow.php?sort_status=" + $(this).val(), loadOrderAdmin);
        return false;
    });
}


/*********************************************************
 *      Order Details on admin page
 *
 ********************************************************/
function fnFormatDetails(data)
{
    sOut = '';
    sOut += '<div class="top_row">';
    sOut += '    <div class="float_left">';
    sOut += ' <table>';
    sOut += '     <thead><tr><th colspan="2"><span style="font-size:1.2em;">Customer</span></th></tr></thead>';
    sOut += '     <tbody>';
    sOut += '   <tr>';
    sOut += '       <td><label for="cust_day_phone">Day Phone:</label></td><td><input id="day_phone" name="cust_day_phone" type="text" class="small  editMyDetails" item="' + data.id + '" value="' + unescape(data.phone) + '" /></td>';
    sOut += '   </tr>';
    sOut += '   <tr>';
    sOut += '       <td><p>&nbsp;</p></td><td><p>&nbsp;</p></td>';
    sOut += '   </tr>';
    sOut += '   <tr>';
    sOut += '       <td><p>&nbsp;</p></td><td><p>&nbsp;</p></td>';
    sOut += '   </tr>';
    sOut += '   <tr>';
    sOut += '       <td>&nbsp;</td><td>&nbsp;</td>';
    sOut += '   </tr>';
    sOut += '     </tbody>';
    sOut += ' </table>';
    sOut += '    </div>';
    sOut += '    <div class="float_left">';
    sOut += ' <table>';
    sOut += '     <thead><tr><th colspan="2"><span style="font-size:1.2em;">Billing</span></th></tr></thead>';
    sOut += '     <tbody>';
    sOut += '   <tr>';
    sOut += '       <td><div class="label"><label for="billing_street">Street:</label></div></td><td><div class="input"><input id="billing_street" name="billing_street" type="text" class="small  editMyDetails" item="' + data.id + '" value="' + unescape(data.billing_street) + '"  /></div></td>';
    sOut += '   </tr>';
    sOut += '   <tr>';
    sOut += '       <td><div class="label"><label for="billing_city">City:</label></div></td><td><div class="input"><input id="billing_city" name="billing_city" type="text" class="small  editMyDetails" item="' + data.id + '" value="' + unescape(data.billing_city) + '"  /></div></td>';
    sOut += '   </tr>';
    sOut += '   <tr>';
    sOut += '       <td><div class="label"><label for="billing_state">State:</label></div></td><td><div class="input"><input id="billing_state" name="billing_state" type="text" class="small  editMyDetails" item="' + data.id + '" value="' + unescape(data.billing_state) + '"  /></div></td>';
    sOut += '   </tr>';
    sOut += '   <tr>';
    sOut += '       <td><div class="label"><label for="billing_zip">Zip:</label></div></td><td><div class="input"><input id="billing_zip" name="billing_zip" type="text" class="small  editMyDetails" item="' + data.id + '" value="' + unescape(data.billing_zip) + '"  /></div></td>';
    sOut += '   </tr>';
    sOut += '     </tbody>';
    sOut += ' </table>';
    sOut += '    </div>';
    sOut += '    <div class="float_left last">';
    sOut += ' <table>';
    sOut += '     <thead><tr><th colspan="2"><span style="font-size:1.2em;">Shipping</span></th></tr></thead>';
    sOut += '     <tbody>';
    sOut += '   <tr>';
    sOut += '       <td><div class="label"><label for="shipping_street">Street:</label></div></td><td><div class="input"><input id="shipping_street" name="shipping_street" type="text" class="small  editMyDetails" item="' + data.id + '" value="' + unescape(data.shipping_street) + '"  /></div></td>';
    sOut += '   </tr>';
    sOut += '   <tr>';
    sOut += '       <td><div class="label"><label for="shipping_city">City:</label></div></td><td><div class="input"><input id="shipping_city" name="shipping_city" type="text" class="small  editMyDetails" item="' + data.id + '" value="' + unescape(data.shipping_city) + '"  /></div></td>';
    sOut += '   </tr>';
    sOut += '   <tr>';
    sOut += '       <td><div class="label"><label for="shipping_state">State:</label></div></td><td><div class="input"><input id="shipping_state" name="shipping_state" type="text" class="small  editMyDetails" item="' + data.id + '" value="' + unescape(data.shipping_state) + '"  /></div></td>';
    sOut += '   </tr>';
    sOut += '   <tr>';
    sOut += '       <td><div class="label"><label for="shipping_zip">Zip:</label></div></td><td><div class="input"><input id="shipping_zip" name="shipping_zip" type="text" class="small  editMyDetails" item="' + data.id + '" value="' + unescape(data.shipping_zip) + '"  /></div></td>';
    sOut += '   </tr>';
    sOut += '     </tbody>';
    sOut += ' </table>';
    sOut += '    </div>';
    sOut += '</div>';
    sOut += '<br clear="all" />';
    sOut += '<div id="stores" class="centered">';
    sOut += '    <span style="font-size:1.2em;">Store</span>&nbsp;&nbsp;&nbsp;<input type="text" name="store" class="small  editMyDetails" item="' + data.id + '" value="' + unescape(data.store) + '"  />';
    sOut += '    <span style="font-size:1.2em;">Employee: </span> <input id="employee" name="employee_name" type="text" class="small  editMyDetails" item="' + data.id + '" value="' + unescape(data.employee) + '"  />';
    sOut += '</div>';
    sOut += '<div class="centered">';
    sOut += '    <span style="font-size:1.2em;">Receipt #</span>&nbsp;<input id="receipt_number" name="receipt_number" class="editMyDetails" item="' + data.id + '" value="' + unescape(data.receipt_number) + '" type="text" size="10" />&nbsp;&nbsp;&nbsp;&nbsp;';
    sOut += '    <span style="font-size:1.2em;">RA #</span>&nbsp;<input id="RA_number" name="RA_number" class="editMyDetails" item="' + data.id + '" value="' + unescape(data.RA_number) + '" type="text" size="10" />&nbsp;&nbsp;&nbsp;&nbsp;';
    sOut += '    <span style="font-size:1.2em;">Order #</span>&nbsp;<input id="order_number" name="order_number" class="editMyDetails" item="' + data.id + '" value="' + data.id + '" type="text" size="10" />';
    sOut += '</div>';
    sOut += '<br clear="all" />';
    sOut += '    <div class="table">';
    sOut += ' <table>';
    sOut += '     <thead>';
    sOut += '   <tr>';
    sOut += '       <th class="left">Rpro #</th>';
    sOut += '       <th>Dept</th>';
    sOut += '       <th>Vend</th>';
    sOut += '       <th>Vendor Part #</th>';
    sOut += '       <th>Description</th>';
    sOut += '       <th>Size</th>';
    sOut += '       <th>Attr</th>';
    sOut += '       <th>Price</th>';
    sOut += '       <th>Qty</th>';
    sOut += '       <th class="last">Total</th>';
    sOut += '   </tr>';
    sOut += '     </thead>';
    sOut += '     <tbody>';
    sOut += '   <tr>';
    sOut += '       <td><input id="item_1_rpro_num" name="item_1_rpro_num" type="text" size="10" class=" editMyDetails" item="' + data.id + '" value="' + unescape(data.item_1_rpro_num) + '"  /></td>';
    sOut += '       <td><input id="item_1_dept" name="item_1_dept" type="text" size="5" class="  editMyDetails" item="' + data.id + '" value="' + unescape(data.item_1_dept) + '"  /></td>';
    sOut += '       <td><input id="item_1_vend" name="item_1_vend" type="text" size="10" class="  editMyDetails" item="' + data.id + '" value="' + unescape(data.item_1_vend) + '"  /></td>';
    sOut += '       <td><input id="item_1_manu_part_num" name="item_1_manu_part_num" type="text" size="10" class="  editMyDetails" item="' + data.id + '" value="' + unescape(data.item_1_manu_part_num) + '"  /></td>';
    sOut += '       <td><input id="item_1_desc" name="item_1_desc" type="text" size="15" class="  editMyDetails" item="' + data.id + '" value="' + unescape(data.item_1_desc) + '"  /></td>';
    sOut += '       <td><input id="item_1_size" name="item_1_size" type="text" size="5" class="  editMyDetails" item="' + data.id + '" value="' + unescape(data.item_1_size) + '"  /></td>';
    sOut += '       <td><input id="item_1_attr" name="item_1_attr" type="text" size="10" class="  editMyDetails" item="' + data.id + '" value="' + unescape(data.item_1_attr) + '"  /></td>';
    sOut += '       <td><input id="item_1_price" name="item_1_price" type="text" size="6" class="item1  editMyDetails" item="' + data.id + '" value="' + data.item_1_price + '"  /></td>';
    sOut += '       <td><input id="item_1_qty" name="item_1_qty" type="text" size="2" class="item1  editMyDetails" item="' + data.id + '" value="' + data.item_1_qty + '"  /></td>';
    sOut += '       <td><input id="item_1_total" name="item_1_total" type="text" size="6" class="item1  editMyDetails" item="' + data.id + '" value="' + data.item_1_total + '"  /></td>';
    sOut += '   </tr>';
    sOut += '   <tr>';
    sOut += '       <td><input id="item_2_rpro_num" name="item_2_rpro_num" type="text" size="10" class="  editMyDetails" item="' + data.id + '" value="' + unescape(data.item_2_rpro_num) + '" /></td>';
    sOut += '       <td><input id="item_2_dept" name="item_2_dept" type="text" size="5" class="  editMyDetails" item="' + data.id + '" value="' + unescape(data.item_2_dept) + '"  /></td>';
    sOut += '       <td><input id="item_2_vend" name="item_2_vend" type="text" size="10" class="  editMyDetails" item="' + data.id + '" value="' + unescape(data.item_2_vend) + '"  /></td>';
    sOut += '       <td><input id="item_2_manu_part_num" name="item_2_manu_part_num" type="text" size="10" class="  editMyDetails" item="' + data.id + '" value="' + unescape(data.item_2_manu_part_num) + '"  /></td>';
    sOut += '       <td><input id="item_2_desc" name="item_2_desc" type="text" size="15" class="  editMyDetails" item="' + data.id + '" value="' + unescape(data.item_2_desc) + '"   /></td>';
    sOut += '       <td><input id="item_2_size" name="item_2_size" type="text" size="5" class="  editMyDetails" item="' + data.id + '" value="' + unescape(data.item_2_size) + '"  /></td>';
    sOut += '       <td><input id="item_2_attr" name="item_2_attr" type="text" size="10" class="  editMyDetails" item="' + data.id + '" value="' + unescape(data.item_2_attr) + '"  /></td>';
    sOut += '       <td><input id="item_2_price" name="item_2_price" type="text" size="6" class="item2  editMyDetails" item="' + data.id + '" value="' + data.item_2_price + '"  /></td>';
    sOut += '       <td><input id="item_2_qty" name="item_2_qty" type="text" size="2" class="item2  editMyDetails" item="' + data.id + '" value="' + data.item_2_qty + '"  /></td>';
    sOut += '       <td><input id="item_2_total" name="item_2_total" type="text" size="6" class="item2  editMyDetails" item="' + data.id + '" value="' + data.item_2_total + '"  /></td>';
    sOut += '   </tr>';
    sOut += '   <tr>';
    sOut += '       <td><input id="item_3_rpro_num" name="item_3_rpro_num" type="text" size="10" class="  editMyDetails" item="' + data.id + '" value="' + unescape(data.item_3_rpro_num) + '" /></td>';
    sOut += '       <td><input id="item_3_dept" name="item_3_dept" type="text" size="5" class="  editMyDetails" item="' + data.id + '" value="' + unescape(data.item_3_dept) + '" /></td>';
    sOut += '       <td><input id="item_3_vend" name="item_3_vend" type="text" size="10" class="  editMyDetails" item="' + data.id + '" value="' + unescape(data.item_3_vend) + '" /></td>';
    sOut += '       <td><input id="item_3_manu_part_num" name="item_3_manu_part_num" type="text" size="10" class="  editMyDetails" item="' + data.id + '" value="' + unescape(data.item_3_manu_part_num) + '"  /></td>';
    sOut += '       <td><input id="item_3_desc" name="item_3_desc" type="text" size="15" class="  editMyDetails" item="' + data.id + '" value="' + unescape(data.item_3_desc) + '" /></td>';
    sOut += '       <td><input id="item_3_size" name="item_3_size" type="text" size="5" class="  editMyDetails" item="' + data.id + '" value="' + unescape(data.item_3_size) + '" /></td>';
    sOut += '       <td><input id="item_3_attr" name="item_3_attr" type="text" size="10" class="  editMyDetails" item="' + data.id + '" value="' + unescape(data.item_3_attr) + '" /></td>';
    sOut += '       <td><input id="item_3_price" name="item_3_price" type="text" size="6" class="item3  editMyDetails" item="' + data.id + '" value="' + data.item_3_price + '"  /></td>';
    sOut += '       <td><input id="item_3_qty" name="item_3_qty" type="text" size="2" class="item3  editMyDetails" item="' + data.id + '" value="' + data.item_3_qty + '"  /></td>';
    sOut += '       <td><input id="item_3_total" name="item_3_total" type="text" size="6" class="item3  editMyDetails" item="' + data.id + '" value="' + data.item_3_total + '"  /></td>';
    sOut += '   </tr>';
    sOut += '   <tr>';
    sOut += '       <td><input id="item_4_rpro_num" name="item_4_rpro_num" type="text" size="10" class="  editMyDetails" item="' + data.id + '" value="' + unescape(data.item_4_rpro_num) + '" /></td>';
    sOut += '       <td><input id="item_4_dept" name="item_4_dept" type="text" size="5" class="  editMyDetails" item="' + data.id + '" value="' + unescape(data.item_4_dept) + '" /></td>';
    sOut += '       <td><input id="item_4_vend" name="item_4_vend" type="text" size="10" class="  editMyDetails" item="' + data.id + '" value="' + unescape(data.item_4_vend) + '" /></td>';
    sOut += '       <td><input id="item_4_manu_part_num" name="item_4_manu_part_num" type="text" size="10" class="  editMyDetails" item="' + data.id + '" value="' + unescape(data.item_4_manu_part_num) + '"  /></td>';
    sOut += '       <td><input id="item_4_desc" name="item_4_desc" type="text" size="15" class="  editMyDetails" item="' + data.id + '" value="' + unescape(data.item_4_desc) + '" /></td>';
    sOut += '       <td><input id="item_4_size" name="item_4_size" type="text" size="5" class="  editMyDetails" item="' + data.id + '" value="' + unescape(data.item_4_size) + '" /></td>';
    sOut += '       <td><input id="item_4_attr" name="item_4_attr" type="text" size="10" class="  editMyDetails" item="' + data.id + '" value="' + unescape(data.item_4_attr) + '" /></td>';
    sOut += '       <td><input id="item_4_price" name="item_4_price" type="text" size="6" class="item4  editMyDetails" item="' + data.id + '" value="' + data.item_4_price + '"  /></td>';
    sOut += '       <td><input id="item_4_qty" name="item_4_qty" type="text" size="2" class="item4  editMyDetails" item="' + data.id + '" value="' + data.item_4_qty + '"  /></td>';
    sOut += '       <td><input id="item_4_total" name="item_4_total" type="text" size="6" class="item4  editMyDetails" item="' + data.id + '" value="' + data.item_4_total + '"  /></td>';
    sOut += '   </tr>';
    sOut += '   <tr>';
    sOut += '       <td><input id="item_5_rpro_num" name="item_5_rpro_num" type="text" size="10" class="  editMyDetails" item="' + data.id + '" value="' + unescape(data.item_5_rpro_num) + '" /></td>';
    sOut += '       <td><input id="item_5_dept" name="item_5_dept" type="text" size="5" class="  editMyDetails" item="' + data.id + '" value="' + unescape(data.item_5_dept) + '" /></td>';
    sOut += '       <td><input id="item_5_vend" name="item_5_vend" type="text" size="10" class="  editMyDetails" item="' + data.id + '" value="' + unescape(data.item_5_vend) + '" /></td>';
    sOut += '       <td><input id="item_5_manu_part_num" name="item_5_manu_part_num" type="text" size="10" class="  editMyDetails" item="' + data.id + '" value="' + unescape(data.item_5_manu_part_num) + '"  /></td>';
    sOut += '       <td><input id="item_5_desc" name="item_5_desc" type="text" size="15" class="  editMyDetails" item="' + data.id + '" value="' + unescape(data.item_5_desc) + '" /></td>';
    sOut += '       <td><input id="item_5_size" name="item_5_size" type="text" size="5" class="  editMyDetails" item="' + data.id + '" value="' + unescape(data.item_5_size) + '" /></td>';
    sOut += '       <td><input id="item_5_attr" name="item_5_attr" type="text" size="10" class="  editMyDetails" item="' + data.id + '" value="' + unescape(data.item_5_attr) + '" /></td>';
    sOut += '       <td><input id="item_5_price" name="item_5_price" type="text" size="6" class="item5  editMyDetails" item="' + data.id + '" value="' + data.item_5_price + '"  /></td>';
    sOut += '       <td><input id="item_5_qty" name="item_5_qty" type="text" size="2" class="item5  editMyDetails" item="' + data.id + '" value="' + data.item_5_qty + '"  /></td>';
    sOut += '       <td><input id="item_5_total" name="item_5_total" type="text" size="6" class="item5  editMyDetails" item="' + data.id + '" value="' + data.item_5_total + '"  /></td>';
    sOut += '   </tr>';
    sOut += '     </tbody>';
    sOut += ' </table>';
    sOut += '    </div>';
    sOut += '    <div class="centered">';
    sOut += ' <span style="font-size:1.2em;">Shipping Method</span>&nbsp;&nbsp;&nbsp;';
    sOut += ' <input name="ship_method" class=" editMyDetails" item="' + data.id + '" value="' + data.ship_type + '" />';
    sOut += ' <span style="font-size:1.2em;">Shipping</span>$<input id="shipping_charge" name="shipping_charge" type="text" size="6" class="editMyDetails" item="' + data.id + '" value="' + unescape(data.shipping_charge) + '"  />&nbsp;&nbsp;';
    sOut += ' <span style="font-size:1.2em;">Tax</span>$<input id="tax" name="tax" type="text" size="4" class="editMyDetails" item="' + data.id + '" value="' + data.tax + '"  />&nbsp;&nbsp;';
    sOut += ' <span style="font-size:1.2em;">Order Total</span>$<input id="total_charge" name="total" type="text" size="6" class="editMyDetails" item="' + data.id + '" value="' + data.total + '"  />&nbsp;&nbsp;';
    sOut += '    </div>';
    sOut += '    <div class="centered">';
    sOut += ' <span style="font-size:1.2em;">Payment Type</span>&nbsp;&nbsp;&nbsp;';
    sOut += ' <input id="cust_cc_type" name="cust_cc_type" type="text" class="editMyDetails"  item="' + data.id + '" value="' + data.cust_cc_type + '" />&nbsp;&nbsp;&nbsp;&nbsp;';
    sOut += '       Credit Card #&nbsp;<input id="cust_cc_num" name="cust_cc_num" type="text" size="19" class="  editMyDetails" item="' + data.id + '" value="' + unescape(data.cust_cc_num) + '" />&nbsp;&nbsp;&nbsp;';
    sOut += '       Expiration&nbsp;<input id="cust_cc_exp" name="cust_cc_exp" type="text" size="5" class="  editMyDetails" item="' + data.id + '" value="' + unescape(data.cust_cc_exp) + '" />&nbsp;&nbsp;&nbsp;';
    sOut += '       CVC #&nbsp;<input id="cust_cc_cvc" name="cust_cc_cvc" type="text" size="3" class="  editMyDetails" item="' + data.id + '" value="' + unescape(data.cust_cc_cvc) + '" />';
    sOut += '    </div>';
    sOut += '    <div class="comments">';
    sOut += '     Comments<br /><textarea id="comments" item="' + data.id + '" rows="3" cols="140">' + unescape(data.comments) + '</textarea>';
    sOut += '    </div>';
    sOut += '    <div class="order_details_footer">&nbsp;</div>';

    return sOut;
}


/*********************************************************
 *      Misc helper functions
 *
 ********************************************************/
/* show number of new orders */
/*
function getNewOrderNum() {
    $.get("order_num.php", function(data){
        $("span#newOrdersNumber").html(data);
        if (data > 0){
          $("#showNewOrders").animate({"background-color": "#ffff00"}, 2000);
        }
        //alert("New Orders: " + data);
        //return isNaN(data) ? 0 : data;
    });
}
*/

function fetchDetails(order_id)
{
    $.getJSON("orderDetail.php",
    {
        id: order_id
    },

    function (data)
    {
        var details = formatDetails(data);
        $("tr#details_" + order_id + " > td").html(details);
    });
}

/* Recalculate the total amount in special-order-form.html */
function recalculateTotalAmount()
{
    var item1total = isNanMe(parseFloat($("#item_1_total").val()));
    var item2total = isNanMe(parseFloat($("#item_2_total").val()));
    var item3total = isNanMe(parseFloat($("#item_3_total").val()));
    var item4total = isNanMe(parseFloat($("#item_4_total").val()));
    var item5total = isNanMe(parseFloat($("#item_5_total").val()));
    var shippingCharge = isNanMe(parseFloat($("#shipping_charge").val()));
    var subTotal = item1total + item2total + item3total + item4total + item5total;

    var tax = roundMe(subTotal * $("span#taxRateLabel").text() / 100, 2);
    $("#tax").val(tax);
    var totalAmount = roundMe(subTotal + tax + shippingCharge, 2);

    $("#total_charge").val(totalAmount);
}

/* Update Tax field label */
function taxRate()
{
    var x = document.getElementById("store");
    var tax_rate = x.options[x.selectedIndex].title;
    $("span#taxRateLabel").text(tax_rate);
}

/* Set the shipping method */
function shipType(string)
{
    $("#ship_type").val(string);
}

/* Math.round() and isNan() facility */
function roundMe(number, decimal)
{
    decimal = Math.pow(10, decimal);
    result = Math.round(number * decimal) / decimal;
    return isNaN(result) ? 0 : result;
}

function isNanMe(number)
{
    return (isNaN(number) ? 0 : number);
}

/* clearForm */
$.fn.clearForm = function ()
{
    return this.each(function ()
    {
        var type = this.type,
            tag = this.tagName.toLowerCase();
        if (tag == "form") return $(":input", this).clearForm();
        if (type == "text" || type == "password" || tag == "textarea") this.value = "";
        else if (type == "checkbox" || type == "radio") this.checked = false;
        else if (tag == "select") this.selectedIndex = -1;
    });
};

/* C  */
function doNext(el)
{
    if (el.value.length < el.getAttribute("maxlength")) return;

    var f = el.form;
    var els = f.elements;
    var x, nextEl;
    for (var i = 0, len = els.length; i < len; i++)
    {
        x = els[i];
        if (el == x && (nextEl = els[i + 1]))
        {
            if (nextEl.focus) nextEl.focus();
        }
    }
}
