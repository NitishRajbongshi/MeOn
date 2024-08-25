@if (session()->has('success'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show"
        class="absolute top-2 right-2 border border-green-300 bg-green-200 text-green-900 rounded-md z-10">
        <p class="py-2 px-3"><i class="fa fa-check-circle mr-2"></i>{{ session('success') }}</p>
    </div>
@endif

@if (session()->has('failed'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show"
        class="absolute top-3 right-2 border border-red-500 bg-red-200 text-red-800 rounded-md z-10">
        <p class="py-2 px-3"><i class="fa fa-times-circle mr-2"></i>{{ session('failed') }}</p>
    </div>
@endif
