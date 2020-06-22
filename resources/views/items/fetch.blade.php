<table id="table123" class="table table-hover">
   <thead>
      <tr>
         <!-- <th style="background-image: none;" class="sorting_desc" rowspan="1" colspan="1" aria-label=""><input style="margin-left: -8px;" type="checkbox" id="master"></th> -->
         <th>Id</th>
         <th>Barcode</th>
         <th>HSN Code</th>
         <th>Item Name</th>
         <th>Category</th>
         <th>Subcategroy</th>
         <th>Brand</th>
         <th>Size</th>
         <th>Color</th>
         <th>Expiry Date</th>
         <th>Stock Edition</th>
         <th>Retail Price</th>
         <th>Quantity</th>
         <th style="background-image:none; padding-right: 50px; padding-left: 24px;">Action</th>
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


<!-- Add Modal -->
<div id="myModal" class="modal bootstrap-dialog modal-dlg type-primary fade size-normal in" tabindex="-1" role="dialog">
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
                    <form action="{{ route('items.store') }}" id="formValidate" class="form-horizontal" method="post">
                    	@csrf
                        <fieldset id="item_basic_info">
                           <div class="form-group col-md-12">
                              <label for="name">Item Name</label>			
                              <div class="col-md-8" style="float: right;">
                                 <input type="text" name="name" id="name" class="form-control input-sm">
                              </div>
                           </div>

                           <div class="form-group col-md-12">
                              <label for="category">Category</label>			
                              <div class="col-md-8" style="float: right;">
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

                           <div class="form-group col-md-12">
                              <label for="subcategory">Subcategory</label>			
                              <div class="col-md-8" style="float: right;">
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

                           <div class="form-group col-md-12">
                              <label for="brand">Brand</label>			
                              <div class="col-md-8" style="float: right;">
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

                           <div class="form-group col-md-12">
                              <label for="size">Size</label>			
                              <div class="col-md-8" style="float: right;">
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

                           <div class="form-group col-md-12">
                              <label for="color">Color</label>			
                              <div class="col-md-8" style="float: right;">
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

                           <div class="form-group col-md-12">
                              <label for="model">Model</label>
                              <div class="col-md-8" style="float: right;">
                                 <input type="text" name="model" value="" id="model" class="form-control input-sm ui-autocomplete-input" autocomplete="off">
                              </div>
                           </div>
                           <!-- WHOLESALE PRICE COLUMN REMOVED FROM HERE -->
                           <div class="form-group col-md-12">
                              <label for="unit_price" aria-required="true">Retail Price</label>			
                              <div class="col-md-8" style="float: right;">
                                 <div class="input-group input-group-sm">
                                    <span class="input-group-addon input-sm"><b>₹</b></span>
                                    <input type="text" name="unit_price" value="0" id="unit_price" class="form-control input-sm">
                                 </div>
                              </div>
                           </div>

                           <div class="form-group col-md-12">
                              <label for="tax_percent_1" class="col-md-4" style="float: left;">Tax 1</label>
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

                           <div class="form-group col-md-12">
                              <label for="tax_percent_2" class="col-md-4" style="float: left;">Tax 2</label>
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

                           <div class="form-group col-md-12">
                              <label for="tax_percent_3" class="col-md-4" style="float: left;">Tax 3</label>
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

                           <div class="form-group col-md-12">
                              <label for="receiving_quantity" aria-required="true">Receiving Quantity</label>			
                              <div class="col-md-8" style="float: right;">
                                 <input type="text" name="receiving_quantity" value="1" id="receiving_quantity" readonly="true" aria-required="true" class="form-control input-sm">
                              </div>
                           </div>

                           <div class="form-group col-md-12">
                              <label for="reorder_level" aria-required="true">Reorder Level</label>			
                              <div class="col-md-8" style="float: right;">
                                 <input type="text" name="reorder_level" value="1" id="reorder_level" class="form-control input-sm">
                              </div>
                           </div>

                           <div class="form-group col-md-12">
                              <label for="description">Description</label>
                              <div class="col-md-8" style="float: right;">
                                 <textarea name="description" cols="40" rows="10" id="description" class="form-control input-sm"></textarea>
                              </div>
                           </div>

                           <div class="form-group col-md-12">
                              <label for="deleted">Deleted</label>

                              <div class="col-md-8" style="float: right;">
                                 <input type="checkbox" name="deleted" value="1" id="deleted">
                              </div>
                           </div>

                           <div class="form-group col-md-12">
                              <label for="hsn_no">HSN Code</label>			
                              <div class="col-md-8" style="float: right;">
                                 <input type="text" name="hsn_no" value="" id="hsn_no" class="form-control input-sm ui-autocomplete-input" autocomplete="off">
                              </div>
                           </div>
                           <!-----Expiry Date-->
                           <div class="form-group col-md-12">
                              <label for="expiry">Expiry</label>			
                              <div class="col-md-8" style="float: right;" id='datetimepicker1'>
                                 <input type="text" name="custom5" id="expiry" class="form-control input-sm">
                              </div>
                           </div>
                           <!------Stock Locations---->
                           <div class="form-group col-md-12">
                              <label for="stock_edition">Stock Edition</label>			
                              <div class="col-md-8" style="float: right;">
                                 <input type="text" name="custom6" id="stock_edition" class="form-control input-sm">
                              </div>
                           </div>

                           <hr>
                           <p class="col-md-12" name="custom_price_label" id="custom_price_label" value="fixed" style="text-align:center; font-weight:bold; font-size: 1.2em; color:#9C27B0">Fixed Prices</p>

                           <div class="form-group col-md-12">
                              <label for="retail">RETAIL</label>				
                              <div class="col-md-8" style="float: right;">
                                 <input type="text" name="retail" value="" id="retail" class="form-control input-sm">
                              </div>
                           </div>
                           <div class="form-group col-md-12">
                              <label for="wholesale">WHOLESALE</label>				
                              <div class="col-md-8" style="float: right;">
                                 <input type="text" name="wholesale" value="" id="wholesale" class="form-control input-sm">
                              </div>
                           </div>
                           <div class="form-group col-md-12">
                              <label for="franchise">FRANCHISE</label>				
                              <div class="col-md-8" style="float: right;">
                                 <input type="text" name="franchise" value="" id="franchise" class="form-control input-sm">
                              </div>
                           </div>
                           <div class="form-group col-md-12">
                              <label for="special" class=" col-md-3">SPECIAL APPROVAL</label>					
                              <div class="col-md-8" style="float: right;">
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
<div id="sheetImport" class="modal bootstrap-dialog modal-dlg type-primary fade size-normal in" role="dialog">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <div class="bootstrap-dialog-header">
               <div class="bootstrap-dialog-close-button" style="display: block;"><button class="close" data-dismiss="modal">×</button></div>
               <div class="bootstrap-dialog-title" id="86eb159f-1194-4d0e-8190-5e3598f1bf52_title">Item Import from Excel</div>
            </div>
         </div>
         <form id="excel_form" action="{{ route('excel_import') }}" enctype="multipart/form-data" method="post">
            @csrf
            <div class="modal-body">
               <div class="bootstrap-dialog-body">
                  <div class="bootstrap-dialog-message">
                     <div>
                        <!-- <ul id="error_message_box" class="error_message_box">dddd</ul> -->
                        <div class="errMsg alert-danger"></div>
                        <fieldset id="item_basic_info1">

                           <div class="form-group col-md-12">
                              <label>Sheet Uploader</label>
                              <div class="col-md-8" style="float: right;">
                                 <select class="form-control input-sm" name="sheet_uploader">
                                    <option value="">Select Name</option>
                                    @if(!empty($custom))
                                       @foreach($custom as $customs)
                                          <option value="{{ $customs->id }}">{{ $customs->title }}</option>
                                       @endforeach
                                    @endif
                                 </select>
                              </div>
                           </div>

                           <div class="form-group col-md-12">
                              <label for="password">Password</label>       
                              <div class="col-md-8" style="float: right;">
                                 <input type="password" name="password" class="form-control input-sm">
                              </div>
                           </div>

                           <div class="form-group col-md-12">
                              <label>Function</label>
                              <div class="col-md-8" style="float: right;">
                                 <select name="sheet_type" class="form-control input-sm">
                                    <option value="">-- Select --</option>
                                    <option value="new_stock">Excel Import</option>
                                    <option value="undelete_stock">Excel Undelete</option>
                                 </select>
                              </div>
                           </div>
                           <div class="form-group">
                              <div class="col-xs-12">
                                 <a href="http://newpos.dbfindia.com/items/excel">Download Import Excel Template (CSV)</a>
                              </div>
                           </div>
                           <div class="form-group col-md-12">
                              <input type="file" name="file_path" accept=".xls" class="form-control input-sm">
                           </div>
                        </fieldset>
                     </div>
                  </div>
               </div>
            </div>
            <div class="modal-footer" style="display: block;">
               <div class="bootstrap-dialog-footer">
                  <div class="bootstrap-dialog-footer-buttons">
                     <button class="btn btn-primary" type="submit">Submit</button>
                  </div>
               </div>
            </div>
         </form>
      </div>
   </div>
</div>
<!-- Sheet Import Modal --> 


<style type="text/css">
   #table123_length{
      display: none !important;
   }
   .errMsg{
      padding: 10px;
      font-weight: bold;
      margin-bottom: 15px;
      display: none;
   }
</style>

<script type="text/javascript">
   $(document).ready(function() {
      $('#table123').DataTable({
         "pageLength": 30,
         "searching": false
      });
   });

   $("#formValidate").validate({
      errorElement: 'p',
      errorClass: 'help-inline',
      
      rules: {
         name:{
            required:true
         },
         category:{
            required:true
         },
         subcategory:{
            required:true
         },
         brand:{
            required:true
         },
         size:{
            required:true
         },
         color:{
            required:true
         },
         unit_price:{
            required:true
         },
         reorder_level:{
            required:true
         },
      },
       
      messages: {},
      submitHandler: function(form) { 
         form.submit();
      }
   });

   $("#excel_form").validate({
      errorElement: 'p',
      errorClass: 'help-inline',
      
      rules: {
         sheet_uploader:{
            required:true
         },
         password:{
            required:true
         },
         sheet_type:{
            required:true
         },
         file_path:{
            required:true
         }
      },
       
      messages: {},
      submitHandler: function(form) { 
         form.submit();
      }
   });
</script>