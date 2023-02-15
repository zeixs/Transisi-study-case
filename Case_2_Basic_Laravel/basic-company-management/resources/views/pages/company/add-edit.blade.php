@extends('layouts.default', ['topMenu' => true, 'sidebarHide' => true])

@section('title', isset($data) ? 'Edit Company' : 'Create Company' )

@section('content')
<!-- begin breadcrumb -->
<ol class="breadcrumb float-xl-right">
  <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
  <li class="breadcrumb-item"><a href="javascript:;">Santri</a></li>
  <li class="breadcrumb-item active">@yield('title')</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">@yield('title')</h1>
<!-- end page-header -->


<!-- begin panel -->
<form action="{{ isset($data) ? route('company.update', $data->id) : route('company.store') }}" id="form" name="form" method="POST" data-parsley-validate="true">
  @csrf
  @if(isset($data))
  {{ method_field('PUT') }}
  @endif

  <div class="panel panel-inverse">
    <!-- begin panel-heading -->
    <div class="panel-heading">
      <h4 class="panel-title">Form @yield('title')</h4>
      <div class="panel-heading-btn">
        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
      </div>
    </div>
    <!-- end panel-heading -->
    <!-- begin panel-body -->
    <div class="panel-body">
      <div class="form-group">
        <label for="name">Company name</label>
        <input type="text" name="company_name" class="form-control" autofocus data-parsley-required="true" value="{{{ old('company_name') ?? $data->name ?? null }}}">
      </div>
      <div class="form-group">
        <label for="name">Email</label>
        <input type="text" name="company_email" class="form-control" autofocus data-parsley-required="true" value="{{{ old('company_email') ?? $data->email ?? null }}}">
      </div>
      <div class="form-group">
        <label for="name">Logo</label>
        <input type="text" name="company_logo" class="form-control" autofocus data-parsley-required="true" value="{{{ old('company_logo') ?? $data->logo ?? null }}}">
      </div>
      <div class="form-group">
        <label for="name">Website</label>
        <input type="text" name="company_website" class="form-control" autofocus data-parsley-required="true" value="{{{ old('company_website') ?? $data->website ?? null }}}">
      </div>
      </div>
    </div>
    <!-- end panel-body -->
    <!-- begin panel-footer -->
    <div class="panel-footer">
      <button type="submit" class="btn btn-primary">Simpan</button>
      <button type="reset" class="btn btn-default">Reset</button>
    </div>
    <!-- end panel-footer -->
  </div>
  <!-- end panel -->
</form>
<a href="javascript:history.back(-1);" class="btn btn-success">
  <i class="fa fa-arrow-circle-left"></i> Kembali
</a>

@endsection

@push('scripts')
<script src="{{ asset('/assets/js/custom/ajax-form-handler.js') }}"></script>
<script src="{{ asset('/assets/plugins/parsleyjs/dist/parsley.js') }}"></script>
@endpush