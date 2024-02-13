<x-layout-main title="Login">
    <x-form formName="Login" formAction="/login" formMethod="POST" btnText="Login">
        <x-input-group id="usernameOrEmail" label="username or email" inputType="text" inputName="usernameOrEmail"
            placeholder="your username or email here" />
        <x-input-group id="password" label="password" inputType="password" inputName="password"
            placeholder="your password here" />
        <x-slot:extras>
            <div class="mt-8 text-center">Don't have an account yet? <a href="/register"
                    class="hover:text-secondary font-semibold underline duration-150">register here</a></div>
        </x-slot:extras>
    </x-form>
</x-layout-main>
