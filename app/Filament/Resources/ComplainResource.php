<?php

namespace App\Filament\Resources;

// use Filament\Forms;
// use Filament\Tables;
use App\Models\Complain;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Select;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\DeleteAction;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\DeleteBulkAction;
use Illuminate\Contracts\Auth\Authenticatable;
use App\Filament\Resources\ComplainResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ComplainResource\RelationManagers;
use App\Filament\Resources\ComplainResource\RelationManagers\EmployeeRelationManager;
use Filament\Tables\Columns\ToggleColumn;

class ComplainResource extends Resource
{
    protected static ?string $model = Complain::class;

    protected static ?string $navigationIcon = 'heroicon-o-annotation';
    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                ->schema([
                    // Select::make('employee_id')
                    //     ->relationship('complain','employee_name'),

                    // ->createOptionForm([
                        TextInput::make('complain_type')

                        ->required(),





                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // TextColumn::make('complain.employee_name')->label('Employee Name')->sortable()->searchable(),
                TextColumn::make('complain_type')->sortable()->searchable(),
                // TextColumn::make('complain.extension')->label('Extension'),

                // ToggleColumn::make('complains.status')->label('status')

            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
                // ViewAction::make(),
            ])
            ->bulkActions([
                DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [

        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListComplains::route('/'),
            'create' => Pages\CreateComplain::route('/create'),
            'edit' => Pages\EditComplain::route('/{record}/edit'),
        ];
    }
}
