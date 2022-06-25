@include('includes.header')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Badge API
                </div>
                <div class="card-body">
                    <div class="alert alert-info">
                        Our badge API allows you to quickly view all latest badges added to all 9 hotels.
                    </div>
                    <a href="{{ env('APP_URL') }}/api/badges">
                        {{ env('APP_URL') }}/api/badges
                    </a>
                    <div class="alert alert-info mt-3">
                        The follow request parameters are available:
                    </div>
                    <p>example: <a href="{{ env('APP_URL') }}/api/badges?per_page=20&name=habbolar&hotel=com.tr">{{ env('APP_URL') }}/api/badges?per_page=20&name=habbolar&hotel=com.tr</a></p>
                    <table class="table table-bordered mb-0">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Usage</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>code</td>
                            <td>Allows you to search via code.</td>
                        </tr>
                        <tr>
                            <td>name</td>
                            <td>Allows you to search via name.</td>
                        </tr>
                        <tr>
                            <td>hotel</td>
                            <td>You may specify a hotel to fetch badges from (default is all).<br><small class="text-muted">options: 'com', 'com.br', 'com.tr', 'it', 'nl', 'es', 'fi', 'de', 'fr' or 'all'.</small></td>
                        </tr>
                        <tr>
                            <td>per_page</td>
                            <td>Default limit is 50, max 100.</td>
                        </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <div class="col-md-4 mt-3">
            <div class="card">
                <div class="card-header">
                    Code Examples
                </div>
                <div class="card-body">
                    <span>
                        <a target="_blank" href="https://github.com/APIHabbo/apihabbo-examples/blob/main/badge.js">
                            JQuery example <small>(github)</small>
                        </a> <br>
                        <a target="_blank" href="https://github.com/APIHabbo/apihabbo-examples/blob/main/badge.php">
                            PHP example <small>(github)</small>
                        </a> <br>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
@include('includes.footer')
