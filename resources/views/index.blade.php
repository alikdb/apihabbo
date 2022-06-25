@include('includes.header')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">
                    welcome to apihabbo.com
                </div>
                <div class="card-body">
                    apihabbo.com is public api system
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card" id="badges">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <span>Badges</span>
                        <span><a href="#">All ></a></span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-center w-100 flex-wrap gap-2">
                    @foreach ($badges as $badge)
                        <div class="h-badge" data-bs-toggle="tooltip" data-bs-html="true" title="{{$badge->code}} <br> {{$badge->name}} <br> {{$badge->hotel}}">

                            <img src="https://images.habbo.com/c_images/album1584/{{$badge->code}}.gif">

                        </div>
                    @endforeach
                    </div>

                </div>
            </div>

            <div class="card mt-3" id="furnis">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <span>Furnis</span>
                        <span><a href="badges">All ></a></span>
                    </div>
                </div>
                <div class="card-body d-flex justify-content-center">
                    cooming soon!
                </div>
            </div>
        </div>

    </div>
</div>
@include('includes.footer')
