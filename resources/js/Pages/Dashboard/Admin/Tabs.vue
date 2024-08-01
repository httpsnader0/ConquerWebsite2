<template>

	<TabMenu :items="items" />

</template>

<script setup>

	import TabMenu from '@/Components/Menu/TabMenu.vue';
	import { useI18n } from 'vue-i18n';
	import { Ability } from '@/Classes/Ability';

	const i18n = useI18n(), props = defineProps({
		model: Object,
	}), items = [
		{
			ability: Ability.ADMINS_SHOW,
			label: i18n.t('_Admins.Details'),
			icon: 'info-circle',
			route: route('dashboard.admins.show', props.model.id),
			active: route().current('dashboard.admins.show', props.model.id),
		},
		{
			ability: Ability.ADMINS_UPDATE,
			label: i18n.t('_Admins.Edit'),
			icon: 'edit',
			route: route('dashboard.admins.edit', props.model.id),
			active: route().current('dashboard.admins.edit', props.model.id),
		},
	];

</script>