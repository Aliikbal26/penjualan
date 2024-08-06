@extends('template.main')
@section('content')
<div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
    <div class="flex-1 h-full max-w-2xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
        <div class="row justify-content-center">
            <div class="flex items-center justify-center p-6 sm:p-12  ">
                <div class="w-full">

                    <h1 class="mb-4 text-xl text-center font-semibold text-gray-700 dark:text-gray-200">
                        Login
                    </h1>
                    <!-- alerts -->
                    @if(isset($error))
                    <div class="bg-red-100 border-t-4 border-red-500 rounded-b text-red-900 px-4 py-3 pb-3 shadow-md my-5">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="py-1">
                                    <svg class="fill-current h-6 w-6 text-red-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M10 2.5a7.5 7.5 0 100 15 7.5 7.5 0 000-15zm0 13a5.5 5.5 0 110-11 5.5 5.5 0 010 11z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-bold">Error!</p>
                                    <p class="text-sm">{{$error}}</p>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <button type="button" class="text-red-500 hover:text-red-700 focus:outline-none">
                                    <svg class="fill-current h-4 w-4" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 5.293a1 1 0 011.414 0L10 8.586l3.293-3.293a1 1 0 111.414 1.414L11.414 10l3.293 3.293a1 1 0 11-1.414 1.414L10 11.414l-3.293 3.293a1 1 0 01-1.414-1.414L8.586 10 5.293 6.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>

                    @endif

                    <form action="{{route('login')}}" method="post">
                        @csrf
                        <label class="block text-sm">
                            <span for="email" class="text-gray-700 dark:text-gray-400">Email</span>
                            <input name="email" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Jane Doe" />
                        </label>
                        <label class="block mt-4 text-sm">
                            <span for="password" class="text-gray-700 dark:text-gray-400">Password</span>
                            <input name="password" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="***************" type="password" />
                        </label>

                        <button type="submit" class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">Login</button>
                    </form>

                    <hr class=" my-8" />

                    <!-- <p class="mt-4">
                        <a class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:underline" href="./forgot-password.html">
                            Forgot your password?
                        </a>
                    </p> -->
                    <p class="mt-1 text-center">
                        <a class="text-sm  font-medium text-purple-600 dark:text-purple-400 hover:underline" href=" {{url('register')}}">
                            Create account
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection