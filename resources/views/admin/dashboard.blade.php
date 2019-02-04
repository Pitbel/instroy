@extends('admin.wrapper')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @foreach($categories as $category)
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="content">
                        <div class="row">
                            <div class="col-xs-5">
                                <div class="icon-big icon-success text-center">
                                    <i class="ti-layout-sidebar-none"></i>
                                </div>
                            </div>
                            <div class="col-xs-7">
                                <div class="numbers">
                                    <p>{{ $category->name }}</p>
                                    {{ count($category->lands) }}
                                </div>
                            </div>
                        </div>
                        <div class="footer">
                            <hr />
                            <div class="stats">
                                <i class="ti-info-alt"></i> Количество участков в категории
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection

@section('scripts')
<script>
    $.notify({
        icon: 'ti-panel',
        message: welcomeMessage(new Date().getHours()) + ', добро пожаловать в панель администрации.',

    },{
        type: 'success',
        timer: 1000
    });
</script>
@endsection