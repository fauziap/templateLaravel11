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
                        Verifikasi Email
                    </h1>
                    <div class="text-sm text-gray-600">
                        Terima kasih telah mendaftar! Sebelum melanjutkan, mohon verifikasi email Anda dengan mengklik link yang telah kami kirim. Jika Anda tidak menerima email, kami dengan senang hati akan mengirim ulang.
                    </div>
                    @if (session('message'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('message') }}
                        </div>
                    @endif
                    <form class="space-y-4 md:space-y-6" wire:submit.prevent='resendVerification'>
                        <div>
                            <button type="submit"
                                class="w-full flex justify-center items-center text-white focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-md px-5 py-1.5 text-center bg-gray-600 dark:hover:bg-gray-700 hover:translate-x-1 transition duration-300 dark:focus:ring-gray-800">
                                <span class="material-symbols-outlined mr-2 text-[20px]" wire:loading.remove>
                                    email
                                </span> <span wire:loading.remove> Kirim Ulang Email Verifikasi </span>
                                <div wire:loading> Loading ...
                                </div>
                            </button>
                        </div>
                    </form>
                    <div>
                        <a href="{{route('logout')}}">
                            <button type="submit"
                                class="w-full flex justify-center items-center text-gray-600 focus:outline-none focus:ring-none focus:border-none border-2 font-semibold py-1 bg-slate-100 rounded-md">
                                Logout
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
