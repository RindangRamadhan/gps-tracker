@extends('layouts.app')

@section('content')
  <div class="container-fluid">
    <div class="page-header">
      <div class="row align-items-end">
        <div class="col-lg-8">
          <div class="page-header-title">
            <i class="ik ik-server bg-inverse"></i>
            <div class="d-inline">
              <h5>@lang('admin.menu_titles.master_data') @lang('admin.menu_titles.categories')</h5>
              <span> @lang('admin.pages.edit_categories')</span>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <nav class="breadcrumb-container" aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="{{ url($locale.'/home') }}"><i class="ik ik-bar-chart-2"></i> @lang('admin.menu_titles.dashboard')</a>
              </li>
              <li class="breadcrumb-item">
                <a href="{{ url($locale.'/categories') }}">@lang('admin.menu_titles.categories')</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">@lang('admin.pages.form.edit') @lang('admin.menu_titles.categories')</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-body">            
            <form action="{{ url($locale.'/categories', $category->id) }}" method="post" enctype="multipart/form-data">
              @csrf
              {{ method_field('PATCH') }}
              @include('pages.categories.form')

              <div class="footer-buttons">
                <a 
                  data-toggle="tooltip" 
                  data-placement="top" 
                  title="{{ __('admin.pages.form.back') }}"
                  href="{{ url($locale.'/categories') }}" 
                  class="btn btn-icon btn-secondary">
                    <i class="ik ik-arrow-left"></i>
                </a>
                <button 
                  data-toggle="tooltip" 
                  data-placement="top" 
                  title="{{ __('admin.pages.form.save') }}"
                  type="submit" 
                  class="btn btn-icon btn-info">
                    <i class="ik ik-save"></i>
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection