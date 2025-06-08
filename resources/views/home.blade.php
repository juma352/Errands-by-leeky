<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Errands Pro - Modern Task Management</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />
    
    <style>
        .font-sans { font-family: 'Inter', sans-serif; }
        .hero-gradient { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
        .glass-effect { backdrop-filter: blur(20px); background: rgba(255, 255, 255, 0.1); }
    </style>
</head>
<body class="font-sans antialiased">
    <!-- Hero Section -->
    <div class="relative min-h-screen bg-gradient-to-br from-blue-600 via-purple-600 to-indigo-800 overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.05"%3E%3Ccircle cx="30" cy="30" r="2"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-20"></div>
        
        <!-- Navigation -->
        <nav class="relative z-10 bg-white/10 backdrop-blur-md border-b border-white/20">
            <div class="container mx-auto px-4 py-4">
                <div class="flex justify-between items-center">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-white/20 backdrop-blur-md rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                            </svg>
                        </div>
                        <span class="text-2xl font-bold text-white">Errands Pro</span>
                    </div>
                    
                    <div class="flex items-center space-x-4">
                        <a href="{{ route('login') }}" class="text-white/90 hover:text-white transition-colors px-4 py-2 rounded-lg hover:bg-white/10">
                            Sign In
                        </a>
                        <a href="{{ route('auth.create') }}" class="bg-white text-blue-600 px-6 py-2 rounded-lg font-semibold hover:bg-gray-100 transition-all duration-200 shadow-lg hover:shadow-xl">
                            Get Started
                        </a>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Hero Content -->
        <div class="relative z-10 container mx-auto px-4 py-20">
            <div class="text-center max-w-4xl mx-auto">
                <h1 class="text-5xl md:text-7xl font-bold text-white mb-8 leading-tight">
                    Simplify Your Life with
                    <span class="bg-gradient-to-r from-yellow-400 to-orange-500 bg-clip-text text-transparent">
                        Smart Errands
                    </span>
                </h1>
                
                <p class="text-xl md:text-2xl text-white/90 mb-12 leading-relaxed">
                    Connect with trusted errand runners for all your daily tasks. From grocery shopping to document delivery, 
                    we've got you covered with our modern, efficient platform.
                </p>
                
                <div class="flex flex-col sm:flex-row gap-4 justify-center mb-16">
                    <a href="{{ route('auth.create') }}" class="bg-white text-blue-600 px-8 py-4 rounded-xl font-semibold text-lg hover:bg-gray-100 transition-all duration-200 shadow-xl hover:shadow-2xl transform hover:-translate-y-1">
                        Start Your Journey
                    </a>
                    <a href="{{ route('errands.index') }}" class="bg-white/20 backdrop-blur-md text-white px-8 py-4 rounded-xl font-semibold text-lg hover:bg-white/30 transition-all duration-200 border border-white/30">
                        Browse Errands
                    </a>
                </div>

                <!-- Stats -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-3xl mx-auto">
                    <div class="text-center">
                        <div class="text-4xl font-bold text-white mb-2">1000+</div>
                        <div class="text-white/80">Completed Errands</div>
                    </div>
                    <div class="text-center">
                        <div class="text-4xl font-bold text-white mb-2">500+</div>
                        <div class="text-white/80">Trusted Runners</div>
                    </div>
                    <div class="text-center">
                        <div class="text-4xl font-bold text-white mb-2">98%</div>
                        <div class="text-white/80">Satisfaction Rate</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Floating Elements -->
        <div class="absolute top-20 left-10 w-20 h-20 bg-white/10 rounded-full blur-xl animate-pulse"></div>
        <div class="absolute top-40 right-20 w-32 h-32 bg-yellow-400/20 rounded-full blur-xl animate-pulse delay-1000"></div>
        <div class="absolute bottom-20 left-1/4 w-16 h-16 bg-purple-400/20 rounded-full blur-xl animate-pulse delay-500"></div>
    </div>

    <!-- Services Section -->
    <section class="py-20 bg-gradient-to-br from-slate-50 to-blue-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Our Services</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    From basic errands to specialized services, we handle it all with professionalism and care.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Basic Errands -->
                <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-8 shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border border-white/20">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Basic Errands</h3>
                    <p class="text-gray-600 mb-6">Handle your everyday tasks with ease. Perfect for busy professionals and families.</p>
                    <ul class="space-y-3 text-gray-700">
                        <li class="flex items-center space-x-3">
                            <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Grocery shopping</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Dry cleaning pickup</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Post office runs</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Prescription refills</span>
                        </li>
                    </ul>
                </div>

                <!-- Specialized Errands -->
                <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-8 shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border border-white/20">
                    <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Specialized Errands</h3>
                    <p class="text-gray-600 mb-6">Unique requests handled by experienced professionals with specialized skills.</p>
                    <ul class="space-y-3 text-gray-700">
                        <li class="flex items-center space-x-3">
                            <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Event planning assistance</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Home organization</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Pet care services</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Gift shopping & delivery</span>
                        </li>
                    </ul>
                </div>

                <!-- Concierge Services -->
                <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-8 shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border border-white/20">
                    <div class="w-16 h-16 bg-gradient-to-br from-gold-500 to-yellow-600 rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Concierge Services</h3>
                    <p class="text-gray-600 mb-6">Premium personalized services for the ultimate convenience and luxury experience.</p>
                    <ul class="space-y-3 text-gray-700">
                        <li class="flex items-center space-x-3">
                            <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Travel arrangements</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Restaurant reservations</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Personal shopping</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>VIP assistance</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">How It Works</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Getting started is simple. Follow these easy steps to connect with trusted errand runners.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center">
                    <div class="w-20 h-20 bg-gradient-to-br from-blue-500 to-blue-600 rounded-full flex items-center justify-center mx-auto mb-6">
                        <span class="text-2xl font-bold text-white">1</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Post Your Errand</h3>
                    <p class="text-gray-600">Describe your task, set your budget, and specify your requirements. It takes just minutes to get started.</p>
                </div>
                
                <div class="text-center">
                    <div class="w-20 h-20 bg-gradient-to-br from-purple-500 to-purple-600 rounded-full flex items-center justify-center mx-auto mb-6">
                        <span class="text-2xl font-bold text-white">2</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Choose Your Runner</h3>
                    <p class="text-gray-600">Review applications from qualified runners, check their ratings, and select the perfect match for your needs.</p>
                </div>
                
                <div class="text-center">
                    <div class="w-20 h-20 bg-gradient-to-br from-green-500 to-green-600 rounded-full flex items-center justify-center mx-auto mb-6">
                        <span class="text-2xl font-bold text-white">3</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Track & Pay</h3>
                    <p class="text-gray-600">Monitor progress in real-time and make secure payments once your errand is completed to your satisfaction.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-gradient-to-r from-blue-600 to-indigo-600">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-4xl font-bold text-white mb-6">Ready to Get Started?</h2>
            <p class="text-xl text-white/90 mb-8 max-w-2xl mx-auto">
                Join thousands of satisfied customers who trust Errands Pro for their daily tasks.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('auth.create') }}" class="bg-white text-blue-600 px-8 py-4 rounded-xl font-semibold text-lg hover:bg-gray-100 transition-all duration-200 shadow-xl hover:shadow-2xl transform hover:-translate-y-1">
                    Sign Up Now
                </a>
                <a href="tel:+254723708814" class="bg-white/20 backdrop-blur-md text-white px-8 py-4 rounded-xl font-semibold text-lg hover:bg-white/30 transition-all duration-200 border border-white/30 flex items-center justify-center space-x-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                    </svg>
                    <span>Call Us</span>
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="col-span-1 md:col-span-2">
                    <div class="flex items-center space-x-3 mb-6">
                        <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                            </svg>
                        </div>
                        <span class="text-2xl font-bold">Errands Pro</span>
                    </div>
                    <p class="text-gray-400 mb-6 max-w-md">
                        The modern way to manage errands. Connect customers with reliable errand runners for seamless task completion.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M22.46 6c-.77.35-1.6.58-2.46.69.88-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29 0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15 0 1.49.75 2.81 1.91 3.56-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07 4.28 4.28 0 0 0 4 2.98 8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21 16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56.84-.6 1.56-1.36 2.14-2.23z"/>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                            </svg>
                        </a>
                    </div>
                </div>
                
                <div>
                    <h3 class="font-semibold text-white mb-4">Quick Links</h3>
                    <ul class="space-y-2 text-sm text-gray-400">
                        <li><a href="{{ route('errands.index') }}" class="hover:text-white transition-colors">Browse Errands</a></li>
                        <li><a href="{{ route('auth.create') }}" class="hover:text-white transition-colors">Sign Up</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">How It Works</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Pricing</a></li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="font-semibold text-white mb-4">Support</h3>
                    <ul class="space-y-2 text-sm text-gray-400">
                        <li><a href="#" class="hover:text-white transition-colors">Help Center</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Contact Us</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Privacy Policy</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Terms of Service</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-gray-800 mt-12 pt-8 text-center text-sm text-gray-400">
                <p>&copy; {{ date('Y') }} Errands Pro. All rights reserved. Built with ❤️ using Laravel.</p>
            </div>
        </div>
    </footer>
</body>
</html>