@extends('layouts.app')

@section('content')
    @include('layouts.navbar')
    <div class="container mx-auto min-h-screen">
        <h1>Premium Plan</h1>
        <div class="flex flex-wrap justify-between items-start">
            <div class="w-full border rounded-md border-slate-200 my-2 p-2 md:w-[65%] md:p-2">
                <div class="text-sm pb-2 font-bold text-blue-900 border-b border-slate-200">
                    <i class="fa fa-info-circle mr-1"></i>
                    Choose chapter
                </div>
                <form
                    action="{{ URL::temporarySignedRoute('plan.purchase.premium', now()->addMinutes(60), ['user' => Auth::user()->name, 'email' => Auth::user()->email]) }}"
                    method="post" autocomplete="off">
                    @csrf
                    <fieldset class="my-3">
                        <input type="hidden" id="plan_input" name="plan_code" value="3">
                        <input type="hidden" id="actual_price_input" name="actual_price">
                        <input type="hidden" id="offer_price_input" name="offer_price">
                        <div class="md:flex">
                            <div class="w-full md:w-1/3">
                                <label class="text-sm" for="class">Select Class:<span
                                        class="text-xs text-red-500">*</span></label>
                            </div>
                            <div class="w-full md:w-2/3">
                                <select name="class" id="class"
                                    class="border w-full border-blue-300 rounded-sm outline-none p-1 text-sm md:w-1/2">
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
                        <div class="flex justify-end">
                            <button
                                class="border border-blue-300 text-blue-950 bg-blue-200 px-2 py-1 rounded-sm text-sm font-bold"
                                type="submit">
                                <i class="fa fa-save mr-1"></i>
                                Purchase Now
                            </button>
                        </div>
                    </fieldset>
                </form>
            </div>
            <div class="w-full border rounded-md border-slate-200 my-2 p-2 md:w-[34.5%] md:p-2">
                <div class="text-sm pb-2 font-bold text-blue-900 border-b border-slate-200">
                    <i class="fa fa-info-circle mr-1"></i>
                    Basic Info
                </div>
                <div>
                    <h1>Class Name: <span id="class_name">NULL</span></h1>
                    <h1>Descrption: <span id="class_description">NULL</span></h1>
                    <div>
                        <h1>Actual Price
                            <span id="actual_price">$ 00.00</span>
                        </h1>
                        <h1>Offer Price
                            <span id="offer_price">$ 00.00</span>
                        </h1>
                        <hr>
                        <h1>Total Amount
                            <span id="total_amount">$ 00.00</span>
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footer')
    @push('scripts')
        <script src="{{ asset('js/subscription/premium.js') }}" defer></script>
    @endpush
@endsection
