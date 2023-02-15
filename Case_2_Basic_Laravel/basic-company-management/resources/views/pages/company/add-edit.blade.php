@extends('layouts.default', ['topMenu' => true, 'sidebarHide' => true])

@section('title', isset($data) ? 'Edit Invoice' : 'Create Invoice' )

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
<form action="{{ isset($data) ? route('admin.invoice.update', $data->id) : route('admin.invoice.store') }}" id="form" name="form" method="POST" data-parsley-validate="true">
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
      @if(isset($ponpes) != null)
        <div class="form-group">
          <label>Ponpes</label>
          <x-form.dropdown name="invoice_ponpes_id" :options="$ponpes" :selected="old('invoice_ponpes_id') ?? (isset($data->ponpes->id) ? $data->ponpes->id : null)"/>
          </div>
      @else
          <input type="hidden" name="invoice_ponpes_id" value="{{auth()->user()->load(['ponpes'])->ponpes->first()->id}}">
      @endif
      <div class="form-group">
        <label for="name">Kode</label>
        <input type="text" name="invoice_code" class="form-control" autofocus data-parsley-required="true" value="{{{ old('invoice_code') ?? $data->code ?? null }}}">
      </div>
      <div class="form-group">
        <label>Santri</label>
        <x-form.dropdown name="invoice_santri_id" :options="$santris" :selected="old('invoice_santri_id') ?? (isset($data->santri_id) ? $data->santri_id : null)"/>
      </div>
      <div class="form-group">
        <label>Produk</label>
        <x-form.dropdown name="invoice_products[]" :options="$products" :selected="old('invoice_products[]') ?? (isset($data->products) ? $data->products->pluck('id')->toArray() : null)" multiple/>
      </div>
      <div class="form-group">
        <label>
          Berulang Tiap Bulan
        </label>
        <input type="number" name="invoice_recurring" class="form-control" min="1" max="28" placeholder="berulang tiap tanggal 1 = isikan 1"autofocus data-parsley-required="false" value="{{{ old('invoice_recurring') ?? $data->recurring->day ?? null }}}">
        <small>
          *kosongkan bila hanya untuk sekali 
        </small>
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