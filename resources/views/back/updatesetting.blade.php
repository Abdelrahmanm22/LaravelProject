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
    <div class="card card-primary">
            @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                  {{Session::get('success')}}
                </div>
            @endif
              <div class="card-header">
                <h3 class="card-title">Update Settings</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('admin.update.setting',$settings->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputTitle">Title</label>
                    <input type="text" class="form-control" value="{{$settings->title}}" name="title"  id="exampleInputTitle" placeholder="Enter User Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputAbout">About</label>
                    <textarea rows="4" cols="50" class="form-control" name="About" id="exampleInputAbout" placeholder="Description">{{$settings->about}}</textarea>
                  </div>
                  
                  <div class="form-group">
                    <img src="{{URL::asset('images/setting').'/'.$settings->avatar}}" width="100px" height="100px">
                    <label for="exampleInputFile">Avatar</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="avatar" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">{{$settings->avatar}}</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div> 
                  <div class="form-group">
                    <!-- <img src="{{URL::asset('images/setting/').$settings->CV}}" width="100px" height="100px"> -->
                    <label for="exampleInputFile">CV</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="cv" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">{{$settings->CV}}</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                  </div> 
                  
                  <!-- <input type="hidden" class="form-control" name="id" id="exampleInputID" value="" > -->
                    
                </div>
                
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@include('back.includes.footer')