<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EndtimeResource\Pages;
use App\Filament\Resources\EndtimeResource\RelationManagers;
use App\Models\Endtime;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Storage;

class EndtimeResource extends Resource
{
    protected static ?string $model = Endtime::class;
    protected static ?string $label = "End Times Videos";
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';



    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make()->schema([
                    TextInput::make('name')->autofocus()->required(),
                    Textarea::make('video_link')->required()->label('Upload Video'),
                    Select::make('category')->options([
                        'lesson1' => 'Lesson 1',
                        'lesson2' => 'Lesson 2',
                        'lesson3' => 'Lesson 3',
                        'lesson4' => 'Lesson 4',
                        'lesson5' => 'Lesson 5',
                        'lesson6' => 'Lesson 6',
                        'lesson7' => 'Lesson 7',
                        'lesson8' => 'Lesson 8',
                        'lesson9' => 'Lesson 9',
                        'lesson10' => 'Lesson 10',
                    ])->required(),
                    ])->columns(1)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->searchable()->sortable(),
                TextColumn::make('category')->searchable()->sortable(),
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
            'index' => Pages\ListEndtimes::route('/'),
            'create' => Pages\CreateEndtime::route('/create'),
            'edit' => Pages\EditEndtime::route('/{record}/edit'),
        ];
    }
}
