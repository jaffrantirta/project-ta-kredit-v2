<?php

namespace App\Filament\Resources\SubCriteriaResource\Pages;

use App\Filament\Resources\SubCriteriaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSubCriterias extends ListRecords
{
    protected static string $resource = SubCriteriaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
