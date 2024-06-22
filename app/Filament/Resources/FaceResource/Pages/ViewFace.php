<?php

namespace App\Filament\Resources\FaceResource\Pages;

use App\Filament\Resources\FaceResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewFace extends ViewRecord
{
    protected static string $resource = FaceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
