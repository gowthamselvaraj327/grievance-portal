<form wire:submit.prevent="authenticate" class="space-y-8">
    {{ $this->form }}

    <x-filament::button type="submit" form="authenticate" class="w-full">
        {{ __('filament::login.buttons.submit.label') }}
    </x-filament::button>
    <div>
        <center><h1><strong>Demo Purpose</strong></h1></center>
        <h2>Email : demo@cpluz.com</h2>
        <h2>Password : password</h2>
    </div>
</form>
