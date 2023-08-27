@extends('layouts.app') 

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-5">
            <a href="{{ url('/home') }}" class="btn btn-primary">  Home </a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Shortened URL</div>

                <div class="card-body text-center">
                    <p>Your original URL has been shortened. Here is the shortened URL:</p>
                    <div class="border p-2 ">
                        <p><a href="{{ $shortenedUrl }}">{{ url('') }}/{{ $shortenedUrl }}</a></p>
                    </div>
                    <button id="copyButton" class="btn btn-primary mt-3">
                        <i class="bi bi-clipboard"></i> Copy
                    </button>
                </div>

                <script>
                    document.getElementById("copyButton").addEventListener("click", function() {
                        var shortenedUrl = "{{ url('') }}/{{ $shortenedUrl }}";
                        var tempInput = document.createElement("input");
                        tempInput.style = "position: absolute; left: -1000px; top: -1000px";
                        tempInput.value = shortenedUrl;
                        document.body.appendChild(tempInput);
                        tempInput.select();
                        document.execCommand("copy");
                        document.body.removeChild(tempInput);
                        alert("Shortened URL copied to clipboard: " + shortenedUrl);
                    });
                </script>

            </div>
        </div>
    </div>
</div>
@endsection

