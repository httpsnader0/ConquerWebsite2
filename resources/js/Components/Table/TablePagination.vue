<template>

	<div class="panel-form">

		<div
			v-if="search"
			class="grid grid-cols-1 md:grid-cols-3 xl:grid-cols-4 gap-3 mb-5"
		>

			<SearchInput
				:form="queryParams"
				name="search"
				:loading="loading"
			/>

			<slot name="filters" />

		</div>

		<DataTable
			:value="data ? tableData.data : tableData"
			:paginator="pagination"
			lazy
			:rows="tableOptions.per_page"
			:rowsPerPageOptions="[10, 20, 50]"
			:totalRecords="tableData.total"
			:loading="loading"
			:pageLinkSize="3"
			@page="handleOnPageChange"
			@sort="handleOnSortChange"
			v-bind="$attrs"
			class="my-table"
			stripedRows
			:first="( tableOptions.page - 1 ) * tableOptions.per_page"
			:sortField="tableOptions.sortableField"
			:sortOrder="tableOptions.sortableBy"
		>

			<template #empty>
				<div class="flex justify-start md:justify-center p-20 text-2xl text-gray-400">
					{{ $t("Sorry , There Is No Data") }}
				</div>
			</template>

			<template #loadingicon>
				<ProgressSpinner
					style="width: 70px; height: 70px"
					strokeWidth="5"
				/>
			</template>

			<template #sorticon>
				<ProgressSpinner
					style="width: 70px; height: 70px"
					strokeWidth="5"
				/>
			</template>

			<slot />

		</DataTable>

	</div>

</template>

<script setup>

	import DataTable from 'primevue/datatable';
	import ProgressSpinner from 'primevue/progressspinner';
	import SearchInput from './SearchInput.vue';
	import { ref, reactive, watch, onMounted } from 'vue';
	import { router } from '@inertiajs/vue3';
	import debounce from 'lodash/debounce';

	const props = defineProps({
		tableData: Object,
		queryParams: {
			type: Object,
			default: {},
		},
		data: {
			type: Boolean,
			default: true,
		},
		search: {
			type: Boolean,
			default: true,
		},
		pagination: {
			type: Boolean,
			default: true,
		},
	});

	const searchParams = new URLSearchParams(location.search), loading = ref(false), queryParams = reactive({
		search: '',
	}), tableOptions = reactive({
		page: searchParams.get('page') ?? 1,
		per_page: searchParams.get('per_page') ? parseFloat(searchParams.get('per_page')) : 10,
		// sortableField: 'id',
		// sortableBy: -1,
		// sortableOrder: 'DESC',
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

	const handleOnSortChange = (event) => {
		tableOptions.sortableField = event.sortField;
		tableOptions.sortableBy = event.sortOrder;
		tableOptions.sortableOrder = event.sortOrder == -1 ? 'DESC' : 'ASC';
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
