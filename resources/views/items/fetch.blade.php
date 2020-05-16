<div id="table_holder" class="text-center" style="margin-top:16px;overflow-x:auto">
   <div class="clearfix"></div>
   <div id="table123_wrapper" class="dataTables_wrapper no-footer">
      <table id="table123" class="table table-responsive table-striped  dataTable no-footer" style="width: 100%; display: table-caption;" role="grid" aria-describedby="table123_info">
         <thead>
            <tr role="row">
               <!-- <th style="background-image: none;" class="sorting_desc" rowspan="1" colspan="1" aria-label=""><input style="margin-left: -8px;" type="checkbox" id="master"></th> -->
               <th class="sorting" tabindex="0" aria-controls="table123" rowspan="1" colspan="1" aria-label="id
                  : activate to sort column ascending">id
               </th>
               <th class="sorting" tabindex="0" aria-controls="table123" rowspan="1" colspan="1" aria-label="Barcode
                  : activate to sort column ascending">Barcode
               </th>
               <th class="sorting" tabindex="0" aria-controls="table123" rowspan="1" colspan="1" aria-label="HSN Code: activate to sort column ascending">HSN Code</th>
               <th class="sorting" tabindex="0" aria-controls="table123" rowspan="1" colspan="1" aria-label="Item Name: activate to sort column ascending">Item Name</th>
               <th class="sorting" tabindex="0" aria-controls="table123" rowspan="1" colspan="1" aria-label="Category: activate to sort column ascending">Category</th>
               <th class="sorting" tabindex="0" aria-controls="table123" rowspan="1" colspan="1" aria-label="Subcategroy: activate to sort column ascending">Subcategroy</th>
               <th class="sorting" tabindex="0" aria-controls="table123" rowspan="1" colspan="1" aria-label="Brand: activate to sort column ascending">Brand</th>
               <th class="sorting" tabindex="0" aria-controls="table123" rowspan="1" colspan="1" aria-label="Size: activate to sort column ascending">Size</th>
               <th class="sorting" tabindex="0" aria-controls="table123" rowspan="1" colspan="1" aria-label="Color: activate to sort column ascending">Color</th>
               <th class="sorting" tabindex="0" aria-controls="table123" rowspan="1" colspan="1" aria-label="Expiry Date: activate to sort column ascending">Expiry Date</th>
               <th class="sorting" tabindex="0" aria-controls="table123" rowspan="1" colspan="1" aria-label="Stock Edition: activate to sort column ascending">Stock Edition</th>
               <th class="sorting" tabindex="0" aria-controls="table123" rowspan="1" colspan="1" aria-label="Retail Price: activate to sort column ascending">Retail Price</th>
               <th class="sorting" tabindex="0" aria-controls="table123" rowspan="1" colspan="1" aria-label="Quantity: activate to sort column ascending">Quantity</th>
               <th style="background-image:none; padding-right: 50px; padding-left: 24px;" class="sorting" tabindex="0" aria-controls="table123" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending">Action</th>
            </tr>
         </thead>
         <tbody>
            @if(!empty($items))
               @foreach($items as $item)
                  <tr data-uniqueid="{{ $item->id }}" role="row" class="odd" style="background-color: rgb(249, 249, 249);">
                     <!-- <td><input type="checkbox" class="sub_chk" data-id="{{ $item->id }}"></td> -->
                     <td>{{ $item->id }}</td>
                     <td>{{ $item->item_number }}</td>
                     <td>{{ $item->hsn_no }}</td>
                     <td>{{ $item->name }}</td>
                     <td>{{ $item->categoryName['category_name'] }}</td>
                     <td>{{ $item->subcategoryName['sub_categories_name'] }}</td>
                     <td>{{ $item->brandName['brand_name'] }}</td>
                     <td>{{ $item->sizeName['sizes_name'] }}</td>
                     <td>{{ $item->colorName['color_name'] }}</td>
                     <td>{{ (!empty($item->custom5)) ? $item->custom5 : "0000-00-00" }}</td>
                     <td>{{ $item->custom6 }}</td>
                     <td>{{ $item->unit_price }}</td>
                     <td class="qty_td">{{ $item->receiving_quantity }}</td>
                     <td class="print_hide">
                        <a href="JavaScript:void(0)" class="qty_update" id="{{ $item->receiving_quantity }}" data-btn-submit="Submit" title="Quick Quantity Update" style="margin-right: 9px;color: #000022d6;"><span class="glyphicon glyphicon-erase"></span></a>
                        <a href="http://newpos.dbfindia.com/items/inventory/{{ $item->id }}" class="modal-dlg" data-btn-submit="Submit" title="Update Inventory"><span style="padding-right: 10px;" class="glyphicon glyphicon-pushpin"></span></a>
                        <a href="http://newpos.dbfindia.com/items/count_details/{{ $item->id }}" class="modal-dlg" title="Inventory Count Details"><span style="padding-right: 10px;" class="glyphicon glyphicon-list-alt"></span></a>
                        <a href="http://newpos.dbfindia.com/items/view/{{ $item->id }}" class="modal-dlg" data-btn-submit="Submit" title="Update Item"><span class="glyphicon glyphicon-edit"></span></a>
                     </td>
                  </tr>
               @endforeach
            @endif
         </tbody>
      </table>
   </div>
</div>


<!-- Add Modal -->
<div id="myModal" class="modal bootstrap-dialog modal-dlg type-primary fade size-normal in" role="dialog">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <div class="bootstrap-dialog-header">
               <div class="bootstrap-dialog-close-button" style="display: block;">
               		<button class="close" data-dismiss="modal">×</button>
               </div>
               <div class="bootstrap-dialog-title" id="c0535119-0563-480e-a1ee-c9f1f55db5f3_title">New Item</div>
            </div>
         </div>
         <div class="modal-body">
            <div class="bootstrap-dialog-body">
               <div class="bootstrap-dialog-message">
                  <div>
                    <div id="required_fields_message">Fields in red are required</div>
                    <form action="{{ route('items.store') }}" class="form-horizontal" method="post">
                    	@csrf
                        <fieldset id="item_basic_info">
                           <div class="form-group form-group-sm">
                              <label for="name" class="required control-label col-xs-3">Item Name</label>			
                              <div class="col-xs-8">
                                 <input type="text" name="name" value="" id="name" class="form-control input-sm">
                              </div>
                           </div>

                           <div class="form-group form-group-sm">
                              <label for="category" class="required control-label col-xs-3">Category</label>			
                              <div class="col-xs-6">
                                 <select name="category" class="form-control" id="level1">
                                 	<option value="" selected="selected" disabled="">Select</option>
                                    @if(!empty($category))
							               	@foreach($category as $categorys)
							               		<option value="{{ $categorys->id }}">{{ $categorys->category_name }}</option>
							               	@endforeach
						              	   @endif
                                 </select>
                              </div>
                           </div>

                           <div class="form-group form-group-sm">
                              <label for="subcategory" class="required control-label col-xs-3">Subcategory</label>			
                              <div class="col-xs-6">
                                 <select name="subcategory" class="form-control" id="level2">
                                    <option value="" selected="selected" disabled="">Select</option>
                                    @if(!empty($subcategory))
							               	@foreach($subcategory as $subcat)
							               		<option value="{{ $subcat->id }}">{{ $subcat->sub_categories_name }}</option>
							               	@endforeach
						              	   @endif
                                 </select>
                              </div>
                           </div>

                           <div class="form-group form-group-sm">
                              <label for="brand" class="required control-label col-xs-3">Brand</label>			
                              <div class="col-xs-6">
                                 <select name="brand" class="form-control" id="brand">
                                    <option value="" selected="selected" disabled="">Select</option>
                                    @if(!empty($brand))
							               	@foreach($brand as $brands)
							               		<option value="{{ $brands->id }}">{{ $brands->brand_name }}</option>
							               	@endforeach
						              	   @endif
                                 </select>
                              </div>
                           </div>

                           <div class="form-group form-group-sm">
                              <label for="size" class="required control-label col-xs-3">Size</label>			
                              <div class="col-xs-6">
                                 <select name="size" class="form-control ui-autocomplete-input" id="size" autocomplete="off">
                                    <option value="" selected="selected" disabled="">Select</option>
                                    @if(!empty($size))
							               	@foreach($size as $sizes)
							               		<option value="{{ $sizes->id }}">{{ $sizes->sizes_name }}</option>
							               	@endforeach
						              	   @endif
                                 </select>
                              </div>
                           </div>

                           <div class="form-group form-group-sm">
                              <label for="color" class="required control-label col-xs-3">Color</label>			
                              <div class="col-xs-6">
                                 <select name="color" class="form-control ui-autocomplete-input" id="color" autocomplete="off">
                                    <option value="" selected="selected" disabled="">Select</option>
                                    @if(!empty($color))
							               	@foreach($color as $colors)
							               		<option value="{{ $colors->id }}">{{ $colors->color_name }}</option>
							               	@endforeach
					              	      @endif
                                 </select>
                              </div>
                           </div>

                           <div class="form-group form-group-sm">
                              <label for="model" class="control-label col-xs-3">Model</label>
                              <div class="col-xs-6">
                                 <input type="text" name="model" value="" id="model" class="form-control input-sm ui-autocomplete-input" autocomplete="off">
                              </div>
                           </div>
                           <!-- WHOLESALE PRICE COLUMN REMOVED FROM HERE -->
                           <div class="form-group form-group-sm">
                              <label for="unit_price" class="required control-label col-xs-3" aria-required="true">Retail Price</label>			
                              <div class="col-xs-4">
                                 <div class="input-group input-group-sm">
                                    <span class="input-group-addon input-sm"><b>₹</b></span>
                                    <input type="text" name="unit_price" value="0" id="unit_price" class="form-control input-sm">
                                 </div>
                              </div>
                           </div>
                           <div class="form-group form-group-sm">
                              <label for="tax_percent_1" class="control-label col-xs-3">Tax 1</label>			
                              <div class="col-xs-4">
                                 <input type="text" name="tax_names[]" value="CGST" id="tax_name_1" class="form-control input-sm" readonly="true">
                              </div>
                              <div class="col-xs-4">
                                 <div class="input-group input-group-sm">
                                    <input type="text" name="tax_percents[]" value="" id="tax_percent_name_1" class="form-control input-sm">
                                    <span class="input-group-addon input-sm"><b>%</b></span>
                                 </div>
                              </div>
                           </div>
                           <div class="form-group form-group-sm">
                              <label for="tax_percent_2" class="control-label col-xs-3">Tax 2</label>			
                              <div class="col-xs-4">
                                 <input type="text" name="tax_names[]" value="SGST" id="tax_name_2" class="form-control input-sm" readonly="true">
                              </div>
                              <div class="col-xs-4">
                                 <div class="input-group input-group-sm">
                                    <input type="text" name="tax_percents[]" value="" class="form-control input-sm" id="tax_percent_name_2">
                                    <span class="input-group-addon input-sm"><b>%</b></span>
                                 </div>
                              </div>
                           </div>
                           <div class="form-group form-group-sm">
                              <label for="tax_percent_3" class="control-label col-xs-3">Tax 3</label>			
                              <div class="col-xs-4">
                                 <input type="text" name="tax_names[]" value="IGST" id="tax_name_3" class="form-control input-sm" readonly="true">
                              </div>
                              <div class="col-xs-4">
                                 <div class="input-group input-group-sm">
                                    <input type="text" name="tax_percents[]" value="" class="form-control input-sm" id="tax_percent_name_3">
                                    <span class="input-group-addon input-sm"><b>%</b></span>
                                 </div>
                              </div>
                           </div>

                           <div class="form-group form-group-sm">
                              <label for="receiving_quantity" class="required control-label col-xs-3" aria-required="true">Receiving Quantity</label>			
                              <div class="col-xs-4">
                                 <input type="text" name="receiving_quantity" value="1" id="receiving_quantity" class="required form-control input-sm" readonly="true" aria-required="true">
                              </div>
                           </div>
                           <div class="form-group form-group-sm">
                              <label for="reorder_level" class="required control-label col-xs-3" aria-required="true">Reorder Level</label>			
                              <div class="col-xs-4">
                                 <input type="text" name="reorder_level" value="1" id="reorder_level" class="form-control input-sm">
                              </div>
                           </div>
                           <div class="form-group form-group-sm">
                              <label for="description" class="control-label col-xs-3">Description</label>			
                              <div class="col-xs-8">
                                 <textarea name="description" cols="40" rows="10" id="description" class="form-control input-sm"></textarea>
                              </div>
                           </div>

                           <div class="form-group form-group-sm">
                              <label for="deleted" class="control-label col-xs-3">Deleted</label>			
                              <div class="col-xs-1">
                                 <input type="checkbox" name="deleted" value="1" id="deleted">
                              </div>
                           </div>

                           <div class="form-group form-group-sm">
                              <label for="hsn_no" class="control-label col-xs-3">HSN Code</label>			
                              <div class="col-xs-6">
                                 <input type="text" name="hsn_no" value="" id="hsn_no" class="form-control input-sm ui-autocomplete-input" autocomplete="off">
                              </div>
                           </div>
                           <!-----Expiry Date-->
                           <div class="form-group form-group-sm">
                              <label for="expiry" class="control-label col-xs-3">Expiry</label>			
                              <div class="col-xs-6" id='datetimepicker1'>
                                 <input type="text" name="custom5" id="expiry" class="form-control input-sm">
                              </div>
                           </div>
                           <!------Stock Locations---->
                           <div class="form-group form-group-sm">
                              <label for="stock_edition" class="control-label col-xs-3">Stock Edition</label>			
                              <div class="col-xs-6">
                                 <input type="text" name="custom6" id="stock_edition" class="form-control input-sm">
                              </div>
                           </div>

                           <hr>
                           <p name="custom_price_label" id="custom_price_label" value="fixed" style="text-align:center; font-weight:bold; font-size: 1.2em; color:#9C27B0">Fixed Prices</p>

                           <div class="form-group form-group-sm">
                              <label for="retail" class="control-label col-xs-3">RETAIL</label>				
                              <div class="col-xs-8">
                                 <input type="text" name="retail" value="" id="retail" class="form-control input-sm">
                              </div>
                           </div>
                           <div class="form-group form-group-sm">
                              <label for="wholesale" class="control-label col-xs-3">WHOLESALE</label>				
                              <div class="col-xs-8">
                                 <input type="text" name="wholesale" value="" id="wholesale" class="form-control input-sm">
                              </div>
                           </div>
                           <div class="form-group form-group-sm">
                              <label for="franchise" class="control-label col-xs-3">FRANCHISE</label>				
                              <div class="col-xs-8">
                                 <input type="text" name="franchise" value="" id="franchise" class="form-control input-sm">
                              </div>
                           </div>
                           <div class="form-group form-group-sm">
                              <label for="special" class="control-label col-xs-3">SPECIAL APPROVAL</label>					
                              <div class="col-xs-8">
                                 <input type="text" name="special" value="" id="special" class="form-control input-sm">
                              </div>
                           </div>
                        </fieldset>
                        
				         <div class="modal-footer" style="display: block;">
				            <div class="bootstrap-dialog-footer">
				               <div class="bootstrap-dialog-footer-buttons">
				               	<button class="btn btn-primary" id="submit" name="submit">Submit</button>
				               </div>
				            </div>
				         </div>
                    </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- Add Modal --> 


<!-- Sheet Import Modal --> 
<!-- <div class="modal bootstrap-dialog modal-dlg type-primary fade size-normal in" role="dialog" aria-hidden="true" id="86eb159f-1194-4d0e-8190-5e3598f1bf52" aria-labelledby="86eb159f-1194-4d0e-8190-5e3598f1bf52_title" tabindex="-1" style="z-index: 1050; display: block; padding-right: 17px;"> -->
<div id="sheetImport" class="modal bootstrap-dialog modal-dlg type-primary fade size-normal in" role="dialog">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <div class="bootstrap-dialog-header">
               <div class="bootstrap-dialog-close-button" style="display: block;"><button class="close" data-dismiss="modal">×</button></div>
               <div class="bootstrap-dialog-title" id="86eb159f-1194-4d0e-8190-5e3598f1bf52_title">Item Import from Excel</div>
            </div>
         </div>
         <div class="modal-body">
            <div class="bootstrap-dialog-body">
               <div class="bootstrap-dialog-message">
                  <div>
                     <ul id="error_message_box" class="error_message_box"></ul>
                     <form action="http://newpos.dbfindia.com/items/do_excel_import2/" id="excel_form" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8" novalidate="novalidate">
                        <input type="hidden" name="csrf_ospos_v3" value="8e7a78430c02ed49c3591c0035eb34ad">                                                                                                                        
                        <fieldset id="item_basic_info">
                           <div class="form-group form-group-sm">
                              <div class="col-xs-4">
                                 <label>Sheet Uploader</label>
                              </div>
                              <div class="col-xs-8">
                                 <select class="form-control" name="sheet_uploader" required="" aria-required="true">
                                    <option value="">Select Name</option>
                                    <option value="25">Narayan Shinde</option>
                                    <option value="26">Aashish Pal</option>
                                    <option value="29">Sunil Shekhawat</option>
                                 </select>
                              </div>
                           </div>
                           <div class="form-group form-group-sm">
                              <div class="col-xs-4">
                                 <label>Password</label>
                              </div>
                              <div class="col-xs-8">
                                 <input class="form-control" type="password" name="password" required="" aria-required="true">
                              </div>
                           </div>
                           <div class="form-group form-group-sm">
                              <div class="col-xs-4">
                                 <label>Function</label>
                              </div>
                              <div class="col-xs-8">
                                 <select name="sheet_type" class="form-control">
                                    <option value="">-- Select --</option>
                                    <option value="new_stock">Excel Import</option>
                                    <!--<option value='update_stock'>Excel Update</option>-->
                                    <option value="undelete_stock">Excel Undelete</option>
                                 </select>
                              </div>
                           </div>
                           <div class="form-group form-group-sm">
                              <div class="col-xs-12">
                                 <a href="http://newpos.dbfindia.com/items/excel">Download Import Excel Template (CSV)</a>
                              </div>
                           </div>
                           <div class="form-group form-group-sm">
                              <div class="col-xs-12">
                                 <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                    <div class="form-control" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i><span class="fileinput-filename"></span></div>
                                    <span class="input-group-addon input-sm btn btn-default btn-file"><span class="fileinput-new">Select file</span><span class="fileinput-exists">Change</span><input type="file" id="file_path" name="file_path" accept=".csv"></span>
                                    <a href="#" class="input-group-addon input-sm btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                 </div>
                              </div>
                           </div>
                        </fieldset>
                     </form>
                  </div>
               </div>
            </div>
         </div>
         <div class="modal-footer" style="display: block;">
            <div class="bootstrap-dialog-footer">
               <div class="bootstrap-dialog-footer-buttons"><button class="btn btn-primary" id="submit">Submit</button></div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- Sheet Import Modal --> 


<style type="text/css">
   #table123_length{
      display: none !important;
   }
</style>

<script type="text/javascript">
   $(document).ready(function() {
      $('#table123').DataTable({
         "pageLength": 30,
         "searching": false
      });
   });
</script>