<x-app-layout>
  <!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
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
  .edit-btn{
    border: 2px solid black;
    color: rgb(230, 230, 237);
    background: green;
    padding: 5px;
  }
  h1{
    padding: 10px;
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
          <span class="right">
            <a href="{{ route ('tasks_add')}}" class="">
              <button id="btn" class="btn btn-info">
                Task Add
              </button>
            </a>
          </span>
          <center> <h1>Tasks Dashboard</h1>  </center>

   

          <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
             Filter By Status
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{ route('tasks') }}">All</a></li>
              <li><a class="dropdown-item" href="{{ route('tasks_filter', 'Pending') }}">Pending</a></li>
              <li> <a class="dropdown-item" href="{{ route('tasks_filter', 'Completed') }}">Completed</a></li>
              <li> <a class="dropdown-item" href="{{ route('tasks_filter', 'In progress') }}">In progress</a></li>
            </ul>
          </div>

       
            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">Tasks Id</th>
                    <th scope="col">title
                      <span class="float-right">
                        <a href=" {{route('title_asc_sorting')}}"><i class="fa fa-arrow-up"></i></a>
                        <a href="{{route('title_desc_sorting')}}"><i class="fa fa-arrow-down"></i></a>
                      </span>
                    </th>
                    <th scope="col">Description</th>
                    <th scope="col">Status
                      <span class="float-right">
                        <a href=" {{route('status_asc_sorting')}}"><i class="fa fa-arrow-up"></i></a>
                        <a href="{{route('status_desc_sorting')}}"><i class="fa fa-arrow-down"></i></a>
                      </span>
                    </th>
                    <th scope="col">Dua date
                      <span class="float-right">
                        <a href=" {{route('date_asc_sorting')}}"><i class="fa fa-arrow-up"></i></a>
                        <a href="{{route('date_desc_sorting')}}"><i class="fa fa-arrow-down"></i></a>
                      </span>
                    </th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $tasks)
                    <tr>
                        <td>{{$tasks->id}}</td>
                        <td>{{$tasks->title}}</td>
                        <td>{{$tasks->description}}</td>
                        <td>{{$tasks->status}}</td>
                        <td>{{$tasks->dua_date}}</td>
                        <td>
                          <a href="{{url('tasks-edit/'.$tasks->id)}}" class="edit-btn"> Edit</a>
                        </td>
                        <td>
                          <a href="{{url('tasks-delete/'.$tasks->id)}}" class="edit-btn"> Delete</a>
                        </td>
                      </tr>
                    @endforeach
                  
                </tbody>
               
              </table>   
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
</x-app-layout>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>