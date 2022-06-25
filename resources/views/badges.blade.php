@include('includes.header')
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div>Badges</div>
                        <div><a href="docs/badge">go api ></a></div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="b-side mt-3">
                        @foreach ($badges as $badge)
                            <div class="h-badge" data-bs-toggle="tooltip" data-bs-html="true" title="{{$badge->code}} <br> {{$badge->name}} <br> {{$badge->hotel}}">

                                <img src="https://images.habbo.com/c_images/album1584/{{$badge->code}}.gif">

                            </div>
                        @endforeach
                    </div>
                    <div class="pagination mt-3 d-flex justify-content-center">

                        {!! $badges->links() !!}
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
@include('includes.footer')
