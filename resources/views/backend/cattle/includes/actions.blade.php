
    @if ($logged_in_user->hasAllAccess())        
        <x-utils.edit-button :href="route('admin.cattle.edit', $cattle)" />
        <x-utils.delete-button :href="route('admin.cattle.destroy', $cattle)" />
    @endif



