<template>

	<AppHead title="Contact Us" />

	<div class="grid grid-cols-1 md:grid-cols-3 gap-20">

		<div class="panel-content col-span-2">
			<form @submit.prevent="submit">

				<div class="grid grid-cols-2 gap-5">

					<FormInput
						:label="$t('Name')"
						:form="form"
						name="name"
						required
					/>

					<FormInput
						:label="$t('Email Address')"
						:form="form"
						name="email"
						required
					/>

				</div>

				<FormInput
					:label="$t('Message')"
					:form="form"
					name="message"
					required
					textarea
				/>

				<FormRecaptcha
					:form="form"
					name="recaptcha"
				/>

				<SubmitButton
					:label="$t('Create Account')"
					class="w-full"
					:loading="form.processing"
					:disabled="!form.recaptcha"
				/>

			</form>
		</div>

		<div class="flex flex-col justify-center items-start gap-20">

			<div class="flex justify-center items-center gap-5">

				<Icon
					:icon="['fas', 'phone']"
					class="p-6 text-3xl bg-primary rounded-2xl text-white shadow-lg"
				/>

				<div class="flex flex-col gap-2">
					<span
						v-text="$t('Call Us')"
						class="text-2xl font-bold text-primary text-shadow shadow-[rgb(0,0,0,0.5)]"
					/>
					<span
						v-text="phone"
						class="text-lg"
					/>
				</div>

			</div>

			<div class="flex justify-center items-center gap-5">

				<Icon
					:icon="['fas', 'envelope']"
					class="p-6 text-3xl bg-primary rounded-2xl text-white shadow-lg"
				/>

				<div class="flex flex-col gap-2">
					<span
						v-text="$t('Message Us')"
						class="text-2xl font-bold text-primary text-shadow shadow-[rgb(0,0,0,0.5)]"
					/>
					<span
						v-text="email"
						class="text-lg"
					/>
				</div>

			</div>

			<div class="flex justify-center items-center gap-5">

				<Icon
					:icon="['fas', 'heart']"
					class="p-6 text-3xl bg-primary rounded-2xl text-white shadow-lg"
				/>

				<div class="flex flex-col gap-2">
					<span
						v-text="$t('Follow Us')"
						class="text-2xl font-bold text-primary text-shadow shadow-[rgb(0,0,0,0.5)]"
					/>

					<div class="flex flex-wrap justify-start items-center gap-2">

						<template
							v-for="social in socialMedia"
							:key="social.href"
						>

							<a
								:href="social.href"
								target="_blank"
								class="w-10 h-10 rounded-xl flex justify-center items-center text-white hover-animate hover:-rotate-12 hover:scale-110"
								:class="`bg-${social.icon}`"
							>
								<Icon :icon="['fab', social.icon]" />
							</a>

						</template>

					</div>

				</div>

			</div>

		</div>

	</div>

</template>

<script setup>

	import AppHead from '@/Components/Shared/AppHead.vue';
	import { useForm } from "@inertiajs/vue3";
	import FormInput from "@/Components/Form/FormInput.vue";
	import FormRecaptcha from '@/Components/Form/FormRecaptcha.vue';
	import SubmitButton from "@/Components/Button/SubmitButton.vue";

	const props = defineProps({
		email: String,
		phone: String,
		socialMedia: Object,
	});

	const form = useForm({
		name: null,
		email: null,
		message: null,
		recaptcha: null,
	});

	const submit = () => {
		form.post(route('website.contact-us.store'), {
			onSuccess: () => form.reset(),
			onError: () => form.reset('recaptcha'),
		});
	};

</script>