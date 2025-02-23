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
                            <h5 class="m-b-10">Product</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">E-Commerce</a></li>
                            <li class="breadcrumb-item"><a href="#!">Product</a></li>
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
                            <div class="col-sm-6 text-right">
                                <button class="btn btn-success btn-sm btn-round has-ripple" data-toggle="modal" data-target="#modal-report"><i class="feather icon-plus"></i> Product</button>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="report-table" class="table mb-0">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Product</th>
                                        <th>Category</th>
                                        <th>Added Date</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="align-middle">
                                            <img src="assets/images/product/prod-5.jpg" alt="contact-img" title="contact-img" class="rounded mr-3" height="48" />
                                            <p class="m-0 d-inline-block align-middle font-16">
                                                <a href="#!" class="text-body">Goldyrose Kurta</a>
                                                <br />
                                                <span class="text-warning feather icon-star-on"></span>
                                                <span class="text-warning feather icon-star-on"></span>
                                                <span class="text-warning feather icon-star-on"></span>
                                                <span class="text-warning feather icon-star-on"></span>
                                                <span class="text-warning feather icon-star"></span>
                                            </p>
                                        </td>
                                        <td class="align-middle">
                                            Woman cloths
                                        </td>
                                        <td class="align-middle">
                                            01/12/2018
                                        </td>
                                        <td class="align-middle">
                                            $58.57
                                        </td>

                                        <td class="align-middle">
                                            243
                                        </td>
                                        <td class="align-middle">
                                            <span class="badge badge-danger">Deactive</span>
                                        </td>
                                        <td class="table-action">
                                            <a href="#!" class="btn btn-icon btn-outline-primary"><i class="feather icon-eye"></i></a>
                                            <a href="#!" class="btn btn-icon btn-outline-success"><i class="feather icon-edit"></i></a>
                                            <a href="#!" class="btn btn-icon btn-outline-danger"><i class="feather icon-trash-2"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle">
                                            <img src="assets/images/product/prod-7.jpg" alt="contact-img" title="contact-img" class="rounded mr-3" height="48" />
                                            <p class="m-0 d-inline-block align-middle font-16">
                                                <a href="#!" class="text-body">Foxy Bag</a>
                                                <br />
                                                <span class="text-warning feather icon-star-on"></span>
                                                <span class="text-warning feather icon-star-on"></span>
                                                <span class="text-warning feather icon-star-on"></span>
                                                <span class="text-warning feather icon-star-on"></span>
                                                <span class="text-warning feather icon-star-on"></span>
                                            </p>
                                        </td>
                                        <td class="align-middle">
                                            Woman cloths
                                        </td>
                                        <td class="align-middle">
                                            06/30/2018
                                        </td>
                                        <td class="align-middle">
                                            $76
                                        </td>

                                        <td class="align-middle">
                                            560
                                        </td>
                                        <td class="align-middle">
                                            <span class="badge badge-danger">Deactive</span>
                                        </td>
                                        <td class="table-action">
                                            <a href="#!" class="btn btn-icon btn-outline-primary"><i class="feather icon-eye"></i></a>
                                            <a href="#!" class="btn btn-icon btn-outline-success"><i class="feather icon-edit"></i></a>
                                            <a href="#!" class="btn btn-icon btn-outline-danger"><i class="feather icon-trash-2"></i></a>
                                        </td>
                                    </tr>
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
<div class="modal fade" id="modal-report" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label" for="Name">Name</label>
                                <input type="text" class="form-control" id="Name" placeholder="">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label" for="Category">Category</label>
                                <select class="form-control" id="Category">
                                    <option value=""></option>
                                    <option value="1">Kids cloths</option>
                                    <option value="2">Man cloths</option>
                                    <option value="3">Man watch</option>
                                    <option value="3">Office Chairs</option>
                                    <option value="3">Travel bag</option>
                                    <option value="3">Woman cloath</option>
                                    <option value="3">Wooden Chairs</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label" for="Price">Price</label>
                                <input type="text" class="form-control" id="Price" placeholder="">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label" for="Quantity">Quantity</label>
                                <input type="text" class="form-control" id="Quantity" placeholder="">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group fill">
                                <label class="floating-label" for="Icon">Profie Image</label>
                                <input type="file" class="form-control" id="Icon" placeholder="sdf">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="customSwitch4" checked="">
                                <label class="custom-control-label" for="customSwitch4">Active</label>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <button class="btn btn-primary">Submit</button>
                            <button class="btn btn-danger">Clear</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- [ Main Content ] end -->

    <!-- Required Js -->
    <script src="assets1/js/vendor-all.min.js"></script>
    <script src="assets1/js/plugins/bootstrap.min.js"></script>
    <script src="assets1/js/ripple.js"></script>
    <script src="assets1/js/pcoded.min.js"></script>

<script src="assets1/js/plugins/jquery.dataTables.min.js"></script>
<script src="assets1/js/plugins/dataTables.bootstrap4.min.js"></script>
<!-- Apex Chart -->
<script src="assets1/js/plugins/apexcharts.min.js"></script>
<script>
    // DataTable start
    $('#report-table').DataTable({
        "lengthMenu": [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"]
        ]
    });
    // DataTable end
</script>


@endsection
