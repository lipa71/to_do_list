<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{__('History of task')}}: {{ $taskName }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-100">
                    <x-table.table class="overflow-x-auto pb-9">
                        <x-slot name="head">
                            <x-table.heading>{{__('Field name')}}</x-table.heading>
                            <x-table.heading>{{__('Old value')}}</x-table.heading>
                            <x-table.heading>{{__('New value')}}</x-table.heading>
                            <x-table.heading>{{__('Date of change')}}</x-table.heading>
                        </x-slot>
                        <x-slot name="body">
                            @forelse ($taskHistoryList as $taskHistory)
                                <x-table.row>
                                    <x-table.cell>
                                        <div class="text-nowrap">
                                            {{ $taskHistory->column_name }}
                                        </div>
                                    </x-table.cell>
                                    <x-table.cell>
                                        <div class="text-break">
                                            {{ $taskHistory->old_value }}
                                        </div>
                                    </x-table.cell>
                                    <x-table.cell>
                                        <div class="text-break">
                                            {{ $taskHistory->new_value }}
                                        </div>
                                    </x-table.cell>
                                    <x-table.cell>
                                        <div class="text-nowrap">
                                            {{ $taskHistory->created_at }}
                                        </div>
                                    </x-table.cell>
                                </x-table.row>
                            @empty
                                <x-table.row>
                                    <x-table.cell colspan="100%">
                                        <div class="flex justify-center items-center space-x-2">
                                <span
                                    class="font-medium py-8 text-cool-gray-400 text-xl">{{ __('No history') }}</span>
                                        </div>
                                    </x-table.cell>
                                </x-table.row>
                            @endforelse
                        </x-slot>
                    </x-table.table>
                    <div>
                        {{ $taskHistoryList->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
