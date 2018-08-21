  {{-- resources/views/admin/dashboard.blade.php --}}

  @extends('adminlte::page')

  @section('title', 'At A Glance')

  @section('content_header')
      <h1>Program At A Glance</h1>
  @stop

  @section('content')

    <div class="row">

      <iframe width="933" height="700" src="https://app.powerbi.com/view?r=eyJrIjoiNDg4YjliMDktZjcwZS00MWM1LWIxZTgtOWQyYzlkYWI5NzRlIiwidCI6IjhhN2M0YTZhLTYxNjAtNDFmNy05ZjI3LTViNmQwYmVmYTM4OSIsImMiOjF9" frameborder="0" allowFullScreen="true"></iframe>

    </div>


  @stop
