<template>

	<div v-if="ability">

		<div v-ability="ability">

			<Button
				class="!w-12 !h-12"
				severity="primary"
				@click="handleButtonClick"
				v-bind="$attrs"
			>

				<Icon :icon="['fas', 'edit']" />

			</Button>

		</div>

	</div>

	<Button
		v-else
		class="!w-12 !h-12"
		severity="primary"
		@click="handleButtonClick"
		v-bind="$attrs"
	>

		<Icon :icon="['fas', 'edit']" />

	</Button>

</template>

<script setup>

	import { router } from '@inertiajs/vue3';

	const props = defineProps({
		ability: String,
		href: String,
	});

	const handleButtonClick = () => {
		router.visit(props.href);
	};

</script>
