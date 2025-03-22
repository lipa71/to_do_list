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
    <input
        x-data
        x-init="flatpickr($refs.input, {{ $options }} );"
        x-ref="input"
        type="text"
        data-input
        {{ $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm']) }}
    />
</div>

