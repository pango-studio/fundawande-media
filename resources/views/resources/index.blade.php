@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="m-0">Resources</h3>
                        <a href="{{url('/resources/create')}}" class="btn primary-btn-fill">Add resource</a>
                    </div>
                    <div class="card-body">
                        @if ($resources->count())
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Resource Name</th>
                                        <th scope="col">Size</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($resources as $resource)
                                    <tr>
                                        <td scope="row">{{ $loop->index }}</td>
                                        <td>{{ $resource->title }}</td>
                                        <td>{{ $resource->mime }}</td>
                                        <td>{{ $resource->filename }}</td>
                                        <td>{{ $resource->size }} Bytes</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Resource Actions">
                                                <form method="POST" action="/resources/{{$resource->id}}">
                                                    {{method_field('DELETE')}}
                                                    @csrf

                                                    <button class="btn btn-danger" type="submit">Delete</button>
                                                </form>
                                                <form method="GET" action="/resources/{{$resource->id}}">
                                                    @csrf

                                                    <button class="btn btn-info text-white" type="submit">Download</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            You have no resources yet!
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection