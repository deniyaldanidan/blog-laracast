<x-layout-main title="Register">
    <x-form formName="Regiser User" formAction="/register" formMethod="POST" btnText="Register">
        <x-input-group id="username" label="username" inputType="text" inputName="username"
            placeholder="your username here" />
        <x-input-group id="name" label="name" inputType="text" inputName="name" placeholder="your name here" />
        <x-input-group id="email" label="email" inputType="email" inputName="email"
            placeholder="your email here" />
        <x-input-group id="password" label="password" inputType="password" inputName="password"
            placeholder="your password here" />

        <x-slot:extras>
            <div class="mt-8 text-center">Already have an account? <a href="/login"
                    class="hover:text-secondary font-semibold underline duration-150">login here</a></div>
        </x-slot:extras>
    </x-form>
</x-layout-main>
