<?php

namespace App\Livewire\Pages\Jobs;

use Livewire\Component;
use App\Models\Skill;

class Create extends Component
{
    public $skills = [];
    public function mount()
    {
        $this->skills = Skill::all();
    }

    public function render()
    {
        // return view('livewire.pages.jobs.create');
        return view('livewire.pages.jobs.create', ['skill' => $this->skills]);
    }
}
