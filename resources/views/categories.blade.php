<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Categray page </title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>
<body>
  @if (session('success'))
    <div class="alert alert-success  ">
        {{ session('success') }}
    </div>
@endif

<x-navbar :name="$name"></x-navbar>   

<div class="container pt-5 ">
  <h2 class="text-center text-success" > Add Category here....! </h2>
 <div class="row justify-content-center ">
  <div class="col-12 col-sm-6  " > 
    <form action="/add_category" method="post">
      @csrf
      <div class="mb-3">
        <label for="cat" class="form-label">Categories</label>
        <input
          type="text"
          class="form-control"
          name="cat"
          id=""
          aria-describedby="helpId"
          placeholder="Enter Categories"
        />
      </div>
    @error('cat')
    <div class="text-danger">{{ $message }}</div>
@enderror
       <div class="mb-3">
      <button class="btn btn-info form-control" type="submit"> Add Category  </button>
       </div>
    </form>
  </div>
 </div>
</div>
  <div class="container pt-4 ">
        <!-- Search form -->
    <form method="GET" action="{{ url('categray') }}" class="mb-3">
        <input type="text" name="search" value="{{request('search')}}" placeholder="Search categories..." class="form-control" />
        <button type="submit" class="btn btn-primary mt-2">Search</button>
    </form>
   <table class="table table-success table-stripe d">
   <thead> 
    <tr>  
      <th> S.no  </th>
      <th>  Name  </th>
      <th> Created_by </th>
      <th>  Opretions </th>
    </tr>
   </thead>
   <tbody> 
     @php  $i =1; @endphp
   @foreach($categories as $category)
 
    <tr>
      <td>
       {{ $i++ }}
      </td>
      <td>
       {{ $category->name }}
      </td>
      <td>
       {{ $category->admin->  name }}
      </td>
      <td> 
        <a
          name=""
          id=""
          class="btn  btn-danger"
          href="delete_category/{{$category->id}}"
          role="button"
          >Delete</a
        >
        
      </td>
    </tr>
  @endforeach
   </tbody>
</table>
{{ $categories->links('pagination::bootstrap-5') }}

  </div>
</body>
</html>
