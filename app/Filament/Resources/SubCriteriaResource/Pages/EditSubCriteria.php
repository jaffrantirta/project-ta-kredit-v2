<?php

namespace App\Filament\Resources\SubCriteriaResource\Pages;

use App\Filament\Resources\SubCriteriaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSubCriteria extends EditRecord
{
    protected static string $resource = SubCriteriaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
