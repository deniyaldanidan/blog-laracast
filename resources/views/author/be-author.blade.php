<x-layout-main title="Be Author">
    <x-form formName="Be Author Form" formAction="" formMethod="POST" btnText="Apply">
        <x-input-group id="content" label="Tell us about yourself: (max 700 characters)" inputType="text"
            inputName="content" placeholder="say something about yourself in simple words." :textArea="true" />
    </x-form>
</x-layout-main>
