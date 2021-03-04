<!DOCTYPE html>
<html>
@include('Include.css')
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    @include('Include.header')
    @include('Include.aside')
    <div class="content-wrapper">
        <section class="content">
            @yield('content')
        </section>
    </div>
    @include('Include.footer')
    <div class="control-sidebar-bg"></div>
</div>

@include('Include.js')
</body>
</html>
