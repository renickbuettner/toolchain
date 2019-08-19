{{--
        Partials: A single service represented
 --}}

<section class="service col-12 col-md-4" data-id="{{$service->getSlug()}}">
    <div class="card mb-4 card-style">
        @if($service->getIcon() !== '')
        <img src="{{$service->getIcon()}}" class="img-thumbnail">
        @endif
        <div class="card-header">
            <h4 class="m-0">{{$service->getTitle()}}</h4>
        </div>
        <div class="card-body card-style">
            <div class="description-text">
                <span>{{$service->getDescription()}}</span>
            </div>
            <a href="{{$service->getInternalUrl()}}" class="btn btn-secondary">View details</a>
            <a href="{{$service->getUrl()}}" class="btn btn-primary" target="_blank">Open</a>
        </div>
    </div>
</section>
