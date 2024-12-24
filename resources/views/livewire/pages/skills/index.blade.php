<div class="flex gap-8">
    <!-- Skills List (Left Side) -->
    <div class="w-1/2 bg-white shadow-lg rounded-lg p-6">
        <h2 class="text-2xl font-semibold text-gray-700 mb-4">Skills</h2>
        <ul class="space-y-4">
            @foreach($skills as $skill)
                <li class="flex justify-between items-center border-b pb-2">
                    <span>{{ $skill->name }}</span>
                    <div class="space-x-2">
                        <button wire:click="editSkill({{ $skill->id }})" class="text-blue-500">Edit</button>
                        <button wire:click="deleteSkill({{ $skill->id }})" class="text-red-500">Delete</button>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

    <!-- Skill Form (Right Side) -->
    <div class="w-1/2 bg-white shadow-lg rounded-lg p-6">
        <h2 class="text-2xl font-semibold text-gray-700 mb-4">
            {{ $editMode ? 'Edit Skill' : 'Add Skill' }}
        </h2>
        <form wire:submit.prevent="saveSkill" class="space-y-4">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Skill Name</label>
                <input type="text" wire:model="name" class="mt-2 block w-full p-3 border border-gray-300 rounded-md focus:ring-indigo-500 focus:outline-none" required>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="px-6 py-3 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                    {{ $editMode ? 'Update Skill' : 'Add Skill' }}
                </button>
            </div>
        </form>
    </div>
</div>
