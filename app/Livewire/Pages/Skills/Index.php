<?php

namespace App\Livewire\Pages\Skills;

use Livewire\Component;
use App\Models\Skill;

class Index extends Component
{
    public $skills = [];
    public $name;
    public $editMode = false;
    public $skillId;


    public function mount()
    {
        $this->loadSkills();
    }

    public function loadSkills()
    {
        $this->skills = Skill::all();
    }
    public function saveSkill()
    {
        $this->validate([
            'name' => 'required|string|max:255',
        ]);

        if ($this->editMode) {
            Skill::find($this->skillId)->update([
                'name' => $this->name,
            ]);
            $this->editMode = false;
        } else {
            Skill::create(['name' => $this->name]);
        }

        $this->resetForm();
        $this->loadSkills();
    }
    public function editSkill($id)
    {
        $skill = Skill::find($id);
        $this->name = $skill->name;
        $this->skillId = $skill->id;
        $this->editMode = true;
    }

    public function deleteSkill($id)
    {
        Skill::find($id)->delete();
        $this->loadSkills();
    }
    public function resetForm()
    {
        $this->name = '';
        $this->skillId = null;
        $this->editMode = false;
    }

    public function render()
    {
        return view('livewire.pages.skills.index');
    }
}
