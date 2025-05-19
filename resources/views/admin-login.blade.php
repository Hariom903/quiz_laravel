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
    <div class="container justify-content-center align-content-center row min-vw-100 min-vh-100">
        <h2 class="text-center text-success" > Login Page here....! </h2>
        <form action="admin-login" class="" method="post">
            @csrf
        <div class="mb-3 offset-sm-3 col-12 col-sm-6">
            <label for="email" class="form-label">Email</label>
            <input
                type="email"
                class="form-control"
                name="email"
             
                aria-describedby="emailHelpId"
                placeholder="abc@mail.com" />
        </div>
        <div class="mb-3 offset-sm-3  col-12 col-sm-6">
            <label for="password" class="form-label">Password</label>
            <input
                type="password"
                class="form-control"
                name="password"
            
            />
        </div>
           <div class="mb-3 offset-sm-3  col-12 col-sm-6">
            <button class="btn btn-info form-control" type="submit"> Login  </button>
           </div>


    
    </div>
</form>

</body>

</html>