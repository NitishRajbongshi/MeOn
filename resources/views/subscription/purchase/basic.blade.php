@extends('layouts.app')

@section('content')
    @include('layouts.navbar')
    <div class="container mx-auto min-h-screen border bg-white p-1 md:p-4">
        <div class="container mx-auto rounded-lg bg-[#cdc2ac] p-1 md:p-4">
            <h1 class="font-bold text-3xl text-center uppercase text-white">Basic Plan</h1>
            <div class="flex flex-wrap justify-between rounded-lg p-1 md:m-10 md:p-10 items-start bg-stone-50 shadow-lg">
                <div class="w-full p-2 shadow-md rounded-md md:w-[35%] md:p-10">
                    <div class="text-md pb-2 font-bold text-blue-900 border-slate-200">
                        <h1 class="uppercase">
                            Payment
                        </h1>
                    </div>
                    <div>
                        <div class="mb-5">
                            <h1 class="text-xl font-bold"><span id="chapter_name">{{ $plan['chapter_name'] }}</span></h1>
                            <h1 class="text-md font-bold text-slate-400">Rs. <span
                                    id="chapter_price">{{ $plan['actual_price'] }}</span></h1>
                        </div>
                        <div class="border-t ">
                            <div class="flex justify-between my-2 font-bold">
                                <div class="w-1/2">Total Chapter</div>
                                <div class="w-1/2 text-right"><span id="">1</span></div>
                            </div>
                            <div class="flex justify-between my-2 font-bold">
                                <div class="w-1/2">Actual Price</div>
                                <div class="w-1/2 text-right">Rs. <span id="actual_price">
                                        {{ $plan['actual_price'] }}</span></div>
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
                                <div class="w-1/2 text-right">Rs. <span id="offer_price"> {{ $plan['offer_price'] }}</span>
                                </div>
                            </div>
                            <hr>
                            <div class="flex justify-between my-2 font-bold">
                                <div class="w-1/2">Total Amount</div>
                                <div class="w-1/2 text-right">Rs. <span id="total_amount"> {{ $plan['offer_price'] }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="flex justify-center my-2">
                            <img src="{{ asset('images/payment/payment_qr.png') }}" alt="QR_CODE" width="200px">
                        </div>
                        <p class="text-center"><span class="text-xl font-bold">ankurjyoti902-6@okicici</span></p>
                    </div>
                </div>
                <div class="w-full p-2 shadow-md rounded-md md:w-[62%] md:p-10">
                    <div class="text-md font-bold text-blue-900 border-slate-200">
                        <h1 class="uppercase">
                            Instruction
                        </h1>
                    </div>
                    <div class="my-5 ps-5">
                        <ul class="list-disc text-red-500">
                            <li>Scan the QR to pay.</li>
                            <li>Once payment is done, take a screenshot.</li>
                            <li>Upload the screenshot and confirm your order.</li>
                        </ul>
                    </div>

                    <div class="text-md font-bold text-blue-900 border-slate-200">
                        <h1 class="uppercase">
                            User Details
                        </h1>
                    </div>
                    <div class="my-5 bg-white p-2 rounded-sm">
                        <div class="flex flex-wrap px-1">
                            <div class="flex flex-wrap w-full md:w-1/2">
                                <div class="w-full md:w-1/3 font-bold">
                                    Name:
                                </div>
                                <div class="w-full md:w-2/3">
                                    {{ $user->name }}
                                </div>
                            </div>
                            <div class="flex flex-wrap w-full md:w-1/2">
                                <div class="w-full md:w-1/3 font-bold">
                                    Email:
                                </div>
                                <div class="w-full md:w-2/3">
                                    {{ $user->email }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-md pb-2 font-bold text-blue-900 border-slate-200">
                        <h1 class="uppercase">
                            Order Details
                        </h1>
                    </div>
                    <form
                        action="{{ URL::temporarySignedRoute('plan.store', now()->addMinutes(60), ['user' => Auth::user()->name, 'email' => Auth::user()->email]) }}"
                        method="post" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        <fieldset class="my-3">
                            <div class="md:flex">
                                <div class="w-full md:w-2/5">
                                    <label class="text-md font-bold" for="plan_code">Plan Type:<span
                                            class="text-xs text-red-500">*</span></label>
                                </div>
                                <div class="w-full md:w-3/5">
                                    <select name="plan_code" id="plan_code"
                                        class="border w-full rounded-sm outline-none p-1 text-md">
                                        <option value="{{ $plan['plan_code'] }}">Basic Plan</option>
                                    </select>
                                    @error('plan_code')
                                        <p class="text-xs text-red-500">
                                            <i class="fa fa-warning mr-1 my-1"></i>
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="md:flex my-4">
                                <div class="w-full md:w-2/5">
                                    <label class="text-md font-bold" for="class">Select Class:<span
                                            class="text-xs text-red-500">*</span></label>
                                </div>
                                <div class="w-full md:w-3/5">
                                    <select name="class" id="class"
                                        class="border w-full rounded-sm outline-none p-1 text-md">
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
                            <div class="md:flex my-4">
                                <div class="w-full md:w-2/5">
                                    <label class="text-md font-bold" for="subject">Select Subject:<span
                                            class="text-xs text-red-500">*</span></label>
                                </div>
                                <div class="w-full md:w-3/5">
                                    <select name="subject" id="subject"
                                        class="border w-full rounded-sm outline-none p-1 text-md">
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
                            <div class="md:flex my-4">
                                <div class="w-full md:w-2/5">
                                    <label class="text-md font-bold" for="chapter">Select Chapter:<span
                                            class="text-xs text-red-500">*</span></label>
                                </div>
                                <div class="w-full md:w-3/5">
                                    <select name="chapter" id="chapter"
                                        class="border w-full rounded-sm outline-none p-1 text-md">
                                        <option value="{{ $plan['chapter_code'] }}">{{ $plan['chapter_name'] }}</option>
                                    </select>
                                    <div>
                                        <p class="text-slate-500 text-[.8rem]">
                                            Description:
                                            {{ $plan['chapter_desc'] }}
                                        </p>
                                    </div>
                                    @error('chapter')
                                        <p class="text-xs text-red-500">
                                            <i class="fa fa-warning mr-1 my-1"></i>
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="md:flex my-4">
                                <div class="w-full md:w-2/5">
                                    <label class="text-md font-bold text-red-600" for="img_file">Upload Payment
                                        Receipt:<span class="text-xs text-red-500">*</span></label>
                                </div>
                                <div class="w-full md:w-3/5">
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
                                            Upload single/multiple images at once of type .jpg or .jpeg and size should less
                                            than
                                            5MB
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <p class="text-justify text-xs my-4">
                                <span class="text-red-500 font-bold ">Important: </span>
                                Choose the resources very carefully before purchase. The cart will show all the charges and
                                other prices.
                            </p>
                            <div class="flex justify-end">
                                <button class="uppercase my-5 text-white bg-red-600 px-2 py-1 rounded-sm text-lg font-bold"
                                    type="submit">
                                    <i class="fa fa-save mr-1"></i>
                                    Confirm Your Order
                                </button>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footer')
    @push('scripts')
        
    @endpush
@endsection
