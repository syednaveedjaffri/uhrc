<?php

namespace App\Filament\Resources;

use Filament\Forms;
// use Filament\Tables;
use App\Models\Campus;
use App\Models\Faculty;
use App\Models\Employee;
use App\Models\Department;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
// use Tables\Actions\DeleteBulkAction;
use Filament\Forms\Components\Select;
// use Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ColorColumn;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Symfony\Component\Console\Input\Input;
use Filament\Tables\Columns\CheckboxColumn;
use Filament\Tables\Actions\DeleteBulkAction;
use Symfony\Contracts\Service\Attribute\Required;
use App\Filament\Resources\EmployeeResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\EmployeeResource\RelationManagers;
use App\Filament\Resources\EmployeeResource\Pages\EditEmployee;
use App\Filament\Resources\EmployeeResource\Pages\ListEmployees;
use App\Filament\Resources\EmployeeResource\Pages\CreateEmployee;

class EmployeeResource extends Resource
{
    protected static ?string $model = Employee::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationGroup = 'User Management';
    // protected static ?int $navigationSort = 9;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                ->schema([
                    Select::make('user_id')
                    ->relationship('user', 'name'),
                    // TextInput::make('designation'),

                    Select::make('campus_id')
                    // ->label('Campus')
                    ->options(Campus::all()->pluck('campus_name','id')->toArray())
                    ->required()
                    ->reactive()
                    ->afterStateUpdated(fn(callable $set) =>$set('faculty_id',null)),
                    Select::make('faculty_id')
                    // ->label('Faculty')
                    ->required()
                    ->options(function(callable $get)
                    {
                        $campus = Campus::find($get('campus_id'));
                        if(!$campus)
                        {
                            return Faculty::all()->pluck('faculty_name', 'id');
                        }
                        return $campus->faculties->pluck('faculty_name','id');
                    })
                    ->required()
                    ->reactive()
                    ->afterStateUpdated(fn(callable $set) =>$set('department_id',null)),
                    Select::make('department_id')
                    // ->label('Department')
                    ->required()
                    ->options(function(callable $get)
                    {
                        $faculty = Faculty::find($get('faculty_id'));
                        if(!$faculty)
                        {
                            return Department::all()->pluck('department_name', 'id');
                        }
                        return $faculty->departments->pluck('department_name','id');
                    })
                    //   ->reactive()
                    // ->afterStateUpdated(fn(callable $set)=>$set('department_id','id')),

                    // textInput::make('employee_name')->required(),
                    // textInput::make('designation')->required(),
                    // Select::make('employee_id')
                    // ->relationship('department','department_name')->required(),



                ])

                ]);


    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // ColorColumn::make('primary'),
                TextColumn::make('user.name')->label('User Name')->sortable()->searchable(),
                // ->color('primary')
                TextColumn::make('user.designation')->label('User Designation')->sortable()->searchable(),
                TextColumn::make('campus.campus_name')->label('Campus Name')->sortable()->searchable(),
                TextColumn::make('faculty.faculty_name')->label('Faculty Name')->sortable()->searchable(),
                TextColumn::make('department.department_name')->label('Department Name')->sortable()->searchable(),
                CheckboxColumn::make('is_admin'),
                // TextColumn::make('complains.complain_id')->hidden(),
            ])
            ->filters([
                // SelectFilter::make('department')
                // ->relationship('department','department_name')
            ])
            ->actions([
                EditAction::make(),
            ])
            ->bulkActions([
                DeleteBulkAction::make(),
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
            'index' => Pages\ListEmployees::route('/'),
            'create' => Pages\CreateEmployee::route('/create'),
            'edit' => Pages\EditEmployee::route('/{record}/edit'),
        ];
    }
}
