@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }} ffs
                        </div>
                    @endif

                    You are logged in! redirect in 10 sec
                    <script> setTimeout(function(){window.location="{{ route('shares.index') }}"}, 10000); </script>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
