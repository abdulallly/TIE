@extends('layouts.main')
@section('content')
    @if(auth()->user()->hasRole('Admin'))
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h6>welcome!
                            <span class="badge-danger badge-sm badge-pill badge p-1">
                                        @if(!empty($user->getRoleNames()))
                                    @foreach($user->getRoleNames() as $v)
                                        {{ $v }}
                                    @endforeach
                                @endif
                                    </span>
                        </h6>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box">
                        <span class="info-box-icon bg-primary elevation-1">
                            <i class="fas fa-users">
                                <a href="#"></a>
                            </i></span>

                            <div class="info-box-content">
                            <span class="info-box-text">
                              <a href="#">
                              Users
                              </a>
                            </span>
                                <span class="info-box-number">
                             {{ $users }}
                             </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-address-book"></i></span>

                            <div class="info-box-content">
                            <span class="info-box-text">
                                <a href="">
                                  Book request
                              </a>
                            </span>
                                <span class="info-box-number">{{ $bookcategory }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->

                    <!-- fix for small devices only -->
                    <div class="clearfix hidden-md-up"></div>

                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-landmark"></i></span>

                            <div class="info-box-content">
                            <span class="info-box-text">
                                <a href="">
                                  Schools
                              </a>
                            </span>
                                <span class="info-box-number">{{ $school }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-landmark"></i></span>

                            <div class="info-box-content">
                            <span class="info-box-text">
                                     <a href="">
                                       Region
                              </a>
                            </span>
                                <span class="info-box-number">{{ $region }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                </div>
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box">
                            <span class="info-box-icon bg-secondary elevation-1"><i class="fas fa-cog"></i></span>

                            <div class="info-box-content">
                            <span class="info-box-text">
                                     <a href="">
                                       Councils
                              </a>
                            </span>
                                <span class="info-box-number">{{ $council }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box">
                            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-archive"></i></span>

                            <div class="info-box-content">
                            <span class="info-box-text">
                                     <a href="">
                                      Book request
                              </a>
                            </span>
                                <span class="info-box-number">{{ $bookrequest }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-book"></i></span>

                            <div class="info-box-content">
                            <span class="info-box-text">
                                     <a href="">
                                       Feedbacks
                              </a>
                            </span>
                                <span class="info-box-number">{{ $feedbacks }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->

                    <!-- fix for small devices only -->
                    <div class="clearfix hidden-md-up"></div>

                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-gradient-primary elevation-1"><i class="fas fa-database"></i></span>
                            <div class="info-box-content">
                            <span class="info-box-text">
                                     <a href="">
                                      All Invoice
                              </a>
                            </span>
                                <span class="info-box-number">{{ $invoicerefall }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                </div>
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box">
                            <span class="info-box-icon bg-secondary elevation-1"><i class="fas fa-cog"></i></span>

                            <div class="info-box-content">
                            <span class="info-box-text">
                                     <a href="">
                                       Invoice Accepted by Council
                              </a>
                            </span>
                                <span class="info-box-number">{{ $invoiceacceptedbystat }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box">
                            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-archive"></i></span>

                            <div class="info-box-content">
                            <span class="info-box-text">
                                     <a href="">
                                     Invoice In Progress by Council
                              </a>
                            </span>
                                <span class="info-box-number">{{ $invoiceinprogressstat }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-book"></i></span>

                            <div class="info-box-content">
                            <span class="info-box-text">
                                     <a href="">
                                       Invoice Accepted by School
                              </a>
                            </span>
                                <span class="info-box-number">{{ $invoiceacceptedbyhead }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->

                    <!-- fix for small devices only -->
                    <div class="clearfix hidden-md-up"></div>

                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-gradient-primary elevation-1"><i class="fas fa-database"></i></span>
                            <div class="info-box-content">
                            <span class="info-box-text">
                                     <a href="">
                                      Invoice In progress by School
                              </a>
                            </span>
                                <span class="info-box-number">{{ $invoiceinprogresssbyhead }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                </div>




            </div>
        </section>
    @endif
    @if(auth()->user()->hasRole('headmaster'))
        <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h6>welcome!
                                    <span class="badge-danger badge-sm badge-pill badge p-1">
                                        @if(!empty($user->getRoleNames()))
                                            @foreach($user->getRoleNames() as $v)
                                                {{ $v }}
                                            @endforeach
                                        @endif
                                    </span>
                                </h6>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                    <li class="breadcrumb-item active">Dashboard</li>
                                </ol>
                            </div>
                        </div>
                    </div><!-- /.container-fluid -->
                </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box">
                        <span class="info-box-icon bg-primary elevation-1">
                            <i class="fas fa-users">
                                <a href="#"></a>
                            </i></span>

                            <div class="info-box-content">
                            <span class="info-box-text">
                              <a href="#">
                              News
                              </a>
                            </span>
                                <span class="info-box-number">
                             {{ $news }}

                              </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-address-book"></i></span>

                            <div class="info-box-content">
                            <span class="info-box-text">
                                   <a href="#">
                                 Invoices In Progress
                              </a>
                            </span>
                              <span class="info-box-number">{{ $invoiceinprogresssbyhead }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->

                    <!-- fix for small devices only -->
                    <div class="clearfix hidden-md-up"></div>

                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-landmark"></i></span>

                            <div class="info-box-content">
                            <span class="info-box-text">
                                <a href="">
                                  Book request
                              </a>
                            </span>
                                 <span class="info-box-number">{{ $bookrequesthead }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-landmark"></i></span>

                            <div class="info-box-content">
                            <span class="info-box-text">
                                     <a href="">
                                      Invoices Accepted
                              </a>
                            </span>
                            <span class="info-box-number">{{ $invoiceacceptedbyhead }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                </div>

            </div>

        </section>
    @endif
    @if(auth()->user()->hasRole('projectmanager'))
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h6>welcome!
                            <span class="badge-danger badge-sm badge-pill badge p-1">
                                        @if(!empty($user->getRoleNames()))
                                    @foreach($user->getRoleNames() as $v)
                                        {{ $v }}
                                    @endforeach
                                @endif
                                    </span>
                        </h6>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box">
                        <span class="info-box-icon bg-primary elevation-1">
                            <i class="fas fa-users">
                                <a href="#"></a>
                            </i></span>

                            <div class="info-box-content">
                            <span class="info-box-text">
                              <a href="#">
                              Users
                              </a>
                            </span>
                                <span class="info-box-number">
                             {{ $users }}

                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-address-book"></i></span>

                            <div class="info-box-content">
                            <span class="info-box-text">
                                <a href="">
                                  Book request
                              </a>
                            </span>
                                <span class="info-box-number">{{ $bookcategory }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->

                    <!-- fix for small devices only -->
                    <div class="clearfix hidden-md-up"></div>

                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-landmark"></i></span>

                            <div class="info-box-content">
                            <span class="info-box-text">
                                <a href="">
                                  Schools
                              </a>
                            </span>
                           <span class="info-box-number">{{ $school }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-landmark"></i></span>

                            <div class="info-box-content">
                            <span class="info-box-text">
                                     <a href="">
                                       Region
                              </a>
                            </span>
                           <span class="info-box-number">{{ $region }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                </div>
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box">
                            <span class="info-box-icon bg-secondary elevation-1"><i class="fas fa-cog"></i></span>

                            <div class="info-box-content">
                            <span class="info-box-text">
                                     <a href="">
                                       Councils
                              </a>
                            </span>
                                <span class="info-box-number">{{ $council }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box">
                            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-archive"></i></span>

                            <div class="info-box-content">
                            <span class="info-box-text">
                                     <a href="">
                                      Book request
                              </a>
                            </span>
                                <span class="info-box-number">{{ $bookrequest }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-book"></i></span>

                            <div class="info-box-content">
                            <span class="info-box-text">
                                     <a href="">
                                       Feedbacks
                              </a>
                            </span>
                                <span class="info-box-number">{{ $feedbacks }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->

                    <!-- fix for small devices only -->
                    <div class="clearfix hidden-md-up"></div>

                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-gradient-primary elevation-1"><i class="fas fa-database"></i></span>
                            <div class="info-box-content">
                            <span class="info-box-text">
                                     <a href="">
                                      All Invoice
                              </a>
                            </span>
                                <span class="info-box-number">{{ $invoicerefall }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                </div>
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box">
                            <span class="info-box-icon bg-secondary elevation-1"><i class="fas fa-cog"></i></span>

                            <div class="info-box-content">
                            <span class="info-box-text">
                                     <a href="">
                                       Invoice Accepted by Council
                              </a>
                            </span>
                                <span class="info-box-number">{{ $invoiceacceptedbystat }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box">
                            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-archive"></i></span>

                            <div class="info-box-content">
                            <span class="info-box-text">
                                     <a href="">
                                     Invoice In Progress by Council
                              </a>
                            </span>
                                <span class="info-box-number">{{ $invoiceinprogressstat }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-book"></i></span>

                            <div class="info-box-content">
                            <span class="info-box-text">
                                     <a href="">
                                       Invoice Accepted by School
                              </a>
                            </span>
                                <span class="info-box-number">{{ $invoiceacceptedbyhead }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->

                    <!-- fix for small devices only -->
                    <div class="clearfix hidden-md-up"></div>

                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-gradient-primary elevation-1"><i class="fas fa-database"></i></span>
                            <div class="info-box-content">
                            <span class="info-box-text">
                                     <a href="">
                                      Invoice In progress by School
                              </a>
                            </span>
                                <span class="info-box-number">{{ $invoiceinprogresssbyhead }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                </div>




            </div>
        </section>
    @endif
    @if(auth()->user()->hasRole('statisticalofficer'))
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h6>welcome!
                            <span class="badge-danger badge-sm badge-pill badge p-1">
                                        @if(!empty($user->getRoleNames()))
                                    @foreach($user->getRoleNames() as $v)
                                        {{ $v }}
                                    @endforeach
                                @endif
                                    </span>
                        </h6>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box">
                        <span class="info-box-icon bg-primary elevation-1">
                            <i class="fas fa-users">
                                <a href="#"></a>
                            </i></span>

                            <div class="info-box-content">
                            <span class="info-box-text">
                              <a href="#">
                              News
                              </a>
                            </span>
                                <span class="info-box-number">
                             {{ $news }}

                              </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-address-book"></i></span>

                            <div class="info-box-content">
                            <span class="info-box-text">
                                   <a href="#">
                                 Invoices In Progress
                              </a>
                            </span>
                                <span class="info-box-number">{{ $invoiceinprogresssbystat }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->

                    <!-- fix for small devices only -->
                    <div class="clearfix hidden-md-up"></div>

                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-address-book"></i></span>

                            <div class="info-box-content">
                            <span class="info-box-text">
                                   <a href="#">
                                 Headmaster
                              </a>
                            </span>
                                <span class="info-box-number">{{ $headmastercouncil }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-landmark"></i></span>

                            <div class="info-box-content">
                            <span class="info-box-text">
                                     <a href="">
                                      Invoices Accepted
                              </a>
                            </span>
                                <span class="info-box-number">{{ $invoiceacceptedbystat }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                </div>
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box">
                        <span class="info-box-icon bg-primary elevation-1">
                            <i class="fas fa-users">
                                <a href="#"></a>
                            </i></span>

                            <div class="info-box-content">
                            <span class="info-box-text">
                              <a href="#">
                              School
                              </a>
                            </span>
                                <span class="info-box-number">
                             {{ $schoolstat }}

                              </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->

                    <!-- /.col -->

                    <!-- /.col -->
                    <!-- /.col -->
                </div>
            </div>

        </section>
    @endif
@endsection
