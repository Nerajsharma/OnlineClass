@php use Illuminate\Support\Facades\Crypt; @endphp
<x-guest-layout>
    {{-- {{$batch->formvalid}} --}}
    <div id="countdown-timer" class="mb-4 text-center text-lg font-semibold text-red-600"></div>

    @if (!$batch_valid)
        <p class="text-center font-semibold text-red-600">The form submission has expired.</p>
    @else
        <form method="POST" action="{{ route('register.batch.store', ['batch' => Crypt::encryptString($batch->id)]) }}">
            @csrf
            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="mt-1 block w-full" type="email" name="email" :value="old('email')"
                    required autocomplete="username" placeholder="Register Email Address" />
                @if ($errors->has('email'))
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500" id="email-error">
                        {{-- {{ $errors->first('email') }} --}}
                        Please enter a valid registered email address.
                    </p>
                @endif

                @if ($errors->has('registererror'))
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500" id="email-error">
                        {{-- {{ $errors->first('registererror') }} --}}
                        You are already registered for this batch.
                    </p>
                @endif
            </div>
            @foreach ($batch->custom_fields as $item)
                <div class="mt-4">
                    <x-input-label for="{{ $item['label'] }}" :value="__($item['label'])" />

                    <input id="{{ $item['label'] }}" name="custom_field[{{ $item['label'] }}]"
                        type="{{ $item['type'] }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        value="{{ old($item['label']) }}" {{ $item['required'] ? 'required' : '' }}
                        autocomplete="{{ $item['label'] }}">

                    <x-input-error :messages="$errors->get($item['label'])" class="mt-2" />
                </div>
            @endforeach

            <div class="mt-4 flex items-center justify-end">
                <a class="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                    href="{{ route('register') }}">
                    {{ __('Register account ?') }}
                </a>

                <x-primary-button class="ml-4">
                    {{ __('Batch Register') }}
                </x-primary-button>
            </div>
        </form>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Inject Laravel date directly into JavaScript
                const deadline = new Date("{{ \Carbon\Carbon::parse($batch->formvalid)->toIso8601String() }}")
                    .getTime();
                const countdownDisplay = document.getElementById('countdown-timer');
                const submitButton = document.querySelector('form button[type="submit"]');

                function updateCountdown() {
                    const now = new Date().getTime();
                    const distance = deadline - now;

                    if (distance <= 0) {
                        countdownDisplay.innerHTML = "⛔ Form submission closed.";
                        if (submitButton) {
                            submitButton.disabled = true;
                        }
                        location.reload();
                        return;
                    }

                    const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                    const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                    const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                    countdownDisplay.innerHTML = `⏳ Time remaining: ${days}d ${hours}h ${minutes}m ${seconds}s`;

                    setTimeout(updateCountdown, 1000);
                }

                updateCountdown();
            });
        </script>
    @endif

</x-guest-layout>
