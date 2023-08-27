@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <h3 class="text-center">Welcome Admin!</h3>
        <div class="col-md-12 mt-4">
            <div class="card">
                <div class="card-header">All Shortened URLs</div>

                <div class="card-body">
                <table class="table">
                        <thead>
                            <tr>
                            <th>#</th>
                            <th scope="col">Short URL</th>
                            <th scope="col">Long URL</th>
                            <th scope="col">User ID</th>
                            <th scope="col">Created At</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                        @php $srNo = 1 @endphp
                        @foreach ($shortenedURLs as $url)
                            <tr>
                                <td scope="row">{{ $srNo++ }}</td>
                                <td><a target="_blank" href="{{  url('') }}/{{ $url->shortened_url  }}">{{  url('') }}/{{ $url->shortened_url  }}</a></td>
                                <td>{{ $url->original_url }}</td>
                                <td>{{ $url->user_id }}</td>
                                <td>{{ $url->created_at }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
