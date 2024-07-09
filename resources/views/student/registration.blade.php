@extends('layouts.app')

@section('content')
    <x-show-notification />
    <div class="flex justify-center items-center min-h-full md:px-2"
        style="background-color: #A9C9FF; background-image: linear-gradient(180deg, #dbe7fa 0%, #feeefa 100%);">
        <div class="container mx-auto bg-white shadow-md rounded md:my-2">
            <div class="logo-section text-center bg-blue-500 py-8 text-white">
                {{-- <img src="{{ asset('icons/login.png') }}" alt="logo" width="50rem" height="50rem"> --}}
                <h1 class="text-lg  uppercase font-bold underline">Student Registration</h1>
                <p class="text-md">Please fill the form carefully.</p>
                <p class="text-end text-md px-2 md:px-4">For any query call: <span class="font-bold">7002390253</span></p>
                <div class="text-left text-md px-2 md:px-4">
                    <p class="underline font-bold">Read carefully before filling out the form:</p>
                    <ul class="list-disc ps-3 text-justify">
                        <li>Read the form carefully to avoid any mistakes.</li>
                        <li>You cannot edit the form once it has been submitted.</li>
                        <li>All the fields with <span class="text-red-500 font-bold text-lg">*</span> marks are mandatory to
                            fill.</li>
                        <li>Once you register, you have to wait until the admin approves your profile.</li>
                        <li>You will receive a confirmation message once your profile is approved and you can login
                            successfully.</li>
                        <li>Your email will be considered the user ID.</li>
                        <li>A password will be sent to you once your profile is approved.</li>
                    </ul>
                </div>
            </div>
            <div class="main-content p-1 md:p-4">
                <form action="{{ route('student.registration') }}" method="POST" autocomplete="off">
                    @csrf
                    <div>
                        <p class="uppercase font-bold py-1 border ps-1 bg-blue-400 text-white">Personal Details</p>
                    </div>
                    <div class="flex flex-wrap justify-between text-sm">
                        <div class="w-[100%] md:w-[49.5%]">
                            <div class="mt-2 bg-slate-200">
                                <label class="px-1" for="name"><i
                                        class="fa fa-user me-2 text-blue-800"></i><strong>Full Name</strong><span
                                        class="font-bold text-lg ms-1 text-red-500">*</span></label>
                                <input class="w-full border rounded-sm p-1 outline-blue-100" type="name" name="name"
                                    id="name" placeholder="John Doe" value="{{ old('name') }}">
                            </div>
                            @error('name')
                                <p class="text-sm text-red-500">
                                    <i class="fa fa-warning mr-1"></i>
                                    {{ $message }}
                                </p>
                            @enderror
                            <div class="mt-2 bg-slate-200">
                                <label class="px-1" for="father_name"><i
                                        class="fa fa-user me-2 text-blue-800"></i><strong>Father Name</strong> <span
                                        class="font-bold text-lg ms-1 text-red-500">*</span></label>
                                <input class="w-full border rounded-sm p-1 outline-blue-100" type="father_name"
                                    name="father_name" id="father_name" placeholder="Steve Doe"
                                    value="{{ old('father_name') }}">
                            </div>
                            @error('father_name')
                                <p class="text-sm text-red-500">
                                    <i class="fa fa-warning mr-1"></i>
                                    {{ $message }}
                                </p>
                            @enderror
                            <div class="mt-2 bg-slate-200">
                                <label class="px-1" for="gender"><i
                                        class="fa fa-male me-2 text-blue-800"></i><strong>Gender</strong><span
                                        class="font-bold text-lg ms-1 text-red-500">*</span></label>
                                <select class="w-full border rounded-sm p-1 outline-blue-100" name="gender" id="gender">
                                    <option class="" value="" selected>Choose Gender</option>
                                    <option class="" value="male">Male</option>
                                    <option class="" value="female">Female</option>
                                    <option class="" value="other">Other</option>
                                </select>
                            </div>
                            @error('gender')
                                <p class="text-sm text-red-500">
                                    <i class="fa fa-warning mr-1"></i>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="w-[100%] md:w-[49.5%]">
                            <div class="mt-2 bg-slate-200">
                                <label class="px-1" for="mother_name"><i
                                        class="fa fa-user me-2 text-blue-800"></i><strong>Mother Name</strong><span
                                        class="font-bold text-lg ms-1 text-red-500">*</span></label>
                                <input class="w-full border rounded-sm p-1 outline-blue-100" type="mother_name"
                                    name="mother_name" id="mother_name" placeholder="Marry Doe"
                                    value="{{ old('mother_name') }}">
                            </div>
                            @error('mother_name')
                                <p class="text-sm text-red-500">
                                    <i class="fa fa-warning mr-1"></i>
                                    {{ $message }}
                                </p>
                            @enderror
                            <div class="mt-2 bg-slate-200">
                                <label class="px-1" for="dob"><i
                                        class="fa fa-calendar me-2 text-blue-800"></i><strong>Date of Birth</strong><span
                                        class="font-bold text-lg ms-1 text-red-500">*</span></label>
                                <input class="w-full border rounded-sm p-1 outline-blue-100" type="date" name="dob"
                                    id="dob" placeholder="Marry Doe" value="{{ old('dob') }}">

                            </div>
                            @error('dob')
                                <p class="text-sm text-red-500">
                                    <i class="fa fa-warning mr-1"></i>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-4">
                        <p class="uppercase font-bold py-1 border ps-1 bg-blue-400 text-white">Contact Details</p>
                    </div>
                    <div class="flex flex-wrap justify-between text-sm">
                        <div class="w-[100%] md:w-[49.5%]">
                            <div class="mt-2 bg-slate-200">
                                <label class="px-1" for="ph_number"><i
                                        class="fa fa-phone me-2 text-blue-800"></i><strong>Phone Number</strong><span
                                        class="font-bold text-lg ms-1 text-red-500">*</span></label>
                                <input class="w-full border rounded-sm p-1 outline-blue-100" maxlength="10" minlength="10"
                                    type="tel" name="ph_number" id="ph_number" pattern="[0-9]{10}"
                                    placeholder="xxxxxxxxxx" value="{{ old('ph_number') }}">
                            </div>
                            @error('ph_number')
                                <p class="text-sm text-red-500">
                                    <i class="fa fa-warning mr-1"></i>
                                    {{ $message }}
                                </p>
                            @enderror
                            <div class="mt-2 bg-slate-200">
                                <label class="px-1" for="email"><i
                                        class="fa fa-envelope me-2 text-blue-800"></i><strong>Email
                                        Address</strong><span class="font-bold text-lg ms-1 text-red-500">*</span></label>
                                <input class="w-full border rounded-sm p-1 outline-blue-100" type="email"
                                    name="email" id="email" placeholder="johndoe@gmail.com"
                                    value="{{ old('email') }}">
                            </div>
                            @error('email')
                                <p class="text-sm text-red-500">
                                    <i class="fa fa-warning mr-1"></i>
                                    {{ $message }}
                                </p>
                            @enderror
                            <div class="mt-2 bg-slate-200">
                                <label class="px-1" for="address"><i
                                        class="fa fa-home me-2 text-blue-800"></i><strong>Full Address
                                    </strong><span class="font-bold text-lg ms-1 text-red-500">*</span></label>
                                <textarea class="w-full border rounded-sm p-1 outline-blue-100" id="address" name="address"
                                    value="{{ old('address') }}" placeholder="Write your full address here..."></textarea>
                            </div>
                            @error('address')
                                <p class="text-sm text-red-500">
                                    <i class="fa fa-warning mr-1"></i>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="w-[100%] md:w-[49.5%]">
                            <div class="mt-2 bg-slate-200">
                                <label class="px-1" for="wp_number"><i class="fa fa-phone me-2 text-blue-800"
                                        aria-hidden="true"></i><strong>WhatsApp Number ( Optional ) </strong><span
                                        class="font-bold text-lg ms-1 text-red-500"></span></label>
                                <input class="w-full border rounded-sm p-1 outline-blue-100" maxlength="10"
                                    minlength="10" type="tel" name="wp_number" id="wp_number" pattern="[0-9]{10}"
                                    placeholder="xxxxxxxxxx" value="{{ old('wp_number') }}">
                            </div>
                            @error('wp_number')
                                <p class="text-sm text-red-500">
                                    <i class="fa fa-warning mr-1"></i>
                                    {{ $message }}
                                </p>
                            @enderror
                            <div class="mt-2 bg-slate-200">
                                <label class="px-1" for="alternative_email"><i
                                        class="fa fa-envelope me-2 text-blue-800"></i><strong>Alternate Email
                                        Address ( Optional )</strong><span
                                        class="font-bold text-lg ms-1 text-red-500"></span></label>
                                <input class="w-full border rounded-sm p-1 outline-blue-100" type="email"
                                    name="alternative_email" id="alternative_email" placeholder="johndoe@gmail.com"
                                    value="{{ old('alternative_email') }}">
                            </div>
                            @error('alternative_email')
                                <p class="text-sm text-red-500">
                                    <i class="fa fa-warning mr-1"></i>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-4">
                        <p class="uppercase font-bold py-1 border ps-1 bg-blue-400 text-white">Educational Information</p>
                    </div>
                    <div class="flex flex-wrap justify-between text-sm">
                        <div class="w-[100%] md:w-[49.5%]">
                            <div class="mt-2 bg-slate-200">
                                <label class="px-1" for="college"><i
                                        class="fa fa-home me-2 text-blue-800"></i><strong>School / College
                                        Name</strong><span class="font-bold text-lg ms-1 text-red-500">*</span></label>
                                <input class="w-full border rounded-sm p-1 outline-blue-100" type="text"
                                    name="college" id="college" placeholder="School / College Name"
                                    value="{{ old('college') }}">
                            </div>
                            @error('college')
                                <p class="text-sm text-red-500">
                                    <i class="fa fa-warning mr-1"></i>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="w-[100%] md:w-[49.5%]">
                            <div class="mt-2 bg-slate-200">
                                <label class="px-1" for="class"><i class="fa fa-book me-2 text-blue-800"
                                        aria-hidden="true"></i><strong>Class Name</strong><span
                                        class="font-bold text-lg ms-1 text-red-500">*</span>
                                </label>
                                <select class="w-full border rounded-sm p-1 outline-blue-100" name="class"
                                    id="class">
                                    <option value="" selected>Choose class</option>
                                    @foreach ($classes as $class)
                                        <option value="{{ $class->code }}">{{ $class->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('class')
                                <p class="text-sm text-red-500">
                                    <i class="fa fa-warning mr-1"></i>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-4">
                        <p class="uppercase font-bold py-1 border ps-1 bg-blue-400 text-white">Subject Details</p>
                        <div class="">
                            <label for="subjects" class="font-bold">Check the subject list you are interested in:<span
                                    class="font-bold text-lg ms-1 text-red-500">*</span></label>
                            <div class="flex gap-5">
                                <div class="flex flex-wrap gap-2">
                                    @foreach ($subjects as $subject)
                                        <div class="form-check">
                                            <input type="checkbox" name="subjects[]" value="{{ $subject->id }}"
                                                class="form-check-input">
                                            <label class="form-check-label">{{ $subject->name }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            @error('subjects')
                                <p class="text-sm text-red-500">
                                    <i class="fa fa-warning mr-1"></i>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-4">
                        <p class="uppercase font-bold py-1 border ps-1 bg-blue-400 text-white">Course Details</p>
                        <div class="">
                            <label for="courses" class="font-bold">Choose your course(s): <span
                                    class="font-bold text-lg ms-1 text-red-500">*</span></label>
                            <div class="flex gap-5">
                                <div class="flex flex-wrap gap-2">
                                    @foreach ($courses as $course)
                                        <div class="form-check">
                                            <input type="checkbox" name="courses[]" value="{{ $course->id }}"
                                                class="form-check-input">
                                            <label class="form-check-label">{{ $course->name }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            @error('courses')
                                <p class="text-sm text-red-500">
                                    <i class="fa fa-warning mr-1"></i>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-4">
                        <p class="uppercase font-bold py-1 border ps-1 bg-red-400 text-white">Create Password</p>
                    </div>
                    <p class="text-red-500"><span class="font-bold">Hint: </span>A password can be any character,
                        including digits, as well as a special character with a minimum length of 8.</p>
                    <div class="flex flex-wrap justify-between text-sm">
                        <div class="w-[100%] md:w-[49.5%]">
                            <div class="mt-2 bg-slate-200">
                                <label class="px-1" for="password"><i
                                        class="fa fa-key me-2 text-blue-800"></i><strong>Password:</strong><span
                                        class="font-bold text-lg ms-1 text-red-500">*</span></label>
                                <input class="w-full border rounded-sm p-1 outline-blue-100" type="password"
                                    name="password" id="password" placeholder="********">
                            </div>
                            @error('password')
                                <p class="text-sm text-red-500">
                                    <i class="fa fa-warning mr-1"></i>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="w-[100%] md:w-[49.5%]">
                            <div class="mt-2 bg-slate-200">
                                <label class="px-1" for="password_confirmation"><i
                                        class="fa fa-key me-2 text-blue-800"></i><strong>Confirm Password:</strong><span
                                        class="font-bold text-lg ms-1 text-red-500">*</span></label>
                                <input class="w-full border rounded-sm p-1 outline-blue-100" type="password"
                                    name="password_confirmation" id="password_confirmation" placeholder="********">
                            </div>
                            @error('password_confirmation')
                                <p class="text-sm text-red-500">
                                    <i class="fa fa-warning mr-1"></i>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>

                    <div class="my-2 text-red-500">
                        <p>
                            <span class="font-bold">Disclaimer: </span>
                            All your personal data will be protected and not shared with any other third-party application.
                        </p>
                    </div>

                    <div class="block md:flex md:gap-2 md:justify-end">
                        <div class="w-full md:w-[10rem] my-3">
                            <button class="w-full bg-blue-200 text-blue-700 rounded-sm py-2 hover:shadow-sm"
                                type="submit">
                                <i class="fa fa-sign-in"></i>
                                <span class="font-bold">Register</span>
                            </button>
                        </div>
                        <div class="w-full md:w-[10rem] my-3">
                            <a href="{{ route('login') }}"
                                class="w-full text-center block bg-red-200 text-red-700 rounded-sm py-2 hover:shadow-sm">
                                <i class="fa fa-backward"></i>
                                <span class="font-bold">Back to login</span>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
