@props(['options' => "{dateFormat:'Y-m-d', enableTime: false,
locale: {
firstDayOfWeek: 1,
weekdays: {
shorthand: ['Sun','Mon','Tues','Wed','Thurs','Fri','Sat'],
longhand: ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'],
},
months: {
shorthand: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'],
longhand: ['January','February','March','April','May','June','July','August','September','October','November','December'],
},
}}"])

<div wire:ignore class="relative rounded-md shadow-sm">
    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
        <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" clip-rule="evenodd"
                  d="M6 2C5.44772 2 5 2.44772 5 3V4H4C2.89543 4 2 4.89543 2 6V16C2 17.1046 2.89543 18 4 18H16C17.1046 18 18 17.1046 18 16V6C18 4.89543 17.1046 4 16 4H15V3C15 2.44772 14.5523 2 14 2C13.4477 2 13 2.44772 13 3V4H7V3C7 2.44772 6.55228 2 6 2ZM6 7C5.44772 7 5 7.44772 5 8C5 8.55228 5.44772 9 6 9H14C14.5523 9 15 8.55228 15 8C15 7.44772 14.5523 7 14 7H6Z"/>
        </svg>
    </div>
    <input
        x-data
        x-init="flatpickr($refs.input, {{ $options }} );"
        x-ref="input"
        type="text"
        data-input
        {{ $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm']) }}
    />
</div>

