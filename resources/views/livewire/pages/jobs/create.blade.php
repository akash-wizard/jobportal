<div>
    <div class="container mx-auto py-8">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-semibold text-gray-800">Create New Job Posting</h1>
        </div>
        @if(session('success'))
        <div class="bg-green-100 text-green-700 border border-green-400 rounded-md p-4 mb-6">
            <strong>Success:</strong> {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger" >
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <form action="{{ route('admin.jobs.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
            @csrf
            <div class="flex gap-8">
                    <div class="w-full md:w-1/2 bg-white shadow-lg rounded-lg p-6 space-y-6">
                        <h2 class="text-2xl font-semibold text-gray-700">Job Details</h2>
                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium text-gray-700">Job Title</label>
                            <input type="text" id="title" name="title" class="mt-2 block w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-600" required>
                        </div>
                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700">Job Description</label>
                            <textarea id="description" name="description" rows="4" class="mt-2 block w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-600" required></textarea>
                        </div>
                        <div class="flex gap-8">
                            <div class="mb-4">
                                <label for="experiance" class="block text-sm font-medium text-gray-700">Experiance</label>
                                <input type="text" id="experiance" name="experiance" class="mt-2 block w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-600" placeholder="Eg 1-3 Yrs" required>
                            </div>
                            <div class="mb-4 w-full md:w-1/2">
                                <label for="salary" class="block text-sm font-medium text-gray-700">Salary</label>
                                <input type="number" id="salary" name="salary" class="mt-2 block w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-600" placeholder="Eg. 2.75 -5 lakh PA">
                            </div>
                    </div>
                    <div class="flex gap-8">
                        <div class="mb-4">
                                <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                                <input type="text" id="location" name="location" class="mt-2 block w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-600" placeholder="Eg. Remote/ Pune" required>
                        </div>

                        <div class="mb-4 w-full md:w-1/2">
                            <label for="extrainfo" class="block text-sm font-medium text-gray-700">Extra Info</label>
                            <input type="text" id="extrainfo" name="extrainfo" class="mt-2 block w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-600" placeholder="Eg. Full time,Urgent,/part Time ,Flexable" required>
                            <small>Please use comma seprated values</small>

                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/2 bg-white shadow-lg rounded-lg p-6 space-y-6">
                    <h2 class="text-2xl font-semibold text-gray-700">Company Details</h2>
                    <div class="mb-4">
                        <label for="company_name" class="block text-sm font-medium text-gray-700">Company Name</label>
                        <input type="text" id="company_name" name="company_name" class="mt-2 block w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-600" required>
                    </div>
                    <div class="mb-4 w-full md:w-1/2">
                        <label for="logo" class="block text-sm font-medium text-gray-700">Logo</label>
                        <input type="file" id="logo" name="logo" class="mt-2 block w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-600">
                    </div>
                    <div class="mb-4">
                        <label for="skills" class="block text-sm font-medium text-gray-700">Skills</label>
                        
                        <select id="skills" name="skills[]" class="mt-2 block w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-600" multiple>
                            @foreach($skills as $skill)
                                <option value="{{ $skill->id }}">{{ $skill->name }}</option>
                            @endforeach
                        </select>

                        <small>Hold Ctrl (or Cmd) to select multiple skills</small>
                    </div>
                    <!-- <div class="mb-4">
                        <label for="skills" class="block text-sm font-medium text-gray-700">Skills</label>
                        <textarea id="skills" name="skills" rows="4" class="mt-2 block w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-600" required></textarea>
                        <small>Please use comma seprated values</small>
                    </div> -->
                </div>
            </div>
            <div class="mt-8">
                <button type="submit" class="px-6 py-3 bg-blue-600 text-white text-lg rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">Save</button>
            </div>
        </form>
    </div>
</div>
