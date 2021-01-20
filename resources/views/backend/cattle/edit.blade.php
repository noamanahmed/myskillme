@inject('model', '\App\Models\Cattle')

@extends('backend.layouts.app')

@section('title', __('Update Cattle'))

@section('content')
    <x-forms.patch :action="route('admin.cattle.update', $cattle)">
        <x-backend.card>
            <x-slot name="header">
                @lang('Update Cattle')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.cattle.index')" :text="__('Cancel')" />
            </x-slot>

            
            <x-slot name="body">
                    <div class="form-group row">
                        <label for="age" class="col-md-2 col-form-label">@lang('Age')</label>

                        <div class="col-md-10">
                            <input type="text" name="age" class="form-control" placeholder="{{ __('Age') }}" value="{{ $cattle->age }}" maxlength="100" required />
                        </div>
                    </div><!--form-group-->                    
                    <div class="form-group row">
                            <label for="gender" class="col-md-2 col-form-label">@lang('Gender')</label>

                            <div class="col-md-10">
                                <select name="gender" class="form-control" required>                                
                                    <option value="male" @if($cattle->gender == 'male') selected @endif>Male</option>
                                    <option value="female"  @if($cattle->gender == 'female') selected @endif>Female</option>                                
                                </select>
                            </div>
                    </div><!--form-group-->                    
            
            
                    <div class="form-group row">
                        <label for="weight" class="col-md-2 col-form-label">@lang('Weight')</label>

                        <div class="col-md-10">
                            <input type="text" name="weight" class="form-control" placeholder="{{ __('Weight') }}" value="{{ $cattle->weight }}" maxlength="100" required />
                        </div>
                    </div><!--form-group-->                    
                    <div class="form-group row">
                        <label for="health" class="col-md-2 col-form-label">@lang('Health')</label>

                        <div class="col-md-10">
                            <input type="text" name="health" class="form-control" placeholder="{{ __('Health') }}" value="{{ $cattle->health }}" maxlength="100" required />
                        </div>
                    </div><!--form-group-->                    
                    <div class="form-group row">
                        <label for="color" class="col-md-2 col-form-label">@lang('Color')</label>

                        <div class="col-md-10">
                            <input type="text" name="color" class="form-control" placeholder="{{ __('Color') }}" value="{{ $cattle->color }}" maxlength="100" required />
                        </div>
                    </div><!--form-group-->                    
                    <div class="form-group row">
                        <label for="price" class="col-md-2 col-form-label">@lang('Price')</label>

                        <div class="col-md-10">
                            <input type="text" name="price" class="form-control" placeholder="{{ __('Price') }}" value="{{ $cattle->price }}" maxlength="100" required />
                        </div>
                    </div><!--form-group-->        
                    <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label">@lang('Pasture')</label>

                        <div class="col-md-10">
                            <select name="pasture_id" class="form-control" required>
                                @foreach($pastures as $key => $pasture)
                                <option value="{{ $key }}" @if($key === $cattle->pasture_id) selected @endif>{{ $pasture }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div><!--form-group-->
            
            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Update Cattle')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.patch>
@endsection
