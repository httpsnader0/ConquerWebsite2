<template>

	<IconField :iconPosition="$page.props.locale == 'en' ? 'left' : 'right'">

		<InputIcon>
			<Icon
				:icon="['fas', !loading ? 'search' : 'spinner']"
				:spin="loading"
			/>
		</InputIcon>

		<InputText
			:id="name"
			type="text"
			v-model="form[name]"
			class="w-full"
			:placeholder="$t('Search ...')"
			v-bind="$attrs"
		/>

	</IconField>

</template>

<script setup>

	import IconField from 'primevue/iconfield';
	import InputIcon from 'primevue/inputicon';
	import InputText from 'primevue/inputtext';

	const props = defineProps({
		form: Object,
		name: String,
		loading: Boolean,
	});

</script>
