<template>

	<div>

		<VueDatePicker
			input-class-name="datePicker"
			:dark="false"
			auto-apply
			hide-input-icon
			time-picker-inline
			:enable-time-picker="showTime"
			:time-picker="!showDate"
			:is-24="false"
			:format="format"
			:preview-format="format"
			:cancelText="$t('Cancel')"
			:selectText="$t('Select')"
			v-bind="$attrs"
			utc
			:week-start="6"
		>

			<template #calendar-header="{ index }">
				<div v-text="
					index === 0 ? $t('_Weekday.Sa') : 
					index === 1 ? $t('_Weekday.Su') : 
					index === 2 ? $t('_Weekday.Mo') : 
					index === 3 ? $t('_Weekday.Tu') : 
					index === 4 ? $t('_Weekday.We') :
					index === 5 ? $t('_Weekday.Th') : 
					$t('_Weekday.Fr')
				" />
			</template>

			<template #month-year="{
				month,
				year,
				months,
				years,
				updateMonthYear,
				handleMonthYearChange
			}">
				<div class="flex justify-center items-center gap-2">
					<i
						class="pi pi-chevron-circle-left rtl:!rotate-180 cursor-pointer"
						@click="handleMonthYearChange(false)"
					/>

					<div class="flex justify-center items-center gap-2">

						<select
							class="select-input"
							:value="month"
							@change="updateMonth($event, updateMonthYear, year)"
						>
							<option
								v-for="m in months"
								:key="m.value"
								:value="m.value"
							>
								{{ $t('_Months.' + m.text) }}
							</option>
						</select>

						<select
							class="select-input"
							:value="year"
							@change="updateYear($event, updateMonthYear, month)"
						>
							<option
								v-for="y in years"
								:key="y.value"
								:value="y.value"
							>
								{{ y.text }}
							</option>
						</select>

					</div>

					<i
						class="pi pi-chevron-circle-right rtl:!rotate-180 cursor-pointer"
						@click="handleMonthYearChange(true)"
					/>
				</div>
			</template>

			<template #am-pm-button="{ toggle, value }">
				<button
					class="dp__pm_am_button"
					type="button"
					@click="toggle"
				>{{ $t(value) }}</button>
			</template>

		</VueDatePicker>

	</div>

</template>

<script setup>

	import VueDatePicker from '@vuepic/vue-datepicker';
	import '@vuepic/vue-datepicker/dist/main.css'
	import { ref } from 'vue';
	import { usePage } from '@inertiajs/vue3';

	const props = defineProps({
		showTime: Boolean,
		showDate: {
			type: Boolean,
			default: true,
		},
	});

	const format = (date) => {
		const day = `${date.getDate()}`.padStart(2, 0);
		const month = `${date.getMonth() + 1}`.padStart(2, 0)
		const year = date.getFullYear();
		return usePage().props.locale == 'ar' ? `${year}/${month}/${day}` : `${day}/${month}/${year}`;
	}

	const updateMonth = (event, updateMonthYear, year) => {
		updateMonthYear(parseInt(event.target.value), year)
	}

	const updateYear = (event, updateMonthYear, month) => {
		updateMonthYear(month, parseInt(event.target.value))
	}

</script>

<style>
	.datePicker {
		font-family: Tajawal;
		font-size: 1rem;
		color: #495057;
		background: #fff;
		padding: 0.75rem 0.75rem;
		border: 1px solid #ced4da;
		transition: background-color 0.2s, color 0.2s, border-color 0.2s,
			box-shadow 0.2s;
		-webkit-appearance: none;
		-moz-appearance: none;
		appearance: none;
		border-radius: 8px;
	}

	.select-input {
		background-image: none !important;
		margin: 5px 3px;
		padding: 5px;
		width: 100px;
		border-radius: 4px;
		border-color: var(--dp-border-color);
		outline: none;
		-webkit-appearance: unset;
	}

	.dp--overlay-relative {
		@apply flex;
	}
</style>
