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
                        Reset Password
                    </h1>
                    <form class="space-y-4 md:space-y-6" wire:submit="resetPassword">
                        @csrf
                        <div>
                            <label for="email" class="block mb-2 text-md font-medium text-gray-900">Email</label>
                            <input type="email" name="email" id="email"
                                class="bg-gray-50 @error('email') border-red-500 @enderror border text-gray-900 focus:outline-none sm:text-sm rounded-lg focus:ring-gray-300 block w-full p-2.5 placeholder-gray-400"
                                placeholder="name@example.com" wire:model="email" required>
                            @error('email')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div x-data="{ showPassword: false }">
                            <label for="password" class="block mb-2 text-md font-medium text-gray-900">Password Baru</label>
                            <div class="relative no-select flex items-center">
                                <input :type="showPassword ? 'text' : 'password'" name="password" id="password"
                                    placeholder="••••••••"
                                    class="bg-gray-50 focus:outline-none border @error('password') border-red-500 @enderror text-gray-900 sm:text-sm rounded-lg focus:ring-gray-300 block w-full p-2.5 placeholder-gray-400"
                                    wire:model="password" required>
                                <span
                                    class="material-symbols-outlined cursor-pointer absolute right-2 ml-2 focus:outline-none"
                                    @click="showPassword = !showPassword" x-show="!showPassword">visibility</span>
                                <span
                                    class="material-symbols-outlined cursor-pointer absolute right-2 ml-2 focus:outline-none"
                                    @click="showPassword = !showPassword" x-show="showPassword">visibility_off</span>
                            </div>
                            @error('password')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div x-data="{ showConfirmPassword: false }">
                            <label for="password_confirmation" class="block mb-2 text-md font-medium text-gray-900">Konfirmasi Password Baru</label>
                            <div class="relative no-select flex items-center">
                                <input :type="showConfirmPassword ? 'text' : 'password'" name="password_confirmation" id="password_confirmation"
                                    placeholder="••••••••"
                                    class="bg-gray-50 focus:outline-none border text-gray-900 sm:text-sm rounded-lg focus:ring-gray-300 block w-full p-2.5 placeholder-gray-400"
                                    wire:model="password_confirmation" required>
                                <span
                                    class="material-symbols-outlined cursor-pointer absolute right-2 ml-2 focus:outline-none"
                                    @click="showConfirmPassword = !showConfirmPassword" x-show="!showConfirmPassword">visibility</span>
                                <span
                                    class="material-symbols-outlined cursor-pointer absolute right-2 ml-2 focus:outline-none"
                                    @click="showConfirmPassword = !showConfirmPassword" x-show="showConfirmPassword">visibility_off</span>
                            </div>
                        </div>
                        <div>
                            <button type="submit"
                                class="w-full flex justify-center items-center text-white focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-md px-5 py-1.5 text-center bg-gray-600 dark:hover:bg-gray-700 hover:translate-x-1 transition duration-300 dark:focus:ring-gray-800">
                                <span class="material-symbols-outlined mr-2 text-[20px]" wire:loading.remove>
                                    lock_reset
                                </span> <span wire:loading.remove>Reset Password</span>
                                <div wire:loading>Loading...</div>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
