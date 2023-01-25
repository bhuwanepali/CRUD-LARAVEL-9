<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Client Management</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="{{asset('fontawesome/css/all.css')}}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" rel="stylesheet" />
    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    @viteReactRefresh
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    Client Management System
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

            @yield('content')
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>   
<script type="text/javascript">
  $(function () {
      
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('home.index') }}",
        columns: [
            {data: "id", name: "id"},
            {data: "name", name: "name"},
            {
                data: "image", 
                name: "image",
                "render": function (data, type, full, meta) {        
                    return "<img src=\"/images/" + data + "\" height=\"50\"/>";     
                },     
            },
            {data: "gender", name: "gender"},
            {data: "phone", name: "phone"},
            {data: "email", name: "email"},
            {data: "nationality", name: "nationality"},
            {data: "dob", name: "dob"},
            {data: "education", name: "education"},
            {data: "mode_of_contact", name: "mode_of_contact"},
            {data: "action", name: "action", orderable: false, searchable: false},
        ]
    });
    
    // Delete record script
    $(document).ready(function(){
        $(document).on('click','.delete',function(){
            var id = $(this).data('id');
            var conf = confirm('Are you sure want to delete!');
            if(conf){
                $.ajax({
                    type: "GET",
                    url: "/client/destroy/"+id,
                    success:function(data){
                        table.draw();
                    },
                    error:function(data){
                        console.log('Error:',data);
                    }            
                });
            }
        });
    });

    //Reset input file
    $('input[type="file"][name="image"]').val('');
            //Image preview
            $('input[type="file"][name="image"]').on('change', function(){
                var img_path = $(this)[0].value;
                var img_holder = $('.img-holder');
                var extension = img_path.substring(img_path.lastIndexOf('.')+1).toLowerCase();
                if(extension == 'jpeg' || extension == 'jpg' || extension == 'png'){
                     if(typeof(FileReader) != 'undefined'){
                          img_holder.empty();
                          var reader = new FileReader();
                          reader.onload = function(e){
                              $('<img/>',{'src':e.target.result,'class':'img-fluid','style':'max-width:200px;margin-bottom:10px;'}).appendTo(img_holder);
                          }
                          img_holder.show();
                          reader.readAsDataURL($(this)[0].files[0]);
                     }else{
                         $(img_holder).html('This browser does not support FileReader');
                     }
                }else{
                    $(img_holder).empty();
                }
            });
  });

  // Edit Modal
  $(document).ready(function(){
        $(document).on('click','.edit',function(){
            var id = $(this).data('id');

            $('#EditClient').modal('show');

            $.ajax({
                type: "GET",
                url: "/client/edit/"+id,
                success: function(response){
                    console.log(response);
                    $('#id').val(id);
                    $('#EditName').val(response.clients.name);
                    $('#EditGender').val(response.clients.gender);
                    $('#EditPhone').val(response.clients.phone);
                    $('#EditEmail').val(response.clients.email);
                    $('#EditNationality').val(response.clients.nationality);
                    $('#EditDob').val(response.clients.dob);
                    $('#EditEducation').val(response.clients.education);
                    $('#mode_of_contact').val(response.clients.mode_of_contact);
                }
            });
        });
    });

    // View Modal
    $(document).ready(function(){
        $(document).on('click','.view',function(){
            var id = $(this).data('id');

            $('#ViewClient').modal('show');

            $.ajax({
                type: "GET",
                url: "/client/view/"+id,
                success: function(response){
                    var image = response.clients.image;
                    console.log(image);
                    console.log(response);
                    $('#vname').text(response.clients.name);
                    $('#vimage').attr('src', '/images/'+image);
                    $('#vgender').text(response.clients.gender);
                    $('#vphone').text(response.clients.phone);
                    $('#vemail').text(response.clients.email);
                    $('#vnationality').text(response.clients.nationality);
                    $('#vdob').text(response.clients.dob);
                    $('#veducation').text(response.clients.education);
                    $('#vmodeofcontact').text(response.clients.mode_of_contact);
                }
            });
        });
    });

    $(document).ready(function(){
        $('.education').select2({
            placeholder : 'Select',
            allowClear : true,
        });

        $('#AddEducation').select2({
            ajax:{
                url:"{{ route('client.get_education') }}",
                type:"post",
                delay:250,
                dataType:'json',
                data: function(params){
                    return{
                        name:params.term,
                        "_token":"{{ csrf_token() }}",
                    };
                },

                processResults:function(data){
                    return {
                        results: $.map(data,function(item){
                            return {
                                id:item.title,
                                text:item.title
                            }
                        })
                    };
                },
            },
        });
    });

    $(document).ready(function(){
        $('.edit_education').select2({
            placeholder : 'Select',
            allowClear : true,
        });

        $('#EditEducation').select2({
            ajax:{
                url:"{{ route('client.get_education') }}",
                type:"post",
                delay:250,
                dataType:'json',
                data: function(params){
                    return{
                        name:params.term,
                        "_token":"{{ csrf_token() }}",
                    };
                },

                processResults:function(data){
                    return {
                        results: $.map(data,function(item){
                            return {
                                id:item.title,
                                text:item.title
                            }
                        })
                    };
                },
            },
        });
    });
</script>
</html>
