@extends('layouts.admin')

	@section('content')
    <div class="container">
        <div class="row">
            @foreach ($projects as $project)
            <div class="col">
                    
                <div class="card" style="width: 18rem;">
                    <img src="{{$project->img}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$project->title}}</h5>
                        <p class="card-text">{{$project->description}}</p>
                        <a href="{{$project->link_to_project}}" class="btn btn-primary">Go somewhere</a>
                        <a class="btn btn-primary" href="{{ route('admin.projects.edit', $project) }}">modifichiaML</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
	@endsection

