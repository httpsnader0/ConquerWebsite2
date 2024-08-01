<template>

	<div v-if="ability">

		<Badge
			v-ability="ability"
			:value="$t(status ? (activeLabel ?? 'Active') : (notActiveLabel ?? 'Not Active'))"
			class="cursor-pointer"
			:severity="status ? 'success' : 'danger'"
			@click="handleButtonClick"
		/>

		<ActiveBadge
			v-else-ability="ability"
			:status="status"
		/>

	</div>

	<Badge
		v-else
		:value="$t(status ? (activeLabel ?? 'Active') : (notActiveLabel ?? 'Not Active'))"
		class="cursor-pointer"
		:severity="status ? 'success' : 'danger'"
		@click="handleButtonClick"
	/>

	<ConfirmDialog
		:group="group"
		pt:mask:class="backdrop-blur-sm"
	>

		<template #message>
			<div class="flex flex-col justify-center items-center gap-8 mt-5 mb-3">
				<Icon
					:icon="['fas', !status ? 'check-circle' : 'times-circle']"
					class="text-8xl"
					:class="!status ? 'text-[#3ac77a]' : 'text-[#ef1c58]'"
				/>
				<div class="flex flex-col justify-center items-center gap-1 text-center">
					<span>{{ $t('Do You Want To Change Status The Item') }} ( <span class="font-bold text-primary">{{ name }}</span> )</span>
					<span>{{ $t('In Case Of Change Status , The Item Will Be Permanently Changed From All System') }}</span>
				</div>
			</div>
		</template>

	</ConfirmDialog>

</template>

<script setup>

	import ConfirmDialog from 'primevue/confirmdialog';
	import { useConfirm } from 'primevue/useconfirm';
	import ActiveBadge from '@/Components/Badge/ActiveBadge.vue';
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
		status: [String, Boolean],
		activeLabel: String,
		notActiveLabel: String,
	});

	const group = `statusDialog-${props.id}`;
	const handleButtonClick = () => {
		confirm.require({
			group: group,
			header: i18n.t('Change Status Confirmation'),
			acceptLabel: i18n.t('Confirm'),
			rejectLabel: i18n.t('Cancel'),
			acceptClass: !props.status ? 'p-button-success' : 'p-button-danger',
			rejectClass: 'p-button-secondary',
			defaultFocus: 'cancel',
			position: 'center',
			accept: () => {
				router.get(props.href);
			},
		});
	};

</script>
