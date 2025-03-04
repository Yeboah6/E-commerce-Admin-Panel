@extends('layouts.admin-layout')

@section('content')
	<!-- [ Pre-loader ] End -->
	<!-- [ navigation menu ] start -->
    @include('includes.admin-sidenav')
	<!-- [ navigation menu ] end -->
	<!-- [ Header ] start -->
    @include('includes.admin-header')
	<!-- [ Header ] end -->
	
	

<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Customers</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/dashboard"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="/customers">Customers</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- customar project  start -->
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center m-l-0">
                            <div class="col-sm-6">
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="report-table" class="table mb-0">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Create Date</th>
                                        <th>Status</th>
                                        <th>Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($customers as $customer)
                                         <tr>
                                        <td>
                                            <img src="assets/images/user/avatar-3.jpg" class="img-fluid img-radius wid-40" alt="">
                                        </td>
                                        <td>{{ $customer -> name}}</td>
                                        <td>{{ $customer -> email}}</td>
                                        <td>{{ $customer -> number}}</td>
                                        <td>{{ $customer -> created_at -> format('d / m / Y')}}</td>
                                        <td><span class="badge badge-success">Active</span></td>
                                        <td>
                                            <a href="#" 
                                        class="btn btn-info btn-sm view-product" 
                                        data-toggle="modal" 
                                        data-target="#modal-report2"
                                        data-name="{{ $customer -> name }}"
                                        data-email="{{ $customer -> email }}"
                                        data-number="{{ $customer -> number }}"
                                        data-image="{{ asset('storage/uploads/profile-images/'.$customer -> image) }}"
                                        data-date="{{ $customer -> created_at -> format('d / M / Y') }}">
                                        <i class="feather icon-eye"></i>
                                     </a>
                                            {{-- <a href="#!" data-toggle="modal" data-target="#modal-report2" class="btn btn-info btn-sm"><i class="feather icon-edit"></i>&nbsp;View </a> --}}
                                            <a href="#!" class="btn btn-info btn-sm"><i class="feather icon-edit"></i>&nbsp;Edit </a>
                                            <a href="#!" class="btn btn-danger btn-sm"><i class="feather icon-trash-2"></i>&nbsp;Delete </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- customar project  end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>

        {{-- Display View Product Details --}}
        <div class="modal fade" id="modal-report2" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" style="width: 800px;margin-left: -80px;">
                    <div class="modal-header">
                        <h5 class="modal-title">View Product</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
        
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-5">
                                            <div class="carousel slide carousel-fade" data-ride="carousel">
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img id="modalCustomerImage" src="" class="d-block w-100" alt="Customer images">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <h3 class="mt-0"><span id="modalCustomerName"></span></h3>
                                            <h6 class="text-muted" id="modalCustomerEmail"></h6>
                                            <p class="mb-1">Date Created: <span id="modalCustomerDate"></span></p>
                                            <div class="mt-3">
                                            </div>
                                            <p id="modalCustomerNumber"></p>
                                            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                            <script>
                                                $(document).ready(function() {
                                                    $(".view-product").click(function() {
                                                        let customerName = $(this).data('name');
                                                        let customerEmail = $(this).data('email');
                                                        let customerNumber = $(this).data('number');
                                                        let customerImage = $(this).data('image');
                                                        let customerDate = $(this).data('date');
                                                    
                                                        // Set data in modal
                                                        $("#modalCustomerName").text(customerName);
                                                        $("#modalCustomerEmail").text(customerEmail);
                                                        $("#modalCustomerNumber").text(customerNumber);
                                                        $("#modalCustomerDate").text(customerDate);
                                                    
                                                        // Update images
                                                        $("#modalCustomerImage").attr("src", productImage);
                                                    });
                                                });
                                            </script>
        
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

<!-- [ Main Content ] end -->

    <!-- Required Js -->
    <script src="assets1/js/vendor-all.min.js"></script>

    <script src="assets1/js/plugins/jquery.dataTables.min.js"></script>
    <script src="assets1/js/plugins/dataTables.bootstrap4.min.js"></script>

    <script>
        // DataTable start
        $('#report-table').DataTable();
        // DataTable end
    </script>

@endsection
