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
			ability: Ability.ROLES_SHOW,
			label: i18n.t('_Roles.Details'),
			icon: 'info-circle',
			route: route('dashboard.roles.show', props.model.id),
			active: route().current('dashboard.roles.show', props.model.id),
		},
		{
			ability: Ability.ROLES_UPDATE,
			label: i18n.t('_Roles.Edit'),
			icon: 'edit',
			route: route('dashboard.roles.edit', props.model.id),
			active: route().current('dashboard.roles.edit', props.model.id),
		},
	];

</script>