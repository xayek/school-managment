<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MarkResource\Pages;
use App\Filament\Resources\MarkResource\RelationManagers;
use App\Models\Mark;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MarkResource extends Resource
{
    protected static ?string $model = Mark::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('student_id')
                    ->label('Student')
                    ->relationships(
                        name: 'student',
                        titleAttribute: 'name',
                        ModifyQuery: fn ($query) => $query->where('role_id', 3)
                    )
                    ->searchable()
                    ->preload()
                    ->required(),
                Select::make('exam_id')
                    ->label('Exam')
                    ->relationship(
                        name: 'exam',
                        titleAttribute: 'name',
                        modifyQueryUsing: fn ($query) => $query->orderByDesc('date')
                    )
                    ->getOptionLabelFromRecordUsing(fn ($record) => "{$record->date} - ({$record->name} - {$record->subject->name})")
                    ->searchable()
                    ->preload()
                    ->required(),

                TextInput::make('marks_obtained')
                    ->numeric()
                    ->required()
                    ->minValue(0)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('serial_no')->label('No.')->rowIndex(),
                TextColumn::make('student.name')->label('Student')->sortable()->searchable(),
                TextColumn::make('exam.name')->label('Exam')->sortable()->searchable(),
                TextColumn::make('exam.subject.name')->label('Subject')->sortable()->searchable(),
                TextColumn::make('marks_obtained')->label('Marks')->sortable(),
                TextColumn::make('created_at')->dateTime()->label('Created')
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
            'index' => Pages\ListMarks::route('/'),
            'create' => Pages\CreateMark::route('/create'),
            'edit' => Pages\EditMark::route('/{record}/edit'),
        ];
    }
}
