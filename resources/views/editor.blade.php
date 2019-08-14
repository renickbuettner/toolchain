@extends('layouts/master')

@section('title', 'Editor')

@section('body')

    <h1>Editor</h1>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <div class="form-group row">
        <label for="title" class="col-3 col-form-label">Title</label>
        <div class="col-9">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fa fa-adn"></i>
                    </div>
                </div>
                <input id="tctitle" name="title" placeholder="A title" type="text" class="form-control" required="required">
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
                <input id="tcurl" name="url" placeholder="A url" type="text" class="form-control" required="required">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-3 col-form-label" for="url">Category</label>
        <div class="col-9">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fa fa-object-ungroup"></i>
                    </div>
                </div>
                <input id="tccategory" name="category" placeholder="A category" type="text" class="form-control" required="required">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="description" class="col-3 col-form-label">Description</label>
        <div class="col-9">
            <textarea id="tcdescription" name="description" placeholder="What does it?" cols="40" rows="12" class="form-control" required="required"></textarea>
        </div>
    </div>
    <div class="form-group row">
        <div class="offset-3 col-9">
            <button id="tceditorsubmit" class="btn btn-primary">Submit</button>
            <button class="btn btn-secondary" onclick="window.history.back()">Zurück</button>
        </div>
    </div>

@endsection
