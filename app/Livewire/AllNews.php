<?php

namespace App\Livewire;

use App\Models\NewsModel;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Livewire\Component;


class AllNews extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(NewsModel::query())
            ->columns([
                TextColumn::make('name')
                ->wrap()
                ->width('25%'),
                TextColumn::make('description')
                ->wrap()
                ->width('55%'),
                TextColumn::make('slug'),
            ])
            ->filters([
                // ...
            ])
            ->actions([
                Action::make('edit')
                    ->url(fn (NewsModel $record): string => route('edit_news', $record))
                    ->openUrlInNewTab()
            ])
            ->bulkActions([
                // ...
            ]);
    }

    public function render()
    {
        return view('livewire.all-news')->layout('layouts.news');
    }
}
