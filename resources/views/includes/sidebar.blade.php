<div class="sidebar">
    <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
       <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link">
                    <i class="nav-icon fas fa-home"></i>
                    <p>
                        Dashboard
                        <i class="right fas "></i>
                    </p>
                </a>
            </li>
        @if(auth()->user()->hasRole('projectmanager'))
          <li class="nav-item">
             @can('user-project-manager')
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-users-cog"></i>
                    <p>
                        User Management
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a  href="{{ route('headmaster.index')}}" class="nav-link">
                            <i class="far  nav-icon"></i>
                            <p>Headmaster's</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a  href="{{ route('statisticalofficer.index')}}" class="nav-link">
                            <i class="far  nav-icon"></i>
                            <p>Statistical officer's</p>
                        </a>
                    </li>
                </ul>
            @endcan
          </li>

          <li class="nav-item">
{{--                @can('project-manager-comment')--}}
                    <a href="{{ route('Schoolinformation.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            School Information
                        </p>
                    </a>
{{--                @endcan--}}
            </li>
          <li class="nav-item">
{{--                @can('project-manager-comment')--}}
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book-open"></i>
                        <p>
                            Book Management
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
{{--                @endcan--}}
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a  href="{{ route('books.index')}}" class="nav-link">
                            <i class="far  nav-icon"></i>
                            <p>Books</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a  href="{{ route('book_categories.index')}}" class="nav-link">
                            <i class="far  nav-icon"></i>
                            <p>Book categories</p>
                        </a>
                    </li>
                </ul>
            </li>


            <li class="nav-item">
                {{--                @can('project-manager-comment')--}}
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-file-invoice"></i>
                    <p>
                        Invoice Management
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                {{--                @endcan--}}
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a  href="{{ route('invoices.index')}}" class="nav-link">
                            <i class="far  nav-icon"></i>
                            <p>Council Invoice</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a  href="{{ route('invoicesrecords.index')}}" class="nav-link">
                            <i class="far  nav-icon"></i>
                            <p>School invoice</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="{{ route('regionindexreceived') }}" class="nav-link">
                    <i class="nav-icon fas fa-file-invoice"></i>
                    <p>
                       School Request Records
                        <i class="right fas "></i>
                    </p>
                </a>
            </li>
            <li class="nav-item">
                @can('project-manager-comment')
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-comment-dots"></i>
                        <p>
                            Feedback Management
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                @endcan
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a  href="{{ route('projectmanagerfeedbacksfromcouncil')}}" class="nav-link">
                            <i class="far  nav-icon"></i>
                            <p> From Officer</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a  href="{{ route('projectmanagerfeedbacksfromschool')}}" class="nav-link">
                            <i class="far  nav-icon"></i>
                            <p>From Headmaster</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                {{--                @can('project-manager-comment')--}}
                <a href="{{ route('allinvoicerecordds')}}" class="nav-link">
                    <i class="nav-icon fas fa-file-invoice"></i>
                    <p>
                        Information records
                    </p>
                </a>
                {{--                @endcan--}}
            </li>

        @else
        @endif
        @if(auth()->user()->hasRole('statisticalofficer'))
            <li class="nav-item">
                <a href="{{ route('statisticalofficerschools.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-school"></i>
                    <p>
                        School Management
                        <i class="right fas "></i>
                    </p>
                </a>
            </li>

            <li class="nav-item">
                @can('user-statisticalofficer')
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users-cog"></i>
                        <p>
                            User Management
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a  href="{{ route('statisticaluser.index')}}" class="nav-link">
                                <i class="far  nav-icon"></i>
                                <p>Headmaster's</p>
                            </a>
                        </li>
                    </ul>
                @endcan
            </li>
            <li class="nav-item">
                <a href="{{ route('GeneratestatisticalControllers.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-file-invoice"></i>
                    <p>
                        Invoice
                    </p>
                </a>
            </li>
            <li class="nav-item">
                @can('statisticalofficer-comment')
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-comment-dots"></i>
                        <p>
                            Feedback Management
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                @endcan
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a  href="{{ route('statisticalofficerfeedbacks.index')}}" class="nav-link">
                            <i class="far  nav-icon"></i>
                            <p>From School</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a  href="{{ route('statisticalofficerfeedbackstoregion')}}" class="nav-link">
                            <i class="far  nav-icon"></i>
                            <p> To Project Manager</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a  href="{{ route('newsuploadedheads')}}" class="nav-link">
                    <i class="nav-icon fas fa-comment-dots"></i>

                    <p>News</p>
                </a>
            </li>
        @else
        @endif
        @if(auth()->user()->hasRole('headmaster'))
            <li class="nav-item">
                @can('headmaster-comment')
                    <a href="{{ route('GenerateheadmasterControllers.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-comment-dots"></i>
                        <p>
                            Invoice
                        </p>
                    </a>
                @endcan
            </li>

            <li class="nav-item">
                @can('headmaster-comment')
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-comment-dots"></i>
                        <p>
                            Feedback Management
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                @endcan
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a  href="{{ route('headmasterfeedbacks.index')}}" class="nav-link">
                            <i class="far  nav-icon"></i>
                            <p>Send feedback </p>
                        </a>
                    </li>


                </ul>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a  href="{{ route('headmasterrequests.index')}}" class="nav-link">
                                <i class="far  nav-icon"></i>
                                <p>Send request </p>
                            </a>
                        </li>


                    </ul>
            </li>
            <li class="nav-item">
                <a  href="{{ route('newsuploadedheads')}}" class="nav-link">
                    <i class="nav-icon fas fa-comment-dots"></i>

                    <p>News</p>
                </a>
            </li>

        @else
        @endif
         <li class="nav-item">
            @can('system-management')
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-cog"></i>
                    <p>
                         System Management
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
            @endcan
            <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a  href="{{ route('roles.index')}}" class="nav-link">
                            <i class="far  nav-icon"></i>
                            <p>Roles Management</p>
                        </a>
                    </li>
                <li class="nav-item">
                        <a  href="{{ route('regions.index')}}" class="nav-link">
                            <i class="far  nav-icon"></i>
                            <p>Regions Management</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a  href="{{ route('councils.index')}}" class="nav-link">
                            <i class="far  nav-icon"></i>
                            <p>Councils Management</p>
                        </a>
                    </li>
                <li class="nav-item">
                        <a  href="{{ route('standards.index')}}" class="nav-link">
                            <i class="far  nav-icon"></i>
                            <p>Standard Management</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a  href="{{ route('schools.index')}}" class="nav-link">
                            <i class="far  nav-icon"></i>
                            <p>School Management</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a  href="{{ route('Schoolinformation.index')}}" class="nav-link">
                            <i class="far  nav-icon"></i>
                            <p>School information</p>
                        </a>
                    </li>

                <li class="nav-item">
                    <a  href="{{ route('newsuploads.index')}}" class="nav-link">
                        <i class="far  nav-icon"></i>
                        <p>News information</p>
                    </a>
                </li>
            </ul>
        </li>
         <li class="nav-item">
            @can('user-management')
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-users-cog"></i>
                    <p>
                        User Management
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                            <a  href="{{ route('headmaster.index')}}" class="nav-link">
                                <i class="far  nav-icon"></i>
                                <p>Headmaster's</p>
                            </a>
                        </li>
                    <li class="nav-item">
                        <a  href="{{ route('statisticalofficer.index')}}" class="nav-link">
                            <i class="far  nav-icon"></i>
                            <p>Statistical officer's</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a  href="{{ route('projectmanager.index')}}" class="nav-link">
                            <i class="far  nav-icon"></i>
                            <p>Project manager</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a  href="{{ route('users.index')}}" class="nav-link">
                            <i class="far  nav-icon"></i>
                            <p>All user's</p>
                        </a>
                    </li>
                </ul>
            @endcan
        </li>
     </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
