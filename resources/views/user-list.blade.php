@extends('layouts.master')
@section('main-container')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="row">

                <div class="col-lg-12">
                    <div class="card">
                        <div class="rounded p-3">
                            <ol class="breadcrumb breadcrumb-dot text-muted mb-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('dashboard') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item text-muted">
                                    <a href="#" class="text-muted">Users List</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Users List</h4>
                        </div>
                        <div class="card-body pt-2">
                            <div>
                                <div class="d-flex align-items-center">

                                    <div class="top-nav-search customer_list">

                                        <div class>
                                            <a class="btn btn-primary" href="{{ route('users.create') }}"><i
                                                    class="fa fa-plus-circle me-2" aria-hidden="true"></i>Add User</a>
                                        </div>
                                        <form>

                                            <input type="text" class="form-control" placeholder="Search here">
                                            <button class="btn" type="submit"><img src="assets/img/icons/search.svg"
                                                    alt="img"></button>
                                        </form>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                        <table class="table table-center table-hover datatable dataTable no-footer"
                                            id="DataTables_Table_0" role="grid"
                                            aria-describedby="DataTables_Table_0_info">
                                            <thead class="thead-light">
                                                <tr role="row">
                                                    <th class="sorting" rowspan="1" colspan="1">#</th>
                                                    <th class="sorting" rowspan="1" colspan="1">User Name</th>
                                                    <th class="sorting" rowspan="1" colspan="1">Mobile Number</th>
                                                    <th class="sorting" rowspan="1" colspan="1">Role</th>
                                                    <th class="sorting" rowspan="1" colspan="1">Last Activity</th>
                                                    <th class="sorting" rowspan="1" colspan="1">Created on</th>
                                                    <th class="sorting_asc" rowspan="1" colspan="1"
                                                        aria-sort="ascending">Status</th>
                                                    <th class="sorting" rowspan="1" colspan="1">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <tr role="row" class="odd">
                                                    <td class>1</td>
                                                    <td>
                                                        <h2 class="table-avatar">
                                                            <a href="customer-detail.html">John Smith </a>
                                                        </h2>
                                                    </td>
                                                    <td>+1 989-438-3131</td>
                                                    <td>$4,220</td>
                                                    <td><span class="badge badge-pill bg-ash-gray text-gray-light">10 mins
                                                            ago</span></td>
                                                    <td>19 Dec 2022, 06:12 PM</td>
                                                    <td class="sorting_1"><span
                                                            class="badge badge-pill bg-success-light">Active</span></td>
                                                    <td class="d-flex align-items-center">
                                                        <div class="dropdown dropdown-action">
                                                            <a href="#" class="btn-action-icon"
                                                                data-bs-toggle="dropdown" aria-expanded="false"><i
                                                                    class="fas fa-ellipsis-v"></i></a>
                                                            <div class="dropdown-menu dropdown-menu-right" style>
                                                                <ul>
                                                                    <li>
                                                                        <a class="dropdown-item" href="#"><i
                                                                                class="far fa-edit me-2"></i>Edit</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="dropdown-item" href="javascript:void(0);"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#delete_modal"><i
                                                                                class="far fa-trash-alt me-2"></i>Delete</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr role="row" class="even">
                                                    <td class>2</td>
                                                    <td>
                                                        <h2 class="table-avatar">

                                                            <a href="customer-detail.html">Johnny </a>
                                                        </h2>
                                                    </td>
                                                    <td>+1 843-443-3282</td>
                                                    <td>$1,862</td>
                                                    <td><span class="badge badge-pill bg-success-light">Online</span></td>
                                                    <td>15 Dec 2022, 06:12 PM</td>
                                                    <td class="sorting_1"><span
                                                            class="badge badge-pill bg-success-light">Active</span></td>
                                                    <td class="d-flex align-items-center">
                                                        <div class="dropdown dropdown-action">
                                                            <a href="#" class=" btn-action-icon "
                                                                data-bs-toggle="dropdown" aria-expanded="false"><i
                                                                    class="fas fa-ellipsis-v"></i></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <ul>
                                                                    <li>
                                                                        <a class="dropdown-item" href="#"><i
                                                                                class="far fa-edit me-2"></i>Edit</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="dropdown-item"
                                                                            href="javascript:void(0);"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#delete_modal"><i
                                                                                class="far fa-trash-alt me-2"></i>Delete</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr role="row" class="odd">
                                                    <td class>4</td>
                                                    <td>
                                                        <h2 class="table-avatar">

                                                            <a href="customer-detail.html">Sharonda </a>
                                                        </h2>
                                                    </td>
                                                    <td>+1 956-623-2880</td>
                                                    <td>$6,789</td>
                                                    <td><span class="badge badge-pill bg-ash-gray text-gray-light">1 hour
                                                            ago</span></td>
                                                    <td>14 Dec 2022, 12:38 PM</td>
                                                    <td class="sorting_1"><span
                                                            class="badge badge-pill bg-success-light">Active</span></td>
                                                    <td class="d-flex align-items-center">
                                                        <div class="dropdown dropdown-action">
                                                            <a href="#" class=" btn-action-icon "
                                                                data-bs-toggle="dropdown" aria-expanded="false"><i
                                                                    class="fas fa-ellipsis-v"></i></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <ul>
                                                                    <li>
                                                                        <a class="dropdown-item" href="#"><i
                                                                                class="far fa-edit me-2"></i>Edit</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="dropdown-item"
                                                                            href="javascript:void(0);"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#delete_modal"><i
                                                                                class="far fa-trash-alt me-2"></i>Delete</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr role="row" class="even">
                                                    <td class>5</td>
                                                    <td>
                                                        <h2 class="table-avatar">

                                                            <a href="customer-detail.html">Pricilla </a>
                                                        </h2>
                                                    </td>
                                                    <td>+1 956-613-2880</td>
                                                    <td>$1,789</td>
                                                    <td><span class="badge badge-pill bg-success-light">Online</span></td>
                                                    <td>12 Dec 2022, 12:38 PM</td>
                                                    <td class="sorting_1"><span
                                                            class="badge badge-pill bg-success-light">Active</span></td>
                                                    <td class="d-flex align-items-center">
                                                        <div class="dropdown dropdown-action">
                                                            <a href="#" class=" btn-action-icon "
                                                                data-bs-toggle="dropdown" aria-expanded="false"><i
                                                                    class="fas fa-ellipsis-v"></i></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <ul>
                                                                    <li>
                                                                        <a class="dropdown-item" href="#"><i
                                                                                class="far fa-edit me-2"></i>Edit</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="dropdown-item"
                                                                            href="javascript:void(0);"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#delete_modal"><i
                                                                                class="far fa-trash-alt me-2"></i>Delete</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr role="row" class="odd">
                                                    <td class>3</td>
                                                    <td>
                                                        <h2 class="table-avatar">

                                                            <a href="customer-detail.html">Robert </a>
                                                        </h2>
                                                    </td>
                                                    <td>+1 917-409-0861</td>
                                                    <td>$2,789</td>
                                                    <td><span class="badge badge-pill bg-success-light">Online</span></td>
                                                    <td>04 Dec 2022, 12:38 PM</td>
                                                    <td class="sorting_1"><span
                                                            class="badge badge-pill bg-ash-gray text-gray-light">Restricted</span>
                                                    </td>
                                                    <td class="d-flex align-items-center">
                                                        <div class="dropdown dropdown-action">
                                                            <a href="#" class=" btn-action-icon "
                                                                data-bs-toggle="dropdown" aria-expanded="false"><i
                                                                    class="fas fa-ellipsis-v"></i></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <ul>
                                                                    <li>
                                                                        <a class="dropdown-item" href="#"><i
                                                                                class="far fa-edit me-2"></i>Edit</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="dropdown-item"
                                                                            href="javascript:void(0);"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#delete_modal"><i
                                                                                class="far fa-trash-alt me-2"></i>Delete</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr role="row" class="even">
                                                    <td class>6</td>
                                                    <td>
                                                        <h2 class="table-avatar">
                                                            <a href="customer-detail.html">Randall </a>
                                                        </h2>
                                                    </td>
                                                    <td>+1 117-409-0861</td>
                                                    <td>$1,789</td>
                                                    <td><span class="badge badge-pill bg-ash-gray text-gray-light">2 days
                                                            ago</span></td>
                                                    <td>04 Dec 2022, 12:38 PM</td>
                                                    <td class="sorting_1"><span
                                                            class="badge badge-pill bg-ash-gray text-gray-light">Restricted</span>
                                                    </td>
                                                    <td class="d-flex align-items-center">
                                                        <div class="dropdown dropdown-action">
                                                            <a href="#" class=" btn-action-icon "
                                                                data-bs-toggle="dropdown" aria-expanded="false"><i
                                                                    class="fas fa-ellipsis-v"></i></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <ul>
                                                                    <li>
                                                                        <a class="dropdown-item" href="#"><i
                                                                                class="far fa-edit me-2"></i>Edit</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="dropdown-item"
                                                                            href="javascript:void(0);"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#delete_modal"><i
                                                                                class="far fa-trash-alt me-2"></i>Delete</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="modal custom-modal fade" id="save_modal" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-header">
                            <h3>Confirm Save Changes</h3>
                            <p>Are you sure want to Confirm Save Changes?</p>
                        </div>
                        <div class="modal-btn delete-action">
                            <div class="row">
                                <div class="col-6">
                                    <button type="reset" data-bs-dismiss="modal"
                                        class="w-100 btn btn-primary paid-continue-btn">Save Changes</button>
                                </div>
                                <div class="col-6">
                                    <button type="submit" data-bs-dismiss="modal"
                                        class="w-100 btn btn-primary paid-cancel-btn">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal custom-modal fade" id="delete_modal" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-header">
                            <h3>Delete Users</h3>
                            <p>Are you sure want to delete?</p>
                        </div>
                        <div class="modal-btn delete-action">
                            <div class="row">
                                <div class="col-6">
                                    <a href="#" class="btn btn-primary paid-continue-btn">Delete</a>
                                </div>
                                <div class="col-6">
                                    <a href="#" data-bs-dismiss="modal"
                                        class="btn btn-primary paid-cancel-btn">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
