@extends('layouts.dbf')
@section('content')
<div class="container-fluid">
   <div class="container-fluid">
      <form id="FiltersForm">
         @csrf
         <div id="title_bar" class="btn-toolbar print_hide">
            <button class="btn btn-info btn-sm pull-right modal-dlg" data-btn-submit="Submit" data-href="http://newpos.dbfindia.com/items/excel_stock_up" title="Item Update from Excel">
            <span class="glyphicon glyphicon-import">&nbsp;</span>Excel Update</button>
            <button class="btn btn-info btn-sm pull-right modal-dlg" data-toggle="modal" data-target="#sheetImport" title="Item Import from Excel">
            <span class="glyphicon glyphicon-import">&nbsp;</span>Excel Import</button>
            <button class="btn btn-info btn-sm pull-right modal-dlg" data-toggle="modal" data-target="#myModal" title="New Item">
            <span class="glyphicon glyphicon-tag">&nbsp;</span>New Item</button>
            <!-- <button disabled="true" id="delete" class="btn btn-default btn-sm print_hide">
            <span class="glyphicon glyphicon-trash">&nbsp;</span>Delete</button>
            <button disabled="true" id="bulk_edit" class="btn btn-default btn-sm modal-dlg print_hide" ,="" data-btn-submit="Submit" data-href="http://newpos.dbfindia.com/items/bulk_edit" title="Editing Multiple Items">
            <span class="glyphicon glyphicon-edit">&nbsp;</span>Bulk Edit</button> -->
            <button class="btn btn-info btn-sm pull-right" name="submit" id="filter_data_btn">Get Items</button>
         </div>

         <div id="toolbar">
            <div class="form-inline" role="toolbar">
               <div class="btn-group bootstrap-select show-tick show-menu-arrow fit-width">
                  <button type="button" class="btn dropdown-toggle bs-placeholder btn-default btn-sm" data-toggle="dropdown" role="button" data-id="filters" title="Nothing selected."><span class="filter-option pull-left">Nothing selected.</span>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button>
                  <div class="dropdown-menu open" role="combobox">
                     <ul class="dropdown-menu inner" role="listbox" aria-expanded="false">
                        <li data-original-index="0"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Empty Barcode Items</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li>
                        <li data-original-index="1"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Out Of Stock Items</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li>
                        <li data-original-index="2"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Serialized Items</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li>
                        <li data-original-index="3"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">No Description Items</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li>
                        <li data-original-index="4"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Search Custom Items</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li>
                        <li data-original-index="5"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Deleted</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li>
                     </ul>
                  </div>
                  <select name="filters[]" id="filters" class="selectpicker show-menu-arrow" data-none-selected-text="Nothing selected." data-selected-text-format="count > 1" data-style="btn-default btn-sm" data-width="fit" multiple="multiple" tabindex="-98">
                     <option value="empty_upc">Empty Barcode Items</option>
                     <option value="low_inventory">Out Of Stock Items</option>
                     <option value="is_serialized">Serialized Items</option>
                     <option value="no_description">No Description Items</option>
                     <option value="search_custom">Search Custom Items</option>
                     <option value="is_deleted">Deleted</option>
                  </select>
               </div>

               <select name="stock_location" id="stock_location" class="" tabindex="-1" style="background-color: #fff; color: #000;border: 2px solid #dce4ec;padding-bottom: 8px;padding-top: 5px;border-radius: 3px; max-width: 140px;">
                  @if(!empty($shop))
                  	@foreach($shop as $shops)
                  		<option value="{{ $shops->id }}">{{ $shops->shop_name }}</option>
                  	@endforeach
                  @endif
               </select>

               <select id="cat_id" name="cat_id" data-width="12%" class="" data-style="btn-default btn-sm" tabindex="-98" aria-hidden="true" style="background-color: #fff; color: #000;border: 2px solid #dce4ec;padding-bottom: 8px; max-width: 134px; padding-top: 5px;border-radius: 3px; max-width: 140px;">
                 <option value="">Category..</option>
                 @if(!empty($category))
                  	@foreach($category as $categorys)
                  		<option value="{{ $categorys->id }}">{{ $categorys->category_name }}</option>
                  	@endforeach
                 @endif
              </select>

               <select data-width="12%" name="subcat_id" id="sub_cat" class="" data-style="btn-default btn-sm" style="background-color: #fff; color: #000;border: 2px solid #dce4ec;padding-bottom: 8px;padding-top: 5px;border-radius: 3px; max-width: 140px;" tabindex="-1" aria-hidden="true">
                  <option value="">Subcategorie..</option>
                  	@if(!empty($subcategory))
   	               	@foreach($subcategory as $subcat)
   	               		<option value="{{ $subcat->id }}">{{ $subcat->sub_categories_name }}</option>
   	               	@endforeach
                 	@endif
               </select>

               <select id="brand_id" name="brand_id" style="background-color: #fff; color: #000;border: 2px solid #dce4ec; max-width: 145px!imortant; padding-bottom: 8px;padding-top: 5px;border-radius: 3px; max-width: 140px;" tabindex="-1" aria-hidden="true">
                  <option value="">Brand..</option>
                  @if(!empty($brand))
                  	@foreach($brand as $brands)
                  		<option value="{{ $brands->id }}">{{ $brands->brand_name }}</option>
                  	@endforeach
                  @endif
               </select>

               <select style="background-color: #fff; color: #000;border: 2px solid #dce4ec;padding-bottom: 8px;padding-top: 5px;border-radius: 3px; max-width: 140px; max-width: 145px;padding:0!important;height:36px !important" id="edition_id" name="edition_id" data-width="12%" data-style="btn-default btn-sm" tabindex="-1" aria-hidden="true">
                  <option value="">Stock Edition...</option>
                  <option value="85">85</option>
                  <option value="47">47</option>
                  <option value="3">3</option>
                  <option value="5">5</option>
                  <option value="FKI-23.2.32">FKI-23.2.32</option>
                  <option value="5-MAR-20">5-MAR-20</option>
                  <option value="UMATH 17-3-19">UMATH 17-3-19</option>
                  <option value="FKI 16.3.20">FKI 16.3.20</option>
                  <option value="FKI-18.3.18">FKI-18.3.18</option>
               </select>
               <input style="width: 20%;" placeholder="Search" id="search_item" name="search_item" class="pull-right form-control input-sm">
            </div>
         </div>
      </form>

      <div class="clearfix"></div>

      <div id="item-table">
         @include("items.fetch")
      </div>

   </div>



</div>

<script>
   $(function () {
       $('#datetimepicker1').datepicker({ dateFormat: "yyyy-mm-dd" });
   });

   $(document).ready(function() {
      $("#FiltersForm").on('submit', function(e) {
         e.preventDefault();
         //alert($('#FiltersForm').serialize());
         $.ajax({
            type: 'post',
            url: '{{ route("fetch") }}',
            data: $('#FiltersForm').serialize(),
            success: function(data) {
               $('#item-table').empty().html(data);
            },
         });
      });
   });
</script>
@endsection
