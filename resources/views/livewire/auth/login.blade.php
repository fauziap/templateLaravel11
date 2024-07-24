<div>
    <div class="lg:-mt-10">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <div class="text-center text-2xl font-bold text-gray-700 mb-4">
                <p>Template Authentikasi</p>
                <p class="text-sm">By Ahmad Fauzi</p>
            </div>
            <div class="w-full bg-gray-200 rounded-2xl shadow border md:mt-0 sm:max-w-md xl:p-0 text-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-2xl text-center font-bold leading-tight tracking-tight text-gray-700 md:text-2xl">
                        Silahkan login :'~
                    </h1>
                    <form class="space-y-4 md:space-y-6" wire:submit.prevent='loginUser'>
                        @csrf
                        <div>
                            <label for="email" class="block mb-2 text-md font-medium text-gray-900">Email</label>
                            <input type="text" name="email" id="email"
                                class="bg-gray-50 @error('email') border-red-500 @enderror border  text-gray-900 focus:outline-none sm:text-sm rounded-lg focus:ring-gray-300 block w-full p-2.5 placeholder-gray-400"
                                placeholder="name@spp.com" wire:model='email' required>
                            <!-- Pesan error untuk email -->
                            @error('email')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div x-data="{ showPassword: false }">
                            <label for="password" class="block mb-2 text-md font-medium text-gray-900">Password</label>
                            <div class="relative no-select flex items-center">
                                <input :type="showPassword ? 'text' : 'password'" name="password" id="password"
                                    placeholder="••••••••"
                                    class="bg-gray-50 focus:outline-none border @error('password') border-red-500 @enderror text-gray-900 sm:text-sm rounded-lg focus:ring-gray-300 block w-full p-2.5 placeholder-gray-400"
                                    wire:model='password' required>
                                {{-- <input type="checkbox" @click="showPassword = !showPassword" class="ml-2">
                                <span class="text-gray-700 ml-2">Show Password</span> --}}
                                <span
                                    class="material-symbols-outlined cursor-pointer absolute right-2 ml-2 focus:outline-none"
                                    @click="showPassword = !showPassword" x-show="!showPassword">visibility</span>
                                <span
                                    class="material-symbols-outlined cursor-pointer absolute  right-2 ml-2 focus:outline-none"
                                    @click="showPassword = !showPassword" x-show="showPassword">visibility_off</span>
                            </div>
                            <!-- Pesan error untuk password -->
                            @error('password')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <div class="flex no-select items-center">
                                <input type="checkbox" id="remember" name="remember"
                                    class="h-4 w-4 text-gray-600 cursor-pointer border-gray-300 rounded focus:ring-gray-500"
                                    wire:model='remember'>
                                <label for="remember" class="ml-2 cursor-pointer block text-sm text-gray-900">
                                    Remember
                                </label>
                            </div>
                            <div class="flex justify-end -mt-5 items-center">
                                <p class="font-medium text-sm cursor-pointer hover:underline">Forget Password?</p>
                            </div>
                        </div>

                        <div>
                            <button type="submit"
                                class="w-full flex justify-center items-center text-white focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-md px-5 py-1.5 text-center bg-gray-600 dark:hover:bg-gray-700 hover:translate-x-1 transition duration-300 dark:focus:ring-gray-800">
                                <span class="material-symbols-outlined mr-2 text-[20px]" wire:loading.remove>
                                    login
                                </span> <span wire:loading.remove> Sign
                                    in </span>
                                <div wire:loading> Loading ...
                                </div>
                            </button>
                        </div>

                        <div>
                            <button type="submit"
                                class="w-full flex justify-center items-center text-gray-600 focus:outline-none focus:ring-none focus:border-none border-2 font-semibold py-1 bg-slate-100 rounded-md"><svg
                                    xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" class="mr-2"
                                    viewBox="0 0 30 30">
                                    <path
                                        d="M 15.003906 3 C 8.3749062 3 3 8.373 3 15 C 3 21.627 8.3749062 27 15.003906 27 C 25.013906 27 27.269078 17.707 26.330078 13 L 25 13 L 22.732422 13 L 15 13 L 15 17 L 22.738281 17 C 21.848702 20.448251 18.725955 23 15 23 C 10.582 23 7 19.418 7 15 C 7 10.582 10.582 7 15 7 C 17.009 7 18.839141 7.74575 20.244141 8.96875 L 23.085938 6.1289062 C 20.951937 4.1849063 18.116906 3 15.003906 3 z">
                                    </path>
                                </svg> login Google</button>
                        </div>
                        <div class="flex justify-center items-center">
                            <p class="font-normal text-sm">Don't have an account? <a href="{{ route('register') }}"
                                    wire:navigate> <span class="font-medium cursor-pointer hover:underline">Sign
                                        Up</span></a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @push('script')
        <script>
            function myFunction() {
                var x = document.getElementById("password");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
            }
        </script>
        <script>
            document.addEventListener('livewire:load', function () {
                if ({{ session()->has('seconds') ? 'true' : 'false' }}) {
                    let seconds = {{ session('seconds', 0) }};
                    const errorMessage = document.getElementById('error-message');

                    if (errorMessage) {
                        const timer = setInterval(() => {
                            seconds--;
                            if (seconds > 0) {
                                errorMessage.textContent = `Terlalu banyak percobaan gagal. Silakan coba lagi dalam ${seconds} detik.`;
                            } else {
                                clearInterval(timer);
                                errorMessage.textContent = '';
                            }
                        }, 1000);
                    }
                }

                Livewire.on('start-timer', event => {
                    let seconds = event.seconds;
                    const errorMessage = document.getElementById('error-message');

                    if (errorMessage) {
                        const timer = setInterval(() => {
                            seconds--;
                            if (seconds > 0) {
                                errorMessage.textContent = `Terlalu banyak percobaan gagal. Silakan coba lagi dalam ${seconds} detik.`;
                            } else {
                                clearInterval(timer);
                                errorMessage.textContent = '';
                            }
                        }, 1000);
                    }
                });
            });
        </script>
    @endpush
</div>
