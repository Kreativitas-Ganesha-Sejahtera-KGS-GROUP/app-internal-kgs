@include('admin.layouts.header', ['title' => $title])
@include('admin.layouts.navbar')

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="container">
                                <div class="row">
                                    <div class="col-10">
                                        <h4 class="card-title">Proposal List</h4>
                                    </div>
                                    <div class="col-2 text-end">
                                        <a href="{{ env('APP_URL') }}{{ env('APP_ADMIN_SECTION') }}/proposals/create" type="button" class="btn btn-primary waves-effect waves-light">
                                            <i class="fas fa-plus"></i>
                                        </a>
                                    </div>
                            
                                </div>
                            </div>

                            <table id="datatable-buttons" class="table align-middle table-nowrap table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th>Image</th>
                                        <th>Proposal</th>
                                        <th>Subject</th>
                                        <th>To</th>
                                        <th>Total</th>
                                        <th>Date</th>
                                        <th>Open Till</th>
                                        <th>Status</th>
                                        <th>Date Created</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="avatar-xs">
                                                <span class="avatar-title rounded-circle">
                                                    I
                                                </span>
                                            </div>
                                        </td>
                                        <td>Garrett Winters</td>
                                        <td>Accountant</td>
                                        <td>Tokyo</td>
                                        <td>63</td>
                                        <td>2011/07/25</td>
                                        <td>$170,750</td>
                                        <td>63</td>
                                        <td>2011/07/25</td>
                                        <td>
                                            <button type="button" class="btn btn-success waves-effect waves-light">
                                                <i class="mdi mdi-pencil d-block font-size-16"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger waves-effect waves-light">
                                                <i class="mdi mdi-trash-can d-block font-size-16"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="avatar-xs">
                                                <span class="avatar-title rounded-circle">
                                                    I
                                                </span>
                                            </div>
                                        </td>
                                        <td>Garrett Winters</td>
                                        <td>Accountant</td>
                                        <td>Tokyo</td>
                                        <td>63</td>
                                        <td>2011/07/25</td>
                                        <td>$170,750</td>
                                        <td>63</td>
                                        <td>2011/07/25</td>
                                        <td>
                                            <button type="button" class="btn btn-success waves-effect waves-light">
                                                <i class="mdi mdi-pencil d-block font-size-16"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger waves-effect waves-light">
                                                <i class="mdi mdi-trash-can d-block font-size-16"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div>
    </div>
</div>
@include('admin.layouts.footer');