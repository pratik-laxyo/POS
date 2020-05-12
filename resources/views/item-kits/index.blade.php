@extends('layouts.dbf')

@section('content')


				<div class="container">
		<div class="row">

<script type="text/javascript">
$(document).ready(function()
{
	(function ($) {
	'use strict';

	$.fn.bootstrapTable.locales['en-US'] = {
		formatLoadingMessage: function () {
			return "Loading, please wait...";
		},
		formatRecordsPerPage: function (pageNumber) {
			return "{0} rows per page".replace('{0}', pageNumber);
		},
		formatShowingRows: function (pageFrom, pageTo, totalRows) {
			return "Showing {0} to {1} of {2} rows".replace('{0}', pageFrom).replace('{1}', pageTo).replace('{2}', totalRows);
		},
		formatSearch: function () {
			return "Search";
		},
		formatNoMatches: function () {
			return "No Item Kits to display.";
		},
		formatPaginationSwitch: function () {
			return "Hide/Show pagination";
		},
		formatRefresh: function () {
			return "Refresh";
		},
		formatToggle: function () {
			return "Toggle";
		},
		formatColumns: function () {
			return "Columns";
		},
		formatAllRows: function () {
			return "All";
		},
		formatConfirmDelete : function() {
			return "Are you sure you want to delete the selected Item Kit(s)?";
		},
		formatConfirmRestore : function() {
		return "Are you sure you want to restore selected Item Kit(s)?";
		}
	};

	$.extend($.fn.bootstrapTable.defaults, $.fn.bootstrapTable.locales["en-US"]);

})(jQuery);
	table_support.init({
		resource: 'http://newpos.dbfindia.com/item_kits',
		headers: [{"field":"checkbox","title":"select","switchable":true,"sortable":false,"checkbox":"select","class":"print_hide","sorter":""},{"field":"item_kit_id","title":"Kit ID","switchable":true,"sortable":true,"checkbox":false,"class":"","sorter":""},{"field":"name","title":"Item Kit Name","switchable":true,"sortable":true,"checkbox":false,"class":"","sorter":""},{"field":"description","title":"Item Kit Description","switchable":true,"sortable":true,"checkbox":false,"class":"","sorter":""},{"field":"total_cost_price","title":"Wholesale Price","switchable":true,"sortable":false,"checkbox":false,"class":"","sorter":""},{"field":"total_unit_price","title":"Retail Price","switchable":true,"sortable":false,"checkbox":false,"class":"","sorter":""},{"field":"edit","title":"","switchable":false,"sortable":false,"checkbox":false,"class":"print_hide","sorter":""}],
		pageSize: 20,
		uniqueId: 'item_kit_id'
	});

	$('#generate_barcodes').click(function()
	{
		window.open(
			'index.php/item_kits/generate_barcodes/'+table_support.selected_ids().join(':'),
			'_blank' // <- This is what makes it open in a new window.
		);
	});
});

</script>

<div id="title_bar" class="btn-toolbar">
	<button class="btn btn-info btn-sm pull-right modal-dlg" data-btn-submit="Submit" data-href="http://newpos.dbfindia.com/item_kits/view" title="New Item Kit">
		<span class="glyphicon glyphicon-tags">&nbsp;</span>New Item Kit	</button>
	
</div>



<div id="table_holder">
	<div class="bootstrap-table"><div class="fixed-table-toolbar"><div class="bs-bars pull-left"><div id="toolbar">
	<div class="pull-left btn-toolbar">
						<button id="delete" class="btn btn-default btn-sm" disabled="disabled">
				<span class="glyphicon glyphicon-trash">&nbsp;</span>Delete			</button>
			

		<button id="generate_barcodes" class="btn btn-default btn-sm" data-href="http://newpos.dbfindia.com/item_kits/generate_barcodes" disabled="disabled">
			<span class="glyphicon glyphicon-barcode">&nbsp;</span>Generate Barcodes		</button>
			
	</div>
</div></div><div class="columns columns-right btn-group pull-right"><div class="keep-open btn-group" title="Columns"><button type="button" aria-label="columns" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-th icon-th"></i> <span class="caret"></span></button><ul class="dropdown-menu" role="menu"><li role="menuitem"><label><input type="checkbox" data-field="item_kit_id" value="1" checked="checked"> Kit ID</label></li><li role="menuitem"><label><input type="checkbox" data-field="name" value="2" checked="checked"> Item Kit Name</label></li><li role="menuitem"><label><input type="checkbox" data-field="description" value="3" checked="checked"> Item Kit Description</label></li><li role="menuitem"><label><input type="checkbox" data-field="total_cost_price" value="4" checked="checked"> Wholesale Price</label></li><li role="menuitem"><label><input type="checkbox" data-field="total_unit_price" value="5" checked="checked"> Retail Price</label></li></ul></div><div class="export btn-group"><button class="btn btn-default btn-sm dropdown-toggle" aria-label="export type" title="Export data" data-toggle="dropdown" type="button"><i class="glyphicon glyphicon-export icon-share"></i> <span class="caret"></span></button><ul class="dropdown-menu" role="menu"><li role="menuitem" data-type="json"><a href="javascript:void(0)">JSON</a></li><li role="menuitem" data-type="xml"><a href="javascript:void(0)">XML</a></li><li role="menuitem" data-type="csv"><a href="javascript:void(0)">CSV</a></li><li role="menuitem" data-type="txt"><a href="javascript:void(0)">TXT</a></li><li role="menuitem" data-type="sql"><a href="javascript:void(0)">SQL</a></li><li role="menuitem" data-type="excel"><a href="javascript:void(0)">MS-Excel</a></li><li role="menuitem" data-type="pdf"><a href="javascript:void(0)">PDF</a></li></ul></div></div><div class="pull-right search"><input class="form-control input-sm" type="text" placeholder="Search"></div></div><div class="fixed-table-container" style="padding-bottom: 0px;"><div class="fixed-table-header" style="display: none;"><table></table></div><div class="fixed-table-body"><div class="fixed-table-loading" style="top: 44px; display: none;">Loading, please wait...</div><div id="table-sticky-header-sticky-header-container" class="hidden"></div><div id="table-sticky-header_sticky_anchor_begin"></div><table id="table" class="table table-hover table-striped"><thead id="table-sticky-header"><tr><th class="bs-checkbox print_hide" style="width: 36px; " data-field="checkbox"><div class="th-inner "><input name="btSelectAll" type="checkbox"></div><div class="fht-cell"></div></th><th class="" style="" data-field="item_kit_id"><div class="th-inner sortable both">Kit ID</div><div class="fht-cell"></div></th><th class="" style="" data-field="name"><div class="th-inner sortable both">Item Kit Name</div><div class="fht-cell"></div></th><th class="" style="" data-field="description"><div class="th-inner sortable both">Item Kit Description</div><div class="fht-cell"></div></th><th class="" style="" data-field="total_cost_price"><div class="th-inner ">Wholesale Price</div><div class="fht-cell"></div></th><th class="" style="" data-field="total_unit_price"><div class="th-inner ">Retail Price</div><div class="fht-cell"></div></th><th class="print_hide" style="" data-field="edit"><div class="th-inner "></div><div class="fht-cell"></div></th></tr></thead><tbody><tr class="no-records-found"><td colspan="7">No Item Kits to display.</td></tr></tbody></table><div id="table-sticky-header_sticky_anchor_end"></div></div><div class="fixed-table-footer" style="display: none;"><table><tbody><tr></tr></tbody></table></div></div><div class="fixed-table-pagination" style="display: none;"><div class="pull-left pagination-detail"><span class="pagination-info">Showing 1 to 0 of 0 rows</span><span class="page-list" style="display: none;"><span class="btn-group dropup"><button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown"><span class="page-size">20</span> <span class="caret"></span></button><ul class="dropdown-menu" role="menu"><li role="menuitem" class=""><a href="#">10</a></li></ul></span> rows per page</span></div><div class="pull-right pagination" style="display: none;"><ul class="pagination pagination-sm"><li class="page-item page-pre"><a class="page-link" href="#">‹</a></li><li class="page-item page-next"><a class="page-link" href="#">›</a></li></ul></div></div></div><div class="clearfix"></div>
</div>

		</div>
	</div>

	<div id="footer">
		<!-- <div class="jumbotron push-spaces"> -->
			<!-- <strong>  			 - </strong>.
						<a href="https://github.com/jekkos/opensourcepos" target="_blank"></a>
			 -->
		<!-- </div> -->
	</div>


</div></body></html>
@endsection
