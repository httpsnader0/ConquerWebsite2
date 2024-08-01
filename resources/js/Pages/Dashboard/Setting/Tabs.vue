<template>

	<TabMenu :items="items" />

</template>

<script setup>

	import TabMenu from '@/Components/Menu/TabMenu.vue';
	import { useI18n } from 'vue-i18n';
	import { Ability } from '@/Classes/Ability';

	const i18n = useI18n(), items = [
		{
			ability: Ability.SETTINGS_INDEX,
			label: i18n.t('_Settings.Index'),
			icon: 'cog',
			route: route('dashboard.settings.index'),
			active: route().current('dashboard.settings.index'),
		},
		{
			ability: Ability.SETTINGS_INDEX,
			label: i18n.t('_Settings.Sliders'),
			icon: 'cog',
			route: route('dashboard.settings.sliders.index'),
			active: route().current('dashboard.settings.sliders.index'),
		},
		{
			ability: Ability.SETTINGS_INDEX,
			label: i18n.t('_Settings.About Game'),
			icon: 'cog',
			route: route('dashboard.settings.about.index'),
			active: route().current('dashboard.settings.about.index'),
		},
		{
			ability: Ability.SETTINGS_INDEX,
			label: i18n.t('_Settings.Game Features'),
			icon: 'cog',
			route: route('dashboard.settings.features.index'),
			active: route().current('dashboard.settings.features.index'),
		},
		{
			ability: Ability.SETTINGS_INDEX,
			label: i18n.t('_Settings.Download'),
			icon: 'cog',
			route: route('dashboard.settings.download.index'),
			active: route().current('dashboard.settings.download.index'),
		},
		{
			ability: Ability.SETTINGS_INDEX,
			label: i18n.t('_Settings.Installations'),
			icon: 'cog',
			route: route('dashboard.settings.installations.index'),
			active: route().current('dashboard.settings.installations.index'),
		},
	];

</script>