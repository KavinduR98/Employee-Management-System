@extends('admin.layout')
@include('admin.header')
@section('content')

<head>
</head>


<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4">
                <h5 class="mt-3">Employee Dashboard</h5>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4"></div>
            <div class="col-lg-4 col-md-4 col-sm-4"></div>
        </div>
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-9"></div>
            <div class="col-lg-1 col-md-1 col-sm-1">
                <button class="btn btn-primary" type="button" id="btnPrint">Print</button>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1">
                <button class="btn btn-primary" type="button" id="btnexport">Export</button>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1">
                <div style="float:right;">
                    <button type="button" class="btn btn-success" onclick="show_model_register();"><i class="fas fa-plus"></i>&nbsp;Add</button>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top: 20px;">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10px;">
                <table id="emp_table" class="table table-bordered table-striped tablerowsize"
                        cellspacing="0" width="100%">
                    <thead class="table_head">
                    <tr>
                        <th style="width:15%; padding:4px">Name</th>
                        <th style="width:15%; padding:4px">Address</th>
                        <th style="width:15%; padding:4px">DOB</th>
                        <th style="width:15%; padding:4px">Joined Date</th>
                        <th style="width:15%; padding:4px">Phone Number</th>
                        <th style="width:15%; padding:4px">Edit Info</th>
                        <th style="width:15%; padding:4px">Delete</th>
                    </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</body>

<!--Employee Register Modal -->
<div class="modal fade" id="register_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Register Employee</h5>
                <button type="button" onclick="refresh()" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post" id="register_form">
                    @csrf
                    <div class="mb-3">
                        <label class="col-form-label">Full Name:</label>
                        <input type="text" class="form-control" id="e_name" name="e_name" required/>
                        <div id="e_name_error" class="error" style="color: red"></div>
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label">Address:</label>
                        <input type="text" class="form-control" id="e_address" name="e_address" required/>
                        <div id="e_address_error" class="error" style="color: red"></div>
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label">Date of Birth:</label>
                        <input type="date" class="form-control" id="e_dob" name="e_dob" required/>
                        <div id="e_dob_error" class="error" style="color: red"></div>
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label">Joined Date:</label>
                        <input type="date" class="form-control" id="e_joined_date" name="e_joined_date" required/>
                        <div id="e_joined_date_error" class="error" style="color: red"></div>
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label">Phone Number:</label>
                        <input type="number" class="form-control" id="e_phone_number" name="e_phone_number" maxlength="10" required/>
                        <div id="e_phone_number_error" class="error" style="color: red"></div>
                    </div> 
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="refresh();">Close</button>
                        <button type="button" class="btn btn-success" onclick="register_emp();">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--Employee Register Modal -->

<!--Employee Edit Modal -->
<div class="modal fade" id="edit_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Employee</h5>
                <button type="button" onclick="refresh()" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    @csrf
                    <input type="hidden" name="emp_id" id="emp_id" />
                    <div class="mb-3">
                        <label class="col-form-label">Full Name:</label>
                        <input type="text" class="form-control" id="emp_name" name="emp_name" required/>
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label">Address:</label>
                        <input type="text" class="form-control" id="emp_address" name="emp_address" required/>
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label">Date of Birth:</label>
                        <input type="date" class="form-control" id="emp_dob" name="emp_dob" required/>
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label">Joined Date:</label>
                        <input type="date" class="form-control" id="emp_joined_date" name="emp_joined_date" required/>
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label">Phone Number:</label>
                        <input type="number" class="form-control" id="emp_phone_number" name="emp_phone_number" maxlength="10" required/>
                    </div> 
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="refresh();">Close</button>
                        <button type="button" class="btn btn-success" onclick="update_emp();">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--Employee Edit Modal -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.70/vfs_fonts.js" integrity="sha512-vv3EN6dNaQeEWDcxrKPFYSFba/kgm//IUnvLPMPadaUf5+ylZyx4cKxuc4HdBf0PPAlM7560DV63ZcolRJFPqA==" crossorigin="anonymous"></script>
<script type="application/octet-stream" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.70/fonts/Roboto/Roboto-Medium.ttf"></script>
<script src="{{ asset('assets/js/emp_db_list.js') }}"></script>
<script src="{{ asset('assets/js/pdf/Page.js') }}"></script>
<script src="{{ asset('assets/js/pdf/PDFViewer.js') }}"></script>

<script>

    $(document).ready(function(){
        get_emp_data();
    });

</script>

<script>

    function get_emp_data(){
        
        $("#emp_table").dataTable().fnDestroy();

        $("#emp_table").DataTable({
            processing: true,
            "scrollX": true,
            ajax: {
                url: "get_all_emp_data",
                type: "GET",
                data: {},
            },
            columns: [
                { "data": "e_name" },
                { "data": "e_address" },
                { "data": "e_dob" },
                { "data": "e_joined_date" },
                { "data": "e_phone_number" },
          
                {
                    sortable: false,
                    "render": function ( data, type, full, meta ) {
                        var id = ""+full.id;
                        return '<td><a><button type="button" onclick="show_model('+id+')" class="btn btn-primary" style="background-color: #008CBA;"><i class="fas fa-eye"></i></button></a></td>';
                    }
                },
                {
                    sortable: false,
                    "render": function ( data, type, full, meta ) {
                        var id = ""+full.id;
                        return '<td><a><button type="button" onclick="emp_del_func('+id+')"  class="btn btn-primary" style="background-color: #f44336;"><i class="fas fa-trash-alt"></i></button></a></td>';
                    }
                },
            ],
            columnDefs: [{ className: "text-center",
                           targets: [0, 1, 2, 3, 4, 5, 6] },
            { "width": "15%", "targets": [0, 1, 2, 3, 4] }
            ],
            pageLength: 5,
            "order": [[ 0, "asc" ]]
            
           
        });
    }

</script>

<script>
    function show_model_register(){
        $('#register_modal').modal('show');
    }
</script>

<script>
    function register_emp(){

        var name = document.getElementById('e_name').value;
        var address = document.getElementById('e_address').value;
        var dob = document.getElementById('e_dob').value;
        var joined_date = document.getElementById('e_joined_date').value;
        var phone_number = document.getElementById('e_phone_number').value;

        var isValid = true;
        // Clear previous error messages
        document.getElementById('e_name_error').innerHTML = '';
        document.getElementById('e_address_error').innerHTML = '';
        document.getElementById('e_dob_error').innerHTML = '';
        document.getElementById('e_joined_date_error').innerHTML = '';
        document.getElementById('e_phone_number_error').innerHTML = '';

        if (name === '') {
            document.getElementById('e_name_error').innerHTML = 'This is a required field.';
            isValid = false;
        }else if(address === ''){
            document.getElementById('e_address_error').innerHTML = 'This is a required field.';
            isValid = false;
        }else if(dob === ''){
            document.getElementById('e_dob_error').innerHTML = 'This is a required field.';
            isValid = false;
        }else if(joined_date === ''){
            document.getElementById('e_joined_date_error').innerHTML = 'This is a required field.';
            isValid = false;
        }else if(phone_number === ''){
            document.getElementById('e_phone_number_error').innerHTML = 'This is a required field.';
            isValid = false;
        }else if(isValid){
            $.ajax({
        url: "save_emp_info",
        type: "GET",
        data: { 
            name:name,
            address:address,
            dob:dob,
            joined_date:joined_date,
            phone_number:phone_number,
        },
        success: function (response) {
            if(response == "correct"){
                toastr.success('Employee registered successfully!','Registered', {
                    timeOut: 1000,
                    preventDuplicates: true,
                    positionClass: 'toast-top-right',
                    // Redirect 
                    onHidden: function() {
                        window.location.reload();
                    }
                });
            $('#register_modal').modal('hide');
            }else{
                toastr.error('Register failed!', 'Error');
            }
        },
        }); 
        }
    }
</script>

<script>
    function show_model(id){

        var emp_rec_id    = id;

        $.ajax({
        url: "get_emp_data",
        type: "GET",
        data: { 
            emp_rec_id:emp_rec_id,
        },
        success: function (response) {
            let data = response.data[0]; 

            let id = data.id;
            let name = data.e_name;
            let address = data.e_address;
            let dob = data.e_dob;
            let joined_date = data.e_joined_date;
            let phone_number = data.e_phone_number;

            document.getElementById('emp_id').value = id;
            document.getElementById('emp_name').value = name;
            document.getElementById('emp_address').value = address;
            document.getElementById('emp_dob').value = dob;
            document.getElementById('emp_joined_date').value = joined_date;
            document.getElementById('emp_phone_number').value = phone_number;

        },
        
    }); 
        $('#edit_modal').modal('show');
    }
</script>

<script>
    function emp_del_func(id){
        var emp_rec_id = id;

        if (confirm('Are you sure you want to delete this record?')) {
            // user clicked OK
            $.ajax({
        url: "delete_emp",
        type: "GET",
        data: { 
            emp_rec_id:emp_rec_id,
        },
        success: function (response) {
            if(response == "success"){
                    toastr.success('Employee record deleted!','Deleted', {
                        timeOut: 1000,
                        preventDuplicates: true,
                        positionClass: 'toast-top-right',
                        // Redirect 
                        onHidden: function() {
                            window.location.reload();
                        }
                    });
                    $('#edit_modal').modal('hide');
                }else{
                    toastr.error('Delete failed!','Error');
                }
        },
        
    }); 
        } else {
            window.location.reload();
        }
    }
</script>

<script>
    function refresh(){
        window.location.reload();
    } 
</script>

<script>
    function update_emp(){

        var emp_id = document.getElementById('emp_id').value;
        var emp_name = document.getElementById('emp_name').value;
        var emp_address = document.getElementById('emp_address').value;
        var emp_dob = document.getElementById('emp_dob').value;
        var emp_joined_date = document.getElementById('emp_joined_date').value;
        var emp_phone_number = document.getElementById('emp_phone_number').value;
        
        $.ajax({
        type: "GET",
        url: 'update_emp_data',
        data: { emp_id:emp_id,
                emp_name:emp_name,
                emp_address:emp_address,
                emp_dob:emp_dob,
                emp_joined_date:emp_joined_date,
                emp_phone_number:emp_phone_number
            },
            success: function (response) {
                if(response == "success"){
                    toastr.success('Employee info updated successfully', 'Updated', {
                        timeOut: 1000,
                        preventDuplicates: true,
                        positionClass: 'toast-top-right',
                        // Redirect 
                        onHidden: function() {
                            console.log("onHidden");
                            window.location.reload();
                        }
                    });
                    $('#edit_modal').modal('hide');
                }else{
                    toastr.error('Update failed!', 'Error');
                }
            }
        });
    }
</script>

@endsection
@include('admin.footer')
