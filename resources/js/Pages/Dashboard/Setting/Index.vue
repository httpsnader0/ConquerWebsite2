<template>

	<AppHead :title="$t('_Settings.Index')" />

	<Panel :title="$t('_Settings.Index')">

		<Tabs />

		<form @submit.prevent="submit">

			<div class="panel-content">

				<FormTranslatable
					:label="$t('Title')"
					:form="form"
					name="title"
					required
				/>

				<div class="grid grid-cols-1 md:grid-cols-2 gap-5">

					<FormFile
						:label="$t('Icon')"
						:form="form"
						name="icon"
						:src="asset(icon)"
					/>

					<FormFile
						:label="$t('Logo')"
						:form="form"
						name="logo"
						:src="asset(logo)"
					/>

				</div>

				<div class="grid grid-cols-1 md:grid-cols-3 gap-5">

					<FormInput
						:label="$t('Email Address')"
						:form="form"
						name="email"
						required
					/>

					<FormInput
						:label="$t('Phone')"
						:form="form"
						name="phone"
						required
					/>

					<FormInput
						:label="$t('Facebook')"
						:form="form"
						name="facebook"
						required
					/>

					<FormInput
						:label="$t('Instagram')"
						:form="form"
						name="instagram"
						required
					/>

					<FormInput
						:label="$t('Youtube')"
						:form="form"
						name="youtube"
						required
					/>

					<FormInput
						:label="$t('Whatsapp')"
						:form="form"
						name="whatsapp"
						required
					/>

					<FormInput
						:label="$t('Twitter')"
						:form="form"
						name="twitter"
						required
					/>

					<FormInput
						:label="$t('Discord')"
						:form="form"
						name="discord"
						required
					/>

					<FormInput
						:label="$t('Discord Widget')"
						:form="form"
						name="discordWidget"
						required
					/>

				</div>

				<SubmitButton
					:label="$t('Save')"
					:loading="form.processing"
				/>

			</div>

		</form>

	</Panel>

</template>

<script setup>

	import Tabs from './Tabs.vue';
	import { useForm } from '@inertiajs/vue3';
	import FormTranslatable from '@/Components/Form/FormTranslatable.vue';
	import FormFile from '@/Components/Form/FormFile.vue';
	import FormInput from '@/Components/Form/FormInput.vue';
	import SubmitButton from '@/Components/Button/SubmitButton.vue';

	const props = defineProps({
		title: Object,
		icon: String,
		logo: String,
		email: String,
		phone: String,
		facebook: String,
		instagram: String,
		youtube: String,
		whatsapp: String,
		twitter: String,
		discord: String,
		discordWidget: String,
	});

	const form = useForm({
		title: props.title ?? { 'ar': '', 'en': '' },
		icon: null,
		logo: null,
		email: props.email,
		phone: props.phone,
		facebook: props.facebook,
		instagram: props.instagram,
		youtube: props.youtube,
		whatsapp: props.whatsapp,
		twitter: props.twitter,
		discord: props.discord,
		discordWidget: props.discordWidget,
	});

	const submit = () => {
		form.post(route('dashboard.settings.update'));
	};

</script>
