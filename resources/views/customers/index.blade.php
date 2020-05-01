@extends('layouts.dbf')

@section('content')

<div class="container">
   <div class="row">
      <div id="title_bar" class="btn-toolbar">
         <button class="btn btn-info btn-sm pull-right modal-dlg" data-btn-submit="Submit" data-href="http://newpos.dbfindia.com/customers/excel_import" title="Customer Import from Excel">
         <span class="glyphicon glyphicon-import">&nbsp;</span>Excel Import		</button>
         <button class="btn btn-info btn-sm pull-right modal-dlg" data-btn-submit="Submit" data-href="http://newpos.dbfindia.com/customers/view" title="New Customer">
         <span class="glyphicon glyphicon-user">&nbsp;</span>New Customer	</button>
         <a class="btn btn-info btn-sm " href="http://newpos.dbfindia.com/customers/get_datatable">Data Table</a>
         <a class="btn btn-info btn-sm " href="http://newpos.dbfindia.com/manager/fetch_valid_customers_contact_no">Contact Numbers</a>
      </div>
      <div id="table_holder">
         <div class="bootstrap-table">
            <div class="fixed-table-toolbar">
               <div class="bs-bars pull-left">
                  <div id="toolbar">
                     <div class="pull-left btn-toolbar">
                        <button id="delete" class="btn btn-default btn-sm" disabled="disabled">
                        <span class="glyphicon glyphicon-trash">&nbsp;</span>Delete</button>
                        <button id="email" class="btn btn-default btn-sm" disabled="">
                        <span class="glyphicon glyphicon-envelope">&nbsp;</span>Email</button>
                     </div>
                  </div>
               </div>
               <div class="columns columns-right btn-group pull-right">
                  <button class="btn btn-default btn-sm" type="button" name="refresh" aria-label="refresh" title="Refresh"><i class="glyphicon glyphicon-refresh icon-refresh"></i></button>
                  <div class="keep-open btn-group" title="Columns">
                     <button type="button" aria-label="columns" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-th icon-th"></i> <span class="caret"></span></button>
                     <ul class="dropdown-menu" role="menu">
                        <li role="menuitem"><label><input type="checkbox" data-field="people.person_id" value="1" checked="checked"> Id</label></li>
                        <li role="menuitem"><label><input type="checkbox" data-field="last_name" value="2" checked="checked"> Last Name</label></li>
                        <li role="menuitem"><label><input type="checkbox" data-field="first_name" value="3" checked="checked"> First Name</label></li>
                        <li role="menuitem"><label><input type="checkbox" data-field="phone_number" value="4" checked="checked"> Phone Number</label></li>
                        <li role="menuitem"><label><input type="checkbox" data-field="total" value="5" checked="checked"> Total Spent</label></li>
                        <li role="menuitem"><label><input type="checkbox" data-field="created_at" value="6" checked="checked"> Created At</label></li>
                     </ul>
                  </div>
                  <div class="export btn-group">
                     <button class="btn btn-default btn-sm dropdown-toggle" aria-label="export type" title="Export data" data-toggle="dropdown" type="button"><i class="glyphicon glyphicon-export icon-share"></i> <span class="caret"></span></button>
                     <ul class="dropdown-menu" role="menu">
                        <li role="menuitem" data-type="json"><a href="javascript:void(0)">JSON</a></li>
                        <li role="menuitem" data-type="xml"><a href="javascript:void(0)">XML</a></li>
                        <li role="menuitem" data-type="csv"><a href="javascript:void(0)">CSV</a></li>
                        <li role="menuitem" data-type="txt"><a href="javascript:void(0)">TXT</a></li>
                        <li role="menuitem" data-type="sql"><a href="javascript:void(0)">SQL</a></li>
                        <li role="menuitem" data-type="excel"><a href="javascript:void(0)">MS-Excel</a></li>
                        <li role="menuitem" data-type="pdf"><a href="javascript:void(0)">PDF</a></li>
                     </ul>
                  </div>
               </div>
               <div class="pull-right search"><input class="form-control input-sm" type="text" placeholder="Search"></div>
            </div>
            <div class="fixed-table-container" style="padding-bottom: 0px;">
               <div class="fixed-table-header" style="display: none;">
                  <table></table>
               </div>
               <div class="fixed-table-body">
                  <div class="fixed-table-loading" style="top: 41px; display: none;">Loading, please wait...</div>
                  <div id="table-sticky-header-sticky-header-container" class="hidden"></div>
                  <div id="table-sticky-header_sticky_anchor_begin"></div>
                  <table id="table" class="table table-hover table-striped">
                     <thead id="table-sticky-header">
                        <tr>
                           <th class="bs-checkbox print_hide" style="width: 36px; " data-field="checkbox">
                              <div class="th-inner "><input name="btSelectAll" type="checkbox"></div>
                              <div class="fht-cell"></div>
                           </th>
                           <th class="" style="" data-field="people.person_id">
                              <div class="th-inner sortable both desc">Id</div>
                              <div class="fht-cell"></div>
                           </th>
                           <th class="" style="" data-field="last_name">
                              <div class="th-inner sortable both">Last Name</div>
                              <div class="fht-cell"></div>
                           </th>
                           <th class="" style="" data-field="first_name">
                              <div class="th-inner sortable both">First Name</div>
                              <div class="fht-cell"></div>
                           </th>
                           <th class="" style="" data-field="phone_number">
                              <div class="th-inner sortable both">Phone Number</div>
                              <div class="fht-cell"></div>
                           </th>
                           <th class="" style="" data-field="total">
                              <div class="th-inner ">Total Spent</div>
                              <div class="fht-cell"></div>
                           </th>
                           <th class="" style="" data-field="created_at">
                              <div class="th-inner sortable both">Created At</div>
                              <div class="fht-cell"></div>
                           </th>
                           <th class="print_hide" style="" data-field="messages">
                              <div class="th-inner "></div>
                              <div class="fht-cell"></div>
                           </th>
                           <th class="print_hide" style="" data-field="edit">
                              <div class="th-inner "></div>
                              <div class="fht-cell"></div>
                           </th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr data-index="0" data-uniqueid="13158">
                           <td class="bs-checkbox print_hide"><input data-index="0" name="btSelectItem" type="checkbox"></td>
                           <td class="" style="">13158</td>
                           <td class="" style="">Wagh</td>
                           <td class="" style="">Aishwarya</td>
                           <td class="" style="">7678456071</td>
                           <td class="" style="">₹&nbsp;350</td>
                           <td class="" style="">07:58 PM 21st-Mar-2020</td>
                           <td class="print_hide" style=""><a href="http://newpos.dbfindia.com/Messages/view/13158" class="modal-dlg" data-btn-submit="Submit" title="Send SMS"><span class="glyphicon glyphicon-phone"></span></a></td>
                           <td class="print_hide" style=""><a href="http://newpos.dbfindia.com/customers/view/13158" class="modal-dlg" data-btn-submit="Submit" title="Update Customer"><span class="glyphicon glyphicon-edit"></span></a></td>
                        </tr>
                        <tr data-index="1" data-uniqueid="13157">
                           <td class="bs-checkbox print_hide"><input data-index="1" name="btSelectItem" type="checkbox"></td>
                           <td class="" style="">13157</td>
                           <td class="" style="">Shrivastav</td>
                           <td class="" style="">Samarpit</td>
                           <td class="" style="">9098195969</td>
                           <td class="" style="">₹&nbsp;1,000</td>
                           <td class="" style="">07:06 PM 21st-Mar-2020</td>
                           <td class="print_hide" style=""><a href="http://newpos.dbfindia.com/Messages/view/13157" class="modal-dlg" data-btn-submit="Submit" title="Send SMS"><span class="glyphicon glyphicon-phone"></span></a></td>
                           <td class="print_hide" style=""><a href="http://newpos.dbfindia.com/customers/view/13157" class="modal-dlg" data-btn-submit="Submit" title="Update Customer"><span class="glyphicon glyphicon-edit"></span></a></td>
                        </tr>
                        <tr data-index="2" data-uniqueid="13156">
                           <td class="bs-checkbox print_hide"><input data-index="2" name="btSelectItem" type="checkbox"></td>
                           <td class="" style="">13156</td>
                           <td class="" style="">Indore </td>
                           <td class="" style="">Right  Point Shop</td>
                           <td class="" style="">7000481017</td>
                           <td class="" style="">₹&nbsp;4,495</td>
                           <td class="" style="">05:58 PM 21st-Mar-2020</td>
                           <td class="print_hide" style=""><a href="http://newpos.dbfindia.com/Messages/view/13156" class="modal-dlg" data-btn-submit="Submit" title="Send SMS"><span class="glyphicon glyphicon-phone"></span></a></td>
                           <td class="print_hide" style=""><a href="http://newpos.dbfindia.com/customers/view/13156" class="modal-dlg" data-btn-submit="Submit" title="Update Customer"><span class="glyphicon glyphicon-edit"></span></a></td>
                        </tr>
                        <tr data-index="3" data-uniqueid="13155">
                           <td class="bs-checkbox print_hide"><input data-index="3" name="btSelectItem" type="checkbox"></td>
                           <td class="" style="">13155</td>
                           <td class="" style="">Ji</td>
                           <td class="" style="">Anuj</td>
                           <td class="" style="">9229422932</td>
                           <td class="" style="">₹&nbsp;500</td>
                           <td class="" style="">05:48 PM 21st-Mar-2020</td>
                           <td class="print_hide" style=""><a href="http://newpos.dbfindia.com/Messages/view/13155" class="modal-dlg" data-btn-submit="Submit" title="Send SMS"><span class="glyphicon glyphicon-phone"></span></a></td>
                           <td class="print_hide" style=""><a href="http://newpos.dbfindia.com/customers/view/13155" class="modal-dlg" data-btn-submit="Submit" title="Update Customer"><span class="glyphicon glyphicon-edit"></span></a></td>
                        </tr>
                     </tbody>
                  </table>
                  <div id="table-sticky-header_sticky_anchor_end"></div>
               </div>
               <div class="fixed-table-footer" style="display: none;">
                  <table>
                     <tbody>
                        <tr></tr>
                     </tbody>
                  </table>
               </div>
            </div>
            <div class="fixed-table-pagination" style="display: block;">
               <div class="pull-left pagination-detail">
                  <span class="pagination-info">Showing 1 to 20 of 13126 rows</span>
                  <span class="page-list">
                     <span class="btn-group dropup">
                        <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown"><span class="page-size">20</span> <span class="caret"></span></button>
                        <ul class="dropdown-menu" role="menu">
                           <li role="menuitem" class=""><a href="#">10</a></li>
                           <li role="menuitem" class=""><a href="#">25</a></li>
                           <li role="menuitem" class=""><a href="#">50</a></li>
                           <li role="menuitem" class=""><a href="#">100</a></li>
                        </ul>
                     </span>
                     rows per page
                  </span>
               </div>
               <div class="pull-right pagination">
                  <ul class="pagination pagination-sm">
                     <li class="page-item page-pre"><a class="page-link" href="#">‹</a></li>
                     <li class="page-item active"><a class="page-link" href="#">1</a></li>
                     <li class="page-item"><a class="page-link" href="#">2</a></li>
                     <li class="page-item"><a class="page-link" href="#">3</a></li>
                     <li class="page-item"><a class="page-link" href="#">4</a></li>
                     <li class="page-item"><a class="page-link" href="#">5</a></li>
                     <li class="page-item page-last-separator disabled"><a class="page-link" href="#">...</a></li>
                     <li class="page-item page-last"><a class="page-link" href="#">657</a></li>
                     <li class="page-item page-next"><a class="page-link" href="#">›</a></li>
                  </ul>
               </div>
            </div>
         </div>
         <div class="clearfix"></div>
      </div>
   </div>
</div>

@endsection