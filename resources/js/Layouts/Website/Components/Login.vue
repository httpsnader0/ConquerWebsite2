<template>

	<button
		type="button"
		class="nav-btn login-btn"
		@click="visible = true"
	/>

	<Dialog
		v-model:visible="visible"
		modal
		:pt="{
			root: {
				class: 'shadow-none'
			},
			mask: {
				style: 'backdrop-filter: blur(5px)'
			}
		}"
		:style="{ width: '25vw' }"
	>
		<template #container="{ closeCallback }">
			<div class="bg-gradient-to-tr from-webSecondary to-webPrimary shadow-2xl text-white rounded-2xl w-full flex flex-col p-10 gap-5">

				<div class="flex flex-col justify-center items-center text-center gap-1 mb-3">
					<span class="text-4xl text-secondary font-bold uppercase">{{ $t('Login') }}</span>
				</div>

				<form @submit.prevent="submit">

					<FormInput
						:label="$t('Username')"
						:form="form"
						name="username"
						required
					/>

					<FormPassword
						:label="$t('Password')"
						:form="form"
						name="password"
						required
					/>

					<div class="w-full flex align-items-center gap-3">

						<SubmitButton
							:label="$t('Login')"
							:loading="form.processing"
							class="w-full"
							outlined
						/>

						<Button
							:label="$t('Close')"
							severity="contrast"
							size="small"
							@click="closeCallback"
							outlined
						/>

					</div>

				</form>

			</div>
		</template>
	</Dialog>

</template>

<script setup>

	import { useForm } from '@inertiajs/vue3';
	import FormInput from '@/Components/Form/FormInput.vue';
	import FormPassword from '@/Components/Form/FormPassword.vue';
	import SubmitButton from '@/Components/Button/SubmitButton.vue';
	import { ref } from "vue";

	const visible = ref(false);

	const form = useForm({
		username: null,
		password: null,
	});

	const submit = () => {
		form.post(route('website.login.store'), {
			onSuccess: () => {
				visible.value = false;
				form.reset();
			},
			onError: () => {
				form.reset();
			}
		});
	};

</script>