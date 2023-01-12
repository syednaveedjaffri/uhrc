<?php

namespace App\Filament\Resources;

use App\Models\Lab;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Select;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\LabResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\LabResource\RelationManagers;
use Filament\Forms\Components\TextInput;

class LabResource extends Resource
{
    protected static ?string $model = Lab::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?int $navigationSort = 6;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                ->schema([
                    // Select::make('campus_id')
                    //     ->relationship('campus','campus_name'),

                    // Select::make('user_id')
                    // ->relationship('user', 'name'),
                    // Select::make('campus_id')
                    //     ->relationship('campus','campus_name'),
                    // Select::make('faculty_id')
                    //     ->relationship('faculty','faculty_name'),
                    // Select::make('department_id')
                    //     ->relationship('department','department_name'),
                    //     Select::make('complain_id')
                    //     ->relationship('user','name'),
                    TextInput::make('user_id')->hidden(),
                    TextInput::make('campus_id')->hidden(),
                    TextInput::make('faculty_id')->hidden(),
                    TextInput::make('department_id')->hidden(),
                    TextInput::make('complain_id')->hidden(),
                    TextInput::make('extension')->hidden()
                        ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name'),
                TextColumn::make('campus.campus_name'),

                TextColumn::make('faculty.faculty_name')->sortable()->searchable(),
                TextColumn::make('department.department_name')->sortable()->searchable(),
                TextColumn::make('complain.complain_type')->sortable()->searchable(),
                TextColumn::make('department.extension')->sortable()
            ])
            ->filters([
                //
            ])
            ->actions([
                // auth()->id(),
                Tables\Actions\EditAction::make()

    //             ViewAction::make()
    //             ->mutateRecordDataUsing(function (array $data): array {
    //         $data['user_id'] = auth()->id();

    //         return $data;
    // })
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListLabs::route('/'),
            'create' => Pages\CreateLab::route('/create'),
            'edit' => Pages\EditLab::route('/{record}/edit'),
        ];
    }
}
