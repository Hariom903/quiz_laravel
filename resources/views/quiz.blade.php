<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Quiz  </title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>
<body>
<x-navbar :name="$name"></x-navbar> 
@if(!session()->has('quiz')) 
<div class="container">
    <h2 class="text-center text-success"> Add Quiz  </h2>
    <div class="row justify-content-center">
        <div class="col-12 col-sm-6">
            <form action="add-quiz" method="GET">
                <div class="mb-3">
                    <label for="" class="form-label">Enter Quiz </label>
                    <input
                        type="text"
                        class="form-control"
                        name="quiz"
                        id=""
                        required
                     
                        placeholder="Enter Quiz"
                    />
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Category </label>
                    <select
                        class="form-select form-select-lg"
                        name="category"
                        id=""
                    >
                        <option value="">Select Category </option>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                
                <button
                    type="submit"
                    class="btn btn-primary form-control"
                >
                    Submit
                </button>
                
                
            </form>
        </div>
    </div>
</div> 
@else
 <div class="container">
    

        @php 
         $quiz  = session()->get('quiz');
         @endphp
 
 <h2 class="text-center text-success"> Add question 
 </h2>

    <div class="row justify-content-center">
         <p class="text-info text-center  " > Quiz Name : {{ $quiz->name }}  </p>
        <div class="col-12 col-sm-6">
            <p class="text-success"> Total add Qustion {{$total}} <samp> <a href="show-qus"> show qus </a> </samp> </p>
            <form action="add-qus" method="post">
                       @csrf
                <div class="mb-3">
                    <label for="" class="form-label"> Enter Quiz Question </label>
                    <textarea
                        type="text"
                        class="form-control"
                        name="qus"
                        id=""
                        required
                     
                        placeholder="Enter Quiz"
                    > </textarea>
                </div>
               
                  <div class="mb-3">
                    <label for="" class="form-label">Options A </label>
                    <input
                        type="text"
                        class="form-control"
                        name="A"
                        id=""
                        required
                        placeholder="Options A "
                    />
                </div>
                  <div class="mb-3">
                    <label for="" class="form-label">Options B </label>
                    <input
                        type="text"
                        class="form-control"
                        name="B"
                        id=""
                      required
                        placeholder="Options B"
                    />
                </div>
                  <div class="mb-3">
                    <label for="" class="form-label">Options C </label>
                    <input
                        type="text"
                        class="form-control"
                        name="C"
                        id=""
                       required 
                        placeholder="Options C "
                    />
                </div>
                 <div class="mb-3">
                    <label for="" class="form-label">Options D </label>
                    <input
                        type="text"
                        class="form-control"
                        name="D"
                        id=""
                      required 
                        placeholder="Options D "
                    />
                </div>
                         <div class="mb-3">
                    <label for="" required  class="form-label"> Answer </label>
                     <select name="ans" id="" class="form-control" >
                    <option value=""> Correct answer</option>
                    <option value="A"> A </option>
                    <option value="B"> B </option>
                    <option value="C"> C </option>
                    <option value="D"> D </option>

                     </select>
                </div>   
                <button
                    type="submit"
                    name="submit"
                    value="addandnext"
                    class="btn btn-primary form-control"
                >
                    Add and Next 
                </button>
                <button
                    type="submit"
                    name="done"
                    class="btn btn-success pt-2 my-2     form-control"
                >
                 Submit 
                </button>
                
    </form>
 </div>
@endif
</body>
</html>
