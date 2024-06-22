<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FaceResource\Pages;
use App\Filament\Resources\FaceResource\RelationManagers;
use App\Models\Face;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components;
use Filament\Resources\Resource;
use Filament\Support\Enums\FontWeight;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FaceResource extends Resource
{
    protected static ?string $model = Face::class;

    protected static ?string $navigationIcon = 'heroicon-o-face-smile';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')
                    ->label('Staff Name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\ImageColumn::make('name')->label('Photo')
                    ->getStateUsing(function ($record) {
                        return asset('faces/'. $record->name);
                    })->circular(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFaces::route('/'),
            'create' => Pages\CreateFace::route('/create'),
            'view' => Pages\ViewFace::route('/{record}'),
            'edit' => Pages\EditFace::route('/{record}/edit'),
        ];
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
//            ->schema([
//                Components\TextEntry::make('user.name')->label('Staff Name')
//                    ->icon('heroicon-m-user')
//                    ->iconColor('primary'),
//               Components\ImageEntry::make('name')->label('Photo')
//                ->getStateUsing(function ($record) {
//                    return asset('faces/'. $record->name);
//                })->size(300)->circular(),
//            ]);
            ->schema([
                Components\Section::make([
                    Components\ImageEntry::make('name')
                        ->label('')
                        ->getStateUsing(function ($record) {
                            return asset('faces/' . $record->name);
                        })
                        ->size(300)
                        ->circular()
                        ->extraAttributes(['class' => 'flex justify-center'])
                ]),
                Components\Section::make([
                    Components\TextEntry::make('user.name')
                        ->label('')
                        ->icon('heroicon-m-user')
                        ->iconColor('primary')
                        ->size(Components\TextEntry\TextEntrySize::Large)
                        ->weight(FontWeight::Bold)
                ])->extraAttributes(['class' => 'flex justify-center']),
            ]);
    }
}
