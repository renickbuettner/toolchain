@extends('layouts/master')

@section('title', 'Editor')

@section('body')

<section class="row m-0 ui">
    <div class="col-12 col-sm-12 col-md-12 col-lg-3 sidebar">
        <header>
            <h1>Toolchain</h1>
            <h5>Beat your toolchain mess</h5>
        </header>

        @include('partials.sidebar')
    </div>
    <div class="col-12 col-sm-12 col-md-12 col-lg-9 offset-lg-3">
        <h1>Editor</h1>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <form>
            <div class="form-group row">
                <label for="title" class="col-3 col-form-label">Title</label>
                <div class="col-9">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fa fa-adn"></i>
                            </div>
                        </div>
                        <input id="title" name="title" placeholder="A title" type="text" class="form-control" required="required">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-3 col-form-label" for="url">URL</label>
                <div class="col-9">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fa fa-link"></i>
                            </div>
                        </div>
                        <input id="url" name="url" placeholder="A url" type="text" class="form-control" required="required">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="description" class="col-3 col-form-label">Description</label>
                <div class="col-9">
                    <textarea id="description" name="description" placeholder="What does it?" cols="40" rows="12" class="form-control" required="required"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <div class="offset-3 col-9">
                    <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>

    </div>
</section>

@endsection
