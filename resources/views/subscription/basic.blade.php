@extends('layouts.app')

@section('content')
    @include('layouts.navbar')
    <div class="container mx-auto min-h-screen bg-white p-1 md:p-4">
        <div class="container mx-auto rounded-lg bg-[#cdc2ac] p-1 md:p-4">
            <h1 class="font-bold text-3xl text-center uppercase text-white">Basic Plan</h1>
            <div class="flex flex-wrap justify-between rounded-lg p-1 md:m-10 md:p-10 items-start bg-stone-50 shadow-lg">
                <div class="w-full p-2 shadow-md rounded-md md:w-[62%] md:p-10">
                    <div class="text-md uppercase pb-2 font-bold text-blue-900 border-slate-200">
                        <h1>
                            Choose chapter
                        </h1>
                        <p class="text-xs text-slate-400">Choose your prefered subject carefully.</p>
                    </div>
                    <form
                        action="{{ URL::temporarySignedRoute('plan.purchase', now()->addMinutes(60), ['user' => Auth::user()->name, 'email' => Auth::user()->email]) }}"
                        method="post" autocomplete="off">
                        @csrf
                        <fieldset class="my-3">
                            <input type="hidden" id="plan_input" name="plan_code" value="1">
                            <input type="hidden" id="actual_price_input" name="actual_price">
                            <input type="hidden" id="offer_price_input" name="offer_price">
                            <div class="md:flex">
                                <div class="w-full md:w-2/5">
                                    <label class="text-md font-bold" for="class">Select Class:<span
                                            class="text-xs text-red-500">*</span></label>
                                </div>
                                <div class="w-full md:w-3/5">
                                    <select name="class" id="class"
                                        class="border w-full rounded-sm outline-none p-1 text-md">
                                        <option value="">Choose one</option>
                                        @foreach ($classes as $class)
                                            <option value="{{ $class->id }}">
                                                {{ $class->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('class')
                                        <p class="text-xs text-red-500">
                                            <i class="fa fa-warning mr-1 my-1"></i>
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="md:flex my-4">
                                <div class="w-full md:w-2/5">
                                    <label class="text-md font-bold" for="subject">Select Subject:<span
                                            class="text-xs text-red-500">*</span></label>
                                </div>
                                <div class="w-full md:w-3/5">
                                    <select name="subject" id="subject"
                                        class="border w-full rounded-sm outline-none p-1 text-md">
                                        <option value="">Choose one</option>
                                    </select>
                                    @error('subject')
                                        <p class="text-xs text-red-500">
                                            <i class="fa fa-warning mr-1 my-1"></i>
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="md:flex my-4">
                                <div class="w-full md:w-2/5">
                                    <label class="text-md font-bold" for="chapter">Select Chapter:<span
                                            class="text-xs text-red-500">*</span></label>
                                </div>
                                <div class="w-full md:w-3/5">
                                    <select name="chapter" id="chapter"
                                        class="border w-full rounded-sm outline-none p-1 text-md">
                                        <option value="">Choose one</option>
                                    </select>
                                    @error('chapter')
                                        <p class="text-xs text-red-500">
                                            <i class="fa fa-warning mr-1 my-1"></i>
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <p class="text-justify text-xs my-2">
                                <span class="text-red-500 font-bold ">Important: </span>
                                Choose the resources very carefully before purchase. The cart will show all the charges and other prices.
                            </p>
                            <div class="flex justify-end">
                                <button
                                    class="uppercase my-2 text-white bg-red-600 px-2 py-1 rounded-sm text-lg font-bold"
                                    type="submit">
                                    <i class="fa fa-save mr-1"></i>
                                    Purchase Now
                                </button>
                            </div>
                        </fieldset>
                    </form>
                </div>
                <div class="w-full p-2 mt-2 md:mt-0 shadow-md rounded-md md:w-[35%] md:p-10">
                    <div class="text-md pb-2 font-bold text-blue-900 border-slate-200">
                        <h1 class="uppercase">
                            CART
                        </h1>
                    </div>
                    <div>
                        <div class="mb-5">
                            <h1 class="text-xl font-bold"><span id="chapter_name">Chapter Name</span></h1>
                            <h1 class="text-md font-bold text-slate-400">Rs. <span id="chapter_price">00.00</span></h1>
                        </div>
                        <div class="border-t ">
                            <div class="flex justify-between my-2 font-bold">
                                <div class="w-1/2">Total Chapter</div>
                                <div class="w-1/2 text-right"><span id="">1</span></div>
                            </div>
                            <div class="flex justify-between my-2 font-bold">
                                <div class="w-1/2">Actual Price</div>
                                <div class="w-1/2 text-right">Rs. <span id="actual_price"> 00.00</span></div>
                            </div>
                            <div class="flex justify-between my-2 font-bold">
                                <div class="w-1/2">Others</div>
                                <div class="w-1/2 text-right">Rs. <span id=""> 00.00</span></div>
                            </div>
                            <div class="flex justify-between my-2 font-bold">
                                <div class="w-1/2">Taxes</div>
                                <div class="w-1/2 text-right">Rs. <span id=""> 00.00</span></div>
                            </div>
                            <div class="flex justify-between my-2 font-bold">
                                <div class="w-1/2">Offer Price</div>
                                <div class="w-1/2 text-right">Rs. <span id="offer_price"> 00.00</span></div>
                            </div>
                            <hr>
                            <div class="flex justify-between my-2 font-bold">
                                <div class="w-1/2">Total Amount</div>
                                <div class="w-1/2 text-right">Rs. <span id="total_amount"> 00.00</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footer')
    @push('scripts')
        <script src="{{ asset('js/subscription/basic.js') }}" defer></script>
    @endpush
@endsection
