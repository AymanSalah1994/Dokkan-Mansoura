@extends('layouts.dashboard.main_panel')
@section('content')
    <div class="card">
        <div class="card-body">
            <h1> Quick Overview : </h1>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title">Total Merchants : </h5>
                                    <p class="card-text">12</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title">Total Products : </h5>
                                    <p class="card-text">345</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title">Total Categories : </h5>
                                    <p class="card-text">345</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title">Total Dealers : </h5>
                                    <p class="card-text">12</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title">Total Debit : </h5>
                                    <p class="card-text">345</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card text-white bg-secondary  mb-3" style="max-width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title">Total Orders : </h5>
                                    <p class="card-text">345</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title">Total Returned Orders : </h5>
                                    <p class="card-text">12</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title">Total Users : </h5>
                                    <p class="card-text">345</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title">Total Visits : </h5>
                                    <p class="card-text">345</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
