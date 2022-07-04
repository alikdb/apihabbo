@include('includes.header')
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div>Furnis</div>
                        <div><a href="docs/badge">go api ></a></div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="b-side mt-3 d-flex justify-content-center w-100 flex-wrap gap-2">
                        @foreach ($furnis as $furni)
                            <div class="h-badge" data-bs-toggle="tooltip" data-bs-html="true" title="{{$furni->code}} <br> {{$furni->name}} <br> {{$furni->hotel}}">

                                <img src="https://images.habbo.com/dcr/hof_furni/{{ $furni->revision }}/{{ $furni->code }}_icon.png">

                            </div>
                        @endforeach
                    </div>
                    <div class="pagination mt-3 d-flex justify-content-center">

                        {!! $furnis->links() !!}
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
@include('includes.footer')
