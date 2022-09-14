
<!DOCTYPE html>
<html>
<head>
    <title>Alaa etolv</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name='viewport' 
    content='width=device-width, initial-scale=1.0, maximum-scale=1.0, 
    user-scalable=0' >
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    
</head>
<body>
    @include('layouts.partials.navbar')

<div class="container " style="padding-top: 30px;">
    <h2>Students</h2>
    <div class="lead " style="width: 100%; text-align:right;" >
       
        <a href="{{ route('students.create') }}" class="btn btn-primary btn-sm float-right text-right">Add student</a>
    </div>

    <div class="mt-2">
        @include('layouts.partials.messages')
    </div>
      
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th width="1%">No</th>
                <th>Name</th>
                <th>phone</th>
                <th>grade</th>
                <th width="3%" colspan="3">Action</th>
            </tr>
        </thead>
        <tbody id="data">
           
                {{-- <td>
                    <a 
                        href="javascript:void(0)" 
                        id="show-user" 
                        data-url="{{ route('students.all', $user->id) }}" 
                        class="btn btn-info btn-sm"
                        >Show</a>
                </td>
                <td>
                    <a class="btn btn-primary btn-sm" href="{{ route('students.edit', $user->id) }}">Edit</a>
                </td>
                <td>
                    {!! Form::open(['method' => 'DELETE', 'route' => ['students.destroy', $user->id], 'style' => 'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                    {!! Form::close() !!}
                </td>
                 --}}
            
        </tbody>
    </table>
  
   
  
</div>
  

<div class="modal fade" id="ajaxResults" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Show User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p><strong>ID:</strong> <span id="user-id"></span></p>
        <p><strong>Name:</strong> <span id="user-name"></span></p>
        <p><strong>Phone:</strong> <span id="user-phone"></span></p>
        <p><strong>Grade:</strong> <span id="user-grade"></span></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
      
</body>
{{--   
<script type="text/javascript">
    $(document).ready(function () {
        $('body').on('click', '#show-user', function () {
          var userURL = $(this).data('url');
          $.get(userURL, function (data) {
              $('#userShowModal').modal('show');
              $('#user-id').text(data.id);
              $('#user-name').text(data.name);
              $('#user-phone').text(data.phone);
              $('#user-grade').text(data.grade);

          })
       });
       
    });
  
</script>
 --}}

{{-- 
<script type="text/javascript">
   
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
 
  $("#show-user").click(function(e){

      data.preventDefault();
      var id = e.id;

      var name = e.name;

        var phone = e.phone;
        var grade = e.grade;
      
 
      $.ajax({
         type:'get',
         url: $(this).data('url'),
         data:{id:id, name:name, phone:phone, grade:grade},
         success:function(data){
          success:function(data) { 
            var id = '<tr id="todo' + data.id + '"><td>' + data.name + '</td><td>' + data.phone + '</td><td>' + data.grade + '</td>';
}
         }
      });

  });
</script>
 --}}





<script type="text/javascript">
   
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
 

 
     const dataTable = document.getElementById('data');

      $.ajax({
         type:'get',
         url:"{{ route('students.trial') }}",
       
         success:function(data){
          
            console.log(data)
            var id;
            data.forEach(element => {
              id = `<tr>
                <td>${element.id}</td>
                <td>${element.name}</td>
                <td>${element.phone}</td>
                <td>${element.grade}</td>

                <td>
            <a class="btn btn-info btn-sm" href=/students/show/`+ element.id +` >Show</a>
        </td>
                <td>
            <a class="btn btn-primary btn-sm" href=/students/edit/`+ element.id +` >Edit</a>
        </td>
       
        <td>
          <form action="{{url('/students/delete/`+ element.id +`')}}" method="post">
@csrf
{{method_field('delete')}}
<button type="submit" class="btn btn-danger btn-sm">Delete</button>
</form>
          
          
        
        </td>

            </tr>`;
                $('#data').append(id)

              });

         }
      });


</script>
 














</html>