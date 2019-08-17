{{--
        Partials: A single service represented
 --}}

<section class="service col-12 col-md-4" data-id="{{$service->getSlug()}}">
    <div class="card mb-4">
        <div class="card-header">
            <h4 class="m-0">{{$service->getTitle()}}</h4>
        </div>
        <div class="card-body">
            <a href="{{$service->getInternalUrl()}}" class="btn btn-secondary">View details</a>
            <a href="{{$service->getUrl()}}" class="btn btn-primary" target="_blank">Open</a>
        </div>
    </div>
</section>
