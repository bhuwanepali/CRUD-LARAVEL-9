@extends('layouts.app')
@section('content')
<!-- Add user Modal  -->
@push('styles')
<style>
	.select2-container{
		width: 100%!important;
	}
</style>
@endpush
<!-- Modal -->
<div class="modal fade" id="AddClient" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="AddClientLabel" aria-hidden="true">
  	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="AddClientLabel">Add Client</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form class="row g-3" method="POST" action="{{route('client.store')}}" enctype="multipart/form-data">
					{{ csrf_field() }}
					<div class="col-md-6">
						<label for="AddName" class="form-label">Name</label>
						<input type="text" class="form-control" id="AddName" name="name" placeholder="Name">
					</div>
					<div class="col-6">
						<label for="AddGender" class="form-label">Gender</label>
						<select id="AddGender" class="form-select" name="gender">
							<option selected>--- Select ---</option>
							<option>Male</option>
							<option>Female</option>
							<option>Other</option>
						</select>
					</div>
					<div class="col-md-6">
						<label for="AddPhone" class="form-label">Phone</label>
						<input type="text" class="form-control" id="AddPhone" name="phone" placeholder="Phone">
					</div>
					<div class="col-md-6">
						<label for="AddEmail" class="form-label">Email</label>
						<input type="email" class="form-control" id="AddEmail" name="email" placeholder="Email">
					</div>
					<div class="col-md-6">
						<label for="AddNationality" class="form-label">Nationality</label>
						<input type="text" class="form-control" id="AddNationality" name="nationality" placeholder="Nationality">
					</div>
					<div class="col-6">
						<label for="AddDob" class="form-label">DOB</label>
						<input type="date" class="form-control" id="AddDob" name="dob">
					</div>
					<div class="col-6">
						<label for="AddEducation" class="form-label">Education</label><br>
						<select class="form-control education" name="education[]" id="AddEducation" multiple="multiple" style="width:100%;">
						</select>
					</div>
					<div class="col-6">
						<label for="inputModeOfContact" class="form-label">Mode Of Contact</label>
						<select id="inputModeOfContact" class="form-select" name="mode_of_contact">
							<option selected>--- Select ---</option>
							<option>Email</option>
							<option>Phone</option>
						</select>
					</div>
					<div class="col-6">
						<label for="AddImage" class="form-label">Image</label>
						<input class="form-control" type="file" id="AddImage" name="image" placeholder="Image" value="">
					</div>
					<div class="img-holder"></div>
					<div class="col-12">
						<button type="submit" class="btn btn-success float-end">Save & Close</button>
					</div>
				</form>			
			</div>
		</div>
  	</div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="EditClient" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="EditClientLabel" aria-hidden="true">
  	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="EditClientLabel">Edit Client</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form class="row g-3" method="get" action="{{route('client.update')}}" enctype="multipart/form-data">
					{{ csrf_field() }}
					<input type="hidden" name="id" id="id">
					<div class="col-md-6">
						<label for="EditName" class="form-label">Name</label>
						<input type="text" class="form-control" id="EditName" name="name" placeholder="Name">
					</div>
					<div class="col-6">
						<label for="EditGender" class="form-label">Gender</label>
						<select id="EditGender" class="form-select" name="gender">
							<option selected>--- Select ---</option>
							<option>Male</option>
							<option>Female</option>
							<option>Other</option>
						</select>
					</div>
					<div class="col-md-6">
						<label for="EditPhone" class="form-label">Phone</label>
						<input type="text" class="form-control" id="EditPhone" name="phone" placeholder="Phone">
					</div>
					<div class="col-md-6">
						<label for="EditEmail" class="form-label">Email</label>
						<input type="email" class="form-control" id="EditEmail" name="email" placeholder="Email">
					</div>
					<div class="col-md-6">
						<label for="EditNationality" class="form-label">Nationality</label>
						<input type="text" class="form-control" id="EditNationality" name="nationality" placeholder="Nationality">
					</div>
					<div class="col-6">
						<label for="EditDob" class="form-label">DOB</label>
						<input type="date" class="form-control" id="EditDob" name="dob">
					</div>
					<div class="col-6">
						<label for="Edit_Education" class="form-label">Education</label><br>
						<select class="form-control edit_education" name="education" id="EditEducation" multiple style="width:100%;">
						</select>
					</div>
					<div class="col-6">
						<label for="inputModeOfContact" class="form-label">Mode Of Contact</label>
						<select id="mode_of_contact" class="form-select" name="mode_of_contact">
							<option selected>--- Select ---</option>
							<option>Email</option>
							<option>Phone</option>
						</select>
					</div>
					<div class="col-md-6">
						<label for="EditImage" class="form-label">Image</label>
						<input class="form-control" type="file" id="EditImage" name="image" placeholder="Image">
					</div>

					<div class="col-12">
						<button type="submit" class="btn btn-warning float-end">Update & Close</button>
					</div>
				</form>			
			</div>
		</div>
  	</div>
</div>

<!-- View Modal -->
<div class="modal fade" id="ViewClient" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="ViewClientLabel" aria-hidden="true">
  	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="ViewClientLabel">View Client</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form class="row g-3" method="get" action="{{route('client.update')}}" enctype="multipart/form-data">
					{{ csrf_field() }}
					<input type="hidden" name="id" id="id">
					<div class="col-md-6">
						<label for="ViewName" class="form-label">Name: <span id="vname" class="fw-bold"></span></label>
					</div>
					<div class="col-6">
						<label for="ViewGender" class="form-label">Gender: <span id="vgender" class="fw-bold"></span></label>
					</div>
					<div class="col-md-6">
						<label for="ViewPhone" class="form-label">Phone: <span id="vphone" class="fw-bold"></span></label>
					</div>
					<div class="col-md-6">
						<label for="ViewEmail" class="form-label">Email: <span id="vemail" class="fw-bold"></span></label>
					</div>
					<div class="col-md-6">
						<label for="ViewNationality" class="form-label">Nationality: <span id="vnationality" class="fw-bold"></span></label>
					</div>
					<div class="col-6">
						<label for="ViewDob" class="form-label">DOB: <span id="vdob" class="fw-bold"></span></label>
					</div>
					<div class="col-6">
						<label for="View_Education" class="form-label">Education: <span id="veducation" class="fw-bold"></span></label><br>
					</div>
					<div class="col-6">
						<label for="inputModeOfContact" class="form-label">Mode Of Contact: <span id="vmodeofcontact" class="fw-bold"></span></label>
					</div>
					<div class="col-md-6">
						<label for="ViewImage" class="form-label">Image:</label><br>
						<img id="vimage" width="25%"/>
					</div>
				</form>			
			</div>
		</div>
  	</div>
</div>

<div class="card shadow mx-4 my-3">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-success float-start text-center">{{ __('Client Details ') }}</h6>
        <button type="button" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#AddClient">
            Add Client
        </button>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered data-table" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="1%">S.N.</th>
                        <th>Name</th>
                        <th>Photo</th>
                        <th>Gender</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Nationality</th>
                        <th>DOB</th>
                        <th>Education</th>
                        <th>Mode of Contact</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
{{--@push('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" rel="stylesheet" />
@endpush
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>   
<script>
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
@endpush --}}