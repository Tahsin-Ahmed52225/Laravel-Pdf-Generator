{{-- <!DOCTYPE html> --}}
<html lang="en">
<head>
    {{-- <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>PDF Generator</title> --}}

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body>
    <style>
        table{
               /* border: 2px solid black; */
               border-left: 0.02em solid rgb(0, 0, 0);
                border-right: 0;
                border-top: 0.02em solid rgb(0, 0, 0);
                border-bottom: 0;
                border-collapse: collapse;
                text-align: center;
         }
        table td,
        table th {
            text-align: center;
            border-left: 0;
            border-right: 0.01em solid rgb(0, 0, 0);
            border-top: 0;
            border-bottom: 0.01em solid rgb(0, 0, 0);
        }
    </style>
    <div class="container-fluid">

        <div style="text-align: center; font-size:25px; padding-bottom:50px;">List of All Student</div>

        <table class="table" >
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
</body>
</html>
