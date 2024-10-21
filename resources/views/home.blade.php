<x-layout>
    <div class="container mx-auto px-4 py-8">
        <div class="flex flex-col items-center"> 
            <h1 class="text-3xl font-bold mb-4">Simplify Your Tasks with Our Errands Management System</h1>
            <p class="text-gray-700 mb-6">Our system helps you organize, prioritize, and track your errands efficiently. Never forget a task again!</p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6"> 
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-xl font-semibold mb-2">Basic Errands</h2>
                    <p class="text-gray-600">Take the hassle out of your everyday tasks. We'll handle the essentials, so you can focus on what matters most.</p>
                    <ul class="list-disc list-inside mt-4 text-gray-600">
                        <li>Grocery shopping</li>
                        <li>Dry cleaning pickup/drop-off</li> 
                        <li>Post office runs</li>
                        <li>Prescription refills</li>
                        <li>And more!</li>
                    </ul>
                </div>

                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-xl font-semibold mb-2">Specialized Errands</h2>
                    <p class="text-gray-600">Got a unique request? We've got you covered. Our specialized services cater to your specific needs.</p>
                    <ul class="list-disc list-inside mt-4 text-gray-600">
                        <li>Waiting in line for tickets or events</li>
                        <li>Home organization and decluttering</li>
                        <li>Pet care and dog walking</li>
                        <li>Gift shopping and delivery</li> 
                        <li>And much more!</li>
                    </ul>
                </div>

                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-xl font-semibold mb-2">Concierge Services</h2>
                    <p class="text-gray-600">Experience the ultimate convenience with our personalized concierge services. We'll take care of everything on your to-do list.</p>
                    <ul class="list-disc list-inside mt-4 text-gray-600">
                        <li>Travel arrangements and bookings</li>
                        <li>Restaurant reservations</li>
                        <li>Personal shopping</li>
                        <li>Event planning assistance</li>
                        <li>And any other tasks you need help with!</li>
                    </ul>
                </div>
            </div>

            <div class="mt-8">
                <a href="{{ route('login') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-4">Sign In</a>
                <a href="{{ route('auth.create') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">Register</a>
            </div>
        </div>
    </div>
</x-layout>