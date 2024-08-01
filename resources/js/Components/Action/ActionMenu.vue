<template>

	<Button
		outlined
		@click="toggle"
	>

		<Icon :icon="['fas', 'ellipsis-vertical']" />

	</Button>

	<Menu
		ref="menu"
		:model="items"
		:popup="true"
	>
		<template #item="{ item, props }">

			<a
				v-if="item.download"
				:href="getExportExcelUrl()"
				download
				v-bind="props.action"
				class="flex justify-start items-center gap-2"
			>

				<Icon
					v-bind="props.icon"
					:icon="['fas', item.icon]"
				/>

				<span
					v-bind="props.label"
					v-text="item.label"
				/>

			</a>

			<div
				v-else
				v-bind="props.action"
				class="flex justify-start items-center gap-2"
			>

				<Icon
					v-bind="props.icon"
					:icon="['fas', item.icon]"
				/>

				<span
					v-bind="props.label"
					v-text="item.label"
				/>

			</div>

		</template>
	</Menu>

</template>

<script setup>

	import Button from 'primevue/button';
	import Menu from 'primevue/menu';
	import { ref, onMounted } from 'vue';
	import { useI18n } from 'vue-i18n';
	import { useToast } from 'primevue/usetoast';

	const props = defineProps({
		excel: {
			type: Boolean,
			default: true,
		},
		additionalLinks: {
			type: Array,
			default: [],
		},
	}), i18n = useI18n(), toast = useToast(), menu = ref(), items = ref([]);

	const toggle = (event) => {
		menu.value.toggle(event);
	};

	onMounted(() => {
		if (props.excel) {
			items.value.push({
				download: true,
				icon: 'file-excel',
				label: i18n.t('Export Excel'),
				command: () => {
					toast.add({
						severity: 'success',
						detail: i18n.t('Exported Successfully'),
						life: 3000,
					});
				},
			});
		}
		props.additionalLinks.forEach((item) => items.value.push(item));
	});

	const getExportExcelUrl = () => {
		let url = location.href.split("?");

		return typeof url[1] == "undefined"
			? url[0] + "?export_excel=true"
			: location.href + "&export_excel=true";
	};

</script>
