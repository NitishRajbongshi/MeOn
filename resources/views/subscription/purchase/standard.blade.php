@extends('layouts.app')

@section('content')
    @include('layouts.navbar')
    <div class="container mx-auto min-h-screen border bg-white p-4">
        <div class="flex flex-wrap justify-between items-start">
            <div class="w-full border rounded-md border-slate-200 my-2 p-2 md:w-[65%] md:p-2">
                <div class="text-sm pb-2 font-bold text-blue-900 border-b border-slate-200">
                    <i class="fa fa-info-circle mr-1"></i>
                    Choose chapter
                </div>
                <form
                    action="{{ URL::temporarySignedRoute('plan.store.standard', now()->addMinutes(60), ['user' => Auth::user()->name, 'email' => Auth::user()->email]) }}"
                    method="post" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    <fieldset class="my-3">
                        <div class="md:flex">
                            <div class="w-full md:w-1/3">
                                <label class="text-sm" for="plan_code">Plan Type:<span
                                        class="text-xs text-red-500">*</span></label>
                            </div>
                            <div class="w-full md:w-2/3">
                                <select name="plan_code" id="plan_code"
                                    class="border w-full border-blue-300 rounded-sm outline-none p-1 text-sm md:w-1/2">
                                    <option value="{{ $plan['plan_code'] }}">Standard Plan</option>
                                </select>
                                @error('plan_code')
                                    <p class="text-xs text-red-500">
                                        <i class="fa fa-warning mr-1 my-1"></i>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                        <div class="md:flex my-2">
                            <div class="w-full md:w-1/3">
                                <label class="text-sm" for="class">Select Class:<span
                                        class="text-xs text-red-500">*</span></label>
                            </div>
                            <div class="w-full md:w-2/3">
                                <select name="class" id="class"
                                    class="border w-full border-blue-300 rounded-sm outline-none p-1 text-sm md:w-1/2">
                                    <option value="{{ $plan['class_code'] }}">{{ $plan['class_name'] }}</option>
                                </select>
                                @error('class')
                                    <p class="text-xs text-red-500">
                                        <i class="fa fa-warning mr-1 my-1"></i>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                        <div class="md:flex my-2">
                            <div class="w-full md:w-1/3">
                                <label class="text-sm" for="subject">Select Subject:<span
                                        class="text-xs text-red-500">*</span></label>
                            </div>
                            <div class="w-full md:w-2/3">
                                <select name="subject" id="subject"
                                    class="border w-full border-blue-300 rounded-sm outline-none p-1 text-sm md:w-1/2">
                                    <option value="{{ $plan['subject_code'] }}">{{ $plan['subject_name'] }}</option>
                                </select>
                                @error('subject')
                                    <p class="text-xs text-red-500">
                                        <i class="fa fa-warning mr-1 my-1"></i>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                        <div class="md:flex my-2">
                            <div class="w-full md:w-1/3">
                                <label class="text-sm" for="img_file">Upload Payment Receipt:<span
                                        class="text-xs text-red-500">*</span></label>
                            </div>
                            <div class="w-full md:w-2/3">
                                <input type="file" name="img_file[]" id="img_file" accept=".jpg, .jpeg"
                                    class="w-full rounded-sm outline-none text-sm text-blue-300" multiple required>
                                @error('img_file')
                                    <p class="text-xs text-red-500">
                                        <i class="fa fa-warning mr-1 my-1"></i>
                                        {{ $message }}
                                    </p>
                                @enderror

                                <div>
                                    <p class="text-slate-500 text-[.8rem]">
                                        <i class="fa fa-warning mr-1 my-1"></i>
                                        Upload single/multiple images at once of type .jpg or .jpeg and size should less than
                                        5MB
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-end">
                            <button
                                class="border border-blue-300 text-blue-950 bg-blue-200 px-2 py-1 rounded-sm text-sm font-bold"
                                type="submit">
                                <i class="fa fa-save mr-1"></i>
                                Confirm Your Order
                            </button>
                        </div>
                    </fieldset>
                </form>
            </div>
            <div class="w-full border rounded-md border-slate-200 my-2 p-2 md:w-[34.5%] md:p-2">
                <div class="text-sm pb-2 font-bold text-blue-900 border-b border-slate-200">
                    <i class="fa fa-info-circle mr-1"></i>
                    Payment Info
                </div>
                <div>
                    <div class="flex justify-center">
                        <img src="{{ asset('images/payment/payment_qr.png') }}" alt="" width="220px">
                    </div>
                    <p class="text-center"><span class="text-xl font-bold">ankurjyoti902-6@okicici</span></p>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footer')
    @push('scripts')
        {{-- <script src="{{ asset('js/subscription/index.js') }}" defer></script> --}}
    @endpush
@endsection
