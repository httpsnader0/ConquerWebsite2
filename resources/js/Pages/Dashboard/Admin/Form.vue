<template>

	<AppHead :title="isEmpty(model) ? $t('_Admins.Create') : $t('_Admins.Edit')" />

	<Panel :title="isEmpty(model) ? $t('_Admins.Create') : $t('_Admins.Edit')">

		<template #actions>

			<ActionButton
				:ability="Ability.ADMINS_INDEX"
				:label="$t('_Admins.Index')"
				:href="route('dashboard.admins.index')"
			/>

		</template>

		<Tabs
			v-if="!isEmpty(model)"
			:model="model"
		/>

		<form @submit.prevent="submit">

			<div class="panel-content">

				<div class="grid grid-cols-1 md:grid-cols-2 gap-5">

					<FormInput
						:label="$t('Name')"
						:form="form"
						name="name"
						required
					/>

					<FormSelect
						:label="$t('Role')"
						:form="form"
						name="role"
						:options="roleOptions"
						filterable
						clearable
						required
					/>

				</div>
				<div class="grid grid-cols-1 md:grid-cols-3 gap-5">

					<FormInput
						:label="$t('Email Address')"
						:form="form"
						name="email"
						required
					/>

					<FormPassword
						:label="$t('Password')"
						:form="form"
						name="password"
						required
						feedback
					/>

					<FormPassword
						:label="$t('Password Confirmation')"
						:form="form"
						name="password_confirmation"
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
	import FormInput from '@/Components/Form/FormInput.vue';
	import FormPassword from '@/Components/Form/FormPassword.vue';
	import FormSelect from '@/Components/Form/FormSelect.vue';
	import SubmitButton from '@/Components/Button/SubmitButton.vue';
	import { Ability } from '@/Classes/Ability';

	const props = defineProps({
		model: Object,
		roleOptions: Object,
	});

	const form = useForm({
		name: props.model?.name,
		email: props.model?.email,
		password: null,
		password_confirmation: null,
		role: props.model?.role?.name,
	});

	const submit = () => {
		form.post(!Object.keys(props.model).length ? route('dashboard.admins.store') : route('dashboard.admins.update', props.model?.id));
	};

</script>
