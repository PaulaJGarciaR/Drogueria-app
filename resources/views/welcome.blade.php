<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="icon" href="https://res.cloudinary.com/depwl0l0w/image/upload/v1715459669/Esthyan_3_ca7woy.png" type="">

    <!-- Styles -->

</head>

<body class="antialiased">
    <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white"
        style=" width:100%;display:flex;justify-content: flex-end">
        @if (Route::has('login'))
            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10"
                style="width:20%;display:flex;justify-content:space-around;font-family:arial;">
                @auth
                    <a href="{{ url('/home') }}"
                        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
                @else
                    <a href="{{ route('login') }}"
                        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                        style="text-decoration:none;font-weight:700;font-size:20px;background-color:#dc3545;padding:10px 20px;border-radius:20px;color:white;">Log
                        in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                            style="text-decoration:none;font-weight:700;font-size:20px;background-color:#dc3545;padding:10px 20px;border-radius:20px;color:white;">Register</a>
                    @endif
                @endauth
            </div>
        @endif 
    </div>
    <div style="width:100%;display:flex;font-family:arial;">
        <div style="width:40%;text-align:center;">
            <h1 style="text-align:center;">Welcome</h1>
            <div style="display:flex;justify-content:center;">
                <h1 style="display:flex; align-items:center;font-size:40px">Esthyan<h1
                        style="background-color:#dc3545;padding:10px 20px;border-radius:10px;color:white;font-size:40px">Pharmacy</h1>
                </h1>
            </div>
            <div class="w-50 mx-auto">
							<div class="d-flex justify-content-center">
								<img src="https://res.cloudinary.com/depwl0l0w/image/upload/v1715459231/Logo_tryic6.png"
									alt="" style="width:50%;">
							</div>
						</div>
            <div style="width:100%;line-height:1.5em;display:flex;justify-content:center;margin-bottom:20px">
                <p style="width:70%;">Lorem ipsum dolor sit amet consectetur, adipisicing elit. A sit corporis delectus
                    eveniet commodi voluptates culpa harum ea laboriosam animi unde quidem, reiciendis blanditiis
                    dolores perspiciatis architecto. Corporis, aliquam exercitationem?</p>

            </div>
            <a href=""
                class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                style="text-decoration:none;font-weight:700;font-size:20px;background-color:#007bff;padding:10px 20px;border-radius:20px;color:white;">Shop
                Now</a>
        </div>
        <div style="width:60%;">
            <img style="width:100%;" src="https://cuenti.com/wp-content/uploads/2023/10/19198628-1080x675.jpg" alt="">
        </div>
    </div>
</body>

</html>