@extends('admin.main')
@section('content')     
    <div class="page-container-1" id="page-container">
        <div class="page-title padding pb-0 ">
            <h2 class="text-md mb-0" style="padding-bottom: 25px;">Billing
            <a href="{{ url('admin/addUser') }}" class="btn btn-primary" style="float: right;color: white;">Back</a>  
            <a href="{{ url('admin/addBill') }}" class="btn btn-primary mr-3" style="float: right;color: white;">Add Bill</a>
            </h2>
        </div>

        <div class="padding pt-0 ">
            <div class="table-responsive">
                <table id="datatable" class="table table-theme table-row v-middle" data-plugin="dataTable" style="margin-top: -15px;">
                    <thead>
                        <tr>
                            <th><span class="text-muted">Address</span></th>
                            <th><span class="text-muted">City</span></th>                            
                            <th><span class="text-muted">Action</span></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bills as $user)
                            <tr>
                            
                                <td>
                                    <a href="javascript:void(0);" class="item-author ">{{$user->billing_address1}}</a>
                                </td>
                                <td>
                                    <a href="javascript:void(0);" class="item-author ">{{$user->billing_city}}</a>
                                </td>
                                

                                <td>                                    
                                    <a href="{{ url('admin/editBill', $user->auto_num)}}" class="btn btn-primary">Edit</a>      
                                                                 
                                    <button onclick="deleteUser({{$user->auto_num}})" class="btn btn-primary" data-toggle="modal" data-target="#m">Delete</button>
                                </td>
                            </tr>
                        
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<!-- modal -->
<div id="m" class="modal" data-backdrop="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Are you sure to execute this action?</h5>
        </div>
        <!-- <div class="modal-body text-center p-lg">
        <p></p>
        </div> -->
        <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
        <button id="delBtn" type="button" class="btn btn-primary delBtn" data-dismiss="modal">Yes</button>
        </div>
    </div><!-- /.modal-content -->
    </div>
</div>
@stop



@section('script')
<script type="text/javascript">   


    var deleteId = "";
    function deleteUser(id){
        deleteId = id;
    }     

    $("#delBtn").click(function(){    
        deleteData(deleteId, "{{ URL::to('api/deleteBill')}}");        
    });             

</script>

@stop