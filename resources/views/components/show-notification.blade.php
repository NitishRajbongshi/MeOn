@if (session()->has('success'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show"
        class="absolute top-2 right-2 bg-green-300 text-green-700 rounded-md">
        <p class="py-1 px-2"><i class="fa fa-check-circle mr-2"></i>{{ session('success') }}</p>
    </div>
@endif

@if (session()->has('failed'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show"
        class="absolute top-2 right-2 bg-red-300 text-red-700 rounded-md">
        <p class="py-1 px-2"><i class="fa fa-times-circle mr-2"></i>{{ session('failed') }}</p>
    </div>
@endif
