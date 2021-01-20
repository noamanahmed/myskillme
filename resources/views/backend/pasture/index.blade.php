@extends('backend.layouts.app')

@section('title', __('User Management'))

@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Pasture Management')
        </x-slot>

        @if ($logged_in_user->hasAllAccess())
            <x-slot name="headerActions">
                <x-utils.link
                    icon="c-icon cil-plus"
                    class="card-header-action"
                    :href="route('admin.pasture.create')"
                    :text="__('Create Pasture')"
                />
            </x-slot>
        @endif

        <x-slot name="body">
            <livewire:backend.pastures-table />
        </x-slot>
    </x-backend.card>
@endsection
