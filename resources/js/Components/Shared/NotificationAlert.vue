<template>

	<Toast :position="$page.props.locale == 'ar' ? 'top-left' : 'top-right'" />

</template>

<script setup>

	import Toast from 'primevue/toast';
	import { useToast } from 'primevue/usetoast';
	import { onMounted, watch } from 'vue';
	import { usePage } from '@inertiajs/vue3';

	const toast = useToast(), page = usePage();

	watch(() => page.props.toastr, (toastr) => {
		toastr.forEach(message => {
			toast.add({
				severity: message.type,
				detail: message.message,
				life: 2000,
			});
		});
	});

	watch(() => page.props.errors, (errors) => {
		let index = 0;
		for (let error in errors) {
			if (index === 0) {
				toast.add({
					severity: 'error',
					detail: errors[error],
					life: 2000,
				});
			}
			index++;
		}
		document.querySelectorAll('.input-errors').forEach(input => {
			input.classList.remove('hidden');
		})
	});

	onMounted(() => {

		page.props.toastr?.forEach(message => {
			toast.add({
				severity: message.type,
				detail: message.message,
				life: 3000,
			});
		});

	});

</script>