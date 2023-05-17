@include('back.includes.header')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Settings</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('logout')}}">logout</a></li>
            <li class="breadcrumb-item active">Home</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
    <div class="card">
              <div class="card-header">
                <h3 class="card-title">Setting Table</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">ID</th>
                      <th>Title</th>
                      <th>About</th>
                      <th>CV</th>
                      <th>Avatar</th>
                      <th>Admin Id</th>
                      <th>UPDATE</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>{{$settings->id}}</td>
                      <td>{{$settings->title}}</td>
                      <td>{{$settings->about}}</td>
                      <td>{{$settings->CV}}</td>
                      <td>{{$settings->avatar}}</td>
                      <td>{{$settings->user_id}}</td>
                      <td><a href="{{url('admin/updateSetting').'/'.$settings->id}}" class="btn btn-default">update</a></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              
            </div>
            <!-- /.card -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@include('back.includes.footer')