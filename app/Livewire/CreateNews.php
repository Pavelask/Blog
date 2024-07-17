<?php

namespace App\Livewire;

use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class CreateNews extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('TextInput')
                    ->maxLength(255)
                    ->columnSpanFull(),
                RichEditor::make('RichEditor')
                    ->label('RichEditor')
                    ->columnSpanFull(),
                MarkdownEditor::make('content')
                    ->label('MarkdownEditor')
                    ->columnSpanFull(),
                Textarea::make('description')
                    ->label('Textarea')
                    ->rows(7)
                    ->columnSpanFull(),
                TextInput::make('slug')
                    ->label('TextInput')
                    ->maxLength(255),
                TextInput::make('sort')
                    ->label('TextInput')
                    ->maxLength(255)
                    ->default(500),
                Toggle::make('is_visible')
                    ->label('OFF|ON')
                    ->onColor('red')
                    ->offColor('danger')
                    ->inline(false)
                    ->onIcon('heroicon-m-bolt')
                    ->offIcon('heroicon-m-user'),
            ])->columns(3)
            ->statePath('data');
    }

    public function create(): void
    {
        dd($this->form->getState());
    }

    public function render(): View

    {
        return view('livewire.create-news')->layout('layouts.news');
    }
}
