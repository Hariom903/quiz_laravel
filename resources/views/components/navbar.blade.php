<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Quiz System </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="/dashboard">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About </a>
        </li>
       <li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    Users
  </a>
  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
    <li><a class="dropdown-item" href="#">Create User</a></li>
    <li><a class="dropdown-item" href="#">View User List</a></li>
    <li><a class="dropdown-item" href="/add-quiz">Quiz</a></li>
  </ul>
</li>
 <li class="nav-item">
          <a class="nav-link" href="/categray"> Categray </a>
        </li>

      </ul>
      <ul class="navbar-nav ms-auto mx-2 mb-2 mb-lg-0">
        <li class="nav-item">
   <strong> welcome  </strong>  <samp> <em> {{$name}} </em> </samp>
    </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
      <a  href="/logout"  class="btn btn-danger mx-2"> Logout  </a>
    </div>
  </div>
</nav>

</div> 