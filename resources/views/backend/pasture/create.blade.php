@inject('model', '\App\Models\Pasture')

@extends('backend.layouts.app')

@section('title', __('Create Pasture'))

@section('content')
    <x-forms.post :action="route('admin.pasture.store')">
        <x-backend.card>
            <x-slot name="header">
                @lang('Create Pasture')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.pasture.index')" :text="__('Cancel')" />
            </x-slot>

            <x-slot name="body">
                    <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label">@lang('Name')</label>

                        <div class="col-md-10">
                            <input type="text" name="name" class="form-control" placeholder="{{ __('Name') }}" value="{{ old('name') }}" maxlength="100" required />
                        </div>
                    </div><!--form-group-->                    
            
                    <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label">@lang('Grass Condition')</label>

                        <div class="col-md-10">
                            <input type="text" name="grass_condition" class="form-control" placeholder="{{ __('Grass Condition') }}" value="{{ old('grass_condition') }}" maxlength="100" required />
                        </div>
                    </div><!--form-group-->                    
                    <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label">@lang('Temperature')</label>

                        <div class="col-md-10">
                            <input type="text" name="temperature" class="form-control" placeholder="{{ __('Temperature') }}" value="{{ old('temperature') }}" maxlength="100" required />
                        </div>
                    </div><!--form-group-->                    
            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Create Pasture')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.post>
@endsection
