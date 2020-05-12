@extends('layouts.dbf')

@section('content')


	
	<script type="text/javascript">
	// live clock
	var clock_tick = function clock_tick() {
		setInterval('update_clock();', 1000);
	}

	// start the clock immediatly
	clock_tick();

	var update_clock = function update_clock() {
		document.getElementById('liveclock').innerHTML = moment().format("DD/MM/YYYY hh:mm:ss A");
	}

	$.notifyDefaults({ placement: {
		align: 'center',
		from: 'bottom'
	}});

	var post = $.post;

	var csrf_token = function() {
		return Cookies.get('csrf_cookie_ospos_v3');
	};

	var csrf_form_base = function() {
		return { csrf_ospos_v3 : function () { return csrf_token();  } };
	};

	$.post = function() {
		arguments[1] = csrf_token() ? $.extend(arguments[1], csrf_form_base()) : arguments[1];
		post.apply(this, arguments);
	};

	var setup_csrf_token = function() {
		$('input[name="csrf_ospos_v3"]').val(csrf_token());
	};

	setup_csrf_token();

	$.ajaxSetup({
		dataFilter: function(data) {
			setup_csrf_token();
			return data;
		}
	});

	var submit = $.fn.submit;

	$.fn.submit = function() {
		setup_csrf_token();
		submit.apply(this, arguments);
	};

</script>
	<script type="text/javascript">
(function(lang, $) {

    var lines = {
        'common_submit' : "Submit",
        'common_close' : "Close"
    };

    $.extend(lang, {
        line: function(key) {
            return lines[key];
        }
    });


})(window.lang = window.lang || {}, jQuery);
</script>
	<style type="text/css">
		html {
			overflow: auto;
		}
	</style>
<div class="container">
		<div class="row">

<script type="text/javascript">
$(document).ready(function()
{
    $('#generate_barcodes').click(function()
    {
        window.open(
            'index.php/items/generate_barcodes/'+table_support.selected_ids().join(':'),
            '_blank' // <- This is what makes it open in a new window.
        );
    });

    dialog_support.init("a.modal-dlg, button.modal-dlg-wide");
	
	// when any filter is clicked and the dropdown window is closed
	// $('#filters').on('hidden.bs.select', function(e)
	// {
 //    table_support.refresh();
 //  });

 	$(document).ready( function () {
    	$('#table1').DataTable({
    		 "lengthMenu": [[25, 50, -1], [10, 25, 50, "All"]],
    		'bJQueryUI': true,
    		'bAutoWidth': false,
    		'bSortClasses': false,
    		"bPaginate": true,
        	"bFilter": false,
        	dom: 'Bfrtip',
	        order: [[0, 'desc']],
	        buttons: [
	          'copy', 'csv', 'excel', 'pdf', 'print'
	        ]
        	        	,"columnDefs": [ {
				"targets": 0,
				"orderable": false
			} ]
		        });
	});
});
</script>
</div>
<div class="container-fluid">
	<div id="title_bar" class="btn-toolbar print_hide">

	
		<button class="btn btn-info btn-sm pull-right modal-dlg" data-btn-submit="Submit" data-href="http://newpos.dbfindia.com/items/excel_stock_up" title="Item Update from Excel">
				<span class="glyphicon glyphicon-import">&nbsp;</span>Excel Update		</button>

		<button class="btn btn-info btn-sm pull-right modal-dlg" data-btn-submit="Submit" data-href="http://newpos.dbfindia.com/items/excel_import" title="Item Import from Excel">
				<span class="glyphicon glyphicon-import">&nbsp;</span>Excel Import		</button>

		<button class="btn btn-info btn-sm pull-right modal-dlg" data-btn-new="New" data-btn-submit="Submit" data-href="http://newpos.dbfindia.com/items/view" title="New Item">
				<span class="glyphicon glyphicon-tag">&nbsp;</span>New Item		</button>
	    
					
			<button disabled="true" id="delete" class="btn btn-default btn-sm print_hide">
					<span class="glyphicon glyphicon-trash">&nbsp;</span>Delete			</button>
		   
		<button disabled="true" id="bulk_edit" class="btn btn-default btn-sm modal-dlg print_hide" ,="" data-btn-submit="Submit" data-href="http://newpos.dbfindia.com/items/bulk_edit" title="Editing Multiple Items">
				<span class="glyphicon glyphicon-edit">&nbsp;</span>Bulk Edit		</button>

		
		<button class="btn btn-info btn-sm pull-right" id="filter_data_btn">Get Items</button>

	</div>

	<div id="toolbar">
	    <div class="form-inline" role="toolbar">
			<div class="btn-group bootstrap-select show-tick show-menu-arrow fit-width"><button type="button" class="btn dropdown-toggle bs-placeholder btn-default btn-sm" data-toggle="dropdown" role="button" data-id="filters" title="Nothing selected."><span class="filter-option pull-left">Nothing selected.</span>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu open" role="combobox"><ul class="dropdown-menu inner" role="listbox" aria-expanded="false"><li data-original-index="0"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Empty Barcode Items</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="1"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Out Of Stock Items</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="2"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Serialized Items</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="3"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">No Description Items</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="4"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Search Custom Items</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="5"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Deleted</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li></ul></div><select name="filters[]" id="filters" class="selectpicker show-menu-arrow" data-none-selected-text="Nothing selected." data-selected-text-format="count > 1" data-style="btn-default btn-sm" data-width="fit" multiple="multiple" tabindex="-98">
<option value="empty_upc">Empty Barcode Items</option>
<option value="low_inventory">Out Of Stock Items</option>
<option value="is_serialized">Serialized Items</option>
<option value="no_description">No Description Items</option>
<option value="search_custom">Search Custom Items</option>
<option value="is_deleted">Deleted</option>
</select></div>
			<select name="stock_location" id="stock_location" class="select2-hidden-accessible" tabindex="-1" aria-hidden="true">
<option value="4" selected="selected">LaxyoHouse</option>
<option value="6">Indraprastha</option>
<option value="8">Annapurna</option>
<option value="11">Mahalaxmi</option>
<option value="13">Ratlam</option>
<option value="16">Bapat</option>
<option value="20">Shop114</option>
<option value="22">AirportRoad</option>
<option value="27">NewArrival</option>
<option value="28">Unchecked</option>
<option value="29">Damaged</option>
<option value="30">Scrap</option>
</select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 109px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-stock_location-container"><span class="select2-selection__rendered" id="select2-stock_location-container" title="LaxyoHouse">LaxyoHouse</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
						<div class="btn-group bootstrap-select filter_categories show-menu-arrow select2-hidden-accessible" style="width: 12%;"><button type="button" class="btn dropdown-toggle btn-default btn-sm" data-toggle="dropdown" role="button" data-id="cat_id" tabindex="-1" title="Category.."><span class="filter-option pull-left">Category..</span>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu open" role="combobox"><ul class="dropdown-menu inner" role="listbox" aria-expanded="false"><li data-original-index="0" class="selected"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="true"><span class="text">Category..</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="1"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">ACCESSORIES</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="2"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">BABY CARE</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="3"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">BAG</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="4"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">BOOKS</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="5"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">COSMETICS AND BEAUTY</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="6"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">ELECTRONICS</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="7"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">FRAGRANCES</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="8"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">GAMING DEVIS</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="9"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">GIFT</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="10"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">GROCERY</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="11"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">HEADPHONE</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="12"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">HOME AND KITCHEN APPLIANCES</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="13"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">HOUSEHOLD</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="14"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">IT</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="15"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">JEWELLERY</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="16"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">KID'S CLOTHING</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="17"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">KID'S FOOTWEAR</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="18"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">LIFE STYLE</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="19"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">LUGGAGE</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="20"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">MEDICAL</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="21"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">MEN'S CLOTHING</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="22"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">MEN'S FOOTWEAR</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="23"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">OPTICS</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="24"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">OTHERS</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="25"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">PHN</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="26"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">SAMPLE</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="27"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">SPEAKERS</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="28"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">SPL OFFER</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="29"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">SPORTS AND FITNESS</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="30"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">STATIONERY AND OFFICE SUPPLY</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="31"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">TOYS</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="32"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">UNISEX WEARABLES</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="33"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">UNKNOWN</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="34"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">WATCHES</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="35"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">WOMEN'S CLOTHING</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="36"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">WOMEN'S FOOTWEAR</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li></ul></div><select id="cat_id" style="max-width: 134px;" data-width="12%" class="filter_categories selectpicker show-menu-arrow select2-hidden-accessible" data-style="btn-default btn-sm" tabindex="-98" aria-hidden="true">
				<option>Category..</option>
										<option value="26">ACCESSORIES</option>
									<option value="12">BABY CARE</option>
									<option value="23">BAG</option>
									<option value="30">BOOKS</option>
									<option value="15">COSMETICS AND BEAUTY</option>
									<option value="3">ELECTRONICS</option>
									<option value="18">FRAGRANCES</option>
									<option value="50">GAMING DEVIS</option>
									<option value="31">GIFT</option>
									<option value="21">GROCERY</option>
									<option value="4">HEADPHONE</option>
									<option value="14">HOME AND KITCHEN APPLIANCES</option>
									<option value="13">HOUSEHOLD</option>
									<option value="1">IT</option>
									<option value="28">JEWELLERY</option>
									<option value="9">KID'S CLOTHING</option>
									<option value="10">KID'S FOOTWEAR</option>
									<option value="16">LIFE STYLE</option>
									<option value="27">LUGGAGE</option>
									<option value="24">MEDICAL</option>
									<option value="5">MEN'S CLOTHING</option>
									<option value="6">MEN'S FOOTWEAR</option>
									<option value="17">OPTICS</option>
									<option value="98">OTHERS</option>
									<option value="25">PHN</option>
									<option value="97">SAMPLE</option>
									<option value="2">SPEAKERS</option>
									<option value="95">SPL OFFER</option>
									<option value="20">SPORTS AND FITNESS</option>
									<option value="29">STATIONERY AND OFFICE SUPPLY</option>
									<option value="11">TOYS</option>
									<option value="32">UNISEX WEARABLES</option>
									<option value="99">UNKNOWN</option>
									<option value="19">WATCHES</option>
									<option value="7">WOMEN'S CLOTHING</option>
									<option value="8">WOMEN'S FOOTWEAR</option>
						</select></div><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 12%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-cat_id-container"><span class="select2-selection__rendered" id="select2-cat_id-container" title="Category..">Category..</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>

			<select data-width="12%" id="sub_cat" class="show-menu-arrow  select2-hidden-accessible" data-style="btn-default btn-sm" style="background-color: #fff; color: #000;border: 2px solid #dce4ec;padding-bottom: 8px;padding-top: 5px;border-radius: 3px; max-width: 140px;" tabindex="-1" aria-hidden="true">
				<option>Subcategorie..</option>
			</select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 12%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-sub_cat-container"><span class="select2-selection__rendered" id="select2-sub_cat-container" title="Subcategorie..">Subcategorie..</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>

			<select style="max-width: 145px!imortant;" id="brand_id" class="select2-hidden-accessible" tabindex="-1" aria-hidden="true">
				<option>Brand..</option>
										<option value=""></option>
									<option value="10.0R">10.0R</option>
									<option value="18 FIRE">18 FIRE</option>
									<option value="19 SIXTY 6">19 SIXTY 6</option>
									<option value="24 MANTRA ORGANIC">24 MANTRA ORGANIC</option>
									<option value="3 MAD CHICKS">3 MAD CHICKS</option>
									<option value="3.1 CHANNEL">3.1 CHANNEL</option>
									<option value="3M">3M</option>
									<option value="47 MAPLE">47 MAPLE</option>
									<option value="612 LEAGUE">612 LEAGUE</option>
									<option value="9 FOUNTAINS">9 FOUNTAINS</option>
									<option value="A">A</option>
									<option value="A MITASHI">A MITASHI</option>
									<option value="AABOLI">AABOLI</option>
									<option value="AAKRTI">AAKRTI</option>
									<option value="AARIKA">AARIKA</option>
									<option value="AARVI">AARVI</option>
									<option value="AB ROLLER">AB ROLLER</option>
									<option value="ABBY BEAR">ABBY BEAR</option>
									<option value="ABIDANCE">ABIDANCE</option>
									<option value="ACCESSORIZE">ACCESSORIZE</option>
									<option value="ACER">ACER</option>
									<option value="ACRO">ACRO</option>
									<option value="ACT II">ACT II</option>
									<option value="ACTION">ACTION</option>
									<option value="AD &amp; AV">AD &amp; AV</option>
									<option value="ADAM">ADAM</option>
									<option value="ADAMIS">ADAMIS</option>
									<option value="ADATA">ADATA</option>
									<option value="ADDICTIVE FASHION">ADDICTIVE FASHION</option>
									<option value="ADDONS">ADDONS</option>
									<option value="ADDYVERO">ADDYVERO</option>
									<option value="ADIDAS">ADIDAS</option>
									<option value="ADIVA">ADIVA</option>
									<option value="ADONAI">ADONAI</option>
									<option value="ADONIT">ADONIT</option>
									<option value="ADVANCE">ADVANCE</option>
									<option value="AERIAL7">AERIAL7</option>
									<option value="AERO">AERO</option>
									<option value="AEROPOSTALE">AEROPOSTALE</option>
									<option value="AEROPOSTLA">AEROPOSTLA</option>
									<option value="AEROSMITH">AEROSMITH</option>
									<option value="AESHA">AESHA</option>
									<option value="AGARO">AGARO</option>
									<option value="AGRIPRO">AGRIPRO</option>
									<option value="AIPTEK">AIPTEK</option>
									<option value="AIR CASE">AIR CASE</option>
									<option value="AIRTEL">AIRTEL</option>
									<option value="AIRWALK">AIRWALK</option>
									<option value="AIVA">AIVA</option>
									<option value="AJ DEZINES">AJ DEZINES</option>
									<option value="AJANTA">AJANTA</option>
									<option value="AJILE">AJILE</option>
									<option value="AJILE BY PANTALOONS">AJILE BY PANTALOONS</option>
									<option value="AKAI">AKAI</option>
									<option value="AKG">AKG</option>
									<option value="AKKRITI">AKKRITI</option>
									<option value="AKKRITI BY PANTALOONS">AKKRITI BY PANTALOONS</option>
									<option value="AKS">AKS</option>
									<option value="ALANO">ALANO</option>
									<option value="ALCOTT">ALCOTT</option>
									<option value="ALDO">ALDO</option>
									<option value="ALESIS">ALESIS</option>
									<option value="ALESSIA">ALESSIA</option>
									<option value="ALFA">ALFA</option>
									<option value="ALIBI">ALIBI</option>
									<option value="ALIEP">ALIEP</option>
									<option value="ALIVE">ALIVE</option>
									<option value="ALL PAWS ON DECK">ALL PAWS ON DECK</option>
									<option value="ALL STAR">ALL STAR</option>
									<option value="ALLEN COOPER">ALLEN COOPER</option>
									<option value="ALLEN SOLLY">ALLEN SOLLY</option>
									<option value="ALPINO">ALPINO</option>
									<option value="ALTEC LANSING">ALTEC LANSING</option>
									<option value="ALTO MODA BY PANTALOONS">ALTO MODA BY PANTALOONS</option>
									<option value="AMADORE">AMADORE</option>
									<option value="AMANTE">AMANTE</option>
									<option value="AMARDEEP">AMARDEEP</option>
									<option value="AMARI WASI">AMARI WASI</option>
									<option value="AMARI WEST">AMARI WEST</option>
									<option value="AMBIPUR">AMBIPUR</option>
									<option value="AMBRANE">AMBRANE</option>
									<option value="AMBRO">AMBRO</option>
									<option value="AMDUES">AMDUES</option>
									<option value="AMERICAL SHAN">AMERICAL SHAN</option>
									<option value="AMERICAN CREW">AMERICAN CREW</option>
									<option value="AMERICAN EAGLE">AMERICAN EAGLE</option>
									<option value="AMERICAN EAGLE OUTFITTERS">AMERICAN EAGLE OUTFITTERS</option>
									<option value="AMERICAN GARDEN">AMERICAN GARDEN</option>
									<option value="AMERICAN RAG">AMERICAN RAG</option>
									<option value="AMERICAN SWAN">AMERICAN SWAN</option>
									<option value="AMERICAN TOURISTER">AMERICAN TOURISTER</option>
									<option value="AMIGO">AMIGO</option>
									<option value="AMIRAJ">AMIRAJ</option>
									<option value="AMKETTE">AMKETTE</option>
									<option value="AMOGHA">AMOGHA</option>
									<option value="AMPM">AMPM</option>
									<option value="AMZER">AMZER</option>
									<option value="ANAHI">ANAHI</option>
									<option value="AND">AND</option>
									<option value="ANDIS">ANDIS</option>
									<option value="ANDREW SCOTT">ANDREW SCOTT</option>
									<option value="ANGELO LITRICO">ANGELO LITRICO</option>
									<option value="ANGELS">ANGELS</option>
									<option value="ANGRY BIRDS">ANGRY BIRDS</option>
									<option value="ANIMAL KINGDOM">ANIMAL KINGDOM</option>
									<option value="ANJALI">ANJALI</option>
									<option value="ANKER">ANKER</option>
									<option value="ANKSH">ANKSH</option>
									<option value="ANMI">ANMI</option>
									<option value="ANN SPRINGS">ANN SPRINGS</option>
									<option value="ANNABELLE BY PANTALOONS">ANNABELLE BY PANTALOONS</option>
									<option value="ANT">ANT</option>
									<option value="ANTIQUES">ANTIQUES</option>
									<option value="AOC">AOC</option>
									<option value="APC">APC</option>
									<option value="APC SCHNEIDER">APC SCHNEIDER</option>
									<option value="APEX HEAT">APEX HEAT</option>
									<option value="APNAGPS">APNAGPS</option>
									<option value="APPLE">APPLE</option>
									<option value="AQUA REAL">AQUA REAL</option>
									<option value="AQUAFEAX">AQUAFEAX</option>
									<option value="AQUASURE">AQUASURE</option>
									<option value="ARCHIE'S">ARCHIE'S</option>
									<option value="ARCTIC">ARCTIC</option>
									<option value="ARENA">ARENA</option>
									<option value="ARIEL">ARIEL</option>
									<option value="ARISTO">ARISTO</option>
									<option value="ARISTOCRAT">ARISTOCRAT</option>
									<option value="ARIZONA">ARIZONA</option>
									<option value="ARMANI">ARMANI</option>
									<option value="AROMA">AROMA</option>
									<option value="ARROW">ARROW</option>
									<option value="ARROW SPORT">ARROW SPORT</option>
									<option value="ARTENGO">ARTENGO</option>
									<option value="ARTIS">ARTIS</option>
									<option value="ARYCA">ARYCA</option>
									<option value="ASCENT">ASCENT</option>
									<option value="ASCOT">ASCOT</option>
									<option value="ASHWORTH">ASHWORTH</option>
									<option value="ASICS">ASICS</option>
									<option value="ASROCK">ASROCK</option>
									<option value="ASSASSIN'S">ASSASSIN'S</option>
									<option value="ASTITVA">ASTITVA</option>
									<option value="ASUS">ASUS</option>
									<option value="AT CYBER">AT CYBER</option>
									<option value="ATHENA">ATHENA</option>
									<option value="ATHLETECH">ATHLETECH</option>
									<option value="ATIREL">ATIREL</option>
									<option value="ATLAS FOR MEN">ATLAS FOR MEN</option>
									<option value="ATMOSPHERE">ATMOSPHERE</option>
									<option value="ATRI">ATRI</option>
									<option value="ATTITUDE">ATTITUDE</option>
									<option value="ATTRACTIVE">ATTRACTIVE</option>
									<option value="AUBERGINE">AUBERGINE</option>
									<option value="AUBUR HILL">AUBUR HILL</option>
									<option value="AUBURN HILLS">AUBURN HILLS</option>
									<option value="AUDIO TECHNICA">AUDIO TECHNICA</option>
									<option value="AURELIA">AURELIA</option>
									<option value="AURORA">AURORA</option>
									<option value="AUSTRALIAN TOURISTER">AUSTRALIAN TOURISTER</option>
									<option value="AUTHENTIC">AUTHENTIC</option>
									<option value="AVENGERS">AVENGERS</option>
									<option value="AVER MEDIA">AVER MEDIA</option>
									<option value="AVIRAT">AVIRAT</option>
									<option value="AVIRATE">AVIRATE</option>
									<option value="AVM">AVM</option>
									<option value="AVNI">AVNI</option>
									<option value="AWESOME WORLD">AWESOME WORLD</option>
									<option value="AYAANY">AYAANY</option>
									<option value="AZZURRO">AZZURRO</option>
									<option value="B NATURAL">B NATURAL</option>
									<option value="B-SPEECH">B-SPEECH</option>
									<option value="BABOLAR">BABOLAR</option>
									<option value="BABOLAT">BABOLAT</option>
									<option value="BABY BRUSH">BABY BRUSH</option>
									<option value="BABY K'TAN">BABY K'TAN</option>
									<option value="BABY LEAGUE">BABY LEAGUE</option>
									<option value="BABY MARK">BABY MARK</option>
									<option value="BABY MORI SONS">BABY MORI SONS</option>
									<option value="BABY TENT">BABY TENT</option>
									<option value="BABYBED">BABYBED</option>
									<option value="BABYLISS">BABYLISS</option>
									<option value="BABYLON">BABYLON</option>
									<option value="BACCA BUCCI">BACCA BUCCI</option>
									<option value="BAGGIT">BAGGIT</option>
									<option value="BAISLEI">BAISLEI</option>
									<option value="BAJAJ">BAJAJ</option>
									<option value="BALADE">BALADE</option>
									<option value="BALTRA">BALTRA</option>
									<option value="BALZANO">BALZANO</option>
									<option value="BARBIE">BARBIE</option>
									<option value="BARBIE">BARBIE</option>
									<option value="BARE DENIM">BARE DENIM</option>
									<option value="BARF">BARF</option>
									<option value="BARRINGTON HILLS">BARRINGTON HILLS</option>
									<option value="BARUN">BARUN</option>
									<option value="BAS">BAS</option>
									<option value="BASICARE">BASICARE</option>
									<option value="BASICS">BASICS</option>
									<option value="BATA">BATA</option>
									<option value="BATHLA">BATHLA</option>
									<option value="BATMAN">BATMAN</option>
									<option value="BAULI">BAULI</option>
									<option value="BAYWATCH">BAYWATCH</option>
									<option value="BB">BB</option>
									<option value="BBLUNT">BBLUNT</option>
									<option value="BC BG">BC BG</option>
									<option value="BE FOR BAG">BE FOR BAG</option>
									<option value="BEATS">BEATS</option>
									<option value="BEBE">BEBE</option>
									<option value="BEETEL">BEETEL</option>
									<option value="BEHIND PINK">BEHIND PINK</option>
									<option value="BEING FAB">BEING FAB</option>
									<option value="BEING HUMAN">BEING HUMAN</option>
									<option value="BELIEF">BELIEF</option>
									<option value="BELKIN">BELKIN</option>
									<option value="BELLA">BELLA</option>
									<option value="BELLA MODA">BELLA MODA</option>
									<option value="BELLE FILLE">BELLE FILLE</option>
									<option value="BELLFEILD">BELLFEILD</option>
									<option value="BELMONTE">BELMONTE</option>
									<option value="BEN10">BEN10</option>
									<option value="BENDLY">BENDLY</option>
									<option value="BENETTON">BENETTON</option>
									<option value="BENHUESE">BENHUESE</option>
									<option value="BENQ">BENQ</option>
									<option value="BERN">BERN</option>
									<option value="BERRYPECKER">BERRYPECKER</option>
									<option value="BERSACHE">BERSACHE</option>
									<option value="BERSHKA">BERSHKA</option>
									<option value="BEST ONE">BEST ONE</option>
									<option value="BEST WAY">BEST WAY</option>
									<option value="BESTNET">BESTNET</option>
									<option value="BETEL NUT">BETEL NUT</option>
									<option value="BEVERLY">BEVERLY</option>
									<option value="BEVERLY HILLS">BEVERLY HILLS</option>
									<option value="BEYERDYNAMIC">BEYERDYNAMIC</option>
									<option value="BEYOND PINK">BEYOND PINK</option>
									<option value="BEYOUTY">BEYOUTY</option>
									<option value="BHEEM">BHEEM</option>
									<option value="BHPC">BHPC</option>
									<option value="BIAGGIO">BIAGGIO</option>
									<option value="BIBA">BIBA</option>
									<option value="BIBI">BIBI</option>
									<option value="BIG BOSS">BIG BOSS</option>
									<option value="BIGGIE">BIGGIE</option>
									<option value="BIKANO">BIKANO</option>
									<option value="BIKE OIL">BIKE OIL</option>
									<option value="BILLION">BILLION</option>
									<option value="BIOTIQUE">BIOTIQUE</option>
									<option value="BIRLA">BIRLA</option>
									<option value="BITTERLIME">BITTERLIME</option>
									<option value="BIZZBEE">BIZZBEE</option>
									<option value="BLACK &amp; DECKER">BLACK &amp; DECKER</option>
									<option value="BLACK COFFEE">BLACK COFFEE</option>
									<option value="BLACK GUCCI">BLACK GUCCI</option>
									<option value="BLACK N DECKER">BLACK N DECKER</option>
									<option value="BLACK PANTHER">BLACK PANTHER</option>
									<option value="BLACK RIDER">BLACK RIDER</option>
									<option value="BLACKBERRYS">BLACKBERRYS</option>
									<option value="BLACKSMITH">BLACKSMITH</option>
									<option value="BLAUPUNKT">BLAUPUNKT</option>
									<option value="BLESSED GOLD">BLESSED GOLD</option>
									<option value="BLISS">BLISS</option>
									<option value="BLOCKS">BLOCKS</option>
									<option value="BLUE DEO">BLUE DEO</option>
									<option value="BLUE LABEL">BLUE LABEL</option>
									<option value="BLUE MORPHO">BLUE MORPHO</option>
									<option value="BLUE STONE">BLUE STONE</option>
									<option value="BLYNK">BLYNK</option>
									<option value="BOARD">BOARD</option>
									<option value="BOAT">BOAT</option>
									<option value="BODY BASICS">BODY BASICS</option>
									<option value="BODY CARE">BODY CARE</option>
									<option value="BODY CHARGER">BODY CHARGER</option>
									<option value="BODY PLUS">BODY PLUS</option>
									<option value="BODY SCULPTURE">BODY SCULPTURE</option>
									<option value="BOGESI">BOGESI</option>
									<option value="BOHO">BOHO</option>
									<option value="BOLD">BOLD</option>
									<option value="BOMBAY DYEING">BOMBAY DYEING</option>
									<option value="BON BLEW">BON BLEW</option>
									<option value="BONDS MAN">BONDS MAN</option>
									<option value="BONJOUR">BONJOUR</option>
									<option value="BOOBS &amp; BLOOMERS">BOOBS &amp; BLOOMERS</option>
									<option value="BOOHOO">BOOHOO</option>
									<option value="BOOK">BOOK</option>
									<option value="BOOSTER SEAT">BOOSTER SEAT</option>
									<option value="BORGES">BORGES</option>
									<option value="BORN BLUE">BORN BLUE</option>
									<option value="BORN STAR">BORN STAR</option>
									<option value="BOSCH">BOSCH</option>
									<option value="BOSE">BOSE</option>
									<option value="BOSS">BOSS</option>
									<option value="BOSS ORANGE">BOSS ORANGE</option>
									<option value="BOSSINI">BOSSINI</option>
									<option value="BOXER">BOXER</option>
									<option value="BRANDED">BRANDED</option>
									<option value="BRAU">BRAU</option>
									<option value="BRAUN">BRAUN</option>
									<option value="BRAVADO">BRAVADO</option>
									<option value="BRAVE SOUL">BRAVE SOUL</option>
									<option value="BREAK BOUNCE">BREAK BOUNCE</option>
									<option value="BREAKBOUNCE">BREAKBOUNCE</option>
									<option value="BREEZE">BREEZE</option>
									<option value="BREIL">BREIL</option>
									<option value="BREMED">BREMED</option>
									<option value="BRIEL">BRIEL</option>
									<option value="BRINK">BRINK</option>
									<option value="BRITANNIA">BRITANNIA</option>
									<option value="BROADSTAR">BROADSTAR</option>
									<option value="BROOK STREET">BROOK STREET</option>
									<option value="BROOKLYN BLUES">BROOKLYN BLUES</option>
									<option value="BROOKS BROTHERS">BROOKS BROTHERS</option>
									<option value="BROZIL">BROZIL</option>
									<option value="BRUSTO">BRUSTO</option>
									<option value="BRUT">BRUT</option>
									<option value="BSI">BSI</option>
									<option value="BST">BST</option>
									<option value="BTR">BTR</option>
									<option value="BTWIN">BTWIN</option>
									<option value="BUBBLE">BUBBLE</option>
									<option value="BUBBLEGUMMERS">BUBBLEGUMMERS</option>
									<option value="BUCKKS">BUCKKS</option>
									<option value="BUFFALO">BUFFALO</option>
									<option value="BUKE">BUKE</option>
									<option value="BULCHEE">BULCHEE</option>
									<option value="BURN">BURN</option>
									<option value="BURN TIME">BURN TIME</option>
									<option value="BUTTERFLIES">BUTTERFLIES</option>
									<option value="BUTTERFLY">BUTTERFLY</option>
									<option value="CABLE MATTERS">CABLE MATTERS</option>
									<option value="CADBURY DAIRY MILK CRISPELLO">CADBURY DAIRY MILK CRISPELLO</option>
									<option value="CAINS STAR">CAINS STAR</option>
									<option value="CALL IT SPRING">CALL IT SPRING</option>
									<option value="CALL OF DUTY">CALL OF DUTY</option>
									<option value="CALLMATE">CALLMATE</option>
									<option value="CALVIN KLEIN">CALVIN KLEIN</option>
									<option value="CALVINO">CALVINO</option>
									<option value="CAMARO">CAMARO</option>
									<option value="CAMEL">CAMEL</option>
									<option value="CAMELBAK">CAMELBAK</option>
									<option value="CAMLIN">CAMLIN</option>
									<option value="CAMPUS">CAMPUS</option>
									<option value="CAMPUS SUTRA">CAMPUS SUTRA</option>
									<option value="CAN KIDS">CAN KIDS</option>
									<option value="CANDA">CANDA</option>
									<option value="CANDIE">CANDIE</option>
									<option value="CANON">CANON</option>
									<option value="CANVAS">CANVAS</option>
									<option value="CANVAS GRAFFITY">CANVAS GRAFFITY</option>
									<option value="CAPITEL">CAPITEL</option>
									<option value="CAPRESE">CAPRESE</option>
									<option value="CAPTAIN AMERICA">CAPTAIN AMERICA</option>
									<option value="CARA MIA">CARA MIA</option>
									<option value="CAREFU">CAREFU</option>
									<option value="CARLA BERROTI">CARLA BERROTI</option>
									<option value="CARLA MANCINI">CARLA MANCINI</option>
									<option value="CARLIE">CARLIE</option>
									<option value="CARLSON LIL TUFFY">CARLSON LIL TUFFY</option>
									<option value="CARLTON">CARLTON</option>
									<option value="CARLTON LONDON">CARLTON LONDON</option>
									<option value="CARTLON LONDON">CARTLON LONDON</option>
									<option value="CARTOON NETWORK">CARTOON NETWORK</option>
									<option value="CASA">CASA</option>
									<option value="CASIO">CASIO</option>
									<option value="CAT">CAT</option>
									<option value="CATCH">CATCH</option>
									<option value="CATERPILLAR">CATERPILLAR</option>
									<option value="CATWALK">CATWALK</option>
									<option value="CAYMAN">CAYMAN</option>
									<option value="CBRL">CBRL</option>
									<option value="CD">CD</option>
									<option value="CDYCE">CDYCE</option>
									<option value="CEDAR WOOD STATE">CEDAR WOOD STATE</option>
									<option value="CELESTECH">CELESTECH</option>
									<option value="CELIO">CELIO</option>
									<option value="CELLO">CELLO</option>
									<option value="CENTY">CENTY</option>
									<option value="CHADHA">CHADHA</option>
									<option value="CHALK">CHALK</option>
									<option value="CHALLENGER">CHALLENGER</option>
									<option value="CHAMPION">CHAMPION</option>
									<option value="CHEF ART">CHEF ART</option>
									<option value="CHEF PRO">CHEF PRO</option>
									<option value="CHEF'S BASKET">CHEF'S BASKET</option>
									<option value="CHEMISTRY">CHEMISTRY</option>
									<option value="CHEROKEE">CHEROKEE</option>
									<option value="CHEROKEE KIDS">CHEROKEE KIDS</option>
									<option value="CHERRY CRUMBLE">CHERRY CRUMBLE</option>
									<option value="CHEVRON">CHEVRON</option>
									<option value="CHHABRA 555">CHHABRA 555</option>
									<option value="CHHOTA BHEEM">CHHOTA BHEEM</option>
									<option value="CHICCO">CHICCO</option>
									<option value="CHICO RIDER">CHICO RIDER</option>
									<option value="CHINA">CHINA</option>
									<option value="CHOOSTIX">CHOOSTIX</option>
									<option value="CHRISTMAS WREATH">CHRISTMAS WREATH</option>
									<option value="CHRISTY WORLD">CHRISTY WORLD</option>
									<option value="CHROME">CHROME</option>
									<option value="CHROMOZOME">CHROMOZOME</option>
									<option value="CIRCULON">CIRCULON</option>
									<option value="CITIZEN">CITIZEN</option>
									<option value="CITRON">CITRON</option>
									<option value="CIVIL WAR">CIVIL WAR</option>
									<option value="CJC">CJC</option>
									<option value="CLAESEN'S">CLAESEN'S</option>
									<option value="CLARKS">CLARKS</option>
									<option value="CLARO">CLARO</option>
									<option value="CLASSIC">CLASSIC</option>
									<option value="CLASSIC POLO">CLASSIC POLO</option>
									<option value="CLASSMATE">CLASSMATE</option>
									<option value="CLAW">CLAW</option>
									<option value="CLEVA MAMA">CLEVA MAMA</option>
									<option value="CLING">CLING</option>
									<option value="CLO CLU">CLO CLU</option>
									<option value="CLOSELY LEVEL">CLOSELY LEVEL</option>
									<option value="CLOUD ALPHA">CLOUD ALPHA</option>
									<option value="CLUB 609">CLUB 609</option>
									<option value="CLUB AVIS">CLUB AVIS</option>
									<option value="CLUB YORK">CLUB YORK</option>
									<option value="CNC">CNC</option>
									<option value="COACH">COACH</option>
									<option value="COBY">COBY</option>
									<option value="CODAK">CODAK</option>
									<option value="CODE">CODE</option>
									<option value="COFFEE BEAN">COFFEE BEAN</option>
									<option value="COFFLER">COFFLER</option>
									<option value="COGENT SYSTEMS">COGENT SYSTEMS</option>
									<option value="COLGATE">COLGATE</option>
									<option value="COLIN">COLIN</option>
									<option value="COLLEGE">COLLEGE</option>
									<option value="COLOR BAR">COLOR BAR</option>
									<option value="COLORBAR">COLORBAR</option>
									<option value="COLORMODE">COLORMODE</option>
									<option value="COLOUR GUID">COLOUR GUID</option>
									<option value="COLT">COLT</option>
									<option value="COLUMBIA">COLUMBIA</option>
									<option value="COMBO">COMBO</option>
									<option value="COMFORT">COMFORT</option>
									<option value="COMFY">COMFY</option>
									<option value="COMIX">COMIX</option>
									<option value="COMPRESSOR NEBULIZER">COMPRESSOR NEBULIZER</option>
									<option value="CONTINENTAL">CONTINENTAL</option>
									<option value="CONVERSE">CONVERSE</option>
									<option value="CONVERSION">CONVERSION</option>
									<option value="COOKA">COOKA</option>
									<option value="COOKYSS">COOKYSS</option>
									<option value="COOL N COMFORT">COOL N COMFORT</option>
									<option value="COOLER MASTER">COOLER MASTER</option>
									<option value="COOLERS">COOLERS</option>
									<option value="COOLIN COOL">COOLIN COOL</option>
									<option value="CORESECA">CORESECA</option>
									<option value="CORIOLISS">CORIOLISS</option>
									<option value="CORNELIANI">CORNELIANI</option>
									<option value="CORNITOS">CORNITOS</option>
									<option value="CORSAIR">CORSAIR</option>
									<option value="CORSECA">CORSECA</option>
									<option value="CORTAN CURIO">CORTAN CURIO</option>
									<option value="COSCO">COSCO</option>
									<option value="COTOONS">COTOONS</option>
									<option value="COTTIN FAB">COTTIN FAB</option>
									<option value="COTTINFAB">COTTINFAB</option>
									<option value="COUGAR">COUGAR</option>
									<option value="COUSAG">COUSAG</option>
									<option value="COW BOYS">COW BOYS</option>
									<option value="COWON">COWON</option>
									<option value="COZY LITE">COZY LITE</option>
									<option value="CRAZEIS">CRAZEIS</option>
									<option value="CREASE &amp; CLIPS">CREASE &amp; CLIPS</option>
									<option value="CREATIVE">CREATIVE</option>
									<option value="CREATIVE'S">CREATIVE'S</option>
									<option value="CREMICA">CREMICA</option>
									<option value="CRESSI">CRESSI</option>
									<option value="CROCODILE">CROCODILE</option>
									<option value="CROCS">CROCS</option>
									<option value="CROMOZOME">CROMOZOME</option>
									<option value="CROMPTON">CROMPTON</option>
									<option value="CROSS">CROSS</option>
									<option value="CROSSCREEK">CROSSCREEK</option>
									<option value="CRUCIAL">CRUCIAL</option>
									<option value="CRUSOE">CRUSOE</option>
									<option value="CRYSTAL COLLECTION">CRYSTAL COLLECTION</option>
									<option value="CSK">CSK</option>
									<option value="CUCUMBER">CUCUMBER</option>
									<option value="CUFFLE">CUFFLE</option>
									<option value="CULTURE">CULTURE</option>
									<option value="CUP NOODLES">CUP NOODLES</option>
									<option value="CURIOZZ">CURIOZZ</option>
									<option value="CURRIOZZ">CURRIOZZ</option>
									<option value="CVOX">CVOX</option>
									<option value="CYBERPOWER">CYBERPOWER</option>
									<option value="CZAR">CZAR</option>
									<option value="D CARE">D CARE</option>
									<option value="D COT">D COT</option>
									<option value="D HOMES">D HOMES</option>
									<option value="D LINK">D LINK</option>
									<option value="D&amp;G">D&amp;G</option>
									<option value="D.LIGHT">D.LIGHT</option>
									<option value="DA MILANO">DA MILANO</option>
									<option value="DAADI'S">DAADI'S</option>
									<option value="DABUR">DABUR</option>
									<option value="DAKORE">DAKORE</option>
									<option value="DANIEL KLEIN">DANIEL KLEIN</option>
									<option value="DARZI">DARZI</option>
									<option value="DATAWIND">DATAWIND</option>
									<option value="DAVID JONES">DAVID JONES</option>
									<option value="DAWN OF JUSTICE">DAWN OF JUSTICE</option>
									<option value="DAY 2 DAY">DAY 2 DAY</option>
									<option value="DAZZGEAR">DAZZGEAR</option>
									<option value="DAZZLE COLOUR">DAZZLE COLOUR</option>
									<option value="DC">DC</option>
									<option value="DCC DELICIOUS">DCC DELICIOUS</option>
									<option value="DE CORE">DE CORE</option>
									<option value="DEAL">DEAL</option>
									<option value="DEAL JEANS">DEAL JEANS</option>
									<option value="DECALS DESIGN">DECALS DESIGN</option>
									<option value="DECATHLON">DECATHLON</option>
									<option value="DEE">DEE</option>
									<option value="DEEPCOOL">DEEPCOOL</option>
									<option value="DEFACTO">DEFACTO</option>
									<option value="DEGITEK">DEGITEK</option>
									<option value="DEGREE">DEGREE</option>
									<option value="DEKO">DEKO</option>
									<option value="DEL MONTE">DEL MONTE</option>
									<option value="DELL">DELL</option>
									<option value="DELONGHI">DELONGHI</option>
									<option value="DELSEY">DELSEY</option>
									<option value="DELSEY PARIS">DELSEY PARIS</option>
									<option value="DENIM">DENIM</option>
									<option value="DENIM JEANS">DENIM JEANS</option>
									<option value="DENIS MORTON">DENIS MORTON</option>
									<option value="DENIZEN">DENIZEN</option>
									<option value="DENON">DENON</option>
									<option value="DENSITY">DENSITY</option>
									<option value="DEPEND">DEPEND</option>
									<option value="DESI BELLE">DESI BELLE</option>
									<option value="DESIGN O VISTA">DESIGN O VISTA</option>
									<option value="DESIGNERS">DESIGNERS</option>
									<option value="DESIGUAL">DESIGUAL</option>
									<option value="DESK ORGANISER">DESK ORGANISER</option>
									<option value="DETTOL">DETTOL</option>
									<option value="DEUTER">DEUTER</option>
									<option value="DEVASTATOR">DEVASTATOR</option>
									<option value="DEZEN">DEZEN</option>
									<option value="DFNK">DFNK</option>
									<option value="DGNC">DGNC</option>
									<option value="DIAMOND">DIAMOND</option>
									<option value="DIANAKOR">DIANAKOR</option>
									<option value="DIANAKORR">DIANAKORR</option>
									<option value="DIESEL">DIESEL</option>
									<option value="DIGIFLIP">DIGIFLIP</option>
									<option value="DIGISOL">DIGISOL</option>
									<option value="DIKSHA">DIKSHA</option>
									<option value="DILBAHAR'S">DILBAHAR'S</option>
									<option value="DINE SMART">DINE SMART</option>
									<option value="DISNEP">DISNEP</option>
									<option value="DISNEY">DISNEY</option>
									<option value="DISTIL">DISTIL</option>
									<option value="DIU GOLD">DIU GOLD</option>
									<option value="DIVA">DIVA</option>
									<option value="DIVA LINE">DIVA LINE</option>
									<option value="DIVALINE">DIVALINE</option>
									<option value="DIVASTRI">DIVASTRI</option>
									<option value="DIVOOM">DIVOOM</option>
									<option value="DIXCY SCOTT">DIXCY SCOTT</option>
									<option value="DIYA">DIYA</option>
									<option value="DJC">DJC</option>
									<option value="DOLMIO">DOLMIO</option>
									<option value="DOLPHIN">DOLPHIN</option>
									<option value="DOMYOS">DOMYOS</option>
									<option value="DONE BY NONE">DONE BY NONE</option>
									<option value="DONNA &amp; DREW">DONNA &amp; DREW</option>
									<option value="DORA">DORA</option>
									<option value="DOREMON">DOREMON</option>
									<option value="DOUBLE HORSE">DOUBLE HORSE</option>
									<option value="DOUGH">DOUGH</option>
									<option value="DR. BATRA'S">DR. BATRA'S</option>
									<option value="DR. OETKER">DR. OETKER</option>
									<option value="DR. SCHOLLS">DR. SCHOLLS</option>
									<option value="DRAGON WAR">DRAGON WAR</option>
									<option value="DRAGONWAR">DRAGONWAR</option>
									<option value="DRAMA QUEEN">DRAMA QUEEN</option>
									<option value="DREAM ON">DREAM ON</option>
									<option value="DREEM ON">DREEM ON</option>
									<option value="DREMEL">DREMEL</option>
									<option value="DREMET">DREMET</option>
									<option value="DRESSBERRY">DRESSBERRY</option>
									<option value="DSC">DSC</option>
									<option value="DU PORT">DU PORT</option>
									<option value="DUBE">DUBE</option>
									<option value="DUCATI">DUCATI</option>
									<option value="DUKE">DUKE</option>
									<option value="DUKES">DUKES</option>
									<option value="DUNE LONDON">DUNE LONDON</option>
									<option value="DUNLOP">DUNLOP</option>
									<option value="DURA">DURA</option>
									<option value="DURACLIP">DURACLIP</option>
									<option value="DURAPACK">DURAPACK</option>
									<option value="DURAPLUS">DURAPLUS</option>
									<option value="DYNA CORP">DYNA CORP</option>
									<option value="DYNAMIC">DYNAMIC</option>
									<option value="DYNAMIC TECHNO MEDICALS">DYNAMIC TECHNO MEDICALS</option>
									<option value="DYNOMIGHTY">DYNOMIGHTY</option>
									<option value="E CLUB">E CLUB</option>
									<option value="E20">E20</option>
									<option value="E2O">E2O</option>
									<option value="EARTHEN ME">EARTHEN ME</option>
									<option value="EASIES">EASIES</option>
									<option value="EASTERN">EASTERN</option>
									<option value="EASY CARE">EASY CARE</option>
									<option value="EASY DAY">EASY DAY</option>
									<option value="EASY FIT">EASY FIT</option>
									<option value="EASY FRIENDS">EASY FRIENDS</option>
									<option value="ECO">ECO</option>
									<option value="ECOIFFIER">ECOIFFIER</option>
									<option value="ED CLUB">ED CLUB</option>
									<option value="ED HARDY">ED HARDY</option>
									<option value="EDGE">EDGE</option>
									<option value="EDIFIER">EDIFIER</option>
									<option value="EGATE">EGATE</option>
									<option value="EKLASSE">EKLASSE</option>
									<option value="ELAN">ELAN</option>
									<option value="ELECTRA PEACOCK">ELECTRA PEACOCK</option>
									<option value="ELEGANT">ELEGANT</option>
									<option value="ELEGANT EXPRESSIONS">ELEGANT EXPRESSIONS</option>
									<option value="ELEPANTS">ELEPANTS</option>
									<option value="ELIE">ELIE</option>
									<option value="ELITE">ELITE</option>
									<option value="ELIZABETH'S TAILLEUR">ELIZABETH'S TAILLEUR</option>
									<option value="ELLE">ELLE</option>
									<option value="ELLE KIDS">ELLE KIDS</option>
									<option value="ELNOVA">ELNOVA</option>
									<option value="EMOTION">EMOTION</option>
									<option value="EMPIRE">EMPIRE</option>
									<option value="ENAMOR">ENAMOR</option>
									<option value="ENCHANTEUR">ENCHANTEUR</option>
									<option value="ENERGY SISTEM">ENERGY SISTEM</option>
									<option value="ENTER">ENTER</option>
									<option value="ENVENT">ENVENT</option>
									<option value="EQUINOX">EQUINOX</option>
									<option value="ERKE">ERKE</option>
									<option value="ESBEDA">ESBEDA</option>
									<option value="ESCADA">ESCADA</option>
									<option value="ESPRIT">ESPRIT</option>
									<option value="ESSENTIALS">ESSENTIALS</option>
									<option value="ETA">ETA</option>
									<option value="ETHNICHE">ETHNICHE</option>
									<option value="ETI">ETI</option>
									<option value="ETIREL">ETIREL</option>
									<option value="EUREKA FORBES">EUREKA FORBES</option>
									<option value="EURIKA">EURIKA</option>
									<option value="EURO">EURO</option>
									<option value="EURO KIDS">EURO KIDS</option>
									<option value="EURO POWER">EURO POWER</option>
									<option value="EURO STYLE">EURO STYLE</option>
									<option value="EVA">EVA</option>
									<option value="EVEREADY">EVEREADY</option>
									<option value="EVEREST">EVEREST</option>
									<option value="EVERYBODY">EVERYBODY</option>
									<option value="EVI LOVE">EVI LOVE</option>
									<option value="EVIDEMCE">EVIDEMCE</option>
									<option value="EXCALIBUR LONDON">EXCALIBUR LONDON</option>
									<option value="F 21">F 21</option>
									<option value="F GEAR">F GEAR</option>
									<option value="F&amp;D">F&amp;D</option>
									<option value="F22">F22</option>
									<option value="F2OOO">F2OOO</option>
									<option value="FAB INDIYA">FAB INDIYA</option>
									<option value="FABALLEY">FABALLEY</option>
									<option value="FABELLE">FABELLE</option>
									<option value="FABER CASTELL">FABER CASTELL</option>
									<option value="FABINDIA">FABINDIA</option>
									<option value="FABTAG">FABTAG</option>
									<option value="FACIA">FACIA</option>
									<option value="FACTO POWER">FACTO POWER</option>
									<option value="FAMOZI">FAMOZI</option>
									<option value="FANNIE MAE DEES PARK">FANNIE MAE DEES PARK</option>
									<option value="FANTASY">FANTASY</option>
									<option value="FARENHEIT">FARENHEIT</option>
									<option value="FARLIN">FARLIN</option>
									<option value="FASHION">FASHION</option>
									<option value="FASHION COMFORTZ">FASHION COMFORTZ</option>
									<option value="FASHION STREET">FASHION STREET</option>
									<option value="FASHION STYLUS">FASHION STYLUS</option>
									<option value="FASHIONABLE">FASHIONABLE</option>
									<option value="FASHLY">FASHLY</option>
									<option value="FASTRACK">FASTRACK</option>
									<option value="FAULTLESS">FAULTLESS</option>
									<option value="FAUX LEATHER">FAUX LEATHER</option>
									<option value="FCB">FCB</option>
									<option value="FCJ">FCJ</option>
									<option value="FCUK">FCUK</option>
									<option value="FEB">FEB</option>
									<option value="FECIA">FECIA</option>
									<option value="FELLOWES">FELLOWES</option>
									<option value="FEM">FEM</option>
									<option value="FEMELLA">FEMELLA</option>
									<option value="FENDO">FENDO</option>
									<option value="FERRARI">FERRARI</option>
									<option value="FEVICRYL">FEVICRYL</option>
									<option value="FGEAR">FGEAR</option>
									<option value="FIAMINGO">FIAMINGO</option>
									<option value="FIDATO">FIDATO</option>
									<option value="FIFA">FIFA</option>
									<option value="FIFA WORLD CUP">FIFA WORLD CUP</option>
									<option value="FIG">FIG</option>
									<option value="FILA">FILA</option>
									<option value="FINIS">FINIS</option>
									<option value="FINISH">FINISH</option>
									<option value="FISHER">FISHER</option>
									<option value="FISHER PRICE">FISHER PRICE</option>
									<option value="FITCH BABY">FITCH BABY</option>
									<option value="FITTED">FITTED</option>
									<option value="FLAFOLEII">FLAFOLEII</option>
									<option value="FLAIR">FLAIR</option>
									<option value="FLAMINGO">FLAMINGO</option>
									<option value="FLAVOUR">FLAVOUR</option>
									<option value="FLEECE">FLEECE</option>
									<option value="FLIPCART">FLIPCART</option>
									<option value="FLIPKART">FLIPKART</option>
									<option value="FLIPKART SUPERMART SELECT">FLIPKART SUPERMART SELECT</option>
									<option value="FLIPPD">FLIPPD</option>
									<option value="FLIPPED">FLIPPED</option>
									<option value="FLITE">FLITE</option>
									<option value="FLLO">FLLO</option>
									<option value="FLOW">FLOW</option>
									<option value="FLU">FLU</option>
									<option value="FLU JEANS">FLU JEANS</option>
									<option value="FLUDE">FLUDE</option>
									<option value="FLUID">FLUID</option>
									<option value="FLY MEX">FLY MEX</option>
									<option value="FLYING MACHINE">FLYING MACHINE</option>
									<option value="FM">FM</option>
									<option value="FM BOYS">FM BOYS</option>
									<option value="FOCE">FOCE</option>
									<option value="FOLDING SCOOTER">FOLDING SCOOTER</option>
									<option value="FOLKLORE">FOLKLORE</option>
									<option value="FOLLISH">FOLLISH</option>
									<option value="FONT">FONT</option>
									<option value="FOOTFUN">FOOTFUN</option>
									<option value="FOOTILICIOUS">FOOTILICIOUS</option>
									<option value="FOOTIN">FOOTIN</option>
									<option value="FORCA">FORCA</option>
									<option value="FORCE 10">FORCE 10</option>
									<option value="FOREVER 21">FOREVER 21</option>
									<option value="FOREVER GLAM">FOREVER GLAM</option>
									<option value="FOREVER NEW">FOREVER NEW</option>
									<option value="FORT COLLINS">FORT COLLINS</option>
									<option value="FORTUNE">FORTUNE</option>
									<option value="FOSILL">FOSILL</option>
									<option value="FOSSIL">FOSSIL</option>
									<option value="FOSTELO">FOSTELO</option>
									<option value="FOUNTAIN">FOUNTAIN</option>
									<option value="FOURWALLS">FOURWALLS</option>
									<option value="FOX">FOX</option>
									<option value="FOXIN">FOXIN</option>
									<option value="FRAGILE">FRAGILE</option>
									<option value="FRANCO LEONE">FRANCO LEONE</option>
									<option value="FREE AUTHORITY">FREE AUTHORITY</option>
									<option value="FREE SOUL">FREE SOUL</option>
									<option value="FREECULTR">FREECULTR</option>
									<option value="FREEDOM">FREEDOM</option>
									<option value="FREEHAND">FREEHAND</option>
									<option value="FREELANCE">FREELANCE</option>
									<option value="FREELOOK">FREELOOK</option>
									<option value="FRENCH CONNECTION">FRENCH CONNECTION</option>
									<option value="FRIENDS">FRIENDS</option>
									<option value="FRONTECH">FRONTECH</option>
									<option value="FROZEN">FROZEN</option>
									<option value="FS MINI KLUB">FS MINI KLUB</option>
									<option value="FUME">FUME</option>
									<option value="FUN AND LEARNING">FUN AND LEARNING</option>
									<option value="FUN FOODS">FUN FOODS</option>
									<option value="FUN IN THE SUN">FUN IN THE SUN</option>
									<option value="FUN JEANS">FUN JEANS</option>
									<option value="FUNKEY TOWN">FUNKEY TOWN</option>
									<option value="FUNKY CHIC">FUNKY CHIC</option>
									<option value="FUNKY-ISH">FUNKY-ISH</option>
									<option value="FUNNY FAMILY">FUNNY FAMILY</option>
									<option value="FUNSKOOL">FUNSKOOL</option>
									<option value="FUNTIME">FUNTIME</option>
									<option value="FURIOUS">FURIOUS</option>
									<option value="FUTURA">FUTURA</option>
									<option value="G SHOCK">G SHOCK</option>
									<option value="G STAR">G STAR</option>
									<option value="G10">G10</option>
									<option value="GALA">GALA</option>
									<option value="GALAXY">GALAXY</option>
									<option value="GAMDIAS">GAMDIAS</option>
									<option value="GAME IN">GAME IN</option>
									<option value="GAMIDAS">GAMIDAS</option>
									<option value="GAMME">GAMME</option>
									<option value="GANT">GANT</option>
									<option value="GAP">GAP</option>
									<option value="GARFIELD">GARFIELD</option>
									<option value="GARMIN">GARMIN</option>
									<option value="GAS">GAS</option>
									<option value="GAUGE MACHINE">GAUGE MACHINE</option>
									<option value="GB">GB</option>
									<option value="GEAR">GEAR</option>
									<option value="GEARS OF WAR">GEARS OF WAR</option>
									<option value="GEEP">GEEP</option>
									<option value="GEISH DESIGNS">GEISH DESIGNS</option>
									<option value="GEISHA">GEISHA</option>
									<option value="GENERIC">GENERIC</option>
									<option value="GENESIS">GENESIS</option>
									<option value="GENIE">GENIE</option>
									<option value="GENIUS">GENIUS</option>
									<option value="GENUS">GENUS</option>
									<option value="GEOFFERY">GEOFFERY</option>
									<option value="GERUA">GERUA</option>
									<option value="GETWRAPED">GETWRAPED</option>
									<option value="GF GIRLS">GF GIRLS</option>
									<option value="GHPC">GHPC</option>
									<option value="GIGASET">GIGASET</option>
									<option value="GILI">GILI</option>
									<option value="GILLETTE">GILLETTE</option>
									<option value="GINCH GONCH">GINCH GONCH</option>
									<option value="GINI &amp; JONY">GINI &amp; JONY</option>
									<option value="GIORDANO">GIORDANO</option>
									<option value="GIRLFRIEND">GIRLFRIEND</option>
									<option value="GIRLS JEANS">GIRLS JEANS</option>
									<option value="GIRODANO">GIRODANO</option>
									<option value="GITS">GITS</option>
									<option value="GIZGA">GIZGA</option>
									<option value="GIZMOBITZ">GIZMOBITZ</option>
									<option value="GJ JEANS">GJ JEANS</option>
									<option value="GLADE">GLADE</option>
									<option value="GLEN">GLEN</option>
									<option value="GLIDERS">GLIDERS</option>
									<option value="GLOBAL DESI">GLOBAL DESI</option>
									<option value="GLOBAL NOMAD">GLOBAL NOMAD</option>
									<option value="GLOBALITE">GLOBALITE</option>
									<option value="GLOBUS">GLOBUS</option>
									<option value="GLUCK">GLUCK</option>
									<option value="GLUCON-D">GLUCON-D</option>
									<option value="GLUMAN">GLUMAN</option>
									<option value="GM">GM</option>
									<option value="GMI">GMI</option>
									<option value="GO">GO</option>
									<option value="GO COLOR">GO COLOR</option>
									<option value="GOBAHAMAS">GOBAHAMAS</option>
									<option value="GOLD COIN">GOLD COIN</option>
									<option value="GOLDSTAR">GOLDSTAR</option>
									<option value="GOOD DAY">GOOD DAY</option>
									<option value="GOOD NIGHT MOSQUITO">GOOD NIGHT MOSQUITO</option>
									<option value="GOOD THINGS">GOOD THINGS</option>
									<option value="GOODIEBAG">GOODIEBAG</option>
									<option value="GOODKNIGHT">GOODKNIGHT</option>
									<option value="GOSAN">GOSAN</option>
									<option value="GRACO">GRACO</option>
									<option value="GRAND BEAR">GRAND BEAR</option>
									<option value="GRAY-NICOLLS">GRAY-NICOLLS</option>
									<option value="GREASE">GREASE</option>
									<option value="GREAT MAN">GREAT MAN</option>
									<option value="GREAT NORTWEST">GREAT NORTWEST</option>
									<option value="GRITSTONES">GRITSTONES</option>
									<option value="GROGGY">GROGGY</option>
									<option value="GUESS">GUESS</option>
									<option value="GUILTY">GUILTY</option>
									<option value="GUNS N ROSES">GUNS N ROSES</option>
									<option value="H &amp; M">H &amp; M</option>
									<option value="HAKO">HAKO</option>
									<option value="HAMMER">HAMMER</option>
									<option value="HANCOCK">HANCOCK</option>
									<option value="HAND">HAND</option>
									<option value="HANDSOME">HANDSOME</option>
									<option value="HANES">HANES</option>
									<option value="HANGOUT">HANGOUT</option>
									<option value="HANGUP">HANGUP</option>
									<option value="HAPPILO">HAPPILO</option>
									<option value="HAPPILY UNMARRIED">HAPPILY UNMARRIED</option>
									<option value="HAPPY">HAPPY</option>
									<option value="HAPPY OLIVE">HAPPY OLIVE</option>
									<option value="HAPPY TIME">HAPPY TIME</option>
									<option value="HARMAN">HARMAN</option>
									<option value="HARMAN KARDON">HARMAN KARDON</option>
									<option value="HARP">HARP</option>
									<option value="HARPA">HARPA</option>
									<option value="HARPIC">HARPIC</option>
									<option value="HARRIS SMITH">HARRIS SMITH</option>
									<option value="HATIM">HATIM</option>
									<option value="HAV">HAV</option>
									<option value="HAVELLS">HAVELLS</option>
									<option value="HAVIT">HAVIT</option>
									<option value="HAVOC">HAVOC</option>
									<option value="HAWKINS">HAWKINS</option>
									<option value="HDA">HDA</option>
									<option value="HEAD">HEAD</option>
									<option value="HEADLY">HEADLY</option>
									<option value="HEALTH SENSE">HEALTH SENSE</option>
									<option value="HEART 2 HEART">HEART 2 HEART</option>
									<option value="HEART TO HEART">HEART TO HEART</option>
									<option value="HEART WAVE">HEART WAVE</option>
									<option value="HEAVY SPORTS">HEAVY SPORTS</option>
									<option value="HECHTER">HECHTER</option>
									<option value="HEENA">HEENA</option>
									<option value="HELIOS VISION">HELIOS VISION</option>
									<option value="HELLO KITTY">HELLO KITTY</option>
									<option value="HEOS">HEOS</option>
									<option value="HERE &amp; THERE">HERE &amp; THERE</option>
									<option value="HERITAGE">HERITAGE</option>
									<option value="HERO">HERO</option>
									<option value="HEROD">HEROD</option>
									<option value="HERSHEY'S">HERSHEY'S</option>
									<option value="HI-TECH">HI-TECH</option>
									<option value="HIDESHINE">HIDESHINE</option>
									<option value="HIDESIGN">HIDESIGN</option>
									<option value="HIDESING">HIDESING</option>
									<option value="HIFI">HIFI</option>
									<option value="HIGH PRECISION">HIGH PRECISION</option>
									<option value="HIGH SIERRA">HIGH SIERRA</option>
									<option value="HIGH STAR">HIGH STAR</option>
									<option value="HIGHLANDER">HIGHLANDER</option>
									<option value="HIGHSTAR">HIGHSTAR</option>
									<option value="HIMALAYA">HIMALAYA</option>
									<option value="HINDUSTAN LIVER">HINDUSTAN LIVER</option>
									<option value="HINDUSTAN UNILEVER">HINDUSTAN UNILEVER</option>
									<option value="HINDWARE">HINDWARE</option>
									<option value="HIWELL">HIWELL</option>
									<option value="HK">HK</option>
									<option value="HMI">HMI</option>
									<option value="HOLIDAY">HOLIDAY</option>
									<option value="HOLII">HOLII</option>
									<option value="HOLLISTER">HOLLISTER</option>
									<option value="HOLLOW FIBER">HOLLOW FIBER</option>
									<option value="HOME HEART">HOME HEART</option>
									<option value="HOME LABLE">HOME LABLE</option>
									<option value="HOMME">HOMME</option>
									<option value="HONEY">HONEY</option>
									<option value="HONEY BY PANTALOONS">HONEY BY PANTALOONS</option>
									<option value="HONEYCAN DO">HONEYCAN DO</option>
									<option value="HONEYCOMB">HONEYCOMB</option>
									<option value="HONOR">HONOR</option>
									<option value="HORIZON">HORIZON</option>
									<option value="HOSLEY GLOBAL">HOSLEY GLOBAL</option>
									<option value="HOT WHEELS">HOT WHEELS</option>
									<option value="HOTBERRIES">HOTBERRIES</option>
									<option value="HOTMUGG">HOTMUGG</option>
									<option value="HOUSE OF MARLEY">HOUSE OF MARLEY</option>
									<option value="HOUSE OF MARLEY SMILE JAMAICA">HOUSE OF MARLEY SMILE JAMAICA</option>
									<option value="HP">HP</option>
									<option value="HRX">HRX</option>
									<option value="HUA YOU">HUA YOU</option>
									<option value="HUAWEI">HUAWEI</option>
									<option value="HUGGIES">HUGGIES</option>
									<option value="HUNGOVER">HUNGOVER</option>
									<option value="HUNNY BUNNY">HUNNY BUNNY</option>
									<option value="HUSH PUPPIES">HUSH PUPPIES</option>
									<option value="HYPE">HYPE</option>
									<option value="HYPER">HYPER</option>
									<option value="HYPERX">HYPERX</option>
									<option value="I AM FOR YOU">I AM FOR YOU</option>
									<option value="I AM YOUNG">I AM YOUNG</option>
									<option value="I DANCE">I DANCE</option>
									<option value="I KNOW">I KNOW</option>
									<option value="I KNOWN">I KNOWN</option>
									<option value="I M YOUNG">I M YOUNG</option>
									<option value="I POP">I POP</option>
									<option value="I PRO">I PRO</option>
									<option value="I TREK">I TREK</option>
									<option value="IBALL">IBALL</option>
									<option value="ICC">ICC</option>
									<option value="ICC WORLD T20">ICC WORLD T20</option>
									<option value="IDENTIC">IDENTIC</option>
									<option value="IDHAYAM">IDHAYAM</option>
									<option value="IFB">IFB</option>
									<option value="IHIP">IHIP</option>
									<option value="IHOME">IHOME</option>
									<option value="IIM">IIM</option>
									<option value="IMARA">IMARA</option>
									<option value="IMELDA">IMELDA</option>
									<option value="IMPRESSILO">IMPRESSILO</option>
									<option value="IMPULSE">IMPULSE</option>
									<option value="IN THE CLOSEL">IN THE CLOSEL</option>
									<option value="IN THE CLOSET">IN THE CLOSET</option>
									<option value="INALSA">INALSA</option>
									<option value="INBUCH">INBUCH</option>
									<option value="INC.5">INC.5</option>
									<option value="INCYNK">INCYNK</option>
									<option value="INDIA">INDIA</option>
									<option value="INDIAN CARGO">INDIAN CARGO</option>
									<option value="INDIAN MAKE">INDIAN MAKE</option>
									<option value="INDIAN MARK">INDIAN MARK</option>
									<option value="INDIAN TERRAIN">INDIAN TERRAIN</option>
									<option value="INDICODE">INDICODE</option>
									<option value="INDIGO">INDIGO</option>
									<option value="INDIGO JEANS CODE">INDIGO JEANS CODE</option>
									<option value="INDIGO NATION">INDIGO NATION</option>
									<option value="INDRA FAB">INDRA FAB</option>
									<option value="INEXCESS">INEXCESS</option>
									<option value="INFANTO">INFANTO</option>
									<option value="INFINITY">INFINITY</option>
									<option value="INFO">INFO</option>
									<option value="INFOTECH">INFOTECH</option>
									<option value="INLANDER">INLANDER</option>
									<option value="INNERVOICE">INNERVOICE</option>
									<option value="INSPIRE">INSPIRE</option>
									<option value="INSTA POWER">INSTA POWER</option>
									<option value="INSTAPOWER">INSTAPOWER</option>
									<option value="INTEGRITI">INTEGRITI</option>
									<option value="INTEL">INTEL</option>
									<option value="INTERDESIGN">INTERDESIGN</option>
									<option value="INTERGITI">INTERGITI</option>
									<option value="INTEX">INTEX</option>
									<option value="INTOUCH">INTOUCH</option>
									<option value="INVENT">INVENT</option>
									<option value="INVICTUS">INVICTUS</option>
									<option value="INVOKEE">INVOKEE</option>
									<option value="IOCREST">IOCREST</option>
									<option value="ION">ION</option>
									<option value="IRA SOLEIL">IRA SOLEIL</option>
									<option value="IROCK">IROCK</option>
									<option value="ISHAKE">ISHAKE</option>
									<option value="ISHIN">ISHIN</option>
									<option value="ISHWAR">ISHWAR</option>
									<option value="ISISS">ISISS</option>
									<option value="ISLANDE">ISLANDE</option>
									<option value="ITALIA">ITALIA</option>
									<option value="ITI">ITI</option>
									<option value="IV PLAY">IV PLAY</option>
									<option value="IVORY TAG">IVORY TAG</option>
									<option value="IVYROSE">IVYROSE</option>
									<option value="IZABEL">IZABEL</option>
									<option value="IZOD">IZOD</option>
									<option value="J.S. CLUB">J.S. CLUB</option>
									<option value="JABRA">JABRA</option>
									<option value="JACK">JACK</option>
									<option value="JACK &amp; JOHN">JACK &amp; JOHN</option>
									<option value="JACK &amp; JONES">JACK &amp; JONES</option>
									<option value="JACK MARTIN">JACK MARTIN</option>
									<option value="JAFF">JAFF</option>
									<option value="JAIPURI">JAIPURI</option>
									<option value="JAM">JAM</option>
									<option value="JB COLLECTION">JB COLLECTION</option>
									<option value="JBL">JBL</option>
									<option value="JBN CREATION">JBN CREATION</option>
									<option value="JCB">JCB</option>
									<option value="JEALOUS">JEALOUS</option>
									<option value="JEALOUS 21">JEALOUS 21</option>
									<option value="JEANS WEST">JEANS WEST</option>
									<option value="JEANS WEST AUSTRALIA">JEANS WEST AUSTRALIA</option>
									<option value="JEVI PRINTS">JEVI PRINTS</option>
									<option value="JHEEL">JHEEL</option>
									<option value="JIAN MAN">JIAN MAN</option>
									<option value="JIANGYIN HONGLLU">JIANGYIN HONGLLU</option>
									<option value="JK EXER">JK EXER</option>
									<option value="JM SPORT CLASSIC">JM SPORT CLASSIC</option>
									<option value="JMP">JMP</option>
									<option value="JOCKEY">JOCKEY</option>
									<option value="JOCUND INSECT">JOCUND INSECT</option>
									<option value="JOGUR">JOGUR</option>
									<option value="JOHN MILLER">JOHN MILLER</option>
									<option value="JOHN PLAYERS">JOHN PLAYERS</option>
									<option value="JOHNPLAYERS">JOHNPLAYERS</option>
									<option value="JOHNSON &amp; JOHNSON">JOHNSON &amp; JOHNSON</option>
									<option value="JOHNSON BABY">JOHNSON BABY</option>
									<option value="JOLLY">JOLLY</option>
									<option value="JOVEES">JOVEES</option>
									<option value="JOY">JOY</option>
									<option value="JOYO">JOYO</option>
									<option value="JUELLE">JUELLE</option>
									<option value="JULY">JULY</option>
									<option value="JUNGLE MAGIC">JUNGLE MAGIC</option>
									<option value="JUSTICE">JUSTICE</option>
									<option value="JVC">JVC</option>
									<option value="K">K</option>
									<option value="K MARK">K MARK</option>
									<option value="KALENJI">KALENJI</option>
									<option value="KAMILIANT">KAMILIANT</option>
									<option value="KANVAS KATHA">KANVAS KATHA</option>
									<option value="KAPPA">KAPPA</option>
									<option value="KARA">KARA</option>
									<option value="KARACHI BAKERY">KARACHI BAKERY</option>
									<option value="KARAKAL">KARAKAL</option>
									<option value="KARE IN">KARE IN</option>
									<option value="KARMA">KARMA</option>
									<option value="KASA">KASA</option>
									<option value="KATE SPADE">KATE SPADE</option>
									<option value="KAXIAA">KAXIAA</option>
									<option value="KAYA">KAYA</option>
									<option value="KB7">KB7</option>
									<option value="KCR">KCR</option>
									<option value="KELME">KELME</option>
									<option value="KELVINATOR">KELVINATOR</option>
									<option value="KENDOMEN">KENDOMEN</option>
									<option value="KENFONE">KENFONE</option>
									<option value="KENNETH COLE REACTION">KENNETH COLE REACTION</option>
									<option value="KENSTAR">KENSTAR</option>
									<option value="KENT">KENT</option>
									<option value="KENT STYLE">KENT STYLE</option>
									<option value="KER">KER</option>
									<option value="KEYA">KEYA</option>
									<option value="KIARA">KIARA</option>
									<option value="KICK AND CRAWL">KICK AND CRAWL</option>
									<option value="KIDDO PANTI">KIDDO PANTI</option>
									<option value="KIDS VILLE">KIDS VILLE</option>
									<option value="KILLER">KILLER</option>
									<option value="KILLS">KILLS</option>
									<option value="KILORA">KILORA</option>
									<option value="KINGFISHER">KINGFISHER</option>
									<option value="KINGS XI PUNJAB">KINGS XI PUNJAB</option>
									<option value="KINGSTON">KINGSTON</option>
									<option value="KINS">KINS</option>
									<option value="KIPSTA">KIPSTA</option>
									<option value="KISSAN">KISSAN</option>
									<option value="KITTENS">KITTENS</option>
									<option value="KLAMOTTEN">KLAMOTTEN</option>
									<option value="KLEE">KLEE</option>
									<option value="KNOTTY DERBY">KNOTTY DERBY</option>
									<option value="KODAK">KODAK</option>
									<option value="KOHINOOR">KOHINOOR</option>
									<option value="KOLKATA KNIGHT RIDERS">KOLKATA KNIGHT RIDERS</option>
									<option value="KOMBAT">KOMBAT</option>
									<option value="KOOKABURRA">KOOKABURRA</option>
									<option value="KOOL KIDZ">KOOL KIDZ</option>
									<option value="KOOVS">KOOVS</option>
									<option value="KOTTY">KOTTY</option>
									<option value="KPRO">KPRO</option>
									<option value="KRAASA">KRAASA</option>
									<option value="KRAUS">KRAUS</option>
									<option value="KSH">KSH</option>
									<option value="KSK">KSK</option>
									<option value="KUKEEZI">KUKEEZI</option>
									<option value="KWORLD">KWORLD</option>
									<option value="KXIP">KXIP</option>
									<option value="KYAARA">KYAARA</option>
									<option value="KYLAF">KYLAF</option>
									<option value="LA BRIZA">LA BRIZA</option>
									<option value="LA FIRANGI">LA FIRANGI</option>
									<option value="LAAMAN">LAAMAN</option>
									<option value="LACIE">LACIE</option>
									<option value="LACOSTE">LACOSTE</option>
									<option value="LADIDA">LADIDA</option>
									<option value="LAKME">LAKME</option>
									<option value="LAKMI">LAKMI</option>
									<option value="LANCELOR">LANCELOR</option>
									<option value="LANCELOT">LANCELOT</option>
									<option value="LANDON BRIDGE">LANDON BRIDGE</option>
									<option value="LAPCARE">LAPCARE</option>
									<option value="LASENZA">LASENZA</option>
									<option value="LASIBA">LASIBA</option>
									<option value="LAURELS">LAURELS</option>
									<option value="LAVA">LAVA</option>
									<option value="LAVEENA">LAVEENA</option>
									<option value="LAVEN">LAVEN</option>
									<option value="LAVIE">LAVIE</option>
									<option value="LAWMAN">LAWMAN</option>
									<option value="LAXMI">LAXMI</option>
									<option value="LAZY BUM">LAZY BUM</option>
									<option value="LAZY JACKS">LAZY JACKS</option>
									<option value="LAZY JAKES">LAZY JAKES</option>
									<option value="LC WAIKIKI">LC WAIKIKI</option>
									<option value="LE BISON">LE BISON</option>
									<option value="LE DESIRE">LE DESIRE</option>
									<option value="LEE">LEE</option>
									<option value="LEE COOPER">LEE COOPER</option>
									<option value="LEGAL BRIBE">LEGAL BRIBE</option>
									<option value="LEGO">LEGO</option>
									<option value="LENEVO">LENEVO</option>
									<option value="LENOVO">LENOVO</option>
									<option value="LEO FASHION">LEO FASHION</option>
									<option value="LEVI'S">LEVI'S</option>
									<option value="LEVIS">LEVIS</option>
									<option value="LEXMARK">LEXMARK</option>
									<option value="LFC">LFC</option>
									<option value="LG">LG</option>
									<option value="LI DALARS">LI DALARS</option>
									<option value="LI DOLLARS">LI DOLLARS</option>
									<option value="LI- NING">LI- NING</option>
									<option value="LI-NING">LI-NING</option>
									<option value="LIBAS">LIBAS</option>
									<option value="LIBERTY">LIBERTY</option>
									<option value="LIEBEMODE">LIEBEMODE</option>
									<option value="LIFE">LIFE</option>
									<option value="LIFE'S">LIFE'S</option>
									<option value="LIFELONG">LIFELONG</option>
									<option value="LIFREE">LIFREE</option>
									<option value="LIMCA">LIMCA</option>
									<option value="LIME">LIME</option>
									<option value="LIMO">LIMO</option>
									<option value="LINENSPA">LINENSPA</option>
									<option value="LINGRA">LINGRA</option>
									<option value="LINING">LINING</option>
									<option value="LINKSYS">LINKSYS</option>
									<option value="LINO PERROS">LINO PERROS</option>
									<option value="LIORA">LIORA</option>
									<option value="LIPTON">LIPTON</option>
									<option value="LITTLE AIVA">LITTLE AIVA</option>
									<option value="LITTLE KANGARU">LITTLE KANGARU</option>
									<option value="LITTLE LILY">LITTLE LILY</option>
									<option value="LITTLE STARS">LITTLE STARS</option>
									<option value="LITTLES">LITTLES</option>
									<option value="LITTMANN">LITTMANN</option>
									<option value="LIVE UP">LIVE UP</option>
									<option value="LIVIE">LIVIE</option>
									<option value="LIVPURE">LIVPURE</option>
									<option value="LIWI YOUNG">LIWI YOUNG</option>
									<option value="LIZOL">LIZOL</option>
									<option value="LOBSTER">LOBSTER</option>
									<option value="LOCK N LOCK">LOCK N LOCK</option>
									<option value="LOCOMOTIVE">LOCOMOTIVE</option>
									<option value="LOCOMOTIVE.DNM">LOCOMOTIVE.DNM</option>
									<option value="LOGITECH">LOGITECH</option>
									<option value="LOLLIPOP LANE">LOLLIPOP LANE</option>
									<option value="LOMBARD">LOMBARD</option>
									<option value="LONDON">LONDON</option>
									<option value="LONDON BEING">LONDON BEING</option>
									<option value="LONDON BRIDGE">LONDON BRIDGE</option>
									<option value="LONDON BRUSH">LONDON BRUSH</option>
									<option value="LONDON JEANS">LONDON JEANS</option>
									<option value="LONSDALE">LONSDALE</option>
									<option value="LOONEY TUNES">LOONEY TUNES</option>
									<option value="LOTTIE">LOTTIE</option>
									<option value="LOTTO">LOTTO</option>
									<option value="LOTUS">LOTUS</option>
									<option value="LOUIS PHILIPPE">LOUIS PHILIPPE</option>
									<option value="LOUISE BELGIUM">LOUISE BELGIUM</option>
									<option value="LOVETOON">LOVETOON</option>
									<option value="LOWEPRO">LOWEPRO</option>
									<option value="LP">LP</option>
									<option value="LRIS">LRIS</option>
									<option value="LUCY &amp; LUKE">LUCY &amp; LUKE</option>
									<option value="LUMINA">LUMINA</option>
									<option value="LUNA">LUNA</option>
									<option value="LUV LAP">LUV LAP</option>
									<option value="LUVLAP">LUVLAP</option>
									<option value="LUX">LUX</option>
									<option value="LUXOR">LUXOR</option>
									<option value="LVORY">LVORY</option>
									<option value="M">M</option>
									<option value="M &amp; S">M &amp; S</option>
									<option value="M SQUARE">M SQUARE</option>
									<option value="M&amp;S">M&amp;S</option>
									<option value="M&amp;S C0LLECTION">M&amp;S C0LLECTION</option>
									<option value="M.S.RETAIL">M.S.RETAIL</option>
									<option value="MAANDNA">MAANDNA</option>
									<option value="MABCHICKS">MABCHICKS</option>
									<option value="MABU">MABU</option>
									<option value="MACROMAN">MACROMAN</option>
									<option value="MAD RAT">MAD RAT</option>
									<option value="MADE IN CHINA">MADE IN CHINA</option>
									<option value="MADLOVE">MADLOVE</option>
									<option value="MAGIC">MAGIC</option>
									<option value="MAGIC BULLET">MAGIC BULLET</option>
									<option value="MAGIC SEAL">MAGIC SEAL</option>
									<option value="MAGICAL">MAGICAL</option>
									<option value="MAGICSEAL">MAGICSEAL</option>
									<option value="MAGNETIC">MAGNETIC</option>
									<option value="MAGNETIC DESIGNS">MAGNETIC DESIGNS</option>
									<option value="MAHARAJA">MAHARAJA</option>
									<option value="MAINSTAYS">MAINSTAYS</option>
									<option value="MAJORETTE">MAJORETTE</option>
									<option value="MALALA">MALALA</option>
									<option value="MAMY POKO PANTS">MAMY POKO PANTS</option>
									<option value="MANCHESTER">MANCHESTER</option>
									<option value="MANGO">MANGO</option>
									<option value="MANGO PEOPLE">MANGO PEOPLE</option>
									<option value="MANIAC">MANIAC</option>
									<option value="MANYA">MANYA</option>
									<option value="MAONO">MAONO</option>
									<option value="MARCECKO">MARCECKO</option>
									<option value="MARIE CLAIRE">MARIE CLAIRE</option>
									<option value="MARINERS GRADE">MARINERS GRADE</option>
									<option value="MARIO VALENTINO">MARIO VALENTINO</option>
									<option value="MARK ANDERSON">MARK ANDERSON</option>
									<option value="MARK TAYLOR">MARK TAYLOR</option>
									<option value="MARKS &amp; SPENCER">MARKS &amp; SPENCER</option>
									<option value="MARSHALL">MARSHALL</option>
									<option value="MARVEL">MARVEL</option>
									<option value="MARYA">MARYA</option>
									<option value="MASCARA">MASCARA</option>
									<option value="MASKAARA">MASKAARA</option>
									<option value="MAST &amp; HARBOUR">MAST &amp; HARBOUR</option>
									<option value="MASTERCOOK">MASTERCOOK</option>
									<option value="MASTERCOOK GREEN 17">MASTERCOOK GREEN 17</option>
									<option value="MAX">MAX</option>
									<option value="MAX STAR">MAX STAR</option>
									<option value="MAX-AM">MAX-AM</option>
									<option value="MAXIMA">MAXIMA</option>
									<option value="MAXXPORT">MAXXPORT</option>
									<option value="MAY BABY">MAY BABY</option>
									<option value="MC KINLEY">MC KINLEY</option>
									<option value="MCDAVID">MCDAVID</option>
									<option value="MCXX">MCXX</option>
									<option value="MDH">MDH</option>
									<option value="MECCAANO">MECCAANO</option>
									<option value="MEDALA">MEDALA</option>
									<option value="MEE MEE">MEE MEE</option>
									<option value="MEEMEE">MEEMEE</option>
									<option value="MEGA">MEGA</option>
									<option value="MEGA SLIM">MEGA SLIM</option>
									<option value="MEMBER'S MARK">MEMBER'S MARK</option>
									<option value="MERGE">MERGE</option>
									<option value="MERRELL">MERRELL</option>
									<option value="MERRY SUNS">MERRY SUNS</option>
									<option value="MESMERIZE">MESMERIZE</option>
									<option value="METRO">METRO</option>
									<option value="METROLINE">METROLINE</option>
									<option value="METRONAUT">METRONAUT</option>
									<option value="METRONRUT">METRONRUT</option>
									<option value="MF">MF</option>
									<option value="MI">MI</option>
									<option value="MICHAEL KORS">MICHAEL KORS</option>
									<option value="MICKEY MOUSE">MICKEY MOUSE</option>
									<option value="MICKY">MICKY</option>
									<option value="MICKY MOUSE">MICKY MOUSE</option>
									<option value="MICRO">MICRO</option>
									<option value="MICRO FINISH">MICRO FINISH</option>
									<option value="MICROMAX">MICROMAX</option>
									<option value="MICROSOFT">MICROSOFT</option>
									<option value="MICROTEK">MICROTEK</option>
									<option value="MICROWAVE">MICROWAVE</option>
									<option value="MIDEA">MIDEA</option>
									<option value="MIIKEY">MIIKEY</option>
									<option value="MIIYU">MIIYU</option>
									<option value="MILKY MIST">MILKY MIST</option>
									<option value="MILLER">MILLER</option>
									<option value="MILTON">MILTON</option>
									<option value="MIMOSA">MIMOSA</option>
									<option value="MINDA">MINDA</option>
									<option value="MINI HORNIT">MINI HORNIT</option>
									<option value="MINI KLUB">MINI KLUB</option>
									<option value="MINIKLUB">MINIKLUB</option>
									<option value="MINUTE MAID">MINUTE MAID</option>
									<option value="MIRAGE">MIRAGE</option>
									<option value="MISHKA">MISHKA</option>
									<option value="MISS &amp; CHIEF">MISS &amp; CHIEF</option>
									<option value="MISS CHASE">MISS CHASE</option>
									<option value="MISS CHEA'S">MISS CHEA'S</option>
									<option value="MISS CL BY CARLTON">MISS CL BY CARLTON</option>
									<option value="MISS FIORELL">MISS FIORELL</option>
									<option value="MISS KAPACHI">MISS KAPACHI</option>
									<option value="MISS SIXTY">MISS SIXTY</option>
									<option value="MITASHI">MITASHI</option>
									<option value="MITASHI GOBLET CD">MITASHI GOBLET CD</option>
									<option value="MIZUNO">MIZUNO</option>
									<option value="MMOJAH">MMOJAH</option>
									<option value="MODEL CAR">MODEL CAR</option>
									<option value="MODERNISTA">MODERNISTA</option>
									<option value="MODO">MODO</option>
									<option value="MOKO">MOKO</option>
									<option value="MOMENTUS">MOMENTUS</option>
									<option value="MONA">MONA</option>
									<option value="MONICA DOYRA">MONICA DOYRA</option>
									<option value="MONSTER">MONSTER</option>
									<option value="MONTE CARLO">MONTE CARLO</option>
									<option value="MONTEIL &amp; MUNERO">MONTEIL &amp; MUNERO</option>
									<option value="MONTEIL MUNERO">MONTEIL MUNERO</option>
									<option value="MOONBOW">MOONBOW</option>
									<option value="MOOV">MOOV</option>
									<option value="MORELLATE">MORELLATE</option>
									<option value="MORPHIN RICHARDS">MORPHIN RICHARDS</option>
									<option value="MORPHY RICHARDS">MORPHY RICHARDS</option>
									<option value="MORTEIN">MORTEIN</option>
									<option value="MOSSIMO">MOSSIMO</option>
									<option value="MOTHER EARTH">MOTHER EARTH</option>
									<option value="MOTHER'S RECIPE">MOTHER'S RECIPE</option>
									<option value="MOTHERCARE">MOTHERCARE</option>
									<option value="MOTHERTOUCH">MOTHERTOUCH</option>
									<option value="MOTOROLA">MOTOROLA</option>
									<option value="MOTU PATLU">MOTU PATLU</option>
									<option value="MOUNT FORD">MOUNT FORD</option>
									<option value="MOUNTAIN">MOUNTAIN</option>
									<option value="MOUSE">MOUSE</option>
									<option value="MOUSTACHE">MOUSTACHE</option>
									<option value="MPI">MPI</option>
									<option value="MPOW">MPOW</option>
									<option value="MPOW BUCKLER">MPOW BUCKLER</option>
									<option value="MPULSE">MPULSE</option>
									<option value="MR. POLO">MR. POLO</option>
									<option value="MRF">MRF</option>
									<option value="MSI">MSI</option>
									<option value="MTR">MTR</option>
									<option value="MTV">MTV</option>
									<option value="MUFTI">MUFTI</option>
									<option value="MULBERRIES">MULBERRIES</option>
									<option value="MUMBAI INDIANS">MUMBAI INDIANS</option>
									<option value="MURCIA">MURCIA</option>
									<option value="MURICA">MURICA</option>
									<option value="MURLI">MURLI</option>
									<option value="MUSICAL COT MOBILE">MUSICAL COT MOBILE</option>
									<option value="MUSKAN">MUSKAN</option>
									<option value="MUSTARD">MUSTARD</option>
									<option value="MUSTARD-REGULAR">MUSTARD-REGULAR</option>
									<option value="MUVEN ECHO BUDZ">MUVEN ECHO BUDZ</option>
									<option value="MVR">MVR</option>
									<option value="MY BABY EXCELS">MY BABY EXCELS</option>
									<option value="MY STYLE APPAREL">MY STYLE APPAREL</option>
									<option value="MYFOOT">MYFOOT</option>
									<option value="MYSTERIOUS MISS">MYSTERIOUS MISS</option>
									<option value="NAHSHON">NAHSHON</option>
									<option value="NALKY">NALKY</option>
									<option value="NANDINI">NANDINI</option>
									<option value="NARI">NARI</option>
									<option value="NATRAJ">NATRAJ</option>
									<option value="NATURAL ERGONOMIC">NATURAL ERGONOMIC</option>
									<option value="NATURAL WOOD">NATURAL WOOD</option>
									<option value="NATURALIZER">NATURALIZER</option>
									<option value="NATURES">NATURES</option>
									<option value="NAUTI NATI">NAUTI NATI</option>
									<option value="NAUTICA">NAUTICA</option>
									<option value="NAUTINATI">NAUTINATI</option>
									<option value="NAVA">NAVA</option>
									<option value="NAVY FONT">NAVY FONT</option>
									<option value="NAYASA">NAYASA</option>
									<option value="NAYO">NAYO</option>
									<option value="NE">NE</option>
									<option value="NECK OUT">NECK OUT</option>
									<option value="NEERU FASHION">NEERU FASHION</option>
									<option value="NELL">NELL</option>
									<option value="NEON">NEON</option>
									<option value="NESCAFE">NESCAFE</option>
									<option value="NESTLE">NESTLE</option>
									<option value="NESTLE NANGROW">NESTLE NANGROW</option>
									<option value="NESTWELL">NESTWELL</option>
									<option value="NETGEAR">NETGEAR</option>
									<option value="NEUTROGENA">NEUTROGENA</option>
									<option value="NEVA">NEVA</option>
									<option value="NEVY FONT">NEVY FONT</option>
									<option value="NEW BALANCE">NEW BALANCE</option>
									<option value="NEW KID'S MIX LOWER">NEW KID'S MIX LOWER</option>
									<option value="NEW KIDS MIX T-SHIRT">NEW KIDS MIX T-SHIRT</option>
									<option value="NEW PORT">NEW PORT</option>
									<option value="NEWBORN TO TOODLER">NEWBORN TO TOODLER</option>
									<option value="NEWINK">NEWINK</option>
									<option value="NEWMOM">NEWMOM</option>
									<option value="NEWNIK">NEWNIK</option>
									<option value="NEWPORT">NEWPORT</option>
									<option value="NEWYORK">NEWYORK</option>
									<option value="NEXON">NEXON</option>
									<option value="NGT">NGT</option>
									<option value="NICKELODEON&nbsp;">NICKELODEON&nbsp;</option>
									<option value="NIGHTINGALE">NIGHTINGALE</option>
									<option value="NIKE">NIKE</option>
									<option value="NIKHAR">NIKHAR</option>
									<option value="NIKON">NIKON</option>
									<option value="NINE">NINE</option>
									<option value="NINETEEN">NINETEEN</option>
									<option value="NINEWEST">NINEWEST</option>
									<option value="NINGBO">NINGBO</option>
									<option value="NINJA TURTLE">NINJA TURTLE</option>
									<option value="NISSIN">NISSIN</option>
									<option value="NITHO">NITHO</option>
									<option value="NITRITE">NITRITE</option>
									<option value="NITRO">NITRO</option>
									<option value="NIVEA">NIVEA</option>
									<option value="NIVIA">NIVIA</option>
									<option value="NIXPLAY">NIXPLAY</option>
									<option value="NO BRAND">NO BRAND</option>
									<option value="NO ERROR">NO ERROR</option>
									<option value="NODDY">NODDY</option>
									<option value="NOKIA">NOKIA</option>
									<option value="NORTH END">NORTH END</option>
									<option value="NORTH STAR">NORTH STAR</option>
									<option value="NOSTRUM">NOSTRUM</option>
									<option value="NOVA">NOVA</option>
									<option value="NOVA SCOTIA">NOVA SCOTIA</option>
									<option value="NOVA SCOTTIA">NOVA SCOTTIA</option>
									<option value="NOVEX">NOVEX</option>
									<option value="NS">NS</option>
									<option value="NU">NU</option>
									<option value="NUBY">NUBY</option>
									<option value="NUDE AUDIO">NUDE AUDIO</option>
									<option value="NUEVO FRONTERA">NUEVO FRONTERA</option>
									<option value="NUMARK">NUMARK</option>
									<option value="NUMERO UNO">NUMERO UNO</option>
									<option value="NUMEROUNO">NUMEROUNO</option>
									<option value="NUON">NUON</option>
									<option value="NUTEEZ">NUTEEZ</option>
									<option value="NUTRELA">NUTRELA</option>
									<option value="NYEOC">NYEOC</option>
									<option value="O.B. TAMPON">O.B. TAMPON</option>
									<option value="OASIS">OASIS</option>
									<option value="OCEAN">OCEAN</option>
									<option value="ODONIL">ODONIL</option>
									<option value="ODONIT">ODONIT</option>
									<option value="OFFICIAL">OFFICIAL</option>
									<option value="OINTEGRITI">OINTEGRITI</option>
									<option value="OKADE">OKADE</option>
									<option value="OLAY">OLAY</option>
									<option value="OLD SKOOL">OLD SKOOL</option>
									<option value="OLD SPICE">OLD SPICE</option>
									<option value="OLIVE">OLIVE</option>
									<option value="OLIVER">OLIVER</option>
									<option value="OMAX">OMAX</option>
									<option value="OMNANDI">OMNANDI</option>
									<option value="OMRON">OMRON</option>
									<option value="ON1Y">ON1Y</option>
									<option value="ONE STEP">ONE STEP</option>
									<option value="ONITSUKA TIGER">ONITSUKA TIGER</option>
									<option value="ONLY">ONLY</option>
									<option value="ONLY VIMAL">ONLY VIMAL</option>
									<option value="ONN">ONN</option>
									<option value="OOMPH">OOMPH</option>
									<option value="OPPO">OPPO</option>
									<option value="OPTIMA">OPTIMA</option>
									<option value="OPTIX">OPTIX</option>
									<option value="ORANGE PLUS">ORANGE PLUS</option>
									<option value="ORCHARD">ORCHARD</option>
									<option value="ORGANIC TATTVA">ORGANIC TATTVA</option>
									<option value="ORIENT">ORIENT</option>
									<option value="ORIGO CHOICE">ORIGO CHOICE</option>
									<option value="ORIGO FRESH">ORIGO FRESH</option>
									<option value="ORPAT">ORPAT</option>
									<option value="ORTHOHIL">ORTHOHIL</option>
									<option value="ORTIS">ORTIS</option>
									<option value="OSCAR">OSCAR</option>
									<option value="OSM WORD">OSM WORD</option>
									<option value="OSRAM">OSRAM</option>
									<option value="OSTER">OSTER</option>
									<option value="OSWAL">OSWAL</option>
									<option value="OUTFIT CLASSIC">OUTFIT CLASSIC</option>
									<option value="OUTLANDISH">OUTLANDISH</option>
									<option value="OUTLAW">OUTLAW</option>
									<option value="OXELO">OXELO</option>
									<option value="OXEMBERG">OXEMBERG</option>
									<option value="OXOLLOXO">OXOLLOXO</option>
									<option value="OXY GLOW">OXY GLOW</option>
									<option value="OXYLANE">OXYLANE</option>
									<option value="OYSTERMEN">OYSTERMEN</option>
									<option value="OZOMAX">OZOMAX</option>
									<option value="PADRO">PADRO</option>
									<option value="PAISLEI">PAISLEI</option>
									<option value="PALAKH">PALAKH</option>
									<option value="PALM TREE">PALM TREE</option>
									<option value="PAMPERS">PAMPERS</option>
									<option value="PANASONIC">PANASONIC</option>
									<option value="PANCHALI">PANCHALI</option>
									<option value="PANDA">PANDA</option>
									<option value="PANEL">PANEL</option>
									<option value="PANTALOONS">PANTALOONS</option>
									<option value="PAPER BOAT">PAPER BOAT</option>
									<option value="PAPERONE">PAPERONE</option>
									<option value="PARAFFIN">PARAFFIN</option>
									<option value="PARFOIS">PARFOIS</option>
									<option value="PARIMAL HEALTHCARE">PARIMAL HEALTHCARE</option>
									<option value="PARK AVENUE">PARK AVENUE</option>
									<option value="PARK ROYAL">PARK ROYAL</option>
									<option value="PARKER">PARKER</option>
									<option value="PARX">PARX</option>
									<option value="PASEO SMART">PASEO SMART</option>
									<option value="PASSPORT">PASSPORT</option>
									<option value="PAULIMDA">PAULIMDA</option>
									<option value="PAULINDA">PAULINDA</option>
									<option value="PAVERS">PAVERS</option>
									<option value="PAVERS ENGLAND">PAVERS ENGLAND</option>
									<option value="PEAPK">PEAPK</option>
									<option value="PEDIGREE">PEDIGREE</option>
									<option value="PEEHOO">PEEHOO</option>
									<option value="PEESOO">PEESOO</option>
									<option value="PEHENAWA">PEHENAWA</option>
									<option value="PENASONIC">PENASONIC</option>
									<option value="PEOPLE">PEOPLE</option>
									<option value="PEPE">PEPE</option>
									<option value="PEPE JEANS">PEPE JEANS</option>
									<option value="PEPERONE">PEPERONE</option>
									<option value="PEPPA">PEPPA</option>
									<option value="PERFECT">PERFECT</option>
									<option value="PERFORMAX">PERFORMAX</option>
									<option value="PERSEUS">PERSEUS</option>
									<option value="PERSONAL CARE">PERSONAL CARE</option>
									<option value="PETALS">PETALS</option>
									<option value="PETE">PETE</option>
									<option value="PETER ENGLAND">PETER ENGLAND</option>
									<option value="PGSA">PGSA</option>
									<option value="PHILIPS">PHILIPS</option>
									<option value="PHOENIX">PHOENIX</option>
									<option value="PHOTRON">PHOTRON</option>
									<option value="PI WORLD">PI WORLD</option>
									<option value="PIANO">PIANO</option>
									<option value="PICK POCKET">PICK POCKET</option>
									<option value="PICO CASUAL">PICO CASUAL</option>
									<option value="PIERRE CARDIN">PIERRE CARDIN</option>
									<option value="PIERRE CARLO">PIERRE CARLO</option>
									<option value="PIGEON">PIGEON</option>
									<option value="PILLSBURY">PILLSBURY</option>
									<option value="PILOT">PILOT</option>
									<option value="PIN POINT">PIN POINT</option>
									<option value="PINDIA">PINDIA</option>
									<option value="PINK FLOYD">PINK FLOYD</option>
									<option value="PINK RIBBON">PINK RIBBON</option>
									<option value="PIONEER">PIONEER</option>
									<option value="PISS &amp; VINEGAR">PISS &amp; VINEGAR</option>
									<option value="PKD">PKD</option>
									<option value="PLANET">PLANET</option>
									<option value="PLANET BIKE">PLANET BIKE</option>
									<option value="PLANET SUPERHER">PLANET SUPERHER</option>
									<option value="PLANET SUPERHERO">PLANET SUPERHERO</option>
									<option value="PLANTERS VERTICAL">PLANTERS VERTICAL</option>
									<option value="PLANTRONICS">PLANTRONICS</option>
									<option value="PLAY BOY">PLAY BOY</option>
									<option value="PLAY BOYZ">PLAY BOYZ</option>
									<option value="PLAY N PETS">PLAY N PETS</option>
									<option value="PLAY TIME">PLAY TIME</option>
									<option value="PLAYBOY">PLAYBOY</option>
									<option value="PLOSH">PLOSH</option>
									<option value="PLUM">PLUM</option>
									<option value="PLUSS">PLUSS</option>
									<option value="PLYR">PLYR</option>
									<option value="PNY">PNY</option>
									<option value="POE">POE</option>
									<option value="POESERVICE">POESERVICE</option>
									<option value="POKER GAME">POKER GAME</option>
									<option value="POLAR">POLAR</option>
									<option value="POLICE">POLICE</option>
									<option value="POLK">POLK</option>
									<option value="POLO">POLO</option>
									<option value="POLO CLUB">POLO CLUB</option>
									<option value="POLO EXECUTIVE">POLO EXECUTIVE</option>
									<option value="POLO+">POLO+</option>
									<option value="POLYSET">POLYSET</option>
									<option value="POMOD">POMOD</option>
									<option value="POND'S MEN">POND'S MEN</option>
									<option value="POP N PUSH ELEPHANT">POP N PUSH ELEPHANT</option>
									<option value="POPINIS">POPINIS</option>
									<option value="PORTICO">PORTICO</option>
									<option value="PORTRONICS">PORTRONICS</option>
									<option value="POST IT">POST IT</option>
									<option value="POTTY MAKER">POTTY MAKER</option>
									<option value="POVOS">POVOS</option>
									<option value="POWER">POWER</option>
									<option value="POWER ACOUSIC">POWER ACOUSIC</option>
									<option value="POWER ACOUSTIK">POWER ACOUSTIK</option>
									<option value="POWER AIR">POWER AIR</option>
									<option value="POWER BALANCE">POWER BALANCE</option>
									<option value="POWER PLUS">POWER PLUS</option>
									<option value="PRAGYA">PRAGYA</option>
									<option value="PRANA">PRANA</option>
									<option value="PREETHI">PREETHI</option>
									<option value="PREETY CRAFT">PREETY CRAFT</option>
									<option value="PREFECT">PREFECT</option>
									<option value="PREMIUM">PREMIUM</option>
									<option value="PRESTIGE">PRESTIGE</option>
									<option value="PRESTITIA">PRESTITIA</option>
									<option value="PRESTON NORTH END">PRESTON NORTH END</option>
									<option value="PRETTYCAT">PRETTYCAT</option>
									<option value="PRIL">PRIL</option>
									<option value="PRIME">PRIME</option>
									<option value="PRINCESS">PRINCESS</option>
									<option value="PRINCEWARE">PRINCEWARE</option>
									<option value="PRINCIPLES">PRINCIPLES</option>
									<option value="PRISMA">PRISMA</option>
									<option value="PRIVATE STRUCTURE">PRIVATE STRUCTURE</option>
									<option value="PRIVATELIFES">PRIVATELIFES</option>
									<option value="PRO">PRO</option>
									<option value="PRO NATURE">PRO NATURE</option>
									<option value="PRO NATURE ORGANIC">PRO NATURE ORGANIC</option>
									<option value="PROBASE">PROBASE</option>
									<option value="PROCASE">PROCASE</option>
									<option value="PROLINE">PROLINE</option>
									<option value="PROLINE FITNESS">PROLINE FITNESS</option>
									<option value="PROMEN">PROMEN</option>
									<option value="PROMO STARS">PROMO STARS</option>
									<option value="PROMOD">PROMOD</option>
									<option value="PRONTO">PRONTO</option>
									<option value="PROTERRA">PROTERRA</option>
									<option value="PROVOGUE">PROVOGUE</option>
									<option value="PTRON">PTRON</option>
									<option value="PUMA">PUMA</option>
									<option value="PUMA 2199">PUMA 2199</option>
									<option value="PURE IT">PURE IT</option>
									<option value="PURYS">PURYS</option>
									<option value="Q PILLOW">Q PILLOW</option>
									<option value="Q&amp;Q">Q&amp;Q</option>
									<option value="Q-RIOUS">Q-RIOUS</option>
									<option value="QBIC">QBIC</option>
									<option value="QS DRESS">QS DRESS</option>
									<option value="QUANTUM">QUANTUM</option>
									<option value="QUARTZ">QUARTZ</option>
									<option value="QUECHUA">QUECHUA</option>
									<option value="QUIKSILVER">QUIKSILVER</option>
									<option value="QUILT">QUILT</option>
									<option value="QUPID">QUPID</option>
									<option value="R R">R R</option>
									<option value="RAAVENN">RAAVENN</option>
									<option value="RAFAEL">RAFAEL</option>
									<option value="RAINBOW">RAINBOW</option>
									<option value="RAINDROPS">RAINDROPS</option>
									<option value="RAJASTHAN ROYALS">RAJASTHAN ROYALS</option>
									<option value="RAJASTHANI">RAJASTHANI</option>
									<option value="RANGE">RANGE</option>
									<option value="RANGMANCH BY PANTALOONS">RANGMANCH BY PANTALOONS</option>
									<option value="RANGRITI">RANGRITI</option>
									<option value="RANZER">RANZER</option>
									<option value="RAPOO">RAPOO</option>
									<option value="RARE">RARE</option>
									<option value="RASLEELA">RASLEELA</option>
									<option value="RASOI">RASOI</option>
									<option value="RASOI SHOP">RASOI SHOP</option>
									<option value="RATAN">RATAN</option>
									<option value="RATTRAP">RATTRAP</option>
									<option value="RAVENSBURGER">RAVENSBURGER</option>
									<option value="RAVI AGENCIES">RAVI AGENCIES</option>
									<option value="RAW">RAW</option>
									<option value="RAW PRESSERY">RAW PRESSERY</option>
									<option value="RAYMOND">RAYMOND</option>
									<option value="RAZER">RAZER</option>
									<option value="RAZER ADARO">RAZER ADARO</option>
									<option value="RDLC">RDLC</option>
									<option value="RDSTR">RDSTR</option>
									<option value="REACTION">REACTION</option>
									<option value="REAL">REAL</option>
									<option value="REAL POLO">REAL POLO</option>
									<option value="RECON">RECON</option>
									<option value="RECONNECT">RECONNECT</option>
									<option value="RECRON">RECRON</option>
									<option value="RED CHIEF">RED CHIEF</option>
									<option value="RED LIME">RED LIME</option>
									<option value="RED SNOW">RED SNOW</option>
									<option value="RED SWAN">RED SWAN</option>
									<option value="REDGEAR">REDGEAR</option>
									<option value="REDHERRING">REDHERRING</option>
									<option value="REDMI">REDMI</option>
									<option value="REDOUTE">REDOUTE</option>
									<option value="REDRAGON">REDRAGON</option>
									<option value="REDSNOW">REDSNOW</option>
									<option value="REDTAPE">REDTAPE</option>
									<option value="REEBOK">REEBOK</option>
									<option value="REGATTA">REGATTA</option>
									<option value="REID N TAYLOR">REID N TAYLOR</option>
									<option value="RELINANCE">RELINANCE</option>
									<option value="REMAINIKA">REMAINIKA</option>
									<option value="REMANIKA">REMANIKA</option>
									<option value="REMINGTON">REMINGTON</option>
									<option value="REPORT">REPORT</option>
									<option value="REPUBLIC">REPUBLIC</option>
									<option value="RESONATE">RESONATE</option>
									<option value="REVE">REVE</option>
									<option value="REVERIE UOMO">REVERIE UOMO</option>
									<option value="REVERIEUONO">REVERIEUONO</option>
									<option value="REVERSIBLE">REVERSIBLE</option>
									<option value="REVOLUTION">REVOLUTION</option>
									<option value="REX JEANS">REX JEANS</option>
									<option value="REX STRAUT">REX STRAUT</option>
									<option value="REYA">REYA</option>
									<option value="RHYSETTA">RHYSETTA</option>
									<option value="RICO">RICO</option>
									<option value="RIGO">RIGO</option>
									<option value="RIOT">RIOT</option>
									<option value="RIPJAWS">RIPJAWS</option>
									<option value="RITU">RITU</option>
									<option value="RIVERSTONE">RIVERSTONE</option>
									<option value="RJ LADY">RJ LADY</option>
									<option value="RJCA">RJCA</option>
									<option value="RNB">RNB</option>
									<option value="ROADIES">ROADIES</option>
									<option value="ROADSTER">ROADSTER</option>
									<option value="ROCCAT">ROCCAT</option>
									<option value="ROCCAT TYON">ROCCAT TYON</option>
									<option value="ROCHEES">ROCHEES</option>
									<option value="ROCIO">ROCIO</option>
									<option value="ROCKPORT">ROCKPORT</option>
									<option value="ROCKSOFT">ROCKSOFT</option>
									<option value="ROCKWELL">ROCKWELL</option>
									<option value="ROCKY">ROCKY</option>
									<option value="RODID">RODID</option>
									<option value="ROHS">ROHS</option>
									<option value="ROISH">ROISH</option>
									<option value="ROMOSS">ROMOSS</option>
									<option value="RONUK">RONUK</option>
									<option value="ROOTS">ROOTS</option>
									<option value="ROS">ROS</option>
									<option value="ROSSMAX">ROSSMAX</option>
									<option value="ROSTAA">ROSTAA</option>
									<option value="ROXY">ROXY</option>
									<option value="RUC">RUC</option>
									<option value="RUDOT">RUDOT</option>
									<option value="RUF &amp; TUF">RUF &amp; TUF</option>
									<option value="RUGBY">RUGBY</option>
									<option value="RUGGERS">RUGGERS</option>
									<option value="RUOSH">RUOSH</option>
									<option value="RUPA">RUPA</option>
									<option value="RUSSELL">RUSSELL</option>
									<option value="SAACHI">SAACHI</option>
									<option value="SAARA">SAARA</option>
									<option value="SADES">SADES</option>
									<option value="SAFARI">SAFARI</option>
									<option value="SAFCO">SAFCO</option>
									<option value="SAFFIRE">SAFFIRE</option>
									<option value="SAFFOLA">SAFFOLA</option>
									<option value="SAHIL">SAHIL</option>
									<option value="SAKURA">SAKURA</option>
									<option value="SALOMON">SALOMON</option>
									<option value="SALORA">SALORA</option>
									<option value="SALSALITO">SALSALITO</option>
									<option value="SAMMERRY">SAMMERRY</option>
									<option value="SAMPLE">SAMPLE</option>
									<option value="SAMSONITE">SAMSONITE</option>
									<option value="SAMSUNG">SAMSUNG</option>
									<option value="SAN FRISCO">SAN FRISCO</option>
									<option value="SANDAK">SANDAK</option>
									<option value="SANDISK">SANDISK</option>
									<option value="SANJEEV KAPPOR">SANJEEV KAPPOR</option>
									<option value="SANRIO">SANRIO</option>
									<option value="SANTA MONICA">SANTA MONICA</option>
									<option value="SAPPHIRE">SAPPHIRE</option>
									<option value="SAR">SAR</option>
									<option value="SAREGAMA">SAREGAMA</option>
									<option value="SARITA">SARITA</option>
									<option value="SAROTA">SAROTA</option>
									<option value="SASSAFRAS">SASSAFRAS</option>
									<option value="SATTYAA">SATTYAA</option>
									<option value="SATYAPAUL">SATYAPAUL</option>
									<option value="SATYPAUL">SATYPAUL</option>
									<option value="SAVANNA">SAVANNA</option>
									<option value="SAY">SAY</option>
									<option value="SAYA">SAYA</option>
									<option value="SB SERIES">SB SERIES</option>
									<option value="SCHOLL">SCHOLL</option>
									<option value="SCOTCH">SCOTCH</option>
									<option value="SCOTCH BRITE">SCOTCH BRITE</option>
									<option value="SCULLERS">SCULLERS</option>
									<option value="SDL">SDL</option>
									<option value="SEAGATE">SEAGATE</option>
									<option value="SEIKO">SEIKO</option>
									<option value="SELA">SELA</option>
									<option value="SELECTED">SELECTED</option>
									<option value="SELFIE">SELFIE</option>
									<option value="SELIO">SELIO</option>
									<option value="SELPAK">SELPAK</option>
									<option value="SEMSONITE">SEMSONITE</option>
									<option value="SENI">SENI</option>
									<option value="SENNHEISER">SENNHEISER</option>
									<option value="SENORITA">SENORITA</option>
									<option value="SESA">SESA</option>
									<option value="SET WET STUDIO X">SET WET STUDIO X</option>
									<option value="SEVEN BY MS DHONI">SEVEN BY MS DHONI</option>
									<option value="SEVEN BY SPORTS FIT">SEVEN BY SPORTS FIT</option>
									<option value="SEVEN RAYS">SEVEN RAYS</option>
									<option value="SEVEN SEAS">SEVEN SEAS</option>
									<option value="SF JEANS BY PANTALOONS">SF JEANS BY PANTALOONS</option>
									<option value="SG">SG</option>
									<option value="SHAKTI">SHAKTI</option>
									<option value="SHAKUMBHARI">SHAKUMBHARI</option>
									<option value="SHANTANU &amp;NIKHIL">SHANTANU &amp;NIKHIL</option>
									<option value="SHANTY">SHANTY</option>
									<option value="SHARMA'S">SHARMA'S</option>
									<option value="SHAYAN">SHAYAN</option>
									<option value="SHIBORI">SHIBORI</option>
									<option value="SHIKARI">SHIKARI</option>
									<option value="SHINING FLORA">SHINING FLORA</option>
									<option value="SHIVA &amp; SMRITI">SHIVA &amp; SMRITI</option>
									<option value="SHM">SHM</option>
									<option value="SHNEH">SHNEH</option>
									<option value="SHOCK DOCTOR">SHOCK DOCTOR</option>
									<option value="SHONAYA">SHONAYA</option>
									<option value="SHOPHARP">SHOPHARP</option>
									<option value="SHOPPER TREE">SHOPPER TREE</option>
									<option value="SHOPPING HUTS">SHOPPING HUTS</option>
									<option value="SHOPPING HUTZ">SHOPPING HUTZ</option>
									<option value="SHREE">SHREE</option>
									<option value="SHYLA">SHYLA</option>
									<option value="SIA">SIA</option>
									<option value="SIGNATURE">SIGNATURE</option>
									<option value="SIGNORA CARE">SIGNORA CARE</option>
									<option value="SIGNORA WARE">SIGNORA WARE</option>
									<option value="SILICONE BAKEWARE">SILICONE BAKEWARE</option>
									<option value="SILVER'S">SILVER'S</option>
									<option value="SILVERTECK">SILVERTECK</option>
									<option value="SIMBA">SIMBA</option>
									<option value="SING">SING</option>
									<option value="SINGER">SINGER</option>
									<option value="SISLEY">SISLEY</option>
									<option value="SISTEM">SISTEM</option>
									<option value="SIZE 48">SIZE 48</option>
									<option value="SKECHERS">SKECHERS</option>
									<option value="SKIL">SKIL</option>
									<option value="SKILL">SKILL</option>
									<option value="SKINNY FIT">SKINNY FIT</option>
									<option value="SKLZ">SKLZ</option>
									<option value="SKORA">SKORA</option>
									<option value="SKULLCANDY">SKULLCANDY</option>
									<option value="SKULT">SKULT</option>
									<option value="SKULT BY SHAHID KAPOOR">SKULT BY SHAHID KAPOOR</option>
									<option value="SKYBAGS">SKYBAGS</option>
									<option value="SKYKIDZ">SKYKIDZ</option>
									<option value="SLAZENGER">SLAZENGER</option>
									<option value="SLEEP">SLEEP</option>
									<option value="SLEEP &amp; BEYOND">SLEEP &amp; BEYOND</option>
									<option value="SLIMFIT">SLIMFIT</option>
									<option value="SLIMLINE">SLIMLINE</option>
									<option value="SLUB DENIM">SLUB DENIM</option>
									<option value="SLUMBER PARTY">SLUMBER PARTY</option>
									<option value="SMAG">SMAG</option>
									<option value="SMART CLUB">SMART CLUB</option>
									<option value="SMASH">SMASH</option>
									<option value="SMITH JONES">SMITH JONES</option>
									<option value="SMITH SOUL">SMITH SOUL</option>
									<option value="SMOBY">SMOBY</option>
									<option value="SMUGGLERZ">SMUGGLERZ</option>
									<option value="SN'S">SN'S</option>
									<option value="SNAPIN">SNAPIN</option>
									<option value="SNEH">SNEH</option>
									<option value="SNG">SNG</option>
									<option value="SNICKERS">SNICKERS</option>
									<option value="SNOW VALLEY">SNOW VALLEY</option>
									<option value="SNS">SNS</option>
									<option value="SOFFIO">SOFFIO</option>
									<option value="SOFTEL">SOFTEL</option>
									<option value="SOFY">SOFY</option>
									<option value="SOLAR">SOLAR</option>
									<option value="SOLE THREADS">SOLE THREADS</option>
									<option value="SOLID">SOLID</option>
									<option value="SOLIMO">SOLIMO</option>
									<option value="SOLLY JEANS">SOLLY JEANS</option>
									<option value="SOLLY SPORTS">SOLLY SPORTS</option>
									<option value="SOLO">SOLO</option>
									<option value="SOLUDOS">SOLUDOS</option>
									<option value="SOMNY">SOMNY</option>
									<option value="SONATA">SONATA</option>
									<option value="SONICVIBZ">SONICVIBZ</option>
									<option value="SONY">SONY</option>
									<option value="SORTA">SORTA</option>
									<option value="SOUL">SOUL</option>
									<option value="SOUND BOSS">SOUND BOSS</option>
									<option value="SOUNDBOT">SOUNDBOT</option>
									<option value="SOUNDLOGIC">SOUNDLOGIC</option>
									<option value="SOUNDMAGIC">SOUNDMAGIC</option>
									<option value="SPALDING">SPALDING</option>
									<option value="SPAN">SPAN</option>
									<option value="SPANDANA">SPANDANA</option>
									<option value="SPARKS">SPARKS</option>
									<option value="SPARSH">SPARSH</option>
									<option value="SPARX">SPARX</option>
									<option value="SPC INTERNET">SPC INTERNET</option>
									<option value="SPEED LINK">SPEED LINK</option>
									<option value="SPEEDO">SPEEDO</option>
									<option value="SPEX JET">SPEX JET</option>
									<option value="SPHERE">SPHERE</option>
									<option value="SPICE ART">SPICE ART</option>
									<option value="SPIDERMAN">SPIDERMAN</option>
									<option value="SPINN">SPINN</option>
									<option value="SPINN YEEZY">SPINN YEEZY</option>
									<option value="SPIRITUS BY PANTALOONS">SPIRITUS BY PANTALOONS</option>
									<option value="SPLASH">SPLASH</option>
									<option value="SPORT">SPORT</option>
									<option value="SPORTS">SPORTS</option>
									<option value="SPORTS &amp; BEYONDS">SPORTS &amp; BEYONDS</option>
									<option value="SPORTS 52">SPORTS 52</option>
									<option value="SPRING BREAK">SPRING BREAK</option>
									<option value="SPRINGFIELD">SPRINGFIELD</option>
									<option value="SPRITE">SPRITE</option>
									<option value="SPUNK">SPUNK</option>
									<option value="SPYKAR">SPYKAR</option>
									<option value="SPYKI">SPYKI</option>
									<option value="SROTA">SROTA</option>
									<option value="SS">SS</option>
									<option value="SS(SOFT PRO)">SS(SOFT PRO)</option>
									<option value="SSTAR">SSTAR</option>
									<option value="ST HOLII">ST HOLII</option>
									<option value="ST MARTIN">ST MARTIN</option>
									<option value="STAEDTLER">STAEDTLER</option>
									<option value="STAG">STAG</option>
									<option value="STANLEY">STANLEY</option>
									<option value="STAR COLLECTION">STAR COLLECTION</option>
									<option value="STARLO">STARLO</option>
									<option value="STARWARS">STARWARS</option>
									<option value="STATUS QUO">STATUS QUO</option>
									<option value="STAYFREE">STAYFREE</option>
									<option value="STEDMAN">STEDMAN</option>
									<option value="STEEL SERIES">STEEL SERIES</option>
									<option value="STEELO">STEELO</option>
									<option value="STEELSERIES">STEELSERIES</option>
									<option value="STELLA RICCI">STELLA RICCI</option>
									<option value="STEVE MADDEN">STEVE MADDEN</option>
									<option value="STIGA">STIGA</option>
									<option value="STIN">STIN</option>
									<option value="STK">STK</option>
									<option value="STOLN">STOLN</option>
									<option value="STREAX">STREAX</option>
									<option value="STREET FUEL">STREET FUEL</option>
									<option value="STREET NIGHT">STREET NIGHT</option>
									<option value="STRONTIUM">STRONTIUM</option>
									<option value="STUDIO">STUDIO</option>
									<option value="STUDIO MAX">STUDIO MAX</option>
									<option value="STURD">STURD</option>
									<option value="STYLE">STYLE</option>
									<option value="STYLE QUOTIENT">STYLE QUOTIENT</option>
									<option value="STYLE QUOTTENT">STYLE QUOTTENT</option>
									<option value="STYLISH">STYLISH</option>
									<option value="STYLOR">STYLOR</option>
									<option value="STYLOX">STYLOX</option>
									<option value="STYLUS">STYLUS</option>
									<option value="SUCCESS">SUCCESS</option>
									<option value="SUGAR RUSH">SUGAR RUSH</option>
									<option value="SUGARUSH">SUGARUSH</option>
									<option value="SUGRU">SUGRU</option>
									<option value="SUMMARY">SUMMARY</option>
									<option value="SUMMERCOOL">SUMMERCOOL</option>
									<option value="SUN KIDS">SUN KIDS</option>
									<option value="SUNBABY">SUNBABY</option>
									<option value="SUNBABY">SUNBABY</option>
									<option value="SUNBAY">SUNBAY</option>
									<option value="SUNFLOWER">SUNFLOWER</option>
									<option value="SUNGLASSES">SUNGLASSES</option>
									<option value="SUNSUN">SUNSUN</option>
									<option value="SUNTOP">SUNTOP</option>
									<option value="SUPER DRY">SUPER DRY</option>
									<option value="SUPER KNIT">SUPER KNIT</option>
									<option value="SUPERMAN">SUPERMAN</option>
									<option value="SUPERSTAR">SUPERSTAR</option>
									<option value="SURF EXCEL">SURF EXCEL</option>
									<option value="SWATCH">SWATCH</option>
									<option value="SWAYAM">SWAYAM</option>
									<option value="SWEEKASH">SWEEKASH</option>
									<option value="SWEET DREAMS">SWEET DREAMS</option>
									<option value="SWIMWEAR">SWIMWEAR</option>
									<option value="SWISS">SWISS</option>
									<option value="SWISS ALPS">SWISS ALPS</option>
									<option value="SWISS DESIGN">SWISS DESIGN</option>
									<option value="SWISS DIOR">SWISS DIOR</option>
									<option value="SWISS EAGLE">SWISS EAGLE</option>
									<option value="SWISS GIRL">SWISS GIRL</option>
									<option value="SWISS MILITARY">SWISS MILITARY</option>
									<option value="SWISSEAGLE">SWISSEAGLE</option>
									<option value="SWISSVOICE">SWISSVOICE</option>
									<option value="SYBA">SYBA</option>
									<option value="SYMA">SYMA</option>
									<option value="SYSKA">SYSKA</option>
									<option value="T 56">T 56</option>
									<option value="T BASE">T BASE</option>
									<option value="T-BASE">T-BASE</option>
									<option value="TAGOS">TAGOS</option>
									<option value="TAMINGTON HOUSE">TAMINGTON HOUSE</option>
									<option value="TAMPO">TAMPO</option>
									<option value="TAMRON">TAMRON</option>
									<option value="TAN">TAN</option>
									<option value="TANG">TANG</option>
									<option value="TANGO">TANGO</option>
									<option value="TANGRAM">TANGRAM</option>
									<option value="TANISI DESIGN">TANISI DESIGN</option>
									<option value="TANYA">TANYA</option>
									<option value="TAONIUCHAOPIN">TAONIUCHAOPIN</option>
									<option value="TARGET">TARGET</option>
									<option value="TARGUS">TARGUS</option>
									<option value="TARRINGTON HOUSE">TARRINGTON HOUSE</option>
									<option value="TASRIKA">TASRIKA</option>
									<option value="TATA SAMPANN">TATA SAMPANN</option>
									<option value="TC">TC</option>
									<option value="TE CONNECTIVITY">TE CONNECTIVITY</option>
									<option value="TEAM SPIRIT">TEAM SPIRIT</option>
									<option value="TECH ARMOR">TECH ARMOR</option>
									<option value="TECH FISH">TECH FISH</option>
									<option value="TEEJ">TEEJ</option>
									<option value="TEENA">TEENA</option>
									<option value="TEES">TEES</option>
									<option value="TEFAL">TEFAL</option>
									<option value="TEKFUSION">TEKFUSION</option>
									<option value="TELFUSION">TELFUSION</option>
									<option value="TEMPER">TEMPER</option>
									<option value="TEN ON TEN">TEN ON TEN</option>
									<option value="TENA">TENA</option>
									<option value="TENDA">TENDA</option>
									<option value="TENOR">TENOR</option>
									<option value="TERA BYTE">TERA BYTE</option>
									<option value="TERABYTE">TERABYTE</option>
									<option value="TERRAVULC">TERRAVULC</option>
									<option value="TESAFILM">TESAFILM</option>
									<option value="TETLEY">TETLEY</option>
									<option value="TEX SPORT CONCEPT">TEX SPORT CONCEPT</option>
									<option value="TEX SPORTS CONCEPT">TEX SPORTS CONCEPT</option>
									<option value="TEXAS">TEXAS</option>
									<option value="TEXCO">TEXCO</option>
									<option value="THE CAR LAUNDRY">THE CAR LAUNDRY</option>
									<option value="THE CHILDREN'S PLACE">THE CHILDREN'S PLACE</option>
									<option value="THE COLLECTION">THE COLLECTION</option>
									<option value="THE DESIGN VILLAGE">THE DESIGN VILLAGE</option>
									<option value="THE GOODLUCK">THE GOODLUCK</option>
									<option value="THE GUDLOOK">THE GUDLOOK</option>
									<option value="THE INDIAN GARAGE">THE INDIAN GARAGE</option>
									<option value="THE PRIVILEGE CLUB">THE PRIVILEGE CLUB</option>
									<option value="THE ROCKE">THE ROCKE</option>
									<option value="THE TRUNK">THE TRUNK</option>
									<option value="THE TRUNK LABEL">THE TRUNK LABEL</option>
									<option value="THE VANCA">THE VANCA</option>
									<option value="THE VERTICAL">THE VERTICAL</option>
									<option value="THE WHITE WILLOW">THE WHITE WILLOW</option>
									<option value="THEME">THEME</option>
									<option value="THERMOCOT">THERMOCOT</option>
									<option value="THRUSTMASTER">THRUSTMASTER</option>
									<option value="TIKTAULI">TIKTAULI</option>
									<option value="TIME MACHINE">TIME MACHINE</option>
									<option value="TIMEX">TIMEX</option>
									<option value="TIPPY">TIPPY</option>
									<option value="TIPTOPP">TIPTOPP</option>
									<option value="TIRAMISU">TIRAMISU</option>
									<option value="TITAN">TITAN</option>
									<option value="TITLIS">TITLIS</option>
									<option value="TIZUM">TIZUM</option>
									<option value="TOKYO CHOCS">TOKYO CHOCS</option>
									<option value="TOKYO TALKIES">TOKYO TALKIES</option>
									<option value="TOM &amp; JERRY">TOM &amp; JERRY</option>
									<option value="TOMMY HILFIGER">TOMMY HILFIGER</option>
									<option value="TOMMY W-SLG">TOMMY W-SLG</option>
									<option value="TONG GARDEN">TONG GARDEN</option>
									<option value="TOO YUMM!">TOO YUMM!</option>
									<option value="TOPAZE">TOPAZE</option>
									<option value="TOPS AND TUNICS">TOPS AND TUNICS</option>
									<option value="TOPWARE">TOPWARE</option>
									<option value="TORRINI">TORRINI</option>
									<option value="TORTOISE">TORTOISE</option>
									<option value="TOSAA">TOSAA</option>
									<option value="TOSHIBA">TOSHIBA</option>
									<option value="TOSHIKA">TOSHIKA</option>
									<option value="TOUCH">TOUCH</option>
									<option value="TOUCH ME">TOUCH ME</option>
									<option value="TOUCH N BRUSH">TOUCH N BRUSH</option>
									<option value="TOWER">TOWER</option>
									<option value="TOY BALLOON">TOY BALLOON</option>
									<option value="TOY CRAFT">TOY CRAFT</option>
									<option value="TOY HOUSE">TOY HOUSE</option>
									<option value="TOYKRAFT">TOYKRAFT</option>
									<option value="TOYS FASHION">TOYS FASHION</option>
									<option value="TOYZONE">TOYZONE</option>
									<option value="TP LINK">TP LINK</option>
									<option value="TRAGUS">TRAGUS</option>
									<option value="TRANSCEND">TRANSCEND</option>
									<option value="TRAVEL ADDITIONS">TRAVEL ADDITIONS</option>
									<option value="TRAVEL BLUE">TRAVEL BLUE</option>
									<option value="TREND 18">TREND 18</option>
									<option value="TRENDY DIVA">TRENDY DIVA</option>
									<option value="TRENDY DIVVA">TRENDY DIVVA</option>
									<option value="TRENDYFROG">TRENDYFROG</option>
									<option value="TRESMODE">TRESMODE</option>
									<option value="TRIDENT GROUP">TRIDENT GROUP</option>
									<option value="TRIGGER">TRIGGER</option>
									<option value="TRIPLE THREE">TRIPLE THREE</option>
									<option value="TRIPOD">TRIPOD</option>
									<option value="TRISHAA BY PANTALOONS">TRISHAA BY PANTALOONS</option>
									<option value="TRIUMPH">TRIUMPH</option>
									<option value="TROJAN">TROJAN</option>
									<option value="TROPICANA">TROPICANA</option>
									<option value="TROUSER">TROUSER</option>
									<option value="TRUEWARE">TRUEWARE</option>
									<option value="TRUMPH">TRUMPH</option>
									<option value="TRUTEX">TRUTEX</option>
									<option value="TRYD">TRYD</option>
									<option value="TSX">TSX</option>
									<option value="TT DENIM">TT DENIM</option>
									<option value="TUPPERWARE">TUPPERWARE</option>
									<option value="TURBO">TURBO</option>
									<option value="TURTEX">TURTEX</option>
									<option value="TURTLE">TURTLE</option>
									<option value="TVS-GIRLING">TVS-GIRLING</option>
									<option value="TYKA">TYKA</option>
									<option value="TYNOR">TYNOR</option>
									<option value="TYR">TYR</option>
									<option value="TZARO">TZARO</option>
									<option value="U&amp;F">U&amp;F</option>
									<option value="U.S. POLO">U.S. POLO</option>
									<option value="U.S. POLO ASSN">U.S. POLO ASSN</option>
									<option value="UCB">UCB</option>
									<option value="UCLA">UCLA</option>
									<option value="UFFICI">UFFICI</option>
									<option value="UFO">UFO</option>
									<option value="UID FASHION">UID FASHION</option>
									<option value="ULTIMATE">ULTIMATE</option>
									<option value="ULTIMATE EARS">ULTIMATE EARS</option>
									<option value="UMADI'S">UMADI'S</option>
									<option value="UMBRO">UMBRO</option>
									<option value="UMM">UMM</option>
									<option value="UNDER ARMOR">UNDER ARMOR</option>
									<option value="UNDER ARMOUR">UNDER ARMOUR</option>
									<option value="UNI STYLE IMAGE">UNI STYLE IMAGE</option>
									<option value="UNIBIC">UNIBIC</option>
									<option value="UNIKA">UNIKA</option>
									<option value="UNITED">UNITED</option>
									<option value="UNITED COLOR OF BENETTON">UNITED COLOR OF BENETTON</option>
									<option value="UNITED TOY">UNITED TOY</option>
									<option value="UNKNOWN">UNKNOWN</option>
									<option value="UNLISTED">UNLISTED</option>
									<option value="UPC">UPC</option>
									<option value="URBAN">URBAN</option>
									<option value="URBAN HILLS">URBAN HILLS</option>
									<option value="URBAN RACE">URBAN RACE</option>
									<option value="URBAN RANGER BY PANTALOONS">URBAN RANGER BY PANTALOONS</option>
									<option value="URBAN TRIP">URBAN TRIP</option>
									<option value="URBAN YOGA">URBAN YOGA</option>
									<option value="URBANE">URBANE</option>
									<option value="URBANRACES">URBANRACES</option>
									<option value="US POLO">US POLO</option>
									<option value="USB">USB</option>
									<option value="USHA">USHA</option>
									<option value="USI">USI</option>
									<option value="USPA">USPA</option>
									<option value="UTB">UTB</option>
									<option value="V-GUARD">V-GUARD</option>
									<option value="V-MODA">V-MODA</option>
									<option value="VAISHMA">VAISHMA</option>
									<option value="VAISHNA">VAISHNA</option>
									<option value="VALINTA">VALINTA</option>
									<option value="VAN HEUSEN">VAN HEUSEN</option>
									<option value="VANI">VANI</option>
									<option value="VANISH">VANISH</option>
									<option value="VANS">VANS</option>
									<option value="VANSHIKA">VANSHIKA</option>
									<option value="VARANGA">VARANGA</option>
									<option value="VARGUS">VARGUS</option>
									<option value="VASELINE">VASELINE</option>
									<option value="VATIKA">VATIKA</option>
									<option value="VDOT">VDOT</option>
									<option value="VECTOR">VECTOR</option>
									<option value="VECTOR X">VECTOR X</option>
									<option value="VEEBA">VEEBA</option>
									<option value="VEET">VEET</option>
									<option value="VEGA">VEGA</option>
									<option value="VEGAS">VEGAS</option>
									<option value="VEMAX">VEMAX</option>
									<option value="VENICCE">VENICCE</option>
									<option value="VENICE">VENICE</option>
									<option value="VENUS">VENUS</option>
									<option value="VERO MODA">VERO MODA</option>
									<option value="VEROMODA">VEROMODA</option>
									<option value="VERSACE">VERSACE</option>
									<option value="VERTEX">VERTEX</option>
									<option value="VERTICAL">VERTICAL</option>
									<option value="VETTORIO FRATINI">VETTORIO FRATINI</option>
									<option value="VIAGGI">VIAGGI</option>
									<option value="VIAGRA">VIAGRA</option>
									<option value="VIBRAM">VIBRAM</option>
									<option value="VICKY">VICKY</option>
									<option value="VICTOR">VICTOR</option>
									<option value="VICTOR OPTIMUS">VICTOR OPTIMUS</option>
									<option value="VICTORIA SECRET">VICTORIA SECRET</option>
									<option value="VICTORINOX">VICTORINOX</option>
									<option value="VICTRORIA">VICTRORIA</option>
									<option value="VIDE CRAFT">VIDE CRAFT</option>
									<option value="VIDYATAB">VIDYATAB</option>
									<option value="VIFA">VIFA</option>
									<option value="VIHAN">VIHAN</option>
									<option value="VIM">VIM</option>
									<option value="VINTAGE">VINTAGE</option>
									<option value="VINUO">VINUO</option>
									<option value="VIP">VIP</option>
									<option value="VIRUS">VIRUS</option>
									<option value="VISA">VISA</option>
									<option value="VISHUDH">VISHUDH</option>
									<option value="VISKO">VISKO</option>
									<option value="VISSCO">VISSCO</option>
									<option value="VISTA">VISTA</option>
									<option value="VITAMINS">VITAMINS</option>
									<option value="VIVALDI">VIVALDI</option>
									<option value="VLCC">VLCC</option>
									<option value="VOAKA">VOAKA</option>
									<option value="VOI JEANS">VOI JEANS</option>
									<option value="VOLUME-9">VOLUME-9</option>
									<option value="VOX">VOX</option>
									<option value="VOXPOP">VOXPOP</option>
									<option value="VSS-AM">VSS-AM</option>
									<option value="VULCAN KNIGHT">VULCAN KNIGHT</option>
									<option value="VUVUZELA">VUVUZELA</option>
									<option value="VVOGUISH">VVOGUISH</option>
									<option value="W">W</option>
									<option value="WAC">WAC</option>
									<option value="WAHL">WAHL</option>
									<option value="WAL CLOCK">WAL CLOCK</option>
									<option value="WALK N STYLE">WALK N STYLE</option>
									<option value="WALMART">WALMART</option>
									<option value="WANXINDA">WANXINDA</option>
									<option value="WARDROBE">WARDROBE</option>
									<option value="WARNER">WARNER</option>
									<option value="WASSAVO">WASSAVO</option>
									<option value="WATERMAN">WATERMAN</option>
									<option value="WAV BLU">WAV BLU</option>
									<option value="WD">WD</option>
									<option value="WE PLAY">WE PLAY</option>
									<option value="WEAR YOUR MIND">WEAR YOUR MIND</option>
									<option value="WEB">WEB</option>
									<option value="WEB JEANS">WEB JEANS</option>
									<option value="WEIKFIELD">WEIKFIELD</option>
									<option value="WEINBANNER">WEINBANNER</option>
									<option value="WENS">WENS</option>
									<option value="WERKSTATT ZELT">WERKSTATT ZELT</option>
									<option value="WEST VOGUE">WEST VOGUE</option>
									<option value="WESTERN DIGITAL">WESTERN DIGITAL</option>
									<option value="WESTING HOUSE">WESTING HOUSE</option>
									<option value="WESTPORT">WESTPORT</option>
									<option value="WHERE YOUR MIND">WHERE YOUR MIND</option>
									<option value="WHIL">WHIL</option>
									<option value="WHISKAS">WHISKAS</option>
									<option value="WHISPER">WHISPER</option>
									<option value="WHITEBOARD">WHITEBOARD</option>
									<option value="WHITENOR">WHITENOR</option>
									<option value="WHITMOR">WHITMOR</option>
									<option value="WIKI">WIKI</option>
									<option value="WILDCRAFT">WILDCRAFT</option>
									<option value="WILDHORN">WILDHORN</option>
									<option value="WILLS">WILLS</option>
									<option value="WILLS LIFESTYLE">WILLS LIFESTYLE</option>
									<option value="WILSON">WILSON</option>
									<option value="WINEBERRY">WINEBERRY</option>
									<option value="WINFUN">WINFUN</option>
									<option value="WINS">WINS</option>
									<option value="WISHFUL">WISHFUL</option>
									<option value="WIZER">WIZER</option>
									<option value="WOLLEN SCARF">WOLLEN SCARF</option>
									<option value="WOLY">WOLY</option>
									<option value="WOMEN'S NEXT">WOMEN'S NEXT</option>
									<option value="WOMENS">WOMENS</option>
									<option value="WONDER WINGS">WONDER WINGS</option>
									<option value="WONDERCHEF">WONDERCHEF</option>
									<option value="WOODEN CHROME">WOODEN CHROME</option>
									<option value="WOODLAND">WOODLAND</option>
									<option value="WOODMAN">WOODMAN</option>
									<option value="WOODS">WOODS</option>
									<option value="WOTTAGIRL">WOTTAGIRL</option>
									<option value="WRANGLER">WRANGLER</option>
									<option value="WROGN">WROGN</option>
									<option value="WS">WS</option>
									<option value="WWE">WWE</option>
									<option value="WYATT">WYATT</option>
									<option value="WYM">WYM</option>
									<option value="X">X</option>
									<option value="XDYE">XDYE</option>
									<option value="XEROX">XEROX</option>
									<option value="XINGDA">XINGDA</option>
									<option value="Y&amp;F">Y&amp;F</option>
									<option value="YAMAHA">YAMAHA</option>
									<option value="YEBHI">YEBHI</option>
									<option value="YELLOW">YELLOW</option>
									<option value="YELLOW JEANS">YELLOW JEANS</option>
									<option value="YEP ME">YEP ME</option>
									<option value="YESICA">YESICA</option>
									<option value="YIFAN">YIFAN</option>
									<option value="YONEEDO">YONEEDO</option>
									<option value="YONEX">YONEX</option>
									<option value="YONKERS">YONKERS</option>
									<option value="YOROTO">YOROTO</option>
									<option value="YOUNG">YOUNG</option>
									<option value="YOUNG &amp; FREE">YOUNG &amp; FREE</option>
									<option value="YOUNG TREND">YOUNG TREND</option>
									<option value="YOUWECAN">YOUWECAN</option>
									<option value="ZAAB">ZAAB</option>
									<option value="ZAAP">ZAAP</option>
									<option value="ZAKK">ZAKK</option>
									<option value="ZARA">ZARA</option>
									<option value="ZEALOT">ZEALOT</option>
									<option value="ZEBRONICS">ZEBRONICS</option>
									<option value="ZECO">ZECO</option>
									<option value="ZEE STAR">ZEE STAR</option>
									<option value="ZEN GARDEN">ZEN GARDEN</option>
									<option value="ZET ZONE">ZET ZONE</option>
									<option value="ZHELIN">ZHELIN</option>
									<option value="ZIVAME">ZIVAME</option>
									<option value="ZIYAA">ZIYAA</option>
									<option value="ZODIAC">ZODIAC</option>
									<option value="ZOEY">ZOEY</option>
									<option value="ZOOOK">ZOOOK</option>
									<option value="ZOTAC">ZOTAC</option>
									<option value="ZOVI">ZOVI</option>
									<option value="ZTE">ZTE</option>
									<option value="ZULEMENTS">ZULEMENTS</option>
									<option value="ZWART">ZWART</option>
						</select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 257px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-brand_id-container"><span class="select2-selection__rendered" id="select2-brand_id-container" title="Brand..">Brand..</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
						<select class="form-control select2-hidden-accessible" style="max-width: 145px;padding:0!important;height:36px !important" id="edition_id" data-width="12%" data-style="btn-default btn-sm" tabindex="-1" aria-hidden="true">
				<option>Stock Edition...</option>
									<option value=""></option>
									<option value=""></option>
									<option value="85">85</option>
									<option value="47">47</option>
									<option value="3">3</option>
									<option value="5">5</option>
									<option value="[" "]"="">[""]</option>
									<option value="1">1</option>
									<option value="10">10</option>
									<option value="12">12</option>
									<option value="2">2</option>
									<option value="9">9</option>
									<option value="11">11</option>
									<option value="6">6</option>
									<option value="4">4</option>
									<option value="FKI-11.06.19">FKI-11.06.19</option>
									<option value="24">24</option>
									<option value="25">25</option>
									<option value="18">18</option>
									<option value="7">7</option>
									<option value="1.">1.</option>
									<option value="8">8</option>
									<option value="60">60</option>
									<option value="34">34</option>
									<option value="0">0</option>
									<option value="50">50</option>
									<option value="100">100</option>
									<option value="165">165</option>
									<option value="55">55</option>
									<option value="196">196</option>
									<option value="40">40</option>
									<option value="15">15</option>
									<option value="30">30</option>
									<option value="13">13</option>
									<option value="49">49</option>
									<option value="19">19</option>
									<option value="48">48</option>
									<option value="21">21</option>
									<option value="44">44</option>
									<option value="159">159</option>
									<option value="43">43</option>
									<option value="20">20</option>
									<option value="18476">18476</option>
									<option value="191">191</option>
									<option value="8+">8+</option>
									<option value="51">51</option>
									<option value="82">82</option>
									<option value="32">32</option>
									<option value="941">941</option>
									<option value="2.">2.</option>
									<option value="509">509</option>
									<option value="1299">1299</option>
									<option value="16">16</option>
									<option value="175">175</option>
									<option value="109">109</option>
									<option value="GROCERY_MARCH">GROCERY_MARCH</option>
									<option value="AMAL SIR">AMAL SIR</option>
									<option value="4 MAY 2019/JAIPURI">4 MAY 2019/JAIPURI</option>
									<option value="AR-07/06/2019">AR-07/06/2019</option>
									<option value="29">29</option>
									<option value="R.D.JULY">R.D.JULY</option>
									<option value="RD-13.08.19">RD-13.08.19</option>
									<option value="19-JUN">19-JUN</option>
									<option value="238">238</option>
									<option value="FKI-11.06.21">FKI-11.06.21</option>
									<option value="FKI-11.06.22">FKI-11.06.22</option>
									<option value="FKI-11.06.23">FKI-11.06.23</option>
									<option value="FKI-11.06.20">FKI-11.06.20</option>
									<option value="FKI-11.06.24">FKI-11.06.24</option>
									<option value="FKI-11.06.25">FKI-11.06.25</option>
									<option value="FKI-11.06.26">FKI-11.06.26</option>
									<option value="FKI-11.06.27">FKI-11.06.27</option>
									<option value="FKI-11.06.28">FKI-11.06.28</option>
									<option value="FKI-11.06.29">FKI-11.06.29</option>
									<option value="FKI-11.06.30">FKI-11.06.30</option>
									<option value="FKI-11.06.31">FKI-11.06.31</option>
									<option value="FKI-11.06.32">FKI-11.06.32</option>
									<option value="FKI-11.06.33">FKI-11.06.33</option>
									<option value="FKI-11.06.34">FKI-11.06.34</option>
									<option value="FKI-11.06.35">FKI-11.06.35</option>
									<option value="FKI-11.06.36">FKI-11.06.36</option>
									<option value="FKI-11.06.37">FKI-11.06.37</option>
									<option value="FKI-11.06.38">FKI-11.06.38</option>
									<option value="FKI-11.06.39">FKI-11.06.39</option>
									<option value="FKI-11.06.40">FKI-11.06.40</option>
									<option value="FKI-11.06.41">FKI-11.06.41</option>
									<option value="FKI-11.06.42">FKI-11.06.42</option>
									<option value="FKI-11.06.43">FKI-11.06.43</option>
									<option value="FKI-11.06.44">FKI-11.06.44</option>
									<option value="FKI-11.06.45">FKI-11.06.45</option>
									<option value="FKI-11.06.46">FKI-11.06.46</option>
									<option value="FKI-11.06.47">FKI-11.06.47</option>
									<option value="FKI-11.06.48">FKI-11.06.48</option>
									<option value="FKI-11.06.49">FKI-11.06.49</option>
									<option value="FKI-11.06.50">FKI-11.06.50</option>
									<option value="FKI-11.06.51">FKI-11.06.51</option>
									<option value="FKI-11.06.52">FKI-11.06.52</option>
									<option value="FKI-11.06.53">FKI-11.06.53</option>
									<option value="FKI-11.06.54">FKI-11.06.54</option>
									<option value="FKI-11.06.55">FKI-11.06.55</option>
									<option value="FKI-11.06.56">FKI-11.06.56</option>
									<option value="FKI-11.06.57">FKI-11.06.57</option>
									<option value="AMAL 10102019">AMAL 10102019</option>
									<option value="FKI.12.10.2019">FKI.12.10.2019</option>
									<option value="RATLAM RETURN 11/10/2019">RATLAM RETURN 11/10/2019</option>
									<option value="FKI.11.06.19">FKI.11.06.19</option>
									<option value="FKI.11.16.2019">FKI.11.16.2019</option>
									<option value="18.10.2019">18.10.2019</option>
									<option value="FKI.12.10.19">FKI.12.10.19</option>
									<option value="FKI-11.06.58">FKI-11.06.58</option>
									<option value="FKI-11.06.59">FKI-11.06.59</option>
									<option value="FKI-11.06.61">FKI-11.06.61</option>
									<option value="FKI-11.06.62">FKI-11.06.62</option>
									<option value="FKI-11.06.65">FKI-11.06.65</option>
									<option value="FKI-11.06.66">FKI-11.06.66</option>
									<option value="FKI-11.06.67">FKI-11.06.67</option>
									<option value="FKI-11.06.68">FKI-11.06.68</option>
									<option value="FKI-11.06.69">FKI-11.06.69</option>
									<option value="FKI-11.06.70">FKI-11.06.70</option>
									<option value="FKI-11.06.71">FKI-11.06.71</option>
									<option value="FKI-26.10.19">FKI-26.10.19</option>
									<option value="22">22</option>
									<option value="26/10/2019">26/10/2019</option>
									<option value="26/10/19">26/10/19</option>
									<option value="8514">8514</option>
									<option value="FKI-19.11.19">FKI-19.11.19</option>
									<option value="FKI-19.11.21">FKI-19.11.21</option>
									<option value="FKI-19.11.22">FKI-19.11.22</option>
									<option value="FKI-19.11.24">FKI-19.11.24</option>
									<option value="FKI-19.11.25">FKI-19.11.25</option>
									<option value="FKI-19.11.26">FKI-19.11.26</option>
									<option value="FKI-19.11.27">FKI-19.11.27</option>
									<option value="FKI-19.11.29">FKI-19.11.29</option>
									<option value="FKI-19.11.30">FKI-19.11.30</option>
									<option value="FKI-19.11.31">FKI-19.11.31</option>
									<option value="FKI-19.11.32">FKI-19.11.32</option>
									<option value="FKI-19.11.33">FKI-19.11.33</option>
									<option value="FKI-19.11.34">FKI-19.11.34</option>
									<option value="FKI-19.11.35">FKI-19.11.35</option>
									<option value="FKI-19.11.36">FKI-19.11.36</option>
									<option value="FKI-19.11.37">FKI-19.11.37</option>
									<option value="FKI-19.11.38">FKI-19.11.38</option>
									<option value="FKI-19.11.39">FKI-19.11.39</option>
									<option value="FKI-19.11.40">FKI-19.11.40</option>
									<option value="FKI-19.11.42">FKI-19.11.42</option>
									<option value="FKI-19.11.43">FKI-19.11.43</option>
									<option value="FKI-19.11.44">FKI-19.11.44</option>
									<option value="FKI-19.11.49">FKI-19.11.49</option>
									<option value="FKI-19.11.50">FKI-19.11.50</option>
									<option value="FKI-19.11.51">FKI-19.11.51</option>
									<option value="FKI-19.11.52">FKI-19.11.52</option>
									<option value="FKI-19.11.55">FKI-19.11.55</option>
									<option value="FKI-19.11.57">FKI-19.11.57</option>
									<option value="FKI-19.11.58">FKI-19.11.58</option>
									<option value="FKI-19.11.59">FKI-19.11.59</option>
									<option value="FKI-19.11.60">FKI-19.11.60</option>
									<option value="FKI-19.11.61">FKI-19.11.61</option>
									<option value="FKI-19.11.62">FKI-19.11.62</option>
									<option value="FKI-19.11.63">FKI-19.11.63</option>
									<option value="FKI-19.11.64">FKI-19.11.64</option>
									<option value="FKI-19.11.65">FKI-19.11.65</option>
									<option value="FKI-19.11.66">FKI-19.11.66</option>
									<option value="FKI-19.11.23">FKI-19.11.23</option>
									<option value="FKI-19.11.28">FKI-19.11.28</option>
									<option value="FKI-19.11.45">FKI-19.11.45</option>
									<option value="FKI-19.11.46">FKI-19.11.46</option>
									<option value="FKI-19.11.47">FKI-19.11.47</option>
									<option value="FKI-19.11.48">FKI-19.11.48</option>
									<option value="FKI-19.11.53">FKI-19.11.53</option>
									<option value="FKI-19.11.54">FKI-19.11.54</option>
									<option value="FKI-19.11.20">FKI-19.11.20</option>
									<option value="FKI-19.11.41">FKI-19.11.41</option>
									<option value="FKI-19.11.56">FKI-19.11.56</option>
									<option value="FKI-26.12.19">FKI-26.12.19</option>
									<option value="FKI-26.12.20">FKI-26.12.20</option>
									<option value="FKI-26.12.21">FKI-26.12.21</option>
									<option value="FKI-26.12.25">FKI-26.12.25</option>
									<option value="FKI-26.12.26">FKI-26.12.26</option>
									<option value="FKI-26.12.28">FKI-26.12.28</option>
									<option value="FKI-26.12.29">FKI-26.12.29</option>
									<option value="FKI-26.12.30">FKI-26.12.30</option>
									<option value="FKI-26.12.31">FKI-26.12.31</option>
									<option value="FKI-26.12.33">FKI-26.12.33</option>
									<option value="FKI-26.12.35">FKI-26.12.35</option>
									<option value="FKI-26.12.37">FKI-26.12.37</option>
									<option value="FKI-26.12.46">FKI-26.12.46</option>
									<option value="FKI-26.12.47">FKI-26.12.47</option>
									<option value="FKI-26.12.53">FKI-26.12.53</option>
									<option value="FKI-26.12.64">FKI-26.12.64</option>
									<option value="FKI-26.12.76">FKI-26.12.76</option>
									<option value="FKI-26.12.78">FKI-26.12.78</option>
									<option value="FKI-26.12.82">FKI-26.12.82</option>
									<option value="FKI-26.12.94">FKI-26.12.94</option>
									<option value="FKI-26.12.95">FKI-26.12.95</option>
									<option value="FKI-26.12.96">FKI-26.12.96</option>
									<option value="FKI-26.12.105">FKI-26.12.105</option>
									<option value="FKI-26.12.110">FKI-26.12.110</option>
									<option value="FKI-26.12.111">FKI-26.12.111</option>
									<option value="FKI-26.12.112">FKI-26.12.112</option>
									<option value="FKI-26.12.121">FKI-26.12.121</option>
									<option value="FKI-26.12.137">FKI-26.12.137</option>
									<option value="FKI-26.12.140">FKI-26.12.140</option>
									<option value="FKI-26.12.142">FKI-26.12.142</option>
									<option value="FKI-26.12.143">FKI-26.12.143</option>
									<option value="FKI-26.12.144">FKI-26.12.144</option>
									<option value="FKI-26.12.146">FKI-26.12.146</option>
									<option value="FKI-26.12.147">FKI-26.12.147</option>
									<option value="FKI-26.12.148">FKI-26.12.148</option>
									<option value="FKI-26.12.149">FKI-26.12.149</option>
									<option value="FKI-26.12.152">FKI-26.12.152</option>
									<option value="FKI-26.12.153">FKI-26.12.153</option>
									<option value="FKI-26.12.154">FKI-26.12.154</option>
									<option value="FKI-26.12.155">FKI-26.12.155</option>
									<option value="FKI-26.12.156">FKI-26.12.156</option>
									<option value="FKI-26.12.157">FKI-26.12.157</option>
									<option value="FKI-26.12.158">FKI-26.12.158</option>
									<option value="FKI-26.12.159">FKI-26.12.159</option>
									<option value="FKI-26.12.162">FKI-26.12.162</option>
									<option value="FKI-26.12.163">FKI-26.12.163</option>
									<option value="FKI-26.12.166">FKI-26.12.166</option>
									<option value="FKI-26.12.179">FKI-26.12.179</option>
									<option value="FKI-26.12.180">FKI-26.12.180</option>
									<option value="FKI-26.12.181">FKI-26.12.181</option>
									<option value="FKI-26.12.182">FKI-26.12.182</option>
									<option value="FKI-26.12.183">FKI-26.12.183</option>
									<option value="FKI-26.12.186">FKI-26.12.186</option>
									<option value="FKI-26.12.187">FKI-26.12.187</option>
									<option value="FKI-26.12.190">FKI-26.12.190</option>
									<option value="FKI-26.12.192">FKI-26.12.192</option>
									<option value="FKI-26.12.195">FKI-26.12.195</option>
									<option value="FKI-26.12.197">FKI-26.12.197</option>
									<option value="FKI-26.12.199">FKI-26.12.199</option>
									<option value="FKI-26.12.200">FKI-26.12.200</option>
									<option value="FKI-26.12.201">FKI-26.12.201</option>
									<option value="FKI-26.12.202">FKI-26.12.202</option>
									<option value="FKI-26.12.203">FKI-26.12.203</option>
									<option value="FKI-26.12.205">FKI-26.12.205</option>
									<option value="FKI-26.12.206">FKI-26.12.206</option>
									<option value="FKI-26.12.207">FKI-26.12.207</option>
									<option value="FKI-26.12.208">FKI-26.12.208</option>
									<option value="FKI-26.12.209">FKI-26.12.209</option>
									<option value="FKI-26.12.210">FKI-26.12.210</option>
									<option value="FKI-26.12.211">FKI-26.12.211</option>
									<option value="FKI-26.12.212">FKI-26.12.212</option>
									<option value="FKI-26.12.213">FKI-26.12.213</option>
									<option value="FKI-26.12.215">FKI-26.12.215</option>
									<option value="FKI-26.12.216">FKI-26.12.216</option>
									<option value="FKI-26.12.221">FKI-26.12.221</option>
									<option value="FKI-26.12.224">FKI-26.12.224</option>
									<option value="FKI-26.12.225">FKI-26.12.225</option>
									<option value="FKI-26.12.226">FKI-26.12.226</option>
									<option value="FKI-26.12.227">FKI-26.12.227</option>
									<option value="FKI-26.12.228">FKI-26.12.228</option>
									<option value="FKI-26.12.230">FKI-26.12.230</option>
									<option value="FKI-26.12.231">FKI-26.12.231</option>
									<option value="FKI-26.12.232">FKI-26.12.232</option>
									<option value="FKI-26.12.233">FKI-26.12.233</option>
									<option value="FKI-26.12.234">FKI-26.12.234</option>
									<option value="FKI-26.12.235">FKI-26.12.235</option>
									<option value="FKI-26.12.236">FKI-26.12.236</option>
									<option value="FKI-26.12.237">FKI-26.12.237</option>
									<option value="FKI-26.12.238">FKI-26.12.238</option>
									<option value="FKI-26.12.239">FKI-26.12.239</option>
									<option value="FKI-26.12.243">FKI-26.12.243</option>
									<option value="FKI-26.12.247">FKI-26.12.247</option>
									<option value="FKI-26.12.248">FKI-26.12.248</option>
									<option value="FKI-26.12.249">FKI-26.12.249</option>
									<option value="FKI-26.12.250">FKI-26.12.250</option>
									<option value="FKI-26.12.251">FKI-26.12.251</option>
									<option value="FKI-26.12.256">FKI-26.12.256</option>
									<option value="FKI-26.12.257">FKI-26.12.257</option>
									<option value="FKI-26.12.262">FKI-26.12.262</option>
									<option value="FKI-26.12.263">FKI-26.12.263</option>
									<option value="FKI-26.12.264">FKI-26.12.264</option>
									<option value="FKI-26.12.265">FKI-26.12.265</option>
									<option value="FKI-26.12.266">FKI-26.12.266</option>
									<option value="FKI-26.12.267">FKI-26.12.267</option>
									<option value="FKI-26.12.268">FKI-26.12.268</option>
									<option value="FKI-26.12.270">FKI-26.12.270</option>
									<option value="FKI-26.12.272">FKI-26.12.272</option>
									<option value="FKI-26.12.273">FKI-26.12.273</option>
									<option value="FKI-26.12.275">FKI-26.12.275</option>
									<option value="FKI-26.12.276">FKI-26.12.276</option>
									<option value="FKI-26.12.277">FKI-26.12.277</option>
									<option value="FKI-26.12.278">FKI-26.12.278</option>
									<option value="FKI-26.12.279">FKI-26.12.279</option>
									<option value="FKI-26.12.281">FKI-26.12.281</option>
									<option value="FKI-26.12.284">FKI-26.12.284</option>
									<option value="FKI-26.12.288">FKI-26.12.288</option>
									<option value="FKI-26.12.289">FKI-26.12.289</option>
									<option value="FKI-26.12.291">FKI-26.12.291</option>
									<option value="FKI-26.12.293">FKI-26.12.293</option>
									<option value="FKI-26.12.295">FKI-26.12.295</option>
									<option value="FKI-26.12.296">FKI-26.12.296</option>
									<option value="FKI-26.12.297">FKI-26.12.297</option>
									<option value="FKI-26.12.298">FKI-26.12.298</option>
									<option value="FKI-26.12.299">FKI-26.12.299</option>
									<option value="FKI-26.12.300">FKI-26.12.300</option>
									<option value="FKI-26.12.304">FKI-26.12.304</option>
									<option value="FKI-26.12.305">FKI-26.12.305</option>
									<option value="FKI-26.12.307">FKI-26.12.307</option>
									<option value="FKI-26.12.310">FKI-26.12.310</option>
									<option value="FKI-26.12.311">FKI-26.12.311</option>
									<option value="FKI-26.12.313">FKI-26.12.313</option>
									<option value="FKI-26.12.314">FKI-26.12.314</option>
									<option value="FKI-26.12.315">FKI-26.12.315</option>
									<option value="FKI-26.12.318">FKI-26.12.318</option>
									<option value="FKI-26.12.319">FKI-26.12.319</option>
									<option value="FKI-26.12.320">FKI-26.12.320</option>
									<option value="FKI-26.12.323">FKI-26.12.323</option>
									<option value="FKI-26.12.324">FKI-26.12.324</option>
									<option value="FKI-26.12.325">FKI-26.12.325</option>
									<option value="FKI-26.12.326">FKI-26.12.326</option>
									<option value="FKI-26.12.327">FKI-26.12.327</option>
									<option value="FKI-26.12.329">FKI-26.12.329</option>
									<option value="FKI-26.12.330">FKI-26.12.330</option>
									<option value="FKI-26.12.331">FKI-26.12.331</option>
									<option value="FKI-26.12.332">FKI-26.12.332</option>
									<option value="FKI-26.12.333">FKI-26.12.333</option>
									<option value="FKI-26.12.334">FKI-26.12.334</option>
									<option value="FKI-26.12.335">FKI-26.12.335</option>
									<option value="FKI-26.12.337">FKI-26.12.337</option>
									<option value="FKI-26.12.339">FKI-26.12.339</option>
									<option value="FKI-26.12.340">FKI-26.12.340</option>
									<option value="FKI-26.12.341">FKI-26.12.341</option>
									<option value="FKI-26.12.342">FKI-26.12.342</option>
									<option value="FKI-26.12.343">FKI-26.12.343</option>
									<option value="FKI-26.12.344">FKI-26.12.344</option>
									<option value="FKI-26.12.345">FKI-26.12.345</option>
									<option value="FKI-26.12.347">FKI-26.12.347</option>
									<option value="FKI-26.12.348">FKI-26.12.348</option>
									<option value="FKI-26.12.354">FKI-26.12.354</option>
									<option value="FKI-26.12.355">FKI-26.12.355</option>
									<option value="FKI-26.12.356">FKI-26.12.356</option>
									<option value="FKI-26.12.357">FKI-26.12.357</option>
									<option value="FKI-26.12.359">FKI-26.12.359</option>
									<option value="FKI-26.12.360">FKI-26.12.360</option>
									<option value="FKI-26.12.369">FKI-26.12.369</option>
									<option value="FKI-26.12.373">FKI-26.12.373</option>
									<option value="FKI-26.12.375">FKI-26.12.375</option>
									<option value="FKI-26.12.376">FKI-26.12.376</option>
									<option value="FKI-26.12.377">FKI-26.12.377</option>
									<option value="FKI-26.12.378">FKI-26.12.378</option>
									<option value="FKI-26.12.379">FKI-26.12.379</option>
									<option value="FKI-26.12.380">FKI-26.12.380</option>
									<option value="FKI-26.12.381">FKI-26.12.381</option>
									<option value="FKI-26.12.383">FKI-26.12.383</option>
									<option value="FKI-26.12.386">FKI-26.12.386</option>
									<option value="FKI-26.12.387">FKI-26.12.387</option>
									<option value="FKI-26.12.388">FKI-26.12.388</option>
									<option value="FKI-26.12.389">FKI-26.12.389</option>
									<option value="FKI-26.12.390">FKI-26.12.390</option>
									<option value="FKI-26.12.396">FKI-26.12.396</option>
									<option value="FKI-26.12.397">FKI-26.12.397</option>
									<option value="FKI-26.12.398">FKI-26.12.398</option>
									<option value="FKI-26.12.399">FKI-26.12.399</option>
									<option value="FKI-26.12.400">FKI-26.12.400</option>
									<option value="FKI-26.12.402">FKI-26.12.402</option>
									<option value="FKI-26.12.404">FKI-26.12.404</option>
									<option value="FKI-26.12.408">FKI-26.12.408</option>
									<option value="FKI-26.12.409">FKI-26.12.409</option>
									<option value="FKI-26.12.410">FKI-26.12.410</option>
									<option value="FKI-26.12.411">FKI-26.12.411</option>
									<option value="FKI-26.12.412">FKI-26.12.412</option>
									<option value="FKI-26.12.414">FKI-26.12.414</option>
									<option value="FKI-26.12.418">FKI-26.12.418</option>
									<option value="FKI-26.12.422">FKI-26.12.422</option>
									<option value="FKI-26.12.423">FKI-26.12.423</option>
									<option value="FKI-26.12.428">FKI-26.12.428</option>
									<option value="FKI-26.12.431">FKI-26.12.431</option>
									<option value="FKI-26.12.445">FKI-26.12.445</option>
									<option value="FKI-26.12.453">FKI-26.12.453</option>
									<option value="FKI-26.12.459">FKI-26.12.459</option>
									<option value="FKI-26.12.460">FKI-26.12.460</option>
									<option value="FKI-26.12.461">FKI-26.12.461</option>
									<option value="FKI-26.12.462">FKI-26.12.462</option>
									<option value="FKI-26.12.464">FKI-26.12.464</option>
									<option value="FKI-26.12.465">FKI-26.12.465</option>
									<option value="FKI-26.12.466">FKI-26.12.466</option>
									<option value="FKI-26.12.467">FKI-26.12.467</option>
									<option value="FKI-26.12.468">FKI-26.12.468</option>
									<option value="FKI-26.12.469">FKI-26.12.469</option>
									<option value="FKI-26.12.471">FKI-26.12.471</option>
									<option value="FKI-26.12.472">FKI-26.12.472</option>
									<option value="FKI-26.12.484">FKI-26.12.484</option>
									<option value="FKI-26.12.497">FKI-26.12.497</option>
									<option value="FKI-26.12.498">FKI-26.12.498</option>
									<option value="FKI-26.12.499">FKI-26.12.499</option>
									<option value="FKI-26.12.502">FKI-26.12.502</option>
									<option value="FKI-26.12.503">FKI-26.12.503</option>
									<option value="FKI-26.12.504">FKI-26.12.504</option>
									<option value="FKI-26.12.507">FKI-26.12.507</option>
									<option value="FKI-26.12.508">FKI-26.12.508</option>
									<option value="FKI-26.12.509">FKI-26.12.509</option>
									<option value="FKI-26.12.513">FKI-26.12.513</option>
									<option value="FKI-26.12.518">FKI-26.12.518</option>
									<option value="FKI-26.12.521">FKI-26.12.521</option>
									<option value="FKI-26.12.522">FKI-26.12.522</option>
									<option value="FKI-26.12.546">FKI-26.12.546</option>
									<option value="FKI-26.12.547">FKI-26.12.547</option>
									<option value="FKI-26.12.548">FKI-26.12.548</option>
									<option value="FKI-26.12.549">FKI-26.12.549</option>
									<option value="FKI-26.12.551">FKI-26.12.551</option>
									<option value="FKI-26.12.552">FKI-26.12.552</option>
									<option value="FKI-26.12.553">FKI-26.12.553</option>
									<option value="FKI-26.12.555">FKI-26.12.555</option>
									<option value="FKI-26.12.556">FKI-26.12.556</option>
									<option value="FKI-26.12.557">FKI-26.12.557</option>
									<option value="FKI-26.12.559">FKI-26.12.559</option>
									<option value="FKI-26.12.560">FKI-26.12.560</option>
									<option value="FKI-26.12.561">FKI-26.12.561</option>
									<option value="FKI-26.12.562">FKI-26.12.562</option>
									<option value="FKI-26.12.563">FKI-26.12.563</option>
									<option value="FKI-26.12.565">FKI-26.12.565</option>
									<option value="FKI-26.12.567">FKI-26.12.567</option>
									<option value="FKI-26.12.568">FKI-26.12.568</option>
									<option value="FKI-26.12.569">FKI-26.12.569</option>
									<option value="FKI-26.12.570">FKI-26.12.570</option>
									<option value="FKI-26.12.571">FKI-26.12.571</option>
									<option value="FKI-26.12.572">FKI-26.12.572</option>
									<option value="FKI-26.12.573">FKI-26.12.573</option>
									<option value="FKI-26.12.574">FKI-26.12.574</option>
									<option value="FKI-26.12.575">FKI-26.12.575</option>
									<option value="FKI-26.12.576">FKI-26.12.576</option>
									<option value="FKI-26.12.577">FKI-26.12.577</option>
									<option value="FKI-26.12.581">FKI-26.12.581</option>
									<option value="FKI-26.12.583">FKI-26.12.583</option>
									<option value="FKI-26.12.585">FKI-26.12.585</option>
									<option value="FKI-26.12.586">FKI-26.12.586</option>
									<option value="FKI-26.12.588">FKI-26.12.588</option>
									<option value="FKI-26.12.589">FKI-26.12.589</option>
									<option value="FKI-26.12.591">FKI-26.12.591</option>
									<option value="FKI-26.12.596">FKI-26.12.596</option>
									<option value="FKI-26.12.598">FKI-26.12.598</option>
									<option value="FKI-26.12.601">FKI-26.12.601</option>
									<option value="FKI-26.12.603">FKI-26.12.603</option>
									<option value="FKI-26.12.605">FKI-26.12.605</option>
									<option value="FKI-26.12.607">FKI-26.12.607</option>
									<option value="FKI-26.12.609">FKI-26.12.609</option>
									<option value="FKI-26.12.613">FKI-26.12.613</option>
									<option value="FKI-26.12.614">FKI-26.12.614</option>
									<option value="FKI-26.12.618">FKI-26.12.618</option>
									<option value="FKI-26.12.619">FKI-26.12.619</option>
									<option value="FKI-26.12.628">FKI-26.12.628</option>
									<option value="FKI-26.12.629">FKI-26.12.629</option>
									<option value="FKI-26.12.631">FKI-26.12.631</option>
									<option value="FKI-26.12.632">FKI-26.12.632</option>
									<option value="FKI-26.12.633">FKI-26.12.633</option>
									<option value="FKI-26.12.634">FKI-26.12.634</option>
									<option value="FKI-26.12.635">FKI-26.12.635</option>
									<option value="FKI-26.12.636">FKI-26.12.636</option>
									<option value="FKI-26.12.639">FKI-26.12.639</option>
									<option value="FKI-26.12.640">FKI-26.12.640</option>
									<option value="FKI-26.12.641">FKI-26.12.641</option>
									<option value="FKI-26.12.642">FKI-26.12.642</option>
									<option value="FKI-26.12.646">FKI-26.12.646</option>
									<option value="FKI-26.12.647">FKI-26.12.647</option>
									<option value="FKI-26.12.648">FKI-26.12.648</option>
									<option value="FKI-26.12.650">FKI-26.12.650</option>
									<option value="FKI-26.12.653">FKI-26.12.653</option>
									<option value="FKI-26.12.657">FKI-26.12.657</option>
									<option value="FKI-26.12.658">FKI-26.12.658</option>
									<option value="FKI-26.12.659">FKI-26.12.659</option>
									<option value="FKI-26.12.660">FKI-26.12.660</option>
									<option value="FKI-26.12.661">FKI-26.12.661</option>
									<option value="FKI-26.12.664">FKI-26.12.664</option>
									<option value="FKI-26.12.665">FKI-26.12.665</option>
									<option value="FKI-26.12.666">FKI-26.12.666</option>
									<option value="FKI-26.12.667">FKI-26.12.667</option>
									<option value="FKI-26.12.672">FKI-26.12.672</option>
									<option value="FKI-26.12.673">FKI-26.12.673</option>
									<option value="FKI-26.12.675">FKI-26.12.675</option>
									<option value="FKI-26.12.678">FKI-26.12.678</option>
									<option value="FKI-26.12.679">FKI-26.12.679</option>
									<option value="FKI-26.12.681">FKI-26.12.681</option>
									<option value="FKI-26.12.682">FKI-26.12.682</option>
									<option value="FKI-26.12.684">FKI-26.12.684</option>
									<option value="FKI-26.12.685">FKI-26.12.685</option>
									<option value="FKI-26.12.687">FKI-26.12.687</option>
									<option value="FKI-26.12.688">FKI-26.12.688</option>
									<option value="FKI-26.12.689">FKI-26.12.689</option>
									<option value="FKI-26.12.690">FKI-26.12.690</option>
									<option value="FKI-26.12.692">FKI-26.12.692</option>
									<option value="FKI-26.12.696">FKI-26.12.696</option>
									<option value="FKI-26.12.700">FKI-26.12.700</option>
									<option value="FKI-26.12.701">FKI-26.12.701</option>
									<option value="FKI-26.12.702">FKI-26.12.702</option>
									<option value="FKI-26.12.703">FKI-26.12.703</option>
									<option value="FKI-26.12.704">FKI-26.12.704</option>
									<option value="FKI-26.12.706">FKI-26.12.706</option>
									<option value="FKI-26.12.707">FKI-26.12.707</option>
									<option value="FKI-26.12.708">FKI-26.12.708</option>
									<option value="FKI-26.12.709">FKI-26.12.709</option>
									<option value="FKI-26.12.712">FKI-26.12.712</option>
									<option value="FKI-26.12.713">FKI-26.12.713</option>
									<option value="FKI-26.12.714">FKI-26.12.714</option>
									<option value="FKI-26.12.716">FKI-26.12.716</option>
									<option value="FKI-26.12.717">FKI-26.12.717</option>
									<option value="FKI-26.12.720">FKI-26.12.720</option>
									<option value="FKI-26.12.722">FKI-26.12.722</option>
									<option value="FKI-26.12.724">FKI-26.12.724</option>
									<option value="FKI-26.12.725">FKI-26.12.725</option>
									<option value="FKI-26.12.727">FKI-26.12.727</option>
									<option value="FKI-26.12.731">FKI-26.12.731</option>
									<option value="FKI-26.12.733">FKI-26.12.733</option>
									<option value="FKI-26.12.737">FKI-26.12.737</option>
									<option value="FKI-26.12.747">FKI-26.12.747</option>
									<option value="FKI-26.12.749">FKI-26.12.749</option>
									<option value="FKI-26.12.753">FKI-26.12.753</option>
									<option value="FKI-26.12.754">FKI-26.12.754</option>
									<option value="FKI-26.12.755">FKI-26.12.755</option>
									<option value="FKI-26.12.756">FKI-26.12.756</option>
									<option value="FKI-26.01.20">FKI-26.01.20</option>
									<option value="FKI-20.12.19">FKI-20.12.19</option>
									<option value="FKI-06.02.20">FKI-06.02.20</option>
									<option value="FKI-06.02.21">FKI-06.02.21</option>
									<option value="FKI-06.02.22">FKI-06.02.22</option>
									<option value="FKI-06.02.23">FKI-06.02.23</option>
									<option value="FKI-06.02.24">FKI-06.02.24</option>
									<option value="FKI-06.02.25">FKI-06.02.25</option>
									<option value="FKI-06.02.27">FKI-06.02.27</option>
									<option value="FKI-06.02.28">FKI-06.02.28</option>
									<option value="FKI-06.02.29">FKI-06.02.29</option>
									<option value="FKI-06.02.31">FKI-06.02.31</option>
									<option value="FKI-06.02.34">FKI-06.02.34</option>
									<option value="FKI-06.02.35">FKI-06.02.35</option>
									<option value="FKI-06.02.37">FKI-06.02.37</option>
									<option value="FKI-06.02.38">FKI-06.02.38</option>
									<option value="FKI-06.02.39">FKI-06.02.39</option>
									<option value="FKI-06.02.40">FKI-06.02.40</option>
									<option value="FKI-06.02.42">FKI-06.02.42</option>
									<option value="FKI-06.02.43">FKI-06.02.43</option>
									<option value="FKI-06.02.44">FKI-06.02.44</option>
									<option value="FKI-06.02.45">FKI-06.02.45</option>
									<option value="FKI-06.02.46">FKI-06.02.46</option>
									<option value="FKI-06.02.47">FKI-06.02.47</option>
									<option value="FKI-06.02.48">FKI-06.02.48</option>
									<option value="FKI-06.02.49">FKI-06.02.49</option>
									<option value="FKI-06.02.50">FKI-06.02.50</option>
									<option value="FKI-06.02.51">FKI-06.02.51</option>
									<option value="FKI-06.02.52">FKI-06.02.52</option>
									<option value="FKI-06.02.53">FKI-06.02.53</option>
									<option value="FKI-06.02.54">FKI-06.02.54</option>
									<option value="FKI-06.02.55">FKI-06.02.55</option>
									<option value="FKI-06.02.56">FKI-06.02.56</option>
									<option value="FKI-06.02.57">FKI-06.02.57</option>
									<option value="FKI-06.02.58">FKI-06.02.58</option>
									<option value="FKI-06.02.59">FKI-06.02.59</option>
									<option value="FKI-06.02.60">FKI-06.02.60</option>
									<option value="FKI-06.02.62">FKI-06.02.62</option>
									<option value="FKI-06.02.63">FKI-06.02.63</option>
									<option value="FKI-06.02.64">FKI-06.02.64</option>
									<option value="FKI-06.02.65">FKI-06.02.65</option>
									<option value="FKI-06.02.66">FKI-06.02.66</option>
									<option value="FKI-06.02.67">FKI-06.02.67</option>
									<option value="FKI-06.02.68">FKI-06.02.68</option>
									<option value="FKI-06.02.69">FKI-06.02.69</option>
									<option value="FKI-06.02.70">FKI-06.02.70</option>
									<option value="FKI-06.02.71">FKI-06.02.71</option>
									<option value="FKI-06.02.72">FKI-06.02.72</option>
									<option value="FKI-06.02.73">FKI-06.02.73</option>
									<option value="FKI-06.02.74">FKI-06.02.74</option>
									<option value="FKI-06.02.75">FKI-06.02.75</option>
									<option value="FKI-06.02.76">FKI-06.02.76</option>
									<option value="FKI-06.02.77">FKI-06.02.77</option>
									<option value="FKI-06.02.78">FKI-06.02.78</option>
									<option value="FKI-06.02.79">FKI-06.02.79</option>
									<option value="FKI-06.02.80">FKI-06.02.80</option>
									<option value="FKI-06.02.81">FKI-06.02.81</option>
									<option value="FKI-06.02.82">FKI-06.02.82</option>
									<option value="FKI-06.02.83">FKI-06.02.83</option>
									<option value="FKI-06.02.85">FKI-06.02.85</option>
									<option value="FKI-11-1-20">FKI-11-1-20</option>
									<option value="FKI-11-1-21">FKI-11-1-21</option>
									<option value="FKI-11-1-22">FKI-11-1-22</option>
									<option value="FKI-11-1-23">FKI-11-1-23</option>
									<option value="FKI-11-1-24">FKI-11-1-24</option>
									<option value="FKI-11-1-25">FKI-11-1-25</option>
									<option value="FKI-11-1-26">FKI-11-1-26</option>
									<option value="FKI-11-1-27">FKI-11-1-27</option>
									<option value="FKI-15-1-20">FKI-15-1-20</option>
									<option value="FKI-15-1-21">FKI-15-1-21</option>
									<option value="FKI-15-1-23">FKI-15-1-23</option>
									<option value="FKI-15-1-24">FKI-15-1-24</option>
									<option value="FKI-15-1-25">FKI-15-1-25</option>
									<option value="FKI-15-1-26">FKI-15-1-26</option>
									<option value="FKI-15-1-27">FKI-15-1-27</option>
									<option value="FKI-15-1-28">FKI-15-1-28</option>
									<option value="FKI-15-1-29">FKI-15-1-29</option>
									<option value="FKI-15-1-30">FKI-15-1-30</option>
									<option value="UI-14-2-20">UI-14-2-20</option>
									<option value="UI-14-2-21">UI-14-2-21</option>
									<option value="UI-14-2-22">UI-14-2-22</option>
									<option value="UI-14-2-23">UI-14-2-23</option>
									<option value="UI-14-2-24">UI-14-2-24</option>
									<option value="UI-14-2-25">UI-14-2-25</option>
									<option value="UI-14-2-26">UI-14-2-26</option>
									<option value="UI-14-2-27">UI-14-2-27</option>
									<option value="UI-14-2-28">UI-14-2-28</option>
									<option value="UI-14-2-29">UI-14-2-29</option>
									<option value="UI-14-2-30">UI-14-2-30</option>
									<option value="UI-14-2-31">UI-14-2-31</option>
									<option value="UI-14-2-32">UI-14-2-32</option>
									<option value="UI-14-2-33">UI-14-2-33</option>
									<option value="UI-14-2-34">UI-14-2-34</option>
									<option value="UI-14-2-35">UI-14-2-35</option>
									<option value="UI-14-2-37">UI-14-2-37</option>
									<option value="UI-14-2-38">UI-14-2-38</option>
									<option value="UI-14-2-40">UI-14-2-40</option>
									<option value="UI-14-2-41">UI-14-2-41</option>
									<option value="UI-14-2-42">UI-14-2-42</option>
									<option value="UI-14-2-44">UI-14-2-44</option>
									<option value="UI-14-2-45">UI-14-2-45</option>
									<option value="UI-14-2-46">UI-14-2-46</option>
									<option value="UI-14-2-36">UI-14-2-36</option>
									<option value="UI-19-2-20">UI-19-2-20</option>
									<option value="UI 19-2-20">UI 19-2-20</option>
									<option value="FKI-24.2.20">FKI-24.2.20</option>
									<option value="FKI-23.2.20">FKI-23.2.20</option>
									<option value="FKI-23.2.21">FKI-23.2.21</option>
									<option value="FKI-23.2.22">FKI-23.2.22</option>
									<option value="FKI-23.2.23">FKI-23.2.23</option>
									<option value="FKI-23.2.24">FKI-23.2.24</option>
									<option value="FKI-23.2.25">FKI-23.2.25</option>
									<option value="FKI-23.2.26">FKI-23.2.26</option>
									<option value="FKI-23.2.27">FKI-23.2.27</option>
									<option value="FKI-23.2.28">FKI-23.2.28</option>
									<option value="FKI-23.2.29">FKI-23.2.29</option>
									<option value="FKI-23.2.30">FKI-23.2.30</option>
									<option value="FKI-23.2.31">FKI-23.2.31</option>
									<option value="FKI-23.2.32">FKI-23.2.32</option>
									<option value="5-MAR-20">5-MAR-20</option>
									<option value="UMATH 17-3-19">UMATH 17-3-19</option>
									<option value="FKI 16.3.20">FKI 16.3.20</option>
									<option value="FKI-18.3.18">FKI-18.3.18</option>
						</select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 12%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-edition_id-container"><span class="select2-selection__rendered" id="select2-edition_id-container" title="Stock Edition...">Stock Edition...</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
			<input style="width: 20%;" placeholder="Search" id="serch_item" class="pull-right form-control input-sm">
			
	    </div>   
	</div>
	<div class="clearfix"></div>
	<div id="table_holder" class="text-center" style="margin-top:16px;overflow-x:auto">
<script type="text/javascript">

	$(document).ready(function(){
     	 //for table row
  		$("tr:odd").css("background-color", "#f9f9f9");
  		$("#table123").css("width","100%");
  		$("#table123").css("display"," table-caption");

		});

	$(document).ready( function () {
    	$('#table123').DataTable({
    		 "lengthMenu": [[25, 50, -1], [10, 25, 50, "All"]],
    		'bJQueryUI': true,
    		'bAutoWidth': false,
    		'bSortClasses': false,
    		"bPaginate": true,
        	"bFilter": false,
        	"pagingType": "full_numbers",
        	dom: 'Bfrtip',
	        order: [[0, 'desc']],
	        buttons: [
	          'copy', 'csv', 'excel', 'pdf', 'print'
	        ]
        	        	,"columnDefs": [ {
				"targets": 0,
				"orderable": false
			} ]
		        });
	});
	dialog_support.init("a.modal-dlg, button.modal-dlg-wide");


$(document).ready(function () {
	
	$('.sub_chk').on('click', function(e) {
		$('#delete').attr("disabled", false);
		$('#bulk_edit').attr("disabled", false);
		
	});

	$(document).on('click','.sub_chk , #master',function(e) {
		if ($(".sub_chk").is(":checked")==false) {
			$('#delete').attr("disabled", true)	
			$('#bulk_edit').attr("disabled", false);
		}
		else{
			$('#bulk_edit').attr("disabled", false);
		}
	});	


    $('#master').on('click', function(e) {
       if($(this).is(':checked',true))  
        {
        	$('#delete').attr("disabled", false);
           $(".sub_chk").prop('checked', true);  
           $('#bulk_edit').attr("disabled", false);
         }
         else {  
            $(".sub_chk").prop('checked',false);
            $('#bulk_edit').attr("disabled", true);  
         }  
    });

     $('#delete').on('click', function(e) {
         var allVals = [];  
        $(".sub_chk:checked").each(function() {  
             allVals.push($(this).attr('data-id'));
         });  
        
      	  var join_selected_values = allVals.join(","); 
      	     
          $.ajax({
                url: "http://newpos.dbfindia.com/items/delete_item/"+join_selected_values,
                type: 'get',
                /*data: 'ids=',*/
               success: function (data) {  
                $('#table_holder').html(data);
                 	//refresh_data_table('table12');
               }
           });
         
       });
  }); 
   
</script>
<div class="clearfix"></div>
<div id="table123_wrapper" class="dataTables_wrapper no-footer"><div class="dt-buttons">          <button class="dt-button buttons-copy buttons-html5" tabindex="0" aria-controls="table123" type="button"><span>Copy</span></button> <button class="dt-button buttons-csv buttons-html5" tabindex="0" aria-controls="table123" type="button"><span>CSV</span></button> <button class="dt-button buttons-excel buttons-html5" tabindex="0" aria-controls="table123" type="button"><span>Excel</span></button> <button class="dt-button buttons-pdf buttons-html5" tabindex="0" aria-controls="table123" type="button"><span>PDF</span></button> <button class="dt-button buttons-print" tabindex="0" aria-controls="table123" type="button"><span>Print</span></button> </div><table id="table123" class="table table-responsive table-striped  dataTable no-footer" style="width: 100%; display: table-caption;" role="grid" aria-describedby="table123_info">
<thead>
	<tr role="row"><th style="background-image: none;" class="sorting_desc" rowspan="1" colspan="1" aria-label=""><input style="margin-left: -8px;" type="checkbox" id="master"></th><th class="sorting" tabindex="0" aria-controls="table123" rowspan="1" colspan="1" aria-label="id
		: activate to sort column ascending">id
		</th><th class="sorting" tabindex="0" aria-controls="table123" rowspan="1" colspan="1" aria-label="Barcode
		: activate to sort column ascending">Barcode
		</th><th class="sorting" tabindex="0" aria-controls="table123" rowspan="1" colspan="1" aria-label="HSN Code: activate to sort column ascending">HSN Code</th><th class="sorting" tabindex="0" aria-controls="table123" rowspan="1" colspan="1" aria-label="Item Name: activate to sort column ascending">Item Name</th><th class="sorting" tabindex="0" aria-controls="table123" rowspan="1" colspan="1" aria-label="Category: activate to sort column ascending">Category</th><th class="sorting" tabindex="0" aria-controls="table123" rowspan="1" colspan="1" aria-label="Subcategroy: activate to sort column ascending">Subcategroy</th><th class="sorting" tabindex="0" aria-controls="table123" rowspan="1" colspan="1" aria-label="Brand: activate to sort column ascending">Brand</th><th class="sorting" tabindex="0" aria-controls="table123" rowspan="1" colspan="1" aria-label="Size: activate to sort column ascending">Size</th><th class="sorting" tabindex="0" aria-controls="table123" rowspan="1" colspan="1" aria-label="Color: activate to sort column ascending">Color</th><th class="sorting" tabindex="0" aria-controls="table123" rowspan="1" colspan="1" aria-label="Expiry Date: activate to sort column ascending">Expiry Date</th><th class="sorting" tabindex="0" aria-controls="table123" rowspan="1" colspan="1" aria-label="Stock Edition: activate to sort column ascending">Stock Edition</th><th class="sorting" tabindex="0" aria-controls="table123" rowspan="1" colspan="1" aria-label="Retail Price: activate to sort column ascending">Retail Price</th><th class="sorting" tabindex="0" aria-controls="table123" rowspan="1" colspan="1" aria-label="Quantity: activate to sort column ascending">Quantity</th><th style="background-image:none; padding-right: 50px; padding-left: 24px;" class="sorting" tabindex="0" aria-controls="table123" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending">Action</th></tr>
</thead>	
<tbody>
		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

		
	

	<tr data-uniqueid="49964" style="background-color: rgb(249, 249, 249);" role="row" class="odd">
						<td><input type="checkbox" class="sub_chk" data-id="49964"></td>
			
		<td>49964</td>
		<td>93100324049964</td>
		<td>6501</td>
		<td>UCB KID'S MIX</td>
		<td>KID'S CLOTHING</td>
		<td>KID'S MIX</td>
		<td>UCB</td>
		<td>MIX SIZE</td>
		<td>MULTI COLOUR</td>
		<td>0000-00-00</td>
		<td>FKI-18.3.18</td>
		<td>999.00</td>
		<td class="qty_td">1</td>
		<td class="print_hide">

	<a href="JavaScript:void(0)" class="qty_update" id="1" data-btn-submit="Submit" title="Quick Quantity Update" style="margin-right: 9px;color: #000022d6;"><span class="glyphicon glyphicon-erase"></span></a>

			<a href="http://newpos.dbfindia.com/items/inventory/49964" class="modal-dlg" data-btn-submit="Submit" title="Update Inventory"><span style="padding-right: 10px;" class="glyphicon glyphicon-pushpin"></span></a>

		<a href="http://newpos.dbfindia.com/items/count_details/49964" class="modal-dlg" title="Inventory Count Details"><span style="padding-right: 10px;" class="glyphicon glyphicon-list-alt"></span></a>

		
		<a href="http://newpos.dbfindia.com/items/view/49964" class="modal-dlg" data-btn-submit="Submit" title="Update Item"><span class="glyphicon glyphicon-edit"></span></a>

			</td>
	</tr><tr data-uniqueid="49963" role="row" class="even">
						<td><input type="checkbox" class="sub_chk" data-id="49963"></td>
			
		<td>49963</td>
		<td>93100324049963</td>
		<td>6501</td>
		<td>AIVA KID'S MIX</td>
		<td>KID'S CLOTHING</td>
		<td>KID'S MIX</td>
		<td>AIVA</td>
		<td>MIX SIZE</td>
		<td>MULTI COLOUR</td>
		<td>0000-00-00</td>
		<td>FKI-18.3.18</td>
		<td>799.00</td>
		<td class="qty_td">1</td>
		<td class="print_hide">

	<a href="JavaScript:void(0)" class="qty_update" id="1" data-btn-submit="Submit" title="Quick Quantity Update" style="margin-right: 9px;color: #000022d6;"><span class="glyphicon glyphicon-erase"></span></a>

			<a href="http://newpos.dbfindia.com/items/inventory/49963" class="modal-dlg" data-btn-submit="Submit" title="Update Inventory"><span style="padding-right: 10px;" class="glyphicon glyphicon-pushpin"></span></a>

		<a href="http://newpos.dbfindia.com/items/count_details/49963" class="modal-dlg" title="Inventory Count Details"><span style="padding-right: 10px;" class="glyphicon glyphicon-list-alt"></span></a>

		
		<a href="http://newpos.dbfindia.com/items/view/49963" class="modal-dlg" data-btn-submit="Submit" title="Update Item"><span class="glyphicon glyphicon-edit"></span></a>

			</td>
	</tr><tr data-uniqueid="49962" style="background-color: rgb(249, 249, 249);" role="row" class="odd">
						<td><input type="checkbox" class="sub_chk" data-id="49962"></td>
			
		<td>49962</td>
		<td>93100324049962</td>
		<td>6501</td>
		<td>JACK KID'S MIX</td>
		<td>KID'S CLOTHING</td>
		<td>KID'S MIX</td>
		<td>JACK</td>
		<td>MIX SIZE</td>
		<td>MULTI COLOUR</td>
		<td>0000-00-00</td>
		<td>FKI-18.3.18</td>
		<td>999.00</td>
		<td class="qty_td">1</td>
		<td class="print_hide">

	<a href="JavaScript:void(0)" class="qty_update" id="1" data-btn-submit="Submit" title="Quick Quantity Update" style="margin-right: 9px;color: #000022d6;"><span class="glyphicon glyphicon-erase"></span></a>

			<a href="http://newpos.dbfindia.com/items/inventory/49962" class="modal-dlg" data-btn-submit="Submit" title="Update Inventory"><span style="padding-right: 10px;" class="glyphicon glyphicon-pushpin"></span></a>

		<a href="http://newpos.dbfindia.com/items/count_details/49962" class="modal-dlg" title="Inventory Count Details"><span style="padding-right: 10px;" class="glyphicon glyphicon-list-alt"></span></a>

		
		<a href="http://newpos.dbfindia.com/items/view/49962" class="modal-dlg" data-btn-submit="Submit" title="Update Item"><span class="glyphicon glyphicon-edit"></span></a>

			</td>
	</tr><tr data-uniqueid="49961" role="row" class="even">
						<td><input type="checkbox" class="sub_chk" data-id="49961"></td>
			
		<td>49961</td>
		<td>93100324049961</td>
		<td>6501</td>
		<td>FASHION STUDIO KID'S MIX</td>
		<td>KID'S CLOTHING</td>
		<td>KID'S MIX</td>
		<td>FASHION STUDIO</td>
		<td>MIX SIZE</td>
		<td>MULTI COLOUR</td>
		<td>0000-00-00</td>
		<td>FKI-18.3.18</td>
		<td>699.00</td>
		<td class="qty_td">1</td>
		<td class="print_hide">

	<a href="JavaScript:void(0)" class="qty_update" id="1" data-btn-submit="Submit" title="Quick Quantity Update" style="margin-right: 9px;color: #000022d6;"><span class="glyphicon glyphicon-erase"></span></a>

			<a href="http://newpos.dbfindia.com/items/inventory/49961" class="modal-dlg" data-btn-submit="Submit" title="Update Inventory"><span style="padding-right: 10px;" class="glyphicon glyphicon-pushpin"></span></a>

		<a href="http://newpos.dbfindia.com/items/count_details/49961" class="modal-dlg" title="Inventory Count Details"><span style="padding-right: 10px;" class="glyphicon glyphicon-list-alt"></span></a>

		
		<a href="http://newpos.dbfindia.com/items/view/49961" class="modal-dlg" data-btn-submit="Submit" title="Update Item"><span class="glyphicon glyphicon-edit"></span></a>

			</td>
	</tr><tr data-uniqueid="49960" style="background-color: rgb(249, 249, 249);" role="row" class="odd">
						<td><input type="checkbox" class="sub_chk" data-id="49960"></td>
			
		<td>49960</td>
		<td>93100324049960</td>
		<td>6501</td>
		<td>OYE KID'S MIX</td>
		<td>KID'S CLOTHING</td>
		<td>KID'S MIX</td>
		<td>OYE</td>
		<td>MIX SIZE</td>
		<td>MULTI COLOUR</td>
		<td>0000-00-00</td>
		<td>FKI-18.3.18</td>
		<td>499.00</td>
		<td class="qty_td">1</td>
		<td class="print_hide">

	<a href="JavaScript:void(0)" class="qty_update" id="1" data-btn-submit="Submit" title="Quick Quantity Update" style="margin-right: 9px;color: #000022d6;"><span class="glyphicon glyphicon-erase"></span></a>

			<a href="http://newpos.dbfindia.com/items/inventory/49960" class="modal-dlg" data-btn-submit="Submit" title="Update Inventory"><span style="padding-right: 10px;" class="glyphicon glyphicon-pushpin"></span></a>

		<a href="http://newpos.dbfindia.com/items/count_details/49960" class="modal-dlg" title="Inventory Count Details"><span style="padding-right: 10px;" class="glyphicon glyphicon-list-alt"></span></a>

		
		<a href="http://newpos.dbfindia.com/items/view/49960" class="modal-dlg" data-btn-submit="Submit" title="Update Item"><span class="glyphicon glyphicon-edit"></span></a>

			</td>
	</tr><tr data-uniqueid="49959" role="row" class="even">
						<td><input type="checkbox" class="sub_chk" data-id="49959"></td>
			
		<td>49959</td>
		<td>93100324049959</td>
		<td>6501</td>
		<td>CHARCHIT KID'S MIX</td>
		<td>KID'S CLOTHING</td>
		<td>KID'S MIX</td>
		<td>CHARCHIT</td>
		<td>MIX SIZE</td>
		<td>MULTI COLOUR</td>
		<td>0000-00-00</td>
		<td>FKI-18.3.18</td>
		<td>699.00</td>
		<td class="qty_td">1</td>
		<td class="print_hide">

	<a href="JavaScript:void(0)" class="qty_update" id="1" data-btn-submit="Submit" title="Quick Quantity Update" style="margin-right: 9px;color: #000022d6;"><span class="glyphicon glyphicon-erase"></span></a>

			<a href="http://newpos.dbfindia.com/items/inventory/49959" class="modal-dlg" data-btn-submit="Submit" title="Update Inventory"><span style="padding-right: 10px;" class="glyphicon glyphicon-pushpin"></span></a>

		<a href="http://newpos.dbfindia.com/items/count_details/49959" class="modal-dlg" title="Inventory Count Details"><span style="padding-right: 10px;" class="glyphicon glyphicon-list-alt"></span></a>

		
		<a href="http://newpos.dbfindia.com/items/view/49959" class="modal-dlg" data-btn-submit="Submit" title="Update Item"><span class="glyphicon glyphicon-edit"></span></a>

			</td>
	</tr><tr data-uniqueid="49958" style="background-color: rgb(249, 249, 249);" role="row" class="odd">
						<td><input type="checkbox" class="sub_chk" data-id="49958"></td>
			
		<td>49958</td>
		<td>93100324049958</td>
		<td>6501</td>
		<td>EURO KID'S MIX</td>
		<td>KID'S CLOTHING</td>
		<td>KID'S MIX</td>
		<td>EURO</td>
		<td>MIX SIZE</td>
		<td>MULTI COLOUR</td>
		<td>0000-00-00</td>
		<td>FKI-18.3.18</td>
		<td>799.00</td>
		<td class="qty_td">2</td>
		<td class="print_hide">

	<a href="JavaScript:void(0)" class="qty_update" id="2" data-btn-submit="Submit" title="Quick Quantity Update" style="margin-right: 9px;color: #000022d6;"><span class="glyphicon glyphicon-erase"></span></a>

			<a href="http://newpos.dbfindia.com/items/inventory/49958" class="modal-dlg" data-btn-submit="Submit" title="Update Inventory"><span style="padding-right: 10px;" class="glyphicon glyphicon-pushpin"></span></a>

		<a href="http://newpos.dbfindia.com/items/count_details/49958" class="modal-dlg" title="Inventory Count Details"><span style="padding-right: 10px;" class="glyphicon glyphicon-list-alt"></span></a>

		
		<a href="http://newpos.dbfindia.com/items/view/49958" class="modal-dlg" data-btn-submit="Submit" title="Update Item"><span class="glyphicon glyphicon-edit"></span></a>

			</td>
	</tr><tr data-uniqueid="49957" role="row" class="even">
						<td><input type="checkbox" class="sub_chk" data-id="49957"></td>
			
		<td>49957</td>
		<td>93100324049957</td>
		<td>6501</td>
		<td>MINI KLUB KID'S MIX</td>
		<td>KID'S CLOTHING</td>
		<td>KID'S MIX</td>
		<td>MINI KLUB</td>
		<td>MIX SIZE</td>
		<td>MULTI COLOUR</td>
		<td>0000-00-00</td>
		<td>FKI-18.3.18</td>
		<td>299.00</td>
		<td class="qty_td">2</td>
		<td class="print_hide">

	<a href="JavaScript:void(0)" class="qty_update" id="2" data-btn-submit="Submit" title="Quick Quantity Update" style="margin-right: 9px;color: #000022d6;"><span class="glyphicon glyphicon-erase"></span></a>

			<a href="http://newpos.dbfindia.com/items/inventory/49957" class="modal-dlg" data-btn-submit="Submit" title="Update Inventory"><span style="padding-right: 10px;" class="glyphicon glyphicon-pushpin"></span></a>

		<a href="http://newpos.dbfindia.com/items/count_details/49957" class="modal-dlg" title="Inventory Count Details"><span style="padding-right: 10px;" class="glyphicon glyphicon-list-alt"></span></a>

		
		<a href="http://newpos.dbfindia.com/items/view/49957" class="modal-dlg" data-btn-submit="Submit" title="Update Item"><span class="glyphicon glyphicon-edit"></span></a>

			</td>
	</tr><tr data-uniqueid="49956" style="background-color: rgb(249, 249, 249);" role="row" class="odd">
						<td><input type="checkbox" class="sub_chk" data-id="49956"></td>
			
		<td>49956</td>
		<td>93100324049956</td>
		<td>6501</td>
		<td>DEAL KID'S MIX</td>
		<td>KID'S CLOTHING</td>
		<td>KID'S MIX</td>
		<td>DEAL</td>
		<td>MIX SIZE</td>
		<td>MULTI COLOUR</td>
		<td>0000-00-00</td>
		<td>FKI-18.3.18</td>
		<td>1299.00</td>
		<td class="qty_td">1</td>
		<td class="print_hide">

	<a href="JavaScript:void(0)" class="qty_update" id="1" data-btn-submit="Submit" title="Quick Quantity Update" style="margin-right: 9px;color: #000022d6;"><span class="glyphicon glyphicon-erase"></span></a>

			<a href="http://newpos.dbfindia.com/items/inventory/49956" class="modal-dlg" data-btn-submit="Submit" title="Update Inventory"><span style="padding-right: 10px;" class="glyphicon glyphicon-pushpin"></span></a>

		<a href="http://newpos.dbfindia.com/items/count_details/49956" class="modal-dlg" title="Inventory Count Details"><span style="padding-right: 10px;" class="glyphicon glyphicon-list-alt"></span></a>

		
		<a href="http://newpos.dbfindia.com/items/view/49956" class="modal-dlg" data-btn-submit="Submit" title="Update Item"><span class="glyphicon glyphicon-edit"></span></a>

			</td>
	</tr><tr data-uniqueid="49955" role="row" class="even">
						<td><input type="checkbox" class="sub_chk" data-id="49955"></td>
			
		<td>49955</td>
		<td>93100324049955</td>
		<td>6501</td>
		<td>FABLE KID'S MIX</td>
		<td>KID'S CLOTHING</td>
		<td>KID'S MIX</td>
		<td>FABLE</td>
		<td>MIX SIZE</td>
		<td>MULTI COLOUR</td>
		<td>0000-00-00</td>
		<td>FKI-18.3.18</td>
		<td>999.00</td>
		<td class="qty_td">1</td>
		<td class="print_hide">

	<a href="JavaScript:void(0)" class="qty_update" id="1" data-btn-submit="Submit" title="Quick Quantity Update" style="margin-right: 9px;color: #000022d6;"><span class="glyphicon glyphicon-erase"></span></a>

			<a href="http://newpos.dbfindia.com/items/inventory/49955" class="modal-dlg" data-btn-submit="Submit" title="Update Inventory"><span style="padding-right: 10px;" class="glyphicon glyphicon-pushpin"></span></a>

		<a href="http://newpos.dbfindia.com/items/count_details/49955" class="modal-dlg" title="Inventory Count Details"><span style="padding-right: 10px;" class="glyphicon glyphicon-list-alt"></span></a>

		
		<a href="http://newpos.dbfindia.com/items/view/49955" class="modal-dlg" data-btn-submit="Submit" title="Update Item"><span class="glyphicon glyphicon-edit"></span></a>

			</td>
	</tr><tr data-uniqueid="49954" style="background-color: rgb(249, 249, 249);" role="row" class="odd">
						<td><input type="checkbox" class="sub_chk" data-id="49954"></td>
			
		<td>49954</td>
		<td>93100324049954</td>
		<td>6501</td>
		<td>STRUCREN CARGO KID'S MIX</td>
		<td>KID'S CLOTHING</td>
		<td>KID'S MIX</td>
		<td>STRUCREN CARGO</td>
		<td>MIX SIZE</td>
		<td>MULTI COLOUR</td>
		<td>0000-00-00</td>
		<td>FKI-18.3.18</td>
		<td>1899.00</td>
		<td class="qty_td">1</td>
		<td class="print_hide">

	<a href="JavaScript:void(0)" class="qty_update" id="1" data-btn-submit="Submit" title="Quick Quantity Update" style="margin-right: 9px;color: #000022d6;"><span class="glyphicon glyphicon-erase"></span></a>

			<a href="http://newpos.dbfindia.com/items/inventory/49954" class="modal-dlg" data-btn-submit="Submit" title="Update Inventory"><span style="padding-right: 10px;" class="glyphicon glyphicon-pushpin"></span></a>

		<a href="http://newpos.dbfindia.com/items/count_details/49954" class="modal-dlg" title="Inventory Count Details"><span style="padding-right: 10px;" class="glyphicon glyphicon-list-alt"></span></a>

		
		<a href="http://newpos.dbfindia.com/items/view/49954" class="modal-dlg" data-btn-submit="Submit" title="Update Item"><span class="glyphicon glyphicon-edit"></span></a>

			</td>
	</tr><tr data-uniqueid="49953" role="row" class="even">
						<td><input type="checkbox" class="sub_chk" data-id="49953"></td>
			
		<td>49953</td>
		<td>93100324049953</td>
		<td>6501</td>
		<td>FOREVER NEW KID'S MIX</td>
		<td>KID'S CLOTHING</td>
		<td>KID'S MIX</td>
		<td>FOREVER NEW</td>
		<td>MIX SIZE</td>
		<td>MULTI COLOUR</td>
		<td>0000-00-00</td>
		<td>FKI-18.3.18</td>
		<td>999.00</td>
		<td class="qty_td">1</td>
		<td class="print_hide">

	<a href="JavaScript:void(0)" class="qty_update" id="1" data-btn-submit="Submit" title="Quick Quantity Update" style="margin-right: 9px;color: #000022d6;"><span class="glyphicon glyphicon-erase"></span></a>

			<a href="http://newpos.dbfindia.com/items/inventory/49953" class="modal-dlg" data-btn-submit="Submit" title="Update Inventory"><span style="padding-right: 10px;" class="glyphicon glyphicon-pushpin"></span></a>

		<a href="http://newpos.dbfindia.com/items/count_details/49953" class="modal-dlg" title="Inventory Count Details"><span style="padding-right: 10px;" class="glyphicon glyphicon-list-alt"></span></a>

		
		<a href="http://newpos.dbfindia.com/items/view/49953" class="modal-dlg" data-btn-submit="Submit" title="Update Item"><span class="glyphicon glyphicon-edit"></span></a>

			</td>
	</tr><tr data-uniqueid="49952" style="background-color: rgb(249, 249, 249);" role="row" class="odd">
						<td><input type="checkbox" class="sub_chk" data-id="49952"></td>
			
		<td>49952</td>
		<td>93100324049952</td>
		<td>6501</td>
		<td>USHIRTS KID'S MIX</td>
		<td>KID'S CLOTHING</td>
		<td>KID'S MIX</td>
		<td>USHIRTS</td>
		<td>MIX SIZE</td>
		<td>MULTI COLOUR</td>
		<td>0000-00-00</td>
		<td>FKI-18.3.18</td>
		<td>599.00</td>
		<td class="qty_td">1</td>
		<td class="print_hide">

	<a href="JavaScript:void(0)" class="qty_update" id="1" data-btn-submit="Submit" title="Quick Quantity Update" style="margin-right: 9px;color: #000022d6;"><span class="glyphicon glyphicon-erase"></span></a>

			<a href="http://newpos.dbfindia.com/items/inventory/49952" class="modal-dlg" data-btn-submit="Submit" title="Update Inventory"><span style="padding-right: 10px;" class="glyphicon glyphicon-pushpin"></span></a>

		<a href="http://newpos.dbfindia.com/items/count_details/49952" class="modal-dlg" title="Inventory Count Details"><span style="padding-right: 10px;" class="glyphicon glyphicon-list-alt"></span></a>

		
		<a href="http://newpos.dbfindia.com/items/view/49952" class="modal-dlg" data-btn-submit="Submit" title="Update Item"><span class="glyphicon glyphicon-edit"></span></a>

			</td>
	</tr><tr data-uniqueid="49951" role="row" class="even">
						<td><input type="checkbox" class="sub_chk" data-id="49951"></td>
			
		<td>49951</td>
		<td>93100324049951</td>
		<td>6501</td>
		<td>RAINDROPS KID'S MIX</td>
		<td>KID'S CLOTHING</td>
		<td>KID'S MIX</td>
		<td>RAINDROPS</td>
		<td>MIX SIZE</td>
		<td>MULTI COLOUR</td>
		<td>0000-00-00</td>
		<td>FKI-18.3.18</td>
		<td>799.00</td>
		<td class="qty_td">1</td>
		<td class="print_hide">

	<a href="JavaScript:void(0)" class="qty_update" id="1" data-btn-submit="Submit" title="Quick Quantity Update" style="margin-right: 9px;color: #000022d6;"><span class="glyphicon glyphicon-erase"></span></a>

			<a href="http://newpos.dbfindia.com/items/inventory/49951" class="modal-dlg" data-btn-submit="Submit" title="Update Inventory"><span style="padding-right: 10px;" class="glyphicon glyphicon-pushpin"></span></a>

		<a href="http://newpos.dbfindia.com/items/count_details/49951" class="modal-dlg" title="Inventory Count Details"><span style="padding-right: 10px;" class="glyphicon glyphicon-list-alt"></span></a>

		
		<a href="http://newpos.dbfindia.com/items/view/49951" class="modal-dlg" data-btn-submit="Submit" title="Update Item"><span class="glyphicon glyphicon-edit"></span></a>

			</td>
	</tr><tr data-uniqueid="49950" style="background-color: rgb(249, 249, 249);" role="row" class="odd">
						<td><input type="checkbox" class="sub_chk" data-id="49950"></td>
			
		<td>49950</td>
		<td>93100324049950</td>
		<td>6501</td>
		<td>SARRAH KID'S MIX</td>
		<td>KID'S CLOTHING</td>
		<td>KID'S MIX</td>
		<td>SARRAH</td>
		<td>MIX SIZE</td>
		<td>MULTI COLOUR</td>
		<td>0000-00-00</td>
		<td>FKI-18.3.18</td>
		<td>1299.00</td>
		<td class="qty_td">1</td>
		<td class="print_hide">

	<a href="JavaScript:void(0)" class="qty_update" id="1" data-btn-submit="Submit" title="Quick Quantity Update" style="margin-right: 9px;color: #000022d6;"><span class="glyphicon glyphicon-erase"></span></a>

			<a href="http://newpos.dbfindia.com/items/inventory/49950" class="modal-dlg" data-btn-submit="Submit" title="Update Inventory"><span style="padding-right: 10px;" class="glyphicon glyphicon-pushpin"></span></a>

		<a href="http://newpos.dbfindia.com/items/count_details/49950" class="modal-dlg" title="Inventory Count Details"><span style="padding-right: 10px;" class="glyphicon glyphicon-list-alt"></span></a>

		
		<a href="http://newpos.dbfindia.com/items/view/49950" class="modal-dlg" data-btn-submit="Submit" title="Update Item"><span class="glyphicon glyphicon-edit"></span></a>

			</td>
	</tr><tr data-uniqueid="49949" role="row" class="even">
						<td><input type="checkbox" class="sub_chk" data-id="49949"></td>
			
		<td>49949</td>
		<td>93100324049949</td>
		<td>6501</td>
		<td>CRAZEIS KID'S MIX</td>
		<td>KID'S CLOTHING</td>
		<td>KID'S MIX</td>
		<td>CRAZEIS</td>
		<td>MIX SIZE</td>
		<td>MULTI COLOUR</td>
		<td>0000-00-00</td>
		<td>FKI-18.3.18</td>
		<td>1599.00</td>
		<td class="qty_td">3</td>
		<td class="print_hide">

	<a href="JavaScript:void(0)" class="qty_update" id="3" data-btn-submit="Submit" title="Quick Quantity Update" style="margin-right: 9px;color: #000022d6;"><span class="glyphicon glyphicon-erase"></span></a>

			<a href="http://newpos.dbfindia.com/items/inventory/49949" class="modal-dlg" data-btn-submit="Submit" title="Update Inventory"><span style="padding-right: 10px;" class="glyphicon glyphicon-pushpin"></span></a>

		<a href="http://newpos.dbfindia.com/items/count_details/49949" class="modal-dlg" title="Inventory Count Details"><span style="padding-right: 10px;" class="glyphicon glyphicon-list-alt"></span></a>

		
		<a href="http://newpos.dbfindia.com/items/view/49949" class="modal-dlg" data-btn-submit="Submit" title="Update Item"><span class="glyphicon glyphicon-edit"></span></a>

			</td>
	</tr><tr data-uniqueid="49948" style="background-color: rgb(249, 249, 249);" role="row" class="odd">
						<td><input type="checkbox" class="sub_chk" data-id="49948"></td>
			
		<td>49948</td>
		<td>93100324049948</td>
		<td>6501</td>
		<td>UFO KID'S MIX</td>
		<td>KID'S CLOTHING</td>
		<td>KID'S MIX</td>
		<td>UFO</td>
		<td>MIX SIZE</td>
		<td>MULTI COLOUR</td>
		<td>0000-00-00</td>
		<td>FKI-18.3.18</td>
		<td>599.00</td>
		<td class="qty_td">1</td>
		<td class="print_hide">

	<a href="JavaScript:void(0)" class="qty_update" id="1" data-btn-submit="Submit" title="Quick Quantity Update" style="margin-right: 9px;color: #000022d6;"><span class="glyphicon glyphicon-erase"></span></a>

			<a href="http://newpos.dbfindia.com/items/inventory/49948" class="modal-dlg" data-btn-submit="Submit" title="Update Inventory"><span style="padding-right: 10px;" class="glyphicon glyphicon-pushpin"></span></a>

		<a href="http://newpos.dbfindia.com/items/count_details/49948" class="modal-dlg" title="Inventory Count Details"><span style="padding-right: 10px;" class="glyphicon glyphicon-list-alt"></span></a>

		
		<a href="http://newpos.dbfindia.com/items/view/49948" class="modal-dlg" data-btn-submit="Submit" title="Update Item"><span class="glyphicon glyphicon-edit"></span></a>

			</td>
	</tr><tr data-uniqueid="49947" role="row" class="even">
						<td><input type="checkbox" class="sub_chk" data-id="49947"></td>
			
		<td>49947</td>
		<td>93100324049947</td>
		<td>6501</td>
		<td>TOY BALLOON KID'S MIX</td>
		<td>KID'S CLOTHING</td>
		<td>KID'S MIX</td>
		<td>TOY BALLOON</td>
		<td>MIX SIZE</td>
		<td>MULTI COLOUR</td>
		<td>0000-00-00</td>
		<td>FKI-18.3.18</td>
		<td>1499.00</td>
		<td class="qty_td">2</td>
		<td class="print_hide">

	<a href="JavaScript:void(0)" class="qty_update" id="2" data-btn-submit="Submit" title="Quick Quantity Update" style="margin-right: 9px;color: #000022d6;"><span class="glyphicon glyphicon-erase"></span></a>

			<a href="http://newpos.dbfindia.com/items/inventory/49947" class="modal-dlg" data-btn-submit="Submit" title="Update Inventory"><span style="padding-right: 10px;" class="glyphicon glyphicon-pushpin"></span></a>

		<a href="http://newpos.dbfindia.com/items/count_details/49947" class="modal-dlg" title="Inventory Count Details"><span style="padding-right: 10px;" class="glyphicon glyphicon-list-alt"></span></a>

		
		<a href="http://newpos.dbfindia.com/items/view/49947" class="modal-dlg" data-btn-submit="Submit" title="Update Item"><span class="glyphicon glyphicon-edit"></span></a>

			</td>
	</tr><tr data-uniqueid="49946" style="background-color: rgb(249, 249, 249);" role="row" class="odd">
						<td><input type="checkbox" class="sub_chk" data-id="49946"></td>
			
		<td>49946</td>
		<td>93100324049946</td>
		<td>6501</td>
		<td>FLYING MACHIN KID'S MIX</td>
		<td>KID'S CLOTHING</td>
		<td>KID'S MIX</td>
		<td>FLYING MACHIN</td>
		<td>MIX SIZE</td>
		<td>MULTI COLOUR</td>
		<td>0000-00-00</td>
		<td>FKI-18.3.18</td>
		<td>899.00</td>
		<td class="qty_td">1</td>
		<td class="print_hide">

	<a href="JavaScript:void(0)" class="qty_update" id="1" data-btn-submit="Submit" title="Quick Quantity Update" style="margin-right: 9px;color: #000022d6;"><span class="glyphicon glyphicon-erase"></span></a>

			<a href="http://newpos.dbfindia.com/items/inventory/49946" class="modal-dlg" data-btn-submit="Submit" title="Update Inventory"><span style="padding-right: 10px;" class="glyphicon glyphicon-pushpin"></span></a>

		<a href="http://newpos.dbfindia.com/items/count_details/49946" class="modal-dlg" title="Inventory Count Details"><span style="padding-right: 10px;" class="glyphicon glyphicon-list-alt"></span></a>

		
		<a href="http://newpos.dbfindia.com/items/view/49946" class="modal-dlg" data-btn-submit="Submit" title="Update Item"><span class="glyphicon glyphicon-edit"></span></a>

			</td>
	</tr><tr data-uniqueid="49945" role="row" class="even">
						<td><input type="checkbox" class="sub_chk" data-id="49945"></td>
			
		<td>49945</td>
		<td>93100324049945</td>
		<td>6501</td>
		<td>COTTON CLUB KID'S MIX</td>
		<td>KID'S CLOTHING</td>
		<td>KID'S MIX</td>
		<td>COTTON CLUB</td>
		<td>MIX SIZE</td>
		<td>MULTI COLOUR</td>
		<td>0000-00-00</td>
		<td>FKI-18.3.18</td>
		<td>1599.00</td>
		<td class="qty_td">1</td>
		<td class="print_hide">

	<a href="JavaScript:void(0)" class="qty_update" id="1" data-btn-submit="Submit" title="Quick Quantity Update" style="margin-right: 9px;color: #000022d6;"><span class="glyphicon glyphicon-erase"></span></a>

			<a href="http://newpos.dbfindia.com/items/inventory/49945" class="modal-dlg" data-btn-submit="Submit" title="Update Inventory"><span style="padding-right: 10px;" class="glyphicon glyphicon-pushpin"></span></a>

		<a href="http://newpos.dbfindia.com/items/count_details/49945" class="modal-dlg" title="Inventory Count Details"><span style="padding-right: 10px;" class="glyphicon glyphicon-list-alt"></span></a>

		
		<a href="http://newpos.dbfindia.com/items/view/49945" class="modal-dlg" data-btn-submit="Submit" title="Update Item"><span class="glyphicon glyphicon-edit"></span></a>

			</td>
	</tr><tr data-uniqueid="49944" style="background-color: rgb(249, 249, 249);" role="row" class="odd">
						<td><input type="checkbox" class="sub_chk" data-id="49944"></td>
			
		<td>49944</td>
		<td>93100324049944</td>
		<td>6501</td>
		<td>US POLO KID'S MIX</td>
		<td>KID'S CLOTHING</td>
		<td>KID'S MIX</td>
		<td>US POLO</td>
		<td>MIX SIZE</td>
		<td>MULTI COLOUR</td>
		<td>0000-00-00</td>
		<td>FKI-18.3.18</td>
		<td>999.00</td>
		<td class="qty_td">2</td>
		<td class="print_hide">

	<a href="JavaScript:void(0)" class="qty_update" id="2" data-btn-submit="Submit" title="Quick Quantity Update" style="margin-right: 9px;color: #000022d6;"><span class="glyphicon glyphicon-erase"></span></a>

			<a href="http://newpos.dbfindia.com/items/inventory/49944" class="modal-dlg" data-btn-submit="Submit" title="Update Inventory"><span style="padding-right: 10px;" class="glyphicon glyphicon-pushpin"></span></a>

		<a href="http://newpos.dbfindia.com/items/count_details/49944" class="modal-dlg" title="Inventory Count Details"><span style="padding-right: 10px;" class="glyphicon glyphicon-list-alt"></span></a>

		
		<a href="http://newpos.dbfindia.com/items/view/49944" class="modal-dlg" data-btn-submit="Submit" title="Update Item"><span class="glyphicon glyphicon-edit"></span></a>

			</td>
	</tr><tr data-uniqueid="49943" role="row" class="even">
						<td><input type="checkbox" class="sub_chk" data-id="49943"></td>
			
		<td>49943</td>
		<td>93100324049943</td>
		<td>6501</td>
		<td>PEOPLE KID'S MIX</td>
		<td>KID'S CLOTHING</td>
		<td>KID'S MIX</td>
		<td>PEOPLE</td>
		<td>MIX SIZE</td>
		<td>MULTI COLOUR</td>
		<td>0000-00-00</td>
		<td>FKI-18.3.18</td>
		<td>699.00</td>
		<td class="qty_td">1</td>
		<td class="print_hide">

	<a href="JavaScript:void(0)" class="qty_update" id="1" data-btn-submit="Submit" title="Quick Quantity Update" style="margin-right: 9px;color: #000022d6;"><span class="glyphicon glyphicon-erase"></span></a>

			<a href="http://newpos.dbfindia.com/items/inventory/49943" class="modal-dlg" data-btn-submit="Submit" title="Update Inventory"><span style="padding-right: 10px;" class="glyphicon glyphicon-pushpin"></span></a>

		<a href="http://newpos.dbfindia.com/items/count_details/49943" class="modal-dlg" title="Inventory Count Details"><span style="padding-right: 10px;" class="glyphicon glyphicon-list-alt"></span></a>

		
		<a href="http://newpos.dbfindia.com/items/view/49943" class="modal-dlg" data-btn-submit="Submit" title="Update Item"><span class="glyphicon glyphicon-edit"></span></a>

			</td>
	</tr><tr data-uniqueid="49942" style="background-color: rgb(249, 249, 249);" role="row" class="odd">
						<td><input type="checkbox" class="sub_chk" data-id="49942"></td>
			
		<td>49942</td>
		<td>93100324049942</td>
		<td>6501</td>
		<td>JOSHUA TREE KID'S MIX</td>
		<td>KID'S CLOTHING</td>
		<td>KID'S MIX</td>
		<td>JOSHUA TREE</td>
		<td>MIX SIZE</td>
		<td>MULTI COLOUR</td>
		<td>0000-00-00</td>
		<td>FKI-18.3.18</td>
		<td>399.00</td>
		<td class="qty_td">1</td>
		<td class="print_hide">

	<a href="JavaScript:void(0)" class="qty_update" id="1" data-btn-submit="Submit" title="Quick Quantity Update" style="margin-right: 9px;color: #000022d6;"><span class="glyphicon glyphicon-erase"></span></a>

			<a href="http://newpos.dbfindia.com/items/inventory/49942" class="modal-dlg" data-btn-submit="Submit" title="Update Inventory"><span style="padding-right: 10px;" class="glyphicon glyphicon-pushpin"></span></a>

		<a href="http://newpos.dbfindia.com/items/count_details/49942" class="modal-dlg" title="Inventory Count Details"><span style="padding-right: 10px;" class="glyphicon glyphicon-list-alt"></span></a>

		
		<a href="http://newpos.dbfindia.com/items/view/49942" class="modal-dlg" data-btn-submit="Submit" title="Update Item"><span class="glyphicon glyphicon-edit"></span></a>

			</td>
	</tr><tr data-uniqueid="49941" role="row" class="even">
						<td><input type="checkbox" class="sub_chk" data-id="49941"></td>
			
		<td>49941</td>
		<td>93100324049941</td>
		<td>6501</td>
		<td>FASHION KID'S MIX</td>
		<td>KID'S CLOTHING</td>
		<td>KID'S MIX</td>
		<td>FASHION</td>
		<td>MIX SIZE</td>
		<td>MULTI COLOUR</td>
		<td>0000-00-00</td>
		<td>FKI-18.3.18</td>
		<td>299.00</td>
		<td class="qty_td">2</td>
		<td class="print_hide">

	<a href="JavaScript:void(0)" class="qty_update" id="2" data-btn-submit="Submit" title="Quick Quantity Update" style="margin-right: 9px;color: #000022d6;"><span class="glyphicon glyphicon-erase"></span></a>

			<a href="http://newpos.dbfindia.com/items/inventory/49941" class="modal-dlg" data-btn-submit="Submit" title="Update Inventory"><span style="padding-right: 10px;" class="glyphicon glyphicon-pushpin"></span></a>

		<a href="http://newpos.dbfindia.com/items/count_details/49941" class="modal-dlg" title="Inventory Count Details"><span style="padding-right: 10px;" class="glyphicon glyphicon-list-alt"></span></a>

		
		<a href="http://newpos.dbfindia.com/items/view/49941" class="modal-dlg" data-btn-submit="Submit" title="Update Item"><span class="glyphicon glyphicon-edit"></span></a>

			</td>
	</tr><tr data-uniqueid="49940" style="background-color: rgb(249, 249, 249);" role="row" class="odd">
						<td><input type="checkbox" class="sub_chk" data-id="49940"></td>
			
		<td>49940</td>
		<td>93100324049940</td>
		<td>6501</td>
		<td>UCB KID'S MIX</td>
		<td>KID'S CLOTHING</td>
		<td>KID'S MIX</td>
		<td>UCB</td>
		<td>MIX SIZE</td>
		<td>MULTI COLOUR</td>
		<td>0000-00-00</td>
		<td>FKI-18.3.18</td>
		<td>699.00</td>
		<td class="qty_td">5</td>
		<td class="print_hide">

	<a href="JavaScript:void(0)" class="qty_update" id="5" data-btn-submit="Submit" title="Quick Quantity Update" style="margin-right: 9px;color: #000022d6;"><span class="glyphicon glyphicon-erase"></span></a>

			<a href="http://newpos.dbfindia.com/items/inventory/49940" class="modal-dlg" data-btn-submit="Submit" title="Update Inventory"><span style="padding-right: 10px;" class="glyphicon glyphicon-pushpin"></span></a>

		<a href="http://newpos.dbfindia.com/items/count_details/49940" class="modal-dlg" title="Inventory Count Details"><span style="padding-right: 10px;" class="glyphicon glyphicon-list-alt"></span></a>

		
		<a href="http://newpos.dbfindia.com/items/view/49940" class="modal-dlg" data-btn-submit="Submit" title="Update Item"><span class="glyphicon glyphicon-edit"></span></a>

			</td>
	</tr></tbody> 
</table><div class="dataTables_info" id="table123_info" role="status" aria-live="polite">Showing 1 to 25 of 200 entries</div><div class="dataTables_paginate paging_full_numbers" id="table123_paginate"><a class="paginate_button first disabled" aria-controls="table123" data-dt-idx="0" tabindex="0" id="table123_first">First</a><a class="paginate_button previous disabled" aria-controls="table123" data-dt-idx="1" tabindex="0" id="table123_previous">Previous</a><span><a class="paginate_button current" aria-controls="table123" data-dt-idx="2" tabindex="0">1</a><a class="paginate_button " aria-controls="table123" data-dt-idx="3" tabindex="0">2</a><a class="paginate_button " aria-controls="table123" data-dt-idx="4" tabindex="0">3</a><a class="paginate_button " aria-controls="table123" data-dt-idx="5" tabindex="0">4</a><a class="paginate_button " aria-controls="table123" data-dt-idx="6" tabindex="0">5</a><span class="ellipsis">…</span><a class="paginate_button " aria-controls="table123" data-dt-idx="7" tabindex="0">8</a></span><a class="paginate_button next" aria-controls="table123" data-dt-idx="8" tabindex="0" id="table123_next">Next</a><a class="paginate_button last" aria-controls="table123" data-dt-idx="9" tabindex="0" id="table123_last">Last</a></div></div>

<script>

	$(document).ready(function(){
			$(".qty_update").on('click', function(event){
			var item_id = $(this).parent().parent().attr('data-uniqueid');
			var item_qty = this.id;
			console.log('item_id: '+item_id);
			console.log('item_quantity: '+item_qty);
			var new_qty = prompt("Please enter value", item_qty);
			if(new_qty)
			{
				new_qty = new_qty.trim();
				new_qty = parseInt(new_qty, 10);
				if(Number.isInteger(new_qty))
				{
						new_qty = Math.abs(new_qty);
						console.log(new_qty);
						$.post('http://newpos.dbfindia.com/items/quick_item_quantity_update', {'item_id': item_id, 'new_qty': new_qty}, function(data) {
							if(data=='Successfully Updated'){
								$.notify(data);
								$("#"+item_qty).parent().parent().find('.qty_td').text(new_qty);
							}else{
								$.notify(data);
							}
								// location.reload();
      	      });
				}
				else
				{
					console.log('invalid');
				} 
			}
			else
			{
				console.log("empty");
			}
		});

		})
	</script></div>
	<div class="hidden_img hidden">
		<img src="http://newpos.dbfindia.com/images/loader.gif" alt="Loading.." style="width: 100px;height: 100px;margin-top: 50px;">
	</div>
</div>
<script>
	dialog_support.init("button.modal-dlg, button.modal-dlg-wide");

	$(document).ready(function(){
		$('.filter_categories, #sub_cat, #stock_location, #brand_id, #edition_id').select2();
		var img_data = $('.hidden_img').html();
		$("#table_holder").html(img_data);
		$(".qty_update").on('click', function(event){
			var item_id = $(this).parent().parent().attr('data-uniqueid');
			var item_qty = this.id;
			console.log('item_id: '+item_id);
			console.log('item_quantity: '+item_qty);
			var new_qty = prompt("Please enter value", item_qty);
			if(new_qty)
			{
				new_qty = new_qty.trim();
				new_qty = parseInt(new_qty, 10);
				if(Number.isInteger(new_qty))
				{
						new_qty = Math.abs(new_qty);
						console.log(new_qty);
						$.post('http://newpos.dbfindia.com/items/quick_item_quantity_update', {'item_id': item_id, 'new_qty': new_qty}, function(data) {
        	    alert(data);
								// location.reload();
      	        });
				}
				else
				{
					console.log('invalid');
				} 
			}
			else
			{
				console.log("empty");
			}
		});

		$("#table").on('click', '.request_item', function(event){
			var item_id = $(this).parent().parent().attr('data-uniqueid');
			var req_qty = prompt("Please enter value");

			if(req_qty)
			{
				$.post('http://newpos.dbfindia.com/items/request_item_add', {'item_id': item_id, 'request_qty': req_qty}, function(data) {
	        	alert(data);
	      });
			}
			else
			{
				console.log("empty");
			}
		});
	});
    

    $(document).on('change','#cat_id',function(){

		var id = $('#cat_id').val();
		console.log('cat-id',id);
		$.post('http://newpos.dbfindia.com/items/get_subcate',{'id':id},function(data){
			$('#sub_cat').html(data);
		})
	})

	$(document).ready(function(){
		filter_data();
		function filter_data(){
		var img_data = $('.hidden_img').html();
		$("#table_holder").html(img_data);
			var filters        = $('#filters').val();
			var serch_item     = $('#serch_item').val();
			var stock_location = $('#stock_location').val();
			var cat_id         = $('#cat_id').val();
		
			var sub_cat        = $('#sub_cat').val();
				console.log('category',sub_cat);
			var brand          = $('#brand_id').val();
			var edition_id     = $('#edition_id').val();

			$.post('http://newpos.dbfindia.com/items/get_suggestion',{'search':serch_item,'location_id':stock_location,'slc_subcate':sub_cat,'slc_cate':cat_id,'slc_brnd':brand,'filters[]':filters,'edition_id':edition_id},function(data){
					$('#table_holder').html(data);
			})
		}
		$('#filter_data_btn').on('click',function(){
			filter_data();
		})
	})

$(document).ready(function () {
		$('div.container').addClass('container-fluid');
		$('div.container-fluid').removeClass('container');
	  // $('#table1').DataTable({
   //      "scrollX": true,
   //      dom: 'Bfrtip',
   //      order: [[0, 'desc']],
   //      buttons: [
   //        'copy', 'csv', 'excel', 'pdf', 'print'
   //      ]
   //    });

	$('.sub_chk').on('click', function(e) {
		$('#delete').attr("disabled", false);
		$('#bulk_edit').attr("disabled", false);
		
	});

	$(document).on('click','.sub_chk , #master',function(e) {
		if ($(".sub_chk").is(":checked")==false) {
			$('#delete').attr("disabled", true)	
			$('#bulk_edit').attr("disabled", true);
		}
		else{
			$('#bulk_edit').attr("disabled", false);
		}
	});	


    $('#master').on('click', function(e) {
       if($(this).is(':checked',true))  
        {
        	$('#delete').attr("disabled", false);
           $(".sub_chk").prop('checked', true);  
           $('#bulk_edit').attr("disabled", false);
         }
         else {  
            $(".sub_chk").prop('checked',false);
            $('#bulk_edit').attr("disabled", true);  
         }  
    });
     $('#delete').on('click', function(e) {

         var allVals = [];  
        $(".sub_chk:checked").each(function() {  
             allVals.push($(this).attr('data-id'));
         });  
        
      	  var ids = allVals.join(","); 
      	     
          $.post("http://newpos.dbfindia.com/items/delete_item",{'id':ids},function (data) {  
                $('#table_holder').html(data);
                 $('#delete').attr("disabled", true);  
                  $('#bulk_edit').attr("disabled", true);  
                 	//refresh_data_table('table12');
               });
         });
  });
  $(document).ready(function(){
    $('#bulk_edit').hover(function(){
     	   var allVals = [];  
        $(".sub_chk:checked").each(function() {  
             allVals.push($(this).attr('data-id'));
         });  
        
      	  var ids = allVals.join(","); 
      	  $('#bulk_edit').attr('data-href','http://newpos.dbfindia.com/items/bulk_edit/?id='+ids)
     }); 
    })
</script>


		</div>
	</div>

	<div id="footer">
		<!-- <div class="jumbotron push-spaces"> -->
			<!-- <strong>  			 - </strong>.
						<a href="https://github.com/jekkos/opensourcepos" target="_blank"></a>
			 -->
		<!-- </div> -->
	</div>


</body></html>

@endsection