<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>PDF Generator</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body>
    <nav class="navbar navbar-light bg-light">
        <div class="container">
          <span class="navbar-brand mb-0 h1">PDF Generator</span>
        </div>
    </nav>
   <div class="container ">

    <div class="row g-3 p-5">
          <div id="nulled">

          </div>

        <div class="col-md-6">
          <label for="inputEmail4" class="form-label">Student Name</label>
          <input type="text" class="form-control" id="stu_name" required>
        </div>
        <div class="col-md-6">
          <label for="inputPassword4" class="form-label">Email</label>
          <input type="email" class="form-control" id="stu_mail" required>
        </div>
        <div class="col-md-6">
            <label for="inputState" class="form-label">State</label>
            <select id="stu_department" class="form-select">
                    <option value="Computer Science & Engineering">Computer Science & Engineering</option>
                    <option value="Business Administration">Business Administration</option>
                    <option value="Pharmacy">Pharmacy</option>
                    <option value="Microbiology">Microbiology</option>
                    <option value="Environmental Science">Environmental Science</option>
                    <option value="English">English</option>
                    <option value="Economics">Economics</option>
                    <option value="Film and Media Studies">Film and Media Studies</option>
                    <option value="Electrical & Electronic Engineering">Electrical & Electronic Engineering</option>
                    <option value="Civil Engineering">Civil Engineering</option>
            </select>
        </div>
        <div class="col-md-6">
          <label for="inputEmail4" class="form-label">Student ID</label>
          <input type="text" class="form-control" id="stu_id" required>
        </div>

        <div class="col-md-6">
          <button type="button" onclick="datasend()"  class="btn btn-primary">Add</button>
        </div>
        {{-- <form action="{{ route("printpdf") }}" method="POST">
        @csrf --}}
           <a target="_blank" href="{{ route("printpdf") }}">
            <div class="col-md-6 ">
                <button type="submit"    class="btn btn-primary float-end">Generate PDF</button>
            </div>
           </a>
        {{-- </form> --}}


    </div>


      <table class="table">
        <thead>
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Department</th>
            <th>Student ID</th>
          </tr>
        </thead>
        <tbody id="new">
           @foreach ( $data as $item)
                 <tr>
                     <td>
                           {{ $item->Student_name }}
                     </td>
                     <td>
                        {{ $item->Student_email}}
                     </td>
                     <td>
                        {{ $item->Department}}
                     </td>
                     <td>
                        {{ $item->Student_id}}
                     </td>

                 </tr>
           @endforeach

        </tbody>
      </table>
   </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" ></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>
    <script>
    function datasend(){
         var student_name = document.getElementById("stu_name").value;
         var student_email = document.getElementById("stu_mail").value;
         var student_department = document.getElementById("stu_department").value;
         var student_id = document.getElementById("stu_id").value;
         if( student_name == '' || student_email=='' || student_department=='' || student_id ==''){
            var element = document.getElementById("nulled");
            var tag = document.createElement("span");
            tag.innerHTML =    '<div class="alert alert-danger col-md-12 alert-dismissible fade show" role="alert">'+
                               'Info missing'+
                               '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>'+
                               ' </div>'
            element.appendChild(tag);

         }else{
            $.ajax({


                    type:"POST",
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url:"/adddata",
                    data:{
                        'name' : student_name,
                        'mail': student_email,
                        'department': student_department,
                        'id': student_id,
                    },
                    success:function(data){
                    var tag = document.createElement("tr");
                    tag.innerHTML =     '<td>'+student_name+'</td>'+
                                        '<td>'+student_email+'</td>'+
                                        '<td>'+student_department+'</td>'+
                                        '<td>'+student_id+'</td>';
                    var element = document.getElementById("new");
                    element.appendChild(tag);
                    },
                    error: function(errorThrown){
                    console.log(errorThrown);
                    }

                    })

         }

    }

    </script>
</body>
</html>
