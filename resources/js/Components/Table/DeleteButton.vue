<template>

	<div v-if="ability">

		<div v-ability="ability">

			<Button
				class="!w-12 !h-12"
				severity="danger"
				@click="handleButtonClick"
				v-bind="$attrs"
			>

				<Icon :icon="['fas', 'trash']" />

			</Button>

		</div>

	</div>

	<Button
		v-else
		class="!w-12 !h-12"
		severity="danger"
		@click="handleButtonClick"
		v-bind="$attrs"
	>

		<Icon :icon="['fas', 'trash']" />

	</Button>

	<ConfirmDialog
		:group="group"
		pt:mask:class="backdrop-blur-sm"
	>

		<template #message>
			<div class="flex flex-col justify-center items-center gap-5 mt-5">
				<Icon
					:icon="['fas', 'trash']"
					class="!text-8xl text-[#ef1c58]"
				/>
				<div class="flex flex-col justify-center items-center gap-1 text-center">
					<span>{{ $t('Do You Want To Delete The Item') }} ( <span class="font-bold text-primary">{{ name }}</span> )</span>
					<span>{{ $t('In Case Of Deletion , The Item Will Be Permanently Deleted From All System') }}</span>
				</div>
			</div>
		</template>

	</ConfirmDialog>

</template>

<script setup>

	import ConfirmDialog from 'primevue/confirmdialog';
	import { useConfirm } from 'primevue/useconfirm';
	import { router } from '@inertiajs/vue3';
	import { useI18n } from 'vue-i18n';

	const confirm = useConfirm(), i18n = useI18n(), props = defineProps({
		ability: String,
		href: String,
		id: {
			type: null,
			required: true,
		},
		name: [String, Number],
	});

	const group = `deleteDialog-${props.id}`;
	const handleButtonClick = () => {
		confirm.require({
			group: group,
			header: i18n.t('Delete Confirmation'),
			acceptLabel: i18n.t('Confirm'),
			rejectLabel: i18n.t('Cancel'),
			acceptClass: 'p-button-danger',
			rejectClass: 'p-button-secondary',
			defaultFocus: 'cancel',
			position: 'center',
			accept: () => {
				router.delete(props.href);
			},
		});
	};

</script>
