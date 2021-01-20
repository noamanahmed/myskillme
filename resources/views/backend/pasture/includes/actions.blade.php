
    @if ($logged_in_user->hasAllAccess())        
        <x-utils.edit-button :href="route('admin.pasture.edit', $pasture)" />
        <x-utils.delete-button :href="route('admin.pasture.destroy', $pasture)" />
    @endif



