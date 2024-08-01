<template>

	<div v-if="ability">

		<div v-ability="ability">

			<Link :href="href">

			<Button
				size="small"
				:severity="color"
				v-bind="$attrs"
			>

				<Icon :icon="['fas', icons]" />

				{{ label }}

			</Button>

			</Link>

		</div>

	</div>

	<div v-else>

		<Link
			v-if="!disabled"
			:href="href"
		>

		<Button
			size="small"
			:severity="color"
			v-bind="$attrs"
		>

			<Icon :icon="['fas', icons]" />

			{{ label }}

		</Button>

		</Link>

		<Button
			v-else
			size="small"
			:severity="color"
			disabled
		>

			<Icon :icon="['fas', icons]" />

			{{ label }}

		</Button>

	</div>

</template>

<script setup>

	import Button from 'primevue/button';
	import { computed } from 'vue';
	import { usePage } from '@inertiajs/vue3';

	const props = defineProps({
		ability: String,
		icon: String,
		label: String,
		href: String,
		type: String,
		disabled: Boolean,
		color: String,
	});

	const icons = computed(() => {
		switch (props.type) {
			case 'create':
				return 'plus';

			case 'noIcon':
				return '';

			default:
				return props.icon ?? (usePage().props.locale == 'ar' ? 'arrow-right' : 'arrow-left');
		}
	});

</script>
