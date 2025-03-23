<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ $taskModel->name }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-200">
                    <div class="flex justify-between">
                        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
                            {{__('Priority')}}:
                            {{ $taskModel->priorityDescription() }}
                        </h2>
                        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
                            {{__('State')}}:
                            {{ $taskModel->stateDescription() }}
                        </h2>
                        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
                            {{__('Deadline')}}:
                            {{ $taskModel->deadline }}
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <h2 class="pt-6 px-6 font-semibold text-xl text-gray-200 leading-tight">
                {{__('Description')}}:
            </h2>
            <div class="p-6 text-gray-200">
                {!! $taskModel->description !!}
            </div>
        </div>
    </div>
</div>
