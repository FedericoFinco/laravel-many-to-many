@extends('layouts.admin')

@section('content')
<div class="container my-3">
    @php
        dump($project);
        dump($project->technologies[2])
    @endphp
    <h1>edit project</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="row g-4 py-4">
        <div class="col">
            <form action="{{ route('admin.projects.update', $project) }}" method="post" class="need-validation">
                @csrf
                @method("PUT")
            
                <label for="name">title</label>
                <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" value="{{ old("title") ?? $project->title}}">
                @error("title")
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror

                <label for="name">description</label>
                <input class="form-control @error('description') is-invalid @enderror" type="text" name="description" value="{{ old("description") ?? $project->description}}">
                @error("description")
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror

                <label for="name">img</label>
                <input class="form-control @error('img') is-invalid @enderror" type="text" name="img" value="{{ old("img") ?? $project->img}}">
                @error("thumb")
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror

                <label for="name">link_to_project</label>
                <input class="form-control @error('link_to_project') is-invalid @enderror" type="text" name="link_to_project" value="{{ old("link_to_project") ?? $project->link_to_project}}">
                @error("link_to_project")
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror

                {{-- <label for="name">series</label>
                <input class="form-control @error('series') is-invalid @enderror" type="text" name="series" value="{{ old("series") ?? $project->series}}">
                @error("series")
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror --}}

                {{-- <label for="name">sale_date</label>
                <input class="form-control @error('sale_date') is-invalid @enderror" type="text" name="sale_date" value="{{ old("sale_date") ?? $project->sale_date}}">
                @error("sale_date")
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror --}}

                {{-- <label for="inputType" class="form-label">technology</label>
                    <select name="technology" class="form-control @error('technology') is-invalid @enderror" id="inputType" multiple>
                        @foreach ($technologies as $technology)
                            <option @selected($project->technology == $technology) value="{{ $technology }}">{{ $technology->name }}</option>
                        @endforeach
                    </select> --}}

                    @foreach ($technologies as $i => $technology)
                        <div class="form-check">
                            <input type="checkbox" value="{{$technology->id}}"  name="technologies[]" id="tech{{$i}}" class="form-check-input" 
                            @if (old('technologies') && in_array($technology->id, old('technologies'))) checked

                            @elseif (!old('technologies') && $project->technologies->contains($technology))
                            checked @endif>
                            >
                            <label for="tech{{$i}}" class="form-check-label">{{$technology->name}}</label>

                            
                            {{-- @checked($project->technologies->contains($technology))
                                @if(is_array(old('technologies')) && in_array($technology->id, old('technologies'))) checked @endif funziona --}}


                            {{-- {{ in_array($technology->id, old('technology', $project->technologies->pluck('id')->toArray())) ? 'checked' : '' }} --}}
                        </div>
                    @endforeach



                <input class="form-control mt-4 btn btn-primary" type="submit" value="Invia">
            </form>
        </div>
    </div>
    {{-- <form id="deleteForm" action="{{ route('comics.destroy', $project) }}" method="post">
        @csrf
        @method('DELETE')
        <input onclick="confirmDelete()" class="btn btn-danger" type="submit" value="Cancella il prodotto">
    </form> --}}
    {{-- <script>
        function confirmDelete() {
            let r = confirm("Sei sicuro di cancellare?");
            if (r) {
                document.getElementById("deleteForm").submit();
            }
        }
    </script> --}}
    {{-- <script>
$("select").mousedown(function(e){
    e.preventDefault();

    var select = this;
    var scroll = select .scrollTop;

    e.target.selected = !e.target.selected;

    setTimeout(function(){select.scrollTop = scroll;}, 0);

    $(select ).focus();
}).mousemove(function(e){e.preventDefault()});
    </script> --}}
    
    

</div>
@endsection