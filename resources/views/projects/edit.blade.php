@extends('layouts.app', ['page' => __('Projects'), 'pageSlug' => 'projects'])

@section('content')
	<h1 class="title">Edit Project</h1>
<div class="card">
  <div class="card-body">
	<form method="POST" action="/projects/{{$project->id}}" style="margin-bottom: 1em;">


		{{method_field('PATCH')}}
		{{csrf_field()}}


		<div class="field">
			<label class="label" for="title">Name</label>


			<div class="control" style="margin-bottom: 1em;">
				<input type="text" class="form-control" name="title" placeholder="Title" value="{{$project->name}}">
			</div>
		</div>

		<div>
			<div>
				<button type="submit" class="btn btn-success btn-sm">Change Name</button>
			</div>

		</div>

		
	</form>
  </div>
</div>

		<div>
				<button type="button" class="btn btn-success btn-sm" ><a href= "/projects/{{$project->id}}/dScrums" style="color:white"><b>Create Daily Scrum</b></a></button>
		</div>

	<form method="POST" action="/projects/{{$project->id}}" >
		{{method_field('DELETE')}}
		{{csrf_field()}}
		<div>
			<div>
				<button type="submit" class="btn btn-danger btn-sm">Delete Project</button>
			</div>

		</div>
	</form>
@endsection 