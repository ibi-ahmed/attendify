<?php

namespace App\Filament\Resources\FaceResource\Pages;

use App\Filament\Resources\FaceResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFace extends EditRecord
{
    protected static string $resource = FaceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
