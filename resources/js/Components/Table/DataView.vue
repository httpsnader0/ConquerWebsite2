<template>

	<DataView
		:value="data.data"
		:paginator="pagination"
		lazy
		:rows="tableOptions.per_page"
		:rowsPerPageOptions="[6, 12, 24]"
		:totalRecords="data.total"
		:loading="loading"
		:pageLinkSize="3"
		@page="handleOnPageChange"
		v-bind="$attrs"
		:first="( tableOptions.page - 1 ) * tableOptions.per_page"
		:layout="layout"
		:pt="{
            root: { class: 'no-page-bg' },
            header: { class: 'border-none p-0 mb-5' },
            content: { class: 'bg-transparent' },
        }"
	>
		<template #header>
			<div class="flex justify-end">
				<DataViewLayoutOptions
					v-model="layout"
					:pt="{
                        root: { class: 'flex' }
                    }"
				/>
			</div>
		</template>

		<template #list="slotProps">
			<div class="flex flex-wrap justify-center mb-5">
				<div
					v-for="(item, index) in slotProps.items"
					:key="index"
					class="w-1/2 p-3"
				>
					<Link
						:href="item.route"
						class="w-full h-[300px] hover:scale-105 hover-animate border-4 border-border-light dark:border-border-dark text-sm rounded-2xl overflow-hidden relative p-5 flex flex-col justify-end items-center gap-3 text-start !shadow-lg"
					>

					<img
						:src="item.image"
						:alt="item.name"
						class="absolute top-0 left-0 w-full h-full"
					/>

					<div class="absolute top-0 left-0 w-full h-full bg-gradient-to-b from-transparent to-black bg-opacity-50" />

					<span
						v-text="item.name"
						class="text-primary text-2xl relative"
					/>

					</Link>
				</div>
			</div>
		</template>

		<template #grid="slotProps">
			<div class="flex flex-wrap justify-center mb-5">
				<div
					v-for="(item, index) in slotProps.items"
					:key="index"
					class="w-1/3 p-3"
				>
					<Link
						:href="item.route"
						class="w-full h-[300px] hover:scale-105 hover-animate border-4 border-border-light dark:border-border-dark text-sm rounded-2xl overflow-hidden relative p-5 flex flex-col justify-end items-center gap-3 text-start !shadow-lg"
					>

					{{ item }}

					<img
						:src="item.image"
						:alt="item.name"
						class="absolute top-0 left-0 w-full h-full"
					/>

					<div class="absolute top-0 left-0 w-full h-full bg-gradient-to-b from-transparent to-black bg-opacity-50" />

					<span
						v-text="item.name"
						class="text-primary text-2xl relative"
					/>

					</Link>
				</div>
			</div>
		</template>
	</DataView>

</template>

<script setup>

	import DataView from 'primevue/dataview';
	import DataViewLayoutOptions from 'primevue/dataviewlayoutoptions';
	import ProgressSpinner from 'primevue/progressspinner';
	import { ref, reactive, watch, onMounted } from 'vue';
	import { router } from '@inertiajs/vue3';
	import debounce from 'lodash/debounce';

	const props = defineProps({
		data: Object,
		queryParams: {
			type: Object,
			default: {},
		},
		search: {
			type: Boolean,
			default: true,
		},
		pagination: {
			type: Boolean,
			default: true,
		},
	}), layout = ref('grid');

	const searchParams = new URLSearchParams(location.search), loading = ref(false), queryParams = reactive({
		// search: '',
	}), tableOptions = reactive({
		page: searchParams.get('page') ?? 1,
		per_page: searchParams.get('per_page') ? parseFloat(searchParams.get('per_page')) : 6,
	});

	watch(
		queryParams,
		debounce(() => {
			tableOptions.page = 1;
			loadLazyData();
		}, 500)
	);

	if (Object.entries(props.queryParams).length) {
		watch(props.queryParams, () => {
			tableOptions.page = 1;
			loadLazyData();
		});
	}

	const handleOnPageChange = (event) => {
		tableOptions.page = event.page + 1;
		tableOptions.per_page = event.rows;
		loadLazyData();
	};

	const loadLazyData = () => {
		loading.value = true;
		loadData();
	};

	const loadData = () => {
		router.get(
			location.origin + location.pathname,
			{ ...tableOptions, ...queryParams, ...props.queryParams },
			{
				preserveState: true,
				preserveScroll: true,
				replace: true,
				onFinish: () => {
					loading.value = false;
				},
			}
		);
	};

</script>