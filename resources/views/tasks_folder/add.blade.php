<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        {{-- Laravel Toast --}}
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0- 
        alpha/css/bootstrap.css" rel="stylesheet"> 
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
       <link rel="stylesheet" type="text/css" 
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"> 
       <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

       <style>
        .error{
          color: red;
          font-size: 15px;
        }

        .content-wrapper{
    padding: 15px 0 0 0;
  }
       </style>

<title>Task Management System</title>
  </head>
  <body>
    <div class="container">
      <div class="content-wrapper">
        <section class="content-header">
          <span class="left heading">
             Task Dashboard
          </span>
          <span class="right">
            <a href="{{ route ('tasks')}}" class="">
              <button id="btn" class="btn btn-info">
                  Show
              </button>
            </a>
          </span>
          @if(@isset($tasks)) 
            <form action="{{route('tasks_update',['id' => $tasks->id])}}" method="post">
                @method('PUT')
          @else     
                <form action="{{route('tasks_store')}}" method="post"> 
          @endif     
                @csrf
            <div class="mb-3">
              <label class="form-label">Title</label>
              @if(@isset($tasks)) 
                <input type="text" class="form-control" name="title" value="{{old('title',$tasks->title )}}">
                @else
                <input type="text" class="form-control" name="title" :value="old('title')">
                @endif
                <div class="form-text">
                  @error('title')
                    <div class="error">{{ $message }}</div>
                  @enderror
                </div>
            </div>

            <div class="mb-3">
              <label class="form-label">Description</label>
              @if(@isset($tasks)) 
                <input type="text" class="form-control" name="description" value="{{old('description',$tasks->description )}}">
                @else
                <input type="text" class="form-control" name="description" :value="old('description')">
                @endif
                <div class="form-text">
                  @error('description')
                    <div class="error">{{ $message }}</div>
                  @enderror
                </div>
            </div>


            <div class="mb-3">
              <label class="form-label">Status</label>
              @if(@isset($tasks)) 
                <input type="text" class="form-control" name="status" value="{{old('status',$tasks->status )}}">
                @else
                <input type="text" class="form-control" name="status" :value="old('status')">
                @endif
                <div class="form-text">
                  @error('status')
                    <div class="error">{{ $message }}</div>
                  @enderror
                </div>
            </div>


            <div class="mb-3">
              <label class="form-label">Dua Date</label>
              @if(@isset($tasks)) 
              <input type="date" class="form-control"  name="dua_date" value="{{old('dua_date',$tasks->dua_date )}}">
              @else
              <input type="date" class="form-control"  name="dua_date" :value="old('dua_date')">
             @endif
                <div class="form-text">
                  @error('dua_date')
                    <div class="error">{{ $message }}</div>
                  @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>  
        </section>        
      </div>
    </div>

    <script>
      @if(Session::has('message'))
        toastr.options =
        {
          "closeButton" : true,
          "progressBar" : true
        }
            toastr.success("{{ session('message') }}");
        @endif
    
        @if(Session::has('error'))
        toastr.options =
        {
          "closeButton" : true,
          "progressBar" : true
        }
            toastr.error("{{ session('error') }}");
        @endif
    
        @if(Session::has('info'))
        toastr.options =
        {
          "closeButton" : true,
          "progressBar" : true
        }
            toastr.info("{{ session('info') }}");
        @endif
    
        @if(Session::has('warning'))
        toastr.options =
        {
          "closeButton" : true,
          "progressBar" : true
        }
            toastr.warning("{{ session('warning') }}");
        @endif
    </script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>