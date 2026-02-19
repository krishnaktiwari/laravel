@extends('layouts.frontend')

@section('content')
<header class="hero min-vh-80 d-flex align-items-center justify-content-center py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <form action="" method="GET">
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="input-group">
                                <input type="text" name="q" placeholder="Keyword ..." class="form-control" />
                                <button class="btn btn-primary">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</header>

@endsection