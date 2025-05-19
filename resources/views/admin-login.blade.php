
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>

          @error('user')
                  <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong> ERROR  </strong> {{ $message}}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
   
@enderror
    <div class="container justify-content-center align-content-center row min-vw-100 min-vh-100">
        <h2 class="text-center text-success" > Login Page here....! </h2>
        
        <form action="admin-login" class="" method="post">
            @csrf
        <div class="mb-3 offset-sm-3 col-12 col-sm-6">
            <label for="name" class="form-label">name</label>
            <input
                type="text"
                class="form-control"
                name="name"
             
                placeholder="Enter user name" />
                 @error('name')
    <div class="text-danger small">{{ $message }}</div>
@enderror
        </div>
   

        <div class="mb-3 offset-sm-3  col-12 col-sm-6">
            <label for="password" class="form-label">Password</label>
            <input
                type="password"
                class="form-control"
                name="password"
            
            />
                  @error('password')
    <div class="text-danger small">{{ $message }}</div>
@enderror
        </div>
           <div class="mb-3 offset-sm-3  col-12 col-sm-6">
            <button class="btn btn-info form-control" type="submit"> Login  </button>
           </div>


    
    </div>
</form>

</body>

</html>