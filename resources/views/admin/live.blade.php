@include('admin.layouts.header')
@include('admin.layouts.navbar')
@include('admin.layouts.menu')
@include('admin.layouts.messages')

{{ $slot }}

@include('admin.layouts.footer')
