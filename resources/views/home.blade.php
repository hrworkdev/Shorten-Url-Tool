@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Generate Shorten URL</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('shorten.url') }}" class="row">
                        @csrf
                        <div class="col-12">
                            <label for="original_url" class="col-md-4 col-form-label text-md-right pt-0">Enter Long URL:</label>
                        </div>
                        <div class="form-group col-sm-10">
                            <input id="original_url" type="url" class="form-control @error('original_url') is-invalid @enderror" name="original_url" value="{{ old('original_url') }}" required autofocus>

                            @error('original_url')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-sm-2">
                            <button type="submit" class="btn btn-primary d-block">  Shorten </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-12 mt-4">
            <div class="card">
                <div class="card-header">Your Shortened URLs</div>

                <div class="card-body">
                    @if ($shortenedUrls->isEmpty())
                        <p class="text-center">No URLs found</p>
                    @else
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Short URL</th>
                                <th scope="col">Views</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                            @php $srNo = 1 @endphp
                            @foreach ($shortenedUrls as $shortenedUrl)
                            <tr>
                                <th scope="row">{{ $srNo++ }}</th>
                                <td><a href="{{ route('redirect.to.original', ['shortenedUrl' => $shortenedUrl->shortened_url]) }}">{{  url('') }}/{{ $shortenedUrl->shortened_url }}</a>
                                </td>
                                <td><span class="badge bg-success"> Accessed time: {{ $shortenedUrl->clicks  }}</span></td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>

    </div>
</div>



@endsection

