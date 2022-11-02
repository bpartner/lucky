<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Str;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        if (!$data['password']) {
            $data['password'] = bcrypt(Str::random());
        } else {
            $data['password'] = bcrypt($data['password']);
        }

        return $data;
    }

    protected function afterCreate(): void
    {
        event(new Registered($this->record));
    }
}
