@include('admin.master.header')
  <body>
    <div class="wrapper">
    @include('admin.master.sidebar')

      <div class="main-panel">
        <div class="main-header">
          <div class="main-header-logo">
            <!-- Logo Header -->
            <div class="logo-header" data-background-color="dark">
              <a href="../index.html" class="logo">
                <img
                  src="admin/assets/img/kaiadmin/logo_light.svg"
                  alt="navbar brand"
                  class="navbar-brand"
                  height="20"
                />
              </a>
              <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                  <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                  <i class="gg-menu-left"></i>
                </button>
              </div>
              <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
              </button>
            </div>
            <!-- End Logo Header -->
          </div>
          <!-- Navbar Header -->
        @include('admin.master.navbar')
        </div>

        <div class="container">
          <div class="page-inner">
            <div class="page-header">
              <h3 class="fw-bold mb-3">DataTables.Net</h3>
              <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                  <a href="#">
                    <i class="icon-home"></i>
                  </a>
                </li>
                <li class="separator">
                  <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                  <a href="#">Tables</a>
                </li>
                <li class="separator">
                  <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                  <a href="#">Datatables</a>
                </li>
              </ul>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Data Jurusan</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div id="basic_datatables_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap-4">
                                <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="dataTables_length" id="basic_datatables_length">
                                    <label>Show
                                        <select name="basic_datatables_length" aria-controls="basic-datatables" class="form-control form-control-sm">
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                        </select>
                                        entries
                                    </label>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="dataTables_filter" id="basic-datatables_filter">
                                        <label>
                                            Search:
                                            <input type="search" class="form-control form-control-sm" placeholder aria-controls="basic-datatables">
                                        </label>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table
                                        id="basic-datatables"
                                        class="display table table-striped table-hover dataTable" role="grid" aria-describedby="basic-datatables_info">
                                        <thead>
                                        <tr role="row">
                                            <th>Id</th>
                                            <th class="sorting" tabindex="0" aria-controls="multi-filter-select" rowspan="1" 
                                            colspan="1" aria-sort="ascending" aria-label="Nama kegiatan: active to sort column descending">Judul Kabar</th>
                                            <th class="sorting" tabindex="0" aria-controls="multi-filter-select" rowspan="1" 
                                            colspan="1" aria-sort="ascending" aria-label="tanggal: active to sort column">Tanggal Terbit</th>
                                            <th class="sorting" tabindex="0" aria-controls="multi-filter-select" rowspan="1" 
                                            colspan="1" aria-sort="ascending" aria-label="tanggalberlaku: active to sort column">Tanggal Berlaku</th>
                                            <th class="sorting" tabindex="0" aria-controls="multi-filter-select" rowspan="1" 
                                            colspan="1" aria-sort="ascending" aria-label="tempat: active to sort column">Terkait Dengan</th>
                                            <th class="sorting" tabindex="0" aria-controls="multi-filter-select" rowspan="1" 
                                            colspan="1" aria-sort="ascending" aria-label="Nama Jurusan: active to sort column">Foto Kabar</th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="multi-filter-select" rowspan="1" 
                                            colspan="1" aria-label="Foto: active to sort column ascending"">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($kabars as $item)
                                            <tr role="row">
                                                <td>{{$item->id}}</td>
                                                <td>{{$item->judul_kabar}}</td>
                                                <td>{{$item->tanggal_terbit}}</td>
                                                <td>{{$item->tanggal_berlaku}}</td>
                                                <td>{{$item->related_type}}</td>
                                                <td><img src="{{asset ('storage/images/kabar/' .$item->gambar)}}" alt="img" height="50px"></td>
                                                <td>
                                                    <div class="form-button-action">
                                                        <form action="{{route('kabar-update', $item)}}" method="get">
                                                            @csrf
                                                            <button
                                                            type="submit"
                                                            class="btn btn-link btn-warning"
                                                            >
                                                            <i class="fa fa-edit"></i>
                                                            </button>
                                                        </form>
                                                        <form action="{{route('kabar-delete',$item)}}" method="POST">
                                                            @method('delete')
                                                            @csrf
                                                            <button
                                                            type="submit"
                                                            data-bs-toggle="tooltip"
                                                            class="btn btn-link btn-danger"
                                                            data-original-title="Remove"
                                                            >
                                                            <i class="fa fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-5">
                                    <div class="dataTables_info" id="basic-datatables_info" role="status" aria-live="polite">Showing 1 to 10</div>
                                </div>
                                <div class="col-sm-12 col-md-7">
                                    {{-- <div class="dataTables_paginate paging_simple_numbers" id="basic-datatables_paginate">
                                        <ul class="pagination">
                                            <li class="paginate_button page-item previous" id="basic-datatables_previous">
                                                <a href="#" aria-controls="basic-datatables" data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
                                            </li>
                                            <li class="paginate_button page-item">
                                                <a href="#" aria-controls="basic-datatables" data-dt-idx="1" tabindex="0" class="page-link">1</a>
                                            </li>
                                            <li class="paginate_button page-item next" id="basic-datatables_next">
                                                <a href="#" aria-controls="basic-datatables" data-dt-idx="2" tabindex="0" class="page-link">Next</a>
                                            </li>
                                        </ul>
                                    </div> --}}
                                    <div class="demo">
                                        <ul class="pagination pg-primary">
                                          <li class="page-item">
                                            <a class="page-link" href="#" aria-label="Previous">
                                              <span aria-hidden="true">&laquo;</span>
                                              <span class="sr-only">Previous</span>
                                            </a>
                                          </li>
                                          <li class="page-item active">
                                            <a class="page-link" href="#">1</a>
                                          </li>
                                          <li class="page-item">
                                            <a class="page-link" href="#">2</a>
                                          </li>
                                          <li class="page-item">
                                            <a class="page-link" href="#">3</a>
                                          </li>
                                          <li class="page-item">
                                            <a class="page-link" href="#" aria-label="Next">
                                              <span aria-hidden="true">&raquo;</span>
                                              <span class="sr-only">Next</span>
                                            </a>
                                          </li>
                                        </ul>
                                      </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      @include('admin.master.skin')
    </div>
  @include('admin.master.foot')
  </body>
</html>
