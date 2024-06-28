<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RoleResource\Pages;
use App\Filament\Resources\RoleResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Contracts\HasTable;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Spatie\Permission\Models\Role;


class RoleResource extends Resource
{
    protected static ?string $model = Role::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog';
    protected static ?string $navigationGroup = 'Settings';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    TextInput::make('name')
                    ->minLength(3)
                    ->maxLength(100)
                    ->required()
                    ->unique(ignoreRecord: true),
                    Select::make('permissions')
                    ->multiple()
                    ->relationship('permissions','name')->preload()
                        
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            TextColumn::make('No')->getStateUsing(
                static function($rowLoop, $livewire): string {
                
                    $recordsPerPage = $livewire->tableRecordsPerPage ?? $livewire->recordsPerPage ?? 10; // مقدار پیش‌فرض 10
                    
                    $currentPage = $livewire->page ?? 1; 
            
                    return (string)(
                        ($rowLoop->iteration) +
                        ($recordsPerPage * ($currentPage - 1))
                    );
                }
            ),
            TextColumn::make('name')->limit(50)->sortable()->searchable(),
        ])
            ->filters([
                //
            ])
            ->actions([
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
            'index' => Pages\ListRoles::route('/'),
            'create' => Pages\CreateRole::route('/create'),
            'edit' => Pages\EditRole::route('/{record}/edit'),
        ];
    }
}
