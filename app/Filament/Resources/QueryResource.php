<?php

namespace App\Filament\Resources;

use Closure;
use Filament\Forms;
use Filament\Tables;
use App\Models\Query;
use App\Models\Campus;
use App\Models\Faculty;
use App\Models\Department;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ViewColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\ToggleColumn;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\DeleteBulkAction;
use App\Filament\Resources\QueryResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\QueryResource\Pages\EditQuery;
use App\Filament\Resources\QueryResource\RelationManagers;
use App\Filament\Resources\QueryResource\Pages\CreateQuery;
use App\Filament\Resources\QueryResource\Pages\ListQueries;

class QueryResource extends Resource
{
    protected static ?string $model = Query::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?int $navigationSort = 6;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                ->schema
                ([
                        // Select::make('employee_id')
                        //     ->relationship('user', 'employee_name'),
                    TextInput::make('username'),
                    // TextInput::make(auth()->id()),
                    Select::make('campus_id')->label('Campus Name')->placeholder('Select a Campus')
                    ->preload()
                    ->options(Campus::all()->pluck('campus_name','id')->toArray())
                    ->required()
                    ->reactive()

                    ->afterStateUpdated(fn(callable $set) =>$set('faculty_id',null)),

                    Select::make('faculty_id')->label('Faculty Name')->placeholder('Select a Faculty')

                    ->preload()
                    ->required()
                    ->reactive()

                    ->options(function(callable $get)

                    {
                        $campus = Campus::find($get('campus_id'));
                        if(!$campus)
                        {
                            return Faculty::all()->pluck('faculty_name', 'id');
                        }
                        return $campus->faculties->pluck('faculty_name','id');
                    })
                    // ->preload()
                    // ->required()
                    // ->reactive()
                    ->afterStateUpdated(fn(callable $set) =>$set('department_id',null)),
                    Select::make('department_id')->label('Department Name')

                    // ->reactive()
                    ->options(function(callable $get)
                    {
                        $faculty = Faculty::find($get('faculty_id'));
                        if(!$faculty)
                        {
                            return Department::all()->pluck('department_name', 'id');
                        }

                        return $faculty->departments->pluck('department_name','id');
                    }),
                    Select::make('complain_id')
                    ->relationship('complain','complain_type'),

                TextInput::make('status'),





                    //     Toggle::make('pending')
                    //     ->label('Resolved')
                    //    ->reactive()
                    //    ->requiredWith('status')
                    //    ->afterStateUpdated(
                    //     fn ($state, callable $set) => $state
                    //      ? $set('status', null) : $set('status', 'hidden')
                    //    ),

                    //    Toggle::make('status')
                    //    ->label('Status')
                    //    ->requiredWith('pending')

                    //    ->hidden(
                    //      fn (Closure $get): bool => $get('pending') == false
                    //     ),
                ]),


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('username')->label('Name'),
                TextColumn::make('faculty.faculty_name')->sortable()->searchable(),
                TextColumn::make('department.department_name')->sortable()->searchable(),
                TextColumn::make('complain.complain_type')->sortable()->searchable(),
                TextColumn::make('user.extension')->label('Extension')->sortable(),
                // TextColumn::make('pending')->disabled(),
                // TextColumn::make('status')->disabled()
                // ViewColumn::make('pending')->view('filament.tables.columns.pending'),


                ToggleColumn::make('status')



                // DatePicker::make('deleivered'),
                // Tables\Columns\IconColumn::make('pending')
                // ->options([

                    // 'heroicon-o-pencil' => 0,
                    // 'heroicon-o-clock' => 1
        //             'heroicon-o-pencil' => fn ($pending): bool => $pending === '0',
        // 'heroicon-o-clock' => fn ($pending): bool => $pending === '1',
                // ])
                // ->boolean()
                // ->trueIcon('heroicon-o-badge-check')
                // ->falseIcon('heroicon-o-x-circle')
                // ->trueColor('green')
                // ->falseColor('warning')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListQueries::route('/'),
            'create' => Pages\CreateQuery::route('/create'),
            'edit' => Pages\EditQuery::route('/{record}/edit'),
        ];
    }
}
