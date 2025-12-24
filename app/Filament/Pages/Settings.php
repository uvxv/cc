<?php

namespace App\Filament\Pages;

use BackedEnum;
use Filament\Forms;
use Filament\Pages\Page;
use Filament\Actions\Action;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Hash;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Forms\Concerns\InteractsWithForms;

class Settings extends Page implements HasForms
{
    use InteractsWithForms;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-cog-6-tooth';
    protected string $view = 'filament.pages.settings';

    // Define a public property to hold the form data
    public ?array $data = [];

    public function mount(): void
    {
        // Fill the form with the current user's data
        $this->form->fill(auth()->user()->attributesToArray());
    }

    public function form(Schema $form): Schema
    {
        return $form
            ->schema([
                TextInput::make('first_name')
                    ->required()
                    ->default(fn() => auth()->user()->first_name),
                TextInput::make('last_name')
                    ->required()
                    ->default(fn() =>  auth()->user()->last_name),
                TextInput::make('email')
                    ->email()
                    ->default(fn() =>  auth()->user()->email)
                    ->required(),
                TextInput::make('current_password')
                    ->password()
                    ->label('Current Password')
                    ->dehydrated(false),
                TextInput::make('new_password')
                    ->password()
                    ->label('New Password')
                    ->minLength(8)
                    ->dehydrated(false),
                TextInput::make('new_password_confirmation')
                    ->password()
                    ->label('Confirm New Password')
                    ->dehydrated(false),

            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();

        // Handle password change if provided
        if (! empty($data['new_password'])) {
            if (empty($data['current_password']) || ! Hash::check($data['current_password'], auth()->user()->password)) {
                Notification::make()
                    ->danger()
                    ->title('Current password is incorrect')
                    ->send();

                return;
            }

            if (($data['new_password'] ?? '') !== ($data['new_password_confirmation'] ?? '')) {
                Notification::make()
                    ->danger()
                    ->title('New password confirmation does not match')
                    ->send();

                return;
            }

            $data['password'] = Hash::make($data['new_password']);
        }

        // Remove password-only fields from data before mass-assignment
        unset($data['current_password'], $data['new_password'], $data['new_password_confirmation']);

        // Update the currently logged-in user
        auth()->user()->update($data);

        Notification::make()
            ->success()
            ->title('Settings updated successfully')
            ->send();
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label('Save Changes')
                ->submit('save'), // Submits the form named 'save'
        ];
    }
}
