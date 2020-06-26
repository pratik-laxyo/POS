@extends('layouts.dbf')

@section('content')

<div class="container">
	<div class="row">
	   <ul class="nav nav-tabs" data-tabs="tabs">
	      <li class="active" role="presentation">
	         <a data-toggle="tab" href="#info_tab" title="Store Information">Information</a>
	      </li>
	   </ul>
	   <div class="tab-content">
	      <div class="tab-pane fade in active" id="info_tab">
	         <form action="http://newpos.dbfindia.com/config/save_info/" id="info_config_form" enctype="multipart/form-data" class="form-horizontal" method="post" accept-charset="utf-8" novalidate="novalidate">
	            <input type="hidden" name="csrf_ospos_v3" value="cafb801a67c59c2e490c06e48e2ef030">                                                                                       
	            <div id="config_wrapper">
	               <fieldset id="config_info">
	                  <div id="required_fields_message">Fields in red are required</div>
	                  <ul id="info_error_message_box" class="error_message_box"></ul>
	                  <div class="form-group form-group-sm">
	                     <label for="company" class="control-label col-xs-2 required" aria-required="true">Company Name</label>				
	                     <div class="col-xs-6">
	                        <div class="input-group">
	                           <span class="input-group-addon input-sm" data-original-title="" title=""><span class="glyphicon glyphicon-home" data-original-title="" title=""></span></span>
	                           <input type="text" name="company" value="DBF" id="company" class="form-control input-sm required" aria-required="true">
	                        </div>
	                     </div>
	                  </div>
	                  <div class="form-group form-group-sm">
	                     <label for="company_logo" class="control-label col-xs-2">Company Logo</label>				
	                     <div class="col-xs-6">
	                        <div class="fileinput fileinput-exists" data-provides="fileinput">
	                           <div class="fileinput-new thumbnail" style="width: 200px; height: 200px;"></div>
	                           <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 200px;">
	                              <img data-src="holder.js/100%x100%" alt="Company Logo" src="http://newpos.dbfindia.com/uploads/company_logo.png" style="max-height: 100%; max-width: 100%;">
	                           </div>
	                           <div>
	                              <span class="btn btn-default btn-sm btn-file" data-original-title="" title="">
	                              <span class="fileinput-new" data-original-title="" title="">Select Image</span>
	                              <span class="fileinput-exists" data-original-title="" title="">Change Image</span>
	                              <input type="file" name="company_logo">
	                              </span>
	                              <a href="#" class="btn btn-default btn-sm fileinput-exists" data-dismiss="fileinput">Remove Image</a>
	                           </div>
	                        </div>
	                     </div>
	                  </div>
	                  <div class="form-group form-group-sm">
	                     <label for="address" class="control-label col-xs-2 required" aria-required="true">Company Address</label>				
	                     <div class="col-xs-6">
	                        <textarea name="address" cols="40" rows="10" id="address" class="form-control input-sm required" aria-required="true">Indore</textarea>
	                     </div>
	                  </div>
	                  <div class="form-group form-group-sm">
	                     <label for="website" class="control-label col-xs-2">Website</label>				
	                     <div class="col-xs-6">
	                        <div class="input-group">
	                           <span class="input-group-addon input-sm" data-original-title="" title=""><span class="glyphicon glyphicon-globe" data-original-title="" title=""></span></span>
	                           <input type="text" name="website" value="http://www.discountbrandfactory.com/" id="website" class="form-control input-sm">
	                        </div>
	                     </div>
	                  </div>
	                  <div class="form-group form-group-sm">
	                     <label for="email" class="control-label col-xs-2">Email</label>				
	                     <div class="col-xs-6">
	                        <div class="input-group">
	                           <span class="input-group-addon input-sm" data-original-title="" title=""><span class="glyphicon glyphicon-envelope" data-original-title="" title=""></span></span>
	                           <input type="email" name="email" value="changeme@example.com" id="email" class="form-control input-sm">
	                        </div>
	                     </div>
	                  </div>
	                  <div class="form-group form-group-sm">
	                     <label for="phone" class="control-label col-xs-2 required" aria-required="true">Company Phone</label>				
	                     <div class="col-xs-6">
	                        <div class="input-group">
	                           <span class="input-group-addon input-sm" data-original-title="" title=""><span class="glyphicon glyphicon-phone-alt" data-original-title="" title=""></span></span>
	                           <input type="text" name="phone" value="555-555-5555" id="phone" class="form-control input-sm required" aria-required="true">
	                        </div>
	                     </div>
	                  </div>
	                  <div class="form-group form-group-sm">
	                     <label for="fax" class="control-label col-xs-2">Fax</label>				
	                     <div class="col-xs-6">
	                        <div class="input-group">
	                           <span class="input-group-addon input-sm" data-original-title="" title=""><span class="glyphicon glyphicon-phone-alt" data-original-title="" title=""></span></span>
	                           <input type="text" name="fax" value="" id="fax" class="form-control input-sm">
	                        </div>
	                     </div>
	                  </div>
	                  <div class="form-group form-group-sm">
	                     <label for="return_policy" class="control-label col-xs-2 required" aria-required="true">Return Policy</label>				
	                     <div class="col-xs-6">
	                        <textarea name="return_policy" cols="40" rows="10" id="return_policy" class="form-control input-sm required" aria-required="true">-</textarea>
	                     </div>
	                  </div>
	                  <input type="submit" name="submit_info" value="Submit" id="submit_info" class="btn btn-primary btn-sm pull-right">
	               </fieldset>
	            </div>
	         </form>
	      </div>
	   </div>
	</div>
</div>

@endsection