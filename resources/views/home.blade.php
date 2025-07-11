@extends('layouts.app')

@section('content')
<div class="main-content">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <p class="m-b-0 text-muted">Sales</p>
                                                    <h2 class="m-b-0">$23,523</h2>
                                                </div>
                                                <span class="badge badge-pill badge-cyan font-size-12">
                                                    <i class="anticon anticon-arrow-up"></i>
                                                    <span class="font-weight-semibold m-l-5">6.71%</span>
                                                </span>
                                            </div>
                                            <div class="m-t-40">
                                                <div class="d-flex justify-content-between">
                                                    <div class="d-flex align-items-center">
                                                        <span class="badge badge-primary badge-dot m-r-10"></span>
                                                        <span class="text-gray font-weight-semibold font-size-13">Monthly Goal</span>
                                                    </div>
                                                    <span class="text-dark font-weight-semibold font-size-13">70% </span>
                                                </div>
                                                <div class="progress progress-sm w-100 m-b-0 m-t-10">
                                                    <div class="progress-bar bg-primary" style="width: 70%"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <p class="m-b-0 text-muted">Margin</p>
                                                    <h2 class="m-b-0">$8,753</h2>
                                                </div>
                                                <span class="badge badge-pill badge-red font-size-12">
                                                    <i class="anticon anticon-arrow-down"></i>
                                                    <span class="font-weight-semibold m-l-5">3.26%</span>
                                                </span>
                                            </div>
                                            <div class="m-t-40">
                                                <div class="d-flex justify-content-between">
                                                    <div class="d-flex align-items-center">
                                                        <span class="badge badge-success badge-dot m-r-10"></span>
                                                        <span class="text-gray font-weight-semibold font-size-13">Monthly Goal</span>
                                                    </div>
                                                    <span class="text-dark font-weight-semibold font-size-13">60% </span>
                                                </div>
                                                <div class="progress progress-sm w-100 m-b-0 m-t-10">
                                                    <div class="progress-bar bg-success" style="width: 60%"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <p class="m-b-0 text-muted">Orders</p>
                                                    <h2 class="m-b-0">1,753</h2>
                                                </div>
                                                <span class="badge badge-pill badge-red font-size-12">
                                                    <i class="anticon anticon-arrow-down"></i>
                                                    <span class="font-weight-semibold m-l-5">2.71%</span>
                                                </span>
                                            </div>
                                            <div class="m-t-40">
                                                <div class="d-flex justify-content-between">
                                                    <div class="d-flex align-items-center">
                                                        <span class="badge badge-warning badge-dot m-r-10"></span>
                                                        <span class="text-gray font-weight-semibold font-size-13">Monthly Goal</span>
                                                    </div>
                                                    <span class="text-dark font-weight-semibold font-size-13">45% </span>
                                                </div>
                                                <div class="progress progress-sm w-100 m-b-0 m-t-10">
                                                    <div class="progress-bar bg-warning" style="width: 45%"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <p class="m-b-0 text-muted">Affiliate</p>
                                                    <h2 class="m-b-0">236</h2>
                                                </div>
                                                <span class="badge badge-pill badge-gold font-size-12">
                                                    <i class="anticon anticon-arrow-up"></i>
                                                    <span class="font-weight-semibold m-l-5">N/A</span>
                                                </span>
                                            </div>
                                            <div class="m-t-40">
                                                <div class="d-flex justify-content-between">
                                                    <div class="d-flex align-items-center">
                                                        <span class="badge badge-secondary badge-dot m-r-10"></span>
                                                        <span class="text-gray font-weight-semibold font-size-13">Monthly Goal</span>
                                                    </div>
                                                    <span class="text-dark font-weight-semibold font-size-13">50% </span>
                                                </div>
                                                <div class="progress progress-sm w-100 m-b-0 m-t-10">
                                                    <div class="progress-bar bg-secondary" style="width: 50%"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5>Sales Statistics</h5>
                                        <div class="dropdown dropdown-animated scale-left">
                                            <a class="text-gray font-size-18" href="javascript:void(0);" data-toggle="dropdown">
                                                <i class="anticon anticon-ellipsis"></i>
                                            </a>
                                            <div class="dropdown-menu">
                                                <button class="dropdown-item" type="button">
                                                    <i class="anticon anticon-printer"></i>
                                                    <span class="m-l-10">Print</span>
                                                </button>
                                                <button class="dropdown-item" type="button">
                                                    <i class="anticon anticon-download"></i>
                                                    <span class="m-l-10">Download</span>
                                                </button>
                                                <button class="dropdown-item" type="button">
                                                    <i class="anticon anticon-file-excel"></i>
                                                    <span class="m-l-10">Export</span>
                                                </button>
                                                <button class="dropdown-item" type="button">
                                                    <i class="anticon anticon-reload"></i>
                                                    <span class="m-l-10">Refresh</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="m-t-30">
                                        <div class="d-inline-block m-r-30">
                                            <p class="m-b-0 d-flex align-items-center">
                                                <span class="badge badge-primary badge-dot m-r-10"></span>
                                                <span>Online</span>
                                            </p>
                                        </div>
                                        <div class="d-inline-block">
                                            <p class="m-b-0 d-flex align-items-center">
                                                <span class="badge badge-blue badge-dot m-r-10"></span>
                                                <span>Offline</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="m-t-50">
                                        <canvas class="chart" style="height: 205px" id="sales-chart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5>Revenue</h5>
                                        <div>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-default">View All</a>
                                        </div>
                                    </div>
                                    <div class="m-t-30">
                                        <div class="d-md-flex">
                                            <div class="pr-4 m-v-10 border-right border-hide-md">
                                                <p class="m-b-0">Net Revenue</p>
                                                <h3 class="m-b-0">
                                                    <span>$58,323</span>
                                                    <span class="text-success m-l-10 font-size-14">+6.71%</span>
                                                </h3>
                                            </div>
                                            <div class="px-md-4 m-v-10 border-right border-hide-md">
                                                <p class="m-b-0">Selling</p>
                                                <h3 class="m-b-0">
                                                    <span>$17,523</span>
                                                    <span class="text-danger m-l-10 font-size-14">+1.82%</span>
                                                </h3>
                                            </div>
                                            <div class="px-md-4 m-v-10">
                                                <p class="m-b-0">Cost</p>
                                                <h3 class="m-b-0">
                                                    <span>$8,217</span>
                                                    <span class="text-success m-l-10 font-size-14">+11.2%</span>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="m-t-50" style="height: 240px">
                                        <canvas class="chart" id="revenue-chart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5>Top Products</h5>
                                        <div>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-default">View All</a>
                                        </div>
                                    </div>
                                    <div class="m-t-30">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item p-h-0">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <div class="d-flex">
                                                        <div class="avatar avatar-image m-r-15">
                                                            <img src="../public/assets/images/others/thumb-9.jpg" alt="">
                                                        </div>
                                                        <div>
                                                            <h6 class="m-b-0">
                                                                <a href="javascript:void(0);" class="text-dark"> Gray Sofa</a>
                                                            </h6>
                                                            <span class="text-muted font-size-13">Home Decoration</span>
                                                        </div>
                                                    </div>
                                                    <span class="badge badge-pill badge-cyan font-size-12">
                                                        <span class="font-weight-semibold m-l-5">+18.3%</span>
                                                    </span>
                                                </div>
                                            </li>
                                            <li class="list-group-item p-h-0">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <div class="d-flex">
                                                        <div class="avatar avatar-image m-r-15">
                                                            <img src="../public/assets/images/others/thumb-10.jpg" alt="">
                                                        </div>
                                                        <div>
                                                            <h6 class="m-b-0">
                                                                <a href="javascript:void(0);" class="text-dark">Beat Headphone</a>
                                                            </h6>
                                                            <span class="text-muted font-size-13">Eletronic</span>
                                                        </div>
                                                    </div>
                                                    <span class="badge badge-pill badge-cyan font-size-12">
                                                        <span class="font-weight-semibold m-l-5">+12.7%</span>
                                                    </span>
                                                </div>
                                            </li>
                                            <li class="list-group-item p-h-0">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <div class="d-flex">
                                                        <div class="avatar avatar-image m-r-15">
                                                            <img src="../public/assets/images/others/thumb-11.jpg" alt="">
                                                        </div>
                                                        <div>
                                                            <h6 class="m-b-0">
                                                                <a href="javascript:void(0);" class="text-dark">Wooden Rhino</a>
                                                            </h6>
                                                            <span class="text-muted font-size-13">Home Decoration</span>
                                                        </div>
                                                    </div>
                                                    <span class="badge badge-pill badge-cyan font-size-12">
                                                        <span class="font-weight-semibold m-l-5">+9.2%</span>
                                                    </span>
                                                </div>
                                            </li>
                                            <li class="list-group-item p-h-0">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <div class="d-flex">
                                                        <div class="avatar avatar-image m-r-15">
                                                            <img src="../public/assets/images/others/thumb-12.jpg" alt="">
                                                        </div>
                                                        <div>
                                                            <h6 class="m-b-0">
                                                                <a href="javascript:void(0);" class="text-dark">Red Chair</a>
                                                            </h6>
                                                            <span class="text-muted font-size-13">Home Decoration</span>
                                                        </div>
                                                    </div>
                                                    <span class="badge badge-pill badge-cyan font-size-12">
                                                        <span class="font-weight-semibold m-l-5">+7.7%</span>
                                                    </span>
                                                </div>
                                            </li>
                                            <li class="list-group-item p-h-0">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <div class="d-flex">
                                                        <div class="avatar avatar-image m-r-15">
                                                            <img src="../public/assets/images/others/thumb-13.jpg" alt="">
                                                        </div>
                                                        <div>
                                                            <h6 class="m-b-0">
                                                                <a href="javascript:void(0);" class="text-dark">Wristband</a>
                                                            </h6>
                                                            <span class="text-muted font-size-13">Eletronic</span>
                                                        </div>
                                                    </div>
                                                    <span class="badge badge-pill badge-cyan font-size-12">
                                                        <span class="font-weight-semibold m-l-5">+5.8%</span>
                                                    </span>
                                                </div>
                                            </li>
                                        </ul> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5>Customers</h5>
                                    <div class="m-v-45 text-center" style="height: 220px">
                                        <canvas class="chart" id="customer-chart"></canvas>
                                    </div>
                                    <div class="row p-t-25">
                                        <div class="col-md-8 m-h-auto">
                                            <div class="d-flex justify-content-between align-items-center m-b-20">
                                                <p class="m-b-0 d-flex align-items-center">
                                                    <span class="badge badge-warning badge-dot m-r-10"></span>
                                                    <span>Direct</span>
                                                </p>
                                                <h5 class="m-b-0">350</h5>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center m-b-20">
                                                <p class="m-b-0 d-flex align-items-center">
                                                    <span class="badge badge-primary badge-dot m-r-10"></span>
                                                    <span>Referral</span>
                                                </p>
                                                <h5 class="m-b-0">450</h5>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center m-b-20">
                                                <p class="m-b-0 d-flex align-items-center">
                                                    <span class="badge badge-danger badge-dot m-r-10"></span>
                                                    <span>Social Network</span>
                                                </p>
                                                <h5 class="m-b-0">100</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5>Recent Orders</h5>
                                        <div>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-default">View All</a>
                                        </div>
                                    </div>
                                    <div class="m-t-30">
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Customer</th>
                                                        <th>Date</th>
                                                        <th>Amount</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>#5331</td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="d-flex align-items-center">
                                                                    <div class="avatar avatar-image" style="height: 30px; min-width: 30px; max-width:30px">
                                                                        <img src="../public/assets/images/avatars/thumb-1.jpg" alt="">
                                                                    </div>
                                                                    <h6 class="m-l-10 m-b-0">Erin Gonzales</h6>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>8 May 2019</td>
                                                        <td>$137.00</td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <span class="badge badge-success badge-dot m-r-10"></span>
                                                                <span>Approved</span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>#5375</td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="d-flex align-items-center">
                                                                    <div class="avatar avatar-image" style="height: 30px; min-width: 30px; max-width:30px">
                                                                        <img src="../public/assets/images/avatars/thumb-2.jpg" alt="">
                                                                    </div>
                                                                    <h6 class="m-l-10 m-b-0">Darryl Day</h6>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>6 May 2019</td>
                                                        <td>$322.00</td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <span class="badge badge-success badge-dot m-r-10"></span>
                                                                <span>Approved</span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>#5762</td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="d-flex align-items-center">
                                                                    <div class="avatar avatar-image" style="height: 30px; min-width: 30px; max-width:30px">
                                                                        <img src="../public/assets/images/avatars/thumb-3.jpg" alt="">
                                                                    </div>
                                                                    <h6 class="m-l-10 m-b-0">Marshall Nichols</h6>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>1 May 2019</td>
                                                        <td>$543.00</td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <span class="badge badge-success badge-dot m-r-10"></span>
                                                                <span>Approved</span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>#5865</td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="d-flex align-items-center">
                                                                    <div class="avatar avatar-image" style="height: 30px; min-width: 30px; max-width:30px">
                                                                        <img src="../public/assets/images/avatars/thumb-4.jpg" alt="">
                                                                    </div>
                                                                    <h6 class="m-l-10 m-b-0">Virgil Gonzales</h6>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>28 April 2019</td>
                                                        <td>$876.00</td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <span class="badge badge-primary badge-dot m-r-10"></span>
                                                                <span>Pending</span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>#5213</td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="d-flex align-items-center">
                                                                    <div class="avatar avatar-image" style="height: 30px; min-width: 30px; max-width:30px">
                                                                        <img src="../public/assets/images/avatars/thumb-5.jpg" alt="">
                                                                    </div>
                                                                    <h6 class="m-l-10 m-b-0">Nicole Wyne</h6>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>28 April 2019</td>
                                                        <td>$241.00</td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <span class="badge badge-success badge-dot m-r-10"></span>
                                                                <span>Approved</span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>#5211</td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="d-flex align-items-center">
                                                                    <div class="avatar avatar-image" style="height: 30px; min-width: 30px; max-width:30px">
                                                                        <img src="../public/assets/images/avatars/thumb-6.jpg" alt="">
                                                                    </div>
                                                                    <h6 class="m-l-10 m-b-0">Riley Newman</h6>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>28 April 2019</td>
                                                        <td>$872.00</td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <span class="badge badge-danger badge-dot m-r-10"></span>
                                                                <span>Rejected</span>
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
@endsection