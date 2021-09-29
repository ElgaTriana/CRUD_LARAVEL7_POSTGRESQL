@extends('layouts.app')
 
@section('content')
    <div class="card">
        <h5 class="card-header d-flex justify-content-between align-items-center">
          List Power Unit
          <button type="button" class="btn btn-primary" id="add"><i class="fa fa-add"></i></button>
        </h5>
        <div class="card-body">
            <table class="table table-striped datatable-colvis-basic"></table>
        </div>
    </div>
    <div id="tampilmodal"></div>      
@endsection

@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(function(){

            let corporation=@json($corporation); 
            let location=@json($location); 
            let power_unit_type=@json($power_unit_type); 
 
            function showData(){
                $.fn.dataTable.ext.errMode = 'none';
                $('.datatable-colvis-basic').DataTable({
                    processing: true,
                    serverSide: true,
                    searchHighlight: true,
                    lengthMenu: [[10, 50, 100, -1], [25, 50, 100, "All"]],
                    ajax: "{{URL::to('powerunit')}}",                      
                    columns: [
                        {data: null,sortable: false, searchable:false, width:'5%',title:'No', 
                            render: function (data, type, row, meta) {
                                return meta.row + meta.settings._iDisplayStart + 1;
                            }  
                        },
                        {data: 'POWER_UNIT_NUM', name: 'POWER_UNIT_NUM',title:'NUM', width:'25%'},
                        {data: 'DESCRIPTION', name: 'DESCRIPTION',title:'DESCRIPTION', width:'25%'},
                        {data: 'corporation.CORPORATION_NAME', name: 'corporation.CORPORATION_NAME',title:'CORPORATION', width:'10%'},
                        {data: 'location.LOCATION_NAME', name: 'location.LOCATION_NAME', title:'LOCATION', width:'10%'},
                        {data: 'power_unit_type.POWER_UNIT_TYPE_XID', name: 'power_unit_type.POWER_UNIT_TYPE_XID',title:'TYPE', width:'10%'},
                        {data: 'IS_ACTIVE', name: 'IS_ACTIVE',title:'ACTIVE', searchable:false, width:'5%'},
                        {data: 'action', name: 'action', title:'ACTION', searchable:false, width:'10%'}
                    ],
                    columnDefs: [
                        {"className": "dt-center", "targets": "_all"}
                    ],
                    colVis: {
                        buttonText: "<i class='icon-three-bars'></i> <span class='caret'></span>",
                        align: "right",
                        overlayFade: 200,
                        showAll: "Show all",
                        showNone: "Hide all"
                    },
                }); 

                $('.ColVis_Button').addClass('btn btn-primary btn-icon').on('click mouseover', function() {
                    $('.ColVis_collection input').uniform();
                });
            }

            showData();

            $('#add').on('click', function(){
                var tambah="";

                tambah+=`

                <div class="modal fade" id="modal_tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <form onsubmit="return false;" enctype="multipart/form-data" id="formTambah">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">New Power Unit</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div id="pesan"></div>
                                <div class="form-group">
                                    <label for="recipient-name" class="form-control-label">NUM : </label>
                                    <input type="text" class="form-control" name="number" placeholder="POWER UNIT NUM" required>
                                </div>

                                <div class="form-group">
                                    <label for="message-text" class="form-control-label">DESCRIPTION :</label>
                                    <textarea class="form-control" name="description" placeholder="DESCRIPTION"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="message-text" class="form-control-label">Corporation :</label>
                                    <select class="form-control" name="id_corporation" id="id_corporation">
                                    <option value="">Select Corporate</option>`;
                                    $.each(corporation, function(a, b){
                                        tambah+=`<option value="${b.ID_CORPORATION}">${b.CORPORATION_NAME}</option>`;            
                                    })
                                    tambah+=
                                    `</select>
                                </div>

                                <div class="form-group">
                                    <label for="message-text" class="form-control-label">Location :</label>
                                    <select class="form-control" name="id_location" id="id_location">
                                    <option value="">Select Location</option>`;
                                    $.each(location, function(a, b){
                                        tambah+=`<option value="${b.ID_LOCATION}">${b.LOCATION_NAME}</option>`;            
                                    })
                                    tambah+=
                                    `</select>
                                </div>

                                <div class="form-group">
                                    <label for="message-text" class="form-control-label">   Type Power Unit :</label>
                                    <select class="form-control" name="type_power_unit" id="type_power_unit">
                                    <option value="">Select Power Unit</option>`;
                                    $.each(power_unit_type, function(a, b){
                                        tambah+=`<option value="${b.ID_POWER_UNIT_TYPE}">${b.POWER_UNIT_TYPE_XID}</option>`;            
                                    })
                                    tambah+=
                                    `</select>
                                </div>

                                <div class="form-group">
                                    <label for="message-text" class="form-control-label">ACTIVE :</label>
                                    <select class="form-control" name="is_active">
                                        <option value="Y">Y</option>
                                        <option value="N">N</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Send message</button>
                            </div>
                        </form>
                        </div>
                    </div>
                `;

                $('#tampilmodal').empty().html(tambah);
                $('#modal_tambah').modal('show');
            });

            $(document).on("submit","#formTambah",function(e){
                var data = new FormData(this);
                if($("#formTambah")[0].checkValidity()) {
                    //updateAllMessageForms();
                    e.preventDefault();
                    $.ajax({
                        url         : "{{URL::to('powerunit')}}",
                        type        : 'post',
                        data        : data,
                        dataType    : 'JSON',
                        contentType : false,
                        cache       : false,
                        processData : false,
                        beforeSend  : function (){
                            $('#pesan').html('<div class="alert alert-info"><i class="fa fa-spinner fa-2x fa-spin"></i>&nbsp;Please wait for a few minutes</div>');
                        },
                        success : function (data) {
                            Swal.fire({
                                position: 'inherit',
                                icon: 'success',
                                title: 'Your work has been saved',
                                showConfirmButton: false,
                                timer: 1500
                            });
                            // showData();
                            document.location.reload();
                            $('#modal_tambah').modal('hide');
                        },
                        error   :function() {
                            Swal.fire({
                                position: 'inherit',
                                icon: 'error',
                                title: 'Error',
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                    });
                }else console.log("invalid form");
            });

            $(document).on("click",".hapus",function(){
                kode=$(this).attr("kode");

                Swal.fire({
                    title: "Are you sure?",
                    text: "Delete, This Data!",
                    type: "warning",
                    showDenyButton: true,
                    confirmButtonColor: "#DD6B55",
                    denyButtonColor: "#757575",
                    confirmButtonText: "Yes, Remove!",
                    denyButtonText: "No, cancel!",
                }).then((result) => {
                    if (result.isConfirmed) {
                      $.ajax({
                        url:"{{URL::to('powerunit')}}/"+kode,
                        type:"DELETE",
                        success:function(result){
                            document.location.reload();
                            Swal.fire('Deleted!', result.pesan, 'success');
                        }
                      })
                    } else if (result.isDenied) {
                      Swal.fire('Your data is safe :)', '', 'info')
                    }
                });
            });

            $(document).on("click",".edit",function(){
                kode=$(this).attr("kode");

                var edit="";

                $.ajax({
                    url:"{{URL::to('powerunit')}}/"+kode,
                    type:"GET",
                    success:function(result){
                        console.log(result);
                        edit+=`
                        <div class="modal fade" id="modal_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <form onsubmit="return false;" enctype="multipart/form-data" id="formEdit">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Power Unit</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div id="pesan"></div>
                                        <div class="form-group">
                                            <label for="recipient-name" class="form-control-label">NUM : </label>
                                            <input type="text" value="${result.POWER_UNIT_NUM}" class="form-control" name="number_edit" placeholder="POWER UNIT NUM" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="message-text" class="form-control-label">DESCRIPTION :</label>
                                            <textarea class="form-control" name="description_edit" placeholder="DESCRIPTION">${result.DESCRIPTION}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="message-text" class="form-control-label">Corporation :</label>
                                            <select class="form-control" name="id_corporation_edit" id="id_corporation">
                                            <option value="">Select Corporate</option>`;
                                            $.each(corporation, function(a, b){
                                                if(b.ID_CORPORATION==result.ID_CORPORATION){
                                                    edit+=`<option value="${b.ID_CORPORATION}" selected>${b.CORPORATION_NAME}</option>`;            
                                                }else{
                                                    edit+=`<option value="${b.ID_CORPORATION}">${b.CORPORATION_NAME}</option>`;            
                                                }
                                            })
                                            edit+=
                                            `</select>
                                        </div>

                                        <div class="form-group">
                                            <label for="message-text" class="form-control-label">Location :</label>
                                            <select class="form-control" name="id_location_edit" id="id_location">
                                            <option value="">Select Location</option>`;
                                            $.each(location, function(a, b){
                                                if(b.ID_LOCATION==result.ID_LOCATION){
                                                    edit+=`<option value="${b.ID_LOCATION}" selected>${b.LOCATION_NAME}</option>`;            
                                                }else{
                                                    edit+=`<option value="${b.ID_LOCATION}">${b.LOCATION_NAME}</option>`;            
                                                }
                                            })
                                            edit+=
                                            `</select>
                                        </div>

                                        <div class="form-group">
                                            <label for="message-text" class="form-control-label">   Type Power Unit :</label>
                                            <select class="form-control" name="type_power_unit_edit" id="type_power_unit">
                                            <option value="">Select Power Unit</option>`;
                                            $.each(power_unit_type, function(a, b){
                                                if(b.ID_POWER_UNIT_TYPE==result.ID_POWER_UNIT_TYPE){
                                                    edit+=`<option value="${b.ID_POWER_UNIT_TYPE}" selected>${b.POWER_UNIT_TYPE_XID}</option>`;            
                                                }else{
                                                    edit+=`<option value="${b.ID_POWER_UNIT_TYPE}">${b.POWER_UNIT_TYPE_XID}</option>`;            
                                                }
                                            })
                                            edit+=
                                            `</select>
                                        </div>

                                        <div class="form-group">
                                            <label for="message-text" class="form-control-label">ACTIVE :</label>
                                            <select class="form-control" name="is_active_edit">`;
                                                if(result.IS_ACTIVE=="Y"){
                                                    edit+=`<option value="Y" selected>Y</option>
                                                    <option value="N">N</option>`;
                                                }else{
                                                    edit+=`<option value="N" selected>N</option>
                                                    <option value="Y" selected>N</option>`;
                                                }
                                            edit+=`</select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Send message</button>
                                    </div>
                                </form>
                                </div>
                            </div>
                        `;

                        $('#tampilmodal').empty().html(edit);
                        $('#modal_edit').modal('show');   
                    }
                });
            });

            $(document).on("submit","#formEdit",function(e){
                var data = new FormData(this);
                if($("#formEdit")[0].checkValidity()) {
                    e.preventDefault();
                    //  data.append("_method","PUT");
                    $.ajax({
                        url         : "{{URL::to('powerunit')}}/"+kode,
                        type        : 'put',
                        data        : data,
                        dataType    : 'JSON',
                        contentType : false,
                        cache       : false,
                        processData : false,
                        beforeSend  : function (){
                            $('#pesan').html('<div class="alert alert-info"><i class="fa fa-spinner fa-2x fa-spin"></i>&nbsp;Please wait for a few minutes</div>');
                        },
                        success : function (data) {
                            Swal.fire({
                                position: 'inherit',
                                icon: 'success',
                                title: 'Your work has been Update',
                                showConfirmButton: false,
                                timer: 1500
                            });
                            // showData();
                            document.location.reload();
                            $('#modal_edit').modal('hide');
                        },
                        error   :function() {
                            Swal.fire({
                                position: 'inherit',
                                icon: 'error',
                                title: 'Error',
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                    });
                }else console.log("invalid form");
            });            
        });
    </script>
@endsection