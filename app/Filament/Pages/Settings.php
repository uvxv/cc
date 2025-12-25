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

    protected static ?int $navigationSort = 5;
    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-cog-6-tooth';
    protected string $view = 'filament.pages.settings';

    // Define a public property to hold the form data
    public ?array $data = [];

    public function mount(): void
    {
        // Fill the form with the current user's data
        $this->form->fill();
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
                    ->readonly()
                    ->email()
                    ->default(fn() =>  auth()->user()->email)
                    ->required(),
                TextInput::make('current_password')
                    ->password()
                    ->label('Current Password')
                    ->required(fn() => ! empty($this->data['new_password']))
                    ->revealable(),
                TextInput::make('new_password')
                    ->password()
                    ->label('New Password')
                    ->minLength(8)
                    ->revealable()
                    ->required(fn() => ! empty($this->data['new_password_confirmation'])),
                TextInput::make('new_password_confirmation')
                    ->password()
                    ->label('Confirm New Password')
                    ->revealable()
                    ->required(fn() => ! empty($this->data['new_password'])),

            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();

        
        if(isset($data['new_password']) && !empty($data['new_password'])) {
            // Validate current password
            if (! Hash::check($data['current_password'], auth()->user()->password)) {
                Notification::make()
                    ->danger()
                    ->title('Current password is incorrect')
                    ->send();

                return;
            }

            
            if ($data['new_password'] !== $data['new_password_confirmation']) {
                Notification::make()
                    ->danger()
                    ->title('New password and confirmation do not match')
                    ->send();

                return;
            }

            // Update password
            $data['password'] = Hash::make($data['new_password']);
        }
        
        unset($data['current_password'], $data['new_password'], $data['new_password_confirmation']);

        auth()->user()->update($data);

        Notification::make()
            ->success()
            ->title('Settings updated successfully')
            ->send();

        return;
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label('Save Changes')
                ->submit('save')
                , // Submits the form named 'save'
        ];
    }
}
