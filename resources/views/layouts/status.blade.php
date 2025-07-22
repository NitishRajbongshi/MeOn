<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>EDORB</title>
    <style>
            .gradient-bg {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            }
        </style>
</head>

<body class="bg-slate-100">
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-r from-indigo-50 to-purple-50 p-4">
        <div class="w-full max-w-md bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="p-8 text-center">
                <!-- Status Icon -->
                <div class="flex justify-center mb-6">
                    @if ($status == 'Success')
                        <div class="w-20 h-20 rounded-full bg-green-100 flex items-center justify-center">
                            <i class="fas fa-check-circle text-green-600 text-4xl"></i>
                        </div>
                    @else
                        <div class="w-20 h-20 rounded-full bg-red-100 flex items-center justify-center">
                            <i class="fas fa-exclamation-triangle text-red-600 text-4xl"></i>
                        </div>
                    @endif
                </div>

                <!-- Status Message -->
                <h2 class="text-2xl font-bold mb-4 text-blue-600">
                    {{ $status }}!
                </h2>

                <div class="prose text-gray-600 mb-8">
                    <p class="mb-4">{{ $description }}</p>
                </div>

                <!-- Additional Info for Success -->
                @if ($status == 'Success')
                    <div class="bg-blue-50 p-4 rounded-lg mb-6 text-left">
                        <h4 class="font-medium text-blue-800 mb-2 flex items-center">
                            <i class="fas fa-lightbulb mr-2"></i> What's Next?
                        </h4>
                        <ul class="text-sm text-gray-700 space-y-2">
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-blue-500 mt-1 mr-2 text-xs"></i>
                                Check your email for verification link
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-blue-500 mt-1 mr-2 text-xs"></i>
                                Complete your profile after login
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-blue-500 mt-1 mr-2 text-xs"></i>
                                Explore our learning resources
                            </li>
                        </ul>
                    </div>
                @endif

                <!-- Action Buttons -->
                <div class="space-y-3">
                    <a href="/"
                        class="block gradient-bg text-white py-3 px-6 rounded-lg font-medium hover:opacity-90 transition duration-300">
                        <i class="fas fa-home mr-2"></i> Back to Home
                    </a>

                    @if ($status == 'Success')
                        <a href="{{ route('login') }}"
                            class="block border border-indigo-600 text-indigo-600 py-3 px-6 rounded-lg font-medium hover:bg-indigo-50 transition duration-300">
                            <i class="fas fa-sign-in-alt mr-2"></i> Go to Login
                        </a>
                    @endif
                </div>
            </div>

            <!-- Footer Note -->
            <div class="bg-gray-50 px-6 py-4 text-center">
                <p class="text-xs text-gray-500">
                    Need help? <a href="#" class="text-indigo-600 hover:text-indigo-800">Contact our support
                        team</a>
                </p>
            </div>
        </div>
    </div>
</body>

</html>
